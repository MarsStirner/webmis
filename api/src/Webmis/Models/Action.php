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
	public function serializePrescription(){

        $p = array(
            'assigmentIntervals' => array(),//интервалы назначения
        );

        $actionType = $this->getActionType();
        $p['id'] = $this->getId();
        $p['name'] = $actionType->getName();
        $p['flatCode'] = $actionType->getFlatCode();

        $drugComponents = $this->getDrugComponents();
        if($drugComponents){
            $drugComponent = $drugComponents[0];
            $p['drugName'] = $drugComponent->getName();
            $p['drugDose'] = $drugComponent->getDose();
        }

        $intervals = $this->getDrugCharts();
        if($intervals){
            $executionIntervals = array();
            $assigmentIntervals = array();

            foreach ($intervals as $interval) {
                $i = array();
                $i['drugChartId'] = $interval->getId();
                $i['drugChartMasterId'] = $interval->getMasterId();
                $i['beginDateTime'] = $interval->getBegDateTime('U')*1000;
                $i['bdt'] = $interval->getBegDateTime();
                $i['endDateTime'] = $interval->getEndDateTime('U')*1000;
                $i['edt'] = $interval->getEndDateTime();
                $i['status'] = $interval->getStatus();


                if(!$interval->getMasterId()){
                    $i['executionIntervals'] = array();
                    $assigmentIntervals[$i['drugChartId']] = $i;
                }else{
                    $executionIntervals[] = $i;
                }
            }

            foreach ($executionIntervals as $interval) {
                 $assigmentIntervals[$interval['drugChartMasterId']]['executionIntervals'][] = $interval;
            }

            $p['assigmentIntervals'] = array_values($assigmentIntervals);



        }

		return $p;
	}
}
