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
use Webmis\Models\Actiontissue;
use Webmis\Models\ActiontissueQuery;
use Webmis\Models\Event;
use Webmis\Models\EventQuery;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\RbtissuetypeQuery;
use Webmis\Models\Tissue;
use Webmis\Models\TissuePeer;
use Webmis\Models\TissueQuery;

/**
 * Base class that represents a row from the 'Tissue' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTissue extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\TissuePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TissuePeer
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
     * The value for the type_id field.
     * @var        int
     */
    protected $type_id;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the barcode field.
     * @var        string
     */
    protected $barcode;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * @var        Event
     */
    protected $aEvent;

    /**
     * @var        Rbtissuetype
     */
    protected $aRbtissuetype;

    /**
     * @var        PropelObjectCollection|Actiontissue[] Collection to store aggregation of Actiontissue objects.
     */
    protected $collActiontissues;
    protected $collActiontissuesPartial;

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
    protected $actiontissuesScheduledForDeletion = null;

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
     * Get the [type_id] column value.
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = 'Y-m-d H:i:s')
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
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
     * Get the [barcode] column value.
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Tissue The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TissuePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [type_id] column.
     *
     * @param int $v new value
     * @return Tissue The current object (for fluent API support)
     */
    public function setTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type_id !== $v) {
            $this->type_id = $v;
            $this->modifiedColumns[] = TissuePeer::TYPE_ID;
        }

        if ($this->aRbtissuetype !== null && $this->aRbtissuetype->getId() !== $v) {
            $this->aRbtissuetype = null;
        }


        return $this;
    } // setTypeId()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tissue The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = TissuePeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [barcode] column.
     *
     * @param string $v new value
     * @return Tissue The current object (for fluent API support)
     */
    public function setBarcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->barcode !== $v) {
            $this->barcode = $v;
            $this->modifiedColumns[] = TissuePeer::BARCODE;
        }


        return $this;
    } // setBarcode()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return Tissue The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = TissuePeer::EVENT_ID;
        }

        if ($this->aEvent !== null && $this->aEvent->getId() !== $v) {
            $this->aEvent = null;
        }


        return $this;
    } // setEventId()

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
            $this->type_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->date = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->barcode = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->event_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = TissuePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Tissue object", $e);
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

        if ($this->aRbtissuetype !== null && $this->type_id !== $this->aRbtissuetype->getId()) {
            $this->aRbtissuetype = null;
        }
        if ($this->aEvent !== null && $this->event_id !== $this->aEvent->getId()) {
            $this->aEvent = null;
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
            $con = Propel::getConnection(TissuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TissuePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEvent = null;
            $this->aRbtissuetype = null;
            $this->collActiontissues = null;

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
            $con = Propel::getConnection(TissuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TissueQuery::create()
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
            $con = Propel::getConnection(TissuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TissuePeer::addInstanceToPool($this);
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

            if ($this->aEvent !== null) {
                if ($this->aEvent->isModified() || $this->aEvent->isNew()) {
                    $affectedRows += $this->aEvent->save($con);
                }
                $this->setEvent($this->aEvent);
            }

            if ($this->aRbtissuetype !== null) {
                if ($this->aRbtissuetype->isModified() || $this->aRbtissuetype->isNew()) {
                    $affectedRows += $this->aRbtissuetype->save($con);
                }
                $this->setRbtissuetype($this->aRbtissuetype);
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

            if ($this->actiontissuesScheduledForDeletion !== null) {
                if (!$this->actiontissuesScheduledForDeletion->isEmpty()) {
                    ActiontissueQuery::create()
                        ->filterByPrimaryKeys($this->actiontissuesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actiontissuesScheduledForDeletion = null;
                }
            }

            if ($this->collActiontissues !== null) {
                foreach ($this->collActiontissues as $referrerFK) {
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

        $this->modifiedColumns[] = TissuePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TissuePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TissuePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(TissuePeer::TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`type_id`';
        }
        if ($this->isColumnModified(TissuePeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(TissuePeer::BARCODE)) {
            $modifiedColumns[':p' . $index++]  = '`barcode`';
        }
        if ($this->isColumnModified(TissuePeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Tissue` (%s) VALUES (%s)',
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
                    case '`type_id`':
                        $stmt->bindValue($identifier, $this->type_id, PDO::PARAM_INT);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`barcode`':
                        $stmt->bindValue($identifier, $this->barcode, PDO::PARAM_STR);
                        break;
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
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

            if ($this->aEvent !== null) {
                if (!$this->aEvent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEvent->getValidationFailures());
                }
            }

            if ($this->aRbtissuetype !== null) {
                if (!$this->aRbtissuetype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtissuetype->getValidationFailures());
                }
            }


            if (($retval = TissuePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActiontissues !== null) {
                    foreach ($this->collActiontissues as $referrerFK) {
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
        $pos = TissuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTypeId();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getBarcode();
                break;
            case 4:
                return $this->getEventId();
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
        if (isset($alreadyDumpedObjects['Tissue'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tissue'][$this->getPrimaryKey()] = true;
        $keys = TissuePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTypeId(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getBarcode(),
            $keys[4] => $this->getEventId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aEvent) {
                $result['Event'] = $this->aEvent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtissuetype) {
                $result['Rbtissuetype'] = $this->aRbtissuetype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActiontissues) {
                $result['Actiontissues'] = $this->collActiontissues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TissuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTypeId($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setBarcode($value);
                break;
            case 4:
                $this->setEventId($value);
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
        $keys = TissuePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTypeId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBarcode($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setEventId($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TissuePeer::DATABASE_NAME);

        if ($this->isColumnModified(TissuePeer::ID)) $criteria->add(TissuePeer::ID, $this->id);
        if ($this->isColumnModified(TissuePeer::TYPE_ID)) $criteria->add(TissuePeer::TYPE_ID, $this->type_id);
        if ($this->isColumnModified(TissuePeer::DATE)) $criteria->add(TissuePeer::DATE, $this->date);
        if ($this->isColumnModified(TissuePeer::BARCODE)) $criteria->add(TissuePeer::BARCODE, $this->barcode);
        if ($this->isColumnModified(TissuePeer::EVENT_ID)) $criteria->add(TissuePeer::EVENT_ID, $this->event_id);

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
        $criteria = new Criteria(TissuePeer::DATABASE_NAME);
        $criteria->add(TissuePeer::ID, $this->id);

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
     * @param object $copyObj An object of Tissue (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTypeId($this->getTypeId());
        $copyObj->setDate($this->getDate());
        $copyObj->setBarcode($this->getBarcode());
        $copyObj->setEventId($this->getEventId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActiontissues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontissue($relObj->copy($deepCopy));
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
     * @return Tissue Clone of current object.
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
     * @return TissuePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TissuePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Event object.
     *
     * @param             Event $v
     * @return Tissue The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEvent(Event $v = null)
    {
        if ($v === null) {
            $this->setEventId(NULL);
        } else {
            $this->setEventId($v->getId());
        }

        $this->aEvent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Event object, it will not be re-added.
        if ($v !== null) {
            $v->addTissue($this);
        }


        return $this;
    }


    /**
     * Get the associated Event object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Event The associated Event object.
     * @throws PropelException
     */
    public function getEvent(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aEvent === null && ($this->event_id !== null) && $doQuery) {
            $this->aEvent = EventQuery::create()->findPk($this->event_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEvent->addTissues($this);
             */
        }

        return $this->aEvent;
    }

    /**
     * Declares an association between this object and a Rbtissuetype object.
     *
     * @param             Rbtissuetype $v
     * @return Tissue The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbtissuetype(Rbtissuetype $v = null)
    {
        if ($v === null) {
            $this->setTypeId(NULL);
        } else {
            $this->setTypeId($v->getId());
        }

        $this->aRbtissuetype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbtissuetype object, it will not be re-added.
        if ($v !== null) {
            $v->addTissue($this);
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
        if ($this->aRbtissuetype === null && ($this->type_id !== null) && $doQuery) {
            $this->aRbtissuetype = RbtissuetypeQuery::create()->findPk($this->type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbtissuetype->addTissues($this);
             */
        }

        return $this->aRbtissuetype;
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
        if ('Actiontissue' == $relationName) {
            $this->initActiontissues();
        }
    }

    /**
     * Clears out the collActiontissues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Tissue The current object (for fluent API support)
     * @see        addActiontissues()
     */
    public function clearActiontissues()
    {
        $this->collActiontissues = null; // important to set this to null since that means it is uninitialized
        $this->collActiontissuesPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontissues collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontissues($v = true)
    {
        $this->collActiontissuesPartial = $v;
    }

    /**
     * Initializes the collActiontissues collection.
     *
     * By default this just sets the collActiontissues collection to an empty array (like clearcollActiontissues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontissues($overrideExisting = true)
    {
        if (null !== $this->collActiontissues && !$overrideExisting) {
            return;
        }
        $this->collActiontissues = new PropelObjectCollection();
        $this->collActiontissues->setModel('Actiontissue');
    }

    /**
     * Gets an array of Actiontissue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tissue is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Actiontissue[] List of Actiontissue objects
     * @throws PropelException
     */
    public function getActiontissues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontissuesPartial && !$this->isNew();
        if (null === $this->collActiontissues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontissues) {
                // return empty collection
                $this->initActiontissues();
            } else {
                $collActiontissues = ActiontissueQuery::create(null, $criteria)
                    ->filterByTissue($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontissuesPartial && count($collActiontissues)) {
                      $this->initActiontissues(false);

                      foreach($collActiontissues as $obj) {
                        if (false == $this->collActiontissues->contains($obj)) {
                          $this->collActiontissues->append($obj);
                        }
                      }

                      $this->collActiontissuesPartial = true;
                    }

                    $collActiontissues->getInternalIterator()->rewind();
                    return $collActiontissues;
                }

                if($partial && $this->collActiontissues) {
                    foreach($this->collActiontissues as $obj) {
                        if($obj->isNew()) {
                            $collActiontissues[] = $obj;
                        }
                    }
                }

                $this->collActiontissues = $collActiontissues;
                $this->collActiontissuesPartial = false;
            }
        }

        return $this->collActiontissues;
    }

    /**
     * Sets a collection of Actiontissue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontissues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Tissue The current object (for fluent API support)
     */
    public function setActiontissues(PropelCollection $actiontissues, PropelPDO $con = null)
    {
        $actiontissuesToDelete = $this->getActiontissues(new Criteria(), $con)->diff($actiontissues);

        $this->actiontissuesScheduledForDeletion = unserialize(serialize($actiontissuesToDelete));

        foreach ($actiontissuesToDelete as $actiontissueRemoved) {
            $actiontissueRemoved->setTissue(null);
        }

        $this->collActiontissues = null;
        foreach ($actiontissues as $actiontissue) {
            $this->addActiontissue($actiontissue);
        }

        $this->collActiontissues = $actiontissues;
        $this->collActiontissuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Actiontissue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Actiontissue objects.
     * @throws PropelException
     */
    public function countActiontissues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontissuesPartial && !$this->isNew();
        if (null === $this->collActiontissues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontissues) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontissues());
            }
            $query = ActiontissueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTissue($this)
                ->count($con);
        }

        return count($this->collActiontissues);
    }

    /**
     * Method called to associate a Actiontissue object to this object
     * through the Actiontissue foreign key attribute.
     *
     * @param    Actiontissue $l Actiontissue
     * @return Tissue The current object (for fluent API support)
     */
    public function addActiontissue(Actiontissue $l)
    {
        if ($this->collActiontissues === null) {
            $this->initActiontissues();
            $this->collActiontissuesPartial = true;
        }
        if (!in_array($l, $this->collActiontissues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontissue($l);
        }

        return $this;
    }

    /**
     * @param	Actiontissue $actiontissue The actiontissue object to add.
     */
    protected function doAddActiontissue($actiontissue)
    {
        $this->collActiontissues[]= $actiontissue;
        $actiontissue->setTissue($this);
    }

    /**
     * @param	Actiontissue $actiontissue The actiontissue object to remove.
     * @return Tissue The current object (for fluent API support)
     */
    public function removeActiontissue($actiontissue)
    {
        if ($this->getActiontissues()->contains($actiontissue)) {
            $this->collActiontissues->remove($this->collActiontissues->search($actiontissue));
            if (null === $this->actiontissuesScheduledForDeletion) {
                $this->actiontissuesScheduledForDeletion = clone $this->collActiontissues;
                $this->actiontissuesScheduledForDeletion->clear();
            }
            $this->actiontissuesScheduledForDeletion[]= clone $actiontissue;
            $actiontissue->setTissue(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tissue is new, it will return
     * an empty collection; or if this Tissue has previously
     * been saved, it will retrieve related Actiontissues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tissue.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Actiontissue[] List of Actiontissue objects
     */
    public function getActiontissuesJoinAction($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontissueQuery::create(null, $criteria);
        $query->joinWith('Action', $join_behavior);

        return $this->getActiontissues($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->type_id = null;
        $this->date = null;
        $this->barcode = null;
        $this->event_id = null;
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
            if ($this->collActiontissues) {
                foreach ($this->collActiontissues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aEvent instanceof Persistent) {
              $this->aEvent->clearAllReferences($deep);
            }
            if ($this->aRbtissuetype instanceof Persistent) {
              $this->aRbtissuetype->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActiontissues instanceof PropelCollection) {
            $this->collActiontissues->clearIterator();
        }
        $this->collActiontissues = null;
        $this->aEvent = null;
        $this->aRbtissuetype = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TissuePeer::DEFAULT_STRING_FORMAT);
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
