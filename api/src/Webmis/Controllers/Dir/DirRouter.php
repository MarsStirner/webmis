<?php

namespace Webmis\Controllers\Dir;

use Silex\Application;
use Silex\ControllerProviderInterface;


class DirRouter implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		function getController($shortName)
		{
			list($shortClass, $shortMethod) = explode('/', $shortName, 2);
			return sprintf('Webmis\Controllers\Dir\%sController::%sAction', $shortClass, $shortMethod);
		}

		$dirRouter = $app['controllers_factory'];

		//справочник QuotaType
		$dirRouter->get('/quotaType', getController('QuotaType/list'));

		//справочник rbResult
		$dirRouter->get('/result', getController('rbResult/list'));

		//справочник rbTreatment
		$dirRouter->get('/treatment', getController('rbTreatment/list'));

		//справочник rbPacientModel
		$dirRouter->get('/pacient_model', getController('rbPacientModel/list'));

		return $dirRouter;
	}
}
