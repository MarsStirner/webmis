<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rbTimeQuotingType' table.
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
class RbtimequotingtypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.RbtimequotingtypeTableMap';

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
        $this->setName('rbTimeQuotingType');
        $this->setPhpName('Rbtimequotingtype');
        $this->setClassname('Webmis\\Models\\Rbtimequotingtype');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CouponstransferquotesRelatedBySrcquotingtypeId', 'Webmis\\Models\\Couponstransferquotes', RelationMap::ONE_TO_MANY, array('code' => 'srcQuotingType_id', ), null, null, 'CouponstransferquotessRelatedBySrcquotingtypeId');
        $this->addRelation('CouponstransferquotesRelatedByDstquotingtypeId', 'Webmis\\Models\\Couponstransferquotes', RelationMap::ONE_TO_MANY, array('code' => 'dstQuotingType_id', ), null, null, 'CouponstransferquotessRelatedByDstquotingtypeId');
    } // buildRelations()

} // RbtimequotingtypeTableMap
