<?php
namespace Webmis\Controllers\Therapy;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Webmis\Models\ActionQuery;
use Webmis\Models\EventQuery;

class TherapyController
{


    public function forPatientAction(Request $request, Application $app)
    {
            $route_params = $request->get('_route_params') ;
            // $eventId = $route_params['eventId'];

            // $event = EventQuery::create()->findOneById($eventId);

            // if(!$event){
            //     $error = array('message' => 'Не найдена история болезни с идентификатором '.$eventId);
            //     return $app['jsonp']->jsonp($error);
            // }

            //$clientId = $event->getClientId();
            $patientId = $route_params['patientId'];

            if(!$patientId){
                $error = array('message' => 'Нет кода пациента.');
                return $app['jsonp']->jsonp($error);
            }

            $actions = ActionQuery::create()
            ->useEventQuery()
                ->filterByClientId($patientId)
                //->where('Event.id != ?', $eventId)
                ->where('Event.deleted != 1')
            ->endUse()
            ->getProperties()
            ->onlyWithTherapyProperties()

            ->groupBy('id')
            ->orderByCreateDatetime('desc')
            //->limit(1)
            ->find();

            $data = $this->serializeEventTherapy($actions);//serializeTherapyActions($actions);

            return $app['jsonp']->jsonp(array('data'=>$data));
    }


        private function serializeEventTherapy($actions){
            $data = array();


            foreach ($actions as $action){
                $a = array();
                $a['docId'] = $action->getId();
                $a['eventId'] = $action->getEventId();
                $a['createDate'] = strtotime($action->getCreateDatetime())*1000;//$action->getCreateDatetime();

                $actionProperties = $action->getActionPropertys();
                foreach ($actionProperties as $actionProperty){
                    $actionPropertyType = $actionProperty->getActionPropertyType();
                    $typeName = $actionPropertyType -> getTypeName();

                    $p = array();
                    $p['name'] = $actionPropertyType -> getName();
                    $p['code'] = $actionPropertyType -> getCode();


                    switch ($typeName) {
                        case 'String':
                        case 'Html':
                        case 'Text':
                        case 'Constructor':
                            $p['value'] = $actionProperty->getActionPropertyString()->getValue();
                        break;
                        case 'Double':
                            $p['value'] = $actionProperty->getActionPropertyDouble()->getValue();
                        break;
                        case 'FlatDirectory':
                            $p['value'] = $actionProperty->getActionPropertyFDRecord()->getValue();
                        break;
                        case 'Date':
                            $date = $actionProperty->getActionPropertyDate()->getValue();
                            $dateArray = split('-', $date);
                            $year = $dateArray[0];
                            if($year < 1000){
                                $p['value'] = null;
                            }else{
                                $p['value'] = strtotime($date)*1000;
                            }

                        break;
                        default:
                            $p['value'] = 'этот тип экшен проперти пока не поддерживается';
                        break;
                    }

                    if($p['code'] == 'therapyTitle'){
                        $a['therapyTitleId'] = $p['value'];
                    }
                    if($p['code'] == 'therapyBegDate'){
                        $a['therapyBegDate'] = $p['value'];
                    }

                    if($p['code'] == 'therapyEndDate'){
                        $a['therapyEndDate'] = $p['value'];
                    }

                    if($p['code'] == 'therapyPhaseTitle'){
                        $a['therapyPhaseTitle'] = $p['value'];
                    }

                    if($p['code'] == 'therapyPhaseBegDate'){
                        $a['therapyPhaseBegDate'] = $p['value'];
                    }

                    if($p['code'] == 'therapyPhaseEndDate'){
                        $a['therapyPhaseEndDate'] = $p['value'];
                    }
                    if($p['code'] == 'therapyPhaseDay'){
                        $a['therapyPhaseDay'] = $p['value'];
                    }

                }

                array_push($data, $a);

            }

            $therapies = array();

            //терапии
            foreach ($data as $action){
                $therapy = array(

                    'titleId' => $action['therapyTitleId'],
                    'title' => $action['therapyTitleId'],
                    'beginDate' => $action['therapyBegDate'],
                    'endDate' => $action['therapyEndDate'],
                    'phases' => array());


                if(@$therapies[$action['therapyBegDate']]){
                    if(!@$therapies[$action['therapyBegDate']]['endDate']){//если нет даты окончания
                        $therapies[$action['therapyBegDate']]['endDate'] = $action['therapyEndDate'];
                    }
                }else{
                    $therapies[$action['therapyBegDate']] = $therapy;
                }
            }
            //фазы терапий
            foreach($therapies as $key => $therapy){
                foreach ($data as $action){
                    if($therapy['beginDate'] == $action['therapyBegDate']){

                        $phase = array(
                            'eventId' => $action['eventId'],
                            'title' => $action['therapyPhaseTitle'],
                            'beginDate' => $action['therapyPhaseBegDate'],
                            'endDate' => $action['therapyPhaseEndDate'],
                            'days' => array()
                        );

                        if(@$therapies[$key]['phases'][$action['therapyPhaseBegDate']]){
                            if(!@$therapies[$key]['phases'][$action['therapyPhaseBegDate']]['endDate']){
                                $therapies[$key]['phases'][$action['therapyPhaseBegDate']]['endDate'] = $action['therapyPhaseEndDate'];
                            }

                        }else{
                            $therapies[$key]['phases'][$action['therapyPhaseBegDate']] = $phase;
                        }

                    }
                }
            }

            //дни
            foreach ($data as $action){
                $therapies[$action['therapyBegDate']]['phases'][$action['therapyPhaseBegDate']]['days'][] = array(
                    'day'=> $action['therapyPhaseDay'],
                    'createDate' => $action['createDate'],
                    'eventId' => $action['eventId'],
                    'docId' => $action['docId']);

            }

            //убирание ключей
            foreach ($therapies as $key => $therapy){
                $therapies[$key]['phases'] = array_values($therapies[$key]['phases']);
            }

            $therapies = array_values($therapies);



            return $therapies;
        }



}
