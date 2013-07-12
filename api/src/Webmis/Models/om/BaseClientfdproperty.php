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
use Webmis\Models\ClientfdpropertyPeer;
use Webmis\Models\ClientfdpropertyQuery;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\ClientflatdirectoryQuery;
use Webmis\Models\Flatdirectory;
use Webmis\Models\FlatdirectoryQuery;

/**
 * Base class that represents a row from the 'ClientFDProperty' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientfdproperty extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ClientfdpropertyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientfdpropertyPeer
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
     * The value for the flatdirectory_id field.
     * @var        int
     */
    protected $flatdirectory_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the version field.
     * @var        int
     */
    protected $version;

    /**
     * @var        Flatdirectory
     */
    protected $aFlatdirectory;

    /**
     * @var        PropelObjectCollection|Clientflatdirectory[] Collection to store aggregation of Clientflatdirectory objects.
     */
    protected $collClientflatdirectorys;
    protected $collClientflatdirectorysPartial;

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
    protected $clientflatdirectorysScheduledForDeletion = null;

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
     * Get the [flatdirectory_id] column value.
     *
     * @return int
     */
    public function getFlatdirectoryId()
    {
        return $this->flatdirectory_id;
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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ClientfdpropertyPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [flatdirectory_id] column.
     *
     * @param int $v new value
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function setFlatdirectoryId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->flatdirectory_id !== $v) {
            $this->flatdirectory_id = $v;
            $this->modifiedColumns[] = ClientfdpropertyPeer::FLATDIRECTORY_ID;
        }

        if ($this->aFlatdirectory !== null && $this->aFlatdirectory->getId() !== $v) {
            $this->aFlatdirectory = null;
        }


        return $this;
    } // setFlatdirectoryId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ClientfdpropertyPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ClientfdpropertyPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ClientfdpropertyPeer::VERSION;
        }


        return $this;
    } // setVersion()

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
            $this->flatdirectory_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->version = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ClientfdpropertyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Clientfdproperty object", $e);
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

        if ($this->aFlatdirectory !== null && $this->flatdirectory_id !== $this->aFlatdirectory->getId()) {
            $this->aFlatdirectory = null;
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
            $con = Propel::getConnection(ClientfdpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientfdpropertyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aFlatdirectory = null;
            $this->collClientflatdirectorys = null;

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
            $con = Propel::getConnection(ClientfdpropertyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientfdpropertyQuery::create()
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
            $con = Propel::getConnection(ClientfdpropertyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientfdpropertyPeer::addInstanceToPool($this);
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

            if ($this->aFlatdirectory !== null) {
                if ($this->aFlatdirectory->isModified() || $this->aFlatdirectory->isNew()) {
                    $affectedRows += $this->aFlatdirectory->save($con);
                }
                $this->setFlatdirectory($this->aFlatdirectory);
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

            if ($this->clientflatdirectorysScheduledForDeletion !== null) {
                if (!$this->clientflatdirectorysScheduledForDeletion->isEmpty()) {
                    ClientflatdirectoryQuery::create()
                        ->filterByPrimaryKeys($this->clientflatdirectorysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientflatdirectorysScheduledForDeletion = null;
                }
            }

            if ($this->collClientflatdirectorys !== null) {
                foreach ($this->collClientflatdirectorys as $referrerFK) {
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

        $this->modifiedColumns[] = ClientfdpropertyPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientfdpropertyPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientfdpropertyPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ClientfdpropertyPeer::FLATDIRECTORY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`flatDirectory_id`';
        }
        if ($this->isColumnModified(ClientfdpropertyPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ClientfdpropertyPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(ClientfdpropertyPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }

        $sql = sprintf(
            'INSERT INTO `ClientFDProperty` (%s) VALUES (%s)',
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
                    case '`flatDirectory_id`':
                        $stmt->bindValue($identifier, $this->flatdirectory_id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
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

            if ($this->aFlatdirectory !== null) {
                if (!$this->aFlatdirectory->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFlatdirectory->getValidationFailures());
                }
            }


            if (($retval = ClientfdpropertyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collClientflatdirectorys !== null) {
                    foreach ($this->collClientflatdirectorys as $referrerFK) {
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
        $pos = ClientfdpropertyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFlatdirectoryId();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getVersion();
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
        if (isset($alreadyDumpedObjects['Clientfdproperty'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Clientfdproperty'][$this->getPrimaryKey()] = true;
        $keys = ClientfdpropertyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFlatdirectoryId(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getVersion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aFlatdirectory) {
                $result['Flatdirectory'] = $this->aFlatdirectory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collClientflatdirectorys) {
                $result['Clientflatdirectorys'] = $this->collClientflatdirectorys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ClientfdpropertyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFlatdirectoryId($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setVersion($value);
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
        $keys = ClientfdpropertyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFlatdirectoryId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setVersion($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientfdpropertyPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientfdpropertyPeer::ID)) $criteria->add(ClientfdpropertyPeer::ID, $this->id);
        if ($this->isColumnModified(ClientfdpropertyPeer::FLATDIRECTORY_ID)) $criteria->add(ClientfdpropertyPeer::FLATDIRECTORY_ID, $this->flatdirectory_id);
        if ($this->isColumnModified(ClientfdpropertyPeer::NAME)) $criteria->add(ClientfdpropertyPeer::NAME, $this->name);
        if ($this->isColumnModified(ClientfdpropertyPeer::DESCRIPTION)) $criteria->add(ClientfdpropertyPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(ClientfdpropertyPeer::VERSION)) $criteria->add(ClientfdpropertyPeer::VERSION, $this->version);

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
        $criteria = new Criteria(ClientfdpropertyPeer::DATABASE_NAME);
        $criteria->add(ClientfdpropertyPeer::ID, $this->id);

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
     * @param object $copyObj An object of Clientfdproperty (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFlatdirectoryId($this->getFlatdirectoryId());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setVersion($this->getVersion());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getClientflatdirectorys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientflatdirectory($relObj->copy($deepCopy));
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
     * @return Clientfdproperty Clone of current object.
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
     * @return ClientfdpropertyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientfdpropertyPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Flatdirectory object.
     *
     * @param             Flatdirectory $v
     * @return Clientfdproperty The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFlatdirectory(Flatdirectory $v = null)
    {
        if ($v === null) {
            $this->setFlatdirectoryId(NULL);
        } else {
            $this->setFlatdirectoryId($v->getId());
        }

        $this->aFlatdirectory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Flatdirectory object, it will not be re-added.
        if ($v !== null) {
            $v->addClientfdproperty($this);
        }


        return $this;
    }


    /**
     * Get the associated Flatdirectory object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Flatdirectory The associated Flatdirectory object.
     * @throws PropelException
     */
    public function getFlatdirectory(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFlatdirectory === null && ($this->flatdirectory_id !== null) && $doQuery) {
            $this->aFlatdirectory = FlatdirectoryQuery::create()->findPk($this->flatdirectory_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFlatdirectory->addClientfdpropertys($this);
             */
        }

        return $this->aFlatdirectory;
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
        if ('Clientflatdirectory' == $relationName) {
            $this->initClientflatdirectorys();
        }
    }

    /**
     * Clears out the collClientflatdirectorys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Clientfdproperty The current object (for fluent API support)
     * @see        addClientflatdirectorys()
     */
    public function clearClientflatdirectorys()
    {
        $this->collClientflatdirectorys = null; // important to set this to null since that means it is uninitialized
        $this->collClientflatdirectorysPartial = null;

        return $this;
    }

    /**
     * reset is the collClientflatdirectorys collection loaded partially
     *
     * @return void
     */
    public function resetPartialClientflatdirectorys($v = true)
    {
        $this->collClientflatdirectorysPartial = $v;
    }

    /**
     * Initializes the collClientflatdirectorys collection.
     *
     * By default this just sets the collClientflatdirectorys collection to an empty array (like clearcollClientflatdirectorys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientflatdirectorys($overrideExisting = true)
    {
        if (null !== $this->collClientflatdirectorys && !$overrideExisting) {
            return;
        }
        $this->collClientflatdirectorys = new PropelObjectCollection();
        $this->collClientflatdirectorys->setModel('Clientflatdirectory');
    }

    /**
     * Gets an array of Clientflatdirectory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Clientfdproperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clientflatdirectory[] List of Clientflatdirectory objects
     * @throws PropelException
     */
    public function getClientflatdirectorys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientflatdirectorysPartial && !$this->isNew();
        if (null === $this->collClientflatdirectorys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientflatdirectorys) {
                // return empty collection
                $this->initClientflatdirectorys();
            } else {
                $collClientflatdirectorys = ClientflatdirectoryQuery::create(null, $criteria)
                    ->filterByClientfdproperty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientflatdirectorysPartial && count($collClientflatdirectorys)) {
                      $this->initClientflatdirectorys(false);

                      foreach($collClientflatdirectorys as $obj) {
                        if (false == $this->collClientflatdirectorys->contains($obj)) {
                          $this->collClientflatdirectorys->append($obj);
                        }
                      }

                      $this->collClientflatdirectorysPartial = true;
                    }

                    $collClientflatdirectorys->getInternalIterator()->rewind();
                    return $collClientflatdirectorys;
                }

                if($partial && $this->collClientflatdirectorys) {
                    foreach($this->collClientflatdirectorys as $obj) {
                        if($obj->isNew()) {
                            $collClientflatdirectorys[] = $obj;
                        }
                    }
                }

                $this->collClientflatdirectorys = $collClientflatdirectorys;
                $this->collClientflatdirectorysPartial = false;
            }
        }

        return $this->collClientflatdirectorys;
    }

    /**
     * Sets a collection of Clientflatdirectory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clientflatdirectorys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function setClientflatdirectorys(PropelCollection $clientflatdirectorys, PropelPDO $con = null)
    {
        $clientflatdirectorysToDelete = $this->getClientflatdirectorys(new Criteria(), $con)->diff($clientflatdirectorys);

        $this->clientflatdirectorysScheduledForDeletion = unserialize(serialize($clientflatdirectorysToDelete));

        foreach ($clientflatdirectorysToDelete as $clientflatdirectoryRemoved) {
            $clientflatdirectoryRemoved->setClientfdproperty(null);
        }

        $this->collClientflatdirectorys = null;
        foreach ($clientflatdirectorys as $clientflatdirectory) {
            $this->addClientflatdirectory($clientflatdirectory);
        }

        $this->collClientflatdirectorys = $clientflatdirectorys;
        $this->collClientflatdirectorysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clientflatdirectory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clientflatdirectory objects.
     * @throws PropelException
     */
    public function countClientflatdirectorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientflatdirectorysPartial && !$this->isNew();
        if (null === $this->collClientflatdirectorys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientflatdirectorys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getClientflatdirectorys());
            }
            $query = ClientflatdirectoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClientfdproperty($this)
                ->count($con);
        }

        return count($this->collClientflatdirectorys);
    }

    /**
     * Method called to associate a Clientflatdirectory object to this object
     * through the Clientflatdirectory foreign key attribute.
     *
     * @param    Clientflatdirectory $l Clientflatdirectory
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function addClientflatdirectory(Clientflatdirectory $l)
    {
        if ($this->collClientflatdirectorys === null) {
            $this->initClientflatdirectorys();
            $this->collClientflatdirectorysPartial = true;
        }
        if (!in_array($l, $this->collClientflatdirectorys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClientflatdirectory($l);
        }

        return $this;
    }

    /**
     * @param	Clientflatdirectory $clientflatdirectory The clientflatdirectory object to add.
     */
    protected function doAddClientflatdirectory($clientflatdirectory)
    {
        $this->collClientflatdirectorys[]= $clientflatdirectory;
        $clientflatdirectory->setClientfdproperty($this);
    }

    /**
     * @param	Clientflatdirectory $clientflatdirectory The clientflatdirectory object to remove.
     * @return Clientfdproperty The current object (for fluent API support)
     */
    public function removeClientflatdirectory($clientflatdirectory)
    {
        if ($this->getClientflatdirectorys()->contains($clientflatdirectory)) {
            $this->collClientflatdirectorys->remove($this->collClientflatdirectorys->search($clientflatdirectory));
            if (null === $this->clientflatdirectorysScheduledForDeletion) {
                $this->clientflatdirectorysScheduledForDeletion = clone $this->collClientflatdirectorys;
                $this->clientflatdirectorysScheduledForDeletion->clear();
            }
            $this->clientflatdirectorysScheduledForDeletion[]= clone $clientflatdirectory;
            $clientflatdirectory->setClientfdproperty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clientfdproperty is new, it will return
     * an empty collection; or if this Clientfdproperty has previously
     * been saved, it will retrieve related Clientflatdirectorys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clientfdproperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Clientflatdirectory[] List of Clientflatdirectory objects
     */
    public function getClientflatdirectorysJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientflatdirectoryQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getClientflatdirectorys($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clientfdproperty is new, it will return
     * an empty collection; or if this Clientfdproperty has previously
     * been saved, it will retrieve related Clientflatdirectorys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clientfdproperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Clientflatdirectory[] List of Clientflatdirectory objects
     */
    public function getClientflatdirectorysJoinFdrecord($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientflatdirectoryQuery::create(null, $criteria);
        $query->joinWith('Fdrecord', $join_behavior);

        return $this->getClientflatdirectorys($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->flatdirectory_id = null;
        $this->name = null;
        $this->description = null;
        $this->version = null;
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
            if ($this->collClientflatdirectorys) {
                foreach ($this->collClientflatdirectorys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aFlatdirectory instanceof Persistent) {
              $this->aFlatdirectory->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collClientflatdirectorys instanceof PropelCollection) {
            $this->collClientflatdirectorys->clearIterator();
        }
        $this->collClientflatdirectorys = null;
        $this->aFlatdirectory = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientfdpropertyPeer::DEFAULT_STRING_FORMAT);
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
