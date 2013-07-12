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
use Webmis\Models\Rlsnomen;
use Webmis\Models\RlsnomenPeer;
use Webmis\Models\RlsnomenQuery;

/**
 * Base class that represents a row from the 'rlsNomen' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRlsnomen extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RlsnomenPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RlsnomenPeer
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
     * @var        int
     */
    protected $code;

    /**
     * The value for the tradename_id field.
     * @var        int
     */
    protected $tradename_id;

    /**
     * The value for the inpname_id field.
     * @var        int
     */
    protected $inpname_id;

    /**
     * The value for the form_id field.
     * @var        int
     */
    protected $form_id;

    /**
     * The value for the dosage_id field.
     * @var        int
     */
    protected $dosage_id;

    /**
     * The value for the filling_id field.
     * @var        int
     */
    protected $filling_id;

    /**
     * The value for the packing_id field.
     * @var        int
     */
    protected $packing_id;

    /**
     * The value for the regdate field.
     * @var        string
     */
    protected $regdate;

    /**
     * The value for the anndate field.
     * @var        string
     */
    protected $anndate;

    /**
     * The value for the disabledforprescription field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $disabledforprescription;

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
        $this->disabledforprescription = false;
    }

    /**
     * Initializes internal state of BaseRlsnomen object.
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
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [tradename_id] column value.
     *
     * @return int
     */
    public function getTradenameId()
    {
        return $this->tradename_id;
    }

    /**
     * Get the [inpname_id] column value.
     *
     * @return int
     */
    public function getInpnameId()
    {
        return $this->inpname_id;
    }

    /**
     * Get the [form_id] column value.
     *
     * @return int
     */
    public function getFormId()
    {
        return $this->form_id;
    }

    /**
     * Get the [dosage_id] column value.
     *
     * @return int
     */
    public function getDosageId()
    {
        return $this->dosage_id;
    }

    /**
     * Get the [filling_id] column value.
     *
     * @return int
     */
    public function getFillingId()
    {
        return $this->filling_id;
    }

    /**
     * Get the [packing_id] column value.
     *
     * @return int
     */
    public function getPackingId()
    {
        return $this->packing_id;
    }

    /**
     * Get the [optionally formatted] temporal [regdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRegdate($format = '%x')
    {
        if ($this->regdate === null) {
            return null;
        }

        if ($this->regdate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->regdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->regdate, true), $x);
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
     * Get the [optionally formatted] temporal [anndate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAnndate($format = '%x')
    {
        if ($this->anndate === null) {
            return null;
        }

        if ($this->anndate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->anndate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->anndate, true), $x);
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
     * Get the [disabledforprescription] column value.
     *
     * @return boolean
     */
    public function getDisabledforprescription()
    {
        return $this->disabledforprescription;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RlsnomenPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [tradename_id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setTradenameId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tradename_id !== $v) {
            $this->tradename_id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::TRADENAME_ID;
        }


        return $this;
    } // setTradenameId()

    /**
     * Set the value of [inpname_id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setInpnameId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->inpname_id !== $v) {
            $this->inpname_id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::INPNAME_ID;
        }


        return $this;
    } // setInpnameId()

    /**
     * Set the value of [form_id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setFormId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->form_id !== $v) {
            $this->form_id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::FORM_ID;
        }


        return $this;
    } // setFormId()

    /**
     * Set the value of [dosage_id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setDosageId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->dosage_id !== $v) {
            $this->dosage_id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::DOSAGE_ID;
        }


        return $this;
    } // setDosageId()

    /**
     * Set the value of [filling_id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setFillingId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->filling_id !== $v) {
            $this->filling_id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::FILLING_ID;
        }


        return $this;
    } // setFillingId()

    /**
     * Set the value of [packing_id] column.
     *
     * @param int $v new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setPackingId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->packing_id !== $v) {
            $this->packing_id = $v;
            $this->modifiedColumns[] = RlsnomenPeer::PACKING_ID;
        }


        return $this;
    } // setPackingId()

    /**
     * Sets the value of [regdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setRegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->regdate !== null || $dt !== null) {
            $currentDateAsString = ($this->regdate !== null && $tmpDt = new DateTime($this->regdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->regdate = $newDateAsString;
                $this->modifiedColumns[] = RlsnomenPeer::REGDATE;
            }
        } // if either are not null


        return $this;
    } // setRegdate()

    /**
     * Sets the value of [anndate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setAnndate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->anndate !== null || $dt !== null) {
            $currentDateAsString = ($this->anndate !== null && $tmpDt = new DateTime($this->anndate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->anndate = $newDateAsString;
                $this->modifiedColumns[] = RlsnomenPeer::ANNDATE;
            }
        } // if either are not null


        return $this;
    } // setAnndate()

    /**
     * Sets the value of the [disabledforprescription] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rlsnomen The current object (for fluent API support)
     */
    public function setDisabledforprescription($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->disabledforprescription !== $v) {
            $this->disabledforprescription = $v;
            $this->modifiedColumns[] = RlsnomenPeer::DISABLEDFORPRESCRIPTION;
        }


        return $this;
    } // setDisabledforprescription()

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
            if ($this->disabledforprescription !== false) {
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
            $this->code = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->tradename_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->inpname_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->form_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->dosage_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->filling_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->packing_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->regdate = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->anndate = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->disabledforprescription = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = RlsnomenPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rlsnomen object", $e);
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
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RlsnomenPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RlsnomenQuery::create()
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
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RlsnomenPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = RlsnomenPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RlsnomenPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RlsnomenPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RlsnomenPeer::TRADENAME_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tradeName_id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::INPNAME_ID)) {
            $modifiedColumns[':p' . $index++]  = '`INPName_id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::FORM_ID)) {
            $modifiedColumns[':p' . $index++]  = '`form_id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::DOSAGE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`dosage_id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::FILLING_ID)) {
            $modifiedColumns[':p' . $index++]  = '`filling_id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::PACKING_ID)) {
            $modifiedColumns[':p' . $index++]  = '`packing_id`';
        }
        if ($this->isColumnModified(RlsnomenPeer::REGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`regDate`';
        }
        if ($this->isColumnModified(RlsnomenPeer::ANNDATE)) {
            $modifiedColumns[':p' . $index++]  = '`annDate`';
        }
        if ($this->isColumnModified(RlsnomenPeer::DISABLEDFORPRESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`disabledForPrescription`';
        }

        $sql = sprintf(
            'INSERT INTO `rlsNomen` (%s) VALUES (%s)',
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
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_INT);
                        break;
                    case '`tradeName_id`':
                        $stmt->bindValue($identifier, $this->tradename_id, PDO::PARAM_INT);
                        break;
                    case '`INPName_id`':
                        $stmt->bindValue($identifier, $this->inpname_id, PDO::PARAM_INT);
                        break;
                    case '`form_id`':
                        $stmt->bindValue($identifier, $this->form_id, PDO::PARAM_INT);
                        break;
                    case '`dosage_id`':
                        $stmt->bindValue($identifier, $this->dosage_id, PDO::PARAM_INT);
                        break;
                    case '`filling_id`':
                        $stmt->bindValue($identifier, $this->filling_id, PDO::PARAM_INT);
                        break;
                    case '`packing_id`':
                        $stmt->bindValue($identifier, $this->packing_id, PDO::PARAM_INT);
                        break;
                    case '`regDate`':
                        $stmt->bindValue($identifier, $this->regdate, PDO::PARAM_STR);
                        break;
                    case '`annDate`':
                        $stmt->bindValue($identifier, $this->anndate, PDO::PARAM_STR);
                        break;
                    case '`disabledForPrescription`':
                        $stmt->bindValue($identifier, (int) $this->disabledforprescription, PDO::PARAM_INT);
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


            if (($retval = RlsnomenPeer::doValidate($this, $columns)) !== true) {
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
        $pos = RlsnomenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTradenameId();
                break;
            case 3:
                return $this->getInpnameId();
                break;
            case 4:
                return $this->getFormId();
                break;
            case 5:
                return $this->getDosageId();
                break;
            case 6:
                return $this->getFillingId();
                break;
            case 7:
                return $this->getPackingId();
                break;
            case 8:
                return $this->getRegdate();
                break;
            case 9:
                return $this->getAnndate();
                break;
            case 10:
                return $this->getDisabledforprescription();
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
        if (isset($alreadyDumpedObjects['Rlsnomen'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rlsnomen'][$this->getPrimaryKey()] = true;
        $keys = RlsnomenPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getTradenameId(),
            $keys[3] => $this->getInpnameId(),
            $keys[4] => $this->getFormId(),
            $keys[5] => $this->getDosageId(),
            $keys[6] => $this->getFillingId(),
            $keys[7] => $this->getPackingId(),
            $keys[8] => $this->getRegdate(),
            $keys[9] => $this->getAnndate(),
            $keys[10] => $this->getDisabledforprescription(),
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
        $pos = RlsnomenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTradenameId($value);
                break;
            case 3:
                $this->setInpnameId($value);
                break;
            case 4:
                $this->setFormId($value);
                break;
            case 5:
                $this->setDosageId($value);
                break;
            case 6:
                $this->setFillingId($value);
                break;
            case 7:
                $this->setPackingId($value);
                break;
            case 8:
                $this->setRegdate($value);
                break;
            case 9:
                $this->setAnndate($value);
                break;
            case 10:
                $this->setDisabledforprescription($value);
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
        $keys = RlsnomenPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTradenameId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setInpnameId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFormId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDosageId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setFillingId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPackingId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRegdate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAnndate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setDisabledforprescription($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RlsnomenPeer::DATABASE_NAME);

        if ($this->isColumnModified(RlsnomenPeer::ID)) $criteria->add(RlsnomenPeer::ID, $this->id);
        if ($this->isColumnModified(RlsnomenPeer::CODE)) $criteria->add(RlsnomenPeer::CODE, $this->code);
        if ($this->isColumnModified(RlsnomenPeer::TRADENAME_ID)) $criteria->add(RlsnomenPeer::TRADENAME_ID, $this->tradename_id);
        if ($this->isColumnModified(RlsnomenPeer::INPNAME_ID)) $criteria->add(RlsnomenPeer::INPNAME_ID, $this->inpname_id);
        if ($this->isColumnModified(RlsnomenPeer::FORM_ID)) $criteria->add(RlsnomenPeer::FORM_ID, $this->form_id);
        if ($this->isColumnModified(RlsnomenPeer::DOSAGE_ID)) $criteria->add(RlsnomenPeer::DOSAGE_ID, $this->dosage_id);
        if ($this->isColumnModified(RlsnomenPeer::FILLING_ID)) $criteria->add(RlsnomenPeer::FILLING_ID, $this->filling_id);
        if ($this->isColumnModified(RlsnomenPeer::PACKING_ID)) $criteria->add(RlsnomenPeer::PACKING_ID, $this->packing_id);
        if ($this->isColumnModified(RlsnomenPeer::REGDATE)) $criteria->add(RlsnomenPeer::REGDATE, $this->regdate);
        if ($this->isColumnModified(RlsnomenPeer::ANNDATE)) $criteria->add(RlsnomenPeer::ANNDATE, $this->anndate);
        if ($this->isColumnModified(RlsnomenPeer::DISABLEDFORPRESCRIPTION)) $criteria->add(RlsnomenPeer::DISABLEDFORPRESCRIPTION, $this->disabledforprescription);

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
        $criteria = new Criteria(RlsnomenPeer::DATABASE_NAME);
        $criteria->add(RlsnomenPeer::ID, $this->id);

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
     * @param object $copyObj An object of Rlsnomen (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setTradenameId($this->getTradenameId());
        $copyObj->setInpnameId($this->getInpnameId());
        $copyObj->setFormId($this->getFormId());
        $copyObj->setDosageId($this->getDosageId());
        $copyObj->setFillingId($this->getFillingId());
        $copyObj->setPackingId($this->getPackingId());
        $copyObj->setRegdate($this->getRegdate());
        $copyObj->setAnndate($this->getAnndate());
        $copyObj->setDisabledforprescription($this->getDisabledforprescription());
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
     * @return Rlsnomen Clone of current object.
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
     * @return RlsnomenPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RlsnomenPeer();
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
        $this->tradename_id = null;
        $this->inpname_id = null;
        $this->form_id = null;
        $this->dosage_id = null;
        $this->filling_id = null;
        $this->packing_id = null;
        $this->regdate = null;
        $this->anndate = null;
        $this->disabledforprescription = null;
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
        return (string) $this->exportTo(RlsnomenPeer::DEFAULT_STRING_FORMAT);
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
