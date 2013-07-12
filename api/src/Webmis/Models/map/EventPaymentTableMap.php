<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Event_Payment' table.
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
class EventPaymentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.EventPaymentTableMap';

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
        $this->setName('Event_Payment');
        $this->setPhpName('EventPayment');
        $this->setClassname('Webmis\\Models\\EventPayment');
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
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addForeignKey('cashOperation_id', 'CashoperationId', 'INTEGER', 'rbCashOperation', 'id', false, null, null);
        $this->addColumn('sum', 'Sum', 'DOUBLE', true, null, null);
        $this->addColumn('typePayment', 'Typepayment', 'BOOLEAN', true, 1, null);
        $this->addColumn('settlementAccount', 'Settlementaccount', 'VARCHAR', false, 64, null);
        $this->addColumn('bank_id', 'BankId', 'INTEGER', false, null, null);
        $this->addColumn('numberCreditCard', 'Numbercreditcard', 'VARCHAR', false, 64, null);
        $this->addColumn('cashBox', 'Cashbox', 'VARCHAR', true, 32, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbcashoperation', 'Webmis\\Models\\Rbcashoperation', RelationMap::MANY_TO_ONE, array('cashOperation_id' => 'id', ), null, null);
    } // buildRelations()

} // EventPaymentTableMap
