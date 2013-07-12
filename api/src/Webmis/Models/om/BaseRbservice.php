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
use Webmis\Models\RbhospitalbedprofileService;
use Webmis\Models\RbhospitalbedprofileServiceQuery;
use Webmis\Models\Rbmedicalaidprofile;
use Webmis\Models\RbmedicalaidprofileQuery;
use Webmis\Models\Rbmedicalkind;
use Webmis\Models\RbmedicalkindQuery;
use Webmis\Models\Rbservice;
use Webmis\Models\RbservicePeer;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceProfileQuery;
use Webmis\Models\RbserviceQuery;
use Webmis\Models\Rbserviceuet;
use Webmis\Models\RbserviceuetQuery;

/**
 * Base class that represents a row from the 'rbService' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbservice extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbservicePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbservicePeer
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
     * @var        string
     */
    protected $code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the eislegacy field.
     * @var        boolean
     */
    protected $eislegacy;

    /**
     * The value for the nomenclaturelegacy field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $nomenclaturelegacy;

    /**
     * The value for the license field.
     * @var        boolean
     */
    protected $license;

    /**
     * The value for the infis field.
     * @var        string
     */
    protected $infis;

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
     * The value for the medicalaidprofile_id field.
     * @var        int
     */
    protected $medicalaidprofile_id;

    /**
     * The value for the adultuetdoctor field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $adultuetdoctor;

    /**
     * The value for the adultuetaveragemedworker field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $adultuetaveragemedworker;

    /**
     * The value for the childuetdoctor field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $childuetdoctor;

    /**
     * The value for the childuetaveragemedworker field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $childuetaveragemedworker;

    /**
     * The value for the rbmedicalkind_id field.
     * @var        int
     */
    protected $rbmedicalkind_id;

    /**
     * The value for the uet field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $uet;

    /**
     * The value for the departcode field.
     * @var        string
     */
    protected $departcode;

    /**
     * @var        Rbmedicalkind
     */
    protected $aRbmedicalkind;

    /**
     * @var        Rbmedicalaidprofile
     */
    protected $aRbmedicalaidprofile;

    /**
     * @var        PropelObjectCollection|RbhospitalbedprofileService[] Collection to store aggregation of RbhospitalbedprofileService objects.
     */
    protected $collRbhospitalbedprofileServices;
    protected $collRbhospitalbedprofileServicesPartial;

    /**
     * @var        PropelObjectCollection|Rbserviceuet[] Collection to store aggregation of Rbserviceuet objects.
     */
    protected $collRbserviceuets;
    protected $collRbserviceuetsPartial;

    /**
     * @var        PropelObjectCollection|RbserviceProfile[] Collection to store aggregation of RbserviceProfile objects.
     */
    protected $collRbserviceProfiles;
    protected $collRbserviceProfilesPartial;

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
    protected $rbhospitalbedprofileServicesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbserviceuetsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rbserviceProfilesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->nomenclaturelegacy = false;
        $this->adultuetdoctor = 0;
        $this->adultuetaveragemedworker = 0;
        $this->childuetdoctor = 0;
        $this->childuetaveragemedworker = 0;
        $this->uet = 0;
    }

    /**
     * Initializes internal state of BaseRbservice object.
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
     * Get the [eislegacy] column value.
     *
     * @return boolean
     */
    public function getEislegacy()
    {
        return $this->eislegacy;
    }

    /**
     * Get the [nomenclaturelegacy] column value.
     *
     * @return boolean
     */
    public function getNomenclaturelegacy()
    {
        return $this->nomenclaturelegacy;
    }

    /**
     * Get the [license] column value.
     *
     * @return boolean
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Get the [infis] column value.
     *
     * @return string
     */
    public function getInfis()
    {
        return $this->infis;
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
     * Get the [medicalaidprofile_id] column value.
     *
     * @return int
     */
    public function getMedicalaidprofileId()
    {
        return $this->medicalaidprofile_id;
    }

    /**
     * Get the [adultuetdoctor] column value.
     *
     * @return double
     */
    public function getAdultuetdoctor()
    {
        return $this->adultuetdoctor;
    }

    /**
     * Get the [adultuetaveragemedworker] column value.
     *
     * @return double
     */
    public function getAdultuetaveragemedworker()
    {
        return $this->adultuetaveragemedworker;
    }

    /**
     * Get the [childuetdoctor] column value.
     *
     * @return double
     */
    public function getChilduetdoctor()
    {
        return $this->childuetdoctor;
    }

    /**
     * Get the [childuetaveragemedworker] column value.
     *
     * @return double
     */
    public function getChilduetaveragemedworker()
    {
        return $this->childuetaveragemedworker;
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
     * Get the [uet] column value.
     *
     * @return double
     */
    public function getUet()
    {
        return $this->uet;
    }

    /**
     * Get the [departcode] column value.
     *
     * @return string
     */
    public function getDepartcode()
    {
        return $this->departcode;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbservicePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbservicePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbservicePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [eislegacy] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setEislegacy($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->eislegacy !== $v) {
            $this->eislegacy = $v;
            $this->modifiedColumns[] = RbservicePeer::EISLEGACY;
        }


        return $this;
    } // setEislegacy()

    /**
     * Sets the value of the [nomenclaturelegacy] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setNomenclaturelegacy($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->nomenclaturelegacy !== $v) {
            $this->nomenclaturelegacy = $v;
            $this->modifiedColumns[] = RbservicePeer::NOMENCLATURELEGACY;
        }


        return $this;
    } // setNomenclaturelegacy()

    /**
     * Sets the value of the [license] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setLicense($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->license !== $v) {
            $this->license = $v;
            $this->modifiedColumns[] = RbservicePeer::LICENSE;
        }


        return $this;
    } // setLicense()

    /**
     * Set the value of [infis] column.
     *
     * @param string $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setInfis($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->infis !== $v) {
            $this->infis = $v;
            $this->modifiedColumns[] = RbservicePeer::INFIS;
        }


        return $this;
    } // setInfis()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rbservice The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = RbservicePeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rbservice The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = RbservicePeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [medicalaidprofile_id] column.
     *
     * @param int $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setMedicalaidprofileId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->medicalaidprofile_id !== $v) {
            $this->medicalaidprofile_id = $v;
            $this->modifiedColumns[] = RbservicePeer::MEDICALAIDPROFILE_ID;
        }

        if ($this->aRbmedicalaidprofile !== null && $this->aRbmedicalaidprofile->getId() !== $v) {
            $this->aRbmedicalaidprofile = null;
        }


        return $this;
    } // setMedicalaidprofileId()

    /**
     * Set the value of [adultuetdoctor] column.
     *
     * @param double $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setAdultuetdoctor($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->adultuetdoctor !== $v) {
            $this->adultuetdoctor = $v;
            $this->modifiedColumns[] = RbservicePeer::ADULTUETDOCTOR;
        }


        return $this;
    } // setAdultuetdoctor()

    /**
     * Set the value of [adultuetaveragemedworker] column.
     *
     * @param double $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setAdultuetaveragemedworker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->adultuetaveragemedworker !== $v) {
            $this->adultuetaveragemedworker = $v;
            $this->modifiedColumns[] = RbservicePeer::ADULTUETAVERAGEMEDWORKER;
        }


        return $this;
    } // setAdultuetaveragemedworker()

    /**
     * Set the value of [childuetdoctor] column.
     *
     * @param double $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setChilduetdoctor($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->childuetdoctor !== $v) {
            $this->childuetdoctor = $v;
            $this->modifiedColumns[] = RbservicePeer::CHILDUETDOCTOR;
        }


        return $this;
    } // setChilduetdoctor()

    /**
     * Set the value of [childuetaveragemedworker] column.
     *
     * @param double $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setChilduetaveragemedworker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->childuetaveragemedworker !== $v) {
            $this->childuetaveragemedworker = $v;
            $this->modifiedColumns[] = RbservicePeer::CHILDUETAVERAGEMEDWORKER;
        }


        return $this;
    } // setChilduetaveragemedworker()

    /**
     * Set the value of [rbmedicalkind_id] column.
     *
     * @param int $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setRbmedicalkindId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbmedicalkind_id !== $v) {
            $this->rbmedicalkind_id = $v;
            $this->modifiedColumns[] = RbservicePeer::RBMEDICALKIND_ID;
        }

        if ($this->aRbmedicalkind !== null && $this->aRbmedicalkind->getId() !== $v) {
            $this->aRbmedicalkind = null;
        }


        return $this;
    } // setRbmedicalkindId()

    /**
     * Set the value of [uet] column.
     *
     * @param double $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setUet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->uet !== $v) {
            $this->uet = $v;
            $this->modifiedColumns[] = RbservicePeer::UET;
        }


        return $this;
    } // setUet()

    /**
     * Set the value of [departcode] column.
     *
     * @param string $v new value
     * @return Rbservice The current object (for fluent API support)
     */
    public function setDepartcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->departcode !== $v) {
            $this->departcode = $v;
            $this->modifiedColumns[] = RbservicePeer::DEPARTCODE;
        }


        return $this;
    } // setDepartcode()

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
            if ($this->nomenclaturelegacy !== false) {
                return false;
            }

            if ($this->adultuetdoctor !== 0) {
                return false;
            }

            if ($this->adultuetaveragemedworker !== 0) {
                return false;
            }

            if ($this->childuetdoctor !== 0) {
                return false;
            }

            if ($this->childuetaveragemedworker !== 0) {
                return false;
            }

            if ($this->uet !== 0) {
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
            $this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->eislegacy = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->nomenclaturelegacy = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->license = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->infis = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->begdate = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->enddate = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->medicalaidprofile_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->adultuetdoctor = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
            $this->adultuetaveragemedworker = ($row[$startcol + 11] !== null) ? (double) $row[$startcol + 11] : null;
            $this->childuetdoctor = ($row[$startcol + 12] !== null) ? (double) $row[$startcol + 12] : null;
            $this->childuetaveragemedworker = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
            $this->rbmedicalkind_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->uet = ($row[$startcol + 15] !== null) ? (double) $row[$startcol + 15] : null;
            $this->departcode = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 17; // 17 = RbservicePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbservice object", $e);
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

        if ($this->aRbmedicalaidprofile !== null && $this->medicalaidprofile_id !== $this->aRbmedicalaidprofile->getId()) {
            $this->aRbmedicalaidprofile = null;
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
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbservicePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbmedicalkind = null;
            $this->aRbmedicalaidprofile = null;
            $this->collRbhospitalbedprofileServices = null;

            $this->collRbserviceuets = null;

            $this->collRbserviceProfiles = null;

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
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbserviceQuery::create()
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
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbservicePeer::addInstanceToPool($this);
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

            if ($this->aRbmedicalkind !== null) {
                if ($this->aRbmedicalkind->isModified() || $this->aRbmedicalkind->isNew()) {
                    $affectedRows += $this->aRbmedicalkind->save($con);
                }
                $this->setRbmedicalkind($this->aRbmedicalkind);
            }

            if ($this->aRbmedicalaidprofile !== null) {
                if ($this->aRbmedicalaidprofile->isModified() || $this->aRbmedicalaidprofile->isNew()) {
                    $affectedRows += $this->aRbmedicalaidprofile->save($con);
                }
                $this->setRbmedicalaidprofile($this->aRbmedicalaidprofile);
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

            if ($this->rbhospitalbedprofileServicesScheduledForDeletion !== null) {
                if (!$this->rbhospitalbedprofileServicesScheduledForDeletion->isEmpty()) {
                    RbhospitalbedprofileServiceQuery::create()
                        ->filterByPrimaryKeys($this->rbhospitalbedprofileServicesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbhospitalbedprofileServicesScheduledForDeletion = null;
                }
            }

            if ($this->collRbhospitalbedprofileServices !== null) {
                foreach ($this->collRbhospitalbedprofileServices as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rbserviceuetsScheduledForDeletion !== null) {
                if (!$this->rbserviceuetsScheduledForDeletion->isEmpty()) {
                    RbserviceuetQuery::create()
                        ->filterByPrimaryKeys($this->rbserviceuetsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbserviceuetsScheduledForDeletion = null;
                }
            }

            if ($this->collRbserviceuets !== null) {
                foreach ($this->collRbserviceuets as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rbserviceProfilesScheduledForDeletion !== null) {
                if (!$this->rbserviceProfilesScheduledForDeletion->isEmpty()) {
                    RbserviceProfileQuery::create()
                        ->filterByPrimaryKeys($this->rbserviceProfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rbserviceProfilesScheduledForDeletion = null;
                }
            }

            if ($this->collRbserviceProfiles !== null) {
                foreach ($this->collRbserviceProfiles as $referrerFK) {
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

        $this->modifiedColumns[] = RbservicePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbservicePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbservicePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbservicePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbservicePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(RbservicePeer::EISLEGACY)) {
            $modifiedColumns[':p' . $index++]  = '`eisLegacy`';
        }
        if ($this->isColumnModified(RbservicePeer::NOMENCLATURELEGACY)) {
            $modifiedColumns[':p' . $index++]  = '`nomenclatureLegacy`';
        }
        if ($this->isColumnModified(RbservicePeer::LICENSE)) {
            $modifiedColumns[':p' . $index++]  = '`license`';
        }
        if ($this->isColumnModified(RbservicePeer::INFIS)) {
            $modifiedColumns[':p' . $index++]  = '`infis`';
        }
        if ($this->isColumnModified(RbservicePeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(RbservicePeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(RbservicePeer::MEDICALAIDPROFILE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`medicalAidProfile_id`';
        }
        if ($this->isColumnModified(RbservicePeer::ADULTUETDOCTOR)) {
            $modifiedColumns[':p' . $index++]  = '`adultUetDoctor`';
        }
        if ($this->isColumnModified(RbservicePeer::ADULTUETAVERAGEMEDWORKER)) {
            $modifiedColumns[':p' . $index++]  = '`adultUetAverageMedWorker`';
        }
        if ($this->isColumnModified(RbservicePeer::CHILDUETDOCTOR)) {
            $modifiedColumns[':p' . $index++]  = '`childUetDoctor`';
        }
        if ($this->isColumnModified(RbservicePeer::CHILDUETAVERAGEMEDWORKER)) {
            $modifiedColumns[':p' . $index++]  = '`childUetAverageMedWorker`';
        }
        if ($this->isColumnModified(RbservicePeer::RBMEDICALKIND_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbMedicalKind_id`';
        }
        if ($this->isColumnModified(RbservicePeer::UET)) {
            $modifiedColumns[':p' . $index++]  = '`UET`';
        }
        if ($this->isColumnModified(RbservicePeer::DEPARTCODE)) {
            $modifiedColumns[':p' . $index++]  = '`departCode`';
        }

        $sql = sprintf(
            'INSERT INTO `rbService` (%s) VALUES (%s)',
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
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`eisLegacy`':
                        $stmt->bindValue($identifier, (int) $this->eislegacy, PDO::PARAM_INT);
                        break;
                    case '`nomenclatureLegacy`':
                        $stmt->bindValue($identifier, (int) $this->nomenclaturelegacy, PDO::PARAM_INT);
                        break;
                    case '`license`':
                        $stmt->bindValue($identifier, (int) $this->license, PDO::PARAM_INT);
                        break;
                    case '`infis`':
                        $stmt->bindValue($identifier, $this->infis, PDO::PARAM_STR);
                        break;
                    case '`begDate`':
                        $stmt->bindValue($identifier, $this->begdate, PDO::PARAM_STR);
                        break;
                    case '`endDate`':
                        $stmt->bindValue($identifier, $this->enddate, PDO::PARAM_STR);
                        break;
                    case '`medicalAidProfile_id`':
                        $stmt->bindValue($identifier, $this->medicalaidprofile_id, PDO::PARAM_INT);
                        break;
                    case '`adultUetDoctor`':
                        $stmt->bindValue($identifier, $this->adultuetdoctor, PDO::PARAM_STR);
                        break;
                    case '`adultUetAverageMedWorker`':
                        $stmt->bindValue($identifier, $this->adultuetaveragemedworker, PDO::PARAM_STR);
                        break;
                    case '`childUetDoctor`':
                        $stmt->bindValue($identifier, $this->childuetdoctor, PDO::PARAM_STR);
                        break;
                    case '`childUetAverageMedWorker`':
                        $stmt->bindValue($identifier, $this->childuetaveragemedworker, PDO::PARAM_STR);
                        break;
                    case '`rbMedicalKind_id`':
                        $stmt->bindValue($identifier, $this->rbmedicalkind_id, PDO::PARAM_INT);
                        break;
                    case '`UET`':
                        $stmt->bindValue($identifier, $this->uet, PDO::PARAM_STR);
                        break;
                    case '`departCode`':
                        $stmt->bindValue($identifier, $this->departcode, PDO::PARAM_STR);
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

            if ($this->aRbmedicalkind !== null) {
                if (!$this->aRbmedicalkind->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbmedicalkind->getValidationFailures());
                }
            }

            if ($this->aRbmedicalaidprofile !== null) {
                if (!$this->aRbmedicalaidprofile->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbmedicalaidprofile->getValidationFailures());
                }
            }


            if (($retval = RbservicePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collRbhospitalbedprofileServices !== null) {
                    foreach ($this->collRbhospitalbedprofileServices as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbserviceuets !== null) {
                    foreach ($this->collRbserviceuets as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRbserviceProfiles !== null) {
                    foreach ($this->collRbserviceProfiles as $referrerFK) {
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
        $pos = RbservicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
                break;
            case 3:
                return $this->getEislegacy();
                break;
            case 4:
                return $this->getNomenclaturelegacy();
                break;
            case 5:
                return $this->getLicense();
                break;
            case 6:
                return $this->getInfis();
                break;
            case 7:
                return $this->getBegdate();
                break;
            case 8:
                return $this->getEnddate();
                break;
            case 9:
                return $this->getMedicalaidprofileId();
                break;
            case 10:
                return $this->getAdultuetdoctor();
                break;
            case 11:
                return $this->getAdultuetaveragemedworker();
                break;
            case 12:
                return $this->getChilduetdoctor();
                break;
            case 13:
                return $this->getChilduetaveragemedworker();
                break;
            case 14:
                return $this->getRbmedicalkindId();
                break;
            case 15:
                return $this->getUet();
                break;
            case 16:
                return $this->getDepartcode();
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
        if (isset($alreadyDumpedObjects['Rbservice'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbservice'][$this->getPrimaryKey()] = true;
        $keys = RbservicePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getEislegacy(),
            $keys[4] => $this->getNomenclaturelegacy(),
            $keys[5] => $this->getLicense(),
            $keys[6] => $this->getInfis(),
            $keys[7] => $this->getBegdate(),
            $keys[8] => $this->getEnddate(),
            $keys[9] => $this->getMedicalaidprofileId(),
            $keys[10] => $this->getAdultuetdoctor(),
            $keys[11] => $this->getAdultuetaveragemedworker(),
            $keys[12] => $this->getChilduetdoctor(),
            $keys[13] => $this->getChilduetaveragemedworker(),
            $keys[14] => $this->getRbmedicalkindId(),
            $keys[15] => $this->getUet(),
            $keys[16] => $this->getDepartcode(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbmedicalkind) {
                $result['Rbmedicalkind'] = $this->aRbmedicalkind->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbmedicalaidprofile) {
                $result['Rbmedicalaidprofile'] = $this->aRbmedicalaidprofile->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collRbhospitalbedprofileServices) {
                $result['RbhospitalbedprofileServices'] = $this->collRbhospitalbedprofileServices->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbserviceuets) {
                $result['Rbserviceuets'] = $this->collRbserviceuets->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRbserviceProfiles) {
                $result['RbserviceProfiles'] = $this->collRbserviceProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbservicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 3:
                $this->setEislegacy($value);
                break;
            case 4:
                $this->setNomenclaturelegacy($value);
                break;
            case 5:
                $this->setLicense($value);
                break;
            case 6:
                $this->setInfis($value);
                break;
            case 7:
                $this->setBegdate($value);
                break;
            case 8:
                $this->setEnddate($value);
                break;
            case 9:
                $this->setMedicalaidprofileId($value);
                break;
            case 10:
                $this->setAdultuetdoctor($value);
                break;
            case 11:
                $this->setAdultuetaveragemedworker($value);
                break;
            case 12:
                $this->setChilduetdoctor($value);
                break;
            case 13:
                $this->setChilduetaveragemedworker($value);
                break;
            case 14:
                $this->setRbmedicalkindId($value);
                break;
            case 15:
                $this->setUet($value);
                break;
            case 16:
                $this->setDepartcode($value);
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
        $keys = RbservicePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setEislegacy($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNomenclaturelegacy($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLicense($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setInfis($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBegdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setEnddate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setMedicalaidprofileId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAdultuetdoctor($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAdultuetaveragemedworker($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setChilduetdoctor($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setChilduetaveragemedworker($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setRbmedicalkindId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setUet($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setDepartcode($arr[$keys[16]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbservicePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbservicePeer::ID)) $criteria->add(RbservicePeer::ID, $this->id);
        if ($this->isColumnModified(RbservicePeer::CODE)) $criteria->add(RbservicePeer::CODE, $this->code);
        if ($this->isColumnModified(RbservicePeer::NAME)) $criteria->add(RbservicePeer::NAME, $this->name);
        if ($this->isColumnModified(RbservicePeer::EISLEGACY)) $criteria->add(RbservicePeer::EISLEGACY, $this->eislegacy);
        if ($this->isColumnModified(RbservicePeer::NOMENCLATURELEGACY)) $criteria->add(RbservicePeer::NOMENCLATURELEGACY, $this->nomenclaturelegacy);
        if ($this->isColumnModified(RbservicePeer::LICENSE)) $criteria->add(RbservicePeer::LICENSE, $this->license);
        if ($this->isColumnModified(RbservicePeer::INFIS)) $criteria->add(RbservicePeer::INFIS, $this->infis);
        if ($this->isColumnModified(RbservicePeer::BEGDATE)) $criteria->add(RbservicePeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(RbservicePeer::ENDDATE)) $criteria->add(RbservicePeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(RbservicePeer::MEDICALAIDPROFILE_ID)) $criteria->add(RbservicePeer::MEDICALAIDPROFILE_ID, $this->medicalaidprofile_id);
        if ($this->isColumnModified(RbservicePeer::ADULTUETDOCTOR)) $criteria->add(RbservicePeer::ADULTUETDOCTOR, $this->adultuetdoctor);
        if ($this->isColumnModified(RbservicePeer::ADULTUETAVERAGEMEDWORKER)) $criteria->add(RbservicePeer::ADULTUETAVERAGEMEDWORKER, $this->adultuetaveragemedworker);
        if ($this->isColumnModified(RbservicePeer::CHILDUETDOCTOR)) $criteria->add(RbservicePeer::CHILDUETDOCTOR, $this->childuetdoctor);
        if ($this->isColumnModified(RbservicePeer::CHILDUETAVERAGEMEDWORKER)) $criteria->add(RbservicePeer::CHILDUETAVERAGEMEDWORKER, $this->childuetaveragemedworker);
        if ($this->isColumnModified(RbservicePeer::RBMEDICALKIND_ID)) $criteria->add(RbservicePeer::RBMEDICALKIND_ID, $this->rbmedicalkind_id);
        if ($this->isColumnModified(RbservicePeer::UET)) $criteria->add(RbservicePeer::UET, $this->uet);
        if ($this->isColumnModified(RbservicePeer::DEPARTCODE)) $criteria->add(RbservicePeer::DEPARTCODE, $this->departcode);

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
        $criteria = new Criteria(RbservicePeer::DATABASE_NAME);
        $criteria->add(RbservicePeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbservice (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setEislegacy($this->getEislegacy());
        $copyObj->setNomenclaturelegacy($this->getNomenclaturelegacy());
        $copyObj->setLicense($this->getLicense());
        $copyObj->setInfis($this->getInfis());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setMedicalaidprofileId($this->getMedicalaidprofileId());
        $copyObj->setAdultuetdoctor($this->getAdultuetdoctor());
        $copyObj->setAdultuetaveragemedworker($this->getAdultuetaveragemedworker());
        $copyObj->setChilduetdoctor($this->getChilduetdoctor());
        $copyObj->setChilduetaveragemedworker($this->getChilduetaveragemedworker());
        $copyObj->setRbmedicalkindId($this->getRbmedicalkindId());
        $copyObj->setUet($this->getUet());
        $copyObj->setDepartcode($this->getDepartcode());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getRbhospitalbedprofileServices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbhospitalbedprofileService($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRbserviceuets() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbserviceuet($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRbserviceProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRbserviceProfile($relObj->copy($deepCopy));
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
     * @return Rbservice Clone of current object.
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
     * @return RbservicePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbservicePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbmedicalkind object.
     *
     * @param             Rbmedicalkind $v
     * @return Rbservice The current object (for fluent API support)
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
            $v->addRbservice($this);
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
                $this->aRbmedicalkind->addRbservices($this);
             */
        }

        return $this->aRbmedicalkind;
    }

    /**
     * Declares an association between this object and a Rbmedicalaidprofile object.
     *
     * @param             Rbmedicalaidprofile $v
     * @return Rbservice The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbmedicalaidprofile(Rbmedicalaidprofile $v = null)
    {
        if ($v === null) {
            $this->setMedicalaidprofileId(NULL);
        } else {
            $this->setMedicalaidprofileId($v->getId());
        }

        $this->aRbmedicalaidprofile = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbmedicalaidprofile object, it will not be re-added.
        if ($v !== null) {
            $v->addRbservice($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbmedicalaidprofile object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbmedicalaidprofile The associated Rbmedicalaidprofile object.
     * @throws PropelException
     */
    public function getRbmedicalaidprofile(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbmedicalaidprofile === null && ($this->medicalaidprofile_id !== null) && $doQuery) {
            $this->aRbmedicalaidprofile = RbmedicalaidprofileQuery::create()->findPk($this->medicalaidprofile_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbmedicalaidprofile->addRbservices($this);
             */
        }

        return $this->aRbmedicalaidprofile;
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
        if ('RbhospitalbedprofileService' == $relationName) {
            $this->initRbhospitalbedprofileServices();
        }
        if ('Rbserviceuet' == $relationName) {
            $this->initRbserviceuets();
        }
        if ('RbserviceProfile' == $relationName) {
            $this->initRbserviceProfiles();
        }
    }

    /**
     * Clears out the collRbhospitalbedprofileServices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbservice The current object (for fluent API support)
     * @see        addRbhospitalbedprofileServices()
     */
    public function clearRbhospitalbedprofileServices()
    {
        $this->collRbhospitalbedprofileServices = null; // important to set this to null since that means it is uninitialized
        $this->collRbhospitalbedprofileServicesPartial = null;

        return $this;
    }

    /**
     * reset is the collRbhospitalbedprofileServices collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbhospitalbedprofileServices($v = true)
    {
        $this->collRbhospitalbedprofileServicesPartial = $v;
    }

    /**
     * Initializes the collRbhospitalbedprofileServices collection.
     *
     * By default this just sets the collRbhospitalbedprofileServices collection to an empty array (like clearcollRbhospitalbedprofileServices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbhospitalbedprofileServices($overrideExisting = true)
    {
        if (null !== $this->collRbhospitalbedprofileServices && !$overrideExisting) {
            return;
        }
        $this->collRbhospitalbedprofileServices = new PropelObjectCollection();
        $this->collRbhospitalbedprofileServices->setModel('RbhospitalbedprofileService');
    }

    /**
     * Gets an array of RbhospitalbedprofileService objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbservice is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RbhospitalbedprofileService[] List of RbhospitalbedprofileService objects
     * @throws PropelException
     */
    public function getRbhospitalbedprofileServices($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbhospitalbedprofileServicesPartial && !$this->isNew();
        if (null === $this->collRbhospitalbedprofileServices || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbhospitalbedprofileServices) {
                // return empty collection
                $this->initRbhospitalbedprofileServices();
            } else {
                $collRbhospitalbedprofileServices = RbhospitalbedprofileServiceQuery::create(null, $criteria)
                    ->filterByRbservice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbhospitalbedprofileServicesPartial && count($collRbhospitalbedprofileServices)) {
                      $this->initRbhospitalbedprofileServices(false);

                      foreach($collRbhospitalbedprofileServices as $obj) {
                        if (false == $this->collRbhospitalbedprofileServices->contains($obj)) {
                          $this->collRbhospitalbedprofileServices->append($obj);
                        }
                      }

                      $this->collRbhospitalbedprofileServicesPartial = true;
                    }

                    $collRbhospitalbedprofileServices->getInternalIterator()->rewind();
                    return $collRbhospitalbedprofileServices;
                }

                if($partial && $this->collRbhospitalbedprofileServices) {
                    foreach($this->collRbhospitalbedprofileServices as $obj) {
                        if($obj->isNew()) {
                            $collRbhospitalbedprofileServices[] = $obj;
                        }
                    }
                }

                $this->collRbhospitalbedprofileServices = $collRbhospitalbedprofileServices;
                $this->collRbhospitalbedprofileServicesPartial = false;
            }
        }

        return $this->collRbhospitalbedprofileServices;
    }

    /**
     * Sets a collection of RbhospitalbedprofileService objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbhospitalbedprofileServices A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbservice The current object (for fluent API support)
     */
    public function setRbhospitalbedprofileServices(PropelCollection $rbhospitalbedprofileServices, PropelPDO $con = null)
    {
        $rbhospitalbedprofileServicesToDelete = $this->getRbhospitalbedprofileServices(new Criteria(), $con)->diff($rbhospitalbedprofileServices);

        $this->rbhospitalbedprofileServicesScheduledForDeletion = unserialize(serialize($rbhospitalbedprofileServicesToDelete));

        foreach ($rbhospitalbedprofileServicesToDelete as $rbhospitalbedprofileServiceRemoved) {
            $rbhospitalbedprofileServiceRemoved->setRbservice(null);
        }

        $this->collRbhospitalbedprofileServices = null;
        foreach ($rbhospitalbedprofileServices as $rbhospitalbedprofileService) {
            $this->addRbhospitalbedprofileService($rbhospitalbedprofileService);
        }

        $this->collRbhospitalbedprofileServices = $rbhospitalbedprofileServices;
        $this->collRbhospitalbedprofileServicesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RbhospitalbedprofileService objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RbhospitalbedprofileService objects.
     * @throws PropelException
     */
    public function countRbhospitalbedprofileServices(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbhospitalbedprofileServicesPartial && !$this->isNew();
        if (null === $this->collRbhospitalbedprofileServices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbhospitalbedprofileServices) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbhospitalbedprofileServices());
            }
            $query = RbhospitalbedprofileServiceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbservice($this)
                ->count($con);
        }

        return count($this->collRbhospitalbedprofileServices);
    }

    /**
     * Method called to associate a RbhospitalbedprofileService object to this object
     * through the RbhospitalbedprofileService foreign key attribute.
     *
     * @param    RbhospitalbedprofileService $l RbhospitalbedprofileService
     * @return Rbservice The current object (for fluent API support)
     */
    public function addRbhospitalbedprofileService(RbhospitalbedprofileService $l)
    {
        if ($this->collRbhospitalbedprofileServices === null) {
            $this->initRbhospitalbedprofileServices();
            $this->collRbhospitalbedprofileServicesPartial = true;
        }
        if (!in_array($l, $this->collRbhospitalbedprofileServices->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbhospitalbedprofileService($l);
        }

        return $this;
    }

    /**
     * @param	RbhospitalbedprofileService $rbhospitalbedprofileService The rbhospitalbedprofileService object to add.
     */
    protected function doAddRbhospitalbedprofileService($rbhospitalbedprofileService)
    {
        $this->collRbhospitalbedprofileServices[]= $rbhospitalbedprofileService;
        $rbhospitalbedprofileService->setRbservice($this);
    }

    /**
     * @param	RbhospitalbedprofileService $rbhospitalbedprofileService The rbhospitalbedprofileService object to remove.
     * @return Rbservice The current object (for fluent API support)
     */
    public function removeRbhospitalbedprofileService($rbhospitalbedprofileService)
    {
        if ($this->getRbhospitalbedprofileServices()->contains($rbhospitalbedprofileService)) {
            $this->collRbhospitalbedprofileServices->remove($this->collRbhospitalbedprofileServices->search($rbhospitalbedprofileService));
            if (null === $this->rbhospitalbedprofileServicesScheduledForDeletion) {
                $this->rbhospitalbedprofileServicesScheduledForDeletion = clone $this->collRbhospitalbedprofileServices;
                $this->rbhospitalbedprofileServicesScheduledForDeletion->clear();
            }
            $this->rbhospitalbedprofileServicesScheduledForDeletion[]= clone $rbhospitalbedprofileService;
            $rbhospitalbedprofileService->setRbservice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbservice is new, it will return
     * an empty collection; or if this Rbservice has previously
     * been saved, it will retrieve related RbhospitalbedprofileServices from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbservice.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RbhospitalbedprofileService[] List of RbhospitalbedprofileService objects
     */
    public function getRbhospitalbedprofileServicesJoinRbhospitalbedprofile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbhospitalbedprofileServiceQuery::create(null, $criteria);
        $query->joinWith('Rbhospitalbedprofile', $join_behavior);

        return $this->getRbhospitalbedprofileServices($query, $con);
    }

    /**
     * Clears out the collRbserviceuets collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbservice The current object (for fluent API support)
     * @see        addRbserviceuets()
     */
    public function clearRbserviceuets()
    {
        $this->collRbserviceuets = null; // important to set this to null since that means it is uninitialized
        $this->collRbserviceuetsPartial = null;

        return $this;
    }

    /**
     * reset is the collRbserviceuets collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbserviceuets($v = true)
    {
        $this->collRbserviceuetsPartial = $v;
    }

    /**
     * Initializes the collRbserviceuets collection.
     *
     * By default this just sets the collRbserviceuets collection to an empty array (like clearcollRbserviceuets());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbserviceuets($overrideExisting = true)
    {
        if (null !== $this->collRbserviceuets && !$overrideExisting) {
            return;
        }
        $this->collRbserviceuets = new PropelObjectCollection();
        $this->collRbserviceuets->setModel('Rbserviceuet');
    }

    /**
     * Gets an array of Rbserviceuet objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbservice is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rbserviceuet[] List of Rbserviceuet objects
     * @throws PropelException
     */
    public function getRbserviceuets($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbserviceuetsPartial && !$this->isNew();
        if (null === $this->collRbserviceuets || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbserviceuets) {
                // return empty collection
                $this->initRbserviceuets();
            } else {
                $collRbserviceuets = RbserviceuetQuery::create(null, $criteria)
                    ->filterByRbservice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbserviceuetsPartial && count($collRbserviceuets)) {
                      $this->initRbserviceuets(false);

                      foreach($collRbserviceuets as $obj) {
                        if (false == $this->collRbserviceuets->contains($obj)) {
                          $this->collRbserviceuets->append($obj);
                        }
                      }

                      $this->collRbserviceuetsPartial = true;
                    }

                    $collRbserviceuets->getInternalIterator()->rewind();
                    return $collRbserviceuets;
                }

                if($partial && $this->collRbserviceuets) {
                    foreach($this->collRbserviceuets as $obj) {
                        if($obj->isNew()) {
                            $collRbserviceuets[] = $obj;
                        }
                    }
                }

                $this->collRbserviceuets = $collRbserviceuets;
                $this->collRbserviceuetsPartial = false;
            }
        }

        return $this->collRbserviceuets;
    }

    /**
     * Sets a collection of Rbserviceuet objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbserviceuets A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbservice The current object (for fluent API support)
     */
    public function setRbserviceuets(PropelCollection $rbserviceuets, PropelPDO $con = null)
    {
        $rbserviceuetsToDelete = $this->getRbserviceuets(new Criteria(), $con)->diff($rbserviceuets);

        $this->rbserviceuetsScheduledForDeletion = unserialize(serialize($rbserviceuetsToDelete));

        foreach ($rbserviceuetsToDelete as $rbserviceuetRemoved) {
            $rbserviceuetRemoved->setRbservice(null);
        }

        $this->collRbserviceuets = null;
        foreach ($rbserviceuets as $rbserviceuet) {
            $this->addRbserviceuet($rbserviceuet);
        }

        $this->collRbserviceuets = $rbserviceuets;
        $this->collRbserviceuetsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rbserviceuet objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rbserviceuet objects.
     * @throws PropelException
     */
    public function countRbserviceuets(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbserviceuetsPartial && !$this->isNew();
        if (null === $this->collRbserviceuets || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbserviceuets) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbserviceuets());
            }
            $query = RbserviceuetQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbservice($this)
                ->count($con);
        }

        return count($this->collRbserviceuets);
    }

    /**
     * Method called to associate a Rbserviceuet object to this object
     * through the Rbserviceuet foreign key attribute.
     *
     * @param    Rbserviceuet $l Rbserviceuet
     * @return Rbservice The current object (for fluent API support)
     */
    public function addRbserviceuet(Rbserviceuet $l)
    {
        if ($this->collRbserviceuets === null) {
            $this->initRbserviceuets();
            $this->collRbserviceuetsPartial = true;
        }
        if (!in_array($l, $this->collRbserviceuets->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbserviceuet($l);
        }

        return $this;
    }

    /**
     * @param	Rbserviceuet $rbserviceuet The rbserviceuet object to add.
     */
    protected function doAddRbserviceuet($rbserviceuet)
    {
        $this->collRbserviceuets[]= $rbserviceuet;
        $rbserviceuet->setRbservice($this);
    }

    /**
     * @param	Rbserviceuet $rbserviceuet The rbserviceuet object to remove.
     * @return Rbservice The current object (for fluent API support)
     */
    public function removeRbserviceuet($rbserviceuet)
    {
        if ($this->getRbserviceuets()->contains($rbserviceuet)) {
            $this->collRbserviceuets->remove($this->collRbserviceuets->search($rbserviceuet));
            if (null === $this->rbserviceuetsScheduledForDeletion) {
                $this->rbserviceuetsScheduledForDeletion = clone $this->collRbserviceuets;
                $this->rbserviceuetsScheduledForDeletion->clear();
            }
            $this->rbserviceuetsScheduledForDeletion[]= clone $rbserviceuet;
            $rbserviceuet->setRbservice(null);
        }

        return $this;
    }

    /**
     * Clears out the collRbserviceProfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbservice The current object (for fluent API support)
     * @see        addRbserviceProfiles()
     */
    public function clearRbserviceProfiles()
    {
        $this->collRbserviceProfiles = null; // important to set this to null since that means it is uninitialized
        $this->collRbserviceProfilesPartial = null;

        return $this;
    }

    /**
     * reset is the collRbserviceProfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialRbserviceProfiles($v = true)
    {
        $this->collRbserviceProfilesPartial = $v;
    }

    /**
     * Initializes the collRbserviceProfiles collection.
     *
     * By default this just sets the collRbserviceProfiles collection to an empty array (like clearcollRbserviceProfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRbserviceProfiles($overrideExisting = true)
    {
        if (null !== $this->collRbserviceProfiles && !$overrideExisting) {
            return;
        }
        $this->collRbserviceProfiles = new PropelObjectCollection();
        $this->collRbserviceProfiles->setModel('RbserviceProfile');
    }

    /**
     * Gets an array of RbserviceProfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbservice is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     * @throws PropelException
     */
    public function getRbserviceProfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRbserviceProfilesPartial && !$this->isNew();
        if (null === $this->collRbserviceProfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRbserviceProfiles) {
                // return empty collection
                $this->initRbserviceProfiles();
            } else {
                $collRbserviceProfiles = RbserviceProfileQuery::create(null, $criteria)
                    ->filterByRbservice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRbserviceProfilesPartial && count($collRbserviceProfiles)) {
                      $this->initRbserviceProfiles(false);

                      foreach($collRbserviceProfiles as $obj) {
                        if (false == $this->collRbserviceProfiles->contains($obj)) {
                          $this->collRbserviceProfiles->append($obj);
                        }
                      }

                      $this->collRbserviceProfilesPartial = true;
                    }

                    $collRbserviceProfiles->getInternalIterator()->rewind();
                    return $collRbserviceProfiles;
                }

                if($partial && $this->collRbserviceProfiles) {
                    foreach($this->collRbserviceProfiles as $obj) {
                        if($obj->isNew()) {
                            $collRbserviceProfiles[] = $obj;
                        }
                    }
                }

                $this->collRbserviceProfiles = $collRbserviceProfiles;
                $this->collRbserviceProfilesPartial = false;
            }
        }

        return $this->collRbserviceProfiles;
    }

    /**
     * Sets a collection of RbserviceProfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rbserviceProfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbservice The current object (for fluent API support)
     */
    public function setRbserviceProfiles(PropelCollection $rbserviceProfiles, PropelPDO $con = null)
    {
        $rbserviceProfilesToDelete = $this->getRbserviceProfiles(new Criteria(), $con)->diff($rbserviceProfiles);

        $this->rbserviceProfilesScheduledForDeletion = unserialize(serialize($rbserviceProfilesToDelete));

        foreach ($rbserviceProfilesToDelete as $rbserviceProfileRemoved) {
            $rbserviceProfileRemoved->setRbservice(null);
        }

        $this->collRbserviceProfiles = null;
        foreach ($rbserviceProfiles as $rbserviceProfile) {
            $this->addRbserviceProfile($rbserviceProfile);
        }

        $this->collRbserviceProfiles = $rbserviceProfiles;
        $this->collRbserviceProfilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RbserviceProfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RbserviceProfile objects.
     * @throws PropelException
     */
    public function countRbserviceProfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRbserviceProfilesPartial && !$this->isNew();
        if (null === $this->collRbserviceProfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRbserviceProfiles) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRbserviceProfiles());
            }
            $query = RbserviceProfileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbservice($this)
                ->count($con);
        }

        return count($this->collRbserviceProfiles);
    }

    /**
     * Method called to associate a RbserviceProfile object to this object
     * through the RbserviceProfile foreign key attribute.
     *
     * @param    RbserviceProfile $l RbserviceProfile
     * @return Rbservice The current object (for fluent API support)
     */
    public function addRbserviceProfile(RbserviceProfile $l)
    {
        if ($this->collRbserviceProfiles === null) {
            $this->initRbserviceProfiles();
            $this->collRbserviceProfilesPartial = true;
        }
        if (!in_array($l, $this->collRbserviceProfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRbserviceProfile($l);
        }

        return $this;
    }

    /**
     * @param	RbserviceProfile $rbserviceProfile The rbserviceProfile object to add.
     */
    protected function doAddRbserviceProfile($rbserviceProfile)
    {
        $this->collRbserviceProfiles[]= $rbserviceProfile;
        $rbserviceProfile->setRbservice($this);
    }

    /**
     * @param	RbserviceProfile $rbserviceProfile The rbserviceProfile object to remove.
     * @return Rbservice The current object (for fluent API support)
     */
    public function removeRbserviceProfile($rbserviceProfile)
    {
        if ($this->getRbserviceProfiles()->contains($rbserviceProfile)) {
            $this->collRbserviceProfiles->remove($this->collRbserviceProfiles->search($rbserviceProfile));
            if (null === $this->rbserviceProfilesScheduledForDeletion) {
                $this->rbserviceProfilesScheduledForDeletion = clone $this->collRbserviceProfiles;
                $this->rbserviceProfilesScheduledForDeletion->clear();
            }
            $this->rbserviceProfilesScheduledForDeletion[]= clone $rbserviceProfile;
            $rbserviceProfile->setRbservice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbservice is new, it will return
     * an empty collection; or if this Rbservice has previously
     * been saved, it will retrieve related RbserviceProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbservice.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     */
    public function getRbserviceProfilesJoinRbmedicalaidprofile($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbserviceProfileQuery::create(null, $criteria);
        $query->joinWith('Rbmedicalaidprofile', $join_behavior);

        return $this->getRbserviceProfiles($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbservice is new, it will return
     * an empty collection; or if this Rbservice has previously
     * been saved, it will retrieve related RbserviceProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbservice.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RbserviceProfile[] List of RbserviceProfile objects
     */
    public function getRbserviceProfilesJoinRbspeciality($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RbserviceProfileQuery::create(null, $criteria);
        $query->joinWith('Rbspeciality', $join_behavior);

        return $this->getRbserviceProfiles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->name = null;
        $this->eislegacy = null;
        $this->nomenclaturelegacy = null;
        $this->license = null;
        $this->infis = null;
        $this->begdate = null;
        $this->enddate = null;
        $this->medicalaidprofile_id = null;
        $this->adultuetdoctor = null;
        $this->adultuetaveragemedworker = null;
        $this->childuetdoctor = null;
        $this->childuetaveragemedworker = null;
        $this->rbmedicalkind_id = null;
        $this->uet = null;
        $this->departcode = null;
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
            if ($this->collRbhospitalbedprofileServices) {
                foreach ($this->collRbhospitalbedprofileServices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbserviceuets) {
                foreach ($this->collRbserviceuets as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRbserviceProfiles) {
                foreach ($this->collRbserviceProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aRbmedicalkind instanceof Persistent) {
              $this->aRbmedicalkind->clearAllReferences($deep);
            }
            if ($this->aRbmedicalaidprofile instanceof Persistent) {
              $this->aRbmedicalaidprofile->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collRbhospitalbedprofileServices instanceof PropelCollection) {
            $this->collRbhospitalbedprofileServices->clearIterator();
        }
        $this->collRbhospitalbedprofileServices = null;
        if ($this->collRbserviceuets instanceof PropelCollection) {
            $this->collRbserviceuets->clearIterator();
        }
        $this->collRbserviceuets = null;
        if ($this->collRbserviceProfiles instanceof PropelCollection) {
            $this->collRbserviceProfiles->clearIterator();
        }
        $this->collRbserviceProfiles = null;
        $this->aRbmedicalkind = null;
        $this->aRbmedicalaidprofile = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbservicePeer::DEFAULT_STRING_FORMAT);
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
