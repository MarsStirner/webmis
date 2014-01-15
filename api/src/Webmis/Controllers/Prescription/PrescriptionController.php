<?php
namespace Webmis\Controllers\Prescription;

// use \Propel;
// use \PDO;
// use \BasePeer;
// use \Criteria;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\Action;
use Webmis\Models\ActionProperty;
use Webmis\Models\ActionPropertyDouble;
use Webmis\Models\ActionPropertyString;
use Webmis\Models\ActionPropertyTypeQuery;
use Webmis\Models\ActionQuery;
use Webmis\Models\ActionTypeQuery;
use Webmis\Models\DrugChart;
use Webmis\Models\DrugChartQuery;
use Webmis\Models\DrugComponent;
use Webmis\Models\DrugComponentQuery;

class PrescriptionController
{

    public function noAction(Request $request, Application $app)
    {
        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет, иди домой' ));
    }

    public function typesListAction(Request $request, Application $app)
    {
        $types = ActionTypeQuery::create()
            ->filterByFlatCode(array('infusion'))
            ->select(array('id','title')) 
            ->find()->toArray();

        return $app['jsonp']->jsonp(array('data' => $types));
    }


    public function templateAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $actionTypeId = (int) $route_params['actionTypeId'];
        $data = array(
            'actionTypeId' => $actionTypeId,
            'eventId' => null,
            'note' => '',
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

        $dateRangeMin = (int) $request->get('dateRangeMin');
        $dateRangeMax = (int) $request->get('dateRangeMax');


        $clientId = (int) $request->get('clientId');
        $pacientName = $request->get('pacientName');
        $drugName = $request->get('drugName');
        $departmentId = (int) $request->get('departmentId');
        $administrationId = (int) $request->get('administrationId');
        $doctorId = (int) $request->get('doctorId');
        $doctorName = $request->get('doctorName');
        $setPersonName = $request->get('setPersonName');
        $eventId = (int) $request->get('eventId');
        $page = (int) $request->get('page') ?: 1;
        $limit = (int) $request->get('limit') ?: 20;

        $data = array();

        $filter = array('eventId' => $eventId,
                        'clientId' => $clientId,
                        'pacientName' => $pacientName,
                        'doctorName' => $doctorName,
                        'setPersonName' => $setPersonName,
                        'drugName' => $drugName,
                        'departmentId' => $departmentId,
                        'administrationId' => $administrationId,
                        'dateRangeMax' => $dateRangeMax,
                        'dateRangeMin' => $dateRangeMin);

        $hidrate = array(
            'actionType' => true,
            'properties' => true,
            'doctor' => true,
            'setPerson' => true,
            'createPerson' => true,
            'modifyPerson' => true,
            'drugs' => true,
            'intervals' => true,
            'client' => true
            );

        $filterQuery = ActionQuery::create()->filterPrescriptions($filter);
        $filteredPrescriptions = $filterQuery->find()->toArray();

        $filteredPrescriptionsIds = array_map(function($prescription) { return $prescription['id'];}, $filteredPrescriptions);

        // return $app['jsonp']->jsonp(array(
        //     'filter' => $filter,
        //     'filterSql' => $filterQuery->toString(),
        //     'data' => $filteredPrescriptionsIds
        //     ));

        if(count($filteredPrescriptionsIds)){
            $query = ActionQuery::create()->getPrescriptions($filteredPrescriptionsIds, $hidrate);

            $prescriptions = $query->find();

            if($prescriptions){
                foreach ($prescriptions as $prescription) {
                    $data[] = $prescription->serializePrescription($hidrate);
                }
            }
        }



        return $app['jsonp']->jsonp(array(
            //'sql' => $query->toString(),
            'data' => $data
            ));

    }




    public function readAction(Request $request, Application $app){

        $route_params = $request->get('_route_params') ;
        $prescriptionId = (int) $route_params['prescriptionId'];
        $data = array();

        if(!$prescriptionId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора назначения.' ));
        }

        $prescription = ActionQuery::create()
            ->getPrescriptions(array('id' => $prescriptionId))
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
        $note = @$data['note'];
        $isUrgent = @$data['isUrgent'];
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
        $prescription->setNote($note);
        $prescription->setIsUrgent($isUrgent);
        $prescription->setActionTypeId($actionTypeId);
        $prescription->setDeleted(false);
        $prescription->setCreatePersonId($createPersonId);
        $prescription->setModifyPersonId($createPersonId);
        $prescription->setSetPersonId($createPersonId);
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


        $drugAllowedFields = array_flip(array('nomen', 'name', 'dose'));

        foreach ($drugs as $drug) {
            $drug = array_intersect_key($drug, $drugAllowedFields);

            $drugComponent = new DrugComponent();
            $drugComponent->fromArray($drug);
            $prescription->addDrugComponent($drugComponent);
        }

        foreach ($assigmentIntervals as $interval) {
            $beginDateTime = round((int) @$interval['beginDateTime']/1000);
            $endDateTime = round((int) @$interval['endDateTime']/1000);

            $drugChart = new DrugChart();

            $drugChart->setBegDateTime($beginDateTime);
            if($endDateTime){
                $drugChart->setEndDateTime($endDateTime);
            }

            $prescription->addDrugChart($drugChart);
        }


        $prescription->save();

        //заполнение значений для экшенпропертей
        if(is_array($properties)){
            $pi = array();
            foreach ($properties as $property) {
                $pi[$property['actionPropertyTypeId']] = $property;
            }
            $properties = $pi;
        }

        $actionProperties = $prescription->getActionPropertys();

        if($actionProperties){
            foreach ($actionProperties as $actionProperty) {
                $actionPropertyId = $actionProperty->getId();
                $actionPropertyType = $actionProperty->getActionPropertyType();
                $actionPropertyTypeId = $actionPropertyType->getId();

                if(array_key_exists($actionPropertyTypeId,$properties)){
                    $actionProperty->setValue($properties[$actionPropertyTypeId]['value']);
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
            'data' => $prescription->serializePrescription(),
            'message' => 'create controller'
            ));
    }



    public function drugCancelAction(Request $request, Application $app){
        $route_params = $request->get('_route_params') ;
        $drugId = (int) $route_params['drugId'];

        if(!$drugId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора лекарства.' ));
        }

        $drugComponent = DrugComponentQuery::create()->findOneById($drugId);

        if($drugComponent){
            $drugComponent->cancel()->save();
        }

        return $app['jsonp']->jsonp(array('message' => 'blablabla' ));
    }


    public function readIntervalsAction(Request $request, Application $app){
        $route_params = $request->get('_route_params') ;
        $prescriptionId = (int) $route_params['prescriptionId'];
        $data = array();

        if(!$prescriptionId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора назначения.' ));
        }

        $intervals = DrugChartQuery::create()
        ->filterByActionId($prescriptionId)
        ->find();

        if($intervals){
            $prescription = new Action();
            $data = $prescription->serializeIntervals($intervals);
        }



        return $app['jsonp']->jsonp(array('data' => $data ));

    }




    public function updateAction(Request $request, Application $app){
        $route_params = $request->get('_route_params') ;
        $prescriptionId = (int) $route_params['prescriptionId'];

        if(!$prescriptionId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора назначения.' ));
        }

        $prescription = ActionQuery::create()
            ->getPrescriptions(array('id' => $prescriptionId))
            ->find()->getFirst();

        if($prescription){
            $data = $prescription->serializePrescription();
        }

        return $app['jsonp']->jsonp(array('data' => $data ));
    }

    /* public function updateIntervalsAction(Request $request, Application $app){ */
    /*     $route_params = $request->get('_route_params') ; */
    /*     $prescriptionId = (int) $route_params['prescriptionId']; */
    /*     $data = $request->get('data'); */

    /*     if(!$prescriptionId){ */
    /*         return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора назначения.' )); */
    /*     } */

    /*     $prescription = ActionQuery::create() */
    /*         ->leftJoinWithDrugChart() */
    /*         ->findOneById($prescriptionId); */

    /*     $intervals = $prescription->getDrugCharts(); */


    /*     if(is_array($data)){ */
    /*         foreach ($data as $assigmentInterval) { */
    /*             if(array_key_exists('id', $assigmentInterval)){ */
    /*                 $interval = $this->getIntervalById($intervals, $assigmentInterval['id']); */
    /*             }else{ */
    /*                 $interval = null; */
    /*             } */

    /*             if($interval){ */
    /*                 if(array_key_exists('status', $assigmentInterval)){ */
    /*                     if($interval->getStatus() != $assigmentInterval['status']){ */
    /*                         $interval->setStatus($assigmentInterval['status']); */
    /*                     } */
    /*                 } */

    /*                 if(array_key_exists('note', $assigmentInterval)){ */
    /*                     $interval->setNote($assigmentInterval['note']); */
    /*                 } */

    /*                 if(array_key_exists('beginDateTime', $assigmentInterval)){ */
    /*                     $interval->setBegDateTime(round((int) $assigmentInterval['beginDateTime']/1000)); */
    /*                 } */

    /*                 if(array_key_exists('endDateTime', $assigmentInterval) && !empty($assigmentInterval['endDateTime'])){ */
    /*                     $interval->setEndDateTime(round((int) $assigmentInterval['endDateTime']/1000)); */
    /*                 } */

    /*                 if(array_key_exists('executionIntervals', $assigmentInterval) && is_array($assigmentInterval['executionIntervals'])){ */

    /*                     foreach ($assigmentInterval['executionIntervals'] as $executionInterval) { */

    /*                         if(array_key_exists('id', $executionInterval)){ */
    /*                             $interval2 = $this->getIntervalById($intervals, $executionInterval['id']); */
    /*                         }else{ */
    /*                             $interval2 = null; */
    /*                         } */

    /*                         if($interval2){ */
    /*                             if(array_key_exists('status', $executionInterval)){ */
    /*                                 if($interval2->getStatus() != $executionInterval['status']){ */
    /*                                     $interval2->setStatus($executionInterval['status']); */
    /*                                 } */
    /*                             } */

    /*                             if(array_key_exists('note', $executionInterval)){ */
    /*                                 $interval2->setNote($executionInterval['note']); */
    /*                             } */

    /*                             if(array_key_exists('beginDateTime', $executionInterval)){ */
    /*                                 $interval2->setBegDateTime(round((int) $executionInterval['beginDateTime']/1000)); */
    /*                             } */

    /*                             if(array_key_exists('endDateTime', $executionInterval)  && !empty($executionInterval['endDateTime'])){ */
    /*                                 $interval2->setEndDateTime(round((int) $executionInterval['endDateTime']/1000)); */
    /*                             } */
    /*                         }else{ */
    /*                             //новый интервал исполнения... */
    /*                         } */


    /*                     } */
    /*                 } */

    /*             }else{ */
    /*                 //новый интервал назначения */

    /*                 $drugChart = new DrugChart(); */

    /*                 $drugChart->setStatus(0); */


    /*                 if(array_key_exists('note', $assigmentInterval)){ */
    /*                     $drugChart->setNote($assigmentInterval['note']); */
    /*                 } */

    /*                 if(array_key_exists('beginDateTime', $assigmentInterval)){ */
    /*                     $drugChart->setBegDateTime(round((int) $assigmentInterval['beginDateTime']/1000)); */
    /*                 } */

    /*                 if(array_key_exists('endDateTime', $assigmentInterval) && !empty($assigmentInterval['endDateTime'])){ */
    /*                     $drugChart->setEndDateTime(round((int) $assigmentInterval['endDateTime']/1000)); */
    /*                 } */

    /*                 $prescription->addDrugChart($drugChart); */
    /*             } */


    /*         } */
    /*     } */

    /*     $prescription->save(); */



    /*     return $app['jsonp']->jsonp(array('data' => $intervals->toArray() )); */
    /* } */


    public function updateIntervalsAction(Request $request, Application $app){
        $route_params = $request->get('_route_params') ;
        $data = $request->get('data');


        return $app['jsonp']->jsonp(array('data' => $data ));
        /* $prescription = ActionQuery::create() */
        /*     ->leftJoinWithDrugChart() */
        /*     ->findOneById($prescriptionId); */

        /* $intervals = $prescription->getDrugCharts(); */


        /* if(is_array($data)){ */
        /*     foreach ($data as $assigmentInterval) { */
        /*         if(array_key_exists('id', $assigmentInterval)){ */
        /*             $interval = $this->getIntervalById($intervals, $assigmentInterval['id']); */
        /*         }else{ */
        /*             $interval = null; */
        /*         } */

        /*         if($interval){ */
        /*             if(array_key_exists('status', $assigmentInterval)){ */
        /*                 if($interval->getStatus() != $assigmentInterval['status']){ */
        /*                     $interval->setStatus($assigmentInterval['status']); */
        /*                 } */
        /*             } */

        /*             if(array_key_exists('note', $assigmentInterval)){ */
        /*                 $interval->setNote($assigmentInterval['note']); */
        /*             } */

        /*             if(array_key_exists('beginDateTime', $assigmentInterval)){ */
        /*                 $interval->setBegDateTime(round((int) $assigmentInterval['beginDateTime']/1000)); */
        /*             } */

        /*             if(array_key_exists('endDateTime', $assigmentInterval) && !empty($assigmentInterval['endDateTime'])){ */
        /*                 $interval->setEndDateTime(round((int) $assigmentInterval['endDateTime']/1000)); */
        /*             } */

        /*             if(array_key_exists('executionIntervals', $assigmentInterval) && is_array($assigmentInterval['executionIntervals'])){ */

        /*                 foreach ($assigmentInterval['executionIntervals'] as $executionInterval) { */

        /*                     if(array_key_exists('id', $executionInterval)){ */
        /*                         $interval2 = $this->getIntervalById($intervals, $executionInterval['id']); */
        /*                     }else{ */
        /*                         $interval2 = null; */
        /*                     } */

        /*                     if($interval2){ */
        /*                         if(array_key_exists('status', $executionInterval)){ */
        /*                             if($interval2->getStatus() != $executionInterval['status']){ */
        /*                                 $interval2->setStatus($executionInterval['status']); */
        /*                             } */
        /*                         } */

        /*                         if(array_key_exists('note', $executionInterval)){ */
        /*                             $interval2->setNote($executionInterval['note']); */
        /*                         } */

        /*                         if(array_key_exists('beginDateTime', $executionInterval)){ */
        /*                             $interval2->setBegDateTime(round((int) $executionInterval['beginDateTime']/1000)); */
        /*                         } */

        /*                         if(array_key_exists('endDateTime', $executionInterval)  && !empty($executionInterval['endDateTime'])){ */
        /*                             $interval2->setEndDateTime(round((int) $executionInterval['endDateTime']/1000)); */
        /*                         } */
        /*                     }else{ */
        /*                         //новый интервал исполнения... */
        /*                     } */


        /*                 } */
        /*             } */

        /*         }else{ */
        /*             //новый интервал назначения */

        /*             $drugChart = new DrugChart(); */

        /*             $drugChart->setStatus(0); */


        /*             if(array_key_exists('note', $assigmentInterval)){ */
        /*                 $drugChart->setNote($assigmentInterval['note']); */
        /*             } */

        /*             if(array_key_exists('beginDateTime', $assigmentInterval)){ */
        /*                 $drugChart->setBegDateTime(round((int) $assigmentInterval['beginDateTime']/1000)); */
        /*             } */

        /*             if(array_key_exists('endDateTime', $assigmentInterval) && !empty($assigmentInterval['endDateTime'])){ */
        /*                 $drugChart->setEndDateTime(round((int) $assigmentInterval['endDateTime']/1000)); */
        /*             } */

        /*             $prescription->addDrugChart($drugChart); */
        /*         } */


        /*     } */
        /* } */

        /* $prescription->save(); */



        /* return $app['jsonp']->jsonp(array('data' => $intervals->toArray() )); */
    }

    public function cancelIntervalsExecutionAction(Request $request, Application $app){
        $data = $request->get('data');

        $intervals = DrugChartQuery::create()->filterById($data)->find();

        //return $app['jsonp']->jsonp(array('data' => $data ));
        foreach($intervals as $interval){
            $interval->setStatus(0);
        }

        $intervals->save();

        return $app['jsonp']->jsonp(array('data' => $intervals->toArray() ));
    }
    public function cancelIntervalsAction(Request $request, Application $app){
        $data = $request->get('data');

        $intervals = DrugChartQuery::create()->filterById($data)->find();

        //return $app['jsonp']->jsonp(array('data' => $data ));
        foreach($intervals as $interval){
            $interval->setStatus(2);
        }

        $intervals->save();

        return $app['jsonp']->jsonp(array('data' => $intervals->toArray() ));
    }


    public function executeIntervalsAction(Request $request, Application $app){
        $data = $request->get('data');

        $intervals = DrugChartQuery::create()->filterById($data)->find();

        //return $app['jsonp']->jsonp(array('data' => $data ));
        foreach($intervals as $interval){
            $interval->setStatus(1);
        }

        $intervals->save();

        return $app['jsonp']->jsonp(array('data' => $intervals->toArray() ));
    }



    public function getIntervalById($intervals, $id){

        // $filteredIntervals = array_filter($intervals, function ($interval) use ($id) {
        //     return $id === $interval->getId();
        // });

        // $interval = empty($filteredIntervals) ? null : $filteredIntervals[0];
        $interval = null;

        foreach ($intervals as $inter)
        {
          if ($id == $inter->getId()){
            $interval = $inter;
            break;
          }
        }

        return $interval;
    }
}
