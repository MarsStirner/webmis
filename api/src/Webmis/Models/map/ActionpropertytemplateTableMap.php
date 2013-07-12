<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionPropertyTemplate' table.
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
class ActionpropertytemplateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActionpropertytemplateTableMap';

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
        $this->setName('ActionPropertyTemplate');
        $this->setPhpName('Actionpropertytemplate');
        $this->setClassname('Webmis\\Models\\Actionpropertytemplate');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, null);
        $this->addColumn('group_id', 'GroupId', 'INTEGER', false, null, null);
        $this->addColumn('parentCode', 'Parentcode', 'VARCHAR', true, 20, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 64, null);
        $this->addColumn('federalCode', 'Federalcode', 'VARCHAR', true, 64, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 64, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 120, null);
        $this->addColumn('abbrev', 'Abbrev', 'VARCHAR', true, 64, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ActionpropertytemplateTableMap
