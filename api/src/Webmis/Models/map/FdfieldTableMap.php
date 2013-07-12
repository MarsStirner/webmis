<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'FDField' table.
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
class FdfieldTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.FdfieldTableMap';

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
        $this->setName('FDField');
        $this->setPhpName('Fdfield');
        $this->setClassname('Webmis\\Models\\Fdfield');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('fdFieldType_id', 'FdfieldtypeId', 'INTEGER', 'FDFieldType', 'id', true, 10, null);
        $this->addForeignKey('flatDirectory_id', 'FlatdirectoryId', 'INTEGER', 'FlatDirectory', 'id', true, 10, null);
        $this->addForeignKey('flatDirectory_code', 'FlatdirectoryCode', 'CHAR', 'FlatDirectory', 'code', false, 128, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 4096, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 4096, null);
        $this->addColumn('mask', 'Mask', 'VARCHAR', false, 4096, null);
        $this->addColumn('mandatory', 'Mandatory', 'BOOLEAN', false, 1, null);
        $this->addColumn('order', 'Order', 'INTEGER', false, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Fdfieldtype', 'Webmis\\Models\\Fdfieldtype', RelationMap::MANY_TO_ONE, array('fdFieldType_id' => 'id', ), null, null);
        $this->addRelation('FlatdirectoryRelatedByFlatdirectoryId', 'Webmis\\Models\\Flatdirectory', RelationMap::MANY_TO_ONE, array('flatDirectory_id' => 'id', ), null, null);
        $this->addRelation('FlatdirectoryRelatedByFlatdirectoryCode', 'Webmis\\Models\\Flatdirectory', RelationMap::MANY_TO_ONE, array('flatDirectory_code' => 'code', ), null, null);
        $this->addRelation('Fdfieldvalue', 'Webmis\\Models\\Fdfieldvalue', RelationMap::ONE_TO_MANY, array('id' => 'fdField_id', ), null, null, 'Fdfieldvalues');
    } // buildRelations()

} // FdfieldTableMap
