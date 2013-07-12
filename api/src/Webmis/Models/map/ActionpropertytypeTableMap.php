<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionPropertyType' table.
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
class ActionpropertytypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActionpropertytypeTableMap';

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
        $this->setName('ActionPropertyType');
        $this->setPhpName('Actionpropertytype');
        $this->setClassname('Webmis\\Models\\Actionpropertytype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('actionType_id', 'ActiontypeId', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('template_id', 'TemplateId', 'INTEGER', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 128, null);
        $this->addColumn('descr', 'Descr', 'VARCHAR', true, 128, null);
        $this->addColumn('unit_id', 'UnitId', 'INTEGER', false, null, null);
        $this->addColumn('typeName', 'Typename', 'VARCHAR', true, 64, null);
        $this->addColumn('valueDomain', 'Valuedomain', 'LONGVARCHAR', true, null, null);
        $this->addColumn('defaultValue', 'Defaultvalue', 'VARCHAR', true, 5000, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 64, null);
        $this->addColumn('isVector', 'Isvector', 'BOOLEAN', true, 1, false);
        $this->addColumn('norm', 'Norm', 'VARCHAR', true, 64, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('penalty', 'Penalty', 'INTEGER', true, 3, 0);
        $this->addColumn('visibleInJobTicket', 'Visibleinjobticket', 'BOOLEAN', true, 1, false);
        $this->addColumn('isAssignable', 'Isassignable', 'BOOLEAN', true, 1, false);
        $this->addColumn('test_id', 'TestId', 'INTEGER', false, null, null);
        $this->addColumn('defaultEvaluation', 'Defaultevaluation', 'BOOLEAN', true, 1, false);
        $this->addColumn('toEpicrisis', 'Toepicrisis', 'BOOLEAN', true, 1, false);
        $this->addColumn('mandatory', 'Mandatory', 'BOOLEAN', true, 1, false);
        $this->addColumn('readOnly', 'Readonly', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ActionpropertytypeTableMap
