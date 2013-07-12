<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'EventType_Diagnostic' table.
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
class EventtypeDiagnosticTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.EventtypeDiagnosticTableMap';

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
        $this->setName('EventType_Diagnostic');
        $this->setPhpName('EventtypeDiagnostic');
        $this->setClassname('Webmis\\Models\\EventtypeDiagnostic');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('eventType_id', 'EventtypeId', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addColumn('speciality_id', 'SpecialityId', 'INTEGER', false, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('defaultHealthGroup_id', 'DefaulthealthgroupId', 'INTEGER', false, null, null);
        $this->addColumn('defaultMKB', 'Defaultmkb', 'VARCHAR', true, 5, null);
        $this->addColumn('defaultDispanser_id', 'DefaultdispanserId', 'INTEGER', false, null, null);
        $this->addColumn('selectionGroup', 'Selectiongroup', 'TINYINT', true, null, 0);
        $this->addColumn('actuality', 'Actuality', 'TINYINT', true, null, null);
        $this->addColumn('visitType_id', 'VisittypeId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // EventtypeDiagnosticTableMap
