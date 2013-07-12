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
use Webmis\Models\Person;
use Webmis\Models\PersonQuery;
use Webmis\Models\Stockrecipe;
use Webmis\Models\StockrecipeItem;
use Webmis\Models\StockrecipeItemQuery;
use Webmis\Models\StockrecipePeer;
use Webmis\Models\StockrecipeQuery;

/**
 * Base class that represents a row from the 'StockRecipe' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockrecipe extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\StockrecipePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        StockrecipePeer
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
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the group_id field.
     * @var        int
     */
    protected $group_id;

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
     * @var        Person
     */
    protected $aPersonRelatedByCreatepersonId;

    /**
     * @var        Stockrecipe
     */
    protected $aStockrecipeRelatedByGroupId;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByModifypersonId;

    /**
     * @var        PropelObjectCollection|Stockrecipe[] Collection to store aggregation of Stockrecipe objects.
     */
    protected $collStockrecipesRelatedById;
    protected $collStockrecipesRelatedByIdPartial;

    /**
     * @var        PropelObjectCollection|StockrecipeItem[] Collection to store aggregation of StockrecipeItem objects.
     */
    protected $collStockrecipeItems;
    protected $collStockrecipeItemsPartial;

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
    protected $stockrecipesRelatedByIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrecipeItemsScheduledForDeletion = null;

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
     * Get the [group_id] column value.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = StockrecipePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = StockrecipePeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = StockrecipePeer::CREATEPERSON_ID;
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
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = StockrecipePeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = StockrecipePeer::MODIFYPERSON_ID;
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
     * @return Stockrecipe The current object (for fluent API support)
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
            $this->modifiedColumns[] = StockrecipePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [group_id] column.
     *
     * @param int $v new value
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setGroupId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->group_id !== $v) {
            $this->group_id = $v;
            $this->modifiedColumns[] = StockrecipePeer::GROUP_ID;
        }

        if ($this->aStockrecipeRelatedByGroupId !== null && $this->aStockrecipeRelatedByGroupId->getId() !== $v) {
            $this->aStockrecipeRelatedByGroupId = null;
        }


        return $this;
    } // setGroupId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = StockrecipePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = StockrecipePeer::NAME;
        }


        return $this;
    } // setName()

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
            $this->createdatetime = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->createperson_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->modifydatetime = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->modifyperson_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->deleted = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->group_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->code = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = StockrecipePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Stockrecipe object", $e);
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
        if ($this->aStockrecipeRelatedByGroupId !== null && $this->group_id !== $this->aStockrecipeRelatedByGroupId->getId()) {
            $this->aStockrecipeRelatedByGroupId = null;
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
            $con = Propel::getConnection(StockrecipePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = StockrecipePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPersonRelatedByCreatepersonId = null;
            $this->aStockrecipeRelatedByGroupId = null;
            $this->aPersonRelatedByModifypersonId = null;
            $this->collStockrecipesRelatedById = null;

            $this->collStockrecipeItems = null;

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
            $con = Propel::getConnection(StockrecipePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = StockrecipeQuery::create()
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
            $con = Propel::getConnection(StockrecipePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                StockrecipePeer::addInstanceToPool($this);
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

            if ($this->aStockrecipeRelatedByGroupId !== null) {
                if ($this->aStockrecipeRelatedByGroupId->isModified() || $this->aStockrecipeRelatedByGroupId->isNew()) {
                    $affectedRows += $this->aStockrecipeRelatedByGroupId->save($con);
                }
                $this->setStockrecipeRelatedByGroupId($this->aStockrecipeRelatedByGroupId);
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if ($this->aPersonRelatedByModifypersonId->isModified() || $this->aPersonRelatedByModifypersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByModifypersonId->save($con);
                }
                $this->setPersonRelatedByModifypersonId($this->aPersonRelatedByModifypersonId);
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

            if ($this->stockrecipesRelatedByIdScheduledForDeletion !== null) {
                if (!$this->stockrecipesRelatedByIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrecipesRelatedByIdScheduledForDeletion as $stockrecipeRelatedById) {
                        // need to save related object because we set the relation to null
                        $stockrecipeRelatedById->save($con);
                    }
                    $this->stockrecipesRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrecipesRelatedById !== null) {
                foreach ($this->collStockrecipesRelatedById as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrecipeItemsScheduledForDeletion !== null) {
                if (!$this->stockrecipeItemsScheduledForDeletion->isEmpty()) {
                    StockrecipeItemQuery::create()
                        ->filterByPrimaryKeys($this->stockrecipeItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->stockrecipeItemsScheduledForDeletion = null;
                }
            }

            if ($this->collStockrecipeItems !== null) {
                foreach ($this->collStockrecipeItems as $referrerFK) {
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

        $this->modifiedColumns[] = StockrecipePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StockrecipePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StockrecipePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(StockrecipePeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(StockrecipePeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(StockrecipePeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(StockrecipePeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(StockrecipePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(StockrecipePeer::GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`group_id`';
        }
        if ($this->isColumnModified(StockrecipePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(StockrecipePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `StockRecipe` (%s) VALUES (%s)',
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
                    case '`group_id`':
                        $stmt->bindValue($identifier, $this->group_id, PDO::PARAM_INT);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
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

            if ($this->aStockrecipeRelatedByGroupId !== null) {
                if (!$this->aStockrecipeRelatedByGroupId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStockrecipeRelatedByGroupId->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if (!$this->aPersonRelatedByModifypersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByModifypersonId->getValidationFailures());
                }
            }


            if (($retval = StockrecipePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collStockrecipesRelatedById !== null) {
                    foreach ($this->collStockrecipesRelatedById as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrecipeItems !== null) {
                    foreach ($this->collStockrecipeItems as $referrerFK) {
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
        $pos = StockrecipePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getGroupId();
                break;
            case 7:
                return $this->getCode();
                break;
            case 8:
                return $this->getName();
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
        if (isset($alreadyDumpedObjects['Stockrecipe'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Stockrecipe'][$this->getPrimaryKey()] = true;
        $keys = StockrecipePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getGroupId(),
            $keys[7] => $this->getCode(),
            $keys[8] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPersonRelatedByCreatepersonId) {
                $result['PersonRelatedByCreatepersonId'] = $this->aPersonRelatedByCreatepersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStockrecipeRelatedByGroupId) {
                $result['StockrecipeRelatedByGroupId'] = $this->aStockrecipeRelatedByGroupId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByModifypersonId) {
                $result['PersonRelatedByModifypersonId'] = $this->aPersonRelatedByModifypersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collStockrecipesRelatedById) {
                $result['StockrecipesRelatedById'] = $this->collStockrecipesRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrecipeItems) {
                $result['StockrecipeItems'] = $this->collStockrecipeItems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = StockrecipePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setGroupId($value);
                break;
            case 7:
                $this->setCode($value);
                break;
            case 8:
                $this->setName($value);
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
        $keys = StockrecipePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setGroupId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCode($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setName($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(StockrecipePeer::DATABASE_NAME);

        if ($this->isColumnModified(StockrecipePeer::ID)) $criteria->add(StockrecipePeer::ID, $this->id);
        if ($this->isColumnModified(StockrecipePeer::CREATEDATETIME)) $criteria->add(StockrecipePeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(StockrecipePeer::CREATEPERSON_ID)) $criteria->add(StockrecipePeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(StockrecipePeer::MODIFYDATETIME)) $criteria->add(StockrecipePeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(StockrecipePeer::MODIFYPERSON_ID)) $criteria->add(StockrecipePeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(StockrecipePeer::DELETED)) $criteria->add(StockrecipePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(StockrecipePeer::GROUP_ID)) $criteria->add(StockrecipePeer::GROUP_ID, $this->group_id);
        if ($this->isColumnModified(StockrecipePeer::CODE)) $criteria->add(StockrecipePeer::CODE, $this->code);
        if ($this->isColumnModified(StockrecipePeer::NAME)) $criteria->add(StockrecipePeer::NAME, $this->name);

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
        $criteria = new Criteria(StockrecipePeer::DATABASE_NAME);
        $criteria->add(StockrecipePeer::ID, $this->id);

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
     * @param object $copyObj An object of Stockrecipe (or compatible) type.
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
        $copyObj->setGroupId($this->getGroupId());
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getStockrecipesRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrecipeRelatedById($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrecipeItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrecipeItem($relObj->copy($deepCopy));
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
     * @return Stockrecipe Clone of current object.
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
     * @return StockrecipePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new StockrecipePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Stockrecipe The current object (for fluent API support)
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
            $v->addStockrecipeRelatedByCreatepersonId($this);
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
                $this->aPersonRelatedByCreatepersonId->addStockrecipesRelatedByCreatepersonId($this);
             */
        }

        return $this->aPersonRelatedByCreatepersonId;
    }

    /**
     * Declares an association between this object and a Stockrecipe object.
     *
     * @param             Stockrecipe $v
     * @return Stockrecipe The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStockrecipeRelatedByGroupId(Stockrecipe $v = null)
    {
        if ($v === null) {
            $this->setGroupId(NULL);
        } else {
            $this->setGroupId($v->getId());
        }

        $this->aStockrecipeRelatedByGroupId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Stockrecipe object, it will not be re-added.
        if ($v !== null) {
            $v->addStockrecipeRelatedById($this);
        }


        return $this;
    }


    /**
     * Get the associated Stockrecipe object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Stockrecipe The associated Stockrecipe object.
     * @throws PropelException
     */
    public function getStockrecipeRelatedByGroupId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStockrecipeRelatedByGroupId === null && ($this->group_id !== null) && $doQuery) {
            $this->aStockrecipeRelatedByGroupId = StockrecipeQuery::create()->findPk($this->group_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStockrecipeRelatedByGroupId->addStockrecipesRelatedById($this);
             */
        }

        return $this->aStockrecipeRelatedByGroupId;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Stockrecipe The current object (for fluent API support)
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
            $v->addStockrecipeRelatedByModifypersonId($this);
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
                $this->aPersonRelatedByModifypersonId->addStockrecipesRelatedByModifypersonId($this);
             */
        }

        return $this->aPersonRelatedByModifypersonId;
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
        if ('StockrecipeRelatedById' == $relationName) {
            $this->initStockrecipesRelatedById();
        }
        if ('StockrecipeItem' == $relationName) {
            $this->initStockrecipeItems();
        }
    }

    /**
     * Clears out the collStockrecipesRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Stockrecipe The current object (for fluent API support)
     * @see        addStockrecipesRelatedById()
     */
    public function clearStockrecipesRelatedById()
    {
        $this->collStockrecipesRelatedById = null; // important to set this to null since that means it is uninitialized
        $this->collStockrecipesRelatedByIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrecipesRelatedById collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrecipesRelatedById($v = true)
    {
        $this->collStockrecipesRelatedByIdPartial = $v;
    }

    /**
     * Initializes the collStockrecipesRelatedById collection.
     *
     * By default this just sets the collStockrecipesRelatedById collection to an empty array (like clearcollStockrecipesRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrecipesRelatedById($overrideExisting = true)
    {
        if (null !== $this->collStockrecipesRelatedById && !$overrideExisting) {
            return;
        }
        $this->collStockrecipesRelatedById = new PropelObjectCollection();
        $this->collStockrecipesRelatedById->setModel('Stockrecipe');
    }

    /**
     * Gets an array of Stockrecipe objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Stockrecipe is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     * @throws PropelException
     */
    public function getStockrecipesRelatedById($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipesRelatedByIdPartial && !$this->isNew();
        if (null === $this->collStockrecipesRelatedById || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrecipesRelatedById) {
                // return empty collection
                $this->initStockrecipesRelatedById();
            } else {
                $collStockrecipesRelatedById = StockrecipeQuery::create(null, $criteria)
                    ->filterByStockrecipeRelatedByGroupId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrecipesRelatedByIdPartial && count($collStockrecipesRelatedById)) {
                      $this->initStockrecipesRelatedById(false);

                      foreach($collStockrecipesRelatedById as $obj) {
                        if (false == $this->collStockrecipesRelatedById->contains($obj)) {
                          $this->collStockrecipesRelatedById->append($obj);
                        }
                      }

                      $this->collStockrecipesRelatedByIdPartial = true;
                    }

                    $collStockrecipesRelatedById->getInternalIterator()->rewind();
                    return $collStockrecipesRelatedById;
                }

                if($partial && $this->collStockrecipesRelatedById) {
                    foreach($this->collStockrecipesRelatedById as $obj) {
                        if($obj->isNew()) {
                            $collStockrecipesRelatedById[] = $obj;
                        }
                    }
                }

                $this->collStockrecipesRelatedById = $collStockrecipesRelatedById;
                $this->collStockrecipesRelatedByIdPartial = false;
            }
        }

        return $this->collStockrecipesRelatedById;
    }

    /**
     * Sets a collection of StockrecipeRelatedById objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrecipesRelatedById A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setStockrecipesRelatedById(PropelCollection $stockrecipesRelatedById, PropelPDO $con = null)
    {
        $stockrecipesRelatedByIdToDelete = $this->getStockrecipesRelatedById(new Criteria(), $con)->diff($stockrecipesRelatedById);

        $this->stockrecipesRelatedByIdScheduledForDeletion = unserialize(serialize($stockrecipesRelatedByIdToDelete));

        foreach ($stockrecipesRelatedByIdToDelete as $stockrecipeRelatedByIdRemoved) {
            $stockrecipeRelatedByIdRemoved->setStockrecipeRelatedByGroupId(null);
        }

        $this->collStockrecipesRelatedById = null;
        foreach ($stockrecipesRelatedById as $stockrecipeRelatedById) {
            $this->addStockrecipeRelatedById($stockrecipeRelatedById);
        }

        $this->collStockrecipesRelatedById = $stockrecipesRelatedById;
        $this->collStockrecipesRelatedByIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockrecipe objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockrecipe objects.
     * @throws PropelException
     */
    public function countStockrecipesRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipesRelatedByIdPartial && !$this->isNew();
        if (null === $this->collStockrecipesRelatedById || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrecipesRelatedById) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrecipesRelatedById());
            }
            $query = StockrecipeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStockrecipeRelatedByGroupId($this)
                ->count($con);
        }

        return count($this->collStockrecipesRelatedById);
    }

    /**
     * Method called to associate a Stockrecipe object to this object
     * through the Stockrecipe foreign key attribute.
     *
     * @param    Stockrecipe $l Stockrecipe
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function addStockrecipeRelatedById(Stockrecipe $l)
    {
        if ($this->collStockrecipesRelatedById === null) {
            $this->initStockrecipesRelatedById();
            $this->collStockrecipesRelatedByIdPartial = true;
        }
        if (!in_array($l, $this->collStockrecipesRelatedById->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrecipeRelatedById($l);
        }

        return $this;
    }

    /**
     * @param	StockrecipeRelatedById $stockrecipeRelatedById The stockrecipeRelatedById object to add.
     */
    protected function doAddStockrecipeRelatedById($stockrecipeRelatedById)
    {
        $this->collStockrecipesRelatedById[]= $stockrecipeRelatedById;
        $stockrecipeRelatedById->setStockrecipeRelatedByGroupId($this);
    }

    /**
     * @param	StockrecipeRelatedById $stockrecipeRelatedById The stockrecipeRelatedById object to remove.
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function removeStockrecipeRelatedById($stockrecipeRelatedById)
    {
        if ($this->getStockrecipesRelatedById()->contains($stockrecipeRelatedById)) {
            $this->collStockrecipesRelatedById->remove($this->collStockrecipesRelatedById->search($stockrecipeRelatedById));
            if (null === $this->stockrecipesRelatedByIdScheduledForDeletion) {
                $this->stockrecipesRelatedByIdScheduledForDeletion = clone $this->collStockrecipesRelatedById;
                $this->stockrecipesRelatedByIdScheduledForDeletion->clear();
            }
            $this->stockrecipesRelatedByIdScheduledForDeletion[]= $stockrecipeRelatedById;
            $stockrecipeRelatedById->setStockrecipeRelatedByGroupId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Stockrecipe is new, it will return
     * an empty collection; or if this Stockrecipe has previously
     * been saved, it will retrieve related StockrecipesRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Stockrecipe.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     */
    public function getStockrecipesRelatedByIdJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrecipeQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getStockrecipesRelatedById($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Stockrecipe is new, it will return
     * an empty collection; or if this Stockrecipe has previously
     * been saved, it will retrieve related StockrecipesRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Stockrecipe.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     */
    public function getStockrecipesRelatedByIdJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrecipeQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getStockrecipesRelatedById($query, $con);
    }

    /**
     * Clears out the collStockrecipeItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Stockrecipe The current object (for fluent API support)
     * @see        addStockrecipeItems()
     */
    public function clearStockrecipeItems()
    {
        $this->collStockrecipeItems = null; // important to set this to null since that means it is uninitialized
        $this->collStockrecipeItemsPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrecipeItems collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrecipeItems($v = true)
    {
        $this->collStockrecipeItemsPartial = $v;
    }

    /**
     * Initializes the collStockrecipeItems collection.
     *
     * By default this just sets the collStockrecipeItems collection to an empty array (like clearcollStockrecipeItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrecipeItems($overrideExisting = true)
    {
        if (null !== $this->collStockrecipeItems && !$overrideExisting) {
            return;
        }
        $this->collStockrecipeItems = new PropelObjectCollection();
        $this->collStockrecipeItems->setModel('StockrecipeItem');
    }

    /**
     * Gets an array of StockrecipeItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Stockrecipe is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StockrecipeItem[] List of StockrecipeItem objects
     * @throws PropelException
     */
    public function getStockrecipeItems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipeItemsPartial && !$this->isNew();
        if (null === $this->collStockrecipeItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrecipeItems) {
                // return empty collection
                $this->initStockrecipeItems();
            } else {
                $collStockrecipeItems = StockrecipeItemQuery::create(null, $criteria)
                    ->filterByStockrecipe($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrecipeItemsPartial && count($collStockrecipeItems)) {
                      $this->initStockrecipeItems(false);

                      foreach($collStockrecipeItems as $obj) {
                        if (false == $this->collStockrecipeItems->contains($obj)) {
                          $this->collStockrecipeItems->append($obj);
                        }
                      }

                      $this->collStockrecipeItemsPartial = true;
                    }

                    $collStockrecipeItems->getInternalIterator()->rewind();
                    return $collStockrecipeItems;
                }

                if($partial && $this->collStockrecipeItems) {
                    foreach($this->collStockrecipeItems as $obj) {
                        if($obj->isNew()) {
                            $collStockrecipeItems[] = $obj;
                        }
                    }
                }

                $this->collStockrecipeItems = $collStockrecipeItems;
                $this->collStockrecipeItemsPartial = false;
            }
        }

        return $this->collStockrecipeItems;
    }

    /**
     * Sets a collection of StockrecipeItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrecipeItems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function setStockrecipeItems(PropelCollection $stockrecipeItems, PropelPDO $con = null)
    {
        $stockrecipeItemsToDelete = $this->getStockrecipeItems(new Criteria(), $con)->diff($stockrecipeItems);

        $this->stockrecipeItemsScheduledForDeletion = unserialize(serialize($stockrecipeItemsToDelete));

        foreach ($stockrecipeItemsToDelete as $stockrecipeItemRemoved) {
            $stockrecipeItemRemoved->setStockrecipe(null);
        }

        $this->collStockrecipeItems = null;
        foreach ($stockrecipeItems as $stockrecipeItem) {
            $this->addStockrecipeItem($stockrecipeItem);
        }

        $this->collStockrecipeItems = $stockrecipeItems;
        $this->collStockrecipeItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StockrecipeItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StockrecipeItem objects.
     * @throws PropelException
     */
    public function countStockrecipeItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipeItemsPartial && !$this->isNew();
        if (null === $this->collStockrecipeItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrecipeItems) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrecipeItems());
            }
            $query = StockrecipeItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStockrecipe($this)
                ->count($con);
        }

        return count($this->collStockrecipeItems);
    }

    /**
     * Method called to associate a StockrecipeItem object to this object
     * through the StockrecipeItem foreign key attribute.
     *
     * @param    StockrecipeItem $l StockrecipeItem
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function addStockrecipeItem(StockrecipeItem $l)
    {
        if ($this->collStockrecipeItems === null) {
            $this->initStockrecipeItems();
            $this->collStockrecipeItemsPartial = true;
        }
        if (!in_array($l, $this->collStockrecipeItems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrecipeItem($l);
        }

        return $this;
    }

    /**
     * @param	StockrecipeItem $stockrecipeItem The stockrecipeItem object to add.
     */
    protected function doAddStockrecipeItem($stockrecipeItem)
    {
        $this->collStockrecipeItems[]= $stockrecipeItem;
        $stockrecipeItem->setStockrecipe($this);
    }

    /**
     * @param	StockrecipeItem $stockrecipeItem The stockrecipeItem object to remove.
     * @return Stockrecipe The current object (for fluent API support)
     */
    public function removeStockrecipeItem($stockrecipeItem)
    {
        if ($this->getStockrecipeItems()->contains($stockrecipeItem)) {
            $this->collStockrecipeItems->remove($this->collStockrecipeItems->search($stockrecipeItem));
            if (null === $this->stockrecipeItemsScheduledForDeletion) {
                $this->stockrecipeItemsScheduledForDeletion = clone $this->collStockrecipeItems;
                $this->stockrecipeItemsScheduledForDeletion->clear();
            }
            $this->stockrecipeItemsScheduledForDeletion[]= clone $stockrecipeItem;
            $stockrecipeItem->setStockrecipe(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Stockrecipe is new, it will return
     * an empty collection; or if this Stockrecipe has previously
     * been saved, it will retrieve related StockrecipeItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Stockrecipe.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockrecipeItem[] List of StockrecipeItem objects
     */
    public function getStockrecipeItemsJoinRbnomenclature($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrecipeItemQuery::create(null, $criteria);
        $query->joinWith('Rbnomenclature', $join_behavior);

        return $this->getStockrecipeItems($query, $con);
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
        $this->group_id = null;
        $this->code = null;
        $this->name = null;
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
            if ($this->collStockrecipesRelatedById) {
                foreach ($this->collStockrecipesRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrecipeItems) {
                foreach ($this->collStockrecipeItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPersonRelatedByCreatepersonId instanceof Persistent) {
              $this->aPersonRelatedByCreatepersonId->clearAllReferences($deep);
            }
            if ($this->aStockrecipeRelatedByGroupId instanceof Persistent) {
              $this->aStockrecipeRelatedByGroupId->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByModifypersonId instanceof Persistent) {
              $this->aPersonRelatedByModifypersonId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collStockrecipesRelatedById instanceof PropelCollection) {
            $this->collStockrecipesRelatedById->clearIterator();
        }
        $this->collStockrecipesRelatedById = null;
        if ($this->collStockrecipeItems instanceof PropelCollection) {
            $this->collStockrecipeItems->clearIterator();
        }
        $this->collStockrecipeItems = null;
        $this->aPersonRelatedByCreatepersonId = null;
        $this->aStockrecipeRelatedByGroupId = null;
        $this->aPersonRelatedByModifypersonId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StockrecipePeer::DEFAULT_STRING_FORMAT);
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
