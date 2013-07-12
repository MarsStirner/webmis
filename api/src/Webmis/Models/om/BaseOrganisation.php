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
use Webmis\Models\Organisation;
use Webmis\Models\OrganisationPeer;
use Webmis\Models\OrganisationQuery;
use Webmis\Models\Quotingbyspeciality;
use Webmis\Models\QuotingbyspecialityQuery;

/**
 * Base class that represents a row from the 'Organisation' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrganisation extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\OrganisationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        OrganisationPeer
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
     * The value for the fullname field.
     * @var        string
     */
    protected $fullname;

    /**
     * The value for the shortname field.
     * @var        string
     */
    protected $shortname;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the net_id field.
     * @var        int
     */
    protected $net_id;

    /**
     * The value for the infiscode field.
     * @var        string
     */
    protected $infiscode;

    /**
     * The value for the obsoleteinfiscode field.
     * @var        string
     */
    protected $obsoleteinfiscode;

    /**
     * The value for the okved field.
     * @var        string
     */
    protected $okved;

    /**
     * The value for the inn field.
     * @var        string
     */
    protected $inn;

    /**
     * The value for the kpp field.
     * @var        string
     */
    protected $kpp;

    /**
     * The value for the ogrn field.
     * @var        string
     */
    protected $ogrn;

    /**
     * The value for the okato field.
     * @var        string
     */
    protected $okato;

    /**
     * The value for the okpf_code field.
     * @var        string
     */
    protected $okpf_code;

    /**
     * The value for the okpf_id field.
     * @var        int
     */
    protected $okpf_id;

    /**
     * The value for the okfs_code field.
     * @var        int
     */
    protected $okfs_code;

    /**
     * The value for the okfs_id field.
     * @var        int
     */
    protected $okfs_id;

    /**
     * The value for the okpo field.
     * @var        string
     */
    protected $okpo;

    /**
     * The value for the fss field.
     * @var        string
     */
    protected $fss;

    /**
     * The value for the region field.
     * @var        string
     */
    protected $region;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the chief field.
     * @var        string
     */
    protected $chief;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the accountant field.
     * @var        string
     */
    protected $accountant;

    /**
     * The value for the isinsurer field.
     * @var        boolean
     */
    protected $isinsurer;

    /**
     * The value for the compulsoryservicestop field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $compulsoryservicestop;

    /**
     * The value for the voluntaryservicestop field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $voluntaryservicestop;

    /**
     * The value for the area field.
     * @var        string
     */
    protected $area;

    /**
     * The value for the ishospital field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $ishospital;

    /**
     * The value for the notes field.
     * @var        string
     */
    protected $notes;

    /**
     * The value for the head_id field.
     * @var        int
     */
    protected $head_id;

    /**
     * The value for the miaccode field.
     * @var        string
     */
    protected $miaccode;

    /**
     * The value for the isorganisation field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isorganisation;

    /**
     * The value for the uuid_id field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $uuid_id;

    /**
     * @var        PropelObjectCollection|Quotingbyspeciality[] Collection to store aggregation of Quotingbyspeciality objects.
     */
    protected $collQuotingbyspecialitys;
    protected $collQuotingbyspecialitysPartial;

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
    protected $quotingbyspecialitysScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->compulsoryservicestop = false;
        $this->voluntaryservicestop = false;
        $this->ishospital = false;
        $this->isorganisation = false;
        $this->uuid_id = 0;
    }

    /**
     * Initializes internal state of BaseOrganisation object.
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
     * Get the [fullname] column value.
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Get the [shortname] column value.
     *
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
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
     * Get the [net_id] column value.
     *
     * @return int
     */
    public function getNetId()
    {
        return $this->net_id;
    }

    /**
     * Get the [infiscode] column value.
     *
     * @return string
     */
    public function getInfiscode()
    {
        return $this->infiscode;
    }

    /**
     * Get the [obsoleteinfiscode] column value.
     *
     * @return string
     */
    public function getObsoleteinfiscode()
    {
        return $this->obsoleteinfiscode;
    }

    /**
     * Get the [okved] column value.
     *
     * @return string
     */
    public function getOkved()
    {
        return $this->okved;
    }

    /**
     * Get the [inn] column value.
     *
     * @return string
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * Get the [kpp] column value.
     *
     * @return string
     */
    public function getKpp()
    {
        return $this->kpp;
    }

    /**
     * Get the [ogrn] column value.
     *
     * @return string
     */
    public function getOgrn()
    {
        return $this->ogrn;
    }

    /**
     * Get the [okato] column value.
     *
     * @return string
     */
    public function getOkato()
    {
        return $this->okato;
    }

    /**
     * Get the [okpf_code] column value.
     *
     * @return string
     */
    public function getOkpfCode()
    {
        return $this->okpf_code;
    }

    /**
     * Get the [okpf_id] column value.
     *
     * @return int
     */
    public function getOkpfId()
    {
        return $this->okpf_id;
    }

    /**
     * Get the [okfs_code] column value.
     *
     * @return int
     */
    public function getOkfsCode()
    {
        return $this->okfs_code;
    }

    /**
     * Get the [okfs_id] column value.
     *
     * @return int
     */
    public function getOkfsId()
    {
        return $this->okfs_id;
    }

    /**
     * Get the [okpo] column value.
     *
     * @return string
     */
    public function getOkpo()
    {
        return $this->okpo;
    }

    /**
     * Get the [fss] column value.
     *
     * @return string
     */
    public function getFss()
    {
        return $this->fss;
    }

    /**
     * Get the [region] column value.
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Get the [address] column value.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [chief] column value.
     *
     * @return string
     */
    public function getChief()
    {
        return $this->chief;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [accountant] column value.
     *
     * @return string
     */
    public function getAccountant()
    {
        return $this->accountant;
    }

    /**
     * Get the [isinsurer] column value.
     *
     * @return boolean
     */
    public function getIsinsurer()
    {
        return $this->isinsurer;
    }

    /**
     * Get the [compulsoryservicestop] column value.
     *
     * @return boolean
     */
    public function getCompulsoryservicestop()
    {
        return $this->compulsoryservicestop;
    }

    /**
     * Get the [voluntaryservicestop] column value.
     *
     * @return boolean
     */
    public function getVoluntaryservicestop()
    {
        return $this->voluntaryservicestop;
    }

    /**
     * Get the [area] column value.
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Get the [ishospital] column value.
     *
     * @return boolean
     */
    public function getIshospital()
    {
        return $this->ishospital;
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
     * Get the [head_id] column value.
     *
     * @return int
     */
    public function getHeadId()
    {
        return $this->head_id;
    }

    /**
     * Get the [miaccode] column value.
     *
     * @return string
     */
    public function getMiaccode()
    {
        return $this->miaccode;
    }

    /**
     * Get the [isorganisation] column value.
     *
     * @return boolean
     */
    public function getIsorganisation()
    {
        return $this->isorganisation;
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
     * @return Organisation The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = OrganisationPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Organisation The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = OrganisationPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Organisation The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = OrganisationPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::MODIFYPERSON_ID;
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
     * @return Organisation The current object (for fluent API support)
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
            $this->modifiedColumns[] = OrganisationPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [fullname] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setFullname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->fullname !== $v) {
            $this->fullname = $v;
            $this->modifiedColumns[] = OrganisationPeer::FULLNAME;
        }


        return $this;
    } // setFullname()

    /**
     * Set the value of [shortname] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setShortname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->shortname !== $v) {
            $this->shortname = $v;
            $this->modifiedColumns[] = OrganisationPeer::SHORTNAME;
        }


        return $this;
    } // setShortname()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = OrganisationPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [net_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setNetId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->net_id !== $v) {
            $this->net_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::NET_ID;
        }


        return $this;
    } // setNetId()

    /**
     * Set the value of [infiscode] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setInfiscode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->infiscode !== $v) {
            $this->infiscode = $v;
            $this->modifiedColumns[] = OrganisationPeer::INFISCODE;
        }


        return $this;
    } // setInfiscode()

    /**
     * Set the value of [obsoleteinfiscode] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setObsoleteinfiscode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->obsoleteinfiscode !== $v) {
            $this->obsoleteinfiscode = $v;
            $this->modifiedColumns[] = OrganisationPeer::OBSOLETEINFISCODE;
        }


        return $this;
    } // setObsoleteinfiscode()

    /**
     * Set the value of [okved] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkved($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->okved !== $v) {
            $this->okved = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKVED;
        }


        return $this;
    } // setOkved()

    /**
     * Set the value of [inn] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setInn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->inn !== $v) {
            $this->inn = $v;
            $this->modifiedColumns[] = OrganisationPeer::INN;
        }


        return $this;
    } // setInn()

    /**
     * Set the value of [kpp] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setKpp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kpp !== $v) {
            $this->kpp = $v;
            $this->modifiedColumns[] = OrganisationPeer::KPP;
        }


        return $this;
    } // setKpp()

    /**
     * Set the value of [ogrn] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOgrn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ogrn !== $v) {
            $this->ogrn = $v;
            $this->modifiedColumns[] = OrganisationPeer::OGRN;
        }


        return $this;
    } // setOgrn()

    /**
     * Set the value of [okato] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkato($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->okato !== $v) {
            $this->okato = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKATO;
        }


        return $this;
    } // setOkato()

    /**
     * Set the value of [okpf_code] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkpfCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->okpf_code !== $v) {
            $this->okpf_code = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKPF_CODE;
        }


        return $this;
    } // setOkpfCode()

    /**
     * Set the value of [okpf_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkpfId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->okpf_id !== $v) {
            $this->okpf_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKPF_ID;
        }


        return $this;
    } // setOkpfId()

    /**
     * Set the value of [okfs_code] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkfsCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->okfs_code !== $v) {
            $this->okfs_code = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKFS_CODE;
        }


        return $this;
    } // setOkfsCode()

    /**
     * Set the value of [okfs_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkfsId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->okfs_id !== $v) {
            $this->okfs_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKFS_ID;
        }


        return $this;
    } // setOkfsId()

    /**
     * Set the value of [okpo] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setOkpo($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->okpo !== $v) {
            $this->okpo = $v;
            $this->modifiedColumns[] = OrganisationPeer::OKPO;
        }


        return $this;
    } // setOkpo()

    /**
     * Set the value of [fss] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setFss($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->fss !== $v) {
            $this->fss = $v;
            $this->modifiedColumns[] = OrganisationPeer::FSS;
        }


        return $this;
    } // setFss()

    /**
     * Set the value of [region] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setRegion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->region !== $v) {
            $this->region = $v;
            $this->modifiedColumns[] = OrganisationPeer::REGION;
        }


        return $this;
    } // setRegion()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[] = OrganisationPeer::ADDRESS;
        }


        return $this;
    } // setAddress()

    /**
     * Set the value of [chief] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setChief($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->chief !== $v) {
            $this->chief = $v;
            $this->modifiedColumns[] = OrganisationPeer::CHIEF;
        }


        return $this;
    } // setChief()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = OrganisationPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [accountant] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setAccountant($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->accountant !== $v) {
            $this->accountant = $v;
            $this->modifiedColumns[] = OrganisationPeer::ACCOUNTANT;
        }


        return $this;
    } // setAccountant()

    /**
     * Sets the value of the [isinsurer] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setIsinsurer($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isinsurer !== $v) {
            $this->isinsurer = $v;
            $this->modifiedColumns[] = OrganisationPeer::ISINSURER;
        }


        return $this;
    } // setIsinsurer()

    /**
     * Sets the value of the [compulsoryservicestop] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setCompulsoryservicestop($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->compulsoryservicestop !== $v) {
            $this->compulsoryservicestop = $v;
            $this->modifiedColumns[] = OrganisationPeer::COMPULSORYSERVICESTOP;
        }


        return $this;
    } // setCompulsoryservicestop()

    /**
     * Sets the value of the [voluntaryservicestop] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setVoluntaryservicestop($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->voluntaryservicestop !== $v) {
            $this->voluntaryservicestop = $v;
            $this->modifiedColumns[] = OrganisationPeer::VOLUNTARYSERVICESTOP;
        }


        return $this;
    } // setVoluntaryservicestop()

    /**
     * Set the value of [area] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setArea($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->area !== $v) {
            $this->area = $v;
            $this->modifiedColumns[] = OrganisationPeer::AREA;
        }


        return $this;
    } // setArea()

    /**
     * Sets the value of the [ishospital] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setIshospital($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ishospital !== $v) {
            $this->ishospital = $v;
            $this->modifiedColumns[] = OrganisationPeer::ISHOSPITAL;
        }


        return $this;
    } // setIshospital()

    /**
     * Set the value of [notes] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[] = OrganisationPeer::NOTES;
        }


        return $this;
    } // setNotes()

    /**
     * Set the value of [head_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setHeadId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->head_id !== $v) {
            $this->head_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::HEAD_ID;
        }


        return $this;
    } // setHeadId()

    /**
     * Set the value of [miaccode] column.
     *
     * @param string $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setMiaccode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->miaccode !== $v) {
            $this->miaccode = $v;
            $this->modifiedColumns[] = OrganisationPeer::MIACCODE;
        }


        return $this;
    } // setMiaccode()

    /**
     * Sets the value of the [isorganisation] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setIsorganisation($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isorganisation !== $v) {
            $this->isorganisation = $v;
            $this->modifiedColumns[] = OrganisationPeer::ISORGANISATION;
        }


        return $this;
    } // setIsorganisation()

    /**
     * Set the value of [uuid_id] column.
     *
     * @param int $v new value
     * @return Organisation The current object (for fluent API support)
     */
    public function setUuidId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->uuid_id !== $v) {
            $this->uuid_id = $v;
            $this->modifiedColumns[] = OrganisationPeer::UUID_ID;
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

            if ($this->compulsoryservicestop !== false) {
                return false;
            }

            if ($this->voluntaryservicestop !== false) {
                return false;
            }

            if ($this->ishospital !== false) {
                return false;
            }

            if ($this->isorganisation !== false) {
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
            $this->fullname = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->shortname = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->title = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->net_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->infiscode = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->obsoleteinfiscode = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->okved = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->inn = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->kpp = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->ogrn = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->okato = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->okpf_code = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->okpf_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->okfs_code = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->okfs_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
            $this->okpo = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->fss = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->region = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->address = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->chief = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->phone = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->accountant = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->isinsurer = ($row[$startcol + 28] !== null) ? (boolean) $row[$startcol + 28] : null;
            $this->compulsoryservicestop = ($row[$startcol + 29] !== null) ? (boolean) $row[$startcol + 29] : null;
            $this->voluntaryservicestop = ($row[$startcol + 30] !== null) ? (boolean) $row[$startcol + 30] : null;
            $this->area = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->ishospital = ($row[$startcol + 32] !== null) ? (boolean) $row[$startcol + 32] : null;
            $this->notes = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->head_id = ($row[$startcol + 34] !== null) ? (int) $row[$startcol + 34] : null;
            $this->miaccode = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->isorganisation = ($row[$startcol + 36] !== null) ? (boolean) $row[$startcol + 36] : null;
            $this->uuid_id = ($row[$startcol + 37] !== null) ? (int) $row[$startcol + 37] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 38; // 38 = OrganisationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Organisation object", $e);
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
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = OrganisationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collQuotingbyspecialitys = null;

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
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = OrganisationQuery::create()
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
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                OrganisationPeer::addInstanceToPool($this);
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

            if ($this->quotingbyspecialitysScheduledForDeletion !== null) {
                if (!$this->quotingbyspecialitysScheduledForDeletion->isEmpty()) {
                    QuotingbyspecialityQuery::create()
                        ->filterByPrimaryKeys($this->quotingbyspecialitysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quotingbyspecialitysScheduledForDeletion = null;
                }
            }

            if ($this->collQuotingbyspecialitys !== null) {
                foreach ($this->collQuotingbyspecialitys as $referrerFK) {
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

        $this->modifiedColumns[] = OrganisationPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrganisationPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OrganisationPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(OrganisationPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(OrganisationPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(OrganisationPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(OrganisationPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(OrganisationPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(OrganisationPeer::FULLNAME)) {
            $modifiedColumns[':p' . $index++]  = '`fullName`';
        }
        if ($this->isColumnModified(OrganisationPeer::SHORTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`shortName`';
        }
        if ($this->isColumnModified(OrganisationPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(OrganisationPeer::NET_ID)) {
            $modifiedColumns[':p' . $index++]  = '`net_id`';
        }
        if ($this->isColumnModified(OrganisationPeer::INFISCODE)) {
            $modifiedColumns[':p' . $index++]  = '`infisCode`';
        }
        if ($this->isColumnModified(OrganisationPeer::OBSOLETEINFISCODE)) {
            $modifiedColumns[':p' . $index++]  = '`obsoleteInfisCode`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKVED)) {
            $modifiedColumns[':p' . $index++]  = '`OKVED`';
        }
        if ($this->isColumnModified(OrganisationPeer::INN)) {
            $modifiedColumns[':p' . $index++]  = '`INN`';
        }
        if ($this->isColumnModified(OrganisationPeer::KPP)) {
            $modifiedColumns[':p' . $index++]  = '`KPP`';
        }
        if ($this->isColumnModified(OrganisationPeer::OGRN)) {
            $modifiedColumns[':p' . $index++]  = '`OGRN`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKATO)) {
            $modifiedColumns[':p' . $index++]  = '`OKATO`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKPF_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`OKPF_code`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKPF_ID)) {
            $modifiedColumns[':p' . $index++]  = '`OKPF_id`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKFS_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`OKFS_code`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKFS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`OKFS_id`';
        }
        if ($this->isColumnModified(OrganisationPeer::OKPO)) {
            $modifiedColumns[':p' . $index++]  = '`OKPO`';
        }
        if ($this->isColumnModified(OrganisationPeer::FSS)) {
            $modifiedColumns[':p' . $index++]  = '`FSS`';
        }
        if ($this->isColumnModified(OrganisationPeer::REGION)) {
            $modifiedColumns[':p' . $index++]  = '`region`';
        }
        if ($this->isColumnModified(OrganisationPeer::ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`Address`';
        }
        if ($this->isColumnModified(OrganisationPeer::CHIEF)) {
            $modifiedColumns[':p' . $index++]  = '`chief`';
        }
        if ($this->isColumnModified(OrganisationPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(OrganisationPeer::ACCOUNTANT)) {
            $modifiedColumns[':p' . $index++]  = '`accountant`';
        }
        if ($this->isColumnModified(OrganisationPeer::ISINSURER)) {
            $modifiedColumns[':p' . $index++]  = '`isInsurer`';
        }
        if ($this->isColumnModified(OrganisationPeer::COMPULSORYSERVICESTOP)) {
            $modifiedColumns[':p' . $index++]  = '`compulsoryServiceStop`';
        }
        if ($this->isColumnModified(OrganisationPeer::VOLUNTARYSERVICESTOP)) {
            $modifiedColumns[':p' . $index++]  = '`voluntaryServiceStop`';
        }
        if ($this->isColumnModified(OrganisationPeer::AREA)) {
            $modifiedColumns[':p' . $index++]  = '`area`';
        }
        if ($this->isColumnModified(OrganisationPeer::ISHOSPITAL)) {
            $modifiedColumns[':p' . $index++]  = '`isHospital`';
        }
        if ($this->isColumnModified(OrganisationPeer::NOTES)) {
            $modifiedColumns[':p' . $index++]  = '`notes`';
        }
        if ($this->isColumnModified(OrganisationPeer::HEAD_ID)) {
            $modifiedColumns[':p' . $index++]  = '`head_id`';
        }
        if ($this->isColumnModified(OrganisationPeer::MIACCODE)) {
            $modifiedColumns[':p' . $index++]  = '`miacCode`';
        }
        if ($this->isColumnModified(OrganisationPeer::ISORGANISATION)) {
            $modifiedColumns[':p' . $index++]  = '`isOrganisation`';
        }
        if ($this->isColumnModified(OrganisationPeer::UUID_ID)) {
            $modifiedColumns[':p' . $index++]  = '`uuid_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Organisation` (%s) VALUES (%s)',
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
                    case '`fullName`':
                        $stmt->bindValue($identifier, $this->fullname, PDO::PARAM_STR);
                        break;
                    case '`shortName`':
                        $stmt->bindValue($identifier, $this->shortname, PDO::PARAM_STR);
                        break;
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`net_id`':
                        $stmt->bindValue($identifier, $this->net_id, PDO::PARAM_INT);
                        break;
                    case '`infisCode`':
                        $stmt->bindValue($identifier, $this->infiscode, PDO::PARAM_STR);
                        break;
                    case '`obsoleteInfisCode`':
                        $stmt->bindValue($identifier, $this->obsoleteinfiscode, PDO::PARAM_STR);
                        break;
                    case '`OKVED`':
                        $stmt->bindValue($identifier, $this->okved, PDO::PARAM_STR);
                        break;
                    case '`INN`':
                        $stmt->bindValue($identifier, $this->inn, PDO::PARAM_STR);
                        break;
                    case '`KPP`':
                        $stmt->bindValue($identifier, $this->kpp, PDO::PARAM_STR);
                        break;
                    case '`OGRN`':
                        $stmt->bindValue($identifier, $this->ogrn, PDO::PARAM_STR);
                        break;
                    case '`OKATO`':
                        $stmt->bindValue($identifier, $this->okato, PDO::PARAM_STR);
                        break;
                    case '`OKPF_code`':
                        $stmt->bindValue($identifier, $this->okpf_code, PDO::PARAM_STR);
                        break;
                    case '`OKPF_id`':
                        $stmt->bindValue($identifier, $this->okpf_id, PDO::PARAM_INT);
                        break;
                    case '`OKFS_code`':
                        $stmt->bindValue($identifier, $this->okfs_code, PDO::PARAM_INT);
                        break;
                    case '`OKFS_id`':
                        $stmt->bindValue($identifier, $this->okfs_id, PDO::PARAM_INT);
                        break;
                    case '`OKPO`':
                        $stmt->bindValue($identifier, $this->okpo, PDO::PARAM_STR);
                        break;
                    case '`FSS`':
                        $stmt->bindValue($identifier, $this->fss, PDO::PARAM_STR);
                        break;
                    case '`region`':
                        $stmt->bindValue($identifier, $this->region, PDO::PARAM_STR);
                        break;
                    case '`Address`':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case '`chief`':
                        $stmt->bindValue($identifier, $this->chief, PDO::PARAM_STR);
                        break;
                    case '`phone`':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`accountant`':
                        $stmt->bindValue($identifier, $this->accountant, PDO::PARAM_STR);
                        break;
                    case '`isInsurer`':
                        $stmt->bindValue($identifier, (int) $this->isinsurer, PDO::PARAM_INT);
                        break;
                    case '`compulsoryServiceStop`':
                        $stmt->bindValue($identifier, (int) $this->compulsoryservicestop, PDO::PARAM_INT);
                        break;
                    case '`voluntaryServiceStop`':
                        $stmt->bindValue($identifier, (int) $this->voluntaryservicestop, PDO::PARAM_INT);
                        break;
                    case '`area`':
                        $stmt->bindValue($identifier, $this->area, PDO::PARAM_STR);
                        break;
                    case '`isHospital`':
                        $stmt->bindValue($identifier, (int) $this->ishospital, PDO::PARAM_INT);
                        break;
                    case '`notes`':
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case '`head_id`':
                        $stmt->bindValue($identifier, $this->head_id, PDO::PARAM_INT);
                        break;
                    case '`miacCode`':
                        $stmt->bindValue($identifier, $this->miaccode, PDO::PARAM_STR);
                        break;
                    case '`isOrganisation`':
                        $stmt->bindValue($identifier, (int) $this->isorganisation, PDO::PARAM_INT);
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


            if (($retval = OrganisationPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collQuotingbyspecialitys !== null) {
                    foreach ($this->collQuotingbyspecialitys as $referrerFK) {
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
        $pos = OrganisationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFullname();
                break;
            case 7:
                return $this->getShortname();
                break;
            case 8:
                return $this->getTitle();
                break;
            case 9:
                return $this->getNetId();
                break;
            case 10:
                return $this->getInfiscode();
                break;
            case 11:
                return $this->getObsoleteinfiscode();
                break;
            case 12:
                return $this->getOkved();
                break;
            case 13:
                return $this->getInn();
                break;
            case 14:
                return $this->getKpp();
                break;
            case 15:
                return $this->getOgrn();
                break;
            case 16:
                return $this->getOkato();
                break;
            case 17:
                return $this->getOkpfCode();
                break;
            case 18:
                return $this->getOkpfId();
                break;
            case 19:
                return $this->getOkfsCode();
                break;
            case 20:
                return $this->getOkfsId();
                break;
            case 21:
                return $this->getOkpo();
                break;
            case 22:
                return $this->getFss();
                break;
            case 23:
                return $this->getRegion();
                break;
            case 24:
                return $this->getAddress();
                break;
            case 25:
                return $this->getChief();
                break;
            case 26:
                return $this->getPhone();
                break;
            case 27:
                return $this->getAccountant();
                break;
            case 28:
                return $this->getIsinsurer();
                break;
            case 29:
                return $this->getCompulsoryservicestop();
                break;
            case 30:
                return $this->getVoluntaryservicestop();
                break;
            case 31:
                return $this->getArea();
                break;
            case 32:
                return $this->getIshospital();
                break;
            case 33:
                return $this->getNotes();
                break;
            case 34:
                return $this->getHeadId();
                break;
            case 35:
                return $this->getMiaccode();
                break;
            case 36:
                return $this->getIsorganisation();
                break;
            case 37:
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
        if (isset($alreadyDumpedObjects['Organisation'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Organisation'][$this->getPrimaryKey()] = true;
        $keys = OrganisationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getFullname(),
            $keys[7] => $this->getShortname(),
            $keys[8] => $this->getTitle(),
            $keys[9] => $this->getNetId(),
            $keys[10] => $this->getInfiscode(),
            $keys[11] => $this->getObsoleteinfiscode(),
            $keys[12] => $this->getOkved(),
            $keys[13] => $this->getInn(),
            $keys[14] => $this->getKpp(),
            $keys[15] => $this->getOgrn(),
            $keys[16] => $this->getOkato(),
            $keys[17] => $this->getOkpfCode(),
            $keys[18] => $this->getOkpfId(),
            $keys[19] => $this->getOkfsCode(),
            $keys[20] => $this->getOkfsId(),
            $keys[21] => $this->getOkpo(),
            $keys[22] => $this->getFss(),
            $keys[23] => $this->getRegion(),
            $keys[24] => $this->getAddress(),
            $keys[25] => $this->getChief(),
            $keys[26] => $this->getPhone(),
            $keys[27] => $this->getAccountant(),
            $keys[28] => $this->getIsinsurer(),
            $keys[29] => $this->getCompulsoryservicestop(),
            $keys[30] => $this->getVoluntaryservicestop(),
            $keys[31] => $this->getArea(),
            $keys[32] => $this->getIshospital(),
            $keys[33] => $this->getNotes(),
            $keys[34] => $this->getHeadId(),
            $keys[35] => $this->getMiaccode(),
            $keys[36] => $this->getIsorganisation(),
            $keys[37] => $this->getUuidId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collQuotingbyspecialitys) {
                $result['Quotingbyspecialitys'] = $this->collQuotingbyspecialitys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = OrganisationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFullname($value);
                break;
            case 7:
                $this->setShortname($value);
                break;
            case 8:
                $this->setTitle($value);
                break;
            case 9:
                $this->setNetId($value);
                break;
            case 10:
                $this->setInfiscode($value);
                break;
            case 11:
                $this->setObsoleteinfiscode($value);
                break;
            case 12:
                $this->setOkved($value);
                break;
            case 13:
                $this->setInn($value);
                break;
            case 14:
                $this->setKpp($value);
                break;
            case 15:
                $this->setOgrn($value);
                break;
            case 16:
                $this->setOkato($value);
                break;
            case 17:
                $this->setOkpfCode($value);
                break;
            case 18:
                $this->setOkpfId($value);
                break;
            case 19:
                $this->setOkfsCode($value);
                break;
            case 20:
                $this->setOkfsId($value);
                break;
            case 21:
                $this->setOkpo($value);
                break;
            case 22:
                $this->setFss($value);
                break;
            case 23:
                $this->setRegion($value);
                break;
            case 24:
                $this->setAddress($value);
                break;
            case 25:
                $this->setChief($value);
                break;
            case 26:
                $this->setPhone($value);
                break;
            case 27:
                $this->setAccountant($value);
                break;
            case 28:
                $this->setIsinsurer($value);
                break;
            case 29:
                $this->setCompulsoryservicestop($value);
                break;
            case 30:
                $this->setVoluntaryservicestop($value);
                break;
            case 31:
                $this->setArea($value);
                break;
            case 32:
                $this->setIshospital($value);
                break;
            case 33:
                $this->setNotes($value);
                break;
            case 34:
                $this->setHeadId($value);
                break;
            case 35:
                $this->setMiaccode($value);
                break;
            case 36:
                $this->setIsorganisation($value);
                break;
            case 37:
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
        $keys = OrganisationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setFullname($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setShortname($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTitle($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNetId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setInfiscode($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setObsoleteinfiscode($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setOkved($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setInn($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setKpp($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setOgrn($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setOkato($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setOkpfCode($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setOkpfId($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setOkfsCode($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setOkfsId($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setOkpo($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setFss($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setRegion($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setAddress($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setChief($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setPhone($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setAccountant($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setIsinsurer($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setCompulsoryservicestop($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setVoluntaryservicestop($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setArea($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setIshospital($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setNotes($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setHeadId($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setMiaccode($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setIsorganisation($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setUuidId($arr[$keys[37]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OrganisationPeer::DATABASE_NAME);

        if ($this->isColumnModified(OrganisationPeer::ID)) $criteria->add(OrganisationPeer::ID, $this->id);
        if ($this->isColumnModified(OrganisationPeer::CREATEDATETIME)) $criteria->add(OrganisationPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(OrganisationPeer::CREATEPERSON_ID)) $criteria->add(OrganisationPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(OrganisationPeer::MODIFYDATETIME)) $criteria->add(OrganisationPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(OrganisationPeer::MODIFYPERSON_ID)) $criteria->add(OrganisationPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(OrganisationPeer::DELETED)) $criteria->add(OrganisationPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(OrganisationPeer::FULLNAME)) $criteria->add(OrganisationPeer::FULLNAME, $this->fullname);
        if ($this->isColumnModified(OrganisationPeer::SHORTNAME)) $criteria->add(OrganisationPeer::SHORTNAME, $this->shortname);
        if ($this->isColumnModified(OrganisationPeer::TITLE)) $criteria->add(OrganisationPeer::TITLE, $this->title);
        if ($this->isColumnModified(OrganisationPeer::NET_ID)) $criteria->add(OrganisationPeer::NET_ID, $this->net_id);
        if ($this->isColumnModified(OrganisationPeer::INFISCODE)) $criteria->add(OrganisationPeer::INFISCODE, $this->infiscode);
        if ($this->isColumnModified(OrganisationPeer::OBSOLETEINFISCODE)) $criteria->add(OrganisationPeer::OBSOLETEINFISCODE, $this->obsoleteinfiscode);
        if ($this->isColumnModified(OrganisationPeer::OKVED)) $criteria->add(OrganisationPeer::OKVED, $this->okved);
        if ($this->isColumnModified(OrganisationPeer::INN)) $criteria->add(OrganisationPeer::INN, $this->inn);
        if ($this->isColumnModified(OrganisationPeer::KPP)) $criteria->add(OrganisationPeer::KPP, $this->kpp);
        if ($this->isColumnModified(OrganisationPeer::OGRN)) $criteria->add(OrganisationPeer::OGRN, $this->ogrn);
        if ($this->isColumnModified(OrganisationPeer::OKATO)) $criteria->add(OrganisationPeer::OKATO, $this->okato);
        if ($this->isColumnModified(OrganisationPeer::OKPF_CODE)) $criteria->add(OrganisationPeer::OKPF_CODE, $this->okpf_code);
        if ($this->isColumnModified(OrganisationPeer::OKPF_ID)) $criteria->add(OrganisationPeer::OKPF_ID, $this->okpf_id);
        if ($this->isColumnModified(OrganisationPeer::OKFS_CODE)) $criteria->add(OrganisationPeer::OKFS_CODE, $this->okfs_code);
        if ($this->isColumnModified(OrganisationPeer::OKFS_ID)) $criteria->add(OrganisationPeer::OKFS_ID, $this->okfs_id);
        if ($this->isColumnModified(OrganisationPeer::OKPO)) $criteria->add(OrganisationPeer::OKPO, $this->okpo);
        if ($this->isColumnModified(OrganisationPeer::FSS)) $criteria->add(OrganisationPeer::FSS, $this->fss);
        if ($this->isColumnModified(OrganisationPeer::REGION)) $criteria->add(OrganisationPeer::REGION, $this->region);
        if ($this->isColumnModified(OrganisationPeer::ADDRESS)) $criteria->add(OrganisationPeer::ADDRESS, $this->address);
        if ($this->isColumnModified(OrganisationPeer::CHIEF)) $criteria->add(OrganisationPeer::CHIEF, $this->chief);
        if ($this->isColumnModified(OrganisationPeer::PHONE)) $criteria->add(OrganisationPeer::PHONE, $this->phone);
        if ($this->isColumnModified(OrganisationPeer::ACCOUNTANT)) $criteria->add(OrganisationPeer::ACCOUNTANT, $this->accountant);
        if ($this->isColumnModified(OrganisationPeer::ISINSURER)) $criteria->add(OrganisationPeer::ISINSURER, $this->isinsurer);
        if ($this->isColumnModified(OrganisationPeer::COMPULSORYSERVICESTOP)) $criteria->add(OrganisationPeer::COMPULSORYSERVICESTOP, $this->compulsoryservicestop);
        if ($this->isColumnModified(OrganisationPeer::VOLUNTARYSERVICESTOP)) $criteria->add(OrganisationPeer::VOLUNTARYSERVICESTOP, $this->voluntaryservicestop);
        if ($this->isColumnModified(OrganisationPeer::AREA)) $criteria->add(OrganisationPeer::AREA, $this->area);
        if ($this->isColumnModified(OrganisationPeer::ISHOSPITAL)) $criteria->add(OrganisationPeer::ISHOSPITAL, $this->ishospital);
        if ($this->isColumnModified(OrganisationPeer::NOTES)) $criteria->add(OrganisationPeer::NOTES, $this->notes);
        if ($this->isColumnModified(OrganisationPeer::HEAD_ID)) $criteria->add(OrganisationPeer::HEAD_ID, $this->head_id);
        if ($this->isColumnModified(OrganisationPeer::MIACCODE)) $criteria->add(OrganisationPeer::MIACCODE, $this->miaccode);
        if ($this->isColumnModified(OrganisationPeer::ISORGANISATION)) $criteria->add(OrganisationPeer::ISORGANISATION, $this->isorganisation);
        if ($this->isColumnModified(OrganisationPeer::UUID_ID)) $criteria->add(OrganisationPeer::UUID_ID, $this->uuid_id);

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
        $criteria = new Criteria(OrganisationPeer::DATABASE_NAME);
        $criteria->add(OrganisationPeer::ID, $this->id);

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
     * @param object $copyObj An object of Organisation (or compatible) type.
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
        $copyObj->setFullname($this->getFullname());
        $copyObj->setShortname($this->getShortname());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setNetId($this->getNetId());
        $copyObj->setInfiscode($this->getInfiscode());
        $copyObj->setObsoleteinfiscode($this->getObsoleteinfiscode());
        $copyObj->setOkved($this->getOkved());
        $copyObj->setInn($this->getInn());
        $copyObj->setKpp($this->getKpp());
        $copyObj->setOgrn($this->getOgrn());
        $copyObj->setOkato($this->getOkato());
        $copyObj->setOkpfCode($this->getOkpfCode());
        $copyObj->setOkpfId($this->getOkpfId());
        $copyObj->setOkfsCode($this->getOkfsCode());
        $copyObj->setOkfsId($this->getOkfsId());
        $copyObj->setOkpo($this->getOkpo());
        $copyObj->setFss($this->getFss());
        $copyObj->setRegion($this->getRegion());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setChief($this->getChief());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setAccountant($this->getAccountant());
        $copyObj->setIsinsurer($this->getIsinsurer());
        $copyObj->setCompulsoryservicestop($this->getCompulsoryservicestop());
        $copyObj->setVoluntaryservicestop($this->getVoluntaryservicestop());
        $copyObj->setArea($this->getArea());
        $copyObj->setIshospital($this->getIshospital());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setHeadId($this->getHeadId());
        $copyObj->setMiaccode($this->getMiaccode());
        $copyObj->setIsorganisation($this->getIsorganisation());
        $copyObj->setUuidId($this->getUuidId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getQuotingbyspecialitys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuotingbyspeciality($relObj->copy($deepCopy));
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
     * @return Organisation Clone of current object.
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
     * @return OrganisationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new OrganisationPeer();
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
        if ('Quotingbyspeciality' == $relationName) {
            $this->initQuotingbyspecialitys();
        }
    }

    /**
     * Clears out the collQuotingbyspecialitys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Organisation The current object (for fluent API support)
     * @see        addQuotingbyspecialitys()
     */
    public function clearQuotingbyspecialitys()
    {
        $this->collQuotingbyspecialitys = null; // important to set this to null since that means it is uninitialized
        $this->collQuotingbyspecialitysPartial = null;

        return $this;
    }

    /**
     * reset is the collQuotingbyspecialitys collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuotingbyspecialitys($v = true)
    {
        $this->collQuotingbyspecialitysPartial = $v;
    }

    /**
     * Initializes the collQuotingbyspecialitys collection.
     *
     * By default this just sets the collQuotingbyspecialitys collection to an empty array (like clearcollQuotingbyspecialitys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuotingbyspecialitys($overrideExisting = true)
    {
        if (null !== $this->collQuotingbyspecialitys && !$overrideExisting) {
            return;
        }
        $this->collQuotingbyspecialitys = new PropelObjectCollection();
        $this->collQuotingbyspecialitys->setModel('Quotingbyspeciality');
    }

    /**
     * Gets an array of Quotingbyspeciality objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Organisation is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Quotingbyspeciality[] List of Quotingbyspeciality objects
     * @throws PropelException
     */
    public function getQuotingbyspecialitys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuotingbyspecialitysPartial && !$this->isNew();
        if (null === $this->collQuotingbyspecialitys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuotingbyspecialitys) {
                // return empty collection
                $this->initQuotingbyspecialitys();
            } else {
                $collQuotingbyspecialitys = QuotingbyspecialityQuery::create(null, $criteria)
                    ->filterByOrganisation($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuotingbyspecialitysPartial && count($collQuotingbyspecialitys)) {
                      $this->initQuotingbyspecialitys(false);

                      foreach($collQuotingbyspecialitys as $obj) {
                        if (false == $this->collQuotingbyspecialitys->contains($obj)) {
                          $this->collQuotingbyspecialitys->append($obj);
                        }
                      }

                      $this->collQuotingbyspecialitysPartial = true;
                    }

                    $collQuotingbyspecialitys->getInternalIterator()->rewind();
                    return $collQuotingbyspecialitys;
                }

                if($partial && $this->collQuotingbyspecialitys) {
                    foreach($this->collQuotingbyspecialitys as $obj) {
                        if($obj->isNew()) {
                            $collQuotingbyspecialitys[] = $obj;
                        }
                    }
                }

                $this->collQuotingbyspecialitys = $collQuotingbyspecialitys;
                $this->collQuotingbyspecialitysPartial = false;
            }
        }

        return $this->collQuotingbyspecialitys;
    }

    /**
     * Sets a collection of Quotingbyspeciality objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quotingbyspecialitys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Organisation The current object (for fluent API support)
     */
    public function setQuotingbyspecialitys(PropelCollection $quotingbyspecialitys, PropelPDO $con = null)
    {
        $quotingbyspecialitysToDelete = $this->getQuotingbyspecialitys(new Criteria(), $con)->diff($quotingbyspecialitys);

        $this->quotingbyspecialitysScheduledForDeletion = unserialize(serialize($quotingbyspecialitysToDelete));

        foreach ($quotingbyspecialitysToDelete as $quotingbyspecialityRemoved) {
            $quotingbyspecialityRemoved->setOrganisation(null);
        }

        $this->collQuotingbyspecialitys = null;
        foreach ($quotingbyspecialitys as $quotingbyspeciality) {
            $this->addQuotingbyspeciality($quotingbyspeciality);
        }

        $this->collQuotingbyspecialitys = $quotingbyspecialitys;
        $this->collQuotingbyspecialitysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Quotingbyspeciality objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Quotingbyspeciality objects.
     * @throws PropelException
     */
    public function countQuotingbyspecialitys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuotingbyspecialitysPartial && !$this->isNew();
        if (null === $this->collQuotingbyspecialitys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuotingbyspecialitys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getQuotingbyspecialitys());
            }
            $query = QuotingbyspecialityQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrganisation($this)
                ->count($con);
        }

        return count($this->collQuotingbyspecialitys);
    }

    /**
     * Method called to associate a Quotingbyspeciality object to this object
     * through the Quotingbyspeciality foreign key attribute.
     *
     * @param    Quotingbyspeciality $l Quotingbyspeciality
     * @return Organisation The current object (for fluent API support)
     */
    public function addQuotingbyspeciality(Quotingbyspeciality $l)
    {
        if ($this->collQuotingbyspecialitys === null) {
            $this->initQuotingbyspecialitys();
            $this->collQuotingbyspecialitysPartial = true;
        }
        if (!in_array($l, $this->collQuotingbyspecialitys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuotingbyspeciality($l);
        }

        return $this;
    }

    /**
     * @param	Quotingbyspeciality $quotingbyspeciality The quotingbyspeciality object to add.
     */
    protected function doAddQuotingbyspeciality($quotingbyspeciality)
    {
        $this->collQuotingbyspecialitys[]= $quotingbyspeciality;
        $quotingbyspeciality->setOrganisation($this);
    }

    /**
     * @param	Quotingbyspeciality $quotingbyspeciality The quotingbyspeciality object to remove.
     * @return Organisation The current object (for fluent API support)
     */
    public function removeQuotingbyspeciality($quotingbyspeciality)
    {
        if ($this->getQuotingbyspecialitys()->contains($quotingbyspeciality)) {
            $this->collQuotingbyspecialitys->remove($this->collQuotingbyspecialitys->search($quotingbyspeciality));
            if (null === $this->quotingbyspecialitysScheduledForDeletion) {
                $this->quotingbyspecialitysScheduledForDeletion = clone $this->collQuotingbyspecialitys;
                $this->quotingbyspecialitysScheduledForDeletion->clear();
            }
            $this->quotingbyspecialitysScheduledForDeletion[]= clone $quotingbyspeciality;
            $quotingbyspeciality->setOrganisation(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Organisation is new, it will return
     * an empty collection; or if this Organisation has previously
     * been saved, it will retrieve related Quotingbyspecialitys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Organisation.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Quotingbyspeciality[] List of Quotingbyspeciality objects
     */
    public function getQuotingbyspecialitysJoinRbspeciality($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = QuotingbyspecialityQuery::create(null, $criteria);
        $query->joinWith('Rbspeciality', $join_behavior);

        return $this->getQuotingbyspecialitys($query, $con);
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
        $this->fullname = null;
        $this->shortname = null;
        $this->title = null;
        $this->net_id = null;
        $this->infiscode = null;
        $this->obsoleteinfiscode = null;
        $this->okved = null;
        $this->inn = null;
        $this->kpp = null;
        $this->ogrn = null;
        $this->okato = null;
        $this->okpf_code = null;
        $this->okpf_id = null;
        $this->okfs_code = null;
        $this->okfs_id = null;
        $this->okpo = null;
        $this->fss = null;
        $this->region = null;
        $this->address = null;
        $this->chief = null;
        $this->phone = null;
        $this->accountant = null;
        $this->isinsurer = null;
        $this->compulsoryservicestop = null;
        $this->voluntaryservicestop = null;
        $this->area = null;
        $this->ishospital = null;
        $this->notes = null;
        $this->head_id = null;
        $this->miaccode = null;
        $this->isorganisation = null;
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
            if ($this->collQuotingbyspecialitys) {
                foreach ($this->collQuotingbyspecialitys as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collQuotingbyspecialitys instanceof PropelCollection) {
            $this->collQuotingbyspecialitys->clearIterator();
        }
        $this->collQuotingbyspecialitys = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OrganisationPeer::DEFAULT_STRING_FORMAT);
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
