<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;



$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request = new ParameterBag(is_array($data) ? $data : array());
    }
});

$apiRouts = $app['controllers_factory'];

//проверить необходимые документы перед закрытием
$apiRouts->get('/appeals/{appealId}/docs4closing', function($appealId, Request $request)  use ($app) {


    $json = [];
    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

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
        ."WHERE Event.id = ? ";

        $vmpTicket = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

        $json['vmpTicket'] = $vmpTicket;
        $json['allDocs'] = $vmpTicket;

    }


    //есть ли эпикриз?
    $select_sql = "SELECT ActionType.id FROM Action "
    ."JOIN ActionType ON Action.actionType_id = ActionType.id "
    ."WHERE Action.event_id = ? "
    ."AND (ActionType.code = 4504 OR ActionType.code = 4507 OR ActionType.code = 4511) "
    ."AND ActionType.mnem = 'EPI' ";

    $epicrisis = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

    $json['epicrisis'] = $epicrisis;
    $json['allDocs'] = $json['allDocs'] && $json['epicrisis'];


    //есть ли выписка
    $select_sql = "SELECT Action.id FROM Action "
    ."JOIN ActionType ON Action.actionType_id = ActionType.id "
    ."WHERE Action.event_id = ? "
    ."AND ActionType.flatCode = 'leaved' "
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
    ." AND Action.endDate IS NULL";

    $openDocs = (bool) $app['db']->fetchAssoc($select_sql, array((int) $appealId));

    $json['openDocs'] = $openDocs;


    return $app->json(array('data' => $json))->setCallback($callback);

})->assert('appealId', '\d+');





//закрыть незакрытые документы для госпитализации
$apiRouts->get('/appeals/{appealId}/docs/close', function($appealId, Request $request)  use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

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

    return $app->json(array('count'=>$count))->setCallback($callback);

})->assert('appealId', '\d+');




//освободить койку
$apiRouts->get('/appeals/{appealId}/bed/vacate', function($appealId, Request $request) use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

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

    // $select_sql_2 = "SELECT * FROM Action "
    // ."WHERE Action.event_id = ?"
    // ."ORDER BY Action.directionDate DESC LIMIT 1";

    // $updatedLastMove = $app['db']->fetchAssoc($select_sql_2, array((int) $appealId));

    return $app->json($count)->setCallback($callback);

})->assert('appealId', '\d+');




//закрыть госпитализацию
$apiRouts->get('/appeals/{appealId}/close', function($appealId, Request $request) use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

    //Дата закрытия
    $execDate = $app['request']->get('execDate');
    if($execDate){
        $timestamp = $execDate/1000;
        $date = new \DateTime();
        $date->setTimestamp($timestamp);
    }else{
        $date = new \DateTime('NOW');
    }

    $update_sql = "UPDATE Event SET Event.execDate = :execDate WHERE Event.id = :id";

    $stmt = $app['db']->prepare($update_sql);
    $stmt->bindValue('execDate', $date, "datetime");
    $stmt->bindValue('id', $appealId, "integer");
    $stmt->execute();

    $select_sql = "SELECT * FROM Event WHERE id = ?";
    $event = $app['db']->fetchAssoc($select_sql, array((int) $appealId));

    return $app->json($event)->setCallback($callback);

})->assert('appealId', '\d+');


//вмп талон госпитализации
$apiRouts->get('/appeals/{appealId}/client_quoting', function($appealId, Request $request) use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';


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

    return $app->json(array("data" => $vmpTalon))->setCallback($callback);

})->assert('appealId', '\d+');

//предыдущий вмп талон госпитализации
$apiRouts->get('/appeals/{appealId}/client_quoting/prev', function($appealId, Request $request) use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';


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

    return $app->json(array("data" => $previousVmpTalon))->setCallback($callback);

})->assert('appealId', '\d+');

//создание вмп талона госпитализации
$apiRouts->post('/appeals/{appealId}/client_quoting', function($appealId, Request $request) use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

    $userId = $request->cookies->get('userId');
    $now = (new \DateTime('NOW'))->format('Y-m-d H:i:s');


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



    return $app->json(array("data" => $data))->setCallback($callback);

})->assert('appealId', '\d+');

//обновление вмп талона госпитализации
$apiRouts->put('/appeals/{appealId}/client_quoting/{quotingId}', function($appealId, $quotingId, Request $request) use ($app){
    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

    $userId = $request->cookies->get('userId');
    $now = (new \DateTime('NOW'))->format('Y-m-d H:i:s');

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


    return $app->json(array("data" => $data))->setCallback($callback);

})->assert('appealId', '\d+')->assert('quotingId', '\d+');


//справочник rbPacientModel
$apiRouts->get('/dir/pacient_model', function(Request $request)  use ($app){//?dictName=pacientModel

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';
    $quotaTypeId = $request->query->get('quotaTypeId');

    // quotaTypeId

    $select_sql = "SELECT pm.id,pm.name FROM rbPacientModel AS pm";

    $select_sql_with_quotaTypeId = "SELECT DISTINCT pm.* FROM MKB_QuotaType_PacientModel as mmm "
    ."JOIN rbPacientModel AS pm ON mmm.pacientModel_id = pm.id "
    ."WHERE mmm.quotaType_id = :quotaTypeId";

    if($quotaTypeId){
        $statement = $app['db']->prepare($select_sql_with_quotaTypeId);
        $statement->bindValue('quotaTypeId', $quotaTypeId);
    }else{
        $statement = $app['db']->prepare($select_sql);
    }


    $statement->execute();
    $pacientModel = $statement->fetchAll();


    return $app->json(array('data'=>$pacientModel))->setCallback($callback);

});


//справочник rbTreatment
$apiRouts->get('/dir/treatment', function(Request $request)  use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

    $select_sql = "SELECT rbTreatment.id,rbTreatment.name FROM rbTreatment";

    $statement = $app['db']->prepare($select_sql);
    $statement->execute();
    $treatment = $statement->fetchAll();


    return $app->json(array('data'=>$treatment))->setCallback($callback);

});


//справочник QuotaType
$apiRouts->get('/dir/quotaType', function(Request $request)  use ($app){

    $callback = $request->query->get('callback');
    $callback = $callback ? $callback : 'callback';

    $mkbId = $request->query->get('mkbId');

    $teenOlder = (int) ($request->query->get('teenOlder'));
    $teenOlder = $teenOlder ? $teenOlder : 0;

    $select_sql = "SELECT qt.id, qt.code, qt.name FROM QuotaType AS qt WHERE qt.teenOlder = :teenOlder";

    $select_sql_with_mkb = "SELECT qt.id, qt.code, qt.name FROM MKB_QuotaType_PacientModel AS mmm "
        ."JOIN QuotaType AS qt ON qt.id = mmm.quotaType_id "
        ."WHERE mmm.MKB_id = :mkbId AND qt.teenOlder = :teenOlder";


    if($mkbId){
        $statement = $app['db']->prepare($select_sql_with_mkb);
        $statement->bindValue('mkbId', $mkbId);
    }else{
        $statement = $app['db']->prepare($select_sql);
    }


    $statement->bindValue('teenOlder', $teenOlder);
    $statement->execute();
    $quotaType = $statement->fetchAll();


    return $app->json(array('data'=>$quotaType))->setCallback($callback);

});


$app->mount('/api/v1', $apiRouts);
