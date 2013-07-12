<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ClientFDProperty' table.
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
class ClientfdpropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ClientfdpropertyTableMap';

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
        $this->setName('ClientFDProperty');
        $this->setPhpName('Clientfdproperty');
        $this->setClassname('Webmis\\Models\\Clientfdproperty');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('flatDirectory_id', 'FlatdirectoryId', 'INTEGER', 'FlatDirectory', 'id', true, 10, null);
        $this->addColumn('name', 'Name', 'CLOB', true, null, null);
        $this->addColumn('description', 'Description', 'CLOB', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Flatdirectory', 'Webmis\\Models\\Flatdirectory', RelationMap::MANY_TO_ONE, array('flatDirectory_id' => 'id', ), null, null);
        $this->addRelation('Clientflatdirectory', 'Webmis\\Models\\Clientflatdirectory', RelationMap::ONE_TO_MANY, array('id' => 'clientFDProperty_id', ), null, null, 'Clientflatdirectorys');
    } // buildRelations()

} // ClientfdpropertyTableMap
