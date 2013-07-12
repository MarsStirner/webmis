<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'FDRecord' table.
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
class FdrecordTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.FdrecordTableMap';

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
        $this->setName('FDRecord');
        $this->setPhpName('Fdrecord');
        $this->setClassname('Webmis\\Models\\Fdrecord');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('flatDirectory_id', 'FlatdirectoryId', 'INTEGER', 'FlatDirectory', 'id', true, 10, null);
        $this->addForeignKey('flatDirectory_code', 'FlatdirectoryCode', 'CHAR', 'FlatDirectory', 'code', false, 128, null);
        $this->addColumn('order', 'Order', 'INTEGER', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 4096, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 4096, null);
        $this->addColumn('dateStart', 'Datestart', 'TIMESTAMP', false, null, null);
        $this->addColumn('dateEnd', 'Dateend', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('FlatdirectoryRelatedByFlatdirectoryId', 'Webmis\\Models\\Flatdirectory', RelationMap::MANY_TO_ONE, array('flatDirectory_id' => 'id', ), null, null);
        $this->addRelation('FlatdirectoryRelatedByFlatdirectoryCode', 'Webmis\\Models\\Flatdirectory', RelationMap::MANY_TO_ONE, array('flatDirectory_code' => 'code', ), null, null);
        $this->addRelation('ActionpropertyFdrecord', 'Webmis\\Models\\ActionpropertyFdrecord', RelationMap::ONE_TO_MANY, array('id' => 'value', ), null, null, 'ActionpropertyFdrecords');
        $this->addRelation('Clientflatdirectory', 'Webmis\\Models\\Clientflatdirectory', RelationMap::ONE_TO_MANY, array('id' => 'fdRecord_id', ), null, null, 'Clientflatdirectorys');
        $this->addRelation('Fdfieldvalue', 'Webmis\\Models\\Fdfieldvalue', RelationMap::ONE_TO_MANY, array('id' => 'fdRecord_id', ), null, null, 'Fdfieldvalues');
    } // buildRelations()

} // FdrecordTableMap
