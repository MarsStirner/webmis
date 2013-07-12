<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbHospitalBedProfile_Service' table.
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
class RbhospitalbedprofileServiceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbhospitalbedprofileServiceTableMap';

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
        $this->setName('rbHospitalBedProfile_Service');
        $this->setPhpName('RbhospitalbedprofileService');
        $this->setClassname('Webmis\\Models\\RbhospitalbedprofileService');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('rbHospitalBedProfile_id', 'RbhospitalbedprofileId', 'INTEGER', 'rbHospitalBedProfile', 'id', true, null, null);
        $this->addForeignKey('rbService_id', 'RbserviceId', 'INTEGER', 'rbService', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbhospitalbedprofile', 'Webmis\\Models\\Rbhospitalbedprofile', RelationMap::MANY_TO_ONE, array('rbHospitalBedProfile_id' => 'id', ), null, null);
        $this->addRelation('Rbservice', 'Webmis\\Models\\Rbservice', RelationMap::MANY_TO_ONE, array('rbService_id' => 'id', ), null, null);
    } // buildRelations()

} // RbhospitalbedprofileServiceTableMap
