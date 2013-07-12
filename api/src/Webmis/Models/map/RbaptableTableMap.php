<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbAPTable' table.
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
class RbaptableTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbaptableTableMap';

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
        $this->setName('rbAPTable');
        $this->setPhpName('Rbaptable');
        $this->setClassname('Webmis\\Models\\Rbaptable');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 50, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 256, null);
        $this->addColumn('tableName', 'Tablename', 'VARCHAR', true, 256, null);
        $this->addColumn('masterField', 'Masterfield', 'VARCHAR', true, 256, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbaptablefield', 'Webmis\\Models\\Rbaptablefield', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', 'CASCADE', 'Rbaptablefields');
    } // buildRelations()

} // RbaptableTableMap
