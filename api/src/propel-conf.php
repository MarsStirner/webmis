<?php
// This file generated by Propel 1.6.9 convert-conf target
// from XML runtime conf file /home/alex/projects/webmis/api/src/Webmis/runtime-conf.xml
//$test = $app["db_host"];
require __DIR__.'/config.php';
$conf = array (
  'datasources' =>
  array (
    'Webmis-API' =>
    array (
      'adapter' => 'mysql',
      'connection' =>
      array (
        'dsn' => 'mysql:host='.$db_host.';port=3306;dbname='.$db_name,
        'user' => $db_user,
        'password' => $db_password,
        'settings' =>
        array (
          'charset' =>
          array (
            'value' => 'utf8',
          ),
        ),
      ),
    ),
    'default' => 'Webmis-API',
  ),
  'generator_version' => '1.6.9',
);
//$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-Webmis-API-conf.php');
return $conf;