<?php
namespace Webmis\Controllers\Appeal;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\ParameterBag;

class AppealControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        $controllers->get('/{appealId}/docs4closing', function($appealId, Request $request)  use ($app) {


            $json = array();

            $json['allDocs'] = true;//есть все документы для закрытия истории болезни

            //тип финансирования ВМП?
            $select_sql = "SELECT f.code,f.name FROM Event as e "
            ."JOIN EventType as et ON e.eventType_id = et.id "
            ."JOIN rbFinance as f ON et.finance_id = f.id "
            ."WHERE e.id = ? LIMIT 1";

            $financeType = $app['db']->fetchAssoc($select_sql, array((int) $appealId));

            //$financeType->getSqlQuery();
            //$app['monolog']->addInfo('ddddddddddddddddddddddddddddd');

            if($financeType['name'] == 'ВМП'){
                $vmp = true;
            }else{
                $vmp = false;
            }

            $json['vmp'] = $vmp;


            //Если тип финансирования ВМП, то проверяем есть ли тикет для ВМП?
            if($vmp){

                $select_sql = "SELECT Client_Quoting.id FROM Event "
                ."JOIN Client_Quoting ON Event.externalId = Client_Quoting.Identifier "
                ."WHERE Event.id = ? "
                ."AND Client_Quoting.deleted = 0 ";

                $vmpTicket = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

                $json['vmpTicket'] = $vmpTicket;
                $json['allDocs'] = $vmpTicket;

            }


            //есть ли эпикриз?
            $select_sql = "SELECT ActionType.id FROM Action "
            ."JOIN ActionType ON Action.actionType_id = ActionType.id "
            ."WHERE Action.event_id = ? "
            ."AND (ActionType.code = 4504 OR ActionType.code = 4507 OR ActionType.code = 4511) "
            ."AND ActionType.mnem = 'EPI' "
            ."AND Action.deleted = 0 ";

            $epicrisis = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

            $json['epicrisis'] = $epicrisis;
            $json['allDocs'] = $json['allDocs'] && $json['epicrisis'];


            //есть ли выписка
            $select_sql = "SELECT Action.id FROM Action "
            ."JOIN ActionType ON Action.actionType_id = ActionType.id "
            ."WHERE Action.event_id = ? "
            ."AND ActionType.flatCode = 'leaved' "
            ."AND Action.deleted = 0 "
            ."AND ActionType.mnem = 'ORD' ";

            $discharge = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));
            $json['discharge'] = $discharge;
            $json['allDocs'] = $json['allDocs'] && $json['discharge'];

            //проверка на онко диагноз
            $select_sql = "SELECT Diagnostic.id "
            ."FROM Diagnostic "
            ."JOIN Diagnosis ON Diagnosis.id = Diagnostic.diagnosis_id "
            ."JOIN MKB ON Diagnosis.MKB = MKB.DiagID "
            ."WHERE Diagnostic.event_id = ? "
            ."AND Diagnostic.deleted = 0 "
            ."AND MKB.DiagId LIKE 'C%' ";

            $oncology = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));
            $json['oncology'] = $oncology;


            if($oncology){
                //Данные для онко диагнозов
                $select_sql = "SELECT rbDiagnosisType.name as 'diagnosisTypeName',"
                ." MKB.DiagId,"
                ." MKB.DiagName AS 'diagnosisName',"
                ." rbDiseaseCharacter.name AS 'diseaseCharacterName',"
                ." rbDiseaseStage.code,"
                ." rbDiseaseStage.name AS 'diseaseSstage'"
                ." FROM Diagnostic"
                ." JOIN Diagnosis ON Diagnostic.diagnosis_id = Diagnosis.id"
                ." LEFT JOIN rbDiagnosisType ON Diagnostic.diagnosisType_id = rbDiagnosisType.id"
                ." LEFT JOIN MKB ON Diagnosis.MKB = MKB.DiagID"
                ." LEFT JOIN rbDiseaseCharacter ON Diagnostic.character_id = rbDiseaseCharacter.id"
                ." LEFT JOIN rbDiseaseStage ON Diagnostic.stage_id = rbDiseaseStage.id"
                ." where Diagnostic.event_id = ? ";

                $onkoData = $app['db']->fetchAssoc($select_sql, array((int) $appealId));
                $json['onkoData'] = $onkoData;
            }

            if($oncology){
                //проверка наличия извещения 090/у
                $select_sql = "SELECT Action.id FROM Action "
                ." JOIN ActionType ON Action.actionType_id = ActionType.id "
                ." WHERE Action.event_id = ? "
                ." AND ActionType.code= '1_7_2'"
                ."AND Action.deleted = 0 "
                ." AND ActionType.mnem = 'NOT' ";

                $notice_090y = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

                $json['notice_090y'] = $notice_090y;
                $json['allDocs'] = $json['allDocs'] && $json['notice_090y'];
            }

            if($oncology){
                //проверка наличия извещения 027/у-2
                $select_sql = "SELECT Action.id FROM Action "
                ." JOIN ActionType ON Action.actionType_id = ActionType.id "
                ." WHERE Action.event_id = ? "
                ." AND ActionType.code= '1_7_1'"
                ." AND Action.deleted = 0 "
                ." AND ActionType.mnem = 'NOT' ";

                $notice_027y_2 = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

                $json['notice_027y_2'] = $notice_027y_2;
                $json['allDocs'] = $json['allDocs'] && $json['notice_027y_2'];
            }

            if($oncology){
                //проверка наличия извещения 027/у-1
                $select_sql = "SELECT Action.id FROM Action "
                ." JOIN ActionType ON Action.actionType_id = ActionType.id "
                ." WHERE Action.event_id = ? "
                ." AND Action.deleted = 0 "
                ." AND ActionType.code= '1_8_5'"
                ." AND ActionType.mnem = 'OTH' ";

                $notice_027y_1 = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

                $json['notice_027y_1'] = $notice_027y_1;
                $json['allDocs'] = $json['allDocs'] && $json['notice_027y_1'];
            }

            //незакрытые документы
            $select_sql = "SELECT Action.id FROM Action "
            ." JOIN ActionType ON Action.actionType_id = ActionType.id "
            ." WHERE Action.event_id = ? "
            ." AND Action.deleted = 0 "
            ." AND Action.endDate IS NULL";

            $openDocs = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

            $json['openDocs'] = $openDocs;


            return $app['jsonp']->jsonp(array('data' => $json));

        })->assert('appealId', '\d+');





        //закрыть незакрытые документы для госпитализации
        $controllers->get('/{appealId}/docs/close', function($appealId, Request $request)  use ($app){

            //Дата закрытия
            $execDate = $app['request']->get('execDate');
            if($execDate){
                $timestamp = $execDate/1000;
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
            }else{
                $date = new \DateTime('NOW');
            }

            $update_sql = "UPDATE Action "
                ." JOIN ActionType ON Action.actionType_id = ActionType.id "
                ." SET Action.endDate = :endDate "
                ." WHERE Action.event_id = :appealId "
                ." AND Action.endDate IS NULL";

            $statment = $app['db']->prepare($update_sql);
            $statment->bindValue('endDate', $date, "datetime");
            $statment->bindValue('appealId', $appealId, "integer");
            $count = $statment->execute();

            return $app['jsonp']->jsonp(array('count'=>$count));

        })->assert('appealId', '\d+');




        //освободить койку
        $controllers->get('/{appealId}/bed/vacate', function($appealId, Request $request) use ($app){

            //Дата закрытия
            $execDate = $app['request']->get('execDate');
            if($execDate){
                $timestamp = $execDate/1000;
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
            }else{
                $date = new \DateTime('NOW');
            }

            $select_sql = "SELECT Action.id, Action.begDate, Action.endDate FROM Action "
            ."JOIN ActionType ON Action.actionType_id = ActionType.id "
            ."WHERE Action.event_id = ? AND ActionType.flatCode = 'moving' "
            ."ORDER BY Action.directionDate DESC LIMIT 1";
            $lastMove = $app['db']->fetchAssoc($select_sql, array((int) $appealId));
            $lastMoveId = $lastMove['id'];

            $update_sql = "UPDATE Action "
            ."SET Action.endDate= :endDate "
            ."WHERE Action.id = :lastMoveId";

            $stmt = $app['db']->prepare($update_sql);
            $stmt->bindValue('endDate', $date, "datetime");
            $stmt->bindValue('lastMoveId', $lastMoveId, "integer");
            $count = $stmt->execute();

            $timeleavead = $date->format('H:i:s');
            //timeleaved id
            $select_sql = "select ap.id from Action as a "
                ."join ActionProperty as ap on ap.action_id = a.id "
                ."where a.id = ? and ap.type_id = 1617 ";

            $timeleaveadProperty = $app['db']->fetchAssoc($select_sql, array((int) $lastMoveId));
            $timeleaveadPropertyId = $timeleaveadProperty['id'];

            $insert_sql = "INSERT INTO ActionProperty_Time (id, value) VALUES (:id,:time) "
                    ."ON DUPLICATE KEY UPDATE value= :time;";

            $stmt = $app['db']->prepare($insert_sql);
            $stmt->bindValue('id', $timeleaveadPropertyId, "integer");
            $stmt->bindValue('time', $timeleavead);
            $count = $stmt->execute();

            return $app['jsonp']->jsonp($count);

        })->assert('appealId', '\d+');




        //закрыть госпитализацию
        $controllers->get('/{appealId}/close', function($appealId, Request $request) use ($app){

            //Дата закрытия
            $execDate = $app['request']->get('execDate');
            if($execDate){
                $timestamp = $execDate/1000;
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
            }else{
                $date = new \DateTime('NOW');
            }

            $resultId = $request->query->get('resultId');

            $update_sql = "UPDATE Event SET Event.execDate = :execDate, Event.result_id = :resultId WHERE Event.id = :id";

            $stmt = $app['db']->prepare($update_sql);
            $stmt->bindValue('execDate', $date, "datetime");
            $stmt->bindValue('resultId',$resultId, "integer");
            $stmt->bindValue('id', $appealId, "integer");
            $stmt->execute();

            $select_sql = "SELECT * FROM Event WHERE id = ?";
            $event = $app['db']->fetchAssoc($select_sql, array((int) $appealId));

            return $app['jsonp']->jsonp($event);

        })->assert('appealId', '\d+');


        //вмп талон госпитализации
        $controllers->get('/{appealId}/client_quoting', function($appealId, Request $request) use ($app){

            $select_sql = "SELECT cq.*, pm.name as 'patientModelName',mkb.DiagName,mkb.id as 'mkbId', qt.name AS 'quotaTypeName',t.name AS 'treatmentName' "
            ."FROM Client_Quoting as cq "
            ."JOIN MKB AS mkb ON cq.MKB = mkb.DiagID "
            ."JOIN rbPacientModel AS pm on cq.pacientModel_id = pm.id "
            ."JOIN QuotaType AS qt on cq.quotaType_id = qt.id "
            ."JOIN rbTreatment AS t ON cq.treatment_id = t.id "
            ." WHERE cq.event_id = ? ";

            $vmpTalon = $app['db']->fetchAssoc($select_sql, array((int) $appealId));

            if(!$vmpTalon){
                $vmpTalon = array();
            }

            return $app['jsonp']->jsonp(array("data" => $vmpTalon));

        })->assert('appealId', '\d+');

        //предыдущий вмп талон госпитализации
        $controllers->get('/{appealId}/client_quoting/prev', function($appealId, Request $request) use ($app){

            $select_sql = "SELECT * "
            ."FROM Event as e "
            ."WHERE e.id = ? "
            ."AND e.eventType_id IN (2,13,53,67,68,69,100,102,103,104) "
            ."ORDER BY e.createDatetime DESC "
            ."LIMIT 1 ";

            $event = $app['db']->fetchAssoc($select_sql, array((int) $appealId));
            $clientId = $event["client_id"];


            $select_sql2 = "SELECT cq.*, pm.name as 'patientModelName',mkb.id AS 'mkbId',mkb.DiagName, qt.name AS 'quotaTypeName',t.name AS 'treatmentName' "
            ."FROM Client_Quoting as cq "
            ."JOIN MKB AS mkb ON cq.MKB = mkb.DiagID "
            ."JOIN rbPacientModel AS pm on cq.pacientModel_id = pm.id "
            ."JOIN QuotaType AS qt on cq.quotaType_id = qt.id "
            ."JOIN rbTreatment AS t ON cq.treatment_id = t.id "
            ."WHERE cq.master_id = ? "
            ."AND cq.event_id != ? "
            ."ORDER BY cq.createDatetime DESC "
            ."LIMIT 1";

            $previousVmpTalon = $app['db']->fetchAssoc($select_sql2, array((int) $clientId,(int) $appealId));
            if(!$previousVmpTalon){
                $previousVmpTalon = array();
            }

            return $app['jsonp']->jsonp(array("data" => $previousVmpTalon));

        })->assert('appealId', '\d+');

        //создание вмп талона госпитализации
        $controllers->post('/{appealId}/client_quoting', function($appealId, Request $request) use ($app){

            $userId = $request->cookies->get('userId');
            $date = new \DateTime('NOW');
            $now = $date->format('Y-m-d H:i:s');


            $select_event_sql = "SELECT * FROM Event WHERE id = ?";
            $event = $app['db']->fetchAssoc($select_event_sql, array((int) $appealId));
            $post = json_decode($request->getContent());

            $data = array(
                "createDatetime" => $now,
                "createPerson_id" => $userId,
                "modifyDatetime" => $now,
                "modifyPerson_id" => $userId,
                "master_id"=>$event['client_id'],
                "identifier"=>$event['externalId'],
                "quotaType_id" => $post->data->quotaType_id,
                "MKB" => $post->data->MKB,
                "pacientModel_id" => $post->data->pacientModel_id,
                "treatment_id" => $post->data->treatment_id,
                "event_id" => $appealId
                );

            $app['db']->insert('Client_Quoting', $data);



            return $app['jsonp']->jsonp(array("data" => $data));

        })->assert('appealId', '\d+');

        //обновление вмп талона госпитализации
        $controllers->put('/{appealId}/client_quoting/{quotingId}', function($appealId, $quotingId, Request $request) use ($app){

            $userId = $request->cookies->get('userId');
            $date = new \DateTime('NOW');
            $now = $date->format('Y-m-d H:i:s');

            $put = json_decode($request->getContent());


            $data = array(
                "modifyDatetime" => $now,
                "modifyPerson_id" => $userId,
                "quotaType_id" => $put->data->quotaType_id,
                "MKB" => $put->data->MKB,
                "pacientModel_id" => $put->data->pacientModel_id,
                "treatment_id" => $put->data->treatment_id
                );

             $app['db']->update('Client_Quoting', $data, array('id' => (int) $quotingId));


            return $app['jsonp']->jsonp(array("data" => $data));

        })->assert('appealId', '\d+')->assert('quotingId', '\d+');



        return $controllers;
    }
}