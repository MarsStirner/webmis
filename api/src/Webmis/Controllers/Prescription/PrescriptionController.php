<?php
namespace Webmis\Controllers\Prescription;

// use \Propel;
// use \PDO;
// use \BasePeer;
// use \Criteria;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\DrugComponentQuery;
use Webmis\Models\DrugChartQuery;
use Webmis\Models\ActionQuery;
use Webmis\Models\Action;
use Webmis\Models\DrugComponent;
use Webmis\Models\DrugChart;

class PrescriptionController
{

    public function noAction(Request $request, Application $app)
    {
        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет, иди домой' ));
    }


    public function listForDepartmentAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params');

        $clientId = (int) $request->get('clientId');
        $departmentId = (int) $route_params['departmentId'];
        $doctorId = (int) $request->get('doctorId');
        $eventId = (int) $request->get('eventId');

        $data = array();

        if(!$departmentId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора департамента.' ));
        }


        $prescriptions = ActionQuery::create()
            ->getPrescriptions(null, $eventId, $clientId, $departmentId, null,  null)
            ->find();

        if($prescriptions){
            foreach ($prescriptions as $prescription) {
                $data['prescriptions'][] = $prescription->serializePrescription();
            }
        }


        return $app['jsonp']->jsonp(array(
            'data' => $data,
            'message' => 'listForDepartmentAction' ));

    }

    public function listAction(Request $request, Application $app)
    {

        $eventId = (int) $request->get('eventId');
        $beginDateTime = (int) $request->get('beginDateTime');
        $endDateTime = (int) $request->get('endDateTime');

        $data = array('prescriptions' => array());


        if(!$eventId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора истории болезни.' ));
        }

        $prescriptions = ActionQuery::create()
            ->getPrescriptions(null, $eventId, null, null, null, null)
            ->find();

        if($prescriptions){
            foreach ($prescriptions as $prescription) {
                $data['prescriptions'][] = $prescription->serializePrescription();
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

        $data = $request->get('data');
        $eventId = @$data['eventId'];
        $actionTypeId = @$data['actionTypeId'];
        $drugs = @$data['drugs'];
        $assigmentIntervals = @$data['assigmentIntervals'];


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
        $prescription->setStatus(0);


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


        $data = $prescription->toArray();

        return $app['jsonp']->jsonp(array(
            'message' => 'create controller',
            'data' => $data,
            'DrugComponents' => $prescription->getDrugComponents()->toArray() ));
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
