<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'NotificationOccurred' table.
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
class NotificationoccurredTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.NotificationoccurredTableMap';

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
        $this->setName('NotificationOccurred');
        $this->setPhpName('Notificationoccurred');
        $this->setClassname('Webmis\\Models\\Notificationoccurred');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('eventDatetime', 'Eventdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('clientId', 'Clientid', 'INTEGER', true, null, null);
        $this->addForeignKey('userId', 'Userid', 'INTEGER', 'Person', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Person', 'Webmis\\Models\\Person', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // NotificationoccurredTableMap
