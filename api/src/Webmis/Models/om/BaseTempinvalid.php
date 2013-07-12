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
use Webmis\Models\Tempinvalid;
use Webmis\Models\TempinvalidPeer;
use Webmis\Models\TempinvalidQuery;

/**
 * Base class that represents a row from the 'TempInvalid' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTempinvalid extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\TempinvalidPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TempinvalidPeer
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
     * The value for the type field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $type;

    /**
     * The value for the doctype field.
     * @var        int
     */
    protected $doctype;

    /**
     * The value for the doctype_id field.
     * @var        int
     */
    protected $doctype_id;

    /**
     * The value for the serial field.
     * @var        string
     */
    protected $serial;

    /**
     * The value for the number field.
     * @var        string
     */
    protected $number;

    /**
     * The value for the client_id field.
     * @var        int
     */
    protected $client_id;

    /**
     * The value for the tempinvalidreason_id field.
     * @var        int
     */
    protected $tempinvalidreason_id;

    /**
     * The value for the begdate field.
     * @var        string
     */
    protected $begdate;

    /**
     * The value for the enddate field.
     * @var        string
     */
    protected $enddate;

    /**
     * The value for the person_id field.
     * @var        int
     */
    protected $person_id;

    /**
     * The value for the diagnosis_id field.
     * @var        int
     */
    protected $diagnosis_id;

    /**
     * The value for the sex field.
     * @var        boolean
     */
    protected $sex;

    /**
     * The value for the age field.
     * @var        int
     */
    protected $age;

    /**
     * The value for the age_bu field.
     * @var        int
     */
    protected $age_bu;

    /**
     * The value for the age_bc field.
     * @var        int
     */
    protected $age_bc;

    /**
     * The value for the age_eu field.
     * @var        int
     */
    protected $age_eu;

    /**
     * The value for the age_ec field.
     * @var        int
     */
    protected $age_ec;

    /**
     * The value for the notes field.
     * @var        string
     */
    protected $notes;

    /**
     * The value for the duration field.
     * @var        int
     */
    protected $duration;

    /**
     * The value for the closed field.
     * @var        boolean
     */
    protected $closed;

    /**
     * The value for the prev_id field.
     * @var        int
     */
    protected $prev_id;

    /**
     * The value for the insuranceofficemark field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $insuranceofficemark;

    /**
     * The value for the casebegdate field.
     * @var        string
     */
    protected $casebegdate;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

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
        $this->type = 0;
        $this->insuranceofficemark = 0;
    }

    /**
     * Initializes internal state of BaseTempinvalid object.
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
     * Get the [type] column value.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [doctype] column value.
     *
     * @return int
     */
    public function getDoctype()
    {
        return $this->doctype;
    }

    /**
     * Get the [doctype_id] column value.
     *
     * @return int
     */
    public function getDoctypeId()
    {
        return $this->doctype_id;
    }

    /**
     * Get the [serial] column value.
     *
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Get the [number] column value.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the [client_id] column value.
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Get the [tempinvalidreason_id] column value.
     *
     * @return int
     */
    public function getTempinvalidreasonId()
    {
        return $this->tempinvalidreason_id;
    }

    /**
     * Get the [optionally formatted] temporal [begdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBegdate($format = '%x')
    {
        if ($this->begdate === null) {
            return null;
        }

        if ($this->begdate === '0000-00-00') {
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
     * Get the [optionally formatted] temporal [enddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnddate($format = '%x')
    {
        if ($this->enddate === null) {
            return null;
        }

        if ($this->enddate === '0000-00-00') {
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
     * Get the [person_id] column value.
     *
     * @return int
     */
    public function getPersonId()
    {
        return $this->person_id;
    }

    /**
     * Get the [diagnosis_id] column value.
     *
     * @return int
     */
    public function getDiagnosisId()
    {
        return $this->diagnosis_id;
    }

    /**
     * Get the [sex] column value.
     *
     * @return boolean
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Get the [age] column value.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [age_bu] column value.
     *
     * @return int
     */
    public function getAgeBu()
    {
        return $this->age_bu;
    }

    /**
     * Get the [age_bc] column value.
     *
     * @return int
     */
    public function getAgeBc()
    {
        return $this->age_bc;
    }

    /**
     * Get the [age_eu] column value.
     *
     * @return int
     */
    public function getAgeEu()
    {
        return $this->age_eu;
    }

    /**
     * Get the [age_ec] column value.
     *
     * @return int
     */
    public function getAgeEc()
    {
        return $this->age_ec;
    }

    /**
     * Get the [notes] column value.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get the [duration] column value.
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Get the [closed] column value.
     *
     * @return boolean
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Get the [prev_id] column value.
     *
     * @return int
     */
    public function getPrevId()
    {
        return $this->prev_id;
    }

    /**
     * Get the [insuranceofficemark] column value.
     *
     * @return int
     */
    public function getInsuranceofficemark()
    {
        return $this->insuranceofficemark;
    }

    /**
     * Get the [optionally formatted] temporal [casebegdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCasebegdate($format = '%x')
    {
        if ($this->casebegdate === null) {
            return null;
        }

        if ($this->casebegdate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->casebegdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->casebegdate, true), $x);
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
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::MODIFYPERSON_ID;
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
     * @return Tempinvalid The current object (for fluent API support)
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
            $this->modifiedColumns[] = TempinvalidPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [type] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = TempinvalidPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [doctype] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setDoctype($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->doctype !== $v) {
            $this->doctype = $v;
            $this->modifiedColumns[] = TempinvalidPeer::DOCTYPE;
        }


        return $this;
    } // setDoctype()

    /**
     * Set the value of [doctype_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setDoctypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->doctype_id !== $v) {
            $this->doctype_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::DOCTYPE_ID;
        }


        return $this;
    } // setDoctypeId()

    /**
     * Set the value of [serial] column.
     *
     * @param string $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setSerial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->serial !== $v) {
            $this->serial = $v;
            $this->modifiedColumns[] = TempinvalidPeer::SERIAL;
        }


        return $this;
    } // setSerial()

    /**
     * Set the value of [number] column.
     *
     * @param string $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->number !== $v) {
            $this->number = $v;
            $this->modifiedColumns[] = TempinvalidPeer::NUMBER;
        }


        return $this;
    } // setNumber()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setClientId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::CLIENT_ID;
        }


        return $this;
    } // setClientId()

    /**
     * Set the value of [tempinvalidreason_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setTempinvalidreasonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tempinvalidreason_id !== $v) {
            $this->tempinvalidreason_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::TEMPINVALIDREASON_ID;
        }


        return $this;
    } // setTempinvalidreasonId()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [person_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setPersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->person_id !== $v) {
            $this->person_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::PERSON_ID;
        }


        return $this;
    } // setPersonId()

    /**
     * Set the value of [diagnosis_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setDiagnosisId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->diagnosis_id !== $v) {
            $this->diagnosis_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::DIAGNOSIS_ID;
        }


        return $this;
    } // setDiagnosisId()

    /**
     * Sets the value of the [sex] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = TempinvalidPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = TempinvalidPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = TempinvalidPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = TempinvalidPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = TempinvalidPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = TempinvalidPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [notes] column.
     *
     * @param string $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[] = TempinvalidPeer::NOTES;
        }


        return $this;
    } // setNotes()

    /**
     * Set the value of [duration] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setDuration($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->duration !== $v) {
            $this->duration = $v;
            $this->modifiedColumns[] = TempinvalidPeer::DURATION;
        }


        return $this;
    } // setDuration()

    /**
     * Sets the value of the [closed] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setClosed($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->closed !== $v) {
            $this->closed = $v;
            $this->modifiedColumns[] = TempinvalidPeer::CLOSED;
        }


        return $this;
    } // setClosed()

    /**
     * Set the value of [prev_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setPrevId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->prev_id !== $v) {
            $this->prev_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::PREV_ID;
        }


        return $this;
    } // setPrevId()

    /**
     * Set the value of [insuranceofficemark] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setInsuranceofficemark($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->insuranceofficemark !== $v) {
            $this->insuranceofficemark = $v;
            $this->modifiedColumns[] = TempinvalidPeer::INSURANCEOFFICEMARK;
        }


        return $this;
    } // setInsuranceofficemark()

    /**
     * Sets the value of [casebegdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setCasebegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->casebegdate !== null || $dt !== null) {
            $currentDateAsString = ($this->casebegdate !== null && $tmpDt = new DateTime($this->casebegdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->casebegdate = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeer::CASEBEGDATE;
            }
        } // if either are not null


        return $this;
    } // setCasebegdate()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return Tempinvalid The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = TempinvalidPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

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

            if ($this->type !== 0) {
                return false;
            }

            if ($this->insuranceofficemark !== 0) {
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
            $this->type = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->doctype = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->doctype_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->serial = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->number = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->client_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->tempinvalidreason_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->begdate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->enddate = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->person_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->diagnosis_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->sex = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
            $this->age = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->age_bu = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->age_bc = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
            $this->age_eu = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->age_ec = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
            $this->notes = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->duration = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->closed = ($row[$startcol + 25] !== null) ? (boolean) $row[$startcol + 25] : null;
            $this->prev_id = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
            $this->insuranceofficemark = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
            $this->casebegdate = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->event_id = ($row[$startcol + 29] !== null) ? (int) $row[$startcol + 29] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 30; // 30 = TempinvalidPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Tempinvalid object", $e);
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
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TempinvalidPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TempinvalidQuery::create()
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
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TempinvalidPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = TempinvalidPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TempinvalidPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TempinvalidPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(TempinvalidPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(TempinvalidPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(TempinvalidPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(TempinvalidPeer::DOCTYPE)) {
            $modifiedColumns[':p' . $index++]  = '`doctype`';
        }
        if ($this->isColumnModified(TempinvalidPeer::DOCTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`doctype_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::SERIAL)) {
            $modifiedColumns[':p' . $index++]  = '`serial`';
        }
        if ($this->isColumnModified(TempinvalidPeer::NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`number`';
        }
        if ($this->isColumnModified(TempinvalidPeer::CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`client_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::TEMPINVALIDREASON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tempInvalidReason_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(TempinvalidPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(TempinvalidPeer::PERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`person_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::DIAGNOSIS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`diagnosis_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(TempinvalidPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(TempinvalidPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(TempinvalidPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(TempinvalidPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(TempinvalidPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(TempinvalidPeer::NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`notes`';
        }
        if ($this->isColumnModified(TempinvalidPeer::DURATION)) {
            $modifiedColumns[':p' . $index++]  = '`duration`';
        }
        if ($this->isColumnModified(TempinvalidPeer::CLOSED)) {
            $modifiedColumns[':p' . $index++]  = '`closed`';
        }
        if ($this->isColumnModified(TempinvalidPeer::PREV_ID)) {
            $modifiedColumns[':p' . $index++]  = '`prev_id`';
        }
        if ($this->isColumnModified(TempinvalidPeer::INSURANCEOFFICEMARK)) {
            $modifiedColumns[':p' . $index++]  = '`insuranceOfficeMark`';
        }
        if ($this->isColumnModified(TempinvalidPeer::CASEBEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`caseBegDate`';
        }
        if ($this->isColumnModified(TempinvalidPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }

        $sql = sprintf(
            'INSERT INTO `TempInvalid` (%s) VALUES (%s)',
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
                    case '`type`':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case '`doctype`':
                        $stmt->bindValue($identifier, $this->doctype, PDO::PARAM_INT);
                        break;
                    case '`doctype_id`':
                        $stmt->bindValue($identifier, $this->doctype_id, PDO::PARAM_INT);
                        break;
                    case '`serial`':
                        $stmt->bindValue($identifier, $this->serial, PDO::PARAM_STR);
                        break;
                    case '`number`':
                        $stmt->bindValue($identifier, $this->number, PDO::PARAM_STR);
                        break;
                    case '`client_id`':
                        $stmt->bindValue($identifier, $this->client_id, PDO::PARAM_INT);
                        break;
                    case '`tempInvalidReason_id`':
                        $stmt->bindValue($identifier, $this->tempinvalidreason_id, PDO::PARAM_INT);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`person_id`':
                        $stmt->bindValue($identifier, $this->person_id, PDO::PARAM_INT);
                        break;
                    case '`diagnosis_id`':
                        $stmt->bindValue($identifier, $this->diagnosis_id, PDO::PARAM_INT);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, (int) $this->sex, PDO::PARAM_INT);
                        break;
                    case '`age`':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_INT);
                        break;
                    case '`age_bu`':
                        $stmt->bindValue($identifier, $this->age_bu, PDO::PARAM_INT);
                        break;
                    case '`age_bc`':
                        $stmt->bindValue($identifier, $this->age_bc, PDO::PARAM_INT);
                        break;
                    case '`age_eu`':
                        $stmt->bindValue($identifier, $this->age_eu, PDO::PARAM_INT);
                        break;
                    case '`age_ec`':
                        $stmt->bindValue($identifier, $this->age_ec, PDO::PARAM_INT);
                        break;
                    case '`notes`':
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case '`duration`':
                        $stmt->bindValue($identifier, $this->duration, PDO::PARAM_INT);
                        break;
                    case '`closed`':
                        $stmt->bindValue($identifier, (int) $this->closed, PDO::PARAM_INT);
                        break;
                    case '`prev_id`':
                        $stmt->bindValue($identifier, $this->prev_id, PDO::PARAM_INT);
                        break;
                    case '`insuranceOfficeMark`':
                        $stmt->bindValue($identifier, $this->insuranceofficemark, PDO::PARAM_INT);
                        break;
                    case '`caseBegDate`':
                        $stmt->bindValue($identifier, $this->casebegdate, PDO::PARAM_STR);
                        break;
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
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


            if (($retval = TempinvalidPeer::doValidate($this, $columns)) !== true) {
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
        $pos = TempinvalidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getType();
                break;
            case 7:
                return $this->getDoctype();
                break;
            case 8:
                return $this->getDoctypeId();
                break;
            case 9:
                return $this->getSerial();
                break;
            case 10:
                return $this->getNumber();
                break;
            case 11:
                return $this->getClientId();
                break;
            case 12:
                return $this->getTempinvalidreasonId();
                break;
            case 13:
                return $this->getBegdate();
                break;
            case 14:
                return $this->getEnddate();
                break;
            case 15:
                return $this->getPersonId();
                break;
            case 16:
                return $this->getDiagnosisId();
                break;
            case 17:
                return $this->getSex();
                break;
            case 18:
                return $this->getAge();
                break;
            case 19:
                return $this->getAgeBu();
                break;
            case 20:
                return $this->getAgeBc();
                break;
            case 21:
                return $this->getAgeEu();
                break;
            case 22:
                return $this->getAgeEc();
                break;
            case 23:
                return $this->getNotes();
                break;
            case 24:
                return $this->getDuration();
                break;
            case 25:
                return $this->getClosed();
                break;
            case 26:
                return $this->getPrevId();
                break;
            case 27:
                return $this->getInsuranceofficemark();
                break;
            case 28:
                return $this->getCasebegdate();
                break;
            case 29:
                return $this->getEventId();
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
        if (isset($alreadyDumpedObjects['Tempinvalid'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tempinvalid'][$this->getPrimaryKey()] = true;
        $keys = TempinvalidPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getType(),
            $keys[7] => $this->getDoctype(),
            $keys[8] => $this->getDoctypeId(),
            $keys[9] => $this->getSerial(),
            $keys[10] => $this->getNumber(),
            $keys[11] => $this->getClientId(),
            $keys[12] => $this->getTempinvalidreasonId(),
            $keys[13] => $this->getBegdate(),
            $keys[14] => $this->getEnddate(),
            $keys[15] => $this->getPersonId(),
            $keys[16] => $this->getDiagnosisId(),
            $keys[17] => $this->getSex(),
            $keys[18] => $this->getAge(),
            $keys[19] => $this->getAgeBu(),
            $keys[20] => $this->getAgeBc(),
            $keys[21] => $this->getAgeEu(),
            $keys[22] => $this->getAgeEc(),
            $keys[23] => $this->getNotes(),
            $keys[24] => $this->getDuration(),
            $keys[25] => $this->getClosed(),
            $keys[26] => $this->getPrevId(),
            $keys[27] => $this->getInsuranceofficemark(),
            $keys[28] => $this->getCasebegdate(),
            $keys[29] => $this->getEventId(),
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
        $pos = TempinvalidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setType($value);
                break;
            case 7:
                $this->setDoctype($value);
                break;
            case 8:
                $this->setDoctypeId($value);
                break;
            case 9:
                $this->setSerial($value);
                break;
            case 10:
                $this->setNumber($value);
                break;
            case 11:
                $this->setClientId($value);
                break;
            case 12:
                $this->setTempinvalidreasonId($value);
                break;
            case 13:
                $this->setBegdate($value);
                break;
            case 14:
                $this->setEnddate($value);
                break;
            case 15:
                $this->setPersonId($value);
                break;
            case 16:
                $this->setDiagnosisId($value);
                break;
            case 17:
                $this->setSex($value);
                break;
            case 18:
                $this->setAge($value);
                break;
            case 19:
                $this->setAgeBu($value);
                break;
            case 20:
                $this->setAgeBc($value);
                break;
            case 21:
                $this->setAgeEu($value);
                break;
            case 22:
                $this->setAgeEc($value);
                break;
            case 23:
                $this->setNotes($value);
                break;
            case 24:
                $this->setDuration($value);
                break;
            case 25:
                $this->setClosed($value);
                break;
            case 26:
                $this->setPrevId($value);
                break;
            case 27:
                $this->setInsuranceofficemark($value);
                break;
            case 28:
                $this->setCasebegdate($value);
                break;
            case 29:
                $this->setEventId($value);
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
        $keys = TempinvalidPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setType($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDoctype($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDoctypeId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSerial($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNumber($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setClientId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTempinvalidreasonId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setBegdate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setEnddate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPersonId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setDiagnosisId($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setSex($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setAge($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setAgeBu($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setAgeBc($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setAgeEu($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setAgeEc($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setNotes($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setDuration($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setClosed($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setPrevId($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setInsuranceofficemark($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setCasebegdate($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setEventId($arr[$keys[29]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TempinvalidPeer::DATABASE_NAME);

        if ($this->isColumnModified(TempinvalidPeer::ID)) $criteria->add(TempinvalidPeer::ID, $this->id);
        if ($this->isColumnModified(TempinvalidPeer::CREATEDATETIME)) $criteria->add(TempinvalidPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(TempinvalidPeer::CREATEPERSON_ID)) $criteria->add(TempinvalidPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(TempinvalidPeer::MODIFYDATETIME)) $criteria->add(TempinvalidPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(TempinvalidPeer::MODIFYPERSON_ID)) $criteria->add(TempinvalidPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(TempinvalidPeer::DELETED)) $criteria->add(TempinvalidPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(TempinvalidPeer::TYPE)) $criteria->add(TempinvalidPeer::TYPE, $this->type);
        if ($this->isColumnModified(TempinvalidPeer::DOCTYPE)) $criteria->add(TempinvalidPeer::DOCTYPE, $this->doctype);
        if ($this->isColumnModified(TempinvalidPeer::DOCTYPE_ID)) $criteria->add(TempinvalidPeer::DOCTYPE_ID, $this->doctype_id);
        if ($this->isColumnModified(TempinvalidPeer::SERIAL)) $criteria->add(TempinvalidPeer::SERIAL, $this->serial);
        if ($this->isColumnModified(TempinvalidPeer::NUMBER)) $criteria->add(TempinvalidPeer::NUMBER, $this->number);
        if ($this->isColumnModified(TempinvalidPeer::CLIENT_ID)) $criteria->add(TempinvalidPeer::CLIENT_ID, $this->client_id);
        if ($this->isColumnModified(TempinvalidPeer::TEMPINVALIDREASON_ID)) $criteria->add(TempinvalidPeer::TEMPINVALIDREASON_ID, $this->tempinvalidreason_id);
        if ($this->isColumnModified(TempinvalidPeer::BEGDATE)) $criteria->add(TempinvalidPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(TempinvalidPeer::ENDDATE)) $criteria->add(TempinvalidPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(TempinvalidPeer::PERSON_ID)) $criteria->add(TempinvalidPeer::PERSON_ID, $this->person_id);
        if ($this->isColumnModified(TempinvalidPeer::DIAGNOSIS_ID)) $criteria->add(TempinvalidPeer::DIAGNOSIS_ID, $this->diagnosis_id);
        if ($this->isColumnModified(TempinvalidPeer::SEX)) $criteria->add(TempinvalidPeer::SEX, $this->sex);
        if ($this->isColumnModified(TempinvalidPeer::AGE)) $criteria->add(TempinvalidPeer::AGE, $this->age);
        if ($this->isColumnModified(TempinvalidPeer::AGE_BU)) $criteria->add(TempinvalidPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(TempinvalidPeer::AGE_BC)) $criteria->add(TempinvalidPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(TempinvalidPeer::AGE_EU)) $criteria->add(TempinvalidPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(TempinvalidPeer::AGE_EC)) $criteria->add(TempinvalidPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(TempinvalidPeer::NOTES)) $criteria->add(TempinvalidPeer::NOTES, $this->notes);
        if ($this->isColumnModified(TempinvalidPeer::DURATION)) $criteria->add(TempinvalidPeer::DURATION, $this->duration);
        if ($this->isColumnModified(TempinvalidPeer::CLOSED)) $criteria->add(TempinvalidPeer::CLOSED, $this->closed);
        if ($this->isColumnModified(TempinvalidPeer::PREV_ID)) $criteria->add(TempinvalidPeer::PREV_ID, $this->prev_id);
        if ($this->isColumnModified(TempinvalidPeer::INSURANCEOFFICEMARK)) $criteria->add(TempinvalidPeer::INSURANCEOFFICEMARK, $this->insuranceofficemark);
        if ($this->isColumnModified(TempinvalidPeer::CASEBEGDATE)) $criteria->add(TempinvalidPeer::CASEBEGDATE, $this->casebegdate);
        if ($this->isColumnModified(TempinvalidPeer::EVENT_ID)) $criteria->add(TempinvalidPeer::EVENT_ID, $this->event_id);

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
        $criteria = new Criteria(TempinvalidPeer::DATABASE_NAME);
        $criteria->add(TempinvalidPeer::ID, $this->id);

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
     * @param object $copyObj An object of Tempinvalid (or compatible) type.
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
        $copyObj->setType($this->getType());
        $copyObj->setDoctype($this->getDoctype());
        $copyObj->setDoctypeId($this->getDoctypeId());
        $copyObj->setSerial($this->getSerial());
        $copyObj->setNumber($this->getNumber());
        $copyObj->setClientId($this->getClientId());
        $copyObj->setTempinvalidreasonId($this->getTempinvalidreasonId());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setPersonId($this->getPersonId());
        $copyObj->setDiagnosisId($this->getDiagnosisId());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setDuration($this->getDuration());
        $copyObj->setClosed($this->getClosed());
        $copyObj->setPrevId($this->getPrevId());
        $copyObj->setInsuranceofficemark($this->getInsuranceofficemark());
        $copyObj->setCasebegdate($this->getCasebegdate());
        $copyObj->setEventId($this->getEventId());
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
     * @return Tempinvalid Clone of current object.
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
     * @return TempinvalidPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TempinvalidPeer();
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
        $this->type = null;
        $this->doctype = null;
        $this->doctype_id = null;
        $this->serial = null;
        $this->number = null;
        $this->client_id = null;
        $this->tempinvalidreason_id = null;
        $this->begdate = null;
        $this->enddate = null;
        $this->person_id = null;
        $this->diagnosis_id = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->notes = null;
        $this->duration = null;
        $this->closed = null;
        $this->prev_id = null;
        $this->insuranceofficemark = null;
        $this->casebegdate = null;
        $this->event_id = null;
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
        return (string) $this->exportTo(TempinvalidPeer::DEFAULT_STRING_FORMAT);
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
