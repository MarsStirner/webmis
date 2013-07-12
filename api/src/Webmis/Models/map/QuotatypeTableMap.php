<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'QuotaType' table.
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
class QuotatypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.QuotatypeTableMap';

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
        $this->setName('QuotaType');
        $this->setPhpName('Quotatype');
        $this->setClassname('Webmis\\Models\\Quotatype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('class', 'Class', 'BOOLEAN', true, 1, null);
        $this->addColumn('group_code', 'GroupCode', 'VARCHAR', false, 16, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 16, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 1000, null);
        $this->addColumn('teenOlder', 'Teenolder', 'BOOLEAN', true, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MkbQuotatypePacientmodel', 'Webmis\\Models\\MkbQuotatypePacientmodel', RelationMap::ONE_TO_MANY, array('id' => 'quotaType_id', ), null, null, 'MkbQuotatypePacientmodels');
        $this->addRelation('Rbpacientmodel', 'Webmis\\Models\\Rbpacientmodel', RelationMap::ONE_TO_MANY, array('id' => 'quotaType_id', ), null, null, 'Rbpacientmodels');
    } // buildRelations()

} // QuotatypeTableMap
