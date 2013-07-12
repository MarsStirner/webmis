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
use Webmis\Models\Rbdocumenttype;
use Webmis\Models\RbdocumenttypePeer;
use Webmis\Models\RbdocumenttypeQuery;

/**
 * Base class that represents a row from the 'rbDocumentType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbdocumenttype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbdocumenttypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbdocumenttypePeer
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
     * The value for the group_id field.
     * @var        int
     */
    protected $group_id;

    /**
     * The value for the serial_format field.
     * @var        int
     */
    protected $serial_format;

    /**
     * The value for the number_format field.
     * @var        int
     */
    protected $number_format;

    /**
     * The value for the federalcode field.
     * @var        string
     */
    protected $federalcode;

    /**
     * The value for the soccode field.
     * @var        string
     */
    protected $soccode;

    /**
     * The value for the tfomscode field.
     * @var        int
     */
    protected $tfomscode;

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
     * Get the [group_id] column value.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Get the [serial_format] column value.
     *
     * @return int
     */
    public function getSerialFormat()
    {
        return $this->serial_format;
    }

    /**
     * Get the [number_format] column value.
     *
     * @return int
     */
    public function getNumberFormat()
    {
        return $this->number_format;
    }

    /**
     * Get the [federalcode] column value.
     *
     * @return string
     */
    public function getFederalcode()
    {
        return $this->federalcode;
    }

    /**
     * Get the [soccode] column value.
     *
     * @return string
     */
    public function getSoccode()
    {
        return $this->soccode;
    }

    /**
     * Get the [tfomscode] column value.
     *
     * @return int
     */
    public function getTfomscode()
    {
        return $this->tfomscode;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [regionalcode] column.
     *
     * @param string $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setRegionalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regionalcode !== $v) {
            $this->regionalcode = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::REGIONALCODE;
        }


        return $this;
    } // setRegionalcode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [group_id] column.
     *
     * @param int $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setGroupId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->group_id !== $v) {
            $this->group_id = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::GROUP_ID;
        }


        return $this;
    } // setGroupId()

    /**
     * Set the value of [serial_format] column.
     *
     * @param int $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setSerialFormat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->serial_format !== $v) {
            $this->serial_format = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::SERIAL_FORMAT;
        }


        return $this;
    } // setSerialFormat()

    /**
     * Set the value of [number_format] column.
     *
     * @param int $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setNumberFormat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->number_format !== $v) {
            $this->number_format = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::NUMBER_FORMAT;
        }


        return $this;
    } // setNumberFormat()

    /**
     * Set the value of [federalcode] column.
     *
     * @param string $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setFederalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->federalcode !== $v) {
            $this->federalcode = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::FEDERALCODE;
        }


        return $this;
    } // setFederalcode()

    /**
     * Set the value of [soccode] column.
     *
     * @param string $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setSoccode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soccode !== $v) {
            $this->soccode = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::SOCCODE;
        }


        return $this;
    } // setSoccode()

    /**
     * Set the value of [tfomscode] column.
     *
     * @param int $v new value
     * @return Rbdocumenttype The current object (for fluent API support)
     */
    public function setTfomscode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tfomscode !== $v) {
            $this->tfomscode = $v;
            $this->modifiedColumns[] = RbdocumenttypePeer::TFOMSCODE;
        }


        return $this;
    } // setTfomscode()

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
            $this->group_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->serial_format = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->number_format = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->federalcode = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->soccode = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->tfomscode = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 10; // 10 = RbdocumenttypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbdocumenttype object", $e);
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
            $con = Propel::getConnection(RbdocumenttypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbdocumenttypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
            $con = Propel::getConnection(RbdocumenttypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbdocumenttypeQuery::create()
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
            $con = Propel::getConnection(RbdocumenttypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbdocumenttypePeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = RbdocumenttypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbdocumenttypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbdocumenttypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::REGIONALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionalCode`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`group_id`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::SERIAL_FORMAT)) {
            $modifiedColumns[':p' . $index++]  = '`serial_format`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::NUMBER_FORMAT)) {
            $modifiedColumns[':p' . $index++]  = '`number_format`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::FEDERALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`federalCode`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::SOCCODE)) {
            $modifiedColumns[':p' . $index++]  = '`socCode`';
        }
        if ($this->isColumnModified(RbdocumenttypePeer::TFOMSCODE)) {
            $modifiedColumns[':p' . $index++]  = '`TFOMSCode`';
        }

        $sql = sprintf(
            'INSERT INTO `rbDocumentType` (%s) VALUES (%s)',
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
                    case '`group_id`':
                        $stmt->bindValue($identifier, $this->group_id, PDO::PARAM_INT);
                        break;
                    case '`serial_format`':
                        $stmt->bindValue($identifier, $this->serial_format, PDO::PARAM_INT);
                        break;
                    case '`number_format`':
                        $stmt->bindValue($identifier, $this->number_format, PDO::PARAM_INT);
                        break;
                    case '`federalCode`':
                        $stmt->bindValue($identifier, $this->federalcode, PDO::PARAM_STR);
                        break;
                    case '`socCode`':
                        $stmt->bindValue($identifier, $this->soccode, PDO::PARAM_STR);
                        break;
                    case '`TFOMSCode`':
                        $stmt->bindValue($identifier, $this->tfomscode, PDO::PARAM_INT);
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


            if (($retval = RbdocumenttypePeer::doValidate($this, $columns)) !== true) {
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
        $pos = RbdocumenttypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
            case 4:
                return $this->getGroupId();
                break;
            case 5:
                return $this->getSerialFormat();
                break;
            case 6:
                return $this->getNumberFormat();
                break;
            case 7:
                return $this->getFederalcode();
                break;
            case 8:
                return $this->getSoccode();
                break;
            case 9:
                return $this->getTfomscode();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['Rbdocumenttype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbdocumenttype'][$this->getPrimaryKey()] = true;
        $keys = RbdocumenttypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getRegionalcode(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getGroupId(),
            $keys[5] => $this->getSerialFormat(),
            $keys[6] => $this->getNumberFormat(),
            $keys[7] => $this->getFederalcode(),
            $keys[8] => $this->getSoccode(),
            $keys[9] => $this->getTfomscode(),
        );

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
        $pos = RbdocumenttypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
            case 4:
                $this->setGroupId($value);
                break;
            case 5:
                $this->setSerialFormat($value);
                break;
            case 6:
                $this->setNumberFormat($value);
                break;
            case 7:
                $this->setFederalcode($value);
                break;
            case 8:
                $this->setSoccode($value);
                break;
            case 9:
                $this->setTfomscode($value);
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
        $keys = RbdocumenttypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setRegionalcode($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setGroupId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSerialFormat($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNumberFormat($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setFederalcode($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSoccode($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTfomscode($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbdocumenttypePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbdocumenttypePeer::ID)) $criteria->add(RbdocumenttypePeer::ID, $this->id);
        if ($this->isColumnModified(RbdocumenttypePeer::CODE)) $criteria->add(RbdocumenttypePeer::CODE, $this->code);
        if ($this->isColumnModified(RbdocumenttypePeer::REGIONALCODE)) $criteria->add(RbdocumenttypePeer::REGIONALCODE, $this->regionalcode);
        if ($this->isColumnModified(RbdocumenttypePeer::NAME)) $criteria->add(RbdocumenttypePeer::NAME, $this->name);
        if ($this->isColumnModified(RbdocumenttypePeer::GROUP_ID)) $criteria->add(RbdocumenttypePeer::GROUP_ID, $this->group_id);
        if ($this->isColumnModified(RbdocumenttypePeer::SERIAL_FORMAT)) $criteria->add(RbdocumenttypePeer::SERIAL_FORMAT, $this->serial_format);
        if ($this->isColumnModified(RbdocumenttypePeer::NUMBER_FORMAT)) $criteria->add(RbdocumenttypePeer::NUMBER_FORMAT, $this->number_format);
        if ($this->isColumnModified(RbdocumenttypePeer::FEDERALCODE)) $criteria->add(RbdocumenttypePeer::FEDERALCODE, $this->federalcode);
        if ($this->isColumnModified(RbdocumenttypePeer::SOCCODE)) $criteria->add(RbdocumenttypePeer::SOCCODE, $this->soccode);
        if ($this->isColumnModified(RbdocumenttypePeer::TFOMSCODE)) $criteria->add(RbdocumenttypePeer::TFOMSCODE, $this->tfomscode);

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
        $criteria = new Criteria(RbdocumenttypePeer::DATABASE_NAME);
        $criteria->add(RbdocumenttypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbdocumenttype (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setRegionalcode($this->getRegionalcode());
        $copyObj->setName($this->getName());
        $copyObj->setGroupId($this->getGroupId());
        $copyObj->setSerialFormat($this->getSerialFormat());
        $copyObj->setNumberFormat($this->getNumberFormat());
        $copyObj->setFederalcode($this->getFederalcode());
        $copyObj->setSoccode($this->getSoccode());
        $copyObj->setTfomscode($this->getTfomscode());
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
     * @return Rbdocumenttype Clone of current object.
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
     * @return RbdocumenttypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbdocumenttypePeer();
        }

        return self::$peer;
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
        $this->group_id = null;
        $this->serial_format = null;
        $this->number_format = null;
        $this->federalcode = null;
        $this->soccode = null;
        $this->tfomscode = null;
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

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbdocumenttypePeer::DEFAULT_STRING_FORMAT);
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
