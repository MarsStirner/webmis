<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Person' table.
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
class PersonTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.PersonTableMap';

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
        $this->setName('Person');
        $this->setPhpName('Person');
        $this->setClassname('Webmis\\Models\\Person');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 12, null);
        $this->addColumn('federalCode', 'Federalcode', 'VARCHAR', true, 255, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 16, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 30, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 30, null);
        $this->addColumn('patrName', 'Patrname', 'VARCHAR', true, 30, null);
        $this->addColumn('post_id', 'PostId', 'INTEGER', false, null, null);
        $this->addColumn('speciality_id', 'SpecialityId', 'INTEGER', false, null, null);
        $this->addColumn('org_id', 'OrgId', 'INTEGER', false, null, null);
        $this->addColumn('orgStructure_id', 'OrgstructureId', 'INTEGER', false, null, null);
        $this->addColumn('office', 'Office', 'VARCHAR', true, 8, null);
        $this->addColumn('office2', 'Office2', 'VARCHAR', true, 8, null);
        $this->addColumn('tariffCategory_id', 'TariffcategoryId', 'INTEGER', false, null, null);
        $this->addColumn('finance_id', 'FinanceId', 'INTEGER', false, null, null);
        $this->addColumn('retireDate', 'Retiredate', 'DATE', false, null, null);
        $this->addColumn('ambPlan', 'Ambplan', 'SMALLINT', true, 4, null);
        $this->addColumn('ambPlan2', 'Ambplan2', 'SMALLINT', true, 4, null);
        $this->addColumn('ambNorm', 'Ambnorm', 'SMALLINT', true, 4, null);
        $this->addColumn('homPlan', 'Homplan', 'SMALLINT', true, 4, null);
        $this->addColumn('homPlan2', 'Homplan2', 'SMALLINT', true, 4, null);
        $this->addColumn('homNorm', 'Homnorm', 'SMALLINT', true, 4, null);
        $this->addColumn('expPlan', 'Expplan', 'SMALLINT', true, 4, null);
        $this->addColumn('expNorm', 'Expnorm', 'SMALLINT', true, 4, null);
        $this->addColumn('login', 'Login', 'VARCHAR', true, 32, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 32, null);
        $this->addColumn('userProfile_id', 'UserprofileId', 'INTEGER', false, null, null);
        $this->addColumn('retired', 'Retired', 'BOOLEAN', true, 1, null);
        $this->addColumn('birthDate', 'Birthdate', 'DATE', true, null, null);
        $this->addColumn('birthPlace', 'Birthplace', 'VARCHAR', true, 64, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('SNILS', 'Snils', 'CHAR', true, 11, null);
        $this->addColumn('INN', 'Inn', 'CHAR', true, 15, null);
        $this->addColumn('availableForExternal', 'Availableforexternal', 'INTEGER', true, 1, 1);
        $this->addColumn('primaryQuota', 'Primaryquota', 'SMALLINT', true, 4, 50);
        $this->addColumn('ownQuota', 'Ownquota', 'SMALLINT', true, 4, 25);
        $this->addColumn('consultancyQuota', 'Consultancyquota', 'SMALLINT', true, 4, 25);
        $this->addColumn('externalQuota', 'Externalquota', 'SMALLINT', true, 4, 10);
        $this->addColumn('lastAccessibleTimelineDate', 'Lastaccessibletimelinedate', 'DATE', false, null, null);
        $this->addColumn('timelineAccessibleDays', 'Timelineaccessibledays', 'INTEGER', true, null, 0);
        $this->addColumn('typeTimeLinePerson', 'Typetimelineperson', 'INTEGER', true, null, null);
        $this->addColumn('maxOverQueue', 'Maxoverqueue', 'TINYINT', false, null, 0);
        $this->addColumn('maxCito', 'Maxcito', 'TINYINT', false, null, 0);
        $this->addColumn('quotUnit', 'Quotunit', 'TINYINT', false, null, 0);
        $this->addColumn('academicdegree_id', 'AcademicdegreeId', 'INTEGER', false, null, null);
        $this->addColumn('academicTitle_id', 'AcademictitleId', 'INTEGER', false, null, null);
        $this->addColumn('uuid_id', 'UuidId', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ActionpropertyPerson', 'Webmis\\Models\\ActionpropertyPerson', RelationMap::ONE_TO_MANY, array('id' => 'value', ), 'CASCADE', 'CASCADE', 'ActionpropertyPersons');
        $this->addRelation('Actiontype', 'Webmis\\Models\\Actiontype', RelationMap::ONE_TO_MANY, array('id' => 'defaultExecPerson_id', ), 'SET NULL', null, 'Actiontypes');
        $this->addRelation('BlankactionsMovingRelatedByCreatepersonId', 'Webmis\\Models\\BlankactionsMoving', RelationMap::ONE_TO_MANY, array('id' => 'createPerson_id', ), null, null, 'BlankactionsMovingsRelatedByCreatepersonId');
        $this->addRelation('BlankactionsMovingRelatedByModifypersonId', 'Webmis\\Models\\BlankactionsMoving', RelationMap::ONE_TO_MANY, array('id' => 'modifyPerson_id', ), null, null, 'BlankactionsMovingsRelatedByModifypersonId');
        $this->addRelation('BlankactionsMovingRelatedByPersonId', 'Webmis\\Models\\BlankactionsMoving', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), null, null, 'BlankactionsMovingsRelatedByPersonId');
        $this->addRelation('BlankactionsPartyRelatedByCreatepersonId', 'Webmis\\Models\\BlankactionsParty', RelationMap::ONE_TO_MANY, array('id' => 'createPerson_id', ), null, null, 'BlankactionsPartysRelatedByCreatepersonId');
        $this->addRelation('BlankactionsPartyRelatedByModifypersonId', 'Webmis\\Models\\BlankactionsParty', RelationMap::ONE_TO_MANY, array('id' => 'modifyPerson_id', ), null, null, 'BlankactionsPartysRelatedByModifypersonId');
        $this->addRelation('BlankactionsPartyRelatedByPersonId', 'Webmis\\Models\\BlankactionsParty', RelationMap::ONE_TO_MANY, array('id' => 'person_id', ), null, null, 'BlankactionsPartysRelatedByPersonId');
        $this->addRelation('Notificationoccurred', 'Webmis\\Models\\Notificationoccurred', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), 'CASCADE', 'CASCADE', 'Notificationoccurreds');
        $this->addRelation('PersonTimetemplateRelatedByCreatepersonId', 'Webmis\\Models\\PersonTimetemplate', RelationMap::ONE_TO_MANY, array('id' => 'createPerson_id', ), null, null, 'PersonTimetemplatesRelatedByCreatepersonId');
        $this->addRelation('PersonTimetemplateRelatedByMasterId', 'Webmis\\Models\\PersonTimetemplate', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), null, null, 'PersonTimetemplatesRelatedByMasterId');
        $this->addRelation('PersonTimetemplateRelatedByModifypersonId', 'Webmis\\Models\\PersonTimetemplate', RelationMap::ONE_TO_MANY, array('id' => 'modifyPerson_id', ), null, null, 'PersonTimetemplatesRelatedByModifypersonId');
        $this->addRelation('StockmotionRelatedByCreatepersonId', 'Webmis\\Models\\Stockmotion', RelationMap::ONE_TO_MANY, array('id' => 'createPerson_id', ), null, 'CASCADE', 'StockmotionsRelatedByCreatepersonId');
        $this->addRelation('StockmotionRelatedByModifypersonId', 'Webmis\\Models\\Stockmotion', RelationMap::ONE_TO_MANY, array('id' => 'modifyPerson_id', ), null, 'CASCADE', 'StockmotionsRelatedByModifypersonId');
        $this->addRelation('StockmotionRelatedByReceiverpersonId', 'Webmis\\Models\\Stockmotion', RelationMap::ONE_TO_MANY, array('id' => 'receiverPerson_id', ), 'SET NULL', 'CASCADE', 'StockmotionsRelatedByReceiverpersonId');
        $this->addRelation('StockmotionRelatedBySupplierpersonId', 'Webmis\\Models\\Stockmotion', RelationMap::ONE_TO_MANY, array('id' => 'supplierPerson_id', ), 'SET NULL', 'CASCADE', 'StockmotionsRelatedBySupplierpersonId');
        $this->addRelation('StockrecipeRelatedByCreatepersonId', 'Webmis\\Models\\Stockrecipe', RelationMap::ONE_TO_MANY, array('id' => 'createPerson_id', ), null, 'CASCADE', 'StockrecipesRelatedByCreatepersonId');
        $this->addRelation('StockrecipeRelatedByModifypersonId', 'Webmis\\Models\\Stockrecipe', RelationMap::ONE_TO_MANY, array('id' => 'modifyPerson_id', ), null, 'CASCADE', 'StockrecipesRelatedByModifypersonId');
        $this->addRelation('StockrequisitionRelatedByCreatepersonId', 'Webmis\\Models\\Stockrequisition', RelationMap::ONE_TO_MANY, array('id' => 'createPerson_id', ), 'SET NULL', 'CASCADE', 'StockrequisitionsRelatedByCreatepersonId');
        $this->addRelation('StockrequisitionRelatedByModifypersonId', 'Webmis\\Models\\Stockrequisition', RelationMap::ONE_TO_MANY, array('id' => 'modifyPerson_id', ), 'SET NULL', 'CASCADE', 'StockrequisitionsRelatedByModifypersonId');
        $this->addRelation('Takentissuejournal', 'Webmis\\Models\\Takentissuejournal', RelationMap::ONE_TO_MANY, array('id' => 'execPerson_id', ), 'SET NULL', null, 'Takentissuejournals');
    } // buildRelations()

} // PersonTableMap
