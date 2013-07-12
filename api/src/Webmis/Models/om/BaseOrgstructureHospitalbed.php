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
use Webmis\Models\ActionpropertyHospitalbed;
use Webmis\Models\ActionpropertyHospitalbedQuery;
use Webmis\Models\OrgstructureHospitalbed;
use Webmis\Models\OrgstructureHospitalbedPeer;
use Webmis\Models\OrgstructureHospitalbedQuery;

/**
 * Base class that represents a row from the 'OrgStructure_HospitalBed' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureHospitalbed extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\OrgstructureHospitalbedPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        OrgstructureHospitalbedPeer
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
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the code field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $code;

    /**
     * The value for the name field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $name;

    /**
     * The value for the ispermanent field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $ispermanent;

    /**
     * The value for the type_id field.
     * @var        int
     */
    protected $type_id;

    /**
     * The value for the profile_id field.
     * @var        int
     */
    protected $profile_id;

    /**
     * The value for the relief field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $relief;

    /**
     * The value for the schedule_id field.
     * @var        int
     */
    protected $schedule_id;

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
     * The value for the sex field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $sex;

    /**
     * The value for the age field.
     * @var        string
     */
    protected $age;

    /**
     * The value for the age_bu field.
     * @var        int
     */
    protected $age_bu;

    /**
     * The value for the age_bc field.
     * @var        int
     */
    protected $age_bc;

    /**
     * The value for the age_eu field.
     * @var        int
     */
    protected $age_eu;

    /**
     * The value for the age_ec field.
     * @var        int
     */
    protected $age_ec;

    /**
     * The value for the involution field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $involution;

    /**
     * The value for the begdateinvolute field.
     * @var        string
     */
    protected $begdateinvolute;

    /**
     * The value for the enddateinvolute field.
     * @var        string
     */
    protected $enddateinvolute;

    /**
     * @var        PropelObjectCollection|ActionpropertyHospitalbed[] Collection to store aggregation of ActionpropertyHospitalbed objects.
     */
    protected $collActionpropertyHospitalbeds;
    protected $collActionpropertyHospitalbedsPartial;

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
    protected $actionpropertyHospitalbedsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->idx = 0;
        $this->code = '';
        $this->name = '';
        $this->ispermanent = false;
        $this->relief = 0;
        $this->sex = 0;
        $this->involution = false;
    }

    /**
     * Initializes internal state of BaseOrgstructureHospitalbed object.
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
     * Get the [master_id] column value.
     *
     * @return int
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Get the [idx] column value.
     *
     * @return int
     */
    public function getIdx()
    {
        return $this->idx;
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
     * Get the [ispermanent] column value.
     *
     * @return boolean
     */
    public function getIspermanent()
    {
        return $this->ispermanent;
    }

    /**
     * Get the [type_id] column value.
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Get the [profile_id] column value.
     *
     * @return int
     */
    public function getProfileId()
    {
        return $this->profile_id;
    }

    /**
     * Get the [relief] column value.
     *
     * @return int
     */
    public function getRelief()
    {
        return $this->relief;
    }

    /**
     * Get the [schedule_id] column value.
     *
     * @return int
     */
    public function getScheduleId()
    {
        return $this->schedule_id;
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
     * Get the [sex] column value.
     *
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Get the [age] column value.
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [age_bu] column value.
     *
     * @return int
     */
    public function getAgeBu()
    {
        return $this->age_bu;
    }

    /**
     * Get the [age_bc] column value.
     *
     * @return int
     */
    public function getAgeBc()
    {
        return $this->age_bc;
    }

    /**
     * Get the [age_eu] column value.
     *
     * @return int
     */
    public function getAgeEu()
    {
        return $this->age_eu;
    }

    /**
     * Get the [age_ec] column value.
     *
     * @return int
     */
    public function getAgeEc()
    {
        return $this->age_ec;
    }

    /**
     * Get the [involution] column value.
     *
     * @return boolean
     */
    public function getInvolution()
    {
        return $this->involution;
    }

    /**
     * Get the [optionally formatted] temporal [begdateinvolute] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBegdateinvolute($format = '%x')
    {
        if ($this->begdateinvolute === null) {
            return null;
        }

        if ($this->begdateinvolute === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->begdateinvolute);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->begdateinvolute, true), $x);
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
     * Get the [optionally formatted] temporal [enddateinvolute] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnddateinvolute($format = '%x')
    {
        if ($this->enddateinvolute === null) {
            return null;
        }

        if ($this->enddateinvolute === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->enddateinvolute);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->enddateinvolute, true), $x);
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [ispermanent] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setIspermanent($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ispermanent !== $v) {
            $this->ispermanent = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::ISPERMANENT;
        }


        return $this;
    } // setIspermanent()

    /**
     * Set the value of [type_id] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type_id !== $v) {
            $this->type_id = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::TYPE_ID;
        }


        return $this;
    } // setTypeId()

    /**
     * Set the value of [profile_id] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setProfileId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->profile_id !== $v) {
            $this->profile_id = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::PROFILE_ID;
        }


        return $this;
    } // setProfileId()

    /**
     * Set the value of [relief] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setRelief($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->relief !== $v) {
            $this->relief = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::RELIEF;
        }


        return $this;
    } // setRelief()

    /**
     * Set the value of [schedule_id] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setScheduleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->schedule_id !== $v) {
            $this->schedule_id = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::SCHEDULE_ID;
        }


        return $this;
    } // setScheduleId()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = OrgstructureHospitalbedPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = OrgstructureHospitalbedPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Sets the value of the [involution] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setInvolution($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->involution !== $v) {
            $this->involution = $v;
            $this->modifiedColumns[] = OrgstructureHospitalbedPeer::INVOLUTION;
        }


        return $this;
    } // setInvolution()

    /**
     * Sets the value of [begdateinvolute] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setBegdateinvolute($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdateinvolute !== null || $dt !== null) {
            $currentDateAsString = ($this->begdateinvolute !== null && $tmpDt = new DateTime($this->begdateinvolute)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdateinvolute = $newDateAsString;
                $this->modifiedColumns[] = OrgstructureHospitalbedPeer::BEGDATEINVOLUTE;
            }
        } // if either are not null


        return $this;
    } // setBegdateinvolute()

    /**
     * Sets the value of [enddateinvolute] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setEnddateinvolute($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddateinvolute !== null || $dt !== null) {
            $currentDateAsString = ($this->enddateinvolute !== null && $tmpDt = new DateTime($this->enddateinvolute)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddateinvolute = $newDateAsString;
                $this->modifiedColumns[] = OrgstructureHospitalbedPeer::ENDDATEINVOLUTE;
            }
        } // if either are not null


        return $this;
    } // setEnddateinvolute()

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
            if ($this->idx !== 0) {
                return false;
            }

            if ($this->code !== '') {
                return false;
            }

            if ($this->name !== '') {
                return false;
            }

            if ($this->ispermanent !== false) {
                return false;
            }

            if ($this->relief !== 0) {
                return false;
            }

            if ($this->sex !== 0) {
                return false;
            }

            if ($this->involution !== false) {
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
            $this->master_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idx = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->code = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ispermanent = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->type_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->profile_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->relief = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->schedule_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->begdate = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->enddate = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->sex = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->age = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->age_bu = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->age_bc = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->age_eu = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->age_ec = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->involution = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
            $this->begdateinvolute = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->enddateinvolute = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 21; // 21 = OrgstructureHospitalbedPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating OrgstructureHospitalbed object", $e);
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
            $con = Propel::getConnection(OrgstructureHospitalbedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = OrgstructureHospitalbedPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collActionpropertyHospitalbeds = null;

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
            $con = Propel::getConnection(OrgstructureHospitalbedPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = OrgstructureHospitalbedQuery::create()
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
            $con = Propel::getConnection(OrgstructureHospitalbedPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                OrgstructureHospitalbedPeer::addInstanceToPool($this);
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

            if ($this->actionpropertyHospitalbedsScheduledForDeletion !== null) {
                if (!$this->actionpropertyHospitalbedsScheduledForDeletion->isEmpty()) {
                    foreach ($this->actionpropertyHospitalbedsScheduledForDeletion as $actionpropertyHospitalbed) {
                        // need to save related object because we set the relation to null
                        $actionpropertyHospitalbed->save($con);
                    }
                    $this->actionpropertyHospitalbedsScheduledForDeletion = null;
                }
            }

            if ($this->collActionpropertyHospitalbeds !== null) {
                foreach ($this->collActionpropertyHospitalbeds as $referrerFK) {
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

        $this->modifiedColumns[] = OrgstructureHospitalbedPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrgstructureHospitalbedPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ISPERMANENT)) {
            $modifiedColumns[':p' . $index++]  = '`isPermanent`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`type_id`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::PROFILE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`profile_id`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::RELIEF)) {
            $modifiedColumns[':p' . $index++]  = '`relief`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::SCHEDULE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`schedule_id`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::INVOLUTION)) {
            $modifiedColumns[':p' . $index++]  = '`involution`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::BEGDATEINVOLUTE)) {
            $modifiedColumns[':p' . $index++]  = '`begDateInvolute`';
        }
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ENDDATEINVOLUTE)) {
            $modifiedColumns[':p' . $index++]  = '`endDateInvolute`';
        }

        $sql = sprintf(
            'INSERT INTO `OrgStructure_HospitalBed` (%s) VALUES (%s)',
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
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`isPermanent`':
                        $stmt->bindValue($identifier, (int) $this->ispermanent, PDO::PARAM_INT);
                        break;
                    case '`type_id`':
                        $stmt->bindValue($identifier, $this->type_id, PDO::PARAM_INT);
                        break;
                    case '`profile_id`':
                        $stmt->bindValue($identifier, $this->profile_id, PDO::PARAM_INT);
                        break;
                    case '`relief`':
                        $stmt->bindValue($identifier, $this->relief, PDO::PARAM_INT);
                        break;
                    case '`schedule_id`':
                        $stmt->bindValue($identifier, $this->schedule_id, PDO::PARAM_INT);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_INT);
                        break;
                    case '`age`':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_STR);
                        break;
                    case '`age_bu`':
                        $stmt->bindValue($identifier, $this->age_bu, PDO::PARAM_INT);
                        break;
                    case '`age_bc`':
                        $stmt->bindValue($identifier, $this->age_bc, PDO::PARAM_INT);
                        break;
                    case '`age_eu`':
                        $stmt->bindValue($identifier, $this->age_eu, PDO::PARAM_INT);
                        break;
                    case '`age_ec`':
                        $stmt->bindValue($identifier, $this->age_ec, PDO::PARAM_INT);
                        break;
                    case '`involution`':
                        $stmt->bindValue($identifier, (int) $this->involution, PDO::PARAM_INT);
                        break;
                    case '`begDateInvolute`':
                        $stmt->bindValue($identifier, $this->begdateinvolute, PDO::PARAM_STR);
                        break;
                    case '`endDateInvolute`':
                        $stmt->bindValue($identifier, $this->enddateinvolute, PDO::PARAM_STR);
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


            if (($retval = OrgstructureHospitalbedPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActionpropertyHospitalbeds !== null) {
                    foreach ($this->collActionpropertyHospitalbeds as $referrerFK) {
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
        $pos = OrgstructureHospitalbedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdx();
                break;
            case 3:
                return $this->getCode();
                break;
            case 4:
                return $this->getName();
                break;
            case 5:
                return $this->getIspermanent();
                break;
            case 6:
                return $this->getTypeId();
                break;
            case 7:
                return $this->getProfileId();
                break;
            case 8:
                return $this->getRelief();
                break;
            case 9:
                return $this->getScheduleId();
                break;
            case 10:
                return $this->getBegdate();
                break;
            case 11:
                return $this->getEnddate();
                break;
            case 12:
                return $this->getSex();
                break;
            case 13:
                return $this->getAge();
                break;
            case 14:
                return $this->getAgeBu();
                break;
            case 15:
                return $this->getAgeBc();
                break;
            case 16:
                return $this->getAgeEu();
                break;
            case 17:
                return $this->getAgeEc();
                break;
            case 18:
                return $this->getInvolution();
                break;
            case 19:
                return $this->getBegdateinvolute();
                break;
            case 20:
                return $this->getEnddateinvolute();
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
        if (isset($alreadyDumpedObjects['OrgstructureHospitalbed'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OrgstructureHospitalbed'][$this->getPrimaryKey()] = true;
        $keys = OrgstructureHospitalbedPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMasterId(),
            $keys[2] => $this->getIdx(),
            $keys[3] => $this->getCode(),
            $keys[4] => $this->getName(),
            $keys[5] => $this->getIspermanent(),
            $keys[6] => $this->getTypeId(),
            $keys[7] => $this->getProfileId(),
            $keys[8] => $this->getRelief(),
            $keys[9] => $this->getScheduleId(),
            $keys[10] => $this->getBegdate(),
            $keys[11] => $this->getEnddate(),
            $keys[12] => $this->getSex(),
            $keys[13] => $this->getAge(),
            $keys[14] => $this->getAgeBu(),
            $keys[15] => $this->getAgeBc(),
            $keys[16] => $this->getAgeEu(),
            $keys[17] => $this->getAgeEc(),
            $keys[18] => $this->getInvolution(),
            $keys[19] => $this->getBegdateinvolute(),
            $keys[20] => $this->getEnddateinvolute(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collActionpropertyHospitalbeds) {
                $result['ActionpropertyHospitalbeds'] = $this->collActionpropertyHospitalbeds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = OrgstructureHospitalbedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdx($value);
                break;
            case 3:
                $this->setCode($value);
                break;
            case 4:
                $this->setName($value);
                break;
            case 5:
                $this->setIspermanent($value);
                break;
            case 6:
                $this->setTypeId($value);
                break;
            case 7:
                $this->setProfileId($value);
                break;
            case 8:
                $this->setRelief($value);
                break;
            case 9:
                $this->setScheduleId($value);
                break;
            case 10:
                $this->setBegdate($value);
                break;
            case 11:
                $this->setEnddate($value);
                break;
            case 12:
                $this->setSex($value);
                break;
            case 13:
                $this->setAge($value);
                break;
            case 14:
                $this->setAgeBu($value);
                break;
            case 15:
                $this->setAgeBc($value);
                break;
            case 16:
                $this->setAgeEu($value);
                break;
            case 17:
                $this->setAgeEc($value);
                break;
            case 18:
                $this->setInvolution($value);
                break;
            case 19:
                $this->setBegdateinvolute($value);
                break;
            case 20:
                $this->setEnddateinvolute($value);
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
        $keys = OrgstructureHospitalbedPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMasterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdx($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCode($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIspermanent($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTypeId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setProfileId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRelief($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setScheduleId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setBegdate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setEnddate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSex($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAge($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAgeBu($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAgeBc($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAgeEu($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setAgeEc($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setInvolution($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setBegdateinvolute($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setEnddateinvolute($arr[$keys[20]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OrgstructureHospitalbedPeer::DATABASE_NAME);

        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ID)) $criteria->add(OrgstructureHospitalbedPeer::ID, $this->id);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::MASTER_ID)) $criteria->add(OrgstructureHospitalbedPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::IDX)) $criteria->add(OrgstructureHospitalbedPeer::IDX, $this->idx);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::CODE)) $criteria->add(OrgstructureHospitalbedPeer::CODE, $this->code);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::NAME)) $criteria->add(OrgstructureHospitalbedPeer::NAME, $this->name);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ISPERMANENT)) $criteria->add(OrgstructureHospitalbedPeer::ISPERMANENT, $this->ispermanent);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::TYPE_ID)) $criteria->add(OrgstructureHospitalbedPeer::TYPE_ID, $this->type_id);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::PROFILE_ID)) $criteria->add(OrgstructureHospitalbedPeer::PROFILE_ID, $this->profile_id);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::RELIEF)) $criteria->add(OrgstructureHospitalbedPeer::RELIEF, $this->relief);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::SCHEDULE_ID)) $criteria->add(OrgstructureHospitalbedPeer::SCHEDULE_ID, $this->schedule_id);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::BEGDATE)) $criteria->add(OrgstructureHospitalbedPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ENDDATE)) $criteria->add(OrgstructureHospitalbedPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::SEX)) $criteria->add(OrgstructureHospitalbedPeer::SEX, $this->sex);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE)) $criteria->add(OrgstructureHospitalbedPeer::AGE, $this->age);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_BU)) $criteria->add(OrgstructureHospitalbedPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_BC)) $criteria->add(OrgstructureHospitalbedPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_EU)) $criteria->add(OrgstructureHospitalbedPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::AGE_EC)) $criteria->add(OrgstructureHospitalbedPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::INVOLUTION)) $criteria->add(OrgstructureHospitalbedPeer::INVOLUTION, $this->involution);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::BEGDATEINVOLUTE)) $criteria->add(OrgstructureHospitalbedPeer::BEGDATEINVOLUTE, $this->begdateinvolute);
        if ($this->isColumnModified(OrgstructureHospitalbedPeer::ENDDATEINVOLUTE)) $criteria->add(OrgstructureHospitalbedPeer::ENDDATEINVOLUTE, $this->enddateinvolute);

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
        $criteria = new Criteria(OrgstructureHospitalbedPeer::DATABASE_NAME);
        $criteria->add(OrgstructureHospitalbedPeer::ID, $this->id);

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
     * @param object $copyObj An object of OrgstructureHospitalbed (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setIspermanent($this->getIspermanent());
        $copyObj->setTypeId($this->getTypeId());
        $copyObj->setProfileId($this->getProfileId());
        $copyObj->setRelief($this->getRelief());
        $copyObj->setScheduleId($this->getScheduleId());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setInvolution($this->getInvolution());
        $copyObj->setBegdateinvolute($this->getBegdateinvolute());
        $copyObj->setEnddateinvolute($this->getEnddateinvolute());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActionpropertyHospitalbeds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionpropertyHospitalbed($relObj->copy($deepCopy));
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
     * @return OrgstructureHospitalbed Clone of current object.
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
     * @return OrgstructureHospitalbedPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new OrgstructureHospitalbedPeer();
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
        if ('ActionpropertyHospitalbed' == $relationName) {
            $this->initActionpropertyHospitalbeds();
        }
    }

    /**
     * Clears out the collActionpropertyHospitalbeds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     * @see        addActionpropertyHospitalbeds()
     */
    public function clearActionpropertyHospitalbeds()
    {
        $this->collActionpropertyHospitalbeds = null; // important to set this to null since that means it is uninitialized
        $this->collActionpropertyHospitalbedsPartial = null;

        return $this;
    }

    /**
     * reset is the collActionpropertyHospitalbeds collection loaded partially
     *
     * @return void
     */
    public function resetPartialActionpropertyHospitalbeds($v = true)
    {
        $this->collActionpropertyHospitalbedsPartial = $v;
    }

    /**
     * Initializes the collActionpropertyHospitalbeds collection.
     *
     * By default this just sets the collActionpropertyHospitalbeds collection to an empty array (like clearcollActionpropertyHospitalbeds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActionpropertyHospitalbeds($overrideExisting = true)
    {
        if (null !== $this->collActionpropertyHospitalbeds && !$overrideExisting) {
            return;
        }
        $this->collActionpropertyHospitalbeds = new PropelObjectCollection();
        $this->collActionpropertyHospitalbeds->setModel('ActionpropertyHospitalbed');
    }

    /**
     * Gets an array of ActionpropertyHospitalbed objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this OrgstructureHospitalbed is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActionpropertyHospitalbed[] List of ActionpropertyHospitalbed objects
     * @throws PropelException
     */
    public function getActionpropertyHospitalbeds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyHospitalbedsPartial && !$this->isNew();
        if (null === $this->collActionpropertyHospitalbeds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyHospitalbeds) {
                // return empty collection
                $this->initActionpropertyHospitalbeds();
            } else {
                $collActionpropertyHospitalbeds = ActionpropertyHospitalbedQuery::create(null, $criteria)
                    ->filterByOrgstructureHospitalbed($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionpropertyHospitalbedsPartial && count($collActionpropertyHospitalbeds)) {
                      $this->initActionpropertyHospitalbeds(false);

                      foreach($collActionpropertyHospitalbeds as $obj) {
                        if (false == $this->collActionpropertyHospitalbeds->contains($obj)) {
                          $this->collActionpropertyHospitalbeds->append($obj);
                        }
                      }

                      $this->collActionpropertyHospitalbedsPartial = true;
                    }

                    $collActionpropertyHospitalbeds->getInternalIterator()->rewind();
                    return $collActionpropertyHospitalbeds;
                }

                if($partial && $this->collActionpropertyHospitalbeds) {
                    foreach($this->collActionpropertyHospitalbeds as $obj) {
                        if($obj->isNew()) {
                            $collActionpropertyHospitalbeds[] = $obj;
                        }
                    }
                }

                $this->collActionpropertyHospitalbeds = $collActionpropertyHospitalbeds;
                $this->collActionpropertyHospitalbedsPartial = false;
            }
        }

        return $this->collActionpropertyHospitalbeds;
    }

    /**
     * Sets a collection of ActionpropertyHospitalbed objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actionpropertyHospitalbeds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function setActionpropertyHospitalbeds(PropelCollection $actionpropertyHospitalbeds, PropelPDO $con = null)
    {
        $actionpropertyHospitalbedsToDelete = $this->getActionpropertyHospitalbeds(new Criteria(), $con)->diff($actionpropertyHospitalbeds);

        $this->actionpropertyHospitalbedsScheduledForDeletion = unserialize(serialize($actionpropertyHospitalbedsToDelete));

        foreach ($actionpropertyHospitalbedsToDelete as $actionpropertyHospitalbedRemoved) {
            $actionpropertyHospitalbedRemoved->setOrgstructureHospitalbed(null);
        }

        $this->collActionpropertyHospitalbeds = null;
        foreach ($actionpropertyHospitalbeds as $actionpropertyHospitalbed) {
            $this->addActionpropertyHospitalbed($actionpropertyHospitalbed);
        }

        $this->collActionpropertyHospitalbeds = $actionpropertyHospitalbeds;
        $this->collActionpropertyHospitalbedsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActionpropertyHospitalbed objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActionpropertyHospitalbed objects.
     * @throws PropelException
     */
    public function countActionpropertyHospitalbeds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyHospitalbedsPartial && !$this->isNew();
        if (null === $this->collActionpropertyHospitalbeds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyHospitalbeds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActionpropertyHospitalbeds());
            }
            $query = ActionpropertyHospitalbedQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureHospitalbed($this)
                ->count($con);
        }

        return count($this->collActionpropertyHospitalbeds);
    }

    /**
     * Method called to associate a ActionpropertyHospitalbed object to this object
     * through the ActionpropertyHospitalbed foreign key attribute.
     *
     * @param    ActionpropertyHospitalbed $l ActionpropertyHospitalbed
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function addActionpropertyHospitalbed(ActionpropertyHospitalbed $l)
    {
        if ($this->collActionpropertyHospitalbeds === null) {
            $this->initActionpropertyHospitalbeds();
            $this->collActionpropertyHospitalbedsPartial = true;
        }
        if (!in_array($l, $this->collActionpropertyHospitalbeds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActionpropertyHospitalbed($l);
        }

        return $this;
    }

    /**
     * @param	ActionpropertyHospitalbed $actionpropertyHospitalbed The actionpropertyHospitalbed object to add.
     */
    protected function doAddActionpropertyHospitalbed($actionpropertyHospitalbed)
    {
        $this->collActionpropertyHospitalbeds[]= $actionpropertyHospitalbed;
        $actionpropertyHospitalbed->setOrgstructureHospitalbed($this);
    }

    /**
     * @param	ActionpropertyHospitalbed $actionpropertyHospitalbed The actionpropertyHospitalbed object to remove.
     * @return OrgstructureHospitalbed The current object (for fluent API support)
     */
    public function removeActionpropertyHospitalbed($actionpropertyHospitalbed)
    {
        if ($this->getActionpropertyHospitalbeds()->contains($actionpropertyHospitalbed)) {
            $this->collActionpropertyHospitalbeds->remove($this->collActionpropertyHospitalbeds->search($actionpropertyHospitalbed));
            if (null === $this->actionpropertyHospitalbedsScheduledForDeletion) {
                $this->actionpropertyHospitalbedsScheduledForDeletion = clone $this->collActionpropertyHospitalbeds;
                $this->actionpropertyHospitalbedsScheduledForDeletion->clear();
            }
            $this->actionpropertyHospitalbedsScheduledForDeletion[]= $actionpropertyHospitalbed;
            $actionpropertyHospitalbed->setOrgstructureHospitalbed(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this OrgstructureHospitalbed is new, it will return
     * an empty collection; or if this OrgstructureHospitalbed has previously
     * been saved, it will retrieve related ActionpropertyHospitalbeds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in OrgstructureHospitalbed.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActionpropertyHospitalbed[] List of ActionpropertyHospitalbed objects
     */
    public function getActionpropertyHospitalbedsJoinActionproperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionpropertyHospitalbedQuery::create(null, $criteria);
        $query->joinWith('Actionproperty', $join_behavior);

        return $this->getActionpropertyHospitalbeds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->master_id = null;
        $this->idx = null;
        $this->code = null;
        $this->name = null;
        $this->ispermanent = null;
        $this->type_id = null;
        $this->profile_id = null;
        $this->relief = null;
        $this->schedule_id = null;
        $this->begdate = null;
        $this->enddate = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->involution = null;
        $this->begdateinvolute = null;
        $this->enddateinvolute = null;
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
            if ($this->collActionpropertyHospitalbeds) {
                foreach ($this->collActionpropertyHospitalbeds as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActionpropertyHospitalbeds instanceof PropelCollection) {
            $this->collActionpropertyHospitalbeds->clearIterator();
        }
        $this->collActionpropertyHospitalbeds = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OrgstructureHospitalbedPeer::DEFAULT_STRING_FORMAT);
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
