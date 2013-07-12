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
use Webmis\Models\EventLocalcontract;
use Webmis\Models\EventLocalcontractPeer;
use Webmis\Models\EventLocalcontractQuery;

/**
 * Base class that represents a row from the 'Event_LocalContract' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventLocalcontract extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\EventLocalcontractPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventLocalcontractPeer
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
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the coorddate field.
     * @var        string
     */
    protected $coorddate;

    /**
     * The value for the coordagent field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $coordagent;

    /**
     * The value for the coordinspector field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $coordinspector;

    /**
     * The value for the coordtext field.
     * @var        string
     */
    protected $coordtext;

    /**
     * The value for the datecontract field.
     * @var        string
     */
    protected $datecontract;

    /**
     * The value for the numbercontract field.
     * @var        string
     */
    protected $numbercontract;

    /**
     * The value for the sumlimit field.
     * @var        double
     */
    protected $sumlimit;

    /**
     * The value for the lastname field.
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the firstname field.
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the patrname field.
     * @var        string
     */
    protected $patrname;

    /**
     * The value for the birthdate field.
     * @var        string
     */
    protected $birthdate;

    /**
     * The value for the documenttype_id field.
     * @var        int
     */
    protected $documenttype_id;

    /**
     * The value for the serialleft field.
     * @var        string
     */
    protected $serialleft;

    /**
     * The value for the serialright field.
     * @var        string
     */
    protected $serialright;

    /**
     * The value for the number field.
     * @var        string
     */
    protected $number;

    /**
     * The value for the regaddress field.
     * @var        string
     */
    protected $regaddress;

    /**
     * The value for the org_id field.
     * @var        int
     */
    protected $org_id;

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
        $this->coordagent = '';
        $this->coordinspector = '';
    }

    /**
     * Initializes internal state of BaseEventLocalcontract object.
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
     * Get the [master_id] column value.
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Get the [optionally formatted] temporal [coorddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCoorddate($format = 'Y-m-d H:i:s')
    {
        if ($this->coorddate === null) {
            return null;
        }

        if ($this->coorddate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->coorddate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->coorddate, true), $x);
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
     * Get the [coordagent] column value.
     *
     * @return string
     */
    public function getCoordagent()
    {
        return $this->coordagent;
    }

    /**
     * Get the [coordinspector] column value.
     *
     * @return string
     */
    public function getCoordinspector()
    {
        return $this->coordinspector;
    }

    /**
     * Get the [coordtext] column value.
     *
     * @return string
     */
    public function getCoordtext()
    {
        return $this->coordtext;
    }

    /**
     * Get the [optionally formatted] temporal [datecontract] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatecontract($format = '%x')
    {
        if ($this->datecontract === null) {
            return null;
        }

        if ($this->datecontract === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->datecontract);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->datecontract, true), $x);
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
     * Get the [numbercontract] column value.
     *
     * @return string
     */
    public function getNumbercontract()
    {
        return $this->numbercontract;
    }

    /**
     * Get the [sumlimit] column value.
     *
     * @return double
     */
    public function getSumlimit()
    {
        return $this->sumlimit;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [patrname] column value.
     *
     * @return string
     */
    public function getPatrname()
    {
        return $this->patrname;
    }

    /**
     * Get the [optionally formatted] temporal [birthdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBirthdate($format = '%x')
    {
        if ($this->birthdate === null) {
            return null;
        }

        if ($this->birthdate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->birthdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->birthdate, true), $x);
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
     * Get the [documenttype_id] column value.
     *
     * @return int
     */
    public function getDocumenttypeId()
    {
        return $this->documenttype_id;
    }

    /**
     * Get the [serialleft] column value.
     *
     * @return string
     */
    public function getSerialleft()
    {
        return $this->serialleft;
    }

    /**
     * Get the [serialright] column value.
     *
     * @return string
     */
    public function getSerialright()
    {
        return $this->serialright;
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
     * Get the [regaddress] column value.
     *
     * @return string
     */
    public function getRegaddress()
    {
        return $this->regaddress;
    }

    /**
     * Get the [org_id] column value.
     *
     * @return int
     */
    public function getOrgId()
    {
        return $this->org_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = EventLocalcontractPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = EventLocalcontractPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::MODIFYPERSON_ID;
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
     * @return EventLocalcontract The current object (for fluent API support)
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
            $this->modifiedColumns[] = EventLocalcontractPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Sets the value of [coorddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setCoorddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->coorddate !== null || $dt !== null) {
            $currentDateAsString = ($this->coorddate !== null && $tmpDt = new DateTime($this->coorddate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->coorddate = $newDateAsString;
                $this->modifiedColumns[] = EventLocalcontractPeer::COORDDATE;
            }
        } // if either are not null


        return $this;
    } // setCoorddate()

    /**
     * Set the value of [coordagent] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setCoordagent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->coordagent !== $v) {
            $this->coordagent = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::COORDAGENT;
        }


        return $this;
    } // setCoordagent()

    /**
     * Set the value of [coordinspector] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setCoordinspector($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->coordinspector !== $v) {
            $this->coordinspector = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::COORDINSPECTOR;
        }


        return $this;
    } // setCoordinspector()

    /**
     * Set the value of [coordtext] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setCoordtext($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->coordtext !== $v) {
            $this->coordtext = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::COORDTEXT;
        }


        return $this;
    } // setCoordtext()

    /**
     * Sets the value of [datecontract] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setDatecontract($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datecontract !== null || $dt !== null) {
            $currentDateAsString = ($this->datecontract !== null && $tmpDt = new DateTime($this->datecontract)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->datecontract = $newDateAsString;
                $this->modifiedColumns[] = EventLocalcontractPeer::DATECONTRACT;
            }
        } // if either are not null


        return $this;
    } // setDatecontract()

    /**
     * Set the value of [numbercontract] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setNumbercontract($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numbercontract !== $v) {
            $this->numbercontract = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::NUMBERCONTRACT;
        }


        return $this;
    } // setNumbercontract()

    /**
     * Set the value of [sumlimit] column.
     *
     * @param double $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setSumlimit($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->sumlimit !== $v) {
            $this->sumlimit = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::SUMLIMIT;
        }


        return $this;
    } // setSumlimit()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::LASTNAME;
        }


        return $this;
    } // setLastname()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::FIRSTNAME;
        }


        return $this;
    } // setFirstname()

    /**
     * Set the value of [patrname] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setPatrname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->patrname !== $v) {
            $this->patrname = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::PATRNAME;
        }


        return $this;
    } // setPatrname()

    /**
     * Sets the value of [birthdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setBirthdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->birthdate !== null || $dt !== null) {
            $currentDateAsString = ($this->birthdate !== null && $tmpDt = new DateTime($this->birthdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->birthdate = $newDateAsString;
                $this->modifiedColumns[] = EventLocalcontractPeer::BIRTHDATE;
            }
        } // if either are not null


        return $this;
    } // setBirthdate()

    /**
     * Set the value of [documenttype_id] column.
     *
     * @param int $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setDocumenttypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->documenttype_id !== $v) {
            $this->documenttype_id = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::DOCUMENTTYPE_ID;
        }


        return $this;
    } // setDocumenttypeId()

    /**
     * Set the value of [serialleft] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setSerialleft($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->serialleft !== $v) {
            $this->serialleft = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::SERIALLEFT;
        }


        return $this;
    } // setSerialleft()

    /**
     * Set the value of [serialright] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setSerialright($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->serialright !== $v) {
            $this->serialright = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::SERIALRIGHT;
        }


        return $this;
    } // setSerialright()

    /**
     * Set the value of [number] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->number !== $v) {
            $this->number = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::NUMBER;
        }


        return $this;
    } // setNumber()

    /**
     * Set the value of [regaddress] column.
     *
     * @param string $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setRegaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regaddress !== $v) {
            $this->regaddress = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::REGADDRESS;
        }


        return $this;
    } // setRegaddress()

    /**
     * Set the value of [org_id] column.
     *
     * @param int $v new value
     * @return EventLocalcontract The current object (for fluent API support)
     */
    public function setOrgId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->org_id !== $v) {
            $this->org_id = $v;
            $this->modifiedColumns[] = EventLocalcontractPeer::ORG_ID;
        }


        return $this;
    } // setOrgId()

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
            if ($this->coordagent !== '') {
                return false;
            }

            if ($this->coordinspector !== '') {
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
            $this->master_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->coorddate = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->coordagent = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->coordinspector = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->coordtext = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->datecontract = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->numbercontract = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->sumlimit = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
            $this->lastname = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->firstname = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->patrname = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->birthdate = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->documenttype_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->serialleft = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->serialright = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->number = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->regaddress = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->org_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 24; // 24 = EventLocalcontractPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EventLocalcontract object", $e);
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
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventLocalcontractPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventLocalcontractQuery::create()
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
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EventLocalcontractPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = EventLocalcontractPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventLocalcontractPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventLocalcontractPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::COORDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`coordDate`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::COORDAGENT)) {
            $modifiedColumns[':p' . $index++]  = '`coordAgent`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::COORDINSPECTOR)) {
            $modifiedColumns[':p' . $index++]  = '`coordInspector`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::COORDTEXT)) {
            $modifiedColumns[':p' . $index++]  = '`coordText`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::DATECONTRACT)) {
            $modifiedColumns[':p' . $index++]  = '`dateContract`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::NUMBERCONTRACT)) {
            $modifiedColumns[':p' . $index++]  = '`numberContract`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::SUMLIMIT)) {
            $modifiedColumns[':p' . $index++]  = '`sumLimit`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`lastName`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`firstName`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::PATRNAME)) {
            $modifiedColumns[':p' . $index++]  = '`patrName`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::BIRTHDATE)) {
            $modifiedColumns[':p' . $index++]  = '`birthDate`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::DOCUMENTTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`documentType_id`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::SERIALLEFT)) {
            $modifiedColumns[':p' . $index++]  = '`serialLeft`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::SERIALRIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`serialRight`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`number`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::REGADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`regAddress`';
        }
        if ($this->isColumnModified(EventLocalcontractPeer::ORG_ID)) {
            $modifiedColumns[':p' . $index++]  = '`org_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Event_LocalContract` (%s) VALUES (%s)',
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
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`coordDate`':
                        $stmt->bindValue($identifier, $this->coorddate, PDO::PARAM_STR);
                        break;
                    case '`coordAgent`':
                        $stmt->bindValue($identifier, $this->coordagent, PDO::PARAM_STR);
                        break;
                    case '`coordInspector`':
                        $stmt->bindValue($identifier, $this->coordinspector, PDO::PARAM_STR);
                        break;
                    case '`coordText`':
                        $stmt->bindValue($identifier, $this->coordtext, PDO::PARAM_STR);
                        break;
                    case '`dateContract`':
                        $stmt->bindValue($identifier, $this->datecontract, PDO::PARAM_STR);
                        break;
                    case '`numberContract`':
                        $stmt->bindValue($identifier, $this->numbercontract, PDO::PARAM_STR);
                        break;
                    case '`sumLimit`':
                        $stmt->bindValue($identifier, $this->sumlimit, PDO::PARAM_STR);
                        break;
                    case '`lastName`':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case '`firstName`':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case '`patrName`':
                        $stmt->bindValue($identifier, $this->patrname, PDO::PARAM_STR);
                        break;
                    case '`birthDate`':
                        $stmt->bindValue($identifier, $this->birthdate, PDO::PARAM_STR);
                        break;
                    case '`documentType_id`':
                        $stmt->bindValue($identifier, $this->documenttype_id, PDO::PARAM_INT);
                        break;
                    case '`serialLeft`':
                        $stmt->bindValue($identifier, $this->serialleft, PDO::PARAM_STR);
                        break;
                    case '`serialRight`':
                        $stmt->bindValue($identifier, $this->serialright, PDO::PARAM_STR);
                        break;
                    case '`number`':
                        $stmt->bindValue($identifier, $this->number, PDO::PARAM_STR);
                        break;
                    case '`regAddress`':
                        $stmt->bindValue($identifier, $this->regaddress, PDO::PARAM_STR);
                        break;
                    case '`org_id`':
                        $stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
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


            if (($retval = EventLocalcontractPeer::doValidate($this, $columns)) !== true) {
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
        $pos = EventLocalcontractPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMasterId();
                break;
            case 7:
                return $this->getCoorddate();
                break;
            case 8:
                return $this->getCoordagent();
                break;
            case 9:
                return $this->getCoordinspector();
                break;
            case 10:
                return $this->getCoordtext();
                break;
            case 11:
                return $this->getDatecontract();
                break;
            case 12:
                return $this->getNumbercontract();
                break;
            case 13:
                return $this->getSumlimit();
                break;
            case 14:
                return $this->getLastname();
                break;
            case 15:
                return $this->getFirstname();
                break;
            case 16:
                return $this->getPatrname();
                break;
            case 17:
                return $this->getBirthdate();
                break;
            case 18:
                return $this->getDocumenttypeId();
                break;
            case 19:
                return $this->getSerialleft();
                break;
            case 20:
                return $this->getSerialright();
                break;
            case 21:
                return $this->getNumber();
                break;
            case 22:
                return $this->getRegaddress();
                break;
            case 23:
                return $this->getOrgId();
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
        if (isset($alreadyDumpedObjects['EventLocalcontract'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EventLocalcontract'][$this->getPrimaryKey()] = true;
        $keys = EventLocalcontractPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getMasterId(),
            $keys[7] => $this->getCoorddate(),
            $keys[8] => $this->getCoordagent(),
            $keys[9] => $this->getCoordinspector(),
            $keys[10] => $this->getCoordtext(),
            $keys[11] => $this->getDatecontract(),
            $keys[12] => $this->getNumbercontract(),
            $keys[13] => $this->getSumlimit(),
            $keys[14] => $this->getLastname(),
            $keys[15] => $this->getFirstname(),
            $keys[16] => $this->getPatrname(),
            $keys[17] => $this->getBirthdate(),
            $keys[18] => $this->getDocumenttypeId(),
            $keys[19] => $this->getSerialleft(),
            $keys[20] => $this->getSerialright(),
            $keys[21] => $this->getNumber(),
            $keys[22] => $this->getRegaddress(),
            $keys[23] => $this->getOrgId(),
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
        $pos = EventLocalcontractPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMasterId($value);
                break;
            case 7:
                $this->setCoorddate($value);
                break;
            case 8:
                $this->setCoordagent($value);
                break;
            case 9:
                $this->setCoordinspector($value);
                break;
            case 10:
                $this->setCoordtext($value);
                break;
            case 11:
                $this->setDatecontract($value);
                break;
            case 12:
                $this->setNumbercontract($value);
                break;
            case 13:
                $this->setSumlimit($value);
                break;
            case 14:
                $this->setLastname($value);
                break;
            case 15:
                $this->setFirstname($value);
                break;
            case 16:
                $this->setPatrname($value);
                break;
            case 17:
                $this->setBirthdate($value);
                break;
            case 18:
                $this->setDocumenttypeId($value);
                break;
            case 19:
                $this->setSerialleft($value);
                break;
            case 20:
                $this->setSerialright($value);
                break;
            case 21:
                $this->setNumber($value);
                break;
            case 22:
                $this->setRegaddress($value);
                break;
            case 23:
                $this->setOrgId($value);
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
        $keys = EventLocalcontractPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMasterId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCoorddate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCoordagent($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCoordinspector($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCoordtext($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setDatecontract($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNumbercontract($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSumlimit($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastname($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setFirstname($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setPatrname($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setBirthdate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setDocumenttypeId($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setSerialleft($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setSerialright($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setNumber($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setRegaddress($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setOrgId($arr[$keys[23]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventLocalcontractPeer::DATABASE_NAME);

        if ($this->isColumnModified(EventLocalcontractPeer::ID)) $criteria->add(EventLocalcontractPeer::ID, $this->id);
        if ($this->isColumnModified(EventLocalcontractPeer::CREATEDATETIME)) $criteria->add(EventLocalcontractPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(EventLocalcontractPeer::CREATEPERSON_ID)) $criteria->add(EventLocalcontractPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(EventLocalcontractPeer::MODIFYDATETIME)) $criteria->add(EventLocalcontractPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(EventLocalcontractPeer::MODIFYPERSON_ID)) $criteria->add(EventLocalcontractPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(EventLocalcontractPeer::DELETED)) $criteria->add(EventLocalcontractPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(EventLocalcontractPeer::MASTER_ID)) $criteria->add(EventLocalcontractPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(EventLocalcontractPeer::COORDDATE)) $criteria->add(EventLocalcontractPeer::COORDDATE, $this->coorddate);
        if ($this->isColumnModified(EventLocalcontractPeer::COORDAGENT)) $criteria->add(EventLocalcontractPeer::COORDAGENT, $this->coordagent);
        if ($this->isColumnModified(EventLocalcontractPeer::COORDINSPECTOR)) $criteria->add(EventLocalcontractPeer::COORDINSPECTOR, $this->coordinspector);
        if ($this->isColumnModified(EventLocalcontractPeer::COORDTEXT)) $criteria->add(EventLocalcontractPeer::COORDTEXT, $this->coordtext);
        if ($this->isColumnModified(EventLocalcontractPeer::DATECONTRACT)) $criteria->add(EventLocalcontractPeer::DATECONTRACT, $this->datecontract);
        if ($this->isColumnModified(EventLocalcontractPeer::NUMBERCONTRACT)) $criteria->add(EventLocalcontractPeer::NUMBERCONTRACT, $this->numbercontract);
        if ($this->isColumnModified(EventLocalcontractPeer::SUMLIMIT)) $criteria->add(EventLocalcontractPeer::SUMLIMIT, $this->sumlimit);
        if ($this->isColumnModified(EventLocalcontractPeer::LASTNAME)) $criteria->add(EventLocalcontractPeer::LASTNAME, $this->lastname);
        if ($this->isColumnModified(EventLocalcontractPeer::FIRSTNAME)) $criteria->add(EventLocalcontractPeer::FIRSTNAME, $this->firstname);
        if ($this->isColumnModified(EventLocalcontractPeer::PATRNAME)) $criteria->add(EventLocalcontractPeer::PATRNAME, $this->patrname);
        if ($this->isColumnModified(EventLocalcontractPeer::BIRTHDATE)) $criteria->add(EventLocalcontractPeer::BIRTHDATE, $this->birthdate);
        if ($this->isColumnModified(EventLocalcontractPeer::DOCUMENTTYPE_ID)) $criteria->add(EventLocalcontractPeer::DOCUMENTTYPE_ID, $this->documenttype_id);
        if ($this->isColumnModified(EventLocalcontractPeer::SERIALLEFT)) $criteria->add(EventLocalcontractPeer::SERIALLEFT, $this->serialleft);
        if ($this->isColumnModified(EventLocalcontractPeer::SERIALRIGHT)) $criteria->add(EventLocalcontractPeer::SERIALRIGHT, $this->serialright);
        if ($this->isColumnModified(EventLocalcontractPeer::NUMBER)) $criteria->add(EventLocalcontractPeer::NUMBER, $this->number);
        if ($this->isColumnModified(EventLocalcontractPeer::REGADDRESS)) $criteria->add(EventLocalcontractPeer::REGADDRESS, $this->regaddress);
        if ($this->isColumnModified(EventLocalcontractPeer::ORG_ID)) $criteria->add(EventLocalcontractPeer::ORG_ID, $this->org_id);

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
        $criteria = new Criteria(EventLocalcontractPeer::DATABASE_NAME);
        $criteria->add(EventLocalcontractPeer::ID, $this->id);

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
     * @param object $copyObj An object of EventLocalcontract (or compatible) type.
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
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setCoorddate($this->getCoorddate());
        $copyObj->setCoordagent($this->getCoordagent());
        $copyObj->setCoordinspector($this->getCoordinspector());
        $copyObj->setCoordtext($this->getCoordtext());
        $copyObj->setDatecontract($this->getDatecontract());
        $copyObj->setNumbercontract($this->getNumbercontract());
        $copyObj->setSumlimit($this->getSumlimit());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setPatrname($this->getPatrname());
        $copyObj->setBirthdate($this->getBirthdate());
        $copyObj->setDocumenttypeId($this->getDocumenttypeId());
        $copyObj->setSerialleft($this->getSerialleft());
        $copyObj->setSerialright($this->getSerialright());
        $copyObj->setNumber($this->getNumber());
        $copyObj->setRegaddress($this->getRegaddress());
        $copyObj->setOrgId($this->getOrgId());
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
     * @return EventLocalcontract Clone of current object.
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
     * @return EventLocalcontractPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventLocalcontractPeer();
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
        $this->master_id = null;
        $this->coorddate = null;
        $this->coordagent = null;
        $this->coordinspector = null;
        $this->coordtext = null;
        $this->datecontract = null;
        $this->numbercontract = null;
        $this->sumlimit = null;
        $this->lastname = null;
        $this->firstname = null;
        $this->patrname = null;
        $this->birthdate = null;
        $this->documenttype_id = null;
        $this->serialleft = null;
        $this->serialright = null;
        $this->number = null;
        $this->regaddress = null;
        $this->org_id = null;
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
        return (string) $this->exportTo(EventLocalcontractPeer::DEFAULT_STRING_FORMAT);
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
