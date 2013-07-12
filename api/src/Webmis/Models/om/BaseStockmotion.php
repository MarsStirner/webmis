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
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureQuery;
use Webmis\Models\Person;
use Webmis\Models\PersonQuery;
use Webmis\Models\Stockmotion;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockmotionItemQuery;
use Webmis\Models\StockmotionPeer;
use Webmis\Models\StockmotionQuery;

/**
 * Base class that represents a row from the 'StockMotion' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockmotion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\StockmotionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        StockmotionPeer
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
     * The value for the type field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $type;

    /**
     * The value for the date field.
     * Note: this column has a database default value of: NULL
     * @var        string
     */
    protected $date;

    /**
     * The value for the supplier_id field.
     * @var        int
     */
    protected $supplier_id;

    /**
     * The value for the receiver_id field.
     * @var        int
     */
    protected $receiver_id;

    /**
     * The value for the note field.
     * @var        string
     */
    protected $note;

    /**
     * The value for the supplierperson_id field.
     * @var        int
     */
    protected $supplierperson_id;

    /**
     * The value for the receiverperson_id field.
     * @var        int
     */
    protected $receiverperson_id;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByCreatepersonId;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByModifypersonId;

    /**
     * @var        Orgstructure
     */
    protected $aOrgstructureRelatedByReceiverId;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByReceiverpersonId;

    /**
     * @var        Orgstructure
     */
    protected $aOrgstructureRelatedBySupplierId;

    /**
     * @var        Person
     */
    protected $aPersonRelatedBySupplierpersonId;

    /**
     * @var        PropelObjectCollection|StockmotionItem[] Collection to store aggregation of StockmotionItem objects.
     */
    protected $collStockmotionItems;
    protected $collStockmotionItemsPartial;

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
    protected $stockmotionItemsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->type = 0;
        $this->date = NULL;
    }

    /**
     * Initializes internal state of BaseStockmotion object.
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
     * Get the [type] column value.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
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
     * Get the [supplier_id] column value.
     *
     * @return int
     */
    public function getSupplierId()
    {
        return $this->supplier_id;
    }

    /**
     * Get the [receiver_id] column value.
     *
     * @return int
     */
    public function getReceiverId()
    {
        return $this->receiver_id;
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
     * Get the [supplierperson_id] column value.
     *
     * @return int
     */
    public function getSupplierpersonId()
    {
        return $this->supplierperson_id;
    }

    /**
     * Get the [receiverperson_id] column value.
     *
     * @return int
     */
    public function getReceiverpersonId()
    {
        return $this->receiverperson_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = StockmotionPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = StockmotionPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = StockmotionPeer::CREATEPERSON_ID;
        }

        if ($this->aPersonRelatedByCreatepersonId !== null && $this->aPersonRelatedByCreatepersonId->getId() !== $v) {
            $this->aPersonRelatedByCreatepersonId = null;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = StockmotionPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = StockmotionPeer::MODIFYPERSON_ID;
        }

        if ($this->aPersonRelatedByModifypersonId !== null && $this->aPersonRelatedByModifypersonId->getId() !== $v) {
            $this->aPersonRelatedByModifypersonId = null;
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
     * @return Stockmotion The current object (for fluent API support)
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
            $this->modifiedColumns[] = StockmotionPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [type] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = StockmotionPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === NULL) // or the entered value matches the default
                 ) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = StockmotionPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [supplier_id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setSupplierId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->supplier_id !== $v) {
            $this->supplier_id = $v;
            $this->modifiedColumns[] = StockmotionPeer::SUPPLIER_ID;
        }

        if ($this->aOrgstructureRelatedBySupplierId !== null && $this->aOrgstructureRelatedBySupplierId->getId() !== $v) {
            $this->aOrgstructureRelatedBySupplierId = null;
        }


        return $this;
    } // setSupplierId()

    /**
     * Set the value of [receiver_id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setReceiverId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->receiver_id !== $v) {
            $this->receiver_id = $v;
            $this->modifiedColumns[] = StockmotionPeer::RECEIVER_ID;
        }

        if ($this->aOrgstructureRelatedByReceiverId !== null && $this->aOrgstructureRelatedByReceiverId->getId() !== $v) {
            $this->aOrgstructureRelatedByReceiverId = null;
        }


        return $this;
    } // setReceiverId()

    /**
     * Set the value of [note] column.
     *
     * @param string $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = StockmotionPeer::NOTE;
        }


        return $this;
    } // setNote()

    /**
     * Set the value of [supplierperson_id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setSupplierpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->supplierperson_id !== $v) {
            $this->supplierperson_id = $v;
            $this->modifiedColumns[] = StockmotionPeer::SUPPLIERPERSON_ID;
        }

        if ($this->aPersonRelatedBySupplierpersonId !== null && $this->aPersonRelatedBySupplierpersonId->getId() !== $v) {
            $this->aPersonRelatedBySupplierpersonId = null;
        }


        return $this;
    } // setSupplierpersonId()

    /**
     * Set the value of [receiverperson_id] column.
     *
     * @param int $v new value
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setReceiverpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->receiverperson_id !== $v) {
            $this->receiverperson_id = $v;
            $this->modifiedColumns[] = StockmotionPeer::RECEIVERPERSON_ID;
        }

        if ($this->aPersonRelatedByReceiverpersonId !== null && $this->aPersonRelatedByReceiverpersonId->getId() !== $v) {
            $this->aPersonRelatedByReceiverpersonId = null;
        }


        return $this;
    } // setReceiverpersonId()

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
            if ($this->type !== 0) {
                return false;
            }

            if ($this->date !== NULL) {
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
            $this->createdatetime = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->createperson_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->modifydatetime = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->modifyperson_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->deleted = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->type = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->supplier_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->receiver_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->note = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->supplierperson_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->receiverperson_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 13; // 13 = StockmotionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Stockmotion object", $e);
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

        if ($this->aPersonRelatedByCreatepersonId !== null && $this->createperson_id !== $this->aPersonRelatedByCreatepersonId->getId()) {
            $this->aPersonRelatedByCreatepersonId = null;
        }
        if ($this->aPersonRelatedByModifypersonId !== null && $this->modifyperson_id !== $this->aPersonRelatedByModifypersonId->getId()) {
            $this->aPersonRelatedByModifypersonId = null;
        }
        if ($this->aOrgstructureRelatedBySupplierId !== null && $this->supplier_id !== $this->aOrgstructureRelatedBySupplierId->getId()) {
            $this->aOrgstructureRelatedBySupplierId = null;
        }
        if ($this->aOrgstructureRelatedByReceiverId !== null && $this->receiver_id !== $this->aOrgstructureRelatedByReceiverId->getId()) {
            $this->aOrgstructureRelatedByReceiverId = null;
        }
        if ($this->aPersonRelatedBySupplierpersonId !== null && $this->supplierperson_id !== $this->aPersonRelatedBySupplierpersonId->getId()) {
            $this->aPersonRelatedBySupplierpersonId = null;
        }
        if ($this->aPersonRelatedByReceiverpersonId !== null && $this->receiverperson_id !== $this->aPersonRelatedByReceiverpersonId->getId()) {
            $this->aPersonRelatedByReceiverpersonId = null;
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
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = StockmotionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPersonRelatedByCreatepersonId = null;
            $this->aPersonRelatedByModifypersonId = null;
            $this->aOrgstructureRelatedByReceiverId = null;
            $this->aPersonRelatedByReceiverpersonId = null;
            $this->aOrgstructureRelatedBySupplierId = null;
            $this->aPersonRelatedBySupplierpersonId = null;
            $this->collStockmotionItems = null;

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
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = StockmotionQuery::create()
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
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                StockmotionPeer::addInstanceToPool($this);
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

            if ($this->aPersonRelatedByCreatepersonId !== null) {
                if ($this->aPersonRelatedByCreatepersonId->isModified() || $this->aPersonRelatedByCreatepersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByCreatepersonId->save($con);
                }
                $this->setPersonRelatedByCreatepersonId($this->aPersonRelatedByCreatepersonId);
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if ($this->aPersonRelatedByModifypersonId->isModified() || $this->aPersonRelatedByModifypersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByModifypersonId->save($con);
                }
                $this->setPersonRelatedByModifypersonId($this->aPersonRelatedByModifypersonId);
            }

            if ($this->aOrgstructureRelatedByReceiverId !== null) {
                if ($this->aOrgstructureRelatedByReceiverId->isModified() || $this->aOrgstructureRelatedByReceiverId->isNew()) {
                    $affectedRows += $this->aOrgstructureRelatedByReceiverId->save($con);
                }
                $this->setOrgstructureRelatedByReceiverId($this->aOrgstructureRelatedByReceiverId);
            }

            if ($this->aPersonRelatedByReceiverpersonId !== null) {
                if ($this->aPersonRelatedByReceiverpersonId->isModified() || $this->aPersonRelatedByReceiverpersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedByReceiverpersonId->save($con);
                }
                $this->setPersonRelatedByReceiverpersonId($this->aPersonRelatedByReceiverpersonId);
            }

            if ($this->aOrgstructureRelatedBySupplierId !== null) {
                if ($this->aOrgstructureRelatedBySupplierId->isModified() || $this->aOrgstructureRelatedBySupplierId->isNew()) {
                    $affectedRows += $this->aOrgstructureRelatedBySupplierId->save($con);
                }
                $this->setOrgstructureRelatedBySupplierId($this->aOrgstructureRelatedBySupplierId);
            }

            if ($this->aPersonRelatedBySupplierpersonId !== null) {
                if ($this->aPersonRelatedBySupplierpersonId->isModified() || $this->aPersonRelatedBySupplierpersonId->isNew()) {
                    $affectedRows += $this->aPersonRelatedBySupplierpersonId->save($con);
                }
                $this->setPersonRelatedBySupplierpersonId($this->aPersonRelatedBySupplierpersonId);
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

            if ($this->stockmotionItemsScheduledForDeletion !== null) {
                if (!$this->stockmotionItemsScheduledForDeletion->isEmpty()) {
                    StockmotionItemQuery::create()
                        ->filterByPrimaryKeys($this->stockmotionItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->stockmotionItemsScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionItems !== null) {
                foreach ($this->collStockmotionItems as $referrerFK) {
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

        $this->modifiedColumns[] = StockmotionPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StockmotionPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StockmotionPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(StockmotionPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(StockmotionPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(StockmotionPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(StockmotionPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(StockmotionPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(StockmotionPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(StockmotionPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(StockmotionPeer::SUPPLIER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`supplier_id`';
        }
        if ($this->isColumnModified(StockmotionPeer::RECEIVER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`receiver_id`';
        }
        if ($this->isColumnModified(StockmotionPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`note`';
        }
        if ($this->isColumnModified(StockmotionPeer::SUPPLIERPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`supplierPerson_id`';
        }
        if ($this->isColumnModified(StockmotionPeer::RECEIVERPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`receiverPerson_id`';
        }

        $sql = sprintf(
            'INSERT INTO `StockMotion` (%s) VALUES (%s)',
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
                    case '`type`':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`supplier_id`':
                        $stmt->bindValue($identifier, $this->supplier_id, PDO::PARAM_INT);
                        break;
                    case '`receiver_id`':
                        $stmt->bindValue($identifier, $this->receiver_id, PDO::PARAM_INT);
                        break;
                    case '`note`':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
                        break;
                    case '`supplierPerson_id`':
                        $stmt->bindValue($identifier, $this->supplierperson_id, PDO::PARAM_INT);
                        break;
                    case '`receiverPerson_id`':
                        $stmt->bindValue($identifier, $this->receiverperson_id, PDO::PARAM_INT);
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

            if ($this->aPersonRelatedByCreatepersonId !== null) {
                if (!$this->aPersonRelatedByCreatepersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByCreatepersonId->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByModifypersonId !== null) {
                if (!$this->aPersonRelatedByModifypersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByModifypersonId->getValidationFailures());
                }
            }

            if ($this->aOrgstructureRelatedByReceiverId !== null) {
                if (!$this->aOrgstructureRelatedByReceiverId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrgstructureRelatedByReceiverId->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByReceiverpersonId !== null) {
                if (!$this->aPersonRelatedByReceiverpersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByReceiverpersonId->getValidationFailures());
                }
            }

            if ($this->aOrgstructureRelatedBySupplierId !== null) {
                if (!$this->aOrgstructureRelatedBySupplierId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrgstructureRelatedBySupplierId->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedBySupplierpersonId !== null) {
                if (!$this->aPersonRelatedBySupplierpersonId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedBySupplierpersonId->getValidationFailures());
                }
            }


            if (($retval = StockmotionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collStockmotionItems !== null) {
                    foreach ($this->collStockmotionItems as $referrerFK) {
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
        $pos = StockmotionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getType();
                break;
            case 7:
                return $this->getDate();
                break;
            case 8:
                return $this->getSupplierId();
                break;
            case 9:
                return $this->getReceiverId();
                break;
            case 10:
                return $this->getNote();
                break;
            case 11:
                return $this->getSupplierpersonId();
                break;
            case 12:
                return $this->getReceiverpersonId();
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
        if (isset($alreadyDumpedObjects['Stockmotion'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Stockmotion'][$this->getPrimaryKey()] = true;
        $keys = StockmotionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getType(),
            $keys[7] => $this->getDate(),
            $keys[8] => $this->getSupplierId(),
            $keys[9] => $this->getReceiverId(),
            $keys[10] => $this->getNote(),
            $keys[11] => $this->getSupplierpersonId(),
            $keys[12] => $this->getReceiverpersonId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPersonRelatedByCreatepersonId) {
                $result['PersonRelatedByCreatepersonId'] = $this->aPersonRelatedByCreatepersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByModifypersonId) {
                $result['PersonRelatedByModifypersonId'] = $this->aPersonRelatedByModifypersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrgstructureRelatedByReceiverId) {
                $result['OrgstructureRelatedByReceiverId'] = $this->aOrgstructureRelatedByReceiverId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByReceiverpersonId) {
                $result['PersonRelatedByReceiverpersonId'] = $this->aPersonRelatedByReceiverpersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrgstructureRelatedBySupplierId) {
                $result['OrgstructureRelatedBySupplierId'] = $this->aOrgstructureRelatedBySupplierId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedBySupplierpersonId) {
                $result['PersonRelatedBySupplierpersonId'] = $this->aPersonRelatedBySupplierpersonId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collStockmotionItems) {
                $result['StockmotionItems'] = $this->collStockmotionItems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = StockmotionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setType($value);
                break;
            case 7:
                $this->setDate($value);
                break;
            case 8:
                $this->setSupplierId($value);
                break;
            case 9:
                $this->setReceiverId($value);
                break;
            case 10:
                $this->setNote($value);
                break;
            case 11:
                $this->setSupplierpersonId($value);
                break;
            case 12:
                $this->setReceiverpersonId($value);
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
        $keys = StockmotionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setType($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSupplierId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setReceiverId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNote($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSupplierpersonId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setReceiverpersonId($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(StockmotionPeer::DATABASE_NAME);

        if ($this->isColumnModified(StockmotionPeer::ID)) $criteria->add(StockmotionPeer::ID, $this->id);
        if ($this->isColumnModified(StockmotionPeer::CREATEDATETIME)) $criteria->add(StockmotionPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(StockmotionPeer::CREATEPERSON_ID)) $criteria->add(StockmotionPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(StockmotionPeer::MODIFYDATETIME)) $criteria->add(StockmotionPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(StockmotionPeer::MODIFYPERSON_ID)) $criteria->add(StockmotionPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(StockmotionPeer::DELETED)) $criteria->add(StockmotionPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(StockmotionPeer::TYPE)) $criteria->add(StockmotionPeer::TYPE, $this->type);
        if ($this->isColumnModified(StockmotionPeer::DATE)) $criteria->add(StockmotionPeer::DATE, $this->date);
        if ($this->isColumnModified(StockmotionPeer::SUPPLIER_ID)) $criteria->add(StockmotionPeer::SUPPLIER_ID, $this->supplier_id);
        if ($this->isColumnModified(StockmotionPeer::RECEIVER_ID)) $criteria->add(StockmotionPeer::RECEIVER_ID, $this->receiver_id);
        if ($this->isColumnModified(StockmotionPeer::NOTE)) $criteria->add(StockmotionPeer::NOTE, $this->note);
        if ($this->isColumnModified(StockmotionPeer::SUPPLIERPERSON_ID)) $criteria->add(StockmotionPeer::SUPPLIERPERSON_ID, $this->supplierperson_id);
        if ($this->isColumnModified(StockmotionPeer::RECEIVERPERSON_ID)) $criteria->add(StockmotionPeer::RECEIVERPERSON_ID, $this->receiverperson_id);

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
        $criteria = new Criteria(StockmotionPeer::DATABASE_NAME);
        $criteria->add(StockmotionPeer::ID, $this->id);

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
     * @param object $copyObj An object of Stockmotion (or compatible) type.
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
        $copyObj->setType($this->getType());
        $copyObj->setDate($this->getDate());
        $copyObj->setSupplierId($this->getSupplierId());
        $copyObj->setReceiverId($this->getReceiverId());
        $copyObj->setNote($this->getNote());
        $copyObj->setSupplierpersonId($this->getSupplierpersonId());
        $copyObj->setReceiverpersonId($this->getReceiverpersonId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getStockmotionItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionItem($relObj->copy($deepCopy));
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
     * @return Stockmotion Clone of current object.
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
     * @return StockmotionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new StockmotionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Stockmotion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByCreatepersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setCreatepersonId(NULL);
        } else {
            $this->setCreatepersonId($v->getId());
        }

        $this->aPersonRelatedByCreatepersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addStockmotionRelatedByCreatepersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByCreatepersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByCreatepersonId === null && ($this->createperson_id !== null) && $doQuery) {
            $this->aPersonRelatedByCreatepersonId = PersonQuery::create()->findPk($this->createperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByCreatepersonId->addStockmotionsRelatedByCreatepersonId($this);
             */
        }

        return $this->aPersonRelatedByCreatepersonId;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Stockmotion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByModifypersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setModifypersonId(NULL);
        } else {
            $this->setModifypersonId($v->getId());
        }

        $this->aPersonRelatedByModifypersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addStockmotionRelatedByModifypersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByModifypersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByModifypersonId === null && ($this->modifyperson_id !== null) && $doQuery) {
            $this->aPersonRelatedByModifypersonId = PersonQuery::create()->findPk($this->modifyperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByModifypersonId->addStockmotionsRelatedByModifypersonId($this);
             */
        }

        return $this->aPersonRelatedByModifypersonId;
    }

    /**
     * Declares an association between this object and a Orgstructure object.
     *
     * @param             Orgstructure $v
     * @return Stockmotion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrgstructureRelatedByReceiverId(Orgstructure $v = null)
    {
        if ($v === null) {
            $this->setReceiverId(NULL);
        } else {
            $this->setReceiverId($v->getId());
        }

        $this->aOrgstructureRelatedByReceiverId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Orgstructure object, it will not be re-added.
        if ($v !== null) {
            $v->addStockmotionRelatedByReceiverId($this);
        }


        return $this;
    }


    /**
     * Get the associated Orgstructure object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Orgstructure The associated Orgstructure object.
     * @throws PropelException
     */
    public function getOrgstructureRelatedByReceiverId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrgstructureRelatedByReceiverId === null && ($this->receiver_id !== null) && $doQuery) {
            $this->aOrgstructureRelatedByReceiverId = OrgstructureQuery::create()->findPk($this->receiver_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrgstructureRelatedByReceiverId->addStockmotionsRelatedByReceiverId($this);
             */
        }

        return $this->aOrgstructureRelatedByReceiverId;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Stockmotion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByReceiverpersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setReceiverpersonId(NULL);
        } else {
            $this->setReceiverpersonId($v->getId());
        }

        $this->aPersonRelatedByReceiverpersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addStockmotionRelatedByReceiverpersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByReceiverpersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByReceiverpersonId === null && ($this->receiverperson_id !== null) && $doQuery) {
            $this->aPersonRelatedByReceiverpersonId = PersonQuery::create()->findPk($this->receiverperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByReceiverpersonId->addStockmotionsRelatedByReceiverpersonId($this);
             */
        }

        return $this->aPersonRelatedByReceiverpersonId;
    }

    /**
     * Declares an association between this object and a Orgstructure object.
     *
     * @param             Orgstructure $v
     * @return Stockmotion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrgstructureRelatedBySupplierId(Orgstructure $v = null)
    {
        if ($v === null) {
            $this->setSupplierId(NULL);
        } else {
            $this->setSupplierId($v->getId());
        }

        $this->aOrgstructureRelatedBySupplierId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Orgstructure object, it will not be re-added.
        if ($v !== null) {
            $v->addStockmotionRelatedBySupplierId($this);
        }


        return $this;
    }


    /**
     * Get the associated Orgstructure object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Orgstructure The associated Orgstructure object.
     * @throws PropelException
     */
    public function getOrgstructureRelatedBySupplierId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrgstructureRelatedBySupplierId === null && ($this->supplier_id !== null) && $doQuery) {
            $this->aOrgstructureRelatedBySupplierId = OrgstructureQuery::create()->findPk($this->supplier_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrgstructureRelatedBySupplierId->addStockmotionsRelatedBySupplierId($this);
             */
        }

        return $this->aOrgstructureRelatedBySupplierId;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Stockmotion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedBySupplierpersonId(Person $v = null)
    {
        if ($v === null) {
            $this->setSupplierpersonId(NULL);
        } else {
            $this->setSupplierpersonId($v->getId());
        }

        $this->aPersonRelatedBySupplierpersonId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addStockmotionRelatedBySupplierpersonId($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedBySupplierpersonId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedBySupplierpersonId === null && ($this->supplierperson_id !== null) && $doQuery) {
            $this->aPersonRelatedBySupplierpersonId = PersonQuery::create()->findPk($this->supplierperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedBySupplierpersonId->addStockmotionsRelatedBySupplierpersonId($this);
             */
        }

        return $this->aPersonRelatedBySupplierpersonId;
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
        if ('StockmotionItem' == $relationName) {
            $this->initStockmotionItems();
        }
    }

    /**
     * Clears out the collStockmotionItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Stockmotion The current object (for fluent API support)
     * @see        addStockmotionItems()
     */
    public function clearStockmotionItems()
    {
        $this->collStockmotionItems = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionItemsPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionItems collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionItems($v = true)
    {
        $this->collStockmotionItemsPartial = $v;
    }

    /**
     * Initializes the collStockmotionItems collection.
     *
     * By default this just sets the collStockmotionItems collection to an empty array (like clearcollStockmotionItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionItems($overrideExisting = true)
    {
        if (null !== $this->collStockmotionItems && !$overrideExisting) {
            return;
        }
        $this->collStockmotionItems = new PropelObjectCollection();
        $this->collStockmotionItems->setModel('StockmotionItem');
    }

    /**
     * Gets an array of StockmotionItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Stockmotion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     * @throws PropelException
     */
    public function getStockmotionItems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionItemsPartial && !$this->isNew();
        if (null === $this->collStockmotionItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionItems) {
                // return empty collection
                $this->initStockmotionItems();
            } else {
                $collStockmotionItems = StockmotionItemQuery::create(null, $criteria)
                    ->filterByStockmotion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionItemsPartial && count($collStockmotionItems)) {
                      $this->initStockmotionItems(false);

                      foreach($collStockmotionItems as $obj) {
                        if (false == $this->collStockmotionItems->contains($obj)) {
                          $this->collStockmotionItems->append($obj);
                        }
                      }

                      $this->collStockmotionItemsPartial = true;
                    }

                    $collStockmotionItems->getInternalIterator()->rewind();
                    return $collStockmotionItems;
                }

                if($partial && $this->collStockmotionItems) {
                    foreach($this->collStockmotionItems as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionItems[] = $obj;
                        }
                    }
                }

                $this->collStockmotionItems = $collStockmotionItems;
                $this->collStockmotionItemsPartial = false;
            }
        }

        return $this->collStockmotionItems;
    }

    /**
     * Sets a collection of StockmotionItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionItems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Stockmotion The current object (for fluent API support)
     */
    public function setStockmotionItems(PropelCollection $stockmotionItems, PropelPDO $con = null)
    {
        $stockmotionItemsToDelete = $this->getStockmotionItems(new Criteria(), $con)->diff($stockmotionItems);

        $this->stockmotionItemsScheduledForDeletion = unserialize(serialize($stockmotionItemsToDelete));

        foreach ($stockmotionItemsToDelete as $stockmotionItemRemoved) {
            $stockmotionItemRemoved->setStockmotion(null);
        }

        $this->collStockmotionItems = null;
        foreach ($stockmotionItems as $stockmotionItem) {
            $this->addStockmotionItem($stockmotionItem);
        }

        $this->collStockmotionItems = $stockmotionItems;
        $this->collStockmotionItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StockmotionItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StockmotionItem objects.
     * @throws PropelException
     */
    public function countStockmotionItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionItemsPartial && !$this->isNew();
        if (null === $this->collStockmotionItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionItems) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionItems());
            }
            $query = StockmotionItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStockmotion($this)
                ->count($con);
        }

        return count($this->collStockmotionItems);
    }

    /**
     * Method called to associate a StockmotionItem object to this object
     * through the StockmotionItem foreign key attribute.
     *
     * @param    StockmotionItem $l StockmotionItem
     * @return Stockmotion The current object (for fluent API support)
     */
    public function addStockmotionItem(StockmotionItem $l)
    {
        if ($this->collStockmotionItems === null) {
            $this->initStockmotionItems();
            $this->collStockmotionItemsPartial = true;
        }
        if (!in_array($l, $this->collStockmotionItems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionItem($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionItem $stockmotionItem The stockmotionItem object to add.
     */
    protected function doAddStockmotionItem($stockmotionItem)
    {
        $this->collStockmotionItems[]= $stockmotionItem;
        $stockmotionItem->setStockmotion($this);
    }

    /**
     * @param	StockmotionItem $stockmotionItem The stockmotionItem object to remove.
     * @return Stockmotion The current object (for fluent API support)
     */
    public function removeStockmotionItem($stockmotionItem)
    {
        if ($this->getStockmotionItems()->contains($stockmotionItem)) {
            $this->collStockmotionItems->remove($this->collStockmotionItems->search($stockmotionItem));
            if (null === $this->stockmotionItemsScheduledForDeletion) {
                $this->stockmotionItemsScheduledForDeletion = clone $this->collStockmotionItems;
                $this->stockmotionItemsScheduledForDeletion->clear();
            }
            $this->stockmotionItemsScheduledForDeletion[]= clone $stockmotionItem;
            $stockmotionItem->setStockmotion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Stockmotion is new, it will return
     * an empty collection; or if this Stockmotion has previously
     * been saved, it will retrieve related StockmotionItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Stockmotion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsJoinRbfinanceRelatedByFinanceId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('RbfinanceRelatedByFinanceId', $join_behavior);

        return $this->getStockmotionItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Stockmotion is new, it will return
     * an empty collection; or if this Stockmotion has previously
     * been saved, it will retrieve related StockmotionItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Stockmotion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsJoinRbnomenclature($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('Rbnomenclature', $join_behavior);

        return $this->getStockmotionItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Stockmotion is new, it will return
     * an empty collection; or if this Stockmotion has previously
     * been saved, it will retrieve related StockmotionItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Stockmotion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsJoinRbfinanceRelatedByOldfinanceId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('RbfinanceRelatedByOldfinanceId', $join_behavior);

        return $this->getStockmotionItems($query, $con);
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
        $this->type = null;
        $this->date = null;
        $this->supplier_id = null;
        $this->receiver_id = null;
        $this->note = null;
        $this->supplierperson_id = null;
        $this->receiverperson_id = null;
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
            if ($this->collStockmotionItems) {
                foreach ($this->collStockmotionItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPersonRelatedByCreatepersonId instanceof Persistent) {
              $this->aPersonRelatedByCreatepersonId->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByModifypersonId instanceof Persistent) {
              $this->aPersonRelatedByModifypersonId->clearAllReferences($deep);
            }
            if ($this->aOrgstructureRelatedByReceiverId instanceof Persistent) {
              $this->aOrgstructureRelatedByReceiverId->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByReceiverpersonId instanceof Persistent) {
              $this->aPersonRelatedByReceiverpersonId->clearAllReferences($deep);
            }
            if ($this->aOrgstructureRelatedBySupplierId instanceof Persistent) {
              $this->aOrgstructureRelatedBySupplierId->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedBySupplierpersonId instanceof Persistent) {
              $this->aPersonRelatedBySupplierpersonId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collStockmotionItems instanceof PropelCollection) {
            $this->collStockmotionItems->clearIterator();
        }
        $this->collStockmotionItems = null;
        $this->aPersonRelatedByCreatepersonId = null;
        $this->aPersonRelatedByModifypersonId = null;
        $this->aOrgstructureRelatedByReceiverId = null;
        $this->aPersonRelatedByReceiverpersonId = null;
        $this->aOrgstructureRelatedBySupplierId = null;
        $this->aPersonRelatedBySupplierpersonId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StockmotionPeer::DEFAULT_STRING_FORMAT);
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
