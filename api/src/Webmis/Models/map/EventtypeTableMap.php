<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'EventType' table.
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
class EventtypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.EventtypeTableMap';

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
        $this->setName('EventType');
        $this->setPhpName('Eventtype');
        $this->setClassname('Webmis\\Models\\Eventtype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('purpose_id', 'PurposeId', 'INTEGER', false, null, null);
        $this->addColumn('finance_id', 'FinanceId', 'INTEGER', false, null, null);
        $this->addColumn('scene_id', 'SceneId', 'INTEGER', false, null, null);
        $this->addColumn('visitServiceModifier', 'Visitservicemodifier', 'VARCHAR', true, 128, null);
        $this->addColumn('visitServiceFilter', 'Visitservicefilter', 'VARCHAR', true, 32, null);
        $this->addColumn('visitFinance', 'Visitfinance', 'BOOLEAN', true, 1, false);
        $this->addColumn('actionFinance', 'Actionfinance', 'BOOLEAN', true, 1, false);
        $this->addColumn('period', 'Period', 'TINYINT', true, null, null);
        $this->addColumn('singleInPeriod', 'Singleinperiod', 'TINYINT', true, null, null);
        $this->addColumn('isLong', 'Islong', 'BOOLEAN', true, 1, false);
        $this->addColumn('dateInput', 'Dateinput', 'BOOLEAN', true, 1, false);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        $this->addColumn('context', 'Context', 'VARCHAR', true, 64, null);
        $this->addColumn('form', 'Form', 'VARCHAR', true, 64, null);
        $this->addColumn('minDuration', 'Minduration', 'INTEGER', true, null, 0);
        $this->addColumn('maxDuration', 'Maxduration', 'INTEGER', true, null, 0);
        $this->addColumn('showStatusActionsInPlanner', 'Showstatusactionsinplanner', 'BOOLEAN', true, 1, true);
        $this->addColumn('showDiagnosticActionsInPlanner', 'Showdiagnosticactionsinplanner', 'BOOLEAN', true, 1, true);
        $this->addColumn('showCureActionsInPlanner', 'Showcureactionsinplanner', 'BOOLEAN', true, 1, true);
        $this->addColumn('showMiscActionsInPlanner', 'Showmiscactionsinplanner', 'BOOLEAN', true, 1, true);
        $this->addColumn('limitStatusActionsInput', 'Limitstatusactionsinput', 'BOOLEAN', true, 1, false);
        $this->addColumn('limitDiagnosticActionsInput', 'Limitdiagnosticactionsinput', 'BOOLEAN', true, 1, false);
        $this->addColumn('limitCureActionsInput', 'Limitcureactionsinput', 'BOOLEAN', true, 1, false);
        $this->addColumn('limitMiscActionsInput', 'Limitmiscactionsinput', 'BOOLEAN', true, 1, false);
        $this->addColumn('showTime', 'Showtime', 'BOOLEAN', true, 1, false);
        $this->addColumn('medicalAidType_id', 'MedicalaidtypeId', 'INTEGER', false, null, null);
        $this->addColumn('eventProfile_id', 'EventprofileId', 'INTEGER', false, null, null);
        $this->addColumn('mesRequired', 'Mesrequired', 'INTEGER', true, 1, 0);
        $this->addColumn('mesCodeMask', 'Mescodemask', 'VARCHAR', false, 64, '');
        $this->addColumn('mesNameMask', 'Mesnamemask', 'VARCHAR', false, 64, '');
        $this->addForeignKey('counter_id', 'CounterId', 'INTEGER', 'rbCounter', 'id', false, null, null);
        $this->addColumn('isExternal', 'Isexternal', 'BOOLEAN', true, 1, false);
        $this->addColumn('isAssistant', 'Isassistant', 'BOOLEAN', true, 1, false);
        $this->addColumn('isCurator', 'Iscurator', 'BOOLEAN', true, 1, false);
        $this->addColumn('canHavePayableActions', 'Canhavepayableactions', 'BOOLEAN', true, 1, false);
        $this->addColumn('isRequiredCoordination', 'Isrequiredcoordination', 'BOOLEAN', true, 1, false);
        $this->addColumn('isOrgStructurePriority', 'Isorgstructurepriority', 'BOOLEAN', true, 1, false);
        $this->addColumn('isTakenTissue', 'Istakentissue', 'BOOLEAN', true, 1, false);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, 0);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addForeignKey('rbMedicalKind_id', 'RbmedicalkindId', 'INTEGER', 'rbMedicalKind', 'id', false, null, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, 3, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, 3, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('requestType_id', 'RequesttypeId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbcounter', 'Webmis\\Models\\Rbcounter', RelationMap::MANY_TO_ONE, array('counter_id' => 'id', ), null, null);
        $this->addRelation('Rbmedicalkind', 'Webmis\\Models\\Rbmedicalkind', RelationMap::MANY_TO_ONE, array('rbMedicalKind_id' => 'id', ), null, null);
        $this->addRelation('ActiontypeEventtypeCheck', 'Webmis\\Models\\ActiontypeEventtypeCheck', RelationMap::ONE_TO_MANY, array('id' => 'eventType_id', ), null, null, 'ActiontypeEventtypeChecks');
        $this->addRelation('Medicalkindunit', 'Webmis\\Models\\Medicalkindunit', RelationMap::ONE_TO_MANY, array('id' => 'eventType_id', ), null, null, 'Medicalkindunits');
    } // buildRelations()

} // EventtypeTableMap
