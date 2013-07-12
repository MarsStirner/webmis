<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rlsPharmGroup' table.
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
class RlspharmgroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RlspharmgroupTableMap';

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
        $this->setName('rlsPharmGroup');
        $this->setPhpName('Rlspharmgroup');
        $this->setClassname('Webmis\\Models\\Rlspharmgroup');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('group_id', 'GroupId', 'INTEGER', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 128, null);
        $this->addColumn('path', 'Path', 'VARCHAR', false, 128, null);
        $this->addColumn('pathx', 'Pathx', 'VARCHAR', false, 128, null);
        $this->addColumn('nameRaw', 'Nameraw', 'VARCHAR', false, 128, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RlspharmgroupTableMap
