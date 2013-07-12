<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'MedicalKindUnit' table.
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
class MedicalkindunitTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.MedicalkindunitTableMap';

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
        $this->setName('MedicalKindUnit');
        $this->setPhpName('Medicalkindunit');
        $this->setClassname('Webmis\\Models\\Medicalkindunit');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('rbMedicalKind_id', 'RbmedicalkindId', 'INTEGER', 'rbMedicalKind', 'id', true, null, null);
        $this->addForeignKey('eventType_id', 'EventtypeId', 'INTEGER', 'EventType', 'id', false, null, null);
        $this->addForeignKey('rbMedicalAidUnit_id', 'RbmedicalaidunitId', 'INTEGER', 'rbMedicalAidUnit', 'id', true, null, null);
        $this->addForeignKey('rbPayType_id', 'RbpaytypeId', 'INTEGER', 'rbPayType', 'id', true, null, null);
        $this->addForeignKey('rbTariffType_id', 'RbtarifftypeId', 'INTEGER', 'rbTariffType', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rbmedicalkind', 'Webmis\\Models\\Rbmedicalkind', RelationMap::MANY_TO_ONE, array('rbMedicalKind_id' => 'id', ), null, null);
        $this->addRelation('Eventtype', 'Webmis\\Models\\Eventtype', RelationMap::MANY_TO_ONE, array('eventType_id' => 'id', ), null, null);
        $this->addRelation('Rbmedicalaidunit', 'Webmis\\Models\\Rbmedicalaidunit', RelationMap::MANY_TO_ONE, array('rbMedicalAidUnit_id' => 'id', ), null, null);
        $this->addRelation('Rbpaytype', 'Webmis\\Models\\Rbpaytype', RelationMap::MANY_TO_ONE, array('rbPayType_id' => 'id', ), null, null);
        $this->addRelation('Rbtarifftype', 'Webmis\\Models\\Rbtarifftype', RelationMap::MANY_TO_ONE, array('rbTariffType_id' => 'id', ), null, null);
    } // buildRelations()

} // MedicalkindunitTableMap
