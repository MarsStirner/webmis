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
use Webmis\Models\Quotingbyspeciality;
use Webmis\Models\QuotingbyspecialityQuery;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceProfileQuery;
use Webmis\Models\Rbspeciality;
use Webmis\Models\RbspecialityPeer;
use Webmis\Models\RbspecialityQuery;

/**
 * Base class that represents a row from the 'rbSpeciality' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbspeciality extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbspecialityPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbspecialityPeer
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
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the oksoname field.
     * @var        string
     */
    protected $oksoname;

    /**
     * The value for the oksocode field.
     * @var        string
     */
    protected $oksocode;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

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
     * The value for the mkbfilter field.
     * @var        string
     */
    protected $mkbfilter;

    /**
     * The value for the regionalcode field.
     * @var        string
     */
    protected $regionalcode;

    /**
     * The value for the quotingenabled field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $quotingenabled;

    /**
     * @var        PropelObjectCollection|Quotingbyspeciality[] Collection to store aggregation of Quotingbyspeciality objects.
     */
    protected $collQuotingbyspecialitys;
    protected $collQuotingbyspecialitysPartial;

    /**
     * @var        PropelObjectCollection|RbserviceProfile[] Collection to store aggregation of RbserviceProfile objects.
     */
    protected $collRbserviceProfiles;
    protected $collRbserviceProfilesPartial;

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
    protected $quotingbyspecialitysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbserviceProfilesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->quotingenabled = 0;
    }

    /**
     * Initializes internal state of BaseRbspeciality object.
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
     * Get the [code] column value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [oksoname] column value.
     *
     * @return string
     */
    public function getOksoname()
    {
        return $this->oksoname;
    }

    /**
     * Get the [oksocode] column value.
     *
     * @return string
     */
    public function getOksocode()
    {
        return $this->oksocode;
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
     * Get the [mkbfilter] column value.
     *
     * @return string
     */
    public function getMkbfilter()
    {
        return $this->mkbfilter;
    }

    /**
     * Get the [regionalcode] column value.
     *
     * @return string
     */
    public function getRegionalcode()
    {
        return $this->regionalcode;
    }

    /**
     * Get the [quotingenabled] column value.
     *
     * @return int
     */
    public function getQuotingenabled()
    {
        return $this->quotingenabled;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbspecialityPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbspecialityPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbspecialityPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [oksoname] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setOksoname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->oksoname !== $v) {
            $this->oksoname = $v;
            $this->modifiedColumns[] = RbspecialityPeer::OKSONAME;
        }


        return $this;
    } // setOksoname()

    /**
     * Set the value of [oksocode] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setOksocode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->oksocode !== $v) {
            $this->oksocode = $v;
            $this->modifiedColumns[] = RbspecialityPeer::OKSOCODE;
        }


        return $this;
    } // setOksocode()

    /**
     * Set the value of [service_id] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = RbspecialityPeer::SERVICE_ID;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = RbspecialityPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = RbspecialityPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = RbspecialityPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = RbspecialityPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = RbspecialityPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = RbspecialityPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [mkbfilter] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setMkbfilter($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mkbfilter !== $v) {
            $this->mkbfilter = $v;
            $this->modifiedColumns[] = RbspecialityPeer::MKBFILTER;
        }


        return $this;
    } // setMkbfilter()

    /**
     * Set the value of [regionalcode] column.
     *
     * @param string $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setRegionalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regionalcode !== $v) {
            $this->regionalcode = $v;
            $this->modifiedColumns[] = RbspecialityPeer::REGIONALCODE;
        }


        return $this;
    } // setRegionalcode()

    /**
     * Set the value of [quotingenabled] column.
     *
     * @param int $v new value
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setQuotingenabled($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->quotingenabled !== $v) {
            $this->quotingenabled = $v;
            $this->modifiedColumns[] = RbspecialityPeer::QUOTINGENABLED;
        }


        return $this;
    } // setQuotingenabled()

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
            if ($this->quotingenabled !== 0) {
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
            $this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->oksoname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->oksocode = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->service_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->sex = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->age = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->age_bu = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->age_bc = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->age_eu = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->age_ec = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->mkbfilter = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->regionalcode = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->quotingenabled = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = RbspecialityPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbspeciality object", $e);
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
            $con = Propel::getConnection(RbspecialityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbspecialityPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collQuotingbyspecialitys = null;

            $this->collRbserviceProfiles = null;

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
            $con = Propel::getConnection(RbspecialityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbspecialityQuery::create()
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
            $con = Propel::getConnection(RbspecialityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbspecialityPeer::addInstanceToPool($this);
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

            if ($this->quotingbyspecialitysScheduledForDeletion !== null) {
                if (!$this->quotingbyspecialitysScheduledForDeletion->isEmpty()) {
                    QuotingbyspecialityQuery::create()
                        ->filterByPrimaryKeys($this->quotingbyspecialitysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quotingbyspecialitysScheduledForDeletion = null;
                }
            }

            if ($this->collQuotingbyspecialitys !== null) {
                foreach ($this->collQuotingbyspecialitys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rbserviceProfilesScheduledForDeletion !== null) {
                if (!$this->rbserviceProfilesScheduledForDeletion->isEmpty()) {
                    foreach ($this->rbserviceProfilesScheduledForDeletion as $rbserviceProfile) {
                        // need to save related object because we set the relation to null
                        $rbserviceProfile->save($con);
                    }
                    $this->rbserviceProfilesScheduledForDeletion = null;
                }
            }

            if ($this->collRbserviceProfiles !== null) {
                foreach ($this->collRbserviceProfiles as $referrerFK) {
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

        $this->modifiedColumns[] = RbspecialityPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbspecialityPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbspecialityPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbspecialityPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbspecialityPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(RbspecialityPeer::OKSONAME)) {
            $modifiedColumns[':p' . $index++]  = '`OKSOName`';
        }
        if ($this->isColumnModified(RbspecialityPeer::OKSOCODE)) {
            $modifiedColumns[':p' . $index++]  = '`OKSOCode`';
        }
        if ($this->isColumnModified(RbspecialityPeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }
        if ($this->isColumnModified(RbspecialityPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(RbspecialityPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(RbspecialityPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(RbspecialityPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(RbspecialityPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(RbspecialityPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(RbspecialityPeer::MKBFILTER)) {
            $modifiedColumns[':p' . $index++]  = '`mkbFilter`';
        }
        if ($this->isColumnModified(RbspecialityPeer::REGIONALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionalCode`';
        }
        if ($this->isColumnModified(RbspecialityPeer::QUOTINGENABLED)) {
            $modifiedColumns[':p' . $index++]  = '`quotingEnabled`';
        }

        $sql = sprintf(
            'INSERT INTO `rbSpeciality` (%s) VALUES (%s)',
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
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`OKSOName`':
                        $stmt->bindValue($identifier, $this->oksoname, PDO::PARAM_STR);
                        break;
                    case '`OKSOCode`':
                        $stmt->bindValue($identifier, $this->oksocode, PDO::PARAM_STR);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
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
                    case '`mkbFilter`':
                        $stmt->bindValue($identifier, $this->mkbfilter, PDO::PARAM_STR);
                        break;
                    case '`regionalCode`':
                        $stmt->bindValue($identifier, $this->regionalcode, PDO::PARAM_STR);
                        break;
                    case '`quotingEnabled`':
                        $stmt->bindValue($identifier, $this->quotingenabled, PDO::PARAM_INT);
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


            if (($retval = RbspecialityPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collQuotingbyspecialitys !== null) {
                    foreach ($this->collQuotingbyspecialitys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbserviceProfiles !== null) {
                    foreach ($this->collRbserviceProfiles as $referrerFK) {
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
        $pos = RbspecialityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCode();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getOksoname();
                break;
            case 4:
                return $this->getOksocode();
                break;
            case 5:
                return $this->getServiceId();
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
                return $this->getMkbfilter();
                break;
            case 13:
                return $this->getRegionalcode();
                break;
            case 14:
                return $this->getQuotingenabled();
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
        if (isset($alreadyDumpedObjects['Rbspeciality'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbspeciality'][$this->getPrimaryKey()] = true;
        $keys = RbspecialityPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getOksoname(),
            $keys[4] => $this->getOksocode(),
            $keys[5] => $this->getServiceId(),
            $keys[6] => $this->getSex(),
            $keys[7] => $this->getAge(),
            $keys[8] => $this->getAgeBu(),
            $keys[9] => $this->getAgeBc(),
            $keys[10] => $this->getAgeEu(),
            $keys[11] => $this->getAgeEc(),
            $keys[12] => $this->getMkbfilter(),
            $keys[13] => $this->getRegionalcode(),
            $keys[14] => $this->getQuotingenabled(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collQuotingbyspecialitys) {
                $result['Quotingbyspecialitys'] = $this->collQuotingbyspecialitys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbserviceProfiles) {
                $result['RbserviceProfiles'] = $this->collRbserviceProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbspecialityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCode($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setOksoname($value);
                break;
            case 4:
                $this->setOksocode($value);
                break;
            case 5:
                $this->setServiceId($value);
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
                $this->setMkbfilter($value);
                break;
            case 13:
                $this->setRegionalcode($value);
                break;
            case 14:
                $this->setQuotingenabled($value);
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
        $keys = RbspecialityPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setOksoname($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOksocode($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setServiceId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSex($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAge($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAgeBu($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAgeBc($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAgeEu($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAgeEc($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setMkbfilter($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setRegionalcode($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setQuotingenabled($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbspecialityPeer::DATABASE_NAME);

        if ($this->isColumnModified(RbspecialityPeer::ID)) $criteria->add(RbspecialityPeer::ID, $this->id);
        if ($this->isColumnModified(RbspecialityPeer::CODE)) $criteria->add(RbspecialityPeer::CODE, $this->code);
        if ($this->isColumnModified(RbspecialityPeer::NAME)) $criteria->add(RbspecialityPeer::NAME, $this->name);
        if ($this->isColumnModified(RbspecialityPeer::OKSONAME)) $criteria->add(RbspecialityPeer::OKSONAME, $this->oksoname);
        if ($this->isColumnModified(RbspecialityPeer::OKSOCODE)) $criteria->add(RbspecialityPeer::OKSOCODE, $this->oksocode);
        if ($this->isColumnModified(RbspecialityPeer::SERVICE_ID)) $criteria->add(RbspecialityPeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(RbspecialityPeer::SEX)) $criteria->add(RbspecialityPeer::SEX, $this->sex);
        if ($this->isColumnModified(RbspecialityPeer::AGE)) $criteria->add(RbspecialityPeer::AGE, $this->age);
        if ($this->isColumnModified(RbspecialityPeer::AGE_BU)) $criteria->add(RbspecialityPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(RbspecialityPeer::AGE_BC)) $criteria->add(RbspecialityPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(RbspecialityPeer::AGE_EU)) $criteria->add(RbspecialityPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(RbspecialityPeer::AGE_EC)) $criteria->add(RbspecialityPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(RbspecialityPeer::MKBFILTER)) $criteria->add(RbspecialityPeer::MKBFILTER, $this->mkbfilter);
        if ($this->isColumnModified(RbspecialityPeer::REGIONALCODE)) $criteria->add(RbspecialityPeer::REGIONALCODE, $this->regionalcode);
        if ($this->isColumnModified(RbspecialityPeer::QUOTINGENABLED)) $criteria->add(RbspecialityPeer::QUOTINGENABLED, $this->quotingenabled);

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
        $criteria = new Criteria(RbspecialityPeer::DATABASE_NAME);
        $criteria->add(RbspecialityPeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbspeciality (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setOksoname($this->getOksoname());
        $copyObj->setOksocode($this->getOksocode());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setMkbfilter($this->getMkbfilter());
        $copyObj->setRegionalcode($this->getRegionalcode());
        $copyObj->setQuotingenabled($this->getQuotingenabled());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getQuotingbyspecialitys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuotingbyspeciality($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRbserviceProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbserviceProfile($relObj->copy($deepCopy));
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
     * @return Rbspeciality Clone of current object.
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
     * @return RbspecialityPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbspecialityPeer();
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
        if ('Quotingbyspeciality' == $relationName) {
            $this->initQuotingbyspecialitys();
        }
        if ('RbserviceProfile' == $relationName) {
            $this->initRbserviceProfiles();
        }
    }

    /**
     * Clears out the collQuotingbyspecialitys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbspeciality The current object (for fluent API support)
     * @see        addQuotingbyspecialitys()
     */
    public function clearQuotingbyspecialitys()
    {
        $this->collQuotingbyspecialitys = null; // important to set this to null since that means it is uninitialized
        $this->collQuotingbyspecialitysPartial = null;

        return $this;
    }

    /**
     * reset is the collQuotingbyspecialitys collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuotingbyspecialitys($v = true)
    {
        $this->collQuotingbyspecialitysPartial = $v;
    }

    /**
     * Initializes the collQuotingbyspecialitys collection.
     *
     * By default this just sets the collQuotingbyspecialitys collection to an empty array (like clearcollQuotingbyspecialitys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuotingbyspecialitys($overrideExisting = true)
    {
        if (null !== $this->collQuotingbyspecialitys && !$overrideExisting) {
            return;
        }
        $this->collQuotingbyspecialitys = new PropelObjectCollection();
        $this->collQuotingbyspecialitys->setModel('Quotingbyspeciality');
    }

    /**
     * Gets an array of Quotingbyspeciality objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbspeciality is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Quotingbyspeciality[] List of Quotingbyspeciality objects
     * @throws PropelException
     */
    public function getQuotingbyspecialitys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuotingbyspecialitysPartial && !$this->isNew();
        if (null === $this->collQuotingbyspecialitys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuotingbyspecialitys) {
                // return empty collection
                $this->initQuotingbyspecialitys();
            } else {
                $collQuotingbyspecialitys = QuotingbyspecialityQuery::create(null, $criteria)
                    ->filterByRbspeciality($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuotingbyspecialitysPartial && count($collQuotingbyspecialitys)) {
                      $this->initQuotingbyspecialitys(false);

                      foreach($collQuotingbyspecialitys as $obj) {
                        if (false == $this->collQuotingbyspecialitys->contains($obj)) {
                          $this->collQuotingbyspecialitys->append($obj);
                        }
                      }

                      $this->collQuotingbyspecialitysPartial = true;
                    }

                    $collQuotingbyspecialitys->getInternalIterator()->rewind();
                    return $collQuotingbyspecialitys;
                }

                if($partial && $this->collQuotingbyspecialitys) {
                    foreach($this->collQuotingbyspecialitys as $obj) {
                        if($obj->isNew()) {
                            $collQuotingbyspecialitys[] = $obj;
                        }
                    }
                }

                $this->collQuotingbyspecialitys = $collQuotingbyspecialitys;
                $this->collQuotingbyspecialitysPartial = false;
            }
        }

        return $this->collQuotingbyspecialitys;
    }

    /**
     * Sets a collection of Quotingbyspeciality objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quotingbyspecialitys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setQuotingbyspecialitys(PropelCollection $quotingbyspecialitys, PropelPDO $con = null)
    {
        $quotingbyspecialitysToDelete = $this->getQuotingbyspecialitys(new Criteria(), $con)->diff($quotingbyspecialitys);

        $this->quotingbyspecialitysScheduledForDeletion = unserialize(serialize($quotingbyspecialitysToDelete));

        foreach ($quotingbyspecialitysToDelete as $quotingbyspecialityRemoved) {
            $quotingbyspecialityRemoved->setRbspeciality(null);
        }

        $this->collQuotingbyspecialitys = null;
        foreach ($quotingbyspecialitys as $quotingbyspeciality) {
            $this->addQuotingbyspeciality($quotingbyspeciality);
        }

        $this->collQuotingbyspecialitys = $quotingbyspecialitys;
        $this->collQuotingbyspecialitysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Quotingbyspeciality objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Quotingbyspeciality objects.
     * @throws PropelException
     */
    public function countQuotingbyspecialitys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuotingbyspecialitysPartial && !$this->isNew();
        if (null === $this->collQuotingbyspecialitys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuotingbyspecialitys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getQuotingbyspecialitys());
            }
            $query = QuotingbyspecialityQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbspeciality($this)
                ->count($con);
        }

        return count($this->collQuotingbyspecialitys);
    }

    /**
     * Method called to associate a Quotingbyspeciality object to this object
     * through the Quotingbyspeciality foreign key attribute.
     *
     * @param    Quotingbyspeciality $l Quotingbyspeciality
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function addQuotingbyspeciality(Quotingbyspeciality $l)
    {
        if ($this->collQuotingbyspecialitys === null) {
            $this->initQuotingbyspecialitys();
            $this->collQuotingbyspecialitysPartial = true;
        }
        if (!in_array($l, $this->collQuotingbyspecialitys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuotingbyspeciality($l);
        }

        return $this;
    }

    /**
     * @param	Quotingbyspeciality $quotingbyspeciality The quotingbyspeciality object to add.
     */
    protected function doAddQuotingbyspeciality($quotingbyspeciality)
    {
        $this->collQuotingbyspecialitys[]= $quotingbyspeciality;
        $quotingbyspeciality->setRbspeciality($this);
    }

    /**
     * @param	Quotingbyspeciality $quotingbyspeciality The quotingbyspeciality object to remove.
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function removeQuotingbyspeciality($quotingbyspeciality)
    {
        if ($this->getQuotingbyspecialitys()->contains($quotingbyspeciality)) {
            $this->collQuotingbyspecialitys->remove($this->collQuotingbyspecialitys->search($quotingbyspeciality));
            if (null === $this->quotingbyspecialitysScheduledForDeletion) {
                $this->quotingbyspecialitysScheduledForDeletion = clone $this->collQuotingbyspecialitys;
                $this->quotingbyspecialitysScheduledForDeletion->clear();
            }
            $this->quotingbyspecialitysScheduledForDeletion[]= clone $quotingbyspeciality;
            $quotingbyspeciality->setRbspeciality(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbspeciality is new, it will return
     * an empty collection; or if this Rbspeciality has previously
     * been saved, it will retrieve related Quotingbyspecialitys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbspeciality.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Quotingbyspeciality[] List of Quotingbyspeciality objects
     */
    public function getQuotingbyspecialitysJoinOrganisation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = QuotingbyspecialityQuery::create(null, $criteria);
        $query->joinWith('Organisation', $join_behavior);

        return $this->getQuotingbyspecialitys($query, $con);
    }

    /**
     * Clears out the collRbserviceProfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbspeciality The current object (for fluent API support)
     * @see        addRbserviceProfiles()
     */
    public function clearRbserviceProfiles()
    {
        $this->collRbserviceProfiles = null; // important to set this to null since that means it is uninitialized
        $this->collRbserviceProfilesPartial = null;

        return $this;
    }

    /**
     * reset is the collRbserviceProfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbserviceProfiles($v = true)
    {
        $this->collRbserviceProfilesPartial = $v;
    }

    /**
     * Initializes the collRbserviceProfiles collection.
     *
     * By default this just sets the collRbserviceProfiles collection to an empty array (like clearcollRbserviceProfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbserviceProfiles($overrideExisting = true)
    {
        if (null !== $this->collRbserviceProfiles && !$overrideExisting) {
            return;
        }
        $this->collRbserviceProfiles = new PropelObjectCollection();
        $this->collRbserviceProfiles->setModel('RbserviceProfile');
    }

    /**
     * Gets an array of RbserviceProfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbspeciality is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     * @throws PropelException
     */
    public function getRbserviceProfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbserviceProfilesPartial && !$this->isNew();
        if (null === $this->collRbserviceProfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbserviceProfiles) {
                // return empty collection
                $this->initRbserviceProfiles();
            } else {
                $collRbserviceProfiles = RbserviceProfileQuery::create(null, $criteria)
                    ->filterByRbspeciality($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbserviceProfilesPartial && count($collRbserviceProfiles)) {
                      $this->initRbserviceProfiles(false);

                      foreach($collRbserviceProfiles as $obj) {
                        if (false == $this->collRbserviceProfiles->contains($obj)) {
                          $this->collRbserviceProfiles->append($obj);
                        }
                      }

                      $this->collRbserviceProfilesPartial = true;
                    }

                    $collRbserviceProfiles->getInternalIterator()->rewind();
                    return $collRbserviceProfiles;
                }

                if($partial && $this->collRbserviceProfiles) {
                    foreach($this->collRbserviceProfiles as $obj) {
                        if($obj->isNew()) {
                            $collRbserviceProfiles[] = $obj;
                        }
                    }
                }

                $this->collRbserviceProfiles = $collRbserviceProfiles;
                $this->collRbserviceProfilesPartial = false;
            }
        }

        return $this->collRbserviceProfiles;
    }

    /**
     * Sets a collection of RbserviceProfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbserviceProfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function setRbserviceProfiles(PropelCollection $rbserviceProfiles, PropelPDO $con = null)
    {
        $rbserviceProfilesToDelete = $this->getRbserviceProfiles(new Criteria(), $con)->diff($rbserviceProfiles);

        $this->rbserviceProfilesScheduledForDeletion = unserialize(serialize($rbserviceProfilesToDelete));

        foreach ($rbserviceProfilesToDelete as $rbserviceProfileRemoved) {
            $rbserviceProfileRemoved->setRbspeciality(null);
        }

        $this->collRbserviceProfiles = null;
        foreach ($rbserviceProfiles as $rbserviceProfile) {
            $this->addRbserviceProfile($rbserviceProfile);
        }

        $this->collRbserviceProfiles = $rbserviceProfiles;
        $this->collRbserviceProfilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RbserviceProfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RbserviceProfile objects.
     * @throws PropelException
     */
    public function countRbserviceProfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbserviceProfilesPartial && !$this->isNew();
        if (null === $this->collRbserviceProfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbserviceProfiles) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbserviceProfiles());
            }
            $query = RbserviceProfileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbspeciality($this)
                ->count($con);
        }

        return count($this->collRbserviceProfiles);
    }

    /**
     * Method called to associate a RbserviceProfile object to this object
     * through the RbserviceProfile foreign key attribute.
     *
     * @param    RbserviceProfile $l RbserviceProfile
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function addRbserviceProfile(RbserviceProfile $l)
    {
        if ($this->collRbserviceProfiles === null) {
            $this->initRbserviceProfiles();
            $this->collRbserviceProfilesPartial = true;
        }
        if (!in_array($l, $this->collRbserviceProfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbserviceProfile($l);
        }

        return $this;
    }

    /**
     * @param	RbserviceProfile $rbserviceProfile The rbserviceProfile object to add.
     */
    protected function doAddRbserviceProfile($rbserviceProfile)
    {
        $this->collRbserviceProfiles[]= $rbserviceProfile;
        $rbserviceProfile->setRbspeciality($this);
    }

    /**
     * @param	RbserviceProfile $rbserviceProfile The rbserviceProfile object to remove.
     * @return Rbspeciality The current object (for fluent API support)
     */
    public function removeRbserviceProfile($rbserviceProfile)
    {
        if ($this->getRbserviceProfiles()->contains($rbserviceProfile)) {
            $this->collRbserviceProfiles->remove($this->collRbserviceProfiles->search($rbserviceProfile));
            if (null === $this->rbserviceProfilesScheduledForDeletion) {
                $this->rbserviceProfilesScheduledForDeletion = clone $this->collRbserviceProfiles;
                $this->rbserviceProfilesScheduledForDeletion->clear();
            }
            $this->rbserviceProfilesScheduledForDeletion[]= $rbserviceProfile;
            $rbserviceProfile->setRbspeciality(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbspeciality is new, it will return
     * an empty collection; or if this Rbspeciality has previously
     * been saved, it will retrieve related RbserviceProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbspeciality.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     */
    public function getRbserviceProfilesJoinRbservice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbserviceProfileQuery::create(null, $criteria);
        $query->joinWith('Rbservice', $join_behavior);

        return $this->getRbserviceProfiles($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbspeciality is new, it will return
     * an empty collection; or if this Rbspeciality has previously
     * been saved, it will retrieve related RbserviceProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbspeciality.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     */
    public function getRbserviceProfilesJoinRbmedicalaidprofile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbserviceProfileQuery::create(null, $criteria);
        $query->joinWith('Rbmedicalaidprofile', $join_behavior);

        return $this->getRbserviceProfiles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->name = null;
        $this->oksoname = null;
        $this->oksocode = null;
        $this->service_id = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->mkbfilter = null;
        $this->regionalcode = null;
        $this->quotingenabled = null;
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
            if ($this->collQuotingbyspecialitys) {
                foreach ($this->collQuotingbyspecialitys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbserviceProfiles) {
                foreach ($this->collRbserviceProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collQuotingbyspecialitys instanceof PropelCollection) {
            $this->collQuotingbyspecialitys->clearIterator();
        }
        $this->collQuotingbyspecialitys = null;
        if ($this->collRbserviceProfiles instanceof PropelCollection) {
            $this->collRbserviceProfiles->clearIterator();
        }
        $this->collRbserviceProfiles = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbspecialityPeer::DEFAULT_STRING_FORMAT);
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
