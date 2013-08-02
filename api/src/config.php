<?php

use Webmis\Services\JsonpResponce;



$app['debug'] = true;
$app["log.level"] = 100;

require __DIR__.'/db-config.php';
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'=> $db_host,
        'dbname'=> $db_name,
        'user'=> $db_user,
        'password'=> $db_password,
        'charset'=>'utf8'
    ),
));

$app['jsonp'] = function ($app) {
    return new JsonpResponce($app);
};


$app['propel.path'] = __DIR__.'../vendor/propel/propel1/runtime/lib/Propel.php';
$app['propel.config_file'] = __DIR__.'/propel-conf.php';
$app['propel.model_path'] = __DIR__.'/Webmis/Models';
$app->register(new Propel\Silex\PropelServiceProvider());


