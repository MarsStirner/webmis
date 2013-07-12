<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'StockTrans' table.
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
class StocktransTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.StocktransTableMap';

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
        $this->setName('StockTrans');
        $this->setPhpName('Stocktrans');
        $this->setClassname('Webmis\\Models\\Stocktrans');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, 11, null);
        $this->addForeignKey('stockMotionItem_id', 'StockmotionitemId', 'INTEGER', 'StockMotion_Item', 'id', true, null, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('qnt', 'Qnt', 'DOUBLE', true, null, 0);
        $this->addColumn('sum', 'Sum', 'DOUBLE', true, null, 0);
        $this->addForeignKey('debOrgStructure_id', 'DeborgstructureId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addForeignKey('debNomenclature_id', 'DebnomenclatureId', 'INTEGER', 'rbNomenclature', 'id', false, null, null);
        $this->addForeignKey('debFinance_id', 'DebfinanceId', 'INTEGER', 'rbFinance', 'id', false, null, null);
        $this->addForeignKey('creOrgStructure_id', 'CreorgstructureId', 'INTEGER', 'OrgStructure', 'id', false, null, null);
        $this->addForeignKey('creNomenclature_id', 'CrenomenclatureId', 'INTEGER', 'rbNomenclature', 'id', false, null, null);
        $this->addForeignKey('creFinance_id', 'CrefinanceId', 'INTEGER', 'rbFinance', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RbfinanceRelatedByCrefinanceId', 'Webmis\\Models\\Rbfinance', RelationMap::MANY_TO_ONE, array('creFinance_id' => 'id', ), null, null);
        $this->addRelation('RbnomenclatureRelatedByCrenomenclatureId', 'Webmis\\Models\\Rbnomenclature', RelationMap::MANY_TO_ONE, array('creNomenclature_id' => 'id', ), null, null);
        $this->addRelation('OrgstructureRelatedByCreorgstructureId', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('creOrgStructure_id' => 'id', ), null, null);
        $this->addRelation('RbfinanceRelatedByDebfinanceId', 'Webmis\\Models\\Rbfinance', RelationMap::MANY_TO_ONE, array('debFinance_id' => 'id', ), null, null);
        $this->addRelation('RbnomenclatureRelatedByDebnomenclatureId', 'Webmis\\Models\\Rbnomenclature', RelationMap::MANY_TO_ONE, array('debNomenclature_id' => 'id', ), null, null);
        $this->addRelation('OrgstructureRelatedByDeborgstructureId', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('debOrgStructure_id' => 'id', ), null, null);
        $this->addRelation('StockmotionItem', 'Webmis\\Models\\StockmotionItem', RelationMap::MANY_TO_ONE, array('stockMotionItem_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // StocktransTableMap
