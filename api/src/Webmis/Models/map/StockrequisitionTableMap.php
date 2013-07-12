<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'StockRequisition' table.
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
class StockrequisitionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.StockrequisitionTableMap';

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
        $this->setName('StockRequisition');
        $this->setPhpName('Stockrequisition');
        $this->setClassname('Webmis\\Models\\Stockrequisition');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addForeignKey('createPerson_id', 'CreatepersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addForeignKey('modifyPerson_id', 'ModifypersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('date', 'Date', 'DATE', true, null, '0000-00-00');
        $this->addColumn('deadline', 'Deadline', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('supplier_id', 'SupplierId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addForeignKey('recipient_id', 'RecipientId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addColumn('revoked', 'Revoked', 'BOOLEAN', true, 1, false);
        $this->addColumn('note', 'Note', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByCreatepersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('createPerson_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('PersonRelatedByModifypersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('modifyPerson_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('OrgstructureRelatedByRecipientId', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('recipient_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('OrgstructureRelatedBySupplierId', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('supplier_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('StockrequisitionItem', 'Webmis\\Models\\StockrequisitionItem', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', 'CASCADE', 'StockrequisitionItems');
    } // buildRelations()

} // StockrequisitionTableMap
