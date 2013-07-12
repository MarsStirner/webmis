<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTrfuLaboratoryMeasureTypes' table.
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
class RbtrfulaboratorymeasuretypesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtrfulaboratorymeasuretypesTableMap';

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
        $this->setName('rbTrfuLaboratoryMeasureTypes');
        $this->setPhpName('Rbtrfulaboratorymeasuretypes');
        $this->setClassname('Webmis\\Models\\Rbtrfulaboratorymeasuretypes');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('trfu_id', 'TrfuId', 'INTEGER', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Trfulaboratorymeasure', 'Webmis\\Models\\Trfulaboratorymeasure', RelationMap::ONE_TO_MANY, array('id' => 'trfu_lab_measure_id', ), null, null, 'Trfulaboratorymeasures');
    } // buildRelations()

} // RbtrfulaboratorymeasuretypesTableMap
