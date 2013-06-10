<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'=> 'localhost',
        'dbname'=> 's11r64',
        'user'=> 'root',
        'password'=> '1234',
        'charset'=>'utf8'
    ),
));



$app['debug'] = true;

$apiRouts = $app['controllers_factory'];

//проверить необходимые документы перед закрытием
$apiRouts->get('/appeals/{appealId}/docs', function($appealId)  use ($app) {//
    return $app->json(array('wqwq'=>'dsddsdsdsds'));
})->assert('appealId', '\d+');


//закрыть незакрытые документы для госпитализации
$apiRouts->get('/appeals/{appealId}/docs/close', function($appealId)  use ($app){

    $sql = "SELECT * FROM Person WHERE id = ?";
    $person = $app['db']->fetchAssoc($sql, array((int) $appealId));

    return $app->json($person);

})->assert('appealId', '\d+');

//освободить койку
$apiRouts->get('/appeals/{appealId}/bed/vacate', function($appealId) {//

    return phpinfo();//'/api/v1/appeals/{appealId}/bed/vacate '.$appealId;
})->assert('appealId', '\d+');

//закрыть госпитализацию
$apiRouts->get('/appeals/{appealId}/close', function($appealId) use ($app){

    $sql = "UPDATE Event SET Event.execDate = ? WHERE Event.id = ?";
    $date = new \DateTime('2013-06-11 10:10:10');
    $stmt = $app['db']->prepare($sql);
    $stmt->bindValue(1, $date, "datetime");
    $stmt->bindValue(2, $appealId, "integer");
    $stmt->execute();
    //$count = $app['db']->executeUpdate($sql, array(new \DateTime('2013-06-11 10:10:10'),(int) $appealId));
    //$sql = "UPDATE Person SET Person.firstName = ? WHERE Person.id = ?";
    //$count = $app['db']->executeUpdate($sql, array('blablabla',(int) $appealId));

    return '/api/v1/appeals/{appealId}/close '.$appealId;
})->assert('appealId', '\d+');


$app->mount('/api/v1', $apiRouts);

$app->run();



