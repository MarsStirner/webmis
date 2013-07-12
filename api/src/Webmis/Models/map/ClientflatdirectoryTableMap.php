<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ClientFlatDirectory' table.
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
class ClientflatdirectoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ClientflatdirectoryTableMap';

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
        $this->setName('ClientFlatDirectory');
        $this->setPhpName('Clientflatdirectory');
        $this->setClassname('Webmis\\Models\\Clientflatdirectory');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('clientFDProperty_id', 'ClientfdpropertyId', 'INTEGER', 'ClientFDProperty', 'id', true, 10, null);
        $this->addForeignKey('fdRecord_id', 'FdrecordId', 'INTEGER', 'FDRecord', 'id', true, 10, null);
        $this->addColumn('dateStart', 'Datestart', 'TIMESTAMP', false, null, null);
        $this->addColumn('dateEnd', 'Dateend', 'TIMESTAMP', false, null, null);
        $this->addColumn('createDateTime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', true, 10, null);
        $this->addColumn('modifyDateTime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, 10, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, null);
        $this->addForeignKey('client_id', 'ClientId', 'INTEGER', 'Client', 'id', true, null, null);
        $this->addColumn('comment', 'Comment', 'CLOB', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Webmis\\Models\\Client', RelationMap::MANY_TO_ONE, array('client_id' => 'id', ), null, null);
        $this->addRelation('Clientfdproperty', 'Webmis\\Models\\Clientfdproperty', RelationMap::MANY_TO_ONE, array('clientFDProperty_id' => 'id', ), null, null);
        $this->addRelation('Fdrecord', 'Webmis\\Models\\Fdrecord', RelationMap::MANY_TO_ONE, array('fdRecord_id' => 'id', ), null, null);
    } // buildRelations()

} // ClientflatdirectoryTableMap
