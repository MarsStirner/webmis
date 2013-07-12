<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionType_TissueType' table.
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
class ActiontypeTissuetypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActiontypeTissuetypeTableMap';

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
        $this->setName('ActionType_TissueType');
        $this->setPhpName('ActiontypeTissuetype');
        $this->setClassname('Webmis\\Models\\ActiontypeTissuetype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'ActionType', 'id', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addForeignKey('tissueType_id', 'TissuetypeId', 'INTEGER', 'rbTissueType', 'id', false, null, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, 0);
        $this->addForeignKey('unit_id', 'UnitId', 'INTEGER', 'rbUnit', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actiontype', 'Webmis\\Models\\Actiontype', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Rbtissuetype', 'Webmis\\Models\\Rbtissuetype', RelationMap::MANY_TO_ONE, array('tissueType_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Rbunit', 'Webmis\\Models\\Rbunit', RelationMap::MANY_TO_ONE, array('unit_id' => 'id', ), 'SET NULL', null);
    } // buildRelations()

} // ActiontypeTissuetypeTableMap
