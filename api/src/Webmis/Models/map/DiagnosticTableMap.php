<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Diagnostic' table.
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
class DiagnosticTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.DiagnosticTableMap';

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
        $this->setName('Diagnostic');
        $this->setPhpName('Diagnostic');
        $this->setClassname('Webmis\\Models\\Diagnostic');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('event_id', 'EventId', 'INTEGER', true, null, null);
        $this->addColumn('diagnosis_id', 'DiagnosisId', 'INTEGER', false, null, null);
        $this->addColumn('diagnosisType_id', 'DiagnosistypeId', 'INTEGER', true, null, null);
        $this->addColumn('character_id', 'CharacterId', 'INTEGER', false, null, null);
        $this->addColumn('stage_id', 'StageId', 'INTEGER', false, null, null);
        $this->addColumn('phase_id', 'PhaseId', 'INTEGER', false, null, null);
        $this->addColumn('dispanser_id', 'DispanserId', 'INTEGER', false, null, null);
        $this->addColumn('sanatorium', 'Sanatorium', 'BOOLEAN', true, 1, null);
        $this->addColumn('hospital', 'Hospital', 'BOOLEAN', true, 1, null);
        $this->addColumn('traumaType_id', 'TraumatypeId', 'INTEGER', false, null, null);
        $this->addColumn('speciality_id', 'SpecialityId', 'INTEGER', true, null, null);
        $this->addColumn('person_id', 'PersonId', 'INTEGER', false, null, null);
        $this->addColumn('healthGroup_id', 'HealthgroupId', 'INTEGER', false, null, null);
        $this->addColumn('result_id', 'ResultId', 'INTEGER', false, null, null);
        $this->addColumn('setDate', 'Setdate', 'TIMESTAMP', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'TIMESTAMP', false, null, null);
        $this->addColumn('notes', 'Notes', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('rbAcheResult_id', 'RbacheresultId', 'INTEGER', 'rbAcheResult', 'id', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, 10, null);
        $this->addColumn('action_id', 'ActionId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbacheresult', 'Webmis\\Models\\Rbacheresult', RelationMap::MANY_TO_ONE, array('rbAcheResult_id' => 'id', ), null, null);
    } // buildRelations()

} // DiagnosticTableMap
