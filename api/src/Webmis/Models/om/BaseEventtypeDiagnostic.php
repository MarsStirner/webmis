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
use Webmis\Models\EventtypeDiagnostic;
use Webmis\Models\EventtypeDiagnosticPeer;
use Webmis\Models\EventtypeDiagnosticQuery;

/**
 * Base class that represents a row from the 'EventType_Diagnostic' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypeDiagnostic extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\EventtypeDiagnosticPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventtypeDiagnosticPeer
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
     * The value for the speciality_id field.
     * @var        int
     */
    protected $speciality_id;

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
     * @var        int
     */
    protected $age_eu;

    /**
     * The value for the age_ec field.
     * @var        int
     */
    protected $age_ec;

    /**
     * The value for the defaulthealthgroup_id field.
     * @var        int
     */
    protected $defaulthealthgroup_id;

    /**
     * The value for the defaultmkb field.
     * @var        string
     */
    protected $defaultmkb;

    /**
     * The value for the defaultdispanser_id field.
     * @var        int
     */
    protected $defaultdispanser_id;

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
     * The value for the visittype_id field.
     * @var        int
     */
    protected $visittype_id;

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
    }

    /**
     * Initializes internal state of BaseEventtypeDiagnostic object.
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
     * Get the [speciality_id] column value.
     *
     * @return int
     */
    public function getSpecialityId()
    {
        return $this->speciality_id;
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
     * Get the [defaulthealthgroup_id] column value.
     *
     * @return int
     */
    public function getDefaulthealthgroupId()
    {
        return $this->defaulthealthgroup_id;
    }

    /**
     * Get the [defaultmkb] column value.
     *
     * @return string
     */
    public function getDefaultmkb()
    {
        return $this->defaultmkb;
    }

    /**
     * Get the [defaultdispanser_id] column value.
     *
     * @return int
     */
    public function getDefaultdispanserId()
    {
        return $this->defaultdispanser_id;
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
     * Get the [visittype_id] column value.
     *
     * @return int
     */
    public function getVisittypeId()
    {
        return $this->visittype_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [eventtype_id] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setEventtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->eventtype_id !== $v) {
            $this->eventtype_id = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::EVENTTYPE_ID;
        }


        return $this;
    } // setEventtypeId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [speciality_id] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setSpecialityId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speciality_id !== $v) {
            $this->speciality_id = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::SPECIALITY_ID;
        }


        return $this;
    } // setSpecialityId()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [defaulthealthgroup_id] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setDefaulthealthgroupId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaulthealthgroup_id !== $v) {
            $this->defaulthealthgroup_id = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID;
        }


        return $this;
    } // setDefaulthealthgroupId()

    /**
     * Set the value of [defaultmkb] column.
     *
     * @param string $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setDefaultmkb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->defaultmkb !== $v) {
            $this->defaultmkb = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::DEFAULTMKB;
        }


        return $this;
    } // setDefaultmkb()

    /**
     * Set the value of [defaultdispanser_id] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setDefaultdispanserId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultdispanser_id !== $v) {
            $this->defaultdispanser_id = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID;
        }


        return $this;
    } // setDefaultdispanserId()

    /**
     * Set the value of [selectiongroup] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setSelectiongroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->selectiongroup !== $v) {
            $this->selectiongroup = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::SELECTIONGROUP;
        }


        return $this;
    } // setSelectiongroup()

    /**
     * Set the value of [actuality] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setActuality($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->actuality !== $v) {
            $this->actuality = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::ACTUALITY;
        }


        return $this;
    } // setActuality()

    /**
     * Set the value of [visittype_id] column.
     *
     * @param int $v new value
     * @return EventtypeDiagnostic The current object (for fluent API support)
     */
    public function setVisittypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->visittype_id !== $v) {
            $this->visittype_id = $v;
            $this->modifiedColumns[] = EventtypeDiagnosticPeer::VISITTYPE_ID;
        }


        return $this;
    } // setVisittypeId()

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
            $this->speciality_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->sex = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->age = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->age_bu = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->age_bc = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->age_eu = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->age_ec = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->defaulthealthgroup_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->defaultmkb = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->defaultdispanser_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->selectiongroup = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->actuality = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->visittype_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = EventtypeDiagnosticPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EventtypeDiagnostic object", $e);
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
            $con = Propel::getConnection(EventtypeDiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventtypeDiagnosticPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(EventtypeDiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventtypeDiagnosticQuery::create()
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
            $con = Propel::getConnection(EventtypeDiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EventtypeDiagnosticPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = EventtypeDiagnosticPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventtypeDiagnosticPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventtypeDiagnosticPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::EVENTTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`eventType_id`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::SPECIALITY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`speciality_id`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`defaultHealthGroup_id`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::DEFAULTMKB)) {
            $modifiedColumns[':p' . $index++]  = '`defaultMKB`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`defaultDispanser_id`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::SELECTIONGROUP)) {
            $modifiedColumns[':p' . $index++]  = '`selectionGroup`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::ACTUALITY)) {
            $modifiedColumns[':p' . $index++]  = '`actuality`';
        }
        if ($this->isColumnModified(EventtypeDiagnosticPeer::VISITTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`visitType_id`';
        }

        $sql = sprintf(
            'INSERT INTO `EventType_Diagnostic` (%s) VALUES (%s)',
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
                    case '`speciality_id`':
                        $stmt->bindValue($identifier, $this->speciality_id, PDO::PARAM_INT);
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
                        $stmt->bindValue($identifier, $this->age_eu, PDO::PARAM_INT);
                        break;
                    case '`age_ec`':
                        $stmt->bindValue($identifier, $this->age_ec, PDO::PARAM_INT);
                        break;
                    case '`defaultHealthGroup_id`':
                        $stmt->bindValue($identifier, $this->defaulthealthgroup_id, PDO::PARAM_INT);
                        break;
                    case '`defaultMKB`':
                        $stmt->bindValue($identifier, $this->defaultmkb, PDO::PARAM_STR);
                        break;
                    case '`defaultDispanser_id`':
                        $stmt->bindValue($identifier, $this->defaultdispanser_id, PDO::PARAM_INT);
                        break;
                    case '`selectionGroup`':
                        $stmt->bindValue($identifier, $this->selectiongroup, PDO::PARAM_INT);
                        break;
                    case '`actuality`':
                        $stmt->bindValue($identifier, $this->actuality, PDO::PARAM_INT);
                        break;
                    case '`visitType_id`':
                        $stmt->bindValue($identifier, $this->visittype_id, PDO::PARAM_INT);
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


            if (($retval = EventtypeDiagnosticPeer::doValidate($this, $columns)) !== true) {
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
        $pos = EventtypeDiagnosticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSpecialityId();
                break;
            case 4:
                return $this->getSex();
                break;
            case 5:
                return $this->getAge();
                break;
            case 6:
                return $this->getAgeBu();
                break;
            case 7:
                return $this->getAgeBc();
                break;
            case 8:
                return $this->getAgeEu();
                break;
            case 9:
                return $this->getAgeEc();
                break;
            case 10:
                return $this->getDefaulthealthgroupId();
                break;
            case 11:
                return $this->getDefaultmkb();
                break;
            case 12:
                return $this->getDefaultdispanserId();
                break;
            case 13:
                return $this->getSelectiongroup();
                break;
            case 14:
                return $this->getActuality();
                break;
            case 15:
                return $this->getVisittypeId();
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
        if (isset($alreadyDumpedObjects['EventtypeDiagnostic'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EventtypeDiagnostic'][$this->getPrimaryKey()] = true;
        $keys = EventtypeDiagnosticPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getEventtypeId(),
            $keys[2] => $this->getIdx(),
            $keys[3] => $this->getSpecialityId(),
            $keys[4] => $this->getSex(),
            $keys[5] => $this->getAge(),
            $keys[6] => $this->getAgeBu(),
            $keys[7] => $this->getAgeBc(),
            $keys[8] => $this->getAgeEu(),
            $keys[9] => $this->getAgeEc(),
            $keys[10] => $this->getDefaulthealthgroupId(),
            $keys[11] => $this->getDefaultmkb(),
            $keys[12] => $this->getDefaultdispanserId(),
            $keys[13] => $this->getSelectiongroup(),
            $keys[14] => $this->getActuality(),
            $keys[15] => $this->getVisittypeId(),
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
        $pos = EventtypeDiagnosticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSpecialityId($value);
                break;
            case 4:
                $this->setSex($value);
                break;
            case 5:
                $this->setAge($value);
                break;
            case 6:
                $this->setAgeBu($value);
                break;
            case 7:
                $this->setAgeBc($value);
                break;
            case 8:
                $this->setAgeEu($value);
                break;
            case 9:
                $this->setAgeEc($value);
                break;
            case 10:
                $this->setDefaulthealthgroupId($value);
                break;
            case 11:
                $this->setDefaultmkb($value);
                break;
            case 12:
                $this->setDefaultdispanserId($value);
                break;
            case 13:
                $this->setSelectiongroup($value);
                break;
            case 14:
                $this->setActuality($value);
                break;
            case 15:
                $this->setVisittypeId($value);
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
        $keys = EventtypeDiagnosticPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEventtypeId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdx($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSpecialityId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSex($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAge($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAgeBu($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAgeBc($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAgeEu($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAgeEc($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setDefaulthealthgroupId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setDefaultmkb($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setDefaultdispanserId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSelectiongroup($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setActuality($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setVisittypeId($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventtypeDiagnosticPeer::DATABASE_NAME);

        if ($this->isColumnModified(EventtypeDiagnosticPeer::ID)) $criteria->add(EventtypeDiagnosticPeer::ID, $this->id);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::EVENTTYPE_ID)) $criteria->add(EventtypeDiagnosticPeer::EVENTTYPE_ID, $this->eventtype_id);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::IDX)) $criteria->add(EventtypeDiagnosticPeer::IDX, $this->idx);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::SPECIALITY_ID)) $criteria->add(EventtypeDiagnosticPeer::SPECIALITY_ID, $this->speciality_id);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::SEX)) $criteria->add(EventtypeDiagnosticPeer::SEX, $this->sex);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE)) $criteria->add(EventtypeDiagnosticPeer::AGE, $this->age);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_BU)) $criteria->add(EventtypeDiagnosticPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_BC)) $criteria->add(EventtypeDiagnosticPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_EU)) $criteria->add(EventtypeDiagnosticPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::AGE_EC)) $criteria->add(EventtypeDiagnosticPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID)) $criteria->add(EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID, $this->defaulthealthgroup_id);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::DEFAULTMKB)) $criteria->add(EventtypeDiagnosticPeer::DEFAULTMKB, $this->defaultmkb);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID)) $criteria->add(EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID, $this->defaultdispanser_id);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::SELECTIONGROUP)) $criteria->add(EventtypeDiagnosticPeer::SELECTIONGROUP, $this->selectiongroup);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::ACTUALITY)) $criteria->add(EventtypeDiagnosticPeer::ACTUALITY, $this->actuality);
        if ($this->isColumnModified(EventtypeDiagnosticPeer::VISITTYPE_ID)) $criteria->add(EventtypeDiagnosticPeer::VISITTYPE_ID, $this->visittype_id);

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
        $criteria = new Criteria(EventtypeDiagnosticPeer::DATABASE_NAME);
        $criteria->add(EventtypeDiagnosticPeer::ID, $this->id);

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
     * @param object $copyObj An object of EventtypeDiagnostic (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEventtypeId($this->getEventtypeId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setSpecialityId($this->getSpecialityId());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setDefaulthealthgroupId($this->getDefaulthealthgroupId());
        $copyObj->setDefaultmkb($this->getDefaultmkb());
        $copyObj->setDefaultdispanserId($this->getDefaultdispanserId());
        $copyObj->setSelectiongroup($this->getSelectiongroup());
        $copyObj->setActuality($this->getActuality());
        $copyObj->setVisittypeId($this->getVisittypeId());
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
     * @return EventtypeDiagnostic Clone of current object.
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
     * @return EventtypeDiagnosticPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventtypeDiagnosticPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->eventtype_id = null;
        $this->idx = null;
        $this->speciality_id = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->defaulthealthgroup_id = null;
        $this->defaultmkb = null;
        $this->defaultdispanser_id = null;
        $this->selectiongroup = null;
        $this->actuality = null;
        $this->visittype_id = null;
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
        return (string) $this->exportTo(EventtypeDiagnosticPeer::DEFAULT_STRING_FORMAT);
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
