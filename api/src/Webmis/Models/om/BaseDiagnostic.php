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
use Webmis\Models\Diagnostic;
use Webmis\Models\DiagnosticPeer;
use Webmis\Models\DiagnosticQuery;
use Webmis\Models\Rbacheresult;
use Webmis\Models\RbacheresultQuery;

/**
 * Base class that represents a row from the 'Diagnostic' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseDiagnostic extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\DiagnosticPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DiagnosticPeer
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
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the diagnosis_id field.
     * @var        int
     */
    protected $diagnosis_id;

    /**
     * The value for the diagnosistype_id field.
     * @var        int
     */
    protected $diagnosistype_id;

    /**
     * The value for the character_id field.
     * @var        int
     */
    protected $character_id;

    /**
     * The value for the stage_id field.
     * @var        int
     */
    protected $stage_id;

    /**
     * The value for the phase_id field.
     * @var        int
     */
    protected $phase_id;

    /**
     * The value for the dispanser_id field.
     * @var        int
     */
    protected $dispanser_id;

    /**
     * The value for the sanatorium field.
     * @var        boolean
     */
    protected $sanatorium;

    /**
     * The value for the hospital field.
     * @var        boolean
     */
    protected $hospital;

    /**
     * The value for the traumatype_id field.
     * @var        int
     */
    protected $traumatype_id;

    /**
     * The value for the speciality_id field.
     * @var        int
     */
    protected $speciality_id;

    /**
     * The value for the person_id field.
     * @var        int
     */
    protected $person_id;

    /**
     * The value for the healthgroup_id field.
     * @var        int
     */
    protected $healthgroup_id;

    /**
     * The value for the result_id field.
     * @var        int
     */
    protected $result_id;

    /**
     * The value for the setdate field.
     * @var        string
     */
    protected $setdate;

    /**
     * The value for the enddate field.
     * @var        string
     */
    protected $enddate;

    /**
     * The value for the notes field.
     * @var        string
     */
    protected $notes;

    /**
     * The value for the rbacheresult_id field.
     * @var        int
     */
    protected $rbacheresult_id;

    /**
     * The value for the version field.
     * @var        int
     */
    protected $version;

    /**
     * The value for the action_id field.
     * @var        int
     */
    protected $action_id;

    /**
     * @var        Rbacheresult
     */
    protected $aRbacheresult;

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
    }

    /**
     * Initializes internal state of BaseDiagnostic object.
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
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
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
     * Get the [diagnosistype_id] column value.
     *
     * @return int
     */
    public function getDiagnosistypeId()
    {
        return $this->diagnosistype_id;
    }

    /**
     * Get the [character_id] column value.
     *
     * @return int
     */
    public function getCharacterId()
    {
        return $this->character_id;
    }

    /**
     * Get the [stage_id] column value.
     *
     * @return int
     */
    public function getStageId()
    {
        return $this->stage_id;
    }

    /**
     * Get the [phase_id] column value.
     *
     * @return int
     */
    public function getPhaseId()
    {
        return $this->phase_id;
    }

    /**
     * Get the [dispanser_id] column value.
     *
     * @return int
     */
    public function getDispanserId()
    {
        return $this->dispanser_id;
    }

    /**
     * Get the [sanatorium] column value.
     *
     * @return boolean
     */
    public function getSanatorium()
    {
        return $this->sanatorium;
    }

    /**
     * Get the [hospital] column value.
     *
     * @return boolean
     */
    public function getHospital()
    {
        return $this->hospital;
    }

    /**
     * Get the [traumatype_id] column value.
     *
     * @return int
     */
    public function getTraumatypeId()
    {
        return $this->traumatype_id;
    }

    /**
     * Get the [speciality_id] column value.
     *
     * @return int
     */
    public function getSpecialityId()
    {
        return $this->speciality_id;
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
     * Get the [healthgroup_id] column value.
     *
     * @return int
     */
    public function getHealthgroupId()
    {
        return $this->healthgroup_id;
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
     * Get the [optionally formatted] temporal [setdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSetdate($format = 'Y-m-d H:i:s')
    {
        if ($this->setdate === null) {
            return null;
        }

        if ($this->setdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->setdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->setdate, true), $x);
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
     * Get the [notes] column value.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get the [rbacheresult_id] column value.
     *
     * @return int
     */
    public function getRbacheresultId()
    {
        return $this->rbacheresult_id;
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
     * Get the [action_id] column value.
     *
     * @return int
     */
    public function getActionId()
    {
        return $this->action_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = DiagnosticPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = DiagnosticPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::MODIFYPERSON_ID;
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
     * @return Diagnostic The current object (for fluent API support)
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
            $this->modifiedColumns[] = DiagnosticPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [diagnosis_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setDiagnosisId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->diagnosis_id !== $v) {
            $this->diagnosis_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::DIAGNOSIS_ID;
        }


        return $this;
    } // setDiagnosisId()

    /**
     * Set the value of [diagnosistype_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setDiagnosistypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->diagnosistype_id !== $v) {
            $this->diagnosistype_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::DIAGNOSISTYPE_ID;
        }


        return $this;
    } // setDiagnosistypeId()

    /**
     * Set the value of [character_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setCharacterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->character_id !== $v) {
            $this->character_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::CHARACTER_ID;
        }


        return $this;
    } // setCharacterId()

    /**
     * Set the value of [stage_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setStageId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->stage_id !== $v) {
            $this->stage_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::STAGE_ID;
        }


        return $this;
    } // setStageId()

    /**
     * Set the value of [phase_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setPhaseId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->phase_id !== $v) {
            $this->phase_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::PHASE_ID;
        }


        return $this;
    } // setPhaseId()

    /**
     * Set the value of [dispanser_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setDispanserId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->dispanser_id !== $v) {
            $this->dispanser_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::DISPANSER_ID;
        }


        return $this;
    } // setDispanserId()

    /**
     * Sets the value of the [sanatorium] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setSanatorium($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->sanatorium !== $v) {
            $this->sanatorium = $v;
            $this->modifiedColumns[] = DiagnosticPeer::SANATORIUM;
        }


        return $this;
    } // setSanatorium()

    /**
     * Sets the value of the [hospital] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setHospital($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->hospital !== $v) {
            $this->hospital = $v;
            $this->modifiedColumns[] = DiagnosticPeer::HOSPITAL;
        }


        return $this;
    } // setHospital()

    /**
     * Set the value of [traumatype_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setTraumatypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->traumatype_id !== $v) {
            $this->traumatype_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::TRAUMATYPE_ID;
        }


        return $this;
    } // setTraumatypeId()

    /**
     * Set the value of [speciality_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setSpecialityId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speciality_id !== $v) {
            $this->speciality_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::SPECIALITY_ID;
        }


        return $this;
    } // setSpecialityId()

    /**
     * Set the value of [person_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setPersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->person_id !== $v) {
            $this->person_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::PERSON_ID;
        }


        return $this;
    } // setPersonId()

    /**
     * Set the value of [healthgroup_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setHealthgroupId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->healthgroup_id !== $v) {
            $this->healthgroup_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::HEALTHGROUP_ID;
        }


        return $this;
    } // setHealthgroupId()

    /**
     * Set the value of [result_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setResultId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->result_id !== $v) {
            $this->result_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::RESULT_ID;
        }


        return $this;
    } // setResultId()

    /**
     * Sets the value of [setdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setSetdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->setdate !== null || $dt !== null) {
            $currentDateAsString = ($this->setdate !== null && $tmpDt = new DateTime($this->setdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->setdate = $newDateAsString;
                $this->modifiedColumns[] = DiagnosticPeer::SETDATE;
            }
        } // if either are not null


        return $this;
    } // setSetdate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = DiagnosticPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [notes] column.
     *
     * @param string $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[] = DiagnosticPeer::NOTES;
        }


        return $this;
    } // setNotes()

    /**
     * Set the value of [rbacheresult_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setRbacheresultId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbacheresult_id !== $v) {
            $this->rbacheresult_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::RBACHERESULT_ID;
        }

        if ($this->aRbacheresult !== null && $this->aRbacheresult->getId() !== $v) {
            $this->aRbacheresult = null;
        }


        return $this;
    } // setRbacheresultId()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = DiagnosticPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Set the value of [action_id] column.
     *
     * @param int $v new value
     * @return Diagnostic The current object (for fluent API support)
     */
    public function setActionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->action_id !== $v) {
            $this->action_id = $v;
            $this->modifiedColumns[] = DiagnosticPeer::ACTION_ID;
        }


        return $this;
    } // setActionId()

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
            $this->event_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->diagnosis_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->diagnosistype_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->character_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->stage_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->phase_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->dispanser_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->sanatorium = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
            $this->hospital = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
            $this->traumatype_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->speciality_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->person_id = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->healthgroup_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->result_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->setdate = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->enddate = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->notes = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->rbacheresult_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->version = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->action_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 26; // 26 = DiagnosticPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Diagnostic object", $e);
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

        if ($this->aRbacheresult !== null && $this->rbacheresult_id !== $this->aRbacheresult->getId()) {
            $this->aRbacheresult = null;
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
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DiagnosticPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbacheresult = null;
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
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DiagnosticQuery::create()
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
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DiagnosticPeer::addInstanceToPool($this);
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

            if ($this->aRbacheresult !== null) {
                if ($this->aRbacheresult->isModified() || $this->aRbacheresult->isNew()) {
                    $affectedRows += $this->aRbacheresult->save($con);
                }
                $this->setRbacheresult($this->aRbacheresult);
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

        $this->modifiedColumns[] = DiagnosticPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DiagnosticPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DiagnosticPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(DiagnosticPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(DiagnosticPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(DiagnosticPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`event_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::DIAGNOSIS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`diagnosis_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::DIAGNOSISTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`diagnosisType_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::CHARACTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`character_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::STAGE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`stage_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::PHASE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`phase_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::DISPANSER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`dispanser_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::SANATORIUM)) {
            $modifiedColumns[':p' . $index++]  = '`sanatorium`';
        }
        if ($this->isColumnModified(DiagnosticPeer::HOSPITAL)) {
            $modifiedColumns[':p' . $index++]  = '`hospital`';
        }
        if ($this->isColumnModified(DiagnosticPeer::TRAUMATYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`traumaType_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::SPECIALITY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`speciality_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::PERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`person_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::HEALTHGROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`healthGroup_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::RESULT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`result_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::SETDATE)) {
            $modifiedColumns[':p' . $index++]  = '`setDate`';
        }
        if ($this->isColumnModified(DiagnosticPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(DiagnosticPeer::NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`notes`';
        }
        if ($this->isColumnModified(DiagnosticPeer::RBACHERESULT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbAcheResult_id`';
        }
        if ($this->isColumnModified(DiagnosticPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(DiagnosticPeer::ACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`action_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Diagnostic` (%s) VALUES (%s)',
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
                    case '`event_id`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`diagnosis_id`':
                        $stmt->bindValue($identifier, $this->diagnosis_id, PDO::PARAM_INT);
                        break;
                    case '`diagnosisType_id`':
                        $stmt->bindValue($identifier, $this->diagnosistype_id, PDO::PARAM_INT);
                        break;
                    case '`character_id`':
                        $stmt->bindValue($identifier, $this->character_id, PDO::PARAM_INT);
                        break;
                    case '`stage_id`':
                        $stmt->bindValue($identifier, $this->stage_id, PDO::PARAM_INT);
                        break;
                    case '`phase_id`':
                        $stmt->bindValue($identifier, $this->phase_id, PDO::PARAM_INT);
                        break;
                    case '`dispanser_id`':
                        $stmt->bindValue($identifier, $this->dispanser_id, PDO::PARAM_INT);
                        break;
                    case '`sanatorium`':
                        $stmt->bindValue($identifier, (int) $this->sanatorium, PDO::PARAM_INT);
                        break;
                    case '`hospital`':
                        $stmt->bindValue($identifier, (int) $this->hospital, PDO::PARAM_INT);
                        break;
                    case '`traumaType_id`':
                        $stmt->bindValue($identifier, $this->traumatype_id, PDO::PARAM_INT);
                        break;
                    case '`speciality_id`':
                        $stmt->bindValue($identifier, $this->speciality_id, PDO::PARAM_INT);
                        break;
                    case '`person_id`':
                        $stmt->bindValue($identifier, $this->person_id, PDO::PARAM_INT);
                        break;
                    case '`healthGroup_id`':
                        $stmt->bindValue($identifier, $this->healthgroup_id, PDO::PARAM_INT);
                        break;
                    case '`result_id`':
                        $stmt->bindValue($identifier, $this->result_id, PDO::PARAM_INT);
                        break;
                    case '`setDate`':
                        $stmt->bindValue($identifier, $this->setdate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`notes`':
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case '`rbAcheResult_id`':
                        $stmt->bindValue($identifier, $this->rbacheresult_id, PDO::PARAM_INT);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
                        break;
                    case '`action_id`':
                        $stmt->bindValue($identifier, $this->action_id, PDO::PARAM_INT);
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

            if ($this->aRbacheresult !== null) {
                if (!$this->aRbacheresult->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbacheresult->getValidationFailures());
                }
            }


            if (($retval = DiagnosticPeer::doValidate($this, $columns)) !== true) {
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
        $pos = DiagnosticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getEventId();
                break;
            case 7:
                return $this->getDiagnosisId();
                break;
            case 8:
                return $this->getDiagnosistypeId();
                break;
            case 9:
                return $this->getCharacterId();
                break;
            case 10:
                return $this->getStageId();
                break;
            case 11:
                return $this->getPhaseId();
                break;
            case 12:
                return $this->getDispanserId();
                break;
            case 13:
                return $this->getSanatorium();
                break;
            case 14:
                return $this->getHospital();
                break;
            case 15:
                return $this->getTraumatypeId();
                break;
            case 16:
                return $this->getSpecialityId();
                break;
            case 17:
                return $this->getPersonId();
                break;
            case 18:
                return $this->getHealthgroupId();
                break;
            case 19:
                return $this->getResultId();
                break;
            case 20:
                return $this->getSetdate();
                break;
            case 21:
                return $this->getEnddate();
                break;
            case 22:
                return $this->getNotes();
                break;
            case 23:
                return $this->getRbacheresultId();
                break;
            case 24:
                return $this->getVersion();
                break;
            case 25:
                return $this->getActionId();
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
        if (isset($alreadyDumpedObjects['Diagnostic'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Diagnostic'][$this->getPrimaryKey()] = true;
        $keys = DiagnosticPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getEventId(),
            $keys[7] => $this->getDiagnosisId(),
            $keys[8] => $this->getDiagnosistypeId(),
            $keys[9] => $this->getCharacterId(),
            $keys[10] => $this->getStageId(),
            $keys[11] => $this->getPhaseId(),
            $keys[12] => $this->getDispanserId(),
            $keys[13] => $this->getSanatorium(),
            $keys[14] => $this->getHospital(),
            $keys[15] => $this->getTraumatypeId(),
            $keys[16] => $this->getSpecialityId(),
            $keys[17] => $this->getPersonId(),
            $keys[18] => $this->getHealthgroupId(),
            $keys[19] => $this->getResultId(),
            $keys[20] => $this->getSetdate(),
            $keys[21] => $this->getEnddate(),
            $keys[22] => $this->getNotes(),
            $keys[23] => $this->getRbacheresultId(),
            $keys[24] => $this->getVersion(),
            $keys[25] => $this->getActionId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbacheresult) {
                $result['Rbacheresult'] = $this->aRbacheresult->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = DiagnosticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setEventId($value);
                break;
            case 7:
                $this->setDiagnosisId($value);
                break;
            case 8:
                $this->setDiagnosistypeId($value);
                break;
            case 9:
                $this->setCharacterId($value);
                break;
            case 10:
                $this->setStageId($value);
                break;
            case 11:
                $this->setPhaseId($value);
                break;
            case 12:
                $this->setDispanserId($value);
                break;
            case 13:
                $this->setSanatorium($value);
                break;
            case 14:
                $this->setHospital($value);
                break;
            case 15:
                $this->setTraumatypeId($value);
                break;
            case 16:
                $this->setSpecialityId($value);
                break;
            case 17:
                $this->setPersonId($value);
                break;
            case 18:
                $this->setHealthgroupId($value);
                break;
            case 19:
                $this->setResultId($value);
                break;
            case 20:
                $this->setSetdate($value);
                break;
            case 21:
                $this->setEnddate($value);
                break;
            case 22:
                $this->setNotes($value);
                break;
            case 23:
                $this->setRbacheresultId($value);
                break;
            case 24:
                $this->setVersion($value);
                break;
            case 25:
                $this->setActionId($value);
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
        $keys = DiagnosticPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEventId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDiagnosisId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDiagnosistypeId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCharacterId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setStageId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setPhaseId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setDispanserId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSanatorium($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setHospital($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setTraumatypeId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSpecialityId($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setPersonId($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setHealthgroupId($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setResultId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setSetdate($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setEnddate($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setNotes($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setRbacheresultId($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setVersion($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setActionId($arr[$keys[25]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DiagnosticPeer::DATABASE_NAME);

        if ($this->isColumnModified(DiagnosticPeer::ID)) $criteria->add(DiagnosticPeer::ID, $this->id);
        if ($this->isColumnModified(DiagnosticPeer::CREATEDATETIME)) $criteria->add(DiagnosticPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(DiagnosticPeer::CREATEPERSON_ID)) $criteria->add(DiagnosticPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(DiagnosticPeer::MODIFYDATETIME)) $criteria->add(DiagnosticPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(DiagnosticPeer::MODIFYPERSON_ID)) $criteria->add(DiagnosticPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(DiagnosticPeer::DELETED)) $criteria->add(DiagnosticPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(DiagnosticPeer::EVENT_ID)) $criteria->add(DiagnosticPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(DiagnosticPeer::DIAGNOSIS_ID)) $criteria->add(DiagnosticPeer::DIAGNOSIS_ID, $this->diagnosis_id);
        if ($this->isColumnModified(DiagnosticPeer::DIAGNOSISTYPE_ID)) $criteria->add(DiagnosticPeer::DIAGNOSISTYPE_ID, $this->diagnosistype_id);
        if ($this->isColumnModified(DiagnosticPeer::CHARACTER_ID)) $criteria->add(DiagnosticPeer::CHARACTER_ID, $this->character_id);
        if ($this->isColumnModified(DiagnosticPeer::STAGE_ID)) $criteria->add(DiagnosticPeer::STAGE_ID, $this->stage_id);
        if ($this->isColumnModified(DiagnosticPeer::PHASE_ID)) $criteria->add(DiagnosticPeer::PHASE_ID, $this->phase_id);
        if ($this->isColumnModified(DiagnosticPeer::DISPANSER_ID)) $criteria->add(DiagnosticPeer::DISPANSER_ID, $this->dispanser_id);
        if ($this->isColumnModified(DiagnosticPeer::SANATORIUM)) $criteria->add(DiagnosticPeer::SANATORIUM, $this->sanatorium);
        if ($this->isColumnModified(DiagnosticPeer::HOSPITAL)) $criteria->add(DiagnosticPeer::HOSPITAL, $this->hospital);
        if ($this->isColumnModified(DiagnosticPeer::TRAUMATYPE_ID)) $criteria->add(DiagnosticPeer::TRAUMATYPE_ID, $this->traumatype_id);
        if ($this->isColumnModified(DiagnosticPeer::SPECIALITY_ID)) $criteria->add(DiagnosticPeer::SPECIALITY_ID, $this->speciality_id);
        if ($this->isColumnModified(DiagnosticPeer::PERSON_ID)) $criteria->add(DiagnosticPeer::PERSON_ID, $this->person_id);
        if ($this->isColumnModified(DiagnosticPeer::HEALTHGROUP_ID)) $criteria->add(DiagnosticPeer::HEALTHGROUP_ID, $this->healthgroup_id);
        if ($this->isColumnModified(DiagnosticPeer::RESULT_ID)) $criteria->add(DiagnosticPeer::RESULT_ID, $this->result_id);
        if ($this->isColumnModified(DiagnosticPeer::SETDATE)) $criteria->add(DiagnosticPeer::SETDATE, $this->setdate);
        if ($this->isColumnModified(DiagnosticPeer::ENDDATE)) $criteria->add(DiagnosticPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(DiagnosticPeer::NOTES)) $criteria->add(DiagnosticPeer::NOTES, $this->notes);
        if ($this->isColumnModified(DiagnosticPeer::RBACHERESULT_ID)) $criteria->add(DiagnosticPeer::RBACHERESULT_ID, $this->rbacheresult_id);
        if ($this->isColumnModified(DiagnosticPeer::VERSION)) $criteria->add(DiagnosticPeer::VERSION, $this->version);
        if ($this->isColumnModified(DiagnosticPeer::ACTION_ID)) $criteria->add(DiagnosticPeer::ACTION_ID, $this->action_id);

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
        $criteria = new Criteria(DiagnosticPeer::DATABASE_NAME);
        $criteria->add(DiagnosticPeer::ID, $this->id);

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
     * @param object $copyObj An object of Diagnostic (or compatible) type.
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
        $copyObj->setEventId($this->getEventId());
        $copyObj->setDiagnosisId($this->getDiagnosisId());
        $copyObj->setDiagnosistypeId($this->getDiagnosistypeId());
        $copyObj->setCharacterId($this->getCharacterId());
        $copyObj->setStageId($this->getStageId());
        $copyObj->setPhaseId($this->getPhaseId());
        $copyObj->setDispanserId($this->getDispanserId());
        $copyObj->setSanatorium($this->getSanatorium());
        $copyObj->setHospital($this->getHospital());
        $copyObj->setTraumatypeId($this->getTraumatypeId());
        $copyObj->setSpecialityId($this->getSpecialityId());
        $copyObj->setPersonId($this->getPersonId());
        $copyObj->setHealthgroupId($this->getHealthgroupId());
        $copyObj->setResultId($this->getResultId());
        $copyObj->setSetdate($this->getSetdate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setRbacheresultId($this->getRbacheresultId());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setActionId($this->getActionId());

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
     * @return Diagnostic Clone of current object.
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
     * @return DiagnosticPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DiagnosticPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbacheresult object.
     *
     * @param             Rbacheresult $v
     * @return Diagnostic The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbacheresult(Rbacheresult $v = null)
    {
        if ($v === null) {
            $this->setRbacheresultId(NULL);
        } else {
            $this->setRbacheresultId($v->getId());
        }

        $this->aRbacheresult = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbacheresult object, it will not be re-added.
        if ($v !== null) {
            $v->addDiagnostic($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbacheresult object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbacheresult The associated Rbacheresult object.
     * @throws PropelException
     */
    public function getRbacheresult(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbacheresult === null && ($this->rbacheresult_id !== null) && $doQuery) {
            $this->aRbacheresult = RbacheresultQuery::create()->findPk($this->rbacheresult_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbacheresult->addDiagnostics($this);
             */
        }

        return $this->aRbacheresult;
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
        $this->event_id = null;
        $this->diagnosis_id = null;
        $this->diagnosistype_id = null;
        $this->character_id = null;
        $this->stage_id = null;
        $this->phase_id = null;
        $this->dispanser_id = null;
        $this->sanatorium = null;
        $this->hospital = null;
        $this->traumatype_id = null;
        $this->speciality_id = null;
        $this->person_id = null;
        $this->healthgroup_id = null;
        $this->result_id = null;
        $this->setdate = null;
        $this->enddate = null;
        $this->notes = null;
        $this->rbacheresult_id = null;
        $this->version = null;
        $this->action_id = null;
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
            if ($this->aRbacheresult instanceof Persistent) {
              $this->aRbacheresult->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbacheresult = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DiagnosticPeer::DEFAULT_STRING_FORMAT);
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
