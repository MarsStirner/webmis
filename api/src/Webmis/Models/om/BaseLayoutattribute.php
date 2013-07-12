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
use Webmis\Models\Layoutattribute;
use Webmis\Models\LayoutattributePeer;
use Webmis\Models\LayoutattributeQuery;
use Webmis\Models\Layoutattributevalue;
use Webmis\Models\LayoutattributevalueQuery;

/**
 * Base class that represents a row from the 'LayoutAttribute' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseLayoutattribute extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\LayoutattributePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        LayoutattributePeer
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
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the typename field.
     * @var        string
     */
    protected $typename;

    /**
     * The value for the measure field.
     * @var        string
     */
    protected $measure;

    /**
     * The value for the defaultvalue field.
     * @var        string
     */
    protected $defaultvalue;

    /**
     * @var        PropelObjectCollection|Layoutattributevalue[] Collection to store aggregation of Layoutattributevalue objects.
     */
    protected $collLayoutattributevalues;
    protected $collLayoutattributevaluesPartial;

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
    protected $layoutattributevaluesScheduledForDeletion = null;

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
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
     * Get the [code] column value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [typename] column value.
     *
     * @return string
     */
    public function getTypename()
    {
        return $this->typename;
    }

    /**
     * Get the [measure] column value.
     *
     * @return string
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * Get the [defaultvalue] column value.
     *
     * @return string
     */
    public function getDefaultvalue()
    {
        return $this->defaultvalue;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = LayoutattributePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = LayoutattributePeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = LayoutattributePeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = LayoutattributePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [typename] column.
     *
     * @param string $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setTypename($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->typename !== $v) {
            $this->typename = $v;
            $this->modifiedColumns[] = LayoutattributePeer::TYPENAME;
        }


        return $this;
    } // setTypename()

    /**
     * Set the value of [measure] column.
     *
     * @param string $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setMeasure($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->measure !== $v) {
            $this->measure = $v;
            $this->modifiedColumns[] = LayoutattributePeer::MEASURE;
        }


        return $this;
    } // setMeasure()

    /**
     * Set the value of [defaultvalue] column.
     *
     * @param string $v new value
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setDefaultvalue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->defaultvalue !== $v) {
            $this->defaultvalue = $v;
            $this->modifiedColumns[] = LayoutattributePeer::DEFAULTVALUE;
        }


        return $this;
    } // setDefaultvalue()

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
            $this->title = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->code = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->typename = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->measure = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->defaultvalue = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = LayoutattributePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Layoutattribute object", $e);
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
            $con = Propel::getConnection(LayoutattributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = LayoutattributePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collLayoutattributevalues = null;

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
            $con = Propel::getConnection(LayoutattributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = LayoutattributeQuery::create()
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
            $con = Propel::getConnection(LayoutattributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                LayoutattributePeer::addInstanceToPool($this);
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

            if ($this->layoutattributevaluesScheduledForDeletion !== null) {
                if (!$this->layoutattributevaluesScheduledForDeletion->isEmpty()) {
                    LayoutattributevalueQuery::create()
                        ->filterByPrimaryKeys($this->layoutattributevaluesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->layoutattributevaluesScheduledForDeletion = null;
                }
            }

            if ($this->collLayoutattributevalues !== null) {
                foreach ($this->collLayoutattributevalues as $referrerFK) {
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

        $this->modifiedColumns[] = LayoutattributePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . LayoutattributePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(LayoutattributePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(LayoutattributePeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(LayoutattributePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(LayoutattributePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(LayoutattributePeer::TYPENAME)) {
            $modifiedColumns[':p' . $index++]  = '`typeName`';
        }
        if ($this->isColumnModified(LayoutattributePeer::MEASURE)) {
            $modifiedColumns[':p' . $index++]  = '`measure`';
        }
        if ($this->isColumnModified(LayoutattributePeer::DEFAULTVALUE)) {
            $modifiedColumns[':p' . $index++]  = '`defaultValue`';
        }

        $sql = sprintf(
            'INSERT INTO `LayoutAttribute` (%s) VALUES (%s)',
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
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`typeName`':
                        $stmt->bindValue($identifier, $this->typename, PDO::PARAM_STR);
                        break;
                    case '`measure`':
                        $stmt->bindValue($identifier, $this->measure, PDO::PARAM_STR);
                        break;
                    case '`defaultValue`':
                        $stmt->bindValue($identifier, $this->defaultvalue, PDO::PARAM_STR);
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


            if (($retval = LayoutattributePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collLayoutattributevalues !== null) {
                    foreach ($this->collLayoutattributevalues as $referrerFK) {
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
        $pos = LayoutattributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTitle();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getCode();
                break;
            case 4:
                return $this->getTypename();
                break;
            case 5:
                return $this->getMeasure();
                break;
            case 6:
                return $this->getDefaultvalue();
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
        if (isset($alreadyDumpedObjects['Layoutattribute'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Layoutattribute'][$this->getPrimaryKey()] = true;
        $keys = LayoutattributePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getCode(),
            $keys[4] => $this->getTypename(),
            $keys[5] => $this->getMeasure(),
            $keys[6] => $this->getDefaultvalue(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collLayoutattributevalues) {
                $result['Layoutattributevalues'] = $this->collLayoutattributevalues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = LayoutattributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTitle($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setCode($value);
                break;
            case 4:
                $this->setTypename($value);
                break;
            case 5:
                $this->setMeasure($value);
                break;
            case 6:
                $this->setDefaultvalue($value);
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
        $keys = LayoutattributePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCode($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTypename($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMeasure($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDefaultvalue($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(LayoutattributePeer::DATABASE_NAME);

        if ($this->isColumnModified(LayoutattributePeer::ID)) $criteria->add(LayoutattributePeer::ID, $this->id);
        if ($this->isColumnModified(LayoutattributePeer::TITLE)) $criteria->add(LayoutattributePeer::TITLE, $this->title);
        if ($this->isColumnModified(LayoutattributePeer::DESCRIPTION)) $criteria->add(LayoutattributePeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(LayoutattributePeer::CODE)) $criteria->add(LayoutattributePeer::CODE, $this->code);
        if ($this->isColumnModified(LayoutattributePeer::TYPENAME)) $criteria->add(LayoutattributePeer::TYPENAME, $this->typename);
        if ($this->isColumnModified(LayoutattributePeer::MEASURE)) $criteria->add(LayoutattributePeer::MEASURE, $this->measure);
        if ($this->isColumnModified(LayoutattributePeer::DEFAULTVALUE)) $criteria->add(LayoutattributePeer::DEFAULTVALUE, $this->defaultvalue);

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
        $criteria = new Criteria(LayoutattributePeer::DATABASE_NAME);
        $criteria->add(LayoutattributePeer::ID, $this->id);

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
     * @param object $copyObj An object of Layoutattribute (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setCode($this->getCode());
        $copyObj->setTypename($this->getTypename());
        $copyObj->setMeasure($this->getMeasure());
        $copyObj->setDefaultvalue($this->getDefaultvalue());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getLayoutattributevalues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLayoutattributevalue($relObj->copy($deepCopy));
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
     * @return Layoutattribute Clone of current object.
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
     * @return LayoutattributePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new LayoutattributePeer();
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
        if ('Layoutattributevalue' == $relationName) {
            $this->initLayoutattributevalues();
        }
    }

    /**
     * Clears out the collLayoutattributevalues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Layoutattribute The current object (for fluent API support)
     * @see        addLayoutattributevalues()
     */
    public function clearLayoutattributevalues()
    {
        $this->collLayoutattributevalues = null; // important to set this to null since that means it is uninitialized
        $this->collLayoutattributevaluesPartial = null;

        return $this;
    }

    /**
     * reset is the collLayoutattributevalues collection loaded partially
     *
     * @return void
     */
    public function resetPartialLayoutattributevalues($v = true)
    {
        $this->collLayoutattributevaluesPartial = $v;
    }

    /**
     * Initializes the collLayoutattributevalues collection.
     *
     * By default this just sets the collLayoutattributevalues collection to an empty array (like clearcollLayoutattributevalues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLayoutattributevalues($overrideExisting = true)
    {
        if (null !== $this->collLayoutattributevalues && !$overrideExisting) {
            return;
        }
        $this->collLayoutattributevalues = new PropelObjectCollection();
        $this->collLayoutattributevalues->setModel('Layoutattributevalue');
    }

    /**
     * Gets an array of Layoutattributevalue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Layoutattribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Layoutattributevalue[] List of Layoutattributevalue objects
     * @throws PropelException
     */
    public function getLayoutattributevalues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLayoutattributevaluesPartial && !$this->isNew();
        if (null === $this->collLayoutattributevalues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLayoutattributevalues) {
                // return empty collection
                $this->initLayoutattributevalues();
            } else {
                $collLayoutattributevalues = LayoutattributevalueQuery::create(null, $criteria)
                    ->filterByLayoutattribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLayoutattributevaluesPartial && count($collLayoutattributevalues)) {
                      $this->initLayoutattributevalues(false);

                      foreach($collLayoutattributevalues as $obj) {
                        if (false == $this->collLayoutattributevalues->contains($obj)) {
                          $this->collLayoutattributevalues->append($obj);
                        }
                      }

                      $this->collLayoutattributevaluesPartial = true;
                    }

                    $collLayoutattributevalues->getInternalIterator()->rewind();
                    return $collLayoutattributevalues;
                }

                if($partial && $this->collLayoutattributevalues) {
                    foreach($this->collLayoutattributevalues as $obj) {
                        if($obj->isNew()) {
                            $collLayoutattributevalues[] = $obj;
                        }
                    }
                }

                $this->collLayoutattributevalues = $collLayoutattributevalues;
                $this->collLayoutattributevaluesPartial = false;
            }
        }

        return $this->collLayoutattributevalues;
    }

    /**
     * Sets a collection of Layoutattributevalue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $layoutattributevalues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function setLayoutattributevalues(PropelCollection $layoutattributevalues, PropelPDO $con = null)
    {
        $layoutattributevaluesToDelete = $this->getLayoutattributevalues(new Criteria(), $con)->diff($layoutattributevalues);

        $this->layoutattributevaluesScheduledForDeletion = unserialize(serialize($layoutattributevaluesToDelete));

        foreach ($layoutattributevaluesToDelete as $layoutattributevalueRemoved) {
            $layoutattributevalueRemoved->setLayoutattribute(null);
        }

        $this->collLayoutattributevalues = null;
        foreach ($layoutattributevalues as $layoutattributevalue) {
            $this->addLayoutattributevalue($layoutattributevalue);
        }

        $this->collLayoutattributevalues = $layoutattributevalues;
        $this->collLayoutattributevaluesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Layoutattributevalue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Layoutattributevalue objects.
     * @throws PropelException
     */
    public function countLayoutattributevalues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLayoutattributevaluesPartial && !$this->isNew();
        if (null === $this->collLayoutattributevalues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLayoutattributevalues) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLayoutattributevalues());
            }
            $query = LayoutattributevalueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLayoutattribute($this)
                ->count($con);
        }

        return count($this->collLayoutattributevalues);
    }

    /**
     * Method called to associate a Layoutattributevalue object to this object
     * through the Layoutattributevalue foreign key attribute.
     *
     * @param    Layoutattributevalue $l Layoutattributevalue
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function addLayoutattributevalue(Layoutattributevalue $l)
    {
        if ($this->collLayoutattributevalues === null) {
            $this->initLayoutattributevalues();
            $this->collLayoutattributevaluesPartial = true;
        }
        if (!in_array($l, $this->collLayoutattributevalues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLayoutattributevalue($l);
        }

        return $this;
    }

    /**
     * @param	Layoutattributevalue $layoutattributevalue The layoutattributevalue object to add.
     */
    protected function doAddLayoutattributevalue($layoutattributevalue)
    {
        $this->collLayoutattributevalues[]= $layoutattributevalue;
        $layoutattributevalue->setLayoutattribute($this);
    }

    /**
     * @param	Layoutattributevalue $layoutattributevalue The layoutattributevalue object to remove.
     * @return Layoutattribute The current object (for fluent API support)
     */
    public function removeLayoutattributevalue($layoutattributevalue)
    {
        if ($this->getLayoutattributevalues()->contains($layoutattributevalue)) {
            $this->collLayoutattributevalues->remove($this->collLayoutattributevalues->search($layoutattributevalue));
            if (null === $this->layoutattributevaluesScheduledForDeletion) {
                $this->layoutattributevaluesScheduledForDeletion = clone $this->collLayoutattributevalues;
                $this->layoutattributevaluesScheduledForDeletion->clear();
            }
            $this->layoutattributevaluesScheduledForDeletion[]= clone $layoutattributevalue;
            $layoutattributevalue->setLayoutattribute(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->title = null;
        $this->description = null;
        $this->code = null;
        $this->typename = null;
        $this->measure = null;
        $this->defaultvalue = null;
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
            if ($this->collLayoutattributevalues) {
                foreach ($this->collLayoutattributevalues as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collLayoutattributevalues instanceof PropelCollection) {
            $this->collLayoutattributevalues->clearIterator();
        }
        $this->collLayoutattributevalues = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(LayoutattributePeer::DEFAULT_STRING_FORMAT);
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
