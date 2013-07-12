<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'TempInvalidDuplicate' table.
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
class TempinvalidduplicateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TempinvalidduplicateTableMap';

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
        $this->setName('TempInvalidDuplicate');
        $this->setPhpName('Tempinvalidduplicate');
        $this->setClassname('Webmis\\Models\\Tempinvalidduplicate');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, null);
        $this->addColumn('tempInvalid_id', 'TempinvalidId', 'INTEGER', true, null, null);
        $this->addColumn('person_id', 'PersonId', 'INTEGER', false, null, null);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('serial', 'Serial', 'VARCHAR', true, 8, null);
        $this->addColumn('number', 'Number', 'VARCHAR', true, 16, null);
        $this->addColumn('destination', 'Destination', 'VARCHAR', true, 128, null);
        $this->addColumn('reason_id', 'ReasonId', 'INTEGER', false, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', true, 255, null);
        $this->addColumn('insuranceOfficeMark', 'Insuranceofficemark', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // TempinvalidduplicateTableMap
