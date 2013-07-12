<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTempInvalidRegime' table.
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
class RbtempinvalidregimeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtempinvalidregimeTableMap';

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
        $this->setName('rbTempInvalidRegime');
        $this->setPhpName('Rbtempinvalidregime');
        $this->setClassname('Webmis\\Models\\Rbtempinvalidregime');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'TINYINT', true, 2, 0);
        $this->addColumn('doctype_id', 'DoctypeId', 'INTEGER', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbtempinvalidregimeTableMap
