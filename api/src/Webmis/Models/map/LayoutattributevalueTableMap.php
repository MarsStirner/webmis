<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'LayoutAttributeValue' table.
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
class LayoutattributevalueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.LayoutattributevalueTableMap';

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
        $this->setName('LayoutAttributeValue');
        $this->setPhpName('Layoutattributevalue');
        $this->setClassname('Webmis\\Models\\Layoutattributevalue');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('actionPropertyType_id', 'ActionpropertytypeId', 'INTEGER', true, null, null);
        $this->addForeignKey('layoutAttribute_id', 'LayoutattributeId', 'INTEGER', 'LayoutAttribute', 'id', true, null, null);
        $this->addColumn('value', 'Value', 'VARCHAR', true, 1023, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Layoutattribute', 'Webmis\\Models\\Layoutattribute', RelationMap::MANY_TO_ONE, array('layoutAttribute_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // LayoutattributevalueTableMap
