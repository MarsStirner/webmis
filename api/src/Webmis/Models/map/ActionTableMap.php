<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Action' table.
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
class ActionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActionTableMap';

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
        $this->setName('Action');
        $this->setPhpName('Action');
        $this->setClassname('Webmis\\Models\\Action');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('actionType_id', 'ActiontypeId', 'INTEGER', true, null, null);
        $this->addColumn('event_id', 'EventId', 'INTEGER', false, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('directionDate', 'Directiondate', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'TINYINT', true, null, null);
        $this->addColumn('setPerson_id', 'SetpersonId', 'INTEGER', false, null, null);
        $this->addColumn('isUrgent', 'Isurgent', 'INTEGER', true, 1, 0);
        $this->addColumn('begDate', 'Begdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('plannedEndDate', 'Plannedenddate', 'TIMESTAMP', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'TIMESTAMP', false, null, null);
        $this->addColumn('note', 'Note', 'LONGVARCHAR', true, null, null);
        $this->addColumn('person_id', 'PersonId', 'INTEGER', false, null, null);
        $this->addColumn('office', 'Office', 'VARCHAR', true, 16, null);
        $this->addColumn('amount', 'Amount', 'DOUBLE', true, null, null);
        $this->addColumn('uet', 'Uet', 'DOUBLE', false, null, 0);
        $this->addColumn('expose', 'Expose', 'INTEGER', true, 1, 1);
        $this->addColumn('payStatus', 'Paystatus', 'INTEGER', true, null, null);
        $this->addColumn('account', 'Account', 'BOOLEAN', true, 1, null);
        $this->addColumn('finance_id', 'FinanceId', 'INTEGER', false, null, null);
        $this->addColumn('prescription_id', 'PrescriptionId', 'INTEGER', false, null, null);
        $this->addForeignKey('takenTissueJournal_id', 'TakentissuejournalId', 'INTEGER', 'TakenTissueJournal', 'id', false, null, null);
        $this->addColumn('contract_id', 'ContractId', 'INTEGER', false, null, null);
        $this->addColumn('coordDate', 'Coorddate', 'TIMESTAMP', false, null, null);
        $this->addColumn('coordAgent', 'Coordagent', 'VARCHAR', true, 128, '');
        $this->addColumn('coordInspector', 'Coordinspector', 'VARCHAR', true, 128, '');
        $this->addColumn('coordText', 'Coordtext', 'VARCHAR', true, 255, null);
        $this->addColumn('hospitalUidFrom', 'Hospitaluidfrom', 'VARCHAR', true, 128, '0');
        $this->addColumn('pacientInQueueType', 'Pacientinqueuetype', 'TINYINT', false, null, 0);
        $this->addColumn('AppointmentType', 'Appointmenttype', 'CHAR', true, null, null);
        $this->getColumn('AppointmentType', false)->setValueSet(array (
  0 => '0',
  1 => 'amb',
  2 => 'hospital',
  3 => 'polyclinic',
  4 => 'diagnostics',
  5 => 'portal',
  6 => 'otherLPU',
));
        $this->addColumn('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('parentAction_id', 'ParentactionId', 'INTEGER', false, null, null);
        $this->addColumn('uuid_id', 'UuidId', 'INTEGER', true, null, 0);
        $this->addColumn('dcm_study_uid', 'DcmStudyUid', 'VARCHAR', false, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Takentissuejournal', 'Webmis\\Models\\Takentissuejournal', RelationMap::MANY_TO_ONE, array('takenTissueJournal_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Actiontissue', 'Webmis\\Models\\Actiontissue', RelationMap::ONE_TO_MANY, array('id' => 'action_id', ), null, null, 'Actiontissues');
        $this->addRelation('ActionDocument', 'Webmis\\Models\\ActionDocument', RelationMap::ONE_TO_MANY, array('id' => 'action_id', ), null, null, 'ActionDocuments');
        $this->addRelation('Trfufinalvolume', 'Webmis\\Models\\Trfufinalvolume', RelationMap::ONE_TO_MANY, array('id' => 'action_id', ), null, null, 'Trfufinalvolumes');
        $this->addRelation('Trfulaboratorymeasure', 'Webmis\\Models\\Trfulaboratorymeasure', RelationMap::ONE_TO_MANY, array('id' => 'action_id', ), null, null, 'Trfulaboratorymeasures');
        $this->addRelation('Trfuorderissueresult', 'Webmis\\Models\\Trfuorderissueresult', RelationMap::ONE_TO_MANY, array('id' => 'action_id', ), null, null, 'Trfuorderissueresults');
    } // buildRelations()

} // ActionTableMap
