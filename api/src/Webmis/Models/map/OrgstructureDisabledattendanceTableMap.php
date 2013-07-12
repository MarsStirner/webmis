<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'OrgStructure_DisabledAttendance' table.
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
class OrgstructureDisabledattendanceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.OrgstructureDisabledattendanceTableMap';

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
        $this->setName('OrgStructure_DisabledAttendance');
        $this->setPhpName('OrgstructureDisabledattendance');
        $this->setClassname('Webmis\\Models\\OrgstructureDisabledattendance');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'OrgStructure', 'id', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addForeignKey('attachType_id', 'AttachtypeId', 'INTEGER', 'rbAttachType', 'id', false, null, null);
        $this->addColumn('disabledType', 'Disabledtype', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbattachtype', 'Webmis\\Models\\Rbattachtype', RelationMap::MANY_TO_ONE, array('attachType_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Orgstructure', 'Webmis\\Models\\Orgstructure', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // OrgstructureDisabledattendanceTableMap
