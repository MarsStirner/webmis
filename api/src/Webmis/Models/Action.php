<?php

namespace Webmis\Models;

use Webmis\Models\om\BaseAction;


/**
 * Skeleton subclass for representing a row from the 'Action' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Models
 */
class Action extends BaseAction
{
    public function serializeProperty($property){

            $data = array();
            $type = $property->getActionPropertyType();
            $data['id'] = $property->getId();
            $data['name'] = $type->getName();
            $data['type'] = $type->getTypeName();
            $data['code'] = $type->getCode();
            $value = null;

            switch ($data['type']) {
                    case 'String':
                    case 'Html':
                    case 'Text':
                    //case 'Constructor':
                        if($property->getActionPropertyString()){
                            $value =  $property->getActionPropertyString()->getValue();
                        }
                    break;
                    case 'Double':
                        if($property->getActionPropertyDouble()){
                            $value = $property->getActionPropertyDouble()->getValue();
                        }
                    break;
                    // case 'FlatDirectory':
                    //     // $p['value'] = $actionProperty->getActionPropertyFDRecord()->getValue();
                    // break;
                    case 'Date':
                        if($property->getActionPropertyDate()){
                            $date = $property->getActionPropertyDate()->getValue();
                            $dateArray = explode('-', $date);
                            $year = $dateArray[0];
                            if($year > 1000){
                                $value = strtotime($date)*1000;
                            }
                        }

                    break;
                    default:
                        $value = 'этот тип экшен проперти пока не поддерживается';
                    break;
            }

            $data['value'] = $value;

            return $data;
    }

    public function serializePrescription(){

        $data = array(
            'assigmentIntervals' => array(),//интервалы назначения
        );

        $actionType = $this->getActionType();
        $event = $this->getEvent();

        $data['id'] = $this->getId();
        $data['name'] = $actionType->getName();
        $data['eventId'] = $this->getEventId();
        $data['clientId'] = $event->getClientId();
        $data['properties'] = array();

        //$data['flatCode'] = $actionType->getFlatCode();

        $properties = $this->getActionPropertys();

        if($properties){
            foreach ($properties  as $property) {
                $data['properties'][] = $this->serializeProperty($property);
            }
        }



        $data['drugs'] = array();

        $drugs = $this->getDrugComponents();

        if($drugs){
            foreach ($drugs as $drug) {

                $data['drugs'][] = array(
                    'id' => $drug->getId(),
                    'name' => $drug->getName(),
                    'dose' => $drug->getDose()
                    );
            }
        }

        $intervals = $this->getDrugCharts();

        if($intervals){
            $executionIntervals = array();
            $assigmentIntervals = array();

            foreach ($intervals as $interval) {
                $i = array();
                $i['id'] = $interval->getId();
                $i['masterId'] = $interval->getMasterId();
                $i['beginDateTime'] = $interval->getBegDateTime('U')*1000;
                $i['bdt'] = $interval->getBegDateTime();
                $i['endDateTime'] = $interval->getEndDateTime('U')*1000;
                $i['edt'] = $interval->getEndDateTime();
                $i['status'] = $interval->getStatus();


                if(!$interval->getMasterId()){
                    $i['executionIntervals'] = array();
                    $assigmentIntervals[$i['id']] = $i;
                }else{
                    $executionIntervals[] = $i;
                }
            }

            foreach ($executionIntervals as $interval) {
                 $assigmentIntervals[$interval['masterId']]['executionIntervals'][] = $interval;
            }

            $data['assigmentIntervals'] = array_values($assigmentIntervals);

        }

        ksort($data);

        return $data;
    }
}
