<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'TakenTissueJournal' table.
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
class TakentissuejournalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TakentissuejournalTableMap';

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
        $this->setName('TakenTissueJournal');
        $this->setPhpName('Takentissuejournal');
        $this->setClassname('Webmis\\Models\\Takentissuejournal');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('client_id', 'ClientId', 'INTEGER', 'Client', 'id', true, null, null);
        $this->addForeignKey('tissueType_id', 'TissuetypeId', 'INTEGER', 'rbTissueType', 'id', true, null, null);
        $this->addColumn('externalId', 'Externalid', 'VARCHAR', true, 30, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, 0);
        $this->addForeignKey('unit_id', 'UnitId', 'INTEGER', 'rbUnit', 'id', false, null, null);
        $this->addColumn('datetimeTaken', 'Datetimetaken', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('execPerson_id', 'ExecpersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', true, 128, null);
        $this->addColumn('barcode', 'Barcode', 'INTEGER', false, null, null);
        $this->addColumn('period', 'Period', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Webmis\\Models\\Client', RelationMap::MANY_TO_ONE, array('client_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Rbtissuetype', 'Webmis\\Models\\Rbtissuetype', RelationMap::MANY_TO_ONE, array('tissueType_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Rbunit', 'Webmis\\Models\\Rbunit', RelationMap::MANY_TO_ONE, array('unit_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Person', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('execPerson_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::ONE_TO_MANY, array('id' => 'takenTissueJournal_id', ), 'SET NULL', null, 'Actions');
    } // buildRelations()

} // TakentissuejournalTableMap
