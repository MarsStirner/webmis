<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbNomenclature' table.
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
class RbnomenclatureTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbnomenclatureTableMap';

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
        $this->setName('rbNomenclature');
        $this->setPhpName('Rbnomenclature');
        $this->setClassname('Webmis\\Models\\Rbnomenclature');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('group_id', 'GroupId', 'INTEGER', 'rbNomenclature', 'id', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 64, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 64, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 128, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RbnomenclatureRelatedByGroupId', 'Webmis\\Models\\Rbnomenclature', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('OrgstructureStock', 'Webmis\\Models\\OrgstructureStock', RelationMap::ONE_TO_MANY, array('id' => 'nomenclature_id', ), null, 'CASCADE', 'OrgstructureStocks');
        $this->addRelation('StockmotionItem', 'Webmis\\Models\\StockmotionItem', RelationMap::ONE_TO_MANY, array('id' => 'nomenclature_id', ), null, 'CASCADE', 'StockmotionItems');
        $this->addRelation('StockrecipeItem', 'Webmis\\Models\\StockrecipeItem', RelationMap::ONE_TO_MANY, array('id' => 'nomenclature_id', ), null, 'CASCADE', 'StockrecipeItems');
        $this->addRelation('StockrequisitionItem', 'Webmis\\Models\\StockrequisitionItem', RelationMap::ONE_TO_MANY, array('id' => 'nomenclature_id', ), null, 'CASCADE', 'StockrequisitionItems');
        $this->addRelation('StocktransRelatedByCrenomenclatureId', 'Webmis\\Models\\Stocktrans', RelationMap::ONE_TO_MANY, array('id' => 'creNomenclature_id', ), null, null, 'StocktranssRelatedByCrenomenclatureId');
        $this->addRelation('StocktransRelatedByDebnomenclatureId', 'Webmis\\Models\\Stocktrans', RelationMap::ONE_TO_MANY, array('id' => 'debNomenclature_id', ), null, null, 'StocktranssRelatedByDebnomenclatureId');
        $this->addRelation('RbnomenclatureRelatedById', 'Webmis\\Models\\Rbnomenclature', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), 'SET NULL', null, 'RbnomenclaturesRelatedById');
    } // buildRelations()

} // RbnomenclatureTableMap
