<?php
namespace Webmis\Controllers\Test;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TSocketPool;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
// use ThriftPrescriptionService\PrescriptionExchangeClient;
            define('__SRC__', dirname(dirname(dirname(dirname(__FILE__)))));
            require_once __SRC__.'/ThriftPackages/ThriftPrescriptionService/Types.php';
            require_once __SRC__.'/ThriftPackages/ThriftPrescriptionService/PrescriptionExchange.php';
            use ThriftPrescriptionService\PrescriptionExchangeClient;


class TestController
{


    public function indexAction(Request $request, Application $app)
    {
            $route_params = $request->get('_route_params') ;

            $host = '10.1.2.106';
            $port = 8383;
            $socket = new TSocket($host, $port);
            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $client = new PrescriptionExchangeClient($protocol);
            $transport->open();


            $response = $client->updateBalanceOfGoods(array(8168));



            $data = array('updateBalanceOfGoods' => $response);
            return $app['jsonp']->jsonp($data);

    }





}
