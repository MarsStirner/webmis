<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Event' table.
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
class EventTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.EventTableMap';

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
        $this->setName('Event');
        $this->setPhpName('Event');
        $this->setClassname('Webmis\\Models\\Event');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('externalId', 'Externalid', 'VARCHAR', true, 30, null);
        $this->addColumn('eventType_id', 'EventtypeId', 'INTEGER', true, null, null);
        $this->addColumn('org_id', 'OrgId', 'INTEGER', false, null, null);
        $this->addColumn('client_id', 'ClientId', 'INTEGER', false, null, null);
        $this->addColumn('contract_id', 'ContractId', 'INTEGER', false, null, null);
        $this->addColumn('prevEventDate', 'Preveventdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('setDate', 'Setdate', 'TIMESTAMP', true, null, null);
        $this->addColumn('setPerson_id', 'SetpersonId', 'INTEGER', false, null, null);
        $this->addColumn('execDate', 'Execdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('execPerson_id', 'ExecpersonId', 'INTEGER', false, null, null);
        $this->addColumn('isPrimary', 'Isprimary', 'BOOLEAN', true, 1, null);
        $this->addColumn('order', 'Order', 'BOOLEAN', true, 1, null);
        $this->addColumn('result_id', 'ResultId', 'INTEGER', false, null, null);
        $this->addColumn('nextEventDate', 'Nexteventdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('payStatus', 'Paystatus', 'INTEGER', true, null, null);
        $this->addColumn('typeAsset_id', 'TypeassetId', 'INTEGER', false, null, null);
        $this->addColumn('note', 'Note', 'LONGVARCHAR', true, null, null);
        $this->addColumn('curator_id', 'CuratorId', 'INTEGER', false, null, null);
        $this->addColumn('assistant_id', 'AssistantId', 'INTEGER', false, null, null);
        $this->addColumn('pregnancyWeek', 'Pregnancyweek', 'INTEGER', true, null, 0);
        $this->addColumn('MES_id', 'MesId', 'INTEGER', false, null, null);
        $this->addForeignKey('mesSpecification_id', 'MesspecificationId', 'INTEGER', 'rbMesSpecification', 'id', false, null, null);
        $this->addForeignKey('rbAcheResult_id', 'RbacheresultId', 'INTEGER', 'rbAcheResult', 'id', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('privilege', 'Privilege', 'BOOLEAN', false, 1, false);
        $this->addColumn('urgent', 'Urgent', 'BOOLEAN', false, 1, false);
        $this->addColumn('orgStructure_id', 'OrgstructureId', 'INTEGER', false, null, null);
        $this->addColumn('uuid_id', 'UuidId', 'INTEGER', true, null, 0);
        $this->addColumn('lpu_transfer', 'LpuTransfer', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbacheresult', 'Webmis\\Models\\Rbacheresult', RelationMap::MANY_TO_ONE, array('rbAcheResult_id' => 'id', ), null, null);
        $this->addRelation('Rbmesspecification', 'Webmis\\Models\\Rbmesspecification', RelationMap::MANY_TO_ONE, array('mesSpecification_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Tissue', 'Webmis\\Models\\Tissue', RelationMap::ONE_TO_MANY, array('id' => 'event_id', ), null, null, 'Tissues');
    } // buildRelations()

} // EventTableMap
