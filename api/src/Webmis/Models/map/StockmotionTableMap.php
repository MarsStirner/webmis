<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'StockMotion' table.
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
class StockmotionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.StockmotionTableMap';

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
        $this->setName('StockMotion');
        $this->setPhpName('Stockmotion');
        $this->setClassname('Webmis\\Models\\Stockmotion');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('createPerson_id', 'CreatepersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('modifyPerson_id', 'ModifypersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, null);
        $this->addColumn('type', 'Type', 'INTEGER', false, null, 0);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addForeignKey('supplier_id', 'SupplierId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addForeignKey('receiver_id', 'ReceiverId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', true, 255, null);
        $this->addForeignKey('supplierPerson_id', 'SupplierpersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addForeignKey('receiverPerson_id', 'ReceiverpersonId', 'INTEGER', 'Person', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByCreatepersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('createPerson_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('PersonRelatedByModifypersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('modifyPerson_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('OrgstructureRelatedByReceiverId', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('receiver_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('PersonRelatedByReceiverpersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('receiverPerson_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('OrgstructureRelatedBySupplierId', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('supplier_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('PersonRelatedBySupplierpersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('supplierPerson_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('StockmotionItem', 'Webmis\\Models\\StockmotionItem', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', 'CASCADE', 'StockmotionItems');
    } // buildRelations()

} // StockmotionTableMap
