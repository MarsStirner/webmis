<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'trfuLaboratoryMeasure' table.
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
class TrfulaboratorymeasureTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TrfulaboratorymeasureTableMap';

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
        $this->setName('trfuLaboratoryMeasure');
        $this->setPhpName('Trfulaboratorymeasure');
        $this->setClassname('Webmis\\Models\\Trfulaboratorymeasure');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('action_id', 'ActionId', 'INTEGER', 'Action', 'id', true, null, null);
        $this->addForeignKey('trfu_lab_measure_id', 'TrfuLabMeasureId', 'INTEGER', 'rbTrfuLaboratoryMeasureTypes', 'id', false, null, null);
        $this->addColumn('time', 'Time', 'DOUBLE', false, null, null);
        $this->addColumn('beforeOperation', 'Beforeoperation', 'VARCHAR', false, 255, null);
        $this->addColumn('duringOperation', 'Duringoperation', 'VARCHAR', false, 255, null);
        $this->addColumn('inProduct', 'Inproduct', 'VARCHAR', false, 255, null);
        $this->addColumn('afterOperation', 'Afteroperation', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::MANY_TO_ONE, array('action_id' => 'id', ), null, null);
        $this->addRelation('Rbtrfulaboratorymeasuretypes', 'Webmis\\Models\\Rbtrfulaboratorymeasuretypes', RelationMap::MANY_TO_ONE, array('trfu_lab_measure_id' => 'id', ), null, null);
    } // buildRelations()

} // TrfulaboratorymeasureTableMap
