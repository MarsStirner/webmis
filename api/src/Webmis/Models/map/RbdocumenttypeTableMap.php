<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbDocumentType' table.
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
class RbdocumenttypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbdocumenttypeTableMap';

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
        $this->setName('rbDocumentType');
        $this->setPhpName('Rbdocumenttype');
        $this->setClassname('Webmis\\Models\\Rbdocumenttype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('regionalCode', 'Regionalcode', 'VARCHAR', true, 16, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('group_id', 'GroupId', 'INTEGER', true, null, null);
        $this->addColumn('serial_format', 'SerialFormat', 'INTEGER', true, null, null);
        $this->addColumn('number_format', 'NumberFormat', 'INTEGER', true, null, null);
        $this->addColumn('federalCode', 'Federalcode', 'VARCHAR', true, 16, null);
        $this->addColumn('socCode', 'Soccode', 'VARCHAR', true, 8, null);
        $this->addColumn('TFOMSCode', 'Tfomscode', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbdocumenttypeTableMap
