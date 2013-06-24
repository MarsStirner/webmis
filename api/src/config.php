<?php
use Silex\Provider\MonologServiceProvider;


$app['debug'] = true;
$app["log.level"] = 100;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'=> '10.1.2.149',//хост базы данных
        'dbname'=> 's11r64',//имя базы данных
        'user'=> 'root',//пользователь базы данных
        'password'=> 'root',//пароль пользователя базы данных
        'charset'=>'utf8'
    ),
));


// $app->register(new MonologServiceProvider(), array(
//         "monolog.logfile" => __DIR__."/".date("Y-m-d").".log",
//         "monolog.level" => $app["log.level"],
//         "monolog.name" => "application"
// ));


// if ( $app['debug'] ) {
//     $logger = new Doctrine\DBAL\Logging\DebugStack();

//     $app['db.config']->setSQLLogger($logger);
//     $app->after(function() use ($app, $logger) {

//         foreach ( $logger->queries as $query ) {
//             $app['monolog']->debug($query['sql'], array(
//                 'params' => $query['params'],
//                 'types' => $query['types']
//             ));
//         }
//     });
// }
