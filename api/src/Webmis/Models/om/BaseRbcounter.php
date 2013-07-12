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
use Webmis\Models\Eventtype;
use Webmis\Models\EventtypeQuery;
use Webmis\Models\Rbcounter;
use Webmis\Models\RbcounterPeer;
use Webmis\Models\RbcounterQuery;

/**
 * Base class that represents a row from the 'rbCounter' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbcounter extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbcounterPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbcounterPeer
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
     * The value for the value field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $value;

    /**
     * The value for the prefix field.
     * @var        string
     */
    protected $prefix;

    /**
     * The value for the separator field.
     * Note: this column has a database default value of: ' '
     * @var        string
     */
    protected $separator;

    /**
     * The value for the reset field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $reset;

    /**
     * The value for the startdate field.
     * @var        string
     */
    protected $startdate;

    /**
     * The value for the resetdate field.
     * @var        string
     */
    protected $resetdate;

    /**
     * The value for the sequenceflag field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $sequenceflag;

    /**
     * @var        PropelObjectCollection|Eventtype[] Collection to store aggregation of Eventtype objects.
     */
    protected $collEventtypes;
    protected $collEventtypesPartial;

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
    protected $eventtypesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->value = 0;
        $this->separator = ' ';
        $this->reset = 0;
        $this->sequenceflag = false;
    }

    /**
     * Initializes internal state of BaseRbcounter object.
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
     * Get the [value] column value.
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the [prefix] column value.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Get the [separator] column value.
     *
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }

    /**
     * Get the [reset] column value.
     *
     * @return int
     */
    public function getReset()
    {
        return $this->reset;
    }

    /**
     * Get the [optionally formatted] temporal [startdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStartdate($format = 'Y-m-d H:i:s')
    {
        if ($this->startdate === null) {
            return null;
        }

        if ($this->startdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->startdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->startdate, true), $x);
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
     * Get the [optionally formatted] temporal [resetdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getResetdate($format = 'Y-m-d H:i:s')
    {
        if ($this->resetdate === null) {
            return null;
        }

        if ($this->resetdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->resetdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->resetdate, true), $x);
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
     * Get the [sequenceflag] column value.
     *
     * @return boolean
     */
    public function getSequenceflag()
    {
        return $this->sequenceflag;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbcounterPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbcounterPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbcounterPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [value] column.
     *
     * @param int $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = RbcounterPeer::VALUE;
        }


        return $this;
    } // setValue()

    /**
     * Set the value of [prefix] column.
     *
     * @param string $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setPrefix($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prefix !== $v) {
            $this->prefix = $v;
            $this->modifiedColumns[] = RbcounterPeer::PREFIX;
        }


        return $this;
    } // setPrefix()

    /**
     * Set the value of [separator] column.
     *
     * @param string $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setSeparator($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->separator !== $v) {
            $this->separator = $v;
            $this->modifiedColumns[] = RbcounterPeer::SEPARATOR;
        }


        return $this;
    } // setSeparator()

    /**
     * Set the value of [reset] column.
     *
     * @param int $v new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setReset($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->reset !== $v) {
            $this->reset = $v;
            $this->modifiedColumns[] = RbcounterPeer::RESET;
        }


        return $this;
    } // setReset()

    /**
     * Sets the value of [startdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setStartdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->startdate !== null || $dt !== null) {
            $currentDateAsString = ($this->startdate !== null && $tmpDt = new DateTime($this->startdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->startdate = $newDateAsString;
                $this->modifiedColumns[] = RbcounterPeer::STARTDATE;
            }
        } // if either are not null


        return $this;
    } // setStartdate()

    /**
     * Sets the value of [resetdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setResetdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->resetdate !== null || $dt !== null) {
            $currentDateAsString = ($this->resetdate !== null && $tmpDt = new DateTime($this->resetdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->resetdate = $newDateAsString;
                $this->modifiedColumns[] = RbcounterPeer::RESETDATE;
            }
        } // if either are not null


        return $this;
    } // setResetdate()

    /**
     * Sets the value of the [sequenceflag] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setSequenceflag($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->sequenceflag !== $v) {
            $this->sequenceflag = $v;
            $this->modifiedColumns[] = RbcounterPeer::SEQUENCEFLAG;
        }


        return $this;
    } // setSequenceflag()

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
            if ($this->value !== 0) {
                return false;
            }

            if ($this->separator !== ' ') {
                return false;
            }

            if ($this->reset !== 0) {
                return false;
            }

            if ($this->sequenceflag !== false) {
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
            $this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->value = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->prefix = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->separator = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->reset = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->startdate = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetdate = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->sequenceflag = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 10; // 10 = RbcounterPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbcounter object", $e);
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
            $con = Propel::getConnection(RbcounterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbcounterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collEventtypes = null;

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
            $con = Propel::getConnection(RbcounterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbcounterQuery::create()
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
            $con = Propel::getConnection(RbcounterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbcounterPeer::addInstanceToPool($this);
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

            if ($this->eventtypesScheduledForDeletion !== null) {
                if (!$this->eventtypesScheduledForDeletion->isEmpty()) {
                    foreach ($this->eventtypesScheduledForDeletion as $eventtype) {
                        // need to save related object because we set the relation to null
                        $eventtype->save($con);
                    }
                    $this->eventtypesScheduledForDeletion = null;
                }
            }

            if ($this->collEventtypes !== null) {
                foreach ($this->collEventtypes as $referrerFK) {
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

        $this->modifiedColumns[] = RbcounterPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbcounterPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbcounterPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbcounterPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbcounterPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(RbcounterPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`value`';
        }
        if ($this->isColumnModified(RbcounterPeer::PREFIX)) {
            $modifiedColumns[':p' . $index++]  = '`prefix`';
        }
        if ($this->isColumnModified(RbcounterPeer::SEPARATOR)) {
            $modifiedColumns[':p' . $index++]  = '`separator`';
        }
        if ($this->isColumnModified(RbcounterPeer::RESET)) {
            $modifiedColumns[':p' . $index++]  = '`reset`';
        }
        if ($this->isColumnModified(RbcounterPeer::STARTDATE)) {
            $modifiedColumns[':p' . $index++]  = '`startDate`';
        }
        if ($this->isColumnModified(RbcounterPeer::RESETDATE)) {
            $modifiedColumns[':p' . $index++]  = '`resetDate`';
        }
        if ($this->isColumnModified(RbcounterPeer::SEQUENCEFLAG)) {
            $modifiedColumns[':p' . $index++]  = '`sequenceFlag`';
        }

        $sql = sprintf(
            'INSERT INTO `rbCounter` (%s) VALUES (%s)',
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
                    case '`value`':
                        $stmt->bindValue($identifier, $this->value, PDO::PARAM_INT);
                        break;
                    case '`prefix`':
                        $stmt->bindValue($identifier, $this->prefix, PDO::PARAM_STR);
                        break;
                    case '`separator`':
                        $stmt->bindValue($identifier, $this->separator, PDO::PARAM_STR);
                        break;
                    case '`reset`':
                        $stmt->bindValue($identifier, $this->reset, PDO::PARAM_INT);
                        break;
                    case '`startDate`':
                        $stmt->bindValue($identifier, $this->startdate, PDO::PARAM_STR);
                        break;
                    case '`resetDate`':
                        $stmt->bindValue($identifier, $this->resetdate, PDO::PARAM_STR);
                        break;
                    case '`sequenceFlag`':
                        $stmt->bindValue($identifier, (int) $this->sequenceflag, PDO::PARAM_INT);
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


            if (($retval = RbcounterPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collEventtypes !== null) {
                    foreach ($this->collEventtypes as $referrerFK) {
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
        $pos = RbcounterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getValue();
                break;
            case 4:
                return $this->getPrefix();
                break;
            case 5:
                return $this->getSeparator();
                break;
            case 6:
                return $this->getReset();
                break;
            case 7:
                return $this->getStartdate();
                break;
            case 8:
                return $this->getResetdate();
                break;
            case 9:
                return $this->getSequenceflag();
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
        if (isset($alreadyDumpedObjects['Rbcounter'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbcounter'][$this->getPrimaryKey()] = true;
        $keys = RbcounterPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getValue(),
            $keys[4] => $this->getPrefix(),
            $keys[5] => $this->getSeparator(),
            $keys[6] => $this->getReset(),
            $keys[7] => $this->getStartdate(),
            $keys[8] => $this->getResetdate(),
            $keys[9] => $this->getSequenceflag(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collEventtypes) {
                $result['Eventtypes'] = $this->collEventtypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbcounterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setValue($value);
                break;
            case 4:
                $this->setPrefix($value);
                break;
            case 5:
                $this->setSeparator($value);
                break;
            case 6:
                $this->setReset($value);
                break;
            case 7:
                $this->setStartdate($value);
                break;
            case 8:
                $this->setResetdate($value);
                break;
            case 9:
                $this->setSequenceflag($value);
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
        $keys = RbcounterPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setValue($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPrefix($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSeparator($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setReset($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setStartdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setResetdate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSequenceflag($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbcounterPeer::DATABASE_NAME);

        if ($this->isColumnModified(RbcounterPeer::ID)) $criteria->add(RbcounterPeer::ID, $this->id);
        if ($this->isColumnModified(RbcounterPeer::CODE)) $criteria->add(RbcounterPeer::CODE, $this->code);
        if ($this->isColumnModified(RbcounterPeer::NAME)) $criteria->add(RbcounterPeer::NAME, $this->name);
        if ($this->isColumnModified(RbcounterPeer::VALUE)) $criteria->add(RbcounterPeer::VALUE, $this->value);
        if ($this->isColumnModified(RbcounterPeer::PREFIX)) $criteria->add(RbcounterPeer::PREFIX, $this->prefix);
        if ($this->isColumnModified(RbcounterPeer::SEPARATOR)) $criteria->add(RbcounterPeer::SEPARATOR, $this->separator);
        if ($this->isColumnModified(RbcounterPeer::RESET)) $criteria->add(RbcounterPeer::RESET, $this->reset);
        if ($this->isColumnModified(RbcounterPeer::STARTDATE)) $criteria->add(RbcounterPeer::STARTDATE, $this->startdate);
        if ($this->isColumnModified(RbcounterPeer::RESETDATE)) $criteria->add(RbcounterPeer::RESETDATE, $this->resetdate);
        if ($this->isColumnModified(RbcounterPeer::SEQUENCEFLAG)) $criteria->add(RbcounterPeer::SEQUENCEFLAG, $this->sequenceflag);

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
        $criteria = new Criteria(RbcounterPeer::DATABASE_NAME);
        $criteria->add(RbcounterPeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbcounter (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setValue($this->getValue());
        $copyObj->setPrefix($this->getPrefix());
        $copyObj->setSeparator($this->getSeparator());
        $copyObj->setReset($this->getReset());
        $copyObj->setStartdate($this->getStartdate());
        $copyObj->setResetdate($this->getResetdate());
        $copyObj->setSequenceflag($this->getSequenceflag());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getEventtypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventtype($relObj->copy($deepCopy));
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
     * @return Rbcounter Clone of current object.
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
     * @return RbcounterPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbcounterPeer();
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
        if ('Eventtype' == $relationName) {
            $this->initEventtypes();
        }
    }

    /**
     * Clears out the collEventtypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbcounter The current object (for fluent API support)
     * @see        addEventtypes()
     */
    public function clearEventtypes()
    {
        $this->collEventtypes = null; // important to set this to null since that means it is uninitialized
        $this->collEventtypesPartial = null;

        return $this;
    }

    /**
     * reset is the collEventtypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialEventtypes($v = true)
    {
        $this->collEventtypesPartial = $v;
    }

    /**
     * Initializes the collEventtypes collection.
     *
     * By default this just sets the collEventtypes collection to an empty array (like clearcollEventtypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventtypes($overrideExisting = true)
    {
        if (null !== $this->collEventtypes && !$overrideExisting) {
            return;
        }
        $this->collEventtypes = new PropelObjectCollection();
        $this->collEventtypes->setModel('Eventtype');
    }

    /**
     * Gets an array of Eventtype objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbcounter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Eventtype[] List of Eventtype objects
     * @throws PropelException
     */
    public function getEventtypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventtypesPartial && !$this->isNew();
        if (null === $this->collEventtypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventtypes) {
                // return empty collection
                $this->initEventtypes();
            } else {
                $collEventtypes = EventtypeQuery::create(null, $criteria)
                    ->filterByRbcounter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventtypesPartial && count($collEventtypes)) {
                      $this->initEventtypes(false);

                      foreach($collEventtypes as $obj) {
                        if (false == $this->collEventtypes->contains($obj)) {
                          $this->collEventtypes->append($obj);
                        }
                      }

                      $this->collEventtypesPartial = true;
                    }

                    $collEventtypes->getInternalIterator()->rewind();
                    return $collEventtypes;
                }

                if($partial && $this->collEventtypes) {
                    foreach($this->collEventtypes as $obj) {
                        if($obj->isNew()) {
                            $collEventtypes[] = $obj;
                        }
                    }
                }

                $this->collEventtypes = $collEventtypes;
                $this->collEventtypesPartial = false;
            }
        }

        return $this->collEventtypes;
    }

    /**
     * Sets a collection of Eventtype objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $eventtypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbcounter The current object (for fluent API support)
     */
    public function setEventtypes(PropelCollection $eventtypes, PropelPDO $con = null)
    {
        $eventtypesToDelete = $this->getEventtypes(new Criteria(), $con)->diff($eventtypes);

        $this->eventtypesScheduledForDeletion = unserialize(serialize($eventtypesToDelete));

        foreach ($eventtypesToDelete as $eventtypeRemoved) {
            $eventtypeRemoved->setRbcounter(null);
        }

        $this->collEventtypes = null;
        foreach ($eventtypes as $eventtype) {
            $this->addEventtype($eventtype);
        }

        $this->collEventtypes = $eventtypes;
        $this->collEventtypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Eventtype objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Eventtype objects.
     * @throws PropelException
     */
    public function countEventtypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventtypesPartial && !$this->isNew();
        if (null === $this->collEventtypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventtypes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getEventtypes());
            }
            $query = EventtypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbcounter($this)
                ->count($con);
        }

        return count($this->collEventtypes);
    }

    /**
     * Method called to associate a Eventtype object to this object
     * through the Eventtype foreign key attribute.
     *
     * @param    Eventtype $l Eventtype
     * @return Rbcounter The current object (for fluent API support)
     */
    public function addEventtype(Eventtype $l)
    {
        if ($this->collEventtypes === null) {
            $this->initEventtypes();
            $this->collEventtypesPartial = true;
        }
        if (!in_array($l, $this->collEventtypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEventtype($l);
        }

        return $this;
    }

    /**
     * @param	Eventtype $eventtype The eventtype object to add.
     */
    protected function doAddEventtype($eventtype)
    {
        $this->collEventtypes[]= $eventtype;
        $eventtype->setRbcounter($this);
    }

    /**
     * @param	Eventtype $eventtype The eventtype object to remove.
     * @return Rbcounter The current object (for fluent API support)
     */
    public function removeEventtype($eventtype)
    {
        if ($this->getEventtypes()->contains($eventtype)) {
            $this->collEventtypes->remove($this->collEventtypes->search($eventtype));
            if (null === $this->eventtypesScheduledForDeletion) {
                $this->eventtypesScheduledForDeletion = clone $this->collEventtypes;
                $this->eventtypesScheduledForDeletion->clear();
            }
            $this->eventtypesScheduledForDeletion[]= $eventtype;
            $eventtype->setRbcounter(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbcounter is new, it will return
     * an empty collection; or if this Rbcounter has previously
     * been saved, it will retrieve related Eventtypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbcounter.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Eventtype[] List of Eventtype objects
     */
    public function getEventtypesJoinRbmedicalkind($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EventtypeQuery::create(null, $criteria);
        $query->joinWith('Rbmedicalkind', $join_behavior);

        return $this->getEventtypes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->name = null;
        $this->value = null;
        $this->prefix = null;
        $this->separator = null;
        $this->reset = null;
        $this->startdate = null;
        $this->resetdate = null;
        $this->sequenceflag = null;
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
            if ($this->collEventtypes) {
                foreach ($this->collEventtypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collEventtypes instanceof PropelCollection) {
            $this->collEventtypes->clearIterator();
        }
        $this->collEventtypes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbcounterPeer::DEFAULT_STRING_FORMAT);
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
