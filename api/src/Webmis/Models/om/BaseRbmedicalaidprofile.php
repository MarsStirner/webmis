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
use Webmis\Models\Rbmedicalaidprofile;
use Webmis\Models\RbmedicalaidprofilePeer;
use Webmis\Models\RbmedicalaidprofileQuery;
use Webmis\Models\Rbservice;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceProfileQuery;
use Webmis\Models\RbserviceQuery;

/**
 * Base class that represents a row from the 'rbMedicalAidProfile' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbmedicalaidprofile extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbmedicalaidprofilePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbmedicalaidprofilePeer
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
     * The value for the regionalcode field.
     * @var        string
     */
    protected $regionalcode;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|Rbservice[] Collection to store aggregation of Rbservice objects.
     */
    protected $collRbservices;
    protected $collRbservicesPartial;

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
    protected $rbservicesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbserviceProfilesScheduledForDeletion = null;

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
     * Get the [regionalcode] column value.
     *
     * @return string
     */
    public function getRegionalcode()
    {
        return $this->regionalcode;
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
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbmedicalaidprofilePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbmedicalaidprofilePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [regionalcode] column.
     *
     * @param string $v new value
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function setRegionalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regionalcode !== $v) {
            $this->regionalcode = $v;
            $this->modifiedColumns[] = RbmedicalaidprofilePeer::REGIONALCODE;
        }


        return $this;
    } // setRegionalcode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbmedicalaidprofilePeer::NAME;
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
            $this->regionalcode = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = RbmedicalaidprofilePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbmedicalaidprofile object", $e);
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
            $con = Propel::getConnection(RbmedicalaidprofilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbmedicalaidprofilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collRbservices = null;

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
            $con = Propel::getConnection(RbmedicalaidprofilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbmedicalaidprofileQuery::create()
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
            $con = Propel::getConnection(RbmedicalaidprofilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbmedicalaidprofilePeer::addInstanceToPool($this);
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

            if ($this->rbservicesScheduledForDeletion !== null) {
                if (!$this->rbservicesScheduledForDeletion->isEmpty()) {
                    foreach ($this->rbservicesScheduledForDeletion as $rbservice) {
                        // need to save related object because we set the relation to null
                        $rbservice->save($con);
                    }
                    $this->rbservicesScheduledForDeletion = null;
                }
            }

            if ($this->collRbservices !== null) {
                foreach ($this->collRbservices as $referrerFK) {
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

        $this->modifiedColumns[] = RbmedicalaidprofilePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbmedicalaidprofilePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbmedicalaidprofilePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbmedicalaidprofilePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbmedicalaidprofilePeer::REGIONALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionalCode`';
        }
        if ($this->isColumnModified(RbmedicalaidprofilePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `rbMedicalAidProfile` (%s) VALUES (%s)',
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
                    case '`regionalCode`':
                        $stmt->bindValue($identifier, $this->regionalcode, PDO::PARAM_STR);
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


            if (($retval = RbmedicalaidprofilePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collRbservices !== null) {
                    foreach ($this->collRbservices as $referrerFK) {
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
        $pos = RbmedicalaidprofilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRegionalcode();
                break;
            case 3:
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
        if (isset($alreadyDumpedObjects['Rbmedicalaidprofile'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbmedicalaidprofile'][$this->getPrimaryKey()] = true;
        $keys = RbmedicalaidprofilePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getRegionalcode(),
            $keys[3] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collRbservices) {
                $result['Rbservices'] = $this->collRbservices->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbmedicalaidprofilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRegionalcode($value);
                break;
            case 3:
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
        $keys = RbmedicalaidprofilePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setRegionalcode($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbmedicalaidprofilePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbmedicalaidprofilePeer::ID)) $criteria->add(RbmedicalaidprofilePeer::ID, $this->id);
        if ($this->isColumnModified(RbmedicalaidprofilePeer::CODE)) $criteria->add(RbmedicalaidprofilePeer::CODE, $this->code);
        if ($this->isColumnModified(RbmedicalaidprofilePeer::REGIONALCODE)) $criteria->add(RbmedicalaidprofilePeer::REGIONALCODE, $this->regionalcode);
        if ($this->isColumnModified(RbmedicalaidprofilePeer::NAME)) $criteria->add(RbmedicalaidprofilePeer::NAME, $this->name);

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
        $criteria = new Criteria(RbmedicalaidprofilePeer::DATABASE_NAME);
        $criteria->add(RbmedicalaidprofilePeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbmedicalaidprofile (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setRegionalcode($this->getRegionalcode());
        $copyObj->setName($this->getName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getRbservices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbservice($relObj->copy($deepCopy));
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
     * @return Rbmedicalaidprofile Clone of current object.
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
     * @return RbmedicalaidprofilePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbmedicalaidprofilePeer();
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
        if ('Rbservice' == $relationName) {
            $this->initRbservices();
        }
        if ('RbserviceProfile' == $relationName) {
            $this->initRbserviceProfiles();
        }
    }

    /**
     * Clears out the collRbservices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     * @see        addRbservices()
     */
    public function clearRbservices()
    {
        $this->collRbservices = null; // important to set this to null since that means it is uninitialized
        $this->collRbservicesPartial = null;

        return $this;
    }

    /**
     * reset is the collRbservices collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbservices($v = true)
    {
        $this->collRbservicesPartial = $v;
    }

    /**
     * Initializes the collRbservices collection.
     *
     * By default this just sets the collRbservices collection to an empty array (like clearcollRbservices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbservices($overrideExisting = true)
    {
        if (null !== $this->collRbservices && !$overrideExisting) {
            return;
        }
        $this->collRbservices = new PropelObjectCollection();
        $this->collRbservices->setModel('Rbservice');
    }

    /**
     * Gets an array of Rbservice objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbmedicalaidprofile is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rbservice[] List of Rbservice objects
     * @throws PropelException
     */
    public function getRbservices($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbservicesPartial && !$this->isNew();
        if (null === $this->collRbservices || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbservices) {
                // return empty collection
                $this->initRbservices();
            } else {
                $collRbservices = RbserviceQuery::create(null, $criteria)
                    ->filterByRbmedicalaidprofile($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbservicesPartial && count($collRbservices)) {
                      $this->initRbservices(false);

                      foreach($collRbservices as $obj) {
                        if (false == $this->collRbservices->contains($obj)) {
                          $this->collRbservices->append($obj);
                        }
                      }

                      $this->collRbservicesPartial = true;
                    }

                    $collRbservices->getInternalIterator()->rewind();
                    return $collRbservices;
                }

                if($partial && $this->collRbservices) {
                    foreach($this->collRbservices as $obj) {
                        if($obj->isNew()) {
                            $collRbservices[] = $obj;
                        }
                    }
                }

                $this->collRbservices = $collRbservices;
                $this->collRbservicesPartial = false;
            }
        }

        return $this->collRbservices;
    }

    /**
     * Sets a collection of Rbservice objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbservices A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function setRbservices(PropelCollection $rbservices, PropelPDO $con = null)
    {
        $rbservicesToDelete = $this->getRbservices(new Criteria(), $con)->diff($rbservices);

        $this->rbservicesScheduledForDeletion = unserialize(serialize($rbservicesToDelete));

        foreach ($rbservicesToDelete as $rbserviceRemoved) {
            $rbserviceRemoved->setRbmedicalaidprofile(null);
        }

        $this->collRbservices = null;
        foreach ($rbservices as $rbservice) {
            $this->addRbservice($rbservice);
        }

        $this->collRbservices = $rbservices;
        $this->collRbservicesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbservice objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rbservice objects.
     * @throws PropelException
     */
    public function countRbservices(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbservicesPartial && !$this->isNew();
        if (null === $this->collRbservices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbservices) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbservices());
            }
            $query = RbserviceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbmedicalaidprofile($this)
                ->count($con);
        }

        return count($this->collRbservices);
    }

    /**
     * Method called to associate a Rbservice object to this object
     * through the Rbservice foreign key attribute.
     *
     * @param    Rbservice $l Rbservice
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function addRbservice(Rbservice $l)
    {
        if ($this->collRbservices === null) {
            $this->initRbservices();
            $this->collRbservicesPartial = true;
        }
        if (!in_array($l, $this->collRbservices->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbservice($l);
        }

        return $this;
    }

    /**
     * @param	Rbservice $rbservice The rbservice object to add.
     */
    protected function doAddRbservice($rbservice)
    {
        $this->collRbservices[]= $rbservice;
        $rbservice->setRbmedicalaidprofile($this);
    }

    /**
     * @param	Rbservice $rbservice The rbservice object to remove.
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function removeRbservice($rbservice)
    {
        if ($this->getRbservices()->contains($rbservice)) {
            $this->collRbservices->remove($this->collRbservices->search($rbservice));
            if (null === $this->rbservicesScheduledForDeletion) {
                $this->rbservicesScheduledForDeletion = clone $this->collRbservices;
                $this->rbservicesScheduledForDeletion->clear();
            }
            $this->rbservicesScheduledForDeletion[]= $rbservice;
            $rbservice->setRbmedicalaidprofile(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbmedicalaidprofile is new, it will return
     * an empty collection; or if this Rbmedicalaidprofile has previously
     * been saved, it will retrieve related Rbservices from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbmedicalaidprofile.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rbservice[] List of Rbservice objects
     */
    public function getRbservicesJoinRbmedicalkind($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbserviceQuery::create(null, $criteria);
        $query->joinWith('Rbmedicalkind', $join_behavior);

        return $this->getRbservices($query, $con);
    }

    /**
     * Clears out the collRbserviceProfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbmedicalaidprofile The current object (for fluent API support)
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
     * If this Rbmedicalaidprofile is new, it will return
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
                    ->filterByRbmedicalaidprofile($this)
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
     * @return Rbmedicalaidprofile The current object (for fluent API support)
     */
    public function setRbserviceProfiles(PropelCollection $rbserviceProfiles, PropelPDO $con = null)
    {
        $rbserviceProfilesToDelete = $this->getRbserviceProfiles(new Criteria(), $con)->diff($rbserviceProfiles);

        $this->rbserviceProfilesScheduledForDeletion = unserialize(serialize($rbserviceProfilesToDelete));

        foreach ($rbserviceProfilesToDelete as $rbserviceProfileRemoved) {
            $rbserviceProfileRemoved->setRbmedicalaidprofile(null);
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
                ->filterByRbmedicalaidprofile($this)
                ->count($con);
        }

        return count($this->collRbserviceProfiles);
    }

    /**
     * Method called to associate a RbserviceProfile object to this object
     * through the RbserviceProfile foreign key attribute.
     *
     * @param    RbserviceProfile $l RbserviceProfile
     * @return Rbmedicalaidprofile The current object (for fluent API support)
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
        $rbserviceProfile->setRbmedicalaidprofile($this);
    }

    /**
     * @param	RbserviceProfile $rbserviceProfile The rbserviceProfile object to remove.
     * @return Rbmedicalaidprofile The current object (for fluent API support)
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
            $rbserviceProfile->setRbmedicalaidprofile(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbmedicalaidprofile is new, it will return
     * an empty collection; or if this Rbmedicalaidprofile has previously
     * been saved, it will retrieve related RbserviceProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbmedicalaidprofile.
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
     * Otherwise if this Rbmedicalaidprofile is new, it will return
     * an empty collection; or if this Rbmedicalaidprofile has previously
     * been saved, it will retrieve related RbserviceProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbmedicalaidprofile.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     */
    public function getRbserviceProfilesJoinRbspeciality($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbserviceProfileQuery::create(null, $criteria);
        $query->joinWith('Rbspeciality', $join_behavior);

        return $this->getRbserviceProfiles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->regionalcode = null;
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
            if ($this->collRbservices) {
                foreach ($this->collRbservices as $o) {
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

        if ($this->collRbservices instanceof PropelCollection) {
            $this->collRbservices->clearIterator();
        }
        $this->collRbservices = null;
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
        return (string) $this->exportTo(RbmedicalaidprofilePeer::DEFAULT_STRING_FORMAT);
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
