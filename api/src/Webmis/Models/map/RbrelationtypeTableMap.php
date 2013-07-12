<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbRelationType' table.
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
class RbrelationtypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbrelationtypeTableMap';

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
        $this->setName('rbRelationType');
        $this->setPhpName('Rbrelationtype');
        $this->setClassname('Webmis\\Models\\Rbrelationtype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('leftName', 'Leftname', 'VARCHAR', true, 64, null);
        $this->addColumn('rightName', 'Rightname', 'VARCHAR', true, 64, null);
        $this->addColumn('isDirectGenetic', 'Isdirectgenetic', 'BOOLEAN', true, 1, false);
        $this->addColumn('isBackwardGenetic', 'Isbackwardgenetic', 'BOOLEAN', true, 1, false);
        $this->addColumn('isDirectRepresentative', 'Isdirectrepresentative', 'BOOLEAN', true, 1, false);
        $this->addColumn('isBackwardRepresentative', 'Isbackwardrepresentative', 'BOOLEAN', true, 1, false);
        $this->addColumn('isDirectEpidemic', 'Isdirectepidemic', 'BOOLEAN', true, 1, false);
        $this->addColumn('isBackwardEpidemic', 'Isbackwardepidemic', 'BOOLEAN', true, 1, false);
        $this->addColumn('isDirectDonation', 'Isdirectdonation', 'BOOLEAN', true, 1, false);
        $this->addColumn('isBackwardDonation', 'Isbackwarddonation', 'BOOLEAN', true, 1, false);
        $this->addColumn('leftSex', 'Leftsex', 'BOOLEAN', true, 1, false);
        $this->addColumn('rightSex', 'Rightsex', 'BOOLEAN', true, 1, false);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 64, null);
        $this->addColumn('regionalReverseCode', 'Regionalreversecode', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbrelationtypeTableMap
