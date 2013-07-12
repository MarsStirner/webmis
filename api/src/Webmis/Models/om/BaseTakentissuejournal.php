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
use Webmis\Models\Action;
use Webmis\Models\ActionQuery;
use Webmis\Models\Client;
use Webmis\Models\ClientQuery;
use Webmis\Models\Person;
use Webmis\Models\PersonQuery;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\RbtissuetypeQuery;
use Webmis\Models\Rbunit;
use Webmis\Models\RbunitQuery;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\TakentissuejournalPeer;
use Webmis\Models\TakentissuejournalQuery;

/**
 * Base class that represents a row from the 'TakenTissueJournal' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTakentissuejournal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\TakentissuejournalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TakentissuejournalPeer
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
     * The value for the client_id field.
     * @var        int
     */
    protected $client_id;

    /**
     * The value for the tissuetype_id field.
     * @var        int
     */
    protected $tissuetype_id;

    /**
     * The value for the externalid field.
     * @var        string
     */
    protected $externalid;

    /**
     * The value for the amount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $amount;

    /**
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

    /**
     * The value for the datetimetaken field.
     * @var        string
     */
    protected $datetimetaken;

    /**
     * The value for the execperson_id field.
     * @var        int
     */
    protected $execperson_id;

    /**
     * The value for the note field.
     * @var        string
     */
    protected $note;

    /**
     * The value for the barcode field.
     * @var        int
     */
    protected $barcode;

    /**
     * The value for the period field.
     * @var        int
     */
    protected $period;

    /**
     * @var        Client
     */
    protected $aClient;

    /**
     * @var        Rbtissuetype
     */
    protected $aRbtissuetype;

    /**
     * @var        Rbunit
     */
    protected $aRbunit;

    /**
     * @var        Person
     */
    protected $aPerson;

    /**
     * @var        PropelObjectCollection|Action[] Collection to store aggregation of Action objects.
     */
    protected $collActions;
    protected $collActionsPartial;

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
    protected $actionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->amount = 0;
    }

    /**
     * Initializes internal state of BaseTakentissuejournal object.
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
     * Get the [client_id] column value.
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Get the [tissuetype_id] column value.
     *
     * @return int
     */
    public function getTissuetypeId()
    {
        return $this->tissuetype_id;
    }

    /**
     * Get the [externalid] column value.
     *
     * @return string
     */
    public function getExternalid()
    {
        return $this->externalid;
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
     * Get the [unit_id] column value.
     *
     * @return int
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * Get the [optionally formatted] temporal [datetimetaken] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatetimetaken($format = 'Y-m-d H:i:s')
    {
        if ($this->datetimetaken === null) {
            return null;
        }

        if ($this->datetimetaken === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->datetimetaken);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->datetimetaken, true), $x);
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
     * Get the [execperson_id] column value.
     *
     * @return int
     */
    public function getExecpersonId()
    {
        return $this->execperson_id;
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
     * Get the [barcode] column value.
     *
     * @return int
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Get the [period] column value.
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setClientId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::CLIENT_ID;
        }

        if ($this->aClient !== null && $this->aClient->getId() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setClientId()

    /**
     * Set the value of [tissuetype_id] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setTissuetypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tissuetype_id !== $v) {
            $this->tissuetype_id = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::TISSUETYPE_ID;
        }

        if ($this->aRbtissuetype !== null && $this->aRbtissuetype->getId() !== $v) {
            $this->aRbtissuetype = null;
        }


        return $this;
    } // setTissuetypeId()

    /**
     * Set the value of [externalid] column.
     *
     * @param string $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setExternalid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->externalid !== $v) {
            $this->externalid = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::EXTERNALID;
        }


        return $this;
    } // setExternalid()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [unit_id] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::UNIT_ID;
        }

        if ($this->aRbunit !== null && $this->aRbunit->getId() !== $v) {
            $this->aRbunit = null;
        }


        return $this;
    } // setUnitId()

    /**
     * Sets the value of [datetimetaken] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setDatetimetaken($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datetimetaken !== null || $dt !== null) {
            $currentDateAsString = ($this->datetimetaken !== null && $tmpDt = new DateTime($this->datetimetaken)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->datetimetaken = $newDateAsString;
                $this->modifiedColumns[] = TakentissuejournalPeer::DATETIMETAKEN;
            }
        } // if either are not null


        return $this;
    } // setDatetimetaken()

    /**
     * Set the value of [execperson_id] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setExecpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->execperson_id !== $v) {
            $this->execperson_id = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::EXECPERSON_ID;
        }

        if ($this->aPerson !== null && $this->aPerson->getId() !== $v) {
            $this->aPerson = null;
        }


        return $this;
    } // setExecpersonId()

    /**
     * Set the value of [note] column.
     *
     * @param string $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::NOTE;
        }


        return $this;
    } // setNote()

    /**
     * Set the value of [barcode] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setBarcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->barcode !== $v) {
            $this->barcode = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::BARCODE;
        }


        return $this;
    } // setBarcode()

    /**
     * Set the value of [period] column.
     *
     * @param int $v new value
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setPeriod($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->period !== $v) {
            $this->period = $v;
            $this->modifiedColumns[] = TakentissuejournalPeer::PERIOD;
        }


        return $this;
    } // setPeriod()

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
            if ($this->amount !== 0) {
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
            $this->client_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->tissuetype_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->externalid = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->amount = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->unit_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->datetimetaken = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->execperson_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->note = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->barcode = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->period = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = TakentissuejournalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Takentissuejournal object", $e);
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

        if ($this->aClient !== null && $this->client_id !== $this->aClient->getId()) {
            $this->aClient = null;
        }
        if ($this->aRbtissuetype !== null && $this->tissuetype_id !== $this->aRbtissuetype->getId()) {
            $this->aRbtissuetype = null;
        }
        if ($this->aRbunit !== null && $this->unit_id !== $this->aRbunit->getId()) {
            $this->aRbunit = null;
        }
        if ($this->aPerson !== null && $this->execperson_id !== $this->aPerson->getId()) {
            $this->aPerson = null;
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
            $con = Propel::getConnection(TakentissuejournalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TakentissuejournalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
            $this->aRbtissuetype = null;
            $this->aRbunit = null;
            $this->aPerson = null;
            $this->collActions = null;

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
            $con = Propel::getConnection(TakentissuejournalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TakentissuejournalQuery::create()
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
            $con = Propel::getConnection(TakentissuejournalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TakentissuejournalPeer::addInstanceToPool($this);
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

            if ($this->aClient !== null) {
                if ($this->aClient->isModified() || $this->aClient->isNew()) {
                    $affectedRows += $this->aClient->save($con);
                }
                $this->setClient($this->aClient);
            }

            if ($this->aRbtissuetype !== null) {
                if ($this->aRbtissuetype->isModified() || $this->aRbtissuetype->isNew()) {
                    $affectedRows += $this->aRbtissuetype->save($con);
                }
                $this->setRbtissuetype($this->aRbtissuetype);
            }

            if ($this->aRbunit !== null) {
                if ($this->aRbunit->isModified() || $this->aRbunit->isNew()) {
                    $affectedRows += $this->aRbunit->save($con);
                }
                $this->setRbunit($this->aRbunit);
            }

            if ($this->aPerson !== null) {
                if ($this->aPerson->isModified() || $this->aPerson->isNew()) {
                    $affectedRows += $this->aPerson->save($con);
                }
                $this->setPerson($this->aPerson);
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

            if ($this->actionsScheduledForDeletion !== null) {
                if (!$this->actionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->actionsScheduledForDeletion as $action) {
                        // need to save related object because we set the relation to null
                        $action->save($con);
                    }
                    $this->actionsScheduledForDeletion = null;
                }
            }

            if ($this->collActions !== null) {
                foreach ($this->collActions as $referrerFK) {
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

        $this->modifiedColumns[] = TakentissuejournalPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TakentissuejournalPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TakentissuejournalPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`client_id`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::TISSUETYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tissueType_id`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::EXTERNALID)) {
            $modifiedColumns[':p' . $index++]  = '`externalId`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`unit_id`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::DATETIMETAKEN)) {
            $modifiedColumns[':p' . $index++]  = '`datetimeTaken`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::EXECPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`execPerson_id`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`note`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::BARCODE)) {
            $modifiedColumns[':p' . $index++]  = '`barcode`';
        }
        if ($this->isColumnModified(TakentissuejournalPeer::PERIOD)) {
            $modifiedColumns[':p' . $index++]  = '`period`';
        }

        $sql = sprintf(
            'INSERT INTO `TakenTissueJournal` (%s) VALUES (%s)',
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
                    case '`client_id`':
                        $stmt->bindValue($identifier, $this->client_id, PDO::PARAM_INT);
                        break;
                    case '`tissueType_id`':
                        $stmt->bindValue($identifier, $this->tissuetype_id, PDO::PARAM_INT);
                        break;
                    case '`externalId`':
                        $stmt->bindValue($identifier, $this->externalid, PDO::PARAM_STR);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case '`unit_id`':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case '`datetimeTaken`':
                        $stmt->bindValue($identifier, $this->datetimetaken, PDO::PARAM_STR);
                        break;
                    case '`execPerson_id`':
                        $stmt->bindValue($identifier, $this->execperson_id, PDO::PARAM_INT);
                        break;
                    case '`note`':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
                        break;
                    case '`barcode`':
                        $stmt->bindValue($identifier, $this->barcode, PDO::PARAM_INT);
                        break;
                    case '`period`':
                        $stmt->bindValue($identifier, $this->period, PDO::PARAM_INT);
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

            if ($this->aClient !== null) {
                if (!$this->aClient->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
                }
            }

            if ($this->aRbtissuetype !== null) {
                if (!$this->aRbtissuetype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtissuetype->getValidationFailures());
                }
            }

            if ($this->aRbunit !== null) {
                if (!$this->aRbunit->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbunit->getValidationFailures());
                }
            }

            if ($this->aPerson !== null) {
                if (!$this->aPerson->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPerson->getValidationFailures());
                }
            }


            if (($retval = TakentissuejournalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActions !== null) {
                    foreach ($this->collActions as $referrerFK) {
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
        $pos = TakentissuejournalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getClientId();
                break;
            case 2:
                return $this->getTissuetypeId();
                break;
            case 3:
                return $this->getExternalid();
                break;
            case 4:
                return $this->getAmount();
                break;
            case 5:
                return $this->getUnitId();
                break;
            case 6:
                return $this->getDatetimetaken();
                break;
            case 7:
                return $this->getExecpersonId();
                break;
            case 8:
                return $this->getNote();
                break;
            case 9:
                return $this->getBarcode();
                break;
            case 10:
                return $this->getPeriod();
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
        if (isset($alreadyDumpedObjects['Takentissuejournal'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Takentissuejournal'][$this->getPrimaryKey()] = true;
        $keys = TakentissuejournalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClientId(),
            $keys[2] => $this->getTissuetypeId(),
            $keys[3] => $this->getExternalid(),
            $keys[4] => $this->getAmount(),
            $keys[5] => $this->getUnitId(),
            $keys[6] => $this->getDatetimetaken(),
            $keys[7] => $this->getExecpersonId(),
            $keys[8] => $this->getNote(),
            $keys[9] => $this->getBarcode(),
            $keys[10] => $this->getPeriod(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtissuetype) {
                $result['Rbtissuetype'] = $this->aRbtissuetype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbunit) {
                $result['Rbunit'] = $this->aRbunit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPerson) {
                $result['Person'] = $this->aPerson->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActions) {
                $result['Actions'] = $this->collActions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TakentissuejournalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setClientId($value);
                break;
            case 2:
                $this->setTissuetypeId($value);
                break;
            case 3:
                $this->setExternalid($value);
                break;
            case 4:
                $this->setAmount($value);
                break;
            case 5:
                $this->setUnitId($value);
                break;
            case 6:
                $this->setDatetimetaken($value);
                break;
            case 7:
                $this->setExecpersonId($value);
                break;
            case 8:
                $this->setNote($value);
                break;
            case 9:
                $this->setBarcode($value);
                break;
            case 10:
                $this->setPeriod($value);
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
        $keys = TakentissuejournalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setClientId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTissuetypeId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setExternalid($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAmount($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUnitId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDatetimetaken($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setExecpersonId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setNote($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setBarcode($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setPeriod($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TakentissuejournalPeer::DATABASE_NAME);

        if ($this->isColumnModified(TakentissuejournalPeer::ID)) $criteria->add(TakentissuejournalPeer::ID, $this->id);
        if ($this->isColumnModified(TakentissuejournalPeer::CLIENT_ID)) $criteria->add(TakentissuejournalPeer::CLIENT_ID, $this->client_id);
        if ($this->isColumnModified(TakentissuejournalPeer::TISSUETYPE_ID)) $criteria->add(TakentissuejournalPeer::TISSUETYPE_ID, $this->tissuetype_id);
        if ($this->isColumnModified(TakentissuejournalPeer::EXTERNALID)) $criteria->add(TakentissuejournalPeer::EXTERNALID, $this->externalid);
        if ($this->isColumnModified(TakentissuejournalPeer::AMOUNT)) $criteria->add(TakentissuejournalPeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(TakentissuejournalPeer::UNIT_ID)) $criteria->add(TakentissuejournalPeer::UNIT_ID, $this->unit_id);
        if ($this->isColumnModified(TakentissuejournalPeer::DATETIMETAKEN)) $criteria->add(TakentissuejournalPeer::DATETIMETAKEN, $this->datetimetaken);
        if ($this->isColumnModified(TakentissuejournalPeer::EXECPERSON_ID)) $criteria->add(TakentissuejournalPeer::EXECPERSON_ID, $this->execperson_id);
        if ($this->isColumnModified(TakentissuejournalPeer::NOTE)) $criteria->add(TakentissuejournalPeer::NOTE, $this->note);
        if ($this->isColumnModified(TakentissuejournalPeer::BARCODE)) $criteria->add(TakentissuejournalPeer::BARCODE, $this->barcode);
        if ($this->isColumnModified(TakentissuejournalPeer::PERIOD)) $criteria->add(TakentissuejournalPeer::PERIOD, $this->period);

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
        $criteria = new Criteria(TakentissuejournalPeer::DATABASE_NAME);
        $criteria->add(TakentissuejournalPeer::ID, $this->id);

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
     * @param object $copyObj An object of Takentissuejournal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClientId($this->getClientId());
        $copyObj->setTissuetypeId($this->getTissuetypeId());
        $copyObj->setExternalid($this->getExternalid());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setDatetimetaken($this->getDatetimetaken());
        $copyObj->setExecpersonId($this->getExecpersonId());
        $copyObj->setNote($this->getNote());
        $copyObj->setBarcode($this->getBarcode());
        $copyObj->setPeriod($this->getPeriod());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAction($relObj->copy($deepCopy));
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
     * @return Takentissuejournal Clone of current object.
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
     * @return TakentissuejournalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TakentissuejournalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param             Client $v
     * @return Takentissuejournal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClient(Client $v = null)
    {
        if ($v === null) {
            $this->setClientId(NULL);
        } else {
            $this->setClientId($v->getId());
        }

        $this->aClient = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Client object, it will not be re-added.
        if ($v !== null) {
            $v->addTakentissuejournal($this);
        }


        return $this;
    }


    /**
     * Get the associated Client object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Client The associated Client object.
     * @throws PropelException
     */
    public function getClient(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClient === null && ($this->client_id !== null) && $doQuery) {
            $this->aClient = ClientQuery::create()->findPk($this->client_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClient->addTakentissuejournals($this);
             */
        }

        return $this->aClient;
    }

    /**
     * Declares an association between this object and a Rbtissuetype object.
     *
     * @param             Rbtissuetype $v
     * @return Takentissuejournal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbtissuetype(Rbtissuetype $v = null)
    {
        if ($v === null) {
            $this->setTissuetypeId(NULL);
        } else {
            $this->setTissuetypeId($v->getId());
        }

        $this->aRbtissuetype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbtissuetype object, it will not be re-added.
        if ($v !== null) {
            $v->addTakentissuejournal($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbtissuetype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbtissuetype The associated Rbtissuetype object.
     * @throws PropelException
     */
    public function getRbtissuetype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbtissuetype === null && ($this->tissuetype_id !== null) && $doQuery) {
            $this->aRbtissuetype = RbtissuetypeQuery::create()->findPk($this->tissuetype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbtissuetype->addTakentissuejournals($this);
             */
        }

        return $this->aRbtissuetype;
    }

    /**
     * Declares an association between this object and a Rbunit object.
     *
     * @param             Rbunit $v
     * @return Takentissuejournal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbunit(Rbunit $v = null)
    {
        if ($v === null) {
            $this->setUnitId(NULL);
        } else {
            $this->setUnitId($v->getId());
        }

        $this->aRbunit = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbunit object, it will not be re-added.
        if ($v !== null) {
            $v->addTakentissuejournal($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbunit object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbunit The associated Rbunit object.
     * @throws PropelException
     */
    public function getRbunit(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbunit === null && ($this->unit_id !== null) && $doQuery) {
            $this->aRbunit = RbunitQuery::create()->findPk($this->unit_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbunit->addTakentissuejournals($this);
             */
        }

        return $this->aRbunit;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Takentissuejournal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPerson(Person $v = null)
    {
        if ($v === null) {
            $this->setExecpersonId(NULL);
        } else {
            $this->setExecpersonId($v->getId());
        }

        $this->aPerson = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addTakentissuejournal($this);
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
    public function getPerson(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPerson === null && ($this->execperson_id !== null) && $doQuery) {
            $this->aPerson = PersonQuery::create()->findPk($this->execperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPerson->addTakentissuejournals($this);
             */
        }

        return $this->aPerson;
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
        if ('Action' == $relationName) {
            $this->initActions();
        }
    }

    /**
     * Clears out the collActions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Takentissuejournal The current object (for fluent API support)
     * @see        addActions()
     */
    public function clearActions()
    {
        $this->collActions = null; // important to set this to null since that means it is uninitialized
        $this->collActionsPartial = null;

        return $this;
    }

    /**
     * reset is the collActions collection loaded partially
     *
     * @return void
     */
    public function resetPartialActions($v = true)
    {
        $this->collActionsPartial = $v;
    }

    /**
     * Initializes the collActions collection.
     *
     * By default this just sets the collActions collection to an empty array (like clearcollActions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActions($overrideExisting = true)
    {
        if (null !== $this->collActions && !$overrideExisting) {
            return;
        }
        $this->collActions = new PropelObjectCollection();
        $this->collActions->setModel('Action');
    }

    /**
     * Gets an array of Action objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Takentissuejournal is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Action[] List of Action objects
     * @throws PropelException
     */
    public function getActions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionsPartial && !$this->isNew();
        if (null === $this->collActions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActions) {
                // return empty collection
                $this->initActions();
            } else {
                $collActions = ActionQuery::create(null, $criteria)
                    ->filterByTakentissuejournal($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionsPartial && count($collActions)) {
                      $this->initActions(false);

                      foreach($collActions as $obj) {
                        if (false == $this->collActions->contains($obj)) {
                          $this->collActions->append($obj);
                        }
                      }

                      $this->collActionsPartial = true;
                    }

                    $collActions->getInternalIterator()->rewind();
                    return $collActions;
                }

                if($partial && $this->collActions) {
                    foreach($this->collActions as $obj) {
                        if($obj->isNew()) {
                            $collActions[] = $obj;
                        }
                    }
                }

                $this->collActions = $collActions;
                $this->collActionsPartial = false;
            }
        }

        return $this->collActions;
    }

    /**
     * Sets a collection of Action objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function setActions(PropelCollection $actions, PropelPDO $con = null)
    {
        $actionsToDelete = $this->getActions(new Criteria(), $con)->diff($actions);

        $this->actionsScheduledForDeletion = unserialize(serialize($actionsToDelete));

        foreach ($actionsToDelete as $actionRemoved) {
            $actionRemoved->setTakentissuejournal(null);
        }

        $this->collActions = null;
        foreach ($actions as $action) {
            $this->addAction($action);
        }

        $this->collActions = $actions;
        $this->collActionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Action objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Action objects.
     * @throws PropelException
     */
    public function countActions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionsPartial && !$this->isNew();
        if (null === $this->collActions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActions());
            }
            $query = ActionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTakentissuejournal($this)
                ->count($con);
        }

        return count($this->collActions);
    }

    /**
     * Method called to associate a Action object to this object
     * through the Action foreign key attribute.
     *
     * @param    Action $l Action
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function addAction(Action $l)
    {
        if ($this->collActions === null) {
            $this->initActions();
            $this->collActionsPartial = true;
        }
        if (!in_array($l, $this->collActions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAction($l);
        }

        return $this;
    }

    /**
     * @param	Action $action The action object to add.
     */
    protected function doAddAction($action)
    {
        $this->collActions[]= $action;
        $action->setTakentissuejournal($this);
    }

    /**
     * @param	Action $action The action object to remove.
     * @return Takentissuejournal The current object (for fluent API support)
     */
    public function removeAction($action)
    {
        if ($this->getActions()->contains($action)) {
            $this->collActions->remove($this->collActions->search($action));
            if (null === $this->actionsScheduledForDeletion) {
                $this->actionsScheduledForDeletion = clone $this->collActions;
                $this->actionsScheduledForDeletion->clear();
            }
            $this->actionsScheduledForDeletion[]= $action;
            $action->setTakentissuejournal(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->client_id = null;
        $this->tissuetype_id = null;
        $this->externalid = null;
        $this->amount = null;
        $this->unit_id = null;
        $this->datetimetaken = null;
        $this->execperson_id = null;
        $this->note = null;
        $this->barcode = null;
        $this->period = null;
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
            if ($this->collActions) {
                foreach ($this->collActions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }
            if ($this->aRbtissuetype instanceof Persistent) {
              $this->aRbtissuetype->clearAllReferences($deep);
            }
            if ($this->aRbunit instanceof Persistent) {
              $this->aRbunit->clearAllReferences($deep);
            }
            if ($this->aPerson instanceof Persistent) {
              $this->aPerson->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActions instanceof PropelCollection) {
            $this->collActions->clearIterator();
        }
        $this->collActions = null;
        $this->aClient = null;
        $this->aRbtissuetype = null;
        $this->aRbunit = null;
        $this->aPerson = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TakentissuejournalPeer::DEFAULT_STRING_FORMAT);
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
