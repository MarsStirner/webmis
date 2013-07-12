<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'PatientsToHS' table.
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
class PatientstohsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.PatientstohsTableMap';

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
        $this->setName('PatientsToHS');
        $this->setPhpName('Patientstohs');
        $this->setClassname('Webmis\\Models\\Patientstohs');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('client_id', 'ClientId', 'INTEGER' , 'Client', 'id', true, null, null);
        $this->addColumn('sendTime', 'Sendtime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('errCount', 'Errcount', 'INTEGER', true, null, 0);
        $this->addColumn('info', 'Info', 'VARCHAR', false, 1024, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Webmis\\Models\\Client', RelationMap::MANY_TO_ONE, array('client_id' => 'id', ), null, null);
    } // buildRelations()

} // PatientstohsTableMap
