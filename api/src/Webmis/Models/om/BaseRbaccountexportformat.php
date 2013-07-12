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
use Webmis\Models\Rbaccountexportformat;
use Webmis\Models\RbaccountexportformatPeer;
use Webmis\Models\RbaccountexportformatQuery;

/**
 * Base class that represents a row from the 'rbAccountExportFormat' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbaccountexportformat extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbaccountexportformatPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbaccountexportformatPeer
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
     * The value for the prog field.
     * @var        string
     */
    protected $prog;

    /**
     * The value for the preferentarchiver field.
     * @var        string
     */
    protected $preferentarchiver;

    /**
     * The value for the emailrequired field.
     * @var        boolean
     */
    protected $emailrequired;

    /**
     * The value for the emailto field.
     * @var        string
     */
    protected $emailto;

    /**
     * The value for the subject field.
     * @var        string
     */
    protected $subject;

    /**
     * The value for the message field.
     * @var        string
     */
    protected $message;

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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [prog] column value.
     *
     * @return string
     */
    public function getProg()
    {
        return $this->prog;
    }

    /**
     * Get the [preferentarchiver] column value.
     *
     * @return string
     */
    public function getPreferentarchiver()
    {
        return $this->preferentarchiver;
    }

    /**
     * Get the [emailrequired] column value.
     *
     * @return boolean
     */
    public function getEmailrequired()
    {
        return $this->emailrequired;
    }

    /**
     * Get the [emailto] column value.
     *
     * @return string
     */
    public function getEmailto()
    {
        return $this->emailto;
    }

    /**
     * Get the [subject] column value.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Get the [message] column value.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [prog] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setProg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prog !== $v) {
            $this->prog = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::PROG;
        }


        return $this;
    } // setProg()

    /**
     * Set the value of [preferentarchiver] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setPreferentarchiver($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->preferentarchiver !== $v) {
            $this->preferentarchiver = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::PREFERENTARCHIVER;
        }


        return $this;
    } // setPreferentarchiver()

    /**
     * Sets the value of the [emailrequired] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setEmailrequired($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->emailrequired !== $v) {
            $this->emailrequired = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::EMAILREQUIRED;
        }


        return $this;
    } // setEmailrequired()

    /**
     * Set the value of [emailto] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setEmailto($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->emailto !== $v) {
            $this->emailto = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::EMAILTO;
        }


        return $this;
    } // setEmailto()

    /**
     * Set the value of [subject] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setSubject($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->subject !== $v) {
            $this->subject = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::SUBJECT;
        }


        return $this;
    } // setSubject()

    /**
     * Set the value of [message] column.
     *
     * @param string $v new value
     * @return Rbaccountexportformat The current object (for fluent API support)
     */
    public function setMessage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->message !== $v) {
            $this->message = $v;
            $this->modifiedColumns[] = RbaccountexportformatPeer::MESSAGE;
        }


        return $this;
    } // setMessage()

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
            $this->prog = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->preferentarchiver = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->emailrequired = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->emailto = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->subject = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->message = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = RbaccountexportformatPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbaccountexportformat object", $e);
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
            $con = Propel::getConnection(RbaccountexportformatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbaccountexportformatPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(RbaccountexportformatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbaccountexportformatQuery::create()
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
            $con = Propel::getConnection(RbaccountexportformatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbaccountexportformatPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = RbaccountexportformatPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbaccountexportformatPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbaccountexportformatPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::PROG)) {
            $modifiedColumns[':p' . $index++]  = '`prog`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::PREFERENTARCHIVER)) {
            $modifiedColumns[':p' . $index++]  = '`preferentArchiver`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::EMAILREQUIRED)) {
            $modifiedColumns[':p' . $index++]  = '`emailRequired`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::EMAILTO)) {
            $modifiedColumns[':p' . $index++]  = '`emailTo`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::SUBJECT)) {
            $modifiedColumns[':p' . $index++]  = '`subject`';
        }
        if ($this->isColumnModified(RbaccountexportformatPeer::MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = '`message`';
        }

        $sql = sprintf(
            'INSERT INTO `rbAccountExportFormat` (%s) VALUES (%s)',
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
                    case '`prog`':
                        $stmt->bindValue($identifier, $this->prog, PDO::PARAM_STR);
                        break;
                    case '`preferentArchiver`':
                        $stmt->bindValue($identifier, $this->preferentarchiver, PDO::PARAM_STR);
                        break;
                    case '`emailRequired`':
                        $stmt->bindValue($identifier, (int) $this->emailrequired, PDO::PARAM_INT);
                        break;
                    case '`emailTo`':
                        $stmt->bindValue($identifier, $this->emailto, PDO::PARAM_STR);
                        break;
                    case '`subject`':
                        $stmt->bindValue($identifier, $this->subject, PDO::PARAM_STR);
                        break;
                    case '`message`':
                        $stmt->bindValue($identifier, $this->message, PDO::PARAM_STR);
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


            if (($retval = RbaccountexportformatPeer::doValidate($this, $columns)) !== true) {
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
        $pos = RbaccountexportformatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getProg();
                break;
            case 4:
                return $this->getPreferentarchiver();
                break;
            case 5:
                return $this->getEmailrequired();
                break;
            case 6:
                return $this->getEmailto();
                break;
            case 7:
                return $this->getSubject();
                break;
            case 8:
                return $this->getMessage();
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
        if (isset($alreadyDumpedObjects['Rbaccountexportformat'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbaccountexportformat'][$this->getPrimaryKey()] = true;
        $keys = RbaccountexportformatPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getProg(),
            $keys[4] => $this->getPreferentarchiver(),
            $keys[5] => $this->getEmailrequired(),
            $keys[6] => $this->getEmailto(),
            $keys[7] => $this->getSubject(),
            $keys[8] => $this->getMessage(),
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
        $pos = RbaccountexportformatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setProg($value);
                break;
            case 4:
                $this->setPreferentarchiver($value);
                break;
            case 5:
                $this->setEmailrequired($value);
                break;
            case 6:
                $this->setEmailto($value);
                break;
            case 7:
                $this->setSubject($value);
                break;
            case 8:
                $this->setMessage($value);
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
        $keys = RbaccountexportformatPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProg($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPreferentarchiver($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEmailrequired($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEmailto($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSubject($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMessage($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbaccountexportformatPeer::DATABASE_NAME);

        if ($this->isColumnModified(RbaccountexportformatPeer::ID)) $criteria->add(RbaccountexportformatPeer::ID, $this->id);
        if ($this->isColumnModified(RbaccountexportformatPeer::CODE)) $criteria->add(RbaccountexportformatPeer::CODE, $this->code);
        if ($this->isColumnModified(RbaccountexportformatPeer::NAME)) $criteria->add(RbaccountexportformatPeer::NAME, $this->name);
        if ($this->isColumnModified(RbaccountexportformatPeer::PROG)) $criteria->add(RbaccountexportformatPeer::PROG, $this->prog);
        if ($this->isColumnModified(RbaccountexportformatPeer::PREFERENTARCHIVER)) $criteria->add(RbaccountexportformatPeer::PREFERENTARCHIVER, $this->preferentarchiver);
        if ($this->isColumnModified(RbaccountexportformatPeer::EMAILREQUIRED)) $criteria->add(RbaccountexportformatPeer::EMAILREQUIRED, $this->emailrequired);
        if ($this->isColumnModified(RbaccountexportformatPeer::EMAILTO)) $criteria->add(RbaccountexportformatPeer::EMAILTO, $this->emailto);
        if ($this->isColumnModified(RbaccountexportformatPeer::SUBJECT)) $criteria->add(RbaccountexportformatPeer::SUBJECT, $this->subject);
        if ($this->isColumnModified(RbaccountexportformatPeer::MESSAGE)) $criteria->add(RbaccountexportformatPeer::MESSAGE, $this->message);

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
        $criteria = new Criteria(RbaccountexportformatPeer::DATABASE_NAME);
        $criteria->add(RbaccountexportformatPeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbaccountexportformat (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setProg($this->getProg());
        $copyObj->setPreferentarchiver($this->getPreferentarchiver());
        $copyObj->setEmailrequired($this->getEmailrequired());
        $copyObj->setEmailto($this->getEmailto());
        $copyObj->setSubject($this->getSubject());
        $copyObj->setMessage($this->getMessage());
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
     * @return Rbaccountexportformat Clone of current object.
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
     * @return RbaccountexportformatPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbaccountexportformatPeer();
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
        $this->name = null;
        $this->prog = null;
        $this->preferentarchiver = null;
        $this->emailrequired = null;
        $this->emailto = null;
        $this->subject = null;
        $this->message = null;
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
        return (string) $this->exportTo(RbaccountexportformatPeer::DEFAULT_STRING_FORMAT);
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
