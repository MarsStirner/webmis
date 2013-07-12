<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Job_Ticket' table.
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
class JobTicketTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.JobTicketTableMap';

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
        $this->setName('Job_Ticket');
        $this->setPhpName('JobTicket');
        $this->setClassname('Webmis\\Models\\JobTicket');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('datetime', 'Datetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('resTimestamp', 'Restimestamp', 'TIMESTAMP', false, null, null);
        $this->addColumn('resConnectionId', 'Resconnectionid', 'INTEGER', false, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, false);
        $this->addColumn('begDateTime', 'Begdatetime', 'TIMESTAMP', false, null, null);
        $this->addColumn('endDateTime', 'Enddatetime', 'TIMESTAMP', false, null, null);
        $this->addColumn('label', 'Label', 'VARCHAR', true, 64, '');
        $this->addColumn('note', 'Note', 'VARCHAR', true, 128, '');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // JobTicketTableMap
