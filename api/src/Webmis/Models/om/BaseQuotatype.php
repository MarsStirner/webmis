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
use Webmis\Models\MkbQuotatypePacientmodel;
use Webmis\Models\MkbQuotatypePacientmodelQuery;
use Webmis\Models\Quotatype;
use Webmis\Models\QuotatypePeer;
use Webmis\Models\QuotatypeQuery;
use Webmis\Models\Rbpacientmodel;
use Webmis\Models\RbpacientmodelQuery;

/**
 * Base class that represents a row from the 'QuotaType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseQuotatype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\QuotatypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        QuotatypePeer
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
     * The value for the class field.
     * @var        boolean
     */
    protected $class;

    /**
     * The value for the group_code field.
     * @var        string
     */
    protected $group_code;

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
     * The value for the teenolder field.
     * @var        boolean
     */
    protected $teenolder;

    /**
     * @var        PropelObjectCollection|MkbQuotatypePacientmodel[] Collection to store aggregation of MkbQuotatypePacientmodel objects.
     */
    protected $collMkbQuotatypePacientmodels;
    protected $collMkbQuotatypePacientmodelsPartial;

    /**
     * @var        PropelObjectCollection|Rbpacientmodel[] Collection to store aggregation of Rbpacientmodel objects.
     */
    protected $collRbpacientmodels;
    protected $collRbpacientmodelsPartial;

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
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbpacientmodelsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
    }

    /**
     * Initializes internal state of BaseQuotatype object.
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
     * Get the [class] column value.
     *
     * @return boolean
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Get the [group_code] column value.
     *
     * @return string
     */
    public function getGroupCode()
    {
        return $this->group_code;
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
     * Get the [teenolder] column value.
     *
     * @return boolean
     */
    public function getTeenolder()
    {
        return $this->teenolder;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = QuotatypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Quotatype The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = QuotatypePeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = QuotatypePeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Quotatype The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = QuotatypePeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = QuotatypePeer::MODIFYPERSON_ID;
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
     * @return Quotatype The current object (for fluent API support)
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
            $this->modifiedColumns[] = QuotatypePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Sets the value of the [class] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setClass($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->class !== $v) {
            $this->class = $v;
            $this->modifiedColumns[] = QuotatypePeer::CLAZZ;
        }


        return $this;
    } // setClass()

    /**
     * Set the value of [group_code] column.
     *
     * @param string $v new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setGroupCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->group_code !== $v) {
            $this->group_code = $v;
            $this->modifiedColumns[] = QuotatypePeer::GROUP_CODE;
        }


        return $this;
    } // setGroupCode()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = QuotatypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = QuotatypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [teenolder] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Quotatype The current object (for fluent API support)
     */
    public function setTeenolder($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->teenolder !== $v) {
            $this->teenolder = $v;
            $this->modifiedColumns[] = QuotatypePeer::TEENOLDER;
        }


        return $this;
    } // setTeenolder()

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
            $this->class = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->group_code = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->code = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->teenolder = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = QuotatypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Quotatype object", $e);
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
            $con = Propel::getConnection(QuotatypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = QuotatypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collMkbQuotatypePacientmodels = null;

            $this->collRbpacientmodels = null;

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
            $con = Propel::getConnection(QuotatypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = QuotatypeQuery::create()
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
            $con = Propel::getConnection(QuotatypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                QuotatypePeer::addInstanceToPool($this);
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

            if ($this->rbpacientmodelsScheduledForDeletion !== null) {
                if (!$this->rbpacientmodelsScheduledForDeletion->isEmpty()) {
                    RbpacientmodelQuery::create()
                        ->filterByPrimaryKeys($this->rbpacientmodelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbpacientmodelsScheduledForDeletion = null;
                }
            }

            if ($this->collRbpacientmodels !== null) {
                foreach ($this->collRbpacientmodels as $referrerFK) {
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

        $this->modifiedColumns[] = QuotatypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuotatypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(QuotatypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(QuotatypePeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(QuotatypePeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(QuotatypePeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(QuotatypePeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(QuotatypePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(QuotatypePeer::CLAZZ)) {
            $modifiedColumns[':p' . $index++]  = '`class`';
        }
        if ($this->isColumnModified(QuotatypePeer::GROUP_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`group_code`';
        }
        if ($this->isColumnModified(QuotatypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(QuotatypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(QuotatypePeer::TEENOLDER)) {
            $modifiedColumns[':p' . $index++]  = '`teenOlder`';
        }

        $sql = sprintf(
            'INSERT INTO `QuotaType` (%s) VALUES (%s)',
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
                    case '`class`':
                        $stmt->bindValue($identifier, (int) $this->class, PDO::PARAM_INT);
                        break;
                    case '`group_code`':
                        $stmt->bindValue($identifier, $this->group_code, PDO::PARAM_STR);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`teenOlder`':
                        $stmt->bindValue($identifier, (int) $this->teenolder, PDO::PARAM_INT);
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


            if (($retval = QuotatypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMkbQuotatypePacientmodels !== null) {
                    foreach ($this->collMkbQuotatypePacientmodels as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbpacientmodels !== null) {
                    foreach ($this->collRbpacientmodels as $referrerFK) {
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
        $pos = QuotatypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getClass();
                break;
            case 7:
                return $this->getGroupCode();
                break;
            case 8:
                return $this->getCode();
                break;
            case 9:
                return $this->getName();
                break;
            case 10:
                return $this->getTeenolder();
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
        if (isset($alreadyDumpedObjects['Quotatype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Quotatype'][$this->getPrimaryKey()] = true;
        $keys = QuotatypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getClass(),
            $keys[7] => $this->getGroupCode(),
            $keys[8] => $this->getCode(),
            $keys[9] => $this->getName(),
            $keys[10] => $this->getTeenolder(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collMkbQuotatypePacientmodels) {
                $result['MkbQuotatypePacientmodels'] = $this->collMkbQuotatypePacientmodels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbpacientmodels) {
                $result['Rbpacientmodels'] = $this->collRbpacientmodels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = QuotatypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setClass($value);
                break;
            case 7:
                $this->setGroupCode($value);
                break;
            case 8:
                $this->setCode($value);
                break;
            case 9:
                $this->setName($value);
                break;
            case 10:
                $this->setTeenolder($value);
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
        $keys = QuotatypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setClass($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setGroupCode($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCode($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setName($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTeenolder($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(QuotatypePeer::DATABASE_NAME);

        if ($this->isColumnModified(QuotatypePeer::ID)) $criteria->add(QuotatypePeer::ID, $this->id);
        if ($this->isColumnModified(QuotatypePeer::CREATEDATETIME)) $criteria->add(QuotatypePeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(QuotatypePeer::CREATEPERSON_ID)) $criteria->add(QuotatypePeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(QuotatypePeer::MODIFYDATETIME)) $criteria->add(QuotatypePeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(QuotatypePeer::MODIFYPERSON_ID)) $criteria->add(QuotatypePeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(QuotatypePeer::DELETED)) $criteria->add(QuotatypePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(QuotatypePeer::CLAZZ)) $criteria->add(QuotatypePeer::CLAZZ, $this->class);
        if ($this->isColumnModified(QuotatypePeer::GROUP_CODE)) $criteria->add(QuotatypePeer::GROUP_CODE, $this->group_code);
        if ($this->isColumnModified(QuotatypePeer::CODE)) $criteria->add(QuotatypePeer::CODE, $this->code);
        if ($this->isColumnModified(QuotatypePeer::NAME)) $criteria->add(QuotatypePeer::NAME, $this->name);
        if ($this->isColumnModified(QuotatypePeer::TEENOLDER)) $criteria->add(QuotatypePeer::TEENOLDER, $this->teenolder);

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
        $criteria = new Criteria(QuotatypePeer::DATABASE_NAME);
        $criteria->add(QuotatypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Quotatype (or compatible) type.
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
        $copyObj->setClass($this->getClass());
        $copyObj->setGroupCode($this->getGroupCode());
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setTeenolder($this->getTeenolder());

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

            foreach ($this->getRbpacientmodels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbpacientmodel($relObj->copy($deepCopy));
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
     * @return Quotatype Clone of current object.
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
     * @return QuotatypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new QuotatypePeer();
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
        if ('Rbpacientmodel' == $relationName) {
            $this->initRbpacientmodels();
        }
    }

    /**
     * Clears out the collMkbQuotatypePacientmodels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Quotatype The current object (for fluent API support)
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
     * If this Quotatype is new, it will return
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
                    ->filterByQuotatype($this)
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
     * @return Quotatype The current object (for fluent API support)
     */
    public function setMkbQuotatypePacientmodels(PropelCollection $mkbQuotatypePacientmodels, PropelPDO $con = null)
    {
        $mkbQuotatypePacientmodelsToDelete = $this->getMkbQuotatypePacientmodels(new Criteria(), $con)->diff($mkbQuotatypePacientmodels);

        $this->mkbQuotatypePacientmodelsScheduledForDeletion = unserialize(serialize($mkbQuotatypePacientmodelsToDelete));

        foreach ($mkbQuotatypePacientmodelsToDelete as $mkbQuotatypePacientmodelRemoved) {
            $mkbQuotatypePacientmodelRemoved->setQuotatype(null);
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
                ->filterByQuotatype($this)
                ->count($con);
        }

        return count($this->collMkbQuotatypePacientmodels);
    }

    /**
     * Method called to associate a MkbQuotatypePacientmodel object to this object
     * through the MkbQuotatypePacientmodel foreign key attribute.
     *
     * @param    MkbQuotatypePacientmodel $l MkbQuotatypePacientmodel
     * @return Quotatype The current object (for fluent API support)
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
        $mkbQuotatypePacientmodel->setQuotatype($this);
    }

    /**
     * @param	MkbQuotatypePacientmodel $mkbQuotatypePacientmodel The mkbQuotatypePacientmodel object to remove.
     * @return Quotatype The current object (for fluent API support)
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
            $mkbQuotatypePacientmodel->setQuotatype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Quotatype is new, it will return
     * an empty collection; or if this Quotatype has previously
     * been saved, it will retrieve related MkbQuotatypePacientmodels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Quotatype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MkbQuotatypePacientmodel[] List of MkbQuotatypePacientmodel objects
     */
    public function getMkbQuotatypePacientmodelsJoinMkb($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MkbQuotatypePacientmodelQuery::create(null, $criteria);
        $query->joinWith('Mkb', $join_behavior);

        return $this->getMkbQuotatypePacientmodels($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Quotatype is new, it will return
     * an empty collection; or if this Quotatype has previously
     * been saved, it will retrieve related MkbQuotatypePacientmodels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Quotatype.
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
     * Clears out the collRbpacientmodels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Quotatype The current object (for fluent API support)
     * @see        addRbpacientmodels()
     */
    public function clearRbpacientmodels()
    {
        $this->collRbpacientmodels = null; // important to set this to null since that means it is uninitialized
        $this->collRbpacientmodelsPartial = null;

        return $this;
    }

    /**
     * reset is the collRbpacientmodels collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbpacientmodels($v = true)
    {
        $this->collRbpacientmodelsPartial = $v;
    }

    /**
     * Initializes the collRbpacientmodels collection.
     *
     * By default this just sets the collRbpacientmodels collection to an empty array (like clearcollRbpacientmodels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbpacientmodels($overrideExisting = true)
    {
        if (null !== $this->collRbpacientmodels && !$overrideExisting) {
            return;
        }
        $this->collRbpacientmodels = new PropelObjectCollection();
        $this->collRbpacientmodels->setModel('Rbpacientmodel');
    }

    /**
     * Gets an array of Rbpacientmodel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Quotatype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rbpacientmodel[] List of Rbpacientmodel objects
     * @throws PropelException
     */
    public function getRbpacientmodels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbpacientmodelsPartial && !$this->isNew();
        if (null === $this->collRbpacientmodels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbpacientmodels) {
                // return empty collection
                $this->initRbpacientmodels();
            } else {
                $collRbpacientmodels = RbpacientmodelQuery::create(null, $criteria)
                    ->filterByQuotatype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbpacientmodelsPartial && count($collRbpacientmodels)) {
                      $this->initRbpacientmodels(false);

                      foreach($collRbpacientmodels as $obj) {
                        if (false == $this->collRbpacientmodels->contains($obj)) {
                          $this->collRbpacientmodels->append($obj);
                        }
                      }

                      $this->collRbpacientmodelsPartial = true;
                    }

                    $collRbpacientmodels->getInternalIterator()->rewind();
                    return $collRbpacientmodels;
                }

                if($partial && $this->collRbpacientmodels) {
                    foreach($this->collRbpacientmodels as $obj) {
                        if($obj->isNew()) {
                            $collRbpacientmodels[] = $obj;
                        }
                    }
                }

                $this->collRbpacientmodels = $collRbpacientmodels;
                $this->collRbpacientmodelsPartial = false;
            }
        }

        return $this->collRbpacientmodels;
    }

    /**
     * Sets a collection of Rbpacientmodel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbpacientmodels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Quotatype The current object (for fluent API support)
     */
    public function setRbpacientmodels(PropelCollection $rbpacientmodels, PropelPDO $con = null)
    {
        $rbpacientmodelsToDelete = $this->getRbpacientmodels(new Criteria(), $con)->diff($rbpacientmodels);

        $this->rbpacientmodelsScheduledForDeletion = unserialize(serialize($rbpacientmodelsToDelete));

        foreach ($rbpacientmodelsToDelete as $rbpacientmodelRemoved) {
            $rbpacientmodelRemoved->setQuotatype(null);
        }

        $this->collRbpacientmodels = null;
        foreach ($rbpacientmodels as $rbpacientmodel) {
            $this->addRbpacientmodel($rbpacientmodel);
        }

        $this->collRbpacientmodels = $rbpacientmodels;
        $this->collRbpacientmodelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbpacientmodel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rbpacientmodel objects.
     * @throws PropelException
     */
    public function countRbpacientmodels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbpacientmodelsPartial && !$this->isNew();
        if (null === $this->collRbpacientmodels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbpacientmodels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbpacientmodels());
            }
            $query = RbpacientmodelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuotatype($this)
                ->count($con);
        }

        return count($this->collRbpacientmodels);
    }

    /**
     * Method called to associate a Rbpacientmodel object to this object
     * through the Rbpacientmodel foreign key attribute.
     *
     * @param    Rbpacientmodel $l Rbpacientmodel
     * @return Quotatype The current object (for fluent API support)
     */
    public function addRbpacientmodel(Rbpacientmodel $l)
    {
        if ($this->collRbpacientmodels === null) {
            $this->initRbpacientmodels();
            $this->collRbpacientmodelsPartial = true;
        }
        if (!in_array($l, $this->collRbpacientmodels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbpacientmodel($l);
        }

        return $this;
    }

    /**
     * @param	Rbpacientmodel $rbpacientmodel The rbpacientmodel object to add.
     */
    protected function doAddRbpacientmodel($rbpacientmodel)
    {
        $this->collRbpacientmodels[]= $rbpacientmodel;
        $rbpacientmodel->setQuotatype($this);
    }

    /**
     * @param	Rbpacientmodel $rbpacientmodel The rbpacientmodel object to remove.
     * @return Quotatype The current object (for fluent API support)
     */
    public function removeRbpacientmodel($rbpacientmodel)
    {
        if ($this->getRbpacientmodels()->contains($rbpacientmodel)) {
            $this->collRbpacientmodels->remove($this->collRbpacientmodels->search($rbpacientmodel));
            if (null === $this->rbpacientmodelsScheduledForDeletion) {
                $this->rbpacientmodelsScheduledForDeletion = clone $this->collRbpacientmodels;
                $this->rbpacientmodelsScheduledForDeletion->clear();
            }
            $this->rbpacientmodelsScheduledForDeletion[]= clone $rbpacientmodel;
            $rbpacientmodel->setQuotatype(null);
        }

        return $this;
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
        $this->class = null;
        $this->group_code = null;
        $this->code = null;
        $this->name = null;
        $this->teenolder = null;
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
            if ($this->collMkbQuotatypePacientmodels) {
                foreach ($this->collMkbQuotatypePacientmodels as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbpacientmodels) {
                foreach ($this->collRbpacientmodels as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMkbQuotatypePacientmodels instanceof PropelCollection) {
            $this->collMkbQuotatypePacientmodels->clearIterator();
        }
        $this->collMkbQuotatypePacientmodels = null;
        if ($this->collRbpacientmodels instanceof PropelCollection) {
            $this->collRbpacientmodels->clearIterator();
        }
        $this->collRbpacientmodels = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(QuotatypePeer::DEFAULT_STRING_FORMAT);
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
