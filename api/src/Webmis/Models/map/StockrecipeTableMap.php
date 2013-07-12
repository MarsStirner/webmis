<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'StockRecipe' table.
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
class StockrecipeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.StockrecipeTableMap';

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
        $this->setName('StockRecipe');
        $this->setPhpName('Stockrecipe');
        $this->setClassname('Webmis\\Models\\Stockrecipe');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('createPerson_id', 'CreatepersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('modifyPerson_id', 'ModifypersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, null);
        $this->addForeignKey('group_id', 'GroupId', 'INTEGER', 'StockRecipe', 'id', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 32, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByCreatepersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('createPerson_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('StockrecipeRelatedByGroupId', 'Webmis\\Models\\Stockrecipe', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('PersonRelatedByModifypersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('modifyPerson_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('StockrecipeRelatedById', 'Webmis\\Models\\Stockrecipe', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), 'SET NULL', 'CASCADE', 'StockrecipesRelatedById');
        $this->addRelation('StockrecipeItem', 'Webmis\\Models\\StockrecipeItem', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', 'CASCADE', 'StockrecipeItems');
    } // buildRelations()

} // StockrecipeTableMap
