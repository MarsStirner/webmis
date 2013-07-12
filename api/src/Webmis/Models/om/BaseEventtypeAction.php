<?php

namespace Webmis\Models\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\EventtypeAction;
use Webmis\Models\EventtypeActionPeer;
use Webmis\Models\EventtypeActionQuery;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\RbtissuetypeQuery;

/**
 * Base class that represents a row from the 'EventType_Action' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypeAction extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\EventtypeActionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventtypeActionPeer
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
     * The value for the eventtype_id field.
     * @var        int
     */
    protected $eventtype_id;

    /**
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the actiontype_id field.
     * @var        int
     */
    protected $actiontype_id;

    /**
     * The value for the speciality_id field.
     * @var        int
     */
    protected $speciality_id;

    /**
     * The value for the tissuetype_id field.
     * @var        int
     */
    protected $tissuetype_id;

    /**
     * The value for the sex field.
     * @var        int
     */
    protected $sex;

    /**
     * The value for the age field.
     * @var        string
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
     * @var        boolean
     */
    protected $age_eu;

    /**
     * The value for the age_ec field.
     * @var        int
     */
    protected $age_ec;

    /**
     * The value for the selectiongroup field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $selectiongroup;

    /**
     * The value for the actuality field.
     * @var        int
     */
    protected $actuality;

    /**
     * The value for the expose field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $expose;

    /**
     * The value for the payable field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $payable;

    /**
     * The value for the academicdegree_id field.
     * @var        int
     */
    protected $academicdegree_id;

    /**
     * @var        Rbtissuetype
     */
    protected $aRbtissuetype;

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
        $this->selectiongroup = 0;
        $this->expose = true;
        $this->payable = false;
    }

    /**
     * Initializes internal state of BaseEventtypeAction object.
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
     * Get the [eventtype_id] column value.
     *
     * @return int
     */
    public function getEventtypeId()
    {
        return $this->eventtype_id;
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
     * Get the [actiontype_id] column value.
     *
     * @return int
     */
    public function getActiontypeId()
    {
        return $this->actiontype_id;
    }

    /**
     * Get the [speciality_id] column value.
     *
     * @return int
     */
    public function getSpecialityId()
    {
        return $this->speciality_id;
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
     * Get the [sex] column value.
     *
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Get the [age] column value.
     *
     * @return string
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
     * @return boolean
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
     * Get the [selectiongroup] column value.
     *
     * @return int
     */
    public function getSelectiongroup()
    {
        return $this->selectiongroup;
    }

    /**
     * Get the [actuality] column value.
     *
     * @return int
     */
    public function getActuality()
    {
        return $this->actuality;
    }

    /**
     * Get the [expose] column value.
     *
     * @return boolean
     */
    public function getExpose()
    {
        return $this->expose;
    }

    /**
     * Get the [payable] column value.
     *
     * @return boolean
     */
    public function getPayable()
    {
        return $this->payable;
    }

    /**
     * Get the [academicdegree_id] column value.
     *
     * @return int
     */
    public function getAcademicdegreeId()
    {
        return $this->academicdegree_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [eventtype_id] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setEventtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->eventtype_id !== $v) {
            $this->eventtype_id = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::EVENTTYPE_ID;
        }


        return $this;
    } // setEventtypeId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [actiontype_id] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setActiontypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->actiontype_id !== $v) {
            $this->actiontype_id = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::ACTIONTYPE_ID;
        }


        return $this;
    } // setActiontypeId()

    /**
     * Set the value of [speciality_id] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setSpecialityId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speciality_id !== $v) {
            $this->speciality_id = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::SPECIALITY_ID;
        }


        return $this;
    } // setSpecialityId()

    /**
     * Set the value of [tissuetype_id] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setTissuetypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tissuetype_id !== $v) {
            $this->tissuetype_id = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::TISSUETYPE_ID;
        }

        if ($this->aRbtissuetype !== null && $this->aRbtissuetype->getId() !== $v) {
            $this->aRbtissuetype = null;
        }


        return $this;
    } // setTissuetypeId()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Sets the value of the [age_eu] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [selectiongroup] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setSelectiongroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->selectiongroup !== $v) {
            $this->selectiongroup = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::SELECTIONGROUP;
        }


        return $this;
    } // setSelectiongroup()

    /**
     * Set the value of [actuality] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setActuality($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->actuality !== $v) {
            $this->actuality = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::ACTUALITY;
        }


        return $this;
    } // setActuality()

    /**
     * Sets the value of the [expose] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setExpose($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->expose !== $v) {
            $this->expose = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::EXPOSE;
        }


        return $this;
    } // setExpose()

    /**
     * Sets the value of the [payable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setPayable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->payable !== $v) {
            $this->payable = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::PAYABLE;
        }


        return $this;
    } // setPayable()

    /**
     * Set the value of [academicdegree_id] column.
     *
     * @param int $v new value
     * @return EventtypeAction The current object (for fluent API support)
     */
    public function setAcademicdegreeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->academicdegree_id !== $v) {
            $this->academicdegree_id = $v;
            $this->modifiedColumns[] = EventtypeActionPeer::ACADEMICDEGREE_ID;
        }


        return $this;
    } // setAcademicdegreeId()

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

            if ($this->selectiongroup !== 0) {
                return false;
            }

            if ($this->expose !== true) {
                return false;
            }

            if ($this->payable !== false) {
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
            $this->eventtype_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idx = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->actiontype_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->speciality_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->tissuetype_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->sex = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->age = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->age_bu = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->age_bc = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->age_eu = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->age_ec = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->selectiongroup = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->actuality = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->expose = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
            $this->payable = ($row[$startcol + 15] !== null) ? (boolean) $row[$startcol + 15] : null;
            $this->academicdegree_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 17; // 17 = EventtypeActionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EventtypeAction object", $e);
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

        if ($this->aRbtissuetype !== null && $this->tissuetype_id !== $this->aRbtissuetype->getId()) {
            $this->aRbtissuetype = null;
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
            $con = Propel::getConnection(EventtypeActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventtypeActionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbtissuetype = null;
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
            $con = Propel::getConnection(EventtypeActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventtypeActionQuery::create()
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
            $con = Propel::getConnection(EventtypeActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EventtypeActionPeer::addInstanceToPool($this);
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

            if ($this->aRbtissuetype !== null) {
                if ($this->aRbtissuetype->isModified() || $this->aRbtissuetype->isNew()) {
                    $affectedRows += $this->aRbtissuetype->save($con);
                }
                $this->setRbtissuetype($this->aRbtissuetype);
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

        $this->modifiedColumns[] = EventtypeActionPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventtypeActionPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventtypeActionPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::EVENTTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`eventType_id`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::ACTIONTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`actionType_id`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::SPECIALITY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`speciality_id`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::TISSUETYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tissueType_id`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::SELECTIONGROUP)) {
            $modifiedColumns[':p' . $index++]  = '`selectionGroup`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::ACTUALITY)) {
            $modifiedColumns[':p' . $index++]  = '`actuality`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::EXPOSE)) {
            $modifiedColumns[':p' . $index++]  = '`expose`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::PAYABLE)) {
            $modifiedColumns[':p' . $index++]  = '`payable`';
        }
        if ($this->isColumnModified(EventtypeActionPeer::ACADEMICDEGREE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`academicDegree_id`';
        }

        $sql = sprintf(
            'INSERT INTO `EventType_Action` (%s) VALUES (%s)',
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
                    case '`eventType_id`':
                        $stmt->bindValue($identifier, $this->eventtype_id, PDO::PARAM_INT);
                        break;
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`actionType_id`':
                        $stmt->bindValue($identifier, $this->actiontype_id, PDO::PARAM_INT);
                        break;
                    case '`speciality_id`':
                        $stmt->bindValue($identifier, $this->speciality_id, PDO::PARAM_INT);
                        break;
                    case '`tissueType_id`':
                        $stmt->bindValue($identifier, $this->tissuetype_id, PDO::PARAM_INT);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_INT);
                        break;
                    case '`age`':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_STR);
                        break;
                    case '`age_bu`':
                        $stmt->bindValue($identifier, $this->age_bu, PDO::PARAM_INT);
                        break;
                    case '`age_bc`':
                        $stmt->bindValue($identifier, $this->age_bc, PDO::PARAM_INT);
                        break;
                    case '`age_eu`':
                        $stmt->bindValue($identifier, (int) $this->age_eu, PDO::PARAM_INT);
                        break;
                    case '`age_ec`':
                        $stmt->bindValue($identifier, $this->age_ec, PDO::PARAM_INT);
                        break;
                    case '`selectionGroup`':
                        $stmt->bindValue($identifier, $this->selectiongroup, PDO::PARAM_INT);
                        break;
                    case '`actuality`':
                        $stmt->bindValue($identifier, $this->actuality, PDO::PARAM_INT);
                        break;
                    case '`expose`':
                        $stmt->bindValue($identifier, (int) $this->expose, PDO::PARAM_INT);
                        break;
                    case '`payable`':
                        $stmt->bindValue($identifier, (int) $this->payable, PDO::PARAM_INT);
                        break;
                    case '`academicDegree_id`':
                        $stmt->bindValue($identifier, $this->academicdegree_id, PDO::PARAM_INT);
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

            if ($this->aRbtissuetype !== null) {
                if (!$this->aRbtissuetype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtissuetype->getValidationFailures());
                }
            }


            if (($retval = EventtypeActionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = EventtypeActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getEventtypeId();
                break;
            case 2:
                return $this->getIdx();
                break;
            case 3:
                return $this->getActiontypeId();
                break;
            case 4:
                return $this->getSpecialityId();
                break;
            case 5:
                return $this->getTissuetypeId();
                break;
            case 6:
                return $this->getSex();
                break;
            case 7:
                return $this->getAge();
                break;
            case 8:
                return $this->getAgeBu();
                break;
            case 9:
                return $this->getAgeBc();
                break;
            case 10:
                return $this->getAgeEu();
                break;
            case 11:
                return $this->getAgeEc();
                break;
            case 12:
                return $this->getSelectiongroup();
                break;
            case 13:
                return $this->getActuality();
                break;
            case 14:
                return $this->getExpose();
                break;
            case 15:
                return $this->getPayable();
                break;
            case 16:
                return $this->getAcademicdegreeId();
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
        if (isset($alreadyDumpedObjects['EventtypeAction'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EventtypeAction'][$this->getPrimaryKey()] = true;
        $keys = EventtypeActionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getEventtypeId(),
            $keys[2] => $this->getIdx(),
            $keys[3] => $this->getActiontypeId(),
            $keys[4] => $this->getSpecialityId(),
            $keys[5] => $this->getTissuetypeId(),
            $keys[6] => $this->getSex(),
            $keys[7] => $this->getAge(),
            $keys[8] => $this->getAgeBu(),
            $keys[9] => $this->getAgeBc(),
            $keys[10] => $this->getAgeEu(),
            $keys[11] => $this->getAgeEc(),
            $keys[12] => $this->getSelectiongroup(),
            $keys[13] => $this->getActuality(),
            $keys[14] => $this->getExpose(),
            $keys[15] => $this->getPayable(),
            $keys[16] => $this->getAcademicdegreeId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbtissuetype) {
                $result['Rbtissuetype'] = $this->aRbtissuetype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = EventtypeActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setEventtypeId($value);
                break;
            case 2:
                $this->setIdx($value);
                break;
            case 3:
                $this->setActiontypeId($value);
                break;
            case 4:
                $this->setSpecialityId($value);
                break;
            case 5:
                $this->setTissuetypeId($value);
                break;
            case 6:
                $this->setSex($value);
                break;
            case 7:
                $this->setAge($value);
                break;
            case 8:
                $this->setAgeBu($value);
                break;
            case 9:
                $this->setAgeBc($value);
                break;
            case 10:
                $this->setAgeEu($value);
                break;
            case 11:
                $this->setAgeEc($value);
                break;
            case 12:
                $this->setSelectiongroup($value);
                break;
            case 13:
                $this->setActuality($value);
                break;
            case 14:
                $this->setExpose($value);
                break;
            case 15:
                $this->setPayable($value);
                break;
            case 16:
                $this->setAcademicdegreeId($value);
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
        $keys = EventtypeActionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEventtypeId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdx($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setActiontypeId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSpecialityId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTissuetypeId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSex($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAge($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAgeBu($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAgeBc($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAgeEu($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAgeEc($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSelectiongroup($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setActuality($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setExpose($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPayable($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAcademicdegreeId($arr[$keys[16]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventtypeActionPeer::DATABASE_NAME);

        if ($this->isColumnModified(EventtypeActionPeer::ID)) $criteria->add(EventtypeActionPeer::ID, $this->id);
        if ($this->isColumnModified(EventtypeActionPeer::EVENTTYPE_ID)) $criteria->add(EventtypeActionPeer::EVENTTYPE_ID, $this->eventtype_id);
        if ($this->isColumnModified(EventtypeActionPeer::IDX)) $criteria->add(EventtypeActionPeer::IDX, $this->idx);
        if ($this->isColumnModified(EventtypeActionPeer::ACTIONTYPE_ID)) $criteria->add(EventtypeActionPeer::ACTIONTYPE_ID, $this->actiontype_id);
        if ($this->isColumnModified(EventtypeActionPeer::SPECIALITY_ID)) $criteria->add(EventtypeActionPeer::SPECIALITY_ID, $this->speciality_id);
        if ($this->isColumnModified(EventtypeActionPeer::TISSUETYPE_ID)) $criteria->add(EventtypeActionPeer::TISSUETYPE_ID, $this->tissuetype_id);
        if ($this->isColumnModified(EventtypeActionPeer::SEX)) $criteria->add(EventtypeActionPeer::SEX, $this->sex);
        if ($this->isColumnModified(EventtypeActionPeer::AGE)) $criteria->add(EventtypeActionPeer::AGE, $this->age);
        if ($this->isColumnModified(EventtypeActionPeer::AGE_BU)) $criteria->add(EventtypeActionPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(EventtypeActionPeer::AGE_BC)) $criteria->add(EventtypeActionPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(EventtypeActionPeer::AGE_EU)) $criteria->add(EventtypeActionPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(EventtypeActionPeer::AGE_EC)) $criteria->add(EventtypeActionPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(EventtypeActionPeer::SELECTIONGROUP)) $criteria->add(EventtypeActionPeer::SELECTIONGROUP, $this->selectiongroup);
        if ($this->isColumnModified(EventtypeActionPeer::ACTUALITY)) $criteria->add(EventtypeActionPeer::ACTUALITY, $this->actuality);
        if ($this->isColumnModified(EventtypeActionPeer::EXPOSE)) $criteria->add(EventtypeActionPeer::EXPOSE, $this->expose);
        if ($this->isColumnModified(EventtypeActionPeer::PAYABLE)) $criteria->add(EventtypeActionPeer::PAYABLE, $this->payable);
        if ($this->isColumnModified(EventtypeActionPeer::ACADEMICDEGREE_ID)) $criteria->add(EventtypeActionPeer::ACADEMICDEGREE_ID, $this->academicdegree_id);

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
        $criteria = new Criteria(EventtypeActionPeer::DATABASE_NAME);
        $criteria->add(EventtypeActionPeer::ID, $this->id);

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
     * @param object $copyObj An object of EventtypeAction (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEventtypeId($this->getEventtypeId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setActiontypeId($this->getActiontypeId());
        $copyObj->setSpecialityId($this->getSpecialityId());
        $copyObj->setTissuetypeId($this->getTissuetypeId());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setSelectiongroup($this->getSelectiongroup());
        $copyObj->setActuality($this->getActuality());
        $copyObj->setExpose($this->getExpose());
        $copyObj->setPayable($this->getPayable());
        $copyObj->setAcademicdegreeId($this->getAcademicdegreeId());

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
     * @return EventtypeAction Clone of current object.
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
     * @return EventtypeActionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventtypeActionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbtissuetype object.
     *
     * @param             Rbtissuetype $v
     * @return EventtypeAction The current object (for fluent API support)
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
            $v->addEventtypeAction($this);
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
                $this->aRbtissuetype->addEventtypeActions($this);
             */
        }

        return $this->aRbtissuetype;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->eventtype_id = null;
        $this->idx = null;
        $this->actiontype_id = null;
        $this->speciality_id = null;
        $this->tissuetype_id = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->selectiongroup = null;
        $this->actuality = null;
        $this->expose = null;
        $this->payable = null;
        $this->academicdegree_id = null;
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
            if ($this->aRbtissuetype instanceof Persistent) {
              $this->aRbtissuetype->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbtissuetype = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EventtypeActionPeer::DEFAULT_STRING_FORMAT);
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
