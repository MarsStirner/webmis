<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Quoting' table.
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
class QuotingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.QuotingTableMap';

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
        $this->setName('Quoting');
        $this->setPhpName('Quoting');
        $this->setClassname('Webmis\\Models\\Quoting');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('quotaType_id', 'QuotatypeId', 'INTEGER', false, null, null);
        $this->addColumn('beginDate', 'Begindate', 'TIMESTAMP', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'TIMESTAMP', true, null, null);
        $this->addColumn('limitation', 'Limitation', 'INTEGER', true, 8, 0);
        $this->addColumn('used', 'Used', 'INTEGER', true, 8, 0);
        $this->addColumn('confirmed', 'Confirmed', 'INTEGER', true, 8, 0);
        $this->addColumn('inQueue', 'Inqueue', 'INTEGER', true, 8, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // QuotingTableMap
