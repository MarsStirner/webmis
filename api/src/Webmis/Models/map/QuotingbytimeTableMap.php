<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'QuotingByTime' table.
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
class QuotingbytimeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.QuotingbytimeTableMap';

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
        $this->setName('QuotingByTime');
        $this->setPhpName('Quotingbytime');
        $this->setClassname('Webmis\\Models\\Quotingbytime');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('doctor_id', 'DoctorId', 'INTEGER', false, null, null);
        $this->addColumn('quoting_date', 'QuotingDate', 'DATE', true, null, null);
        $this->addColumn('QuotingTimeStart', 'Quotingtimestart', 'TIME', true, null, null);
        $this->addColumn('QuotingTimeEnd', 'Quotingtimeend', 'TIME', true, null, null);
        $this->addColumn('QuotingType', 'Quotingtype', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // QuotingbytimeTableMap
