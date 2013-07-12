<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionProperty' table.
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
class ActionpropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActionpropertyTableMap';

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
        $this->setName('ActionProperty');
        $this->setPhpName('Actionproperty');
        $this->setClassname('Webmis\\Models\\Actionproperty');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('action_id', 'ActionId', 'INTEGER', true, null, null);
        $this->addColumn('type_id', 'TypeId', 'INTEGER', true, null, null);
        $this->addColumn('unit_id', 'UnitId', 'INTEGER', false, null, null);
        $this->addColumn('norm', 'Norm', 'VARCHAR', true, 64, null);
        $this->addColumn('isAssigned', 'Isassigned', 'BOOLEAN', true, 1, false);
        $this->addColumn('evaluation', 'Evaluation', 'BOOLEAN', false, 1, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ActionpropertyHospitalbed', 'Webmis\\Models\\ActionpropertyHospitalbed', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE', 'ActionpropertyHospitalbeds');
        $this->addRelation('ActionpropertyPerson', 'Webmis\\Models\\ActionpropertyPerson', RelationMap::ONE_TO_MANY, array('id' => 'id', ), null, 'CASCADE', 'ActionpropertyPersons');
    } // buildRelations()

} // ActionpropertyTableMap
