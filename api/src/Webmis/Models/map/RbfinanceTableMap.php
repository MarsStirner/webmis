<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbFinance' table.
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
class RbfinanceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbfinanceTableMap';

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
        $this->setName('rbFinance');
        $this->setPhpName('Rbfinance');
        $this->setClassname('Webmis\\Models\\Rbfinance');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OrgstructureStock', 'Webmis\\Models\\OrgstructureStock', RelationMap::ONE_TO_MANY, array('id' => 'finance_id', ), null, 'CASCADE', 'OrgstructureStocks');
        $this->addRelation('StockmotionItemRelatedByFinanceId', 'Webmis\\Models\\StockmotionItem', RelationMap::ONE_TO_MANY, array('id' => 'finance_id', ), null, 'CASCADE', 'StockmotionItemsRelatedByFinanceId');
        $this->addRelation('StockmotionItemRelatedByOldfinanceId', 'Webmis\\Models\\StockmotionItem', RelationMap::ONE_TO_MANY, array('id' => 'oldFinance_id', ), null, 'CASCADE', 'StockmotionItemsRelatedByOldfinanceId');
        $this->addRelation('StockrequisitionItem', 'Webmis\\Models\\StockrequisitionItem', RelationMap::ONE_TO_MANY, array('id' => 'finance_id', ), null, 'CASCADE', 'StockrequisitionItems');
        $this->addRelation('StocktransRelatedByCrefinanceId', 'Webmis\\Models\\Stocktrans', RelationMap::ONE_TO_MANY, array('id' => 'creFinance_id', ), null, null, 'StocktranssRelatedByCrefinanceId');
        $this->addRelation('StocktransRelatedByDebfinanceId', 'Webmis\\Models\\Stocktrans', RelationMap::ONE_TO_MANY, array('id' => 'debFinance_id', ), null, null, 'StocktranssRelatedByDebfinanceId');
    } // buildRelations()

} // RbfinanceTableMap
