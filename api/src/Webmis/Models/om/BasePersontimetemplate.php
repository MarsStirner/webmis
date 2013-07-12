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
use Webmis\Models\Persontimetemplate;
use Webmis\Models\PersontimetemplatePeer;
use Webmis\Models\PersontimetemplateQuery;

/**
 * Base class that represents a row from the 'PersonTimeTemplate' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePersontimetemplate extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\PersontimetemplatePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PersontimetemplatePeer
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
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the ambbegtime field.
     * @var        string
     */
    protected $ambbegtime;

    /**
     * The value for the ambendtime field.
     * @var        string
     */
    protected $ambendtime;

    /**
     * The value for the ambplan field.
     * @var        int
     */
    protected $ambplan;

    /**
     * The value for the office field.
     * @var        string
     */
    protected $office;

    /**
     * The value for the ambbegtime2 field.
     * @var        string
     */
    protected $ambbegtime2;

    /**
     * The value for the ambendtime2 field.
     * @var        string
     */
    protected $ambendtime2;

    /**
     * The value for the ambplan2 field.
     * @var        int
     */
    protected $ambplan2;

    /**
     * The value for the office2 field.
     * @var        string
     */
    protected $office2;

    /**
     * The value for the hombegtime field.
     * @var        string
     */
    protected $hombegtime;

    /**
     * The value for the homendtime field.
     * @var        string
     */
    protected $homendtime;

    /**
     * The value for the homplan field.
     * @var        int
     */
    protected $homplan;

    /**
     * The value for the hombegtime2 field.
     * @var        string
     */
    protected $hombegtime2;

    /**
     * The value for the homendtime2 field.
     * @var        string
     */
    protected $homendtime2;

    /**
     * The value for the homplan2 field.
     * @var        int
     */
    protected $homplan2;

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
        $this->idx = 0;
    }

    /**
     * Initializes internal state of BasePersontimetemplate object.
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
     * Get the [idx] column value.
     *
     * @return int
     */
    public function getIdx()
    {
        return $this->idx;
    }

    /**
     * Get the [optionally formatted] temporal [ambbegtime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAmbbegtime($format = '%X')
    {
        if ($this->ambbegtime === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->ambbegtime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->ambbegtime, true), $x);
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
     * Get the [optionally formatted] temporal [ambendtime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAmbendtime($format = '%X')
    {
        if ($this->ambendtime === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->ambendtime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->ambendtime, true), $x);
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
     * Get the [ambplan] column value.
     *
     * @return int
     */
    public function getAmbplan()
    {
        return $this->ambplan;
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
     * Get the [optionally formatted] temporal [ambbegtime2] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAmbbegtime2($format = '%X')
    {
        if ($this->ambbegtime2 === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->ambbegtime2);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->ambbegtime2, true), $x);
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
     * Get the [optionally formatted] temporal [ambendtime2] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAmbendtime2($format = '%X')
    {
        if ($this->ambendtime2 === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->ambendtime2);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->ambendtime2, true), $x);
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
     * Get the [ambplan2] column value.
     *
     * @return int
     */
    public function getAmbplan2()
    {
        return $this->ambplan2;
    }

    /**
     * Get the [office2] column value.
     *
     * @return string
     */
    public function getOffice2()
    {
        return $this->office2;
    }

    /**
     * Get the [optionally formatted] temporal [hombegtime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHombegtime($format = '%X')
    {
        if ($this->hombegtime === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->hombegtime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->hombegtime, true), $x);
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
     * Get the [optionally formatted] temporal [homendtime] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHomendtime($format = '%X')
    {
        if ($this->homendtime === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->homendtime);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->homendtime, true), $x);
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
     * Get the [homplan] column value.
     *
     * @return int
     */
    public function getHomplan()
    {
        return $this->homplan;
    }

    /**
     * Get the [optionally formatted] temporal [hombegtime2] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHombegtime2($format = '%X')
    {
        if ($this->hombegtime2 === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->hombegtime2);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->hombegtime2, true), $x);
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
     * Get the [optionally formatted] temporal [homendtime2] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHomendtime2($format = '%X')
    {
        if ($this->homendtime2 === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->homendtime2);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->homendtime2, true), $x);
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
     * Get the [homplan2] column value.
     *
     * @return int
     */
    public function getHomplan2()
    {
        return $this->homplan2;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::MODIFYPERSON_ID;
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
     * @return Persontimetemplate The current object (for fluent API support)
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
            $this->modifiedColumns[] = PersontimetemplatePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Sets the value of [ambbegtime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setAmbbegtime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->ambbegtime !== null || $dt !== null) {
            $currentDateAsString = ($this->ambbegtime !== null && $tmpDt = new DateTime($this->ambbegtime)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->ambbegtime = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::AMBBEGTIME;
            }
        } // if either are not null


        return $this;
    } // setAmbbegtime()

    /**
     * Sets the value of [ambendtime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setAmbendtime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->ambendtime !== null || $dt !== null) {
            $currentDateAsString = ($this->ambendtime !== null && $tmpDt = new DateTime($this->ambendtime)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->ambendtime = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::AMBENDTIME;
            }
        } // if either are not null


        return $this;
    } // setAmbendtime()

    /**
     * Set the value of [ambplan] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setAmbplan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ambplan !== $v) {
            $this->ambplan = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::AMBPLAN;
        }


        return $this;
    } // setAmbplan()

    /**
     * Set the value of [office] column.
     *
     * @param string $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setOffice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->office !== $v) {
            $this->office = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::OFFICE;
        }


        return $this;
    } // setOffice()

    /**
     * Sets the value of [ambbegtime2] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setAmbbegtime2($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->ambbegtime2 !== null || $dt !== null) {
            $currentDateAsString = ($this->ambbegtime2 !== null && $tmpDt = new DateTime($this->ambbegtime2)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->ambbegtime2 = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::AMBBEGTIME2;
            }
        } // if either are not null


        return $this;
    } // setAmbbegtime2()

    /**
     * Sets the value of [ambendtime2] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setAmbendtime2($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->ambendtime2 !== null || $dt !== null) {
            $currentDateAsString = ($this->ambendtime2 !== null && $tmpDt = new DateTime($this->ambendtime2)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->ambendtime2 = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::AMBENDTIME2;
            }
        } // if either are not null


        return $this;
    } // setAmbendtime2()

    /**
     * Set the value of [ambplan2] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setAmbplan2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ambplan2 !== $v) {
            $this->ambplan2 = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::AMBPLAN2;
        }


        return $this;
    } // setAmbplan2()

    /**
     * Set the value of [office2] column.
     *
     * @param string $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setOffice2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->office2 !== $v) {
            $this->office2 = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::OFFICE2;
        }


        return $this;
    } // setOffice2()

    /**
     * Sets the value of [hombegtime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setHombegtime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->hombegtime !== null || $dt !== null) {
            $currentDateAsString = ($this->hombegtime !== null && $tmpDt = new DateTime($this->hombegtime)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->hombegtime = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::HOMBEGTIME;
            }
        } // if either are not null


        return $this;
    } // setHombegtime()

    /**
     * Sets the value of [homendtime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setHomendtime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->homendtime !== null || $dt !== null) {
            $currentDateAsString = ($this->homendtime !== null && $tmpDt = new DateTime($this->homendtime)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->homendtime = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::HOMENDTIME;
            }
        } // if either are not null


        return $this;
    } // setHomendtime()

    /**
     * Set the value of [homplan] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setHomplan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->homplan !== $v) {
            $this->homplan = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::HOMPLAN;
        }


        return $this;
    } // setHomplan()

    /**
     * Sets the value of [hombegtime2] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setHombegtime2($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->hombegtime2 !== null || $dt !== null) {
            $currentDateAsString = ($this->hombegtime2 !== null && $tmpDt = new DateTime($this->hombegtime2)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->hombegtime2 = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::HOMBEGTIME2;
            }
        } // if either are not null


        return $this;
    } // setHombegtime2()

    /**
     * Sets the value of [homendtime2] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setHomendtime2($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->homendtime2 !== null || $dt !== null) {
            $currentDateAsString = ($this->homendtime2 !== null && $tmpDt = new DateTime($this->homendtime2)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->homendtime2 = $newDateAsString;
                $this->modifiedColumns[] = PersontimetemplatePeer::HOMENDTIME2;
            }
        } // if either are not null


        return $this;
    } // setHomendtime2()

    /**
     * Set the value of [homplan2] column.
     *
     * @param int $v new value
     * @return Persontimetemplate The current object (for fluent API support)
     */
    public function setHomplan2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->homplan2 !== $v) {
            $this->homplan2 = $v;
            $this->modifiedColumns[] = PersontimetemplatePeer::HOMPLAN2;
        }


        return $this;
    } // setHomplan2()

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
            $this->idx = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->ambbegtime = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->ambendtime = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->ambplan = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->office = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->ambbegtime2 = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->ambendtime2 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->ambplan2 = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->office2 = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->hombegtime = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->homendtime = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->homplan = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->hombegtime2 = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->homendtime2 = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->homplan2 = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 22; // 22 = PersontimetemplatePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Persontimetemplate object", $e);
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
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PersontimetemplatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PersontimetemplateQuery::create()
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
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PersontimetemplatePeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = PersontimetemplatePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersontimetemplatePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersontimetemplatePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::AMBBEGTIME)) {
            $modifiedColumns[':p' . $index++]  = '`ambBegTime`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::AMBENDTIME)) {
            $modifiedColumns[':p' . $index++]  = '`ambEndTime`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::AMBPLAN)) {
            $modifiedColumns[':p' . $index++]  = '`ambPlan`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::OFFICE)) {
            $modifiedColumns[':p' . $index++]  = '`office`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::AMBBEGTIME2)) {
            $modifiedColumns[':p' . $index++]  = '`ambBegTime2`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::AMBENDTIME2)) {
            $modifiedColumns[':p' . $index++]  = '`ambEndTime2`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::AMBPLAN2)) {
            $modifiedColumns[':p' . $index++]  = '`ambPlan2`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::OFFICE2)) {
            $modifiedColumns[':p' . $index++]  = '`office2`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::HOMBEGTIME)) {
            $modifiedColumns[':p' . $index++]  = '`homBegTime`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::HOMENDTIME)) {
            $modifiedColumns[':p' . $index++]  = '`homEndTime`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::HOMPLAN)) {
            $modifiedColumns[':p' . $index++]  = '`homPlan`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::HOMBEGTIME2)) {
            $modifiedColumns[':p' . $index++]  = '`homBegTime2`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::HOMENDTIME2)) {
            $modifiedColumns[':p' . $index++]  = '`homEndTime2`';
        }
        if ($this->isColumnModified(PersontimetemplatePeer::HOMPLAN2)) {
            $modifiedColumns[':p' . $index++]  = '`homPlan2`';
        }

        $sql = sprintf(
            'INSERT INTO `PersonTimeTemplate` (%s) VALUES (%s)',
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
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`ambBegTime`':
                        $stmt->bindValue($identifier, $this->ambbegtime, PDO::PARAM_STR);
                        break;
                    case '`ambEndTime`':
                        $stmt->bindValue($identifier, $this->ambendtime, PDO::PARAM_STR);
                        break;
                    case '`ambPlan`':
                        $stmt->bindValue($identifier, $this->ambplan, PDO::PARAM_INT);
                        break;
                    case '`office`':
                        $stmt->bindValue($identifier, $this->office, PDO::PARAM_STR);
                        break;
                    case '`ambBegTime2`':
                        $stmt->bindValue($identifier, $this->ambbegtime2, PDO::PARAM_STR);
                        break;
                    case '`ambEndTime2`':
                        $stmt->bindValue($identifier, $this->ambendtime2, PDO::PARAM_STR);
                        break;
                    case '`ambPlan2`':
                        $stmt->bindValue($identifier, $this->ambplan2, PDO::PARAM_INT);
                        break;
                    case '`office2`':
                        $stmt->bindValue($identifier, $this->office2, PDO::PARAM_STR);
                        break;
                    case '`homBegTime`':
                        $stmt->bindValue($identifier, $this->hombegtime, PDO::PARAM_STR);
                        break;
                    case '`homEndTime`':
                        $stmt->bindValue($identifier, $this->homendtime, PDO::PARAM_STR);
                        break;
                    case '`homPlan`':
                        $stmt->bindValue($identifier, $this->homplan, PDO::PARAM_INT);
                        break;
                    case '`homBegTime2`':
                        $stmt->bindValue($identifier, $this->hombegtime2, PDO::PARAM_STR);
                        break;
                    case '`homEndTime2`':
                        $stmt->bindValue($identifier, $this->homendtime2, PDO::PARAM_STR);
                        break;
                    case '`homPlan2`':
                        $stmt->bindValue($identifier, $this->homplan2, PDO::PARAM_INT);
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


            if (($retval = PersontimetemplatePeer::doValidate($this, $columns)) !== true) {
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
        $pos = PersontimetemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdx();
                break;
            case 8:
                return $this->getAmbbegtime();
                break;
            case 9:
                return $this->getAmbendtime();
                break;
            case 10:
                return $this->getAmbplan();
                break;
            case 11:
                return $this->getOffice();
                break;
            case 12:
                return $this->getAmbbegtime2();
                break;
            case 13:
                return $this->getAmbendtime2();
                break;
            case 14:
                return $this->getAmbplan2();
                break;
            case 15:
                return $this->getOffice2();
                break;
            case 16:
                return $this->getHombegtime();
                break;
            case 17:
                return $this->getHomendtime();
                break;
            case 18:
                return $this->getHomplan();
                break;
            case 19:
                return $this->getHombegtime2();
                break;
            case 20:
                return $this->getHomendtime2();
                break;
            case 21:
                return $this->getHomplan2();
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
        if (isset($alreadyDumpedObjects['Persontimetemplate'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Persontimetemplate'][$this->getPrimaryKey()] = true;
        $keys = PersontimetemplatePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getMasterId(),
            $keys[7] => $this->getIdx(),
            $keys[8] => $this->getAmbbegtime(),
            $keys[9] => $this->getAmbendtime(),
            $keys[10] => $this->getAmbplan(),
            $keys[11] => $this->getOffice(),
            $keys[12] => $this->getAmbbegtime2(),
            $keys[13] => $this->getAmbendtime2(),
            $keys[14] => $this->getAmbplan2(),
            $keys[15] => $this->getOffice2(),
            $keys[16] => $this->getHombegtime(),
            $keys[17] => $this->getHomendtime(),
            $keys[18] => $this->getHomplan(),
            $keys[19] => $this->getHombegtime2(),
            $keys[20] => $this->getHomendtime2(),
            $keys[21] => $this->getHomplan2(),
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
        $pos = PersontimetemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdx($value);
                break;
            case 8:
                $this->setAmbbegtime($value);
                break;
            case 9:
                $this->setAmbendtime($value);
                break;
            case 10:
                $this->setAmbplan($value);
                break;
            case 11:
                $this->setOffice($value);
                break;
            case 12:
                $this->setAmbbegtime2($value);
                break;
            case 13:
                $this->setAmbendtime2($value);
                break;
            case 14:
                $this->setAmbplan2($value);
                break;
            case 15:
                $this->setOffice2($value);
                break;
            case 16:
                $this->setHombegtime($value);
                break;
            case 17:
                $this->setHomendtime($value);
                break;
            case 18:
                $this->setHomplan($value);
                break;
            case 19:
                $this->setHombegtime2($value);
                break;
            case 20:
                $this->setHomendtime2($value);
                break;
            case 21:
                $this->setHomplan2($value);
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
        $keys = PersontimetemplatePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMasterId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIdx($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAmbbegtime($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAmbendtime($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAmbplan($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setOffice($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setAmbbegtime2($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAmbendtime2($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAmbplan2($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setOffice2($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setHombegtime($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setHomendtime($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setHomplan($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setHombegtime2($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setHomendtime2($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setHomplan2($arr[$keys[21]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PersontimetemplatePeer::DATABASE_NAME);

        if ($this->isColumnModified(PersontimetemplatePeer::ID)) $criteria->add(PersontimetemplatePeer::ID, $this->id);
        if ($this->isColumnModified(PersontimetemplatePeer::CREATEDATETIME)) $criteria->add(PersontimetemplatePeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(PersontimetemplatePeer::CREATEPERSON_ID)) $criteria->add(PersontimetemplatePeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(PersontimetemplatePeer::MODIFYDATETIME)) $criteria->add(PersontimetemplatePeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(PersontimetemplatePeer::MODIFYPERSON_ID)) $criteria->add(PersontimetemplatePeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(PersontimetemplatePeer::DELETED)) $criteria->add(PersontimetemplatePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(PersontimetemplatePeer::MASTER_ID)) $criteria->add(PersontimetemplatePeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(PersontimetemplatePeer::IDX)) $criteria->add(PersontimetemplatePeer::IDX, $this->idx);
        if ($this->isColumnModified(PersontimetemplatePeer::AMBBEGTIME)) $criteria->add(PersontimetemplatePeer::AMBBEGTIME, $this->ambbegtime);
        if ($this->isColumnModified(PersontimetemplatePeer::AMBENDTIME)) $criteria->add(PersontimetemplatePeer::AMBENDTIME, $this->ambendtime);
        if ($this->isColumnModified(PersontimetemplatePeer::AMBPLAN)) $criteria->add(PersontimetemplatePeer::AMBPLAN, $this->ambplan);
        if ($this->isColumnModified(PersontimetemplatePeer::OFFICE)) $criteria->add(PersontimetemplatePeer::OFFICE, $this->office);
        if ($this->isColumnModified(PersontimetemplatePeer::AMBBEGTIME2)) $criteria->add(PersontimetemplatePeer::AMBBEGTIME2, $this->ambbegtime2);
        if ($this->isColumnModified(PersontimetemplatePeer::AMBENDTIME2)) $criteria->add(PersontimetemplatePeer::AMBENDTIME2, $this->ambendtime2);
        if ($this->isColumnModified(PersontimetemplatePeer::AMBPLAN2)) $criteria->add(PersontimetemplatePeer::AMBPLAN2, $this->ambplan2);
        if ($this->isColumnModified(PersontimetemplatePeer::OFFICE2)) $criteria->add(PersontimetemplatePeer::OFFICE2, $this->office2);
        if ($this->isColumnModified(PersontimetemplatePeer::HOMBEGTIME)) $criteria->add(PersontimetemplatePeer::HOMBEGTIME, $this->hombegtime);
        if ($this->isColumnModified(PersontimetemplatePeer::HOMENDTIME)) $criteria->add(PersontimetemplatePeer::HOMENDTIME, $this->homendtime);
        if ($this->isColumnModified(PersontimetemplatePeer::HOMPLAN)) $criteria->add(PersontimetemplatePeer::HOMPLAN, $this->homplan);
        if ($this->isColumnModified(PersontimetemplatePeer::HOMBEGTIME2)) $criteria->add(PersontimetemplatePeer::HOMBEGTIME2, $this->hombegtime2);
        if ($this->isColumnModified(PersontimetemplatePeer::HOMENDTIME2)) $criteria->add(PersontimetemplatePeer::HOMENDTIME2, $this->homendtime2);
        if ($this->isColumnModified(PersontimetemplatePeer::HOMPLAN2)) $criteria->add(PersontimetemplatePeer::HOMPLAN2, $this->homplan2);

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
        $criteria = new Criteria(PersontimetemplatePeer::DATABASE_NAME);
        $criteria->add(PersontimetemplatePeer::ID, $this->id);

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
     * @param object $copyObj An object of Persontimetemplate (or compatible) type.
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
        $copyObj->setIdx($this->getIdx());
        $copyObj->setAmbbegtime($this->getAmbbegtime());
        $copyObj->setAmbendtime($this->getAmbendtime());
        $copyObj->setAmbplan($this->getAmbplan());
        $copyObj->setOffice($this->getOffice());
        $copyObj->setAmbbegtime2($this->getAmbbegtime2());
        $copyObj->setAmbendtime2($this->getAmbendtime2());
        $copyObj->setAmbplan2($this->getAmbplan2());
        $copyObj->setOffice2($this->getOffice2());
        $copyObj->setHombegtime($this->getHombegtime());
        $copyObj->setHomendtime($this->getHomendtime());
        $copyObj->setHomplan($this->getHomplan());
        $copyObj->setHombegtime2($this->getHombegtime2());
        $copyObj->setHomendtime2($this->getHomendtime2());
        $copyObj->setHomplan2($this->getHomplan2());
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
     * @return Persontimetemplate Clone of current object.
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
     * @return PersontimetemplatePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PersontimetemplatePeer();
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
        $this->idx = null;
        $this->ambbegtime = null;
        $this->ambendtime = null;
        $this->ambplan = null;
        $this->office = null;
        $this->ambbegtime2 = null;
        $this->ambendtime2 = null;
        $this->ambplan2 = null;
        $this->office2 = null;
        $this->hombegtime = null;
        $this->homendtime = null;
        $this->homplan = null;
        $this->hombegtime2 = null;
        $this->homendtime2 = null;
        $this->homplan2 = null;
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
        return (string) $this->exportTo(PersontimetemplatePeer::DEFAULT_STRING_FORMAT);
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
