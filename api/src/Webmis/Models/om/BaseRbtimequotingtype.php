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
use Webmis\Models\Couponstransferquotes;
use Webmis\Models\CouponstransferquotesQuery;
use Webmis\Models\Rbtimequotingtype;
use Webmis\Models\RbtimequotingtypePeer;
use Webmis\Models\RbtimequotingtypeQuery;

/**
 * Base class that represents a row from the 'rbTimeQuotingType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtimequotingtype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbtimequotingtypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbtimequotingtypePeer
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
     * @var        int
     */
    protected $code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|Couponstransferquotes[] Collection to store aggregation of Couponstransferquotes objects.
     */
    protected $collCouponstransferquotessRelatedBySrcquotingtypeId;
    protected $collCouponstransferquotessRelatedBySrcquotingtypeIdPartial;

    /**
     * @var        PropelObjectCollection|Couponstransferquotes[] Collection to store aggregation of Couponstransferquotes objects.
     */
    protected $collCouponstransferquotessRelatedByDstquotingtypeId;
    protected $collCouponstransferquotessRelatedByDstquotingtypeIdPartial;

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
    protected $couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion = null;

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
     * @return int
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
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbtimequotingtypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param int $v new value
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbtimequotingtypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbtimequotingtypePeer::NAME;
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
            $this->code = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = RbtimequotingtypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbtimequotingtype object", $e);
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
            $con = Propel::getConnection(RbtimequotingtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbtimequotingtypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCouponstransferquotessRelatedBySrcquotingtypeId = null;

            $this->collCouponstransferquotessRelatedByDstquotingtypeId = null;

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
            $con = Propel::getConnection(RbtimequotingtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbtimequotingtypeQuery::create()
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
            $con = Propel::getConnection(RbtimequotingtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbtimequotingtypePeer::addInstanceToPool($this);
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

            if ($this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion !== null) {
                if (!$this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion->isEmpty()) {
                    CouponstransferquotesQuery::create()
                        ->filterByPrimaryKeys($this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion = null;
                }
            }

            if ($this->collCouponstransferquotessRelatedBySrcquotingtypeId !== null) {
                foreach ($this->collCouponstransferquotessRelatedBySrcquotingtypeId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion !== null) {
                if (!$this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion->isEmpty()) {
                    CouponstransferquotesQuery::create()
                        ->filterByPrimaryKeys($this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion = null;
                }
            }

            if ($this->collCouponstransferquotessRelatedByDstquotingtypeId !== null) {
                foreach ($this->collCouponstransferquotessRelatedByDstquotingtypeId as $referrerFK) {
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

        $this->modifiedColumns[] = RbtimequotingtypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbtimequotingtypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbtimequotingtypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbtimequotingtypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbtimequotingtypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `rbTimeQuotingType` (%s) VALUES (%s)',
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
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_INT);
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


            if (($retval = RbtimequotingtypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCouponstransferquotessRelatedBySrcquotingtypeId !== null) {
                    foreach ($this->collCouponstransferquotessRelatedBySrcquotingtypeId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCouponstransferquotessRelatedByDstquotingtypeId !== null) {
                    foreach ($this->collCouponstransferquotessRelatedByDstquotingtypeId as $referrerFK) {
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
        $pos = RbtimequotingtypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
        if (isset($alreadyDumpedObjects['Rbtimequotingtype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbtimequotingtype'][$this->getPrimaryKey()] = true;
        $keys = RbtimequotingtypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCouponstransferquotessRelatedBySrcquotingtypeId) {
                $result['CouponstransferquotessRelatedBySrcquotingtypeId'] = $this->collCouponstransferquotessRelatedBySrcquotingtypeId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCouponstransferquotessRelatedByDstquotingtypeId) {
                $result['CouponstransferquotessRelatedByDstquotingtypeId'] = $this->collCouponstransferquotessRelatedByDstquotingtypeId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbtimequotingtypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
        $keys = RbtimequotingtypePeer::getFieldNames($keyType);

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
        $criteria = new Criteria(RbtimequotingtypePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbtimequotingtypePeer::ID)) $criteria->add(RbtimequotingtypePeer::ID, $this->id);
        if ($this->isColumnModified(RbtimequotingtypePeer::CODE)) $criteria->add(RbtimequotingtypePeer::CODE, $this->code);
        if ($this->isColumnModified(RbtimequotingtypePeer::NAME)) $criteria->add(RbtimequotingtypePeer::NAME, $this->name);

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
        $criteria = new Criteria(RbtimequotingtypePeer::DATABASE_NAME);
        $criteria->add(RbtimequotingtypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbtimequotingtype (or compatible) type.
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

            foreach ($this->getCouponstransferquotessRelatedBySrcquotingtypeId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCouponstransferquotesRelatedBySrcquotingtypeId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCouponstransferquotessRelatedByDstquotingtypeId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCouponstransferquotesRelatedByDstquotingtypeId($relObj->copy($deepCopy));
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
     * @return Rbtimequotingtype Clone of current object.
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
     * @return RbtimequotingtypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbtimequotingtypePeer();
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
        if ('CouponstransferquotesRelatedBySrcquotingtypeId' == $relationName) {
            $this->initCouponstransferquotessRelatedBySrcquotingtypeId();
        }
        if ('CouponstransferquotesRelatedByDstquotingtypeId' == $relationName) {
            $this->initCouponstransferquotessRelatedByDstquotingtypeId();
        }
    }

    /**
     * Clears out the collCouponstransferquotessRelatedBySrcquotingtypeId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbtimequotingtype The current object (for fluent API support)
     * @see        addCouponstransferquotessRelatedBySrcquotingtypeId()
     */
    public function clearCouponstransferquotessRelatedBySrcquotingtypeId()
    {
        $this->collCouponstransferquotessRelatedBySrcquotingtypeId = null; // important to set this to null since that means it is uninitialized
        $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial = null;

        return $this;
    }

    /**
     * reset is the collCouponstransferquotessRelatedBySrcquotingtypeId collection loaded partially
     *
     * @return void
     */
    public function resetPartialCouponstransferquotessRelatedBySrcquotingtypeId($v = true)
    {
        $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial = $v;
    }

    /**
     * Initializes the collCouponstransferquotessRelatedBySrcquotingtypeId collection.
     *
     * By default this just sets the collCouponstransferquotessRelatedBySrcquotingtypeId collection to an empty array (like clearcollCouponstransferquotessRelatedBySrcquotingtypeId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCouponstransferquotessRelatedBySrcquotingtypeId($overrideExisting = true)
    {
        if (null !== $this->collCouponstransferquotessRelatedBySrcquotingtypeId && !$overrideExisting) {
            return;
        }
        $this->collCouponstransferquotessRelatedBySrcquotingtypeId = new PropelObjectCollection();
        $this->collCouponstransferquotessRelatedBySrcquotingtypeId->setModel('Couponstransferquotes');
    }

    /**
     * Gets an array of Couponstransferquotes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbtimequotingtype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Couponstransferquotes[] List of Couponstransferquotes objects
     * @throws PropelException
     */
    public function getCouponstransferquotessRelatedBySrcquotingtypeId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial && !$this->isNew();
        if (null === $this->collCouponstransferquotessRelatedBySrcquotingtypeId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCouponstransferquotessRelatedBySrcquotingtypeId) {
                // return empty collection
                $this->initCouponstransferquotessRelatedBySrcquotingtypeId();
            } else {
                $collCouponstransferquotessRelatedBySrcquotingtypeId = CouponstransferquotesQuery::create(null, $criteria)
                    ->filterByRbtimequotingtypeRelatedBySrcquotingtypeId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial && count($collCouponstransferquotessRelatedBySrcquotingtypeId)) {
                      $this->initCouponstransferquotessRelatedBySrcquotingtypeId(false);

                      foreach($collCouponstransferquotessRelatedBySrcquotingtypeId as $obj) {
                        if (false == $this->collCouponstransferquotessRelatedBySrcquotingtypeId->contains($obj)) {
                          $this->collCouponstransferquotessRelatedBySrcquotingtypeId->append($obj);
                        }
                      }

                      $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial = true;
                    }

                    $collCouponstransferquotessRelatedBySrcquotingtypeId->getInternalIterator()->rewind();
                    return $collCouponstransferquotessRelatedBySrcquotingtypeId;
                }

                if($partial && $this->collCouponstransferquotessRelatedBySrcquotingtypeId) {
                    foreach($this->collCouponstransferquotessRelatedBySrcquotingtypeId as $obj) {
                        if($obj->isNew()) {
                            $collCouponstransferquotessRelatedBySrcquotingtypeId[] = $obj;
                        }
                    }
                }

                $this->collCouponstransferquotessRelatedBySrcquotingtypeId = $collCouponstransferquotessRelatedBySrcquotingtypeId;
                $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial = false;
            }
        }

        return $this->collCouponstransferquotessRelatedBySrcquotingtypeId;
    }

    /**
     * Sets a collection of CouponstransferquotesRelatedBySrcquotingtypeId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $couponstransferquotessRelatedBySrcquotingtypeId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function setCouponstransferquotessRelatedBySrcquotingtypeId(PropelCollection $couponstransferquotessRelatedBySrcquotingtypeId, PropelPDO $con = null)
    {
        $couponstransferquotessRelatedBySrcquotingtypeIdToDelete = $this->getCouponstransferquotessRelatedBySrcquotingtypeId(new Criteria(), $con)->diff($couponstransferquotessRelatedBySrcquotingtypeId);

        $this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion = unserialize(serialize($couponstransferquotessRelatedBySrcquotingtypeIdToDelete));

        foreach ($couponstransferquotessRelatedBySrcquotingtypeIdToDelete as $couponstransferquotesRelatedBySrcquotingtypeIdRemoved) {
            $couponstransferquotesRelatedBySrcquotingtypeIdRemoved->setRbtimequotingtypeRelatedBySrcquotingtypeId(null);
        }

        $this->collCouponstransferquotessRelatedBySrcquotingtypeId = null;
        foreach ($couponstransferquotessRelatedBySrcquotingtypeId as $couponstransferquotesRelatedBySrcquotingtypeId) {
            $this->addCouponstransferquotesRelatedBySrcquotingtypeId($couponstransferquotesRelatedBySrcquotingtypeId);
        }

        $this->collCouponstransferquotessRelatedBySrcquotingtypeId = $couponstransferquotessRelatedBySrcquotingtypeId;
        $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Couponstransferquotes objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Couponstransferquotes objects.
     * @throws PropelException
     */
    public function countCouponstransferquotessRelatedBySrcquotingtypeId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial && !$this->isNew();
        if (null === $this->collCouponstransferquotessRelatedBySrcquotingtypeId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCouponstransferquotessRelatedBySrcquotingtypeId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCouponstransferquotessRelatedBySrcquotingtypeId());
            }
            $query = CouponstransferquotesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbtimequotingtypeRelatedBySrcquotingtypeId($this)
                ->count($con);
        }

        return count($this->collCouponstransferquotessRelatedBySrcquotingtypeId);
    }

    /**
     * Method called to associate a Couponstransferquotes object to this object
     * through the Couponstransferquotes foreign key attribute.
     *
     * @param    Couponstransferquotes $l Couponstransferquotes
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function addCouponstransferquotesRelatedBySrcquotingtypeId(Couponstransferquotes $l)
    {
        if ($this->collCouponstransferquotessRelatedBySrcquotingtypeId === null) {
            $this->initCouponstransferquotessRelatedBySrcquotingtypeId();
            $this->collCouponstransferquotessRelatedBySrcquotingtypeIdPartial = true;
        }
        if (!in_array($l, $this->collCouponstransferquotessRelatedBySrcquotingtypeId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCouponstransferquotesRelatedBySrcquotingtypeId($l);
        }

        return $this;
    }

    /**
     * @param	CouponstransferquotesRelatedBySrcquotingtypeId $couponstransferquotesRelatedBySrcquotingtypeId The couponstransferquotesRelatedBySrcquotingtypeId object to add.
     */
    protected function doAddCouponstransferquotesRelatedBySrcquotingtypeId($couponstransferquotesRelatedBySrcquotingtypeId)
    {
        $this->collCouponstransferquotessRelatedBySrcquotingtypeId[]= $couponstransferquotesRelatedBySrcquotingtypeId;
        $couponstransferquotesRelatedBySrcquotingtypeId->setRbtimequotingtypeRelatedBySrcquotingtypeId($this);
    }

    /**
     * @param	CouponstransferquotesRelatedBySrcquotingtypeId $couponstransferquotesRelatedBySrcquotingtypeId The couponstransferquotesRelatedBySrcquotingtypeId object to remove.
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function removeCouponstransferquotesRelatedBySrcquotingtypeId($couponstransferquotesRelatedBySrcquotingtypeId)
    {
        if ($this->getCouponstransferquotessRelatedBySrcquotingtypeId()->contains($couponstransferquotesRelatedBySrcquotingtypeId)) {
            $this->collCouponstransferquotessRelatedBySrcquotingtypeId->remove($this->collCouponstransferquotessRelatedBySrcquotingtypeId->search($couponstransferquotesRelatedBySrcquotingtypeId));
            if (null === $this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion) {
                $this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion = clone $this->collCouponstransferquotessRelatedBySrcquotingtypeId;
                $this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion->clear();
            }
            $this->couponstransferquotessRelatedBySrcquotingtypeIdScheduledForDeletion[]= clone $couponstransferquotesRelatedBySrcquotingtypeId;
            $couponstransferquotesRelatedBySrcquotingtypeId->setRbtimequotingtypeRelatedBySrcquotingtypeId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbtimequotingtype is new, it will return
     * an empty collection; or if this Rbtimequotingtype has previously
     * been saved, it will retrieve related CouponstransferquotessRelatedBySrcquotingtypeId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbtimequotingtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Couponstransferquotes[] List of Couponstransferquotes objects
     */
    public function getCouponstransferquotessRelatedBySrcquotingtypeIdJoinRbtransferdatetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CouponstransferquotesQuery::create(null, $criteria);
        $query->joinWith('Rbtransferdatetype', $join_behavior);

        return $this->getCouponstransferquotessRelatedBySrcquotingtypeId($query, $con);
    }

    /**
     * Clears out the collCouponstransferquotessRelatedByDstquotingtypeId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbtimequotingtype The current object (for fluent API support)
     * @see        addCouponstransferquotessRelatedByDstquotingtypeId()
     */
    public function clearCouponstransferquotessRelatedByDstquotingtypeId()
    {
        $this->collCouponstransferquotessRelatedByDstquotingtypeId = null; // important to set this to null since that means it is uninitialized
        $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial = null;

        return $this;
    }

    /**
     * reset is the collCouponstransferquotessRelatedByDstquotingtypeId collection loaded partially
     *
     * @return void
     */
    public function resetPartialCouponstransferquotessRelatedByDstquotingtypeId($v = true)
    {
        $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial = $v;
    }

    /**
     * Initializes the collCouponstransferquotessRelatedByDstquotingtypeId collection.
     *
     * By default this just sets the collCouponstransferquotessRelatedByDstquotingtypeId collection to an empty array (like clearcollCouponstransferquotessRelatedByDstquotingtypeId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCouponstransferquotessRelatedByDstquotingtypeId($overrideExisting = true)
    {
        if (null !== $this->collCouponstransferquotessRelatedByDstquotingtypeId && !$overrideExisting) {
            return;
        }
        $this->collCouponstransferquotessRelatedByDstquotingtypeId = new PropelObjectCollection();
        $this->collCouponstransferquotessRelatedByDstquotingtypeId->setModel('Couponstransferquotes');
    }

    /**
     * Gets an array of Couponstransferquotes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbtimequotingtype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Couponstransferquotes[] List of Couponstransferquotes objects
     * @throws PropelException
     */
    public function getCouponstransferquotessRelatedByDstquotingtypeId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial && !$this->isNew();
        if (null === $this->collCouponstransferquotessRelatedByDstquotingtypeId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCouponstransferquotessRelatedByDstquotingtypeId) {
                // return empty collection
                $this->initCouponstransferquotessRelatedByDstquotingtypeId();
            } else {
                $collCouponstransferquotessRelatedByDstquotingtypeId = CouponstransferquotesQuery::create(null, $criteria)
                    ->filterByRbtimequotingtypeRelatedByDstquotingtypeId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial && count($collCouponstransferquotessRelatedByDstquotingtypeId)) {
                      $this->initCouponstransferquotessRelatedByDstquotingtypeId(false);

                      foreach($collCouponstransferquotessRelatedByDstquotingtypeId as $obj) {
                        if (false == $this->collCouponstransferquotessRelatedByDstquotingtypeId->contains($obj)) {
                          $this->collCouponstransferquotessRelatedByDstquotingtypeId->append($obj);
                        }
                      }

                      $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial = true;
                    }

                    $collCouponstransferquotessRelatedByDstquotingtypeId->getInternalIterator()->rewind();
                    return $collCouponstransferquotessRelatedByDstquotingtypeId;
                }

                if($partial && $this->collCouponstransferquotessRelatedByDstquotingtypeId) {
                    foreach($this->collCouponstransferquotessRelatedByDstquotingtypeId as $obj) {
                        if($obj->isNew()) {
                            $collCouponstransferquotessRelatedByDstquotingtypeId[] = $obj;
                        }
                    }
                }

                $this->collCouponstransferquotessRelatedByDstquotingtypeId = $collCouponstransferquotessRelatedByDstquotingtypeId;
                $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial = false;
            }
        }

        return $this->collCouponstransferquotessRelatedByDstquotingtypeId;
    }

    /**
     * Sets a collection of CouponstransferquotesRelatedByDstquotingtypeId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $couponstransferquotessRelatedByDstquotingtypeId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function setCouponstransferquotessRelatedByDstquotingtypeId(PropelCollection $couponstransferquotessRelatedByDstquotingtypeId, PropelPDO $con = null)
    {
        $couponstransferquotessRelatedByDstquotingtypeIdToDelete = $this->getCouponstransferquotessRelatedByDstquotingtypeId(new Criteria(), $con)->diff($couponstransferquotessRelatedByDstquotingtypeId);

        $this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion = unserialize(serialize($couponstransferquotessRelatedByDstquotingtypeIdToDelete));

        foreach ($couponstransferquotessRelatedByDstquotingtypeIdToDelete as $couponstransferquotesRelatedByDstquotingtypeIdRemoved) {
            $couponstransferquotesRelatedByDstquotingtypeIdRemoved->setRbtimequotingtypeRelatedByDstquotingtypeId(null);
        }

        $this->collCouponstransferquotessRelatedByDstquotingtypeId = null;
        foreach ($couponstransferquotessRelatedByDstquotingtypeId as $couponstransferquotesRelatedByDstquotingtypeId) {
            $this->addCouponstransferquotesRelatedByDstquotingtypeId($couponstransferquotesRelatedByDstquotingtypeId);
        }

        $this->collCouponstransferquotessRelatedByDstquotingtypeId = $couponstransferquotessRelatedByDstquotingtypeId;
        $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Couponstransferquotes objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Couponstransferquotes objects.
     * @throws PropelException
     */
    public function countCouponstransferquotessRelatedByDstquotingtypeId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial && !$this->isNew();
        if (null === $this->collCouponstransferquotessRelatedByDstquotingtypeId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCouponstransferquotessRelatedByDstquotingtypeId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCouponstransferquotessRelatedByDstquotingtypeId());
            }
            $query = CouponstransferquotesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbtimequotingtypeRelatedByDstquotingtypeId($this)
                ->count($con);
        }

        return count($this->collCouponstransferquotessRelatedByDstquotingtypeId);
    }

    /**
     * Method called to associate a Couponstransferquotes object to this object
     * through the Couponstransferquotes foreign key attribute.
     *
     * @param    Couponstransferquotes $l Couponstransferquotes
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function addCouponstransferquotesRelatedByDstquotingtypeId(Couponstransferquotes $l)
    {
        if ($this->collCouponstransferquotessRelatedByDstquotingtypeId === null) {
            $this->initCouponstransferquotessRelatedByDstquotingtypeId();
            $this->collCouponstransferquotessRelatedByDstquotingtypeIdPartial = true;
        }
        if (!in_array($l, $this->collCouponstransferquotessRelatedByDstquotingtypeId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCouponstransferquotesRelatedByDstquotingtypeId($l);
        }

        return $this;
    }

    /**
     * @param	CouponstransferquotesRelatedByDstquotingtypeId $couponstransferquotesRelatedByDstquotingtypeId The couponstransferquotesRelatedByDstquotingtypeId object to add.
     */
    protected function doAddCouponstransferquotesRelatedByDstquotingtypeId($couponstransferquotesRelatedByDstquotingtypeId)
    {
        $this->collCouponstransferquotessRelatedByDstquotingtypeId[]= $couponstransferquotesRelatedByDstquotingtypeId;
        $couponstransferquotesRelatedByDstquotingtypeId->setRbtimequotingtypeRelatedByDstquotingtypeId($this);
    }

    /**
     * @param	CouponstransferquotesRelatedByDstquotingtypeId $couponstransferquotesRelatedByDstquotingtypeId The couponstransferquotesRelatedByDstquotingtypeId object to remove.
     * @return Rbtimequotingtype The current object (for fluent API support)
     */
    public function removeCouponstransferquotesRelatedByDstquotingtypeId($couponstransferquotesRelatedByDstquotingtypeId)
    {
        if ($this->getCouponstransferquotessRelatedByDstquotingtypeId()->contains($couponstransferquotesRelatedByDstquotingtypeId)) {
            $this->collCouponstransferquotessRelatedByDstquotingtypeId->remove($this->collCouponstransferquotessRelatedByDstquotingtypeId->search($couponstransferquotesRelatedByDstquotingtypeId));
            if (null === $this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion) {
                $this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion = clone $this->collCouponstransferquotessRelatedByDstquotingtypeId;
                $this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion->clear();
            }
            $this->couponstransferquotessRelatedByDstquotingtypeIdScheduledForDeletion[]= clone $couponstransferquotesRelatedByDstquotingtypeId;
            $couponstransferquotesRelatedByDstquotingtypeId->setRbtimequotingtypeRelatedByDstquotingtypeId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbtimequotingtype is new, it will return
     * an empty collection; or if this Rbtimequotingtype has previously
     * been saved, it will retrieve related CouponstransferquotessRelatedByDstquotingtypeId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbtimequotingtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Couponstransferquotes[] List of Couponstransferquotes objects
     */
    public function getCouponstransferquotessRelatedByDstquotingtypeIdJoinRbtransferdatetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CouponstransferquotesQuery::create(null, $criteria);
        $query->joinWith('Rbtransferdatetype', $join_behavior);

        return $this->getCouponstransferquotessRelatedByDstquotingtypeId($query, $con);
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
            if ($this->collCouponstransferquotessRelatedBySrcquotingtypeId) {
                foreach ($this->collCouponstransferquotessRelatedBySrcquotingtypeId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCouponstransferquotessRelatedByDstquotingtypeId) {
                foreach ($this->collCouponstransferquotessRelatedByDstquotingtypeId as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCouponstransferquotessRelatedBySrcquotingtypeId instanceof PropelCollection) {
            $this->collCouponstransferquotessRelatedBySrcquotingtypeId->clearIterator();
        }
        $this->collCouponstransferquotessRelatedBySrcquotingtypeId = null;
        if ($this->collCouponstransferquotessRelatedByDstquotingtypeId instanceof PropelCollection) {
            $this->collCouponstransferquotessRelatedByDstquotingtypeId->clearIterator();
        }
        $this->collCouponstransferquotessRelatedByDstquotingtypeId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbtimequotingtypePeer::DEFAULT_STRING_FORMAT);
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
