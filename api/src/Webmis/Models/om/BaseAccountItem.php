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
use Webmis\Models\AccountItem;
use Webmis\Models\AccountItemPeer;
use Webmis\Models\AccountItemQuery;

/**
 * Base class that represents a row from the 'Account_Item' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseAccountItem extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\AccountItemPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AccountItemPeer
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
     * The value for the deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the servicedate field.
     * Note: this column has a database default value of: NULL
     * @var        string
     */
    protected $servicedate;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the visit_id field.
     * @var        int
     */
    protected $visit_id;

    /**
     * The value for the action_id field.
     * @var        int
     */
    protected $action_id;

    /**
     * The value for the price field.
     * @var        double
     */
    protected $price;

    /**
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

    /**
     * The value for the amount field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $amount;

    /**
     * The value for the uet field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $uet;

    /**
     * The value for the sum field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $sum;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the number field.
     * @var        string
     */
    protected $number;

    /**
     * The value for the refusetype_id field.
     * @var        int
     */
    protected $refusetype_id;

    /**
     * The value for the reexposeitem_id field.
     * @var        int
     */
    protected $reexposeitem_id;

    /**
     * The value for the note field.
     * @var        string
     */
    protected $note;

    /**
     * The value for the tariff_id field.
     * @var        int
     */
    protected $tariff_id;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

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
        $this->servicedate = NULL;
        $this->amount = 0;
        $this->uet = 0;
        $this->sum = 0;
    }

    /**
     * Initializes internal state of BaseAccountItem object.
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
     * Get the [optionally formatted] temporal [servicedate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getServicedate($format = '%x')
    {
        if ($this->servicedate === null) {
            return null;
        }

        if ($this->servicedate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->servicedate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->servicedate, true), $x);
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
     * Get the [visit_id] column value.
     *
     * @return int
     */
    public function getVisitId()
    {
        return $this->visit_id;
    }

    /**
     * Get the [action_id] column value.
     *
     * @return int
     */
    public function getActionId()
    {
        return $this->action_id;
    }

    /**
     * Get the [price] column value.
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [unit_id] column value.
     *
     * @return int
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * Get the [amount] column value.
     *
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [uet] column value.
     *
     * @return double
     */
    public function getUet()
    {
        return $this->uet;
    }

    /**
     * Get the [sum] column value.
     *
     * @return double
     */
    public function getSum()
    {
        return $this->sum;
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
     * Get the [number] column value.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the [refusetype_id] column value.
     *
     * @return int
     */
    public function getRefusetypeId()
    {
        return $this->refusetype_id;
    }

    /**
     * Get the [reexposeitem_id] column value.
     *
     * @return int
     */
    public function getReexposeitemId()
    {
        return $this->reexposeitem_id;
    }

    /**
     * Get the [note] column value.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Get the [tariff_id] column value.
     *
     * @return int
     */
    public function getTariffId()
    {
        return $this->tariff_id;
    }

    /**
     * Get the [service_id] column value.
     *
     * @return int
     */
    public function getServiceId()
    {
        return $this->service_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = AccountItemPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return AccountItem The current object (for fluent API support)
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
            $this->modifiedColumns[] = AccountItemPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Sets the value of [servicedate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AccountItem The current object (for fluent API support)
     */
    public function setServicedate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->servicedate !== null || $dt !== null) {
            $currentDateAsString = ($this->servicedate !== null && $tmpDt = new DateTime($this->servicedate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
                 ) {
                $this->servicedate = $newDateAsString;
                $this->modifiedColumns[] = AccountItemPeer::SERVICEDATE;
            }
        } // if either are not null


        return $this;
    } // setServicedate()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [visit_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setVisitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->visit_id !== $v) {
            $this->visit_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::VISIT_ID;
        }


        return $this;
    } // setVisitId()

    /**
     * Set the value of [action_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setActionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->action_id !== $v) {
            $this->action_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::ACTION_ID;
        }


        return $this;
    } // setActionId()

    /**
     * Set the value of [price] column.
     *
     * @param double $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[] = AccountItemPeer::PRICE;
        }


        return $this;
    } // setPrice()

    /**
     * Set the value of [unit_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::UNIT_ID;
        }


        return $this;
    } // setUnitId()

    /**
     * Set the value of [amount] column.
     *
     * @param double $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = AccountItemPeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [uet] column.
     *
     * @param double $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setUet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->uet !== $v) {
            $this->uet = $v;
            $this->modifiedColumns[] = AccountItemPeer::UET;
        }


        return $this;
    } // setUet()

    /**
     * Set the value of [sum] column.
     *
     * @param double $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setSum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->sum !== $v) {
            $this->sum = $v;
            $this->modifiedColumns[] = AccountItemPeer::SUM;
        }


        return $this;
    } // setSum()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AccountItem The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = AccountItemPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [number] column.
     *
     * @param string $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->number !== $v) {
            $this->number = $v;
            $this->modifiedColumns[] = AccountItemPeer::NUMBER;
        }


        return $this;
    } // setNumber()

    /**
     * Set the value of [refusetype_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setRefusetypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->refusetype_id !== $v) {
            $this->refusetype_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::REFUSETYPE_ID;
        }


        return $this;
    } // setRefusetypeId()

    /**
     * Set the value of [reexposeitem_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setReexposeitemId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->reexposeitem_id !== $v) {
            $this->reexposeitem_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::REEXPOSEITEM_ID;
        }


        return $this;
    } // setReexposeitemId()

    /**
     * Set the value of [note] column.
     *
     * @param string $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = AccountItemPeer::NOTE;
        }


        return $this;
    } // setNote()

    /**
     * Set the value of [tariff_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setTariffId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tariff_id !== $v) {
            $this->tariff_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::TARIFF_ID;
        }


        return $this;
    } // setTariffId()

    /**
     * Set the value of [service_id] column.
     *
     * @param int $v new value
     * @return AccountItem The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = AccountItemPeer::SERVICE_ID;
        }


        return $this;
    } // setServiceId()

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

            if ($this->servicedate !== NULL) {
                return false;
            }

            if ($this->amount !== 0) {
                return false;
            }

            if ($this->uet !== 0) {
                return false;
            }

            if ($this->sum !== 0) {
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
            $this->deleted = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
            $this->master_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->servicedate = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->event_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->visit_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->action_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->price = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
            $this->unit_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->amount = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
            $this->uet = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
            $this->sum = ($row[$startcol + 11] !== null) ? (double) $row[$startcol + 11] : null;
            $this->date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->number = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->refusetype_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->reexposeitem_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->note = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->tariff_id = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->service_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 19; // 19 = AccountItemPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating AccountItem object", $e);
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
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AccountItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AccountItemQuery::create()
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
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AccountItemPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = AccountItemPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AccountItemPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AccountItemPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(AccountItemPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(AccountItemPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::SERVICEDATE)) {
            $modifiedColumns[':p' . $index++]  = '`serviceDate`';
        }
        if ($this->isColumnModified(AccountItemPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::VISIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`visit_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::ACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`action_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::PRICE)) {
            $modifiedColumns[':p' . $index++]  = '`price`';
        }
        if ($this->isColumnModified(AccountItemPeer::UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`unit_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(AccountItemPeer::UET)) {
            $modifiedColumns[':p' . $index++]  = '`uet`';
        }
        if ($this->isColumnModified(AccountItemPeer::SUM)) {
            $modifiedColumns[':p' . $index++]  = '`sum`';
        }
        if ($this->isColumnModified(AccountItemPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(AccountItemPeer::NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`number`';
        }
        if ($this->isColumnModified(AccountItemPeer::REFUSETYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`refuseType_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::REEXPOSEITEM_ID)) {
            $modifiedColumns[':p' . $index++]  = '`reexposeItem_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`note`';
        }
        if ($this->isColumnModified(AccountItemPeer::TARIFF_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tariff_id`';
        }
        if ($this->isColumnModified(AccountItemPeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Account_Item` (%s) VALUES (%s)',
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
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
                        break;
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`serviceDate`':
                        $stmt->bindValue($identifier, $this->servicedate, PDO::PARAM_STR);
                        break;
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`visit_id`':
                        $stmt->bindValue($identifier, $this->visit_id, PDO::PARAM_INT);
                        break;
                    case '`action_id`':
                        $stmt->bindValue($identifier, $this->action_id, PDO::PARAM_INT);
                        break;
                    case '`price`':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case '`unit_id`':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case '`uet`':
                        $stmt->bindValue($identifier, $this->uet, PDO::PARAM_STR);
                        break;
                    case '`sum`':
                        $stmt->bindValue($identifier, $this->sum, PDO::PARAM_STR);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`number`':
                        $stmt->bindValue($identifier, $this->number, PDO::PARAM_STR);
                        break;
                    case '`refuseType_id`':
                        $stmt->bindValue($identifier, $this->refusetype_id, PDO::PARAM_INT);
                        break;
                    case '`reexposeItem_id`':
                        $stmt->bindValue($identifier, $this->reexposeitem_id, PDO::PARAM_INT);
                        break;
                    case '`note`':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
                        break;
                    case '`tariff_id`':
                        $stmt->bindValue($identifier, $this->tariff_id, PDO::PARAM_INT);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
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


            if (($retval = AccountItemPeer::doValidate($this, $columns)) !== true) {
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
        $pos = AccountItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDeleted();
                break;
            case 2:
                return $this->getMasterId();
                break;
            case 3:
                return $this->getServicedate();
                break;
            case 4:
                return $this->getEventId();
                break;
            case 5:
                return $this->getVisitId();
                break;
            case 6:
                return $this->getActionId();
                break;
            case 7:
                return $this->getPrice();
                break;
            case 8:
                return $this->getUnitId();
                break;
            case 9:
                return $this->getAmount();
                break;
            case 10:
                return $this->getUet();
                break;
            case 11:
                return $this->getSum();
                break;
            case 12:
                return $this->getDate();
                break;
            case 13:
                return $this->getNumber();
                break;
            case 14:
                return $this->getRefusetypeId();
                break;
            case 15:
                return $this->getReexposeitemId();
                break;
            case 16:
                return $this->getNote();
                break;
            case 17:
                return $this->getTariffId();
                break;
            case 18:
                return $this->getServiceId();
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
        if (isset($alreadyDumpedObjects['AccountItem'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AccountItem'][$this->getPrimaryKey()] = true;
        $keys = AccountItemPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDeleted(),
            $keys[2] => $this->getMasterId(),
            $keys[3] => $this->getServicedate(),
            $keys[4] => $this->getEventId(),
            $keys[5] => $this->getVisitId(),
            $keys[6] => $this->getActionId(),
            $keys[7] => $this->getPrice(),
            $keys[8] => $this->getUnitId(),
            $keys[9] => $this->getAmount(),
            $keys[10] => $this->getUet(),
            $keys[11] => $this->getSum(),
            $keys[12] => $this->getDate(),
            $keys[13] => $this->getNumber(),
            $keys[14] => $this->getRefusetypeId(),
            $keys[15] => $this->getReexposeitemId(),
            $keys[16] => $this->getNote(),
            $keys[17] => $this->getTariffId(),
            $keys[18] => $this->getServiceId(),
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
        $pos = AccountItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDeleted($value);
                break;
            case 2:
                $this->setMasterId($value);
                break;
            case 3:
                $this->setServicedate($value);
                break;
            case 4:
                $this->setEventId($value);
                break;
            case 5:
                $this->setVisitId($value);
                break;
            case 6:
                $this->setActionId($value);
                break;
            case 7:
                $this->setPrice($value);
                break;
            case 8:
                $this->setUnitId($value);
                break;
            case 9:
                $this->setAmount($value);
                break;
            case 10:
                $this->setUet($value);
                break;
            case 11:
                $this->setSum($value);
                break;
            case 12:
                $this->setDate($value);
                break;
            case 13:
                $this->setNumber($value);
                break;
            case 14:
                $this->setRefusetypeId($value);
                break;
            case 15:
                $this->setReexposeitemId($value);
                break;
            case 16:
                $this->setNote($value);
                break;
            case 17:
                $this->setTariffId($value);
                break;
            case 18:
                $this->setServiceId($value);
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
        $keys = AccountItemPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeleted($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMasterId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setServicedate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setEventId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setVisitId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActionId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPrice($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUnitId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAmount($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setUet($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSum($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setDate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNumber($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setRefusetypeId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setReexposeitemId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNote($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setTariffId($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setServiceId($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AccountItemPeer::DATABASE_NAME);

        if ($this->isColumnModified(AccountItemPeer::ID)) $criteria->add(AccountItemPeer::ID, $this->id);
        if ($this->isColumnModified(AccountItemPeer::DELETED)) $criteria->add(AccountItemPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(AccountItemPeer::MASTER_ID)) $criteria->add(AccountItemPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(AccountItemPeer::SERVICEDATE)) $criteria->add(AccountItemPeer::SERVICEDATE, $this->servicedate);
        if ($this->isColumnModified(AccountItemPeer::EVENT_ID)) $criteria->add(AccountItemPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(AccountItemPeer::VISIT_ID)) $criteria->add(AccountItemPeer::VISIT_ID, $this->visit_id);
        if ($this->isColumnModified(AccountItemPeer::ACTION_ID)) $criteria->add(AccountItemPeer::ACTION_ID, $this->action_id);
        if ($this->isColumnModified(AccountItemPeer::PRICE)) $criteria->add(AccountItemPeer::PRICE, $this->price);
        if ($this->isColumnModified(AccountItemPeer::UNIT_ID)) $criteria->add(AccountItemPeer::UNIT_ID, $this->unit_id);
        if ($this->isColumnModified(AccountItemPeer::AMOUNT)) $criteria->add(AccountItemPeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(AccountItemPeer::UET)) $criteria->add(AccountItemPeer::UET, $this->uet);
        if ($this->isColumnModified(AccountItemPeer::SUM)) $criteria->add(AccountItemPeer::SUM, $this->sum);
        if ($this->isColumnModified(AccountItemPeer::DATE)) $criteria->add(AccountItemPeer::DATE, $this->date);
        if ($this->isColumnModified(AccountItemPeer::NUMBER)) $criteria->add(AccountItemPeer::NUMBER, $this->number);
        if ($this->isColumnModified(AccountItemPeer::REFUSETYPE_ID)) $criteria->add(AccountItemPeer::REFUSETYPE_ID, $this->refusetype_id);
        if ($this->isColumnModified(AccountItemPeer::REEXPOSEITEM_ID)) $criteria->add(AccountItemPeer::REEXPOSEITEM_ID, $this->reexposeitem_id);
        if ($this->isColumnModified(AccountItemPeer::NOTE)) $criteria->add(AccountItemPeer::NOTE, $this->note);
        if ($this->isColumnModified(AccountItemPeer::TARIFF_ID)) $criteria->add(AccountItemPeer::TARIFF_ID, $this->tariff_id);
        if ($this->isColumnModified(AccountItemPeer::SERVICE_ID)) $criteria->add(AccountItemPeer::SERVICE_ID, $this->service_id);

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
        $criteria = new Criteria(AccountItemPeer::DATABASE_NAME);
        $criteria->add(AccountItemPeer::ID, $this->id);

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
     * @param object $copyObj An object of AccountItem (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setServicedate($this->getServicedate());
        $copyObj->setEventId($this->getEventId());
        $copyObj->setVisitId($this->getVisitId());
        $copyObj->setActionId($this->getActionId());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setUet($this->getUet());
        $copyObj->setSum($this->getSum());
        $copyObj->setDate($this->getDate());
        $copyObj->setNumber($this->getNumber());
        $copyObj->setRefusetypeId($this->getRefusetypeId());
        $copyObj->setReexposeitemId($this->getReexposeitemId());
        $copyObj->setNote($this->getNote());
        $copyObj->setTariffId($this->getTariffId());
        $copyObj->setServiceId($this->getServiceId());
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
     * @return AccountItem Clone of current object.
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
     * @return AccountItemPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AccountItemPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->deleted = null;
        $this->master_id = null;
        $this->servicedate = null;
        $this->event_id = null;
        $this->visit_id = null;
        $this->action_id = null;
        $this->price = null;
        $this->unit_id = null;
        $this->amount = null;
        $this->uet = null;
        $this->sum = null;
        $this->date = null;
        $this->number = null;
        $this->refusetype_id = null;
        $this->reexposeitem_id = null;
        $this->note = null;
        $this->tariff_id = null;
        $this->service_id = null;
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
        return (string) $this->exportTo(AccountItemPeer::DEFAULT_STRING_FORMAT);
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
