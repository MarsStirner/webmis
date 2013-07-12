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
use Webmis\Models\ActiontypeTissuetype;
use Webmis\Models\ActiontypeTissuetypeQuery;
use Webmis\Models\Rbtesttubetype;
use Webmis\Models\RbtesttubetypeQuery;
use Webmis\Models\Rbunit;
use Webmis\Models\RbunitPeer;
use Webmis\Models\RbunitQuery;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\TakentissuejournalQuery;

/**
 * Base class that represents a row from the 'rbUnit' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbunit extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbunitPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbunitPeer
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
     * @var        PropelObjectCollection|ActiontypeTissuetype[] Collection to store aggregation of ActiontypeTissuetype objects.
     */
    protected $collActiontypeTissuetypes;
    protected $collActiontypeTissuetypesPartial;

    /**
     * @var        PropelObjectCollection|Takentissuejournal[] Collection to store aggregation of Takentissuejournal objects.
     */
    protected $collTakentissuejournals;
    protected $collTakentissuejournalsPartial;

    /**
     * @var        PropelObjectCollection|Rbtesttubetype[] Collection to store aggregation of Rbtesttubetype objects.
     */
    protected $collRbtesttubetypes;
    protected $collRbtesttubetypesPartial;

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
    protected $actiontypeTissuetypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $takentissuejournalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbtesttubetypesScheduledForDeletion = null;

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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbunit The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbunitPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbunit The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbunitPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbunit The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbunitPeer::NAME;
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
            $this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = RbunitPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbunit object", $e);
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
            $con = Propel::getConnection(RbunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbunitPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collActiontypeTissuetypes = null;

            $this->collTakentissuejournals = null;

            $this->collRbtesttubetypes = null;

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
            $con = Propel::getConnection(RbunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbunitQuery::create()
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
            $con = Propel::getConnection(RbunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbunitPeer::addInstanceToPool($this);
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

            if ($this->actiontypeTissuetypesScheduledForDeletion !== null) {
                if (!$this->actiontypeTissuetypesScheduledForDeletion->isEmpty()) {
                    foreach ($this->actiontypeTissuetypesScheduledForDeletion as $actiontypeTissuetype) {
                        // need to save related object because we set the relation to null
                        $actiontypeTissuetype->save($con);
                    }
                    $this->actiontypeTissuetypesScheduledForDeletion = null;
                }
            }

            if ($this->collActiontypeTissuetypes !== null) {
                foreach ($this->collActiontypeTissuetypes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->takentissuejournalsScheduledForDeletion !== null) {
                if (!$this->takentissuejournalsScheduledForDeletion->isEmpty()) {
                    foreach ($this->takentissuejournalsScheduledForDeletion as $takentissuejournal) {
                        // need to save related object because we set the relation to null
                        $takentissuejournal->save($con);
                    }
                    $this->takentissuejournalsScheduledForDeletion = null;
                }
            }

            if ($this->collTakentissuejournals !== null) {
                foreach ($this->collTakentissuejournals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rbtesttubetypesScheduledForDeletion !== null) {
                if (!$this->rbtesttubetypesScheduledForDeletion->isEmpty()) {
                    RbtesttubetypeQuery::create()
                        ->filterByPrimaryKeys($this->rbtesttubetypesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbtesttubetypesScheduledForDeletion = null;
                }
            }

            if ($this->collRbtesttubetypes !== null) {
                foreach ($this->collRbtesttubetypes as $referrerFK) {
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

        $this->modifiedColumns[] = RbunitPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbunitPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbunitPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbunitPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbunitPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `rbUnit` (%s) VALUES (%s)',
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


            if (($retval = RbunitPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActiontypeTissuetypes !== null) {
                    foreach ($this->collActiontypeTissuetypes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTakentissuejournals !== null) {
                    foreach ($this->collTakentissuejournals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbtesttubetypes !== null) {
                    foreach ($this->collRbtesttubetypes as $referrerFK) {
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
        $pos = RbunitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
        if (isset($alreadyDumpedObjects['Rbunit'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbunit'][$this->getPrimaryKey()] = true;
        $keys = RbunitPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collActiontypeTissuetypes) {
                $result['ActiontypeTissuetypes'] = $this->collActiontypeTissuetypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTakentissuejournals) {
                $result['Takentissuejournals'] = $this->collTakentissuejournals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbtesttubetypes) {
                $result['Rbtesttubetypes'] = $this->collRbtesttubetypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbunitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
        $keys = RbunitPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbunitPeer::DATABASE_NAME);

        if ($this->isColumnModified(RbunitPeer::ID)) $criteria->add(RbunitPeer::ID, $this->id);
        if ($this->isColumnModified(RbunitPeer::CODE)) $criteria->add(RbunitPeer::CODE, $this->code);
        if ($this->isColumnModified(RbunitPeer::NAME)) $criteria->add(RbunitPeer::NAME, $this->name);

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
        $criteria = new Criteria(RbunitPeer::DATABASE_NAME);
        $criteria->add(RbunitPeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbunit (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActiontypeTissuetypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontypeTissuetype($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTakentissuejournals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTakentissuejournal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRbtesttubetypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbtesttubetype($relObj->copy($deepCopy));
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
     * @return Rbunit Clone of current object.
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
     * @return RbunitPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbunitPeer();
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
        if ('ActiontypeTissuetype' == $relationName) {
            $this->initActiontypeTissuetypes();
        }
        if ('Takentissuejournal' == $relationName) {
            $this->initTakentissuejournals();
        }
        if ('Rbtesttubetype' == $relationName) {
            $this->initRbtesttubetypes();
        }
    }

    /**
     * Clears out the collActiontypeTissuetypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbunit The current object (for fluent API support)
     * @see        addActiontypeTissuetypes()
     */
    public function clearActiontypeTissuetypes()
    {
        $this->collActiontypeTissuetypes = null; // important to set this to null since that means it is uninitialized
        $this->collActiontypeTissuetypesPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontypeTissuetypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontypeTissuetypes($v = true)
    {
        $this->collActiontypeTissuetypesPartial = $v;
    }

    /**
     * Initializes the collActiontypeTissuetypes collection.
     *
     * By default this just sets the collActiontypeTissuetypes collection to an empty array (like clearcollActiontypeTissuetypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontypeTissuetypes($overrideExisting = true)
    {
        if (null !== $this->collActiontypeTissuetypes && !$overrideExisting) {
            return;
        }
        $this->collActiontypeTissuetypes = new PropelObjectCollection();
        $this->collActiontypeTissuetypes->setModel('ActiontypeTissuetype');
    }

    /**
     * Gets an array of ActiontypeTissuetype objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbunit is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActiontypeTissuetype[] List of ActiontypeTissuetype objects
     * @throws PropelException
     */
    public function getActiontypeTissuetypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeTissuetypesPartial && !$this->isNew();
        if (null === $this->collActiontypeTissuetypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontypeTissuetypes) {
                // return empty collection
                $this->initActiontypeTissuetypes();
            } else {
                $collActiontypeTissuetypes = ActiontypeTissuetypeQuery::create(null, $criteria)
                    ->filterByRbunit($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontypeTissuetypesPartial && count($collActiontypeTissuetypes)) {
                      $this->initActiontypeTissuetypes(false);

                      foreach($collActiontypeTissuetypes as $obj) {
                        if (false == $this->collActiontypeTissuetypes->contains($obj)) {
                          $this->collActiontypeTissuetypes->append($obj);
                        }
                      }

                      $this->collActiontypeTissuetypesPartial = true;
                    }

                    $collActiontypeTissuetypes->getInternalIterator()->rewind();
                    return $collActiontypeTissuetypes;
                }

                if($partial && $this->collActiontypeTissuetypes) {
                    foreach($this->collActiontypeTissuetypes as $obj) {
                        if($obj->isNew()) {
                            $collActiontypeTissuetypes[] = $obj;
                        }
                    }
                }

                $this->collActiontypeTissuetypes = $collActiontypeTissuetypes;
                $this->collActiontypeTissuetypesPartial = false;
            }
        }

        return $this->collActiontypeTissuetypes;
    }

    /**
     * Sets a collection of ActiontypeTissuetype objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontypeTissuetypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbunit The current object (for fluent API support)
     */
    public function setActiontypeTissuetypes(PropelCollection $actiontypeTissuetypes, PropelPDO $con = null)
    {
        $actiontypeTissuetypesToDelete = $this->getActiontypeTissuetypes(new Criteria(), $con)->diff($actiontypeTissuetypes);

        $this->actiontypeTissuetypesScheduledForDeletion = unserialize(serialize($actiontypeTissuetypesToDelete));

        foreach ($actiontypeTissuetypesToDelete as $actiontypeTissuetypeRemoved) {
            $actiontypeTissuetypeRemoved->setRbunit(null);
        }

        $this->collActiontypeTissuetypes = null;
        foreach ($actiontypeTissuetypes as $actiontypeTissuetype) {
            $this->addActiontypeTissuetype($actiontypeTissuetype);
        }

        $this->collActiontypeTissuetypes = $actiontypeTissuetypes;
        $this->collActiontypeTissuetypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActiontypeTissuetype objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActiontypeTissuetype objects.
     * @throws PropelException
     */
    public function countActiontypeTissuetypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeTissuetypesPartial && !$this->isNew();
        if (null === $this->collActiontypeTissuetypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontypeTissuetypes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontypeTissuetypes());
            }
            $query = ActiontypeTissuetypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbunit($this)
                ->count($con);
        }

        return count($this->collActiontypeTissuetypes);
    }

    /**
     * Method called to associate a ActiontypeTissuetype object to this object
     * through the ActiontypeTissuetype foreign key attribute.
     *
     * @param    ActiontypeTissuetype $l ActiontypeTissuetype
     * @return Rbunit The current object (for fluent API support)
     */
    public function addActiontypeTissuetype(ActiontypeTissuetype $l)
    {
        if ($this->collActiontypeTissuetypes === null) {
            $this->initActiontypeTissuetypes();
            $this->collActiontypeTissuetypesPartial = true;
        }
        if (!in_array($l, $this->collActiontypeTissuetypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontypeTissuetype($l);
        }

        return $this;
    }

    /**
     * @param	ActiontypeTissuetype $actiontypeTissuetype The actiontypeTissuetype object to add.
     */
    protected function doAddActiontypeTissuetype($actiontypeTissuetype)
    {
        $this->collActiontypeTissuetypes[]= $actiontypeTissuetype;
        $actiontypeTissuetype->setRbunit($this);
    }

    /**
     * @param	ActiontypeTissuetype $actiontypeTissuetype The actiontypeTissuetype object to remove.
     * @return Rbunit The current object (for fluent API support)
     */
    public function removeActiontypeTissuetype($actiontypeTissuetype)
    {
        if ($this->getActiontypeTissuetypes()->contains($actiontypeTissuetype)) {
            $this->collActiontypeTissuetypes->remove($this->collActiontypeTissuetypes->search($actiontypeTissuetype));
            if (null === $this->actiontypeTissuetypesScheduledForDeletion) {
                $this->actiontypeTissuetypesScheduledForDeletion = clone $this->collActiontypeTissuetypes;
                $this->actiontypeTissuetypesScheduledForDeletion->clear();
            }
            $this->actiontypeTissuetypesScheduledForDeletion[]= $actiontypeTissuetype;
            $actiontypeTissuetype->setRbunit(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbunit is new, it will return
     * an empty collection; or if this Rbunit has previously
     * been saved, it will retrieve related ActiontypeTissuetypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbunit.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeTissuetype[] List of ActiontypeTissuetype objects
     */
    public function getActiontypeTissuetypesJoinActiontype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeTissuetypeQuery::create(null, $criteria);
        $query->joinWith('Actiontype', $join_behavior);

        return $this->getActiontypeTissuetypes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbunit is new, it will return
     * an empty collection; or if this Rbunit has previously
     * been saved, it will retrieve related ActiontypeTissuetypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbunit.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeTissuetype[] List of ActiontypeTissuetype objects
     */
    public function getActiontypeTissuetypesJoinRbtissuetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeTissuetypeQuery::create(null, $criteria);
        $query->joinWith('Rbtissuetype', $join_behavior);

        return $this->getActiontypeTissuetypes($query, $con);
    }

    /**
     * Clears out the collTakentissuejournals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbunit The current object (for fluent API support)
     * @see        addTakentissuejournals()
     */
    public function clearTakentissuejournals()
    {
        $this->collTakentissuejournals = null; // important to set this to null since that means it is uninitialized
        $this->collTakentissuejournalsPartial = null;

        return $this;
    }

    /**
     * reset is the collTakentissuejournals collection loaded partially
     *
     * @return void
     */
    public function resetPartialTakentissuejournals($v = true)
    {
        $this->collTakentissuejournalsPartial = $v;
    }

    /**
     * Initializes the collTakentissuejournals collection.
     *
     * By default this just sets the collTakentissuejournals collection to an empty array (like clearcollTakentissuejournals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTakentissuejournals($overrideExisting = true)
    {
        if (null !== $this->collTakentissuejournals && !$overrideExisting) {
            return;
        }
        $this->collTakentissuejournals = new PropelObjectCollection();
        $this->collTakentissuejournals->setModel('Takentissuejournal');
    }

    /**
     * Gets an array of Takentissuejournal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbunit is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     * @throws PropelException
     */
    public function getTakentissuejournals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTakentissuejournalsPartial && !$this->isNew();
        if (null === $this->collTakentissuejournals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTakentissuejournals) {
                // return empty collection
                $this->initTakentissuejournals();
            } else {
                $collTakentissuejournals = TakentissuejournalQuery::create(null, $criteria)
                    ->filterByRbunit($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTakentissuejournalsPartial && count($collTakentissuejournals)) {
                      $this->initTakentissuejournals(false);

                      foreach($collTakentissuejournals as $obj) {
                        if (false == $this->collTakentissuejournals->contains($obj)) {
                          $this->collTakentissuejournals->append($obj);
                        }
                      }

                      $this->collTakentissuejournalsPartial = true;
                    }

                    $collTakentissuejournals->getInternalIterator()->rewind();
                    return $collTakentissuejournals;
                }

                if($partial && $this->collTakentissuejournals) {
                    foreach($this->collTakentissuejournals as $obj) {
                        if($obj->isNew()) {
                            $collTakentissuejournals[] = $obj;
                        }
                    }
                }

                $this->collTakentissuejournals = $collTakentissuejournals;
                $this->collTakentissuejournalsPartial = false;
            }
        }

        return $this->collTakentissuejournals;
    }

    /**
     * Sets a collection of Takentissuejournal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $takentissuejournals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbunit The current object (for fluent API support)
     */
    public function setTakentissuejournals(PropelCollection $takentissuejournals, PropelPDO $con = null)
    {
        $takentissuejournalsToDelete = $this->getTakentissuejournals(new Criteria(), $con)->diff($takentissuejournals);

        $this->takentissuejournalsScheduledForDeletion = unserialize(serialize($takentissuejournalsToDelete));

        foreach ($takentissuejournalsToDelete as $takentissuejournalRemoved) {
            $takentissuejournalRemoved->setRbunit(null);
        }

        $this->collTakentissuejournals = null;
        foreach ($takentissuejournals as $takentissuejournal) {
            $this->addTakentissuejournal($takentissuejournal);
        }

        $this->collTakentissuejournals = $takentissuejournals;
        $this->collTakentissuejournalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Takentissuejournal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Takentissuejournal objects.
     * @throws PropelException
     */
    public function countTakentissuejournals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTakentissuejournalsPartial && !$this->isNew();
        if (null === $this->collTakentissuejournals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTakentissuejournals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTakentissuejournals());
            }
            $query = TakentissuejournalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbunit($this)
                ->count($con);
        }

        return count($this->collTakentissuejournals);
    }

    /**
     * Method called to associate a Takentissuejournal object to this object
     * through the Takentissuejournal foreign key attribute.
     *
     * @param    Takentissuejournal $l Takentissuejournal
     * @return Rbunit The current object (for fluent API support)
     */
    public function addTakentissuejournal(Takentissuejournal $l)
    {
        if ($this->collTakentissuejournals === null) {
            $this->initTakentissuejournals();
            $this->collTakentissuejournalsPartial = true;
        }
        if (!in_array($l, $this->collTakentissuejournals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTakentissuejournal($l);
        }

        return $this;
    }

    /**
     * @param	Takentissuejournal $takentissuejournal The takentissuejournal object to add.
     */
    protected function doAddTakentissuejournal($takentissuejournal)
    {
        $this->collTakentissuejournals[]= $takentissuejournal;
        $takentissuejournal->setRbunit($this);
    }

    /**
     * @param	Takentissuejournal $takentissuejournal The takentissuejournal object to remove.
     * @return Rbunit The current object (for fluent API support)
     */
    public function removeTakentissuejournal($takentissuejournal)
    {
        if ($this->getTakentissuejournals()->contains($takentissuejournal)) {
            $this->collTakentissuejournals->remove($this->collTakentissuejournals->search($takentissuejournal));
            if (null === $this->takentissuejournalsScheduledForDeletion) {
                $this->takentissuejournalsScheduledForDeletion = clone $this->collTakentissuejournals;
                $this->takentissuejournalsScheduledForDeletion->clear();
            }
            $this->takentissuejournalsScheduledForDeletion[]= $takentissuejournal;
            $takentissuejournal->setRbunit(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbunit is new, it will return
     * an empty collection; or if this Rbunit has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbunit.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbunit is new, it will return
     * an empty collection; or if this Rbunit has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbunit.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinRbtissuetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Rbtissuetype', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbunit is new, it will return
     * an empty collection; or if this Rbunit has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbunit.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
    }

    /**
     * Clears out the collRbtesttubetypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbunit The current object (for fluent API support)
     * @see        addRbtesttubetypes()
     */
    public function clearRbtesttubetypes()
    {
        $this->collRbtesttubetypes = null; // important to set this to null since that means it is uninitialized
        $this->collRbtesttubetypesPartial = null;

        return $this;
    }

    /**
     * reset is the collRbtesttubetypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbtesttubetypes($v = true)
    {
        $this->collRbtesttubetypesPartial = $v;
    }

    /**
     * Initializes the collRbtesttubetypes collection.
     *
     * By default this just sets the collRbtesttubetypes collection to an empty array (like clearcollRbtesttubetypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbtesttubetypes($overrideExisting = true)
    {
        if (null !== $this->collRbtesttubetypes && !$overrideExisting) {
            return;
        }
        $this->collRbtesttubetypes = new PropelObjectCollection();
        $this->collRbtesttubetypes->setModel('Rbtesttubetype');
    }

    /**
     * Gets an array of Rbtesttubetype objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbunit is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rbtesttubetype[] List of Rbtesttubetype objects
     * @throws PropelException
     */
    public function getRbtesttubetypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbtesttubetypesPartial && !$this->isNew();
        if (null === $this->collRbtesttubetypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbtesttubetypes) {
                // return empty collection
                $this->initRbtesttubetypes();
            } else {
                $collRbtesttubetypes = RbtesttubetypeQuery::create(null, $criteria)
                    ->filterByRbunit($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbtesttubetypesPartial && count($collRbtesttubetypes)) {
                      $this->initRbtesttubetypes(false);

                      foreach($collRbtesttubetypes as $obj) {
                        if (false == $this->collRbtesttubetypes->contains($obj)) {
                          $this->collRbtesttubetypes->append($obj);
                        }
                      }

                      $this->collRbtesttubetypesPartial = true;
                    }

                    $collRbtesttubetypes->getInternalIterator()->rewind();
                    return $collRbtesttubetypes;
                }

                if($partial && $this->collRbtesttubetypes) {
                    foreach($this->collRbtesttubetypes as $obj) {
                        if($obj->isNew()) {
                            $collRbtesttubetypes[] = $obj;
                        }
                    }
                }

                $this->collRbtesttubetypes = $collRbtesttubetypes;
                $this->collRbtesttubetypesPartial = false;
            }
        }

        return $this->collRbtesttubetypes;
    }

    /**
     * Sets a collection of Rbtesttubetype objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbtesttubetypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbunit The current object (for fluent API support)
     */
    public function setRbtesttubetypes(PropelCollection $rbtesttubetypes, PropelPDO $con = null)
    {
        $rbtesttubetypesToDelete = $this->getRbtesttubetypes(new Criteria(), $con)->diff($rbtesttubetypes);

        $this->rbtesttubetypesScheduledForDeletion = unserialize(serialize($rbtesttubetypesToDelete));

        foreach ($rbtesttubetypesToDelete as $rbtesttubetypeRemoved) {
            $rbtesttubetypeRemoved->setRbunit(null);
        }

        $this->collRbtesttubetypes = null;
        foreach ($rbtesttubetypes as $rbtesttubetype) {
            $this->addRbtesttubetype($rbtesttubetype);
        }

        $this->collRbtesttubetypes = $rbtesttubetypes;
        $this->collRbtesttubetypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbtesttubetype objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rbtesttubetype objects.
     * @throws PropelException
     */
    public function countRbtesttubetypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbtesttubetypesPartial && !$this->isNew();
        if (null === $this->collRbtesttubetypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbtesttubetypes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbtesttubetypes());
            }
            $query = RbtesttubetypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbunit($this)
                ->count($con);
        }

        return count($this->collRbtesttubetypes);
    }

    /**
     * Method called to associate a Rbtesttubetype object to this object
     * through the Rbtesttubetype foreign key attribute.
     *
     * @param    Rbtesttubetype $l Rbtesttubetype
     * @return Rbunit The current object (for fluent API support)
     */
    public function addRbtesttubetype(Rbtesttubetype $l)
    {
        if ($this->collRbtesttubetypes === null) {
            $this->initRbtesttubetypes();
            $this->collRbtesttubetypesPartial = true;
        }
        if (!in_array($l, $this->collRbtesttubetypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbtesttubetype($l);
        }

        return $this;
    }

    /**
     * @param	Rbtesttubetype $rbtesttubetype The rbtesttubetype object to add.
     */
    protected function doAddRbtesttubetype($rbtesttubetype)
    {
        $this->collRbtesttubetypes[]= $rbtesttubetype;
        $rbtesttubetype->setRbunit($this);
    }

    /**
     * @param	Rbtesttubetype $rbtesttubetype The rbtesttubetype object to remove.
     * @return Rbunit The current object (for fluent API support)
     */
    public function removeRbtesttubetype($rbtesttubetype)
    {
        if ($this->getRbtesttubetypes()->contains($rbtesttubetype)) {
            $this->collRbtesttubetypes->remove($this->collRbtesttubetypes->search($rbtesttubetype));
            if (null === $this->rbtesttubetypesScheduledForDeletion) {
                $this->rbtesttubetypesScheduledForDeletion = clone $this->collRbtesttubetypes;
                $this->rbtesttubetypesScheduledForDeletion->clear();
            }
            $this->rbtesttubetypesScheduledForDeletion[]= clone $rbtesttubetype;
            $rbtesttubetype->setRbunit(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
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
            if ($this->collActiontypeTissuetypes) {
                foreach ($this->collActiontypeTissuetypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTakentissuejournals) {
                foreach ($this->collTakentissuejournals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbtesttubetypes) {
                foreach ($this->collRbtesttubetypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActiontypeTissuetypes instanceof PropelCollection) {
            $this->collActiontypeTissuetypes->clearIterator();
        }
        $this->collActiontypeTissuetypes = null;
        if ($this->collTakentissuejournals instanceof PropelCollection) {
            $this->collTakentissuejournals->clearIterator();
        }
        $this->collTakentissuejournals = null;
        if ($this->collRbtesttubetypes instanceof PropelCollection) {
            $this->collRbtesttubetypes->clearIterator();
        }
        $this->collRbtesttubetypes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbunitPeer::DEFAULT_STRING_FORMAT);
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
