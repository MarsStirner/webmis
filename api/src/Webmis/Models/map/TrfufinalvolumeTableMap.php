<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'trfuFinalVolume' table.
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
class TrfufinalvolumeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TrfufinalvolumeTableMap';

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
        $this->setName('trfuFinalVolume');
        $this->setPhpName('Trfufinalvolume');
        $this->setClassname('Webmis\\Models\\Trfufinalvolume');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('action_id', 'ActionId', 'INTEGER', 'Action', 'id', true, null, null);
        $this->addColumn('time', 'Time', 'DOUBLE', false, null, null);
        $this->addColumn('anticoagulantVolume', 'Anticoagulantvolume', 'DOUBLE', false, null, null);
        $this->addColumn('inletVolume', 'Inletvolume', 'DOUBLE', false, null, null);
        $this->addColumn('plasmaVolume', 'Plasmavolume', 'DOUBLE', false, null, null);
        $this->addColumn('collectVolume', 'Collectvolume', 'DOUBLE', false, null, null);
        $this->addColumn('anticoagulantInCollect', 'Anticoagulantincollect', 'DOUBLE', false, null, null);
        $this->addColumn('anticoagulantInPlasma', 'Anticoagulantinplasma', 'DOUBLE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::MANY_TO_ONE, array('action_id' => 'id', ), null, null);
    } // buildRelations()

} // TrfufinalvolumeTableMap
