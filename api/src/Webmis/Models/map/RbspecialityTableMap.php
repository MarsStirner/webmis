<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbSpeciality' table.
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
class RbspecialityTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbspecialityTableMap';

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
        $this->setName('rbSpeciality');
        $this->setPhpName('Rbspeciality');
        $this->setClassname('Webmis\\Models\\Rbspeciality');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('OKSOName', 'Oksoname', 'VARCHAR', true, 60, null);
        $this->addColumn('OKSOCode', 'Oksocode', 'VARCHAR', true, 8, null);
        $this->addColumn('service_id', 'ServiceId', 'INTEGER', false, null, null);
        $this->addColumn('sex', 'Sex', 'TINYINT', true, null, null);
        $this->addColumn('age', 'Age', 'VARCHAR', true, 9, null);
        $this->addColumn('age_bu', 'AgeBu', 'TINYINT', false, null, null);
        $this->addColumn('age_bc', 'AgeBc', 'SMALLINT', false, null, null);
        $this->addColumn('age_eu', 'AgeEu', 'TINYINT', false, null, null);
        $this->addColumn('age_ec', 'AgeEc', 'SMALLINT', false, null, null);
        $this->addColumn('mkbFilter', 'Mkbfilter', 'VARCHAR', true, 32, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 16, null);
        $this->addColumn('quotingEnabled', 'Quotingenabled', 'TINYINT', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quotingbyspeciality', 'Webmis\\Models\\Quotingbyspeciality', RelationMap::ONE_TO_MANY, array('id' => 'speciality_id', ), null, null, 'Quotingbyspecialitys');
        $this->addRelation('RbserviceProfile', 'Webmis\\Models\\RbserviceProfile', RelationMap::ONE_TO_MANY, array('id' => 'speciality_id', ), 'SET NULL', null, 'RbserviceProfiles');
    } // buildRelations()

} // RbspecialityTableMap
