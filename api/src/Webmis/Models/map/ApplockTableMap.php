<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'AppLock' table.
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
class ApplockTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ApplockTableMap';

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
        $this->setName('AppLock');
        $this->setPhpName('Applock');
        $this->setClassname('Webmis\\Models\\Applock');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('lockTime', 'Locktime', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('retTime', 'Rettime', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('connectionId', 'Connectionid', 'INTEGER', true, null, 0);
        $this->addColumn('person_id', 'PersonId', 'INTEGER', false, null, null);
        $this->addColumn('addr', 'Addr', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ApplockTableMap
