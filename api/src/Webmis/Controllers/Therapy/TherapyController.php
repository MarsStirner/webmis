<?php
namespace Webmis\Controllers\Therapy;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\ActionQuery;
use Webmis\Models\EventQuery;

class TherapyController
{
    public function listAction(Request $request, Application $app)
    {
            $eventId = (int) $request->query->get('eventId');

            $actions = ActionQuery::create()
            ->_if($eventId)
                ->filterByEventId($eventId)
            ->_endif()
            ->getProperties()
            ->onlyWithTherapyProperties()
            ->orderByCreateDatetime()
            ->groupBy('id')
            ->limit(5)
            ->find();
            //->toArray();

            $data = $this->serializeActions($actions);

            return $app['jsonp']->jsonp(array('data'=>$data));
    }

    public function lastAction(Request $request, Application $app)
    {
            $route_params = $request->get('_route_params') ;
            $eventId = $route_params['eventId'];

            $actions = ActionQuery::create()
            ->getProperties()
            ->onlyWithTherapyProperties()
            ->filterByEventId($eventId)
            ->groupBy('id')
            ->orderByCreateDatetime('desc')
            //->limit(1)
            ->find();

            $data = $this->serializeEventTherapy($actions);//serializeTherapyActions($actions);

            return $app['jsonp']->jsonp(array('data'=>$data));
    }





    public function restAction(Request $request, Application $app)
    {

            $route_params = $request->get('_route_params') ;
            //eventId
            $eventId = $route_params['eventId'];

            $event = EventQuery::create()->findOneById($eventId);

            if(!$event){
                $error = array('message' => 'Не найдена история болезни с идентификатором '.$eventId);
                return $app['jsonp']->jsonp($error);
            }

            $clientId = $event->getClientId();

            if(!$clientId){
                $error = array('message' => 'В история болезни с идентификатором '.$eventId.' нет кода пациента.');
                return $app['jsonp']->jsonp($error);
            }

            $actions = ActionQuery::create()
            ->useEventQuery()
                ->filterByClientId($clientId)
                ->where('Event.id != ?', $eventId)
            ->endUse()
            ->getProperties()
            ->onlyWithTherapyProperties()
            ->groupBy('id')
            ->orderByCreateDatetime('desc')
            ->find();

            $data = $this->serializeEventsTherapies($actions);

            return $app['jsonp']->jsonp(array('data'=>$data));
    }

        private function serializeEventTherapy($actions){
            $data = array();


            foreach ($actions as $action){
                $a = array();
                $a['id'] = $action->getId();
                $a['event'] = $action->getEventId();
                $endDateTherapy = new \DateTime($action->getCreateDatetime());
                $a['endDate'] = ($endDateTherapy->format('U'))*1000;


                $actionProperties = $action->getActionPropertys();
                foreach ($actionProperties as $actionProperty){
                    $actionPropertyType = $actionProperty->getActionPropertyType();
                    $typeName = $actionPropertyType -> getTypeName();

                    $p = array();
                    $p['name'] = $actionPropertyType -> getName();


                    switch ($typeName) {
                        case 'String':
                        case 'Html':
                        case 'Text':
                            $p['value'] = $actionProperty->getActionPropertyString()->getValue();
                        break;
                        case 'Double':
                            $p['value'] = $actionProperty->getActionPropertyDouble()->getValue();
                        break;
                        case 'Date':
                            $date = $actionProperty->getActionPropertyDate()->getValue();
                            $p['value'] = strtotime($date)*1000;
                        break;
                        default:
                            $p['value'] = 'этот тип экшен проперти пока не поддерживается';
                        break;
                    }

                    if($p['name'] == 'Наименование терапии'){
                        $a['title'] = $p['value'];
                    }
                    if($p['name'] == 'Статус терапии'){
                        $a['status'] = $p['value'];
                    }

                    if($p['name'] == 'Дата начала'){
                        $a['begDate'] = $p['value'];
                    }

                    if($p['name'] == 'День терапии'){
                        $a['day'] = $p['value'];
                    }

                }

                array_push($data, $a);

            }

            $events = array();

            foreach ($data as $action){
                $events[$action['event']] = array();
            }
            foreach ($data as $action){
                array_push($events[$action['event']],$action);
            }

            ksort($events, SORT_NUMERIC);

            $therapies = array();

            foreach ($events as $actions) {
                $therapy = array();

                sort($actions);

                foreach($actions as $action){
                    //$therapy['event'] = $action['event'];
                    $therapy['day'] = $action['day'];
                    $therapy['status'] = $action['status'];

                    if($action['status']=='Начата'){
                        $therapy['title'] = $action['title'];
                        //$therapy['begDate'] = $action['begDate'];
                    }

                    // if($action['status']=='Закончена'){
                    //     $therapy['endDate'] = $action['endDate'];
                    // }

                }

                array_push($therapies, $therapy);
            }


            return $therapies;
        }


       private function serializeEventsTherapies($actions)
    {
            $data = array();


            foreach ($actions as $action){
                $a = array();
                $a['id'] = $action->getId();
                $a['event'] = $action->getEventId();
                $endDateTherapy = new \DateTime($action->getCreateDatetime());
                $a['endDate'] = ($endDateTherapy->format('U'))*1000;


                $actionProperties = $action->getActionPropertys();
                foreach ($actionProperties as $actionProperty){
                    $actionPropertyType = $actionProperty->getActionPropertyType();
                    $typeName = $actionPropertyType -> getTypeName();

                    $p = array();
                    $p['name'] = $actionPropertyType -> getName();


                    switch ($typeName) {
                        case 'String':
                        case 'Html':
                        case 'Text':
                            $p['value'] = $actionProperty->getActionPropertyString()->getValue();
                        break;
                        case 'Double':
                            $p['value'] = $actionProperty->getActionPropertyDouble()->getValue();
                        break;
                        case 'Date':
                            $date = $actionProperty->getActionPropertyDate()->getValue();
                            $p['value'] = strtotime($date)*1000;
                        break;
                        default:
                            $p['value'] = 'этот тип экшен проперти пока не поддерживается';
                        break;
                    }

                    if($p['name'] == 'Наименование терапии'){
                        $a['title'] = $p['value'];
                    }
                    if($p['name'] == 'Статус терапии'){
                        $a['status'] = $p['value'];
                    }

                    if($p['name'] == 'Дата начала'){
                        $a['begDate'] = $p['value'];
                    }

                    if($p['name'] == 'День терапии'){
                        $a['day'] = $p['value'];
                    }

                }

                array_push($data, $a);

            }

            $events = array();

            foreach ($data as $action){
                $events[$action['event']] = array();
            }
            foreach ($data as $action){
                array_push($events[$action['event']],$action);
            }

            ksort($events, SORT_NUMERIC);

            $therapies = array();

            foreach ($events as $actions) {
                $therapy = array();

                foreach($actions as $action){
                    $therapy['event'] = $action['event'];
                    if($action['status']=='Начата'){
                        $therapy['title'] = $action['title'];
                        $therapy['begDate'] = $action['begDate'];
                    }

                    if($action['status']=='Закончена'){
                        $therapy['endDate'] = $action['endDate'];
                    }

                }

                array_push($therapies, $therapy);
            }


            return $therapies;
    }


    private function serializeActions($actions)
    {

            $data = array();

            foreach ($actions as $action){
                $a = array();
                $a['id'] = $action->getId();
                $a['name'] = $action->getActionType()->getName();
                $a['status'] = $action->getStatus();
                $createDatetime = $action->getCreateDatetime();
                $a['createDatetime'] = strtotime($createDatetime)*1000;
                //$a['code'] = $action->getActionType()->getCode();
                $a['fields'] = array();
                $actionProperties = $action->getActionPropertys();


                foreach ($actionProperties as $actionProperty){
                    $actionPropertyType = $actionProperty->getActionPropertyType();
                    $p = array();
                    //$p['actionProperty.id'] = $actionProperty->getId();
                    $p['name'] = $actionPropertyType -> getName();
                    $p['mandatory'] = $actionPropertyType -> getMandatory();
                    $p['readonly'] = $actionPropertyType -> getReadOnly();
                    $typeName = $actionPropertyType -> getTypeName();

                    switch ($typeName) {
                        case 'String':
                        case 'Text':
                            $p['value'] = $actionProperty->getActionPropertyString()->getValue();
                        break;
                        case 'Date':
                            $date = $actionProperty->getActionPropertyDate()->getValue();
                            $p['value'] = strtotime($date)*1000;
                        break;
                        default:
                            $p['value'] = 'этот тип пока не поддерживается';
                        break;
                    }

                    $p['type'] = $typeName;

                    $a['fields'][] = $p;
                }
                //$a['fields'] = $action->getActionProperty();

                $data[] = $a;
            }

            return $data;

    }

    private function serializeTherapyActions($actions)
    {
            $data = array();

            foreach ($actions as $action){
                $a = array();
                $a['id'] = $action->getId();
                $a['name'] = $action->getActionType()->getName();
                $createDatetime = $action->getCreateDatetime();
                $a['endDate'] = strtotime($createDatetime)*1000;
                $actionProperties = $action->getActionPropertys();


                foreach ($actionProperties as $actionProperty){
                    $actionPropertyType = $actionProperty->getActionPropertyType();
                    $p = array();
                    $p['name'] = $actionPropertyType -> getName();
                    $name = $actionPropertyType -> getName();
                    $typeName = $actionPropertyType -> getTypeName();

                    switch ($typeName) {
                        case 'String':
                        case 'Text':
                        case 'Html':
                            $string = $actionProperty->getActionPropertyString()->getValue();

                            if($name == 'День терапии'){
                                $a['day'] = $string;
                            }

                            if($name == 'Наименование терапии'){
                                $a['title'] = $string;
                            }

                            if($name == 'Статус терапии'){
                                $a['status'] = $string;
                            }

                        break;
                        case 'Date':
                            $date = $actionProperty->getActionPropertyDate()->getValue();
                            if($name == 'Дата начала'){
                                $a['begDate'] = strtotime($date)*1000;
                            }

                        break;
                        default:
                            $p['value'] = '';//'этот тип пока не поддерживается';
                        break;
                    }

                    $p['type'] = $typeName;

                }

                $data[] = $a;
            }

            return $data;
    }
}
