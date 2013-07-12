<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'StockRequisition_Item' table.
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
class StockrequisitionItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.StockrequisitionItemTableMap';

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
        $this->setName('StockRequisition_Item');
        $this->setPhpName('StockrequisitionItem');
        $this->setClassname('Webmis\\Models\\StockrequisitionItem');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'StockRequisition', 'id', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addForeignKey('nomenclature_id', 'NomenclatureId', 'INTEGER', 'rbNomenclature', 'id', false, null, null);
        $this->addForeignKey('finance_id', 'FinanceId', 'INTEGER', 'rbFinance', 'id', false, null, null);
        $this->addColumn('qnt', 'Qnt', 'DOUBLE', true, null, 0);
        $this->addColumn('satisfiedQnt', 'Satisfiedqnt', 'DOUBLE', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbfinance', 'Webmis\\Models\\Rbfinance', RelationMap::MANY_TO_ONE, array('finance_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('Stockrequisition', 'Webmis\\Models\\Stockrequisition', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Rbnomenclature', 'Webmis\\Models\\Rbnomenclature', RelationMap::MANY_TO_ONE, array('nomenclature_id' => 'id', ), null, 'CASCADE');
    } // buildRelations()

} // StockrequisitionItemTableMap
