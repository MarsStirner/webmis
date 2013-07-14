<?php
//use Silex\Provider\MonologServiceProvider;
use Webmis\Services\JsonpResponce;

$app['debug'] = true;
$app["log.level"] = 100;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'=> '10.1.2.106',//хост базы данных
        'dbname'=> 's11r64',//имя базы данных
        'user'=> 'root',//пользователь базы данных
        'password'=> 'root',//пароль пользователя базы данных
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


