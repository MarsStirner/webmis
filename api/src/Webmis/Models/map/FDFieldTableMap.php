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
 * @package    propel.generator.Models.map
 */
class FDFieldTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Models.map.FDFieldTableMap';

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
        $this->setPhpName('FDField');
        $this->setClassname('Webmis\\Models\\FDField');
        $this->setPackage('Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addForeignPrimaryKey('id', 'Id', 'INTEGER' , 'FDFieldValue', 'fdField_id', true, 10, null);
        $this->addColumn('fdFieldType_id', 'FDFieldTypeId', 'INTEGER', true, 10, null);
        $this->addColumn('flatDirectory_id', 'FlatDirectoryId', 'INTEGER', true, 10, null);
        $this->addColumn('flatDirectory_code', 'FlatDirectoryCode', 'CHAR', false, 128, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 4096, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 4096, null);
        $this->addColumn('mask', 'Mask', 'VARCHAR', false, 4096, null);
        $this->addColumn('mandatory', 'Mandatory', 'BOOLEAN', false, 1, null);
        $this->addColumn('order', 'Order', 'INTEGER', false, 10, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('FDFieldValueRelatedById', 'Webmis\\Models\\FDFieldValue', RelationMap::MANY_TO_ONE, array('id' => 'fdField_id', ), null, null);
        $this->addRelation('FDFieldValueRelatedByFDFieldId', 'Webmis\\Models\\FDFieldValue', RelationMap::ONE_TO_MANY, array('id' => 'fdField_id', ), null, null, 'FDFieldValuesRelatedByFDFieldId');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'createDatetime',
  'update_column' => 'modifyDatetime',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // FDFieldTableMap
