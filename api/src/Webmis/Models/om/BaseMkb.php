<?php

namespace Webmis\Models\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\Mkb;
use Webmis\Models\MkbPeer;
use Webmis\Models\MkbQuery;
use Webmis\Models\MkbQuotatypePacientmodel;
use Webmis\Models\MkbQuotatypePacientmodelQuery;

/**
 * Base class that represents a row from the 'MKB' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseMkb extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\MkbPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MkbPeer
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
     * The value for the classid field.
     * @var        string
     */
    protected $classid;

    /**
     * The value for the classname field.
     * @var        string
     */
    protected $classname;

    /**
     * The value for the blockid field.
     * @var        string
     */
    protected $blockid;

    /**
     * The value for the blockname field.
     * @var        string
     */
    protected $blockname;

    /**
     * The value for the diagid field.
     * @var        string
     */
    protected $diagid;

    /**
     * The value for the diagname field.
     * @var        string
     */
    protected $diagname;

    /**
     * The value for the prim field.
     * @var        string
     */
    protected $prim;

    /**
     * The value for the sex field.
     * @var        boolean
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
     * The value for the characters field.
     * @var        int
     */
    protected $characters;

    /**
     * The value for the duration field.
     * @var        int
     */
    protected $duration;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

    /**
     * The value for the mkbsubclass_id field.
     * @var        int
     */
    protected $mkbsubclass_id;

    /**
     * @var        PropelObjectCollection|MkbQuotatypePacientmodel[] Collection to store aggregation of MkbQuotatypePacientmodel objects.
     */
    protected $collMkbQuotatypePacientmodels;
    protected $collMkbQuotatypePacientmodelsPartial;

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
    protected $mkbQuotatypePacientmodelsScheduledForDeletion = null;

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
     * Get the [classid] column value.
     *
     * @return string
     */
    public function getClassid()
    {
        return $this->classid;
    }

    /**
     * Get the [classname] column value.
     *
     * @return string
     */
    public function getClassname()
    {
        return $this->classname;
    }

    /**
     * Get the [blockid] column value.
     *
     * @return string
     */
    public function getBlockid()
    {
        return $this->blockid;
    }

    /**
     * Get the [blockname] column value.
     *
     * @return string
     */
    public function getBlockname()
    {
        return $this->blockname;
    }

    /**
     * Get the [diagid] column value.
     *
     * @return string
     */
    public function getDiagid()
    {
        return $this->diagid;
    }

    /**
     * Get the [diagname] column value.
     *
     * @return string
     */
    public function getDiagname()
    {
        return $this->diagname;
    }

    /**
     * Get the [prim] column value.
     *
     * @return string
     */
    public function getPrim()
    {
        return $this->prim;
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
     * Get the [characters] column value.
     *
     * @return int
     */
    public function getCharacters()
    {
        return $this->characters;
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
     * Get the [service_id] column value.
     *
     * @return int
     */
    public function getServiceId()
    {
        return $this->service_id;
    }

    /**
     * Get the [mkbsubclass_id] column value.
     *
     * @return int
     */
    public function getMkbsubclassId()
    {
        return $this->mkbsubclass_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = MkbPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [classid] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setClassid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->classid !== $v) {
            $this->classid = $v;
            $this->modifiedColumns[] = MkbPeer::CLASSID;
        }


        return $this;
    } // setClassid()

    /**
     * Set the value of [classname] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setClassname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->classname !== $v) {
            $this->classname = $v;
            $this->modifiedColumns[] = MkbPeer::CLASSNAME;
        }


        return $this;
    } // setClassname()

    /**
     * Set the value of [blockid] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setBlockid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->blockid !== $v) {
            $this->blockid = $v;
            $this->modifiedColumns[] = MkbPeer::BLOCKID;
        }


        return $this;
    } // setBlockid()

    /**
     * Set the value of [blockname] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setBlockname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->blockname !== $v) {
            $this->blockname = $v;
            $this->modifiedColumns[] = MkbPeer::BLOCKNAME;
        }


        return $this;
    } // setBlockname()

    /**
     * Set the value of [diagid] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setDiagid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->diagid !== $v) {
            $this->diagid = $v;
            $this->modifiedColumns[] = MkbPeer::DIAGID;
        }


        return $this;
    } // setDiagid()

    /**
     * Set the value of [diagname] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setDiagname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->diagname !== $v) {
            $this->diagname = $v;
            $this->modifiedColumns[] = MkbPeer::DIAGNAME;
        }


        return $this;
    } // setDiagname()

    /**
     * Set the value of [prim] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setPrim($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prim !== $v) {
            $this->prim = $v;
            $this->modifiedColumns[] = MkbPeer::PRIM;
        }


        return $this;
    } // setPrim()

    /**
     * Sets the value of the [sex] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Mkb The current object (for fluent API support)
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
            $this->modifiedColumns[] = MkbPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = MkbPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = MkbPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = MkbPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = MkbPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = MkbPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [characters] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setCharacters($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->characters !== $v) {
            $this->characters = $v;
            $this->modifiedColumns[] = MkbPeer::CHARACTERS;
        }


        return $this;
    } // setCharacters()

    /**
     * Set the value of [duration] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setDuration($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->duration !== $v) {
            $this->duration = $v;
            $this->modifiedColumns[] = MkbPeer::DURATION;
        }


        return $this;
    } // setDuration()

    /**
     * Set the value of [service_id] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = MkbPeer::SERVICE_ID;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [mkbsubclass_id] column.
     *
     * @param int $v new value
     * @return Mkb The current object (for fluent API support)
     */
    public function setMkbsubclassId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mkbsubclass_id !== $v) {
            $this->mkbsubclass_id = $v;
            $this->modifiedColumns[] = MkbPeer::MKBSUBCLASS_ID;
        }


        return $this;
    } // setMkbsubclassId()

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
            $this->classid = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->classname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->blockid = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->blockname = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->diagid = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->diagname = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->prim = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->sex = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->age = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->age_bu = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->age_bc = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->age_eu = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->age_ec = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->characters = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->duration = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->service_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->mkbsubclass_id = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 18; // 18 = MkbPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Mkb object", $e);
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
            $con = Propel::getConnection(MkbPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MkbPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collMkbQuotatypePacientmodels = null;

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
            $con = Propel::getConnection(MkbPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MkbQuery::create()
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
            $con = Propel::getConnection(MkbPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MkbPeer::addInstanceToPool($this);
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

            if ($this->mkbQuotatypePacientmodelsScheduledForDeletion !== null) {
                if (!$this->mkbQuotatypePacientmodelsScheduledForDeletion->isEmpty()) {
                    MkbQuotatypePacientmodelQuery::create()
                        ->filterByPrimaryKeys($this->mkbQuotatypePacientmodelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mkbQuotatypePacientmodelsScheduledForDeletion = null;
                }
            }

            if ($this->collMkbQuotatypePacientmodels !== null) {
                foreach ($this->collMkbQuotatypePacientmodels as $referrerFK) {
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

        $this->modifiedColumns[] = MkbPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MkbPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MkbPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MkbPeer::CLASSID)) {
            $modifiedColumns[':p' . $index++]  = '`ClassID`';
        }
        if ($this->isColumnModified(MkbPeer::CLASSNAME)) {
            $modifiedColumns[':p' . $index++]  = '`ClassName`';
        }
        if ($this->isColumnModified(MkbPeer::BLOCKID)) {
            $modifiedColumns[':p' . $index++]  = '`BlockID`';
        }
        if ($this->isColumnModified(MkbPeer::BLOCKNAME)) {
            $modifiedColumns[':p' . $index++]  = '`BlockName`';
        }
        if ($this->isColumnModified(MkbPeer::DIAGID)) {
            $modifiedColumns[':p' . $index++]  = '`DiagID`';
        }
        if ($this->isColumnModified(MkbPeer::DIAGNAME)) {
            $modifiedColumns[':p' . $index++]  = '`DiagName`';
        }
        if ($this->isColumnModified(MkbPeer::PRIM)) {
            $modifiedColumns[':p' . $index++]  = '`Prim`';
        }
        if ($this->isColumnModified(MkbPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(MkbPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(MkbPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(MkbPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(MkbPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(MkbPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(MkbPeer::CHARACTERS)) {
            $modifiedColumns[':p' . $index++]  = '`characters`';
        }
        if ($this->isColumnModified(MkbPeer::DURATION)) {
            $modifiedColumns[':p' . $index++]  = '`duration`';
        }
        if ($this->isColumnModified(MkbPeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }
        if ($this->isColumnModified(MkbPeer::MKBSUBCLASS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`MKBSubclass_id`';
        }

        $sql = sprintf(
            'INSERT INTO `MKB` (%s) VALUES (%s)',
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
                    case '`ClassID`':
                        $stmt->bindValue($identifier, $this->classid, PDO::PARAM_STR);
                        break;
                    case '`ClassName`':
                        $stmt->bindValue($identifier, $this->classname, PDO::PARAM_STR);
                        break;
                    case '`BlockID`':
                        $stmt->bindValue($identifier, $this->blockid, PDO::PARAM_STR);
                        break;
                    case '`BlockName`':
                        $stmt->bindValue($identifier, $this->blockname, PDO::PARAM_STR);
                        break;
                    case '`DiagID`':
                        $stmt->bindValue($identifier, $this->diagid, PDO::PARAM_STR);
                        break;
                    case '`DiagName`':
                        $stmt->bindValue($identifier, $this->diagname, PDO::PARAM_STR);
                        break;
                    case '`Prim`':
                        $stmt->bindValue($identifier, $this->prim, PDO::PARAM_STR);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, (int) $this->sex, PDO::PARAM_INT);
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
                    case '`characters`':
                        $stmt->bindValue($identifier, $this->characters, PDO::PARAM_INT);
                        break;
                    case '`duration`':
                        $stmt->bindValue($identifier, $this->duration, PDO::PARAM_INT);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
                        break;
                    case '`MKBSubclass_id`':
                        $stmt->bindValue($identifier, $this->mkbsubclass_id, PDO::PARAM_INT);
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


            if (($retval = MkbPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMkbQuotatypePacientmodels !== null) {
                    foreach ($this->collMkbQuotatypePacientmodels as $referrerFK) {
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
        $pos = MkbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getClassid();
                break;
            case 2:
                return $this->getClassname();
                break;
            case 3:
                return $this->getBlockid();
                break;
            case 4:
                return $this->getBlockname();
                break;
            case 5:
                return $this->getDiagid();
                break;
            case 6:
                return $this->getDiagname();
                break;
            case 7:
                return $this->getPrim();
                break;
            case 8:
                return $this->getSex();
                break;
            case 9:
                return $this->getAge();
                break;
            case 10:
                return $this->getAgeBu();
                break;
            case 11:
                return $this->getAgeBc();
                break;
            case 12:
                return $this->getAgeEu();
                break;
            case 13:
                return $this->getAgeEc();
                break;
            case 14:
                return $this->getCharacters();
                break;
            case 15:
                return $this->getDuration();
                break;
            case 16:
                return $this->getServiceId();
                break;
            case 17:
                return $this->getMkbsubclassId();
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
        if (isset($alreadyDumpedObjects['Mkb'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Mkb'][$this->getPrimaryKey()] = true;
        $keys = MkbPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClassid(),
            $keys[2] => $this->getClassname(),
            $keys[3] => $this->getBlockid(),
            $keys[4] => $this->getBlockname(),
            $keys[5] => $this->getDiagid(),
            $keys[6] => $this->getDiagname(),
            $keys[7] => $this->getPrim(),
            $keys[8] => $this->getSex(),
            $keys[9] => $this->getAge(),
            $keys[10] => $this->getAgeBu(),
            $keys[11] => $this->getAgeBc(),
            $keys[12] => $this->getAgeEu(),
            $keys[13] => $this->getAgeEc(),
            $keys[14] => $this->getCharacters(),
            $keys[15] => $this->getDuration(),
            $keys[16] => $this->getServiceId(),
            $keys[17] => $this->getMkbsubclassId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collMkbQuotatypePacientmodels) {
                $result['MkbQuotatypePacientmodels'] = $this->collMkbQuotatypePacientmodels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MkbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setClassid($value);
                break;
            case 2:
                $this->setClassname($value);
                break;
            case 3:
                $this->setBlockid($value);
                break;
            case 4:
                $this->setBlockname($value);
                break;
            case 5:
                $this->setDiagid($value);
                break;
            case 6:
                $this->setDiagname($value);
                break;
            case 7:
                $this->setPrim($value);
                break;
            case 8:
                $this->setSex($value);
                break;
            case 9:
                $this->setAge($value);
                break;
            case 10:
                $this->setAgeBu($value);
                break;
            case 11:
                $this->setAgeBc($value);
                break;
            case 12:
                $this->setAgeEu($value);
                break;
            case 13:
                $this->setAgeEc($value);
                break;
            case 14:
                $this->setCharacters($value);
                break;
            case 15:
                $this->setDuration($value);
                break;
            case 16:
                $this->setServiceId($value);
                break;
            case 17:
                $this->setMkbsubclassId($value);
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
        $keys = MkbPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setClassid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setClassname($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBlockid($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBlockname($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDiagid($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDiagname($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPrim($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSex($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAge($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAgeBu($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAgeBc($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setAgeEu($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAgeEc($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCharacters($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setDuration($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setServiceId($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setMkbsubclassId($arr[$keys[17]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MkbPeer::DATABASE_NAME);

        if ($this->isColumnModified(MkbPeer::ID)) $criteria->add(MkbPeer::ID, $this->id);
        if ($this->isColumnModified(MkbPeer::CLASSID)) $criteria->add(MkbPeer::CLASSID, $this->classid);
        if ($this->isColumnModified(MkbPeer::CLASSNAME)) $criteria->add(MkbPeer::CLASSNAME, $this->classname);
        if ($this->isColumnModified(MkbPeer::BLOCKID)) $criteria->add(MkbPeer::BLOCKID, $this->blockid);
        if ($this->isColumnModified(MkbPeer::BLOCKNAME)) $criteria->add(MkbPeer::BLOCKNAME, $this->blockname);
        if ($this->isColumnModified(MkbPeer::DIAGID)) $criteria->add(MkbPeer::DIAGID, $this->diagid);
        if ($this->isColumnModified(MkbPeer::DIAGNAME)) $criteria->add(MkbPeer::DIAGNAME, $this->diagname);
        if ($this->isColumnModified(MkbPeer::PRIM)) $criteria->add(MkbPeer::PRIM, $this->prim);
        if ($this->isColumnModified(MkbPeer::SEX)) $criteria->add(MkbPeer::SEX, $this->sex);
        if ($this->isColumnModified(MkbPeer::AGE)) $criteria->add(MkbPeer::AGE, $this->age);
        if ($this->isColumnModified(MkbPeer::AGE_BU)) $criteria->add(MkbPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(MkbPeer::AGE_BC)) $criteria->add(MkbPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(MkbPeer::AGE_EU)) $criteria->add(MkbPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(MkbPeer::AGE_EC)) $criteria->add(MkbPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(MkbPeer::CHARACTERS)) $criteria->add(MkbPeer::CHARACTERS, $this->characters);
        if ($this->isColumnModified(MkbPeer::DURATION)) $criteria->add(MkbPeer::DURATION, $this->duration);
        if ($this->isColumnModified(MkbPeer::SERVICE_ID)) $criteria->add(MkbPeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(MkbPeer::MKBSUBCLASS_ID)) $criteria->add(MkbPeer::MKBSUBCLASS_ID, $this->mkbsubclass_id);

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
        $criteria = new Criteria(MkbPeer::DATABASE_NAME);
        $criteria->add(MkbPeer::ID, $this->id);

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
     * @param object $copyObj An object of Mkb (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClassid($this->getClassid());
        $copyObj->setClassname($this->getClassname());
        $copyObj->setBlockid($this->getBlockid());
        $copyObj->setBlockname($this->getBlockname());
        $copyObj->setDiagid($this->getDiagid());
        $copyObj->setDiagname($this->getDiagname());
        $copyObj->setPrim($this->getPrim());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setCharacters($this->getCharacters());
        $copyObj->setDuration($this->getDuration());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setMkbsubclassId($this->getMkbsubclassId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMkbQuotatypePacientmodels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMkbQuotatypePacientmodel($relObj->copy($deepCopy));
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
     * @return Mkb Clone of current object.
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
     * @return MkbPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MkbPeer();
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
        if ('MkbQuotatypePacientmodel' == $relationName) {
            $this->initMkbQuotatypePacientmodels();
        }
    }

    /**
     * Clears out the collMkbQuotatypePacientmodels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Mkb The current object (for fluent API support)
     * @see        addMkbQuotatypePacientmodels()
     */
    public function clearMkbQuotatypePacientmodels()
    {
        $this->collMkbQuotatypePacientmodels = null; // important to set this to null since that means it is uninitialized
        $this->collMkbQuotatypePacientmodelsPartial = null;

        return $this;
    }

    /**
     * reset is the collMkbQuotatypePacientmodels collection loaded partially
     *
     * @return void
     */
    public function resetPartialMkbQuotatypePacientmodels($v = true)
    {
        $this->collMkbQuotatypePacientmodelsPartial = $v;
    }

    /**
     * Initializes the collMkbQuotatypePacientmodels collection.
     *
     * By default this just sets the collMkbQuotatypePacientmodels collection to an empty array (like clearcollMkbQuotatypePacientmodels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMkbQuotatypePacientmodels($overrideExisting = true)
    {
        if (null !== $this->collMkbQuotatypePacientmodels && !$overrideExisting) {
            return;
        }
        $this->collMkbQuotatypePacientmodels = new PropelObjectCollection();
        $this->collMkbQuotatypePacientmodels->setModel('MkbQuotatypePacientmodel');
    }

    /**
     * Gets an array of MkbQuotatypePacientmodel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Mkb is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MkbQuotatypePacientmodel[] List of MkbQuotatypePacientmodel objects
     * @throws PropelException
     */
    public function getMkbQuotatypePacientmodels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMkbQuotatypePacientmodelsPartial && !$this->isNew();
        if (null === $this->collMkbQuotatypePacientmodels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMkbQuotatypePacientmodels) {
                // return empty collection
                $this->initMkbQuotatypePacientmodels();
            } else {
                $collMkbQuotatypePacientmodels = MkbQuotatypePacientmodelQuery::create(null, $criteria)
                    ->filterByMkb($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMkbQuotatypePacientmodelsPartial && count($collMkbQuotatypePacientmodels)) {
                      $this->initMkbQuotatypePacientmodels(false);

                      foreach($collMkbQuotatypePacientmodels as $obj) {
                        if (false == $this->collMkbQuotatypePacientmodels->contains($obj)) {
                          $this->collMkbQuotatypePacientmodels->append($obj);
                        }
                      }

                      $this->collMkbQuotatypePacientmodelsPartial = true;
                    }

                    $collMkbQuotatypePacientmodels->getInternalIterator()->rewind();
                    return $collMkbQuotatypePacientmodels;
                }

                if($partial && $this->collMkbQuotatypePacientmodels) {
                    foreach($this->collMkbQuotatypePacientmodels as $obj) {
                        if($obj->isNew()) {
                            $collMkbQuotatypePacientmodels[] = $obj;
                        }
                    }
                }

                $this->collMkbQuotatypePacientmodels = $collMkbQuotatypePacientmodels;
                $this->collMkbQuotatypePacientmodelsPartial = false;
            }
        }

        return $this->collMkbQuotatypePacientmodels;
    }

    /**
     * Sets a collection of MkbQuotatypePacientmodel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mkbQuotatypePacientmodels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Mkb The current object (for fluent API support)
     */
    public function setMkbQuotatypePacientmodels(PropelCollection $mkbQuotatypePacientmodels, PropelPDO $con = null)
    {
        $mkbQuotatypePacientmodelsToDelete = $this->getMkbQuotatypePacientmodels(new Criteria(), $con)->diff($mkbQuotatypePacientmodels);

        $this->mkbQuotatypePacientmodelsScheduledForDeletion = unserialize(serialize($mkbQuotatypePacientmodelsToDelete));

        foreach ($mkbQuotatypePacientmodelsToDelete as $mkbQuotatypePacientmodelRemoved) {
            $mkbQuotatypePacientmodelRemoved->setMkb(null);
        }

        $this->collMkbQuotatypePacientmodels = null;
        foreach ($mkbQuotatypePacientmodels as $mkbQuotatypePacientmodel) {
            $this->addMkbQuotatypePacientmodel($mkbQuotatypePacientmodel);
        }

        $this->collMkbQuotatypePacientmodels = $mkbQuotatypePacientmodels;
        $this->collMkbQuotatypePacientmodelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MkbQuotatypePacientmodel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MkbQuotatypePacientmodel objects.
     * @throws PropelException
     */
    public function countMkbQuotatypePacientmodels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMkbQuotatypePacientmodelsPartial && !$this->isNew();
        if (null === $this->collMkbQuotatypePacientmodels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMkbQuotatypePacientmodels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMkbQuotatypePacientmodels());
            }
            $query = MkbQuotatypePacientmodelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMkb($this)
                ->count($con);
        }

        return count($this->collMkbQuotatypePacientmodels);
    }

    /**
     * Method called to associate a MkbQuotatypePacientmodel object to this object
     * through the MkbQuotatypePacientmodel foreign key attribute.
     *
     * @param    MkbQuotatypePacientmodel $l MkbQuotatypePacientmodel
     * @return Mkb The current object (for fluent API support)
     */
    public function addMkbQuotatypePacientmodel(MkbQuotatypePacientmodel $l)
    {
        if ($this->collMkbQuotatypePacientmodels === null) {
            $this->initMkbQuotatypePacientmodels();
            $this->collMkbQuotatypePacientmodelsPartial = true;
        }
        if (!in_array($l, $this->collMkbQuotatypePacientmodels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMkbQuotatypePacientmodel($l);
        }

        return $this;
    }

    /**
     * @param	MkbQuotatypePacientmodel $mkbQuotatypePacientmodel The mkbQuotatypePacientmodel object to add.
     */
    protected function doAddMkbQuotatypePacientmodel($mkbQuotatypePacientmodel)
    {
        $this->collMkbQuotatypePacientmodels[]= $mkbQuotatypePacientmodel;
        $mkbQuotatypePacientmodel->setMkb($this);
    }

    /**
     * @param	MkbQuotatypePacientmodel $mkbQuotatypePacientmodel The mkbQuotatypePacientmodel object to remove.
     * @return Mkb The current object (for fluent API support)
     */
    public function removeMkbQuotatypePacientmodel($mkbQuotatypePacientmodel)
    {
        if ($this->getMkbQuotatypePacientmodels()->contains($mkbQuotatypePacientmodel)) {
            $this->collMkbQuotatypePacientmodels->remove($this->collMkbQuotatypePacientmodels->search($mkbQuotatypePacientmodel));
            if (null === $this->mkbQuotatypePacientmodelsScheduledForDeletion) {
                $this->mkbQuotatypePacientmodelsScheduledForDeletion = clone $this->collMkbQuotatypePacientmodels;
                $this->mkbQuotatypePacientmodelsScheduledForDeletion->clear();
            }
            $this->mkbQuotatypePacientmodelsScheduledForDeletion[]= clone $mkbQuotatypePacientmodel;
            $mkbQuotatypePacientmodel->setMkb(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mkb is new, it will return
     * an empty collection; or if this Mkb has previously
     * been saved, it will retrieve related MkbQuotatypePacientmodels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mkb.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MkbQuotatypePacientmodel[] List of MkbQuotatypePacientmodel objects
     */
    public function getMkbQuotatypePacientmodelsJoinRbpacientmodel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MkbQuotatypePacientmodelQuery::create(null, $criteria);
        $query->joinWith('Rbpacientmodel', $join_behavior);

        return $this->getMkbQuotatypePacientmodels($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mkb is new, it will return
     * an empty collection; or if this Mkb has previously
     * been saved, it will retrieve related MkbQuotatypePacientmodels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mkb.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MkbQuotatypePacientmodel[] List of MkbQuotatypePacientmodel objects
     */
    public function getMkbQuotatypePacientmodelsJoinQuotatype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MkbQuotatypePacientmodelQuery::create(null, $criteria);
        $query->joinWith('Quotatype', $join_behavior);

        return $this->getMkbQuotatypePacientmodels($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->classid = null;
        $this->classname = null;
        $this->blockid = null;
        $this->blockname = null;
        $this->diagid = null;
        $this->diagname = null;
        $this->prim = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->characters = null;
        $this->duration = null;
        $this->service_id = null;
        $this->mkbsubclass_id = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
            if ($this->collMkbQuotatypePacientmodels) {
                foreach ($this->collMkbQuotatypePacientmodels as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMkbQuotatypePacientmodels instanceof PropelCollection) {
            $this->collMkbQuotatypePacientmodels->clearIterator();
        }
        $this->collMkbQuotatypePacientmodels = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MkbPeer::DEFAULT_STRING_FORMAT);
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
