<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTreatment' table.
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
class RbtreatmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtreatmentTableMap';

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
        $this->setName('rbTreatment');
        $this->setPhpName('Rbtreatment');
        $this->setClassname('Webmis\\Models\\Rbtreatment');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 32, null);
        $this->addColumn('name', 'Name', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('pacientModel_id', 'PacientmodelId', 'INTEGER', 'rbPacientModel', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbpacientmodel', 'Webmis\\Models\\Rbpacientmodel', RelationMap::MANY_TO_ONE, array('pacientModel_id' => 'id', ), null, null);
    } // buildRelations()

} // RbtreatmentTableMap
