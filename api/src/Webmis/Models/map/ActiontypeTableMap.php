<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionType' table.
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
class ActiontypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActiontypeTableMap';

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
        $this->setName('ActionType');
        $this->setPhpName('Actiontype');
        $this->setClassname('Webmis\\Models\\Actiontype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('class', 'Class', 'BOOLEAN', true, 1, null);
        $this->addColumn('group_id', 'GroupId', 'INTEGER', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 25, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('flatCode', 'Flatcode', 'VARCHAR', true, 64, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('office', 'Office', 'VARCHAR', true, 32, null);
        $this->addColumn('showInForm', 'Showinform', 'BOOLEAN', true, 1, null);
        $this->addColumn('genTimetable', 'Gentimetable', 'BOOLEAN', true, 1, null);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        $this->addColumn('quotaType_id', 'QuotatypeId', 'INTEGER', false, null, null);
        $this->addColumn('context', 'Context', 'VARCHAR', true, 64, null);
        $this->addColumn('amount', 'Amount', 'DOUBLE', true, null, 1);
        $this->addColumn('amountEvaluation', 'Amountevaluation', 'INTEGER', true, 1, 0);
        $this->addColumn('defaultStatus', 'Defaultstatus', 'TINYINT', true, null, 0);
        $this->addColumn('defaultDirectionDate', 'Defaultdirectiondate', 'TINYINT', true, null, 0);
        $this->addColumn('defaultPlannedEndDate', 'Defaultplannedenddate', 'BOOLEAN', true, 1, null);
        $this->addColumn('defaultEndDate', 'Defaultenddate', 'TINYINT', true, null, 0);
        $this->addForeignKey('defaultExecPerson_id', 'DefaultexecpersonId', 'INTEGER', 'Person', 'id', false, null, null);
        $this->addColumn('defaultPersonInEvent', 'Defaultpersoninevent', 'TINYINT', true, null, 0);
        $this->addColumn('defaultPersonInEditor', 'Defaultpersonineditor', 'TINYINT', true, null, 0);
        $this->addColumn('maxOccursInEvent', 'Maxoccursinevent', 'INTEGER', true, null, 0);
        $this->addColumn('showTime', 'Showtime', 'BOOLEAN', true, 1, false);
        $this->addColumn('isMES', 'Ismes', 'INTEGER', false, null, null);
        $this->addColumn('nomenclativeService_id', 'NomenclativeserviceId', 'INTEGER', false, null, null);
        $this->addColumn('isPreferable', 'Ispreferable', 'BOOLEAN', true, 1, true);
        $this->addColumn('prescribedType_id', 'PrescribedtypeId', 'INTEGER', false, null, null);
        $this->addColumn('shedule_id', 'SheduleId', 'INTEGER', false, null, null);
        $this->addColumn('isRequiredCoordination', 'Isrequiredcoordination', 'BOOLEAN', true, 1, false);
        $this->addColumn('isRequiredTissue', 'Isrequiredtissue', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('testTubeType_id', 'TesttubetypeId', 'INTEGER', 'rbTestTubeType', 'id', false, null, null);
        $this->addForeignKey('jobType_id', 'JobtypeId', 'INTEGER', 'rbJobType', 'id', false, null, null);
        $this->addColumn('mnem', 'Mnem', 'VARCHAR', false, 32, '');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Person', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('defaultExecPerson_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Rbjobtype', 'Webmis\\Models\\Rbjobtype', RelationMap::MANY_TO_ONE, array('jobType_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('Rbtesttubetype', 'Webmis\\Models\\Rbtesttubetype', RelationMap::MANY_TO_ONE, array('testTubeType_id' => 'id', ), null, 'CASCADE');
        $this->addRelation('ActiontypeEventtypeCheckRelatedByActiontypeId', 'Webmis\\Models\\ActiontypeEventtypeCheck', RelationMap::ONE_TO_MANY, array('id' => 'actionType_id', ), null, null, 'ActiontypeEventtypeChecksRelatedByActiontypeId');
        $this->addRelation('ActiontypeEventtypeCheckRelatedByRelatedActiontypeId', 'Webmis\\Models\\ActiontypeEventtypeCheck', RelationMap::ONE_TO_MANY, array('id' => 'related_actionType_id', ), null, null, 'ActiontypeEventtypeChecksRelatedByRelatedActiontypeId');
        $this->addRelation('ActiontypeTissuetype', 'Webmis\\Models\\ActiontypeTissuetype', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', null, 'ActiontypeTissuetypes');
        $this->addRelation('Blankactions', 'Webmis\\Models\\Blankactions', RelationMap::ONE_TO_MANY, array('id' => 'doctype_id', ), null, null, 'Blankactionss');
        $this->addRelation('Rbblankactions', 'Webmis\\Models\\Rbblankactions', RelationMap::ONE_TO_MANY, array('id' => 'doctype_id', ), null, null, 'Rbblankactionss');
    } // buildRelations()

} // ActiontypeTableMap
