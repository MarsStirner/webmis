<?php
namespace Webmis\Controllers\Action;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\ActionQuery;

class ActionController
{

    public function noAction(Request $request, Application $app)
    {
        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет' ));
    }


    // public function countActionsByTypeAction(Request $request, Application $app)
    // {
    //     $route_params = $request->get('_route_params') ;
    //     $appealId = $route_params['appealId'];
    //     $actyonTypeId = $request->get('actyonTypeId');

    //     $get_params = $request->query->all();
    //     $params = array_merge($get_params, $route_params);


    //     $actionsCount = ActionQuery::create()
    //         ->filterByEventId($appealId)
    //         ->filterByActionTypeId($actyonTypeId)
    //         ->count();

    //     return $app['jsonp']->jsonp(array('params' => $params,
    //         'data'=> array('actionsCount' => $actionsCount) ));
    // }


}
