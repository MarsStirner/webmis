<?php

namespace Webmis\Models;

use Webmis\Models\om\BaseAction;
use Webmis\Models\RbMethodOfAdministrationQuery;



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
            $data['id'] = $property->getId();
            $type = $property->getActionPropertyType();
            $value = null;
            $valueId = null;

            if($type){

                $data['name'] = $type->getName();
                $data['type'] = $type->getTypeName();
                $data['code'] = $type->getCode();
                $valueDomain = $type->getValueDomain();
                if($valueDomain){
                    $data['valueDomain'] = $valueDomain;
                }

                switch ($data['type']) {
                        case 'String':
                        case 'Html':
                        case 'Text':

                        //case 'Constructor':
                            if($property->getActionPropertyString()){
                                $value =  $property->getActionPropertyString()->getValue();
                            }
                        break;
                        case 'ReferenceRb':
                            if($property->getActionPropertyInteger()){
                                $valueId =  $property->getActionPropertyInteger()->getValue();
                                // $tableName = explode(';', $valueDomain);
                                // $queryClassName = ucfirst(trim($tableName[0]).'Query');
                                        //RbMethodOfAdministrationQuery
                                $query = RbMethodOfAdministrationQuery::create()->findOneById($valueId);


                                $value = $query->getName();
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

            }

            $data['value'] = $value;
            if($valueId){
                $data['valueId'] = $valueId;
            }

            return $data;
    }

    public function serializeIntervals($intervals){

        if($intervals){
            $executionIntervals = array();
            $assigmentIntervals = array();

            foreach ($intervals as $interval) {
                $i = array();
                $i['id'] = $interval->getId();
                $i['masterId'] = $interval->getMasterId();

                $beginDateTimestamp = $interval->getBegDateTime('U');
                if($beginDateTimestamp){
                    $i['beginDateTime'] = $beginDateTimestamp*1000;
                }else{
                    $i['beginDateTime'] = null;
                }
                $i['bdt'] = $interval->getBegDateTime();

                $endDateTimestamp = $interval->getEndDateTime('U');
                if($endDateTimestamp){
                    $i['endDateTime'] = $endDateTimestamp*1000;
                }else{
                    $i['endDateTime'] = null;
                }
                $i['edt'] = $interval->getEndDateTime();

                $i['status'] = $interval->getStatus();
                $i['note'] = $interval->getNote();


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

            return array_values($assigmentIntervals);

        }

    }

    public function serializePrescription($hidrate = array(
            'actionType' => true,
            'properties' => true,
            'doctor' => false,
            'drugs' => false,
            'intervals' => true,
            'client' => false
            )){

        $data = array();

        $data['id'] = $this->getId();

        if($hidrate['actionType']){
            $actionType = $this->getActionType();
            $data['actionTypeId'] = $actionType->getId();
            $data['name'] = $actionType->getName();
        }


        if($hidrate['properties']){
            $data['properties'] = array();
            $properties = $this->getActionPropertys();

            if($properties){
                foreach ($properties  as $property) {
                    $data['properties'][] = $this->serializeProperty($property);
                }
            }
        }


        $data['eventId'] = $this->getEventId();
        $data['note'] = $this->getNote();

        if($hidrate['doctor'] || $hidrate['client']){
            $event = $this->getEvent();

            if($event && $hidrate['doctor']){
                //лечащий врач
                $doctor = $event->getDoctor();
                $data['doctor'] = null;
                if($doctor){
                    $data['doctor'] = array(
                        'id' => $doctor->getId(),
                        'firstName' => $doctor->getFirstName(),
                        'middleName' => $doctor->getPatrName(),
                        'lastName' => $doctor->getLastName()
                    );
                }
            }

            if($event && $hidrate['client']){
                //пациен
                $client = $event->getClient();
                $data['client'] = null;
                if($client){
                    $data['client'] = array(
                        'id' => $client->getId(),
                        'firstName' => $client->getFirstName(),
                        'middleName' => $client->getPatrName(),
                        'lastName' => $client->getLastName()
                    );
                }
            }

        }


        if($hidrate['drugs']){
            $data['drugs'] = array();

            $drugs = $this->getDrugComponents();

            if($drugs){
                foreach ($drugs as $drug) {
                    $d = array(
                        'id' => $drug->getId(),
                        'name' => $drug->getName(),
                        'dose' => $drug->getDose(),
                        //'unitId' => $drug->getUnit(),
                        'unit' => ''
                        );

                    $rlsNomen = $drug->getRlsNomen();
                    $rbUnit = $rlsNomen->getrbUnitRelatedByunitId();
                    if($rbUnit){
                        $d['unit'] = $rbUnit->getName();
                    }

                    $data['drugs'][] = $d;

                }
            }

        }

        if($hidrate['intervals']){
            $data['assigmentIntervals'] = array();

            $intervals = $this->getDrugCharts();

            if($intervals){
                $data['assigmentIntervals'] = $this->serializeIntervals($intervals);
            }
        }



        ksort($data);

        return $data;
    }
}
