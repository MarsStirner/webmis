<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Event_LocalContract' table.
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
class EventLocalcontractTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.EventLocalcontractTableMap';

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
        $this->setName('Event_LocalContract');
        $this->setPhpName('EventLocalcontract');
        $this->setClassname('Webmis\\Models\\EventLocalcontract');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, null);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('coordDate', 'Coorddate', 'TIMESTAMP', false, null, null);
        $this->addColumn('coordAgent', 'Coordagent', 'VARCHAR', true, 128, '');
        $this->addColumn('coordInspector', 'Coordinspector', 'VARCHAR', true, 128, '');
        $this->addColumn('coordText', 'Coordtext', 'VARCHAR', true, 255, null);
        $this->addColumn('dateContract', 'Datecontract', 'DATE', true, null, null);
        $this->addColumn('numberContract', 'Numbercontract', 'VARCHAR', true, 64, null);
        $this->addColumn('sumLimit', 'Sumlimit', 'DOUBLE', true, null, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 30, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 30, null);
        $this->addColumn('patrName', 'Patrname', 'VARCHAR', true, 30, null);
        $this->addColumn('birthDate', 'Birthdate', 'DATE', true, null, null);
        $this->addColumn('documentType_id', 'DocumenttypeId', 'INTEGER', false, null, null);
        $this->addColumn('serialLeft', 'Serialleft', 'VARCHAR', true, 8, null);
        $this->addColumn('serialRight', 'Serialright', 'VARCHAR', true, 8, null);
        $this->addColumn('number', 'Number', 'VARCHAR', true, 16, null);
        $this->addColumn('regAddress', 'Regaddress', 'VARCHAR', true, 64, null);
        $this->addColumn('org_id', 'OrgId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // EventLocalcontractTableMap
