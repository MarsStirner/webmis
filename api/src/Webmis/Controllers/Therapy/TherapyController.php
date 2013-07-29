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

            $actions = ActionQuery::create()
            ->_if($eventId)
                ->filterByEventId($eventId)
            ->_endif()
            ->useActionTypeQuery()
                ->filterByFlatCode('therapy')
            ->endUse()
            ->useActionPropertyQuery('ActionProperty', 'left join')
                ->useActionPropertyTypeQuery('apt', 'join')
                ->endUse()
                ->useActionPropertyStringQuery('string', 'left join')
                ->endUse()
                ->useActionPropertyDateQuery('date', 'left join')
                ->endUse()
            ->endUse()
            // ->with('ActionType')
            // ->with('ActionProperty')
            // ->with('apt')
            // ->with('string')
            // ->with('date')
            ->orderByCreateDatetime()
            ->groupBy('id')
            ->limit(5)
            ->find();
            //->toArray();

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

            return $app['jsonp']->jsonp(array('data'=>$data));
    }

    public function lastAction(Request $request, Application $app)
    {
            $route_params = $request->get('_route_params') ;
            $eventId = $route_params['eventId'];

            $actions = ActionQuery::create()
            ->useActionTypeQuery()
                ->filterByFlatCode('therapy')
            ->endUse()
            ->useActionPropertyQuery('ActionProperty', 'left join')
                ->useActionPropertyTypeQuery('apt', 'join')
                ->endUse()
                ->useActionPropertyStringQuery('string', 'left join')
                ->endUse()
                ->useActionPropertyDateQuery('date', 'left join')
                ->endUse()
            ->endUse()
            ->groupBy('id')

            ->_if($eventId)
                ->filterByEventId($eventId)
            ->_endif()
            ->orderByCreateDatetime('desc')
            ->limit(1)
            ->find();

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
                    //$p['actionProperty.id'] = $actionProperty->getId();
                    $p['name'] = $actionPropertyType -> getName();
                    $name = $actionPropertyType -> getName();
                    // $p['mandatory'] = $actionPropertyType -> getMandatory();
                    // $p['readonly'] = $actionPropertyType -> getReadOnly();
                    $typeName = $actionPropertyType -> getTypeName();

                    switch ($typeName) {
                        case 'String':
                        case 'Text':
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





            return $app['jsonp']->jsonp(array('data'=>$data));
    }





    public function restAction(Request $request, Application $app)
    {
            $route_params = $request->get('_route_params') ;
            $patientId = $route_params['patientId'];

            $actions = ActionQuery::create()
            ->useActionTypeQuery()
                ->filterByFlatCode('therapy')
            ->endUse()
            ->useActionPropertyQuery('ActionProperty', 'left join')
                ->useActionPropertyTypeQuery('apt', 'join')
                ->endUse()
                ->useActionPropertyStringQuery('string', 'left join')
                ->endUse()
                ->useActionPropertyDateQuery('date', 'left join')
                ->endUse()
            ->endUse()
            ->groupBy('id')

            ->_if($patientId)
                ->useEventQuery()
                    ->filterByClientId($patientId)
                ->endUse()
            ->_endif()
            ->orderByCreateDatetime('desc')
            ->offset(1)
            ->find();

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
                    //$p['actionProperty.id'] = $actionProperty->getId();
                    $p['name'] = $actionPropertyType -> getName();
                    $name = $actionPropertyType -> getName();
                    // $p['mandatory'] = $actionPropertyType -> getMandatory();
                    // $p['readonly'] = $actionPropertyType -> getReadOnly();
                    $typeName = $actionPropertyType -> getTypeName();

                    switch ($typeName) {
                        case 'String':
                        case 'Text':
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

            return $app['jsonp']->jsonp(array('data'=>$data));
    }
}
