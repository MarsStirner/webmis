<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Organisation_Account' table.
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
class OrganisationAccountTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.OrganisationAccountTableMap';

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
        $this->setName('Organisation_Account');
        $this->setPhpName('OrganisationAccount');
        $this->setClassname('Webmis\\Models\\OrganisationAccount');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('organisation_id', 'OrganisationId', 'INTEGER', true, null, null);
        $this->addColumn('bankName', 'Bankname', 'VARCHAR', true, 128, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 20, null);
        $this->addColumn('notes', 'Notes', 'VARCHAR', true, 255, null);
        $this->addColumn('bank_id', 'BankId', 'INTEGER', true, null, null);
        $this->addColumn('cash', 'Cash', 'BOOLEAN', true, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // OrganisationAccountTableMap
