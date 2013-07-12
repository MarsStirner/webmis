<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'TempInvalid_Period' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Webmis.Models.map
 */
class TempinvalidPeriodTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TempinvalidPeriodTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('TempInvalid_Period');
        $this->setPhpName('TempinvalidPeriod');
        $this->setClassname('Webmis\\Models\\TempinvalidPeriod');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('diagnosis_id', 'DiagnosisId', 'INTEGER', false, null, null);
        $this->addColumn('begPerson_id', 'BegpersonId', 'INTEGER', false, null, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', true, null, null);
        $this->addColumn('endPerson_id', 'EndpersonId', 'INTEGER', false, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', true, null, null);
        $this->addColumn('isExternal', 'Isexternal', 'BOOLEAN', true, 1, null);
        $this->addColumn('regime_id', 'RegimeId', 'INTEGER', false, null, null);
        $this->addColumn('break_id', 'BreakId', 'INTEGER', false, null, null);
        $this->addColumn('result_id', 'ResultId', 'INTEGER', false, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', true, 256, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // TempinvalidPeriodTableMap
