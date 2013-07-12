<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbService' table.
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
class RbserviceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbserviceTableMap';

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
        $this->setName('rbService');
        $this->setPhpName('Rbservice');
        $this->setClassname('Webmis\\Models\\Rbservice');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 31, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('eisLegacy', 'Eislegacy', 'BOOLEAN', true, 1, null);
        $this->addColumn('nomenclatureLegacy', 'Nomenclaturelegacy', 'BOOLEAN', true, 1, false);
        $this->addColumn('license', 'License', 'BOOLEAN', true, 1, null);
        $this->addColumn('infis', 'Infis', 'VARCHAR', true, 31, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', true, null, null);
        $this->addForeignKey('medicalAidProfile_id', 'MedicalaidprofileId', 'INTEGER', 'rbMedicalAidProfile', 'id', false, null, null);
        $this->addColumn('adultUetDoctor', 'Adultuetdoctor', 'DOUBLE', false, null, 0);
        $this->addColumn('adultUetAverageMedWorker', 'Adultuetaveragemedworker', 'DOUBLE', false, null, 0);
        $this->addColumn('childUetDoctor', 'Childuetdoctor', 'DOUBLE', false, null, 0);
        $this->addColumn('childUetAverageMedWorker', 'Childuetaveragemedworker', 'DOUBLE', false, null, 0);
        $this->addForeignKey('rbMedicalKind_id', 'RbmedicalkindId', 'INTEGER', 'rbMedicalKind', 'id', false, null, null);
        $this->addColumn('UET', 'Uet', 'DOUBLE', true, null, 0);
        $this->addColumn('departCode', 'Departcode', 'VARCHAR', false, 3, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbmedicalkind', 'Webmis\\Models\\Rbmedicalkind', RelationMap::MANY_TO_ONE, array('rbMedicalKind_id' => 'id', ), null, null);
        $this->addRelation('Rbmedicalaidprofile', 'Webmis\\Models\\Rbmedicalaidprofile', RelationMap::MANY_TO_ONE, array('medicalAidProfile_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('RbhospitalbedprofileService', 'Webmis\\Models\\RbhospitalbedprofileService', RelationMap::ONE_TO_MANY, array('id' => 'rbService_id', ), null, null, 'RbhospitalbedprofileServices');
        $this->addRelation('Rbserviceuet', 'Webmis\\Models\\Rbserviceuet', RelationMap::ONE_TO_MANY, array('id' => 'rbService_id', ), null, null, 'Rbserviceuets');
        $this->addRelation('RbserviceProfile', 'Webmis\\Models\\RbserviceProfile', RelationMap::ONE_TO_MANY, array('id' => 'master_id', ), 'CASCADE', null, 'RbserviceProfiles');
    } // buildRelations()

} // RbserviceTableMap
