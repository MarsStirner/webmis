<?php

namespace Webmis\Models;

use Webmis\Models\om\BaseActionQuery;
use \Criteria;

/**
 * Skeleton subclass for performing query and update operations on the 'Action' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Models
 */
class ActionQuery extends BaseActionQuery
{
    public function getProperties()
    {
        return $this->useActionPropertyQuery('ActionProperty', 'left join')
                        ->useActionPropertyTypeQuery('apt', 'join')
                            //->orderByIdx()
                        ->endUse()
                        ->useActionPropertyStringQuery('string', 'left join')
                        ->endUse()
                        ->useActionPropertyDoubleQuery('double', 'left join')
                        ->endUse()
                        ->useActionPropertyDateQuery('date', 'left join')
                        ->endUse()
                        ->useActionPropertyFDRecordQuery('fdir', 'left join')
                            // ->useFDFieldValueQuery()
                            // ->endUse()
                        ->endUse()
                    ->endUse();
                    // ->groupBy('id');
    }

    public function filterByPatientId($patientId)
    {
            return $this->_if($patientId)
                            ->useEventQuery()
                                ->filterByClientId($patientId)
                            ->endUse()
                        ->_endif();
    }

    public function onlyTherapy()
    {
        return $this->useActionTypeQuery()
                        ->filterByFlatCode('therapy')
                    ->endUse();
    }


    public function onlyWithTherapyProperties()
    {
        return $this->useActionPropertyQuery()
                        ->useActionPropertyTypeQuery()
                            ->filterByCode(array('therapyTitle'))
                        ->endUse()
                    ->endUse();
    }


        public function getPrescriptions($id = null, $eventId = null, $clientId = null, $departmentId = null, $beginDateTime = null, $endDateTime = null)
    {
            return $this->filterByDeleted(false)
                        ->_if($id)
                            ->filterById($id)
                        ->_endIf()

                        ->useActionTypeQuery()
                            ->filterByFlatCode(array('chemotherapy','prescription','infusion','analgesia'))
                            ->filterByDeleted(false)
                        ->endUse()

                        ->useActionPropertyQuery('ActionProperty', Criteria::LEFT_JOIN)
                            // ->useActionPropertyTypeQuery('ActionPropertyType', Criteria::LEFT_JOIN)
                            // ->endUse()->with('ActionPropertyType')
                                // ->useActionPropertyStringQuery('ActionPropertyString', Criteria::LEFT_JOIN)
                                // ->endUse()
                                // ->with('ActionPropertyString')
                            //->leftJoinActionPropertyString()
                            ->leftJoinActionPropertyDouble()
                        ->endUse()
                        ->with('ActionProperty')


                        ->useEventQuery()
                            //фильтр по истории боле
                            ->_if($eventId)
                                ->filterById($eventId)
                            ->_endif()
                            //фильтр по пациенту
                            ->_if($clientId)
                                ->filterByClientId($clientId)
                            ->_endIf()
                            //фильтр по отделению
                            ->_if($departmentId)
                                ->useActionQuery('movements')
                                    ->filterByDeleted(false)
                                    ->filterByEndDate()
                                    ->useActionTypeQuery('movements_at')
                                        ->filterByFlatCode('moving')
                                    ->endUse()
                                    ->useActionPropertyQuery('movements_ap')
                                        ->useActionPropertyTypeQuery('movements_apt')
                                            ->filterByCode('orgStructStay')
                                        ->endUse()
                                        ->useActionPropertyOrgStructureQuery('movements_aptv')
                                            ->filterByValue($departmentId)
                                        ->endUse()
                                    ->endUse()
                                ->endUse()
                            ->_endIf()
                        ->endUse()->with('Event')

                        ->useDrugChartQuery()
                            // ->_if($beginDateTime)
                            //     ->filterByBegDateTime(array('min' => $beginDateTime))
                            // ->_endif()
                            // ->_if($endDateTime)
                            //     ->filterByEndDateTime(array('min' => $endDateTime))
                            // ->_endif()
                        ->endUse()
                        ->with('DrugChart')

                        ->joinWithDrugComponent();

    }


}
