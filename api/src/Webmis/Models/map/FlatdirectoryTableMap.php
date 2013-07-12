<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'FlatDirectory' table.
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
class FlatdirectoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.FlatdirectoryTableMap';

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
        $this->setName('FlatDirectory');
        $this->setPhpName('Flatdirectory');
        $this->setClassname('Webmis\\Models\\Flatdirectory');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 4096, null);
        $this->addColumn('code', 'Code', 'CHAR', false, 128, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 4096, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Clientfdproperty', 'Webmis\\Models\\Clientfdproperty', RelationMap::ONE_TO_MANY, array('id' => 'flatDirectory_id', ), null, null, 'Clientfdpropertys');
        $this->addRelation('FdfieldRelatedByFlatdirectoryId', 'Webmis\\Models\\Fdfield', RelationMap::ONE_TO_MANY, array('id' => 'flatDirectory_id', ), null, null, 'FdfieldsRelatedByFlatdirectoryId');
        $this->addRelation('FdfieldRelatedByFlatdirectoryCode', 'Webmis\\Models\\Fdfield', RelationMap::ONE_TO_MANY, array('code' => 'flatDirectory_code', ), null, null, 'FdfieldsRelatedByFlatdirectoryCode');
        $this->addRelation('FdrecordRelatedByFlatdirectoryId', 'Webmis\\Models\\Fdrecord', RelationMap::ONE_TO_MANY, array('id' => 'flatDirectory_id', ), null, null, 'FdrecordsRelatedByFlatdirectoryId');
        $this->addRelation('FdrecordRelatedByFlatdirectoryCode', 'Webmis\\Models\\Fdrecord', RelationMap::ONE_TO_MANY, array('code' => 'flatDirectory_code', ), null, null, 'FdrecordsRelatedByFlatdirectoryCode');
    } // buildRelations()

} // FlatdirectoryTableMap
