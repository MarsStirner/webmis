<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionType_EventType_check' table.
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
class ActiontypeEventtypeCheckTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActiontypeEventtypeCheckTableMap';

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
        $this->setName('ActionType_EventType_check');
        $this->setPhpName('ActiontypeEventtypeCheck');
        $this->setClassname('Webmis\\Models\\ActiontypeEventtypeCheck');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('actionType_id', 'ActiontypeId', 'INTEGER', 'ActionType', 'id', true, null, null);
        $this->addForeignKey('eventType_id', 'EventtypeId', 'INTEGER', 'EventType', 'id', true, null, null);
        $this->addForeignKey('related_actionType_id', 'RelatedActiontypeId', 'INTEGER', 'ActionType', 'id', false, null, null);
        $this->addColumn('relationType', 'Relationtype', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ActiontypeRelatedByActiontypeId', 'Webmis\\Models\\Actiontype', RelationMap::MANY_TO_ONE, array('actionType_id' => 'id', ), null, null);
        $this->addRelation('Eventtype', 'Webmis\\Models\\Eventtype', RelationMap::MANY_TO_ONE, array('eventType_id' => 'id', ), null, null);
        $this->addRelation('ActiontypeRelatedByRelatedActiontypeId', 'Webmis\\Models\\Actiontype', RelationMap::MANY_TO_ONE, array('related_actionType_id' => 'id', ), null, null);
    } // buildRelations()

} // ActiontypeEventtypeCheckTableMap
