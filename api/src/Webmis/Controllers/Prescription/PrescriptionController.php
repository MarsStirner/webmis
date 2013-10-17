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
            ->getPrescriptions(null, $eventId, $beginDateTime,  $endDateTime)
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
            ->getPrescriptions($prescriptionId, null, null,  null)
            ->findOne();

        if($prescription){
            $data = $prescription->serializePrescription();
        }

        return $app['jsonp']->jsonp(array('data' => $data ));
    }

    public function createAction(Request $request, Application $app){
        return $app['jsonp']->jsonp(array('message' => 'create controller' ));
    }

    public function updateAction(Request $request, Application $app){
        return $app['jsonp']->jsonp(array('message' => 'update controller' ));
    }
}
