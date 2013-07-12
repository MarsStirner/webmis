<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'BlankActions' table.
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
class BlankactionsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.BlankactionsTableMap';

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
        $this->setName('BlankActions');
        $this->setPhpName('Blankactions');
        $this->setClassname('Webmis\\Models\\Blankactions');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('doctype_id', 'DoctypeId', 'INTEGER', 'ActionType', 'id', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 16, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('checkingSerial', 'Checkingserial', 'TINYINT', true, 3, null);
        $this->addColumn('checkingNumber', 'Checkingnumber', 'TINYINT', true, 3, null);
        $this->addColumn('checkingAmount', 'Checkingamount', 'TINYINT', true, 2, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actiontype', 'Webmis\\Models\\Actiontype', RelationMap::MANY_TO_ONE, array('doctype_id' => 'id', ), null, null);
    } // buildRelations()

} // BlankactionsTableMap
