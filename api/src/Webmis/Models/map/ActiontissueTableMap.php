<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ActionTissue' table.
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
class ActiontissueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActiontissueTableMap';

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
        $this->setName('ActionTissue');
        $this->setPhpName('Actiontissue');
        $this->setClassname('Webmis\\Models\\Actiontissue');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('action_id', 'ActionId', 'INTEGER' , 'Action', 'id', true, null, null);
        $this->addForeignPrimaryKey('tissue_id', 'TissueId', 'INTEGER' , 'Tissue', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::MANY_TO_ONE, array('action_id' => 'id', ), null, null);
        $this->addRelation('Tissue', 'Webmis\\Models\\Tissue', RelationMap::MANY_TO_ONE, array('tissue_id' => 'id', ), null, null);
    } // buildRelations()

} // ActiontissueTableMap
