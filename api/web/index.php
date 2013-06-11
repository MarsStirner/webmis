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
$apiRouts->get('/appeals/{appealId}/docs', function($appealId)  use ($app) {

    //тип финансирования
    $select_sql = "SELECT f.code,f.name FROM Event as e "
    ."JOIN EventType as et ON e.eventType_id = et.id "
    ."JOIN rbFinance as f ON et.finance_id = f.id "
    ."WHERE e.id = ? LIMIT 1";

    $financeType = $app['db']->fetchAssoc($select_sql, array((int) $appealId));
    $financeTypeName = $financeType['name'];

    //Если тип финансирования ВМП, то проверяем есть ли тикет для ВМП?
    $vmpTicket = '';
    $select_sql = "SELECT Client_Quoting.* FROM Client_Quoting "
    ."JOIN Event ON Event.externalId = Client_Quoting.Identifier "
    ."WHERE Event.id = 173803 ";
    if($financeTypeName == 'ВМП'){
        $vmpTicket = $app['db']->fetchAssoc($select_sql, array((int) $appealId));
    }


    //есть ли эпикриз?
    $select_sql = "SELECT ActionType.* FROM Action "
    ."JOIN ActionType ON Action.actionType_id = ActionType.id "
    ."WHERE Action.event_id = 58618 "
    ."AND (ActionType.code = 4504 OR ActionType.code = 4507 OR ActionType.code = 4511) "
    ."AND ActionType.mnem = 'EPI' ";

    $epicrisis = $app['db']->fetchAssoc($select_sql, array((int) $appealId));


    //есть ли выписка
    $select_sql = "SELECT * FROM Action "
    ."JOIN ActionType ON Action.actionType_id = ActionType.id "
    ."WHERE Action.event_id = ? "
    ."AND ActionType.flatCode = 'leaved' "
    ."AND ActionType.mnem = 'ORD' ";

    $discharge = $app['db']->fetchAssoc($select_sql, array((int) $appealId));


    //проверка на онко диагноз
    $select_sql = "SELECT COUNT(*) "//MKB.DiagId "
    ."FROM Diagnostic "
    ."JOIN Diagnosis ON Diagnosis.id = Diagnostic.diagnosis_id "
    ."JOIN MKB ON Diagnosis.MKB = MKB.DiagID "
    ."WHERE Diagnostic.event_id = ? "
    ."AND MKB.DiagId LIKE 'C%' ";

    $results = $app['db']->fetchAssoc($select_sql, array((int) $appealId));

    if($results > 0){
        $oncology = true;
    }else{
        $oncology = false;
    }

    //Данные для онко диагнозов
    $select_sql = "";



    return $app->json(array('financeTypeName'=>$financeTypeName,
        'vmpTicket' => $vmpTicket,
        'discharge' => $discharge,
        'epicrisis' => $epicrisis,
        'oncology' => $oncology
        ));

})->assert('appealId', '\d+');





//закрыть незакрытые документы для госпитализации
$apiRouts->get('/appeals/{appealId}/docs/close', function($appealId)  use ($app){

    $sql = "SELECT * FROM Person WHERE id = ?";
    $person = $app['db']->fetchAssoc($sql, array((int) $appealId));

    return $app->json($person);

})->assert('appealId', '\d+');




//освободить койку
$apiRouts->get('/appeals/{appealId}/bed/vacate', function($appealId) use ($app){

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
    $stmt->execute();

    $select_sql_2 = "SELECT * FROM Action "
    ."WHERE Action.event_id = ?"
    ."ORDER BY Action.directionDate DESC LIMIT 1";

    $updatedLastMove = $app['db']->fetchAssoc($select_sql_2, array((int) $appealId));

    return $app->json($updatedLastMove);

})->assert('appealId', '\d+');




//закрыть госпитализацию
$apiRouts->get('/appeals/{appealId}/close', function($appealId) use ($app){

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

    return $app->json($event);

})->assert('appealId', '\d+');





$app->mount('/api/v1', $apiRouts);

$app->run();



