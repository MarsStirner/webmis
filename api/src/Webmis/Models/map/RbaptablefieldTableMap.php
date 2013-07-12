<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbAPTableField' table.
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
class RbaptablefieldTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbaptablefieldTableMap';

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
        $this->setName('rbAPTableField');
        $this->setPhpName('Rbaptablefield');
        $this->setClassname('Webmis\\Models\\Rbaptablefield');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, null);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'rbAPTable', 'id', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 256, null);
        $this->addColumn('fieldName', 'Fieldname', 'VARCHAR', true, 256, null);
        $this->addColumn('referenceTable', 'Referencetable', 'VARCHAR', false, 256, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbaptable', 'Webmis\\Models\\Rbaptable', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // RbaptablefieldTableMap
