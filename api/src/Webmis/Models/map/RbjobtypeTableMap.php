<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbJobType' table.
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
class RbjobtypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbjobtypeTableMap';

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
        $this->setName('rbJobType');
        $this->setPhpName('Rbjobtype');
        $this->setClassname('Webmis\\Models\\Rbjobtype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('group_id', 'GroupId', 'INTEGER', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 64, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 64, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 128, null);
        $this->addColumn('laboratory_id', 'LaboratoryId', 'INTEGER', false, null, null);
        $this->addColumn('isInstant', 'Isinstant', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actiontype', 'Webmis\\Models\\Actiontype', RelationMap::ONE_TO_MANY, array('id' => 'jobType_id', ), null, 'CASCADE', 'Actiontypes');
    } // buildRelations()

} // RbjobtypeTableMap
