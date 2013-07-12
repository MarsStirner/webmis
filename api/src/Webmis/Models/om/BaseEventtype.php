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
use Webmis\Models\ActiontypeEventtypeCheck;
use Webmis\Models\ActiontypeEventtypeCheckQuery;
use Webmis\Models\Eventtype;
use Webmis\Models\EventtypePeer;
use Webmis\Models\EventtypeQuery;
use Webmis\Models\Medicalkindunit;
use Webmis\Models\MedicalkindunitQuery;
use Webmis\Models\Rbcounter;
use Webmis\Models\RbcounterQuery;
use Webmis\Models\Rbmedicalkind;
use Webmis\Models\RbmedicalkindQuery;

/**
 * Base class that represents a row from the 'EventType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\EventtypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EventtypePeer
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
     * The value for the purpose_id field.
     * @var        int
     */
    protected $purpose_id;

    /**
     * The value for the finance_id field.
     * @var        int
     */
    protected $finance_id;

    /**
     * The value for the scene_id field.
     * @var        int
     */
    protected $scene_id;

    /**
     * The value for the visitservicemodifier field.
     * @var        string
     */
    protected $visitservicemodifier;

    /**
     * The value for the visitservicefilter field.
     * @var        string
     */
    protected $visitservicefilter;

    /**
     * The value for the visitfinance field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $visitfinance;

    /**
     * The value for the actionfinance field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $actionfinance;

    /**
     * The value for the period field.
     * @var        int
     */
    protected $period;

    /**
     * The value for the singleinperiod field.
     * @var        int
     */
    protected $singleinperiod;

    /**
     * The value for the islong field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $islong;

    /**
     * The value for the dateinput field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $dateinput;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

    /**
     * The value for the context field.
     * @var        string
     */
    protected $context;

    /**
     * The value for the form field.
     * @var        string
     */
    protected $form;

    /**
     * The value for the minduration field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $minduration;

    /**
     * The value for the maxduration field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $maxduration;

    /**
     * The value for the showstatusactionsinplanner field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $showstatusactionsinplanner;

    /**
     * The value for the showdiagnosticactionsinplanner field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $showdiagnosticactionsinplanner;

    /**
     * The value for the showcureactionsinplanner field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $showcureactionsinplanner;

    /**
     * The value for the showmiscactionsinplanner field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $showmiscactionsinplanner;

    /**
     * The value for the limitstatusactionsinput field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $limitstatusactionsinput;

    /**
     * The value for the limitdiagnosticactionsinput field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $limitdiagnosticactionsinput;

    /**
     * The value for the limitcureactionsinput field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $limitcureactionsinput;

    /**
     * The value for the limitmiscactionsinput field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $limitmiscactionsinput;

    /**
     * The value for the showtime field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $showtime;

    /**
     * The value for the medicalaidtype_id field.
     * @var        int
     */
    protected $medicalaidtype_id;

    /**
     * The value for the eventprofile_id field.
     * @var        int
     */
    protected $eventprofile_id;

    /**
     * The value for the mesrequired field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $mesrequired;

    /**
     * The value for the mescodemask field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mescodemask;

    /**
     * The value for the mesnamemask field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mesnamemask;

    /**
     * The value for the counter_id field.
     * @var        int
     */
    protected $counter_id;

    /**
     * The value for the isexternal field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isexternal;

    /**
     * The value for the isassistant field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isassistant;

    /**
     * The value for the iscurator field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $iscurator;

    /**
     * The value for the canhavepayableactions field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $canhavepayableactions;

    /**
     * The value for the isrequiredcoordination field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isrequiredcoordination;

    /**
     * The value for the isorgstructurepriority field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isorgstructurepriority;

    /**
     * The value for the istakentissue field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $istakentissue;

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
     * The value for the rbmedicalkind_id field.
     * @var        int
     */
    protected $rbmedicalkind_id;

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
     * The value for the requesttype_id field.
     * @var        int
     */
    protected $requesttype_id;

    /**
     * @var        Rbcounter
     */
    protected $aRbcounter;

    /**
     * @var        Rbmedicalkind
     */
    protected $aRbmedicalkind;

    /**
     * @var        PropelObjectCollection|ActiontypeEventtypeCheck[] Collection to store aggregation of ActiontypeEventtypeCheck objects.
     */
    protected $collActiontypeEventtypeChecks;
    protected $collActiontypeEventtypeChecksPartial;

    /**
     * @var        PropelObjectCollection|Medicalkindunit[] Collection to store aggregation of Medicalkindunit objects.
     */
    protected $collMedicalkindunits;
    protected $collMedicalkindunitsPartial;

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
    protected $actiontypeEventtypeChecksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $medicalkindunitsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->visitfinance = false;
        $this->actionfinance = false;
        $this->islong = false;
        $this->dateinput = false;
        $this->minduration = 0;
        $this->maxduration = 0;
        $this->showstatusactionsinplanner = true;
        $this->showdiagnosticactionsinplanner = true;
        $this->showcureactionsinplanner = true;
        $this->showmiscactionsinplanner = true;
        $this->limitstatusactionsinput = false;
        $this->limitdiagnosticactionsinput = false;
        $this->limitcureactionsinput = false;
        $this->limitmiscactionsinput = false;
        $this->showtime = false;
        $this->mesrequired = 0;
        $this->mescodemask = '';
        $this->mesnamemask = '';
        $this->isexternal = false;
        $this->isassistant = false;
        $this->iscurator = false;
        $this->canhavepayableactions = false;
        $this->isrequiredcoordination = false;
        $this->isorgstructurepriority = false;
        $this->istakentissue = false;
        $this->sex = 0;
    }

    /**
     * Initializes internal state of BaseEventtype object.
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
     * Get the [purpose_id] column value.
     *
     * @return int
     */
    public function getPurposeId()
    {
        return $this->purpose_id;
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
     * Get the [scene_id] column value.
     *
     * @return int
     */
    public function getSceneId()
    {
        return $this->scene_id;
    }

    /**
     * Get the [visitservicemodifier] column value.
     *
     * @return string
     */
    public function getVisitservicemodifier()
    {
        return $this->visitservicemodifier;
    }

    /**
     * Get the [visitservicefilter] column value.
     *
     * @return string
     */
    public function getVisitservicefilter()
    {
        return $this->visitservicefilter;
    }

    /**
     * Get the [visitfinance] column value.
     *
     * @return boolean
     */
    public function getVisitfinance()
    {
        return $this->visitfinance;
    }

    /**
     * Get the [actionfinance] column value.
     *
     * @return boolean
     */
    public function getActionfinance()
    {
        return $this->actionfinance;
    }

    /**
     * Get the [period] column value.
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Get the [singleinperiod] column value.
     *
     * @return int
     */
    public function getSingleinperiod()
    {
        return $this->singleinperiod;
    }

    /**
     * Get the [islong] column value.
     *
     * @return boolean
     */
    public function getIslong()
    {
        return $this->islong;
    }

    /**
     * Get the [dateinput] column value.
     *
     * @return boolean
     */
    public function getDateinput()
    {
        return $this->dateinput;
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
     * Get the [context] column value.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Get the [form] column value.
     *
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Get the [minduration] column value.
     *
     * @return int
     */
    public function getMinduration()
    {
        return $this->minduration;
    }

    /**
     * Get the [maxduration] column value.
     *
     * @return int
     */
    public function getMaxduration()
    {
        return $this->maxduration;
    }

    /**
     * Get the [showstatusactionsinplanner] column value.
     *
     * @return boolean
     */
    public function getShowstatusactionsinplanner()
    {
        return $this->showstatusactionsinplanner;
    }

    /**
     * Get the [showdiagnosticactionsinplanner] column value.
     *
     * @return boolean
     */
    public function getShowdiagnosticactionsinplanner()
    {
        return $this->showdiagnosticactionsinplanner;
    }

    /**
     * Get the [showcureactionsinplanner] column value.
     *
     * @return boolean
     */
    public function getShowcureactionsinplanner()
    {
        return $this->showcureactionsinplanner;
    }

    /**
     * Get the [showmiscactionsinplanner] column value.
     *
     * @return boolean
     */
    public function getShowmiscactionsinplanner()
    {
        return $this->showmiscactionsinplanner;
    }

    /**
     * Get the [limitstatusactionsinput] column value.
     *
     * @return boolean
     */
    public function getLimitstatusactionsinput()
    {
        return $this->limitstatusactionsinput;
    }

    /**
     * Get the [limitdiagnosticactionsinput] column value.
     *
     * @return boolean
     */
    public function getLimitdiagnosticactionsinput()
    {
        return $this->limitdiagnosticactionsinput;
    }

    /**
     * Get the [limitcureactionsinput] column value.
     *
     * @return boolean
     */
    public function getLimitcureactionsinput()
    {
        return $this->limitcureactionsinput;
    }

    /**
     * Get the [limitmiscactionsinput] column value.
     *
     * @return boolean
     */
    public function getLimitmiscactionsinput()
    {
        return $this->limitmiscactionsinput;
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
     * Get the [medicalaidtype_id] column value.
     *
     * @return int
     */
    public function getMedicalaidtypeId()
    {
        return $this->medicalaidtype_id;
    }

    /**
     * Get the [eventprofile_id] column value.
     *
     * @return int
     */
    public function getEventprofileId()
    {
        return $this->eventprofile_id;
    }

    /**
     * Get the [mesrequired] column value.
     *
     * @return int
     */
    public function getMesrequired()
    {
        return $this->mesrequired;
    }

    /**
     * Get the [mescodemask] column value.
     *
     * @return string
     */
    public function getMescodemask()
    {
        return $this->mescodemask;
    }

    /**
     * Get the [mesnamemask] column value.
     *
     * @return string
     */
    public function getMesnamemask()
    {
        return $this->mesnamemask;
    }

    /**
     * Get the [counter_id] column value.
     *
     * @return int
     */
    public function getCounterId()
    {
        return $this->counter_id;
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
     * Get the [isassistant] column value.
     *
     * @return boolean
     */
    public function getIsassistant()
    {
        return $this->isassistant;
    }

    /**
     * Get the [iscurator] column value.
     *
     * @return boolean
     */
    public function getIscurator()
    {
        return $this->iscurator;
    }

    /**
     * Get the [canhavepayableactions] column value.
     *
     * @return boolean
     */
    public function getCanhavepayableactions()
    {
        return $this->canhavepayableactions;
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
     * Get the [isorgstructurepriority] column value.
     *
     * @return boolean
     */
    public function getIsorgstructurepriority()
    {
        return $this->isorgstructurepriority;
    }

    /**
     * Get the [istakentissue] column value.
     *
     * @return boolean
     */
    public function getIstakentissue()
    {
        return $this->istakentissue;
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
     * Get the [rbmedicalkind_id] column value.
     *
     * @return int
     */
    public function getRbmedicalkindId()
    {
        return $this->rbmedicalkind_id;
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
     * Get the [requesttype_id] column value.
     *
     * @return int
     */
    public function getRequesttypeId()
    {
        return $this->requesttype_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EventtypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Eventtype The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = EventtypePeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = EventtypePeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Eventtype The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = EventtypePeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = EventtypePeer::MODIFYPERSON_ID;
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
     * @return Eventtype The current object (for fluent API support)
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
            $this->modifiedColumns[] = EventtypePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = EventtypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = EventtypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [purpose_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setPurposeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->purpose_id !== $v) {
            $this->purpose_id = $v;
            $this->modifiedColumns[] = EventtypePeer::PURPOSE_ID;
        }


        return $this;
    } // setPurposeId()

    /**
     * Set the value of [finance_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setFinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->finance_id !== $v) {
            $this->finance_id = $v;
            $this->modifiedColumns[] = EventtypePeer::FINANCE_ID;
        }


        return $this;
    } // setFinanceId()

    /**
     * Set the value of [scene_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setSceneId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->scene_id !== $v) {
            $this->scene_id = $v;
            $this->modifiedColumns[] = EventtypePeer::SCENE_ID;
        }


        return $this;
    } // setSceneId()

    /**
     * Set the value of [visitservicemodifier] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setVisitservicemodifier($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->visitservicemodifier !== $v) {
            $this->visitservicemodifier = $v;
            $this->modifiedColumns[] = EventtypePeer::VISITSERVICEMODIFIER;
        }


        return $this;
    } // setVisitservicemodifier()

    /**
     * Set the value of [visitservicefilter] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setVisitservicefilter($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->visitservicefilter !== $v) {
            $this->visitservicefilter = $v;
            $this->modifiedColumns[] = EventtypePeer::VISITSERVICEFILTER;
        }


        return $this;
    } // setVisitservicefilter()

    /**
     * Sets the value of the [visitfinance] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setVisitfinance($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->visitfinance !== $v) {
            $this->visitfinance = $v;
            $this->modifiedColumns[] = EventtypePeer::VISITFINANCE;
        }


        return $this;
    } // setVisitfinance()

    /**
     * Sets the value of the [actionfinance] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setActionfinance($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->actionfinance !== $v) {
            $this->actionfinance = $v;
            $this->modifiedColumns[] = EventtypePeer::ACTIONFINANCE;
        }


        return $this;
    } // setActionfinance()

    /**
     * Set the value of [period] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setPeriod($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->period !== $v) {
            $this->period = $v;
            $this->modifiedColumns[] = EventtypePeer::PERIOD;
        }


        return $this;
    } // setPeriod()

    /**
     * Set the value of [singleinperiod] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setSingleinperiod($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->singleinperiod !== $v) {
            $this->singleinperiod = $v;
            $this->modifiedColumns[] = EventtypePeer::SINGLEINPERIOD;
        }


        return $this;
    } // setSingleinperiod()

    /**
     * Sets the value of the [islong] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setIslong($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->islong !== $v) {
            $this->islong = $v;
            $this->modifiedColumns[] = EventtypePeer::ISLONG;
        }


        return $this;
    } // setIslong()

    /**
     * Sets the value of the [dateinput] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setDateinput($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->dateinput !== $v) {
            $this->dateinput = $v;
            $this->modifiedColumns[] = EventtypePeer::DATEINPUT;
        }


        return $this;
    } // setDateinput()

    /**
     * Set the value of [service_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = EventtypePeer::SERVICE_ID;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [context] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setContext($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->context !== $v) {
            $this->context = $v;
            $this->modifiedColumns[] = EventtypePeer::CONTEXT;
        }


        return $this;
    } // setContext()

    /**
     * Set the value of [form] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setForm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->form !== $v) {
            $this->form = $v;
            $this->modifiedColumns[] = EventtypePeer::FORM;
        }


        return $this;
    } // setForm()

    /**
     * Set the value of [minduration] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMinduration($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->minduration !== $v) {
            $this->minduration = $v;
            $this->modifiedColumns[] = EventtypePeer::MINDURATION;
        }


        return $this;
    } // setMinduration()

    /**
     * Set the value of [maxduration] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMaxduration($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->maxduration !== $v) {
            $this->maxduration = $v;
            $this->modifiedColumns[] = EventtypePeer::MAXDURATION;
        }


        return $this;
    } // setMaxduration()

    /**
     * Sets the value of the [showstatusactionsinplanner] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setShowstatusactionsinplanner($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->showstatusactionsinplanner !== $v) {
            $this->showstatusactionsinplanner = $v;
            $this->modifiedColumns[] = EventtypePeer::SHOWSTATUSACTIONSINPLANNER;
        }


        return $this;
    } // setShowstatusactionsinplanner()

    /**
     * Sets the value of the [showdiagnosticactionsinplanner] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setShowdiagnosticactionsinplanner($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->showdiagnosticactionsinplanner !== $v) {
            $this->showdiagnosticactionsinplanner = $v;
            $this->modifiedColumns[] = EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER;
        }


        return $this;
    } // setShowdiagnosticactionsinplanner()

    /**
     * Sets the value of the [showcureactionsinplanner] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setShowcureactionsinplanner($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->showcureactionsinplanner !== $v) {
            $this->showcureactionsinplanner = $v;
            $this->modifiedColumns[] = EventtypePeer::SHOWCUREACTIONSINPLANNER;
        }


        return $this;
    } // setShowcureactionsinplanner()

    /**
     * Sets the value of the [showmiscactionsinplanner] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setShowmiscactionsinplanner($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->showmiscactionsinplanner !== $v) {
            $this->showmiscactionsinplanner = $v;
            $this->modifiedColumns[] = EventtypePeer::SHOWMISCACTIONSINPLANNER;
        }


        return $this;
    } // setShowmiscactionsinplanner()

    /**
     * Sets the value of the [limitstatusactionsinput] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setLimitstatusactionsinput($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->limitstatusactionsinput !== $v) {
            $this->limitstatusactionsinput = $v;
            $this->modifiedColumns[] = EventtypePeer::LIMITSTATUSACTIONSINPUT;
        }


        return $this;
    } // setLimitstatusactionsinput()

    /**
     * Sets the value of the [limitdiagnosticactionsinput] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setLimitdiagnosticactionsinput($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->limitdiagnosticactionsinput !== $v) {
            $this->limitdiagnosticactionsinput = $v;
            $this->modifiedColumns[] = EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT;
        }


        return $this;
    } // setLimitdiagnosticactionsinput()

    /**
     * Sets the value of the [limitcureactionsinput] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setLimitcureactionsinput($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->limitcureactionsinput !== $v) {
            $this->limitcureactionsinput = $v;
            $this->modifiedColumns[] = EventtypePeer::LIMITCUREACTIONSINPUT;
        }


        return $this;
    } // setLimitcureactionsinput()

    /**
     * Sets the value of the [limitmiscactionsinput] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setLimitmiscactionsinput($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->limitmiscactionsinput !== $v) {
            $this->limitmiscactionsinput = $v;
            $this->modifiedColumns[] = EventtypePeer::LIMITMISCACTIONSINPUT;
        }


        return $this;
    } // setLimitmiscactionsinput()

    /**
     * Sets the value of the [showtime] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
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
            $this->modifiedColumns[] = EventtypePeer::SHOWTIME;
        }


        return $this;
    } // setShowtime()

    /**
     * Set the value of [medicalaidtype_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMedicalaidtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->medicalaidtype_id !== $v) {
            $this->medicalaidtype_id = $v;
            $this->modifiedColumns[] = EventtypePeer::MEDICALAIDTYPE_ID;
        }


        return $this;
    } // setMedicalaidtypeId()

    /**
     * Set the value of [eventprofile_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setEventprofileId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->eventprofile_id !== $v) {
            $this->eventprofile_id = $v;
            $this->modifiedColumns[] = EventtypePeer::EVENTPROFILE_ID;
        }


        return $this;
    } // setEventprofileId()

    /**
     * Set the value of [mesrequired] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMesrequired($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mesrequired !== $v) {
            $this->mesrequired = $v;
            $this->modifiedColumns[] = EventtypePeer::MESREQUIRED;
        }


        return $this;
    } // setMesrequired()

    /**
     * Set the value of [mescodemask] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMescodemask($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mescodemask !== $v) {
            $this->mescodemask = $v;
            $this->modifiedColumns[] = EventtypePeer::MESCODEMASK;
        }


        return $this;
    } // setMescodemask()

    /**
     * Set the value of [mesnamemask] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMesnamemask($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mesnamemask !== $v) {
            $this->mesnamemask = $v;
            $this->modifiedColumns[] = EventtypePeer::MESNAMEMASK;
        }


        return $this;
    } // setMesnamemask()

    /**
     * Set the value of [counter_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setCounterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->counter_id !== $v) {
            $this->counter_id = $v;
            $this->modifiedColumns[] = EventtypePeer::COUNTER_ID;
        }

        if ($this->aRbcounter !== null && $this->aRbcounter->getId() !== $v) {
            $this->aRbcounter = null;
        }


        return $this;
    } // setCounterId()

    /**
     * Sets the value of the [isexternal] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
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
            $this->modifiedColumns[] = EventtypePeer::ISEXTERNAL;
        }


        return $this;
    } // setIsexternal()

    /**
     * Sets the value of the [isassistant] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setIsassistant($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isassistant !== $v) {
            $this->isassistant = $v;
            $this->modifiedColumns[] = EventtypePeer::ISASSISTANT;
        }


        return $this;
    } // setIsassistant()

    /**
     * Sets the value of the [iscurator] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setIscurator($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->iscurator !== $v) {
            $this->iscurator = $v;
            $this->modifiedColumns[] = EventtypePeer::ISCURATOR;
        }


        return $this;
    } // setIscurator()

    /**
     * Sets the value of the [canhavepayableactions] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setCanhavepayableactions($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->canhavepayableactions !== $v) {
            $this->canhavepayableactions = $v;
            $this->modifiedColumns[] = EventtypePeer::CANHAVEPAYABLEACTIONS;
        }


        return $this;
    } // setCanhavepayableactions()

    /**
     * Sets the value of the [isrequiredcoordination] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
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
            $this->modifiedColumns[] = EventtypePeer::ISREQUIREDCOORDINATION;
        }


        return $this;
    } // setIsrequiredcoordination()

    /**
     * Sets the value of the [isorgstructurepriority] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setIsorgstructurepriority($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isorgstructurepriority !== $v) {
            $this->isorgstructurepriority = $v;
            $this->modifiedColumns[] = EventtypePeer::ISORGSTRUCTUREPRIORITY;
        }


        return $this;
    } // setIsorgstructurepriority()

    /**
     * Sets the value of the [istakentissue] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setIstakentissue($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->istakentissue !== $v) {
            $this->istakentissue = $v;
            $this->modifiedColumns[] = EventtypePeer::ISTAKENTISSUE;
        }


        return $this;
    } // setIstakentissue()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = EventtypePeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = EventtypePeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [rbmedicalkind_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setRbmedicalkindId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbmedicalkind_id !== $v) {
            $this->rbmedicalkind_id = $v;
            $this->modifiedColumns[] = EventtypePeer::RBMEDICALKIND_ID;
        }

        if ($this->aRbmedicalkind !== null && $this->aRbmedicalkind->getId() !== $v) {
            $this->aRbmedicalkind = null;
        }


        return $this;
    } // setRbmedicalkindId()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = EventtypePeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = EventtypePeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = EventtypePeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = EventtypePeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [requesttype_id] column.
     *
     * @param int $v new value
     * @return Eventtype The current object (for fluent API support)
     */
    public function setRequesttypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->requesttype_id !== $v) {
            $this->requesttype_id = $v;
            $this->modifiedColumns[] = EventtypePeer::REQUESTTYPE_ID;
        }


        return $this;
    } // setRequesttypeId()

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

            if ($this->visitfinance !== false) {
                return false;
            }

            if ($this->actionfinance !== false) {
                return false;
            }

            if ($this->islong !== false) {
                return false;
            }

            if ($this->dateinput !== false) {
                return false;
            }

            if ($this->minduration !== 0) {
                return false;
            }

            if ($this->maxduration !== 0) {
                return false;
            }

            if ($this->showstatusactionsinplanner !== true) {
                return false;
            }

            if ($this->showdiagnosticactionsinplanner !== true) {
                return false;
            }

            if ($this->showcureactionsinplanner !== true) {
                return false;
            }

            if ($this->showmiscactionsinplanner !== true) {
                return false;
            }

            if ($this->limitstatusactionsinput !== false) {
                return false;
            }

            if ($this->limitdiagnosticactionsinput !== false) {
                return false;
            }

            if ($this->limitcureactionsinput !== false) {
                return false;
            }

            if ($this->limitmiscactionsinput !== false) {
                return false;
            }

            if ($this->showtime !== false) {
                return false;
            }

            if ($this->mesrequired !== 0) {
                return false;
            }

            if ($this->mescodemask !== '') {
                return false;
            }

            if ($this->mesnamemask !== '') {
                return false;
            }

            if ($this->isexternal !== false) {
                return false;
            }

            if ($this->isassistant !== false) {
                return false;
            }

            if ($this->iscurator !== false) {
                return false;
            }

            if ($this->canhavepayableactions !== false) {
                return false;
            }

            if ($this->isrequiredcoordination !== false) {
                return false;
            }

            if ($this->isorgstructurepriority !== false) {
                return false;
            }

            if ($this->istakentissue !== false) {
                return false;
            }

            if ($this->sex !== 0) {
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
            $this->code = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->purpose_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->finance_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->scene_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->visitservicemodifier = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->visitservicefilter = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->visitfinance = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
            $this->actionfinance = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
            $this->period = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->singleinperiod = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->islong = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
            $this->dateinput = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
            $this->service_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->context = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->form = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->minduration = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
            $this->maxduration = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->showstatusactionsinplanner = ($row[$startcol + 24] !== null) ? (boolean) $row[$startcol + 24] : null;
            $this->showdiagnosticactionsinplanner = ($row[$startcol + 25] !== null) ? (boolean) $row[$startcol + 25] : null;
            $this->showcureactionsinplanner = ($row[$startcol + 26] !== null) ? (boolean) $row[$startcol + 26] : null;
            $this->showmiscactionsinplanner = ($row[$startcol + 27] !== null) ? (boolean) $row[$startcol + 27] : null;
            $this->limitstatusactionsinput = ($row[$startcol + 28] !== null) ? (boolean) $row[$startcol + 28] : null;
            $this->limitdiagnosticactionsinput = ($row[$startcol + 29] !== null) ? (boolean) $row[$startcol + 29] : null;
            $this->limitcureactionsinput = ($row[$startcol + 30] !== null) ? (boolean) $row[$startcol + 30] : null;
            $this->limitmiscactionsinput = ($row[$startcol + 31] !== null) ? (boolean) $row[$startcol + 31] : null;
            $this->showtime = ($row[$startcol + 32] !== null) ? (boolean) $row[$startcol + 32] : null;
            $this->medicalaidtype_id = ($row[$startcol + 33] !== null) ? (int) $row[$startcol + 33] : null;
            $this->eventprofile_id = ($row[$startcol + 34] !== null) ? (int) $row[$startcol + 34] : null;
            $this->mesrequired = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
            $this->mescodemask = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->mesnamemask = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->counter_id = ($row[$startcol + 38] !== null) ? (int) $row[$startcol + 38] : null;
            $this->isexternal = ($row[$startcol + 39] !== null) ? (boolean) $row[$startcol + 39] : null;
            $this->isassistant = ($row[$startcol + 40] !== null) ? (boolean) $row[$startcol + 40] : null;
            $this->iscurator = ($row[$startcol + 41] !== null) ? (boolean) $row[$startcol + 41] : null;
            $this->canhavepayableactions = ($row[$startcol + 42] !== null) ? (boolean) $row[$startcol + 42] : null;
            $this->isrequiredcoordination = ($row[$startcol + 43] !== null) ? (boolean) $row[$startcol + 43] : null;
            $this->isorgstructurepriority = ($row[$startcol + 44] !== null) ? (boolean) $row[$startcol + 44] : null;
            $this->istakentissue = ($row[$startcol + 45] !== null) ? (boolean) $row[$startcol + 45] : null;
            $this->sex = ($row[$startcol + 46] !== null) ? (int) $row[$startcol + 46] : null;
            $this->age = ($row[$startcol + 47] !== null) ? (string) $row[$startcol + 47] : null;
            $this->rbmedicalkind_id = ($row[$startcol + 48] !== null) ? (int) $row[$startcol + 48] : null;
            $this->age_bu = ($row[$startcol + 49] !== null) ? (int) $row[$startcol + 49] : null;
            $this->age_bc = ($row[$startcol + 50] !== null) ? (int) $row[$startcol + 50] : null;
            $this->age_eu = ($row[$startcol + 51] !== null) ? (int) $row[$startcol + 51] : null;
            $this->age_ec = ($row[$startcol + 52] !== null) ? (int) $row[$startcol + 52] : null;
            $this->requesttype_id = ($row[$startcol + 53] !== null) ? (int) $row[$startcol + 53] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 54; // 54 = EventtypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Eventtype object", $e);
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

        if ($this->aRbcounter !== null && $this->counter_id !== $this->aRbcounter->getId()) {
            $this->aRbcounter = null;
        }
        if ($this->aRbmedicalkind !== null && $this->rbmedicalkind_id !== $this->aRbmedicalkind->getId()) {
            $this->aRbmedicalkind = null;
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
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EventtypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbcounter = null;
            $this->aRbmedicalkind = null;
            $this->collActiontypeEventtypeChecks = null;

            $this->collMedicalkindunits = null;

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
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EventtypeQuery::create()
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
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EventtypePeer::addInstanceToPool($this);
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

            if ($this->aRbcounter !== null) {
                if ($this->aRbcounter->isModified() || $this->aRbcounter->isNew()) {
                    $affectedRows += $this->aRbcounter->save($con);
                }
                $this->setRbcounter($this->aRbcounter);
            }

            if ($this->aRbmedicalkind !== null) {
                if ($this->aRbmedicalkind->isModified() || $this->aRbmedicalkind->isNew()) {
                    $affectedRows += $this->aRbmedicalkind->save($con);
                }
                $this->setRbmedicalkind($this->aRbmedicalkind);
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

            if ($this->actiontypeEventtypeChecksScheduledForDeletion !== null) {
                if (!$this->actiontypeEventtypeChecksScheduledForDeletion->isEmpty()) {
                    ActiontypeEventtypeCheckQuery::create()
                        ->filterByPrimaryKeys($this->actiontypeEventtypeChecksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actiontypeEventtypeChecksScheduledForDeletion = null;
                }
            }

            if ($this->collActiontypeEventtypeChecks !== null) {
                foreach ($this->collActiontypeEventtypeChecks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->medicalkindunitsScheduledForDeletion !== null) {
                if (!$this->medicalkindunitsScheduledForDeletion->isEmpty()) {
                    foreach ($this->medicalkindunitsScheduledForDeletion as $medicalkindunit) {
                        // need to save related object because we set the relation to null
                        $medicalkindunit->save($con);
                    }
                    $this->medicalkindunitsScheduledForDeletion = null;
                }
            }

            if ($this->collMedicalkindunits !== null) {
                foreach ($this->collMedicalkindunits as $referrerFK) {
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

        $this->modifiedColumns[] = EventtypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EventtypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EventtypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EventtypePeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(EventtypePeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(EventtypePeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(EventtypePeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(EventtypePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(EventtypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(EventtypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(EventtypePeer::PURPOSE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`purpose_id`';
        }
        if ($this->isColumnModified(EventtypePeer::FINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`finance_id`';
        }
        if ($this->isColumnModified(EventtypePeer::SCENE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`scene_id`';
        }
        if ($this->isColumnModified(EventtypePeer::VISITSERVICEMODIFIER)) {
            $modifiedColumns[':p' . $index++]  = '`visitServiceModifier`';
        }
        if ($this->isColumnModified(EventtypePeer::VISITSERVICEFILTER)) {
            $modifiedColumns[':p' . $index++]  = '`visitServiceFilter`';
        }
        if ($this->isColumnModified(EventtypePeer::VISITFINANCE)) {
            $modifiedColumns[':p' . $index++]  = '`visitFinance`';
        }
        if ($this->isColumnModified(EventtypePeer::ACTIONFINANCE)) {
            $modifiedColumns[':p' . $index++]  = '`actionFinance`';
        }
        if ($this->isColumnModified(EventtypePeer::PERIOD)) {
            $modifiedColumns[':p' . $index++]  = '`period`';
        }
        if ($this->isColumnModified(EventtypePeer::SINGLEINPERIOD)) {
            $modifiedColumns[':p' . $index++]  = '`singleInPeriod`';
        }
        if ($this->isColumnModified(EventtypePeer::ISLONG)) {
            $modifiedColumns[':p' . $index++]  = '`isLong`';
        }
        if ($this->isColumnModified(EventtypePeer::DATEINPUT)) {
            $modifiedColumns[':p' . $index++]  = '`dateInput`';
        }
        if ($this->isColumnModified(EventtypePeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }
        if ($this->isColumnModified(EventtypePeer::CONTEXT)) {
            $modifiedColumns[':p' . $index++]  = '`context`';
        }
        if ($this->isColumnModified(EventtypePeer::FORM)) {
            $modifiedColumns[':p' . $index++]  = '`form`';
        }
        if ($this->isColumnModified(EventtypePeer::MINDURATION)) {
            $modifiedColumns[':p' . $index++]  = '`minDuration`';
        }
        if ($this->isColumnModified(EventtypePeer::MAXDURATION)) {
            $modifiedColumns[':p' . $index++]  = '`maxDuration`';
        }
        if ($this->isColumnModified(EventtypePeer::SHOWSTATUSACTIONSINPLANNER)) {
            $modifiedColumns[':p' . $index++]  = '`showStatusActionsInPlanner`';
        }
        if ($this->isColumnModified(EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER)) {
            $modifiedColumns[':p' . $index++]  = '`showDiagnosticActionsInPlanner`';
        }
        if ($this->isColumnModified(EventtypePeer::SHOWCUREACTIONSINPLANNER)) {
            $modifiedColumns[':p' . $index++]  = '`showCureActionsInPlanner`';
        }
        if ($this->isColumnModified(EventtypePeer::SHOWMISCACTIONSINPLANNER)) {
            $modifiedColumns[':p' . $index++]  = '`showMiscActionsInPlanner`';
        }
        if ($this->isColumnModified(EventtypePeer::LIMITSTATUSACTIONSINPUT)) {
            $modifiedColumns[':p' . $index++]  = '`limitStatusActionsInput`';
        }
        if ($this->isColumnModified(EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT)) {
            $modifiedColumns[':p' . $index++]  = '`limitDiagnosticActionsInput`';
        }
        if ($this->isColumnModified(EventtypePeer::LIMITCUREACTIONSINPUT)) {
            $modifiedColumns[':p' . $index++]  = '`limitCureActionsInput`';
        }
        if ($this->isColumnModified(EventtypePeer::LIMITMISCACTIONSINPUT)) {
            $modifiedColumns[':p' . $index++]  = '`limitMiscActionsInput`';
        }
        if ($this->isColumnModified(EventtypePeer::SHOWTIME)) {
            $modifiedColumns[':p' . $index++]  = '`showTime`';
        }
        if ($this->isColumnModified(EventtypePeer::MEDICALAIDTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`medicalAidType_id`';
        }
        if ($this->isColumnModified(EventtypePeer::EVENTPROFILE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`eventProfile_id`';
        }
        if ($this->isColumnModified(EventtypePeer::MESREQUIRED)) {
            $modifiedColumns[':p' . $index++]  = '`mesRequired`';
        }
        if ($this->isColumnModified(EventtypePeer::MESCODEMASK)) {
            $modifiedColumns[':p' . $index++]  = '`mesCodeMask`';
        }
        if ($this->isColumnModified(EventtypePeer::MESNAMEMASK)) {
            $modifiedColumns[':p' . $index++]  = '`mesNameMask`';
        }
        if ($this->isColumnModified(EventtypePeer::COUNTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`counter_id`';
        }
        if ($this->isColumnModified(EventtypePeer::ISEXTERNAL)) {
            $modifiedColumns[':p' . $index++]  = '`isExternal`';
        }
        if ($this->isColumnModified(EventtypePeer::ISASSISTANT)) {
            $modifiedColumns[':p' . $index++]  = '`isAssistant`';
        }
        if ($this->isColumnModified(EventtypePeer::ISCURATOR)) {
            $modifiedColumns[':p' . $index++]  = '`isCurator`';
        }
        if ($this->isColumnModified(EventtypePeer::CANHAVEPAYABLEACTIONS)) {
            $modifiedColumns[':p' . $index++]  = '`canHavePayableActions`';
        }
        if ($this->isColumnModified(EventtypePeer::ISREQUIREDCOORDINATION)) {
            $modifiedColumns[':p' . $index++]  = '`isRequiredCoordination`';
        }
        if ($this->isColumnModified(EventtypePeer::ISORGSTRUCTUREPRIORITY)) {
            $modifiedColumns[':p' . $index++]  = '`isOrgStructurePriority`';
        }
        if ($this->isColumnModified(EventtypePeer::ISTAKENTISSUE)) {
            $modifiedColumns[':p' . $index++]  = '`isTakenTissue`';
        }
        if ($this->isColumnModified(EventtypePeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(EventtypePeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(EventtypePeer::RBMEDICALKIND_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbMedicalKind_id`';
        }
        if ($this->isColumnModified(EventtypePeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(EventtypePeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(EventtypePeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(EventtypePeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(EventtypePeer::REQUESTTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`requestType_id`';
        }

        $sql = sprintf(
            'INSERT INTO `EventType` (%s) VALUES (%s)',
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
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`purpose_id`':
                        $stmt->bindValue($identifier, $this->purpose_id, PDO::PARAM_INT);
                        break;
                    case '`finance_id`':
                        $stmt->bindValue($identifier, $this->finance_id, PDO::PARAM_INT);
                        break;
                    case '`scene_id`':
                        $stmt->bindValue($identifier, $this->scene_id, PDO::PARAM_INT);
                        break;
                    case '`visitServiceModifier`':
                        $stmt->bindValue($identifier, $this->visitservicemodifier, PDO::PARAM_STR);
                        break;
                    case '`visitServiceFilter`':
                        $stmt->bindValue($identifier, $this->visitservicefilter, PDO::PARAM_STR);
                        break;
                    case '`visitFinance`':
                        $stmt->bindValue($identifier, (int) $this->visitfinance, PDO::PARAM_INT);
                        break;
                    case '`actionFinance`':
                        $stmt->bindValue($identifier, (int) $this->actionfinance, PDO::PARAM_INT);
                        break;
                    case '`period`':
                        $stmt->bindValue($identifier, $this->period, PDO::PARAM_INT);
                        break;
                    case '`singleInPeriod`':
                        $stmt->bindValue($identifier, $this->singleinperiod, PDO::PARAM_INT);
                        break;
                    case '`isLong`':
                        $stmt->bindValue($identifier, (int) $this->islong, PDO::PARAM_INT);
                        break;
                    case '`dateInput`':
                        $stmt->bindValue($identifier, (int) $this->dateinput, PDO::PARAM_INT);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
                        break;
                    case '`context`':
                        $stmt->bindValue($identifier, $this->context, PDO::PARAM_STR);
                        break;
                    case '`form`':
                        $stmt->bindValue($identifier, $this->form, PDO::PARAM_STR);
                        break;
                    case '`minDuration`':
                        $stmt->bindValue($identifier, $this->minduration, PDO::PARAM_INT);
                        break;
                    case '`maxDuration`':
                        $stmt->bindValue($identifier, $this->maxduration, PDO::PARAM_INT);
                        break;
                    case '`showStatusActionsInPlanner`':
                        $stmt->bindValue($identifier, (int) $this->showstatusactionsinplanner, PDO::PARAM_INT);
                        break;
                    case '`showDiagnosticActionsInPlanner`':
                        $stmt->bindValue($identifier, (int) $this->showdiagnosticactionsinplanner, PDO::PARAM_INT);
                        break;
                    case '`showCureActionsInPlanner`':
                        $stmt->bindValue($identifier, (int) $this->showcureactionsinplanner, PDO::PARAM_INT);
                        break;
                    case '`showMiscActionsInPlanner`':
                        $stmt->bindValue($identifier, (int) $this->showmiscactionsinplanner, PDO::PARAM_INT);
                        break;
                    case '`limitStatusActionsInput`':
                        $stmt->bindValue($identifier, (int) $this->limitstatusactionsinput, PDO::PARAM_INT);
                        break;
                    case '`limitDiagnosticActionsInput`':
                        $stmt->bindValue($identifier, (int) $this->limitdiagnosticactionsinput, PDO::PARAM_INT);
                        break;
                    case '`limitCureActionsInput`':
                        $stmt->bindValue($identifier, (int) $this->limitcureactionsinput, PDO::PARAM_INT);
                        break;
                    case '`limitMiscActionsInput`':
                        $stmt->bindValue($identifier, (int) $this->limitmiscactionsinput, PDO::PARAM_INT);
                        break;
                    case '`showTime`':
                        $stmt->bindValue($identifier, (int) $this->showtime, PDO::PARAM_INT);
                        break;
                    case '`medicalAidType_id`':
                        $stmt->bindValue($identifier, $this->medicalaidtype_id, PDO::PARAM_INT);
                        break;
                    case '`eventProfile_id`':
                        $stmt->bindValue($identifier, $this->eventprofile_id, PDO::PARAM_INT);
                        break;
                    case '`mesRequired`':
                        $stmt->bindValue($identifier, $this->mesrequired, PDO::PARAM_INT);
                        break;
                    case '`mesCodeMask`':
                        $stmt->bindValue($identifier, $this->mescodemask, PDO::PARAM_STR);
                        break;
                    case '`mesNameMask`':
                        $stmt->bindValue($identifier, $this->mesnamemask, PDO::PARAM_STR);
                        break;
                    case '`counter_id`':
                        $stmt->bindValue($identifier, $this->counter_id, PDO::PARAM_INT);
                        break;
                    case '`isExternal`':
                        $stmt->bindValue($identifier, (int) $this->isexternal, PDO::PARAM_INT);
                        break;
                    case '`isAssistant`':
                        $stmt->bindValue($identifier, (int) $this->isassistant, PDO::PARAM_INT);
                        break;
                    case '`isCurator`':
                        $stmt->bindValue($identifier, (int) $this->iscurator, PDO::PARAM_INT);
                        break;
                    case '`canHavePayableActions`':
                        $stmt->bindValue($identifier, (int) $this->canhavepayableactions, PDO::PARAM_INT);
                        break;
                    case '`isRequiredCoordination`':
                        $stmt->bindValue($identifier, (int) $this->isrequiredcoordination, PDO::PARAM_INT);
                        break;
                    case '`isOrgStructurePriority`':
                        $stmt->bindValue($identifier, (int) $this->isorgstructurepriority, PDO::PARAM_INT);
                        break;
                    case '`isTakenTissue`':
                        $stmt->bindValue($identifier, (int) $this->istakentissue, PDO::PARAM_INT);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_INT);
                        break;
                    case '`age`':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_STR);
                        break;
                    case '`rbMedicalKind_id`':
                        $stmt->bindValue($identifier, $this->rbmedicalkind_id, PDO::PARAM_INT);
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
                    case '`requestType_id`':
                        $stmt->bindValue($identifier, $this->requesttype_id, PDO::PARAM_INT);
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

            if ($this->aRbcounter !== null) {
                if (!$this->aRbcounter->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbcounter->getValidationFailures());
                }
            }

            if ($this->aRbmedicalkind !== null) {
                if (!$this->aRbmedicalkind->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbmedicalkind->getValidationFailures());
                }
            }


            if (($retval = EventtypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActiontypeEventtypeChecks !== null) {
                    foreach ($this->collActiontypeEventtypeChecks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMedicalkindunits !== null) {
                    foreach ($this->collMedicalkindunits as $referrerFK) {
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
        $pos = EventtypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCode();
                break;
            case 7:
                return $this->getName();
                break;
            case 8:
                return $this->getPurposeId();
                break;
            case 9:
                return $this->getFinanceId();
                break;
            case 10:
                return $this->getSceneId();
                break;
            case 11:
                return $this->getVisitservicemodifier();
                break;
            case 12:
                return $this->getVisitservicefilter();
                break;
            case 13:
                return $this->getVisitfinance();
                break;
            case 14:
                return $this->getActionfinance();
                break;
            case 15:
                return $this->getPeriod();
                break;
            case 16:
                return $this->getSingleinperiod();
                break;
            case 17:
                return $this->getIslong();
                break;
            case 18:
                return $this->getDateinput();
                break;
            case 19:
                return $this->getServiceId();
                break;
            case 20:
                return $this->getContext();
                break;
            case 21:
                return $this->getForm();
                break;
            case 22:
                return $this->getMinduration();
                break;
            case 23:
                return $this->getMaxduration();
                break;
            case 24:
                return $this->getShowstatusactionsinplanner();
                break;
            case 25:
                return $this->getShowdiagnosticactionsinplanner();
                break;
            case 26:
                return $this->getShowcureactionsinplanner();
                break;
            case 27:
                return $this->getShowmiscactionsinplanner();
                break;
            case 28:
                return $this->getLimitstatusactionsinput();
                break;
            case 29:
                return $this->getLimitdiagnosticactionsinput();
                break;
            case 30:
                return $this->getLimitcureactionsinput();
                break;
            case 31:
                return $this->getLimitmiscactionsinput();
                break;
            case 32:
                return $this->getShowtime();
                break;
            case 33:
                return $this->getMedicalaidtypeId();
                break;
            case 34:
                return $this->getEventprofileId();
                break;
            case 35:
                return $this->getMesrequired();
                break;
            case 36:
                return $this->getMescodemask();
                break;
            case 37:
                return $this->getMesnamemask();
                break;
            case 38:
                return $this->getCounterId();
                break;
            case 39:
                return $this->getIsexternal();
                break;
            case 40:
                return $this->getIsassistant();
                break;
            case 41:
                return $this->getIscurator();
                break;
            case 42:
                return $this->getCanhavepayableactions();
                break;
            case 43:
                return $this->getIsrequiredcoordination();
                break;
            case 44:
                return $this->getIsorgstructurepriority();
                break;
            case 45:
                return $this->getIstakentissue();
                break;
            case 46:
                return $this->getSex();
                break;
            case 47:
                return $this->getAge();
                break;
            case 48:
                return $this->getRbmedicalkindId();
                break;
            case 49:
                return $this->getAgeBu();
                break;
            case 50:
                return $this->getAgeBc();
                break;
            case 51:
                return $this->getAgeEu();
                break;
            case 52:
                return $this->getAgeEc();
                break;
            case 53:
                return $this->getRequesttypeId();
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
        if (isset($alreadyDumpedObjects['Eventtype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Eventtype'][$this->getPrimaryKey()] = true;
        $keys = EventtypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getCode(),
            $keys[7] => $this->getName(),
            $keys[8] => $this->getPurposeId(),
            $keys[9] => $this->getFinanceId(),
            $keys[10] => $this->getSceneId(),
            $keys[11] => $this->getVisitservicemodifier(),
            $keys[12] => $this->getVisitservicefilter(),
            $keys[13] => $this->getVisitfinance(),
            $keys[14] => $this->getActionfinance(),
            $keys[15] => $this->getPeriod(),
            $keys[16] => $this->getSingleinperiod(),
            $keys[17] => $this->getIslong(),
            $keys[18] => $this->getDateinput(),
            $keys[19] => $this->getServiceId(),
            $keys[20] => $this->getContext(),
            $keys[21] => $this->getForm(),
            $keys[22] => $this->getMinduration(),
            $keys[23] => $this->getMaxduration(),
            $keys[24] => $this->getShowstatusactionsinplanner(),
            $keys[25] => $this->getShowdiagnosticactionsinplanner(),
            $keys[26] => $this->getShowcureactionsinplanner(),
            $keys[27] => $this->getShowmiscactionsinplanner(),
            $keys[28] => $this->getLimitstatusactionsinput(),
            $keys[29] => $this->getLimitdiagnosticactionsinput(),
            $keys[30] => $this->getLimitcureactionsinput(),
            $keys[31] => $this->getLimitmiscactionsinput(),
            $keys[32] => $this->getShowtime(),
            $keys[33] => $this->getMedicalaidtypeId(),
            $keys[34] => $this->getEventprofileId(),
            $keys[35] => $this->getMesrequired(),
            $keys[36] => $this->getMescodemask(),
            $keys[37] => $this->getMesnamemask(),
            $keys[38] => $this->getCounterId(),
            $keys[39] => $this->getIsexternal(),
            $keys[40] => $this->getIsassistant(),
            $keys[41] => $this->getIscurator(),
            $keys[42] => $this->getCanhavepayableactions(),
            $keys[43] => $this->getIsrequiredcoordination(),
            $keys[44] => $this->getIsorgstructurepriority(),
            $keys[45] => $this->getIstakentissue(),
            $keys[46] => $this->getSex(),
            $keys[47] => $this->getAge(),
            $keys[48] => $this->getRbmedicalkindId(),
            $keys[49] => $this->getAgeBu(),
            $keys[50] => $this->getAgeBc(),
            $keys[51] => $this->getAgeEu(),
            $keys[52] => $this->getAgeEc(),
            $keys[53] => $this->getRequesttypeId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbcounter) {
                $result['Rbcounter'] = $this->aRbcounter->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbmedicalkind) {
                $result['Rbmedicalkind'] = $this->aRbmedicalkind->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActiontypeEventtypeChecks) {
                $result['ActiontypeEventtypeChecks'] = $this->collActiontypeEventtypeChecks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMedicalkindunits) {
                $result['Medicalkindunits'] = $this->collMedicalkindunits->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = EventtypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCode($value);
                break;
            case 7:
                $this->setName($value);
                break;
            case 8:
                $this->setPurposeId($value);
                break;
            case 9:
                $this->setFinanceId($value);
                break;
            case 10:
                $this->setSceneId($value);
                break;
            case 11:
                $this->setVisitservicemodifier($value);
                break;
            case 12:
                $this->setVisitservicefilter($value);
                break;
            case 13:
                $this->setVisitfinance($value);
                break;
            case 14:
                $this->setActionfinance($value);
                break;
            case 15:
                $this->setPeriod($value);
                break;
            case 16:
                $this->setSingleinperiod($value);
                break;
            case 17:
                $this->setIslong($value);
                break;
            case 18:
                $this->setDateinput($value);
                break;
            case 19:
                $this->setServiceId($value);
                break;
            case 20:
                $this->setContext($value);
                break;
            case 21:
                $this->setForm($value);
                break;
            case 22:
                $this->setMinduration($value);
                break;
            case 23:
                $this->setMaxduration($value);
                break;
            case 24:
                $this->setShowstatusactionsinplanner($value);
                break;
            case 25:
                $this->setShowdiagnosticactionsinplanner($value);
                break;
            case 26:
                $this->setShowcureactionsinplanner($value);
                break;
            case 27:
                $this->setShowmiscactionsinplanner($value);
                break;
            case 28:
                $this->setLimitstatusactionsinput($value);
                break;
            case 29:
                $this->setLimitdiagnosticactionsinput($value);
                break;
            case 30:
                $this->setLimitcureactionsinput($value);
                break;
            case 31:
                $this->setLimitmiscactionsinput($value);
                break;
            case 32:
                $this->setShowtime($value);
                break;
            case 33:
                $this->setMedicalaidtypeId($value);
                break;
            case 34:
                $this->setEventprofileId($value);
                break;
            case 35:
                $this->setMesrequired($value);
                break;
            case 36:
                $this->setMescodemask($value);
                break;
            case 37:
                $this->setMesnamemask($value);
                break;
            case 38:
                $this->setCounterId($value);
                break;
            case 39:
                $this->setIsexternal($value);
                break;
            case 40:
                $this->setIsassistant($value);
                break;
            case 41:
                $this->setIscurator($value);
                break;
            case 42:
                $this->setCanhavepayableactions($value);
                break;
            case 43:
                $this->setIsrequiredcoordination($value);
                break;
            case 44:
                $this->setIsorgstructurepriority($value);
                break;
            case 45:
                $this->setIstakentissue($value);
                break;
            case 46:
                $this->setSex($value);
                break;
            case 47:
                $this->setAge($value);
                break;
            case 48:
                $this->setRbmedicalkindId($value);
                break;
            case 49:
                $this->setAgeBu($value);
                break;
            case 50:
                $this->setAgeBc($value);
                break;
            case 51:
                $this->setAgeEu($value);
                break;
            case 52:
                $this->setAgeEc($value);
                break;
            case 53:
                $this->setRequesttypeId($value);
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
        $keys = EventtypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCode($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setName($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPurposeId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setFinanceId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSceneId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setVisitservicemodifier($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setVisitservicefilter($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setVisitfinance($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setActionfinance($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPeriod($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSingleinperiod($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setIslong($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setDateinput($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setServiceId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setContext($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setForm($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setMinduration($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setMaxduration($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setShowstatusactionsinplanner($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setShowdiagnosticactionsinplanner($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setShowcureactionsinplanner($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setShowmiscactionsinplanner($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setLimitstatusactionsinput($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setLimitdiagnosticactionsinput($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setLimitcureactionsinput($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setLimitmiscactionsinput($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setShowtime($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setMedicalaidtypeId($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setEventprofileId($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setMesrequired($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setMescodemask($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setMesnamemask($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setCounterId($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setIsexternal($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setIsassistant($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setIscurator($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setCanhavepayableactions($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setIsrequiredcoordination($arr[$keys[43]]);
        if (array_key_exists($keys[44], $arr)) $this->setIsorgstructurepriority($arr[$keys[44]]);
        if (array_key_exists($keys[45], $arr)) $this->setIstakentissue($arr[$keys[45]]);
        if (array_key_exists($keys[46], $arr)) $this->setSex($arr[$keys[46]]);
        if (array_key_exists($keys[47], $arr)) $this->setAge($arr[$keys[47]]);
        if (array_key_exists($keys[48], $arr)) $this->setRbmedicalkindId($arr[$keys[48]]);
        if (array_key_exists($keys[49], $arr)) $this->setAgeBu($arr[$keys[49]]);
        if (array_key_exists($keys[50], $arr)) $this->setAgeBc($arr[$keys[50]]);
        if (array_key_exists($keys[51], $arr)) $this->setAgeEu($arr[$keys[51]]);
        if (array_key_exists($keys[52], $arr)) $this->setAgeEc($arr[$keys[52]]);
        if (array_key_exists($keys[53], $arr)) $this->setRequesttypeId($arr[$keys[53]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EventtypePeer::DATABASE_NAME);

        if ($this->isColumnModified(EventtypePeer::ID)) $criteria->add(EventtypePeer::ID, $this->id);
        if ($this->isColumnModified(EventtypePeer::CREATEDATETIME)) $criteria->add(EventtypePeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(EventtypePeer::CREATEPERSON_ID)) $criteria->add(EventtypePeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(EventtypePeer::MODIFYDATETIME)) $criteria->add(EventtypePeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(EventtypePeer::MODIFYPERSON_ID)) $criteria->add(EventtypePeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(EventtypePeer::DELETED)) $criteria->add(EventtypePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(EventtypePeer::CODE)) $criteria->add(EventtypePeer::CODE, $this->code);
        if ($this->isColumnModified(EventtypePeer::NAME)) $criteria->add(EventtypePeer::NAME, $this->name);
        if ($this->isColumnModified(EventtypePeer::PURPOSE_ID)) $criteria->add(EventtypePeer::PURPOSE_ID, $this->purpose_id);
        if ($this->isColumnModified(EventtypePeer::FINANCE_ID)) $criteria->add(EventtypePeer::FINANCE_ID, $this->finance_id);
        if ($this->isColumnModified(EventtypePeer::SCENE_ID)) $criteria->add(EventtypePeer::SCENE_ID, $this->scene_id);
        if ($this->isColumnModified(EventtypePeer::VISITSERVICEMODIFIER)) $criteria->add(EventtypePeer::VISITSERVICEMODIFIER, $this->visitservicemodifier);
        if ($this->isColumnModified(EventtypePeer::VISITSERVICEFILTER)) $criteria->add(EventtypePeer::VISITSERVICEFILTER, $this->visitservicefilter);
        if ($this->isColumnModified(EventtypePeer::VISITFINANCE)) $criteria->add(EventtypePeer::VISITFINANCE, $this->visitfinance);
        if ($this->isColumnModified(EventtypePeer::ACTIONFINANCE)) $criteria->add(EventtypePeer::ACTIONFINANCE, $this->actionfinance);
        if ($this->isColumnModified(EventtypePeer::PERIOD)) $criteria->add(EventtypePeer::PERIOD, $this->period);
        if ($this->isColumnModified(EventtypePeer::SINGLEINPERIOD)) $criteria->add(EventtypePeer::SINGLEINPERIOD, $this->singleinperiod);
        if ($this->isColumnModified(EventtypePeer::ISLONG)) $criteria->add(EventtypePeer::ISLONG, $this->islong);
        if ($this->isColumnModified(EventtypePeer::DATEINPUT)) $criteria->add(EventtypePeer::DATEINPUT, $this->dateinput);
        if ($this->isColumnModified(EventtypePeer::SERVICE_ID)) $criteria->add(EventtypePeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(EventtypePeer::CONTEXT)) $criteria->add(EventtypePeer::CONTEXT, $this->context);
        if ($this->isColumnModified(EventtypePeer::FORM)) $criteria->add(EventtypePeer::FORM, $this->form);
        if ($this->isColumnModified(EventtypePeer::MINDURATION)) $criteria->add(EventtypePeer::MINDURATION, $this->minduration);
        if ($this->isColumnModified(EventtypePeer::MAXDURATION)) $criteria->add(EventtypePeer::MAXDURATION, $this->maxduration);
        if ($this->isColumnModified(EventtypePeer::SHOWSTATUSACTIONSINPLANNER)) $criteria->add(EventtypePeer::SHOWSTATUSACTIONSINPLANNER, $this->showstatusactionsinplanner);
        if ($this->isColumnModified(EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER)) $criteria->add(EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER, $this->showdiagnosticactionsinplanner);
        if ($this->isColumnModified(EventtypePeer::SHOWCUREACTIONSINPLANNER)) $criteria->add(EventtypePeer::SHOWCUREACTIONSINPLANNER, $this->showcureactionsinplanner);
        if ($this->isColumnModified(EventtypePeer::SHOWMISCACTIONSINPLANNER)) $criteria->add(EventtypePeer::SHOWMISCACTIONSINPLANNER, $this->showmiscactionsinplanner);
        if ($this->isColumnModified(EventtypePeer::LIMITSTATUSACTIONSINPUT)) $criteria->add(EventtypePeer::LIMITSTATUSACTIONSINPUT, $this->limitstatusactionsinput);
        if ($this->isColumnModified(EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT)) $criteria->add(EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT, $this->limitdiagnosticactionsinput);
        if ($this->isColumnModified(EventtypePeer::LIMITCUREACTIONSINPUT)) $criteria->add(EventtypePeer::LIMITCUREACTIONSINPUT, $this->limitcureactionsinput);
        if ($this->isColumnModified(EventtypePeer::LIMITMISCACTIONSINPUT)) $criteria->add(EventtypePeer::LIMITMISCACTIONSINPUT, $this->limitmiscactionsinput);
        if ($this->isColumnModified(EventtypePeer::SHOWTIME)) $criteria->add(EventtypePeer::SHOWTIME, $this->showtime);
        if ($this->isColumnModified(EventtypePeer::MEDICALAIDTYPE_ID)) $criteria->add(EventtypePeer::MEDICALAIDTYPE_ID, $this->medicalaidtype_id);
        if ($this->isColumnModified(EventtypePeer::EVENTPROFILE_ID)) $criteria->add(EventtypePeer::EVENTPROFILE_ID, $this->eventprofile_id);
        if ($this->isColumnModified(EventtypePeer::MESREQUIRED)) $criteria->add(EventtypePeer::MESREQUIRED, $this->mesrequired);
        if ($this->isColumnModified(EventtypePeer::MESCODEMASK)) $criteria->add(EventtypePeer::MESCODEMASK, $this->mescodemask);
        if ($this->isColumnModified(EventtypePeer::MESNAMEMASK)) $criteria->add(EventtypePeer::MESNAMEMASK, $this->mesnamemask);
        if ($this->isColumnModified(EventtypePeer::COUNTER_ID)) $criteria->add(EventtypePeer::COUNTER_ID, $this->counter_id);
        if ($this->isColumnModified(EventtypePeer::ISEXTERNAL)) $criteria->add(EventtypePeer::ISEXTERNAL, $this->isexternal);
        if ($this->isColumnModified(EventtypePeer::ISASSISTANT)) $criteria->add(EventtypePeer::ISASSISTANT, $this->isassistant);
        if ($this->isColumnModified(EventtypePeer::ISCURATOR)) $criteria->add(EventtypePeer::ISCURATOR, $this->iscurator);
        if ($this->isColumnModified(EventtypePeer::CANHAVEPAYABLEACTIONS)) $criteria->add(EventtypePeer::CANHAVEPAYABLEACTIONS, $this->canhavepayableactions);
        if ($this->isColumnModified(EventtypePeer::ISREQUIREDCOORDINATION)) $criteria->add(EventtypePeer::ISREQUIREDCOORDINATION, $this->isrequiredcoordination);
        if ($this->isColumnModified(EventtypePeer::ISORGSTRUCTUREPRIORITY)) $criteria->add(EventtypePeer::ISORGSTRUCTUREPRIORITY, $this->isorgstructurepriority);
        if ($this->isColumnModified(EventtypePeer::ISTAKENTISSUE)) $criteria->add(EventtypePeer::ISTAKENTISSUE, $this->istakentissue);
        if ($this->isColumnModified(EventtypePeer::SEX)) $criteria->add(EventtypePeer::SEX, $this->sex);
        if ($this->isColumnModified(EventtypePeer::AGE)) $criteria->add(EventtypePeer::AGE, $this->age);
        if ($this->isColumnModified(EventtypePeer::RBMEDICALKIND_ID)) $criteria->add(EventtypePeer::RBMEDICALKIND_ID, $this->rbmedicalkind_id);
        if ($this->isColumnModified(EventtypePeer::AGE_BU)) $criteria->add(EventtypePeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(EventtypePeer::AGE_BC)) $criteria->add(EventtypePeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(EventtypePeer::AGE_EU)) $criteria->add(EventtypePeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(EventtypePeer::AGE_EC)) $criteria->add(EventtypePeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(EventtypePeer::REQUESTTYPE_ID)) $criteria->add(EventtypePeer::REQUESTTYPE_ID, $this->requesttype_id);

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
        $criteria = new Criteria(EventtypePeer::DATABASE_NAME);
        $criteria->add(EventtypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Eventtype (or compatible) type.
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
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setPurposeId($this->getPurposeId());
        $copyObj->setFinanceId($this->getFinanceId());
        $copyObj->setSceneId($this->getSceneId());
        $copyObj->setVisitservicemodifier($this->getVisitservicemodifier());
        $copyObj->setVisitservicefilter($this->getVisitservicefilter());
        $copyObj->setVisitfinance($this->getVisitfinance());
        $copyObj->setActionfinance($this->getActionfinance());
        $copyObj->setPeriod($this->getPeriod());
        $copyObj->setSingleinperiod($this->getSingleinperiod());
        $copyObj->setIslong($this->getIslong());
        $copyObj->setDateinput($this->getDateinput());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setContext($this->getContext());
        $copyObj->setForm($this->getForm());
        $copyObj->setMinduration($this->getMinduration());
        $copyObj->setMaxduration($this->getMaxduration());
        $copyObj->setShowstatusactionsinplanner($this->getShowstatusactionsinplanner());
        $copyObj->setShowdiagnosticactionsinplanner($this->getShowdiagnosticactionsinplanner());
        $copyObj->setShowcureactionsinplanner($this->getShowcureactionsinplanner());
        $copyObj->setShowmiscactionsinplanner($this->getShowmiscactionsinplanner());
        $copyObj->setLimitstatusactionsinput($this->getLimitstatusactionsinput());
        $copyObj->setLimitdiagnosticactionsinput($this->getLimitdiagnosticactionsinput());
        $copyObj->setLimitcureactionsinput($this->getLimitcureactionsinput());
        $copyObj->setLimitmiscactionsinput($this->getLimitmiscactionsinput());
        $copyObj->setShowtime($this->getShowtime());
        $copyObj->setMedicalaidtypeId($this->getMedicalaidtypeId());
        $copyObj->setEventprofileId($this->getEventprofileId());
        $copyObj->setMesrequired($this->getMesrequired());
        $copyObj->setMescodemask($this->getMescodemask());
        $copyObj->setMesnamemask($this->getMesnamemask());
        $copyObj->setCounterId($this->getCounterId());
        $copyObj->setIsexternal($this->getIsexternal());
        $copyObj->setIsassistant($this->getIsassistant());
        $copyObj->setIscurator($this->getIscurator());
        $copyObj->setCanhavepayableactions($this->getCanhavepayableactions());
        $copyObj->setIsrequiredcoordination($this->getIsrequiredcoordination());
        $copyObj->setIsorgstructurepriority($this->getIsorgstructurepriority());
        $copyObj->setIstakentissue($this->getIstakentissue());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setRbmedicalkindId($this->getRbmedicalkindId());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setRequesttypeId($this->getRequesttypeId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActiontypeEventtypeChecks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontypeEventtypeCheck($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMedicalkindunits() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMedicalkindunit($relObj->copy($deepCopy));
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
     * @return Eventtype Clone of current object.
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
     * @return EventtypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EventtypePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbcounter object.
     *
     * @param             Rbcounter $v
     * @return Eventtype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbcounter(Rbcounter $v = null)
    {
        if ($v === null) {
            $this->setCounterId(NULL);
        } else {
            $this->setCounterId($v->getId());
        }

        $this->aRbcounter = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbcounter object, it will not be re-added.
        if ($v !== null) {
            $v->addEventtype($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbcounter object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbcounter The associated Rbcounter object.
     * @throws PropelException
     */
    public function getRbcounter(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbcounter === null && ($this->counter_id !== null) && $doQuery) {
            $this->aRbcounter = RbcounterQuery::create()->findPk($this->counter_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbcounter->addEventtypes($this);
             */
        }

        return $this->aRbcounter;
    }

    /**
     * Declares an association between this object and a Rbmedicalkind object.
     *
     * @param             Rbmedicalkind $v
     * @return Eventtype The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbmedicalkind(Rbmedicalkind $v = null)
    {
        if ($v === null) {
            $this->setRbmedicalkindId(NULL);
        } else {
            $this->setRbmedicalkindId($v->getId());
        }

        $this->aRbmedicalkind = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbmedicalkind object, it will not be re-added.
        if ($v !== null) {
            $v->addEventtype($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbmedicalkind object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbmedicalkind The associated Rbmedicalkind object.
     * @throws PropelException
     */
    public function getRbmedicalkind(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbmedicalkind === null && ($this->rbmedicalkind_id !== null) && $doQuery) {
            $this->aRbmedicalkind = RbmedicalkindQuery::create()->findPk($this->rbmedicalkind_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbmedicalkind->addEventtypes($this);
             */
        }

        return $this->aRbmedicalkind;
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
        if ('ActiontypeEventtypeCheck' == $relationName) {
            $this->initActiontypeEventtypeChecks();
        }
        if ('Medicalkindunit' == $relationName) {
            $this->initMedicalkindunits();
        }
    }

    /**
     * Clears out the collActiontypeEventtypeChecks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Eventtype The current object (for fluent API support)
     * @see        addActiontypeEventtypeChecks()
     */
    public function clearActiontypeEventtypeChecks()
    {
        $this->collActiontypeEventtypeChecks = null; // important to set this to null since that means it is uninitialized
        $this->collActiontypeEventtypeChecksPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontypeEventtypeChecks collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontypeEventtypeChecks($v = true)
    {
        $this->collActiontypeEventtypeChecksPartial = $v;
    }

    /**
     * Initializes the collActiontypeEventtypeChecks collection.
     *
     * By default this just sets the collActiontypeEventtypeChecks collection to an empty array (like clearcollActiontypeEventtypeChecks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontypeEventtypeChecks($overrideExisting = true)
    {
        if (null !== $this->collActiontypeEventtypeChecks && !$overrideExisting) {
            return;
        }
        $this->collActiontypeEventtypeChecks = new PropelObjectCollection();
        $this->collActiontypeEventtypeChecks->setModel('ActiontypeEventtypeCheck');
    }

    /**
     * Gets an array of ActiontypeEventtypeCheck objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Eventtype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     * @throws PropelException
     */
    public function getActiontypeEventtypeChecks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeEventtypeChecksPartial && !$this->isNew();
        if (null === $this->collActiontypeEventtypeChecks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontypeEventtypeChecks) {
                // return empty collection
                $this->initActiontypeEventtypeChecks();
            } else {
                $collActiontypeEventtypeChecks = ActiontypeEventtypeCheckQuery::create(null, $criteria)
                    ->filterByEventtype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontypeEventtypeChecksPartial && count($collActiontypeEventtypeChecks)) {
                      $this->initActiontypeEventtypeChecks(false);

                      foreach($collActiontypeEventtypeChecks as $obj) {
                        if (false == $this->collActiontypeEventtypeChecks->contains($obj)) {
                          $this->collActiontypeEventtypeChecks->append($obj);
                        }
                      }

                      $this->collActiontypeEventtypeChecksPartial = true;
                    }

                    $collActiontypeEventtypeChecks->getInternalIterator()->rewind();
                    return $collActiontypeEventtypeChecks;
                }

                if($partial && $this->collActiontypeEventtypeChecks) {
                    foreach($this->collActiontypeEventtypeChecks as $obj) {
                        if($obj->isNew()) {
                            $collActiontypeEventtypeChecks[] = $obj;
                        }
                    }
                }

                $this->collActiontypeEventtypeChecks = $collActiontypeEventtypeChecks;
                $this->collActiontypeEventtypeChecksPartial = false;
            }
        }

        return $this->collActiontypeEventtypeChecks;
    }

    /**
     * Sets a collection of ActiontypeEventtypeCheck objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontypeEventtypeChecks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Eventtype The current object (for fluent API support)
     */
    public function setActiontypeEventtypeChecks(PropelCollection $actiontypeEventtypeChecks, PropelPDO $con = null)
    {
        $actiontypeEventtypeChecksToDelete = $this->getActiontypeEventtypeChecks(new Criteria(), $con)->diff($actiontypeEventtypeChecks);

        $this->actiontypeEventtypeChecksScheduledForDeletion = unserialize(serialize($actiontypeEventtypeChecksToDelete));

        foreach ($actiontypeEventtypeChecksToDelete as $actiontypeEventtypeCheckRemoved) {
            $actiontypeEventtypeCheckRemoved->setEventtype(null);
        }

        $this->collActiontypeEventtypeChecks = null;
        foreach ($actiontypeEventtypeChecks as $actiontypeEventtypeCheck) {
            $this->addActiontypeEventtypeCheck($actiontypeEventtypeCheck);
        }

        $this->collActiontypeEventtypeChecks = $actiontypeEventtypeChecks;
        $this->collActiontypeEventtypeChecksPartial = false;

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
    public function countActiontypeEventtypeChecks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontypeEventtypeChecksPartial && !$this->isNew();
        if (null === $this->collActiontypeEventtypeChecks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontypeEventtypeChecks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontypeEventtypeChecks());
            }
            $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEventtype($this)
                ->count($con);
        }

        return count($this->collActiontypeEventtypeChecks);
    }

    /**
     * Method called to associate a ActiontypeEventtypeCheck object to this object
     * through the ActiontypeEventtypeCheck foreign key attribute.
     *
     * @param    ActiontypeEventtypeCheck $l ActiontypeEventtypeCheck
     * @return Eventtype The current object (for fluent API support)
     */
    public function addActiontypeEventtypeCheck(ActiontypeEventtypeCheck $l)
    {
        if ($this->collActiontypeEventtypeChecks === null) {
            $this->initActiontypeEventtypeChecks();
            $this->collActiontypeEventtypeChecksPartial = true;
        }
        if (!in_array($l, $this->collActiontypeEventtypeChecks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontypeEventtypeCheck($l);
        }

        return $this;
    }

    /**
     * @param	ActiontypeEventtypeCheck $actiontypeEventtypeCheck The actiontypeEventtypeCheck object to add.
     */
    protected function doAddActiontypeEventtypeCheck($actiontypeEventtypeCheck)
    {
        $this->collActiontypeEventtypeChecks[]= $actiontypeEventtypeCheck;
        $actiontypeEventtypeCheck->setEventtype($this);
    }

    /**
     * @param	ActiontypeEventtypeCheck $actiontypeEventtypeCheck The actiontypeEventtypeCheck object to remove.
     * @return Eventtype The current object (for fluent API support)
     */
    public function removeActiontypeEventtypeCheck($actiontypeEventtypeCheck)
    {
        if ($this->getActiontypeEventtypeChecks()->contains($actiontypeEventtypeCheck)) {
            $this->collActiontypeEventtypeChecks->remove($this->collActiontypeEventtypeChecks->search($actiontypeEventtypeCheck));
            if (null === $this->actiontypeEventtypeChecksScheduledForDeletion) {
                $this->actiontypeEventtypeChecksScheduledForDeletion = clone $this->collActiontypeEventtypeChecks;
                $this->actiontypeEventtypeChecksScheduledForDeletion->clear();
            }
            $this->actiontypeEventtypeChecksScheduledForDeletion[]= clone $actiontypeEventtypeCheck;
            $actiontypeEventtypeCheck->setEventtype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Eventtype is new, it will return
     * an empty collection; or if this Eventtype has previously
     * been saved, it will retrieve related ActiontypeEventtypeChecks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Eventtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     */
    public function getActiontypeEventtypeChecksJoinActiontypeRelatedByActiontypeId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
        $query->joinWith('ActiontypeRelatedByActiontypeId', $join_behavior);

        return $this->getActiontypeEventtypeChecks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Eventtype is new, it will return
     * an empty collection; or if this Eventtype has previously
     * been saved, it will retrieve related ActiontypeEventtypeChecks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Eventtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[] List of ActiontypeEventtypeCheck objects
     */
    public function getActiontypeEventtypeChecksJoinActiontypeRelatedByRelatedActiontypeId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeEventtypeCheckQuery::create(null, $criteria);
        $query->joinWith('ActiontypeRelatedByRelatedActiontypeId', $join_behavior);

        return $this->getActiontypeEventtypeChecks($query, $con);
    }

    /**
     * Clears out the collMedicalkindunits collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Eventtype The current object (for fluent API support)
     * @see        addMedicalkindunits()
     */
    public function clearMedicalkindunits()
    {
        $this->collMedicalkindunits = null; // important to set this to null since that means it is uninitialized
        $this->collMedicalkindunitsPartial = null;

        return $this;
    }

    /**
     * reset is the collMedicalkindunits collection loaded partially
     *
     * @return void
     */
    public function resetPartialMedicalkindunits($v = true)
    {
        $this->collMedicalkindunitsPartial = $v;
    }

    /**
     * Initializes the collMedicalkindunits collection.
     *
     * By default this just sets the collMedicalkindunits collection to an empty array (like clearcollMedicalkindunits());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMedicalkindunits($overrideExisting = true)
    {
        if (null !== $this->collMedicalkindunits && !$overrideExisting) {
            return;
        }
        $this->collMedicalkindunits = new PropelObjectCollection();
        $this->collMedicalkindunits->setModel('Medicalkindunit');
    }

    /**
     * Gets an array of Medicalkindunit objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Eventtype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Medicalkindunit[] List of Medicalkindunit objects
     * @throws PropelException
     */
    public function getMedicalkindunits($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMedicalkindunitsPartial && !$this->isNew();
        if (null === $this->collMedicalkindunits || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMedicalkindunits) {
                // return empty collection
                $this->initMedicalkindunits();
            } else {
                $collMedicalkindunits = MedicalkindunitQuery::create(null, $criteria)
                    ->filterByEventtype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMedicalkindunitsPartial && count($collMedicalkindunits)) {
                      $this->initMedicalkindunits(false);

                      foreach($collMedicalkindunits as $obj) {
                        if (false == $this->collMedicalkindunits->contains($obj)) {
                          $this->collMedicalkindunits->append($obj);
                        }
                      }

                      $this->collMedicalkindunitsPartial = true;
                    }

                    $collMedicalkindunits->getInternalIterator()->rewind();
                    return $collMedicalkindunits;
                }

                if($partial && $this->collMedicalkindunits) {
                    foreach($this->collMedicalkindunits as $obj) {
                        if($obj->isNew()) {
                            $collMedicalkindunits[] = $obj;
                        }
                    }
                }

                $this->collMedicalkindunits = $collMedicalkindunits;
                $this->collMedicalkindunitsPartial = false;
            }
        }

        return $this->collMedicalkindunits;
    }

    /**
     * Sets a collection of Medicalkindunit objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $medicalkindunits A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Eventtype The current object (for fluent API support)
     */
    public function setMedicalkindunits(PropelCollection $medicalkindunits, PropelPDO $con = null)
    {
        $medicalkindunitsToDelete = $this->getMedicalkindunits(new Criteria(), $con)->diff($medicalkindunits);

        $this->medicalkindunitsScheduledForDeletion = unserialize(serialize($medicalkindunitsToDelete));

        foreach ($medicalkindunitsToDelete as $medicalkindunitRemoved) {
            $medicalkindunitRemoved->setEventtype(null);
        }

        $this->collMedicalkindunits = null;
        foreach ($medicalkindunits as $medicalkindunit) {
            $this->addMedicalkindunit($medicalkindunit);
        }

        $this->collMedicalkindunits = $medicalkindunits;
        $this->collMedicalkindunitsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Medicalkindunit objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Medicalkindunit objects.
     * @throws PropelException
     */
    public function countMedicalkindunits(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMedicalkindunitsPartial && !$this->isNew();
        if (null === $this->collMedicalkindunits || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMedicalkindunits) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMedicalkindunits());
            }
            $query = MedicalkindunitQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEventtype($this)
                ->count($con);
        }

        return count($this->collMedicalkindunits);
    }

    /**
     * Method called to associate a Medicalkindunit object to this object
     * through the Medicalkindunit foreign key attribute.
     *
     * @param    Medicalkindunit $l Medicalkindunit
     * @return Eventtype The current object (for fluent API support)
     */
    public function addMedicalkindunit(Medicalkindunit $l)
    {
        if ($this->collMedicalkindunits === null) {
            $this->initMedicalkindunits();
            $this->collMedicalkindunitsPartial = true;
        }
        if (!in_array($l, $this->collMedicalkindunits->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMedicalkindunit($l);
        }

        return $this;
    }

    /**
     * @param	Medicalkindunit $medicalkindunit The medicalkindunit object to add.
     */
    protected function doAddMedicalkindunit($medicalkindunit)
    {
        $this->collMedicalkindunits[]= $medicalkindunit;
        $medicalkindunit->setEventtype($this);
    }

    /**
     * @param	Medicalkindunit $medicalkindunit The medicalkindunit object to remove.
     * @return Eventtype The current object (for fluent API support)
     */
    public function removeMedicalkindunit($medicalkindunit)
    {
        if ($this->getMedicalkindunits()->contains($medicalkindunit)) {
            $this->collMedicalkindunits->remove($this->collMedicalkindunits->search($medicalkindunit));
            if (null === $this->medicalkindunitsScheduledForDeletion) {
                $this->medicalkindunitsScheduledForDeletion = clone $this->collMedicalkindunits;
                $this->medicalkindunitsScheduledForDeletion->clear();
            }
            $this->medicalkindunitsScheduledForDeletion[]= $medicalkindunit;
            $medicalkindunit->setEventtype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Eventtype is new, it will return
     * an empty collection; or if this Eventtype has previously
     * been saved, it will retrieve related Medicalkindunits from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Eventtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Medicalkindunit[] List of Medicalkindunit objects
     */
    public function getMedicalkindunitsJoinRbmedicalkind($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MedicalkindunitQuery::create(null, $criteria);
        $query->joinWith('Rbmedicalkind', $join_behavior);

        return $this->getMedicalkindunits($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Eventtype is new, it will return
     * an empty collection; or if this Eventtype has previously
     * been saved, it will retrieve related Medicalkindunits from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Eventtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Medicalkindunit[] List of Medicalkindunit objects
     */
    public function getMedicalkindunitsJoinRbmedicalaidunit($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MedicalkindunitQuery::create(null, $criteria);
        $query->joinWith('Rbmedicalaidunit', $join_behavior);

        return $this->getMedicalkindunits($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Eventtype is new, it will return
     * an empty collection; or if this Eventtype has previously
     * been saved, it will retrieve related Medicalkindunits from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Eventtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Medicalkindunit[] List of Medicalkindunit objects
     */
    public function getMedicalkindunitsJoinRbpaytype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MedicalkindunitQuery::create(null, $criteria);
        $query->joinWith('Rbpaytype', $join_behavior);

        return $this->getMedicalkindunits($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Eventtype is new, it will return
     * an empty collection; or if this Eventtype has previously
     * been saved, it will retrieve related Medicalkindunits from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Eventtype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Medicalkindunit[] List of Medicalkindunit objects
     */
    public function getMedicalkindunitsJoinRbtarifftype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MedicalkindunitQuery::create(null, $criteria);
        $query->joinWith('Rbtarifftype', $join_behavior);

        return $this->getMedicalkindunits($query, $con);
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
        $this->code = null;
        $this->name = null;
        $this->purpose_id = null;
        $this->finance_id = null;
        $this->scene_id = null;
        $this->visitservicemodifier = null;
        $this->visitservicefilter = null;
        $this->visitfinance = null;
        $this->actionfinance = null;
        $this->period = null;
        $this->singleinperiod = null;
        $this->islong = null;
        $this->dateinput = null;
        $this->service_id = null;
        $this->context = null;
        $this->form = null;
        $this->minduration = null;
        $this->maxduration = null;
        $this->showstatusactionsinplanner = null;
        $this->showdiagnosticactionsinplanner = null;
        $this->showcureactionsinplanner = null;
        $this->showmiscactionsinplanner = null;
        $this->limitstatusactionsinput = null;
        $this->limitdiagnosticactionsinput = null;
        $this->limitcureactionsinput = null;
        $this->limitmiscactionsinput = null;
        $this->showtime = null;
        $this->medicalaidtype_id = null;
        $this->eventprofile_id = null;
        $this->mesrequired = null;
        $this->mescodemask = null;
        $this->mesnamemask = null;
        $this->counter_id = null;
        $this->isexternal = null;
        $this->isassistant = null;
        $this->iscurator = null;
        $this->canhavepayableactions = null;
        $this->isrequiredcoordination = null;
        $this->isorgstructurepriority = null;
        $this->istakentissue = null;
        $this->sex = null;
        $this->age = null;
        $this->rbmedicalkind_id = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->requesttype_id = null;
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
            if ($this->collActiontypeEventtypeChecks) {
                foreach ($this->collActiontypeEventtypeChecks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMedicalkindunits) {
                foreach ($this->collMedicalkindunits as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aRbcounter instanceof Persistent) {
              $this->aRbcounter->clearAllReferences($deep);
            }
            if ($this->aRbmedicalkind instanceof Persistent) {
              $this->aRbmedicalkind->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActiontypeEventtypeChecks instanceof PropelCollection) {
            $this->collActiontypeEventtypeChecks->clearIterator();
        }
        $this->collActiontypeEventtypeChecks = null;
        if ($this->collMedicalkindunits instanceof PropelCollection) {
            $this->collMedicalkindunits->clearIterator();
        }
        $this->collMedicalkindunits = null;
        $this->aRbcounter = null;
        $this->aRbmedicalkind = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EventtypePeer::DEFAULT_STRING_FORMAT);
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
