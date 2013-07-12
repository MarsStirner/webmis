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
use Webmis\Models\Client;
use Webmis\Models\ClientPeer;
use Webmis\Models\ClientQuery;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\ClientflatdirectoryQuery;
use Webmis\Models\Patientstohs;
use Webmis\Models\PatientstohsQuery;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\TakentissuejournalQuery;

/**
 * Base class that represents a row from the 'Client' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClient extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ClientPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientPeer
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
     * The value for the lastname field.
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the firstname field.
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the patrname field.
     * @var        string
     */
    protected $patrname;

    /**
     * The value for the birthdate field.
     * @var        string
     */
    protected $birthdate;

    /**
     * The value for the sex field.
     * @var        int
     */
    protected $sex;

    /**
     * The value for the snils field.
     * @var        string
     */
    protected $snils;

    /**
     * The value for the bloodtype_id field.
     * @var        int
     */
    protected $bloodtype_id;

    /**
     * The value for the blooddate field.
     * @var        string
     */
    protected $blooddate;

    /**
     * The value for the bloodnotes field.
     * @var        string
     */
    protected $bloodnotes;

    /**
     * The value for the growth field.
     * @var        string
     */
    protected $growth;

    /**
     * The value for the weight field.
     * @var        string
     */
    protected $weight;

    /**
     * The value for the notes field.
     * @var        string
     */
    protected $notes;

    /**
     * The value for the version field.
     * @var        int
     */
    protected $version;

    /**
     * The value for the birthplace field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $birthplace;

    /**
     * The value for the uuid_id field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $uuid_id;

    /**
     * @var        PropelObjectCollection|Clientflatdirectory[] Collection to store aggregation of Clientflatdirectory objects.
     */
    protected $collClientflatdirectorys;
    protected $collClientflatdirectorysPartial;

    /**
     * @var        Patientstohs one-to-one related Patientstohs object
     */
    protected $singlePatientstohs;

    /**
     * @var        PropelObjectCollection|Takentissuejournal[] Collection to store aggregation of Takentissuejournal objects.
     */
    protected $collTakentissuejournals;
    protected $collTakentissuejournalsPartial;

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
    protected $clientflatdirectorysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $patientstohssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $takentissuejournalsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->birthplace = '';
        $this->uuid_id = 0;
    }

    /**
     * Initializes internal state of BaseClient object.
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
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [patrname] column value.
     *
     * @return string
     */
    public function getPatrname()
    {
        return $this->patrname;
    }

    /**
     * Get the [optionally formatted] temporal [birthdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBirthdate($format = '%x')
    {
        if ($this->birthdate === null) {
            return null;
        }

        if ($this->birthdate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->birthdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->birthdate, true), $x);
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
     * Get the [snils] column value.
     *
     * @return string
     */
    public function getSnils()
    {
        return $this->snils;
    }

    /**
     * Get the [bloodtype_id] column value.
     *
     * @return int
     */
    public function getBloodtypeId()
    {
        return $this->bloodtype_id;
    }

    /**
     * Get the [optionally formatted] temporal [blooddate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBlooddate($format = '%x')
    {
        if ($this->blooddate === null) {
            return null;
        }

        if ($this->blooddate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->blooddate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->blooddate, true), $x);
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
     * Get the [bloodnotes] column value.
     *
     * @return string
     */
    public function getBloodnotes()
    {
        return $this->bloodnotes;
    }

    /**
     * Get the [growth] column value.
     *
     * @return string
     */
    public function getGrowth()
    {
        return $this->growth;
    }

    /**
     * Get the [weight] column value.
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
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
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get the [birthplace] column value.
     *
     * @return string
     */
    public function getBirthplace()
    {
        return $this->birthplace;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ClientPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Client The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ClientPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ClientPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Client The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ClientPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ClientPeer::MODIFYPERSON_ID;
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
     * @return Client The current object (for fluent API support)
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
            $this->modifiedColumns[] = ClientPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[] = ClientPeer::LASTNAME;
        }


        return $this;
    } // setLastname()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[] = ClientPeer::FIRSTNAME;
        }


        return $this;
    } // setFirstname()

    /**
     * Set the value of [patrname] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setPatrname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->patrname !== $v) {
            $this->patrname = $v;
            $this->modifiedColumns[] = ClientPeer::PATRNAME;
        }


        return $this;
    } // setPatrname()

    /**
     * Sets the value of [birthdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Client The current object (for fluent API support)
     */
    public function setBirthdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->birthdate !== null || $dt !== null) {
            $currentDateAsString = ($this->birthdate !== null && $tmpDt = new DateTime($this->birthdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->birthdate = $newDateAsString;
                $this->modifiedColumns[] = ClientPeer::BIRTHDATE;
            }
        } // if either are not null


        return $this;
    } // setBirthdate()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = ClientPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [snils] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setSnils($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->snils !== $v) {
            $this->snils = $v;
            $this->modifiedColumns[] = ClientPeer::SNILS;
        }


        return $this;
    } // setSnils()

    /**
     * Set the value of [bloodtype_id] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setBloodtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bloodtype_id !== $v) {
            $this->bloodtype_id = $v;
            $this->modifiedColumns[] = ClientPeer::BLOODTYPE_ID;
        }


        return $this;
    } // setBloodtypeId()

    /**
     * Sets the value of [blooddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Client The current object (for fluent API support)
     */
    public function setBlooddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->blooddate !== null || $dt !== null) {
            $currentDateAsString = ($this->blooddate !== null && $tmpDt = new DateTime($this->blooddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->blooddate = $newDateAsString;
                $this->modifiedColumns[] = ClientPeer::BLOODDATE;
            }
        } // if either are not null


        return $this;
    } // setBlooddate()

    /**
     * Set the value of [bloodnotes] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setBloodnotes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bloodnotes !== $v) {
            $this->bloodnotes = $v;
            $this->modifiedColumns[] = ClientPeer::BLOODNOTES;
        }


        return $this;
    } // setBloodnotes()

    /**
     * Set the value of [growth] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setGrowth($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->growth !== $v) {
            $this->growth = $v;
            $this->modifiedColumns[] = ClientPeer::GROWTH;
        }


        return $this;
    } // setGrowth()

    /**
     * Set the value of [weight] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setWeight($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->weight !== $v) {
            $this->weight = $v;
            $this->modifiedColumns[] = ClientPeer::WEIGHT;
        }


        return $this;
    } // setWeight()

    /**
     * Set the value of [notes] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[] = ClientPeer::NOTES;
        }


        return $this;
    } // setNotes()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ClientPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Set the value of [birthplace] column.
     *
     * @param string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setBirthplace($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->birthplace !== $v) {
            $this->birthplace = $v;
            $this->modifiedColumns[] = ClientPeer::BIRTHPLACE;
        }


        return $this;
    } // setBirthplace()

    /**
     * Set the value of [uuid_id] column.
     *
     * @param int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setUuidId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->uuid_id !== $v) {
            $this->uuid_id = $v;
            $this->modifiedColumns[] = ClientPeer::UUID_ID;
        }


        return $this;
    } // setUuidId()

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

            if ($this->birthplace !== '') {
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
            $this->lastname = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->firstname = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->patrname = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->birthdate = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->sex = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->snils = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->bloodtype_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->blooddate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->bloodnotes = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->growth = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->weight = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->notes = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->version = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->birthplace = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->uuid_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 21; // 21 = ClientPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Client object", $e);
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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collClientflatdirectorys = null;

            $this->singlePatientstohs = null;

            $this->collTakentissuejournals = null;

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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientQuery::create()
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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientPeer::addInstanceToPool($this);
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

            if ($this->clientflatdirectorysScheduledForDeletion !== null) {
                if (!$this->clientflatdirectorysScheduledForDeletion->isEmpty()) {
                    ClientflatdirectoryQuery::create()
                        ->filterByPrimaryKeys($this->clientflatdirectorysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientflatdirectorysScheduledForDeletion = null;
                }
            }

            if ($this->collClientflatdirectorys !== null) {
                foreach ($this->collClientflatdirectorys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->patientstohssScheduledForDeletion !== null) {
                if (!$this->patientstohssScheduledForDeletion->isEmpty()) {
                    PatientstohsQuery::create()
                        ->filterByPrimaryKeys($this->patientstohssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->patientstohssScheduledForDeletion = null;
                }
            }

            if ($this->singlePatientstohs !== null) {
                if (!$this->singlePatientstohs->isDeleted() && ($this->singlePatientstohs->isNew() || $this->singlePatientstohs->isModified())) {
                        $affectedRows += $this->singlePatientstohs->save($con);
                }
            }

            if ($this->takentissuejournalsScheduledForDeletion !== null) {
                if (!$this->takentissuejournalsScheduledForDeletion->isEmpty()) {
                    TakentissuejournalQuery::create()
                        ->filterByPrimaryKeys($this->takentissuejournalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->takentissuejournalsScheduledForDeletion = null;
                }
            }

            if ($this->collTakentissuejournals !== null) {
                foreach ($this->collTakentissuejournals as $referrerFK) {
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

        $this->modifiedColumns[] = ClientPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ClientPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(ClientPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ClientPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(ClientPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ClientPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ClientPeer::LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`lastName`';
        }
        if ($this->isColumnModified(ClientPeer::FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`firstName`';
        }
        if ($this->isColumnModified(ClientPeer::PATRNAME)) {
            $modifiedColumns[':p' . $index++]  = '`patrName`';
        }
        if ($this->isColumnModified(ClientPeer::BIRTHDATE)) {
            $modifiedColumns[':p' . $index++]  = '`birthDate`';
        }
        if ($this->isColumnModified(ClientPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(ClientPeer::SNILS)) {
            $modifiedColumns[':p' . $index++]  = '`SNILS`';
        }
        if ($this->isColumnModified(ClientPeer::BLOODTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`bloodType_id`';
        }
        if ($this->isColumnModified(ClientPeer::BLOODDATE)) {
            $modifiedColumns[':p' . $index++]  = '`bloodDate`';
        }
        if ($this->isColumnModified(ClientPeer::BLOODNOTES)) {
            $modifiedColumns[':p' . $index++]  = '`bloodNotes`';
        }
        if ($this->isColumnModified(ClientPeer::GROWTH)) {
            $modifiedColumns[':p' . $index++]  = '`growth`';
        }
        if ($this->isColumnModified(ClientPeer::WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`weight`';
        }
        if ($this->isColumnModified(ClientPeer::NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`notes`';
        }
        if ($this->isColumnModified(ClientPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ClientPeer::BIRTHPLACE)) {
            $modifiedColumns[':p' . $index++]  = '`birthPlace`';
        }
        if ($this->isColumnModified(ClientPeer::UUID_ID)) {
            $modifiedColumns[':p' . $index++]  = '`uuid_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Client` (%s) VALUES (%s)',
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
                    case '`lastName`':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case '`firstName`':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case '`patrName`':
                        $stmt->bindValue($identifier, $this->patrname, PDO::PARAM_STR);
                        break;
                    case '`birthDate`':
                        $stmt->bindValue($identifier, $this->birthdate, PDO::PARAM_STR);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_INT);
                        break;
                    case '`SNILS`':
                        $stmt->bindValue($identifier, $this->snils, PDO::PARAM_STR);
                        break;
                    case '`bloodType_id`':
                        $stmt->bindValue($identifier, $this->bloodtype_id, PDO::PARAM_INT);
                        break;
                    case '`bloodDate`':
                        $stmt->bindValue($identifier, $this->blooddate, PDO::PARAM_STR);
                        break;
                    case '`bloodNotes`':
                        $stmt->bindValue($identifier, $this->bloodnotes, PDO::PARAM_STR);
                        break;
                    case '`growth`':
                        $stmt->bindValue($identifier, $this->growth, PDO::PARAM_STR);
                        break;
                    case '`weight`':
                        $stmt->bindValue($identifier, $this->weight, PDO::PARAM_STR);
                        break;
                    case '`notes`':
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
                        break;
                    case '`birthPlace`':
                        $stmt->bindValue($identifier, $this->birthplace, PDO::PARAM_STR);
                        break;
                    case '`uuid_id`':
                        $stmt->bindValue($identifier, $this->uuid_id, PDO::PARAM_INT);
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


            if (($retval = ClientPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collClientflatdirectorys !== null) {
                    foreach ($this->collClientflatdirectorys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singlePatientstohs !== null) {
                    if (!$this->singlePatientstohs->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singlePatientstohs->getValidationFailures());
                    }
                }

                if ($this->collTakentissuejournals !== null) {
                    foreach ($this->collTakentissuejournals as $referrerFK) {
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
        $pos = ClientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getLastname();
                break;
            case 7:
                return $this->getFirstname();
                break;
            case 8:
                return $this->getPatrname();
                break;
            case 9:
                return $this->getBirthdate();
                break;
            case 10:
                return $this->getSex();
                break;
            case 11:
                return $this->getSnils();
                break;
            case 12:
                return $this->getBloodtypeId();
                break;
            case 13:
                return $this->getBlooddate();
                break;
            case 14:
                return $this->getBloodnotes();
                break;
            case 15:
                return $this->getGrowth();
                break;
            case 16:
                return $this->getWeight();
                break;
            case 17:
                return $this->getNotes();
                break;
            case 18:
                return $this->getVersion();
                break;
            case 19:
                return $this->getBirthplace();
                break;
            case 20:
                return $this->getUuidId();
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
        if (isset($alreadyDumpedObjects['Client'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Client'][$this->getPrimaryKey()] = true;
        $keys = ClientPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getLastname(),
            $keys[7] => $this->getFirstname(),
            $keys[8] => $this->getPatrname(),
            $keys[9] => $this->getBirthdate(),
            $keys[10] => $this->getSex(),
            $keys[11] => $this->getSnils(),
            $keys[12] => $this->getBloodtypeId(),
            $keys[13] => $this->getBlooddate(),
            $keys[14] => $this->getBloodnotes(),
            $keys[15] => $this->getGrowth(),
            $keys[16] => $this->getWeight(),
            $keys[17] => $this->getNotes(),
            $keys[18] => $this->getVersion(),
            $keys[19] => $this->getBirthplace(),
            $keys[20] => $this->getUuidId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collClientflatdirectorys) {
                $result['Clientflatdirectorys'] = $this->collClientflatdirectorys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singlePatientstohs) {
                $result['Patientstohs'] = $this->singlePatientstohs->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTakentissuejournals) {
                $result['Takentissuejournals'] = $this->collTakentissuejournals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ClientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setLastname($value);
                break;
            case 7:
                $this->setFirstname($value);
                break;
            case 8:
                $this->setPatrname($value);
                break;
            case 9:
                $this->setBirthdate($value);
                break;
            case 10:
                $this->setSex($value);
                break;
            case 11:
                $this->setSnils($value);
                break;
            case 12:
                $this->setBloodtypeId($value);
                break;
            case 13:
                $this->setBlooddate($value);
                break;
            case 14:
                $this->setBloodnotes($value);
                break;
            case 15:
                $this->setGrowth($value);
                break;
            case 16:
                $this->setWeight($value);
                break;
            case 17:
                $this->setNotes($value);
                break;
            case 18:
                $this->setVersion($value);
                break;
            case 19:
                $this->setBirthplace($value);
                break;
            case 20:
                $this->setUuidId($value);
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
        $keys = ClientPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastname($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setFirstname($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPatrname($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setBirthdate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSex($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSnils($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBloodtypeId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setBlooddate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBloodnotes($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setGrowth($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setWeight($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setNotes($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setVersion($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setBirthplace($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setUuidId($arr[$keys[20]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientPeer::ID)) $criteria->add(ClientPeer::ID, $this->id);
        if ($this->isColumnModified(ClientPeer::CREATEDATETIME)) $criteria->add(ClientPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ClientPeer::CREATEPERSON_ID)) $criteria->add(ClientPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ClientPeer::MODIFYDATETIME)) $criteria->add(ClientPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ClientPeer::MODIFYPERSON_ID)) $criteria->add(ClientPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ClientPeer::DELETED)) $criteria->add(ClientPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ClientPeer::LASTNAME)) $criteria->add(ClientPeer::LASTNAME, $this->lastname);
        if ($this->isColumnModified(ClientPeer::FIRSTNAME)) $criteria->add(ClientPeer::FIRSTNAME, $this->firstname);
        if ($this->isColumnModified(ClientPeer::PATRNAME)) $criteria->add(ClientPeer::PATRNAME, $this->patrname);
        if ($this->isColumnModified(ClientPeer::BIRTHDATE)) $criteria->add(ClientPeer::BIRTHDATE, $this->birthdate);
        if ($this->isColumnModified(ClientPeer::SEX)) $criteria->add(ClientPeer::SEX, $this->sex);
        if ($this->isColumnModified(ClientPeer::SNILS)) $criteria->add(ClientPeer::SNILS, $this->snils);
        if ($this->isColumnModified(ClientPeer::BLOODTYPE_ID)) $criteria->add(ClientPeer::BLOODTYPE_ID, $this->bloodtype_id);
        if ($this->isColumnModified(ClientPeer::BLOODDATE)) $criteria->add(ClientPeer::BLOODDATE, $this->blooddate);
        if ($this->isColumnModified(ClientPeer::BLOODNOTES)) $criteria->add(ClientPeer::BLOODNOTES, $this->bloodnotes);
        if ($this->isColumnModified(ClientPeer::GROWTH)) $criteria->add(ClientPeer::GROWTH, $this->growth);
        if ($this->isColumnModified(ClientPeer::WEIGHT)) $criteria->add(ClientPeer::WEIGHT, $this->weight);
        if ($this->isColumnModified(ClientPeer::NOTES)) $criteria->add(ClientPeer::NOTES, $this->notes);
        if ($this->isColumnModified(ClientPeer::VERSION)) $criteria->add(ClientPeer::VERSION, $this->version);
        if ($this->isColumnModified(ClientPeer::BIRTHPLACE)) $criteria->add(ClientPeer::BIRTHPLACE, $this->birthplace);
        if ($this->isColumnModified(ClientPeer::UUID_ID)) $criteria->add(ClientPeer::UUID_ID, $this->uuid_id);

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
        $criteria = new Criteria(ClientPeer::DATABASE_NAME);
        $criteria->add(ClientPeer::ID, $this->id);

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
     * @param object $copyObj An object of Client (or compatible) type.
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
        $copyObj->setLastname($this->getLastname());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setPatrname($this->getPatrname());
        $copyObj->setBirthdate($this->getBirthdate());
        $copyObj->setSex($this->getSex());
        $copyObj->setSnils($this->getSnils());
        $copyObj->setBloodtypeId($this->getBloodtypeId());
        $copyObj->setBlooddate($this->getBlooddate());
        $copyObj->setBloodnotes($this->getBloodnotes());
        $copyObj->setGrowth($this->getGrowth());
        $copyObj->setWeight($this->getWeight());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setBirthplace($this->getBirthplace());
        $copyObj->setUuidId($this->getUuidId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getClientflatdirectorys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientflatdirectory($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getPatientstohs();
            if ($relObj) {
                $copyObj->setPatientstohs($relObj->copy($deepCopy));
            }

            foreach ($this->getTakentissuejournals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTakentissuejournal($relObj->copy($deepCopy));
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
     * @return Client Clone of current object.
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
     * @return ClientPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientPeer();
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
        if ('Clientflatdirectory' == $relationName) {
            $this->initClientflatdirectorys();
        }
        if ('Takentissuejournal' == $relationName) {
            $this->initTakentissuejournals();
        }
    }

    /**
     * Clears out the collClientflatdirectorys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addClientflatdirectorys()
     */
    public function clearClientflatdirectorys()
    {
        $this->collClientflatdirectorys = null; // important to set this to null since that means it is uninitialized
        $this->collClientflatdirectorysPartial = null;

        return $this;
    }

    /**
     * reset is the collClientflatdirectorys collection loaded partially
     *
     * @return void
     */
    public function resetPartialClientflatdirectorys($v = true)
    {
        $this->collClientflatdirectorysPartial = $v;
    }

    /**
     * Initializes the collClientflatdirectorys collection.
     *
     * By default this just sets the collClientflatdirectorys collection to an empty array (like clearcollClientflatdirectorys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientflatdirectorys($overrideExisting = true)
    {
        if (null !== $this->collClientflatdirectorys && !$overrideExisting) {
            return;
        }
        $this->collClientflatdirectorys = new PropelObjectCollection();
        $this->collClientflatdirectorys->setModel('Clientflatdirectory');
    }

    /**
     * Gets an array of Clientflatdirectory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clientflatdirectory[] List of Clientflatdirectory objects
     * @throws PropelException
     */
    public function getClientflatdirectorys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientflatdirectorysPartial && !$this->isNew();
        if (null === $this->collClientflatdirectorys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientflatdirectorys) {
                // return empty collection
                $this->initClientflatdirectorys();
            } else {
                $collClientflatdirectorys = ClientflatdirectoryQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientflatdirectorysPartial && count($collClientflatdirectorys)) {
                      $this->initClientflatdirectorys(false);

                      foreach($collClientflatdirectorys as $obj) {
                        if (false == $this->collClientflatdirectorys->contains($obj)) {
                          $this->collClientflatdirectorys->append($obj);
                        }
                      }

                      $this->collClientflatdirectorysPartial = true;
                    }

                    $collClientflatdirectorys->getInternalIterator()->rewind();
                    return $collClientflatdirectorys;
                }

                if($partial && $this->collClientflatdirectorys) {
                    foreach($this->collClientflatdirectorys as $obj) {
                        if($obj->isNew()) {
                            $collClientflatdirectorys[] = $obj;
                        }
                    }
                }

                $this->collClientflatdirectorys = $collClientflatdirectorys;
                $this->collClientflatdirectorysPartial = false;
            }
        }

        return $this->collClientflatdirectorys;
    }

    /**
     * Sets a collection of Clientflatdirectory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clientflatdirectorys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setClientflatdirectorys(PropelCollection $clientflatdirectorys, PropelPDO $con = null)
    {
        $clientflatdirectorysToDelete = $this->getClientflatdirectorys(new Criteria(), $con)->diff($clientflatdirectorys);

        $this->clientflatdirectorysScheduledForDeletion = unserialize(serialize($clientflatdirectorysToDelete));

        foreach ($clientflatdirectorysToDelete as $clientflatdirectoryRemoved) {
            $clientflatdirectoryRemoved->setClient(null);
        }

        $this->collClientflatdirectorys = null;
        foreach ($clientflatdirectorys as $clientflatdirectory) {
            $this->addClientflatdirectory($clientflatdirectory);
        }

        $this->collClientflatdirectorys = $clientflatdirectorys;
        $this->collClientflatdirectorysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clientflatdirectory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clientflatdirectory objects.
     * @throws PropelException
     */
    public function countClientflatdirectorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientflatdirectorysPartial && !$this->isNew();
        if (null === $this->collClientflatdirectorys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientflatdirectorys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getClientflatdirectorys());
            }
            $query = ClientflatdirectoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collClientflatdirectorys);
    }

    /**
     * Method called to associate a Clientflatdirectory object to this object
     * through the Clientflatdirectory foreign key attribute.
     *
     * @param    Clientflatdirectory $l Clientflatdirectory
     * @return Client The current object (for fluent API support)
     */
    public function addClientflatdirectory(Clientflatdirectory $l)
    {
        if ($this->collClientflatdirectorys === null) {
            $this->initClientflatdirectorys();
            $this->collClientflatdirectorysPartial = true;
        }
        if (!in_array($l, $this->collClientflatdirectorys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClientflatdirectory($l);
        }

        return $this;
    }

    /**
     * @param	Clientflatdirectory $clientflatdirectory The clientflatdirectory object to add.
     */
    protected function doAddClientflatdirectory($clientflatdirectory)
    {
        $this->collClientflatdirectorys[]= $clientflatdirectory;
        $clientflatdirectory->setClient($this);
    }

    /**
     * @param	Clientflatdirectory $clientflatdirectory The clientflatdirectory object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeClientflatdirectory($clientflatdirectory)
    {
        if ($this->getClientflatdirectorys()->contains($clientflatdirectory)) {
            $this->collClientflatdirectorys->remove($this->collClientflatdirectorys->search($clientflatdirectory));
            if (null === $this->clientflatdirectorysScheduledForDeletion) {
                $this->clientflatdirectorysScheduledForDeletion = clone $this->collClientflatdirectorys;
                $this->clientflatdirectorysScheduledForDeletion->clear();
            }
            $this->clientflatdirectorysScheduledForDeletion[]= clone $clientflatdirectory;
            $clientflatdirectory->setClient(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Client is new, it will return
     * an empty collection; or if this Client has previously
     * been saved, it will retrieve related Clientflatdirectorys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Client.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Clientflatdirectory[] List of Clientflatdirectory objects
     */
    public function getClientflatdirectorysJoinClientfdproperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientflatdirectoryQuery::create(null, $criteria);
        $query->joinWith('Clientfdproperty', $join_behavior);

        return $this->getClientflatdirectorys($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Client is new, it will return
     * an empty collection; or if this Client has previously
     * been saved, it will retrieve related Clientflatdirectorys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Client.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Clientflatdirectory[] List of Clientflatdirectory objects
     */
    public function getClientflatdirectorysJoinFdrecord($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientflatdirectoryQuery::create(null, $criteria);
        $query->joinWith('Fdrecord', $join_behavior);

        return $this->getClientflatdirectorys($query, $con);
    }

    /**
     * Gets a single Patientstohs object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Patientstohs
     * @throws PropelException
     */
    public function getPatientstohs(PropelPDO $con = null)
    {

        if ($this->singlePatientstohs === null && !$this->isNew()) {
            $this->singlePatientstohs = PatientstohsQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singlePatientstohs;
    }

    /**
     * Sets a single Patientstohs object as related to this object by a one-to-one relationship.
     *
     * @param             Patientstohs $v Patientstohs
     * @return Client The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPatientstohs(Patientstohs $v = null)
    {
        $this->singlePatientstohs = $v;

        // Make sure that that the passed-in Patientstohs isn't already associated with this object
        if ($v !== null && $v->getClient(null, false) === null) {
            $v->setClient($this);
        }

        return $this;
    }

    /**
     * Clears out the collTakentissuejournals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addTakentissuejournals()
     */
    public function clearTakentissuejournals()
    {
        $this->collTakentissuejournals = null; // important to set this to null since that means it is uninitialized
        $this->collTakentissuejournalsPartial = null;

        return $this;
    }

    /**
     * reset is the collTakentissuejournals collection loaded partially
     *
     * @return void
     */
    public function resetPartialTakentissuejournals($v = true)
    {
        $this->collTakentissuejournalsPartial = $v;
    }

    /**
     * Initializes the collTakentissuejournals collection.
     *
     * By default this just sets the collTakentissuejournals collection to an empty array (like clearcollTakentissuejournals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTakentissuejournals($overrideExisting = true)
    {
        if (null !== $this->collTakentissuejournals && !$overrideExisting) {
            return;
        }
        $this->collTakentissuejournals = new PropelObjectCollection();
        $this->collTakentissuejournals->setModel('Takentissuejournal');
    }

    /**
     * Gets an array of Takentissuejournal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     * @throws PropelException
     */
    public function getTakentissuejournals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTakentissuejournalsPartial && !$this->isNew();
        if (null === $this->collTakentissuejournals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTakentissuejournals) {
                // return empty collection
                $this->initTakentissuejournals();
            } else {
                $collTakentissuejournals = TakentissuejournalQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTakentissuejournalsPartial && count($collTakentissuejournals)) {
                      $this->initTakentissuejournals(false);

                      foreach($collTakentissuejournals as $obj) {
                        if (false == $this->collTakentissuejournals->contains($obj)) {
                          $this->collTakentissuejournals->append($obj);
                        }
                      }

                      $this->collTakentissuejournalsPartial = true;
                    }

                    $collTakentissuejournals->getInternalIterator()->rewind();
                    return $collTakentissuejournals;
                }

                if($partial && $this->collTakentissuejournals) {
                    foreach($this->collTakentissuejournals as $obj) {
                        if($obj->isNew()) {
                            $collTakentissuejournals[] = $obj;
                        }
                    }
                }

                $this->collTakentissuejournals = $collTakentissuejournals;
                $this->collTakentissuejournalsPartial = false;
            }
        }

        return $this->collTakentissuejournals;
    }

    /**
     * Sets a collection of Takentissuejournal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $takentissuejournals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setTakentissuejournals(PropelCollection $takentissuejournals, PropelPDO $con = null)
    {
        $takentissuejournalsToDelete = $this->getTakentissuejournals(new Criteria(), $con)->diff($takentissuejournals);

        $this->takentissuejournalsScheduledForDeletion = unserialize(serialize($takentissuejournalsToDelete));

        foreach ($takentissuejournalsToDelete as $takentissuejournalRemoved) {
            $takentissuejournalRemoved->setClient(null);
        }

        $this->collTakentissuejournals = null;
        foreach ($takentissuejournals as $takentissuejournal) {
            $this->addTakentissuejournal($takentissuejournal);
        }

        $this->collTakentissuejournals = $takentissuejournals;
        $this->collTakentissuejournalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Takentissuejournal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Takentissuejournal objects.
     * @throws PropelException
     */
    public function countTakentissuejournals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTakentissuejournalsPartial && !$this->isNew();
        if (null === $this->collTakentissuejournals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTakentissuejournals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTakentissuejournals());
            }
            $query = TakentissuejournalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collTakentissuejournals);
    }

    /**
     * Method called to associate a Takentissuejournal object to this object
     * through the Takentissuejournal foreign key attribute.
     *
     * @param    Takentissuejournal $l Takentissuejournal
     * @return Client The current object (for fluent API support)
     */
    public function addTakentissuejournal(Takentissuejournal $l)
    {
        if ($this->collTakentissuejournals === null) {
            $this->initTakentissuejournals();
            $this->collTakentissuejournalsPartial = true;
        }
        if (!in_array($l, $this->collTakentissuejournals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTakentissuejournal($l);
        }

        return $this;
    }

    /**
     * @param	Takentissuejournal $takentissuejournal The takentissuejournal object to add.
     */
    protected function doAddTakentissuejournal($takentissuejournal)
    {
        $this->collTakentissuejournals[]= $takentissuejournal;
        $takentissuejournal->setClient($this);
    }

    /**
     * @param	Takentissuejournal $takentissuejournal The takentissuejournal object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeTakentissuejournal($takentissuejournal)
    {
        if ($this->getTakentissuejournals()->contains($takentissuejournal)) {
            $this->collTakentissuejournals->remove($this->collTakentissuejournals->search($takentissuejournal));
            if (null === $this->takentissuejournalsScheduledForDeletion) {
                $this->takentissuejournalsScheduledForDeletion = clone $this->collTakentissuejournals;
                $this->takentissuejournalsScheduledForDeletion->clear();
            }
            $this->takentissuejournalsScheduledForDeletion[]= clone $takentissuejournal;
            $takentissuejournal->setClient(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Client is new, it will return
     * an empty collection; or if this Client has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Client.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinRbtissuetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Rbtissuetype', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Client is new, it will return
     * an empty collection; or if this Client has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Client.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinRbunit($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Rbunit', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Client is new, it will return
     * an empty collection; or if this Client has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Client.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Person', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
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
        $this->lastname = null;
        $this->firstname = null;
        $this->patrname = null;
        $this->birthdate = null;
        $this->sex = null;
        $this->snils = null;
        $this->bloodtype_id = null;
        $this->blooddate = null;
        $this->bloodnotes = null;
        $this->growth = null;
        $this->weight = null;
        $this->notes = null;
        $this->version = null;
        $this->birthplace = null;
        $this->uuid_id = null;
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
            if ($this->collClientflatdirectorys) {
                foreach ($this->collClientflatdirectorys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singlePatientstohs) {
                $this->singlePatientstohs->clearAllReferences($deep);
            }
            if ($this->collTakentissuejournals) {
                foreach ($this->collTakentissuejournals as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collClientflatdirectorys instanceof PropelCollection) {
            $this->collClientflatdirectorys->clearIterator();
        }
        $this->collClientflatdirectorys = null;
        if ($this->singlePatientstohs instanceof PropelCollection) {
            $this->singlePatientstohs->clearIterator();
        }
        $this->singlePatientstohs = null;
        if ($this->collTakentissuejournals instanceof PropelCollection) {
            $this->collTakentissuejournals->clearIterator();
        }
        $this->collTakentissuejournals = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientPeer::DEFAULT_STRING_FORMAT);
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
