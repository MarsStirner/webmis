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
use Webmis\Models\ClientQuoting;
use Webmis\Models\ClientQuotingPeer;
use Webmis\Models\ClientQuotingQuery;

/**
 * Base class that represents a row from the 'Client_Quoting' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientQuoting extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ClientQuotingPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientQuotingPeer
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
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the identifier field.
     * @var        string
     */
    protected $identifier;

    /**
     * The value for the quotaticket field.
     * @var        string
     */
    protected $quotaticket;

    /**
     * The value for the quotatype_id field.
     * @var        int
     */
    protected $quotatype_id;

    /**
     * The value for the stage field.
     * @var        int
     */
    protected $stage;

    /**
     * The value for the directiondate field.
     * @var        string
     */
    protected $directiondate;

    /**
     * The value for the freeinput field.
     * @var        string
     */
    protected $freeinput;

    /**
     * The value for the org_id field.
     * @var        int
     */
    protected $org_id;

    /**
     * The value for the amount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $amount;

    /**
     * The value for the mkb field.
     * @var        string
     */
    protected $mkb;

    /**
     * The value for the status field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $status;

    /**
     * The value for the request field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $request;

    /**
     * The value for the statment field.
     * @var        string
     */
    protected $statment;

    /**
     * The value for the dateregistration field.
     * @var        string
     */
    protected $dateregistration;

    /**
     * The value for the dateend field.
     * @var        string
     */
    protected $dateend;

    /**
     * The value for the orgstructure_id field.
     * @var        int
     */
    protected $orgstructure_id;

    /**
     * The value for the regioncode field.
     * @var        string
     */
    protected $regioncode;

    /**
     * The value for the pacientmodel_id field.
     * @var        int
     */
    protected $pacientmodel_id;

    /**
     * The value for the treatment_id field.
     * @var        int
     */
    protected $treatment_id;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the prevtalon_event_id field.
     * @var        int
     */
    protected $prevtalon_event_id;

    /**
     * The value for the version field.
     * @var        int
     */
    protected $version;

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
        $this->amount = 0;
        $this->status = 0;
        $this->request = 0;
    }

    /**
     * Initializes internal state of BaseClientQuoting object.
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
     * Get the [master_id] column value.
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Get the [identifier] column value.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Get the [quotaticket] column value.
     *
     * @return string
     */
    public function getQuotaticket()
    {
        return $this->quotaticket;
    }

    /**
     * Get the [quotatype_id] column value.
     *
     * @return int
     */
    public function getQuotatypeId()
    {
        return $this->quotatype_id;
    }

    /**
     * Get the [stage] column value.
     *
     * @return int
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Get the [optionally formatted] temporal [directiondate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDirectiondate($format = 'Y-m-d H:i:s')
    {
        if ($this->directiondate === null) {
            return null;
        }

        if ($this->directiondate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->directiondate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->directiondate, true), $x);
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
     * Get the [freeinput] column value.
     *
     * @return string
     */
    public function getFreeinput()
    {
        return $this->freeinput;
    }

    /**
     * Get the [org_id] column value.
     *
     * @return int
     */
    public function getOrgId()
    {
        return $this->org_id;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [mkb] column value.
     *
     * @return string
     */
    public function getMkb()
    {
        return $this->mkb;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [request] column value.
     *
     * @return int
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the [statment] column value.
     *
     * @return string
     */
    public function getStatment()
    {
        return $this->statment;
    }

    /**
     * Get the [optionally formatted] temporal [dateregistration] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateregistration($format = 'Y-m-d H:i:s')
    {
        if ($this->dateregistration === null) {
            return null;
        }

        if ($this->dateregistration === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->dateregistration);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dateregistration, true), $x);
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
     * Get the [optionally formatted] temporal [dateend] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateend($format = 'Y-m-d H:i:s')
    {
        if ($this->dateend === null) {
            return null;
        }

        if ($this->dateend === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->dateend);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dateend, true), $x);
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
     * Get the [orgstructure_id] column value.
     *
     * @return int
     */
    public function getOrgstructureId()
    {
        return $this->orgstructure_id;
    }

    /**
     * Get the [regioncode] column value.
     *
     * @return string
     */
    public function getRegioncode()
    {
        return $this->regioncode;
    }

    /**
     * Get the [pacientmodel_id] column value.
     *
     * @return int
     */
    public function getPacientmodelId()
    {
        return $this->pacientmodel_id;
    }

    /**
     * Get the [treatment_id] column value.
     *
     * @return int
     */
    public function getTreatmentId()
    {
        return $this->treatment_id;
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
     * Get the [prevtalon_event_id] column value.
     *
     * @return int
     */
    public function getPrevtalonEventId()
    {
        return $this->prevtalon_event_id;
    }

    /**
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ClientQuotingPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ClientQuotingPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::MODIFYPERSON_ID;
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
     * @return ClientQuoting The current object (for fluent API support)
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
            $this->modifiedColumns[] = ClientQuotingPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [identifier] column.
     *
     * @param string $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setIdentifier($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->identifier !== $v) {
            $this->identifier = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::IDENTIFIER;
        }


        return $this;
    } // setIdentifier()

    /**
     * Set the value of [quotaticket] column.
     *
     * @param string $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setQuotaticket($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->quotaticket !== $v) {
            $this->quotaticket = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::QUOTATICKET;
        }


        return $this;
    } // setQuotaticket()

    /**
     * Set the value of [quotatype_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setQuotatypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->quotatype_id !== $v) {
            $this->quotatype_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::QUOTATYPE_ID;
        }


        return $this;
    } // setQuotatypeId()

    /**
     * Set the value of [stage] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setStage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->stage !== $v) {
            $this->stage = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::STAGE;
        }


        return $this;
    } // setStage()

    /**
     * Sets the value of [directiondate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setDirectiondate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->directiondate !== null || $dt !== null) {
            $currentDateAsString = ($this->directiondate !== null && $tmpDt = new DateTime($this->directiondate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->directiondate = $newDateAsString;
                $this->modifiedColumns[] = ClientQuotingPeer::DIRECTIONDATE;
            }
        } // if either are not null


        return $this;
    } // setDirectiondate()

    /**
     * Set the value of [freeinput] column.
     *
     * @param string $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setFreeinput($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->freeinput !== $v) {
            $this->freeinput = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::FREEINPUT;
        }


        return $this;
    } // setFreeinput()

    /**
     * Set the value of [org_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setOrgId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->org_id !== $v) {
            $this->org_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::ORG_ID;
        }


        return $this;
    } // setOrgId()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [mkb] column.
     *
     * @param string $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setMkb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mkb !== $v) {
            $this->mkb = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::MKB;
        }


        return $this;
    } // setMkb()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [request] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setRequest($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->request !== $v) {
            $this->request = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::REQUEST;
        }


        return $this;
    } // setRequest()

    /**
     * Set the value of [statment] column.
     *
     * @param string $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setStatment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->statment !== $v) {
            $this->statment = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::STATMENT;
        }


        return $this;
    } // setStatment()

    /**
     * Sets the value of [dateregistration] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setDateregistration($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateregistration !== null || $dt !== null) {
            $currentDateAsString = ($this->dateregistration !== null && $tmpDt = new DateTime($this->dateregistration)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dateregistration = $newDateAsString;
                $this->modifiedColumns[] = ClientQuotingPeer::DATEREGISTRATION;
            }
        } // if either are not null


        return $this;
    } // setDateregistration()

    /**
     * Sets the value of [dateend] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setDateend($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateend !== null || $dt !== null) {
            $currentDateAsString = ($this->dateend !== null && $tmpDt = new DateTime($this->dateend)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dateend = $newDateAsString;
                $this->modifiedColumns[] = ClientQuotingPeer::DATEEND;
            }
        } // if either are not null


        return $this;
    } // setDateend()

    /**
     * Set the value of [orgstructure_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setOrgstructureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->orgstructure_id !== $v) {
            $this->orgstructure_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::ORGSTRUCTURE_ID;
        }


        return $this;
    } // setOrgstructureId()

    /**
     * Set the value of [regioncode] column.
     *
     * @param string $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setRegioncode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regioncode !== $v) {
            $this->regioncode = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::REGIONCODE;
        }


        return $this;
    } // setRegioncode()

    /**
     * Set the value of [pacientmodel_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setPacientmodelId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pacientmodel_id !== $v) {
            $this->pacientmodel_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::PACIENTMODEL_ID;
        }


        return $this;
    } // setPacientmodelId()

    /**
     * Set the value of [treatment_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setTreatmentId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->treatment_id !== $v) {
            $this->treatment_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::TREATMENT_ID;
        }


        return $this;
    } // setTreatmentId()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [prevtalon_event_id] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setPrevtalonEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->prevtalon_event_id !== $v) {
            $this->prevtalon_event_id = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::PREVTALON_EVENT_ID;
        }


        return $this;
    } // setPrevtalonEventId()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return ClientQuoting The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ClientQuotingPeer::VERSION;
        }


        return $this;
    } // setVersion()

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

            if ($this->amount !== 0) {
                return false;
            }

            if ($this->status !== 0) {
                return false;
            }

            if ($this->request !== 0) {
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
            $this->master_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->identifier = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->quotaticket = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->quotatype_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->stage = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->directiondate = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->freeinput = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->org_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->amount = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->mkb = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->status = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->request = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->statment = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->dateregistration = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->dateend = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->orgstructure_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->regioncode = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->pacientmodel_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->treatment_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->event_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->prevtalon_event_id = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
            $this->version = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 28; // 28 = ClientQuotingPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ClientQuoting object", $e);
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
            $con = Propel::getConnection(ClientQuotingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientQuotingPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(ClientQuotingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientQuotingQuery::create()
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
            $con = Propel::getConnection(ClientQuotingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientQuotingPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ClientQuotingPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientQuotingPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientQuotingPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::IDENTIFIER)) {
            $modifiedColumns[':p' . $index++]  = '`identifier`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::QUOTATICKET)) {
            $modifiedColumns[':p' . $index++]  = '`quotaTicket`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::QUOTATYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`quotaType_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::STAGE)) {
            $modifiedColumns[':p' . $index++]  = '`stage`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::DIRECTIONDATE)) {
            $modifiedColumns[':p' . $index++]  = '`directionDate`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::FREEINPUT)) {
            $modifiedColumns[':p' . $index++]  = '`freeInput`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::ORG_ID)) {
            $modifiedColumns[':p' . $index++]  = '`org_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::MKB)) {
            $modifiedColumns[':p' . $index++]  = '`MKB`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::REQUEST)) {
            $modifiedColumns[':p' . $index++]  = '`request`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::STATMENT)) {
            $modifiedColumns[':p' . $index++]  = '`statment`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::DATEREGISTRATION)) {
            $modifiedColumns[':p' . $index++]  = '`dateRegistration`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::DATEEND)) {
            $modifiedColumns[':p' . $index++]  = '`dateEnd`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::ORGSTRUCTURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`orgStructure_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::REGIONCODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionCode`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::PACIENTMODEL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`pacientModel_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::TREATMENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`treatment_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::PREVTALON_EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`prevTalon_event_id`';
        }
        if ($this->isColumnModified(ClientQuotingPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }

        $sql = sprintf(
            'INSERT INTO `Client_Quoting` (%s) VALUES (%s)',
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
                    case '`identifier`':
                        $stmt->bindValue($identifier, $this->identifier, PDO::PARAM_STR);
                        break;
                    case '`quotaTicket`':
                        $stmt->bindValue($identifier, $this->quotaticket, PDO::PARAM_STR);
                        break;
                    case '`quotaType_id`':
                        $stmt->bindValue($identifier, $this->quotatype_id, PDO::PARAM_INT);
                        break;
                    case '`stage`':
                        $stmt->bindValue($identifier, $this->stage, PDO::PARAM_INT);
                        break;
                    case '`directionDate`':
                        $stmt->bindValue($identifier, $this->directiondate, PDO::PARAM_STR);
                        break;
                    case '`freeInput`':
                        $stmt->bindValue($identifier, $this->freeinput, PDO::PARAM_STR);
                        break;
                    case '`org_id`':
                        $stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case '`MKB`':
                        $stmt->bindValue($identifier, $this->mkb, PDO::PARAM_STR);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case '`request`':
                        $stmt->bindValue($identifier, $this->request, PDO::PARAM_INT);
                        break;
                    case '`statment`':
                        $stmt->bindValue($identifier, $this->statment, PDO::PARAM_STR);
                        break;
                    case '`dateRegistration`':
                        $stmt->bindValue($identifier, $this->dateregistration, PDO::PARAM_STR);
                        break;
                    case '`dateEnd`':
                        $stmt->bindValue($identifier, $this->dateend, PDO::PARAM_STR);
                        break;
                    case '`orgStructure_id`':
                        $stmt->bindValue($identifier, $this->orgstructure_id, PDO::PARAM_INT);
                        break;
                    case '`regionCode`':
                        $stmt->bindValue($identifier, $this->regioncode, PDO::PARAM_STR);
                        break;
                    case '`pacientModel_id`':
                        $stmt->bindValue($identifier, $this->pacientmodel_id, PDO::PARAM_INT);
                        break;
                    case '`treatment_id`':
                        $stmt->bindValue($identifier, $this->treatment_id, PDO::PARAM_INT);
                        break;
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`prevTalon_event_id`':
                        $stmt->bindValue($identifier, $this->prevtalon_event_id, PDO::PARAM_INT);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
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


            if (($retval = ClientQuotingPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ClientQuotingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdentifier();
                break;
            case 8:
                return $this->getQuotaticket();
                break;
            case 9:
                return $this->getQuotatypeId();
                break;
            case 10:
                return $this->getStage();
                break;
            case 11:
                return $this->getDirectiondate();
                break;
            case 12:
                return $this->getFreeinput();
                break;
            case 13:
                return $this->getOrgId();
                break;
            case 14:
                return $this->getAmount();
                break;
            case 15:
                return $this->getMkb();
                break;
            case 16:
                return $this->getStatus();
                break;
            case 17:
                return $this->getRequest();
                break;
            case 18:
                return $this->getStatment();
                break;
            case 19:
                return $this->getDateregistration();
                break;
            case 20:
                return $this->getDateend();
                break;
            case 21:
                return $this->getOrgstructureId();
                break;
            case 22:
                return $this->getRegioncode();
                break;
            case 23:
                return $this->getPacientmodelId();
                break;
            case 24:
                return $this->getTreatmentId();
                break;
            case 25:
                return $this->getEventId();
                break;
            case 26:
                return $this->getPrevtalonEventId();
                break;
            case 27:
                return $this->getVersion();
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
        if (isset($alreadyDumpedObjects['ClientQuoting'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ClientQuoting'][$this->getPrimaryKey()] = true;
        $keys = ClientQuotingPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getMasterId(),
            $keys[7] => $this->getIdentifier(),
            $keys[8] => $this->getQuotaticket(),
            $keys[9] => $this->getQuotatypeId(),
            $keys[10] => $this->getStage(),
            $keys[11] => $this->getDirectiondate(),
            $keys[12] => $this->getFreeinput(),
            $keys[13] => $this->getOrgId(),
            $keys[14] => $this->getAmount(),
            $keys[15] => $this->getMkb(),
            $keys[16] => $this->getStatus(),
            $keys[17] => $this->getRequest(),
            $keys[18] => $this->getStatment(),
            $keys[19] => $this->getDateregistration(),
            $keys[20] => $this->getDateend(),
            $keys[21] => $this->getOrgstructureId(),
            $keys[22] => $this->getRegioncode(),
            $keys[23] => $this->getPacientmodelId(),
            $keys[24] => $this->getTreatmentId(),
            $keys[25] => $this->getEventId(),
            $keys[26] => $this->getPrevtalonEventId(),
            $keys[27] => $this->getVersion(),
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
        $pos = ClientQuotingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdentifier($value);
                break;
            case 8:
                $this->setQuotaticket($value);
                break;
            case 9:
                $this->setQuotatypeId($value);
                break;
            case 10:
                $this->setStage($value);
                break;
            case 11:
                $this->setDirectiondate($value);
                break;
            case 12:
                $this->setFreeinput($value);
                break;
            case 13:
                $this->setOrgId($value);
                break;
            case 14:
                $this->setAmount($value);
                break;
            case 15:
                $this->setMkb($value);
                break;
            case 16:
                $this->setStatus($value);
                break;
            case 17:
                $this->setRequest($value);
                break;
            case 18:
                $this->setStatment($value);
                break;
            case 19:
                $this->setDateregistration($value);
                break;
            case 20:
                $this->setDateend($value);
                break;
            case 21:
                $this->setOrgstructureId($value);
                break;
            case 22:
                $this->setRegioncode($value);
                break;
            case 23:
                $this->setPacientmodelId($value);
                break;
            case 24:
                $this->setTreatmentId($value);
                break;
            case 25:
                $this->setEventId($value);
                break;
            case 26:
                $this->setPrevtalonEventId($value);
                break;
            case 27:
                $this->setVersion($value);
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
        $keys = ClientQuotingPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMasterId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIdentifier($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setQuotaticket($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setQuotatypeId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setStage($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setDirectiondate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setFreeinput($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setOrgId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAmount($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setMkb($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setStatus($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setRequest($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setStatment($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setDateregistration($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setDateend($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setOrgstructureId($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setRegioncode($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setPacientmodelId($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setTreatmentId($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setEventId($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setPrevtalonEventId($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setVersion($arr[$keys[27]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientQuotingPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientQuotingPeer::ID)) $criteria->add(ClientQuotingPeer::ID, $this->id);
        if ($this->isColumnModified(ClientQuotingPeer::CREATEDATETIME)) $criteria->add(ClientQuotingPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ClientQuotingPeer::CREATEPERSON_ID)) $criteria->add(ClientQuotingPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ClientQuotingPeer::MODIFYDATETIME)) $criteria->add(ClientQuotingPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ClientQuotingPeer::MODIFYPERSON_ID)) $criteria->add(ClientQuotingPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ClientQuotingPeer::DELETED)) $criteria->add(ClientQuotingPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ClientQuotingPeer::MASTER_ID)) $criteria->add(ClientQuotingPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(ClientQuotingPeer::IDENTIFIER)) $criteria->add(ClientQuotingPeer::IDENTIFIER, $this->identifier);
        if ($this->isColumnModified(ClientQuotingPeer::QUOTATICKET)) $criteria->add(ClientQuotingPeer::QUOTATICKET, $this->quotaticket);
        if ($this->isColumnModified(ClientQuotingPeer::QUOTATYPE_ID)) $criteria->add(ClientQuotingPeer::QUOTATYPE_ID, $this->quotatype_id);
        if ($this->isColumnModified(ClientQuotingPeer::STAGE)) $criteria->add(ClientQuotingPeer::STAGE, $this->stage);
        if ($this->isColumnModified(ClientQuotingPeer::DIRECTIONDATE)) $criteria->add(ClientQuotingPeer::DIRECTIONDATE, $this->directiondate);
        if ($this->isColumnModified(ClientQuotingPeer::FREEINPUT)) $criteria->add(ClientQuotingPeer::FREEINPUT, $this->freeinput);
        if ($this->isColumnModified(ClientQuotingPeer::ORG_ID)) $criteria->add(ClientQuotingPeer::ORG_ID, $this->org_id);
        if ($this->isColumnModified(ClientQuotingPeer::AMOUNT)) $criteria->add(ClientQuotingPeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(ClientQuotingPeer::MKB)) $criteria->add(ClientQuotingPeer::MKB, $this->mkb);
        if ($this->isColumnModified(ClientQuotingPeer::STATUS)) $criteria->add(ClientQuotingPeer::STATUS, $this->status);
        if ($this->isColumnModified(ClientQuotingPeer::REQUEST)) $criteria->add(ClientQuotingPeer::REQUEST, $this->request);
        if ($this->isColumnModified(ClientQuotingPeer::STATMENT)) $criteria->add(ClientQuotingPeer::STATMENT, $this->statment);
        if ($this->isColumnModified(ClientQuotingPeer::DATEREGISTRATION)) $criteria->add(ClientQuotingPeer::DATEREGISTRATION, $this->dateregistration);
        if ($this->isColumnModified(ClientQuotingPeer::DATEEND)) $criteria->add(ClientQuotingPeer::DATEEND, $this->dateend);
        if ($this->isColumnModified(ClientQuotingPeer::ORGSTRUCTURE_ID)) $criteria->add(ClientQuotingPeer::ORGSTRUCTURE_ID, $this->orgstructure_id);
        if ($this->isColumnModified(ClientQuotingPeer::REGIONCODE)) $criteria->add(ClientQuotingPeer::REGIONCODE, $this->regioncode);
        if ($this->isColumnModified(ClientQuotingPeer::PACIENTMODEL_ID)) $criteria->add(ClientQuotingPeer::PACIENTMODEL_ID, $this->pacientmodel_id);
        if ($this->isColumnModified(ClientQuotingPeer::TREATMENT_ID)) $criteria->add(ClientQuotingPeer::TREATMENT_ID, $this->treatment_id);
        if ($this->isColumnModified(ClientQuotingPeer::EVENT_ID)) $criteria->add(ClientQuotingPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(ClientQuotingPeer::PREVTALON_EVENT_ID)) $criteria->add(ClientQuotingPeer::PREVTALON_EVENT_ID, $this->prevtalon_event_id);
        if ($this->isColumnModified(ClientQuotingPeer::VERSION)) $criteria->add(ClientQuotingPeer::VERSION, $this->version);

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
        $criteria = new Criteria(ClientQuotingPeer::DATABASE_NAME);
        $criteria->add(ClientQuotingPeer::ID, $this->id);

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
     * @param object $copyObj An object of ClientQuoting (or compatible) type.
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
        $copyObj->setIdentifier($this->getIdentifier());
        $copyObj->setQuotaticket($this->getQuotaticket());
        $copyObj->setQuotatypeId($this->getQuotatypeId());
        $copyObj->setStage($this->getStage());
        $copyObj->setDirectiondate($this->getDirectiondate());
        $copyObj->setFreeinput($this->getFreeinput());
        $copyObj->setOrgId($this->getOrgId());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setMkb($this->getMkb());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setRequest($this->getRequest());
        $copyObj->setStatment($this->getStatment());
        $copyObj->setDateregistration($this->getDateregistration());
        $copyObj->setDateend($this->getDateend());
        $copyObj->setOrgstructureId($this->getOrgstructureId());
        $copyObj->setRegioncode($this->getRegioncode());
        $copyObj->setPacientmodelId($this->getPacientmodelId());
        $copyObj->setTreatmentId($this->getTreatmentId());
        $copyObj->setEventId($this->getEventId());
        $copyObj->setPrevtalonEventId($this->getPrevtalonEventId());
        $copyObj->setVersion($this->getVersion());
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
     * @return ClientQuoting Clone of current object.
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
     * @return ClientQuotingPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientQuotingPeer();
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
        $this->master_id = null;
        $this->identifier = null;
        $this->quotaticket = null;
        $this->quotatype_id = null;
        $this->stage = null;
        $this->directiondate = null;
        $this->freeinput = null;
        $this->org_id = null;
        $this->amount = null;
        $this->mkb = null;
        $this->status = null;
        $this->request = null;
        $this->statment = null;
        $this->dateregistration = null;
        $this->dateend = null;
        $this->orgstructure_id = null;
        $this->regioncode = null;
        $this->pacientmodel_id = null;
        $this->treatment_id = null;
        $this->event_id = null;
        $this->prevtalon_event_id = null;
        $this->version = null;
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
        return (string) $this->exportTo(ClientQuotingPeer::DEFAULT_STRING_FORMAT);
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
