<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Diagnosis' table.
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
class DiagnosisTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.DiagnosisTableMap';

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
        $this->setName('Diagnosis');
        $this->setPhpName('Diagnosis');
        $this->setClassname('Webmis\\Models\\Diagnosis');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('client_id', 'ClientId', 'INTEGER', true, null, null);
        $this->addColumn('diagnosisType_id', 'DiagnosistypeId', 'INTEGER', true, null, null);
        $this->addColumn('character_id', 'CharacterId', 'INTEGER', false, null, null);
        $this->addColumn('MKB', 'Mkb', 'VARCHAR', true, 8, null);
        $this->addColumn('MKBEx', 'Mkbex', 'VARCHAR', true, 8, null);
        $this->addColumn('dispanser_id', 'DispanserId', 'INTEGER', false, null, null);
        $this->addColumn('traumaType_id', 'TraumatypeId', 'INTEGER', false, null, null);
        $this->addColumn('setDate', 'Setdate', 'DATE', false, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', true, null, null);
        $this->addColumn('mod_id', 'ModId', 'INTEGER', false, null, null);
        $this->addColumn('person_id', 'PersonId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // DiagnosisTableMap
