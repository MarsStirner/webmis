<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Client' table.
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
class ClientTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ClientTableMap';

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
        $this->setName('Client');
        $this->setPhpName('Client');
        $this->setClassname('Webmis\\Models\\Client');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 30, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 30, null);
        $this->addColumn('patrName', 'Patrname', 'VARCHAR', true, 30, null);
        $this->addColumn('birthDate', 'Birthdate', 'DATE', true, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('SNILS', 'Snils', 'CHAR', true, 11, null);
        $this->addColumn('bloodType_id', 'BloodtypeId', 'INTEGER', false, null, null);
        $this->addColumn('bloodDate', 'Blooddate', 'DATE', false, null, null);
        $this->addColumn('bloodNotes', 'Bloodnotes', 'VARCHAR', true, 255, null);
        $this->addColumn('growth', 'Growth', 'VARCHAR', true, 16, null);
        $this->addColumn('weight', 'Weight', 'VARCHAR', true, 16, null);
        $this->addColumn('notes', 'Notes', 'VARCHAR', true, 255, null);
        $this->addColumn('version', 'Version', 'INTEGER', true, 10, null);
        $this->addColumn('birthPlace', 'Birthplace', 'VARCHAR', true, 128, '');
        $this->addColumn('uuid_id', 'UuidId', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Clientflatdirectory', 'Webmis\\Models\\Clientflatdirectory', RelationMap::ONE_TO_MANY, array('id' => 'client_id', ), null, null, 'Clientflatdirectorys');
        $this->addRelation('Patientstohs', 'Webmis\\Models\\Patientstohs', RelationMap::ONE_TO_ONE, array('id' => 'client_id', ), null, null);
        $this->addRelation('Takentissuejournal', 'Webmis\\Models\\Takentissuejournal', RelationMap::ONE_TO_MANY, array('id' => 'client_id', ), 'CASCADE', null, 'Takentissuejournals');
    } // buildRelations()

} // ClientTableMap
