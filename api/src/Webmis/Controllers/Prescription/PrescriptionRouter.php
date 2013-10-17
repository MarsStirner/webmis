<?php

namespace Webmis\Controllers\Prescription;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class PrescriptionRouter implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        function getController($shortName)
        {
            list($shortClass, $shortMethod) = explode('/', $shortName, 2);
            return sprintf('Webmis\Controllers\Prescription\%sController::%sAction', $shortClass, $shortMethod);
        }

        $router = $app['controllers_factory'];

        $router->get('/template/{actionTypeId}', getController('Prescription/template'));
        $router->get('/', getController('Prescription/list'));
        $router->get('/{prescriptionId}', getController('Prescription/read'));
        $router->post('/', getController('Prescription/create'));
        $router->put('/{prescriptionId}', getController('Prescription/update'));


        return $router;
    }
}
