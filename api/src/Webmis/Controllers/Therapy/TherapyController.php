<?php
namespace Webmis\Controllers\Therapy;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
//use Webmis\Models\QuotaTypeQuery;
use Webmis\Models\ActionQuery;

class TherapyController
{
    public function listAction(Request $request, Application $app)
    {
            $eventId = (int) $request->query->get('eventId');

            $event = ActionQuery::create()
                ->_if($eventId)
                    ->filterByEventId($eventId)
                ->_endif()
                ->useActionTypeQuery()
                    ->filterByFlatCode('therapy')
                ->endUse()
            // ->select(array('id', 'code','name'))
            // ->with('ActionProperty')
            ->find()
            ->toArray();

            return $app['jsonp']->jsonp(array('data'=>$event));
    }
}
