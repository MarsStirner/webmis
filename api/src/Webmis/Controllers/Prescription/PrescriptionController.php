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

class PrescriptionController
{

    public function noAction(Request $request, Application $app)
    {
        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет, иди домой' ));
    }




    public function prescriptionForEventAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $eventId = (int) $route_params['eventId'];
        $data = array('prescriptions' => array());

        $beginDateTime = $request->get('beginDateTime');
        $endDateTime = $request->get('endDateTime');


        if(!$eventId){
            return $app['jsonp']->jsonp(array('message' => 'Нет идентификатора иб.' ));
        }

        $prescriptions = ActionQuery::create()
            ->useActionTypeQuery()
                ->filterByFlatCode(array('chemotherapy','prescription','infusion','analgesia'))
                ->filterByDeleted(false)
            ->endUse()
            ->filterByDeleted(false)
            ->filterByEventId($eventId)

                ->useDrugChartQuery()
                    ->_if($beginDateTime)
                        ->filterByBegDateTime(array('min' => $beginDateTime))
                    ->_endif()
                ->endUse()
            ->with('DrugChart')

            ->joinWithDrugComponent()
            ->find();//->toArray();

        if($prescriptions){
            foreach ($prescriptions as $prescription) {
                $p = array(
                    'assigmentIntervals' => array(),//интервалы назначения
                    'executionIntervals' => array()//интервалы исполнения
                    );

                $actionType = $prescription->getActionType();
                $p['name'] = $actionType->getName();
                $p['flatCode'] = $actionType->getFlatCode();

                $drugComponents = $prescription->getDrugComponents();
                if($drugComponents){
                    $drugComponent = $drugComponents[0];
                    $p['drugName'] = $drugComponent->getName();
                    $p['drugDose'] = $drugComponent->getDose();
                }

                $intervals = $prescription->getDrugCharts();
                if($intervals){
                    foreach ($intervals as $interval) {
                        $i = array();
                        $i['beginDateTime'] = $interval->getBegDateTime();
                        $i['endDateTime'] = $interval->getEndDateTime();
                        $i['status'] = $interval->getStatus();

                        if(!$interval->getMasterId()){
                            $p['assigmentIntervals'][] = $i;
                        }else{
                            $p['executionIntervals'][] = $i;
                        }
                    }
                }


                $data['prescriptions'][] = $p;
            }

        }


        return $app['jsonp']->jsonp(array('data' => $data ));
    }


}
