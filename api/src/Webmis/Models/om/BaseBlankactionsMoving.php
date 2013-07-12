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
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\BlankactionsMovingPeer;
use Webmis\Models\BlankactionsMovingQuery;
use Webmis\Models\BlankactionsParty;
use Webmis\Models\BlankactionsPartyQuery;
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureQuery;
use Webmis\Models\Person;
use Webmis\Models\PersonQuery;

/**
 * Base class that represents a row from the 'BlankActions_Moving' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBlankactionsMoving extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\BlankactionsMovingPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BlankactionsMovingPeer
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
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the blankparty_id field.
     * @var        int
     */
    protected $blankparty_id;

    /**
     * The value for the serial field.
     * @var        string
     */
    protected $serial;

    /**
     * The value for the orgstructure_id field.
     * @var        int
     */
    protected $orgstructure_id;

    /**
     * The value for the person_id field.
     * @var        int
     */
    protected $person_id;

    /**
     * The value for the received field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $received;

    /**
     * The value for the used field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $used;

    /**
     * The value for the returndate field.
     * @var        string
     */
    protected $returndate;

    /**
     * The value for the returnamount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $returnamount;

    /**
     * @var        BlankactionsParty
     */
    protected $aBlankactionsParty;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByCreatepersonId;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByModifypersonId;

    /**
     * @var        Orgstructure
     */
    protected $aOrgstructure;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByPersonId;

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
        $this->received = 0;
        $this->used = 0;
        $this->returnamount = 0;
    }

    /**
     * Initializes internal state of BaseBlankactionsMoving object.
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
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = '%x')
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
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
     * Get the [blankparty_id] column value.
     *
     * @return int
     */
    public function getBlankpartyId()
    {
        return $this->blankparty_id;
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
     * Get the [orgstructure_id] column value.
     *
     * @return int
     */
    public function getOrgstructureId()
    {
        return $this->orgstructure_id;
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
     * Get the [received] column value.
     *
     * @return int
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Get the [used] column value.
     *
     * @return int
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Get the [optionally formatted] temporal [returndate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getReturndate($format = '%x')
    {
        if ($this->returndate === null) {
            return null;
        }

        if ($this->returndate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->returndate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->returndate, true), $x);
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
     * Get the [returnamount] column value.
     *
     * @return int
     */
    public function getReturnamount()
    {
        return $this->returnamount;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsMovingPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::CREATEPERSON_ID;
        }

        if ($this->aPersonRelatedByCreatepersonId !== null && $this->aPersonRelatedByCreatepersonId->getId() !== $v) {
            $this->aPersonRelatedByCreatepersonId = null;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsMovingPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::MODIFYPERSON_ID;
        }

        if ($this->aPersonRelatedByModifypersonId !== null && $this->aPersonRelatedByModifypersonId->getId() !== $v) {
            $this->aPersonRelatedByModifypersonId = null;
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
     * @return BlankactionsMoving The current object (for fluent API support)
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
            $this->modifiedColumns[] = BlankactionsMovingPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsMovingPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [blankparty_id] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setBlankpartyId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->blankparty_id !== $v) {
            $this->blankparty_id = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::BLANKPARTY_ID;
        }

        if ($this->aBlankactionsParty !== null && $this->aBlankactionsParty->getId() !== $v) {
            $this->aBlankactionsParty = null;
        }


        return $this;
    } // setBlankpartyId()

    /**
     * Set the value of [serial] column.
     *
     * @param string $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setSerial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->serial !== $v) {
            $this->serial = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::SERIAL;
        }


        return $this;
    } // setSerial()

    /**
     * Set the value of [orgstructure_id] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setOrgstructureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->orgstructure_id !== $v) {
            $this->orgstructure_id = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::ORGSTRUCTURE_ID;
        }

        if ($this->aOrgstructure !== null && $this->aOrgstructure->getId() !== $v) {
            $this->aOrgstructure = null;
        }


        return $this;
    } // setOrgstructureId()

    /**
     * Set the value of [person_id] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setPersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->person_id !== $v) {
            $this->person_id = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::PERSON_ID;
        }

        if ($this->aPersonRelatedByPersonId !== null && $this->aPersonRelatedByPersonId->getId() !== $v) {
            $this->aPersonRelatedByPersonId = null;
        }


        return $this;
    } // setPersonId()

    /**
     * Set the value of [received] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setReceived($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->received !== $v) {
            $this->received = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::RECEIVED;
        }


        return $this;
    } // setReceived()

    /**
     * Set the value of [used] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setUsed($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->used !== $v) {
            $this->used = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::USED;
        }


        return $this;
    } // setUsed()

    /**
     * Sets the value of [returndate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setReturndate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->returndate !== null || $dt !== null) {
            $currentDateAsString = ($this->returndate !== null && $tmpDt = new DateTime($this->returndate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->returndate = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsMovingPeer::RETURNDATE;
            }
        } // if either are not null


        return $this;
    } // setReturndate()

    /**
     * Set the value of [returnamount] column.
     *
     * @param int $v new value
     * @return BlankactionsMoving The current object (for fluent API support)
     */
    public function setReturnamount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->returnamount !== $v) {
            $this->returnamount = $v;
            $this->modifiedColumns[] = BlankactionsMovingPeer::RETURNAMOUNT;
        }


        return $this;
    } // setReturnamount()

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

            if ($this->received !== 0) {
                return false;
            }

            if ($this->used !== 0) {
                return false;
            }

            if ($this->returnamount !== 0) {
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
            $this->date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->blankparty_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->serial = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->orgstructure_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->person_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->received = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->used = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->returndate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->returnamount = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = BlankactionsMovingPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BlankactionsMoving object", $e);
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

        if ($this->aPersonRelatedByCreatepersonId !== null && $this->createperson_id !== $this->aPersonRelatedByCreatepersonId->getId()) {
            $this->aPersonRelatedByCreatepersonId = null;
        }
        if ($this->aPersonRelatedByModifypersonId !== null && $this->modifyperson_id !== $this->aPersonRelatedByModifypersonId->getId()) {
            $this->aPersonRelatedByModifypersonId = null;
        }
        if ($this->aBlankactionsParty !== null && $this->blankparty_id !== $this->aBlankactionsParty->getId()) {
            $this->aBlankactionsParty = null;
        }
        if ($this->aOrgstructure !== null && $this->orgstructure_id !== $this->aOrgstructure->getId()) {
            $this->aOrgstructure = null;
        }
        if ($this->aPersonRelatedByPersonId !== null && $this->person_id !== $this->aPersonRelatedByPersonId->getId()) {
            $this->aPersonRelatedByPersonId = null;
        }
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
            $con = Propel::getConnection(BlankactionsMovingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BlankactionsMovingPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBlankactionsParty = null;
            $this->aPersonRelatedByCreatepersonId = null;
            $this->aPersonRelatedByModifypersonId = null;
            $this->aOrgstructure = null;
            $this->aPersonRelatedByPersonId = null;
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
            $con = Propel::getConnection(BlankactionsMovingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BlankactionsMovingQuery::create()
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
            $con = Propel::getConnection(BlankactionsMovingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BlankactionsMovingPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aBlankactionsParty !== null) {
                if ($this->aBlankactionsParty->isModified() || $this->aBlankactionsParty->isNew()) {
                    $affectedRows += $this->aBlankactionsParty->save($con);
                }
                $this->setBlankactionsParty($this->aBlankactionsParty);
            }

            if ($this->aPersonRelatedByCreatepersonId !== null) {
                if ($this->aPersonRelatedByCreatepersonId->isModified() || $this->aPersonRelatedByCreatepersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByCreatepersonId->save($con);
                }
                $this->setPersonRelatedByCreatepersonId($this->aPersonRelatedByCreatepersonId);
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if ($this->aPersonRelatedByModifypersonId->isModified() || $this->aPersonRelatedByModifypersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByModifypersonId->save($con);
                }
                $this->setPersonRelatedByModifypersonId($this->aPersonRelatedByModifypersonId);
            }

            if ($this->aOrgstructure !== null) {
                if ($this->aOrgstructure->isModified() || $this->aOrgstructure->isNew()) {
                    $affectedRows += $this->aOrgstructure->save($con);
                }
                $this->setOrgstructure($this->aOrgstructure);
            }

            if ($this->aPersonRelatedByPersonId !== null) {
                if ($this->aPersonRelatedByPersonId->isModified() || $this->aPersonRelatedByPersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByPersonId->save($con);
                }
                $this->setPersonRelatedByPersonId($this->aPersonRelatedByPersonId);
            }

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

        $this->modifiedColumns[] = BlankactionsMovingPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BlankactionsMovingPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BlankactionsMovingPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::BLANKPARTY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`blankParty_id`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::SERIAL)) {
            $modifiedColumns[':p' . $index++]  = '`serial`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::ORGSTRUCTURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`orgStructure_id`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::PERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`person_id`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::RECEIVED)) {
            $modifiedColumns[':p' . $index++]  = '`received`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::USED)) {
            $modifiedColumns[':p' . $index++]  = '`used`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::RETURNDATE)) {
            $modifiedColumns[':p' . $index++]  = '`returnDate`';
        }
        if ($this->isColumnModified(BlankactionsMovingPeer::RETURNAMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`returnAmount`';
        }

        $sql = sprintf(
            'INSERT INTO `BlankActions_Moving` (%s) VALUES (%s)',
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
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`blankParty_id`':
                        $stmt->bindValue($identifier, $this->blankparty_id, PDO::PARAM_INT);
                        break;
                    case '`serial`':
                        $stmt->bindValue($identifier, $this->serial, PDO::PARAM_STR);
                        break;
                    case '`orgStructure_id`':
                        $stmt->bindValue($identifier, $this->orgstructure_id, PDO::PARAM_INT);
                        break;
                    case '`person_id`':
                        $stmt->bindValue($identifier, $this->person_id, PDO::PARAM_INT);
                        break;
                    case '`received`':
                        $stmt->bindValue($identifier, $this->received, PDO::PARAM_INT);
                        break;
                    case '`used`':
                        $stmt->bindValue($identifier, $this->used, PDO::PARAM_INT);
                        break;
                    case '`returnDate`':
                        $stmt->bindValue($identifier, $this->returndate, PDO::PARAM_STR);
                        break;
                    case '`returnAmount`':
                        $stmt->bindValue($identifier, $this->returnamount, PDO::PARAM_INT);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aBlankactionsParty !== null) {
                if (!$this->aBlankactionsParty->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBlankactionsParty->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByCreatepersonId !== null) {
                if (!$this->aPersonRelatedByCreatepersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByCreatepersonId->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if (!$this->aPersonRelatedByModifypersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByModifypersonId->getValidationFailures());
                }
            }

            if ($this->aOrgstructure !== null) {
                if (!$this->aOrgstructure->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrgstructure->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByPersonId !== null) {
                if (!$this->aPersonRelatedByPersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByPersonId->getValidationFailures());
                }
            }


            if (($retval = BlankactionsMovingPeer::doValidate($this, $columns)) !== true) {
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
        $pos = BlankactionsMovingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDate();
                break;
            case 7:
                return $this->getBlankpartyId();
                break;
            case 8:
                return $this->getSerial();
                break;
            case 9:
                return $this->getOrgstructureId();
                break;
            case 10:
                return $this->getPersonId();
                break;
            case 11:
                return $this->getReceived();
                break;
            case 12:
                return $this->getUsed();
                break;
            case 13:
                return $this->getReturndate();
                break;
            case 14:
                return $this->getReturnamount();
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
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['BlankactionsMoving'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BlankactionsMoving'][$this->getPrimaryKey()] = true;
        $keys = BlankactionsMovingPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getDate(),
            $keys[7] => $this->getBlankpartyId(),
            $keys[8] => $this->getSerial(),
            $keys[9] => $this->getOrgstructureId(),
            $keys[10] => $this->getPersonId(),
            $keys[11] => $this->getReceived(),
            $keys[12] => $this->getUsed(),
            $keys[13] => $this->getReturndate(),
            $keys[14] => $this->getReturnamount(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aBlankactionsParty) {
                $result['BlankactionsParty'] = $this->aBlankactionsParty->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByCreatepersonId) {
                $result['PersonRelatedByCreatepersonId'] = $this->aPersonRelatedByCreatepersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByModifypersonId) {
                $result['PersonRelatedByModifypersonId'] = $this->aPersonRelatedByModifypersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrgstructure) {
                $result['Orgstructure'] = $this->aOrgstructure->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByPersonId) {
                $result['PersonRelatedByPersonId'] = $this->aPersonRelatedByPersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

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
        $pos = BlankactionsMovingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDate($value);
                break;
            case 7:
                $this->setBlankpartyId($value);
                break;
            case 8:
                $this->setSerial($value);
                break;
            case 9:
                $this->setOrgstructureId($value);
                break;
            case 10:
                $this->setPersonId($value);
                break;
            case 11:
                $this->setReceived($value);
                break;
            case 12:
                $this->setUsed($value);
                break;
            case 13:
                $this->setReturndate($value);
                break;
            case 14:
                $this->setReturnamount($value);
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
        $keys = BlankactionsMovingPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBlankpartyId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSerial($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setOrgstructureId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setPersonId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setReceived($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setUsed($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setReturndate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setReturnamount($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BlankactionsMovingPeer::DATABASE_NAME);

        if ($this->isColumnModified(BlankactionsMovingPeer::ID)) $criteria->add(BlankactionsMovingPeer::ID, $this->id);
        if ($this->isColumnModified(BlankactionsMovingPeer::CREATEDATETIME)) $criteria->add(BlankactionsMovingPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(BlankactionsMovingPeer::CREATEPERSON_ID)) $criteria->add(BlankactionsMovingPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(BlankactionsMovingPeer::MODIFYDATETIME)) $criteria->add(BlankactionsMovingPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(BlankactionsMovingPeer::MODIFYPERSON_ID)) $criteria->add(BlankactionsMovingPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(BlankactionsMovingPeer::DELETED)) $criteria->add(BlankactionsMovingPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(BlankactionsMovingPeer::DATE)) $criteria->add(BlankactionsMovingPeer::DATE, $this->date);
        if ($this->isColumnModified(BlankactionsMovingPeer::BLANKPARTY_ID)) $criteria->add(BlankactionsMovingPeer::BLANKPARTY_ID, $this->blankparty_id);
        if ($this->isColumnModified(BlankactionsMovingPeer::SERIAL)) $criteria->add(BlankactionsMovingPeer::SERIAL, $this->serial);
        if ($this->isColumnModified(BlankactionsMovingPeer::ORGSTRUCTURE_ID)) $criteria->add(BlankactionsMovingPeer::ORGSTRUCTURE_ID, $this->orgstructure_id);
        if ($this->isColumnModified(BlankactionsMovingPeer::PERSON_ID)) $criteria->add(BlankactionsMovingPeer::PERSON_ID, $this->person_id);
        if ($this->isColumnModified(BlankactionsMovingPeer::RECEIVED)) $criteria->add(BlankactionsMovingPeer::RECEIVED, $this->received);
        if ($this->isColumnModified(BlankactionsMovingPeer::USED)) $criteria->add(BlankactionsMovingPeer::USED, $this->used);
        if ($this->isColumnModified(BlankactionsMovingPeer::RETURNDATE)) $criteria->add(BlankactionsMovingPeer::RETURNDATE, $this->returndate);
        if ($this->isColumnModified(BlankactionsMovingPeer::RETURNAMOUNT)) $criteria->add(BlankactionsMovingPeer::RETURNAMOUNT, $this->returnamount);

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
        $criteria = new Criteria(BlankactionsMovingPeer::DATABASE_NAME);
        $criteria->add(BlankactionsMovingPeer::ID, $this->id);

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
     * @param object $copyObj An object of BlankactionsMoving (or compatible) type.
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
        $copyObj->setDate($this->getDate());
        $copyObj->setBlankpartyId($this->getBlankpartyId());
        $copyObj->setSerial($this->getSerial());
        $copyObj->setOrgstructureId($this->getOrgstructureId());
        $copyObj->setPersonId($this->getPersonId());
        $copyObj->setReceived($this->getReceived());
        $copyObj->setUsed($this->getUsed());
        $copyObj->setReturndate($this->getReturndate());
        $copyObj->setReturnamount($this->getReturnamount());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

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
     * @return BlankactionsMoving Clone of current object.
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
     * @return BlankactionsMovingPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BlankactionsMovingPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a BlankactionsParty object.
     *
     * @param             BlankactionsParty $v
     * @return BlankactionsMoving The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBlankactionsParty(BlankactionsParty $v = null)
    {
        if ($v === null) {
            $this->setBlankpartyId(NULL);
        } else {
            $this->setBlankpartyId($v->getId());
        }

        $this->aBlankactionsParty = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BlankactionsParty object, it will not be re-added.
        if ($v !== null) {
            $v->addBlankactionsMoving($this);
        }


        return $this;
    }


    /**
     * Get the associated BlankactionsParty object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BlankactionsParty The associated BlankactionsParty object.
     * @throws PropelException
     */
    public function getBlankactionsParty(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBlankactionsParty === null && ($this->blankparty_id !== null) && $doQuery) {
            $this->aBlankactionsParty = BlankactionsPartyQuery::create()->findPk($this->blankparty_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBlankactionsParty->addBlankactionsMovings($this);
             */
        }

        return $this->aBlankactionsParty;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return BlankactionsMoving The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByCreatepersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setCreatepersonId(NULL);
        } else {
            $this->setCreatepersonId($v->getId());
        }

        $this->aPersonRelatedByCreatepersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addBlankactionsMovingRelatedByCreatepersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByCreatepersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByCreatepersonId === null && ($this->createperson_id !== null) && $doQuery) {
            $this->aPersonRelatedByCreatepersonId = PersonQuery::create()->findPk($this->createperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByCreatepersonId->addBlankactionsMovingsRelatedByCreatepersonId($this);
             */
        }

        return $this->aPersonRelatedByCreatepersonId;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return BlankactionsMoving The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByModifypersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setModifypersonId(NULL);
        } else {
            $this->setModifypersonId($v->getId());
        }

        $this->aPersonRelatedByModifypersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addBlankactionsMovingRelatedByModifypersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByModifypersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByModifypersonId === null && ($this->modifyperson_id !== null) && $doQuery) {
            $this->aPersonRelatedByModifypersonId = PersonQuery::create()->findPk($this->modifyperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByModifypersonId->addBlankactionsMovingsRelatedByModifypersonId($this);
             */
        }

        return $this->aPersonRelatedByModifypersonId;
    }

    /**
     * Declares an association between this object and a Orgstructure object.
     *
     * @param             Orgstructure $v
     * @return BlankactionsMoving The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrgstructure(Orgstructure $v = null)
    {
        if ($v === null) {
            $this->setOrgstructureId(NULL);
        } else {
            $this->setOrgstructureId($v->getId());
        }

        $this->aOrgstructure = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Orgstructure object, it will not be re-added.
        if ($v !== null) {
            $v->addBlankactionsMoving($this);
        }


        return $this;
    }


    /**
     * Get the associated Orgstructure object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Orgstructure The associated Orgstructure object.
     * @throws PropelException
     */
    public function getOrgstructure(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrgstructure === null && ($this->orgstructure_id !== null) && $doQuery) {
            $this->aOrgstructure = OrgstructureQuery::create()->findPk($this->orgstructure_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrgstructure->addBlankactionsMovings($this);
             */
        }

        return $this->aOrgstructure;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return BlankactionsMoving The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByPersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setPersonId(NULL);
        } else {
            $this->setPersonId($v->getId());
        }

        $this->aPersonRelatedByPersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addBlankactionsMovingRelatedByPersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByPersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByPersonId === null && ($this->person_id !== null) && $doQuery) {
            $this->aPersonRelatedByPersonId = PersonQuery::create()->findPk($this->person_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByPersonId->addBlankactionsMovingsRelatedByPersonId($this);
             */
        }

        return $this->aPersonRelatedByPersonId;
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
        $this->date = null;
        $this->blankparty_id = null;
        $this->serial = null;
        $this->orgstructure_id = null;
        $this->person_id = null;
        $this->received = null;
        $this->used = null;
        $this->returndate = null;
        $this->returnamount = null;
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
            if ($this->aBlankactionsParty instanceof Persistent) {
              $this->aBlankactionsParty->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByCreatepersonId instanceof Persistent) {
              $this->aPersonRelatedByCreatepersonId->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByModifypersonId instanceof Persistent) {
              $this->aPersonRelatedByModifypersonId->clearAllReferences($deep);
            }
            if ($this->aOrgstructure instanceof Persistent) {
              $this->aOrgstructure->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByPersonId instanceof Persistent) {
              $this->aPersonRelatedByPersonId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aBlankactionsParty = null;
        $this->aPersonRelatedByCreatepersonId = null;
        $this->aPersonRelatedByModifypersonId = null;
        $this->aOrgstructure = null;
        $this->aPersonRelatedByPersonId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BlankactionsMovingPeer::DEFAULT_STRING_FORMAT);
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
