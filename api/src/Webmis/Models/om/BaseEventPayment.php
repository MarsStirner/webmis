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
use Webmis\Models\EventPayment;
use Webmis\Models\EventPaymentPeer;
use Webmis\Models\EventPaymentQuery;
use Webmis\Models\Rbcashoperation;
use Webmis\Models\RbcashoperationQuery;

/**
 * Base class that represents a row from the 'Event_Payment' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventPayment extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\EventPaymentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventPaymentPeer
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
     * The value for the createdatetime field.
     * @var        string
     */
    protected $createdatetime;

    /**
     * The value for the createperson_id field.
     * @var        int
     */
    protected $createperson_id;

    /**
     * The value for the modifydatetime field.
     * @var        string
     */
    protected $modifydatetime;

    /**
     * The value for the modifyperson_id field.
     * @var        int
     */
    protected $modifyperson_id;

    /**
     * The value for the deleted field.
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the cashoperation_id field.
     * @var        int
     */
    protected $cashoperation_id;

    /**
     * The value for the sum field.
     * @var        double
     */
    protected $sum;

    /**
     * The value for the typepayment field.
     * @var        boolean
     */
    protected $typepayment;

    /**
     * The value for the settlementaccount field.
     * @var        string
     */
    protected $settlementaccount;

    /**
     * The value for the bank_id field.
     * @var        int
     */
    protected $bank_id;

    /**
     * The value for the numbercreditcard field.
     * @var        string
     */
    protected $numbercreditcard;

    /**
     * The value for the cashbox field.
     * @var        string
     */
    protected $cashbox;

    /**
     * @var        Rbcashoperation
     */
    protected $aRbcashoperation;

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
     * Get the [optionally formatted] temporal [createdatetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->createdatetime === null) {
            return null;
        }

        if ($this->createdatetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->createdatetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->createdatetime, true), $x);
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
     * Get the [createperson_id] column value.
     *
     * @return int
     */
    public function getCreatepersonId()
    {
        return $this->createperson_id;
    }

    /**
     * Get the [optionally formatted] temporal [modifydatetime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getModifydatetime($format = 'Y-m-d H:i:s')
    {
        if ($this->modifydatetime === null) {
            return null;
        }

        if ($this->modifydatetime === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->modifydatetime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->modifydatetime, true), $x);
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
     * Get the [modifyperson_id] column value.
     *
     * @return int
     */
    public function getModifypersonId()
    {
        return $this->modifyperson_id;
    }

    /**
     * Get the [deleted] column value.
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
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
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = '%x')
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00') {
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
     * Get the [cashoperation_id] column value.
     *
     * @return int
     */
    public function getCashoperationId()
    {
        return $this->cashoperation_id;
    }

    /**
     * Get the [sum] column value.
     *
     * @return double
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Get the [typepayment] column value.
     *
     * @return boolean
     */
    public function getTypepayment()
    {
        return $this->typepayment;
    }

    /**
     * Get the [settlementaccount] column value.
     *
     * @return string
     */
    public function getSettlementaccount()
    {
        return $this->settlementaccount;
    }

    /**
     * Get the [bank_id] column value.
     *
     * @return int
     */
    public function getBankId()
    {
        return $this->bank_id;
    }

    /**
     * Get the [numbercreditcard] column value.
     *
     * @return string
     */
    public function getNumbercreditcard()
    {
        return $this->numbercreditcard;
    }

    /**
     * Get the [cashbox] column value.
     *
     * @return string
     */
    public function getCashbox()
    {
        return $this->cashbox;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventPaymentPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventPayment The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = EventPaymentPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = EventPaymentPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventPayment The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = EventPaymentPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = EventPaymentPeer::MODIFYPERSON_ID;
        }


        return $this;
    } // setModifypersonId()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->deleted !== $v) {
            $this->deleted = $v;
            $this->modifiedColumns[] = EventPaymentPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = EventPaymentPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EventPayment The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = EventPaymentPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [cashoperation_id] column.
     *
     * @param int $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setCashoperationId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->cashoperation_id !== $v) {
            $this->cashoperation_id = $v;
            $this->modifiedColumns[] = EventPaymentPeer::CASHOPERATION_ID;
        }

        if ($this->aRbcashoperation !== null && $this->aRbcashoperation->getId() !== $v) {
            $this->aRbcashoperation = null;
        }


        return $this;
    } // setCashoperationId()

    /**
     * Set the value of [sum] column.
     *
     * @param double $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setSum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->sum !== $v) {
            $this->sum = $v;
            $this->modifiedColumns[] = EventPaymentPeer::SUM;
        }


        return $this;
    } // setSum()

    /**
     * Sets the value of the [typepayment] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setTypepayment($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->typepayment !== $v) {
            $this->typepayment = $v;
            $this->modifiedColumns[] = EventPaymentPeer::TYPEPAYMENT;
        }


        return $this;
    } // setTypepayment()

    /**
     * Set the value of [settlementaccount] column.
     *
     * @param string $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setSettlementaccount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->settlementaccount !== $v) {
            $this->settlementaccount = $v;
            $this->modifiedColumns[] = EventPaymentPeer::SETTLEMENTACCOUNT;
        }


        return $this;
    } // setSettlementaccount()

    /**
     * Set the value of [bank_id] column.
     *
     * @param int $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setBankId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bank_id !== $v) {
            $this->bank_id = $v;
            $this->modifiedColumns[] = EventPaymentPeer::BANK_ID;
        }


        return $this;
    } // setBankId()

    /**
     * Set the value of [numbercreditcard] column.
     *
     * @param string $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setNumbercreditcard($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numbercreditcard !== $v) {
            $this->numbercreditcard = $v;
            $this->modifiedColumns[] = EventPaymentPeer::NUMBERCREDITCARD;
        }


        return $this;
    } // setNumbercreditcard()

    /**
     * Set the value of [cashbox] column.
     *
     * @param string $v new value
     * @return EventPayment The current object (for fluent API support)
     */
    public function setCashbox($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cashbox !== $v) {
            $this->cashbox = $v;
            $this->modifiedColumns[] = EventPaymentPeer::CASHBOX;
        }


        return $this;
    } // setCashbox()

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
            $this->createdatetime = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->createperson_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->modifydatetime = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->modifyperson_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->deleted = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->master_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->cashoperation_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->sum = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
            $this->typepayment = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->settlementaccount = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->bank_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->numbercreditcard = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->cashbox = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = EventPaymentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EventPayment object", $e);
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

        if ($this->aRbcashoperation !== null && $this->cashoperation_id !== $this->aRbcashoperation->getId()) {
            $this->aRbcashoperation = null;
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
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventPaymentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbcashoperation = null;
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
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventPaymentQuery::create()
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
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EventPaymentPeer::addInstanceToPool($this);
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

            if ($this->aRbcashoperation !== null) {
                if ($this->aRbcashoperation->isModified() || $this->aRbcashoperation->isNew()) {
                    $affectedRows += $this->aRbcashoperation->save($con);
                }
                $this->setRbcashoperation($this->aRbcashoperation);
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

        $this->modifiedColumns[] = EventPaymentPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventPaymentPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventPaymentPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventPaymentPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(EventPaymentPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(EventPaymentPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(EventPaymentPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(EventPaymentPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(EventPaymentPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(EventPaymentPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(EventPaymentPeer::CASHOPERATION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`cashOperation_id`';
        }
        if ($this->isColumnModified(EventPaymentPeer::SUM)) {
            $modifiedColumns[':p' . $index++]  = '`sum`';
        }
        if ($this->isColumnModified(EventPaymentPeer::TYPEPAYMENT)) {
            $modifiedColumns[':p' . $index++]  = '`typePayment`';
        }
        if ($this->isColumnModified(EventPaymentPeer::SETTLEMENTACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`settlementAccount`';
        }
        if ($this->isColumnModified(EventPaymentPeer::BANK_ID)) {
            $modifiedColumns[':p' . $index++]  = '`bank_id`';
        }
        if ($this->isColumnModified(EventPaymentPeer::NUMBERCREDITCARD)) {
            $modifiedColumns[':p' . $index++]  = '`numberCreditCard`';
        }
        if ($this->isColumnModified(EventPaymentPeer::CASHBOX)) {
            $modifiedColumns[':p' . $index++]  = '`cashBox`';
        }

        $sql = sprintf(
            'INSERT INTO `Event_Payment` (%s) VALUES (%s)',
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
                    case '`createDatetime`':
                        $stmt->bindValue($identifier, $this->createdatetime, PDO::PARAM_STR);
                        break;
                    case '`createPerson_id`':
                        $stmt->bindValue($identifier, $this->createperson_id, PDO::PARAM_INT);
                        break;
                    case '`modifyDatetime`':
                        $stmt->bindValue($identifier, $this->modifydatetime, PDO::PARAM_STR);
                        break;
                    case '`modifyPerson_id`':
                        $stmt->bindValue($identifier, $this->modifyperson_id, PDO::PARAM_INT);
                        break;
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
                        break;
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`cashOperation_id`':
                        $stmt->bindValue($identifier, $this->cashoperation_id, PDO::PARAM_INT);
                        break;
                    case '`sum`':
                        $stmt->bindValue($identifier, $this->sum, PDO::PARAM_STR);
                        break;
                    case '`typePayment`':
                        $stmt->bindValue($identifier, (int) $this->typepayment, PDO::PARAM_INT);
                        break;
                    case '`settlementAccount`':
                        $stmt->bindValue($identifier, $this->settlementaccount, PDO::PARAM_STR);
                        break;
                    case '`bank_id`':
                        $stmt->bindValue($identifier, $this->bank_id, PDO::PARAM_INT);
                        break;
                    case '`numberCreditCard`':
                        $stmt->bindValue($identifier, $this->numbercreditcard, PDO::PARAM_STR);
                        break;
                    case '`cashBox`':
                        $stmt->bindValue($identifier, $this->cashbox, PDO::PARAM_STR);
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

            if ($this->aRbcashoperation !== null) {
                if (!$this->aRbcashoperation->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbcashoperation->getValidationFailures());
                }
            }


            if (($retval = EventPaymentPeer::doValidate($this, $columns)) !== true) {
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
        $pos = EventPaymentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCreatedatetime();
                break;
            case 2:
                return $this->getCreatepersonId();
                break;
            case 3:
                return $this->getModifydatetime();
                break;
            case 4:
                return $this->getModifypersonId();
                break;
            case 5:
                return $this->getDeleted();
                break;
            case 6:
                return $this->getMasterId();
                break;
            case 7:
                return $this->getDate();
                break;
            case 8:
                return $this->getCashoperationId();
                break;
            case 9:
                return $this->getSum();
                break;
            case 10:
                return $this->getTypepayment();
                break;
            case 11:
                return $this->getSettlementaccount();
                break;
            case 12:
                return $this->getBankId();
                break;
            case 13:
                return $this->getNumbercreditcard();
                break;
            case 14:
                return $this->getCashbox();
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
        if (isset($alreadyDumpedObjects['EventPayment'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EventPayment'][$this->getPrimaryKey()] = true;
        $keys = EventPaymentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getMasterId(),
            $keys[7] => $this->getDate(),
            $keys[8] => $this->getCashoperationId(),
            $keys[9] => $this->getSum(),
            $keys[10] => $this->getTypepayment(),
            $keys[11] => $this->getSettlementaccount(),
            $keys[12] => $this->getBankId(),
            $keys[13] => $this->getNumbercreditcard(),
            $keys[14] => $this->getCashbox(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbcashoperation) {
                $result['Rbcashoperation'] = $this->aRbcashoperation->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = EventPaymentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCreatedatetime($value);
                break;
            case 2:
                $this->setCreatepersonId($value);
                break;
            case 3:
                $this->setModifydatetime($value);
                break;
            case 4:
                $this->setModifypersonId($value);
                break;
            case 5:
                $this->setDeleted($value);
                break;
            case 6:
                $this->setMasterId($value);
                break;
            case 7:
                $this->setDate($value);
                break;
            case 8:
                $this->setCashoperationId($value);
                break;
            case 9:
                $this->setSum($value);
                break;
            case 10:
                $this->setTypepayment($value);
                break;
            case 11:
                $this->setSettlementaccount($value);
                break;
            case 12:
                $this->setBankId($value);
                break;
            case 13:
                $this->setNumbercreditcard($value);
                break;
            case 14:
                $this->setCashbox($value);
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
        $keys = EventPaymentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMasterId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCashoperationId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSum($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTypepayment($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSettlementaccount($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBankId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNumbercreditcard($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCashbox($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventPaymentPeer::DATABASE_NAME);

        if ($this->isColumnModified(EventPaymentPeer::ID)) $criteria->add(EventPaymentPeer::ID, $this->id);
        if ($this->isColumnModified(EventPaymentPeer::CREATEDATETIME)) $criteria->add(EventPaymentPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(EventPaymentPeer::CREATEPERSON_ID)) $criteria->add(EventPaymentPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(EventPaymentPeer::MODIFYDATETIME)) $criteria->add(EventPaymentPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(EventPaymentPeer::MODIFYPERSON_ID)) $criteria->add(EventPaymentPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(EventPaymentPeer::DELETED)) $criteria->add(EventPaymentPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(EventPaymentPeer::MASTER_ID)) $criteria->add(EventPaymentPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(EventPaymentPeer::DATE)) $criteria->add(EventPaymentPeer::DATE, $this->date);
        if ($this->isColumnModified(EventPaymentPeer::CASHOPERATION_ID)) $criteria->add(EventPaymentPeer::CASHOPERATION_ID, $this->cashoperation_id);
        if ($this->isColumnModified(EventPaymentPeer::SUM)) $criteria->add(EventPaymentPeer::SUM, $this->sum);
        if ($this->isColumnModified(EventPaymentPeer::TYPEPAYMENT)) $criteria->add(EventPaymentPeer::TYPEPAYMENT, $this->typepayment);
        if ($this->isColumnModified(EventPaymentPeer::SETTLEMENTACCOUNT)) $criteria->add(EventPaymentPeer::SETTLEMENTACCOUNT, $this->settlementaccount);
        if ($this->isColumnModified(EventPaymentPeer::BANK_ID)) $criteria->add(EventPaymentPeer::BANK_ID, $this->bank_id);
        if ($this->isColumnModified(EventPaymentPeer::NUMBERCREDITCARD)) $criteria->add(EventPaymentPeer::NUMBERCREDITCARD, $this->numbercreditcard);
        if ($this->isColumnModified(EventPaymentPeer::CASHBOX)) $criteria->add(EventPaymentPeer::CASHBOX, $this->cashbox);

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
        $criteria = new Criteria(EventPaymentPeer::DATABASE_NAME);
        $criteria->add(EventPaymentPeer::ID, $this->id);

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
     * @param object $copyObj An object of EventPayment (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCreatedatetime($this->getCreatedatetime());
        $copyObj->setCreatepersonId($this->getCreatepersonId());
        $copyObj->setModifydatetime($this->getModifydatetime());
        $copyObj->setModifypersonId($this->getModifypersonId());
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setDate($this->getDate());
        $copyObj->setCashoperationId($this->getCashoperationId());
        $copyObj->setSum($this->getSum());
        $copyObj->setTypepayment($this->getTypepayment());
        $copyObj->setSettlementaccount($this->getSettlementaccount());
        $copyObj->setBankId($this->getBankId());
        $copyObj->setNumbercreditcard($this->getNumbercreditcard());
        $copyObj->setCashbox($this->getCashbox());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
     * @return EventPayment Clone of current object.
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
     * @return EventPaymentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventPaymentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbcashoperation object.
     *
     * @param             Rbcashoperation $v
     * @return EventPayment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbcashoperation(Rbcashoperation $v = null)
    {
        if ($v === null) {
            $this->setCashoperationId(NULL);
        } else {
            $this->setCashoperationId($v->getId());
        }

        $this->aRbcashoperation = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbcashoperation object, it will not be re-added.
        if ($v !== null) {
            $v->addEventPayment($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbcashoperation object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbcashoperation The associated Rbcashoperation object.
     * @throws PropelException
     */
    public function getRbcashoperation(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbcashoperation === null && ($this->cashoperation_id !== null) && $doQuery) {
            $this->aRbcashoperation = RbcashoperationQuery::create()->findPk($this->cashoperation_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbcashoperation->addEventPayments($this);
             */
        }

        return $this->aRbcashoperation;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->createdatetime = null;
        $this->createperson_id = null;
        $this->modifydatetime = null;
        $this->modifyperson_id = null;
        $this->deleted = null;
        $this->master_id = null;
        $this->date = null;
        $this->cashoperation_id = null;
        $this->sum = null;
        $this->typepayment = null;
        $this->settlementaccount = null;
        $this->bank_id = null;
        $this->numbercreditcard = null;
        $this->cashbox = null;
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
            if ($this->aRbcashoperation instanceof Persistent) {
              $this->aRbcashoperation->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbcashoperation = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EventPaymentPeer::DEFAULT_STRING_FORMAT);
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
