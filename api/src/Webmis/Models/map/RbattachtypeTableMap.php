<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbAttachType' table.
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
class RbattachtypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbattachtypeTableMap';

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
        $this->setName('rbAttachType');
        $this->setPhpName('Rbattachtype');
        $this->setClassname('Webmis\\Models\\Rbattachtype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('temporary', 'Temporary', 'BOOLEAN', true, 1, null);
        $this->addColumn('outcome', 'Outcome', 'TINYINT', true, null, null);
        $this->addColumn('finance_id', 'FinanceId', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OrgstructureDisabledattendance', 'Webmis\\Models\\OrgstructureDisabledattendance', RelationMap::ONE_TO_MANY, array('id' => 'attachType_id', ), 'CASCADE', 'CASCADE', 'OrgstructureDisabledattendances');
    } // buildRelations()

} // RbattachtypeTableMap
