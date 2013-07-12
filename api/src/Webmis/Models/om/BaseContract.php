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
use Webmis\Models\Contract;
use Webmis\Models\ContractPeer;
use Webmis\Models\ContractQuery;

/**
 * Base class that represents a row from the 'Contract' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContract extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ContractPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ContractPeer
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
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the number field.
     * @var        string
     */
    protected $number;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the recipient_id field.
     * @var        int
     */
    protected $recipient_id;

    /**
     * The value for the recipientaccount_id field.
     * @var        int
     */
    protected $recipientaccount_id;

    /**
     * The value for the recipientkbk field.
     * @var        string
     */
    protected $recipientkbk;

    /**
     * The value for the payer_id field.
     * @var        int
     */
    protected $payer_id;

    /**
     * The value for the payeraccount_id field.
     * @var        int
     */
    protected $payeraccount_id;

    /**
     * The value for the payerkbk field.
     * @var        string
     */
    protected $payerkbk;

    /**
     * The value for the begdate field.
     * @var        string
     */
    protected $begdate;

    /**
     * The value for the enddate field.
     * @var        string
     */
    protected $enddate;

    /**
     * The value for the finance_id field.
     * @var        int
     */
    protected $finance_id;

    /**
     * The value for the grouping field.
     * @var        string
     */
    protected $grouping;

    /**
     * The value for the resolution field.
     * @var        string
     */
    protected $resolution;

    /**
     * The value for the format_id field.
     * @var        int
     */
    protected $format_id;

    /**
     * The value for the exposeunfinishedeventvisits field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $exposeunfinishedeventvisits;

    /**
     * The value for the exposeunfinishedeventactions field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $exposeunfinishedeventactions;

    /**
     * The value for the visitexposition field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $visitexposition;

    /**
     * The value for the actionexposition field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $actionexposition;

    /**
     * The value for the exposediscipline field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $exposediscipline;

    /**
     * The value for the pricelist_id field.
     * @var        int
     */
    protected $pricelist_id;

    /**
     * The value for the coefficient field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $coefficient;

    /**
     * The value for the coefficientex field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $coefficientex;

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
        $this->deleted = false;
        $this->exposeunfinishedeventvisits = false;
        $this->exposeunfinishedeventactions = false;
        $this->visitexposition = false;
        $this->actionexposition = false;
        $this->exposediscipline = false;
        $this->coefficient = 0;
        $this->coefficientex = 0;
    }

    /**
     * Initializes internal state of BaseContract object.
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
     * Get the [number] column value.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
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
     * Get the [recipient_id] column value.
     *
     * @return int
     */
    public function getRecipientId()
    {
        return $this->recipient_id;
    }

    /**
     * Get the [recipientaccount_id] column value.
     *
     * @return int
     */
    public function getRecipientaccountId()
    {
        return $this->recipientaccount_id;
    }

    /**
     * Get the [recipientkbk] column value.
     *
     * @return string
     */
    public function getRecipientkbk()
    {
        return $this->recipientkbk;
    }

    /**
     * Get the [payer_id] column value.
     *
     * @return int
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Get the [payeraccount_id] column value.
     *
     * @return int
     */
    public function getPayeraccountId()
    {
        return $this->payeraccount_id;
    }

    /**
     * Get the [payerkbk] column value.
     *
     * @return string
     */
    public function getPayerkbk()
    {
        return $this->payerkbk;
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
     * Get the [finance_id] column value.
     *
     * @return int
     */
    public function getFinanceId()
    {
        return $this->finance_id;
    }

    /**
     * Get the [grouping] column value.
     *
     * @return string
     */
    public function getGrouping()
    {
        return $this->grouping;
    }

    /**
     * Get the [resolution] column value.
     *
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Get the [format_id] column value.
     *
     * @return int
     */
    public function getFormatId()
    {
        return $this->format_id;
    }

    /**
     * Get the [exposeunfinishedeventvisits] column value.
     *
     * @return boolean
     */
    public function getExposeunfinishedeventvisits()
    {
        return $this->exposeunfinishedeventvisits;
    }

    /**
     * Get the [exposeunfinishedeventactions] column value.
     *
     * @return boolean
     */
    public function getExposeunfinishedeventactions()
    {
        return $this->exposeunfinishedeventactions;
    }

    /**
     * Get the [visitexposition] column value.
     *
     * @return boolean
     */
    public function getVisitexposition()
    {
        return $this->visitexposition;
    }

    /**
     * Get the [actionexposition] column value.
     *
     * @return boolean
     */
    public function getActionexposition()
    {
        return $this->actionexposition;
    }

    /**
     * Get the [exposediscipline] column value.
     *
     * @return boolean
     */
    public function getExposediscipline()
    {
        return $this->exposediscipline;
    }

    /**
     * Get the [pricelist_id] column value.
     *
     * @return int
     */
    public function getPricelistId()
    {
        return $this->pricelist_id;
    }

    /**
     * Get the [coefficient] column value.
     *
     * @return double
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * Get the [coefficientex] column value.
     *
     * @return double
     */
    public function getCoefficientex()
    {
        return $this->coefficientex;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ContractPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contract The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ContractPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ContractPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contract The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ContractPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ContractPeer::MODIFYPERSON_ID;
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
     * @return Contract The current object (for fluent API support)
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
            $this->modifiedColumns[] = ContractPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [number] column.
     *
     * @param string $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->number !== $v) {
            $this->number = $v;
            $this->modifiedColumns[] = ContractPeer::NUMBER;
        }


        return $this;
    } // setNumber()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contract The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = ContractPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [recipient_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setRecipientId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->recipient_id !== $v) {
            $this->recipient_id = $v;
            $this->modifiedColumns[] = ContractPeer::RECIPIENT_ID;
        }


        return $this;
    } // setRecipientId()

    /**
     * Set the value of [recipientaccount_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setRecipientaccountId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->recipientaccount_id !== $v) {
            $this->recipientaccount_id = $v;
            $this->modifiedColumns[] = ContractPeer::RECIPIENTACCOUNT_ID;
        }


        return $this;
    } // setRecipientaccountId()

    /**
     * Set the value of [recipientkbk] column.
     *
     * @param string $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setRecipientkbk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->recipientkbk !== $v) {
            $this->recipientkbk = $v;
            $this->modifiedColumns[] = ContractPeer::RECIPIENTKBK;
        }


        return $this;
    } // setRecipientkbk()

    /**
     * Set the value of [payer_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setPayerId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->payer_id !== $v) {
            $this->payer_id = $v;
            $this->modifiedColumns[] = ContractPeer::PAYER_ID;
        }


        return $this;
    } // setPayerId()

    /**
     * Set the value of [payeraccount_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setPayeraccountId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->payeraccount_id !== $v) {
            $this->payeraccount_id = $v;
            $this->modifiedColumns[] = ContractPeer::PAYERACCOUNT_ID;
        }


        return $this;
    } // setPayeraccountId()

    /**
     * Set the value of [payerkbk] column.
     *
     * @param string $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setPayerkbk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->payerkbk !== $v) {
            $this->payerkbk = $v;
            $this->modifiedColumns[] = ContractPeer::PAYERKBK;
        }


        return $this;
    } // setPayerkbk()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contract The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = ContractPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contract The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = ContractPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [finance_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setFinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->finance_id !== $v) {
            $this->finance_id = $v;
            $this->modifiedColumns[] = ContractPeer::FINANCE_ID;
        }


        return $this;
    } // setFinanceId()

    /**
     * Set the value of [grouping] column.
     *
     * @param string $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setGrouping($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->grouping !== $v) {
            $this->grouping = $v;
            $this->modifiedColumns[] = ContractPeer::GROUPING;
        }


        return $this;
    } // setGrouping()

    /**
     * Set the value of [resolution] column.
     *
     * @param string $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setResolution($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->resolution !== $v) {
            $this->resolution = $v;
            $this->modifiedColumns[] = ContractPeer::RESOLUTION;
        }


        return $this;
    } // setResolution()

    /**
     * Set the value of [format_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setFormatId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->format_id !== $v) {
            $this->format_id = $v;
            $this->modifiedColumns[] = ContractPeer::FORMAT_ID;
        }


        return $this;
    } // setFormatId()

    /**
     * Sets the value of the [exposeunfinishedeventvisits] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Contract The current object (for fluent API support)
     */
    public function setExposeunfinishedeventvisits($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->exposeunfinishedeventvisits !== $v) {
            $this->exposeunfinishedeventvisits = $v;
            $this->modifiedColumns[] = ContractPeer::EXPOSEUNFINISHEDEVENTVISITS;
        }


        return $this;
    } // setExposeunfinishedeventvisits()

    /**
     * Sets the value of the [exposeunfinishedeventactions] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Contract The current object (for fluent API support)
     */
    public function setExposeunfinishedeventactions($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->exposeunfinishedeventactions !== $v) {
            $this->exposeunfinishedeventactions = $v;
            $this->modifiedColumns[] = ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS;
        }


        return $this;
    } // setExposeunfinishedeventactions()

    /**
     * Sets the value of the [visitexposition] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Contract The current object (for fluent API support)
     */
    public function setVisitexposition($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->visitexposition !== $v) {
            $this->visitexposition = $v;
            $this->modifiedColumns[] = ContractPeer::VISITEXPOSITION;
        }


        return $this;
    } // setVisitexposition()

    /**
     * Sets the value of the [actionexposition] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Contract The current object (for fluent API support)
     */
    public function setActionexposition($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->actionexposition !== $v) {
            $this->actionexposition = $v;
            $this->modifiedColumns[] = ContractPeer::ACTIONEXPOSITION;
        }


        return $this;
    } // setActionexposition()

    /**
     * Sets the value of the [exposediscipline] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Contract The current object (for fluent API support)
     */
    public function setExposediscipline($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->exposediscipline !== $v) {
            $this->exposediscipline = $v;
            $this->modifiedColumns[] = ContractPeer::EXPOSEDISCIPLINE;
        }


        return $this;
    } // setExposediscipline()

    /**
     * Set the value of [pricelist_id] column.
     *
     * @param int $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setPricelistId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pricelist_id !== $v) {
            $this->pricelist_id = $v;
            $this->modifiedColumns[] = ContractPeer::PRICELIST_ID;
        }


        return $this;
    } // setPricelistId()

    /**
     * Set the value of [coefficient] column.
     *
     * @param double $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setCoefficient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->coefficient !== $v) {
            $this->coefficient = $v;
            $this->modifiedColumns[] = ContractPeer::COEFFICIENT;
        }


        return $this;
    } // setCoefficient()

    /**
     * Set the value of [coefficientex] column.
     *
     * @param double $v new value
     * @return Contract The current object (for fluent API support)
     */
    public function setCoefficientex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->coefficientex !== $v) {
            $this->coefficientex = $v;
            $this->modifiedColumns[] = ContractPeer::COEFFICIENTEX;
        }


        return $this;
    } // setCoefficientex()

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
            if ($this->deleted !== false) {
                return false;
            }

            if ($this->exposeunfinishedeventvisits !== false) {
                return false;
            }

            if ($this->exposeunfinishedeventactions !== false) {
                return false;
            }

            if ($this->visitexposition !== false) {
                return false;
            }

            if ($this->actionexposition !== false) {
                return false;
            }

            if ($this->exposediscipline !== false) {
                return false;
            }

            if ($this->coefficient !== 0) {
                return false;
            }

            if ($this->coefficientex !== 0) {
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
            $this->number = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->recipient_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->recipientaccount_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->recipientkbk = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->payer_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->payeraccount_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->payerkbk = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->begdate = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->enddate = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->finance_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->grouping = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->resolution = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->format_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->exposeunfinishedeventvisits = ($row[$startcol + 20] !== null) ? (boolean) $row[$startcol + 20] : null;
            $this->exposeunfinishedeventactions = ($row[$startcol + 21] !== null) ? (boolean) $row[$startcol + 21] : null;
            $this->visitexposition = ($row[$startcol + 22] !== null) ? (boolean) $row[$startcol + 22] : null;
            $this->actionexposition = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
            $this->exposediscipline = ($row[$startcol + 24] !== null) ? (boolean) $row[$startcol + 24] : null;
            $this->pricelist_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->coefficient = ($row[$startcol + 26] !== null) ? (double) $row[$startcol + 26] : null;
            $this->coefficientex = ($row[$startcol + 27] !== null) ? (double) $row[$startcol + 27] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 28; // 28 = ContractPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Contract object", $e);
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
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ContractPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ContractQuery::create()
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
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ContractPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ContractPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ContractPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ContractPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ContractPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(ContractPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ContractPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(ContractPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ContractPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ContractPeer::NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`number`';
        }
        if ($this->isColumnModified(ContractPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(ContractPeer::RECIPIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`recipient_id`';
        }
        if ($this->isColumnModified(ContractPeer::RECIPIENTACCOUNT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`recipientAccount_id`';
        }
        if ($this->isColumnModified(ContractPeer::RECIPIENTKBK)) {
            $modifiedColumns[':p' . $index++]  = '`recipientKBK`';
        }
        if ($this->isColumnModified(ContractPeer::PAYER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`payer_id`';
        }
        if ($this->isColumnModified(ContractPeer::PAYERACCOUNT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`payerAccount_id`';
        }
        if ($this->isColumnModified(ContractPeer::PAYERKBK)) {
            $modifiedColumns[':p' . $index++]  = '`payerKBK`';
        }
        if ($this->isColumnModified(ContractPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(ContractPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(ContractPeer::FINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`finance_id`';
        }
        if ($this->isColumnModified(ContractPeer::GROUPING)) {
            $modifiedColumns[':p' . $index++]  = '`grouping`';
        }
        if ($this->isColumnModified(ContractPeer::RESOLUTION)) {
            $modifiedColumns[':p' . $index++]  = '`resolution`';
        }
        if ($this->isColumnModified(ContractPeer::FORMAT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`format_id`';
        }
        if ($this->isColumnModified(ContractPeer::EXPOSEUNFINISHEDEVENTVISITS)) {
            $modifiedColumns[':p' . $index++]  = '`exposeUnfinishedEventVisits`';
        }
        if ($this->isColumnModified(ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS)) {
            $modifiedColumns[':p' . $index++]  = '`exposeUnfinishedEventActions`';
        }
        if ($this->isColumnModified(ContractPeer::VISITEXPOSITION)) {
            $modifiedColumns[':p' . $index++]  = '`visitExposition`';
        }
        if ($this->isColumnModified(ContractPeer::ACTIONEXPOSITION)) {
            $modifiedColumns[':p' . $index++]  = '`actionExposition`';
        }
        if ($this->isColumnModified(ContractPeer::EXPOSEDISCIPLINE)) {
            $modifiedColumns[':p' . $index++]  = '`exposeDiscipline`';
        }
        if ($this->isColumnModified(ContractPeer::PRICELIST_ID)) {
            $modifiedColumns[':p' . $index++]  = '`priceList_id`';
        }
        if ($this->isColumnModified(ContractPeer::COEFFICIENT)) {
            $modifiedColumns[':p' . $index++]  = '`coefficient`';
        }
        if ($this->isColumnModified(ContractPeer::COEFFICIENTEX)) {
            $modifiedColumns[':p' . $index++]  = '`coefficientEx`';
        }

        $sql = sprintf(
            'INSERT INTO `Contract` (%s) VALUES (%s)',
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
                    case '`number`':
                        $stmt->bindValue($identifier, $this->number, PDO::PARAM_STR);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`recipient_id`':
                        $stmt->bindValue($identifier, $this->recipient_id, PDO::PARAM_INT);
                        break;
                    case '`recipientAccount_id`':
                        $stmt->bindValue($identifier, $this->recipientaccount_id, PDO::PARAM_INT);
                        break;
                    case '`recipientKBK`':
                        $stmt->bindValue($identifier, $this->recipientkbk, PDO::PARAM_STR);
                        break;
                    case '`payer_id`':
                        $stmt->bindValue($identifier, $this->payer_id, PDO::PARAM_INT);
                        break;
                    case '`payerAccount_id`':
                        $stmt->bindValue($identifier, $this->payeraccount_id, PDO::PARAM_INT);
                        break;
                    case '`payerKBK`':
                        $stmt->bindValue($identifier, $this->payerkbk, PDO::PARAM_STR);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`finance_id`':
                        $stmt->bindValue($identifier, $this->finance_id, PDO::PARAM_INT);
                        break;
                    case '`grouping`':
                        $stmt->bindValue($identifier, $this->grouping, PDO::PARAM_STR);
                        break;
                    case '`resolution`':
                        $stmt->bindValue($identifier, $this->resolution, PDO::PARAM_STR);
                        break;
                    case '`format_id`':
                        $stmt->bindValue($identifier, $this->format_id, PDO::PARAM_INT);
                        break;
                    case '`exposeUnfinishedEventVisits`':
                        $stmt->bindValue($identifier, (int) $this->exposeunfinishedeventvisits, PDO::PARAM_INT);
                        break;
                    case '`exposeUnfinishedEventActions`':
                        $stmt->bindValue($identifier, (int) $this->exposeunfinishedeventactions, PDO::PARAM_INT);
                        break;
                    case '`visitExposition`':
                        $stmt->bindValue($identifier, (int) $this->visitexposition, PDO::PARAM_INT);
                        break;
                    case '`actionExposition`':
                        $stmt->bindValue($identifier, (int) $this->actionexposition, PDO::PARAM_INT);
                        break;
                    case '`exposeDiscipline`':
                        $stmt->bindValue($identifier, (int) $this->exposediscipline, PDO::PARAM_INT);
                        break;
                    case '`priceList_id`':
                        $stmt->bindValue($identifier, $this->pricelist_id, PDO::PARAM_INT);
                        break;
                    case '`coefficient`':
                        $stmt->bindValue($identifier, $this->coefficient, PDO::PARAM_STR);
                        break;
                    case '`coefficientEx`':
                        $stmt->bindValue($identifier, $this->coefficientex, PDO::PARAM_STR);
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


            if (($retval = ContractPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ContractPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNumber();
                break;
            case 7:
                return $this->getDate();
                break;
            case 8:
                return $this->getRecipientId();
                break;
            case 9:
                return $this->getRecipientaccountId();
                break;
            case 10:
                return $this->getRecipientkbk();
                break;
            case 11:
                return $this->getPayerId();
                break;
            case 12:
                return $this->getPayeraccountId();
                break;
            case 13:
                return $this->getPayerkbk();
                break;
            case 14:
                return $this->getBegdate();
                break;
            case 15:
                return $this->getEnddate();
                break;
            case 16:
                return $this->getFinanceId();
                break;
            case 17:
                return $this->getGrouping();
                break;
            case 18:
                return $this->getResolution();
                break;
            case 19:
                return $this->getFormatId();
                break;
            case 20:
                return $this->getExposeunfinishedeventvisits();
                break;
            case 21:
                return $this->getExposeunfinishedeventactions();
                break;
            case 22:
                return $this->getVisitexposition();
                break;
            case 23:
                return $this->getActionexposition();
                break;
            case 24:
                return $this->getExposediscipline();
                break;
            case 25:
                return $this->getPricelistId();
                break;
            case 26:
                return $this->getCoefficient();
                break;
            case 27:
                return $this->getCoefficientex();
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
        if (isset($alreadyDumpedObjects['Contract'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Contract'][$this->getPrimaryKey()] = true;
        $keys = ContractPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getNumber(),
            $keys[7] => $this->getDate(),
            $keys[8] => $this->getRecipientId(),
            $keys[9] => $this->getRecipientaccountId(),
            $keys[10] => $this->getRecipientkbk(),
            $keys[11] => $this->getPayerId(),
            $keys[12] => $this->getPayeraccountId(),
            $keys[13] => $this->getPayerkbk(),
            $keys[14] => $this->getBegdate(),
            $keys[15] => $this->getEnddate(),
            $keys[16] => $this->getFinanceId(),
            $keys[17] => $this->getGrouping(),
            $keys[18] => $this->getResolution(),
            $keys[19] => $this->getFormatId(),
            $keys[20] => $this->getExposeunfinishedeventvisits(),
            $keys[21] => $this->getExposeunfinishedeventactions(),
            $keys[22] => $this->getVisitexposition(),
            $keys[23] => $this->getActionexposition(),
            $keys[24] => $this->getExposediscipline(),
            $keys[25] => $this->getPricelistId(),
            $keys[26] => $this->getCoefficient(),
            $keys[27] => $this->getCoefficientex(),
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
        $pos = ContractPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNumber($value);
                break;
            case 7:
                $this->setDate($value);
                break;
            case 8:
                $this->setRecipientId($value);
                break;
            case 9:
                $this->setRecipientaccountId($value);
                break;
            case 10:
                $this->setRecipientkbk($value);
                break;
            case 11:
                $this->setPayerId($value);
                break;
            case 12:
                $this->setPayeraccountId($value);
                break;
            case 13:
                $this->setPayerkbk($value);
                break;
            case 14:
                $this->setBegdate($value);
                break;
            case 15:
                $this->setEnddate($value);
                break;
            case 16:
                $this->setFinanceId($value);
                break;
            case 17:
                $this->setGrouping($value);
                break;
            case 18:
                $this->setResolution($value);
                break;
            case 19:
                $this->setFormatId($value);
                break;
            case 20:
                $this->setExposeunfinishedeventvisits($value);
                break;
            case 21:
                $this->setExposeunfinishedeventactions($value);
                break;
            case 22:
                $this->setVisitexposition($value);
                break;
            case 23:
                $this->setActionexposition($value);
                break;
            case 24:
                $this->setExposediscipline($value);
                break;
            case 25:
                $this->setPricelistId($value);
                break;
            case 26:
                $this->setCoefficient($value);
                break;
            case 27:
                $this->setCoefficientex($value);
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
        $keys = ContractPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNumber($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRecipientId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setRecipientaccountId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setRecipientkbk($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setPayerId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setPayeraccountId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setPayerkbk($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBegdate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setEnddate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setFinanceId($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setGrouping($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setResolution($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setFormatId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setExposeunfinishedeventvisits($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setExposeunfinishedeventactions($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setVisitexposition($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setActionexposition($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setExposediscipline($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setPricelistId($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setCoefficient($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setCoefficientex($arr[$keys[27]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ContractPeer::DATABASE_NAME);

        if ($this->isColumnModified(ContractPeer::ID)) $criteria->add(ContractPeer::ID, $this->id);
        if ($this->isColumnModified(ContractPeer::CREATEDATETIME)) $criteria->add(ContractPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ContractPeer::CREATEPERSON_ID)) $criteria->add(ContractPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ContractPeer::MODIFYDATETIME)) $criteria->add(ContractPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ContractPeer::MODIFYPERSON_ID)) $criteria->add(ContractPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ContractPeer::DELETED)) $criteria->add(ContractPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ContractPeer::NUMBER)) $criteria->add(ContractPeer::NUMBER, $this->number);
        if ($this->isColumnModified(ContractPeer::DATE)) $criteria->add(ContractPeer::DATE, $this->date);
        if ($this->isColumnModified(ContractPeer::RECIPIENT_ID)) $criteria->add(ContractPeer::RECIPIENT_ID, $this->recipient_id);
        if ($this->isColumnModified(ContractPeer::RECIPIENTACCOUNT_ID)) $criteria->add(ContractPeer::RECIPIENTACCOUNT_ID, $this->recipientaccount_id);
        if ($this->isColumnModified(ContractPeer::RECIPIENTKBK)) $criteria->add(ContractPeer::RECIPIENTKBK, $this->recipientkbk);
        if ($this->isColumnModified(ContractPeer::PAYER_ID)) $criteria->add(ContractPeer::PAYER_ID, $this->payer_id);
        if ($this->isColumnModified(ContractPeer::PAYERACCOUNT_ID)) $criteria->add(ContractPeer::PAYERACCOUNT_ID, $this->payeraccount_id);
        if ($this->isColumnModified(ContractPeer::PAYERKBK)) $criteria->add(ContractPeer::PAYERKBK, $this->payerkbk);
        if ($this->isColumnModified(ContractPeer::BEGDATE)) $criteria->add(ContractPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(ContractPeer::ENDDATE)) $criteria->add(ContractPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(ContractPeer::FINANCE_ID)) $criteria->add(ContractPeer::FINANCE_ID, $this->finance_id);
        if ($this->isColumnModified(ContractPeer::GROUPING)) $criteria->add(ContractPeer::GROUPING, $this->grouping);
        if ($this->isColumnModified(ContractPeer::RESOLUTION)) $criteria->add(ContractPeer::RESOLUTION, $this->resolution);
        if ($this->isColumnModified(ContractPeer::FORMAT_ID)) $criteria->add(ContractPeer::FORMAT_ID, $this->format_id);
        if ($this->isColumnModified(ContractPeer::EXPOSEUNFINISHEDEVENTVISITS)) $criteria->add(ContractPeer::EXPOSEUNFINISHEDEVENTVISITS, $this->exposeunfinishedeventvisits);
        if ($this->isColumnModified(ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS)) $criteria->add(ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS, $this->exposeunfinishedeventactions);
        if ($this->isColumnModified(ContractPeer::VISITEXPOSITION)) $criteria->add(ContractPeer::VISITEXPOSITION, $this->visitexposition);
        if ($this->isColumnModified(ContractPeer::ACTIONEXPOSITION)) $criteria->add(ContractPeer::ACTIONEXPOSITION, $this->actionexposition);
        if ($this->isColumnModified(ContractPeer::EXPOSEDISCIPLINE)) $criteria->add(ContractPeer::EXPOSEDISCIPLINE, $this->exposediscipline);
        if ($this->isColumnModified(ContractPeer::PRICELIST_ID)) $criteria->add(ContractPeer::PRICELIST_ID, $this->pricelist_id);
        if ($this->isColumnModified(ContractPeer::COEFFICIENT)) $criteria->add(ContractPeer::COEFFICIENT, $this->coefficient);
        if ($this->isColumnModified(ContractPeer::COEFFICIENTEX)) $criteria->add(ContractPeer::COEFFICIENTEX, $this->coefficientex);

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
        $criteria = new Criteria(ContractPeer::DATABASE_NAME);
        $criteria->add(ContractPeer::ID, $this->id);

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
     * @param object $copyObj An object of Contract (or compatible) type.
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
        $copyObj->setNumber($this->getNumber());
        $copyObj->setDate($this->getDate());
        $copyObj->setRecipientId($this->getRecipientId());
        $copyObj->setRecipientaccountId($this->getRecipientaccountId());
        $copyObj->setRecipientkbk($this->getRecipientkbk());
        $copyObj->setPayerId($this->getPayerId());
        $copyObj->setPayeraccountId($this->getPayeraccountId());
        $copyObj->setPayerkbk($this->getPayerkbk());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setFinanceId($this->getFinanceId());
        $copyObj->setGrouping($this->getGrouping());
        $copyObj->setResolution($this->getResolution());
        $copyObj->setFormatId($this->getFormatId());
        $copyObj->setExposeunfinishedeventvisits($this->getExposeunfinishedeventvisits());
        $copyObj->setExposeunfinishedeventactions($this->getExposeunfinishedeventactions());
        $copyObj->setVisitexposition($this->getVisitexposition());
        $copyObj->setActionexposition($this->getActionexposition());
        $copyObj->setExposediscipline($this->getExposediscipline());
        $copyObj->setPricelistId($this->getPricelistId());
        $copyObj->setCoefficient($this->getCoefficient());
        $copyObj->setCoefficientex($this->getCoefficientex());
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
     * @return Contract Clone of current object.
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
     * @return ContractPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ContractPeer();
        }

        return self::$peer;
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
        $this->number = null;
        $this->date = null;
        $this->recipient_id = null;
        $this->recipientaccount_id = null;
        $this->recipientkbk = null;
        $this->payer_id = null;
        $this->payeraccount_id = null;
        $this->payerkbk = null;
        $this->begdate = null;
        $this->enddate = null;
        $this->finance_id = null;
        $this->grouping = null;
        $this->resolution = null;
        $this->format_id = null;
        $this->exposeunfinishedeventvisits = null;
        $this->exposeunfinishedeventactions = null;
        $this->visitexposition = null;
        $this->actionexposition = null;
        $this->exposediscipline = null;
        $this->pricelist_id = null;
        $this->coefficient = null;
        $this->coefficientex = null;
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
        return (string) $this->exportTo(ContractPeer::DEFAULT_STRING_FORMAT);
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
