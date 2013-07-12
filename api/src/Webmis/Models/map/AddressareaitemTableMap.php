<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'AddressAreaItem' table.
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
class AddressareaitemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.AddressareaitemTableMap';

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
        $this->setName('AddressAreaItem');
        $this->setPhpName('Addressareaitem');
        $this->setClassname('Webmis\\Models\\Addressareaitem');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('LPU_id', 'LpuId', 'INTEGER', true, null, null);
        $this->addColumn('struct_id', 'StructId', 'INTEGER', true, null, null);
        $this->addColumn('house_id', 'HouseId', 'INTEGER', true, null, null);
        $this->addColumn('flatRange', 'Flatrange', 'TINYINT', true, null, null);
        $this->addColumn('begFlat', 'Begflat', 'INTEGER', true, null, null);
        $this->addColumn('endFlat', 'Endflat', 'INTEGER', true, null, null);
        $this->addColumn('begDate', 'Begdate', 'DATE', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'DATE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // AddressareaitemTableMap
