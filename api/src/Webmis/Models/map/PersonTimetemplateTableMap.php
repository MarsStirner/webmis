<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Person_TimeTemplate' table.
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
class PersonTimetemplateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.PersonTimetemplateTableMap';

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
        $this->setName('Person_TimeTemplate');
        $this->setPhpName('PersonTimetemplate');
        $this->setClassname('Webmis\\Models\\PersonTimetemplate');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('createPerson_id', 'CreatepersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('modifyPerson_id', 'ModifypersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'Person', 'id', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('ambBegTime', 'Ambbegtime', 'TIME', false, null, null);
        $this->addColumn('ambEndTime', 'Ambendtime', 'TIME', false, null, null);
        $this->addColumn('ambPlan', 'Ambplan', 'SMALLINT', true, 4, null);
        $this->addColumn('office', 'Office', 'VARCHAR', true, 8, null);
        $this->addColumn('ambBegTime2', 'Ambbegtime2', 'TIME', false, null, null);
        $this->addColumn('ambEndTime2', 'Ambendtime2', 'TIME', false, null, null);
        $this->addColumn('ambPlan2', 'Ambplan2', 'SMALLINT', true, 4, null);
        $this->addColumn('office2', 'Office2', 'VARCHAR', true, 8, null);
        $this->addColumn('homBegTime', 'Hombegtime', 'TIME', false, null, null);
        $this->addColumn('homEndTime', 'Homendtime', 'TIME', false, null, null);
        $this->addColumn('homPlan', 'Homplan', 'SMALLINT', true, 4, null);
        $this->addColumn('homBegTime2', 'Hombegtime2', 'TIME', false, null, null);
        $this->addColumn('homEndTime2', 'Homendtime2', 'TIME', false, null, null);
        $this->addColumn('homPlan2', 'Homplan2', 'SMALLINT', true, 4, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByCreatepersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('createPerson_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByMasterId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByModifypersonId', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('modifyPerson_id' => 'id', ), null, null);
    } // buildRelations()

} // PersonTimetemplateTableMap
