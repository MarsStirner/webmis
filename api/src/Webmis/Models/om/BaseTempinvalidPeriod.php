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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use Webmis\Models\TempinvalidPeriod;
use Webmis\Models\TempinvalidPeriodPeer;
use Webmis\Models\TempinvalidPeriodQuery;

/**
 * Base class that represents a row from the 'TempInvalid_Period' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTempinvalidPeriod extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\TempinvalidPeriodPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TempinvalidPeriodPeer
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
     * The value for the diagnosis_id field.
     * @var        int
     */
    protected $diagnosis_id;

    /**
     * The value for the begperson_id field.
     * @var        int
     */
    protected $begperson_id;

    /**
     * The value for the begdate field.
     * @var        string
     */
    protected $begdate;

    /**
     * The value for the endperson_id field.
     * @var        int
     */
    protected $endperson_id;

    /**
     * The value for the enddate field.
     * @var        string
     */
    protected $enddate;

    /**
     * The value for the isexternal field.
     * @var        boolean
     */
    protected $isexternal;

    /**
     * The value for the regime_id field.
     * @var        int
     */
    protected $regime_id;

    /**
     * The value for the break_id field.
     * @var        int
     */
    protected $break_id;

    /**
     * The value for the result_id field.
     * @var        int
     */
    protected $result_id;

    /**
     * The value for the note field.
     * @var        string
     */
    protected $note;

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
     * Get the [master_id] column value.
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Get the [diagnosis_id] column value.
     *
     * @return int
     */
    public function getDiagnosisId()
    {
        return $this->diagnosis_id;
    }

    /**
     * Get the [begperson_id] column value.
     *
     * @return int
     */
    public function getBegpersonId()
    {
        return $this->begperson_id;
    }

    /**
     * Get the [optionally formatted] temporal [begdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBegdate($format = '%x')
    {
        if ($this->begdate === null) {
            return null;
        }

        if ($this->begdate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->begdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->begdate, true), $x);
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
     * Get the [endperson_id] column value.
     *
     * @return int
     */
    public function getEndpersonId()
    {
        return $this->endperson_id;
    }

    /**
     * Get the [optionally formatted] temporal [enddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnddate($format = '%x')
    {
        if ($this->enddate === null) {
            return null;
        }

        if ($this->enddate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->enddate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->enddate, true), $x);
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
     * Get the [isexternal] column value.
     *
     * @return boolean
     */
    public function getIsexternal()
    {
        return $this->isexternal;
    }

    /**
     * Get the [regime_id] column value.
     *
     * @return int
     */
    public function getRegimeId()
    {
        return $this->regime_id;
    }

    /**
     * Get the [break_id] column value.
     *
     * @return int
     */
    public function getBreakId()
    {
        return $this->break_id;
    }

    /**
     * Get the [result_id] column value.
     *
     * @return int
     */
    public function getResultId()
    {
        return $this->result_id;
    }

    /**
     * Get the [note] column value.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [diagnosis_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setDiagnosisId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->diagnosis_id !== $v) {
            $this->diagnosis_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::DIAGNOSIS_ID;
        }


        return $this;
    } // setDiagnosisId()

    /**
     * Set the value of [begperson_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setBegpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->begperson_id !== $v) {
            $this->begperson_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::BEGPERSON_ID;
        }


        return $this;
    } // setBegpersonId()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeriodPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Set the value of [endperson_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setEndpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->endperson_id !== $v) {
            $this->endperson_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::ENDPERSON_ID;
        }


        return $this;
    } // setEndpersonId()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = TempinvalidPeriodPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Sets the value of the [isexternal] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setIsexternal($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isexternal !== $v) {
            $this->isexternal = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::ISEXTERNAL;
        }


        return $this;
    } // setIsexternal()

    /**
     * Set the value of [regime_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setRegimeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->regime_id !== $v) {
            $this->regime_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::REGIME_ID;
        }


        return $this;
    } // setRegimeId()

    /**
     * Set the value of [break_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setBreakId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->break_id !== $v) {
            $this->break_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::BREAK_ID;
        }


        return $this;
    } // setBreakId()

    /**
     * Set the value of [result_id] column.
     *
     * @param int $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setResultId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->result_id !== $v) {
            $this->result_id = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::RESULT_ID;
        }


        return $this;
    } // setResultId()

    /**
     * Set the value of [note] column.
     *
     * @param string $v new value
     * @return TempinvalidPeriod The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = TempinvalidPeriodPeer::NOTE;
        }


        return $this;
    } // setNote()

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
            $this->master_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->diagnosis_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->begperson_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->begdate = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->endperson_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->enddate = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->isexternal = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->regime_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->break_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->result_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->note = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = TempinvalidPeriodPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TempinvalidPeriod object", $e);
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
            $con = Propel::getConnection(TempinvalidPeriodPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TempinvalidPeriodPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(TempinvalidPeriodPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TempinvalidPeriodQuery::create()
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
            $con = Propel::getConnection(TempinvalidPeriodPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TempinvalidPeriodPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = TempinvalidPeriodPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TempinvalidPeriodPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TempinvalidPeriodPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::DIAGNOSIS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`diagnosis_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::BEGPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`begPerson_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::ENDPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`endPerson_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::ISEXTERNAL)) {
            $modifiedColumns[':p' . $index++]  = '`isExternal`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::REGIME_ID)) {
            $modifiedColumns[':p' . $index++]  = '`regime_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::BREAK_ID)) {
            $modifiedColumns[':p' . $index++]  = '`break_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::RESULT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`result_id`';
        }
        if ($this->isColumnModified(TempinvalidPeriodPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`note`';
        }

        $sql = sprintf(
            'INSERT INTO `TempInvalid_Period` (%s) VALUES (%s)',
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
                    case '`diagnosis_id`':
                        $stmt->bindValue($identifier, $this->diagnosis_id, PDO::PARAM_INT);
                        break;
                    case '`begPerson_id`':
                        $stmt->bindValue($identifier, $this->begperson_id, PDO::PARAM_INT);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`endPerson_id`':
                        $stmt->bindValue($identifier, $this->endperson_id, PDO::PARAM_INT);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`isExternal`':
                        $stmt->bindValue($identifier, (int) $this->isexternal, PDO::PARAM_INT);
                        break;
                    case '`regime_id`':
                        $stmt->bindValue($identifier, $this->regime_id, PDO::PARAM_INT);
                        break;
                    case '`break_id`':
                        $stmt->bindValue($identifier, $this->break_id, PDO::PARAM_INT);
                        break;
                    case '`result_id`':
                        $stmt->bindValue($identifier, $this->result_id, PDO::PARAM_INT);
                        break;
                    case '`note`':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
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


            if (($retval = TempinvalidPeriodPeer::doValidate($this, $columns)) !== true) {
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
        $pos = TempinvalidPeriodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDiagnosisId();
                break;
            case 3:
                return $this->getBegpersonId();
                break;
            case 4:
                return $this->getBegdate();
                break;
            case 5:
                return $this->getEndpersonId();
                break;
            case 6:
                return $this->getEnddate();
                break;
            case 7:
                return $this->getIsexternal();
                break;
            case 8:
                return $this->getRegimeId();
                break;
            case 9:
                return $this->getBreakId();
                break;
            case 10:
                return $this->getResultId();
                break;
            case 11:
                return $this->getNote();
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
        if (isset($alreadyDumpedObjects['TempinvalidPeriod'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TempinvalidPeriod'][$this->getPrimaryKey()] = true;
        $keys = TempinvalidPeriodPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMasterId(),
            $keys[2] => $this->getDiagnosisId(),
            $keys[3] => $this->getBegpersonId(),
            $keys[4] => $this->getBegdate(),
            $keys[5] => $this->getEndpersonId(),
            $keys[6] => $this->getEnddate(),
            $keys[7] => $this->getIsexternal(),
            $keys[8] => $this->getRegimeId(),
            $keys[9] => $this->getBreakId(),
            $keys[10] => $this->getResultId(),
            $keys[11] => $this->getNote(),
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
        $pos = TempinvalidPeriodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDiagnosisId($value);
                break;
            case 3:
                $this->setBegpersonId($value);
                break;
            case 4:
                $this->setBegdate($value);
                break;
            case 5:
                $this->setEndpersonId($value);
                break;
            case 6:
                $this->setEnddate($value);
                break;
            case 7:
                $this->setIsexternal($value);
                break;
            case 8:
                $this->setRegimeId($value);
                break;
            case 9:
                $this->setBreakId($value);
                break;
            case 10:
                $this->setResultId($value);
                break;
            case 11:
                $this->setNote($value);
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
        $keys = TempinvalidPeriodPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMasterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDiagnosisId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBegpersonId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBegdate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEndpersonId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEnddate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsexternal($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRegimeId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setBreakId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setResultId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNote($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TempinvalidPeriodPeer::DATABASE_NAME);

        if ($this->isColumnModified(TempinvalidPeriodPeer::ID)) $criteria->add(TempinvalidPeriodPeer::ID, $this->id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::MASTER_ID)) $criteria->add(TempinvalidPeriodPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::DIAGNOSIS_ID)) $criteria->add(TempinvalidPeriodPeer::DIAGNOSIS_ID, $this->diagnosis_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::BEGPERSON_ID)) $criteria->add(TempinvalidPeriodPeer::BEGPERSON_ID, $this->begperson_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::BEGDATE)) $criteria->add(TempinvalidPeriodPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(TempinvalidPeriodPeer::ENDPERSON_ID)) $criteria->add(TempinvalidPeriodPeer::ENDPERSON_ID, $this->endperson_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::ENDDATE)) $criteria->add(TempinvalidPeriodPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(TempinvalidPeriodPeer::ISEXTERNAL)) $criteria->add(TempinvalidPeriodPeer::ISEXTERNAL, $this->isexternal);
        if ($this->isColumnModified(TempinvalidPeriodPeer::REGIME_ID)) $criteria->add(TempinvalidPeriodPeer::REGIME_ID, $this->regime_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::BREAK_ID)) $criteria->add(TempinvalidPeriodPeer::BREAK_ID, $this->break_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::RESULT_ID)) $criteria->add(TempinvalidPeriodPeer::RESULT_ID, $this->result_id);
        if ($this->isColumnModified(TempinvalidPeriodPeer::NOTE)) $criteria->add(TempinvalidPeriodPeer::NOTE, $this->note);

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
        $criteria = new Criteria(TempinvalidPeriodPeer::DATABASE_NAME);
        $criteria->add(TempinvalidPeriodPeer::ID, $this->id);

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
     * @param object $copyObj An object of TempinvalidPeriod (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setDiagnosisId($this->getDiagnosisId());
        $copyObj->setBegpersonId($this->getBegpersonId());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setEndpersonId($this->getEndpersonId());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setIsexternal($this->getIsexternal());
        $copyObj->setRegimeId($this->getRegimeId());
        $copyObj->setBreakId($this->getBreakId());
        $copyObj->setResultId($this->getResultId());
        $copyObj->setNote($this->getNote());
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
     * @return TempinvalidPeriod Clone of current object.
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
     * @return TempinvalidPeriodPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TempinvalidPeriodPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->master_id = null;
        $this->diagnosis_id = null;
        $this->begperson_id = null;
        $this->begdate = null;
        $this->endperson_id = null;
        $this->enddate = null;
        $this->isexternal = null;
        $this->regime_id = null;
        $this->break_id = null;
        $this->result_id = null;
        $this->note = null;
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
        return (string) $this->exportTo(TempinvalidPeriodPeer::DEFAULT_STRING_FORMAT);
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
