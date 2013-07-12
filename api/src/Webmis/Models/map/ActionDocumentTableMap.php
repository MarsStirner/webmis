<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'action_document' table.
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
class ActionDocumentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ActionDocumentTableMap';

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
        $this->setName('action_document');
        $this->setPhpName('ActionDocument');
        $this->setClassname('Webmis\\Models\\ActionDocument');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('action_id', 'ActionId', 'INTEGER', 'Action', 'id', true, null, null);
        $this->addColumn('modify_date', 'ModifyDate', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('template_id', 'TemplateId', 'INTEGER', 'rbPrintTemplate', 'id', true, null, null);
        $this->addColumn('document', 'Document', 'BLOB', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Action', 'Webmis\\Models\\Action', RelationMap::MANY_TO_ONE, array('action_id' => 'id', ), null, null);
        $this->addRelation('Rbprinttemplate', 'Webmis\\Models\\Rbprinttemplate', RelationMap::MANY_TO_ONE, array('template_id' => 'id', ), null, null);
    } // buildRelations()

} // ActionDocumentTableMap
