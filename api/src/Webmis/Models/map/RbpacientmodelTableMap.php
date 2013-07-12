<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbPacientModel' table.
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
class RbpacientmodelTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbpacientmodelTableMap';

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
        $this->setName('rbPacientModel');
        $this->setPhpName('Rbpacientmodel');
        $this->setClassname('Webmis\\Models\\Rbpacientmodel');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 32, null);
        $this->addColumn('name', 'Name', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('quotaType_id', 'QuotatypeId', 'INTEGER', 'QuotaType', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quotatype', 'Webmis\\Models\\Quotatype', RelationMap::MANY_TO_ONE, array('quotaType_id' => 'id', ), null, null);
        $this->addRelation('MkbQuotatypePacientmodel', 'Webmis\\Models\\MkbQuotatypePacientmodel', RelationMap::ONE_TO_MANY, array('id' => 'pacientModel_id', ), null, null, 'MkbQuotatypePacientmodels');
        $this->addRelation('Rbtreatment', 'Webmis\\Models\\Rbtreatment', RelationMap::ONE_TO_MANY, array('id' => 'pacientModel_id', ), null, null, 'Rbtreatments');
    } // buildRelations()

} // RbpacientmodelTableMap
