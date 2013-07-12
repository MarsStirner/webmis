<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'CouponsTransferQuotes' table.
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
class CouponstransferquotesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.CouponstransferquotesTableMap';

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
        $this->setName('CouponsTransferQuotes');
        $this->setPhpName('Couponstransferquotes');
        $this->setClassname('Webmis\\Models\\Couponstransferquotes');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('srcQuotingType_id', 'SrcquotingtypeId', 'INTEGER', 'rbTimeQuotingType', 'code', true, null, null);
        $this->addForeignKey('dstQuotingType_id', 'DstquotingtypeId', 'INTEGER', 'rbTimeQuotingType', 'code', true, null, null);
        $this->addForeignKey('transferDayType', 'Transferdaytype', 'INTEGER', 'rbTransferDateType', 'code', true, null, null);
        $this->addColumn('transferTime', 'Transfertime', 'TIME', true, null, null);
        $this->addColumn('couponsEnabled', 'Couponsenabled', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RbtimequotingtypeRelatedBySrcquotingtypeId', 'Webmis\\Models\\Rbtimequotingtype', RelationMap::MANY_TO_ONE, array('srcQuotingType_id' => 'code', ), null, null);
        $this->addRelation('RbtimequotingtypeRelatedByDstquotingtypeId', 'Webmis\\Models\\Rbtimequotingtype', RelationMap::MANY_TO_ONE, array('dstQuotingType_id' => 'code', ), null, null);
        $this->addRelation('Rbtransferdatetype', 'Webmis\\Models\\Rbtransferdatetype', RelationMap::MANY_TO_ONE, array('transferDayType' => 'code', ), null, null);
    } // buildRelations()

} // CouponstransferquotesTableMap
