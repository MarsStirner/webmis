<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbAcheResult' table.
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
class RbacheresultTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbacheresultTableMap';

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
        $this->setName('rbAcheResult');
        $this->setPhpName('Rbacheresult');
        $this->setClassname('Webmis\\Models\\Rbacheresult');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('eventPurpose_id', 'EventpurposeId', 'INTEGER', 'rbEventTypePurpose', 'id', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 3, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbeventtypepurpose', 'Webmis\\Models\\Rbeventtypepurpose', RelationMap::MANY_TO_ONE, array('eventPurpose_id' => 'id', ), null, null);
        $this->addRelation('Diagnostic', 'Webmis\\Models\\Diagnostic', RelationMap::ONE_TO_MANY, array('id' => 'rbAcheResult_id', ), null, null, 'Diagnostics');
        $this->addRelation('Event', 'Webmis\\Models\\Event', RelationMap::ONE_TO_MANY, array('id' => 'rbAcheResult_id', ), null, null, 'Events');
    } // buildRelations()

} // RbacheresultTableMap
