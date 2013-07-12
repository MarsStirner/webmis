<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'LayoutAttribute' table.
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
class LayoutattributeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.LayoutattributeTableMap';

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
        $this->setName('LayoutAttribute');
        $this->setPhpName('Layoutattribute');
        $this->setClassname('Webmis\\Models\\Layoutattribute');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 1023, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('typeName', 'Typename', 'VARCHAR', false, 255, null);
        $this->addColumn('measure', 'Measure', 'VARCHAR', false, 255, null);
        $this->addColumn('defaultValue', 'Defaultvalue', 'VARCHAR', false, 1023, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Layoutattributevalue', 'Webmis\\Models\\Layoutattributevalue', RelationMap::ONE_TO_MANY, array('id' => 'layoutAttribute_id', ), 'CASCADE', null, 'Layoutattributevalues');
    } // buildRelations()

} // LayoutattributeTableMap
