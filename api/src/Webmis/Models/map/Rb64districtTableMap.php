<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rb64District' table.
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
class Rb64districtTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.Rb64districtTableMap';

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
        $this->setName('rb64District');
        $this->setPhpName('Rb64district');
        $this->setClassname('Webmis\\Models\\Rb64district');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('code_tfoms', 'CodeTfoms', 'TINYINT', true, 3, null);
        $this->addColumn('socr', 'Socr', 'VARCHAR', true, 10, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 15, null);
        $this->addColumn('index', 'Index', 'INTEGER', false, null, null);
        $this->addColumn('gninmb', 'Gninmb', 'INTEGER', true, null, null);
        $this->addColumn('uno', 'Uno', 'INTEGER', false, null, null);
        $this->addColumn('ocatd', 'Ocatd', 'VARCHAR', true, 15, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, 0);
        $this->addColumn('parent', 'Parent', 'INTEGER', true, null, null);
        $this->addColumn('infis', 'Infis', 'VARCHAR', false, 15, null);
        $this->addColumn('prefix', 'Prefix', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // Rb64districtTableMap
