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


        public function getPrescriptions($filter = array())
    {

        $defaultFilterKeys = array( 'id' => null,
                                    'eventId' => null,
                                    'clientId' => null,
                                    'doctorId' => null,
                                    'departmentId' => null,
                                    'dateRangeMin' => null,
                                    'dateRangeMax' => null
                                    );

        $filter = array_merge($defaultFilterKeys, $filter);
        $a = array_intersect_key($filter, array_flip(array_keys($defaultFilterKeys)));

        extract($a);
        //var_dump(array_keys($defaultFilterKeys));

        $hidratedFields = array(
            'properties',
            'event',
            'drugs',
            'intervals',
            'client'
            );


            return $this->filterByDeleted(false)
                        ->_if($id)
                            ->filterById($id)
                        ->_endIf()

                        ->useActionTypeQuery()
                            ->filterByFlatCode(array('chemotherapy','prescription','infusion','analgesia'))
                            ->filterByDeleted(false)
                        ->endUse()

                        ->useActionPropertyQuery('ActionProperty', Criteria::LEFT_JOIN)
                            ->joinActionPropertyType('apType', Criteria::LEFT_JOIN)
                            ->joinActionPropertyString('apString', Criteria::LEFT_JOIN)
                            ->joinActionPropertyDouble('apDouble', Criteria::LEFT_JOIN)
                            ->joinActionPropertyDate('apDate', Criteria::LEFT_JOIN)
                            ->joinActionPropertyInteger('apInteger', Criteria::LEFT_JOIN)
                        ->endUse()
                        ->with('ActionProperty')
                        ->with('apType')
                        ->with('apString')
                        ->with('apDouble')
                        ->with('apDate')
                        ->with('apInteger')



                        ->useEventQuery()
                            //фильтр по истории боле
                            ->_if($eventId)
                                ->filterById($eventId)
                            ->_endif()
                            //фильтр по пациенту
                            ->_if($clientId)
                                ->filterByClientId($clientId)
                            ->_endIf()
                            ->leftJoinClient('client')

                            //фильтр по доктору
                            ->_if($doctorId)
                                ->filterByExecPersonId($doctorId)
                            ->_endIf()
                            ->leftJoinDoctor('doctor')
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
                        ->endUse()
                        ->with('Event')
                        ->with('client')
                        ->with('doctor')

                        ->useDrugChartQuery()
                            // ->_if($dateRangeMin && $dateRangeMax)
                            //     ->filterByBegDateTime(array('min' => $dateRangeMin, 'max' => $dateRangeMax))
                            // ->_endif()
                            ->_if($dateRangeMax)
                                ->filterByBegDateTime(array('max' => $dateRangeMax))
                            ->_endif()
                            ->_if($dateRangeMin)
                                ->filterByBegDateTime(array('min' => $dateRangeMin))
                            ->_endif()
                        ->endUse()
                        ->with('DrugChart')

                        ->joinWithDrugComponent();

    }


}
