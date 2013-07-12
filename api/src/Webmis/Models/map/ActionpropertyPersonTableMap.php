<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionProperty_Person' table.
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
class ActionpropertyPersonTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActionpropertyPersonTableMap';

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
        $this->setName('ActionProperty_Person');
        $this->setPhpName('ActionpropertyPerson');
        $this->setClassname('Webmis\\Models\\ActionpropertyPerson');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id', 'Id', 'INTEGER' , 'ActionProperty', 'id', true, null, null);
        $this->addPrimaryKey('index', 'Index', 'INTEGER', true, null, 0);
        $this->addForeignKey('value', 'Value', 'INTEGER', 'Person', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actionproperty', 'Webmis\\Models\\Actionproperty', RelationMap::MANY_TO_ONE, array('id' => 'id', ), null, 'CASCADE');
        $this->addRelation('Person', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('value' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ActionpropertyPersonTableMap
