<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionProperty' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Models.map
 */
class ActionPropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Models.map.ActionPropertyTableMap';

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
        $this->setName('ActionProperty');
        $this->setPhpName('ActionProperty');
        $this->setClassname('Webmis\\Models\\ActionProperty');
        $this->setPackage('Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'createDatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'createPersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'modifyDatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'modifyPersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'deleted', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('action_id', 'actionId', 'INTEGER', 'Action', 'id', true, null, null);
        $this->addForeignKey('type_id', 'typeId', 'INTEGER', 'ActionPropertyType', 'id', true, null, null);
        $this->addColumn('unit_id', 'unitId', 'INTEGER', false, null, null);
        $this->addColumn('norm', 'norm', 'VARCHAR', true, 64, null);
        $this->addColumn('isAssigned', 'isAssigned', 'BOOLEAN', true, 1, false);
        $this->addColumn('evaluation', 'evaluation', 'BOOLEAN', false, 1, null);
        $this->addColumn('version', 'version', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::MANY_TO_ONE, array('action_id' => 'id', ), null, null);
        $this->addRelation('ActionPropertyType', 'Webmis\\Models\\ActionPropertyType', RelationMap::MANY_TO_ONE, array('type_id' => 'id', ), null, null);
        $this->addRelation('ActionPropertyAction', 'Webmis\\Models\\ActionPropertyAction', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyActions');
        $this->addRelation('ActionPropertyDate', 'Webmis\\Models\\ActionPropertyDate', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyDates');
        $this->addRelation('ActionPropertyDouble', 'Webmis\\Models\\ActionPropertyDouble', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyDoubles');
        $this->addRelation('ActionPropertyHospitalBed', 'Webmis\\Models\\ActionPropertyHospitalBed', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyHospitalBeds');
        $this->addRelation('ActionPropertyInteger', 'Webmis\\Models\\ActionPropertyInteger', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyIntegers');
        $this->addRelation('ActionPropertyMkb', 'Webmis\\Models\\ActionPropertyMkb', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyMkbs');
        $this->addRelation('ActionPropertyString', 'Webmis\\Models\\ActionPropertyString', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyStrings');
        $this->addRelation('ActionPropertyTime', 'Webmis\\Models\\ActionPropertyTime', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionPropertyTimes');
    } // buildRelations()

} // ActionPropertyTableMap
