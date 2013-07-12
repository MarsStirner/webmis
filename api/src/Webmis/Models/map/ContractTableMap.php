<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Contract' table.
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
class ContractTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ContractTableMap';

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
        $this->setName('Contract');
        $this->setPhpName('Contract');
        $this->setClassname('Webmis\\Models\\Contract');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('number', 'Number', 'VARCHAR', true, 64, null);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('recipient_id', 'RecipientId', 'INTEGER', true, null, null);
        $this->addColumn('recipientAccount_id', 'RecipientaccountId', 'INTEGER', false, null, null);
        $this->addColumn('recipientKBK', 'Recipientkbk', 'VARCHAR', true, 30, null);
        $this->addColumn('payer_id', 'PayerId', 'INTEGER', false, null, null);
        $this->addColumn('payerAccount_id', 'PayeraccountId', 'INTEGER', false, null, null);
        $this->addColumn('payerKBK', 'Payerkbk', 'VARCHAR', true, 30, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', true, null, null);
        $this->addColumn('finance_id', 'FinanceId', 'INTEGER', true, null, null);
        $this->addColumn('grouping', 'Grouping', 'VARCHAR', true, 64, null);
        $this->addColumn('resolution', 'Resolution', 'VARCHAR', true, 64, null);
        $this->addColumn('format_id', 'FormatId', 'INTEGER', false, null, null);
        $this->addColumn('exposeUnfinishedEventVisits', 'Exposeunfinishedeventvisits', 'BOOLEAN', true, 1, false);
        $this->addColumn('exposeUnfinishedEventActions', 'Exposeunfinishedeventactions', 'BOOLEAN', true, 1, false);
        $this->addColumn('visitExposition', 'Visitexposition', 'BOOLEAN', true, 1, false);
        $this->addColumn('actionExposition', 'Actionexposition', 'BOOLEAN', true, 1, false);
        $this->addColumn('exposeDiscipline', 'Exposediscipline', 'BOOLEAN', true, 1, false);
        $this->addColumn('priceList_id', 'PricelistId', 'INTEGER', false, null, null);
        $this->addColumn('coefficient', 'Coefficient', 'DOUBLE', true, null, 0);
        $this->addColumn('coefficientEx', 'Coefficientex', 'DOUBLE', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ContractTableMap
