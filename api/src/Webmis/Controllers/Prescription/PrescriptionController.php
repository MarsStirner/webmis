<?php
namespace Webmis\Controllers\Prescription;

// use \Propel;
// use \PDO;
// use \BasePeer;
// use \Criteria;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\DrugComponentQuery;
use Webmis\Models\ActionPropertyTypeQuery;
use Webmis\Models\DrugChartQuery;
use Webmis\Models\ActionQuery;
use Webmis\Models\Action;
use Webmis\Models\ActionProperty;
use Webmis\Models\ActionPropertyString;
use Webmis\Models\ActionPropertyDouble;
use Webmis\Models\DrugComponent;
use Webmis\Models\DrugChart;

class PrescriptionController
{

    public function noAction(Request $request, Application $app)
    {
        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет, иди домой' ));
    }


    public function templateAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $actionTypeId = (int) $route_params['actionTypeId'];
        $data = array(
            'actionTypeId' => $actionTypeId,
            'eventId' => null,
            'properties' => array(),
            'drugs' => array(),
            'assigmentIntervals' => array()
            );

        if(!$actionTypeId){
            return $app['jsonp']->jsonp(array('message' => 'id for ActionPropertyType?' ));
        }


        $actionPropertyTypes = ActionPropertyTypeQuery::create()
            ->filterByActionTypeId($actionTypeId)
            ->filterByDeleted(false)
            ->find();

        foreach ($actionPropertyTypes as $actionPropertyType) {
            $data['properties'][] = array(
                'actionPropertyTypeId' => $actionPropertyType->getId(),
                'mandatory' => $actionPropertyType->getMandatory(),
                'name' => $actionPropertyType->getName(),
                'value' => '',
                'valueDomain' => $actionPropertyType->getValueDomain(),
                'type' => $actionPropertyType->getTypeName(),
                'code' => $actionPropertyType->getCode(),
                );

        }


        return $app['jsonp']->jsonp(array('data' => $data,
            'message' => 'templateAction' ));
    }


    public function listAction(Request $request, Application $app)
    {

        $beginDateTime = (int) $request->get('beginDateTime');
        $clientId = (int) $request->get('clientId');
        $departmentId = (int) $request->get('departmentId');
        $doctorId = (int) $request->get('doctorId');
        $endDateTime = (int) $request->get('endDateTime');
        $eventId = (int) $request->get('eventId');
        $page = (int) $request->get('page') ?: 1;
        $limit = (int) $request->get('limit') ?: 20;

        $data = array();

        $prescriptions = ActionQuery::create()
            ->getPrescriptions(null, $eventId, $clientId, $departmentId, $beginDateTime, $endDateTime)
            //->paginate($page, $limit);
            ->find();

        if($prescriptions){
            foreach ($prescriptions as $prescription) {
                $data[] = $prescription->serializePrescription();
            }
        }


        return $app['jsonp']->jsonp(array('data' => $data ));
    }




    public function readAction(Request $request, Application $app){

        $route_params = $request->get('_route_params') ;
        $prescriptionId = (int) $route_params['prescriptionId'];
        $data = array();

        if(!$prescriptionId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора назначения.' ));
        }

        $prescription = ActionQuery::create()
            ->getPrescriptions($prescriptionId, null, null,  null, null,  null)
            ->find()->getFirst();

        if($prescription){
            $data = $prescription->serializePrescription();
        }

        return $app['jsonp']->jsonp(array('data' => $data ));
    }


    public function createAction(Request $request, Application $app){
        $createPersonId = (int) $request->cookies->get('userId');//неправильно....

        $data = $request->get('data');
        $eventId = @$data['eventId'];
        $actionTypeId = (int) @$data['actionTypeId'];
        $drugs = @$data['drugs'];
        $properties = $data['properties'];
        $assigmentIntervals = @$data['assigmentIntervals'];


        if(!$createPersonId){
            return $app['jsonp']->jsonp(array('message' => 'You are logged in?' ));
        }

        if(!$eventId){
            return $app['jsonp']->jsonp(array('message' => 'Id for event?' ));
        }

        if(!$actionTypeId){
            return $app['jsonp']->jsonp(array('message' => 'Where id for actionType?' ));
        }

        if(!$drugs){
            return $app['jsonp']->jsonp(array('message' => 'Well and where drugs?' ));
        }
        if(!$assigmentIntervals){
            return $app['jsonp']->jsonp(array('message' => 'Intervals?' ));
        }



        $prescription = new Action();

        $prescription->setEventId($eventId);
        $prescription->setActionTypeId($actionTypeId);
        $prescription->setDeleted(false);
        $prescription->setCreatePersonId($createPersonId);
        $prescription->setModifyPersonId($createPersonId);
        $prescription->setStatus(0);


        $actionPropertyTypes = ActionPropertyTypeQuery::create()
            ->filterByActionTypeId($actionTypeId)
            ->filterByDeleted(false)
            ->find();

        foreach ($actionPropertyTypes as $actionPropertyType) {

            $actionProperty = new ActionProperty();
            $actionProperty->setTypeId($actionPropertyType->getId());
            $actionProperty->setCreatePersonId($createPersonId);
            $actionProperty->setModifyPersonId($createPersonId);

            $prescription->addActionProperty($actionProperty);

        }


        foreach ($drugs as $drug) {
            $drugComponent = new DrugComponent();
            $drugComponent->fromArray($drug);
            $prescription->addDrugComponent($drugComponent);
        }

        foreach ($assigmentIntervals as $interval) {
            $drugChart = new DrugChart();
            $beginDateTime = (int) @$interval['beginDateTime'];
            $beginDateTime = round($beginDateTime/1000);
            $endDateTime = (int) @$interval['endDateTime'];
            $endDateTime = round($endDateTime/1000);

            $drugChart->setBegDateTime($beginDateTime);
            if($endDateTime){
                $drugChart->setEndDateTime($endDateTime);
            }

            $prescription->addDrugChart($drugChart);
        }


        $prescription->save();
        $prescription->reload(true);



        //заполнение значений для экшенпропертей
        if(is_array($properties)){
            $pi = array();
            foreach ($properties as $property) {
                $pi[$property['actionPropertyTypeId']] = $property;
            }
            $properties = $pi;
        }
            // return $app['jsonp']->jsonp(array('message' => $properties ));
        $actionProperties = $prescription->getActionPropertys();

        if($actionProperties){
            foreach ($actionProperties as $actionProperty) {
                $actionPropertyId = $actionProperty->getId();
                $actionPropertyType = $actionProperty->getActionPropertyType();
                $actionPropertyTypeId = $actionPropertyType->getId();
                $typeName = $actionPropertyType->getTypeName();


                if(array_key_exists($actionPropertyTypeId,$properties)){

                    switch ($typeName) {
                        case 'String':
                        case 'Html':
                        case 'Text':
                            $actionPropertyString = new ActionPropertyString();
                            $actionPropertyString->setId($actionPropertyId);
                            $actionPropertyString->setIndex(0);
                            $actionPropertyString->setValue($properties[$actionPropertyTypeId]['value']);

                            $actionProperty->setActionPropertyString($actionPropertyString);

                            break;
                        case 'Double':
                            $actionPropertyDouble = new ActionPropertyDouble();
                            $actionPropertyDouble->setId($actionPropertyId);
                            $actionPropertyDouble->setIndex(0);
                            $actionPropertyDouble->setValue($properties[$actionPropertyTypeId]['value']);

                            $actionProperty->setActionPropertyDouble($actionPropertyDouble);

                            break;
                        default:
                            # code...
                            break;
                    }
                }

            }
        }

        $actionProperties->save();




        $drugCharts = $prescription->getDrugCharts();

        if($drugCharts){
            foreach ($drugCharts as $drugChart) {
                if(!$drugChart->getMasterId()){
                    $drugChartCopy = new DrugChart();
                    $drugChartCopy->setMasterId($drugChart->getId());
                    $drugChartCopy->setBegDateTime($drugChart->getBegDateTime());
                    if($drugChart->getEndDateTime()){
                        $drugChartCopy->setEndDateTime($drugChart->getEndDateTime());
                    }

                    $prescription->addDrugChart($drugChartCopy);
                }
            }
        }

        $prescription->save();


        return $app['jsonp']->jsonp(array(
            'message' => 'create controller',
            'data' => $prescription->serializePrescription(),
            // 'DrugComponents' => $prescription->getDrugComponents()->toArray()
            ));
    }




    public function updateAction(Request $request, Application $app){
        $route_params = $request->get('_route_params') ;
        $prescriptionId = (int) $route_params['prescriptionId'];

        if(!$prescriptionId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора назначения.' ));
        }

        $prescription = ActionQuery::create()
            ->getPrescriptions($prescriptionId, null, null,  null, null,  null)
            ->find()->getFirst();

        if($prescription){
            $data = $prescription->serializePrescription();
        }

        return $app['jsonp']->jsonp(array('data' => $data ));
    }
}
