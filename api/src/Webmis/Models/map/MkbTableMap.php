<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'MKB' table.
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
class MkbTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.MkbTableMap';

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
        $this->setName('MKB');
        $this->setPhpName('Mkb');
        $this->setClassname('Webmis\\Models\\Mkb');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ClassID', 'Classid', 'VARCHAR', true, 8, null);
        $this->addColumn('ClassName', 'Classname', 'VARCHAR', true, 150, null);
        $this->addColumn('BlockID', 'Blockid', 'VARCHAR', true, 9, null);
        $this->addColumn('BlockName', 'Blockname', 'VARCHAR', true, 160, null);
        $this->addColumn('DiagID', 'Diagid', 'VARCHAR', true, 8, null);
        $this->addColumn('DiagName', 'Diagname', 'VARCHAR', true, 160, null);
        $this->addColumn('Prim', 'Prim', 'VARCHAR', true, 1, null);
        $this->addColumn('sex', 'Sex', 'BOOLEAN', true, 1, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 12, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('characters', 'Characters', 'TINYINT', true, null, null);
        $this->addColumn('duration', 'Duration', 'INTEGER', true, 4, null);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        $this->addColumn('MKBSubclass_id', 'MkbsubclassId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MkbQuotatypePacientmodel', 'Webmis\\Models\\MkbQuotatypePacientmodel', RelationMap::ONE_TO_MANY, array('id' => 'MKB_id', ), null, null, 'MkbQuotatypePacientmodels');
    } // buildRelations()

} // MkbTableMap
