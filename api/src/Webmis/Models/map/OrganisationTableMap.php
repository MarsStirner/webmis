<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Organisation' table.
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
class OrganisationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.OrganisationTableMap';

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
        $this->setName('Organisation');
        $this->setPhpName('Organisation');
        $this->setClassname('Webmis\\Models\\Organisation');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('fullName', 'Fullname', 'VARCHAR', true, 255, null);
        $this->addColumn('shortName', 'Shortname', 'VARCHAR', true, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('net_id', 'NetId', 'INTEGER', false, null, null);
        $this->addColumn('infisCode', 'Infiscode', 'VARCHAR', true, 12, null);
        $this->addColumn('obsoleteInfisCode', 'Obsoleteinfiscode', 'VARCHAR', true, 60, null);
        $this->addColumn('OKVED', 'Okved', 'VARCHAR', true, 64, null);
        $this->addColumn('INN', 'Inn', 'VARCHAR', true, 15, null);
        $this->addColumn('KPP', 'Kpp', 'VARCHAR', true, 15, null);
        $this->addColumn('OGRN', 'Ogrn', 'VARCHAR', true, 15, null);
        $this->addColumn('OKATO', 'Okato', 'VARCHAR', true, 15, null);
        $this->addColumn('OKPF_code', 'OkpfCode', 'VARCHAR', true, 4, null);
        $this->addColumn('OKPF_id', 'OkpfId', 'INTEGER', false, null, null);
        $this->addColumn('OKFS_code', 'OkfsCode', 'INTEGER', true, null, null);
        $this->addColumn('OKFS_id', 'OkfsId', 'INTEGER', false, null, null);
        $this->addColumn('OKPO', 'Okpo', 'VARCHAR', true, 15, null);
        $this->addColumn('FSS', 'Fss', 'VARCHAR', true, 10, null);
        $this->addColumn('region', 'Region', 'VARCHAR', true, 40, null);
        $this->addColumn('Address', 'Address', 'VARCHAR', true, 255, null);
        $this->addColumn('chief', 'Chief', 'VARCHAR', true, 64, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 255, null);
        $this->addColumn('accountant', 'Accountant', 'VARCHAR', true, 64, null);
        $this->addColumn('isInsurer', 'Isinsurer', 'BOOLEAN', true, 1, null);
        $this->addColumn('compulsoryServiceStop', 'Compulsoryservicestop', 'BOOLEAN', true, 1, false);
        $this->addColumn('voluntaryServiceStop', 'Voluntaryservicestop', 'BOOLEAN', true, 1, false);
        $this->addColumn('area', 'Area', 'VARCHAR', true, 13, null);
        $this->addColumn('isHospital', 'Ishospital', 'BOOLEAN', true, 1, false);
        $this->addColumn('notes', 'Notes', 'VARCHAR', true, 255, null);
        $this->addColumn('head_id', 'HeadId', 'INTEGER', false, null, null);
        $this->addColumn('miacCode', 'Miaccode', 'VARCHAR', true, 10, null);
        $this->addColumn('isOrganisation', 'Isorganisation', 'BOOLEAN', true, 1, false);
        $this->addColumn('uuid_id', 'UuidId', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quotingbyspeciality', 'Webmis\\Models\\Quotingbyspeciality', RelationMap::ONE_TO_MANY, array('id' => 'organisation_id', ), null, null, 'Quotingbyspecialitys');
    } // buildRelations()

} // OrganisationTableMap
