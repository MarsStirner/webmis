<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'BlankActions_Party' table.
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
class BlankactionsPartyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.BlankactionsPartyTableMap';

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
        $this->setName('BlankActions_Party');
        $this->setPhpName('BlankactionsParty');
        $this->setClassname('Webmis\\Models\\BlankactionsParty');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('createPerson_id', 'CreatepersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('modifyPerson_id', 'ModifypersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addForeignKey('doctype_id', 'DoctypeId', 'INTEGER', 'rbBlankActions', 'id', true, null, null);
        $this->addForeignKey('person_id', 'PersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('serial', 'Serial', 'VARCHAR', true, 8, null);
        $this->addColumn('numberFrom', 'Numberfrom', 'VARCHAR', true, 16, null);
        $this->addColumn('numberTo', 'Numberto', 'VARCHAR', true, 16, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, 4, 0);
        $this->addColumn('extradited', 'Extradited', 'INTEGER', true, 4, 0);
        $this->addColumn('balance', 'Balance', 'INTEGER', true, 4, 0);
        $this->addColumn('used', 'Used', 'INTEGER', true, 4, 0);
        $this->addColumn('writing', 'Writing', 'INTEGER', true, 4, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByCreatepersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('createPerson_id' => 'id', ), null, null);
        $this->addRelation('Rbblankactions', 'Webmis\\Models\\Rbblankactions', RelationMap::MANY_TO_ONE, array('doctype_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByModifypersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('modifyPerson_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByPersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('person_id' => 'id', ), null, null);
        $this->addRelation('BlankactionsMoving', 'Webmis\\Models\\BlankactionsMoving', RelationMap::ONE_TO_MANY, array('id' => 'blankParty_id', ), null, null, 'BlankactionsMovings');
    } // buildRelations()

} // BlankactionsPartyTableMap
