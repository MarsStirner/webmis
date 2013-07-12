<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'trfuOrderIssueResult' table.
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
class TrfuorderissueresultTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.TrfuorderissueresultTableMap';

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
        $this->setName('trfuOrderIssueResult');
        $this->setPhpName('Trfuorderissueresult');
        $this->setClassname('Webmis\\Models\\Trfuorderissueresult');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('action_id', 'ActionId', 'INTEGER', 'Action', 'id', true, null, null);
        $this->addColumn('trfu_blood_comp', 'TrfuBloodComp', 'INTEGER', false, null, null);
        $this->addColumn('comp_number', 'CompNumber', 'VARCHAR', false, 40, null);
        $this->addForeignKey('comp_type_id', 'CompTypeId', 'INTEGER', 'rbTrfuBloodComponentType', 'id', false, null, null);
        $this->addForeignKey('blood_type_id', 'BloodTypeId', 'INTEGER', 'rbBloodType', 'id', false, null, null);
        $this->addColumn('volume', 'Volume', 'INTEGER', false, null, null);
        $this->addColumn('dose_count', 'DoseCount', 'DOUBLE', false, null, null);
        $this->addColumn('trfu_donor_id', 'TrfuDonorId', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::MANY_TO_ONE, array('action_id' => 'id', ), null, null);
        $this->addRelation('Rbtrfubloodcomponenttype', 'Webmis\\Models\\Rbtrfubloodcomponenttype', RelationMap::MANY_TO_ONE, array('comp_type_id' => 'id', ), null, null);
        $this->addRelation('Rbbloodtype', 'Webmis\\Models\\Rbbloodtype', RelationMap::MANY_TO_ONE, array('blood_type_id' => 'id', ), null, null);
    } // buildRelations()

} // TrfuorderissueresultTableMap
