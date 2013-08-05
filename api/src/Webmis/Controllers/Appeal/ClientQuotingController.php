<?php
namespace Webmis\Controllers\Appeal;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\ClientQuotingQuery;

class ClientQuotingController
{
    // public function updateAction(Request $request, Application $app)
    // {
    //         $userId = $request->cookies->get('userId');
    //         $date = new \DateTime('NOW');
    //         $now = $date->format('Y-m-d H:i:s');

    //         $put = json_decode($request->getContent());


    //         $route_params = $request->get('_route_params') ;


    //         $data = array(
    //             "modifyDatetime" => $now,
    //             // "modifyPerson_id" => $userId,
    //             // "quotaType_id" => $put->data->quotaType_id,
    //             // "MKB" => $put->data->MKB,
    //             // "pacientModel_id" => $put->data->pacientModel_id,
    //             // "treatment_id" => $put->data->treatment_id
    //             );

    //          //$app['db']->update('Client_Quoting', $data, array('id' => (int) $quotingId));


    //         return $app['jsonp']->jsonp(array("data" => $data,'$route_params'=>$route_params));
    // }

    public function readAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $appealId = $route_params['appealId'];
    // $select_sql = "SELECT cq.*, pm.name as 'patientModelName',mkb.DiagName,mkb.id as 'mkbId', qt.name AS 'quotaTypeName',t.name AS 'treatmentName' "
    //         ."FROM Client_Quoting as cq "
    //         ."JOIN MKB AS mkb ON cq.MKB = mkb.DiagID "
    //         ."JOIN rbPacientModel AS pm on cq.pacientModel_id = pm.id "
    //         ."JOIN QuotaType AS qt on cq.quotaType_id = qt.id "
    //         ."JOIN rbTreatment AS t ON cq.treatment_id = t.id "
    //         ." WHERE cq.event_id = ? ";

    //         $vmpTalon = $app['db']->fetchAssoc($select_sql, array((int) $appealId));

    //         if(!$vmpTalon){
    //             $vmpTalon = array();
    //         }
            $vmpTalon = ClientQuotingQuery::create()
            ->filterByEventId($appealId)
            ->join('RbTreatment')
            ->join('RbPacientModel')
            ->join('QuotaType')
            //->join('MKB')
            ->select(array('id', 'mkb', 'treatmentId', 'RbTreatment.name','pacientModelId','RbPacientModel.name','quotaTypeId','QuotaType.name','QuotaType.code'))
            ->findOne();
            //->toArray();
            return $app['jsonp']->jsonp(array("data" => $vmpTalon,'$route_params'=>$route_params));
    }
}
