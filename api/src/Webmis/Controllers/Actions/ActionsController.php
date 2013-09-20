<?php
namespace Webmis\Controllers\Actions;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\ActionQuery;

class ActionsController
{

    public function readAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $appealId = $route_params['appealId'];

        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет' ));
    }

    public function countActionsByTypeAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $appealId = $route_params['appealId'];
        $actyonTypeId = $request->get('actyonTypeId');

        $get_params = $request->query->all();
        $params = array_merge($get_params, $route_params);


        $actionsCount = ActionQuery::create()
            ->filterByEventId($appealId)
            ->filterByActionTypeId($actyonTypeId)
            ->count();

        return $app['jsonp']->jsonp(array('params' => $params,
            'data'=> array('actionsCount' => $actionsCount) ));
    }


}
