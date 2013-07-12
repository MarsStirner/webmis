<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbService_Profile' table.
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
class RbserviceProfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbserviceProfileTableMap';

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
        $this->setName('rbService_Profile');
        $this->setPhpName('RbserviceProfile');
        $this->setClassname('Webmis\\Models\\RbserviceProfile');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('idx', 'Idx', 'INTEGER', true, null, 0);
        $this->addForeignKey('master_id', 'MasterId', 'INTEGER', 'rbService', 'id', true, null, null);
        $this->addForeignKey('speciality_id', 'SpecialityId', 'INTEGER', 'rbSpeciality', 'id', false, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, 0);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, '');
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('mkbRegExp', 'Mkbregexp', 'VARCHAR', true, 64, '');
        $this->addForeignKey('medicalAidProfile_id', 'MedicalaidprofileId', 'INTEGER', 'rbMedicalAidProfile', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbservice', 'Webmis\\Models\\Rbservice', RelationMap::MANY_TO_ONE, array('master_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Rbmedicalaidprofile', 'Webmis\\Models\\Rbmedicalaidprofile', RelationMap::MANY_TO_ONE, array('medicalAidProfile_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Rbspeciality', 'Webmis\\Models\\Rbspeciality', RelationMap::MANY_TO_ONE, array('speciality_id' => 'id', ), 'SET NULL', null);
    } // buildRelations()

} // RbserviceProfileTableMap
