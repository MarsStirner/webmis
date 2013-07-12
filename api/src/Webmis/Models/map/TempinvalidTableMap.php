<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'TempInvalid' table.
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
class TempinvalidTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TempinvalidTableMap';

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
        $this->setName('TempInvalid');
        $this->setPhpName('Tempinvalid');
        $this->setClassname('Webmis\\Models\\Tempinvalid');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('type', 'Type', 'TINYINT', true, 2, 0);
        $this->addColumn('doctype', 'Doctype', 'TINYINT', true, null, null);
        $this->addColumn('doctype_id', 'DoctypeId', 'INTEGER', false, null, null);
        $this->addColumn('serial', 'Serial', 'VARCHAR', true, 8, null);
        $this->addColumn('number', 'Number', 'VARCHAR', true, 16, null);
        $this->addColumn('client_id', 'ClientId', 'INTEGER', true, null, null);
        $this->addColumn('tempInvalidReason_id', 'TempinvalidreasonId', 'INTEGER', false, null, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', true, null, null);
        $this->addColumn('person_id', 'PersonId', 'INTEGER', false, null, null);
        $this->addColumn('diagnosis_id', 'DiagnosisId', 'INTEGER', false, null, null);
        $this->addColumn('sex', 'Sex', 'BOOLEAN', true, 1, null);
        $this->addColumn('age', 'Age', 'TINYINT', true, 3, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('notes', 'Notes', 'VARCHAR', true, 255, null);
        $this->addColumn('duration', 'Duration', 'INTEGER', true, 4, null);
        $this->addColumn('closed', 'Closed', 'BOOLEAN', true, 1, null);
        $this->addColumn('prev_id', 'PrevId', 'INTEGER', false, null, null);
        $this->addColumn('insuranceOfficeMark', 'Insuranceofficemark', 'INTEGER', true, null, 0);
        $this->addColumn('caseBegDate', 'Casebegdate', 'DATE', true, null, null);
        $this->addColumn('event_id', 'EventId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // TempinvalidTableMap
