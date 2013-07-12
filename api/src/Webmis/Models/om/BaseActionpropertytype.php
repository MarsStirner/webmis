<?php

namespace Webmis\Models\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Actionpropertytype;
use Webmis\Models\ActionpropertytypePeer;
use Webmis\Models\ActionpropertytypeQuery;

/**
 * Base class that represents a row from the 'ActionPropertyType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertytype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ActionpropertytypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ActionpropertytypePeer
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
     * The value for the actiontype_id field.
     * @var        int
     */
    protected $actiontype_id;

    /**
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the template_id field.
     * @var        int
     */
    protected $template_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the descr field.
     * @var        string
     */
    protected $descr;

    /**
     * The value for the unit_id field.
     * @var        int
     */
    protected $unit_id;

    /**
     * The value for the typename field.
     * @var        string
     */
    protected $typename;

    /**
     * The value for the valuedomain field.
     * @var        string
     */
    protected $valuedomain;

    /**
     * The value for the defaultvalue field.
     * @var        string
     */
    protected $defaultvalue;

    /**
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the isvector field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isvector;

    /**
     * The value for the norm field.
     * @var        string
     */
    protected $norm;

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
     * The value for the penalty field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $penalty;

    /**
     * The value for the visibleinjobticket field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $visibleinjobticket;

    /**
     * The value for the isassignable field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isassignable;

    /**
     * The value for the test_id field.
     * @var        int
     */
    protected $test_id;

    /**
     * The value for the defaultevaluation field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $defaultevaluation;

    /**
     * The value for the toepicrisis field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $toepicrisis;

    /**
     * The value for the mandatory field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $mandatory;

    /**
     * The value for the readonly field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $readonly;

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
        $this->isvector = false;
        $this->penalty = 0;
        $this->visibleinjobticket = false;
        $this->isassignable = false;
        $this->defaultevaluation = false;
        $this->toepicrisis = false;
        $this->mandatory = false;
        $this->readonly = false;
    }

    /**
     * Initializes internal state of BaseActionpropertytype object.
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
     * Get the [actiontype_id] column value.
     *
     * @return int
     */
    public function getActiontypeId()
    {
        return $this->actiontype_id;
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
     * Get the [template_id] column value.
     *
     * @return int
     */
    public function getTemplateId()
    {
        return $this->template_id;
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
     * Get the [descr] column value.
     *
     * @return string
     */
    public function getDescr()
    {
        return $this->descr;
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
     * Get the [typename] column value.
     *
     * @return string
     */
    public function getTypename()
    {
        return $this->typename;
    }

    /**
     * Get the [valuedomain] column value.
     *
     * @return string
     */
    public function getValuedomain()
    {
        return $this->valuedomain;
    }

    /**
     * Get the [defaultvalue] column value.
     *
     * @return string
     */
    public function getDefaultvalue()
    {
        return $this->defaultvalue;
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
     * Get the [isvector] column value.
     *
     * @return boolean
     */
    public function getIsvector()
    {
        return $this->isvector;
    }

    /**
     * Get the [norm] column value.
     *
     * @return string
     */
    public function getNorm()
    {
        return $this->norm;
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
     * Get the [penalty] column value.
     *
     * @return int
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * Get the [visibleinjobticket] column value.
     *
     * @return boolean
     */
    public function getVisibleinjobticket()
    {
        return $this->visibleinjobticket;
    }

    /**
     * Get the [isassignable] column value.
     *
     * @return boolean
     */
    public function getIsassignable()
    {
        return $this->isassignable;
    }

    /**
     * Get the [test_id] column value.
     *
     * @return int
     */
    public function getTestId()
    {
        return $this->test_id;
    }

    /**
     * Get the [defaultevaluation] column value.
     *
     * @return boolean
     */
    public function getDefaultevaluation()
    {
        return $this->defaultevaluation;
    }

    /**
     * Get the [toepicrisis] column value.
     *
     * @return boolean
     */
    public function getToepicrisis()
    {
        return $this->toepicrisis;
    }

    /**
     * Get the [mandatory] column value.
     *
     * @return boolean
     */
    public function getMandatory()
    {
        return $this->mandatory;
    }

    /**
     * Get the [readonly] column value.
     *
     * @return boolean
     */
    public function getReadonly()
    {
        return $this->readonly;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::ID;
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
     * @return Actionpropertytype The current object (for fluent API support)
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
            $this->modifiedColumns[] = ActionpropertytypePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [actiontype_id] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setActiontypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->actiontype_id !== $v) {
            $this->actiontype_id = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::ACTIONTYPE_ID;
        }


        return $this;
    } // setActiontypeId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [template_id] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setTemplateId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->template_id !== $v) {
            $this->template_id = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::TEMPLATE_ID;
        }


        return $this;
    } // setTemplateId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [descr] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setDescr($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->descr !== $v) {
            $this->descr = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::DESCR;
        }


        return $this;
    } // setDescr()

    /**
     * Set the value of [unit_id] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setUnitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->unit_id !== $v) {
            $this->unit_id = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::UNIT_ID;
        }


        return $this;
    } // setUnitId()

    /**
     * Set the value of [typename] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setTypename($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->typename !== $v) {
            $this->typename = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::TYPENAME;
        }


        return $this;
    } // setTypename()

    /**
     * Set the value of [valuedomain] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setValuedomain($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->valuedomain !== $v) {
            $this->valuedomain = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::VALUEDOMAIN;
        }


        return $this;
    } // setValuedomain()

    /**
     * Set the value of [defaultvalue] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setDefaultvalue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->defaultvalue !== $v) {
            $this->defaultvalue = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::DEFAULTVALUE;
        }


        return $this;
    } // setDefaultvalue()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Sets the value of the [isvector] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setIsvector($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isvector !== $v) {
            $this->isvector = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::ISVECTOR;
        }


        return $this;
    } // setIsvector()

    /**
     * Set the value of [norm] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setNorm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->norm !== $v) {
            $this->norm = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::NORM;
        }


        return $this;
    } // setNorm()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [penalty] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setPenalty($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->penalty !== $v) {
            $this->penalty = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::PENALTY;
        }


        return $this;
    } // setPenalty()

    /**
     * Sets the value of the [visibleinjobticket] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setVisibleinjobticket($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->visibleinjobticket !== $v) {
            $this->visibleinjobticket = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::VISIBLEINJOBTICKET;
        }


        return $this;
    } // setVisibleinjobticket()

    /**
     * Sets the value of the [isassignable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setIsassignable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isassignable !== $v) {
            $this->isassignable = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::ISASSIGNABLE;
        }


        return $this;
    } // setIsassignable()

    /**
     * Set the value of [test_id] column.
     *
     * @param int $v new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setTestId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->test_id !== $v) {
            $this->test_id = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::TEST_ID;
        }


        return $this;
    } // setTestId()

    /**
     * Sets the value of the [defaultevaluation] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setDefaultevaluation($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->defaultevaluation !== $v) {
            $this->defaultevaluation = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::DEFAULTEVALUATION;
        }


        return $this;
    } // setDefaultevaluation()

    /**
     * Sets the value of the [toepicrisis] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setToepicrisis($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->toepicrisis !== $v) {
            $this->toepicrisis = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::TOEPICRISIS;
        }


        return $this;
    } // setToepicrisis()

    /**
     * Sets the value of the [mandatory] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setMandatory($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->mandatory !== $v) {
            $this->mandatory = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::MANDATORY;
        }


        return $this;
    } // setMandatory()

    /**
     * Sets the value of the [readonly] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Actionpropertytype The current object (for fluent API support)
     */
    public function setReadonly($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->readonly !== $v) {
            $this->readonly = $v;
            $this->modifiedColumns[] = ActionpropertytypePeer::READONLY;
        }


        return $this;
    } // setReadonly()

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

            if ($this->isvector !== false) {
                return false;
            }

            if ($this->penalty !== 0) {
                return false;
            }

            if ($this->visibleinjobticket !== false) {
                return false;
            }

            if ($this->isassignable !== false) {
                return false;
            }

            if ($this->defaultevaluation !== false) {
                return false;
            }

            if ($this->toepicrisis !== false) {
                return false;
            }

            if ($this->mandatory !== false) {
                return false;
            }

            if ($this->readonly !== false) {
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
            $this->actiontype_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->idx = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->template_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->descr = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->unit_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->typename = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->valuedomain = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->defaultvalue = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->code = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->isvector = ($row[$startcol + 12] !== null) ? (boolean) $row[$startcol + 12] : null;
            $this->norm = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->sex = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->age = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->age_bu = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->age_bc = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
            $this->age_eu = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->age_ec = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->penalty = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
            $this->visibleinjobticket = ($row[$startcol + 21] !== null) ? (boolean) $row[$startcol + 21] : null;
            $this->isassignable = ($row[$startcol + 22] !== null) ? (boolean) $row[$startcol + 22] : null;
            $this->test_id = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->defaultevaluation = ($row[$startcol + 24] !== null) ? (boolean) $row[$startcol + 24] : null;
            $this->toepicrisis = ($row[$startcol + 25] !== null) ? (boolean) $row[$startcol + 25] : null;
            $this->mandatory = ($row[$startcol + 26] !== null) ? (boolean) $row[$startcol + 26] : null;
            $this->readonly = ($row[$startcol + 27] !== null) ? (boolean) $row[$startcol + 27] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 28; // 28 = ActionpropertytypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Actionpropertytype object", $e);
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
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ActionpropertytypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ActionpropertytypeQuery::create()
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
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ActionpropertytypePeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ActionpropertytypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActionpropertytypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActionpropertytypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::ACTIONTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`actionType_id`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::TEMPLATE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`template_id`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::DESCR)) {
            $modifiedColumns[':p' . $index++]  = '`descr`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::UNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`unit_id`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::TYPENAME)) {
            $modifiedColumns[':p' . $index++]  = '`typeName`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::VALUEDOMAIN)) {
            $modifiedColumns[':p' . $index++]  = '`valueDomain`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::DEFAULTVALUE)) {
            $modifiedColumns[':p' . $index++]  = '`defaultValue`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::ISVECTOR)) {
            $modifiedColumns[':p' . $index++]  = '`isVector`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::NORM)) {
            $modifiedColumns[':p' . $index++]  = '`norm`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::PENALTY)) {
            $modifiedColumns[':p' . $index++]  = '`penalty`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::VISIBLEINJOBTICKET)) {
            $modifiedColumns[':p' . $index++]  = '`visibleInJobTicket`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::ISASSIGNABLE)) {
            $modifiedColumns[':p' . $index++]  = '`isAssignable`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::TEST_ID)) {
            $modifiedColumns[':p' . $index++]  = '`test_id`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::DEFAULTEVALUATION)) {
            $modifiedColumns[':p' . $index++]  = '`defaultEvaluation`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::TOEPICRISIS)) {
            $modifiedColumns[':p' . $index++]  = '`toEpicrisis`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::MANDATORY)) {
            $modifiedColumns[':p' . $index++]  = '`mandatory`';
        }
        if ($this->isColumnModified(ActionpropertytypePeer::READONLY)) {
            $modifiedColumns[':p' . $index++]  = '`readOnly`';
        }

        $sql = sprintf(
            'INSERT INTO `ActionPropertyType` (%s) VALUES (%s)',
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
                    case '`actionType_id`':
                        $stmt->bindValue($identifier, $this->actiontype_id, PDO::PARAM_INT);
                        break;
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`template_id`':
                        $stmt->bindValue($identifier, $this->template_id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`descr`':
                        $stmt->bindValue($identifier, $this->descr, PDO::PARAM_STR);
                        break;
                    case '`unit_id`':
                        $stmt->bindValue($identifier, $this->unit_id, PDO::PARAM_INT);
                        break;
                    case '`typeName`':
                        $stmt->bindValue($identifier, $this->typename, PDO::PARAM_STR);
                        break;
                    case '`valueDomain`':
                        $stmt->bindValue($identifier, $this->valuedomain, PDO::PARAM_STR);
                        break;
                    case '`defaultValue`':
                        $stmt->bindValue($identifier, $this->defaultvalue, PDO::PARAM_STR);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`isVector`':
                        $stmt->bindValue($identifier, (int) $this->isvector, PDO::PARAM_INT);
                        break;
                    case '`norm`':
                        $stmt->bindValue($identifier, $this->norm, PDO::PARAM_STR);
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
                    case '`penalty`':
                        $stmt->bindValue($identifier, $this->penalty, PDO::PARAM_INT);
                        break;
                    case '`visibleInJobTicket`':
                        $stmt->bindValue($identifier, (int) $this->visibleinjobticket, PDO::PARAM_INT);
                        break;
                    case '`isAssignable`':
                        $stmt->bindValue($identifier, (int) $this->isassignable, PDO::PARAM_INT);
                        break;
                    case '`test_id`':
                        $stmt->bindValue($identifier, $this->test_id, PDO::PARAM_INT);
                        break;
                    case '`defaultEvaluation`':
                        $stmt->bindValue($identifier, (int) $this->defaultevaluation, PDO::PARAM_INT);
                        break;
                    case '`toEpicrisis`':
                        $stmt->bindValue($identifier, (int) $this->toepicrisis, PDO::PARAM_INT);
                        break;
                    case '`mandatory`':
                        $stmt->bindValue($identifier, (int) $this->mandatory, PDO::PARAM_INT);
                        break;
                    case '`readOnly`':
                        $stmt->bindValue($identifier, (int) $this->readonly, PDO::PARAM_INT);
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


            if (($retval = ActionpropertytypePeer::doValidate($this, $columns)) !== true) {
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
        $pos = ActionpropertytypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getActiontypeId();
                break;
            case 3:
                return $this->getIdx();
                break;
            case 4:
                return $this->getTemplateId();
                break;
            case 5:
                return $this->getName();
                break;
            case 6:
                return $this->getDescr();
                break;
            case 7:
                return $this->getUnitId();
                break;
            case 8:
                return $this->getTypename();
                break;
            case 9:
                return $this->getValuedomain();
                break;
            case 10:
                return $this->getDefaultvalue();
                break;
            case 11:
                return $this->getCode();
                break;
            case 12:
                return $this->getIsvector();
                break;
            case 13:
                return $this->getNorm();
                break;
            case 14:
                return $this->getSex();
                break;
            case 15:
                return $this->getAge();
                break;
            case 16:
                return $this->getAgeBu();
                break;
            case 17:
                return $this->getAgeBc();
                break;
            case 18:
                return $this->getAgeEu();
                break;
            case 19:
                return $this->getAgeEc();
                break;
            case 20:
                return $this->getPenalty();
                break;
            case 21:
                return $this->getVisibleinjobticket();
                break;
            case 22:
                return $this->getIsassignable();
                break;
            case 23:
                return $this->getTestId();
                break;
            case 24:
                return $this->getDefaultevaluation();
                break;
            case 25:
                return $this->getToepicrisis();
                break;
            case 26:
                return $this->getMandatory();
                break;
            case 27:
                return $this->getReadonly();
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
        if (isset($alreadyDumpedObjects['Actionpropertytype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Actionpropertytype'][$this->getPrimaryKey()] = true;
        $keys = ActionpropertytypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDeleted(),
            $keys[2] => $this->getActiontypeId(),
            $keys[3] => $this->getIdx(),
            $keys[4] => $this->getTemplateId(),
            $keys[5] => $this->getName(),
            $keys[6] => $this->getDescr(),
            $keys[7] => $this->getUnitId(),
            $keys[8] => $this->getTypename(),
            $keys[9] => $this->getValuedomain(),
            $keys[10] => $this->getDefaultvalue(),
            $keys[11] => $this->getCode(),
            $keys[12] => $this->getIsvector(),
            $keys[13] => $this->getNorm(),
            $keys[14] => $this->getSex(),
            $keys[15] => $this->getAge(),
            $keys[16] => $this->getAgeBu(),
            $keys[17] => $this->getAgeBc(),
            $keys[18] => $this->getAgeEu(),
            $keys[19] => $this->getAgeEc(),
            $keys[20] => $this->getPenalty(),
            $keys[21] => $this->getVisibleinjobticket(),
            $keys[22] => $this->getIsassignable(),
            $keys[23] => $this->getTestId(),
            $keys[24] => $this->getDefaultevaluation(),
            $keys[25] => $this->getToepicrisis(),
            $keys[26] => $this->getMandatory(),
            $keys[27] => $this->getReadonly(),
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
        $pos = ActionpropertytypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setActiontypeId($value);
                break;
            case 3:
                $this->setIdx($value);
                break;
            case 4:
                $this->setTemplateId($value);
                break;
            case 5:
                $this->setName($value);
                break;
            case 6:
                $this->setDescr($value);
                break;
            case 7:
                $this->setUnitId($value);
                break;
            case 8:
                $this->setTypename($value);
                break;
            case 9:
                $this->setValuedomain($value);
                break;
            case 10:
                $this->setDefaultvalue($value);
                break;
            case 11:
                $this->setCode($value);
                break;
            case 12:
                $this->setIsvector($value);
                break;
            case 13:
                $this->setNorm($value);
                break;
            case 14:
                $this->setSex($value);
                break;
            case 15:
                $this->setAge($value);
                break;
            case 16:
                $this->setAgeBu($value);
                break;
            case 17:
                $this->setAgeBc($value);
                break;
            case 18:
                $this->setAgeEu($value);
                break;
            case 19:
                $this->setAgeEc($value);
                break;
            case 20:
                $this->setPenalty($value);
                break;
            case 21:
                $this->setVisibleinjobticket($value);
                break;
            case 22:
                $this->setIsassignable($value);
                break;
            case 23:
                $this->setTestId($value);
                break;
            case 24:
                $this->setDefaultevaluation($value);
                break;
            case 25:
                $this->setToepicrisis($value);
                break;
            case 26:
                $this->setMandatory($value);
                break;
            case 27:
                $this->setReadonly($value);
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
        $keys = ActionpropertytypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeleted($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setActiontypeId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIdx($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTemplateId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setName($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDescr($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUnitId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTypename($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setValuedomain($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setDefaultvalue($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCode($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIsvector($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNorm($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setSex($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAge($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAgeBu($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setAgeBc($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setAgeEu($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setAgeEc($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setPenalty($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setVisibleinjobticket($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setIsassignable($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setTestId($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setDefaultevaluation($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setToepicrisis($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setMandatory($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setReadonly($arr[$keys[27]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ActionpropertytypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ActionpropertytypePeer::ID)) $criteria->add(ActionpropertytypePeer::ID, $this->id);
        if ($this->isColumnModified(ActionpropertytypePeer::DELETED)) $criteria->add(ActionpropertytypePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ActionpropertytypePeer::ACTIONTYPE_ID)) $criteria->add(ActionpropertytypePeer::ACTIONTYPE_ID, $this->actiontype_id);
        if ($this->isColumnModified(ActionpropertytypePeer::IDX)) $criteria->add(ActionpropertytypePeer::IDX, $this->idx);
        if ($this->isColumnModified(ActionpropertytypePeer::TEMPLATE_ID)) $criteria->add(ActionpropertytypePeer::TEMPLATE_ID, $this->template_id);
        if ($this->isColumnModified(ActionpropertytypePeer::NAME)) $criteria->add(ActionpropertytypePeer::NAME, $this->name);
        if ($this->isColumnModified(ActionpropertytypePeer::DESCR)) $criteria->add(ActionpropertytypePeer::DESCR, $this->descr);
        if ($this->isColumnModified(ActionpropertytypePeer::UNIT_ID)) $criteria->add(ActionpropertytypePeer::UNIT_ID, $this->unit_id);
        if ($this->isColumnModified(ActionpropertytypePeer::TYPENAME)) $criteria->add(ActionpropertytypePeer::TYPENAME, $this->typename);
        if ($this->isColumnModified(ActionpropertytypePeer::VALUEDOMAIN)) $criteria->add(ActionpropertytypePeer::VALUEDOMAIN, $this->valuedomain);
        if ($this->isColumnModified(ActionpropertytypePeer::DEFAULTVALUE)) $criteria->add(ActionpropertytypePeer::DEFAULTVALUE, $this->defaultvalue);
        if ($this->isColumnModified(ActionpropertytypePeer::CODE)) $criteria->add(ActionpropertytypePeer::CODE, $this->code);
        if ($this->isColumnModified(ActionpropertytypePeer::ISVECTOR)) $criteria->add(ActionpropertytypePeer::ISVECTOR, $this->isvector);
        if ($this->isColumnModified(ActionpropertytypePeer::NORM)) $criteria->add(ActionpropertytypePeer::NORM, $this->norm);
        if ($this->isColumnModified(ActionpropertytypePeer::SEX)) $criteria->add(ActionpropertytypePeer::SEX, $this->sex);
        if ($this->isColumnModified(ActionpropertytypePeer::AGE)) $criteria->add(ActionpropertytypePeer::AGE, $this->age);
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_BU)) $criteria->add(ActionpropertytypePeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_BC)) $criteria->add(ActionpropertytypePeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_EU)) $criteria->add(ActionpropertytypePeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(ActionpropertytypePeer::AGE_EC)) $criteria->add(ActionpropertytypePeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(ActionpropertytypePeer::PENALTY)) $criteria->add(ActionpropertytypePeer::PENALTY, $this->penalty);
        if ($this->isColumnModified(ActionpropertytypePeer::VISIBLEINJOBTICKET)) $criteria->add(ActionpropertytypePeer::VISIBLEINJOBTICKET, $this->visibleinjobticket);
        if ($this->isColumnModified(ActionpropertytypePeer::ISASSIGNABLE)) $criteria->add(ActionpropertytypePeer::ISASSIGNABLE, $this->isassignable);
        if ($this->isColumnModified(ActionpropertytypePeer::TEST_ID)) $criteria->add(ActionpropertytypePeer::TEST_ID, $this->test_id);
        if ($this->isColumnModified(ActionpropertytypePeer::DEFAULTEVALUATION)) $criteria->add(ActionpropertytypePeer::DEFAULTEVALUATION, $this->defaultevaluation);
        if ($this->isColumnModified(ActionpropertytypePeer::TOEPICRISIS)) $criteria->add(ActionpropertytypePeer::TOEPICRISIS, $this->toepicrisis);
        if ($this->isColumnModified(ActionpropertytypePeer::MANDATORY)) $criteria->add(ActionpropertytypePeer::MANDATORY, $this->mandatory);
        if ($this->isColumnModified(ActionpropertytypePeer::READONLY)) $criteria->add(ActionpropertytypePeer::READONLY, $this->readonly);

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
        $criteria = new Criteria(ActionpropertytypePeer::DATABASE_NAME);
        $criteria->add(ActionpropertytypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Actionpropertytype (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setActiontypeId($this->getActiontypeId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setTemplateId($this->getTemplateId());
        $copyObj->setName($this->getName());
        $copyObj->setDescr($this->getDescr());
        $copyObj->setUnitId($this->getUnitId());
        $copyObj->setTypename($this->getTypename());
        $copyObj->setValuedomain($this->getValuedomain());
        $copyObj->setDefaultvalue($this->getDefaultvalue());
        $copyObj->setCode($this->getCode());
        $copyObj->setIsvector($this->getIsvector());
        $copyObj->setNorm($this->getNorm());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setPenalty($this->getPenalty());
        $copyObj->setVisibleinjobticket($this->getVisibleinjobticket());
        $copyObj->setIsassignable($this->getIsassignable());
        $copyObj->setTestId($this->getTestId());
        $copyObj->setDefaultevaluation($this->getDefaultevaluation());
        $copyObj->setToepicrisis($this->getToepicrisis());
        $copyObj->setMandatory($this->getMandatory());
        $copyObj->setReadonly($this->getReadonly());
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
     * @return Actionpropertytype Clone of current object.
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
     * @return ActionpropertytypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ActionpropertytypePeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->deleted = null;
        $this->actiontype_id = null;
        $this->idx = null;
        $this->template_id = null;
        $this->name = null;
        $this->descr = null;
        $this->unit_id = null;
        $this->typename = null;
        $this->valuedomain = null;
        $this->defaultvalue = null;
        $this->code = null;
        $this->isvector = null;
        $this->norm = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->penalty = null;
        $this->visibleinjobticket = null;
        $this->isassignable = null;
        $this->test_id = null;
        $this->defaultevaluation = null;
        $this->toepicrisis = null;
        $this->mandatory = null;
        $this->readonly = null;
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
        return (string) $this->exportTo(ActionpropertytypePeer::DEFAULT_STRING_FORMAT);
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
