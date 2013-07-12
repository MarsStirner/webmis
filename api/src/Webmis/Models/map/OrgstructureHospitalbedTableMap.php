<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'OrgStructure_HospitalBed' table.
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
class OrgstructureHospitalbedTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.OrgstructureHospitalbedTableMap';

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
        $this->setName('OrgStructure_HospitalBed');
        $this->setPhpName('OrgstructureHospitalbed');
        $this->setClassname('Webmis\\Models\\OrgstructureHospitalbed');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 16, '');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, '');
        $this->addColumn('isPermanent', 'Ispermanent', 'BOOLEAN', true, 1, false);
        $this->addColumn('type_id', 'TypeId', 'INTEGER', false, null, null);
        $this->addColumn('profile_id', 'ProfileId', 'INTEGER', false, null, null);
        $this->addColumn('relief', 'Relief', 'INTEGER', true, null, 0);
        $this->addColumn('schedule_id', 'ScheduleId', 'INTEGER', false, null, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', false, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', false, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, 0);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('involution', 'Involution', 'BOOLEAN', true, 1, false);
        $this->addColumn('begDateInvolute', 'Begdateinvolute', 'DATE', false, null, null);
        $this->addColumn('endDateInvolute', 'Enddateinvolute', 'DATE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ActionpropertyHospitalbed', 'Webmis\\Models\\ActionpropertyHospitalbed', RelationMap::ONE_TO_MANY, array('id' => 'value', ), 'CASCADE', 'CASCADE', 'ActionpropertyHospitalbeds');
    } // buildRelations()

} // OrgstructureHospitalbedTableMap
