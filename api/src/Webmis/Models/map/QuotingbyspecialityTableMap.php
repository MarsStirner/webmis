<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'QuotingBySpeciality' table.
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
class QuotingbyspecialityTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.QuotingbyspecialityTableMap';

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
        $this->setName('QuotingBySpeciality');
        $this->setPhpName('Quotingbyspeciality');
        $this->setClassname('Webmis\\Models\\Quotingbyspeciality');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('speciality_id', 'SpecialityId', 'INTEGER', 'rbSpeciality', 'id', true, null, null);
        $this->addForeignKey('organisation_id', 'OrganisationId', 'INTEGER', 'Organisation', 'id', true, null, null);
        $this->addColumn('coupons_quote', 'CouponsQuote', 'INTEGER', false, null, null);
        $this->addColumn('coupons_remaining', 'CouponsRemaining', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbspeciality', 'Webmis\\Models\\Rbspeciality', RelationMap::MANY_TO_ONE, array('speciality_id' => 'id', ), null, null);
        $this->addRelation('Organisation', 'Webmis\\Models\\Organisation', RelationMap::MANY_TO_ONE, array('organisation_id' => 'id', ), null, null);
    } // buildRelations()

} // QuotingbyspecialityTableMap
