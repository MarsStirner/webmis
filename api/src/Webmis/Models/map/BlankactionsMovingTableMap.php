<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'BlankActions_Moving' table.
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
class BlankactionsMovingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.BlankactionsMovingTableMap';

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
        $this->setName('BlankActions_Moving');
        $this->setPhpName('BlankactionsMoving');
        $this->setClassname('Webmis\\Models\\BlankactionsMoving');
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
        $this->addForeignKey('blankParty_id', 'BlankpartyId', 'INTEGER', 'BlankActions_Party', 'id', true, null, null);
        $this->addColumn('serial', 'Serial', 'VARCHAR', true, 8, null);
        $this->addForeignKey('orgStructure_id', 'OrgstructureId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addForeignKey('person_id', 'PersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('received', 'Received', 'INTEGER', true, 4, 0);
        $this->addColumn('used', 'Used', 'INTEGER', true, 4, 0);
        $this->addColumn('returnDate', 'Returndate', 'DATE', false, null, null);
        $this->addColumn('returnAmount', 'Returnamount', 'INTEGER', true, 4, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BlankactionsParty', 'Webmis\\Models\\BlankactionsParty', RelationMap::MANY_TO_ONE, array('blankParty_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByCreatepersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('createPerson_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByModifypersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('modifyPerson_id' => 'id', ), null, null);
        $this->addRelation('Orgstructure', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('orgStructure_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByPersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('person_id' => 'id', ), null, null);
    } // buildRelations()

} // BlankactionsMovingTableMap
