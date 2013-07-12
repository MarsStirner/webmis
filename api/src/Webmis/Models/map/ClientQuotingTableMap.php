<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Client_Quoting' table.
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
class ClientQuotingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ClientQuotingTableMap';

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
        $this->setName('Client_Quoting');
        $this->setPhpName('ClientQuoting');
        $this->setClassname('Webmis\\Models\\ClientQuoting');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', false, null, null);
        $this->addColumn('identifier', 'Identifier', 'VARCHAR', false, 16, null);
        $this->addColumn('quotaTicket', 'Quotaticket', 'VARCHAR', false, 20, null);
        $this->addColumn('quotaType_id', 'QuotatypeId', 'INTEGER', false, null, null);
        $this->addColumn('stage', 'Stage', 'INTEGER', false, 2, null);
        $this->addColumn('directionDate', 'Directiondate', 'TIMESTAMP', true, null, null);
        $this->addColumn('freeInput', 'Freeinput', 'VARCHAR', false, 128, null);
        $this->addColumn('org_id', 'OrgId', 'INTEGER', false, null, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, 1, 0);
        $this->addColumn('MKB', 'Mkb', 'VARCHAR', true, 8, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, 2, 0);
        $this->addColumn('request', 'Request', 'INTEGER', true, 1, 0);
        $this->addColumn('statment', 'Statment', 'VARCHAR', false, 255, null);
        $this->addColumn('dateRegistration', 'Dateregistration', 'TIMESTAMP', true, null, null);
        $this->addColumn('dateEnd', 'Dateend', 'TIMESTAMP', true, null, null);
        $this->addColumn('orgStructure_id', 'OrgstructureId', 'INTEGER', false, null, null);
        $this->addColumn('regionCode', 'Regioncode', 'VARCHAR', false, 13, null);
        $this->addColumn('pacientModel_id', 'PacientmodelId', 'INTEGER', true, null, null);
        $this->addColumn('treatment_id', 'TreatmentId', 'INTEGER', true, null, null);
        $this->addColumn('event_id', 'EventId', 'INTEGER', false, null, null);
        $this->addColumn('prevTalon_event_id', 'PrevtalonEventId', 'INTEGER', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ClientQuotingTableMap
