<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbAccountExportFormat' table.
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
class RbaccountexportformatTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbaccountexportformatTableMap';

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
        $this->setName('rbAccountExportFormat');
        $this->setPhpName('Rbaccountexportformat');
        $this->setClassname('Webmis\\Models\\Rbaccountexportformat');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 8, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('prog', 'Prog', 'VARCHAR', true, 128, null);
        $this->addColumn('preferentArchiver', 'Preferentarchiver', 'VARCHAR', true, 128, null);
        $this->addColumn('emailRequired', 'Emailrequired', 'BOOLEAN', true, 1, null);
        $this->addColumn('emailTo', 'Emailto', 'VARCHAR', true, 64, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', true, 128, null);
        $this->addColumn('message', 'Message', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // RbaccountexportformatTableMap
