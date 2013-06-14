<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'=> '10.1.2.106',
        'dbname'=> 's11r64',
        'user'=> 'root',
        'password'=> 'root',
        'charset'=>'utf8'
    ),
));



$app['debug'] = true;

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





$app->mount('/api/v1', $apiRouts);

$app->run();



