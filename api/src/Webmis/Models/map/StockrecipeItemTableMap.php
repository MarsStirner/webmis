<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'StockRecipe_Item' table.
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
class StockrecipeItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.StockrecipeItemTableMap';

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
        $this->setName('StockRecipe_Item');
        $this->setPhpName('StockrecipeItem');
        $this->setClassname('Webmis\\Models\\StockrecipeItem');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'StockRecipe', 'id', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addForeignKey('nomenclature_id', 'NomenclatureId', 'INTEGER', 'rbNomenclature', 'id', false, null, null);
        $this->addColumn('qnt', 'Qnt', 'DOUBLE', true, null, 0);
        $this->addColumn('isOut', 'Isout', 'INTEGER', true, 1, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Stockrecipe', 'Webmis\\Models\\Stockrecipe', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Rbnomenclature', 'Webmis\\Models\\Rbnomenclature', RelationMap::MANY_TO_ONE, array('nomenclature_id' => 'id', ), null, 'CASCADE');
    } // buildRelations()

} // StockrecipeItemTableMap
