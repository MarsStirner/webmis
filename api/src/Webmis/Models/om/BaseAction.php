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
use Webmis\Models\Action;
use Webmis\Models\ActionDocument;
use Webmis\Models\ActionDocumentQuery;
use Webmis\Models\ActionPeer;
use Webmis\Models\ActionQuery;
use Webmis\Models\Actiontissue;
use Webmis\Models\ActiontissueQuery;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\TakentissuejournalQuery;
use Webmis\Models\Trfufinalvolume;
use Webmis\Models\TrfufinalvolumeQuery;
use Webmis\Models\Trfulaboratorymeasure;
use Webmis\Models\TrfulaboratorymeasureQuery;
use Webmis\Models\Trfuorderissueresult;
use Webmis\Models\TrfuorderissueresultQuery;

/**
 * Base class that represents a row from the 'Action' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseAction extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ActionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActionPeer
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
     * The value for the actiontype_id field.
     * @var        int
     */
    protected $actiontype_id;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the directiondate field.
     * @var        string
     */
    protected $directiondate;

    /**
     * The value for the status field.
     * @var        int
     */
    protected $status;

    /**
     * The value for the setperson_id field.
     * @var        int
     */
    protected $setperson_id;

    /**
     * The value for the isurgent field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $isurgent;

    /**
     * The value for the begdate field.
     * @var        string
     */
    protected $begdate;

    /**
     * The value for the plannedenddate field.
     * @var        string
     */
    protected $plannedenddate;

    /**
     * The value for the enddate field.
     * @var        string
     */
    protected $enddate;

    /**
     * The value for the note field.
     * @var        string
     */
    protected $note;

    /**
     * The value for the person_id field.
     * @var        int
     */
    protected $person_id;

    /**
     * The value for the office field.
     * @var        string
     */
    protected $office;

    /**
     * The value for the amount field.
     * @var        double
     */
    protected $amount;

    /**
     * The value for the uet field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $uet;

    /**
     * The value for the expose field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $expose;

    /**
     * The value for the paystatus field.
     * @var        int
     */
    protected $paystatus;

    /**
     * The value for the account field.
     * @var        boolean
     */
    protected $account;

    /**
     * The value for the finance_id field.
     * @var        int
     */
    protected $finance_id;

    /**
     * The value for the prescription_id field.
     * @var        int
     */
    protected $prescription_id;

    /**
     * The value for the takentissuejournal_id field.
     * @var        int
     */
    protected $takentissuejournal_id;

    /**
     * The value for the contract_id field.
     * @var        int
     */
    protected $contract_id;

    /**
     * The value for the coorddate field.
     * @var        string
     */
    protected $coorddate;

    /**
     * The value for the coordagent field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $coordagent;

    /**
     * The value for the coordinspector field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $coordinspector;

    /**
     * The value for the coordtext field.
     * @var        string
     */
    protected $coordtext;

    /**
     * The value for the hospitaluidfrom field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $hospitaluidfrom;

    /**
     * The value for the pacientinqueuetype field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pacientinqueuetype;

    /**
     * The value for the appointmenttype field.
     * @var        string
     */
    protected $appointmenttype;

    /**
     * The value for the version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $version;

    /**
     * The value for the parentaction_id field.
     * @var        int
     */
    protected $parentaction_id;

    /**
     * The value for the uuid_id field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $uuid_id;

    /**
     * The value for the dcm_study_uid field.
     * @var        string
     */
    protected $dcm_study_uid;

    /**
     * @var        Takentissuejournal
     */
    protected $aTakentissuejournal;

    /**
     * @var        PropelObjectCollection|Actiontissue[] Collection to store aggregation of Actiontissue objects.
     */
    protected $collActiontissues;
    protected $collActiontissuesPartial;

    /**
     * @var        PropelObjectCollection|ActionDocument[] Collection to store aggregation of ActionDocument objects.
     */
    protected $collActionDocuments;
    protected $collActionDocumentsPartial;

    /**
     * @var        PropelObjectCollection|Trfufinalvolume[] Collection to store aggregation of Trfufinalvolume objects.
     */
    protected $collTrfufinalvolumes;
    protected $collTrfufinalvolumesPartial;

    /**
     * @var        PropelObjectCollection|Trfulaboratorymeasure[] Collection to store aggregation of Trfulaboratorymeasure objects.
     */
    protected $collTrfulaboratorymeasures;
    protected $collTrfulaboratorymeasuresPartial;

    /**
     * @var        PropelObjectCollection|Trfuorderissueresult[] Collection to store aggregation of Trfuorderissueresult objects.
     */
    protected $collTrfuorderissueresults;
    protected $collTrfuorderissueresultsPartial;

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
    protected $actiontissuesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $actionDocumentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trfufinalvolumesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trfulaboratorymeasuresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trfuorderissueresultsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->idx = 0;
        $this->isurgent = 0;
        $this->uet = 0;
        $this->expose = 1;
        $this->coordagent = '';
        $this->coordinspector = '';
        $this->hospitaluidfrom = '0';
        $this->pacientinqueuetype = 0;
        $this->version = 0;
        $this->uuid_id = 0;
    }

    /**
     * Initializes internal state of BaseAction object.
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
     * Get the [actiontype_id] column value.
     *
     * @return int
     */
    public function getActiontypeId()
    {
        return $this->actiontype_id;
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
     * Get the [idx] column value.
     *
     * @return int
     */
    public function getIdx()
    {
        return $this->idx;
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
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [setperson_id] column value.
     *
     * @return int
     */
    public function getSetpersonId()
    {
        return $this->setperson_id;
    }

    /**
     * Get the [isurgent] column value.
     *
     * @return int
     */
    public function getIsurgent()
    {
        return $this->isurgent;
    }

    /**
     * Get the [optionally formatted] temporal [begdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBegdate($format = 'Y-m-d H:i:s')
    {
        if ($this->begdate === null) {
            return null;
        }

        if ($this->begdate === '0000-00-00 00:00:00') {
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
     * Get the [optionally formatted] temporal [plannedenddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPlannedenddate($format = 'Y-m-d H:i:s')
    {
        if ($this->plannedenddate === null) {
            return null;
        }

        if ($this->plannedenddate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->plannedenddate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->plannedenddate, true), $x);
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
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnddate($format = 'Y-m-d H:i:s')
    {
        if ($this->enddate === null) {
            return null;
        }

        if ($this->enddate === '0000-00-00 00:00:00') {
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
     * Get the [note] column value.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Get the [person_id] column value.
     *
     * @return int
     */
    public function getPersonId()
    {
        return $this->person_id;
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
     * Get the [amount] column value.
     *
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [uet] column value.
     *
     * @return double
     */
    public function getUet()
    {
        return $this->uet;
    }

    /**
     * Get the [expose] column value.
     *
     * @return int
     */
    public function getExpose()
    {
        return $this->expose;
    }

    /**
     * Get the [paystatus] column value.
     *
     * @return int
     */
    public function getPaystatus()
    {
        return $this->paystatus;
    }

    /**
     * Get the [account] column value.
     *
     * @return boolean
     */
    public function getAccount()
    {
        return $this->account;
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
     * Get the [prescription_id] column value.
     *
     * @return int
     */
    public function getPrescriptionId()
    {
        return $this->prescription_id;
    }

    /**
     * Get the [takentissuejournal_id] column value.
     *
     * @return int
     */
    public function getTakentissuejournalId()
    {
        return $this->takentissuejournal_id;
    }

    /**
     * Get the [contract_id] column value.
     *
     * @return int
     */
    public function getContractId()
    {
        return $this->contract_id;
    }

    /**
     * Get the [optionally formatted] temporal [coorddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCoorddate($format = 'Y-m-d H:i:s')
    {
        if ($this->coorddate === null) {
            return null;
        }

        if ($this->coorddate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->coorddate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->coorddate, true), $x);
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
     * Get the [coordagent] column value.
     *
     * @return string
     */
    public function getCoordagent()
    {
        return $this->coordagent;
    }

    /**
     * Get the [coordinspector] column value.
     *
     * @return string
     */
    public function getCoordinspector()
    {
        return $this->coordinspector;
    }

    /**
     * Get the [coordtext] column value.
     *
     * @return string
     */
    public function getCoordtext()
    {
        return $this->coordtext;
    }

    /**
     * Get the [hospitaluidfrom] column value.
     *
     * @return string
     */
    public function getHospitaluidfrom()
    {
        return $this->hospitaluidfrom;
    }

    /**
     * Get the [pacientinqueuetype] column value.
     *
     * @return int
     */
    public function getPacientinqueuetype()
    {
        return $this->pacientinqueuetype;
    }

    /**
     * Get the [appointmenttype] column value.
     *
     * @return string
     */
    public function getAppointmenttype()
    {
        return $this->appointmenttype;
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
     * Get the [parentaction_id] column value.
     *
     * @return int
     */
    public function getParentactionId()
    {
        return $this->parentaction_id;
    }

    /**
     * Get the [uuid_id] column value.
     *
     * @return int
     */
    public function getUuidId()
    {
        return $this->uuid_id;
    }

    /**
     * Get the [dcm_study_uid] column value.
     *
     * @return string
     */
    public function getDcmStudyUid()
    {
        return $this->dcm_study_uid;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActionPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ActionPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ActionPeer::MODIFYPERSON_ID;
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
     * @return Action The current object (for fluent API support)
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
            $this->modifiedColumns[] = ActionPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [actiontype_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setActiontypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->actiontype_id !== $v) {
            $this->actiontype_id = $v;
            $this->modifiedColumns[] = ActionPeer::ACTIONTYPE_ID;
        }


        return $this;
    } // setActiontypeId()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = ActionPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = ActionPeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Sets the value of [directiondate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setDirectiondate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->directiondate !== null || $dt !== null) {
            $currentDateAsString = ($this->directiondate !== null && $tmpDt = new DateTime($this->directiondate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->directiondate = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::DIRECTIONDATE;
            }
        } // if either are not null


        return $this;
    } // setDirectiondate()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ActionPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [setperson_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setSetpersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->setperson_id !== $v) {
            $this->setperson_id = $v;
            $this->modifiedColumns[] = ActionPeer::SETPERSON_ID;
        }


        return $this;
    } // setSetpersonId()

    /**
     * Set the value of [isurgent] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setIsurgent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->isurgent !== $v) {
            $this->isurgent = $v;
            $this->modifiedColumns[] = ActionPeer::ISURGENT;
        }


        return $this;
    } // setIsurgent()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [plannedenddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setPlannedenddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->plannedenddate !== null || $dt !== null) {
            $currentDateAsString = ($this->plannedenddate !== null && $tmpDt = new DateTime($this->plannedenddate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->plannedenddate = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::PLANNEDENDDATE;
            }
        } // if either are not null


        return $this;
    } // setPlannedenddate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [note] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = ActionPeer::NOTE;
        }


        return $this;
    } // setNote()

    /**
     * Set the value of [person_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setPersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->person_id !== $v) {
            $this->person_id = $v;
            $this->modifiedColumns[] = ActionPeer::PERSON_ID;
        }


        return $this;
    } // setPersonId()

    /**
     * Set the value of [office] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setOffice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->office !== $v) {
            $this->office = $v;
            $this->modifiedColumns[] = ActionPeer::OFFICE;
        }


        return $this;
    } // setOffice()

    /**
     * Set the value of [amount] column.
     *
     * @param double $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = ActionPeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [uet] column.
     *
     * @param double $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setUet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->uet !== $v) {
            $this->uet = $v;
            $this->modifiedColumns[] = ActionPeer::UET;
        }


        return $this;
    } // setUet()

    /**
     * Set the value of [expose] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setExpose($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->expose !== $v) {
            $this->expose = $v;
            $this->modifiedColumns[] = ActionPeer::EXPOSE;
        }


        return $this;
    } // setExpose()

    /**
     * Set the value of [paystatus] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setPaystatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->paystatus !== $v) {
            $this->paystatus = $v;
            $this->modifiedColumns[] = ActionPeer::PAYSTATUS;
        }


        return $this;
    } // setPaystatus()

    /**
     * Sets the value of the [account] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Action The current object (for fluent API support)
     */
    public function setAccount($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->account !== $v) {
            $this->account = $v;
            $this->modifiedColumns[] = ActionPeer::ACCOUNT;
        }


        return $this;
    } // setAccount()

    /**
     * Set the value of [finance_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setFinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->finance_id !== $v) {
            $this->finance_id = $v;
            $this->modifiedColumns[] = ActionPeer::FINANCE_ID;
        }


        return $this;
    } // setFinanceId()

    /**
     * Set the value of [prescription_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setPrescriptionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->prescription_id !== $v) {
            $this->prescription_id = $v;
            $this->modifiedColumns[] = ActionPeer::PRESCRIPTION_ID;
        }


        return $this;
    } // setPrescriptionId()

    /**
     * Set the value of [takentissuejournal_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setTakentissuejournalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->takentissuejournal_id !== $v) {
            $this->takentissuejournal_id = $v;
            $this->modifiedColumns[] = ActionPeer::TAKENTISSUEJOURNAL_ID;
        }

        if ($this->aTakentissuejournal !== null && $this->aTakentissuejournal->getId() !== $v) {
            $this->aTakentissuejournal = null;
        }


        return $this;
    } // setTakentissuejournalId()

    /**
     * Set the value of [contract_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setContractId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->contract_id !== $v) {
            $this->contract_id = $v;
            $this->modifiedColumns[] = ActionPeer::CONTRACT_ID;
        }


        return $this;
    } // setContractId()

    /**
     * Sets the value of [coorddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Action The current object (for fluent API support)
     */
    public function setCoorddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->coorddate !== null || $dt !== null) {
            $currentDateAsString = ($this->coorddate !== null && $tmpDt = new DateTime($this->coorddate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->coorddate = $newDateAsString;
                $this->modifiedColumns[] = ActionPeer::COORDDATE;
            }
        } // if either are not null


        return $this;
    } // setCoorddate()

    /**
     * Set the value of [coordagent] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setCoordagent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->coordagent !== $v) {
            $this->coordagent = $v;
            $this->modifiedColumns[] = ActionPeer::COORDAGENT;
        }


        return $this;
    } // setCoordagent()

    /**
     * Set the value of [coordinspector] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setCoordinspector($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->coordinspector !== $v) {
            $this->coordinspector = $v;
            $this->modifiedColumns[] = ActionPeer::COORDINSPECTOR;
        }


        return $this;
    } // setCoordinspector()

    /**
     * Set the value of [coordtext] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setCoordtext($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->coordtext !== $v) {
            $this->coordtext = $v;
            $this->modifiedColumns[] = ActionPeer::COORDTEXT;
        }


        return $this;
    } // setCoordtext()

    /**
     * Set the value of [hospitaluidfrom] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setHospitaluidfrom($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->hospitaluidfrom !== $v) {
            $this->hospitaluidfrom = $v;
            $this->modifiedColumns[] = ActionPeer::HOSPITALUIDFROM;
        }


        return $this;
    } // setHospitaluidfrom()

    /**
     * Set the value of [pacientinqueuetype] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setPacientinqueuetype($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pacientinqueuetype !== $v) {
            $this->pacientinqueuetype = $v;
            $this->modifiedColumns[] = ActionPeer::PACIENTINQUEUETYPE;
        }


        return $this;
    } // setPacientinqueuetype()

    /**
     * Set the value of [appointmenttype] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setAppointmenttype($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->appointmenttype !== $v) {
            $this->appointmenttype = $v;
            $this->modifiedColumns[] = ActionPeer::APPOINTMENTTYPE;
        }


        return $this;
    } // setAppointmenttype()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ActionPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Set the value of [parentaction_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setParentactionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->parentaction_id !== $v) {
            $this->parentaction_id = $v;
            $this->modifiedColumns[] = ActionPeer::PARENTACTION_ID;
        }


        return $this;
    } // setParentactionId()

    /**
     * Set the value of [uuid_id] column.
     *
     * @param int $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setUuidId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->uuid_id !== $v) {
            $this->uuid_id = $v;
            $this->modifiedColumns[] = ActionPeer::UUID_ID;
        }


        return $this;
    } // setUuidId()

    /**
     * Set the value of [dcm_study_uid] column.
     *
     * @param string $v new value
     * @return Action The current object (for fluent API support)
     */
    public function setDcmStudyUid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dcm_study_uid !== $v) {
            $this->dcm_study_uid = $v;
            $this->modifiedColumns[] = ActionPeer::DCM_STUDY_UID;
        }


        return $this;
    } // setDcmStudyUid()

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

            if ($this->idx !== 0) {
                return false;
            }

            if ($this->isurgent !== 0) {
                return false;
            }

            if ($this->uet !== 0) {
                return false;
            }

            if ($this->expose !== 1) {
                return false;
            }

            if ($this->coordagent !== '') {
                return false;
            }

            if ($this->coordinspector !== '') {
                return false;
            }

            if ($this->hospitaluidfrom !== '0') {
                return false;
            }

            if ($this->pacientinqueuetype !== 0) {
                return false;
            }

            if ($this->version !== 0) {
                return false;
            }

            if ($this->uuid_id !== 0) {
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
            $this->actiontype_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->event_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->idx = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->directiondate = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->status = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->setperson_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->isurgent = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->begdate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->plannedenddate = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->enddate = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->note = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->person_id = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->office = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->amount = ($row[$startcol + 19] !== null) ? (double) $row[$startcol + 19] : null;
            $this->uet = ($row[$startcol + 20] !== null) ? (double) $row[$startcol + 20] : null;
            $this->expose = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->paystatus = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
            $this->account = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
            $this->finance_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->prescription_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->takentissuejournal_id = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
            $this->contract_id = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
            $this->coorddate = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->coordagent = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->coordinspector = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->coordtext = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->hospitaluidfrom = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->pacientinqueuetype = ($row[$startcol + 33] !== null) ? (int) $row[$startcol + 33] : null;
            $this->appointmenttype = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->version = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
            $this->parentaction_id = ($row[$startcol + 36] !== null) ? (int) $row[$startcol + 36] : null;
            $this->uuid_id = ($row[$startcol + 37] !== null) ? (int) $row[$startcol + 37] : null;
            $this->dcm_study_uid = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 39; // 39 = ActionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Action object", $e);
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

        if ($this->aTakentissuejournal !== null && $this->takentissuejournal_id !== $this->aTakentissuejournal->getId()) {
            $this->aTakentissuejournal = null;
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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTakentissuejournal = null;
            $this->collActiontissues = null;

            $this->collActionDocuments = null;

            $this->collTrfufinalvolumes = null;

            $this->collTrfulaboratorymeasures = null;

            $this->collTrfuorderissueresults = null;

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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActionQuery::create()
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
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ActionPeer::addInstanceToPool($this);
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

            if ($this->aTakentissuejournal !== null) {
                if ($this->aTakentissuejournal->isModified() || $this->aTakentissuejournal->isNew()) {
                    $affectedRows += $this->aTakentissuejournal->save($con);
                }
                $this->setTakentissuejournal($this->aTakentissuejournal);
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

            if ($this->actiontissuesScheduledForDeletion !== null) {
                if (!$this->actiontissuesScheduledForDeletion->isEmpty()) {
                    ActiontissueQuery::create()
                        ->filterByPrimaryKeys($this->actiontissuesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actiontissuesScheduledForDeletion = null;
                }
            }

            if ($this->collActiontissues !== null) {
                foreach ($this->collActiontissues as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->actionDocumentsScheduledForDeletion !== null) {
                if (!$this->actionDocumentsScheduledForDeletion->isEmpty()) {
                    ActionDocumentQuery::create()
                        ->filterByPrimaryKeys($this->actionDocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actionDocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collActionDocuments !== null) {
                foreach ($this->collActionDocuments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trfufinalvolumesScheduledForDeletion !== null) {
                if (!$this->trfufinalvolumesScheduledForDeletion->isEmpty()) {
                    TrfufinalvolumeQuery::create()
                        ->filterByPrimaryKeys($this->trfufinalvolumesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trfufinalvolumesScheduledForDeletion = null;
                }
            }

            if ($this->collTrfufinalvolumes !== null) {
                foreach ($this->collTrfufinalvolumes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trfulaboratorymeasuresScheduledForDeletion !== null) {
                if (!$this->trfulaboratorymeasuresScheduledForDeletion->isEmpty()) {
                    TrfulaboratorymeasureQuery::create()
                        ->filterByPrimaryKeys($this->trfulaboratorymeasuresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trfulaboratorymeasuresScheduledForDeletion = null;
                }
            }

            if ($this->collTrfulaboratorymeasures !== null) {
                foreach ($this->collTrfulaboratorymeasures as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trfuorderissueresultsScheduledForDeletion !== null) {
                if (!$this->trfuorderissueresultsScheduledForDeletion->isEmpty()) {
                    TrfuorderissueresultQuery::create()
                        ->filterByPrimaryKeys($this->trfuorderissueresultsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trfuorderissueresultsScheduledForDeletion = null;
                }
            }

            if ($this->collTrfuorderissueresults !== null) {
                foreach ($this->collTrfuorderissueresults as $referrerFK) {
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

        $this->modifiedColumns[] = ActionPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActionPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActionPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ActionPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(ActionPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ActionPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(ActionPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ActionPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ActionPeer::ACTIONTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`actionType_id`';
        }
        if ($this->isColumnModified(ActionPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }
        if ($this->isColumnModified(ActionPeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(ActionPeer::DIRECTIONDATE)) {
            $modifiedColumns[':p' . $index++]  = '`directionDate`';
        }
        if ($this->isColumnModified(ActionPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ActionPeer::SETPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`setPerson_id`';
        }
        if ($this->isColumnModified(ActionPeer::ISURGENT)) {
            $modifiedColumns[':p' . $index++]  = '`isUrgent`';
        }
        if ($this->isColumnModified(ActionPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(ActionPeer::PLANNEDENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`plannedEndDate`';
        }
        if ($this->isColumnModified(ActionPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(ActionPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`note`';
        }
        if ($this->isColumnModified(ActionPeer::PERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`person_id`';
        }
        if ($this->isColumnModified(ActionPeer::OFFICE)) {
            $modifiedColumns[':p' . $index++]  = '`office`';
        }
        if ($this->isColumnModified(ActionPeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(ActionPeer::UET)) {
            $modifiedColumns[':p' . $index++]  = '`uet`';
        }
        if ($this->isColumnModified(ActionPeer::EXPOSE)) {
            $modifiedColumns[':p' . $index++]  = '`expose`';
        }
        if ($this->isColumnModified(ActionPeer::PAYSTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`payStatus`';
        }
        if ($this->isColumnModified(ActionPeer::ACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`account`';
        }
        if ($this->isColumnModified(ActionPeer::FINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`finance_id`';
        }
        if ($this->isColumnModified(ActionPeer::PRESCRIPTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`prescription_id`';
        }
        if ($this->isColumnModified(ActionPeer::TAKENTISSUEJOURNAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`takenTissueJournal_id`';
        }
        if ($this->isColumnModified(ActionPeer::CONTRACT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`contract_id`';
        }
        if ($this->isColumnModified(ActionPeer::COORDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`coordDate`';
        }
        if ($this->isColumnModified(ActionPeer::COORDAGENT)) {
            $modifiedColumns[':p' . $index++]  = '`coordAgent`';
        }
        if ($this->isColumnModified(ActionPeer::COORDINSPECTOR)) {
            $modifiedColumns[':p' . $index++]  = '`coordInspector`';
        }
        if ($this->isColumnModified(ActionPeer::COORDTEXT)) {
            $modifiedColumns[':p' . $index++]  = '`coordText`';
        }
        if ($this->isColumnModified(ActionPeer::HOSPITALUIDFROM)) {
            $modifiedColumns[':p' . $index++]  = '`hospitalUidFrom`';
        }
        if ($this->isColumnModified(ActionPeer::PACIENTINQUEUETYPE)) {
            $modifiedColumns[':p' . $index++]  = '`pacientInQueueType`';
        }
        if ($this->isColumnModified(ActionPeer::APPOINTMENTTYPE)) {
            $modifiedColumns[':p' . $index++]  = '`AppointmentType`';
        }
        if ($this->isColumnModified(ActionPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ActionPeer::PARENTACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`parentAction_id`';
        }
        if ($this->isColumnModified(ActionPeer::UUID_ID)) {
            $modifiedColumns[':p' . $index++]  = '`uuid_id`';
        }
        if ($this->isColumnModified(ActionPeer::DCM_STUDY_UID)) {
            $modifiedColumns[':p' . $index++]  = '`dcm_study_uid`';
        }

        $sql = sprintf(
            'INSERT INTO `Action` (%s) VALUES (%s)',
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
                    case '`actionType_id`':
                        $stmt->bindValue($identifier, $this->actiontype_id, PDO::PARAM_INT);
                        break;
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`directionDate`':
                        $stmt->bindValue($identifier, $this->directiondate, PDO::PARAM_STR);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case '`setPerson_id`':
                        $stmt->bindValue($identifier, $this->setperson_id, PDO::PARAM_INT);
                        break;
                    case '`isUrgent`':
                        $stmt->bindValue($identifier, $this->isurgent, PDO::PARAM_INT);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`plannedEndDate`':
                        $stmt->bindValue($identifier, $this->plannedenddate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`note`':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
                        break;
                    case '`person_id`':
                        $stmt->bindValue($identifier, $this->person_id, PDO::PARAM_INT);
                        break;
                    case '`office`':
                        $stmt->bindValue($identifier, $this->office, PDO::PARAM_STR);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case '`uet`':
                        $stmt->bindValue($identifier, $this->uet, PDO::PARAM_STR);
                        break;
                    case '`expose`':
                        $stmt->bindValue($identifier, $this->expose, PDO::PARAM_INT);
                        break;
                    case '`payStatus`':
                        $stmt->bindValue($identifier, $this->paystatus, PDO::PARAM_INT);
                        break;
                    case '`account`':
                        $stmt->bindValue($identifier, (int) $this->account, PDO::PARAM_INT);
                        break;
                    case '`finance_id`':
                        $stmt->bindValue($identifier, $this->finance_id, PDO::PARAM_INT);
                        break;
                    case '`prescription_id`':
                        $stmt->bindValue($identifier, $this->prescription_id, PDO::PARAM_INT);
                        break;
                    case '`takenTissueJournal_id`':
                        $stmt->bindValue($identifier, $this->takentissuejournal_id, PDO::PARAM_INT);
                        break;
                    case '`contract_id`':
                        $stmt->bindValue($identifier, $this->contract_id, PDO::PARAM_INT);
                        break;
                    case '`coordDate`':
                        $stmt->bindValue($identifier, $this->coorddate, PDO::PARAM_STR);
                        break;
                    case '`coordAgent`':
                        $stmt->bindValue($identifier, $this->coordagent, PDO::PARAM_STR);
                        break;
                    case '`coordInspector`':
                        $stmt->bindValue($identifier, $this->coordinspector, PDO::PARAM_STR);
                        break;
                    case '`coordText`':
                        $stmt->bindValue($identifier, $this->coordtext, PDO::PARAM_STR);
                        break;
                    case '`hospitalUidFrom`':
                        $stmt->bindValue($identifier, $this->hospitaluidfrom, PDO::PARAM_STR);
                        break;
                    case '`pacientInQueueType`':
                        $stmt->bindValue($identifier, $this->pacientinqueuetype, PDO::PARAM_INT);
                        break;
                    case '`AppointmentType`':
                        $stmt->bindValue($identifier, $this->appointmenttype, PDO::PARAM_STR);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
                        break;
                    case '`parentAction_id`':
                        $stmt->bindValue($identifier, $this->parentaction_id, PDO::PARAM_INT);
                        break;
                    case '`uuid_id`':
                        $stmt->bindValue($identifier, $this->uuid_id, PDO::PARAM_INT);
                        break;
                    case '`dcm_study_uid`':
                        $stmt->bindValue($identifier, $this->dcm_study_uid, PDO::PARAM_STR);
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

            if ($this->aTakentissuejournal !== null) {
                if (!$this->aTakentissuejournal->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTakentissuejournal->getValidationFailures());
                }
            }


            if (($retval = ActionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActiontissues !== null) {
                    foreach ($this->collActiontissues as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActionDocuments !== null) {
                    foreach ($this->collActionDocuments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrfufinalvolumes !== null) {
                    foreach ($this->collTrfufinalvolumes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrfulaboratorymeasures !== null) {
                    foreach ($this->collTrfulaboratorymeasures as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrfuorderissueresults !== null) {
                    foreach ($this->collTrfuorderissueresults as $referrerFK) {
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
        $pos = ActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getActiontypeId();
                break;
            case 7:
                return $this->getEventId();
                break;
            case 8:
                return $this->getIdx();
                break;
            case 9:
                return $this->getDirectiondate();
                break;
            case 10:
                return $this->getStatus();
                break;
            case 11:
                return $this->getSetpersonId();
                break;
            case 12:
                return $this->getIsurgent();
                break;
            case 13:
                return $this->getBegdate();
                break;
            case 14:
                return $this->getPlannedenddate();
                break;
            case 15:
                return $this->getEnddate();
                break;
            case 16:
                return $this->getNote();
                break;
            case 17:
                return $this->getPersonId();
                break;
            case 18:
                return $this->getOffice();
                break;
            case 19:
                return $this->getAmount();
                break;
            case 20:
                return $this->getUet();
                break;
            case 21:
                return $this->getExpose();
                break;
            case 22:
                return $this->getPaystatus();
                break;
            case 23:
                return $this->getAccount();
                break;
            case 24:
                return $this->getFinanceId();
                break;
            case 25:
                return $this->getPrescriptionId();
                break;
            case 26:
                return $this->getTakentissuejournalId();
                break;
            case 27:
                return $this->getContractId();
                break;
            case 28:
                return $this->getCoorddate();
                break;
            case 29:
                return $this->getCoordagent();
                break;
            case 30:
                return $this->getCoordinspector();
                break;
            case 31:
                return $this->getCoordtext();
                break;
            case 32:
                return $this->getHospitaluidfrom();
                break;
            case 33:
                return $this->getPacientinqueuetype();
                break;
            case 34:
                return $this->getAppointmenttype();
                break;
            case 35:
                return $this->getVersion();
                break;
            case 36:
                return $this->getParentactionId();
                break;
            case 37:
                return $this->getUuidId();
                break;
            case 38:
                return $this->getDcmStudyUid();
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
        if (isset($alreadyDumpedObjects['Action'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Action'][$this->getPrimaryKey()] = true;
        $keys = ActionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getActiontypeId(),
            $keys[7] => $this->getEventId(),
            $keys[8] => $this->getIdx(),
            $keys[9] => $this->getDirectiondate(),
            $keys[10] => $this->getStatus(),
            $keys[11] => $this->getSetpersonId(),
            $keys[12] => $this->getIsurgent(),
            $keys[13] => $this->getBegdate(),
            $keys[14] => $this->getPlannedenddate(),
            $keys[15] => $this->getEnddate(),
            $keys[16] => $this->getNote(),
            $keys[17] => $this->getPersonId(),
            $keys[18] => $this->getOffice(),
            $keys[19] => $this->getAmount(),
            $keys[20] => $this->getUet(),
            $keys[21] => $this->getExpose(),
            $keys[22] => $this->getPaystatus(),
            $keys[23] => $this->getAccount(),
            $keys[24] => $this->getFinanceId(),
            $keys[25] => $this->getPrescriptionId(),
            $keys[26] => $this->getTakentissuejournalId(),
            $keys[27] => $this->getContractId(),
            $keys[28] => $this->getCoorddate(),
            $keys[29] => $this->getCoordagent(),
            $keys[30] => $this->getCoordinspector(),
            $keys[31] => $this->getCoordtext(),
            $keys[32] => $this->getHospitaluidfrom(),
            $keys[33] => $this->getPacientinqueuetype(),
            $keys[34] => $this->getAppointmenttype(),
            $keys[35] => $this->getVersion(),
            $keys[36] => $this->getParentactionId(),
            $keys[37] => $this->getUuidId(),
            $keys[38] => $this->getDcmStudyUid(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aTakentissuejournal) {
                $result['Takentissuejournal'] = $this->aTakentissuejournal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActiontissues) {
                $result['Actiontissues'] = $this->collActiontissues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActionDocuments) {
                $result['ActionDocuments'] = $this->collActionDocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrfufinalvolumes) {
                $result['Trfufinalvolumes'] = $this->collTrfufinalvolumes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrfulaboratorymeasures) {
                $result['Trfulaboratorymeasures'] = $this->collTrfulaboratorymeasures->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrfuorderissueresults) {
                $result['Trfuorderissueresults'] = $this->collTrfuorderissueresults->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setActiontypeId($value);
                break;
            case 7:
                $this->setEventId($value);
                break;
            case 8:
                $this->setIdx($value);
                break;
            case 9:
                $this->setDirectiondate($value);
                break;
            case 10:
                $this->setStatus($value);
                break;
            case 11:
                $this->setSetpersonId($value);
                break;
            case 12:
                $this->setIsurgent($value);
                break;
            case 13:
                $this->setBegdate($value);
                break;
            case 14:
                $this->setPlannedenddate($value);
                break;
            case 15:
                $this->setEnddate($value);
                break;
            case 16:
                $this->setNote($value);
                break;
            case 17:
                $this->setPersonId($value);
                break;
            case 18:
                $this->setOffice($value);
                break;
            case 19:
                $this->setAmount($value);
                break;
            case 20:
                $this->setUet($value);
                break;
            case 21:
                $this->setExpose($value);
                break;
            case 22:
                $this->setPaystatus($value);
                break;
            case 23:
                $this->setAccount($value);
                break;
            case 24:
                $this->setFinanceId($value);
                break;
            case 25:
                $this->setPrescriptionId($value);
                break;
            case 26:
                $this->setTakentissuejournalId($value);
                break;
            case 27:
                $this->setContractId($value);
                break;
            case 28:
                $this->setCoorddate($value);
                break;
            case 29:
                $this->setCoordagent($value);
                break;
            case 30:
                $this->setCoordinspector($value);
                break;
            case 31:
                $this->setCoordtext($value);
                break;
            case 32:
                $this->setHospitaluidfrom($value);
                break;
            case 33:
                $this->setPacientinqueuetype($value);
                break;
            case 34:
                $this->setAppointmenttype($value);
                break;
            case 35:
                $this->setVersion($value);
                break;
            case 36:
                $this->setParentactionId($value);
                break;
            case 37:
                $this->setUuidId($value);
                break;
            case 38:
                $this->setDcmStudyUid($value);
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
        $keys = ActionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActiontypeId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setEventId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIdx($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDirectiondate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setStatus($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSetpersonId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIsurgent($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setBegdate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPlannedenddate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setEnddate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNote($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setPersonId($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setOffice($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setAmount($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setUet($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setExpose($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setPaystatus($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setAccount($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setFinanceId($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setPrescriptionId($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setTakentissuejournalId($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setContractId($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setCoorddate($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setCoordagent($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setCoordinspector($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setCoordtext($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setHospitaluidfrom($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setPacientinqueuetype($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setAppointmenttype($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setVersion($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setParentactionId($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setUuidId($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setDcmStudyUid($arr[$keys[38]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ActionPeer::ID)) $criteria->add(ActionPeer::ID, $this->id);
        if ($this->isColumnModified(ActionPeer::CREATEDATETIME)) $criteria->add(ActionPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ActionPeer::CREATEPERSON_ID)) $criteria->add(ActionPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ActionPeer::MODIFYDATETIME)) $criteria->add(ActionPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ActionPeer::MODIFYPERSON_ID)) $criteria->add(ActionPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ActionPeer::DELETED)) $criteria->add(ActionPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ActionPeer::ACTIONTYPE_ID)) $criteria->add(ActionPeer::ACTIONTYPE_ID, $this->actiontype_id);
        if ($this->isColumnModified(ActionPeer::EVENT_ID)) $criteria->add(ActionPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(ActionPeer::IDX)) $criteria->add(ActionPeer::IDX, $this->idx);
        if ($this->isColumnModified(ActionPeer::DIRECTIONDATE)) $criteria->add(ActionPeer::DIRECTIONDATE, $this->directiondate);
        if ($this->isColumnModified(ActionPeer::STATUS)) $criteria->add(ActionPeer::STATUS, $this->status);
        if ($this->isColumnModified(ActionPeer::SETPERSON_ID)) $criteria->add(ActionPeer::SETPERSON_ID, $this->setperson_id);
        if ($this->isColumnModified(ActionPeer::ISURGENT)) $criteria->add(ActionPeer::ISURGENT, $this->isurgent);
        if ($this->isColumnModified(ActionPeer::BEGDATE)) $criteria->add(ActionPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(ActionPeer::PLANNEDENDDATE)) $criteria->add(ActionPeer::PLANNEDENDDATE, $this->plannedenddate);
        if ($this->isColumnModified(ActionPeer::ENDDATE)) $criteria->add(ActionPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(ActionPeer::NOTE)) $criteria->add(ActionPeer::NOTE, $this->note);
        if ($this->isColumnModified(ActionPeer::PERSON_ID)) $criteria->add(ActionPeer::PERSON_ID, $this->person_id);
        if ($this->isColumnModified(ActionPeer::OFFICE)) $criteria->add(ActionPeer::OFFICE, $this->office);
        if ($this->isColumnModified(ActionPeer::AMOUNT)) $criteria->add(ActionPeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(ActionPeer::UET)) $criteria->add(ActionPeer::UET, $this->uet);
        if ($this->isColumnModified(ActionPeer::EXPOSE)) $criteria->add(ActionPeer::EXPOSE, $this->expose);
        if ($this->isColumnModified(ActionPeer::PAYSTATUS)) $criteria->add(ActionPeer::PAYSTATUS, $this->paystatus);
        if ($this->isColumnModified(ActionPeer::ACCOUNT)) $criteria->add(ActionPeer::ACCOUNT, $this->account);
        if ($this->isColumnModified(ActionPeer::FINANCE_ID)) $criteria->add(ActionPeer::FINANCE_ID, $this->finance_id);
        if ($this->isColumnModified(ActionPeer::PRESCRIPTION_ID)) $criteria->add(ActionPeer::PRESCRIPTION_ID, $this->prescription_id);
        if ($this->isColumnModified(ActionPeer::TAKENTISSUEJOURNAL_ID)) $criteria->add(ActionPeer::TAKENTISSUEJOURNAL_ID, $this->takentissuejournal_id);
        if ($this->isColumnModified(ActionPeer::CONTRACT_ID)) $criteria->add(ActionPeer::CONTRACT_ID, $this->contract_id);
        if ($this->isColumnModified(ActionPeer::COORDDATE)) $criteria->add(ActionPeer::COORDDATE, $this->coorddate);
        if ($this->isColumnModified(ActionPeer::COORDAGENT)) $criteria->add(ActionPeer::COORDAGENT, $this->coordagent);
        if ($this->isColumnModified(ActionPeer::COORDINSPECTOR)) $criteria->add(ActionPeer::COORDINSPECTOR, $this->coordinspector);
        if ($this->isColumnModified(ActionPeer::COORDTEXT)) $criteria->add(ActionPeer::COORDTEXT, $this->coordtext);
        if ($this->isColumnModified(ActionPeer::HOSPITALUIDFROM)) $criteria->add(ActionPeer::HOSPITALUIDFROM, $this->hospitaluidfrom);
        if ($this->isColumnModified(ActionPeer::PACIENTINQUEUETYPE)) $criteria->add(ActionPeer::PACIENTINQUEUETYPE, $this->pacientinqueuetype);
        if ($this->isColumnModified(ActionPeer::APPOINTMENTTYPE)) $criteria->add(ActionPeer::APPOINTMENTTYPE, $this->appointmenttype);
        if ($this->isColumnModified(ActionPeer::VERSION)) $criteria->add(ActionPeer::VERSION, $this->version);
        if ($this->isColumnModified(ActionPeer::PARENTACTION_ID)) $criteria->add(ActionPeer::PARENTACTION_ID, $this->parentaction_id);
        if ($this->isColumnModified(ActionPeer::UUID_ID)) $criteria->add(ActionPeer::UUID_ID, $this->uuid_id);
        if ($this->isColumnModified(ActionPeer::DCM_STUDY_UID)) $criteria->add(ActionPeer::DCM_STUDY_UID, $this->dcm_study_uid);

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
        $criteria = new Criteria(ActionPeer::DATABASE_NAME);
        $criteria->add(ActionPeer::ID, $this->id);

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
     * @param object $copyObj An object of Action (or compatible) type.
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
        $copyObj->setActiontypeId($this->getActiontypeId());
        $copyObj->setEventId($this->getEventId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setDirectiondate($this->getDirectiondate());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setSetpersonId($this->getSetpersonId());
        $copyObj->setIsurgent($this->getIsurgent());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setPlannedenddate($this->getPlannedenddate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setNote($this->getNote());
        $copyObj->setPersonId($this->getPersonId());
        $copyObj->setOffice($this->getOffice());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setUet($this->getUet());
        $copyObj->setExpose($this->getExpose());
        $copyObj->setPaystatus($this->getPaystatus());
        $copyObj->setAccount($this->getAccount());
        $copyObj->setFinanceId($this->getFinanceId());
        $copyObj->setPrescriptionId($this->getPrescriptionId());
        $copyObj->setTakentissuejournalId($this->getTakentissuejournalId());
        $copyObj->setContractId($this->getContractId());
        $copyObj->setCoorddate($this->getCoorddate());
        $copyObj->setCoordagent($this->getCoordagent());
        $copyObj->setCoordinspector($this->getCoordinspector());
        $copyObj->setCoordtext($this->getCoordtext());
        $copyObj->setHospitaluidfrom($this->getHospitaluidfrom());
        $copyObj->setPacientinqueuetype($this->getPacientinqueuetype());
        $copyObj->setAppointmenttype($this->getAppointmenttype());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setParentactionId($this->getParentactionId());
        $copyObj->setUuidId($this->getUuidId());
        $copyObj->setDcmStudyUid($this->getDcmStudyUid());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActiontissues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontissue($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActionDocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionDocument($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrfufinalvolumes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrfufinalvolume($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrfulaboratorymeasures() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrfulaboratorymeasure($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrfuorderissueresults() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrfuorderissueresult($relObj->copy($deepCopy));
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
     * @return Action Clone of current object.
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
     * @return ActionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Takentissuejournal object.
     *
     * @param             Takentissuejournal $v
     * @return Action The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTakentissuejournal(Takentissuejournal $v = null)
    {
        if ($v === null) {
            $this->setTakentissuejournalId(NULL);
        } else {
            $this->setTakentissuejournalId($v->getId());
        }

        $this->aTakentissuejournal = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Takentissuejournal object, it will not be re-added.
        if ($v !== null) {
            $v->addAction($this);
        }


        return $this;
    }


    /**
     * Get the associated Takentissuejournal object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Takentissuejournal The associated Takentissuejournal object.
     * @throws PropelException
     */
    public function getTakentissuejournal(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTakentissuejournal === null && ($this->takentissuejournal_id !== null) && $doQuery) {
            $this->aTakentissuejournal = TakentissuejournalQuery::create()->findPk($this->takentissuejournal_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTakentissuejournal->addActions($this);
             */
        }

        return $this->aTakentissuejournal;
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
        if ('Actiontissue' == $relationName) {
            $this->initActiontissues();
        }
        if ('ActionDocument' == $relationName) {
            $this->initActionDocuments();
        }
        if ('Trfufinalvolume' == $relationName) {
            $this->initTrfufinalvolumes();
        }
        if ('Trfulaboratorymeasure' == $relationName) {
            $this->initTrfulaboratorymeasures();
        }
        if ('Trfuorderissueresult' == $relationName) {
            $this->initTrfuorderissueresults();
        }
    }

    /**
     * Clears out the collActiontissues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Action The current object (for fluent API support)
     * @see        addActiontissues()
     */
    public function clearActiontissues()
    {
        $this->collActiontissues = null; // important to set this to null since that means it is uninitialized
        $this->collActiontissuesPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontissues collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontissues($v = true)
    {
        $this->collActiontissuesPartial = $v;
    }

    /**
     * Initializes the collActiontissues collection.
     *
     * By default this just sets the collActiontissues collection to an empty array (like clearcollActiontissues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontissues($overrideExisting = true)
    {
        if (null !== $this->collActiontissues && !$overrideExisting) {
            return;
        }
        $this->collActiontissues = new PropelObjectCollection();
        $this->collActiontissues->setModel('Actiontissue');
    }

    /**
     * Gets an array of Actiontissue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Action is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Actiontissue[] List of Actiontissue objects
     * @throws PropelException
     */
    public function getActiontissues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontissuesPartial && !$this->isNew();
        if (null === $this->collActiontissues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontissues) {
                // return empty collection
                $this->initActiontissues();
            } else {
                $collActiontissues = ActiontissueQuery::create(null, $criteria)
                    ->filterByAction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontissuesPartial && count($collActiontissues)) {
                      $this->initActiontissues(false);

                      foreach($collActiontissues as $obj) {
                        if (false == $this->collActiontissues->contains($obj)) {
                          $this->collActiontissues->append($obj);
                        }
                      }

                      $this->collActiontissuesPartial = true;
                    }

                    $collActiontissues->getInternalIterator()->rewind();
                    return $collActiontissues;
                }

                if($partial && $this->collActiontissues) {
                    foreach($this->collActiontissues as $obj) {
                        if($obj->isNew()) {
                            $collActiontissues[] = $obj;
                        }
                    }
                }

                $this->collActiontissues = $collActiontissues;
                $this->collActiontissuesPartial = false;
            }
        }

        return $this->collActiontissues;
    }

    /**
     * Sets a collection of Actiontissue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontissues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Action The current object (for fluent API support)
     */
    public function setActiontissues(PropelCollection $actiontissues, PropelPDO $con = null)
    {
        $actiontissuesToDelete = $this->getActiontissues(new Criteria(), $con)->diff($actiontissues);

        $this->actiontissuesScheduledForDeletion = unserialize(serialize($actiontissuesToDelete));

        foreach ($actiontissuesToDelete as $actiontissueRemoved) {
            $actiontissueRemoved->setAction(null);
        }

        $this->collActiontissues = null;
        foreach ($actiontissues as $actiontissue) {
            $this->addActiontissue($actiontissue);
        }

        $this->collActiontissues = $actiontissues;
        $this->collActiontissuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Actiontissue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Actiontissue objects.
     * @throws PropelException
     */
    public function countActiontissues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontissuesPartial && !$this->isNew();
        if (null === $this->collActiontissues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontissues) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontissues());
            }
            $query = ActiontissueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAction($this)
                ->count($con);
        }

        return count($this->collActiontissues);
    }

    /**
     * Method called to associate a Actiontissue object to this object
     * through the Actiontissue foreign key attribute.
     *
     * @param    Actiontissue $l Actiontissue
     * @return Action The current object (for fluent API support)
     */
    public function addActiontissue(Actiontissue $l)
    {
        if ($this->collActiontissues === null) {
            $this->initActiontissues();
            $this->collActiontissuesPartial = true;
        }
        if (!in_array($l, $this->collActiontissues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontissue($l);
        }

        return $this;
    }

    /**
     * @param	Actiontissue $actiontissue The actiontissue object to add.
     */
    protected function doAddActiontissue($actiontissue)
    {
        $this->collActiontissues[]= $actiontissue;
        $actiontissue->setAction($this);
    }

    /**
     * @param	Actiontissue $actiontissue The actiontissue object to remove.
     * @return Action The current object (for fluent API support)
     */
    public function removeActiontissue($actiontissue)
    {
        if ($this->getActiontissues()->contains($actiontissue)) {
            $this->collActiontissues->remove($this->collActiontissues->search($actiontissue));
            if (null === $this->actiontissuesScheduledForDeletion) {
                $this->actiontissuesScheduledForDeletion = clone $this->collActiontissues;
                $this->actiontissuesScheduledForDeletion->clear();
            }
            $this->actiontissuesScheduledForDeletion[]= clone $actiontissue;
            $actiontissue->setAction(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Action is new, it will return
     * an empty collection; or if this Action has previously
     * been saved, it will retrieve related Actiontissues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Action.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Actiontissue[] List of Actiontissue objects
     */
    public function getActiontissuesJoinTissue($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontissueQuery::create(null, $criteria);
        $query->joinWith('Tissue', $join_behavior);

        return $this->getActiontissues($query, $con);
    }

    /**
     * Clears out the collActionDocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Action The current object (for fluent API support)
     * @see        addActionDocuments()
     */
    public function clearActionDocuments()
    {
        $this->collActionDocuments = null; // important to set this to null since that means it is uninitialized
        $this->collActionDocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collActionDocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialActionDocuments($v = true)
    {
        $this->collActionDocumentsPartial = $v;
    }

    /**
     * Initializes the collActionDocuments collection.
     *
     * By default this just sets the collActionDocuments collection to an empty array (like clearcollActionDocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActionDocuments($overrideExisting = true)
    {
        if (null !== $this->collActionDocuments && !$overrideExisting) {
            return;
        }
        $this->collActionDocuments = new PropelObjectCollection();
        $this->collActionDocuments->setModel('ActionDocument');
    }

    /**
     * Gets an array of ActionDocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Action is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActionDocument[] List of ActionDocument objects
     * @throws PropelException
     */
    public function getActionDocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionDocumentsPartial && !$this->isNew();
        if (null === $this->collActionDocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActionDocuments) {
                // return empty collection
                $this->initActionDocuments();
            } else {
                $collActionDocuments = ActionDocumentQuery::create(null, $criteria)
                    ->filterByAction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionDocumentsPartial && count($collActionDocuments)) {
                      $this->initActionDocuments(false);

                      foreach($collActionDocuments as $obj) {
                        if (false == $this->collActionDocuments->contains($obj)) {
                          $this->collActionDocuments->append($obj);
                        }
                      }

                      $this->collActionDocumentsPartial = true;
                    }

                    $collActionDocuments->getInternalIterator()->rewind();
                    return $collActionDocuments;
                }

                if($partial && $this->collActionDocuments) {
                    foreach($this->collActionDocuments as $obj) {
                        if($obj->isNew()) {
                            $collActionDocuments[] = $obj;
                        }
                    }
                }

                $this->collActionDocuments = $collActionDocuments;
                $this->collActionDocumentsPartial = false;
            }
        }

        return $this->collActionDocuments;
    }

    /**
     * Sets a collection of ActionDocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actionDocuments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Action The current object (for fluent API support)
     */
    public function setActionDocuments(PropelCollection $actionDocuments, PropelPDO $con = null)
    {
        $actionDocumentsToDelete = $this->getActionDocuments(new Criteria(), $con)->diff($actionDocuments);

        $this->actionDocumentsScheduledForDeletion = unserialize(serialize($actionDocumentsToDelete));

        foreach ($actionDocumentsToDelete as $actionDocumentRemoved) {
            $actionDocumentRemoved->setAction(null);
        }

        $this->collActionDocuments = null;
        foreach ($actionDocuments as $actionDocument) {
            $this->addActionDocument($actionDocument);
        }

        $this->collActionDocuments = $actionDocuments;
        $this->collActionDocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActionDocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActionDocument objects.
     * @throws PropelException
     */
    public function countActionDocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionDocumentsPartial && !$this->isNew();
        if (null === $this->collActionDocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActionDocuments) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActionDocuments());
            }
            $query = ActionDocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAction($this)
                ->count($con);
        }

        return count($this->collActionDocuments);
    }

    /**
     * Method called to associate a ActionDocument object to this object
     * through the ActionDocument foreign key attribute.
     *
     * @param    ActionDocument $l ActionDocument
     * @return Action The current object (for fluent API support)
     */
    public function addActionDocument(ActionDocument $l)
    {
        if ($this->collActionDocuments === null) {
            $this->initActionDocuments();
            $this->collActionDocumentsPartial = true;
        }
        if (!in_array($l, $this->collActionDocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActionDocument($l);
        }

        return $this;
    }

    /**
     * @param	ActionDocument $actionDocument The actionDocument object to add.
     */
    protected function doAddActionDocument($actionDocument)
    {
        $this->collActionDocuments[]= $actionDocument;
        $actionDocument->setAction($this);
    }

    /**
     * @param	ActionDocument $actionDocument The actionDocument object to remove.
     * @return Action The current object (for fluent API support)
     */
    public function removeActionDocument($actionDocument)
    {
        if ($this->getActionDocuments()->contains($actionDocument)) {
            $this->collActionDocuments->remove($this->collActionDocuments->search($actionDocument));
            if (null === $this->actionDocumentsScheduledForDeletion) {
                $this->actionDocumentsScheduledForDeletion = clone $this->collActionDocuments;
                $this->actionDocumentsScheduledForDeletion->clear();
            }
            $this->actionDocumentsScheduledForDeletion[]= clone $actionDocument;
            $actionDocument->setAction(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Action is new, it will return
     * an empty collection; or if this Action has previously
     * been saved, it will retrieve related ActionDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Action.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActionDocument[] List of ActionDocument objects
     */
    public function getActionDocumentsJoinRbprinttemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionDocumentQuery::create(null, $criteria);
        $query->joinWith('Rbprinttemplate', $join_behavior);

        return $this->getActionDocuments($query, $con);
    }

    /**
     * Clears out the collTrfufinalvolumes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Action The current object (for fluent API support)
     * @see        addTrfufinalvolumes()
     */
    public function clearTrfufinalvolumes()
    {
        $this->collTrfufinalvolumes = null; // important to set this to null since that means it is uninitialized
        $this->collTrfufinalvolumesPartial = null;

        return $this;
    }

    /**
     * reset is the collTrfufinalvolumes collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrfufinalvolumes($v = true)
    {
        $this->collTrfufinalvolumesPartial = $v;
    }

    /**
     * Initializes the collTrfufinalvolumes collection.
     *
     * By default this just sets the collTrfufinalvolumes collection to an empty array (like clearcollTrfufinalvolumes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrfufinalvolumes($overrideExisting = true)
    {
        if (null !== $this->collTrfufinalvolumes && !$overrideExisting) {
            return;
        }
        $this->collTrfufinalvolumes = new PropelObjectCollection();
        $this->collTrfufinalvolumes->setModel('Trfufinalvolume');
    }

    /**
     * Gets an array of Trfufinalvolume objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Action is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trfufinalvolume[] List of Trfufinalvolume objects
     * @throws PropelException
     */
    public function getTrfufinalvolumes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrfufinalvolumesPartial && !$this->isNew();
        if (null === $this->collTrfufinalvolumes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrfufinalvolumes) {
                // return empty collection
                $this->initTrfufinalvolumes();
            } else {
                $collTrfufinalvolumes = TrfufinalvolumeQuery::create(null, $criteria)
                    ->filterByAction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrfufinalvolumesPartial && count($collTrfufinalvolumes)) {
                      $this->initTrfufinalvolumes(false);

                      foreach($collTrfufinalvolumes as $obj) {
                        if (false == $this->collTrfufinalvolumes->contains($obj)) {
                          $this->collTrfufinalvolumes->append($obj);
                        }
                      }

                      $this->collTrfufinalvolumesPartial = true;
                    }

                    $collTrfufinalvolumes->getInternalIterator()->rewind();
                    return $collTrfufinalvolumes;
                }

                if($partial && $this->collTrfufinalvolumes) {
                    foreach($this->collTrfufinalvolumes as $obj) {
                        if($obj->isNew()) {
                            $collTrfufinalvolumes[] = $obj;
                        }
                    }
                }

                $this->collTrfufinalvolumes = $collTrfufinalvolumes;
                $this->collTrfufinalvolumesPartial = false;
            }
        }

        return $this->collTrfufinalvolumes;
    }

    /**
     * Sets a collection of Trfufinalvolume objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trfufinalvolumes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Action The current object (for fluent API support)
     */
    public function setTrfufinalvolumes(PropelCollection $trfufinalvolumes, PropelPDO $con = null)
    {
        $trfufinalvolumesToDelete = $this->getTrfufinalvolumes(new Criteria(), $con)->diff($trfufinalvolumes);

        $this->trfufinalvolumesScheduledForDeletion = unserialize(serialize($trfufinalvolumesToDelete));

        foreach ($trfufinalvolumesToDelete as $trfufinalvolumeRemoved) {
            $trfufinalvolumeRemoved->setAction(null);
        }

        $this->collTrfufinalvolumes = null;
        foreach ($trfufinalvolumes as $trfufinalvolume) {
            $this->addTrfufinalvolume($trfufinalvolume);
        }

        $this->collTrfufinalvolumes = $trfufinalvolumes;
        $this->collTrfufinalvolumesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Trfufinalvolume objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Trfufinalvolume objects.
     * @throws PropelException
     */
    public function countTrfufinalvolumes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrfufinalvolumesPartial && !$this->isNew();
        if (null === $this->collTrfufinalvolumes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrfufinalvolumes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrfufinalvolumes());
            }
            $query = TrfufinalvolumeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAction($this)
                ->count($con);
        }

        return count($this->collTrfufinalvolumes);
    }

    /**
     * Method called to associate a Trfufinalvolume object to this object
     * through the Trfufinalvolume foreign key attribute.
     *
     * @param    Trfufinalvolume $l Trfufinalvolume
     * @return Action The current object (for fluent API support)
     */
    public function addTrfufinalvolume(Trfufinalvolume $l)
    {
        if ($this->collTrfufinalvolumes === null) {
            $this->initTrfufinalvolumes();
            $this->collTrfufinalvolumesPartial = true;
        }
        if (!in_array($l, $this->collTrfufinalvolumes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrfufinalvolume($l);
        }

        return $this;
    }

    /**
     * @param	Trfufinalvolume $trfufinalvolume The trfufinalvolume object to add.
     */
    protected function doAddTrfufinalvolume($trfufinalvolume)
    {
        $this->collTrfufinalvolumes[]= $trfufinalvolume;
        $trfufinalvolume->setAction($this);
    }

    /**
     * @param	Trfufinalvolume $trfufinalvolume The trfufinalvolume object to remove.
     * @return Action The current object (for fluent API support)
     */
    public function removeTrfufinalvolume($trfufinalvolume)
    {
        if ($this->getTrfufinalvolumes()->contains($trfufinalvolume)) {
            $this->collTrfufinalvolumes->remove($this->collTrfufinalvolumes->search($trfufinalvolume));
            if (null === $this->trfufinalvolumesScheduledForDeletion) {
                $this->trfufinalvolumesScheduledForDeletion = clone $this->collTrfufinalvolumes;
                $this->trfufinalvolumesScheduledForDeletion->clear();
            }
            $this->trfufinalvolumesScheduledForDeletion[]= clone $trfufinalvolume;
            $trfufinalvolume->setAction(null);
        }

        return $this;
    }

    /**
     * Clears out the collTrfulaboratorymeasures collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Action The current object (for fluent API support)
     * @see        addTrfulaboratorymeasures()
     */
    public function clearTrfulaboratorymeasures()
    {
        $this->collTrfulaboratorymeasures = null; // important to set this to null since that means it is uninitialized
        $this->collTrfulaboratorymeasuresPartial = null;

        return $this;
    }

    /**
     * reset is the collTrfulaboratorymeasures collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrfulaboratorymeasures($v = true)
    {
        $this->collTrfulaboratorymeasuresPartial = $v;
    }

    /**
     * Initializes the collTrfulaboratorymeasures collection.
     *
     * By default this just sets the collTrfulaboratorymeasures collection to an empty array (like clearcollTrfulaboratorymeasures());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrfulaboratorymeasures($overrideExisting = true)
    {
        if (null !== $this->collTrfulaboratorymeasures && !$overrideExisting) {
            return;
        }
        $this->collTrfulaboratorymeasures = new PropelObjectCollection();
        $this->collTrfulaboratorymeasures->setModel('Trfulaboratorymeasure');
    }

    /**
     * Gets an array of Trfulaboratorymeasure objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Action is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trfulaboratorymeasure[] List of Trfulaboratorymeasure objects
     * @throws PropelException
     */
    public function getTrfulaboratorymeasures($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrfulaboratorymeasuresPartial && !$this->isNew();
        if (null === $this->collTrfulaboratorymeasures || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrfulaboratorymeasures) {
                // return empty collection
                $this->initTrfulaboratorymeasures();
            } else {
                $collTrfulaboratorymeasures = TrfulaboratorymeasureQuery::create(null, $criteria)
                    ->filterByAction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrfulaboratorymeasuresPartial && count($collTrfulaboratorymeasures)) {
                      $this->initTrfulaboratorymeasures(false);

                      foreach($collTrfulaboratorymeasures as $obj) {
                        if (false == $this->collTrfulaboratorymeasures->contains($obj)) {
                          $this->collTrfulaboratorymeasures->append($obj);
                        }
                      }

                      $this->collTrfulaboratorymeasuresPartial = true;
                    }

                    $collTrfulaboratorymeasures->getInternalIterator()->rewind();
                    return $collTrfulaboratorymeasures;
                }

                if($partial && $this->collTrfulaboratorymeasures) {
                    foreach($this->collTrfulaboratorymeasures as $obj) {
                        if($obj->isNew()) {
                            $collTrfulaboratorymeasures[] = $obj;
                        }
                    }
                }

                $this->collTrfulaboratorymeasures = $collTrfulaboratorymeasures;
                $this->collTrfulaboratorymeasuresPartial = false;
            }
        }

        return $this->collTrfulaboratorymeasures;
    }

    /**
     * Sets a collection of Trfulaboratorymeasure objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trfulaboratorymeasures A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Action The current object (for fluent API support)
     */
    public function setTrfulaboratorymeasures(PropelCollection $trfulaboratorymeasures, PropelPDO $con = null)
    {
        $trfulaboratorymeasuresToDelete = $this->getTrfulaboratorymeasures(new Criteria(), $con)->diff($trfulaboratorymeasures);

        $this->trfulaboratorymeasuresScheduledForDeletion = unserialize(serialize($trfulaboratorymeasuresToDelete));

        foreach ($trfulaboratorymeasuresToDelete as $trfulaboratorymeasureRemoved) {
            $trfulaboratorymeasureRemoved->setAction(null);
        }

        $this->collTrfulaboratorymeasures = null;
        foreach ($trfulaboratorymeasures as $trfulaboratorymeasure) {
            $this->addTrfulaboratorymeasure($trfulaboratorymeasure);
        }

        $this->collTrfulaboratorymeasures = $trfulaboratorymeasures;
        $this->collTrfulaboratorymeasuresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Trfulaboratorymeasure objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Trfulaboratorymeasure objects.
     * @throws PropelException
     */
    public function countTrfulaboratorymeasures(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrfulaboratorymeasuresPartial && !$this->isNew();
        if (null === $this->collTrfulaboratorymeasures || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrfulaboratorymeasures) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrfulaboratorymeasures());
            }
            $query = TrfulaboratorymeasureQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAction($this)
                ->count($con);
        }

        return count($this->collTrfulaboratorymeasures);
    }

    /**
     * Method called to associate a Trfulaboratorymeasure object to this object
     * through the Trfulaboratorymeasure foreign key attribute.
     *
     * @param    Trfulaboratorymeasure $l Trfulaboratorymeasure
     * @return Action The current object (for fluent API support)
     */
    public function addTrfulaboratorymeasure(Trfulaboratorymeasure $l)
    {
        if ($this->collTrfulaboratorymeasures === null) {
            $this->initTrfulaboratorymeasures();
            $this->collTrfulaboratorymeasuresPartial = true;
        }
        if (!in_array($l, $this->collTrfulaboratorymeasures->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrfulaboratorymeasure($l);
        }

        return $this;
    }

    /**
     * @param	Trfulaboratorymeasure $trfulaboratorymeasure The trfulaboratorymeasure object to add.
     */
    protected function doAddTrfulaboratorymeasure($trfulaboratorymeasure)
    {
        $this->collTrfulaboratorymeasures[]= $trfulaboratorymeasure;
        $trfulaboratorymeasure->setAction($this);
    }

    /**
     * @param	Trfulaboratorymeasure $trfulaboratorymeasure The trfulaboratorymeasure object to remove.
     * @return Action The current object (for fluent API support)
     */
    public function removeTrfulaboratorymeasure($trfulaboratorymeasure)
    {
        if ($this->getTrfulaboratorymeasures()->contains($trfulaboratorymeasure)) {
            $this->collTrfulaboratorymeasures->remove($this->collTrfulaboratorymeasures->search($trfulaboratorymeasure));
            if (null === $this->trfulaboratorymeasuresScheduledForDeletion) {
                $this->trfulaboratorymeasuresScheduledForDeletion = clone $this->collTrfulaboratorymeasures;
                $this->trfulaboratorymeasuresScheduledForDeletion->clear();
            }
            $this->trfulaboratorymeasuresScheduledForDeletion[]= clone $trfulaboratorymeasure;
            $trfulaboratorymeasure->setAction(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Action is new, it will return
     * an empty collection; or if this Action has previously
     * been saved, it will retrieve related Trfulaboratorymeasures from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Action.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trfulaboratorymeasure[] List of Trfulaboratorymeasure objects
     */
    public function getTrfulaboratorymeasuresJoinRbtrfulaboratorymeasuretypes($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrfulaboratorymeasureQuery::create(null, $criteria);
        $query->joinWith('Rbtrfulaboratorymeasuretypes', $join_behavior);

        return $this->getTrfulaboratorymeasures($query, $con);
    }

    /**
     * Clears out the collTrfuorderissueresults collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Action The current object (for fluent API support)
     * @see        addTrfuorderissueresults()
     */
    public function clearTrfuorderissueresults()
    {
        $this->collTrfuorderissueresults = null; // important to set this to null since that means it is uninitialized
        $this->collTrfuorderissueresultsPartial = null;

        return $this;
    }

    /**
     * reset is the collTrfuorderissueresults collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrfuorderissueresults($v = true)
    {
        $this->collTrfuorderissueresultsPartial = $v;
    }

    /**
     * Initializes the collTrfuorderissueresults collection.
     *
     * By default this just sets the collTrfuorderissueresults collection to an empty array (like clearcollTrfuorderissueresults());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrfuorderissueresults($overrideExisting = true)
    {
        if (null !== $this->collTrfuorderissueresults && !$overrideExisting) {
            return;
        }
        $this->collTrfuorderissueresults = new PropelObjectCollection();
        $this->collTrfuorderissueresults->setModel('Trfuorderissueresult');
    }

    /**
     * Gets an array of Trfuorderissueresult objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Action is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trfuorderissueresult[] List of Trfuorderissueresult objects
     * @throws PropelException
     */
    public function getTrfuorderissueresults($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrfuorderissueresultsPartial && !$this->isNew();
        if (null === $this->collTrfuorderissueresults || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrfuorderissueresults) {
                // return empty collection
                $this->initTrfuorderissueresults();
            } else {
                $collTrfuorderissueresults = TrfuorderissueresultQuery::create(null, $criteria)
                    ->filterByAction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrfuorderissueresultsPartial && count($collTrfuorderissueresults)) {
                      $this->initTrfuorderissueresults(false);

                      foreach($collTrfuorderissueresults as $obj) {
                        if (false == $this->collTrfuorderissueresults->contains($obj)) {
                          $this->collTrfuorderissueresults->append($obj);
                        }
                      }

                      $this->collTrfuorderissueresultsPartial = true;
                    }

                    $collTrfuorderissueresults->getInternalIterator()->rewind();
                    return $collTrfuorderissueresults;
                }

                if($partial && $this->collTrfuorderissueresults) {
                    foreach($this->collTrfuorderissueresults as $obj) {
                        if($obj->isNew()) {
                            $collTrfuorderissueresults[] = $obj;
                        }
                    }
                }

                $this->collTrfuorderissueresults = $collTrfuorderissueresults;
                $this->collTrfuorderissueresultsPartial = false;
            }
        }

        return $this->collTrfuorderissueresults;
    }

    /**
     * Sets a collection of Trfuorderissueresult objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trfuorderissueresults A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Action The current object (for fluent API support)
     */
    public function setTrfuorderissueresults(PropelCollection $trfuorderissueresults, PropelPDO $con = null)
    {
        $trfuorderissueresultsToDelete = $this->getTrfuorderissueresults(new Criteria(), $con)->diff($trfuorderissueresults);

        $this->trfuorderissueresultsScheduledForDeletion = unserialize(serialize($trfuorderissueresultsToDelete));

        foreach ($trfuorderissueresultsToDelete as $trfuorderissueresultRemoved) {
            $trfuorderissueresultRemoved->setAction(null);
        }

        $this->collTrfuorderissueresults = null;
        foreach ($trfuorderissueresults as $trfuorderissueresult) {
            $this->addTrfuorderissueresult($trfuorderissueresult);
        }

        $this->collTrfuorderissueresults = $trfuorderissueresults;
        $this->collTrfuorderissueresultsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Trfuorderissueresult objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Trfuorderissueresult objects.
     * @throws PropelException
     */
    public function countTrfuorderissueresults(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrfuorderissueresultsPartial && !$this->isNew();
        if (null === $this->collTrfuorderissueresults || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrfuorderissueresults) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrfuorderissueresults());
            }
            $query = TrfuorderissueresultQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAction($this)
                ->count($con);
        }

        return count($this->collTrfuorderissueresults);
    }

    /**
     * Method called to associate a Trfuorderissueresult object to this object
     * through the Trfuorderissueresult foreign key attribute.
     *
     * @param    Trfuorderissueresult $l Trfuorderissueresult
     * @return Action The current object (for fluent API support)
     */
    public function addTrfuorderissueresult(Trfuorderissueresult $l)
    {
        if ($this->collTrfuorderissueresults === null) {
            $this->initTrfuorderissueresults();
            $this->collTrfuorderissueresultsPartial = true;
        }
        if (!in_array($l, $this->collTrfuorderissueresults->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrfuorderissueresult($l);
        }

        return $this;
    }

    /**
     * @param	Trfuorderissueresult $trfuorderissueresult The trfuorderissueresult object to add.
     */
    protected function doAddTrfuorderissueresult($trfuorderissueresult)
    {
        $this->collTrfuorderissueresults[]= $trfuorderissueresult;
        $trfuorderissueresult->setAction($this);
    }

    /**
     * @param	Trfuorderissueresult $trfuorderissueresult The trfuorderissueresult object to remove.
     * @return Action The current object (for fluent API support)
     */
    public function removeTrfuorderissueresult($trfuorderissueresult)
    {
        if ($this->getTrfuorderissueresults()->contains($trfuorderissueresult)) {
            $this->collTrfuorderissueresults->remove($this->collTrfuorderissueresults->search($trfuorderissueresult));
            if (null === $this->trfuorderissueresultsScheduledForDeletion) {
                $this->trfuorderissueresultsScheduledForDeletion = clone $this->collTrfuorderissueresults;
                $this->trfuorderissueresultsScheduledForDeletion->clear();
            }
            $this->trfuorderissueresultsScheduledForDeletion[]= clone $trfuorderissueresult;
            $trfuorderissueresult->setAction(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Action is new, it will return
     * an empty collection; or if this Action has previously
     * been saved, it will retrieve related Trfuorderissueresults from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Action.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trfuorderissueresult[] List of Trfuorderissueresult objects
     */
    public function getTrfuorderissueresultsJoinRbtrfubloodcomponenttype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrfuorderissueresultQuery::create(null, $criteria);
        $query->joinWith('Rbtrfubloodcomponenttype', $join_behavior);

        return $this->getTrfuorderissueresults($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Action is new, it will return
     * an empty collection; or if this Action has previously
     * been saved, it will retrieve related Trfuorderissueresults from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Action.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trfuorderissueresult[] List of Trfuorderissueresult objects
     */
    public function getTrfuorderissueresultsJoinRbbloodtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrfuorderissueresultQuery::create(null, $criteria);
        $query->joinWith('Rbbloodtype', $join_behavior);

        return $this->getTrfuorderissueresults($query, $con);
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
        $this->actiontype_id = null;
        $this->event_id = null;
        $this->idx = null;
        $this->directiondate = null;
        $this->status = null;
        $this->setperson_id = null;
        $this->isurgent = null;
        $this->begdate = null;
        $this->plannedenddate = null;
        $this->enddate = null;
        $this->note = null;
        $this->person_id = null;
        $this->office = null;
        $this->amount = null;
        $this->uet = null;
        $this->expose = null;
        $this->paystatus = null;
        $this->account = null;
        $this->finance_id = null;
        $this->prescription_id = null;
        $this->takentissuejournal_id = null;
        $this->contract_id = null;
        $this->coorddate = null;
        $this->coordagent = null;
        $this->coordinspector = null;
        $this->coordtext = null;
        $this->hospitaluidfrom = null;
        $this->pacientinqueuetype = null;
        $this->appointmenttype = null;
        $this->version = null;
        $this->parentaction_id = null;
        $this->uuid_id = null;
        $this->dcm_study_uid = null;
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
            if ($this->collActiontissues) {
                foreach ($this->collActiontissues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActionDocuments) {
                foreach ($this->collActionDocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrfufinalvolumes) {
                foreach ($this->collTrfufinalvolumes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrfulaboratorymeasures) {
                foreach ($this->collTrfulaboratorymeasures as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrfuorderissueresults) {
                foreach ($this->collTrfuorderissueresults as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aTakentissuejournal instanceof Persistent) {
              $this->aTakentissuejournal->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActiontissues instanceof PropelCollection) {
            $this->collActiontissues->clearIterator();
        }
        $this->collActiontissues = null;
        if ($this->collActionDocuments instanceof PropelCollection) {
            $this->collActionDocuments->clearIterator();
        }
        $this->collActionDocuments = null;
        if ($this->collTrfufinalvolumes instanceof PropelCollection) {
            $this->collTrfufinalvolumes->clearIterator();
        }
        $this->collTrfufinalvolumes = null;
        if ($this->collTrfulaboratorymeasures instanceof PropelCollection) {
            $this->collTrfulaboratorymeasures->clearIterator();
        }
        $this->collTrfulaboratorymeasures = null;
        if ($this->collTrfuorderissueresults instanceof PropelCollection) {
            $this->collTrfuorderissueresults->clearIterator();
        }
        $this->collTrfuorderissueresults = null;
        $this->aTakentissuejournal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActionPeer::DEFAULT_STRING_FORMAT);
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
