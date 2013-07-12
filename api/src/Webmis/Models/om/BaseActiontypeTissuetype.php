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
use Webmis\Models\Actiontype;
use Webmis\Models\ActiontypeQuery;
use Webmis\Models\ActiontypeTissuetype;
use Webmis\Models\ActiontypeTissuetypePeer;
use Webmis\Models\ActiontypeTissuetypeQuery;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\RbtissuetypeQuery;
use Webmis\Models\Rbunit;
use Webmis\Models\RbunitQuery;

/**
 * Base class that represents a row from the 'ActionType_TissueType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypeTissuetype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ActiontypeTissuetypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActiontypeTissuetypePeer
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
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the tissuetype_id field.
     * @var        int
     */
    protected $tissuetype_id;

    /**
     * The value for the amount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $amount;

    /**
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

    /**
     * @var        Actiontype
     */
    protected $aActiontype;

    /**
     * @var        Rbtissuetype
     */
    protected $aRbtissuetype;

    /**
     * @var        Rbunit
     */
    protected $aRbunit;

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
        $this->amount = 0;
    }

    /**
     * Initializes internal state of BaseActiontypeTissuetype object.
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
     * Get the [master_id] column value.
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->master_id;
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
     * Get the [tissuetype_id] column value.
     *
     * @return int
     */
    public function getTissuetypeId()
    {
        return $this->tissuetype_id;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return ActiontypeTissuetype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActiontypeTissuetypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return ActiontypeTissuetype The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = ActiontypeTissuetypePeer::MASTER_ID;
        }

        if ($this->aActiontype !== null && $this->aActiontype->getId() !== $v) {
            $this->aActiontype = null;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return ActiontypeTissuetype The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = ActiontypeTissuetypePeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [tissuetype_id] column.
     *
     * @param int $v new value
     * @return ActiontypeTissuetype The current object (for fluent API support)
     */
    public function setTissuetypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tissuetype_id !== $v) {
            $this->tissuetype_id = $v;
            $this->modifiedColumns[] = ActiontypeTissuetypePeer::TISSUETYPE_ID;
        }

        if ($this->aRbtissuetype !== null && $this->aRbtissuetype->getId() !== $v) {
            $this->aRbtissuetype = null;
        }


        return $this;
    } // setTissuetypeId()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return ActiontypeTissuetype The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = ActiontypeTissuetypePeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [unit_id] column.
     *
     * @param int $v new value
     * @return ActiontypeTissuetype The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[] = ActiontypeTissuetypePeer::UNIT_ID;
        }

        if ($this->aRbunit !== null && $this->aRbunit->getId() !== $v) {
            $this->aRbunit = null;
        }


        return $this;
    } // setUnitId()

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

            if ($this->amount !== 0) {
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
            $this->master_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idx = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->tissuetype_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->amount = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->unit_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ActiontypeTissuetypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ActiontypeTissuetype object", $e);
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

        if ($this->aActiontype !== null && $this->master_id !== $this->aActiontype->getId()) {
            $this->aActiontype = null;
        }
        if ($this->aRbtissuetype !== null && $this->tissuetype_id !== $this->aRbtissuetype->getId()) {
            $this->aRbtissuetype = null;
        }
        if ($this->aRbunit !== null && $this->unit_id !== $this->aRbunit->getId()) {
            $this->aRbunit = null;
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
            $con = Propel::getConnection(ActiontypeTissuetypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActiontypeTissuetypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aActiontype = null;
            $this->aRbtissuetype = null;
            $this->aRbunit = null;
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
            $con = Propel::getConnection(ActiontypeTissuetypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActiontypeTissuetypeQuery::create()
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
            $con = Propel::getConnection(ActiontypeTissuetypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ActiontypeTissuetypePeer::addInstanceToPool($this);
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

            if ($this->aActiontype !== null) {
                if ($this->aActiontype->isModified() || $this->aActiontype->isNew()) {
                    $affectedRows += $this->aActiontype->save($con);
                }
                $this->setActiontype($this->aActiontype);
            }

            if ($this->aRbtissuetype !== null) {
                if ($this->aRbtissuetype->isModified() || $this->aRbtissuetype->isNew()) {
                    $affectedRows += $this->aRbtissuetype->save($con);
                }
                $this->setRbtissuetype($this->aRbtissuetype);
            }

            if ($this->aRbunit !== null) {
                if ($this->aRbunit->isModified() || $this->aRbunit->isNew()) {
                    $affectedRows += $this->aRbunit->save($con);
                }
                $this->setRbunit($this->aRbunit);
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

        $this->modifiedColumns[] = ActiontypeTissuetypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActiontypeTissuetypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActiontypeTissuetypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ActiontypeTissuetypePeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(ActiontypeTissuetypePeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(ActiontypeTissuetypePeer::TISSUETYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tissueType_id`';
        }
        if ($this->isColumnModified(ActiontypeTissuetypePeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(ActiontypeTissuetypePeer::UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`unit_id`';
        }

        $sql = sprintf(
            'INSERT INTO `ActionType_TissueType` (%s) VALUES (%s)',
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
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`tissueType_id`':
                        $stmt->bindValue($identifier, $this->tissuetype_id, PDO::PARAM_INT);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case '`unit_id`':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
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

            if ($this->aActiontype !== null) {
                if (!$this->aActiontype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aActiontype->getValidationFailures());
                }
            }

            if ($this->aRbtissuetype !== null) {
                if (!$this->aRbtissuetype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtissuetype->getValidationFailures());
                }
            }

            if ($this->aRbunit !== null) {
                if (!$this->aRbunit->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbunit->getValidationFailures());
                }
            }


            if (($retval = ActiontypeTissuetypePeer::doValidate($this, $columns)) !== true) {
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
        $pos = ActiontypeTissuetypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMasterId();
                break;
            case 2:
                return $this->getIdx();
                break;
            case 3:
                return $this->getTissuetypeId();
                break;
            case 4:
                return $this->getAmount();
                break;
            case 5:
                return $this->getUnitId();
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
        if (isset($alreadyDumpedObjects['ActiontypeTissuetype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ActiontypeTissuetype'][$this->getPrimaryKey()] = true;
        $keys = ActiontypeTissuetypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMasterId(),
            $keys[2] => $this->getIdx(),
            $keys[3] => $this->getTissuetypeId(),
            $keys[4] => $this->getAmount(),
            $keys[5] => $this->getUnitId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aActiontype) {
                $result['Actiontype'] = $this->aActiontype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtissuetype) {
                $result['Rbtissuetype'] = $this->aRbtissuetype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbunit) {
                $result['Rbunit'] = $this->aRbunit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ActiontypeTissuetypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMasterId($value);
                break;
            case 2:
                $this->setIdx($value);
                break;
            case 3:
                $this->setTissuetypeId($value);
                break;
            case 4:
                $this->setAmount($value);
                break;
            case 5:
                $this->setUnitId($value);
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
        $keys = ActiontypeTissuetypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMasterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdx($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTissuetypeId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAmount($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUnitId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActiontypeTissuetypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ActiontypeTissuetypePeer::ID)) $criteria->add(ActiontypeTissuetypePeer::ID, $this->id);
        if ($this->isColumnModified(ActiontypeTissuetypePeer::MASTER_ID)) $criteria->add(ActiontypeTissuetypePeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(ActiontypeTissuetypePeer::IDX)) $criteria->add(ActiontypeTissuetypePeer::IDX, $this->idx);
        if ($this->isColumnModified(ActiontypeTissuetypePeer::TISSUETYPE_ID)) $criteria->add(ActiontypeTissuetypePeer::TISSUETYPE_ID, $this->tissuetype_id);
        if ($this->isColumnModified(ActiontypeTissuetypePeer::AMOUNT)) $criteria->add(ActiontypeTissuetypePeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(ActiontypeTissuetypePeer::UNIT_ID)) $criteria->add(ActiontypeTissuetypePeer::UNIT_ID, $this->unit_id);

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
        $criteria = new Criteria(ActiontypeTissuetypePeer::DATABASE_NAME);
        $criteria->add(ActiontypeTissuetypePeer::ID, $this->id);

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
     * @param object $copyObj An object of ActiontypeTissuetype (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setTissuetypeId($this->getTissuetypeId());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setUnitId($this->getUnitId());

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
     * @return ActiontypeTissuetype Clone of current object.
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
     * @return ActiontypeTissuetypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActiontypeTissuetypePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Actiontype object.
     *
     * @param             Actiontype $v
     * @return ActiontypeTissuetype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setActiontype(Actiontype $v = null)
    {
        if ($v === null) {
            $this->setMasterId(NULL);
        } else {
            $this->setMasterId($v->getId());
        }

        $this->aActiontype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Actiontype object, it will not be re-added.
        if ($v !== null) {
            $v->addActiontypeTissuetype($this);
        }


        return $this;
    }


    /**
     * Get the associated Actiontype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Actiontype The associated Actiontype object.
     * @throws PropelException
     */
    public function getActiontype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aActiontype === null && ($this->master_id !== null) && $doQuery) {
            $this->aActiontype = ActiontypeQuery::create()->findPk($this->master_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aActiontype->addActiontypeTissuetypes($this);
             */
        }

        return $this->aActiontype;
    }

    /**
     * Declares an association between this object and a Rbtissuetype object.
     *
     * @param             Rbtissuetype $v
     * @return ActiontypeTissuetype The current object (for fluent API support)
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
            $v->addActiontypeTissuetype($this);
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
                $this->aRbtissuetype->addActiontypeTissuetypes($this);
             */
        }

        return $this->aRbtissuetype;
    }

    /**
     * Declares an association between this object and a Rbunit object.
     *
     * @param             Rbunit $v
     * @return ActiontypeTissuetype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbunit(Rbunit $v = null)
    {
        if ($v === null) {
            $this->setUnitId(NULL);
        } else {
            $this->setUnitId($v->getId());
        }

        $this->aRbunit = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbunit object, it will not be re-added.
        if ($v !== null) {
            $v->addActiontypeTissuetype($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbunit object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbunit The associated Rbunit object.
     * @throws PropelException
     */
    public function getRbunit(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbunit === null && ($this->unit_id !== null) && $doQuery) {
            $this->aRbunit = RbunitQuery::create()->findPk($this->unit_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbunit->addActiontypeTissuetypes($this);
             */
        }

        return $this->aRbunit;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->master_id = null;
        $this->idx = null;
        $this->tissuetype_id = null;
        $this->amount = null;
        $this->unit_id = null;
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
            if ($this->aActiontype instanceof Persistent) {
              $this->aActiontype->clearAllReferences($deep);
            }
            if ($this->aRbtissuetype instanceof Persistent) {
              $this->aRbtissuetype->clearAllReferences($deep);
            }
            if ($this->aRbunit instanceof Persistent) {
              $this->aRbunit->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aActiontype = null;
        $this->aRbtissuetype = null;
        $this->aRbunit = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActiontypeTissuetypePeer::DEFAULT_STRING_FORMAT);
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
