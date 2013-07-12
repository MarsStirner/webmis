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
use Webmis\Models\MkbQuotatypePacientmodel;
use Webmis\Models\MkbQuotatypePacientmodelQuery;
use Webmis\Models\Quotatype;
use Webmis\Models\QuotatypeQuery;
use Webmis\Models\Rbpacientmodel;
use Webmis\Models\RbpacientmodelPeer;
use Webmis\Models\RbpacientmodelQuery;
use Webmis\Models\Rbtreatment;
use Webmis\Models\RbtreatmentQuery;

/**
 * Base class that represents a row from the 'rbPacientModel' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbpacientmodel extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbpacientmodelPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbpacientmodelPeer
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
     * The value for the quotatype_id field.
     * @var        int
     */
    protected $quotatype_id;

    /**
     * @var        Quotatype
     */
    protected $aQuotatype;

    /**
     * @var        PropelObjectCollection|MkbQuotatypePacientmodel[] Collection to store aggregation of MkbQuotatypePacientmodel objects.
     */
    protected $collMkbQuotatypePacientmodels;
    protected $collMkbQuotatypePacientmodelsPartial;

    /**
     * @var        PropelObjectCollection|Rbtreatment[] Collection to store aggregation of Rbtreatment objects.
     */
    protected $collRbtreatments;
    protected $collRbtreatmentsPartial;

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
    protected $rbtreatmentsScheduledForDeletion = null;

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
     * Get the [quotatype_id] column value.
     *
     * @return int
     */
    public function getQuotatypeId()
    {
        return $this->quotatype_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbpacientmodelPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbpacientmodelPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbpacientmodelPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [quotatype_id] column.
     *
     * @param int $v new value
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function setQuotatypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->quotatype_id !== $v) {
            $this->quotatype_id = $v;
            $this->modifiedColumns[] = RbpacientmodelPeer::QUOTATYPE_ID;
        }

        if ($this->aQuotatype !== null && $this->aQuotatype->getId() !== $v) {
            $this->aQuotatype = null;
        }


        return $this;
    } // setQuotatypeId()

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
            $this->quotatype_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = RbpacientmodelPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbpacientmodel object", $e);
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

        if ($this->aQuotatype !== null && $this->quotatype_id !== $this->aQuotatype->getId()) {
            $this->aQuotatype = null;
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
            $con = Propel::getConnection(RbpacientmodelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbpacientmodelPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aQuotatype = null;
            $this->collMkbQuotatypePacientmodels = null;

            $this->collRbtreatments = null;

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
            $con = Propel::getConnection(RbpacientmodelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbpacientmodelQuery::create()
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
            $con = Propel::getConnection(RbpacientmodelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbpacientmodelPeer::addInstanceToPool($this);
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

            if ($this->aQuotatype !== null) {
                if ($this->aQuotatype->isModified() || $this->aQuotatype->isNew()) {
                    $affectedRows += $this->aQuotatype->save($con);
                }
                $this->setQuotatype($this->aQuotatype);
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

            if ($this->rbtreatmentsScheduledForDeletion !== null) {
                if (!$this->rbtreatmentsScheduledForDeletion->isEmpty()) {
                    RbtreatmentQuery::create()
                        ->filterByPrimaryKeys($this->rbtreatmentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbtreatmentsScheduledForDeletion = null;
                }
            }

            if ($this->collRbtreatments !== null) {
                foreach ($this->collRbtreatments as $referrerFK) {
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

        $this->modifiedColumns[] = RbpacientmodelPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbpacientmodelPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbpacientmodelPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbpacientmodelPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbpacientmodelPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(RbpacientmodelPeer::QUOTATYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`quotaType_id`';
        }

        $sql = sprintf(
            'INSERT INTO `rbPacientModel` (%s) VALUES (%s)',
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
                    case '`quotaType_id`':
                        $stmt->bindValue($identifier, $this->quotatype_id, PDO::PARAM_INT);
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

            if ($this->aQuotatype !== null) {
                if (!$this->aQuotatype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aQuotatype->getValidationFailures());
                }
            }


            if (($retval = RbpacientmodelPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMkbQuotatypePacientmodels !== null) {
                    foreach ($this->collMkbQuotatypePacientmodels as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbtreatments !== null) {
                    foreach ($this->collRbtreatments as $referrerFK) {
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
        $pos = RbpacientmodelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getQuotatypeId();
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
        if (isset($alreadyDumpedObjects['Rbpacientmodel'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbpacientmodel'][$this->getPrimaryKey()] = true;
        $keys = RbpacientmodelPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getQuotatypeId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aQuotatype) {
                $result['Quotatype'] = $this->aQuotatype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMkbQuotatypePacientmodels) {
                $result['MkbQuotatypePacientmodels'] = $this->collMkbQuotatypePacientmodels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbtreatments) {
                $result['Rbtreatments'] = $this->collRbtreatments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbpacientmodelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setQuotatypeId($value);
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
        $keys = RbpacientmodelPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setQuotatypeId($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbpacientmodelPeer::DATABASE_NAME);

        if ($this->isColumnModified(RbpacientmodelPeer::ID)) $criteria->add(RbpacientmodelPeer::ID, $this->id);
        if ($this->isColumnModified(RbpacientmodelPeer::CODE)) $criteria->add(RbpacientmodelPeer::CODE, $this->code);
        if ($this->isColumnModified(RbpacientmodelPeer::NAME)) $criteria->add(RbpacientmodelPeer::NAME, $this->name);
        if ($this->isColumnModified(RbpacientmodelPeer::QUOTATYPE_ID)) $criteria->add(RbpacientmodelPeer::QUOTATYPE_ID, $this->quotatype_id);

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
        $criteria = new Criteria(RbpacientmodelPeer::DATABASE_NAME);
        $criteria->add(RbpacientmodelPeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbpacientmodel (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setQuotatypeId($this->getQuotatypeId());

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

            foreach ($this->getRbtreatments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbtreatment($relObj->copy($deepCopy));
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
     * @return Rbpacientmodel Clone of current object.
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
     * @return RbpacientmodelPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbpacientmodelPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Quotatype object.
     *
     * @param             Quotatype $v
     * @return Rbpacientmodel The current object (for fluent API support)
     * @throws PropelException
     */
    public function setQuotatype(Quotatype $v = null)
    {
        if ($v === null) {
            $this->setQuotatypeId(NULL);
        } else {
            $this->setQuotatypeId($v->getId());
        }

        $this->aQuotatype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Quotatype object, it will not be re-added.
        if ($v !== null) {
            $v->addRbpacientmodel($this);
        }


        return $this;
    }


    /**
     * Get the associated Quotatype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Quotatype The associated Quotatype object.
     * @throws PropelException
     */
    public function getQuotatype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aQuotatype === null && ($this->quotatype_id !== null) && $doQuery) {
            $this->aQuotatype = QuotatypeQuery::create()->findPk($this->quotatype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aQuotatype->addRbpacientmodels($this);
             */
        }

        return $this->aQuotatype;
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
        if ('Rbtreatment' == $relationName) {
            $this->initRbtreatments();
        }
    }

    /**
     * Clears out the collMkbQuotatypePacientmodels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbpacientmodel The current object (for fluent API support)
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
     * If this Rbpacientmodel is new, it will return
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
                    ->filterByRbpacientmodel($this)
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
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function setMkbQuotatypePacientmodels(PropelCollection $mkbQuotatypePacientmodels, PropelPDO $con = null)
    {
        $mkbQuotatypePacientmodelsToDelete = $this->getMkbQuotatypePacientmodels(new Criteria(), $con)->diff($mkbQuotatypePacientmodels);

        $this->mkbQuotatypePacientmodelsScheduledForDeletion = unserialize(serialize($mkbQuotatypePacientmodelsToDelete));

        foreach ($mkbQuotatypePacientmodelsToDelete as $mkbQuotatypePacientmodelRemoved) {
            $mkbQuotatypePacientmodelRemoved->setRbpacientmodel(null);
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
                ->filterByRbpacientmodel($this)
                ->count($con);
        }

        return count($this->collMkbQuotatypePacientmodels);
    }

    /**
     * Method called to associate a MkbQuotatypePacientmodel object to this object
     * through the MkbQuotatypePacientmodel foreign key attribute.
     *
     * @param    MkbQuotatypePacientmodel $l MkbQuotatypePacientmodel
     * @return Rbpacientmodel The current object (for fluent API support)
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
        $mkbQuotatypePacientmodel->setRbpacientmodel($this);
    }

    /**
     * @param	MkbQuotatypePacientmodel $mkbQuotatypePacientmodel The mkbQuotatypePacientmodel object to remove.
     * @return Rbpacientmodel The current object (for fluent API support)
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
            $mkbQuotatypePacientmodel->setRbpacientmodel(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbpacientmodel is new, it will return
     * an empty collection; or if this Rbpacientmodel has previously
     * been saved, it will retrieve related MkbQuotatypePacientmodels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbpacientmodel.
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
     * Otherwise if this Rbpacientmodel is new, it will return
     * an empty collection; or if this Rbpacientmodel has previously
     * been saved, it will retrieve related MkbQuotatypePacientmodels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbpacientmodel.
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
     * Clears out the collRbtreatments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbpacientmodel The current object (for fluent API support)
     * @see        addRbtreatments()
     */
    public function clearRbtreatments()
    {
        $this->collRbtreatments = null; // important to set this to null since that means it is uninitialized
        $this->collRbtreatmentsPartial = null;

        return $this;
    }

    /**
     * reset is the collRbtreatments collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbtreatments($v = true)
    {
        $this->collRbtreatmentsPartial = $v;
    }

    /**
     * Initializes the collRbtreatments collection.
     *
     * By default this just sets the collRbtreatments collection to an empty array (like clearcollRbtreatments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbtreatments($overrideExisting = true)
    {
        if (null !== $this->collRbtreatments && !$overrideExisting) {
            return;
        }
        $this->collRbtreatments = new PropelObjectCollection();
        $this->collRbtreatments->setModel('Rbtreatment');
    }

    /**
     * Gets an array of Rbtreatment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbpacientmodel is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rbtreatment[] List of Rbtreatment objects
     * @throws PropelException
     */
    public function getRbtreatments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbtreatmentsPartial && !$this->isNew();
        if (null === $this->collRbtreatments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbtreatments) {
                // return empty collection
                $this->initRbtreatments();
            } else {
                $collRbtreatments = RbtreatmentQuery::create(null, $criteria)
                    ->filterByRbpacientmodel($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbtreatmentsPartial && count($collRbtreatments)) {
                      $this->initRbtreatments(false);

                      foreach($collRbtreatments as $obj) {
                        if (false == $this->collRbtreatments->contains($obj)) {
                          $this->collRbtreatments->append($obj);
                        }
                      }

                      $this->collRbtreatmentsPartial = true;
                    }

                    $collRbtreatments->getInternalIterator()->rewind();
                    return $collRbtreatments;
                }

                if($partial && $this->collRbtreatments) {
                    foreach($this->collRbtreatments as $obj) {
                        if($obj->isNew()) {
                            $collRbtreatments[] = $obj;
                        }
                    }
                }

                $this->collRbtreatments = $collRbtreatments;
                $this->collRbtreatmentsPartial = false;
            }
        }

        return $this->collRbtreatments;
    }

    /**
     * Sets a collection of Rbtreatment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbtreatments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function setRbtreatments(PropelCollection $rbtreatments, PropelPDO $con = null)
    {
        $rbtreatmentsToDelete = $this->getRbtreatments(new Criteria(), $con)->diff($rbtreatments);

        $this->rbtreatmentsScheduledForDeletion = unserialize(serialize($rbtreatmentsToDelete));

        foreach ($rbtreatmentsToDelete as $rbtreatmentRemoved) {
            $rbtreatmentRemoved->setRbpacientmodel(null);
        }

        $this->collRbtreatments = null;
        foreach ($rbtreatments as $rbtreatment) {
            $this->addRbtreatment($rbtreatment);
        }

        $this->collRbtreatments = $rbtreatments;
        $this->collRbtreatmentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbtreatment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rbtreatment objects.
     * @throws PropelException
     */
    public function countRbtreatments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbtreatmentsPartial && !$this->isNew();
        if (null === $this->collRbtreatments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbtreatments) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbtreatments());
            }
            $query = RbtreatmentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbpacientmodel($this)
                ->count($con);
        }

        return count($this->collRbtreatments);
    }

    /**
     * Method called to associate a Rbtreatment object to this object
     * through the Rbtreatment foreign key attribute.
     *
     * @param    Rbtreatment $l Rbtreatment
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function addRbtreatment(Rbtreatment $l)
    {
        if ($this->collRbtreatments === null) {
            $this->initRbtreatments();
            $this->collRbtreatmentsPartial = true;
        }
        if (!in_array($l, $this->collRbtreatments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbtreatment($l);
        }

        return $this;
    }

    /**
     * @param	Rbtreatment $rbtreatment The rbtreatment object to add.
     */
    protected function doAddRbtreatment($rbtreatment)
    {
        $this->collRbtreatments[]= $rbtreatment;
        $rbtreatment->setRbpacientmodel($this);
    }

    /**
     * @param	Rbtreatment $rbtreatment The rbtreatment object to remove.
     * @return Rbpacientmodel The current object (for fluent API support)
     */
    public function removeRbtreatment($rbtreatment)
    {
        if ($this->getRbtreatments()->contains($rbtreatment)) {
            $this->collRbtreatments->remove($this->collRbtreatments->search($rbtreatment));
            if (null === $this->rbtreatmentsScheduledForDeletion) {
                $this->rbtreatmentsScheduledForDeletion = clone $this->collRbtreatments;
                $this->rbtreatmentsScheduledForDeletion->clear();
            }
            $this->rbtreatmentsScheduledForDeletion[]= clone $rbtreatment;
            $rbtreatment->setRbpacientmodel(null);
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
        $this->quotatype_id = null;
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
            if ($this->collRbtreatments) {
                foreach ($this->collRbtreatments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aQuotatype instanceof Persistent) {
              $this->aQuotatype->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMkbQuotatypePacientmodels instanceof PropelCollection) {
            $this->collMkbQuotatypePacientmodels->clearIterator();
        }
        $this->collMkbQuotatypePacientmodels = null;
        if ($this->collRbtreatments instanceof PropelCollection) {
            $this->collRbtreatments->clearIterator();
        }
        $this->collRbtreatments = null;
        $this->aQuotatype = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbpacientmodelPeer::DEFAULT_STRING_FORMAT);
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
