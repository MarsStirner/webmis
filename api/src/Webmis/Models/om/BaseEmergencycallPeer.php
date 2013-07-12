<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Emergencycall;
use Webmis\Models\EmergencycallPeer;
use Webmis\Models\map\EmergencycallTableMap;

/**
 * Base static class for performing query and update operations on the 'EmergencyCall' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseEmergencycallPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'EmergencyCall';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Emergencycall';

    /** the related TableMap class for this table */
    const TM_CLASS = 'EmergencycallTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 35;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 35;

    /** the column name for the id field */
    const ID = 'EmergencyCall.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'EmergencyCall.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'EmergencyCall.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'EmergencyCall.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'EmergencyCall.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'EmergencyCall.deleted';

    /** the column name for the event_id field */
    const EVENT_ID = 'EmergencyCall.event_id';

    /** the column name for the numberCardCall field */
    const NUMBERCARDCALL = 'EmergencyCall.numberCardCall';

    /** the column name for the brigade_id field */
    const BRIGADE_ID = 'EmergencyCall.brigade_id';

    /** the column name for the causeCall_id field */
    const CAUSECALL_ID = 'EmergencyCall.causeCall_id';

    /** the column name for the whoCallOnPhone field */
    const WHOCALLONPHONE = 'EmergencyCall.whoCallOnPhone';

    /** the column name for the numberPhone field */
    const NUMBERPHONE = 'EmergencyCall.numberPhone';

    /** the column name for the begDate field */
    const BEGDATE = 'EmergencyCall.begDate';

    /** the column name for the passDate field */
    const PASSDATE = 'EmergencyCall.passDate';

    /** the column name for the departureDate field */
    const DEPARTUREDATE = 'EmergencyCall.departureDate';

    /** the column name for the arrivalDate field */
    const ARRIVALDATE = 'EmergencyCall.arrivalDate';

    /** the column name for the finishServiceDate field */
    const FINISHSERVICEDATE = 'EmergencyCall.finishServiceDate';

    /** the column name for the endDate field */
    const ENDDATE = 'EmergencyCall.endDate';

    /** the column name for the placeReceptionCall_id field */
    const PLACERECEPTIONCALL_ID = 'EmergencyCall.placeReceptionCall_id';

    /** the column name for the receivedCall_id field */
    const RECEIVEDCALL_ID = 'EmergencyCall.receivedCall_id';

    /** the column name for the reasondDelays_id field */
    const REASONDDELAYS_ID = 'EmergencyCall.reasondDelays_id';

    /** the column name for the resultCall_id field */
    const RESULTCALL_ID = 'EmergencyCall.resultCall_id';

    /** the column name for the accident_id field */
    const ACCIDENT_ID = 'EmergencyCall.accident_id';

    /** the column name for the death_id field */
    const DEATH_ID = 'EmergencyCall.death_id';

    /** the column name for the ebriety_id field */
    const EBRIETY_ID = 'EmergencyCall.ebriety_id';

    /** the column name for the diseased_id field */
    const DISEASED_ID = 'EmergencyCall.diseased_id';

    /** the column name for the placeCall_id field */
    const PLACECALL_ID = 'EmergencyCall.placeCall_id';

    /** the column name for the methodTransport_id field */
    const METHODTRANSPORT_ID = 'EmergencyCall.methodTransport_id';

    /** the column name for the transfTransport_id field */
    const TRANSFTRANSPORT_ID = 'EmergencyCall.transfTransport_id';

    /** the column name for the renunOfHospital field */
    const RENUNOFHOSPITAL = 'EmergencyCall.renunOfHospital';

    /** the column name for the faceRenunOfHospital field */
    const FACERENUNOFHOSPITAL = 'EmergencyCall.faceRenunOfHospital';

    /** the column name for the disease field */
    const DISEASE = 'EmergencyCall.disease';

    /** the column name for the birth field */
    const BIRTH = 'EmergencyCall.birth';

    /** the column name for the pregnancyFailure field */
    const PREGNANCYFAILURE = 'EmergencyCall.pregnancyFailure';

    /** the column name for the noteCall field */
    const NOTECALL = 'EmergencyCall.noteCall';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Emergencycall objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Emergencycall[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. EmergencycallPeer::$fieldNames[EmergencycallPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'EventId', 'Numbercardcall', 'BrigadeId', 'CausecallId', 'Whocallonphone', 'Numberphone', 'Begdate', 'Passdate', 'Departuredate', 'Arrivaldate', 'Finishservicedate', 'Enddate', 'PlacereceptioncallId', 'ReceivedcallId', 'ReasonddelaysId', 'ResultcallId', 'AccidentId', 'DeathId', 'EbrietyId', 'DiseasedId', 'PlacecallId', 'MethodtransportId', 'TransftransportId', 'Renunofhospital', 'Facerenunofhospital', 'Disease', 'Birth', 'Pregnancyfailure', 'Notecall', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'eventId', 'numbercardcall', 'brigadeId', 'causecallId', 'whocallonphone', 'numberphone', 'begdate', 'passdate', 'departuredate', 'arrivaldate', 'finishservicedate', 'enddate', 'placereceptioncallId', 'receivedcallId', 'reasonddelaysId', 'resultcallId', 'accidentId', 'deathId', 'ebrietyId', 'diseasedId', 'placecallId', 'methodtransportId', 'transftransportId', 'renunofhospital', 'facerenunofhospital', 'disease', 'birth', 'pregnancyfailure', 'notecall', ),
        BasePeer::TYPE_COLNAME => array (EmergencycallPeer::ID, EmergencycallPeer::CREATEDATETIME, EmergencycallPeer::CREATEPERSON_ID, EmergencycallPeer::MODIFYDATETIME, EmergencycallPeer::MODIFYPERSON_ID, EmergencycallPeer::DELETED, EmergencycallPeer::EVENT_ID, EmergencycallPeer::NUMBERCARDCALL, EmergencycallPeer::BRIGADE_ID, EmergencycallPeer::CAUSECALL_ID, EmergencycallPeer::WHOCALLONPHONE, EmergencycallPeer::NUMBERPHONE, EmergencycallPeer::BEGDATE, EmergencycallPeer::PASSDATE, EmergencycallPeer::DEPARTUREDATE, EmergencycallPeer::ARRIVALDATE, EmergencycallPeer::FINISHSERVICEDATE, EmergencycallPeer::ENDDATE, EmergencycallPeer::PLACERECEPTIONCALL_ID, EmergencycallPeer::RECEIVEDCALL_ID, EmergencycallPeer::REASONDDELAYS_ID, EmergencycallPeer::RESULTCALL_ID, EmergencycallPeer::ACCIDENT_ID, EmergencycallPeer::DEATH_ID, EmergencycallPeer::EBRIETY_ID, EmergencycallPeer::DISEASED_ID, EmergencycallPeer::PLACECALL_ID, EmergencycallPeer::METHODTRANSPORT_ID, EmergencycallPeer::TRANSFTRANSPORT_ID, EmergencycallPeer::RENUNOFHOSPITAL, EmergencycallPeer::FACERENUNOFHOSPITAL, EmergencycallPeer::DISEASE, EmergencycallPeer::BIRTH, EmergencycallPeer::PREGNANCYFAILURE, EmergencycallPeer::NOTECALL, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'EVENT_ID', 'NUMBERCARDCALL', 'BRIGADE_ID', 'CAUSECALL_ID', 'WHOCALLONPHONE', 'NUMBERPHONE', 'BEGDATE', 'PASSDATE', 'DEPARTUREDATE', 'ARRIVALDATE', 'FINISHSERVICEDATE', 'ENDDATE', 'PLACERECEPTIONCALL_ID', 'RECEIVEDCALL_ID', 'REASONDDELAYS_ID', 'RESULTCALL_ID', 'ACCIDENT_ID', 'DEATH_ID', 'EBRIETY_ID', 'DISEASED_ID', 'PLACECALL_ID', 'METHODTRANSPORT_ID', 'TRANSFTRANSPORT_ID', 'RENUNOFHOSPITAL', 'FACERENUNOFHOSPITAL', 'DISEASE', 'BIRTH', 'PREGNANCYFAILURE', 'NOTECALL', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'event_id', 'numberCardCall', 'brigade_id', 'causeCall_id', 'whoCallOnPhone', 'numberPhone', 'begDate', 'passDate', 'departureDate', 'arrivalDate', 'finishServiceDate', 'endDate', 'placeReceptionCall_id', 'receivedCall_id', 'reasondDelays_id', 'resultCall_id', 'accident_id', 'death_id', 'ebriety_id', 'diseased_id', 'placeCall_id', 'methodTransport_id', 'transfTransport_id', 'renunOfHospital', 'faceRenunOfHospital', 'disease', 'birth', 'pregnancyFailure', 'noteCall', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. EmergencycallPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'EventId' => 6, 'Numbercardcall' => 7, 'BrigadeId' => 8, 'CausecallId' => 9, 'Whocallonphone' => 10, 'Numberphone' => 11, 'Begdate' => 12, 'Passdate' => 13, 'Departuredate' => 14, 'Arrivaldate' => 15, 'Finishservicedate' => 16, 'Enddate' => 17, 'PlacereceptioncallId' => 18, 'ReceivedcallId' => 19, 'ReasonddelaysId' => 20, 'ResultcallId' => 21, 'AccidentId' => 22, 'DeathId' => 23, 'EbrietyId' => 24, 'DiseasedId' => 25, 'PlacecallId' => 26, 'MethodtransportId' => 27, 'TransftransportId' => 28, 'Renunofhospital' => 29, 'Facerenunofhospital' => 30, 'Disease' => 31, 'Birth' => 32, 'Pregnancyfailure' => 33, 'Notecall' => 34, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'eventId' => 6, 'numbercardcall' => 7, 'brigadeId' => 8, 'causecallId' => 9, 'whocallonphone' => 10, 'numberphone' => 11, 'begdate' => 12, 'passdate' => 13, 'departuredate' => 14, 'arrivaldate' => 15, 'finishservicedate' => 16, 'enddate' => 17, 'placereceptioncallId' => 18, 'receivedcallId' => 19, 'reasonddelaysId' => 20, 'resultcallId' => 21, 'accidentId' => 22, 'deathId' => 23, 'ebrietyId' => 24, 'diseasedId' => 25, 'placecallId' => 26, 'methodtransportId' => 27, 'transftransportId' => 28, 'renunofhospital' => 29, 'facerenunofhospital' => 30, 'disease' => 31, 'birth' => 32, 'pregnancyfailure' => 33, 'notecall' => 34, ),
        BasePeer::TYPE_COLNAME => array (EmergencycallPeer::ID => 0, EmergencycallPeer::CREATEDATETIME => 1, EmergencycallPeer::CREATEPERSON_ID => 2, EmergencycallPeer::MODIFYDATETIME => 3, EmergencycallPeer::MODIFYPERSON_ID => 4, EmergencycallPeer::DELETED => 5, EmergencycallPeer::EVENT_ID => 6, EmergencycallPeer::NUMBERCARDCALL => 7, EmergencycallPeer::BRIGADE_ID => 8, EmergencycallPeer::CAUSECALL_ID => 9, EmergencycallPeer::WHOCALLONPHONE => 10, EmergencycallPeer::NUMBERPHONE => 11, EmergencycallPeer::BEGDATE => 12, EmergencycallPeer::PASSDATE => 13, EmergencycallPeer::DEPARTUREDATE => 14, EmergencycallPeer::ARRIVALDATE => 15, EmergencycallPeer::FINISHSERVICEDATE => 16, EmergencycallPeer::ENDDATE => 17, EmergencycallPeer::PLACERECEPTIONCALL_ID => 18, EmergencycallPeer::RECEIVEDCALL_ID => 19, EmergencycallPeer::REASONDDELAYS_ID => 20, EmergencycallPeer::RESULTCALL_ID => 21, EmergencycallPeer::ACCIDENT_ID => 22, EmergencycallPeer::DEATH_ID => 23, EmergencycallPeer::EBRIETY_ID => 24, EmergencycallPeer::DISEASED_ID => 25, EmergencycallPeer::PLACECALL_ID => 26, EmergencycallPeer::METHODTRANSPORT_ID => 27, EmergencycallPeer::TRANSFTRANSPORT_ID => 28, EmergencycallPeer::RENUNOFHOSPITAL => 29, EmergencycallPeer::FACERENUNOFHOSPITAL => 30, EmergencycallPeer::DISEASE => 31, EmergencycallPeer::BIRTH => 32, EmergencycallPeer::PREGNANCYFAILURE => 33, EmergencycallPeer::NOTECALL => 34, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'EVENT_ID' => 6, 'NUMBERCARDCALL' => 7, 'BRIGADE_ID' => 8, 'CAUSECALL_ID' => 9, 'WHOCALLONPHONE' => 10, 'NUMBERPHONE' => 11, 'BEGDATE' => 12, 'PASSDATE' => 13, 'DEPARTUREDATE' => 14, 'ARRIVALDATE' => 15, 'FINISHSERVICEDATE' => 16, 'ENDDATE' => 17, 'PLACERECEPTIONCALL_ID' => 18, 'RECEIVEDCALL_ID' => 19, 'REASONDDELAYS_ID' => 20, 'RESULTCALL_ID' => 21, 'ACCIDENT_ID' => 22, 'DEATH_ID' => 23, 'EBRIETY_ID' => 24, 'DISEASED_ID' => 25, 'PLACECALL_ID' => 26, 'METHODTRANSPORT_ID' => 27, 'TRANSFTRANSPORT_ID' => 28, 'RENUNOFHOSPITAL' => 29, 'FACERENUNOFHOSPITAL' => 30, 'DISEASE' => 31, 'BIRTH' => 32, 'PREGNANCYFAILURE' => 33, 'NOTECALL' => 34, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'event_id' => 6, 'numberCardCall' => 7, 'brigade_id' => 8, 'causeCall_id' => 9, 'whoCallOnPhone' => 10, 'numberPhone' => 11, 'begDate' => 12, 'passDate' => 13, 'departureDate' => 14, 'arrivalDate' => 15, 'finishServiceDate' => 16, 'endDate' => 17, 'placeReceptionCall_id' => 18, 'receivedCall_id' => 19, 'reasondDelays_id' => 20, 'resultCall_id' => 21, 'accident_id' => 22, 'death_id' => 23, 'ebriety_id' => 24, 'diseased_id' => 25, 'placeCall_id' => 26, 'methodTransport_id' => 27, 'transfTransport_id' => 28, 'renunOfHospital' => 29, 'faceRenunOfHospital' => 30, 'disease' => 31, 'birth' => 32, 'pregnancyFailure' => 33, 'noteCall' => 34, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = EmergencycallPeer::getFieldNames($toType);
        $key = isset(EmergencycallPeer::$fieldKeys[$fromType][$name]) ? EmergencycallPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(EmergencycallPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, EmergencycallPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return EmergencycallPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. EmergencycallPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(EmergencycallPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(EmergencycallPeer::ID);
            $criteria->addSelectColumn(EmergencycallPeer::CREATEDATETIME);
            $criteria->addSelectColumn(EmergencycallPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(EmergencycallPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(EmergencycallPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(EmergencycallPeer::DELETED);
            $criteria->addSelectColumn(EmergencycallPeer::EVENT_ID);
            $criteria->addSelectColumn(EmergencycallPeer::NUMBERCARDCALL);
            $criteria->addSelectColumn(EmergencycallPeer::BRIGADE_ID);
            $criteria->addSelectColumn(EmergencycallPeer::CAUSECALL_ID);
            $criteria->addSelectColumn(EmergencycallPeer::WHOCALLONPHONE);
            $criteria->addSelectColumn(EmergencycallPeer::NUMBERPHONE);
            $criteria->addSelectColumn(EmergencycallPeer::BEGDATE);
            $criteria->addSelectColumn(EmergencycallPeer::PASSDATE);
            $criteria->addSelectColumn(EmergencycallPeer::DEPARTUREDATE);
            $criteria->addSelectColumn(EmergencycallPeer::ARRIVALDATE);
            $criteria->addSelectColumn(EmergencycallPeer::FINISHSERVICEDATE);
            $criteria->addSelectColumn(EmergencycallPeer::ENDDATE);
            $criteria->addSelectColumn(EmergencycallPeer::PLACERECEPTIONCALL_ID);
            $criteria->addSelectColumn(EmergencycallPeer::RECEIVEDCALL_ID);
            $criteria->addSelectColumn(EmergencycallPeer::REASONDDELAYS_ID);
            $criteria->addSelectColumn(EmergencycallPeer::RESULTCALL_ID);
            $criteria->addSelectColumn(EmergencycallPeer::ACCIDENT_ID);
            $criteria->addSelectColumn(EmergencycallPeer::DEATH_ID);
            $criteria->addSelectColumn(EmergencycallPeer::EBRIETY_ID);
            $criteria->addSelectColumn(EmergencycallPeer::DISEASED_ID);
            $criteria->addSelectColumn(EmergencycallPeer::PLACECALL_ID);
            $criteria->addSelectColumn(EmergencycallPeer::METHODTRANSPORT_ID);
            $criteria->addSelectColumn(EmergencycallPeer::TRANSFTRANSPORT_ID);
            $criteria->addSelectColumn(EmergencycallPeer::RENUNOFHOSPITAL);
            $criteria->addSelectColumn(EmergencycallPeer::FACERENUNOFHOSPITAL);
            $criteria->addSelectColumn(EmergencycallPeer::DISEASE);
            $criteria->addSelectColumn(EmergencycallPeer::BIRTH);
            $criteria->addSelectColumn(EmergencycallPeer::PREGNANCYFAILURE);
            $criteria->addSelectColumn(EmergencycallPeer::NOTECALL);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.event_id');
            $criteria->addSelectColumn($alias . '.numberCardCall');
            $criteria->addSelectColumn($alias . '.brigade_id');
            $criteria->addSelectColumn($alias . '.causeCall_id');
            $criteria->addSelectColumn($alias . '.whoCallOnPhone');
            $criteria->addSelectColumn($alias . '.numberPhone');
            $criteria->addSelectColumn($alias . '.begDate');
            $criteria->addSelectColumn($alias . '.passDate');
            $criteria->addSelectColumn($alias . '.departureDate');
            $criteria->addSelectColumn($alias . '.arrivalDate');
            $criteria->addSelectColumn($alias . '.finishServiceDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.placeReceptionCall_id');
            $criteria->addSelectColumn($alias . '.receivedCall_id');
            $criteria->addSelectColumn($alias . '.reasondDelays_id');
            $criteria->addSelectColumn($alias . '.resultCall_id');
            $criteria->addSelectColumn($alias . '.accident_id');
            $criteria->addSelectColumn($alias . '.death_id');
            $criteria->addSelectColumn($alias . '.ebriety_id');
            $criteria->addSelectColumn($alias . '.diseased_id');
            $criteria->addSelectColumn($alias . '.placeCall_id');
            $criteria->addSelectColumn($alias . '.methodTransport_id');
            $criteria->addSelectColumn($alias . '.transfTransport_id');
            $criteria->addSelectColumn($alias . '.renunOfHospital');
            $criteria->addSelectColumn($alias . '.faceRenunOfHospital');
            $criteria->addSelectColumn($alias . '.disease');
            $criteria->addSelectColumn($alias . '.birth');
            $criteria->addSelectColumn($alias . '.pregnancyFailure');
            $criteria->addSelectColumn($alias . '.noteCall');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EmergencycallPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EmergencycallPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(EmergencycallPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Emergencycall
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = EmergencycallPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return EmergencycallPeer::populateObjects(EmergencycallPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            EmergencycallPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(EmergencycallPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Emergencycall $obj A Emergencycall object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            EmergencycallPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Emergencycall object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Emergencycall) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Emergencycall object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(EmergencycallPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Emergencycall Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(EmergencycallPeer::$instances[$key])) {
                return EmergencycallPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (EmergencycallPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        EmergencycallPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to EmergencyCall
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = EmergencycallPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = EmergencycallPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = EmergencycallPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EmergencycallPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Emergencycall object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = EmergencycallPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = EmergencycallPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + EmergencycallPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EmergencycallPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            EmergencycallPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(EmergencycallPeer::DATABASE_NAME)->getTable(EmergencycallPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseEmergencycallPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseEmergencycallPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new EmergencycallTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return EmergencycallPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Emergencycall or Criteria object.
     *
     * @param      mixed $values Criteria or Emergencycall object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Emergencycall object
        }

        if ($criteria->containsKey(EmergencycallPeer::ID) && $criteria->keyContainsValue(EmergencycallPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EmergencycallPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(EmergencycallPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Emergencycall or Criteria object.
     *
     * @param      mixed $values Criteria or Emergencycall object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(EmergencycallPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(EmergencycallPeer::ID);
            $value = $criteria->remove(EmergencycallPeer::ID);
            if ($value) {
                $selectCriteria->add(EmergencycallPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(EmergencycallPeer::TABLE_NAME);
            }

        } else { // $values is Emergencycall object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(EmergencycallPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the EmergencyCall table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(EmergencycallPeer::TABLE_NAME, $con, EmergencycallPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EmergencycallPeer::clearInstancePool();
            EmergencycallPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Emergencycall or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Emergencycall object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            EmergencycallPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Emergencycall) { // it's a model object
            // invalidate the cache for this single object
            EmergencycallPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EmergencycallPeer::DATABASE_NAME);
            $criteria->add(EmergencycallPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                EmergencycallPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(EmergencycallPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            EmergencycallPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Emergencycall object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Emergencycall $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(EmergencycallPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(EmergencycallPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(EmergencycallPeer::DATABASE_NAME, EmergencycallPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Emergencycall
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = EmergencycallPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(EmergencycallPeer::DATABASE_NAME);
        $criteria->add(EmergencycallPeer::ID, $pk);

        $v = EmergencycallPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Emergencycall[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(EmergencycallPeer::DATABASE_NAME);
            $criteria->add(EmergencycallPeer::ID, $pks, Criteria::IN);
            $objs = EmergencycallPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseEmergencycallPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEmergencycallPeer::buildTableMap();

