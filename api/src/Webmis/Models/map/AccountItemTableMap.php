<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Account_Item' table.
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
class AccountItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.AccountItemTableMap';

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
        $this->setName('Account_Item');
        $this->setPhpName('AccountItem');
        $this->setClassname('Webmis\\Models\\AccountItem');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('serviceDate', 'Servicedate', 'DATE', false, null, '0000-00-00');
        $this->addColumn('event_id', 'EventId', 'INTEGER', false, null, null);
        $this->addColumn('visit_id', 'VisitId', 'INTEGER', false, null, null);
        $this->addColumn('action_id', 'ActionId', 'INTEGER', false, null, null);
        $this->addColumn('price', 'Price', 'DOUBLE', true, null, null);
        $this->addColumn('unit_id', 'UnitId', 'INTEGER', false, null, null);
        $this->addColumn('amount', 'Amount', 'DOUBLE', true, null, 0);
        $this->addColumn('uet', 'Uet', 'DOUBLE', true, null, 0);
        $this->addColumn('sum', 'Sum', 'DOUBLE', true, null, 0);
        $this->addColumn('date', 'Date', 'DATE', false, null, null);
        $this->addColumn('number', 'Number', 'VARCHAR', true, 20, null);
        $this->addColumn('refuseType_id', 'RefusetypeId', 'INTEGER', false, null, null);
        $this->addColumn('reexposeItem_id', 'ReexposeitemId', 'INTEGER', false, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', true, 256, null);
        $this->addColumn('tariff_id', 'TariffId', 'INTEGER', false, null, null);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // AccountItemTableMap
