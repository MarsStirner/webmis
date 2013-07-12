<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Contract_Tariff' table.
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
class ContractTariffTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ContractTariffTableMap';

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
        $this->setName('Contract_Tariff');
        $this->setPhpName('ContractTariff');
        $this->setClassname('Webmis\\Models\\ContractTariff');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', true, null, null);
        $this->addColumn('eventType_id', 'EventtypeId', 'INTEGER', false, null, null);
        $this->addColumn('tariffType', 'Tarifftype', 'BOOLEAN', true, 1, null);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        $this->addColumn('tariffCategory_id', 'TariffcategoryId', 'INTEGER', false, null, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', true, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('unit_id', 'UnitId', 'INTEGER', false, null, null);
        $this->addColumn('amount', 'Amount', 'DOUBLE', true, null, null);
        $this->addColumn('uet', 'Uet', 'DOUBLE', true, null, 0);
        $this->addColumn('price', 'Price', 'DOUBLE', true, null, 0);
        $this->addColumn('limitationExceedMode', 'Limitationexceedmode', 'INTEGER', true, null, 0);
        $this->addColumn('limitation', 'Limitation', 'DOUBLE', true, null, 0);
        $this->addColumn('priceEx', 'Priceex', 'DOUBLE', true, null, 0);
        $this->addColumn('MKB', 'Mkb', 'VARCHAR', true, 8, null);
        $this->addForeignKey('rbServiceFinance_id', 'RbservicefinanceId', 'INTEGER', 'rbServiceFinance', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbservicefinance', 'Webmis\\Models\\Rbservicefinance', RelationMap::MANY_TO_ONE, array('rbServiceFinance_id' => 'id', ), null, null);
    } // buildRelations()

} // ContractTariffTableMap
