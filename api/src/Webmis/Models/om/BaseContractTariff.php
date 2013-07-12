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
use Webmis\Models\ContractTariff;
use Webmis\Models\ContractTariffPeer;
use Webmis\Models\ContractTariffQuery;
use Webmis\Models\Rbservicefinance;
use Webmis\Models\RbservicefinanceQuery;

/**
 * Base class that represents a row from the 'Contract_Tariff' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContractTariff extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ContractTariffPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ContractTariffPeer
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
     * The value for the eventtype_id field.
     * @var        int
     */
    protected $eventtype_id;

    /**
     * The value for the tarifftype field.
     * @var        boolean
     */
    protected $tarifftype;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

    /**
     * The value for the tariffcategory_id field.
     * @var        int
     */
    protected $tariffcategory_id;

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
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

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
     * The value for the price field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $price;

    /**
     * The value for the limitationexceedmode field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $limitationexceedmode;

    /**
     * The value for the limitation field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $limitation;

    /**
     * The value for the priceex field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $priceex;

    /**
     * The value for the mkb field.
     * @var        string
     */
    protected $mkb;

    /**
     * The value for the rbservicefinance_id field.
     * @var        int
     */
    protected $rbservicefinance_id;

    /**
     * @var        Rbservicefinance
     */
    protected $aRbservicefinance;

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
        $this->uet = 0;
        $this->price = 0;
        $this->limitationexceedmode = 0;
        $this->limitation = 0;
        $this->priceex = 0;
    }

    /**
     * Initializes internal state of BaseContractTariff object.
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
     * Get the [eventtype_id] column value.
     *
     * @return int
     */
    public function getEventtypeId()
    {
        return $this->eventtype_id;
    }

    /**
     * Get the [tarifftype] column value.
     *
     * @return boolean
     */
    public function getTarifftype()
    {
        return $this->tarifftype;
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
     * Get the [tariffcategory_id] column value.
     *
     * @return int
     */
    public function getTariffcategoryId()
    {
        return $this->tariffcategory_id;
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
     * Get the [unit_id] column value.
     *
     * @return int
     */
    public function getUnitId()
    {
        return $this->unit_id;
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
     * Get the [price] column value.
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [limitationexceedmode] column value.
     *
     * @return int
     */
    public function getLimitationexceedmode()
    {
        return $this->limitationexceedmode;
    }

    /**
     * Get the [limitation] column value.
     *
     * @return double
     */
    public function getLimitation()
    {
        return $this->limitation;
    }

    /**
     * Get the [priceex] column value.
     *
     * @return double
     */
    public function getPriceex()
    {
        return $this->priceex;
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
     * Get the [rbservicefinance_id] column value.
     *
     * @return int
     */
    public function getRbservicefinanceId()
    {
        return $this->rbservicefinance_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ContractTariff The current object (for fluent API support)
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
            $this->modifiedColumns[] = ContractTariffPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::MASTER_ID;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [eventtype_id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setEventtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->eventtype_id !== $v) {
            $this->eventtype_id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::EVENTTYPE_ID;
        }


        return $this;
    } // setEventtypeId()

    /**
     * Sets the value of the [tarifftype] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setTarifftype($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->tarifftype !== $v) {
            $this->tarifftype = $v;
            $this->modifiedColumns[] = ContractTariffPeer::TARIFFTYPE;
        }


        return $this;
    } // setTarifftype()

    /**
     * Set the value of [service_id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::SERVICE_ID;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [tariffcategory_id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setTariffcategoryId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tariffcategory_id !== $v) {
            $this->tariffcategory_id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::TARIFFCATEGORY_ID;
        }


        return $this;
    } // setTariffcategoryId()

    /**
     * Sets the value of [begdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setBegdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begdate !== null || $dt !== null) {
            $currentDateAsString = ($this->begdate !== null && $tmpDt = new DateTime($this->begdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begdate = $newDateAsString;
                $this->modifiedColumns[] = ContractTariffPeer::BEGDATE;
            }
        } // if either are not null


        return $this;
    } // setBegdate()

    /**
     * Sets the value of [enddate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setEnddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->enddate !== null || $dt !== null) {
            $currentDateAsString = ($this->enddate !== null && $tmpDt = new DateTime($this->enddate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->enddate = $newDateAsString;
                $this->modifiedColumns[] = ContractTariffPeer::ENDDATE;
            }
        } // if either are not null


        return $this;
    } // setEnddate()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = ContractTariffPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = ContractTariffPeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = ContractTariffPeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = ContractTariffPeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = ContractTariffPeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = ContractTariffPeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [unit_id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::UNIT_ID;
        }


        return $this;
    } // setUnitId()

    /**
     * Set the value of [amount] column.
     *
     * @param double $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[] = ContractTariffPeer::AMOUNT;
        }


        return $this;
    } // setAmount()

    /**
     * Set the value of [uet] column.
     *
     * @param double $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setUet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->uet !== $v) {
            $this->uet = $v;
            $this->modifiedColumns[] = ContractTariffPeer::UET;
        }


        return $this;
    } // setUet()

    /**
     * Set the value of [price] column.
     *
     * @param double $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[] = ContractTariffPeer::PRICE;
        }


        return $this;
    } // setPrice()

    /**
     * Set the value of [limitationexceedmode] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setLimitationexceedmode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->limitationexceedmode !== $v) {
            $this->limitationexceedmode = $v;
            $this->modifiedColumns[] = ContractTariffPeer::LIMITATIONEXCEEDMODE;
        }


        return $this;
    } // setLimitationexceedmode()

    /**
     * Set the value of [limitation] column.
     *
     * @param double $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setLimitation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->limitation !== $v) {
            $this->limitation = $v;
            $this->modifiedColumns[] = ContractTariffPeer::LIMITATION;
        }


        return $this;
    } // setLimitation()

    /**
     * Set the value of [priceex] column.
     *
     * @param double $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setPriceex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->priceex !== $v) {
            $this->priceex = $v;
            $this->modifiedColumns[] = ContractTariffPeer::PRICEEX;
        }


        return $this;
    } // setPriceex()

    /**
     * Set the value of [mkb] column.
     *
     * @param string $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setMkb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mkb !== $v) {
            $this->mkb = $v;
            $this->modifiedColumns[] = ContractTariffPeer::MKB;
        }


        return $this;
    } // setMkb()

    /**
     * Set the value of [rbservicefinance_id] column.
     *
     * @param int $v new value
     * @return ContractTariff The current object (for fluent API support)
     */
    public function setRbservicefinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbservicefinance_id !== $v) {
            $this->rbservicefinance_id = $v;
            $this->modifiedColumns[] = ContractTariffPeer::RBSERVICEFINANCE_ID;
        }

        if ($this->aRbservicefinance !== null && $this->aRbservicefinance->getId() !== $v) {
            $this->aRbservicefinance = null;
        }


        return $this;
    } // setRbservicefinanceId()

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

            if ($this->uet !== 0) {
                return false;
            }

            if ($this->price !== 0) {
                return false;
            }

            if ($this->limitationexceedmode !== 0) {
                return false;
            }

            if ($this->limitation !== 0) {
                return false;
            }

            if ($this->priceex !== 0) {
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
            $this->deleted = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
            $this->master_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->eventtype_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->tarifftype = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->service_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->tariffcategory_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->begdate = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->enddate = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->sex = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->age = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->age_bu = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->age_bc = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->age_eu = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->age_ec = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->unit_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->amount = ($row[$startcol + 16] !== null) ? (double) $row[$startcol + 16] : null;
            $this->uet = ($row[$startcol + 17] !== null) ? (double) $row[$startcol + 17] : null;
            $this->price = ($row[$startcol + 18] !== null) ? (double) $row[$startcol + 18] : null;
            $this->limitationexceedmode = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->limitation = ($row[$startcol + 20] !== null) ? (double) $row[$startcol + 20] : null;
            $this->priceex = ($row[$startcol + 21] !== null) ? (double) $row[$startcol + 21] : null;
            $this->mkb = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->rbservicefinance_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 24; // 24 = ContractTariffPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ContractTariff object", $e);
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

        if ($this->aRbservicefinance !== null && $this->rbservicefinance_id !== $this->aRbservicefinance->getId()) {
            $this->aRbservicefinance = null;
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
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ContractTariffPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbservicefinance = null;
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
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ContractTariffQuery::create()
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
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ContractTariffPeer::addInstanceToPool($this);
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

            if ($this->aRbservicefinance !== null) {
                if ($this->aRbservicefinance->isModified() || $this->aRbservicefinance->isNew()) {
                    $affectedRows += $this->aRbservicefinance->save($con);
                }
                $this->setRbservicefinance($this->aRbservicefinance);
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

        $this->modifiedColumns[] = ContractTariffPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ContractTariffPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ContractTariffPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ContractTariffPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ContractTariffPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(ContractTariffPeer::EVENTTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`eventType_id`';
        }
        if ($this->isColumnModified(ContractTariffPeer::TARIFFTYPE)) {
            $modifiedColumns[':p' . $index++]  = '`tariffType`';
        }
        if ($this->isColumnModified(ContractTariffPeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`service_id`';
        }
        if ($this->isColumnModified(ContractTariffPeer::TARIFFCATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tariffCategory_id`';
        }
        if ($this->isColumnModified(ContractTariffPeer::BEGDATE)) {
            $modifiedColumns[':p' . $index++]  = '`begDate`';
        }
        if ($this->isColumnModified(ContractTariffPeer::ENDDATE)) {
            $modifiedColumns[':p' . $index++]  = '`endDate`';
        }
        if ($this->isColumnModified(ContractTariffPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(ContractTariffPeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(ContractTariffPeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(ContractTariffPeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(ContractTariffPeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(ContractTariffPeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(ContractTariffPeer::UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`unit_id`';
        }
        if ($this->isColumnModified(ContractTariffPeer::AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`amount`';
        }
        if ($this->isColumnModified(ContractTariffPeer::UET)) {
            $modifiedColumns[':p' . $index++]  = '`uet`';
        }
        if ($this->isColumnModified(ContractTariffPeer::PRICE)) {
            $modifiedColumns[':p' . $index++]  = '`price`';
        }
        if ($this->isColumnModified(ContractTariffPeer::LIMITATIONEXCEEDMODE)) {
            $modifiedColumns[':p' . $index++]  = '`limitationExceedMode`';
        }
        if ($this->isColumnModified(ContractTariffPeer::LIMITATION)) {
            $modifiedColumns[':p' . $index++]  = '`limitation`';
        }
        if ($this->isColumnModified(ContractTariffPeer::PRICEEX)) {
            $modifiedColumns[':p' . $index++]  = '`priceEx`';
        }
        if ($this->isColumnModified(ContractTariffPeer::MKB)) {
            $modifiedColumns[':p' . $index++]  = '`MKB`';
        }
        if ($this->isColumnModified(ContractTariffPeer::RBSERVICEFINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbServiceFinance_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Contract_Tariff` (%s) VALUES (%s)',
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
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
                        break;
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`eventType_id`':
                        $stmt->bindValue($identifier, $this->eventtype_id, PDO::PARAM_INT);
                        break;
                    case '`tariffType`':
                        $stmt->bindValue($identifier, (int) $this->tarifftype, PDO::PARAM_INT);
                        break;
                    case '`service_id`':
                        $stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
                        break;
                    case '`tariffCategory_id`':
                        $stmt->bindValue($identifier, $this->tariffcategory_id, PDO::PARAM_INT);
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
                    case '`unit_id`':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case '`amount`':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case '`uet`':
                        $stmt->bindValue($identifier, $this->uet, PDO::PARAM_STR);
                        break;
                    case '`price`':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case '`limitationExceedMode`':
                        $stmt->bindValue($identifier, $this->limitationexceedmode, PDO::PARAM_INT);
                        break;
                    case '`limitation`':
                        $stmt->bindValue($identifier, $this->limitation, PDO::PARAM_STR);
                        break;
                    case '`priceEx`':
                        $stmt->bindValue($identifier, $this->priceex, PDO::PARAM_STR);
                        break;
                    case '`MKB`':
                        $stmt->bindValue($identifier, $this->mkb, PDO::PARAM_STR);
                        break;
                    case '`rbServiceFinance_id`':
                        $stmt->bindValue($identifier, $this->rbservicefinance_id, PDO::PARAM_INT);
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

            if ($this->aRbservicefinance !== null) {
                if (!$this->aRbservicefinance->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbservicefinance->getValidationFailures());
                }
            }


            if (($retval = ContractTariffPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ContractTariffPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDeleted();
                break;
            case 2:
                return $this->getMasterId();
                break;
            case 3:
                return $this->getEventtypeId();
                break;
            case 4:
                return $this->getTarifftype();
                break;
            case 5:
                return $this->getServiceId();
                break;
            case 6:
                return $this->getTariffcategoryId();
                break;
            case 7:
                return $this->getBegdate();
                break;
            case 8:
                return $this->getEnddate();
                break;
            case 9:
                return $this->getSex();
                break;
            case 10:
                return $this->getAge();
                break;
            case 11:
                return $this->getAgeBu();
                break;
            case 12:
                return $this->getAgeBc();
                break;
            case 13:
                return $this->getAgeEu();
                break;
            case 14:
                return $this->getAgeEc();
                break;
            case 15:
                return $this->getUnitId();
                break;
            case 16:
                return $this->getAmount();
                break;
            case 17:
                return $this->getUet();
                break;
            case 18:
                return $this->getPrice();
                break;
            case 19:
                return $this->getLimitationexceedmode();
                break;
            case 20:
                return $this->getLimitation();
                break;
            case 21:
                return $this->getPriceex();
                break;
            case 22:
                return $this->getMkb();
                break;
            case 23:
                return $this->getRbservicefinanceId();
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
        if (isset($alreadyDumpedObjects['ContractTariff'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ContractTariff'][$this->getPrimaryKey()] = true;
        $keys = ContractTariffPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDeleted(),
            $keys[2] => $this->getMasterId(),
            $keys[3] => $this->getEventtypeId(),
            $keys[4] => $this->getTarifftype(),
            $keys[5] => $this->getServiceId(),
            $keys[6] => $this->getTariffcategoryId(),
            $keys[7] => $this->getBegdate(),
            $keys[8] => $this->getEnddate(),
            $keys[9] => $this->getSex(),
            $keys[10] => $this->getAge(),
            $keys[11] => $this->getAgeBu(),
            $keys[12] => $this->getAgeBc(),
            $keys[13] => $this->getAgeEu(),
            $keys[14] => $this->getAgeEc(),
            $keys[15] => $this->getUnitId(),
            $keys[16] => $this->getAmount(),
            $keys[17] => $this->getUet(),
            $keys[18] => $this->getPrice(),
            $keys[19] => $this->getLimitationexceedmode(),
            $keys[20] => $this->getLimitation(),
            $keys[21] => $this->getPriceex(),
            $keys[22] => $this->getMkb(),
            $keys[23] => $this->getRbservicefinanceId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbservicefinance) {
                $result['Rbservicefinance'] = $this->aRbservicefinance->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ContractTariffPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDeleted($value);
                break;
            case 2:
                $this->setMasterId($value);
                break;
            case 3:
                $this->setEventtypeId($value);
                break;
            case 4:
                $this->setTarifftype($value);
                break;
            case 5:
                $this->setServiceId($value);
                break;
            case 6:
                $this->setTariffcategoryId($value);
                break;
            case 7:
                $this->setBegdate($value);
                break;
            case 8:
                $this->setEnddate($value);
                break;
            case 9:
                $this->setSex($value);
                break;
            case 10:
                $this->setAge($value);
                break;
            case 11:
                $this->setAgeBu($value);
                break;
            case 12:
                $this->setAgeBc($value);
                break;
            case 13:
                $this->setAgeEu($value);
                break;
            case 14:
                $this->setAgeEc($value);
                break;
            case 15:
                $this->setUnitId($value);
                break;
            case 16:
                $this->setAmount($value);
                break;
            case 17:
                $this->setUet($value);
                break;
            case 18:
                $this->setPrice($value);
                break;
            case 19:
                $this->setLimitationexceedmode($value);
                break;
            case 20:
                $this->setLimitation($value);
                break;
            case 21:
                $this->setPriceex($value);
                break;
            case 22:
                $this->setMkb($value);
                break;
            case 23:
                $this->setRbservicefinanceId($value);
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
        $keys = ContractTariffPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeleted($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMasterId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setEventtypeId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTarifftype($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setServiceId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTariffcategoryId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBegdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setEnddate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSex($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAge($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAgeBu($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setAgeBc($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAgeEu($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAgeEc($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setUnitId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAmount($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setUet($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setPrice($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setLimitationexceedmode($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setLimitation($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setPriceex($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setMkb($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setRbservicefinanceId($arr[$keys[23]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ContractTariffPeer::DATABASE_NAME);

        if ($this->isColumnModified(ContractTariffPeer::ID)) $criteria->add(ContractTariffPeer::ID, $this->id);
        if ($this->isColumnModified(ContractTariffPeer::DELETED)) $criteria->add(ContractTariffPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ContractTariffPeer::MASTER_ID)) $criteria->add(ContractTariffPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(ContractTariffPeer::EVENTTYPE_ID)) $criteria->add(ContractTariffPeer::EVENTTYPE_ID, $this->eventtype_id);
        if ($this->isColumnModified(ContractTariffPeer::TARIFFTYPE)) $criteria->add(ContractTariffPeer::TARIFFTYPE, $this->tarifftype);
        if ($this->isColumnModified(ContractTariffPeer::SERVICE_ID)) $criteria->add(ContractTariffPeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(ContractTariffPeer::TARIFFCATEGORY_ID)) $criteria->add(ContractTariffPeer::TARIFFCATEGORY_ID, $this->tariffcategory_id);
        if ($this->isColumnModified(ContractTariffPeer::BEGDATE)) $criteria->add(ContractTariffPeer::BEGDATE, $this->begdate);
        if ($this->isColumnModified(ContractTariffPeer::ENDDATE)) $criteria->add(ContractTariffPeer::ENDDATE, $this->enddate);
        if ($this->isColumnModified(ContractTariffPeer::SEX)) $criteria->add(ContractTariffPeer::SEX, $this->sex);
        if ($this->isColumnModified(ContractTariffPeer::AGE)) $criteria->add(ContractTariffPeer::AGE, $this->age);
        if ($this->isColumnModified(ContractTariffPeer::AGE_BU)) $criteria->add(ContractTariffPeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(ContractTariffPeer::AGE_BC)) $criteria->add(ContractTariffPeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(ContractTariffPeer::AGE_EU)) $criteria->add(ContractTariffPeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(ContractTariffPeer::AGE_EC)) $criteria->add(ContractTariffPeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(ContractTariffPeer::UNIT_ID)) $criteria->add(ContractTariffPeer::UNIT_ID, $this->unit_id);
        if ($this->isColumnModified(ContractTariffPeer::AMOUNT)) $criteria->add(ContractTariffPeer::AMOUNT, $this->amount);
        if ($this->isColumnModified(ContractTariffPeer::UET)) $criteria->add(ContractTariffPeer::UET, $this->uet);
        if ($this->isColumnModified(ContractTariffPeer::PRICE)) $criteria->add(ContractTariffPeer::PRICE, $this->price);
        if ($this->isColumnModified(ContractTariffPeer::LIMITATIONEXCEEDMODE)) $criteria->add(ContractTariffPeer::LIMITATIONEXCEEDMODE, $this->limitationexceedmode);
        if ($this->isColumnModified(ContractTariffPeer::LIMITATION)) $criteria->add(ContractTariffPeer::LIMITATION, $this->limitation);
        if ($this->isColumnModified(ContractTariffPeer::PRICEEX)) $criteria->add(ContractTariffPeer::PRICEEX, $this->priceex);
        if ($this->isColumnModified(ContractTariffPeer::MKB)) $criteria->add(ContractTariffPeer::MKB, $this->mkb);
        if ($this->isColumnModified(ContractTariffPeer::RBSERVICEFINANCE_ID)) $criteria->add(ContractTariffPeer::RBSERVICEFINANCE_ID, $this->rbservicefinance_id);

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
        $criteria = new Criteria(ContractTariffPeer::DATABASE_NAME);
        $criteria->add(ContractTariffPeer::ID, $this->id);

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
     * @param object $copyObj An object of ContractTariff (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setEventtypeId($this->getEventtypeId());
        $copyObj->setTarifftype($this->getTarifftype());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setTariffcategoryId($this->getTariffcategoryId());
        $copyObj->setBegdate($this->getBegdate());
        $copyObj->setEnddate($this->getEnddate());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setUet($this->getUet());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setLimitationexceedmode($this->getLimitationexceedmode());
        $copyObj->setLimitation($this->getLimitation());
        $copyObj->setPriceex($this->getPriceex());
        $copyObj->setMkb($this->getMkb());
        $copyObj->setRbservicefinanceId($this->getRbservicefinanceId());

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
     * @return ContractTariff Clone of current object.
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
     * @return ContractTariffPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ContractTariffPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbservicefinance object.
     *
     * @param             Rbservicefinance $v
     * @return ContractTariff The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbservicefinance(Rbservicefinance $v = null)
    {
        if ($v === null) {
            $this->setRbservicefinanceId(NULL);
        } else {
            $this->setRbservicefinanceId($v->getId());
        }

        $this->aRbservicefinance = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbservicefinance object, it will not be re-added.
        if ($v !== null) {
            $v->addContractTariff($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbservicefinance object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbservicefinance The associated Rbservicefinance object.
     * @throws PropelException
     */
    public function getRbservicefinance(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbservicefinance === null && ($this->rbservicefinance_id !== null) && $doQuery) {
            $this->aRbservicefinance = RbservicefinanceQuery::create()->findPk($this->rbservicefinance_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbservicefinance->addContractTariffs($this);
             */
        }

        return $this->aRbservicefinance;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->deleted = null;
        $this->master_id = null;
        $this->eventtype_id = null;
        $this->tarifftype = null;
        $this->service_id = null;
        $this->tariffcategory_id = null;
        $this->begdate = null;
        $this->enddate = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->unit_id = null;
        $this->amount = null;
        $this->uet = null;
        $this->price = null;
        $this->limitationexceedmode = null;
        $this->limitation = null;
        $this->priceex = null;
        $this->mkb = null;
        $this->rbservicefinance_id = null;
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
            if ($this->aRbservicefinance instanceof Persistent) {
              $this->aRbservicefinance->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbservicefinance = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ContractTariffPeer::DEFAULT_STRING_FORMAT);
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
