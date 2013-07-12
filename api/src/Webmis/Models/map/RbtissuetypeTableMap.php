<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTissueType' table.
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
class RbtissuetypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtissuetypeTableMap';

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
        $this->setName('rbTissueType');
        $this->setPhpName('Rbtissuetype');
        $this->setClassname('Webmis\\Models\\Rbtissuetype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 64, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 128, null);
        $this->addForeignKey('group_id', 'GroupId', 'INTEGER', 'rbTissueType', 'id', false, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RbtissuetypeRelatedByGroupId', 'Webmis\\Models\\Rbtissuetype', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('ActiontypeTissuetype', 'Webmis\\Models\\ActiontypeTissuetype', RelationMap::ONE_TO_MANY, array('id' => 'tissueType_id', ), 'SET NULL', null, 'ActiontypeTissuetypes');
        $this->addRelation('EventtypeAction', 'Webmis\\Models\\EventtypeAction', RelationMap::ONE_TO_MANY, array('id' => 'tissueType_id', ), 'SET NULL', null, 'EventtypeActions');
        $this->addRelation('Takentissuejournal', 'Webmis\\Models\\Takentissuejournal', RelationMap::ONE_TO_MANY, array('id' => 'tissueType_id', ), 'CASCADE', null, 'Takentissuejournals');
        $this->addRelation('Tissue', 'Webmis\\Models\\Tissue', RelationMap::ONE_TO_MANY, array('id' => 'type_id', ), null, null, 'Tissues');
        $this->addRelation('RbtissuetypeRelatedById', 'Webmis\\Models\\Rbtissuetype', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), 'SET NULL', null, 'RbtissuetypesRelatedById');
    } // buildRelations()

} // RbtissuetypeTableMap
