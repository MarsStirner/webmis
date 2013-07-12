<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Client_QuotingDiscussion' table.
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
class ClientQuotingdiscussionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.ClientQuotingdiscussionTableMap';

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
        $this->setName('Client_QuotingDiscussion');
        $this->setPhpName('ClientQuotingdiscussion');
        $this->setClassname('Webmis\\Models\\ClientQuotingdiscussion');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('master_id', 'MasterId', 'INTEGER', false, null, null);
        $this->addColumn('dateMessage', 'Datemessage', 'TIMESTAMP', true, null, null);
        $this->addColumn('agreementType_id', 'AgreementtypeId', 'INTEGER', false, null, null);
        $this->addColumn('responsiblePerson_id', 'ResponsiblepersonId', 'INTEGER', false, null, null);
        $this->addColumn('cosignatory', 'Cosignatory', 'VARCHAR', false, 25, null);
        $this->addColumn('cosignatoryPost', 'Cosignatorypost', 'VARCHAR', false, 20, null);
        $this->addColumn('cosignatoryName', 'Cosignatoryname', 'VARCHAR', false, 50, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 128, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ClientQuotingdiscussionTableMap
