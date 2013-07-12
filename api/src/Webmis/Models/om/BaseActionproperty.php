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
use Webmis\Models\Actionproperty;
use Webmis\Models\ActionpropertyHospitalbed;
use Webmis\Models\ActionpropertyHospitalbedQuery;
use Webmis\Models\ActionpropertyPeer;
use Webmis\Models\ActionpropertyPerson;
use Webmis\Models\ActionpropertyPersonQuery;
use Webmis\Models\ActionpropertyQuery;

/**
 * Base class that represents a row from the 'ActionProperty' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionproperty extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ActionpropertyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActionpropertyPeer
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
     * The value for the action_id field.
     * @var        int
     */
    protected $action_id;

    /**
     * The value for the type_id field.
     * @var        int
     */
    protected $type_id;

    /**
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

    /**
     * The value for the norm field.
     * @var        string
     */
    protected $norm;

    /**
     * The value for the isassigned field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isassigned;

    /**
     * The value for the evaluation field.
     * @var        boolean
     */
    protected $evaluation;

    /**
     * The value for the version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $version;

    /**
     * @var        PropelObjectCollection|ActionpropertyHospitalbed[] Collection to store aggregation of ActionpropertyHospitalbed objects.
     */
    protected $collActionpropertyHospitalbeds;
    protected $collActionpropertyHospitalbedsPartial;

    /**
     * @var        PropelObjectCollection|ActionpropertyPerson[] Collection to store aggregation of ActionpropertyPerson objects.
     */
    protected $collActionpropertyPersons;
    protected $collActionpropertyPersonsPartial;

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
    protected $actionpropertyHospitalbedsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $actionpropertyPersonsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->isassigned = false;
        $this->version = 0;
    }

    /**
     * Initializes internal state of BaseActionproperty object.
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
     * Get the [action_id] column value.
     *
     * @return int
     */
    public function getActionId()
    {
        return $this->action_id;
    }

    /**
     * Get the [type_id] column value.
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->type_id;
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
     * Get the [norm] column value.
     *
     * @return string
     */
    public function getNorm()
    {
        return $this->norm;
    }

    /**
     * Get the [isassigned] column value.
     *
     * @return boolean
     */
    public function getIsassigned()
    {
        return $this->isassigned;
    }

    /**
     * Get the [evaluation] column value.
     *
     * @return boolean
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ActionpropertyPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ActionpropertyPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::MODIFYPERSON_ID;
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
     * @return Actionproperty The current object (for fluent API support)
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
            $this->modifiedColumns[] = ActionpropertyPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [action_id] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setActionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->action_id !== $v) {
            $this->action_id = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::ACTION_ID;
        }


        return $this;
    } // setActionId()

    /**
     * Set the value of [type_id] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type_id !== $v) {
            $this->type_id = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::TYPE_ID;
        }


        return $this;
    } // setTypeId()

    /**
     * Set the value of [unit_id] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::UNIT_ID;
        }


        return $this;
    } // setUnitId()

    /**
     * Set the value of [norm] column.
     *
     * @param string $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setNorm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->norm !== $v) {
            $this->norm = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::NORM;
        }


        return $this;
    } // setNorm()

    /**
     * Sets the value of the [isassigned] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setIsassigned($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isassigned !== $v) {
            $this->isassigned = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::ISASSIGNED;
        }


        return $this;
    } // setIsassigned()

    /**
     * Sets the value of the [evaluation] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setEvaluation($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->evaluation !== $v) {
            $this->evaluation = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::EVALUATION;
        }


        return $this;
    } // setEvaluation()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ActionpropertyPeer::VERSION;
        }


        return $this;
    } // setVersion()

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

            if ($this->isassigned !== false) {
                return false;
            }

            if ($this->version !== 0) {
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
            $this->action_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->type_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->unit_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->norm = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->isassigned = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->evaluation = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->version = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 13; // 13 = ActionpropertyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Actionproperty object", $e);
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
            $con = Propel::getConnection(ActionpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActionpropertyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collActionpropertyHospitalbeds = null;

            $this->collActionpropertyPersons = null;

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
            $con = Propel::getConnection(ActionpropertyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActionpropertyQuery::create()
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
            $con = Propel::getConnection(ActionpropertyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ActionpropertyPeer::addInstanceToPool($this);
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

            if ($this->actionpropertyHospitalbedsScheduledForDeletion !== null) {
                if (!$this->actionpropertyHospitalbedsScheduledForDeletion->isEmpty()) {
                    ActionpropertyHospitalbedQuery::create()
                        ->filterByPrimaryKeys($this->actionpropertyHospitalbedsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actionpropertyHospitalbedsScheduledForDeletion = null;
                }
            }

            if ($this->collActionpropertyHospitalbeds !== null) {
                foreach ($this->collActionpropertyHospitalbeds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->actionpropertyPersonsScheduledForDeletion !== null) {
                if (!$this->actionpropertyPersonsScheduledForDeletion->isEmpty()) {
                    ActionpropertyPersonQuery::create()
                        ->filterByPrimaryKeys($this->actionpropertyPersonsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actionpropertyPersonsScheduledForDeletion = null;
                }
            }

            if ($this->collActionpropertyPersons !== null) {
                foreach ($this->collActionpropertyPersons as $referrerFK) {
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

        $this->modifiedColumns[] = ActionpropertyPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActionpropertyPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActionpropertyPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::ACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`action_id`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`type_id`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`unit_id`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::NORM)) {
            $modifiedColumns[':p' . $index++]  = '`norm`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::ISASSIGNED)) {
            $modifiedColumns[':p' . $index++]  = '`isAssigned`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::EVALUATION)) {
            $modifiedColumns[':p' . $index++]  = '`evaluation`';
        }
        if ($this->isColumnModified(ActionpropertyPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }

        $sql = sprintf(
            'INSERT INTO `ActionProperty` (%s) VALUES (%s)',
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
                    case '`action_id`':
                        $stmt->bindValue($identifier, $this->action_id, PDO::PARAM_INT);
                        break;
                    case '`type_id`':
                        $stmt->bindValue($identifier, $this->type_id, PDO::PARAM_INT);
                        break;
                    case '`unit_id`':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case '`norm`':
                        $stmt->bindValue($identifier, $this->norm, PDO::PARAM_STR);
                        break;
                    case '`isAssigned`':
                        $stmt->bindValue($identifier, (int) $this->isassigned, PDO::PARAM_INT);
                        break;
                    case '`evaluation`':
                        $stmt->bindValue($identifier, (int) $this->evaluation, PDO::PARAM_INT);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
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


            if (($retval = ActionpropertyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActionpropertyHospitalbeds !== null) {
                    foreach ($this->collActionpropertyHospitalbeds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActionpropertyPersons !== null) {
                    foreach ($this->collActionpropertyPersons as $referrerFK) {
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
        $pos = ActionpropertyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getActionId();
                break;
            case 7:
                return $this->getTypeId();
                break;
            case 8:
                return $this->getUnitId();
                break;
            case 9:
                return $this->getNorm();
                break;
            case 10:
                return $this->getIsassigned();
                break;
            case 11:
                return $this->getEvaluation();
                break;
            case 12:
                return $this->getVersion();
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
        if (isset($alreadyDumpedObjects['Actionproperty'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Actionproperty'][$this->getPrimaryKey()] = true;
        $keys = ActionpropertyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getActionId(),
            $keys[7] => $this->getTypeId(),
            $keys[8] => $this->getUnitId(),
            $keys[9] => $this->getNorm(),
            $keys[10] => $this->getIsassigned(),
            $keys[11] => $this->getEvaluation(),
            $keys[12] => $this->getVersion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collActionpropertyHospitalbeds) {
                $result['ActionpropertyHospitalbeds'] = $this->collActionpropertyHospitalbeds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActionpropertyPersons) {
                $result['ActionpropertyPersons'] = $this->collActionpropertyPersons->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ActionpropertyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setActionId($value);
                break;
            case 7:
                $this->setTypeId($value);
                break;
            case 8:
                $this->setUnitId($value);
                break;
            case 9:
                $this->setNorm($value);
                break;
            case 10:
                $this->setIsassigned($value);
                break;
            case 11:
                $this->setEvaluation($value);
                break;
            case 12:
                $this->setVersion($value);
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
        $keys = ActionpropertyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActionId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTypeId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUnitId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNorm($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIsassigned($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setEvaluation($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setVersion($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActionpropertyPeer::DATABASE_NAME);

        if ($this->isColumnModified(ActionpropertyPeer::ID)) $criteria->add(ActionpropertyPeer::ID, $this->id);
        if ($this->isColumnModified(ActionpropertyPeer::CREATEDATETIME)) $criteria->add(ActionpropertyPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ActionpropertyPeer::CREATEPERSON_ID)) $criteria->add(ActionpropertyPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ActionpropertyPeer::MODIFYDATETIME)) $criteria->add(ActionpropertyPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ActionpropertyPeer::MODIFYPERSON_ID)) $criteria->add(ActionpropertyPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ActionpropertyPeer::DELETED)) $criteria->add(ActionpropertyPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ActionpropertyPeer::ACTION_ID)) $criteria->add(ActionpropertyPeer::ACTION_ID, $this->action_id);
        if ($this->isColumnModified(ActionpropertyPeer::TYPE_ID)) $criteria->add(ActionpropertyPeer::TYPE_ID, $this->type_id);
        if ($this->isColumnModified(ActionpropertyPeer::UNIT_ID)) $criteria->add(ActionpropertyPeer::UNIT_ID, $this->unit_id);
        if ($this->isColumnModified(ActionpropertyPeer::NORM)) $criteria->add(ActionpropertyPeer::NORM, $this->norm);
        if ($this->isColumnModified(ActionpropertyPeer::ISASSIGNED)) $criteria->add(ActionpropertyPeer::ISASSIGNED, $this->isassigned);
        if ($this->isColumnModified(ActionpropertyPeer::EVALUATION)) $criteria->add(ActionpropertyPeer::EVALUATION, $this->evaluation);
        if ($this->isColumnModified(ActionpropertyPeer::VERSION)) $criteria->add(ActionpropertyPeer::VERSION, $this->version);

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
        $criteria = new Criteria(ActionpropertyPeer::DATABASE_NAME);
        $criteria->add(ActionpropertyPeer::ID, $this->id);

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
     * @param object $copyObj An object of Actionproperty (or compatible) type.
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
        $copyObj->setActionId($this->getActionId());
        $copyObj->setTypeId($this->getTypeId());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setNorm($this->getNorm());
        $copyObj->setIsassigned($this->getIsassigned());
        $copyObj->setEvaluation($this->getEvaluation());
        $copyObj->setVersion($this->getVersion());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActionpropertyHospitalbeds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionpropertyHospitalbed($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActionpropertyPersons() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionpropertyPerson($relObj->copy($deepCopy));
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
     * @return Actionproperty Clone of current object.
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
     * @return ActionpropertyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActionpropertyPeer();
        }

        return self::$peer;
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
        if ('ActionpropertyHospitalbed' == $relationName) {
            $this->initActionpropertyHospitalbeds();
        }
        if ('ActionpropertyPerson' == $relationName) {
            $this->initActionpropertyPersons();
        }
    }

    /**
     * Clears out the collActionpropertyHospitalbeds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actionproperty The current object (for fluent API support)
     * @see        addActionpropertyHospitalbeds()
     */
    public function clearActionpropertyHospitalbeds()
    {
        $this->collActionpropertyHospitalbeds = null; // important to set this to null since that means it is uninitialized
        $this->collActionpropertyHospitalbedsPartial = null;

        return $this;
    }

    /**
     * reset is the collActionpropertyHospitalbeds collection loaded partially
     *
     * @return void
     */
    public function resetPartialActionpropertyHospitalbeds($v = true)
    {
        $this->collActionpropertyHospitalbedsPartial = $v;
    }

    /**
     * Initializes the collActionpropertyHospitalbeds collection.
     *
     * By default this just sets the collActionpropertyHospitalbeds collection to an empty array (like clearcollActionpropertyHospitalbeds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActionpropertyHospitalbeds($overrideExisting = true)
    {
        if (null !== $this->collActionpropertyHospitalbeds && !$overrideExisting) {
            return;
        }
        $this->collActionpropertyHospitalbeds = new PropelObjectCollection();
        $this->collActionpropertyHospitalbeds->setModel('ActionpropertyHospitalbed');
    }

    /**
     * Gets an array of ActionpropertyHospitalbed objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actionproperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActionpropertyHospitalbed[] List of ActionpropertyHospitalbed objects
     * @throws PropelException
     */
    public function getActionpropertyHospitalbeds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyHospitalbedsPartial && !$this->isNew();
        if (null === $this->collActionpropertyHospitalbeds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyHospitalbeds) {
                // return empty collection
                $this->initActionpropertyHospitalbeds();
            } else {
                $collActionpropertyHospitalbeds = ActionpropertyHospitalbedQuery::create(null, $criteria)
                    ->filterByActionproperty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionpropertyHospitalbedsPartial && count($collActionpropertyHospitalbeds)) {
                      $this->initActionpropertyHospitalbeds(false);

                      foreach($collActionpropertyHospitalbeds as $obj) {
                        if (false == $this->collActionpropertyHospitalbeds->contains($obj)) {
                          $this->collActionpropertyHospitalbeds->append($obj);
                        }
                      }

                      $this->collActionpropertyHospitalbedsPartial = true;
                    }

                    $collActionpropertyHospitalbeds->getInternalIterator()->rewind();
                    return $collActionpropertyHospitalbeds;
                }

                if($partial && $this->collActionpropertyHospitalbeds) {
                    foreach($this->collActionpropertyHospitalbeds as $obj) {
                        if($obj->isNew()) {
                            $collActionpropertyHospitalbeds[] = $obj;
                        }
                    }
                }

                $this->collActionpropertyHospitalbeds = $collActionpropertyHospitalbeds;
                $this->collActionpropertyHospitalbedsPartial = false;
            }
        }

        return $this->collActionpropertyHospitalbeds;
    }

    /**
     * Sets a collection of ActionpropertyHospitalbed objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actionpropertyHospitalbeds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setActionpropertyHospitalbeds(PropelCollection $actionpropertyHospitalbeds, PropelPDO $con = null)
    {
        $actionpropertyHospitalbedsToDelete = $this->getActionpropertyHospitalbeds(new Criteria(), $con)->diff($actionpropertyHospitalbeds);

        $this->actionpropertyHospitalbedsScheduledForDeletion = unserialize(serialize($actionpropertyHospitalbedsToDelete));

        foreach ($actionpropertyHospitalbedsToDelete as $actionpropertyHospitalbedRemoved) {
            $actionpropertyHospitalbedRemoved->setActionproperty(null);
        }

        $this->collActionpropertyHospitalbeds = null;
        foreach ($actionpropertyHospitalbeds as $actionpropertyHospitalbed) {
            $this->addActionpropertyHospitalbed($actionpropertyHospitalbed);
        }

        $this->collActionpropertyHospitalbeds = $actionpropertyHospitalbeds;
        $this->collActionpropertyHospitalbedsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActionpropertyHospitalbed objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActionpropertyHospitalbed objects.
     * @throws PropelException
     */
    public function countActionpropertyHospitalbeds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyHospitalbedsPartial && !$this->isNew();
        if (null === $this->collActionpropertyHospitalbeds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyHospitalbeds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActionpropertyHospitalbeds());
            }
            $query = ActionpropertyHospitalbedQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActionproperty($this)
                ->count($con);
        }

        return count($this->collActionpropertyHospitalbeds);
    }

    /**
     * Method called to associate a ActionpropertyHospitalbed object to this object
     * through the ActionpropertyHospitalbed foreign key attribute.
     *
     * @param    ActionpropertyHospitalbed $l ActionpropertyHospitalbed
     * @return Actionproperty The current object (for fluent API support)
     */
    public function addActionpropertyHospitalbed(ActionpropertyHospitalbed $l)
    {
        if ($this->collActionpropertyHospitalbeds === null) {
            $this->initActionpropertyHospitalbeds();
            $this->collActionpropertyHospitalbedsPartial = true;
        }
        if (!in_array($l, $this->collActionpropertyHospitalbeds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActionpropertyHospitalbed($l);
        }

        return $this;
    }

    /**
     * @param	ActionpropertyHospitalbed $actionpropertyHospitalbed The actionpropertyHospitalbed object to add.
     */
    protected function doAddActionpropertyHospitalbed($actionpropertyHospitalbed)
    {
        $this->collActionpropertyHospitalbeds[]= $actionpropertyHospitalbed;
        $actionpropertyHospitalbed->setActionproperty($this);
    }

    /**
     * @param	ActionpropertyHospitalbed $actionpropertyHospitalbed The actionpropertyHospitalbed object to remove.
     * @return Actionproperty The current object (for fluent API support)
     */
    public function removeActionpropertyHospitalbed($actionpropertyHospitalbed)
    {
        if ($this->getActionpropertyHospitalbeds()->contains($actionpropertyHospitalbed)) {
            $this->collActionpropertyHospitalbeds->remove($this->collActionpropertyHospitalbeds->search($actionpropertyHospitalbed));
            if (null === $this->actionpropertyHospitalbedsScheduledForDeletion) {
                $this->actionpropertyHospitalbedsScheduledForDeletion = clone $this->collActionpropertyHospitalbeds;
                $this->actionpropertyHospitalbedsScheduledForDeletion->clear();
            }
            $this->actionpropertyHospitalbedsScheduledForDeletion[]= clone $actionpropertyHospitalbed;
            $actionpropertyHospitalbed->setActionproperty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actionproperty is new, it will return
     * an empty collection; or if this Actionproperty has previously
     * been saved, it will retrieve related ActionpropertyHospitalbeds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actionproperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActionpropertyHospitalbed[] List of ActionpropertyHospitalbed objects
     */
    public function getActionpropertyHospitalbedsJoinOrgstructureHospitalbed($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionpropertyHospitalbedQuery::create(null, $criteria);
        $query->joinWith('OrgstructureHospitalbed', $join_behavior);

        return $this->getActionpropertyHospitalbeds($query, $con);
    }

    /**
     * Clears out the collActionpropertyPersons collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actionproperty The current object (for fluent API support)
     * @see        addActionpropertyPersons()
     */
    public function clearActionpropertyPersons()
    {
        $this->collActionpropertyPersons = null; // important to set this to null since that means it is uninitialized
        $this->collActionpropertyPersonsPartial = null;

        return $this;
    }

    /**
     * reset is the collActionpropertyPersons collection loaded partially
     *
     * @return void
     */
    public function resetPartialActionpropertyPersons($v = true)
    {
        $this->collActionpropertyPersonsPartial = $v;
    }

    /**
     * Initializes the collActionpropertyPersons collection.
     *
     * By default this just sets the collActionpropertyPersons collection to an empty array (like clearcollActionpropertyPersons());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActionpropertyPersons($overrideExisting = true)
    {
        if (null !== $this->collActionpropertyPersons && !$overrideExisting) {
            return;
        }
        $this->collActionpropertyPersons = new PropelObjectCollection();
        $this->collActionpropertyPersons->setModel('ActionpropertyPerson');
    }

    /**
     * Gets an array of ActionpropertyPerson objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actionproperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActionpropertyPerson[] List of ActionpropertyPerson objects
     * @throws PropelException
     */
    public function getActionpropertyPersons($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyPersonsPartial && !$this->isNew();
        if (null === $this->collActionpropertyPersons || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyPersons) {
                // return empty collection
                $this->initActionpropertyPersons();
            } else {
                $collActionpropertyPersons = ActionpropertyPersonQuery::create(null, $criteria)
                    ->filterByActionproperty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionpropertyPersonsPartial && count($collActionpropertyPersons)) {
                      $this->initActionpropertyPersons(false);

                      foreach($collActionpropertyPersons as $obj) {
                        if (false == $this->collActionpropertyPersons->contains($obj)) {
                          $this->collActionpropertyPersons->append($obj);
                        }
                      }

                      $this->collActionpropertyPersonsPartial = true;
                    }

                    $collActionpropertyPersons->getInternalIterator()->rewind();
                    return $collActionpropertyPersons;
                }

                if($partial && $this->collActionpropertyPersons) {
                    foreach($this->collActionpropertyPersons as $obj) {
                        if($obj->isNew()) {
                            $collActionpropertyPersons[] = $obj;
                        }
                    }
                }

                $this->collActionpropertyPersons = $collActionpropertyPersons;
                $this->collActionpropertyPersonsPartial = false;
            }
        }

        return $this->collActionpropertyPersons;
    }

    /**
     * Sets a collection of ActionpropertyPerson objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actionpropertyPersons A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actionproperty The current object (for fluent API support)
     */
    public function setActionpropertyPersons(PropelCollection $actionpropertyPersons, PropelPDO $con = null)
    {
        $actionpropertyPersonsToDelete = $this->getActionpropertyPersons(new Criteria(), $con)->diff($actionpropertyPersons);

        $this->actionpropertyPersonsScheduledForDeletion = unserialize(serialize($actionpropertyPersonsToDelete));

        foreach ($actionpropertyPersonsToDelete as $actionpropertyPersonRemoved) {
            $actionpropertyPersonRemoved->setActionproperty(null);
        }

        $this->collActionpropertyPersons = null;
        foreach ($actionpropertyPersons as $actionpropertyPerson) {
            $this->addActionpropertyPerson($actionpropertyPerson);
        }

        $this->collActionpropertyPersons = $actionpropertyPersons;
        $this->collActionpropertyPersonsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActionpropertyPerson objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActionpropertyPerson objects.
     * @throws PropelException
     */
    public function countActionpropertyPersons(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyPersonsPartial && !$this->isNew();
        if (null === $this->collActionpropertyPersons || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyPersons) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActionpropertyPersons());
            }
            $query = ActionpropertyPersonQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActionproperty($this)
                ->count($con);
        }

        return count($this->collActionpropertyPersons);
    }

    /**
     * Method called to associate a ActionpropertyPerson object to this object
     * through the ActionpropertyPerson foreign key attribute.
     *
     * @param    ActionpropertyPerson $l ActionpropertyPerson
     * @return Actionproperty The current object (for fluent API support)
     */
    public function addActionpropertyPerson(ActionpropertyPerson $l)
    {
        if ($this->collActionpropertyPersons === null) {
            $this->initActionpropertyPersons();
            $this->collActionpropertyPersonsPartial = true;
        }
        if (!in_array($l, $this->collActionpropertyPersons->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActionpropertyPerson($l);
        }

        return $this;
    }

    /**
     * @param	ActionpropertyPerson $actionpropertyPerson The actionpropertyPerson object to add.
     */
    protected function doAddActionpropertyPerson($actionpropertyPerson)
    {
        $this->collActionpropertyPersons[]= $actionpropertyPerson;
        $actionpropertyPerson->setActionproperty($this);
    }

    /**
     * @param	ActionpropertyPerson $actionpropertyPerson The actionpropertyPerson object to remove.
     * @return Actionproperty The current object (for fluent API support)
     */
    public function removeActionpropertyPerson($actionpropertyPerson)
    {
        if ($this->getActionpropertyPersons()->contains($actionpropertyPerson)) {
            $this->collActionpropertyPersons->remove($this->collActionpropertyPersons->search($actionpropertyPerson));
            if (null === $this->actionpropertyPersonsScheduledForDeletion) {
                $this->actionpropertyPersonsScheduledForDeletion = clone $this->collActionpropertyPersons;
                $this->actionpropertyPersonsScheduledForDeletion->clear();
            }
            $this->actionpropertyPersonsScheduledForDeletion[]= clone $actionpropertyPerson;
            $actionpropertyPerson->setActionproperty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actionproperty is new, it will return
     * an empty collection; or if this Actionproperty has previously
     * been saved, it will retrieve related ActionpropertyPersons from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actionproperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActionpropertyPerson[] List of ActionpropertyPerson objects
     */
    public function getActionpropertyPersonsJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionpropertyPersonQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getActionpropertyPersons($query, $con);
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
        $this->action_id = null;
        $this->type_id = null;
        $this->unit_id = null;
        $this->norm = null;
        $this->isassigned = null;
        $this->evaluation = null;
        $this->version = null;
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
            if ($this->collActionpropertyHospitalbeds) {
                foreach ($this->collActionpropertyHospitalbeds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActionpropertyPersons) {
                foreach ($this->collActionpropertyPersons as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActionpropertyHospitalbeds instanceof PropelCollection) {
            $this->collActionpropertyHospitalbeds->clearIterator();
        }
        $this->collActionpropertyHospitalbeds = null;
        if ($this->collActionpropertyPersons instanceof PropelCollection) {
            $this->collActionpropertyPersons->clearIterator();
        }
        $this->collActionpropertyPersons = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActionpropertyPeer::DEFAULT_STRING_FORMAT);
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
