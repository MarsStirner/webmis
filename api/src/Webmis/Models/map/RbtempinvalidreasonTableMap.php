<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTempInvalidReason' table.
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
class RbtempinvalidreasonTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtempinvalidreasonTableMap';

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
        $this->setName('rbTempInvalidReason');
        $this->setPhpName('Rbtempinvalidreason');
        $this->setClassname('Webmis\\Models\\Rbtempinvalidreason');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'TINYINT', true, 2, 0);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('requiredDiagnosis', 'Requireddiagnosis', 'BOOLEAN', true, 1, null);
        $this->addColumn('grouping', 'Grouping', 'BOOLEAN', true, 1, null);
        $this->addColumn('primary', 'Primary', 'INTEGER', true, null, null);
        $this->addColumn('prolongate', 'Prolongate', 'INTEGER', true, null, null);
        $this->addColumn('restriction', 'Restriction', 'INTEGER', true, null, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 3, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbtempinvalidreasonTableMap
