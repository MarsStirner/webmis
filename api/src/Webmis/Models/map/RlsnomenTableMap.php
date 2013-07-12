<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rlsNomen' table.
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
class RlsnomenTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RlsnomenTableMap';

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
        $this->setName('rlsNomen');
        $this->setPhpName('Rlsnomen');
        $this->setClassname('Webmis\\Models\\Rlsnomen');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'INTEGER', true, null, null);
        $this->addColumn('tradeName_id', 'TradenameId', 'INTEGER', false, null, null);
        $this->addColumn('INPName_id', 'InpnameId', 'INTEGER', false, null, null);
        $this->addColumn('form_id', 'FormId', 'INTEGER', false, null, null);
        $this->addColumn('dosage_id', 'DosageId', 'INTEGER', false, null, null);
        $this->addColumn('filling_id', 'FillingId', 'INTEGER', false, null, null);
        $this->addColumn('packing_id', 'PackingId', 'INTEGER', false, null, null);
        $this->addColumn('regDate', 'Regdate', 'DATE', false, null, null);
        $this->addColumn('annDate', 'Anndate', 'DATE', false, null, null);
        $this->addColumn('disabledForPrescription', 'Disabledforprescription', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RlsnomenTableMap
