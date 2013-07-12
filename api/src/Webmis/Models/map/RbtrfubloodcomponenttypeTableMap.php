<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTrfuBloodComponentType' table.
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
class RbtrfubloodcomponenttypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtrfubloodcomponenttypeTableMap';

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
        $this->setName('rbTrfuBloodComponentType');
        $this->setPhpName('Rbtrfubloodcomponenttype');
        $this->setClassname('Webmis\\Models\\Rbtrfubloodcomponenttype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('trfu_id', 'TrfuId', 'INTEGER', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 32, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 256, null);
        $this->addColumn('unused', 'Unused', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Trfuorderissueresult', 'Webmis\\Models\\Trfuorderissueresult', RelationMap::ONE_TO_MANY, array('id' => 'comp_type_id', ), null, null, 'Trfuorderissueresults');
    } // buildRelations()

} // RbtrfubloodcomponenttypeTableMap
