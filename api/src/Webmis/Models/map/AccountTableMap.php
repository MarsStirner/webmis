<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Account' table.
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
class AccountTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.AccountTableMap';

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
        $this->setName('Account');
        $this->setPhpName('Account');
        $this->setClassname('Webmis\\Models\\Account');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('contract_id', 'ContractId', 'INTEGER', true, null, null);
        $this->addColumn('orgStructure_id', 'OrgstructureId', 'INTEGER', false, null, null);
        $this->addColumn('payer_id', 'PayerId', 'INTEGER', true, null, null);
        $this->addColumn('settleDate', 'Settledate', 'DATE', true, null, null);
        $this->addColumn('number', 'Number', 'VARCHAR', true, 20, null);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('amount', 'Amount', 'DOUBLE', true, null, 0);
        $this->addColumn('uet', 'Uet', 'DOUBLE', true, null, 0);
        $this->addColumn('sum', 'Sum', 'DOUBLE', true, null, 0);
        $this->addColumn('exposeDate', 'Exposedate', 'DATE', false, null, null);
        $this->addColumn('payedAmount', 'Payedamount', 'DOUBLE', true, null, null);
        $this->addColumn('payedSum', 'Payedsum', 'DOUBLE', true, null, null);
        $this->addColumn('refusedAmount', 'Refusedamount', 'DOUBLE', true, null, null);
        $this->addColumn('refusedSum', 'Refusedsum', 'DOUBLE', true, null, null);
        $this->addColumn('format_id', 'FormatId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // AccountTableMap
