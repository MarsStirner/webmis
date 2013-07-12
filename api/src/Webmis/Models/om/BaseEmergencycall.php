<?php

namespace Webmis\Models\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Emergencycall;
use Webmis\Models\EmergencycallPeer;
use Webmis\Models\EmergencycallQuery;

/**
 * Base class that represents a row from the 'EmergencyCall' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEmergencycall extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\EmergencycallPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EmergencycallPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the createdatetime field.
     * @var        string
     */
    protected $createdatetime;

    /**
     * The value for the createperson_id field.
     * @var        int
     */
    protected $createperson_id;

    /**
     * The value for the modifydatetime field.
     * @var        string
     */
    protected $modifydatetime;

    /**
     * The value for the modifyperson_id field.
     * @var        int
     */
    protected $modifyperson_id;

    /**
     * The value for the deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the numbercardcall field.
     * @var        string
     */
    protected $numbercardcall;

    /**
     * The value for the brigade_id field.
     * @var        int
     */
    protected $brigade_id;

    /**
     * The value for the causecall_id field.
     * @var        int
     */
    protected $causecall_id;

    /**
     * The value for the whocallonphone field.
     * @var        string
     */
    protected $whocallonphone;

    /**
     * The value for the numberphone field.
     * @var        string
     */
    protected $numberphone;

    /**
     * The value for the begdate field.
     * @var        string
     */
    protected $begdate;

    /**
     * The value for the passdate field.
     * @var        string
     */
    protected $passdate;

    /**
     * The value for the departuredate field.
     * @var        string
     */
    protected $departuredate;

    /**
     * The value for the arrivaldate field.
     * @var        string
     */
    protected $arrivaldate;

    /**
     * The value for the finishservicedate field.
     * @var        string
     */
    protected $finishservicedate;

    /**
     * The value for the enddate field.
     * @var        string
     */
    protected $enddate;

    /**
     * The value for the placereceptioncall_id field.
     * @var        int
     */
    protected $placereceptioncall_id;

    /**
     * The value for the receivedcall_id field.
     * @var        int
     */
    protected $receivedcall_id;

    /**
     * The value for the reasonddelays_id field.
     * @var        int
     */
    protected $reasonddelays_id;

    /**
     * The value for the resultcall_id field.
     * @var        int
     */
    protected $resultcall_id;

    /**
     * The value for the accident_id field.
     * @var        int
     */
    protected $accident_id;

    /**
     * The value for the death_id field.
     * @var        int
     */
    protected $death_id;

    /**
     * The value for the ebriety_id field.
     * @var        int
     */
    protected $ebriety_id;

    /**
     * The value for the diseased_id field.
     * @var        int
     */
    protected $diseased_id;

    /**
     * The value for the placecall_id field.
     * @var        int
     */
    protected $placecall_id;

    /**
     * The value for the methodtransport_id field.
     * @var        int
     */
    protected $methodtransport_id;

    /**
     * The value for the transftransport_id field.
     * @var        int
     */
    protected $transftransport_id;

    /**
     * The value for the renunofhospital field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $renunofhospital;

    /**
     * The value for the facerenunofhospital field.
     * @var        string
     */
    protected $facerenunofhospital;

    /**
     * The value for the disease field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $disease;

    /**
     * The value for the birth field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $birth;

    /**
     * The value for the pregnancyfailure field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $pregnancyfailure;

    /**
     * The value for the notecall field.
     * @var        string
     */
    protected $notecall;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->renunofhospital = false;
        $this->disease = false;
        $this->birth = false;
        $this->pregnancyfailure = false;
    }

    /**
     * Initializes internal state of BaseEmergencycall object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [optionally formatted] temporal [createdatetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->createdatetime === null) {
            return null;
        }

        if ($this->createdatetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->createdatetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->createdatetime, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [createperson_id] column value.
     *
     * @return int
     */
    public function getCreatepersonId()
    {
        return $this->createperson_id;
    }

    /**
     * Get the [optionally formatted] temporal [modifydatetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getModifydatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->modifydatetime === null) {
            return null;
        }

        if ($this->modifydatetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->modifydatetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->modifydatetime, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [modifyperson_id] column value.
     *
     * @return int
     */
    public function getModifypersonId()
    {
        return $this->modifyperson_id;
    }

    /**
     * Get the [deleted] column value.
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Get the [numbercardcall] column value.
     *
     * @return string
     */
    public function getNumbercardcall()
    {
        return $this->numbercardcall;
    }

    /**
     * Get the [brigade_id] column value.
     *
     * @return int
     */
    public function getBrigadeId()
    {
        return $this->brigade_id;
    }

    /**
     * Get the [causecall_id] column value.
     *
     * @return int
     */
    public function getCausecallId()
    {
        return $this->causecall_id;
    }

    /**
     * Get the [whocallonphone] column value.
     *
     * @return string
     */
    public function getWhocallonphone()
    {
        return $this->whocallonphone;
    }

    /**
     * Get the [numberphone] column value.
     *
     * @return string
     */
    public function getNumberphone()
    {
        return $this->numberphone;
    }

    /**
     * Get the [optionally formatted] temporal [begdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBegdate($format = 'Y-m-d H:i:s')
    {
        if ($this->begdate === null) {
            return null;
        }

        if ($this->begdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->begdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->begdate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [passdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPassdate($format = 'Y-m-d H:i:s')
    {
        if ($this->passdate === null) {
            return null;
        }

        if ($this->passdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->passdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->passdate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [departuredate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDeparturedate($format = 'Y-m-d H:i:s')
    {
        if ($this->departuredate === null) {
            return null;
        }

        if ($this->departuredate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->departuredate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->departuredate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [arrivaldate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getArrivaldate($format = 'Y-m-d H:i:s')
    {
        if ($this->arrivaldate === null) {
            return null;
        }

        if ($this->arrivaldate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->arrivaldate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->arrivaldate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [finishservicedate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFinishservicedate($format = 'Y-m-d H:i:s')
    {
        if ($this->finishservicedate === null) {
            return null;
        }

        if ($this->finishservicedate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->finishservicedate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->finishservicedate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [enddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnddate($format = 'Y-m-d H:i:s')
    {
        if ($this->enddate === null) {
            return null;
        }

        if ($this->enddate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->enddate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->enddate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [placereceptioncall_id] column value.
     *
     * @return int
     */
    public function getPlacereceptioncallId()
    {
        return $this->placereceptioncall_id;
    }

    /**
     * Get the [receivedcall_id] column value.
     *
     * @return int
     */
    public function getReceivedcallId()
    {
        return $this->receivedcall_id;
    }

    /**
     * Get the [reasonddelays_id] column value.
     *
     * @return int
     */
    public function getReasonddelaysId()
    {
        return $this->reasonddelays_id;
    }

    /**
     * Get the [resultcall_id] column value.
     *
     * @return int
     */
    public function getResultcallId()
    {
        return $this->resultcall_id;
    }

    /**
     * Get the [accident_id] column value.
     *
     * @return int
     */
    public function getAccidentId()
    {
        return $this->accident_id;
    }

    /**
     * Get the [death_id] column value.
     *
     * @return int
     */
    public function getDeathId()
    {
        return $this->death_id;
    }

    /**
     * Get the [ebriety_id] column value.
     *
     * @return int
     */
    public function getEbrietyId()
    {
        return $this->ebriety_id;
    }

    /**
     * Get the [diseased_id] column value.
     *
     * @return int
     */
    public function getDiseasedId()
    {
        return $this->diseased_id;
    }

    /**
     * Get the [placecall_id] column value.
     *
     * @return int
     */
    public function getPlacecallId()
    {
        return $this->placecall_id;
    }

    /**
     * Get the [methodtransport_id] column value.
     *
     * @return int
     */
    public function getMethodtransportId()
    {
        return $this->methodtransport_id;
    }

    /**
     * Get the [transftransport_id] column value.
     *
     * @return int
     */
    public function getTransftransportId()
    {
        return $this->transftransport_id;
    }

    /**
     * Get the [renunofhospital] column value.
     *
     * @return boolean
     */
    public function getRenunofhospital()
    {
        return $this->renunofhospital;
    }

    /**
     * Get the [facerenunofhospital] column value.
     *
     * @return string
     */
    public function getFacerenunofhospital()
    {
        return $this->facerenunofhospital;
    }

    /**
     * Get the [disease] column value.
     *
     * @return boolean
     */
    public function getDisease()
    {
        return $this->disease;
    }

    /**
     * Get the [birth] column value.
     *
     * @return boolean
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Get the [pregnancyfailure] column value.
     *
     * @return boolean
     */
    public function getPregnancyfailure()
    {
        return $this->pregnancyfailure;
    }

    /**
     * Get the [notecall] column value.
     *
     * @return string
     */
    public function getNotecall()
    {
        return $this->notecall;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::MODIFYPERSON_ID;
        }


        return $this;
    } // setModifypersonId()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->deleted !== $v) {
            $this->deleted = $v;
            $this->modifiedColumns[] = EmergencycallPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [numbercardcall] column.
     *
     * @param string $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setNumbercardcall($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numbercardcall !== $v) {
            $this->numbercardcall = $v;
            $this->modifiedColumns[] = EmergencycallPeer::NUMBERCARDCALL;
        }


        return $this;
    } // setNumbercardcall()

    /**
     * Set the value of [brigade_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setBrigadeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->brigade_id !== $v) {
            $this->brigade_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::BRIGADE_ID;
        }


        return $this;
    } // setBrigadeId()

    /**
     * Set the value of [causecall_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setCausecallId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->causecall_id !== $v) {
            $this->causecall_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::CAUSECALL_ID;
        }


        return $this;
    } // setCausecallId()

    /**
     * Set the value of [whocallonphone] column.
     *
     * @param string $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setWhocallonphone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->whocallonphone !== $v) {
            $this->whocallonphone = $v;
            $this->modifiedColumns[] = EmergencycallPeer::WHOCALLONPHONE;
        }


        return $this;
    } // setWhocallonphone()

    /**
     * Set the value of [numberphone] column.
     *
     * @param string $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setNumberphone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numberphone !== $v) {
            $this->numberphone = $v;
            $this->modifiedColumns[] = EmergencycallPeer::NUMBERPHONE;
        }


        return $this;
    } // setNumberphone()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [passdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setPassdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->passdate !== null || $dt !== null) {
            $currentDateAsString = ($this->passdate !== null && $tmpDt = new DateTime($this->passdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->passdate = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::PASSDATE;
            }
        } // if either are not null


        return $this;
    } // setPassdate()

    /**
     * Sets the value of [departuredate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setDeparturedate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->departuredate !== null || $dt !== null) {
            $currentDateAsString = ($this->departuredate !== null && $tmpDt = new DateTime($this->departuredate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->departuredate = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::DEPARTUREDATE;
            }
        } // if either are not null


        return $this;
    } // setDeparturedate()

    /**
     * Sets the value of [arrivaldate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setArrivaldate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->arrivaldate !== null || $dt !== null) {
            $currentDateAsString = ($this->arrivaldate !== null && $tmpDt = new DateTime($this->arrivaldate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->arrivaldate = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::ARRIVALDATE;
            }
        } // if either are not null


        return $this;
    } // setArrivaldate()

    /**
     * Sets the value of [finishservicedate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setFinishservicedate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->finishservicedate !== null || $dt !== null) {
            $currentDateAsString = ($this->finishservicedate !== null && $tmpDt = new DateTime($this->finishservicedate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->finishservicedate = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::FINISHSERVICEDATE;
            }
        } // if either are not null


        return $this;
    } // setFinishservicedate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = EmergencycallPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [placereceptioncall_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setPlacereceptioncallId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->placereceptioncall_id !== $v) {
            $this->placereceptioncall_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::PLACERECEPTIONCALL_ID;
        }


        return $this;
    } // setPlacereceptioncallId()

    /**
     * Set the value of [receivedcall_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setReceivedcallId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->receivedcall_id !== $v) {
            $this->receivedcall_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::RECEIVEDCALL_ID;
        }


        return $this;
    } // setReceivedcallId()

    /**
     * Set the value of [reasonddelays_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setReasonddelaysId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->reasonddelays_id !== $v) {
            $this->reasonddelays_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::REASONDDELAYS_ID;
        }


        return $this;
    } // setReasonddelaysId()

    /**
     * Set the value of [resultcall_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setResultcallId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->resultcall_id !== $v) {
            $this->resultcall_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::RESULTCALL_ID;
        }


        return $this;
    } // setResultcallId()

    /**
     * Set the value of [accident_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setAccidentId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->accident_id !== $v) {
            $this->accident_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::ACCIDENT_ID;
        }


        return $this;
    } // setAccidentId()

    /**
     * Set the value of [death_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setDeathId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->death_id !== $v) {
            $this->death_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::DEATH_ID;
        }


        return $this;
    } // setDeathId()

    /**
     * Set the value of [ebriety_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setEbrietyId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ebriety_id !== $v) {
            $this->ebriety_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::EBRIETY_ID;
        }


        return $this;
    } // setEbrietyId()

    /**
     * Set the value of [diseased_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setDiseasedId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->diseased_id !== $v) {
            $this->diseased_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::DISEASED_ID;
        }


        return $this;
    } // setDiseasedId()

    /**
     * Set the value of [placecall_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setPlacecallId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->placecall_id !== $v) {
            $this->placecall_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::PLACECALL_ID;
        }


        return $this;
    } // setPlacecallId()

    /**
     * Set the value of [methodtransport_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setMethodtransportId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->methodtransport_id !== $v) {
            $this->methodtransport_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::METHODTRANSPORT_ID;
        }


        return $this;
    } // setMethodtransportId()

    /**
     * Set the value of [transftransport_id] column.
     *
     * @param int $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setTransftransportId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->transftransport_id !== $v) {
            $this->transftransport_id = $v;
            $this->modifiedColumns[] = EmergencycallPeer::TRANSFTRANSPORT_ID;
        }


        return $this;
    } // setTransftransportId()

    /**
     * Sets the value of the [renunofhospital] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setRenunofhospital($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->renunofhospital !== $v) {
            $this->renunofhospital = $v;
            $this->modifiedColumns[] = EmergencycallPeer::RENUNOFHOSPITAL;
        }


        return $this;
    } // setRenunofhospital()

    /**
     * Set the value of [facerenunofhospital] column.
     *
     * @param string $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setFacerenunofhospital($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->facerenunofhospital !== $v) {
            $this->facerenunofhospital = $v;
            $this->modifiedColumns[] = EmergencycallPeer::FACERENUNOFHOSPITAL;
        }


        return $this;
    } // setFacerenunofhospital()

    /**
     * Sets the value of the [disease] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setDisease($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->disease !== $v) {
            $this->disease = $v;
            $this->modifiedColumns[] = EmergencycallPeer::DISEASE;
        }


        return $this;
    } // setDisease()

    /**
     * Sets the value of the [birth] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setBirth($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->birth !== $v) {
            $this->birth = $v;
            $this->modifiedColumns[] = EmergencycallPeer::BIRTH;
        }


        return $this;
    } // setBirth()

    /**
     * Sets the value of the [pregnancyfailure] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setPregnancyfailure($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->pregnancyfailure !== $v) {
            $this->pregnancyfailure = $v;
            $this->modifiedColumns[] = EmergencycallPeer::PREGNANCYFAILURE;
        }


        return $this;
    } // setPregnancyfailure()

    /**
     * Set the value of [notecall] column.
     *
     * @param string $v new value
     * @return Emergencycall The current object (for fluent API support)
     */
    public function setNotecall($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->notecall !== $v) {
            $this->notecall = $v;
            $this->modifiedColumns[] = EmergencycallPeer::NOTECALL;
        }


        return $this;
    } // setNotecall()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->deleted !== false) {
                return false;
            }

            if ($this->renunofhospital !== false) {
                return false;
            }

            if ($this->disease !== false) {
                return false;
            }

            if ($this->birth !== false) {
                return false;
            }

            if ($this->pregnancyfailure !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->createdatetime = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->createperson_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->modifydatetime = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->modifyperson_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->deleted = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->event_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->numbercardcall = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->brigade_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->causecall_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->whocallonphone = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->numberphone = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->begdate = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->passdate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->departuredate = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->arrivaldate = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->finishservicedate = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->enddate = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->placereceptioncall_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->receivedcall_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->reasonddelays_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
            $this->resultcall_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->accident_id = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
            $this->death_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->ebriety_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->diseased_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->placecall_id = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
            $this->methodtransport_id = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
            $this->transftransport_id = ($row[$startcol + 28] !== null) ? (int) $row[$startcol + 28] : null;
            $this->renunofhospital = ($row[$startcol + 29] !== null) ? (boolean) $row[$startcol + 29] : null;
            $this->facerenunofhospital = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->disease = ($row[$startcol + 31] !== null) ? (boolean) $row[$startcol + 31] : null;
            $this->birth = ($row[$startcol + 32] !== null) ? (boolean) $row[$startcol + 32] : null;
            $this->pregnancyfailure = ($row[$startcol + 33] !== null) ? (boolean) $row[$startcol + 33] : null;
            $this->notecall = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 35; // 35 = EmergencycallPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Emergencycall object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EmergencycallPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EmergencycallQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                EmergencycallPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = EmergencycallPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EmergencycallPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EmergencycallPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(EmergencycallPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(EmergencycallPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(EmergencycallPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::NUMBERCARDCALL)) {
            $modifiedColumns[':p' . $index++]  = '`numberCardCall`';
        }
        if ($this->isColumnModified(EmergencycallPeer::BRIGADE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`brigade_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::CAUSECALL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`causeCall_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::WHOCALLONPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`whoCallOnPhone`';
        }
        if ($this->isColumnModified(EmergencycallPeer::NUMBERPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`numberPhone`';
        }
        if ($this->isColumnModified(EmergencycallPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(EmergencycallPeer::PASSDATE)) {
            $modifiedColumns[':p' . $index++]  = '`passDate`';
        }
        if ($this->isColumnModified(EmergencycallPeer::DEPARTUREDATE)) {
            $modifiedColumns[':p' . $index++]  = '`departureDate`';
        }
        if ($this->isColumnModified(EmergencycallPeer::ARRIVALDATE)) {
            $modifiedColumns[':p' . $index++]  = '`arrivalDate`';
        }
        if ($this->isColumnModified(EmergencycallPeer::FINISHSERVICEDATE)) {
            $modifiedColumns[':p' . $index++]  = '`finishServiceDate`';
        }
        if ($this->isColumnModified(EmergencycallPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(EmergencycallPeer::PLACERECEPTIONCALL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`placeReceptionCall_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::RECEIVEDCALL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`receivedCall_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::REASONDDELAYS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`reasondDelays_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::RESULTCALL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`resultCall_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::ACCIDENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`accident_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::DEATH_ID)) {
            $modifiedColumns[':p' . $index++]  = '`death_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::EBRIETY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ebriety_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::DISEASED_ID)) {
            $modifiedColumns[':p' . $index++]  = '`diseased_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::PLACECALL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`placeCall_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::METHODTRANSPORT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`methodTransport_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::TRANSFTRANSPORT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`transfTransport_id`';
        }
        if ($this->isColumnModified(EmergencycallPeer::RENUNOFHOSPITAL)) {
            $modifiedColumns[':p' . $index++]  = '`renunOfHospital`';
        }
        if ($this->isColumnModified(EmergencycallPeer::FACERENUNOFHOSPITAL)) {
            $modifiedColumns[':p' . $index++]  = '`faceRenunOfHospital`';
        }
        if ($this->isColumnModified(EmergencycallPeer::DISEASE)) {
            $modifiedColumns[':p' . $index++]  = '`disease`';
        }
        if ($this->isColumnModified(EmergencycallPeer::BIRTH)) {
            $modifiedColumns[':p' . $index++]  = '`birth`';
        }
        if ($this->isColumnModified(EmergencycallPeer::PREGNANCYFAILURE)) {
            $modifiedColumns[':p' . $index++]  = '`pregnancyFailure`';
        }
        if ($this->isColumnModified(EmergencycallPeer::NOTECALL)) {
            $modifiedColumns[':p' . $index++]  = '`noteCall`';
        }

        $sql = sprintf(
            'INSERT INTO `EmergencyCall` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`createDatetime`':
                        $stmt->bindValue($identifier, $this->createdatetime, PDO::PARAM_STR);
                        break;
                    case '`createPerson_id`':
                        $stmt->bindValue($identifier, $this->createperson_id, PDO::PARAM_INT);
                        break;
                    case '`modifyDatetime`':
                        $stmt->bindValue($identifier, $this->modifydatetime, PDO::PARAM_STR);
                        break;
                    case '`modifyPerson_id`':
                        $stmt->bindValue($identifier, $this->modifyperson_id, PDO::PARAM_INT);
                        break;
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
                        break;
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`numberCardCall`':
                        $stmt->bindValue($identifier, $this->numbercardcall, PDO::PARAM_STR);
                        break;
                    case '`brigade_id`':
                        $stmt->bindValue($identifier, $this->brigade_id, PDO::PARAM_INT);
                        break;
                    case '`causeCall_id`':
                        $stmt->bindValue($identifier, $this->causecall_id, PDO::PARAM_INT);
                        break;
                    case '`whoCallOnPhone`':
                        $stmt->bindValue($identifier, $this->whocallonphone, PDO::PARAM_STR);
                        break;
                    case '`numberPhone`':
                        $stmt->bindValue($identifier, $this->numberphone, PDO::PARAM_STR);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`passDate`':
                        $stmt->bindValue($identifier, $this->passdate, PDO::PARAM_STR);
                        break;
                    case '`departureDate`':
                        $stmt->bindValue($identifier, $this->departuredate, PDO::PARAM_STR);
                        break;
                    case '`arrivalDate`':
                        $stmt->bindValue($identifier, $this->arrivaldate, PDO::PARAM_STR);
                        break;
                    case '`finishServiceDate`':
                        $stmt->bindValue($identifier, $this->finishservicedate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`placeReceptionCall_id`':
                        $stmt->bindValue($identifier, $this->placereceptioncall_id, PDO::PARAM_INT);
                        break;
                    case '`receivedCall_id`':
                        $stmt->bindValue($identifier, $this->receivedcall_id, PDO::PARAM_INT);
                        break;
                    case '`reasondDelays_id`':
                        $stmt->bindValue($identifier, $this->reasonddelays_id, PDO::PARAM_INT);
                        break;
                    case '`resultCall_id`':
                        $stmt->bindValue($identifier, $this->resultcall_id, PDO::PARAM_INT);
                        break;
                    case '`accident_id`':
                        $stmt->bindValue($identifier, $this->accident_id, PDO::PARAM_INT);
                        break;
                    case '`death_id`':
                        $stmt->bindValue($identifier, $this->death_id, PDO::PARAM_INT);
                        break;
                    case '`ebriety_id`':
                        $stmt->bindValue($identifier, $this->ebriety_id, PDO::PARAM_INT);
                        break;
                    case '`diseased_id`':
                        $stmt->bindValue($identifier, $this->diseased_id, PDO::PARAM_INT);
                        break;
                    case '`placeCall_id`':
                        $stmt->bindValue($identifier, $this->placecall_id, PDO::PARAM_INT);
                        break;
                    case '`methodTransport_id`':
                        $stmt->bindValue($identifier, $this->methodtransport_id, PDO::PARAM_INT);
                        break;
                    case '`transfTransport_id`':
                        $stmt->bindValue($identifier, $this->transftransport_id, PDO::PARAM_INT);
                        break;
                    case '`renunOfHospital`':
                        $stmt->bindValue($identifier, (int) $this->renunofhospital, PDO::PARAM_INT);
                        break;
                    case '`faceRenunOfHospital`':
                        $stmt->bindValue($identifier, $this->facerenunofhospital, PDO::PARAM_STR);
                        break;
                    case '`disease`':
                        $stmt->bindValue($identifier, (int) $this->disease, PDO::PARAM_INT);
                        break;
                    case '`birth`':
                        $stmt->bindValue($identifier, (int) $this->birth, PDO::PARAM_INT);
                        break;
                    case '`pregnancyFailure`':
                        $stmt->bindValue($identifier, (int) $this->pregnancyfailure, PDO::PARAM_INT);
                        break;
                    case '`noteCall`':
                        $stmt->bindValue($identifier, $this->notecall, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = EmergencycallPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = EmergencycallPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getCreatedatetime();
                break;
            case 2:
                return $this->getCreatepersonId();
                break;
            case 3:
                return $this->getModifydatetime();
                break;
            case 4:
                return $this->getModifypersonId();
                break;
            case 5:
                return $this->getDeleted();
                break;
            case 6:
                return $this->getEventId();
                break;
            case 7:
                return $this->getNumbercardcall();
                break;
            case 8:
                return $this->getBrigadeId();
                break;
            case 9:
                return $this->getCausecallId();
                break;
            case 10:
                return $this->getWhocallonphone();
                break;
            case 11:
                return $this->getNumberphone();
                break;
            case 12:
                return $this->getBegdate();
                break;
            case 13:
                return $this->getPassdate();
                break;
            case 14:
                return $this->getDeparturedate();
                break;
            case 15:
                return $this->getArrivaldate();
                break;
            case 16:
                return $this->getFinishservicedate();
                break;
            case 17:
                return $this->getEnddate();
                break;
            case 18:
                return $this->getPlacereceptioncallId();
                break;
            case 19:
                return $this->getReceivedcallId();
                break;
            case 20:
                return $this->getReasonddelaysId();
                break;
            case 21:
                return $this->getResultcallId();
                break;
            case 22:
                return $this->getAccidentId();
                break;
            case 23:
                return $this->getDeathId();
                break;
            case 24:
                return $this->getEbrietyId();
                break;
            case 25:
                return $this->getDiseasedId();
                break;
            case 26:
                return $this->getPlacecallId();
                break;
            case 27:
                return $this->getMethodtransportId();
                break;
            case 28:
                return $this->getTransftransportId();
                break;
            case 29:
                return $this->getRenunofhospital();
                break;
            case 30:
                return $this->getFacerenunofhospital();
                break;
            case 31:
                return $this->getDisease();
                break;
            case 32:
                return $this->getBirth();
                break;
            case 33:
                return $this->getPregnancyfailure();
                break;
            case 34:
                return $this->getNotecall();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['Emergencycall'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Emergencycall'][$this->getPrimaryKey()] = true;
        $keys = EmergencycallPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getEventId(),
            $keys[7] => $this->getNumbercardcall(),
            $keys[8] => $this->getBrigadeId(),
            $keys[9] => $this->getCausecallId(),
            $keys[10] => $this->getWhocallonphone(),
            $keys[11] => $this->getNumberphone(),
            $keys[12] => $this->getBegdate(),
            $keys[13] => $this->getPassdate(),
            $keys[14] => $this->getDeparturedate(),
            $keys[15] => $this->getArrivaldate(),
            $keys[16] => $this->getFinishservicedate(),
            $keys[17] => $this->getEnddate(),
            $keys[18] => $this->getPlacereceptioncallId(),
            $keys[19] => $this->getReceivedcallId(),
            $keys[20] => $this->getReasonddelaysId(),
            $keys[21] => $this->getResultcallId(),
            $keys[22] => $this->getAccidentId(),
            $keys[23] => $this->getDeathId(),
            $keys[24] => $this->getEbrietyId(),
            $keys[25] => $this->getDiseasedId(),
            $keys[26] => $this->getPlacecallId(),
            $keys[27] => $this->getMethodtransportId(),
            $keys[28] => $this->getTransftransportId(),
            $keys[29] => $this->getRenunofhospital(),
            $keys[30] => $this->getFacerenunofhospital(),
            $keys[31] => $this->getDisease(),
            $keys[32] => $this->getBirth(),
            $keys[33] => $this->getPregnancyfailure(),
            $keys[34] => $this->getNotecall(),
        );

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = EmergencycallPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setCreatedatetime($value);
                break;
            case 2:
                $this->setCreatepersonId($value);
                break;
            case 3:
                $this->setModifydatetime($value);
                break;
            case 4:
                $this->setModifypersonId($value);
                break;
            case 5:
                $this->setDeleted($value);
                break;
            case 6:
                $this->setEventId($value);
                break;
            case 7:
                $this->setNumbercardcall($value);
                break;
            case 8:
                $this->setBrigadeId($value);
                break;
            case 9:
                $this->setCausecallId($value);
                break;
            case 10:
                $this->setWhocallonphone($value);
                break;
            case 11:
                $this->setNumberphone($value);
                break;
            case 12:
                $this->setBegdate($value);
                break;
            case 13:
                $this->setPassdate($value);
                break;
            case 14:
                $this->setDeparturedate($value);
                break;
            case 15:
                $this->setArrivaldate($value);
                break;
            case 16:
                $this->setFinishservicedate($value);
                break;
            case 17:
                $this->setEnddate($value);
                break;
            case 18:
                $this->setPlacereceptioncallId($value);
                break;
            case 19:
                $this->setReceivedcallId($value);
                break;
            case 20:
                $this->setReasonddelaysId($value);
                break;
            case 21:
                $this->setResultcallId($value);
                break;
            case 22:
                $this->setAccidentId($value);
                break;
            case 23:
                $this->setDeathId($value);
                break;
            case 24:
                $this->setEbrietyId($value);
                break;
            case 25:
                $this->setDiseasedId($value);
                break;
            case 26:
                $this->setPlacecallId($value);
                break;
            case 27:
                $this->setMethodtransportId($value);
                break;
            case 28:
                $this->setTransftransportId($value);
                break;
            case 29:
                $this->setRenunofhospital($value);
                break;
            case 30:
                $this->setFacerenunofhospital($value);
                break;
            case 31:
                $this->setDisease($value);
                break;
            case 32:
                $this->setBirth($value);
                break;
            case 33:
                $this->setPregnancyfailure($value);
                break;
            case 34:
                $this->setNotecall($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = EmergencycallPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEventId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNumbercardcall($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setBrigadeId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCausecallId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setWhocallonphone($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNumberphone($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBegdate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setPassdate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setDeparturedate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setArrivaldate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setFinishservicedate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setEnddate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setPlacereceptioncallId($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setReceivedcallId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setReasonddelaysId($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setResultcallId($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setAccidentId($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setDeathId($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setEbrietyId($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setDiseasedId($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setPlacecallId($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setMethodtransportId($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setTransftransportId($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setRenunofhospital($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setFacerenunofhospital($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setDisease($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setBirth($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setPregnancyfailure($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setNotecall($arr[$keys[34]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EmergencycallPeer::DATABASE_NAME);

        if ($this->isColumnModified(EmergencycallPeer::ID)) $criteria->add(EmergencycallPeer::ID, $this->id);
        if ($this->isColumnModified(EmergencycallPeer::CREATEDATETIME)) $criteria->add(EmergencycallPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(EmergencycallPeer::CREATEPERSON_ID)) $criteria->add(EmergencycallPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(EmergencycallPeer::MODIFYDATETIME)) $criteria->add(EmergencycallPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(EmergencycallPeer::MODIFYPERSON_ID)) $criteria->add(EmergencycallPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(EmergencycallPeer::DELETED)) $criteria->add(EmergencycallPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(EmergencycallPeer::EVENT_ID)) $criteria->add(EmergencycallPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(EmergencycallPeer::NUMBERCARDCALL)) $criteria->add(EmergencycallPeer::NUMBERCARDCALL, $this->numbercardcall);
        if ($this->isColumnModified(EmergencycallPeer::BRIGADE_ID)) $criteria->add(EmergencycallPeer::BRIGADE_ID, $this->brigade_id);
        if ($this->isColumnModified(EmergencycallPeer::CAUSECALL_ID)) $criteria->add(EmergencycallPeer::CAUSECALL_ID, $this->causecall_id);
        if ($this->isColumnModified(EmergencycallPeer::WHOCALLONPHONE)) $criteria->add(EmergencycallPeer::WHOCALLONPHONE, $this->whocallonphone);
        if ($this->isColumnModified(EmergencycallPeer::NUMBERPHONE)) $criteria->add(EmergencycallPeer::NUMBERPHONE, $this->numberphone);
        if ($this->isColumnModified(EmergencycallPeer::BEGDATE)) $criteria->add(EmergencycallPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(EmergencycallPeer::PASSDATE)) $criteria->add(EmergencycallPeer::PASSDATE, $this->passdate);
        if ($this->isColumnModified(EmergencycallPeer::DEPARTUREDATE)) $criteria->add(EmergencycallPeer::DEPARTUREDATE, $this->departuredate);
        if ($this->isColumnModified(EmergencycallPeer::ARRIVALDATE)) $criteria->add(EmergencycallPeer::ARRIVALDATE, $this->arrivaldate);
        if ($this->isColumnModified(EmergencycallPeer::FINISHSERVICEDATE)) $criteria->add(EmergencycallPeer::FINISHSERVICEDATE, $this->finishservicedate);
        if ($this->isColumnModified(EmergencycallPeer::ENDDATE)) $criteria->add(EmergencycallPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(EmergencycallPeer::PLACERECEPTIONCALL_ID)) $criteria->add(EmergencycallPeer::PLACERECEPTIONCALL_ID, $this->placereceptioncall_id);
        if ($this->isColumnModified(EmergencycallPeer::RECEIVEDCALL_ID)) $criteria->add(EmergencycallPeer::RECEIVEDCALL_ID, $this->receivedcall_id);
        if ($this->isColumnModified(EmergencycallPeer::REASONDDELAYS_ID)) $criteria->add(EmergencycallPeer::REASONDDELAYS_ID, $this->reasonddelays_id);
        if ($this->isColumnModified(EmergencycallPeer::RESULTCALL_ID)) $criteria->add(EmergencycallPeer::RESULTCALL_ID, $this->resultcall_id);
        if ($this->isColumnModified(EmergencycallPeer::ACCIDENT_ID)) $criteria->add(EmergencycallPeer::ACCIDENT_ID, $this->accident_id);
        if ($this->isColumnModified(EmergencycallPeer::DEATH_ID)) $criteria->add(EmergencycallPeer::DEATH_ID, $this->death_id);
        if ($this->isColumnModified(EmergencycallPeer::EBRIETY_ID)) $criteria->add(EmergencycallPeer::EBRIETY_ID, $this->ebriety_id);
        if ($this->isColumnModified(EmergencycallPeer::DISEASED_ID)) $criteria->add(EmergencycallPeer::DISEASED_ID, $this->diseased_id);
        if ($this->isColumnModified(EmergencycallPeer::PLACECALL_ID)) $criteria->add(EmergencycallPeer::PLACECALL_ID, $this->placecall_id);
        if ($this->isColumnModified(EmergencycallPeer::METHODTRANSPORT_ID)) $criteria->add(EmergencycallPeer::METHODTRANSPORT_ID, $this->methodtransport_id);
        if ($this->isColumnModified(EmergencycallPeer::TRANSFTRANSPORT_ID)) $criteria->add(EmergencycallPeer::TRANSFTRANSPORT_ID, $this->transftransport_id);
        if ($this->isColumnModified(EmergencycallPeer::RENUNOFHOSPITAL)) $criteria->add(EmergencycallPeer::RENUNOFHOSPITAL, $this->renunofhospital);
        if ($this->isColumnModified(EmergencycallPeer::FACERENUNOFHOSPITAL)) $criteria->add(EmergencycallPeer::FACERENUNOFHOSPITAL, $this->facerenunofhospital);
        if ($this->isColumnModified(EmergencycallPeer::DISEASE)) $criteria->add(EmergencycallPeer::DISEASE, $this->disease);
        if ($this->isColumnModified(EmergencycallPeer::BIRTH)) $criteria->add(EmergencycallPeer::BIRTH, $this->birth);
        if ($this->isColumnModified(EmergencycallPeer::PREGNANCYFAILURE)) $criteria->add(EmergencycallPeer::PREGNANCYFAILURE, $this->pregnancyfailure);
        if ($this->isColumnModified(EmergencycallPeer::NOTECALL)) $criteria->add(EmergencycallPeer::NOTECALL, $this->notecall);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(EmergencycallPeer::DATABASE_NAME);
        $criteria->add(EmergencycallPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Emergencycall (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCreatedatetime($this->getCreatedatetime());
        $copyObj->setCreatepersonId($this->getCreatepersonId());
        $copyObj->setModifydatetime($this->getModifydatetime());
        $copyObj->setModifypersonId($this->getModifypersonId());
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setEventId($this->getEventId());
        $copyObj->setNumbercardcall($this->getNumbercardcall());
        $copyObj->setBrigadeId($this->getBrigadeId());
        $copyObj->setCausecallId($this->getCausecallId());
        $copyObj->setWhocallonphone($this->getWhocallonphone());
        $copyObj->setNumberphone($this->getNumberphone());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setPassdate($this->getPassdate());
        $copyObj->setDeparturedate($this->getDeparturedate());
        $copyObj->setArrivaldate($this->getArrivaldate());
        $copyObj->setFinishservicedate($this->getFinishservicedate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setPlacereceptioncallId($this->getPlacereceptioncallId());
        $copyObj->setReceivedcallId($this->getReceivedcallId());
        $copyObj->setReasonddelaysId($this->getReasonddelaysId());
        $copyObj->setResultcallId($this->getResultcallId());
        $copyObj->setAccidentId($this->getAccidentId());
        $copyObj->setDeathId($this->getDeathId());
        $copyObj->setEbrietyId($this->getEbrietyId());
        $copyObj->setDiseasedId($this->getDiseasedId());
        $copyObj->setPlacecallId($this->getPlacecallId());
        $copyObj->setMethodtransportId($this->getMethodtransportId());
        $copyObj->setTransftransportId($this->getTransftransportId());
        $copyObj->setRenunofhospital($this->getRenunofhospital());
        $copyObj->setFacerenunofhospital($this->getFacerenunofhospital());
        $copyObj->setDisease($this->getDisease());
        $copyObj->setBirth($this->getBirth());
        $copyObj->setPregnancyfailure($this->getPregnancyfailure());
        $copyObj->setNotecall($this->getNotecall());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Emergencycall Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return EmergencycallPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EmergencycallPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->createdatetime = null;
        $this->createperson_id = null;
        $this->modifydatetime = null;
        $this->modifyperson_id = null;
        $this->deleted = null;
        $this->event_id = null;
        $this->numbercardcall = null;
        $this->brigade_id = null;
        $this->causecall_id = null;
        $this->whocallonphone = null;
        $this->numberphone = null;
        $this->begdate = null;
        $this->passdate = null;
        $this->departuredate = null;
        $this->arrivaldate = null;
        $this->finishservicedate = null;
        $this->enddate = null;
        $this->placereceptioncall_id = null;
        $this->receivedcall_id = null;
        $this->reasonddelays_id = null;
        $this->resultcall_id = null;
        $this->accident_id = null;
        $this->death_id = null;
        $this->ebriety_id = null;
        $this->diseased_id = null;
        $this->placecall_id = null;
        $this->methodtransport_id = null;
        $this->transftransport_id = null;
        $this->renunofhospital = null;
        $this->facerenunofhospital = null;
        $this->disease = null;
        $this->birth = null;
        $this->pregnancyfailure = null;
        $this->notecall = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EmergencycallPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
