<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbServiceUET' table.
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
class RbserviceuetTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbserviceuetTableMap';

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
        $this->setName('rbServiceUET');
        $this->setPhpName('Rbserviceuet');
        $this->setClassname('Webmis\\Models\\Rbserviceuet');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('rbService_id', 'RbserviceId', 'INTEGER', 'rbService', 'id', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 10, null);
        $this->addColumn('UET', 'Uet', 'DOUBLE', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbservice', 'Webmis\\Models\\Rbservice', RelationMap::MANY_TO_ONE, array('rbService_id' => 'id', ), null, null);
    } // buildRelations()

} // RbserviceuetTableMap
