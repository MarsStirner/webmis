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
use Webmis\Models\Clientfdproperty;
use Webmis\Models\ClientfdpropertyQuery;
use Webmis\Models\Fdfield;
use Webmis\Models\FdfieldQuery;
use Webmis\Models\Fdrecord;
use Webmis\Models\FdrecordQuery;
use Webmis\Models\Flatdirectory;
use Webmis\Models\FlatdirectoryPeer;
use Webmis\Models\FlatdirectoryQuery;

/**
 * Base class that represents a row from the 'FlatDirectory' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseFlatdirectory extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\FlatdirectoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        FlatdirectoryPeer
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
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * @var        PropelObjectCollection|Clientfdproperty[] Collection to store aggregation of Clientfdproperty objects.
     */
    protected $collClientfdpropertys;
    protected $collClientfdpropertysPartial;

    /**
     * @var        PropelObjectCollection|Fdfield[] Collection to store aggregation of Fdfield objects.
     */
    protected $collFdfieldsRelatedByFlatdirectoryId;
    protected $collFdfieldsRelatedByFlatdirectoryIdPartial;

    /**
     * @var        PropelObjectCollection|Fdfield[] Collection to store aggregation of Fdfield objects.
     */
    protected $collFdfieldsRelatedByFlatdirectoryCode;
    protected $collFdfieldsRelatedByFlatdirectoryCodePartial;

    /**
     * @var        PropelObjectCollection|Fdrecord[] Collection to store aggregation of Fdrecord objects.
     */
    protected $collFdrecordsRelatedByFlatdirectoryId;
    protected $collFdrecordsRelatedByFlatdirectoryIdPartial;

    /**
     * @var        PropelObjectCollection|Fdrecord[] Collection to store aggregation of Fdrecord objects.
     */
    protected $collFdrecordsRelatedByFlatdirectoryCode;
    protected $collFdrecordsRelatedByFlatdirectoryCodePartial;

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
    protected $clientfdpropertysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion = null;

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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = FlatdirectoryPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = FlatdirectoryPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = FlatdirectoryPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = FlatdirectoryPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

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
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->code = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = FlatdirectoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Flatdirectory object", $e);
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
            $con = Propel::getConnection(FlatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = FlatdirectoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collClientfdpropertys = null;

            $this->collFdfieldsRelatedByFlatdirectoryId = null;

            $this->collFdfieldsRelatedByFlatdirectoryCode = null;

            $this->collFdrecordsRelatedByFlatdirectoryId = null;

            $this->collFdrecordsRelatedByFlatdirectoryCode = null;

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
            $con = Propel::getConnection(FlatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = FlatdirectoryQuery::create()
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
            $con = Propel::getConnection(FlatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                FlatdirectoryPeer::addInstanceToPool($this);
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

            if ($this->clientfdpropertysScheduledForDeletion !== null) {
                if (!$this->clientfdpropertysScheduledForDeletion->isEmpty()) {
                    ClientfdpropertyQuery::create()
                        ->filterByPrimaryKeys($this->clientfdpropertysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientfdpropertysScheduledForDeletion = null;
                }
            }

            if ($this->collClientfdpropertys !== null) {
                foreach ($this->collClientfdpropertys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion !== null) {
                if (!$this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion->isEmpty()) {
                    FdfieldQuery::create()
                        ->filterByPrimaryKeys($this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion = null;
                }
            }

            if ($this->collFdfieldsRelatedByFlatdirectoryId !== null) {
                foreach ($this->collFdfieldsRelatedByFlatdirectoryId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion !== null) {
                if (!$this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion->isEmpty()) {
                    foreach ($this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion as $fdfieldRelatedByFlatdirectoryCode) {
                        // need to save related object because we set the relation to null
                        $fdfieldRelatedByFlatdirectoryCode->save($con);
                    }
                    $this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion = null;
                }
            }

            if ($this->collFdfieldsRelatedByFlatdirectoryCode !== null) {
                foreach ($this->collFdfieldsRelatedByFlatdirectoryCode as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion !== null) {
                if (!$this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion->isEmpty()) {
                    FdrecordQuery::create()
                        ->filterByPrimaryKeys($this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion = null;
                }
            }

            if ($this->collFdrecordsRelatedByFlatdirectoryId !== null) {
                foreach ($this->collFdrecordsRelatedByFlatdirectoryId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion !== null) {
                if (!$this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion->isEmpty()) {
                    foreach ($this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion as $fdrecordRelatedByFlatdirectoryCode) {
                        // need to save related object because we set the relation to null
                        $fdrecordRelatedByFlatdirectoryCode->save($con);
                    }
                    $this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion = null;
                }
            }

            if ($this->collFdrecordsRelatedByFlatdirectoryCode !== null) {
                foreach ($this->collFdrecordsRelatedByFlatdirectoryCode as $referrerFK) {
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

        $this->modifiedColumns[] = FlatdirectoryPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FlatdirectoryPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FlatdirectoryPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(FlatdirectoryPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(FlatdirectoryPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(FlatdirectoryPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }

        $sql = sprintf(
            'INSERT INTO `FlatDirectory` (%s) VALUES (%s)',
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
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
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


            if (($retval = FlatdirectoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collClientfdpropertys !== null) {
                    foreach ($this->collClientfdpropertys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFdfieldsRelatedByFlatdirectoryId !== null) {
                    foreach ($this->collFdfieldsRelatedByFlatdirectoryId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFdfieldsRelatedByFlatdirectoryCode !== null) {
                    foreach ($this->collFdfieldsRelatedByFlatdirectoryCode as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFdrecordsRelatedByFlatdirectoryId !== null) {
                    foreach ($this->collFdrecordsRelatedByFlatdirectoryId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFdrecordsRelatedByFlatdirectoryCode !== null) {
                    foreach ($this->collFdrecordsRelatedByFlatdirectoryCode as $referrerFK) {
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
        $pos = FlatdirectoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getCode();
                break;
            case 3:
                return $this->getDescription();
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
        if (isset($alreadyDumpedObjects['Flatdirectory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Flatdirectory'][$this->getPrimaryKey()] = true;
        $keys = FlatdirectoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getCode(),
            $keys[3] => $this->getDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collClientfdpropertys) {
                $result['Clientfdpropertys'] = $this->collClientfdpropertys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFdfieldsRelatedByFlatdirectoryId) {
                $result['FdfieldsRelatedByFlatdirectoryId'] = $this->collFdfieldsRelatedByFlatdirectoryId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFdfieldsRelatedByFlatdirectoryCode) {
                $result['FdfieldsRelatedByFlatdirectoryCode'] = $this->collFdfieldsRelatedByFlatdirectoryCode->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFdrecordsRelatedByFlatdirectoryId) {
                $result['FdrecordsRelatedByFlatdirectoryId'] = $this->collFdrecordsRelatedByFlatdirectoryId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFdrecordsRelatedByFlatdirectoryCode) {
                $result['FdrecordsRelatedByFlatdirectoryCode'] = $this->collFdrecordsRelatedByFlatdirectoryCode->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = FlatdirectoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 2:
                $this->setCode($value);
                break;
            case 3:
                $this->setDescription($value);
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
        $keys = FlatdirectoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCode($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FlatdirectoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(FlatdirectoryPeer::ID)) $criteria->add(FlatdirectoryPeer::ID, $this->id);
        if ($this->isColumnModified(FlatdirectoryPeer::NAME)) $criteria->add(FlatdirectoryPeer::NAME, $this->name);
        if ($this->isColumnModified(FlatdirectoryPeer::CODE)) $criteria->add(FlatdirectoryPeer::CODE, $this->code);
        if ($this->isColumnModified(FlatdirectoryPeer::DESCRIPTION)) $criteria->add(FlatdirectoryPeer::DESCRIPTION, $this->description);

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
        $criteria = new Criteria(FlatdirectoryPeer::DATABASE_NAME);
        $criteria->add(FlatdirectoryPeer::ID, $this->id);

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
     * @param object $copyObj An object of Flatdirectory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setCode($this->getCode());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getClientfdpropertys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientfdproperty($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFdfieldsRelatedByFlatdirectoryId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFdfieldRelatedByFlatdirectoryId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFdfieldsRelatedByFlatdirectoryCode() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFdfieldRelatedByFlatdirectoryCode($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFdrecordsRelatedByFlatdirectoryId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFdrecordRelatedByFlatdirectoryId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFdrecordsRelatedByFlatdirectoryCode() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFdrecordRelatedByFlatdirectoryCode($relObj->copy($deepCopy));
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
     * @return Flatdirectory Clone of current object.
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
     * @return FlatdirectoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new FlatdirectoryPeer();
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
        if ('Clientfdproperty' == $relationName) {
            $this->initClientfdpropertys();
        }
        if ('FdfieldRelatedByFlatdirectoryId' == $relationName) {
            $this->initFdfieldsRelatedByFlatdirectoryId();
        }
        if ('FdfieldRelatedByFlatdirectoryCode' == $relationName) {
            $this->initFdfieldsRelatedByFlatdirectoryCode();
        }
        if ('FdrecordRelatedByFlatdirectoryId' == $relationName) {
            $this->initFdrecordsRelatedByFlatdirectoryId();
        }
        if ('FdrecordRelatedByFlatdirectoryCode' == $relationName) {
            $this->initFdrecordsRelatedByFlatdirectoryCode();
        }
    }

    /**
     * Clears out the collClientfdpropertys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Flatdirectory The current object (for fluent API support)
     * @see        addClientfdpropertys()
     */
    public function clearClientfdpropertys()
    {
        $this->collClientfdpropertys = null; // important to set this to null since that means it is uninitialized
        $this->collClientfdpropertysPartial = null;

        return $this;
    }

    /**
     * reset is the collClientfdpropertys collection loaded partially
     *
     * @return void
     */
    public function resetPartialClientfdpropertys($v = true)
    {
        $this->collClientfdpropertysPartial = $v;
    }

    /**
     * Initializes the collClientfdpropertys collection.
     *
     * By default this just sets the collClientfdpropertys collection to an empty array (like clearcollClientfdpropertys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientfdpropertys($overrideExisting = true)
    {
        if (null !== $this->collClientfdpropertys && !$overrideExisting) {
            return;
        }
        $this->collClientfdpropertys = new PropelObjectCollection();
        $this->collClientfdpropertys->setModel('Clientfdproperty');
    }

    /**
     * Gets an array of Clientfdproperty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Flatdirectory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clientfdproperty[] List of Clientfdproperty objects
     * @throws PropelException
     */
    public function getClientfdpropertys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientfdpropertysPartial && !$this->isNew();
        if (null === $this->collClientfdpropertys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientfdpropertys) {
                // return empty collection
                $this->initClientfdpropertys();
            } else {
                $collClientfdpropertys = ClientfdpropertyQuery::create(null, $criteria)
                    ->filterByFlatdirectory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientfdpropertysPartial && count($collClientfdpropertys)) {
                      $this->initClientfdpropertys(false);

                      foreach($collClientfdpropertys as $obj) {
                        if (false == $this->collClientfdpropertys->contains($obj)) {
                          $this->collClientfdpropertys->append($obj);
                        }
                      }

                      $this->collClientfdpropertysPartial = true;
                    }

                    $collClientfdpropertys->getInternalIterator()->rewind();
                    return $collClientfdpropertys;
                }

                if($partial && $this->collClientfdpropertys) {
                    foreach($this->collClientfdpropertys as $obj) {
                        if($obj->isNew()) {
                            $collClientfdpropertys[] = $obj;
                        }
                    }
                }

                $this->collClientfdpropertys = $collClientfdpropertys;
                $this->collClientfdpropertysPartial = false;
            }
        }

        return $this->collClientfdpropertys;
    }

    /**
     * Sets a collection of Clientfdproperty objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clientfdpropertys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setClientfdpropertys(PropelCollection $clientfdpropertys, PropelPDO $con = null)
    {
        $clientfdpropertysToDelete = $this->getClientfdpropertys(new Criteria(), $con)->diff($clientfdpropertys);

        $this->clientfdpropertysScheduledForDeletion = unserialize(serialize($clientfdpropertysToDelete));

        foreach ($clientfdpropertysToDelete as $clientfdpropertyRemoved) {
            $clientfdpropertyRemoved->setFlatdirectory(null);
        }

        $this->collClientfdpropertys = null;
        foreach ($clientfdpropertys as $clientfdproperty) {
            $this->addClientfdproperty($clientfdproperty);
        }

        $this->collClientfdpropertys = $clientfdpropertys;
        $this->collClientfdpropertysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clientfdproperty objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clientfdproperty objects.
     * @throws PropelException
     */
    public function countClientfdpropertys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientfdpropertysPartial && !$this->isNew();
        if (null === $this->collClientfdpropertys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientfdpropertys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getClientfdpropertys());
            }
            $query = ClientfdpropertyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFlatdirectory($this)
                ->count($con);
        }

        return count($this->collClientfdpropertys);
    }

    /**
     * Method called to associate a Clientfdproperty object to this object
     * through the Clientfdproperty foreign key attribute.
     *
     * @param    Clientfdproperty $l Clientfdproperty
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function addClientfdproperty(Clientfdproperty $l)
    {
        if ($this->collClientfdpropertys === null) {
            $this->initClientfdpropertys();
            $this->collClientfdpropertysPartial = true;
        }
        if (!in_array($l, $this->collClientfdpropertys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClientfdproperty($l);
        }

        return $this;
    }

    /**
     * @param	Clientfdproperty $clientfdproperty The clientfdproperty object to add.
     */
    protected function doAddClientfdproperty($clientfdproperty)
    {
        $this->collClientfdpropertys[]= $clientfdproperty;
        $clientfdproperty->setFlatdirectory($this);
    }

    /**
     * @param	Clientfdproperty $clientfdproperty The clientfdproperty object to remove.
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function removeClientfdproperty($clientfdproperty)
    {
        if ($this->getClientfdpropertys()->contains($clientfdproperty)) {
            $this->collClientfdpropertys->remove($this->collClientfdpropertys->search($clientfdproperty));
            if (null === $this->clientfdpropertysScheduledForDeletion) {
                $this->clientfdpropertysScheduledForDeletion = clone $this->collClientfdpropertys;
                $this->clientfdpropertysScheduledForDeletion->clear();
            }
            $this->clientfdpropertysScheduledForDeletion[]= clone $clientfdproperty;
            $clientfdproperty->setFlatdirectory(null);
        }

        return $this;
    }

    /**
     * Clears out the collFdfieldsRelatedByFlatdirectoryId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Flatdirectory The current object (for fluent API support)
     * @see        addFdfieldsRelatedByFlatdirectoryId()
     */
    public function clearFdfieldsRelatedByFlatdirectoryId()
    {
        $this->collFdfieldsRelatedByFlatdirectoryId = null; // important to set this to null since that means it is uninitialized
        $this->collFdfieldsRelatedByFlatdirectoryIdPartial = null;

        return $this;
    }

    /**
     * reset is the collFdfieldsRelatedByFlatdirectoryId collection loaded partially
     *
     * @return void
     */
    public function resetPartialFdfieldsRelatedByFlatdirectoryId($v = true)
    {
        $this->collFdfieldsRelatedByFlatdirectoryIdPartial = $v;
    }

    /**
     * Initializes the collFdfieldsRelatedByFlatdirectoryId collection.
     *
     * By default this just sets the collFdfieldsRelatedByFlatdirectoryId collection to an empty array (like clearcollFdfieldsRelatedByFlatdirectoryId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFdfieldsRelatedByFlatdirectoryId($overrideExisting = true)
    {
        if (null !== $this->collFdfieldsRelatedByFlatdirectoryId && !$overrideExisting) {
            return;
        }
        $this->collFdfieldsRelatedByFlatdirectoryId = new PropelObjectCollection();
        $this->collFdfieldsRelatedByFlatdirectoryId->setModel('Fdfield');
    }

    /**
     * Gets an array of Fdfield objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Flatdirectory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Fdfield[] List of Fdfield objects
     * @throws PropelException
     */
    public function getFdfieldsRelatedByFlatdirectoryId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFdfieldsRelatedByFlatdirectoryIdPartial && !$this->isNew();
        if (null === $this->collFdfieldsRelatedByFlatdirectoryId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFdfieldsRelatedByFlatdirectoryId) {
                // return empty collection
                $this->initFdfieldsRelatedByFlatdirectoryId();
            } else {
                $collFdfieldsRelatedByFlatdirectoryId = FdfieldQuery::create(null, $criteria)
                    ->filterByFlatdirectoryRelatedByFlatdirectoryId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFdfieldsRelatedByFlatdirectoryIdPartial && count($collFdfieldsRelatedByFlatdirectoryId)) {
                      $this->initFdfieldsRelatedByFlatdirectoryId(false);

                      foreach($collFdfieldsRelatedByFlatdirectoryId as $obj) {
                        if (false == $this->collFdfieldsRelatedByFlatdirectoryId->contains($obj)) {
                          $this->collFdfieldsRelatedByFlatdirectoryId->append($obj);
                        }
                      }

                      $this->collFdfieldsRelatedByFlatdirectoryIdPartial = true;
                    }

                    $collFdfieldsRelatedByFlatdirectoryId->getInternalIterator()->rewind();
                    return $collFdfieldsRelatedByFlatdirectoryId;
                }

                if($partial && $this->collFdfieldsRelatedByFlatdirectoryId) {
                    foreach($this->collFdfieldsRelatedByFlatdirectoryId as $obj) {
                        if($obj->isNew()) {
                            $collFdfieldsRelatedByFlatdirectoryId[] = $obj;
                        }
                    }
                }

                $this->collFdfieldsRelatedByFlatdirectoryId = $collFdfieldsRelatedByFlatdirectoryId;
                $this->collFdfieldsRelatedByFlatdirectoryIdPartial = false;
            }
        }

        return $this->collFdfieldsRelatedByFlatdirectoryId;
    }

    /**
     * Sets a collection of FdfieldRelatedByFlatdirectoryId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $fdfieldsRelatedByFlatdirectoryId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setFdfieldsRelatedByFlatdirectoryId(PropelCollection $fdfieldsRelatedByFlatdirectoryId, PropelPDO $con = null)
    {
        $fdfieldsRelatedByFlatdirectoryIdToDelete = $this->getFdfieldsRelatedByFlatdirectoryId(new Criteria(), $con)->diff($fdfieldsRelatedByFlatdirectoryId);

        $this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion = unserialize(serialize($fdfieldsRelatedByFlatdirectoryIdToDelete));

        foreach ($fdfieldsRelatedByFlatdirectoryIdToDelete as $fdfieldRelatedByFlatdirectoryIdRemoved) {
            $fdfieldRelatedByFlatdirectoryIdRemoved->setFlatdirectoryRelatedByFlatdirectoryId(null);
        }

        $this->collFdfieldsRelatedByFlatdirectoryId = null;
        foreach ($fdfieldsRelatedByFlatdirectoryId as $fdfieldRelatedByFlatdirectoryId) {
            $this->addFdfieldRelatedByFlatdirectoryId($fdfieldRelatedByFlatdirectoryId);
        }

        $this->collFdfieldsRelatedByFlatdirectoryId = $fdfieldsRelatedByFlatdirectoryId;
        $this->collFdfieldsRelatedByFlatdirectoryIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fdfield objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Fdfield objects.
     * @throws PropelException
     */
    public function countFdfieldsRelatedByFlatdirectoryId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFdfieldsRelatedByFlatdirectoryIdPartial && !$this->isNew();
        if (null === $this->collFdfieldsRelatedByFlatdirectoryId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFdfieldsRelatedByFlatdirectoryId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFdfieldsRelatedByFlatdirectoryId());
            }
            $query = FdfieldQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFlatdirectoryRelatedByFlatdirectoryId($this)
                ->count($con);
        }

        return count($this->collFdfieldsRelatedByFlatdirectoryId);
    }

    /**
     * Method called to associate a Fdfield object to this object
     * through the Fdfield foreign key attribute.
     *
     * @param    Fdfield $l Fdfield
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function addFdfieldRelatedByFlatdirectoryId(Fdfield $l)
    {
        if ($this->collFdfieldsRelatedByFlatdirectoryId === null) {
            $this->initFdfieldsRelatedByFlatdirectoryId();
            $this->collFdfieldsRelatedByFlatdirectoryIdPartial = true;
        }
        if (!in_array($l, $this->collFdfieldsRelatedByFlatdirectoryId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFdfieldRelatedByFlatdirectoryId($l);
        }

        return $this;
    }

    /**
     * @param	FdfieldRelatedByFlatdirectoryId $fdfieldRelatedByFlatdirectoryId The fdfieldRelatedByFlatdirectoryId object to add.
     */
    protected function doAddFdfieldRelatedByFlatdirectoryId($fdfieldRelatedByFlatdirectoryId)
    {
        $this->collFdfieldsRelatedByFlatdirectoryId[]= $fdfieldRelatedByFlatdirectoryId;
        $fdfieldRelatedByFlatdirectoryId->setFlatdirectoryRelatedByFlatdirectoryId($this);
    }

    /**
     * @param	FdfieldRelatedByFlatdirectoryId $fdfieldRelatedByFlatdirectoryId The fdfieldRelatedByFlatdirectoryId object to remove.
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function removeFdfieldRelatedByFlatdirectoryId($fdfieldRelatedByFlatdirectoryId)
    {
        if ($this->getFdfieldsRelatedByFlatdirectoryId()->contains($fdfieldRelatedByFlatdirectoryId)) {
            $this->collFdfieldsRelatedByFlatdirectoryId->remove($this->collFdfieldsRelatedByFlatdirectoryId->search($fdfieldRelatedByFlatdirectoryId));
            if (null === $this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion) {
                $this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion = clone $this->collFdfieldsRelatedByFlatdirectoryId;
                $this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion->clear();
            }
            $this->fdfieldsRelatedByFlatdirectoryIdScheduledForDeletion[]= clone $fdfieldRelatedByFlatdirectoryId;
            $fdfieldRelatedByFlatdirectoryId->setFlatdirectoryRelatedByFlatdirectoryId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Flatdirectory is new, it will return
     * an empty collection; or if this Flatdirectory has previously
     * been saved, it will retrieve related FdfieldsRelatedByFlatdirectoryId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Flatdirectory.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Fdfield[] List of Fdfield objects
     */
    public function getFdfieldsRelatedByFlatdirectoryIdJoinFdfieldtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FdfieldQuery::create(null, $criteria);
        $query->joinWith('Fdfieldtype', $join_behavior);

        return $this->getFdfieldsRelatedByFlatdirectoryId($query, $con);
    }

    /**
     * Clears out the collFdfieldsRelatedByFlatdirectoryCode collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Flatdirectory The current object (for fluent API support)
     * @see        addFdfieldsRelatedByFlatdirectoryCode()
     */
    public function clearFdfieldsRelatedByFlatdirectoryCode()
    {
        $this->collFdfieldsRelatedByFlatdirectoryCode = null; // important to set this to null since that means it is uninitialized
        $this->collFdfieldsRelatedByFlatdirectoryCodePartial = null;

        return $this;
    }

    /**
     * reset is the collFdfieldsRelatedByFlatdirectoryCode collection loaded partially
     *
     * @return void
     */
    public function resetPartialFdfieldsRelatedByFlatdirectoryCode($v = true)
    {
        $this->collFdfieldsRelatedByFlatdirectoryCodePartial = $v;
    }

    /**
     * Initializes the collFdfieldsRelatedByFlatdirectoryCode collection.
     *
     * By default this just sets the collFdfieldsRelatedByFlatdirectoryCode collection to an empty array (like clearcollFdfieldsRelatedByFlatdirectoryCode());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFdfieldsRelatedByFlatdirectoryCode($overrideExisting = true)
    {
        if (null !== $this->collFdfieldsRelatedByFlatdirectoryCode && !$overrideExisting) {
            return;
        }
        $this->collFdfieldsRelatedByFlatdirectoryCode = new PropelObjectCollection();
        $this->collFdfieldsRelatedByFlatdirectoryCode->setModel('Fdfield');
    }

    /**
     * Gets an array of Fdfield objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Flatdirectory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Fdfield[] List of Fdfield objects
     * @throws PropelException
     */
    public function getFdfieldsRelatedByFlatdirectoryCode($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFdfieldsRelatedByFlatdirectoryCodePartial && !$this->isNew();
        if (null === $this->collFdfieldsRelatedByFlatdirectoryCode || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFdfieldsRelatedByFlatdirectoryCode) {
                // return empty collection
                $this->initFdfieldsRelatedByFlatdirectoryCode();
            } else {
                $collFdfieldsRelatedByFlatdirectoryCode = FdfieldQuery::create(null, $criteria)
                    ->filterByFlatdirectoryRelatedByFlatdirectoryCode($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFdfieldsRelatedByFlatdirectoryCodePartial && count($collFdfieldsRelatedByFlatdirectoryCode)) {
                      $this->initFdfieldsRelatedByFlatdirectoryCode(false);

                      foreach($collFdfieldsRelatedByFlatdirectoryCode as $obj) {
                        if (false == $this->collFdfieldsRelatedByFlatdirectoryCode->contains($obj)) {
                          $this->collFdfieldsRelatedByFlatdirectoryCode->append($obj);
                        }
                      }

                      $this->collFdfieldsRelatedByFlatdirectoryCodePartial = true;
                    }

                    $collFdfieldsRelatedByFlatdirectoryCode->getInternalIterator()->rewind();
                    return $collFdfieldsRelatedByFlatdirectoryCode;
                }

                if($partial && $this->collFdfieldsRelatedByFlatdirectoryCode) {
                    foreach($this->collFdfieldsRelatedByFlatdirectoryCode as $obj) {
                        if($obj->isNew()) {
                            $collFdfieldsRelatedByFlatdirectoryCode[] = $obj;
                        }
                    }
                }

                $this->collFdfieldsRelatedByFlatdirectoryCode = $collFdfieldsRelatedByFlatdirectoryCode;
                $this->collFdfieldsRelatedByFlatdirectoryCodePartial = false;
            }
        }

        return $this->collFdfieldsRelatedByFlatdirectoryCode;
    }

    /**
     * Sets a collection of FdfieldRelatedByFlatdirectoryCode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $fdfieldsRelatedByFlatdirectoryCode A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setFdfieldsRelatedByFlatdirectoryCode(PropelCollection $fdfieldsRelatedByFlatdirectoryCode, PropelPDO $con = null)
    {
        $fdfieldsRelatedByFlatdirectoryCodeToDelete = $this->getFdfieldsRelatedByFlatdirectoryCode(new Criteria(), $con)->diff($fdfieldsRelatedByFlatdirectoryCode);

        $this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion = unserialize(serialize($fdfieldsRelatedByFlatdirectoryCodeToDelete));

        foreach ($fdfieldsRelatedByFlatdirectoryCodeToDelete as $fdfieldRelatedByFlatdirectoryCodeRemoved) {
            $fdfieldRelatedByFlatdirectoryCodeRemoved->setFlatdirectoryRelatedByFlatdirectoryCode(null);
        }

        $this->collFdfieldsRelatedByFlatdirectoryCode = null;
        foreach ($fdfieldsRelatedByFlatdirectoryCode as $fdfieldRelatedByFlatdirectoryCode) {
            $this->addFdfieldRelatedByFlatdirectoryCode($fdfieldRelatedByFlatdirectoryCode);
        }

        $this->collFdfieldsRelatedByFlatdirectoryCode = $fdfieldsRelatedByFlatdirectoryCode;
        $this->collFdfieldsRelatedByFlatdirectoryCodePartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fdfield objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Fdfield objects.
     * @throws PropelException
     */
    public function countFdfieldsRelatedByFlatdirectoryCode(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFdfieldsRelatedByFlatdirectoryCodePartial && !$this->isNew();
        if (null === $this->collFdfieldsRelatedByFlatdirectoryCode || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFdfieldsRelatedByFlatdirectoryCode) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFdfieldsRelatedByFlatdirectoryCode());
            }
            $query = FdfieldQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFlatdirectoryRelatedByFlatdirectoryCode($this)
                ->count($con);
        }

        return count($this->collFdfieldsRelatedByFlatdirectoryCode);
    }

    /**
     * Method called to associate a Fdfield object to this object
     * through the Fdfield foreign key attribute.
     *
     * @param    Fdfield $l Fdfield
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function addFdfieldRelatedByFlatdirectoryCode(Fdfield $l)
    {
        if ($this->collFdfieldsRelatedByFlatdirectoryCode === null) {
            $this->initFdfieldsRelatedByFlatdirectoryCode();
            $this->collFdfieldsRelatedByFlatdirectoryCodePartial = true;
        }
        if (!in_array($l, $this->collFdfieldsRelatedByFlatdirectoryCode->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFdfieldRelatedByFlatdirectoryCode($l);
        }

        return $this;
    }

    /**
     * @param	FdfieldRelatedByFlatdirectoryCode $fdfieldRelatedByFlatdirectoryCode The fdfieldRelatedByFlatdirectoryCode object to add.
     */
    protected function doAddFdfieldRelatedByFlatdirectoryCode($fdfieldRelatedByFlatdirectoryCode)
    {
        $this->collFdfieldsRelatedByFlatdirectoryCode[]= $fdfieldRelatedByFlatdirectoryCode;
        $fdfieldRelatedByFlatdirectoryCode->setFlatdirectoryRelatedByFlatdirectoryCode($this);
    }

    /**
     * @param	FdfieldRelatedByFlatdirectoryCode $fdfieldRelatedByFlatdirectoryCode The fdfieldRelatedByFlatdirectoryCode object to remove.
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function removeFdfieldRelatedByFlatdirectoryCode($fdfieldRelatedByFlatdirectoryCode)
    {
        if ($this->getFdfieldsRelatedByFlatdirectoryCode()->contains($fdfieldRelatedByFlatdirectoryCode)) {
            $this->collFdfieldsRelatedByFlatdirectoryCode->remove($this->collFdfieldsRelatedByFlatdirectoryCode->search($fdfieldRelatedByFlatdirectoryCode));
            if (null === $this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion) {
                $this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion = clone $this->collFdfieldsRelatedByFlatdirectoryCode;
                $this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion->clear();
            }
            $this->fdfieldsRelatedByFlatdirectoryCodeScheduledForDeletion[]= $fdfieldRelatedByFlatdirectoryCode;
            $fdfieldRelatedByFlatdirectoryCode->setFlatdirectoryRelatedByFlatdirectoryCode(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Flatdirectory is new, it will return
     * an empty collection; or if this Flatdirectory has previously
     * been saved, it will retrieve related FdfieldsRelatedByFlatdirectoryCode from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Flatdirectory.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Fdfield[] List of Fdfield objects
     */
    public function getFdfieldsRelatedByFlatdirectoryCodeJoinFdfieldtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FdfieldQuery::create(null, $criteria);
        $query->joinWith('Fdfieldtype', $join_behavior);

        return $this->getFdfieldsRelatedByFlatdirectoryCode($query, $con);
    }

    /**
     * Clears out the collFdrecordsRelatedByFlatdirectoryId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Flatdirectory The current object (for fluent API support)
     * @see        addFdrecordsRelatedByFlatdirectoryId()
     */
    public function clearFdrecordsRelatedByFlatdirectoryId()
    {
        $this->collFdrecordsRelatedByFlatdirectoryId = null; // important to set this to null since that means it is uninitialized
        $this->collFdrecordsRelatedByFlatdirectoryIdPartial = null;

        return $this;
    }

    /**
     * reset is the collFdrecordsRelatedByFlatdirectoryId collection loaded partially
     *
     * @return void
     */
    public function resetPartialFdrecordsRelatedByFlatdirectoryId($v = true)
    {
        $this->collFdrecordsRelatedByFlatdirectoryIdPartial = $v;
    }

    /**
     * Initializes the collFdrecordsRelatedByFlatdirectoryId collection.
     *
     * By default this just sets the collFdrecordsRelatedByFlatdirectoryId collection to an empty array (like clearcollFdrecordsRelatedByFlatdirectoryId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFdrecordsRelatedByFlatdirectoryId($overrideExisting = true)
    {
        if (null !== $this->collFdrecordsRelatedByFlatdirectoryId && !$overrideExisting) {
            return;
        }
        $this->collFdrecordsRelatedByFlatdirectoryId = new PropelObjectCollection();
        $this->collFdrecordsRelatedByFlatdirectoryId->setModel('Fdrecord');
    }

    /**
     * Gets an array of Fdrecord objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Flatdirectory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Fdrecord[] List of Fdrecord objects
     * @throws PropelException
     */
    public function getFdrecordsRelatedByFlatdirectoryId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFdrecordsRelatedByFlatdirectoryIdPartial && !$this->isNew();
        if (null === $this->collFdrecordsRelatedByFlatdirectoryId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFdrecordsRelatedByFlatdirectoryId) {
                // return empty collection
                $this->initFdrecordsRelatedByFlatdirectoryId();
            } else {
                $collFdrecordsRelatedByFlatdirectoryId = FdrecordQuery::create(null, $criteria)
                    ->filterByFlatdirectoryRelatedByFlatdirectoryId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFdrecordsRelatedByFlatdirectoryIdPartial && count($collFdrecordsRelatedByFlatdirectoryId)) {
                      $this->initFdrecordsRelatedByFlatdirectoryId(false);

                      foreach($collFdrecordsRelatedByFlatdirectoryId as $obj) {
                        if (false == $this->collFdrecordsRelatedByFlatdirectoryId->contains($obj)) {
                          $this->collFdrecordsRelatedByFlatdirectoryId->append($obj);
                        }
                      }

                      $this->collFdrecordsRelatedByFlatdirectoryIdPartial = true;
                    }

                    $collFdrecordsRelatedByFlatdirectoryId->getInternalIterator()->rewind();
                    return $collFdrecordsRelatedByFlatdirectoryId;
                }

                if($partial && $this->collFdrecordsRelatedByFlatdirectoryId) {
                    foreach($this->collFdrecordsRelatedByFlatdirectoryId as $obj) {
                        if($obj->isNew()) {
                            $collFdrecordsRelatedByFlatdirectoryId[] = $obj;
                        }
                    }
                }

                $this->collFdrecordsRelatedByFlatdirectoryId = $collFdrecordsRelatedByFlatdirectoryId;
                $this->collFdrecordsRelatedByFlatdirectoryIdPartial = false;
            }
        }

        return $this->collFdrecordsRelatedByFlatdirectoryId;
    }

    /**
     * Sets a collection of FdrecordRelatedByFlatdirectoryId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $fdrecordsRelatedByFlatdirectoryId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setFdrecordsRelatedByFlatdirectoryId(PropelCollection $fdrecordsRelatedByFlatdirectoryId, PropelPDO $con = null)
    {
        $fdrecordsRelatedByFlatdirectoryIdToDelete = $this->getFdrecordsRelatedByFlatdirectoryId(new Criteria(), $con)->diff($fdrecordsRelatedByFlatdirectoryId);

        $this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion = unserialize(serialize($fdrecordsRelatedByFlatdirectoryIdToDelete));

        foreach ($fdrecordsRelatedByFlatdirectoryIdToDelete as $fdrecordRelatedByFlatdirectoryIdRemoved) {
            $fdrecordRelatedByFlatdirectoryIdRemoved->setFlatdirectoryRelatedByFlatdirectoryId(null);
        }

        $this->collFdrecordsRelatedByFlatdirectoryId = null;
        foreach ($fdrecordsRelatedByFlatdirectoryId as $fdrecordRelatedByFlatdirectoryId) {
            $this->addFdrecordRelatedByFlatdirectoryId($fdrecordRelatedByFlatdirectoryId);
        }

        $this->collFdrecordsRelatedByFlatdirectoryId = $fdrecordsRelatedByFlatdirectoryId;
        $this->collFdrecordsRelatedByFlatdirectoryIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fdrecord objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Fdrecord objects.
     * @throws PropelException
     */
    public function countFdrecordsRelatedByFlatdirectoryId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFdrecordsRelatedByFlatdirectoryIdPartial && !$this->isNew();
        if (null === $this->collFdrecordsRelatedByFlatdirectoryId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFdrecordsRelatedByFlatdirectoryId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFdrecordsRelatedByFlatdirectoryId());
            }
            $query = FdrecordQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFlatdirectoryRelatedByFlatdirectoryId($this)
                ->count($con);
        }

        return count($this->collFdrecordsRelatedByFlatdirectoryId);
    }

    /**
     * Method called to associate a Fdrecord object to this object
     * through the Fdrecord foreign key attribute.
     *
     * @param    Fdrecord $l Fdrecord
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function addFdrecordRelatedByFlatdirectoryId(Fdrecord $l)
    {
        if ($this->collFdrecordsRelatedByFlatdirectoryId === null) {
            $this->initFdrecordsRelatedByFlatdirectoryId();
            $this->collFdrecordsRelatedByFlatdirectoryIdPartial = true;
        }
        if (!in_array($l, $this->collFdrecordsRelatedByFlatdirectoryId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFdrecordRelatedByFlatdirectoryId($l);
        }

        return $this;
    }

    /**
     * @param	FdrecordRelatedByFlatdirectoryId $fdrecordRelatedByFlatdirectoryId The fdrecordRelatedByFlatdirectoryId object to add.
     */
    protected function doAddFdrecordRelatedByFlatdirectoryId($fdrecordRelatedByFlatdirectoryId)
    {
        $this->collFdrecordsRelatedByFlatdirectoryId[]= $fdrecordRelatedByFlatdirectoryId;
        $fdrecordRelatedByFlatdirectoryId->setFlatdirectoryRelatedByFlatdirectoryId($this);
    }

    /**
     * @param	FdrecordRelatedByFlatdirectoryId $fdrecordRelatedByFlatdirectoryId The fdrecordRelatedByFlatdirectoryId object to remove.
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function removeFdrecordRelatedByFlatdirectoryId($fdrecordRelatedByFlatdirectoryId)
    {
        if ($this->getFdrecordsRelatedByFlatdirectoryId()->contains($fdrecordRelatedByFlatdirectoryId)) {
            $this->collFdrecordsRelatedByFlatdirectoryId->remove($this->collFdrecordsRelatedByFlatdirectoryId->search($fdrecordRelatedByFlatdirectoryId));
            if (null === $this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion) {
                $this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion = clone $this->collFdrecordsRelatedByFlatdirectoryId;
                $this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion->clear();
            }
            $this->fdrecordsRelatedByFlatdirectoryIdScheduledForDeletion[]= clone $fdrecordRelatedByFlatdirectoryId;
            $fdrecordRelatedByFlatdirectoryId->setFlatdirectoryRelatedByFlatdirectoryId(null);
        }

        return $this;
    }

    /**
     * Clears out the collFdrecordsRelatedByFlatdirectoryCode collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Flatdirectory The current object (for fluent API support)
     * @see        addFdrecordsRelatedByFlatdirectoryCode()
     */
    public function clearFdrecordsRelatedByFlatdirectoryCode()
    {
        $this->collFdrecordsRelatedByFlatdirectoryCode = null; // important to set this to null since that means it is uninitialized
        $this->collFdrecordsRelatedByFlatdirectoryCodePartial = null;

        return $this;
    }

    /**
     * reset is the collFdrecordsRelatedByFlatdirectoryCode collection loaded partially
     *
     * @return void
     */
    public function resetPartialFdrecordsRelatedByFlatdirectoryCode($v = true)
    {
        $this->collFdrecordsRelatedByFlatdirectoryCodePartial = $v;
    }

    /**
     * Initializes the collFdrecordsRelatedByFlatdirectoryCode collection.
     *
     * By default this just sets the collFdrecordsRelatedByFlatdirectoryCode collection to an empty array (like clearcollFdrecordsRelatedByFlatdirectoryCode());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFdrecordsRelatedByFlatdirectoryCode($overrideExisting = true)
    {
        if (null !== $this->collFdrecordsRelatedByFlatdirectoryCode && !$overrideExisting) {
            return;
        }
        $this->collFdrecordsRelatedByFlatdirectoryCode = new PropelObjectCollection();
        $this->collFdrecordsRelatedByFlatdirectoryCode->setModel('Fdrecord');
    }

    /**
     * Gets an array of Fdrecord objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Flatdirectory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Fdrecord[] List of Fdrecord objects
     * @throws PropelException
     */
    public function getFdrecordsRelatedByFlatdirectoryCode($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFdrecordsRelatedByFlatdirectoryCodePartial && !$this->isNew();
        if (null === $this->collFdrecordsRelatedByFlatdirectoryCode || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFdrecordsRelatedByFlatdirectoryCode) {
                // return empty collection
                $this->initFdrecordsRelatedByFlatdirectoryCode();
            } else {
                $collFdrecordsRelatedByFlatdirectoryCode = FdrecordQuery::create(null, $criteria)
                    ->filterByFlatdirectoryRelatedByFlatdirectoryCode($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFdrecordsRelatedByFlatdirectoryCodePartial && count($collFdrecordsRelatedByFlatdirectoryCode)) {
                      $this->initFdrecordsRelatedByFlatdirectoryCode(false);

                      foreach($collFdrecordsRelatedByFlatdirectoryCode as $obj) {
                        if (false == $this->collFdrecordsRelatedByFlatdirectoryCode->contains($obj)) {
                          $this->collFdrecordsRelatedByFlatdirectoryCode->append($obj);
                        }
                      }

                      $this->collFdrecordsRelatedByFlatdirectoryCodePartial = true;
                    }

                    $collFdrecordsRelatedByFlatdirectoryCode->getInternalIterator()->rewind();
                    return $collFdrecordsRelatedByFlatdirectoryCode;
                }

                if($partial && $this->collFdrecordsRelatedByFlatdirectoryCode) {
                    foreach($this->collFdrecordsRelatedByFlatdirectoryCode as $obj) {
                        if($obj->isNew()) {
                            $collFdrecordsRelatedByFlatdirectoryCode[] = $obj;
                        }
                    }
                }

                $this->collFdrecordsRelatedByFlatdirectoryCode = $collFdrecordsRelatedByFlatdirectoryCode;
                $this->collFdrecordsRelatedByFlatdirectoryCodePartial = false;
            }
        }

        return $this->collFdrecordsRelatedByFlatdirectoryCode;
    }

    /**
     * Sets a collection of FdrecordRelatedByFlatdirectoryCode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $fdrecordsRelatedByFlatdirectoryCode A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function setFdrecordsRelatedByFlatdirectoryCode(PropelCollection $fdrecordsRelatedByFlatdirectoryCode, PropelPDO $con = null)
    {
        $fdrecordsRelatedByFlatdirectoryCodeToDelete = $this->getFdrecordsRelatedByFlatdirectoryCode(new Criteria(), $con)->diff($fdrecordsRelatedByFlatdirectoryCode);

        $this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion = unserialize(serialize($fdrecordsRelatedByFlatdirectoryCodeToDelete));

        foreach ($fdrecordsRelatedByFlatdirectoryCodeToDelete as $fdrecordRelatedByFlatdirectoryCodeRemoved) {
            $fdrecordRelatedByFlatdirectoryCodeRemoved->setFlatdirectoryRelatedByFlatdirectoryCode(null);
        }

        $this->collFdrecordsRelatedByFlatdirectoryCode = null;
        foreach ($fdrecordsRelatedByFlatdirectoryCode as $fdrecordRelatedByFlatdirectoryCode) {
            $this->addFdrecordRelatedByFlatdirectoryCode($fdrecordRelatedByFlatdirectoryCode);
        }

        $this->collFdrecordsRelatedByFlatdirectoryCode = $fdrecordsRelatedByFlatdirectoryCode;
        $this->collFdrecordsRelatedByFlatdirectoryCodePartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fdrecord objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Fdrecord objects.
     * @throws PropelException
     */
    public function countFdrecordsRelatedByFlatdirectoryCode(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFdrecordsRelatedByFlatdirectoryCodePartial && !$this->isNew();
        if (null === $this->collFdrecordsRelatedByFlatdirectoryCode || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFdrecordsRelatedByFlatdirectoryCode) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFdrecordsRelatedByFlatdirectoryCode());
            }
            $query = FdrecordQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFlatdirectoryRelatedByFlatdirectoryCode($this)
                ->count($con);
        }

        return count($this->collFdrecordsRelatedByFlatdirectoryCode);
    }

    /**
     * Method called to associate a Fdrecord object to this object
     * through the Fdrecord foreign key attribute.
     *
     * @param    Fdrecord $l Fdrecord
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function addFdrecordRelatedByFlatdirectoryCode(Fdrecord $l)
    {
        if ($this->collFdrecordsRelatedByFlatdirectoryCode === null) {
            $this->initFdrecordsRelatedByFlatdirectoryCode();
            $this->collFdrecordsRelatedByFlatdirectoryCodePartial = true;
        }
        if (!in_array($l, $this->collFdrecordsRelatedByFlatdirectoryCode->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFdrecordRelatedByFlatdirectoryCode($l);
        }

        return $this;
    }

    /**
     * @param	FdrecordRelatedByFlatdirectoryCode $fdrecordRelatedByFlatdirectoryCode The fdrecordRelatedByFlatdirectoryCode object to add.
     */
    protected function doAddFdrecordRelatedByFlatdirectoryCode($fdrecordRelatedByFlatdirectoryCode)
    {
        $this->collFdrecordsRelatedByFlatdirectoryCode[]= $fdrecordRelatedByFlatdirectoryCode;
        $fdrecordRelatedByFlatdirectoryCode->setFlatdirectoryRelatedByFlatdirectoryCode($this);
    }

    /**
     * @param	FdrecordRelatedByFlatdirectoryCode $fdrecordRelatedByFlatdirectoryCode The fdrecordRelatedByFlatdirectoryCode object to remove.
     * @return Flatdirectory The current object (for fluent API support)
     */
    public function removeFdrecordRelatedByFlatdirectoryCode($fdrecordRelatedByFlatdirectoryCode)
    {
        if ($this->getFdrecordsRelatedByFlatdirectoryCode()->contains($fdrecordRelatedByFlatdirectoryCode)) {
            $this->collFdrecordsRelatedByFlatdirectoryCode->remove($this->collFdrecordsRelatedByFlatdirectoryCode->search($fdrecordRelatedByFlatdirectoryCode));
            if (null === $this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion) {
                $this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion = clone $this->collFdrecordsRelatedByFlatdirectoryCode;
                $this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion->clear();
            }
            $this->fdrecordsRelatedByFlatdirectoryCodeScheduledForDeletion[]= $fdrecordRelatedByFlatdirectoryCode;
            $fdrecordRelatedByFlatdirectoryCode->setFlatdirectoryRelatedByFlatdirectoryCode(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->code = null;
        $this->description = null;
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
            if ($this->collClientfdpropertys) {
                foreach ($this->collClientfdpropertys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFdfieldsRelatedByFlatdirectoryId) {
                foreach ($this->collFdfieldsRelatedByFlatdirectoryId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFdfieldsRelatedByFlatdirectoryCode) {
                foreach ($this->collFdfieldsRelatedByFlatdirectoryCode as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFdrecordsRelatedByFlatdirectoryId) {
                foreach ($this->collFdrecordsRelatedByFlatdirectoryId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFdrecordsRelatedByFlatdirectoryCode) {
                foreach ($this->collFdrecordsRelatedByFlatdirectoryCode as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collClientfdpropertys instanceof PropelCollection) {
            $this->collClientfdpropertys->clearIterator();
        }
        $this->collClientfdpropertys = null;
        if ($this->collFdfieldsRelatedByFlatdirectoryId instanceof PropelCollection) {
            $this->collFdfieldsRelatedByFlatdirectoryId->clearIterator();
        }
        $this->collFdfieldsRelatedByFlatdirectoryId = null;
        if ($this->collFdfieldsRelatedByFlatdirectoryCode instanceof PropelCollection) {
            $this->collFdfieldsRelatedByFlatdirectoryCode->clearIterator();
        }
        $this->collFdfieldsRelatedByFlatdirectoryCode = null;
        if ($this->collFdrecordsRelatedByFlatdirectoryId instanceof PropelCollection) {
            $this->collFdrecordsRelatedByFlatdirectoryId->clearIterator();
        }
        $this->collFdrecordsRelatedByFlatdirectoryId = null;
        if ($this->collFdrecordsRelatedByFlatdirectoryCode instanceof PropelCollection) {
            $this->collFdrecordsRelatedByFlatdirectoryCode->clearIterator();
        }
        $this->collFdrecordsRelatedByFlatdirectoryCode = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(FlatdirectoryPeer::DEFAULT_STRING_FORMAT);
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
