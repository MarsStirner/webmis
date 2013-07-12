<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'OrgStructure_Job' table.
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
class OrgstructureJobTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.OrgstructureJobTableMap';

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
        $this->setName('OrgStructure_Job');
        $this->setPhpName('OrgstructureJob');
        $this->setClassname('Webmis\\Models\\OrgstructureJob');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('jobType_id', 'JobtypeId', 'INTEGER', false, null, null);
        $this->addColumn('begTime', 'Begtime', 'TIME', true, null, null);
        $this->addColumn('endTime', 'Endtime', 'TIME', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // OrgstructureJobTableMap
