<?php
namespace Webmis\Controllers\Therapy;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
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
            //->_if($eventId)
            ->filterByEventId($eventId)
            //->_endif()
            ->orderByCreateDatetime('desc')
            ->limit(1)
            ->find();

            $data = $this->serializeTherapyActions($actions);

            return $app['jsonp']->jsonp(array('data'=>$data));
    }





    public function restAction(Request $request, Application $app)
    {
            $route_params = $request->get('_route_params') ;
            $patientId = $route_params['patientId'];

            $actions = ActionQuery::create()
            ->onlyTherapy()
            ->getProperties()
            ->filterByPatientId($patientId)
            ->orderByCreateDatetime('desc')
            ->offset(1)
            ->find();

            $data = $this->serializeTherapyActions($actions);

            return $app['jsonp']->jsonp(array('data'=>$data));
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
