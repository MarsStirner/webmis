<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbOKVED' table.
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
class RbokvedTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbokvedTableMap';

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
        $this->setName('rbOKVED');
        $this->setPhpName('Rbokved');
        $this->setClassname('Webmis\\Models\\Rbokved');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 10, null);
        $this->addColumn('div', 'Div', 'VARCHAR', true, 10, null);
        $this->addColumn('class', 'Class', 'VARCHAR', true, 2, null);
        $this->addColumn('group_', 'Group', 'VARCHAR', true, 2, null);
        $this->addColumn('vid', 'Vid', 'VARCHAR', true, 2, null);
        $this->addColumn('OKVED', 'Okved', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 250, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbokvedTableMap
