<?php

namespace Webmis\Models\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'EmergencyCall' table.
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
class EmergencycallTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Webmis.Models.map.EmergencycallTableMap';

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
        $this->setName('EmergencyCall');
        $this->setPhpName('Emergencycall');
        $this->setClassname('Webmis\\Models\\Emergencycall');
        $this->setPackage('Webmis.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('createDatetime', 'Createdatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('createPerson_id', 'CreatepersonId', 'INTEGER', false, null, null);
        $this->addColumn('modifyDatetime', 'Modifydatetime', 'TIMESTAMP', true, null, null);
        $this->addColumn('modifyPerson_id', 'ModifypersonId', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('event_id', 'EventId', 'INTEGER', true, null, null);
        $this->addColumn('numberCardCall', 'Numbercardcall', 'VARCHAR', true, 64, null);
        $this->addColumn('brigade_id', 'BrigadeId', 'INTEGER', false, null, null);
        $this->addColumn('causeCall_id', 'CausecallId', 'INTEGER', false, null, null);
        $this->addColumn('whoCallOnPhone', 'Whocallonphone', 'VARCHAR', true, 64, null);
        $this->addColumn('numberPhone', 'Numberphone', 'VARCHAR', true, 32, null);
        $this->addColumn('begDate', 'Begdate', 'TIMESTAMP', true, null, null);
        $this->addColumn('passDate', 'Passdate', 'TIMESTAMP', true, null, null);
        $this->addColumn('departureDate', 'Departuredate', 'TIMESTAMP', true, null, null);
        $this->addColumn('arrivalDate', 'Arrivaldate', 'TIMESTAMP', true, null, null);
        $this->addColumn('finishServiceDate', 'Finishservicedate', 'TIMESTAMP', true, null, null);
        $this->addColumn('endDate', 'Enddate', 'TIMESTAMP', false, null, null);
        $this->addColumn('placeReceptionCall_id', 'PlacereceptioncallId', 'INTEGER', false, null, null);
        $this->addColumn('receivedCall_id', 'ReceivedcallId', 'INTEGER', false, null, null);
        $this->addColumn('reasondDelays_id', 'ReasonddelaysId', 'INTEGER', false, null, null);
        $this->addColumn('resultCall_id', 'ResultcallId', 'INTEGER', false, null, null);
        $this->addColumn('accident_id', 'AccidentId', 'INTEGER', false, null, null);
        $this->addColumn('death_id', 'DeathId', 'INTEGER', false, null, null);
        $this->addColumn('ebriety_id', 'EbrietyId', 'INTEGER', false, null, null);
        $this->addColumn('diseased_id', 'DiseasedId', 'INTEGER', false, null, null);
        $this->addColumn('placeCall_id', 'PlacecallId', 'INTEGER', false, null, null);
        $this->addColumn('methodTransport_id', 'MethodtransportId', 'INTEGER', false, null, null);
        $this->addColumn('transfTransport_id', 'TransftransportId', 'INTEGER', false, null, null);
        $this->addColumn('renunOfHospital', 'Renunofhospital', 'BOOLEAN', true, 1, false);
        $this->addColumn('faceRenunOfHospital', 'Facerenunofhospital', 'VARCHAR', true, 64, null);
        $this->addColumn('disease', 'Disease', 'BOOLEAN', true, 1, false);
        $this->addColumn('birth', 'Birth', 'BOOLEAN', true, 1, false);
        $this->addColumn('pregnancyFailure', 'Pregnancyfailure', 'BOOLEAN', true, 1, false);
        $this->addColumn('noteCall', 'Notecall', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // EmergencycallTableMap
