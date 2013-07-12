<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbCounter' table.
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
class RbcounterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbcounterTableMap';

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
        $this->setName('rbCounter');
        $this->setPhpName('Rbcounter');
        $this->setClassname('Webmis\\Models\\Rbcounter');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('value', 'Value', 'INTEGER', true, null, 0);
        $this->addColumn('prefix', 'Prefix', 'VARCHAR', false, 32, null);
        $this->addColumn('separator', 'Separator', 'VARCHAR', false, 8, ' ');
        $this->addColumn('reset', 'Reset', 'INTEGER', true, 1, 0);
        $this->addColumn('startDate', 'Startdate', 'TIMESTAMP', true, null, null);
        $this->addColumn('resetDate', 'Resetdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('sequenceFlag', 'Sequenceflag', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Eventtype', 'Webmis\\Models\\Eventtype', RelationMap::ONE_TO_MANY, array('id' => 'counter_id', ), null, null, 'Eventtypes');
    } // buildRelations()

} // RbcounterTableMap
