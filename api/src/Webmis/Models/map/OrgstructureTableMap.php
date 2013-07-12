<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'OrgStructure' table.
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
class OrgstructureTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.OrgstructureTableMap';

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
        $this->setName('OrgStructure');
        $this->setPhpName('Orgstructure');
        $this->setClassname('Webmis\\Models\\Orgstructure');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('organisation_id', 'OrganisationId', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', false, null, null);
        $this->addColumn('type', 'Type', 'INTEGER', true, null, 0);
        $this->addColumn('net_id', 'NetId', 'INTEGER', false, null, null);
        $this->addColumn('isArea', 'Isarea', 'TINYINT', true, null, 0);
        $this->addColumn('hasHospitalBeds', 'Hashospitalbeds', 'BOOLEAN', true, 1, false);
        $this->addColumn('hasStocks', 'Hasstocks', 'BOOLEAN', true, 1, false);
        $this->addColumn('infisCode', 'Infiscode', 'VARCHAR', true, 16, null);
        $this->addColumn('infisInternalCode', 'Infisinternalcode', 'VARCHAR', true, 16, null);
        $this->addColumn('infisDepTypeCode', 'Infisdeptypecode', 'VARCHAR', true, 16, null);
        $this->addColumn('infisTariffCode', 'Infistariffcode', 'VARCHAR', true, 16, null);
        $this->addColumn('availableForExternal', 'Availableforexternal', 'INTEGER', true, 1, 1);
        $this->addColumn('Address', 'Address', 'VARCHAR', true, 255, null);
        $this->addColumn('inheritEventTypes', 'Inheriteventtypes', 'BOOLEAN', true, 1, false);
        $this->addColumn('inheritActionTypes', 'Inheritactiontypes', 'BOOLEAN', true, 1, false);
        $this->addColumn('inheritGaps', 'Inheritgaps', 'BOOLEAN', true, 1, false);
        $this->addColumn('uuid_id', 'UuidId', 'INTEGER', true, null, 0);
        $this->addColumn('show', 'Show', 'INTEGER', true, null, 1);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BlankactionsMoving', 'Webmis\\Models\\BlankactionsMoving', RelationMap::ONE_TO_MANY, array('id' => 'orgStructure_id', ), null, null, 'BlankactionsMovings');
        $this->addRelation('OrgstructureDisabledattendance', 'Webmis\\Models\\OrgstructureDisabledattendance', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', 'CASCADE', 'OrgstructureDisabledattendances');
        $this->addRelation('OrgstructureStock', 'Webmis\\Models\\OrgstructureStock', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', 'CASCADE', 'OrgstructureStocks');
        $this->addRelation('StockmotionRelatedByReceiverId', 'Webmis\\Models\\Stockmotion', RelationMap::ONE_TO_MANY, array('id' => 'receiver_id', ), null, 'CASCADE', 'StockmotionsRelatedByReceiverId');
        $this->addRelation('StockmotionRelatedBySupplierId', 'Webmis\\Models\\Stockmotion', RelationMap::ONE_TO_MANY, array('id' => 'supplier_id', ), null, 'CASCADE', 'StockmotionsRelatedBySupplierId');
        $this->addRelation('StockrequisitionRelatedByRecipientId', 'Webmis\\Models\\Stockrequisition', RelationMap::ONE_TO_MANY, array('id' => 'recipient_id', ), null, 'CASCADE', 'StockrequisitionsRelatedByRecipientId');
        $this->addRelation('StockrequisitionRelatedBySupplierId', 'Webmis\\Models\\Stockrequisition', RelationMap::ONE_TO_MANY, array('id' => 'supplier_id', ), null, 'CASCADE', 'StockrequisitionsRelatedBySupplierId');
        $this->addRelation('StocktransRelatedByCreorgstructureId', 'Webmis\\Models\\Stocktrans', RelationMap::ONE_TO_MANY, array('id' => 'creOrgStructure_id', ), null, null, 'StocktranssRelatedByCreorgstructureId');
        $this->addRelation('StocktransRelatedByDeborgstructureId', 'Webmis\\Models\\Stocktrans', RelationMap::ONE_TO_MANY, array('id' => 'debOrgStructure_id', ), null, null, 'StocktranssRelatedByDeborgstructureId');
    } // buildRelations()

} // OrgstructureTableMap
