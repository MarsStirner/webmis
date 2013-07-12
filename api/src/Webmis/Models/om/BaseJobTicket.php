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
use Webmis\Models\JobTicket;
use Webmis\Models\JobTicketPeer;
use Webmis\Models\JobTicketQuery;

/**
 * Base class that represents a row from the 'Job_Ticket' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseJobTicket extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\JobTicketPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JobTicketPeer
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
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the datetime field.
     * @var        string
     */
    protected $datetime;

    /**
     * The value for the restimestamp field.
     * @var        string
     */
    protected $restimestamp;

    /**
     * The value for the resconnectionid field.
     * @var        int
     */
    protected $resconnectionid;

    /**
     * The value for the status field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $status;

    /**
     * The value for the begdatetime field.
     * @var        string
     */
    protected $begdatetime;

    /**
     * The value for the enddatetime field.
     * @var        string
     */
    protected $enddatetime;

    /**
     * The value for the label field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $label;

    /**
     * The value for the note field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $note;

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
        $this->idx = 0;
        $this->status = false;
        $this->label = '';
        $this->note = '';
    }

    /**
     * Initializes internal state of BaseJobTicket object.
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
     * Get the [master_id] column value.
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Get the [idx] column value.
     *
     * @return int
     */
    public function getIdx()
    {
        return $this->idx;
    }

    /**
     * Get the [optionally formatted] temporal [datetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->datetime === null) {
            return null;
        }

        if ($this->datetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->datetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->datetime, true), $x);
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
     * Get the [optionally formatted] temporal [restimestamp] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRestimestamp($format = 'Y-m-d H:i:s')
    {
        if ($this->restimestamp === null) {
            return null;
        }

        if ($this->restimestamp === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->restimestamp);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->restimestamp, true), $x);
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
     * Get the [resconnectionid] column value.
     *
     * @return int
     */
    public function getResconnectionid()
    {
        return $this->resconnectionid;
    }

    /**
     * Get the [status] column value.
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [optionally formatted] temporal [begdatetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBegdatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->begdatetime === null) {
            return null;
        }

        if ($this->begdatetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->begdatetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->begdatetime, true), $x);
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
     * Get the [optionally formatted] temporal [enddatetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnddatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->enddatetime === null) {
            return null;
        }

        if ($this->enddatetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->enddatetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->enddatetime, true), $x);
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
     * Get the [label] column value.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = JobTicketPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = JobTicketPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = JobTicketPeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Sets the value of [datetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JobTicket The current object (for fluent API support)
     */
    public function setDatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datetime !== null || $dt !== null) {
            $currentDateAsString = ($this->datetime !== null && $tmpDt = new DateTime($this->datetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->datetime = $newDateAsString;
                $this->modifiedColumns[] = JobTicketPeer::DATETIME;
            }
        } // if either are not null


        return $this;
    } // setDatetime()

    /**
     * Sets the value of [restimestamp] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JobTicket The current object (for fluent API support)
     */
    public function setRestimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->restimestamp !== null || $dt !== null) {
            $currentDateAsString = ($this->restimestamp !== null && $tmpDt = new DateTime($this->restimestamp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->restimestamp = $newDateAsString;
                $this->modifiedColumns[] = JobTicketPeer::RESTIMESTAMP;
            }
        } // if either are not null


        return $this;
    } // setRestimestamp()

    /**
     * Set the value of [resconnectionid] column.
     *
     * @param int $v new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setResconnectionid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->resconnectionid !== $v) {
            $this->resconnectionid = $v;
            $this->modifiedColumns[] = JobTicketPeer::RESCONNECTIONID;
        }


        return $this;
    } // setResconnectionid()

    /**
     * Sets the value of the [status] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = JobTicketPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Sets the value of [begdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JobTicket The current object (for fluent API support)
     */
    public function setBegdatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->begdatetime !== null && $tmpDt = new DateTime($this->begdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdatetime = $newDateAsString;
                $this->modifiedColumns[] = JobTicketPeer::BEGDATETIME;
            }
        } // if either are not null


        return $this;
    } // setBegdatetime()

    /**
     * Sets the value of [enddatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JobTicket The current object (for fluent API support)
     */
    public function setEnddatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->enddatetime !== null && $tmpDt = new DateTime($this->enddatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddatetime = $newDateAsString;
                $this->modifiedColumns[] = JobTicketPeer::ENDDATETIME;
            }
        } // if either are not null


        return $this;
    } // setEnddatetime()

    /**
     * Set the value of [label] column.
     *
     * @param string $v new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setLabel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->label !== $v) {
            $this->label = $v;
            $this->modifiedColumns[] = JobTicketPeer::LABEL;
        }


        return $this;
    } // setLabel()

    /**
     * Set the value of [note] column.
     *
     * @param string $v new value
     * @return JobTicket The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = JobTicketPeer::NOTE;
        }


        return $this;
    } // setNote()

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
            if ($this->idx !== 0) {
                return false;
            }

            if ($this->status !== false) {
                return false;
            }

            if ($this->label !== '') {
                return false;
            }

            if ($this->note !== '') {
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
            $this->master_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idx = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->datetime = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->restimestamp = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resconnectionid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->status = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->begdatetime = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->enddatetime = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->label = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->note = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = JobTicketPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JobTicket object", $e);
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
            $con = Propel::getConnection(JobTicketPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JobTicketPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(JobTicketPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JobTicketQuery::create()
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
            $con = Propel::getConnection(JobTicketPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JobTicketPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = JobTicketPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . JobTicketPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(JobTicketPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(JobTicketPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(JobTicketPeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(JobTicketPeer::DATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`datetime`';
        }
        if ($this->isColumnModified(JobTicketPeer::RESTIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = '`resTimestamp`';
        }
        if ($this->isColumnModified(JobTicketPeer::RESCONNECTIONID)) {
            $modifiedColumns[':p' . $index++]  = '`resConnectionId`';
        }
        if ($this->isColumnModified(JobTicketPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(JobTicketPeer::BEGDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`begDateTime`';
        }
        if ($this->isColumnModified(JobTicketPeer::ENDDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`endDateTime`';
        }
        if ($this->isColumnModified(JobTicketPeer::LABEL)) {
            $modifiedColumns[':p' . $index++]  = '`label`';
        }
        if ($this->isColumnModified(JobTicketPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`note`';
        }

        $sql = sprintf(
            'INSERT INTO `Job_Ticket` (%s) VALUES (%s)',
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
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`datetime`':
                        $stmt->bindValue($identifier, $this->datetime, PDO::PARAM_STR);
                        break;
                    case '`resTimestamp`':
                        $stmt->bindValue($identifier, $this->restimestamp, PDO::PARAM_STR);
                        break;
                    case '`resConnectionId`':
                        $stmt->bindValue($identifier, $this->resconnectionid, PDO::PARAM_INT);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, (int) $this->status, PDO::PARAM_INT);
                        break;
                    case '`begDateTime`':
                        $stmt->bindValue($identifier, $this->begdatetime, PDO::PARAM_STR);
                        break;
                    case '`endDateTime`':
                        $stmt->bindValue($identifier, $this->enddatetime, PDO::PARAM_STR);
                        break;
                    case '`label`':
                        $stmt->bindValue($identifier, $this->label, PDO::PARAM_STR);
                        break;
                    case '`note`':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
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


            if (($retval = JobTicketPeer::doValidate($this, $columns)) !== true) {
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
        $pos = JobTicketPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMasterId();
                break;
            case 2:
                return $this->getIdx();
                break;
            case 3:
                return $this->getDatetime();
                break;
            case 4:
                return $this->getRestimestamp();
                break;
            case 5:
                return $this->getResconnectionid();
                break;
            case 6:
                return $this->getStatus();
                break;
            case 7:
                return $this->getBegdatetime();
                break;
            case 8:
                return $this->getEnddatetime();
                break;
            case 9:
                return $this->getLabel();
                break;
            case 10:
                return $this->getNote();
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
        if (isset($alreadyDumpedObjects['JobTicket'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JobTicket'][$this->getPrimaryKey()] = true;
        $keys = JobTicketPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMasterId(),
            $keys[2] => $this->getIdx(),
            $keys[3] => $this->getDatetime(),
            $keys[4] => $this->getRestimestamp(),
            $keys[5] => $this->getResconnectionid(),
            $keys[6] => $this->getStatus(),
            $keys[7] => $this->getBegdatetime(),
            $keys[8] => $this->getEnddatetime(),
            $keys[9] => $this->getLabel(),
            $keys[10] => $this->getNote(),
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
        $pos = JobTicketPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMasterId($value);
                break;
            case 2:
                $this->setIdx($value);
                break;
            case 3:
                $this->setDatetime($value);
                break;
            case 4:
                $this->setRestimestamp($value);
                break;
            case 5:
                $this->setResconnectionid($value);
                break;
            case 6:
                $this->setStatus($value);
                break;
            case 7:
                $this->setBegdatetime($value);
                break;
            case 8:
                $this->setEnddatetime($value);
                break;
            case 9:
                $this->setLabel($value);
                break;
            case 10:
                $this->setNote($value);
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
        $keys = JobTicketPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMasterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdx($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRestimestamp($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setResconnectionid($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBegdatetime($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setEnddatetime($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLabel($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNote($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JobTicketPeer::DATABASE_NAME);

        if ($this->isColumnModified(JobTicketPeer::ID)) $criteria->add(JobTicketPeer::ID, $this->id);
        if ($this->isColumnModified(JobTicketPeer::MASTER_ID)) $criteria->add(JobTicketPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(JobTicketPeer::IDX)) $criteria->add(JobTicketPeer::IDX, $this->idx);
        if ($this->isColumnModified(JobTicketPeer::DATETIME)) $criteria->add(JobTicketPeer::DATETIME, $this->datetime);
        if ($this->isColumnModified(JobTicketPeer::RESTIMESTAMP)) $criteria->add(JobTicketPeer::RESTIMESTAMP, $this->restimestamp);
        if ($this->isColumnModified(JobTicketPeer::RESCONNECTIONID)) $criteria->add(JobTicketPeer::RESCONNECTIONID, $this->resconnectionid);
        if ($this->isColumnModified(JobTicketPeer::STATUS)) $criteria->add(JobTicketPeer::STATUS, $this->status);
        if ($this->isColumnModified(JobTicketPeer::BEGDATETIME)) $criteria->add(JobTicketPeer::BEGDATETIME, $this->begdatetime);
        if ($this->isColumnModified(JobTicketPeer::ENDDATETIME)) $criteria->add(JobTicketPeer::ENDDATETIME, $this->enddatetime);
        if ($this->isColumnModified(JobTicketPeer::LABEL)) $criteria->add(JobTicketPeer::LABEL, $this->label);
        if ($this->isColumnModified(JobTicketPeer::NOTE)) $criteria->add(JobTicketPeer::NOTE, $this->note);

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
        $criteria = new Criteria(JobTicketPeer::DATABASE_NAME);
        $criteria->add(JobTicketPeer::ID, $this->id);

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
     * @param object $copyObj An object of JobTicket (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setDatetime($this->getDatetime());
        $copyObj->setRestimestamp($this->getRestimestamp());
        $copyObj->setResconnectionid($this->getResconnectionid());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setBegdatetime($this->getBegdatetime());
        $copyObj->setEnddatetime($this->getEnddatetime());
        $copyObj->setLabel($this->getLabel());
        $copyObj->setNote($this->getNote());
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
     * @return JobTicket Clone of current object.
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
     * @return JobTicketPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JobTicketPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->master_id = null;
        $this->idx = null;
        $this->datetime = null;
        $this->restimestamp = null;
        $this->resconnectionid = null;
        $this->status = null;
        $this->begdatetime = null;
        $this->enddatetime = null;
        $this->label = null;
        $this->note = null;
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
        return (string) $this->exportTo(JobTicketPeer::DEFAULT_STRING_FORMAT);
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
