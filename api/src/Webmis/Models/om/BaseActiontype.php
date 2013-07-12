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
use Webmis\Models\Actiontype;
use Webmis\Models\ActiontypeEventtypeCheck;
use Webmis\Models\ActiontypeEventtypeCheckQuery;
use Webmis\Models\ActiontypePeer;
use Webmis\Models\ActiontypeQuery;
use Webmis\Models\ActiontypeTissuetype;
use Webmis\Models\ActiontypeTissuetypeQuery;
use Webmis\Models\Blankactions;
use Webmis\Models\BlankactionsQuery;
use Webmis\Models\Person;
use Webmis\Models\PersonQuery;
use Webmis\Models\Rbblankactions;
use Webmis\Models\RbblankactionsQuery;
use Webmis\Models\Rbjobtype;
use Webmis\Models\RbjobtypeQuery;
use Webmis\Models\Rbtesttubetype;
use Webmis\Models\RbtesttubetypeQuery;

/**
 * Base class that represents a row from the 'ActionType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ActiontypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActiontypePeer
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
     * The value for the class field.
     * @var        boolean
     */
    protected $class;

    /**
     * The value for the group_id field.
     * @var        int
     */
    protected $group_id;

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
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the flatcode field.
     * @var        string
     */
    protected $flatcode;

    /**
     * The value for the sex field.
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
     * The value for the office field.
     * @var        string
     */
    protected $office;

    /**
     * The value for the showinform field.
     * @var        boolean
     */
    protected $showinform;

    /**
     * The value for the gentimetable field.
     * @var        boolean
     */
    protected $gentimetable;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

    /**
     * The value for the quotatype_id field.
     * @var        int
     */
    protected $quotatype_id;

    /**
     * The value for the context field.
     * @var        string
     */
    protected $context;

    /**
     * The value for the amount field.
     * Note: this column has a database default value of: 1
     * @var        double
     */
    protected $amount;

    /**
     * The value for the amountevaluation field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $amountevaluation;

    /**
     * The value for the defaultstatus field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $defaultstatus;

    /**
     * The value for the defaultdirectiondate field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $defaultdirectiondate;

    /**
     * The value for the defaultplannedenddate field.
     * @var        boolean
     */
    protected $defaultplannedenddate;

    /**
     * The value for the defaultenddate field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $defaultenddate;

    /**
     * The value for the defaultexecperson_id field.
     * @var        int
     */
    protected $defaultexecperson_id;

    /**
     * The value for the defaultpersoninevent field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $defaultpersoninevent;

    /**
     * The value for the defaultpersonineditor field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $defaultpersonineditor;

    /**
     * The value for the maxoccursinevent field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $maxoccursinevent;

    /**
     * The value for the showtime field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $showtime;

    /**
     * The value for the ismes field.
     * @var        int
     */
    protected $ismes;

    /**
     * The value for the nomenclativeservice_id field.
     * @var        int
     */
    protected $nomenclativeservice_id;

    /**
     * The value for the ispreferable field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $ispreferable;

    /**
     * The value for the prescribedtype_id field.
     * @var        int
     */
    protected $prescribedtype_id;

    /**
     * The value for the shedule_id field.
     * @var        int
     */
    protected $shedule_id;

    /**
     * The value for the isrequiredcoordination field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isrequiredcoordination;

    /**
     * The value for the isrequiredtissue field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isrequiredtissue;

    /**
     * The value for the testtubetype_id field.
     * @var        int
     */
    protected $testtubetype_id;

    /**
     * The value for the jobtype_id field.
     * @var        int
     */
    protected $jobtype_id;

    /**
     * The value for the mnem field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mnem;

    /**
     * @var        Person
     */
    protected $aPerson;

    /**
     * @var        Rbjobtype
     */
    protected $aRbjobtype;

    /**
     * @var        Rbtesttubetype
     */
    protected $aRbtesttubetype;

    /**
     * @var        PropelObjectCollection|ActiontypeEventtypeCheck[] Collection to store aggregation of ActiontypeEventtypeCheck objects.
     */
    protected $collActiontypeEventtypeChecksRelatedByActiontypeId;
    protected $collActiontypeEventtypeChecksRelatedByActiontypeIdPartial;

    /**
     * @var        PropelObjectCollection|ActiontypeEventtypeCheck[] Collection to store aggregation of ActiontypeEventtypeCheck objects.
     */
    protected $collActiontypeEventtypeChecksRelatedByRelatedActiontypeId;
    protected $collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial;

    /**
     * @var        PropelObjectCollection|ActiontypeTissuetype[] Collection to store aggregation of ActiontypeTissuetype objects.
     */
    protected $collActiontypeTissuetypes;
    protected $collActiontypeTissuetypesPartial;

    /**
     * @var        PropelObjectCollection|Blankactions[] Collection to store aggregation of Blankactions objects.
     */
    protected $collBlankactionss;
    protected $collBlankactionssPartial;

    /**
     * @var        PropelObjectCollection|Rbblankactions[] Collection to store aggregation of Rbblankactions objects.
     */
    protected $collRbblankactionss;
    protected $collRbblankactionssPartial;

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
    protected $actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $actiontypeTissuetypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbblankactionssScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->amount = 1;
        $this->amountevaluation = 0;
        $this->defaultstatus = 0;
        $this->defaultdirectiondate = 0;
        $this->defaultenddate = 0;
        $this->defaultpersoninevent = 0;
        $this->defaultpersonineditor = 0;
        $this->maxoccursinevent = 0;
        $this->showtime = false;
        $this->ispreferable = true;
        $this->isrequiredcoordination = false;
        $this->isrequiredtissue = false;
        $this->mnem = '';
    }

    /**
     * Initializes internal state of BaseActiontype object.
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
     * Get the [class] column value.
     *
     * @return boolean
     */
    public function getClass()
    {
        return $this->class;
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
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [flatcode] column value.
     *
     * @return string
     */
    public function getFlatcode()
    {
        return $this->flatcode;
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
     * Get the [office] column value.
     *
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * Get the [showinform] column value.
     *
     * @return boolean
     */
    public function getShowinform()
    {
        return $this->showinform;
    }

    /**
     * Get the [gentimetable] column value.
     *
     * @return boolean
     */
    public function getGentimetable()
    {
        return $this->gentimetable;
    }

    /**
     * Get the [service_id] column value.
     *
     * @return int
     */
    public function getServiceId()
    {
        return $this->service_id;
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
     * Get the [context] column value.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Get the [amount] column value.
     *
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [amountevaluation] column value.
     *
     * @return int
     */
    public function getAmountevaluation()
    {
        return $this->amountevaluation;
    }

    /**
     * Get the [defaultstatus] column value.
     *
     * @return int
     */
    public function getDefaultstatus()
    {
        return $this->defaultstatus;
    }

    /**
     * Get the [defaultdirectiondate] column value.
     *
     * @return int
     */
    public function getDefaultdirectiondate()
    {
        return $this->defaultdirectiondate;
    }

    /**
     * Get the [defaultplannedenddate] column value.
     *
     * @return boolean
     */
    public function getDefaultplannedenddate()
    {
        return $this->defaultplannedenddate;
    }

    /**
     * Get the [defaultenddate] column value.
     *
     * @return int
     */
    public function getDefaultenddate()
    {
        return $this->defaultenddate;
    }

    /**
     * Get the [defaultexecperson_id] column value.
     *
     * @return int
     */
    public function getDefaultexecpersonId()
    {
        return $this->defaultexecperson_id;
    }

    /**
     * Get the [defaultpersoninevent] column value.
     *
     * @return int
     */
    public function getDefaultpersoninevent()
    {
        return $this->defaultpersoninevent;
    }

    /**
     * Get the [defaultpersonineditor] column value.
     *
     * @return int
     */
    public function getDefaultpersonineditor()
    {
        return $this->defaultpersonineditor;
    }

    /**
     * Get the [maxoccursinevent] column value.
     *
     * @return int
     */
    public function getMaxoccursinevent()
    {
        return $this->maxoccursinevent;
    }

    /**
     * Get the [showtime] column value.
     *
     * @return boolean
     */
    public function getShowtime()
    {
        return $this->showtime;
    }

    /**
     * Get the [ismes] column value.
     *
     * @return int
     */
    public function getIsmes()
    {
        return $this->ismes;
    }

    /**
     * Get the [nomenclativeservice_id] column value.
     *
     * @return int
     */
    public function getNomenclativeserviceId()
    {
        return $this->nomenclativeservice_id;
    }

    /**
     * Get the [ispreferable] column value.
     *
     * @return boolean
     */
    public function getIspreferable()
    {
        return $this->ispreferable;
    }

    /**
     * Get the [prescribedtype_id] column value.
     *
     * @return int
     */
    public function getPrescribedtypeId()
    {
        return $this->prescribedtype_id;
    }

    /**
     * Get the [shedule_id] column value.
     *
     * @return int
     */
    public function getSheduleId()
    {
        return $this->shedule_id;
    }

    /**
     * Get the [isrequiredcoordination] column value.
     *
     * @return boolean
     */
    public function getIsrequiredcoordination()
    {
        return $this->isrequiredcoordination;
    }

    /**
     * Get the [isrequiredtissue] column value.
     *
     * @return boolean
     */
    public function getIsrequiredtissue()
    {
        return $this->isrequiredtissue;
    }

    /**
     * Get the [testtubetype_id] column value.
     *
     * @return int
     */
    public function getTesttubetypeId()
    {
        return $this->testtubetype_id;
    }

    /**
     * Get the [jobtype_id] column value.
     *
     * @return int
     */
    public function getJobtypeId()
    {
        return $this->jobtype_id;
    }

    /**
     * Get the [mnem] column value.
     *
     * @return string
     */
    public function getMnem()
    {
        return $this->mnem;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActiontypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Actiontype The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ActiontypePeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Actiontype The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ActiontypePeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::MODIFYPERSON_ID;
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
     * @return Actiontype The current object (for fluent API support)
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
            $this->modifiedColumns[] = ActiontypePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Sets the value of the [class] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setClass($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->class !== $v) {
            $this->class = $v;
            $this->modifiedColumns[] = ActiontypePeer::CLAZZ;
        }


        return $this;
    } // setClass()

    /**
     * Set the value of [group_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setGroupId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->group_id !== $v) {
            $this->group_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::GROUP_ID;
        }


        return $this;
    } // setGroupId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = ActiontypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ActiontypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = ActiontypePeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [flatcode] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setFlatcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->flatcode !== $v) {
            $this->flatcode = $v;
            $this->modifiedColumns[] = ActiontypePeer::FLATCODE;
        }


        return $this;
    } // setFlatcode()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = ActiontypePeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = ActiontypePeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = ActiontypePeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = ActiontypePeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = ActiontypePeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = ActiontypePeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [office] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setOffice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->office !== $v) {
            $this->office = $v;
            $this->modifiedColumns[] = ActiontypePeer::OFFICE;
        }


        return $this;
    } // setOffice()

    /**
     * Sets the value of the [showinform] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setShowinform($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->showinform !== $v) {
            $this->showinform = $v;
            $this->modifiedColumns[] = ActiontypePeer::SHOWINFORM;
        }


        return $this;
    } // setShowinform()

    /**
     * Sets the value of the [gentimetable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setGentimetable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->gentimetable !== $v) {
            $this->gentimetable = $v;
            $this->modifiedColumns[] = ActiontypePeer::GENTIMETABLE;
        }


        return $this;
    } // setGentimetable()

    /**
     * Set the value of [service_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::SERVICE_ID;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [quotatype_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setQuotatypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->quotatype_id !== $v) {
            $this->quotatype_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::QUOTATYPE_ID;
        }


        return $this;
    } // setQuotatypeId()

    /**
     * Set the value of [context] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setContext($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->context !== $v) {
            $this->context = $v;
            $this->modifiedColumns[] = ActiontypePeer::CONTEXT;
        }


        return $this;
    } // setContext()

    /**
     * Set the value of [amount] column.
     *
     * @param double $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = ActiontypePeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [amountevaluation] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setAmountevaluation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->amountevaluation !== $v) {
            $this->amountevaluation = $v;
            $this->modifiedColumns[] = ActiontypePeer::AMOUNTEVALUATION;
        }


        return $this;
    } // setAmountevaluation()

    /**
     * Set the value of [defaultstatus] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultstatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultstatus !== $v) {
            $this->defaultstatus = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTSTATUS;
        }


        return $this;
    } // setDefaultstatus()

    /**
     * Set the value of [defaultdirectiondate] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultdirectiondate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultdirectiondate !== $v) {
            $this->defaultdirectiondate = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTDIRECTIONDATE;
        }


        return $this;
    } // setDefaultdirectiondate()

    /**
     * Sets the value of the [defaultplannedenddate] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultplannedenddate($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->defaultplannedenddate !== $v) {
            $this->defaultplannedenddate = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTPLANNEDENDDATE;
        }


        return $this;
    } // setDefaultplannedenddate()

    /**
     * Set the value of [defaultenddate] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultenddate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultenddate !== $v) {
            $this->defaultenddate = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTENDDATE;
        }


        return $this;
    } // setDefaultenddate()

    /**
     * Set the value of [defaultexecperson_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultexecpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultexecperson_id !== $v) {
            $this->defaultexecperson_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTEXECPERSON_ID;
        }

        if ($this->aPerson !== null && $this->aPerson->getId() !== $v) {
            $this->aPerson = null;
        }


        return $this;
    } // setDefaultexecpersonId()

    /**
     * Set the value of [defaultpersoninevent] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultpersoninevent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultpersoninevent !== $v) {
            $this->defaultpersoninevent = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTPERSONINEVENT;
        }


        return $this;
    } // setDefaultpersoninevent()

    /**
     * Set the value of [defaultpersonineditor] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setDefaultpersonineditor($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->defaultpersonineditor !== $v) {
            $this->defaultpersonineditor = $v;
            $this->modifiedColumns[] = ActiontypePeer::DEFAULTPERSONINEDITOR;
        }


        return $this;
    } // setDefaultpersonineditor()

    /**
     * Set the value of [maxoccursinevent] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setMaxoccursinevent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->maxoccursinevent !== $v) {
            $this->maxoccursinevent = $v;
            $this->modifiedColumns[] = ActiontypePeer::MAXOCCURSINEVENT;
        }


        return $this;
    } // setMaxoccursinevent()

    /**
     * Sets the value of the [showtime] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setShowtime($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->showtime !== $v) {
            $this->showtime = $v;
            $this->modifiedColumns[] = ActiontypePeer::SHOWTIME;
        }


        return $this;
    } // setShowtime()

    /**
     * Set the value of [ismes] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setIsmes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ismes !== $v) {
            $this->ismes = $v;
            $this->modifiedColumns[] = ActiontypePeer::ISMES;
        }


        return $this;
    } // setIsmes()

    /**
     * Set the value of [nomenclativeservice_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setNomenclativeserviceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->nomenclativeservice_id !== $v) {
            $this->nomenclativeservice_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::NOMENCLATIVESERVICE_ID;
        }


        return $this;
    } // setNomenclativeserviceId()

    /**
     * Sets the value of the [ispreferable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setIspreferable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ispreferable !== $v) {
            $this->ispreferable = $v;
            $this->modifiedColumns[] = ActiontypePeer::ISPREFERABLE;
        }


        return $this;
    } // setIspreferable()

    /**
     * Set the value of [prescribedtype_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setPrescribedtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->prescribedtype_id !== $v) {
            $this->prescribedtype_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::PRESCRIBEDTYPE_ID;
        }


        return $this;
    } // setPrescribedtypeId()

    /**
     * Set the value of [shedule_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setSheduleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->shedule_id !== $v) {
            $this->shedule_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::SHEDULE_ID;
        }


        return $this;
    } // setSheduleId()

    /**
     * Sets the value of the [isrequiredcoordination] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setIsrequiredcoordination($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isrequiredcoordination !== $v) {
            $this->isrequiredcoordination = $v;
            $this->modifiedColumns[] = ActiontypePeer::ISREQUIREDCOORDINATION;
        }


        return $this;
    } // setIsrequiredcoordination()

    /**
     * Sets the value of the [isrequiredtissue] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setIsrequiredtissue($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isrequiredtissue !== $v) {
            $this->isrequiredtissue = $v;
            $this->modifiedColumns[] = ActiontypePeer::ISREQUIREDTISSUE;
        }


        return $this;
    } // setIsrequiredtissue()

    /**
     * Set the value of [testtubetype_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setTesttubetypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->testtubetype_id !== $v) {
            $this->testtubetype_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::TESTTUBETYPE_ID;
        }

        if ($this->aRbtesttubetype !== null && $this->aRbtesttubetype->getId() !== $v) {
            $this->aRbtesttubetype = null;
        }


        return $this;
    } // setTesttubetypeId()

    /**
     * Set the value of [jobtype_id] column.
     *
     * @param int $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setJobtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jobtype_id !== $v) {
            $this->jobtype_id = $v;
            $this->modifiedColumns[] = ActiontypePeer::JOBTYPE_ID;
        }

        if ($this->aRbjobtype !== null && $this->aRbjobtype->getId() !== $v) {
            $this->aRbjobtype = null;
        }


        return $this;
    } // setJobtypeId()

    /**
     * Set the value of [mnem] column.
     *
     * @param string $v new value
     * @return Actiontype The current object (for fluent API support)
     */
    public function setMnem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mnem !== $v) {
            $this->mnem = $v;
            $this->modifiedColumns[] = ActiontypePeer::MNEM;
        }


        return $this;
    } // setMnem()

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

            if ($this->amount !== 1) {
                return false;
            }

            if ($this->amountevaluation !== 0) {
                return false;
            }

            if ($this->defaultstatus !== 0) {
                return false;
            }

            if ($this->defaultdirectiondate !== 0) {
                return false;
            }

            if ($this->defaultenddate !== 0) {
                return false;
            }

            if ($this->defaultpersoninevent !== 0) {
                return false;
            }

            if ($this->defaultpersonineditor !== 0) {
                return false;
            }

            if ($this->maxoccursinevent !== 0) {
                return false;
            }

            if ($this->showtime !== false) {
                return false;
            }

            if ($this->ispreferable !== true) {
                return false;
            }

            if ($this->isrequiredcoordination !== false) {
                return false;
            }

            if ($this->isrequiredtissue !== false) {
                return false;
            }

            if ($this->mnem !== '') {
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
            $this->class = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->group_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->code = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->title = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->flatcode = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->sex = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->age = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->age_bu = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->age_bc = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->age_eu = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->age_ec = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->office = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->showinform = ($row[$startcol + 19] !== null) ? (boolean) $row[$startcol + 19] : null;
            $this->gentimetable = ($row[$startcol + 20] !== null) ? (boolean) $row[$startcol + 20] : null;
            $this->service_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->quotatype_id = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
            $this->context = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->amount = ($row[$startcol + 24] !== null) ? (double) $row[$startcol + 24] : null;
            $this->amountevaluation = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->defaultstatus = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
            $this->defaultdirectiondate = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
            $this->defaultplannedenddate = ($row[$startcol + 28] !== null) ? (boolean) $row[$startcol + 28] : null;
            $this->defaultenddate = ($row[$startcol + 29] !== null) ? (int) $row[$startcol + 29] : null;
            $this->defaultexecperson_id = ($row[$startcol + 30] !== null) ? (int) $row[$startcol + 30] : null;
            $this->defaultpersoninevent = ($row[$startcol + 31] !== null) ? (int) $row[$startcol + 31] : null;
            $this->defaultpersonineditor = ($row[$startcol + 32] !== null) ? (int) $row[$startcol + 32] : null;
            $this->maxoccursinevent = ($row[$startcol + 33] !== null) ? (int) $row[$startcol + 33] : null;
            $this->showtime = ($row[$startcol + 34] !== null) ? (boolean) $row[$startcol + 34] : null;
            $this->ismes = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
            $this->nomenclativeservice_id = ($row[$startcol + 36] !== null) ? (int) $row[$startcol + 36] : null;
            $this->ispreferable = ($row[$startcol + 37] !== null) ? (boolean) $row[$startcol + 37] : null;
            $this->prescribedtype_id = ($row[$startcol + 38] !== null) ? (int) $row[$startcol + 38] : null;
            $this->shedule_id = ($row[$startcol + 39] !== null) ? (int) $row[$startcol + 39] : null;
            $this->isrequiredcoordination = ($row[$startcol + 40] !== null) ? (boolean) $row[$startcol + 40] : null;
            $this->isrequiredtissue = ($row[$startcol + 41] !== null) ? (boolean) $row[$startcol + 41] : null;
            $this->testtubetype_id = ($row[$startcol + 42] !== null) ? (int) $row[$startcol + 42] : null;
            $this->jobtype_id = ($row[$startcol + 43] !== null) ? (int) $row[$startcol + 43] : null;
            $this->mnem = ($row[$startcol + 44] !== null) ? (string) $row[$startcol + 44] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 45; // 45 = ActiontypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Actiontype object", $e);
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

        if ($this->aPerson !== null && $this->defaultexecperson_id !== $this->aPerson->getId()) {
            $this->aPerson = null;
        }
        if ($this->aRbtesttubetype !== null && $this->testtubetype_id !== $this->aRbtesttubetype->getId()) {
            $this->aRbtesttubetype = null;
        }
        if ($this->aRbjobtype !== null && $this->jobtype_id !== $this->aRbjobtype->getId()) {
            $this->aRbjobtype = null;
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
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActiontypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPerson = null;
            $this->aRbjobtype = null;
            $this->aRbtesttubetype = null;
            $this->collActiontypeEventtypeChecksRelatedByActiontypeId = null;

            $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = null;

            $this->collActiontypeTissuetypes = null;

            $this->collBlankactionss = null;

            $this->collRbblankactionss = null;

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
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActiontypeQuery::create()
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
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ActiontypePeer::addInstanceToPool($this);
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

            if ($this->aPerson !== null) {
                if ($this->aPerson->isModified() || $this->aPerson->isNew()) {
                    $affectedRows += $this->aPerson->save($con);
                }
                $this->setPerson($this->aPerson);
            }

            if ($this->aRbjobtype !== null) {
                if ($this->aRbjobtype->isModified() || $this->aRbjobtype->isNew()) {
                    $affectedRows += $this->aRbjobtype->save($con);
                }
                $this->setRbjobtype($this->aRbjobtype);
            }

            if ($this->aRbtesttubetype !== null) {
                if ($this->aRbtesttubetype->isModified() || $this->aRbtesttubetype->isNew()) {
                    $affectedRows += $this->aRbtesttubetype->save($con);
                }
                $this->setRbtesttubetype($this->aRbtesttubetype);
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

            if ($this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion !== null) {
                if (!$this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion->isEmpty()) {
                    ActiontypeEventtypeCheckQuery::create()
                        ->filterByPrimaryKeys($this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion = null;
                }
            }

            if ($this->collActiontypeEventtypeChecksRelatedByActiontypeId !== null) {
                foreach ($this->collActiontypeEventtypeChecksRelatedByActiontypeId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion !== null) {
                if (!$this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion as $actiontypeEventtypeCheckRelatedByRelatedActiontypeId) {
                        // need to save related object because we set the relation to null
                        $actiontypeEventtypeCheckRelatedByRelatedActiontypeId->save($con);
                    }
                    $this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion = null;
                }
            }

            if ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId !== null) {
                foreach ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->actiontypeTissuetypesScheduledForDeletion !== null) {
                if (!$this->actiontypeTissuetypesScheduledForDeletion->isEmpty()) {
                    ActiontypeTissuetypeQuery::create()
                        ->filterByPrimaryKeys($this->actiontypeTissuetypesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actiontypeTissuetypesScheduledForDeletion = null;
                }
            }

            if ($this->collActiontypeTissuetypes !== null) {
                foreach ($this->collActiontypeTissuetypes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionssScheduledForDeletion !== null) {
                if (!$this->blankactionssScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionssScheduledForDeletion as $blankactions) {
                        // need to save related object because we set the relation to null
                        $blankactions->save($con);
                    }
                    $this->blankactionssScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionss !== null) {
                foreach ($this->collBlankactionss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rbblankactionssScheduledForDeletion !== null) {
                if (!$this->rbblankactionssScheduledForDeletion->isEmpty()) {
                    RbblankactionsQuery::create()
                        ->filterByPrimaryKeys($this->rbblankactionssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbblankactionssScheduledForDeletion = null;
                }
            }

            if ($this->collRbblankactionss !== null) {
                foreach ($this->collRbblankactionss as $referrerFK) {
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

        $this->modifiedColumns[] = ActiontypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActiontypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActiontypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ActiontypePeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(ActiontypePeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(ActiontypePeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ActiontypePeer::CLAZZ)) {
            $modifiedColumns[':p' . $index++]  = '`class`';
        }
        if ($this->isColumnModified(ActiontypePeer::GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`group_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(ActiontypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ActiontypePeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(ActiontypePeer::FLATCODE)) {
            $modifiedColumns[':p' . $index++]  = '`flatCode`';
        }
        if ($this->isColumnModified(ActiontypePeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(ActiontypePeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(ActiontypePeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(ActiontypePeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(ActiontypePeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(ActiontypePeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(ActiontypePeer::OFFICE)) {
            $modifiedColumns[':p' . $index++]  = '`office`';
        }
        if ($this->isColumnModified(ActiontypePeer::SHOWINFORM)) {
            $modifiedColumns[':p' . $index++]  = '`showInForm`';
        }
        if ($this->isColumnModified(ActiontypePeer::GENTIMETABLE)) {
            $modifiedColumns[':p' . $index++]  = '`genTimetable`';
        }
        if ($this->isColumnModified(ActiontypePeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::QUOTATYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`quotaType_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::CONTEXT)) {
            $modifiedColumns[':p' . $index++]  = '`context`';
        }
        if ($this->isColumnModified(ActiontypePeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(ActiontypePeer::AMOUNTEVALUATION)) {
            $modifiedColumns[':p' . $index++]  = '`amountEvaluation`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTSTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`defaultStatus`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTDIRECTIONDATE)) {
            $modifiedColumns[':p' . $index++]  = '`defaultDirectionDate`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTPLANNEDENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`defaultPlannedEndDate`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`defaultEndDate`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTEXECPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`defaultExecPerson_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTPERSONINEVENT)) {
            $modifiedColumns[':p' . $index++]  = '`defaultPersonInEvent`';
        }
        if ($this->isColumnModified(ActiontypePeer::DEFAULTPERSONINEDITOR)) {
            $modifiedColumns[':p' . $index++]  = '`defaultPersonInEditor`';
        }
        if ($this->isColumnModified(ActiontypePeer::MAXOCCURSINEVENT)) {
            $modifiedColumns[':p' . $index++]  = '`maxOccursInEvent`';
        }
        if ($this->isColumnModified(ActiontypePeer::SHOWTIME)) {
            $modifiedColumns[':p' . $index++]  = '`showTime`';
        }
        if ($this->isColumnModified(ActiontypePeer::ISMES)) {
            $modifiedColumns[':p' . $index++]  = '`isMES`';
        }
        if ($this->isColumnModified(ActiontypePeer::NOMENCLATIVESERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`nomenclativeService_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::ISPREFERABLE)) {
            $modifiedColumns[':p' . $index++]  = '`isPreferable`';
        }
        if ($this->isColumnModified(ActiontypePeer::PRESCRIBEDTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`prescribedType_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::SHEDULE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`shedule_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::ISREQUIREDCOORDINATION)) {
            $modifiedColumns[':p' . $index++]  = '`isRequiredCoordination`';
        }
        if ($this->isColumnModified(ActiontypePeer::ISREQUIREDTISSUE)) {
            $modifiedColumns[':p' . $index++]  = '`isRequiredTissue`';
        }
        if ($this->isColumnModified(ActiontypePeer::TESTTUBETYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`testTubeType_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::JOBTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`jobType_id`';
        }
        if ($this->isColumnModified(ActiontypePeer::MNEM)) {
            $modifiedColumns[':p' . $index++]  = '`mnem`';
        }

        $sql = sprintf(
            'INSERT INTO `ActionType` (%s) VALUES (%s)',
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
                    case '`class`':
                        $stmt->bindValue($identifier, (int) $this->class, PDO::PARAM_INT);
                        break;
                    case '`group_id`':
                        $stmt->bindValue($identifier, $this->group_id, PDO::PARAM_INT);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`flatCode`':
                        $stmt->bindValue($identifier, $this->flatcode, PDO::PARAM_STR);
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
                    case '`office`':
                        $stmt->bindValue($identifier, $this->office, PDO::PARAM_STR);
                        break;
                    case '`showInForm`':
                        $stmt->bindValue($identifier, (int) $this->showinform, PDO::PARAM_INT);
                        break;
                    case '`genTimetable`':
                        $stmt->bindValue($identifier, (int) $this->gentimetable, PDO::PARAM_INT);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
                        break;
                    case '`quotaType_id`':
                        $stmt->bindValue($identifier, $this->quotatype_id, PDO::PARAM_INT);
                        break;
                    case '`context`':
                        $stmt->bindValue($identifier, $this->context, PDO::PARAM_STR);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case '`amountEvaluation`':
                        $stmt->bindValue($identifier, $this->amountevaluation, PDO::PARAM_INT);
                        break;
                    case '`defaultStatus`':
                        $stmt->bindValue($identifier, $this->defaultstatus, PDO::PARAM_INT);
                        break;
                    case '`defaultDirectionDate`':
                        $stmt->bindValue($identifier, $this->defaultdirectiondate, PDO::PARAM_INT);
                        break;
                    case '`defaultPlannedEndDate`':
                        $stmt->bindValue($identifier, (int) $this->defaultplannedenddate, PDO::PARAM_INT);
                        break;
                    case '`defaultEndDate`':
                        $stmt->bindValue($identifier, $this->defaultenddate, PDO::PARAM_INT);
                        break;
                    case '`defaultExecPerson_id`':
                        $stmt->bindValue($identifier, $this->defaultexecperson_id, PDO::PARAM_INT);
                        break;
                    case '`defaultPersonInEvent`':
                        $stmt->bindValue($identifier, $this->defaultpersoninevent, PDO::PARAM_INT);
                        break;
                    case '`defaultPersonInEditor`':
                        $stmt->bindValue($identifier, $this->defaultpersonineditor, PDO::PARAM_INT);
                        break;
                    case '`maxOccursInEvent`':
                        $stmt->bindValue($identifier, $this->maxoccursinevent, PDO::PARAM_INT);
                        break;
                    case '`showTime`':
                        $stmt->bindValue($identifier, (int) $this->showtime, PDO::PARAM_INT);
                        break;
                    case '`isMES`':
                        $stmt->bindValue($identifier, $this->ismes, PDO::PARAM_INT);
                        break;
                    case '`nomenclativeService_id`':
                        $stmt->bindValue($identifier, $this->nomenclativeservice_id, PDO::PARAM_INT);
                        break;
                    case '`isPreferable`':
                        $stmt->bindValue($identifier, (int) $this->ispreferable, PDO::PARAM_INT);
                        break;
                    case '`prescribedType_id`':
                        $stmt->bindValue($identifier, $this->prescribedtype_id, PDO::PARAM_INT);
                        break;
                    case '`shedule_id`':
                        $stmt->bindValue($identifier, $this->shedule_id, PDO::PARAM_INT);
                        break;
                    case '`isRequiredCoordination`':
                        $stmt->bindValue($identifier, (int) $this->isrequiredcoordination, PDO::PARAM_INT);
                        break;
                    case '`isRequiredTissue`':
                        $stmt->bindValue($identifier, (int) $this->isrequiredtissue, PDO::PARAM_INT);
                        break;
                    case '`testTubeType_id`':
                        $stmt->bindValue($identifier, $this->testtubetype_id, PDO::PARAM_INT);
                        break;
                    case '`jobType_id`':
                        $stmt->bindValue($identifier, $this->jobtype_id, PDO::PARAM_INT);
                        break;
                    case '`mnem`':
                        $stmt->bindValue($identifier, $this->mnem, PDO::PARAM_STR);
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

            if ($this->aPerson !== null) {
                if (!$this->aPerson->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPerson->getValidationFailures());
                }
            }

            if ($this->aRbjobtype !== null) {
                if (!$this->aRbjobtype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbjobtype->getValidationFailures());
                }
            }

            if ($this->aRbtesttubetype !== null) {
                if (!$this->aRbtesttubetype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtesttubetype->getValidationFailures());
                }
            }


            if (($retval = ActiontypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActiontypeEventtypeChecksRelatedByActiontypeId !== null) {
                    foreach ($this->collActiontypeEventtypeChecksRelatedByActiontypeId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId !== null) {
                    foreach ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActiontypeTissuetypes !== null) {
                    foreach ($this->collActiontypeTissuetypes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionss !== null) {
                    foreach ($this->collBlankactionss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbblankactionss !== null) {
                    foreach ($this->collRbblankactionss as $referrerFK) {
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
        $pos = ActiontypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getClass();
                break;
            case 7:
                return $this->getGroupId();
                break;
            case 8:
                return $this->getCode();
                break;
            case 9:
                return $this->getName();
                break;
            case 10:
                return $this->getTitle();
                break;
            case 11:
                return $this->getFlatcode();
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
                return $this->getOffice();
                break;
            case 19:
                return $this->getShowinform();
                break;
            case 20:
                return $this->getGentimetable();
                break;
            case 21:
                return $this->getServiceId();
                break;
            case 22:
                return $this->getQuotatypeId();
                break;
            case 23:
                return $this->getContext();
                break;
            case 24:
                return $this->getAmount();
                break;
            case 25:
                return $this->getAmountevaluation();
                break;
            case 26:
                return $this->getDefaultstatus();
                break;
            case 27:
                return $this->getDefaultdirectiondate();
                break;
            case 28:
                return $this->getDefaultplannedenddate();
                break;
            case 29:
                return $this->getDefaultenddate();
                break;
            case 30:
                return $this->getDefaultexecpersonId();
                break;
            case 31:
                return $this->getDefaultpersoninevent();
                break;
            case 32:
                return $this->getDefaultpersonineditor();
                break;
            case 33:
                return $this->getMaxoccursinevent();
                break;
            case 34:
                return $this->getShowtime();
                break;
            case 35:
                return $this->getIsmes();
                break;
            case 36:
                return $this->getNomenclativeserviceId();
                break;
            case 37:
                return $this->getIspreferable();
                break;
            case 38:
                return $this->getPrescribedtypeId();
                break;
            case 39:
                return $this->getSheduleId();
                break;
            case 40:
                return $this->getIsrequiredcoordination();
                break;
            case 41:
                return $this->getIsrequiredtissue();
                break;
            case 42:
                return $this->getTesttubetypeId();
                break;
            case 43:
                return $this->getJobtypeId();
                break;
            case 44:
                return $this->getMnem();
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
        if (isset($alreadyDumpedObjects['Actiontype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Actiontype'][$this->getPrimaryKey()] = true;
        $keys = ActiontypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getClass(),
            $keys[7] => $this->getGroupId(),
            $keys[8] => $this->getCode(),
            $keys[9] => $this->getName(),
            $keys[10] => $this->getTitle(),
            $keys[11] => $this->getFlatcode(),
            $keys[12] => $this->getSex(),
            $keys[13] => $this->getAge(),
            $keys[14] => $this->getAgeBu(),
            $keys[15] => $this->getAgeBc(),
            $keys[16] => $this->getAgeEu(),
            $keys[17] => $this->getAgeEc(),
            $keys[18] => $this->getOffice(),
            $keys[19] => $this->getShowinform(),
            $keys[20] => $this->getGentimetable(),
            $keys[21] => $this->getServiceId(),
            $keys[22] => $this->getQuotatypeId(),
            $keys[23] => $this->getContext(),
            $keys[24] => $this->getAmount(),
            $keys[25] => $this->getAmountevaluation(),
            $keys[26] => $this->getDefaultstatus(),
            $keys[27] => $this->getDefaultdirectiondate(),
            $keys[28] => $this->getDefaultplannedenddate(),
            $keys[29] => $this->getDefaultenddate(),
            $keys[30] => $this->getDefaultexecpersonId(),
            $keys[31] => $this->getDefaultpersoninevent(),
            $keys[32] => $this->getDefaultpersonineditor(),
            $keys[33] => $this->getMaxoccursinevent(),
            $keys[34] => $this->getShowtime(),
            $keys[35] => $this->getIsmes(),
            $keys[36] => $this->getNomenclativeserviceId(),
            $keys[37] => $this->getIspreferable(),
            $keys[38] => $this->getPrescribedtypeId(),
            $keys[39] => $this->getSheduleId(),
            $keys[40] => $this->getIsrequiredcoordination(),
            $keys[41] => $this->getIsrequiredtissue(),
            $keys[42] => $this->getTesttubetypeId(),
            $keys[43] => $this->getJobtypeId(),
            $keys[44] => $this->getMnem(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPerson) {
                $result['Person'] = $this->aPerson->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbjobtype) {
                $result['Rbjobtype'] = $this->aRbjobtype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtesttubetype) {
                $result['Rbtesttubetype'] = $this->aRbtesttubetype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActiontypeEventtypeChecksRelatedByActiontypeId) {
                $result['ActiontypeEventtypeChecksRelatedByActiontypeId'] = $this->collActiontypeEventtypeChecksRelatedByActiontypeId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId) {
                $result['ActiontypeEventtypeChecksRelatedByRelatedActiontypeId'] = $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActiontypeTissuetypes) {
                $result['ActiontypeTissuetypes'] = $this->collActiontypeTissuetypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionss) {
                $result['Blankactionss'] = $this->collBlankactionss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbblankactionss) {
                $result['Rbblankactionss'] = $this->collRbblankactionss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ActiontypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setClass($value);
                break;
            case 7:
                $this->setGroupId($value);
                break;
            case 8:
                $this->setCode($value);
                break;
            case 9:
                $this->setName($value);
                break;
            case 10:
                $this->setTitle($value);
                break;
            case 11:
                $this->setFlatcode($value);
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
                $this->setOffice($value);
                break;
            case 19:
                $this->setShowinform($value);
                break;
            case 20:
                $this->setGentimetable($value);
                break;
            case 21:
                $this->setServiceId($value);
                break;
            case 22:
                $this->setQuotatypeId($value);
                break;
            case 23:
                $this->setContext($value);
                break;
            case 24:
                $this->setAmount($value);
                break;
            case 25:
                $this->setAmountevaluation($value);
                break;
            case 26:
                $this->setDefaultstatus($value);
                break;
            case 27:
                $this->setDefaultdirectiondate($value);
                break;
            case 28:
                $this->setDefaultplannedenddate($value);
                break;
            case 29:
                $this->setDefaultenddate($value);
                break;
            case 30:
                $this->setDefaultexecpersonId($value);
                break;
            case 31:
                $this->setDefaultpersoninevent($value);
                break;
            case 32:
                $this->setDefaultpersonineditor($value);
                break;
            case 33:
                $this->setMaxoccursinevent($value);
                break;
            case 34:
                $this->setShowtime($value);
                break;
            case 35:
                $this->setIsmes($value);
                break;
            case 36:
                $this->setNomenclativeserviceId($value);
                break;
            case 37:
                $this->setIspreferable($value);
                break;
            case 38:
                $this->setPrescribedtypeId($value);
                break;
            case 39:
                $this->setSheduleId($value);
                break;
            case 40:
                $this->setIsrequiredcoordination($value);
                break;
            case 41:
                $this->setIsrequiredtissue($value);
                break;
            case 42:
                $this->setTesttubetypeId($value);
                break;
            case 43:
                $this->setJobtypeId($value);
                break;
            case 44:
                $this->setMnem($value);
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
        $keys = ActiontypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setClass($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setGroupId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCode($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setName($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTitle($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setFlatcode($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSex($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAge($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAgeBu($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAgeBc($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAgeEu($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setAgeEc($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setOffice($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setShowinform($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setGentimetable($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setServiceId($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setQuotatypeId($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setContext($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setAmount($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setAmountevaluation($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setDefaultstatus($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setDefaultdirectiondate($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setDefaultplannedenddate($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setDefaultenddate($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setDefaultexecpersonId($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setDefaultpersoninevent($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setDefaultpersonineditor($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setMaxoccursinevent($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setShowtime($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setIsmes($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setNomenclativeserviceId($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setIspreferable($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setPrescribedtypeId($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setSheduleId($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setIsrequiredcoordination($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setIsrequiredtissue($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setTesttubetypeId($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setJobtypeId($arr[$keys[43]]);
        if (array_key_exists($keys[44], $arr)) $this->setMnem($arr[$keys[44]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActiontypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ActiontypePeer::ID)) $criteria->add(ActiontypePeer::ID, $this->id);
        if ($this->isColumnModified(ActiontypePeer::CREATEDATETIME)) $criteria->add(ActiontypePeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ActiontypePeer::CREATEPERSON_ID)) $criteria->add(ActiontypePeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ActiontypePeer::MODIFYDATETIME)) $criteria->add(ActiontypePeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ActiontypePeer::MODIFYPERSON_ID)) $criteria->add(ActiontypePeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ActiontypePeer::DELETED)) $criteria->add(ActiontypePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ActiontypePeer::CLAZZ)) $criteria->add(ActiontypePeer::CLAZZ, $this->class);
        if ($this->isColumnModified(ActiontypePeer::GROUP_ID)) $criteria->add(ActiontypePeer::GROUP_ID, $this->group_id);
        if ($this->isColumnModified(ActiontypePeer::CODE)) $criteria->add(ActiontypePeer::CODE, $this->code);
        if ($this->isColumnModified(ActiontypePeer::NAME)) $criteria->add(ActiontypePeer::NAME, $this->name);
        if ($this->isColumnModified(ActiontypePeer::TITLE)) $criteria->add(ActiontypePeer::TITLE, $this->title);
        if ($this->isColumnModified(ActiontypePeer::FLATCODE)) $criteria->add(ActiontypePeer::FLATCODE, $this->flatcode);
        if ($this->isColumnModified(ActiontypePeer::SEX)) $criteria->add(ActiontypePeer::SEX, $this->sex);
        if ($this->isColumnModified(ActiontypePeer::AGE)) $criteria->add(ActiontypePeer::AGE, $this->age);
        if ($this->isColumnModified(ActiontypePeer::AGE_BU)) $criteria->add(ActiontypePeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(ActiontypePeer::AGE_BC)) $criteria->add(ActiontypePeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(ActiontypePeer::AGE_EU)) $criteria->add(ActiontypePeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(ActiontypePeer::AGE_EC)) $criteria->add(ActiontypePeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(ActiontypePeer::OFFICE)) $criteria->add(ActiontypePeer::OFFICE, $this->office);
        if ($this->isColumnModified(ActiontypePeer::SHOWINFORM)) $criteria->add(ActiontypePeer::SHOWINFORM, $this->showinform);
        if ($this->isColumnModified(ActiontypePeer::GENTIMETABLE)) $criteria->add(ActiontypePeer::GENTIMETABLE, $this->gentimetable);
        if ($this->isColumnModified(ActiontypePeer::SERVICE_ID)) $criteria->add(ActiontypePeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(ActiontypePeer::QUOTATYPE_ID)) $criteria->add(ActiontypePeer::QUOTATYPE_ID, $this->quotatype_id);
        if ($this->isColumnModified(ActiontypePeer::CONTEXT)) $criteria->add(ActiontypePeer::CONTEXT, $this->context);
        if ($this->isColumnModified(ActiontypePeer::AMOUNT)) $criteria->add(ActiontypePeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(ActiontypePeer::AMOUNTEVALUATION)) $criteria->add(ActiontypePeer::AMOUNTEVALUATION, $this->amountevaluation);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTSTATUS)) $criteria->add(ActiontypePeer::DEFAULTSTATUS, $this->defaultstatus);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTDIRECTIONDATE)) $criteria->add(ActiontypePeer::DEFAULTDIRECTIONDATE, $this->defaultdirectiondate);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTPLANNEDENDDATE)) $criteria->add(ActiontypePeer::DEFAULTPLANNEDENDDATE, $this->defaultplannedenddate);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTENDDATE)) $criteria->add(ActiontypePeer::DEFAULTENDDATE, $this->defaultenddate);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTEXECPERSON_ID)) $criteria->add(ActiontypePeer::DEFAULTEXECPERSON_ID, $this->defaultexecperson_id);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTPERSONINEVENT)) $criteria->add(ActiontypePeer::DEFAULTPERSONINEVENT, $this->defaultpersoninevent);
        if ($this->isColumnModified(ActiontypePeer::DEFAULTPERSONINEDITOR)) $criteria->add(ActiontypePeer::DEFAULTPERSONINEDITOR, $this->defaultpersonineditor);
        if ($this->isColumnModified(ActiontypePeer::MAXOCCURSINEVENT)) $criteria->add(ActiontypePeer::MAXOCCURSINEVENT, $this->maxoccursinevent);
        if ($this->isColumnModified(ActiontypePeer::SHOWTIME)) $criteria->add(ActiontypePeer::SHOWTIME, $this->showtime);
        if ($this->isColumnModified(ActiontypePeer::ISMES)) $criteria->add(ActiontypePeer::ISMES, $this->ismes);
        if ($this->isColumnModified(ActiontypePeer::NOMENCLATIVESERVICE_ID)) $criteria->add(ActiontypePeer::NOMENCLATIVESERVICE_ID, $this->nomenclativeservice_id);
        if ($this->isColumnModified(ActiontypePeer::ISPREFERABLE)) $criteria->add(ActiontypePeer::ISPREFERABLE, $this->ispreferable);
        if ($this->isColumnModified(ActiontypePeer::PRESCRIBEDTYPE_ID)) $criteria->add(ActiontypePeer::PRESCRIBEDTYPE_ID, $this->prescribedtype_id);
        if ($this->isColumnModified(ActiontypePeer::SHEDULE_ID)) $criteria->add(ActiontypePeer::SHEDULE_ID, $this->shedule_id);
        if ($this->isColumnModified(ActiontypePeer::ISREQUIREDCOORDINATION)) $criteria->add(ActiontypePeer::ISREQUIREDCOORDINATION, $this->isrequiredcoordination);
        if ($this->isColumnModified(ActiontypePeer::ISREQUIREDTISSUE)) $criteria->add(ActiontypePeer::ISREQUIREDTISSUE, $this->isrequiredtissue);
        if ($this->isColumnModified(ActiontypePeer::TESTTUBETYPE_ID)) $criteria->add(ActiontypePeer::TESTTUBETYPE_ID, $this->testtubetype_id);
        if ($this->isColumnModified(ActiontypePeer::JOBTYPE_ID)) $criteria->add(ActiontypePeer::JOBTYPE_ID, $this->jobtype_id);
        if ($this->isColumnModified(ActiontypePeer::MNEM)) $criteria->add(ActiontypePeer::MNEM, $this->mnem);

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
        $criteria = new Criteria(ActiontypePeer::DATABASE_NAME);
        $criteria->add(ActiontypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Actiontype (or compatible) type.
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
        $copyObj->setClass($this->getClass());
        $copyObj->setGroupId($this->getGroupId());
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setFlatcode($this->getFlatcode());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setOffice($this->getOffice());
        $copyObj->setShowinform($this->getShowinform());
        $copyObj->setGentimetable($this->getGentimetable());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setQuotatypeId($this->getQuotatypeId());
        $copyObj->setContext($this->getContext());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setAmountevaluation($this->getAmountevaluation());
        $copyObj->setDefaultstatus($this->getDefaultstatus());
        $copyObj->setDefaultdirectiondate($this->getDefaultdirectiondate());
        $copyObj->setDefaultplannedenddate($this->getDefaultplannedenddate());
        $copyObj->setDefaultenddate($this->getDefaultenddate());
        $copyObj->setDefaultexecpersonId($this->getDefaultexecpersonId());
        $copyObj->setDefaultpersoninevent($this->getDefaultpersoninevent());
        $copyObj->setDefaultpersonineditor($this->getDefaultpersonineditor());
        $copyObj->setMaxoccursinevent($this->getMaxoccursinevent());
        $copyObj->setShowtime($this->getShowtime());
        $copyObj->setIsmes($this->getIsmes());
        $copyObj->setNomenclativeserviceId($this->getNomenclativeserviceId());
        $copyObj->setIspreferable($this->getIspreferable());
        $copyObj->setPrescribedtypeId($this->getPrescribedtypeId());
        $copyObj->setSheduleId($this->getSheduleId());
        $copyObj->setIsrequiredcoordination($this->getIsrequiredcoordination());
        $copyObj->setIsrequiredtissue($this->getIsrequiredtissue());
        $copyObj->setTesttubetypeId($this->getTesttubetypeId());
        $copyObj->setJobtypeId($this->getJobtypeId());
        $copyObj->setMnem($this->getMnem());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActiontypeEventtypeChecksRelatedByActiontypeId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontypeEventtypeCheckRelatedByActiontypeId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActiontypeEventtypeChecksRelatedByRelatedActiontypeId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontypeEventtypeCheckRelatedByRelatedActiontypeId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActiontypeTissuetypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontypeTissuetype($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRbblankactionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbblankactions($relObj->copy($deepCopy));
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
     * @return Actiontype Clone of current object.
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
     * @return ActiontypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActiontypePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param             Person $v
     * @return Actiontype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPerson(Person $v = null)
    {
        if ($v === null) {
            $this->setDefaultexecpersonId(NULL);
        } else {
            $this->setDefaultexecpersonId($v->getId());
        }

        $this->aPerson = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addActiontype($this);
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
    public function getPerson(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPerson === null && ($this->defaultexecperson_id !== null) && $doQuery) {
            $this->aPerson = PersonQuery::create()->findPk($this->defaultexecperson_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPerson->addActiontypes($this);
             */
        }

        return $this->aPerson;
    }

    /**
     * Declares an association between this object and a Rbjobtype object.
     *
     * @param             Rbjobtype $v
     * @return Actiontype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbjobtype(Rbjobtype $v = null)
    {
        if ($v === null) {
            $this->setJobtypeId(NULL);
        } else {
            $this->setJobtypeId($v->getId());
        }

        $this->aRbjobtype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbjobtype object, it will not be re-added.
        if ($v !== null) {
            $v->addActiontype($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbjobtype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbjobtype The associated Rbjobtype object.
     * @throws PropelException
     */
    public function getRbjobtype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbjobtype === null && ($this->jobtype_id !== null) && $doQuery) {
            $this->aRbjobtype = RbjobtypeQuery::create()->findPk($this->jobtype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbjobtype->addActiontypes($this);
             */
        }

        return $this->aRbjobtype;
    }

    /**
     * Declares an association between this object and a Rbtesttubetype object.
     *
     * @param             Rbtesttubetype $v
     * @return Actiontype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbtesttubetype(Rbtesttubetype $v = null)
    {
        if ($v === null) {
            $this->setTesttubetypeId(NULL);
        } else {
            $this->setTesttubetypeId($v->getId());
        }

        $this->aRbtesttubetype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbtesttubetype object, it will not be re-added.
        if ($v !== null) {
            $v->addActiontype($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbtesttubetype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbtesttubetype The associated Rbtesttubetype object.
     * @throws PropelException
     */
    public function getRbtesttubetype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbtesttubetype === null && ($this->testtubetype_id !== null) && $doQuery) {
            $this->aRbtesttubetype = RbtesttubetypeQuery::create()->findPk($this->testtubetype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbtesttubetype->addActiontypes($this);
             */
        }

        return $this->aRbtesttubetype;
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
        if ('ActiontypeEventtypeCheckRelatedByActiontypeId' == $relationName) {
            $this->initActiontypeEventtypeChecksRelatedByActiontypeId();
        }
        if ('ActiontypeEventtypeCheckRelatedByRelatedActiontypeId' == $relationName) {
            $this->initActiontypeEventtypeChecksRelatedByRelatedActiontypeId();
        }
        if ('ActiontypeTissuetype' == $relationName) {
            $this->initActiontypeTissuetypes();
        }
        if ('Blankactions' == $relationName) {
            $this->initBlankactionss();
        }
        if ('Rbblankactions' == $relationName) {
            $this->initRbblankactionss();
        }
    }

    /**
     * Clears out the collActiontypeEventtypeChecksRelatedByActiontypeId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actiontype The current object (for fluent API support)
     * @see        addActiontypeEventtypeChecksRelatedByActiontypeId()
     */
    public function clearActiontypeEventtypeChecksRelatedByActiontypeId()
    {
        $this->collActiontypeEventtypeChecksRelatedByActiontypeId = null; // important to set this to null since that means it is uninitialized
        $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontypeEventtypeChecksRelatedByActiontypeId collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontypeEventtypeChecksRelatedByActiontypeId($v = true)
    {
        $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial = $v;
    }

    /**
     * Initializes the collActiontypeEventtypeChecksRelatedByActiontypeId collection.
     *
     * By default this just sets the collActiontypeEventtypeChecksRelatedByActiontypeId collection to an empty array (like clearcollActiontypeEventtypeChecksRelatedByActiontypeId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontypeEventtypeChecksRelatedByActiontypeId($overrideExisting = true)
    {
        if (null !== $this->collActiontypeEventtypeChecksRelatedByActiontypeId && !$overrideExisting) {
            return;
        }
        $this->collActiontypeEventtypeChecksRelatedByActiontypeId = new PropelObjectCollection();
        $this->collActiontypeEventtypeChecksRelatedByActiontypeId->setModel('ActiontypeEventtypeCheck');
    }

    /**
     * Gets an array of ActiontypeEventtypeCheck objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actiontype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     * @throws PropelException
     */
    public function getActiontypeEventtypeChecksRelatedByActiontypeId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial && !$this->isNew();
        if (null === $this->collActiontypeEventtypeChecksRelatedByActiontypeId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontypeEventtypeChecksRelatedByActiontypeId) {
                // return empty collection
                $this->initActiontypeEventtypeChecksRelatedByActiontypeId();
            } else {
                $collActiontypeEventtypeChecksRelatedByActiontypeId = ActiontypeEventtypeCheckQuery::create(null, $criteria)
                    ->filterByActiontypeRelatedByActiontypeId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial && count($collActiontypeEventtypeChecksRelatedByActiontypeId)) {
                      $this->initActiontypeEventtypeChecksRelatedByActiontypeId(false);

                      foreach($collActiontypeEventtypeChecksRelatedByActiontypeId as $obj) {
                        if (false == $this->collActiontypeEventtypeChecksRelatedByActiontypeId->contains($obj)) {
                          $this->collActiontypeEventtypeChecksRelatedByActiontypeId->append($obj);
                        }
                      }

                      $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial = true;
                    }

                    $collActiontypeEventtypeChecksRelatedByActiontypeId->getInternalIterator()->rewind();
                    return $collActiontypeEventtypeChecksRelatedByActiontypeId;
                }

                if($partial && $this->collActiontypeEventtypeChecksRelatedByActiontypeId) {
                    foreach($this->collActiontypeEventtypeChecksRelatedByActiontypeId as $obj) {
                        if($obj->isNew()) {
                            $collActiontypeEventtypeChecksRelatedByActiontypeId[] = $obj;
                        }
                    }
                }

                $this->collActiontypeEventtypeChecksRelatedByActiontypeId = $collActiontypeEventtypeChecksRelatedByActiontypeId;
                $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial = false;
            }
        }

        return $this->collActiontypeEventtypeChecksRelatedByActiontypeId;
    }

    /**
     * Sets a collection of ActiontypeEventtypeCheckRelatedByActiontypeId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontypeEventtypeChecksRelatedByActiontypeId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actiontype The current object (for fluent API support)
     */
    public function setActiontypeEventtypeChecksRelatedByActiontypeId(PropelCollection $actiontypeEventtypeChecksRelatedByActiontypeId, PropelPDO $con = null)
    {
        $actiontypeEventtypeChecksRelatedByActiontypeIdToDelete = $this->getActiontypeEventtypeChecksRelatedByActiontypeId(new Criteria(), $con)->diff($actiontypeEventtypeChecksRelatedByActiontypeId);

        $this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion = unserialize(serialize($actiontypeEventtypeChecksRelatedByActiontypeIdToDelete));

        foreach ($actiontypeEventtypeChecksRelatedByActiontypeIdToDelete as $actiontypeEventtypeCheckRelatedByActiontypeIdRemoved) {
            $actiontypeEventtypeCheckRelatedByActiontypeIdRemoved->setActiontypeRelatedByActiontypeId(null);
        }

        $this->collActiontypeEventtypeChecksRelatedByActiontypeId = null;
        foreach ($actiontypeEventtypeChecksRelatedByActiontypeId as $actiontypeEventtypeCheckRelatedByActiontypeId) {
            $this->addActiontypeEventtypeCheckRelatedByActiontypeId($actiontypeEventtypeCheckRelatedByActiontypeId);
        }

        $this->collActiontypeEventtypeChecksRelatedByActiontypeId = $actiontypeEventtypeChecksRelatedByActiontypeId;
        $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActiontypeEventtypeCheck objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActiontypeEventtypeCheck objects.
     * @throws PropelException
     */
    public function countActiontypeEventtypeChecksRelatedByActiontypeId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial && !$this->isNew();
        if (null === $this->collActiontypeEventtypeChecksRelatedByActiontypeId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontypeEventtypeChecksRelatedByActiontypeId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontypeEventtypeChecksRelatedByActiontypeId());
            }
            $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActiontypeRelatedByActiontypeId($this)
                ->count($con);
        }

        return count($this->collActiontypeEventtypeChecksRelatedByActiontypeId);
    }

    /**
     * Method called to associate a ActiontypeEventtypeCheck object to this object
     * through the ActiontypeEventtypeCheck foreign key attribute.
     *
     * @param    ActiontypeEventtypeCheck $l ActiontypeEventtypeCheck
     * @return Actiontype The current object (for fluent API support)
     */
    public function addActiontypeEventtypeCheckRelatedByActiontypeId(ActiontypeEventtypeCheck $l)
    {
        if ($this->collActiontypeEventtypeChecksRelatedByActiontypeId === null) {
            $this->initActiontypeEventtypeChecksRelatedByActiontypeId();
            $this->collActiontypeEventtypeChecksRelatedByActiontypeIdPartial = true;
        }
        if (!in_array($l, $this->collActiontypeEventtypeChecksRelatedByActiontypeId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontypeEventtypeCheckRelatedByActiontypeId($l);
        }

        return $this;
    }

    /**
     * @param	ActiontypeEventtypeCheckRelatedByActiontypeId $actiontypeEventtypeCheckRelatedByActiontypeId The actiontypeEventtypeCheckRelatedByActiontypeId object to add.
     */
    protected function doAddActiontypeEventtypeCheckRelatedByActiontypeId($actiontypeEventtypeCheckRelatedByActiontypeId)
    {
        $this->collActiontypeEventtypeChecksRelatedByActiontypeId[]= $actiontypeEventtypeCheckRelatedByActiontypeId;
        $actiontypeEventtypeCheckRelatedByActiontypeId->setActiontypeRelatedByActiontypeId($this);
    }

    /**
     * @param	ActiontypeEventtypeCheckRelatedByActiontypeId $actiontypeEventtypeCheckRelatedByActiontypeId The actiontypeEventtypeCheckRelatedByActiontypeId object to remove.
     * @return Actiontype The current object (for fluent API support)
     */
    public function removeActiontypeEventtypeCheckRelatedByActiontypeId($actiontypeEventtypeCheckRelatedByActiontypeId)
    {
        if ($this->getActiontypeEventtypeChecksRelatedByActiontypeId()->contains($actiontypeEventtypeCheckRelatedByActiontypeId)) {
            $this->collActiontypeEventtypeChecksRelatedByActiontypeId->remove($this->collActiontypeEventtypeChecksRelatedByActiontypeId->search($actiontypeEventtypeCheckRelatedByActiontypeId));
            if (null === $this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion) {
                $this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion = clone $this->collActiontypeEventtypeChecksRelatedByActiontypeId;
                $this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion->clear();
            }
            $this->actiontypeEventtypeChecksRelatedByActiontypeIdScheduledForDeletion[]= clone $actiontypeEventtypeCheckRelatedByActiontypeId;
            $actiontypeEventtypeCheckRelatedByActiontypeId->setActiontypeRelatedByActiontypeId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actiontype is new, it will return
     * an empty collection; or if this Actiontype has previously
     * been saved, it will retrieve related ActiontypeEventtypeChecksRelatedByActiontypeId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actiontype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     */
    public function getActiontypeEventtypeChecksRelatedByActiontypeIdJoinEventtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
        $query->joinWith('Eventtype', $join_behavior);

        return $this->getActiontypeEventtypeChecksRelatedByActiontypeId($query, $con);
    }

    /**
     * Clears out the collActiontypeEventtypeChecksRelatedByRelatedActiontypeId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actiontype The current object (for fluent API support)
     * @see        addActiontypeEventtypeChecksRelatedByRelatedActiontypeId()
     */
    public function clearActiontypeEventtypeChecksRelatedByRelatedActiontypeId()
    {
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = null; // important to set this to null since that means it is uninitialized
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontypeEventtypeChecksRelatedByRelatedActiontypeId collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontypeEventtypeChecksRelatedByRelatedActiontypeId($v = true)
    {
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial = $v;
    }

    /**
     * Initializes the collActiontypeEventtypeChecksRelatedByRelatedActiontypeId collection.
     *
     * By default this just sets the collActiontypeEventtypeChecksRelatedByRelatedActiontypeId collection to an empty array (like clearcollActiontypeEventtypeChecksRelatedByRelatedActiontypeId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontypeEventtypeChecksRelatedByRelatedActiontypeId($overrideExisting = true)
    {
        if (null !== $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId && !$overrideExisting) {
            return;
        }
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = new PropelObjectCollection();
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->setModel('ActiontypeEventtypeCheck');
    }

    /**
     * Gets an array of ActiontypeEventtypeCheck objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actiontype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     * @throws PropelException
     */
    public function getActiontypeEventtypeChecksRelatedByRelatedActiontypeId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial && !$this->isNew();
        if (null === $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId) {
                // return empty collection
                $this->initActiontypeEventtypeChecksRelatedByRelatedActiontypeId();
            } else {
                $collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = ActiontypeEventtypeCheckQuery::create(null, $criteria)
                    ->filterByActiontypeRelatedByRelatedActiontypeId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial && count($collActiontypeEventtypeChecksRelatedByRelatedActiontypeId)) {
                      $this->initActiontypeEventtypeChecksRelatedByRelatedActiontypeId(false);

                      foreach($collActiontypeEventtypeChecksRelatedByRelatedActiontypeId as $obj) {
                        if (false == $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->contains($obj)) {
                          $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->append($obj);
                        }
                      }

                      $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial = true;
                    }

                    $collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->getInternalIterator()->rewind();
                    return $collActiontypeEventtypeChecksRelatedByRelatedActiontypeId;
                }

                if($partial && $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId) {
                    foreach($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId as $obj) {
                        if($obj->isNew()) {
                            $collActiontypeEventtypeChecksRelatedByRelatedActiontypeId[] = $obj;
                        }
                    }
                }

                $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = $collActiontypeEventtypeChecksRelatedByRelatedActiontypeId;
                $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial = false;
            }
        }

        return $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId;
    }

    /**
     * Sets a collection of ActiontypeEventtypeCheckRelatedByRelatedActiontypeId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontypeEventtypeChecksRelatedByRelatedActiontypeId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actiontype The current object (for fluent API support)
     */
    public function setActiontypeEventtypeChecksRelatedByRelatedActiontypeId(PropelCollection $actiontypeEventtypeChecksRelatedByRelatedActiontypeId, PropelPDO $con = null)
    {
        $actiontypeEventtypeChecksRelatedByRelatedActiontypeIdToDelete = $this->getActiontypeEventtypeChecksRelatedByRelatedActiontypeId(new Criteria(), $con)->diff($actiontypeEventtypeChecksRelatedByRelatedActiontypeId);

        $this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion = unserialize(serialize($actiontypeEventtypeChecksRelatedByRelatedActiontypeIdToDelete));

        foreach ($actiontypeEventtypeChecksRelatedByRelatedActiontypeIdToDelete as $actiontypeEventtypeCheckRelatedByRelatedActiontypeIdRemoved) {
            $actiontypeEventtypeCheckRelatedByRelatedActiontypeIdRemoved->setActiontypeRelatedByRelatedActiontypeId(null);
        }

        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = null;
        foreach ($actiontypeEventtypeChecksRelatedByRelatedActiontypeId as $actiontypeEventtypeCheckRelatedByRelatedActiontypeId) {
            $this->addActiontypeEventtypeCheckRelatedByRelatedActiontypeId($actiontypeEventtypeCheckRelatedByRelatedActiontypeId);
        }

        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = $actiontypeEventtypeChecksRelatedByRelatedActiontypeId;
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActiontypeEventtypeCheck objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActiontypeEventtypeCheck objects.
     * @throws PropelException
     */
    public function countActiontypeEventtypeChecksRelatedByRelatedActiontypeId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial && !$this->isNew();
        if (null === $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontypeEventtypeChecksRelatedByRelatedActiontypeId());
            }
            $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActiontypeRelatedByRelatedActiontypeId($this)
                ->count($con);
        }

        return count($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId);
    }

    /**
     * Method called to associate a ActiontypeEventtypeCheck object to this object
     * through the ActiontypeEventtypeCheck foreign key attribute.
     *
     * @param    ActiontypeEventtypeCheck $l ActiontypeEventtypeCheck
     * @return Actiontype The current object (for fluent API support)
     */
    public function addActiontypeEventtypeCheckRelatedByRelatedActiontypeId(ActiontypeEventtypeCheck $l)
    {
        if ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId === null) {
            $this->initActiontypeEventtypeChecksRelatedByRelatedActiontypeId();
            $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeIdPartial = true;
        }
        if (!in_array($l, $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontypeEventtypeCheckRelatedByRelatedActiontypeId($l);
        }

        return $this;
    }

    /**
     * @param	ActiontypeEventtypeCheckRelatedByRelatedActiontypeId $actiontypeEventtypeCheckRelatedByRelatedActiontypeId The actiontypeEventtypeCheckRelatedByRelatedActiontypeId object to add.
     */
    protected function doAddActiontypeEventtypeCheckRelatedByRelatedActiontypeId($actiontypeEventtypeCheckRelatedByRelatedActiontypeId)
    {
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId[]= $actiontypeEventtypeCheckRelatedByRelatedActiontypeId;
        $actiontypeEventtypeCheckRelatedByRelatedActiontypeId->setActiontypeRelatedByRelatedActiontypeId($this);
    }

    /**
     * @param	ActiontypeEventtypeCheckRelatedByRelatedActiontypeId $actiontypeEventtypeCheckRelatedByRelatedActiontypeId The actiontypeEventtypeCheckRelatedByRelatedActiontypeId object to remove.
     * @return Actiontype The current object (for fluent API support)
     */
    public function removeActiontypeEventtypeCheckRelatedByRelatedActiontypeId($actiontypeEventtypeCheckRelatedByRelatedActiontypeId)
    {
        if ($this->getActiontypeEventtypeChecksRelatedByRelatedActiontypeId()->contains($actiontypeEventtypeCheckRelatedByRelatedActiontypeId)) {
            $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->remove($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->search($actiontypeEventtypeCheckRelatedByRelatedActiontypeId));
            if (null === $this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion) {
                $this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion = clone $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId;
                $this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion->clear();
            }
            $this->actiontypeEventtypeChecksRelatedByRelatedActiontypeIdScheduledForDeletion[]= $actiontypeEventtypeCheckRelatedByRelatedActiontypeId;
            $actiontypeEventtypeCheckRelatedByRelatedActiontypeId->setActiontypeRelatedByRelatedActiontypeId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actiontype is new, it will return
     * an empty collection; or if this Actiontype has previously
     * been saved, it will retrieve related ActiontypeEventtypeChecksRelatedByRelatedActiontypeId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actiontype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     */
    public function getActiontypeEventtypeChecksRelatedByRelatedActiontypeIdJoinEventtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
        $query->joinWith('Eventtype', $join_behavior);

        return $this->getActiontypeEventtypeChecksRelatedByRelatedActiontypeId($query, $con);
    }

    /**
     * Clears out the collActiontypeTissuetypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actiontype The current object (for fluent API support)
     * @see        addActiontypeTissuetypes()
     */
    public function clearActiontypeTissuetypes()
    {
        $this->collActiontypeTissuetypes = null; // important to set this to null since that means it is uninitialized
        $this->collActiontypeTissuetypesPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontypeTissuetypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontypeTissuetypes($v = true)
    {
        $this->collActiontypeTissuetypesPartial = $v;
    }

    /**
     * Initializes the collActiontypeTissuetypes collection.
     *
     * By default this just sets the collActiontypeTissuetypes collection to an empty array (like clearcollActiontypeTissuetypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontypeTissuetypes($overrideExisting = true)
    {
        if (null !== $this->collActiontypeTissuetypes && !$overrideExisting) {
            return;
        }
        $this->collActiontypeTissuetypes = new PropelObjectCollection();
        $this->collActiontypeTissuetypes->setModel('ActiontypeTissuetype');
    }

    /**
     * Gets an array of ActiontypeTissuetype objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actiontype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActiontypeTissuetype[] List of ActiontypeTissuetype objects
     * @throws PropelException
     */
    public function getActiontypeTissuetypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeTissuetypesPartial && !$this->isNew();
        if (null === $this->collActiontypeTissuetypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontypeTissuetypes) {
                // return empty collection
                $this->initActiontypeTissuetypes();
            } else {
                $collActiontypeTissuetypes = ActiontypeTissuetypeQuery::create(null, $criteria)
                    ->filterByActiontype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontypeTissuetypesPartial && count($collActiontypeTissuetypes)) {
                      $this->initActiontypeTissuetypes(false);

                      foreach($collActiontypeTissuetypes as $obj) {
                        if (false == $this->collActiontypeTissuetypes->contains($obj)) {
                          $this->collActiontypeTissuetypes->append($obj);
                        }
                      }

                      $this->collActiontypeTissuetypesPartial = true;
                    }

                    $collActiontypeTissuetypes->getInternalIterator()->rewind();
                    return $collActiontypeTissuetypes;
                }

                if($partial && $this->collActiontypeTissuetypes) {
                    foreach($this->collActiontypeTissuetypes as $obj) {
                        if($obj->isNew()) {
                            $collActiontypeTissuetypes[] = $obj;
                        }
                    }
                }

                $this->collActiontypeTissuetypes = $collActiontypeTissuetypes;
                $this->collActiontypeTissuetypesPartial = false;
            }
        }

        return $this->collActiontypeTissuetypes;
    }

    /**
     * Sets a collection of ActiontypeTissuetype objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontypeTissuetypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actiontype The current object (for fluent API support)
     */
    public function setActiontypeTissuetypes(PropelCollection $actiontypeTissuetypes, PropelPDO $con = null)
    {
        $actiontypeTissuetypesToDelete = $this->getActiontypeTissuetypes(new Criteria(), $con)->diff($actiontypeTissuetypes);

        $this->actiontypeTissuetypesScheduledForDeletion = unserialize(serialize($actiontypeTissuetypesToDelete));

        foreach ($actiontypeTissuetypesToDelete as $actiontypeTissuetypeRemoved) {
            $actiontypeTissuetypeRemoved->setActiontype(null);
        }

        $this->collActiontypeTissuetypes = null;
        foreach ($actiontypeTissuetypes as $actiontypeTissuetype) {
            $this->addActiontypeTissuetype($actiontypeTissuetype);
        }

        $this->collActiontypeTissuetypes = $actiontypeTissuetypes;
        $this->collActiontypeTissuetypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActiontypeTissuetype objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActiontypeTissuetype objects.
     * @throws PropelException
     */
    public function countActiontypeTissuetypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeTissuetypesPartial && !$this->isNew();
        if (null === $this->collActiontypeTissuetypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontypeTissuetypes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontypeTissuetypes());
            }
            $query = ActiontypeTissuetypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActiontype($this)
                ->count($con);
        }

        return count($this->collActiontypeTissuetypes);
    }

    /**
     * Method called to associate a ActiontypeTissuetype object to this object
     * through the ActiontypeTissuetype foreign key attribute.
     *
     * @param    ActiontypeTissuetype $l ActiontypeTissuetype
     * @return Actiontype The current object (for fluent API support)
     */
    public function addActiontypeTissuetype(ActiontypeTissuetype $l)
    {
        if ($this->collActiontypeTissuetypes === null) {
            $this->initActiontypeTissuetypes();
            $this->collActiontypeTissuetypesPartial = true;
        }
        if (!in_array($l, $this->collActiontypeTissuetypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontypeTissuetype($l);
        }

        return $this;
    }

    /**
     * @param	ActiontypeTissuetype $actiontypeTissuetype The actiontypeTissuetype object to add.
     */
    protected function doAddActiontypeTissuetype($actiontypeTissuetype)
    {
        $this->collActiontypeTissuetypes[]= $actiontypeTissuetype;
        $actiontypeTissuetype->setActiontype($this);
    }

    /**
     * @param	ActiontypeTissuetype $actiontypeTissuetype The actiontypeTissuetype object to remove.
     * @return Actiontype The current object (for fluent API support)
     */
    public function removeActiontypeTissuetype($actiontypeTissuetype)
    {
        if ($this->getActiontypeTissuetypes()->contains($actiontypeTissuetype)) {
            $this->collActiontypeTissuetypes->remove($this->collActiontypeTissuetypes->search($actiontypeTissuetype));
            if (null === $this->actiontypeTissuetypesScheduledForDeletion) {
                $this->actiontypeTissuetypesScheduledForDeletion = clone $this->collActiontypeTissuetypes;
                $this->actiontypeTissuetypesScheduledForDeletion->clear();
            }
            $this->actiontypeTissuetypesScheduledForDeletion[]= clone $actiontypeTissuetype;
            $actiontypeTissuetype->setActiontype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actiontype is new, it will return
     * an empty collection; or if this Actiontype has previously
     * been saved, it will retrieve related ActiontypeTissuetypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actiontype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeTissuetype[] List of ActiontypeTissuetype objects
     */
    public function getActiontypeTissuetypesJoinRbtissuetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeTissuetypeQuery::create(null, $criteria);
        $query->joinWith('Rbtissuetype', $join_behavior);

        return $this->getActiontypeTissuetypes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actiontype is new, it will return
     * an empty collection; or if this Actiontype has previously
     * been saved, it will retrieve related ActiontypeTissuetypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actiontype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeTissuetype[] List of ActiontypeTissuetype objects
     */
    public function getActiontypeTissuetypesJoinRbunit($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeTissuetypeQuery::create(null, $criteria);
        $query->joinWith('Rbunit', $join_behavior);

        return $this->getActiontypeTissuetypes($query, $con);
    }

    /**
     * Clears out the collBlankactionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actiontype The current object (for fluent API support)
     * @see        addBlankactionss()
     */
    public function clearBlankactionss()
    {
        $this->collBlankactionss = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionssPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionss collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionss($v = true)
    {
        $this->collBlankactionssPartial = $v;
    }

    /**
     * Initializes the collBlankactionss collection.
     *
     * By default this just sets the collBlankactionss collection to an empty array (like clearcollBlankactionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionss($overrideExisting = true)
    {
        if (null !== $this->collBlankactionss && !$overrideExisting) {
            return;
        }
        $this->collBlankactionss = new PropelObjectCollection();
        $this->collBlankactionss->setModel('Blankactions');
    }

    /**
     * Gets an array of Blankactions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actiontype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Blankactions[] List of Blankactions objects
     * @throws PropelException
     */
    public function getBlankactionss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionssPartial && !$this->isNew();
        if (null === $this->collBlankactionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionss) {
                // return empty collection
                $this->initBlankactionss();
            } else {
                $collBlankactionss = BlankactionsQuery::create(null, $criteria)
                    ->filterByActiontype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionssPartial && count($collBlankactionss)) {
                      $this->initBlankactionss(false);

                      foreach($collBlankactionss as $obj) {
                        if (false == $this->collBlankactionss->contains($obj)) {
                          $this->collBlankactionss->append($obj);
                        }
                      }

                      $this->collBlankactionssPartial = true;
                    }

                    $collBlankactionss->getInternalIterator()->rewind();
                    return $collBlankactionss;
                }

                if($partial && $this->collBlankactionss) {
                    foreach($this->collBlankactionss as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionss[] = $obj;
                        }
                    }
                }

                $this->collBlankactionss = $collBlankactionss;
                $this->collBlankactionssPartial = false;
            }
        }

        return $this->collBlankactionss;
    }

    /**
     * Sets a collection of Blankactions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actiontype The current object (for fluent API support)
     */
    public function setBlankactionss(PropelCollection $blankactionss, PropelPDO $con = null)
    {
        $blankactionssToDelete = $this->getBlankactionss(new Criteria(), $con)->diff($blankactionss);

        $this->blankactionssScheduledForDeletion = unserialize(serialize($blankactionssToDelete));

        foreach ($blankactionssToDelete as $blankactionsRemoved) {
            $blankactionsRemoved->setActiontype(null);
        }

        $this->collBlankactionss = null;
        foreach ($blankactionss as $blankactions) {
            $this->addBlankactions($blankactions);
        }

        $this->collBlankactionss = $blankactionss;
        $this->collBlankactionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Blankactions objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Blankactions objects.
     * @throws PropelException
     */
    public function countBlankactionss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionssPartial && !$this->isNew();
        if (null === $this->collBlankactionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionss) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionss());
            }
            $query = BlankactionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActiontype($this)
                ->count($con);
        }

        return count($this->collBlankactionss);
    }

    /**
     * Method called to associate a Blankactions object to this object
     * through the Blankactions foreign key attribute.
     *
     * @param    Blankactions $l Blankactions
     * @return Actiontype The current object (for fluent API support)
     */
    public function addBlankactions(Blankactions $l)
    {
        if ($this->collBlankactionss === null) {
            $this->initBlankactionss();
            $this->collBlankactionssPartial = true;
        }
        if (!in_array($l, $this->collBlankactionss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactions($l);
        }

        return $this;
    }

    /**
     * @param	Blankactions $blankactions The blankactions object to add.
     */
    protected function doAddBlankactions($blankactions)
    {
        $this->collBlankactionss[]= $blankactions;
        $blankactions->setActiontype($this);
    }

    /**
     * @param	Blankactions $blankactions The blankactions object to remove.
     * @return Actiontype The current object (for fluent API support)
     */
    public function removeBlankactions($blankactions)
    {
        if ($this->getBlankactionss()->contains($blankactions)) {
            $this->collBlankactionss->remove($this->collBlankactionss->search($blankactions));
            if (null === $this->blankactionssScheduledForDeletion) {
                $this->blankactionssScheduledForDeletion = clone $this->collBlankactionss;
                $this->blankactionssScheduledForDeletion->clear();
            }
            $this->blankactionssScheduledForDeletion[]= $blankactions;
            $blankactions->setActiontype(null);
        }

        return $this;
    }

    /**
     * Clears out the collRbblankactionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Actiontype The current object (for fluent API support)
     * @see        addRbblankactionss()
     */
    public function clearRbblankactionss()
    {
        $this->collRbblankactionss = null; // important to set this to null since that means it is uninitialized
        $this->collRbblankactionssPartial = null;

        return $this;
    }

    /**
     * reset is the collRbblankactionss collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbblankactionss($v = true)
    {
        $this->collRbblankactionssPartial = $v;
    }

    /**
     * Initializes the collRbblankactionss collection.
     *
     * By default this just sets the collRbblankactionss collection to an empty array (like clearcollRbblankactionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbblankactionss($overrideExisting = true)
    {
        if (null !== $this->collRbblankactionss && !$overrideExisting) {
            return;
        }
        $this->collRbblankactionss = new PropelObjectCollection();
        $this->collRbblankactionss->setModel('Rbblankactions');
    }

    /**
     * Gets an array of Rbblankactions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Actiontype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rbblankactions[] List of Rbblankactions objects
     * @throws PropelException
     */
    public function getRbblankactionss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbblankactionssPartial && !$this->isNew();
        if (null === $this->collRbblankactionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbblankactionss) {
                // return empty collection
                $this->initRbblankactionss();
            } else {
                $collRbblankactionss = RbblankactionsQuery::create(null, $criteria)
                    ->filterByActiontype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbblankactionssPartial && count($collRbblankactionss)) {
                      $this->initRbblankactionss(false);

                      foreach($collRbblankactionss as $obj) {
                        if (false == $this->collRbblankactionss->contains($obj)) {
                          $this->collRbblankactionss->append($obj);
                        }
                      }

                      $this->collRbblankactionssPartial = true;
                    }

                    $collRbblankactionss->getInternalIterator()->rewind();
                    return $collRbblankactionss;
                }

                if($partial && $this->collRbblankactionss) {
                    foreach($this->collRbblankactionss as $obj) {
                        if($obj->isNew()) {
                            $collRbblankactionss[] = $obj;
                        }
                    }
                }

                $this->collRbblankactionss = $collRbblankactionss;
                $this->collRbblankactionssPartial = false;
            }
        }

        return $this->collRbblankactionss;
    }

    /**
     * Sets a collection of Rbblankactions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbblankactionss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Actiontype The current object (for fluent API support)
     */
    public function setRbblankactionss(PropelCollection $rbblankactionss, PropelPDO $con = null)
    {
        $rbblankactionssToDelete = $this->getRbblankactionss(new Criteria(), $con)->diff($rbblankactionss);

        $this->rbblankactionssScheduledForDeletion = unserialize(serialize($rbblankactionssToDelete));

        foreach ($rbblankactionssToDelete as $rbblankactionsRemoved) {
            $rbblankactionsRemoved->setActiontype(null);
        }

        $this->collRbblankactionss = null;
        foreach ($rbblankactionss as $rbblankactions) {
            $this->addRbblankactions($rbblankactions);
        }

        $this->collRbblankactionss = $rbblankactionss;
        $this->collRbblankactionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbblankactions objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rbblankactions objects.
     * @throws PropelException
     */
    public function countRbblankactionss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbblankactionssPartial && !$this->isNew();
        if (null === $this->collRbblankactionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbblankactionss) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbblankactionss());
            }
            $query = RbblankactionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActiontype($this)
                ->count($con);
        }

        return count($this->collRbblankactionss);
    }

    /**
     * Method called to associate a Rbblankactions object to this object
     * through the Rbblankactions foreign key attribute.
     *
     * @param    Rbblankactions $l Rbblankactions
     * @return Actiontype The current object (for fluent API support)
     */
    public function addRbblankactions(Rbblankactions $l)
    {
        if ($this->collRbblankactionss === null) {
            $this->initRbblankactionss();
            $this->collRbblankactionssPartial = true;
        }
        if (!in_array($l, $this->collRbblankactionss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbblankactions($l);
        }

        return $this;
    }

    /**
     * @param	Rbblankactions $rbblankactions The rbblankactions object to add.
     */
    protected function doAddRbblankactions($rbblankactions)
    {
        $this->collRbblankactionss[]= $rbblankactions;
        $rbblankactions->setActiontype($this);
    }

    /**
     * @param	Rbblankactions $rbblankactions The rbblankactions object to remove.
     * @return Actiontype The current object (for fluent API support)
     */
    public function removeRbblankactions($rbblankactions)
    {
        if ($this->getRbblankactionss()->contains($rbblankactions)) {
            $this->collRbblankactionss->remove($this->collRbblankactionss->search($rbblankactions));
            if (null === $this->rbblankactionssScheduledForDeletion) {
                $this->rbblankactionssScheduledForDeletion = clone $this->collRbblankactionss;
                $this->rbblankactionssScheduledForDeletion->clear();
            }
            $this->rbblankactionssScheduledForDeletion[]= clone $rbblankactions;
            $rbblankactions->setActiontype(null);
        }

        return $this;
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
        $this->class = null;
        $this->group_id = null;
        $this->code = null;
        $this->name = null;
        $this->title = null;
        $this->flatcode = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->office = null;
        $this->showinform = null;
        $this->gentimetable = null;
        $this->service_id = null;
        $this->quotatype_id = null;
        $this->context = null;
        $this->amount = null;
        $this->amountevaluation = null;
        $this->defaultstatus = null;
        $this->defaultdirectiondate = null;
        $this->defaultplannedenddate = null;
        $this->defaultenddate = null;
        $this->defaultexecperson_id = null;
        $this->defaultpersoninevent = null;
        $this->defaultpersonineditor = null;
        $this->maxoccursinevent = null;
        $this->showtime = null;
        $this->ismes = null;
        $this->nomenclativeservice_id = null;
        $this->ispreferable = null;
        $this->prescribedtype_id = null;
        $this->shedule_id = null;
        $this->isrequiredcoordination = null;
        $this->isrequiredtissue = null;
        $this->testtubetype_id = null;
        $this->jobtype_id = null;
        $this->mnem = null;
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
            if ($this->collActiontypeEventtypeChecksRelatedByActiontypeId) {
                foreach ($this->collActiontypeEventtypeChecksRelatedByActiontypeId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId) {
                foreach ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActiontypeTissuetypes) {
                foreach ($this->collActiontypeTissuetypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionss) {
                foreach ($this->collBlankactionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbblankactionss) {
                foreach ($this->collRbblankactionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPerson instanceof Persistent) {
              $this->aPerson->clearAllReferences($deep);
            }
            if ($this->aRbjobtype instanceof Persistent) {
              $this->aRbjobtype->clearAllReferences($deep);
            }
            if ($this->aRbtesttubetype instanceof Persistent) {
              $this->aRbtesttubetype->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActiontypeEventtypeChecksRelatedByActiontypeId instanceof PropelCollection) {
            $this->collActiontypeEventtypeChecksRelatedByActiontypeId->clearIterator();
        }
        $this->collActiontypeEventtypeChecksRelatedByActiontypeId = null;
        if ($this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId instanceof PropelCollection) {
            $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId->clearIterator();
        }
        $this->collActiontypeEventtypeChecksRelatedByRelatedActiontypeId = null;
        if ($this->collActiontypeTissuetypes instanceof PropelCollection) {
            $this->collActiontypeTissuetypes->clearIterator();
        }
        $this->collActiontypeTissuetypes = null;
        if ($this->collBlankactionss instanceof PropelCollection) {
            $this->collBlankactionss->clearIterator();
        }
        $this->collBlankactionss = null;
        if ($this->collRbblankactionss instanceof PropelCollection) {
            $this->collRbblankactionss->clearIterator();
        }
        $this->collRbblankactionss = null;
        $this->aPerson = null;
        $this->aRbjobtype = null;
        $this->aRbtesttubetype = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActiontypePeer::DEFAULT_STRING_FORMAT);
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
