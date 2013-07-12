<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Tissue' table.
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
class TissueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TissueTableMap';

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
        $this->setName('Tissue');
        $this->setPhpName('Tissue');
        $this->setClassname('Webmis\\Models\\Tissue');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('type_id', 'TypeId', 'INTEGER', 'rbTissueType', 'id', true, null, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', true, 255, null);
        $this->addForeignKey('event_id', 'EventId', 'INTEGER', 'Event', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Event', 'Webmis\\Models\\Event', RelationMap::MANY_TO_ONE, array('event_id' => 'id', ), null, null);
        $this->addRelation('Rbtissuetype', 'Webmis\\Models\\Rbtissuetype', RelationMap::MANY_TO_ONE, array('type_id' => 'id', ), null, null);
        $this->addRelation('Actiontissue', 'Webmis\\Models\\Actiontissue', RelationMap::ONE_TO_MANY, array('id' => 'tissue_id', ), null, null, 'Actiontissues');
    } // buildRelations()

} // TissueTableMap
