<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbEmergencyCauseCall' table.
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
class RbemergencycausecallTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbemergencycausecallTableMap';

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
        $this->setName('rbEmergencyCauseCall');
        $this->setPhpName('Rbemergencycausecall');
        $this->setClassname('Webmis\\Models\\Rbemergencycausecall');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('codeRegional', 'Coderegional', 'VARCHAR', true, 8, null);
        $this->addColumn('typeCause', 'Typecause', 'TINYINT', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbemergencycausecallTableMap
