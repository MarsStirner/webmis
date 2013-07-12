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
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\BlankactionsMovingQuery;
use Webmis\Models\BlankactionsParty;
use Webmis\Models\BlankactionsPartyPeer;
use Webmis\Models\BlankactionsPartyQuery;
use Webmis\Models\Person;
use Webmis\Models\PersonQuery;
use Webmis\Models\Rbblankactions;
use Webmis\Models\RbblankactionsQuery;

/**
 * Base class that represents a row from the 'BlankActions_Party' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBlankactionsParty extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\BlankactionsPartyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BlankactionsPartyPeer
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
     * The value for the doctype_id field.
     * @var        int
     */
    protected $doctype_id;

    /**
     * The value for the person_id field.
     * @var        int
     */
    protected $person_id;

    /**
     * The value for the serial field.
     * @var        string
     */
    protected $serial;

    /**
     * The value for the numberfrom field.
     * @var        string
     */
    protected $numberfrom;

    /**
     * The value for the numberto field.
     * @var        string
     */
    protected $numberto;

    /**
     * The value for the amount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $amount;

    /**
     * The value for the extradited field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $extradited;

    /**
     * The value for the balance field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $balance;

    /**
     * The value for the used field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $used;

    /**
     * The value for the writing field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $writing;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByCreatepersonId;

    /**
     * @var        Rbblankactions
     */
    protected $aRbblankactions;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByModifypersonId;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByPersonId;

    /**
     * @var        PropelObjectCollection|BlankactionsMoving[] Collection to store aggregation of BlankactionsMoving objects.
     */
    protected $collBlankactionsMovings;
    protected $collBlankactionsMovingsPartial;

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
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsMovingsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->amount = 0;
        $this->extradited = 0;
        $this->balance = 0;
        $this->used = 0;
        $this->writing = 0;
    }

    /**
     * Initializes internal state of BaseBlankactionsParty object.
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
     * Get the [doctype_id] column value.
     *
     * @return int
     */
    public function getDoctypeId()
    {
        return $this->doctype_id;
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
     * Get the [serial] column value.
     *
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Get the [numberfrom] column value.
     *
     * @return string
     */
    public function getNumberfrom()
    {
        return $this->numberfrom;
    }

    /**
     * Get the [numberto] column value.
     *
     * @return string
     */
    public function getNumberto()
    {
        return $this->numberto;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [extradited] column value.
     *
     * @return int
     */
    public function getExtradited()
    {
        return $this->extradited;
    }

    /**
     * Get the [balance] column value.
     *
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
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
     * Get the [writing] column value.
     *
     * @return int
     */
    public function getWriting()
    {
        return $this->writing;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsPartyPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::CREATEPERSON_ID;
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
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsPartyPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::MODIFYPERSON_ID;
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
     * @return BlankactionsParty The current object (for fluent API support)
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
            $this->modifiedColumns[] = BlankactionsPartyPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = BlankactionsPartyPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [doctype_id] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setDoctypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->doctype_id !== $v) {
            $this->doctype_id = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::DOCTYPE_ID;
        }

        if ($this->aRbblankactions !== null && $this->aRbblankactions->getId() !== $v) {
            $this->aRbblankactions = null;
        }


        return $this;
    } // setDoctypeId()

    /**
     * Set the value of [person_id] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setPersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->person_id !== $v) {
            $this->person_id = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::PERSON_ID;
        }

        if ($this->aPersonRelatedByPersonId !== null && $this->aPersonRelatedByPersonId->getId() !== $v) {
            $this->aPersonRelatedByPersonId = null;
        }


        return $this;
    } // setPersonId()

    /**
     * Set the value of [serial] column.
     *
     * @param string $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setSerial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->serial !== $v) {
            $this->serial = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::SERIAL;
        }


        return $this;
    } // setSerial()

    /**
     * Set the value of [numberfrom] column.
     *
     * @param string $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setNumberfrom($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numberfrom !== $v) {
            $this->numberfrom = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::NUMBERFROM;
        }


        return $this;
    } // setNumberfrom()

    /**
     * Set the value of [numberto] column.
     *
     * @param string $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setNumberto($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numberto !== $v) {
            $this->numberto = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::NUMBERTO;
        }


        return $this;
    } // setNumberto()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [extradited] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setExtradited($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->extradited !== $v) {
            $this->extradited = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::EXTRADITED;
        }


        return $this;
    } // setExtradited()

    /**
     * Set the value of [balance] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setBalance($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->balance !== $v) {
            $this->balance = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::BALANCE;
        }


        return $this;
    } // setBalance()

    /**
     * Set the value of [used] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setUsed($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->used !== $v) {
            $this->used = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::USED;
        }


        return $this;
    } // setUsed()

    /**
     * Set the value of [writing] column.
     *
     * @param int $v new value
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setWriting($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->writing !== $v) {
            $this->writing = $v;
            $this->modifiedColumns[] = BlankactionsPartyPeer::WRITING;
        }


        return $this;
    } // setWriting()

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

            if ($this->amount !== 0) {
                return false;
            }

            if ($this->extradited !== 0) {
                return false;
            }

            if ($this->balance !== 0) {
                return false;
            }

            if ($this->used !== 0) {
                return false;
            }

            if ($this->writing !== 0) {
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
            $this->doctype_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->person_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->serial = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->numberfrom = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->numberto = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->amount = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->extradited = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->balance = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->used = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->writing = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 17; // 17 = BlankactionsPartyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BlankactionsParty object", $e);
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
        if ($this->aRbblankactions !== null && $this->doctype_id !== $this->aRbblankactions->getId()) {
            $this->aRbblankactions = null;
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
            $con = Propel::getConnection(BlankactionsPartyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BlankactionsPartyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPersonRelatedByCreatepersonId = null;
            $this->aRbblankactions = null;
            $this->aPersonRelatedByModifypersonId = null;
            $this->aPersonRelatedByPersonId = null;
            $this->collBlankactionsMovings = null;

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
            $con = Propel::getConnection(BlankactionsPartyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BlankactionsPartyQuery::create()
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
            $con = Propel::getConnection(BlankactionsPartyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BlankactionsPartyPeer::addInstanceToPool($this);
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

            if ($this->aPersonRelatedByCreatepersonId !== null) {
                if ($this->aPersonRelatedByCreatepersonId->isModified() || $this->aPersonRelatedByCreatepersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByCreatepersonId->save($con);
                }
                $this->setPersonRelatedByCreatepersonId($this->aPersonRelatedByCreatepersonId);
            }

            if ($this->aRbblankactions !== null) {
                if ($this->aRbblankactions->isModified() || $this->aRbblankactions->isNew()) {
                    $affectedRows += $this->aRbblankactions->save($con);
                }
                $this->setRbblankactions($this->aRbblankactions);
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if ($this->aPersonRelatedByModifypersonId->isModified() || $this->aPersonRelatedByModifypersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByModifypersonId->save($con);
                }
                $this->setPersonRelatedByModifypersonId($this->aPersonRelatedByModifypersonId);
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

            if ($this->blankactionsMovingsScheduledForDeletion !== null) {
                if (!$this->blankactionsMovingsScheduledForDeletion->isEmpty()) {
                    BlankactionsMovingQuery::create()
                        ->filterByPrimaryKeys($this->blankactionsMovingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->blankactionsMovingsScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsMovings !== null) {
                foreach ($this->collBlankactionsMovings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = BlankactionsPartyPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BlankactionsPartyPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BlankactionsPartyPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::DOCTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`doctype_id`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::PERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`person_id`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::SERIAL)) {
            $modifiedColumns[':p' . $index++]  = '`serial`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::NUMBERFROM)) {
            $modifiedColumns[':p' . $index++]  = '`numberFrom`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::NUMBERTO)) {
            $modifiedColumns[':p' . $index++]  = '`numberTo`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::EXTRADITED)) {
            $modifiedColumns[':p' . $index++]  = '`extradited`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::BALANCE)) {
            $modifiedColumns[':p' . $index++]  = '`balance`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::USED)) {
            $modifiedColumns[':p' . $index++]  = '`used`';
        }
        if ($this->isColumnModified(BlankactionsPartyPeer::WRITING)) {
            $modifiedColumns[':p' . $index++]  = '`writing`';
        }

        $sql = sprintf(
            'INSERT INTO `BlankActions_Party` (%s) VALUES (%s)',
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
                    case '`doctype_id`':
                        $stmt->bindValue($identifier, $this->doctype_id, PDO::PARAM_INT);
                        break;
                    case '`person_id`':
                        $stmt->bindValue($identifier, $this->person_id, PDO::PARAM_INT);
                        break;
                    case '`serial`':
                        $stmt->bindValue($identifier, $this->serial, PDO::PARAM_STR);
                        break;
                    case '`numberFrom`':
                        $stmt->bindValue($identifier, $this->numberfrom, PDO::PARAM_STR);
                        break;
                    case '`numberTo`':
                        $stmt->bindValue($identifier, $this->numberto, PDO::PARAM_STR);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case '`extradited`':
                        $stmt->bindValue($identifier, $this->extradited, PDO::PARAM_INT);
                        break;
                    case '`balance`':
                        $stmt->bindValue($identifier, $this->balance, PDO::PARAM_INT);
                        break;
                    case '`used`':
                        $stmt->bindValue($identifier, $this->used, PDO::PARAM_INT);
                        break;
                    case '`writing`':
                        $stmt->bindValue($identifier, $this->writing, PDO::PARAM_INT);
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

            if ($this->aPersonRelatedByCreatepersonId !== null) {
                if (!$this->aPersonRelatedByCreatepersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByCreatepersonId->getValidationFailures());
                }
            }

            if ($this->aRbblankactions !== null) {
                if (!$this->aRbblankactions->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbblankactions->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if (!$this->aPersonRelatedByModifypersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByModifypersonId->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByPersonId !== null) {
                if (!$this->aPersonRelatedByPersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByPersonId->getValidationFailures());
                }
            }


            if (($retval = BlankactionsPartyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBlankactionsMovings !== null) {
                    foreach ($this->collBlankactionsMovings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
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
        $pos = BlankactionsPartyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDoctypeId();
                break;
            case 8:
                return $this->getPersonId();
                break;
            case 9:
                return $this->getSerial();
                break;
            case 10:
                return $this->getNumberfrom();
                break;
            case 11:
                return $this->getNumberto();
                break;
            case 12:
                return $this->getAmount();
                break;
            case 13:
                return $this->getExtradited();
                break;
            case 14:
                return $this->getBalance();
                break;
            case 15:
                return $this->getUsed();
                break;
            case 16:
                return $this->getWriting();
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
        if (isset($alreadyDumpedObjects['BlankactionsParty'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BlankactionsParty'][$this->getPrimaryKey()] = true;
        $keys = BlankactionsPartyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getDate(),
            $keys[7] => $this->getDoctypeId(),
            $keys[8] => $this->getPersonId(),
            $keys[9] => $this->getSerial(),
            $keys[10] => $this->getNumberfrom(),
            $keys[11] => $this->getNumberto(),
            $keys[12] => $this->getAmount(),
            $keys[13] => $this->getExtradited(),
            $keys[14] => $this->getBalance(),
            $keys[15] => $this->getUsed(),
            $keys[16] => $this->getWriting(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPersonRelatedByCreatepersonId) {
                $result['PersonRelatedByCreatepersonId'] = $this->aPersonRelatedByCreatepersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbblankactions) {
                $result['Rbblankactions'] = $this->aRbblankactions->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByModifypersonId) {
                $result['PersonRelatedByModifypersonId'] = $this->aPersonRelatedByModifypersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByPersonId) {
                $result['PersonRelatedByPersonId'] = $this->aPersonRelatedByPersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBlankactionsMovings) {
                $result['BlankactionsMovings'] = $this->collBlankactionsMovings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BlankactionsPartyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDoctypeId($value);
                break;
            case 8:
                $this->setPersonId($value);
                break;
            case 9:
                $this->setSerial($value);
                break;
            case 10:
                $this->setNumberfrom($value);
                break;
            case 11:
                $this->setNumberto($value);
                break;
            case 12:
                $this->setAmount($value);
                break;
            case 13:
                $this->setExtradited($value);
                break;
            case 14:
                $this->setBalance($value);
                break;
            case 15:
                $this->setUsed($value);
                break;
            case 16:
                $this->setWriting($value);
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
        $keys = BlankactionsPartyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDoctypeId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPersonId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSerial($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNumberfrom($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNumberto($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setAmount($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setExtradited($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBalance($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setUsed($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setWriting($arr[$keys[16]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BlankactionsPartyPeer::DATABASE_NAME);

        if ($this->isColumnModified(BlankactionsPartyPeer::ID)) $criteria->add(BlankactionsPartyPeer::ID, $this->id);
        if ($this->isColumnModified(BlankactionsPartyPeer::CREATEDATETIME)) $criteria->add(BlankactionsPartyPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(BlankactionsPartyPeer::CREATEPERSON_ID)) $criteria->add(BlankactionsPartyPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(BlankactionsPartyPeer::MODIFYDATETIME)) $criteria->add(BlankactionsPartyPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(BlankactionsPartyPeer::MODIFYPERSON_ID)) $criteria->add(BlankactionsPartyPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(BlankactionsPartyPeer::DELETED)) $criteria->add(BlankactionsPartyPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(BlankactionsPartyPeer::DATE)) $criteria->add(BlankactionsPartyPeer::DATE, $this->date);
        if ($this->isColumnModified(BlankactionsPartyPeer::DOCTYPE_ID)) $criteria->add(BlankactionsPartyPeer::DOCTYPE_ID, $this->doctype_id);
        if ($this->isColumnModified(BlankactionsPartyPeer::PERSON_ID)) $criteria->add(BlankactionsPartyPeer::PERSON_ID, $this->person_id);
        if ($this->isColumnModified(BlankactionsPartyPeer::SERIAL)) $criteria->add(BlankactionsPartyPeer::SERIAL, $this->serial);
        if ($this->isColumnModified(BlankactionsPartyPeer::NUMBERFROM)) $criteria->add(BlankactionsPartyPeer::NUMBERFROM, $this->numberfrom);
        if ($this->isColumnModified(BlankactionsPartyPeer::NUMBERTO)) $criteria->add(BlankactionsPartyPeer::NUMBERTO, $this->numberto);
        if ($this->isColumnModified(BlankactionsPartyPeer::AMOUNT)) $criteria->add(BlankactionsPartyPeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(BlankactionsPartyPeer::EXTRADITED)) $criteria->add(BlankactionsPartyPeer::EXTRADITED, $this->extradited);
        if ($this->isColumnModified(BlankactionsPartyPeer::BALANCE)) $criteria->add(BlankactionsPartyPeer::BALANCE, $this->balance);
        if ($this->isColumnModified(BlankactionsPartyPeer::USED)) $criteria->add(BlankactionsPartyPeer::USED, $this->used);
        if ($this->isColumnModified(BlankactionsPartyPeer::WRITING)) $criteria->add(BlankactionsPartyPeer::WRITING, $this->writing);

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
        $criteria = new Criteria(BlankactionsPartyPeer::DATABASE_NAME);
        $criteria->add(BlankactionsPartyPeer::ID, $this->id);

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
     * @param object $copyObj An object of BlankactionsParty (or compatible) type.
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
        $copyObj->setDoctypeId($this->getDoctypeId());
        $copyObj->setPersonId($this->getPersonId());
        $copyObj->setSerial($this->getSerial());
        $copyObj->setNumberfrom($this->getNumberfrom());
        $copyObj->setNumberto($this->getNumberto());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setExtradited($this->getExtradited());
        $copyObj->setBalance($this->getBalance());
        $copyObj->setUsed($this->getUsed());
        $copyObj->setWriting($this->getWriting());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBlankactionsMovings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsMoving($relObj->copy($deepCopy));
                }
            }

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
     * @return BlankactionsParty Clone of current object.
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
     * @return BlankactionsPartyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BlankactionsPartyPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return BlankactionsParty The current object (for fluent API support)
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
            $v->addBlankactionsPartyRelatedByCreatepersonId($this);
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
                $this->aPersonRelatedByCreatepersonId->addBlankactionsPartysRelatedByCreatepersonId($this);
             */
        }

        return $this->aPersonRelatedByCreatepersonId;
    }

    /**
     * Declares an association between this object and a Rbblankactions object.
     *
     * @param             Rbblankactions $v
     * @return BlankactionsParty The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbblankactions(Rbblankactions $v = null)
    {
        if ($v === null) {
            $this->setDoctypeId(NULL);
        } else {
            $this->setDoctypeId($v->getId());
        }

        $this->aRbblankactions = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbblankactions object, it will not be re-added.
        if ($v !== null) {
            $v->addBlankactionsParty($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbblankactions object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbblankactions The associated Rbblankactions object.
     * @throws PropelException
     */
    public function getRbblankactions(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbblankactions === null && ($this->doctype_id !== null) && $doQuery) {
            $this->aRbblankactions = RbblankactionsQuery::create()->findPk($this->doctype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbblankactions->addBlankactionsPartys($this);
             */
        }

        return $this->aRbblankactions;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return BlankactionsParty The current object (for fluent API support)
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
            $v->addBlankactionsPartyRelatedByModifypersonId($this);
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
                $this->aPersonRelatedByModifypersonId->addBlankactionsPartysRelatedByModifypersonId($this);
             */
        }

        return $this->aPersonRelatedByModifypersonId;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return BlankactionsParty The current object (for fluent API support)
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
            $v->addBlankactionsPartyRelatedByPersonId($this);
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
                $this->aPersonRelatedByPersonId->addBlankactionsPartysRelatedByPersonId($this);
             */
        }

        return $this->aPersonRelatedByPersonId;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('BlankactionsMoving' == $relationName) {
            $this->initBlankactionsMovings();
        }
    }

    /**
     * Clears out the collBlankactionsMovings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BlankactionsParty The current object (for fluent API support)
     * @see        addBlankactionsMovings()
     */
    public function clearBlankactionsMovings()
    {
        $this->collBlankactionsMovings = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsMovingsPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsMovings collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsMovings($v = true)
    {
        $this->collBlankactionsMovingsPartial = $v;
    }

    /**
     * Initializes the collBlankactionsMovings collection.
     *
     * By default this just sets the collBlankactionsMovings collection to an empty array (like clearcollBlankactionsMovings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsMovings($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsMovings && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsMovings = new PropelObjectCollection();
        $this->collBlankactionsMovings->setModel('BlankactionsMoving');
    }

    /**
     * Gets an array of BlankactionsMoving objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BlankactionsParty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     * @throws PropelException
     */
    public function getBlankactionsMovings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovings) {
                // return empty collection
                $this->initBlankactionsMovings();
            } else {
                $collBlankactionsMovings = BlankactionsMovingQuery::create(null, $criteria)
                    ->filterByBlankactionsParty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsMovingsPartial && count($collBlankactionsMovings)) {
                      $this->initBlankactionsMovings(false);

                      foreach($collBlankactionsMovings as $obj) {
                        if (false == $this->collBlankactionsMovings->contains($obj)) {
                          $this->collBlankactionsMovings->append($obj);
                        }
                      }

                      $this->collBlankactionsMovingsPartial = true;
                    }

                    $collBlankactionsMovings->getInternalIterator()->rewind();
                    return $collBlankactionsMovings;
                }

                if($partial && $this->collBlankactionsMovings) {
                    foreach($this->collBlankactionsMovings as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsMovings[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsMovings = $collBlankactionsMovings;
                $this->collBlankactionsMovingsPartial = false;
            }
        }

        return $this->collBlankactionsMovings;
    }

    /**
     * Sets a collection of BlankactionsMoving objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsMovings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function setBlankactionsMovings(PropelCollection $blankactionsMovings, PropelPDO $con = null)
    {
        $blankactionsMovingsToDelete = $this->getBlankactionsMovings(new Criteria(), $con)->diff($blankactionsMovings);

        $this->blankactionsMovingsScheduledForDeletion = unserialize(serialize($blankactionsMovingsToDelete));

        foreach ($blankactionsMovingsToDelete as $blankactionsMovingRemoved) {
            $blankactionsMovingRemoved->setBlankactionsParty(null);
        }

        $this->collBlankactionsMovings = null;
        foreach ($blankactionsMovings as $blankactionsMoving) {
            $this->addBlankactionsMoving($blankactionsMoving);
        }

        $this->collBlankactionsMovings = $blankactionsMovings;
        $this->collBlankactionsMovingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BlankactionsMoving objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BlankactionsMoving objects.
     * @throws PropelException
     */
    public function countBlankactionsMovings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsMovings());
            }
            $query = BlankactionsMovingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBlankactionsParty($this)
                ->count($con);
        }

        return count($this->collBlankactionsMovings);
    }

    /**
     * Method called to associate a BlankactionsMoving object to this object
     * through the BlankactionsMoving foreign key attribute.
     *
     * @param    BlankactionsMoving $l BlankactionsMoving
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function addBlankactionsMoving(BlankactionsMoving $l)
    {
        if ($this->collBlankactionsMovings === null) {
            $this->initBlankactionsMovings();
            $this->collBlankactionsMovingsPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsMovings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsMoving($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsMoving $blankactionsMoving The blankactionsMoving object to add.
     */
    protected function doAddBlankactionsMoving($blankactionsMoving)
    {
        $this->collBlankactionsMovings[]= $blankactionsMoving;
        $blankactionsMoving->setBlankactionsParty($this);
    }

    /**
     * @param	BlankactionsMoving $blankactionsMoving The blankactionsMoving object to remove.
     * @return BlankactionsParty The current object (for fluent API support)
     */
    public function removeBlankactionsMoving($blankactionsMoving)
    {
        if ($this->getBlankactionsMovings()->contains($blankactionsMoving)) {
            $this->collBlankactionsMovings->remove($this->collBlankactionsMovings->search($blankactionsMoving));
            if (null === $this->blankactionsMovingsScheduledForDeletion) {
                $this->blankactionsMovingsScheduledForDeletion = clone $this->collBlankactionsMovings;
                $this->blankactionsMovingsScheduledForDeletion->clear();
            }
            $this->blankactionsMovingsScheduledForDeletion[]= clone $blankactionsMoving;
            $blankactionsMoving->setBlankactionsParty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BlankactionsParty is new, it will return
     * an empty collection; or if this BlankactionsParty has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BlankactionsParty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BlankactionsParty is new, it will return
     * an empty collection; or if this BlankactionsParty has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BlankactionsParty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BlankactionsParty is new, it will return
     * an empty collection; or if this BlankactionsParty has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BlankactionsParty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinOrgstructure($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('Orgstructure', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BlankactionsParty is new, it will return
     * an empty collection; or if this BlankactionsParty has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BlankactionsParty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinPersonRelatedByPersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByPersonId', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
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
        $this->doctype_id = null;
        $this->person_id = null;
        $this->serial = null;
        $this->numberfrom = null;
        $this->numberto = null;
        $this->amount = null;
        $this->extradited = null;
        $this->balance = null;
        $this->used = null;
        $this->writing = null;
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
            if ($this->collBlankactionsMovings) {
                foreach ($this->collBlankactionsMovings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPersonRelatedByCreatepersonId instanceof Persistent) {
              $this->aPersonRelatedByCreatepersonId->clearAllReferences($deep);
            }
            if ($this->aRbblankactions instanceof Persistent) {
              $this->aRbblankactions->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByModifypersonId instanceof Persistent) {
              $this->aPersonRelatedByModifypersonId->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByPersonId instanceof Persistent) {
              $this->aPersonRelatedByPersonId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBlankactionsMovings instanceof PropelCollection) {
            $this->collBlankactionsMovings->clearIterator();
        }
        $this->collBlankactionsMovings = null;
        $this->aPersonRelatedByCreatepersonId = null;
        $this->aRbblankactions = null;
        $this->aPersonRelatedByModifypersonId = null;
        $this->aPersonRelatedByPersonId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BlankactionsPartyPeer::DEFAULT_STRING_FORMAT);
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
