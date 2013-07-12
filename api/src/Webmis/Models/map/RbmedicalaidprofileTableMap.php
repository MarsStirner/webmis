<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbMedicalAidProfile' table.
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
class RbmedicalaidprofileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbmedicalaidprofileTableMap';

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
        $this->setName('rbMedicalAidProfile');
        $this->setPhpName('Rbmedicalaidprofile');
        $this->setClassname('Webmis\\Models\\Rbmedicalaidprofile');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 16, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 16, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbservice', 'Webmis\\Models\\Rbservice', RelationMap::ONE_TO_MANY, array('id' => 'medicalAidProfile_id', ), 'SET NULL', null, 'Rbservices');
        $this->addRelation('RbserviceProfile', 'Webmis\\Models\\RbserviceProfile', RelationMap::ONE_TO_MANY, array('id' => 'medicalAidProfile_id', ), 'SET NULL', null, 'RbserviceProfiles');
    } // buildRelations()

} // RbmedicalaidprofileTableMap
