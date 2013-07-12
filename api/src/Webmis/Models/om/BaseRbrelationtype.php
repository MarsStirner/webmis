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
use Webmis\Models\Rbrelationtype;
use Webmis\Models\RbrelationtypePeer;
use Webmis\Models\RbrelationtypeQuery;

/**
 * Base class that represents a row from the 'rbRelationType' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbrelationtype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbrelationtypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbrelationtypePeer
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
     * The value for the leftname field.
     * @var        string
     */
    protected $leftname;

    /**
     * The value for the rightname field.
     * @var        string
     */
    protected $rightname;

    /**
     * The value for the isdirectgenetic field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isdirectgenetic;

    /**
     * The value for the isbackwardgenetic field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isbackwardgenetic;

    /**
     * The value for the isdirectrepresentative field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isdirectrepresentative;

    /**
     * The value for the isbackwardrepresentative field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isbackwardrepresentative;

    /**
     * The value for the isdirectepidemic field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isdirectepidemic;

    /**
     * The value for the isbackwardepidemic field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isbackwardepidemic;

    /**
     * The value for the isdirectdonation field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isdirectdonation;

    /**
     * The value for the isbackwarddonation field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isbackwarddonation;

    /**
     * The value for the leftsex field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $leftsex;

    /**
     * The value for the rightsex field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $rightsex;

    /**
     * The value for the regionalcode field.
     * @var        string
     */
    protected $regionalcode;

    /**
     * The value for the regionalreversecode field.
     * @var        string
     */
    protected $regionalreversecode;

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
        $this->isdirectgenetic = false;
        $this->isbackwardgenetic = false;
        $this->isdirectrepresentative = false;
        $this->isbackwardrepresentative = false;
        $this->isdirectepidemic = false;
        $this->isbackwardepidemic = false;
        $this->isdirectdonation = false;
        $this->isbackwarddonation = false;
        $this->leftsex = false;
        $this->rightsex = false;
    }

    /**
     * Initializes internal state of BaseRbrelationtype object.
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
     * Get the [leftname] column value.
     *
     * @return string
     */
    public function getLeftname()
    {
        return $this->leftname;
    }

    /**
     * Get the [rightname] column value.
     *
     * @return string
     */
    public function getRightname()
    {
        return $this->rightname;
    }

    /**
     * Get the [isdirectgenetic] column value.
     *
     * @return boolean
     */
    public function getIsdirectgenetic()
    {
        return $this->isdirectgenetic;
    }

    /**
     * Get the [isbackwardgenetic] column value.
     *
     * @return boolean
     */
    public function getIsbackwardgenetic()
    {
        return $this->isbackwardgenetic;
    }

    /**
     * Get the [isdirectrepresentative] column value.
     *
     * @return boolean
     */
    public function getIsdirectrepresentative()
    {
        return $this->isdirectrepresentative;
    }

    /**
     * Get the [isbackwardrepresentative] column value.
     *
     * @return boolean
     */
    public function getIsbackwardrepresentative()
    {
        return $this->isbackwardrepresentative;
    }

    /**
     * Get the [isdirectepidemic] column value.
     *
     * @return boolean
     */
    public function getIsdirectepidemic()
    {
        return $this->isdirectepidemic;
    }

    /**
     * Get the [isbackwardepidemic] column value.
     *
     * @return boolean
     */
    public function getIsbackwardepidemic()
    {
        return $this->isbackwardepidemic;
    }

    /**
     * Get the [isdirectdonation] column value.
     *
     * @return boolean
     */
    public function getIsdirectdonation()
    {
        return $this->isdirectdonation;
    }

    /**
     * Get the [isbackwarddonation] column value.
     *
     * @return boolean
     */
    public function getIsbackwarddonation()
    {
        return $this->isbackwarddonation;
    }

    /**
     * Get the [leftsex] column value.
     *
     * @return boolean
     */
    public function getLeftsex()
    {
        return $this->leftsex;
    }

    /**
     * Get the [rightsex] column value.
     *
     * @return boolean
     */
    public function getRightsex()
    {
        return $this->rightsex;
    }

    /**
     * Get the [regionalcode] column value.
     *
     * @return string
     */
    public function getRegionalcode()
    {
        return $this->regionalcode;
    }

    /**
     * Get the [regionalreversecode] column value.
     *
     * @return string
     */
    public function getRegionalreversecode()
    {
        return $this->regionalreversecode;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [leftname] column.
     *
     * @param string $v new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setLeftname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->leftname !== $v) {
            $this->leftname = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::LEFTNAME;
        }


        return $this;
    } // setLeftname()

    /**
     * Set the value of [rightname] column.
     *
     * @param string $v new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setRightname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rightname !== $v) {
            $this->rightname = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::RIGHTNAME;
        }


        return $this;
    } // setRightname()

    /**
     * Sets the value of the [isdirectgenetic] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsdirectgenetic($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isdirectgenetic !== $v) {
            $this->isdirectgenetic = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISDIRECTGENETIC;
        }


        return $this;
    } // setIsdirectgenetic()

    /**
     * Sets the value of the [isbackwardgenetic] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsbackwardgenetic($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isbackwardgenetic !== $v) {
            $this->isbackwardgenetic = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISBACKWARDGENETIC;
        }


        return $this;
    } // setIsbackwardgenetic()

    /**
     * Sets the value of the [isdirectrepresentative] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsdirectrepresentative($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isdirectrepresentative !== $v) {
            $this->isdirectrepresentative = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISDIRECTREPRESENTATIVE;
        }


        return $this;
    } // setIsdirectrepresentative()

    /**
     * Sets the value of the [isbackwardrepresentative] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsbackwardrepresentative($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isbackwardrepresentative !== $v) {
            $this->isbackwardrepresentative = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISBACKWARDREPRESENTATIVE;
        }


        return $this;
    } // setIsbackwardrepresentative()

    /**
     * Sets the value of the [isdirectepidemic] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsdirectepidemic($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isdirectepidemic !== $v) {
            $this->isdirectepidemic = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISDIRECTEPIDEMIC;
        }


        return $this;
    } // setIsdirectepidemic()

    /**
     * Sets the value of the [isbackwardepidemic] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsbackwardepidemic($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isbackwardepidemic !== $v) {
            $this->isbackwardepidemic = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISBACKWARDEPIDEMIC;
        }


        return $this;
    } // setIsbackwardepidemic()

    /**
     * Sets the value of the [isdirectdonation] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsdirectdonation($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isdirectdonation !== $v) {
            $this->isdirectdonation = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISDIRECTDONATION;
        }


        return $this;
    } // setIsdirectdonation()

    /**
     * Sets the value of the [isbackwarddonation] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setIsbackwarddonation($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isbackwarddonation !== $v) {
            $this->isbackwarddonation = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::ISBACKWARDDONATION;
        }


        return $this;
    } // setIsbackwarddonation()

    /**
     * Sets the value of the [leftsex] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setLeftsex($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->leftsex !== $v) {
            $this->leftsex = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::LEFTSEX;
        }


        return $this;
    } // setLeftsex()

    /**
     * Sets the value of the [rightsex] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setRightsex($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->rightsex !== $v) {
            $this->rightsex = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::RIGHTSEX;
        }


        return $this;
    } // setRightsex()

    /**
     * Set the value of [regionalcode] column.
     *
     * @param string $v new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setRegionalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regionalcode !== $v) {
            $this->regionalcode = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::REGIONALCODE;
        }


        return $this;
    } // setRegionalcode()

    /**
     * Set the value of [regionalreversecode] column.
     *
     * @param string $v new value
     * @return Rbrelationtype The current object (for fluent API support)
     */
    public function setRegionalreversecode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regionalreversecode !== $v) {
            $this->regionalreversecode = $v;
            $this->modifiedColumns[] = RbrelationtypePeer::REGIONALREVERSECODE;
        }


        return $this;
    } // setRegionalreversecode()

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
            if ($this->isdirectgenetic !== false) {
                return false;
            }

            if ($this->isbackwardgenetic !== false) {
                return false;
            }

            if ($this->isdirectrepresentative !== false) {
                return false;
            }

            if ($this->isbackwardrepresentative !== false) {
                return false;
            }

            if ($this->isdirectepidemic !== false) {
                return false;
            }

            if ($this->isbackwardepidemic !== false) {
                return false;
            }

            if ($this->isdirectdonation !== false) {
                return false;
            }

            if ($this->isbackwarddonation !== false) {
                return false;
            }

            if ($this->leftsex !== false) {
                return false;
            }

            if ($this->rightsex !== false) {
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
            $this->leftname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->rightname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->isdirectgenetic = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->isbackwardgenetic = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
            $this->isdirectrepresentative = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->isbackwardrepresentative = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->isdirectepidemic = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->isbackwardepidemic = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->isdirectdonation = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->isbackwarddonation = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->leftsex = ($row[$startcol + 12] !== null) ? (boolean) $row[$startcol + 12] : null;
            $this->rightsex = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
            $this->regionalcode = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->regionalreversecode = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = RbrelationtypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbrelationtype object", $e);
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
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbrelationtypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbrelationtypeQuery::create()
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
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbrelationtypePeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = RbrelationtypePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbrelationtypePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbrelationtypePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::LEFTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`leftName`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::RIGHTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`rightName`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTGENETIC)) {
            $modifiedColumns[':p' . $index++]  = '`isDirectGenetic`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDGENETIC)) {
            $modifiedColumns[':p' . $index++]  = '`isBackwardGenetic`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTREPRESENTATIVE)) {
            $modifiedColumns[':p' . $index++]  = '`isDirectRepresentative`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDREPRESENTATIVE)) {
            $modifiedColumns[':p' . $index++]  = '`isBackwardRepresentative`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTEPIDEMIC)) {
            $modifiedColumns[':p' . $index++]  = '`isDirectEpidemic`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDEPIDEMIC)) {
            $modifiedColumns[':p' . $index++]  = '`isBackwardEpidemic`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTDONATION)) {
            $modifiedColumns[':p' . $index++]  = '`isDirectDonation`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDDONATION)) {
            $modifiedColumns[':p' . $index++]  = '`isBackwardDonation`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::LEFTSEX)) {
            $modifiedColumns[':p' . $index++]  = '`leftSex`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::RIGHTSEX)) {
            $modifiedColumns[':p' . $index++]  = '`rightSex`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::REGIONALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionalCode`';
        }
        if ($this->isColumnModified(RbrelationtypePeer::REGIONALREVERSECODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionalReverseCode`';
        }

        $sql = sprintf(
            'INSERT INTO `rbRelationType` (%s) VALUES (%s)',
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
                    case '`leftName`':
                        $stmt->bindValue($identifier, $this->leftname, PDO::PARAM_STR);
                        break;
                    case '`rightName`':
                        $stmt->bindValue($identifier, $this->rightname, PDO::PARAM_STR);
                        break;
                    case '`isDirectGenetic`':
                        $stmt->bindValue($identifier, (int) $this->isdirectgenetic, PDO::PARAM_INT);
                        break;
                    case '`isBackwardGenetic`':
                        $stmt->bindValue($identifier, (int) $this->isbackwardgenetic, PDO::PARAM_INT);
                        break;
                    case '`isDirectRepresentative`':
                        $stmt->bindValue($identifier, (int) $this->isdirectrepresentative, PDO::PARAM_INT);
                        break;
                    case '`isBackwardRepresentative`':
                        $stmt->bindValue($identifier, (int) $this->isbackwardrepresentative, PDO::PARAM_INT);
                        break;
                    case '`isDirectEpidemic`':
                        $stmt->bindValue($identifier, (int) $this->isdirectepidemic, PDO::PARAM_INT);
                        break;
                    case '`isBackwardEpidemic`':
                        $stmt->bindValue($identifier, (int) $this->isbackwardepidemic, PDO::PARAM_INT);
                        break;
                    case '`isDirectDonation`':
                        $stmt->bindValue($identifier, (int) $this->isdirectdonation, PDO::PARAM_INT);
                        break;
                    case '`isBackwardDonation`':
                        $stmt->bindValue($identifier, (int) $this->isbackwarddonation, PDO::PARAM_INT);
                        break;
                    case '`leftSex`':
                        $stmt->bindValue($identifier, (int) $this->leftsex, PDO::PARAM_INT);
                        break;
                    case '`rightSex`':
                        $stmt->bindValue($identifier, (int) $this->rightsex, PDO::PARAM_INT);
                        break;
                    case '`regionalCode`':
                        $stmt->bindValue($identifier, $this->regionalcode, PDO::PARAM_STR);
                        break;
                    case '`regionalReverseCode`':
                        $stmt->bindValue($identifier, $this->regionalreversecode, PDO::PARAM_STR);
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


            if (($retval = RbrelationtypePeer::doValidate($this, $columns)) !== true) {
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
        $pos = RbrelationtypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getLeftname();
                break;
            case 3:
                return $this->getRightname();
                break;
            case 4:
                return $this->getIsdirectgenetic();
                break;
            case 5:
                return $this->getIsbackwardgenetic();
                break;
            case 6:
                return $this->getIsdirectrepresentative();
                break;
            case 7:
                return $this->getIsbackwardrepresentative();
                break;
            case 8:
                return $this->getIsdirectepidemic();
                break;
            case 9:
                return $this->getIsbackwardepidemic();
                break;
            case 10:
                return $this->getIsdirectdonation();
                break;
            case 11:
                return $this->getIsbackwarddonation();
                break;
            case 12:
                return $this->getLeftsex();
                break;
            case 13:
                return $this->getRightsex();
                break;
            case 14:
                return $this->getRegionalcode();
                break;
            case 15:
                return $this->getRegionalreversecode();
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
        if (isset($alreadyDumpedObjects['Rbrelationtype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbrelationtype'][$this->getPrimaryKey()] = true;
        $keys = RbrelationtypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getLeftname(),
            $keys[3] => $this->getRightname(),
            $keys[4] => $this->getIsdirectgenetic(),
            $keys[5] => $this->getIsbackwardgenetic(),
            $keys[6] => $this->getIsdirectrepresentative(),
            $keys[7] => $this->getIsbackwardrepresentative(),
            $keys[8] => $this->getIsdirectepidemic(),
            $keys[9] => $this->getIsbackwardepidemic(),
            $keys[10] => $this->getIsdirectdonation(),
            $keys[11] => $this->getIsbackwarddonation(),
            $keys[12] => $this->getLeftsex(),
            $keys[13] => $this->getRightsex(),
            $keys[14] => $this->getRegionalcode(),
            $keys[15] => $this->getRegionalreversecode(),
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
        $pos = RbrelationtypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setLeftname($value);
                break;
            case 3:
                $this->setRightname($value);
                break;
            case 4:
                $this->setIsdirectgenetic($value);
                break;
            case 5:
                $this->setIsbackwardgenetic($value);
                break;
            case 6:
                $this->setIsdirectrepresentative($value);
                break;
            case 7:
                $this->setIsbackwardrepresentative($value);
                break;
            case 8:
                $this->setIsdirectepidemic($value);
                break;
            case 9:
                $this->setIsbackwardepidemic($value);
                break;
            case 10:
                $this->setIsdirectdonation($value);
                break;
            case 11:
                $this->setIsbackwarddonation($value);
                break;
            case 12:
                $this->setLeftsex($value);
                break;
            case 13:
                $this->setRightsex($value);
                break;
            case 14:
                $this->setRegionalcode($value);
                break;
            case 15:
                $this->setRegionalreversecode($value);
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
        $keys = RbrelationtypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLeftname($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRightname($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIsdirectgenetic($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIsbackwardgenetic($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setIsdirectrepresentative($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsbackwardrepresentative($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIsdirectepidemic($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setIsbackwardepidemic($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIsdirectdonation($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setIsbackwarddonation($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLeftsex($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setRightsex($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setRegionalcode($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setRegionalreversecode($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbrelationtypePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbrelationtypePeer::ID)) $criteria->add(RbrelationtypePeer::ID, $this->id);
        if ($this->isColumnModified(RbrelationtypePeer::CODE)) $criteria->add(RbrelationtypePeer::CODE, $this->code);
        if ($this->isColumnModified(RbrelationtypePeer::LEFTNAME)) $criteria->add(RbrelationtypePeer::LEFTNAME, $this->leftname);
        if ($this->isColumnModified(RbrelationtypePeer::RIGHTNAME)) $criteria->add(RbrelationtypePeer::RIGHTNAME, $this->rightname);
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTGENETIC)) $criteria->add(RbrelationtypePeer::ISDIRECTGENETIC, $this->isdirectgenetic);
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDGENETIC)) $criteria->add(RbrelationtypePeer::ISBACKWARDGENETIC, $this->isbackwardgenetic);
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTREPRESENTATIVE)) $criteria->add(RbrelationtypePeer::ISDIRECTREPRESENTATIVE, $this->isdirectrepresentative);
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDREPRESENTATIVE)) $criteria->add(RbrelationtypePeer::ISBACKWARDREPRESENTATIVE, $this->isbackwardrepresentative);
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTEPIDEMIC)) $criteria->add(RbrelationtypePeer::ISDIRECTEPIDEMIC, $this->isdirectepidemic);
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDEPIDEMIC)) $criteria->add(RbrelationtypePeer::ISBACKWARDEPIDEMIC, $this->isbackwardepidemic);
        if ($this->isColumnModified(RbrelationtypePeer::ISDIRECTDONATION)) $criteria->add(RbrelationtypePeer::ISDIRECTDONATION, $this->isdirectdonation);
        if ($this->isColumnModified(RbrelationtypePeer::ISBACKWARDDONATION)) $criteria->add(RbrelationtypePeer::ISBACKWARDDONATION, $this->isbackwarddonation);
        if ($this->isColumnModified(RbrelationtypePeer::LEFTSEX)) $criteria->add(RbrelationtypePeer::LEFTSEX, $this->leftsex);
        if ($this->isColumnModified(RbrelationtypePeer::RIGHTSEX)) $criteria->add(RbrelationtypePeer::RIGHTSEX, $this->rightsex);
        if ($this->isColumnModified(RbrelationtypePeer::REGIONALCODE)) $criteria->add(RbrelationtypePeer::REGIONALCODE, $this->regionalcode);
        if ($this->isColumnModified(RbrelationtypePeer::REGIONALREVERSECODE)) $criteria->add(RbrelationtypePeer::REGIONALREVERSECODE, $this->regionalreversecode);

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
        $criteria = new Criteria(RbrelationtypePeer::DATABASE_NAME);
        $criteria->add(RbrelationtypePeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbrelationtype (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setLeftname($this->getLeftname());
        $copyObj->setRightname($this->getRightname());
        $copyObj->setIsdirectgenetic($this->getIsdirectgenetic());
        $copyObj->setIsbackwardgenetic($this->getIsbackwardgenetic());
        $copyObj->setIsdirectrepresentative($this->getIsdirectrepresentative());
        $copyObj->setIsbackwardrepresentative($this->getIsbackwardrepresentative());
        $copyObj->setIsdirectepidemic($this->getIsdirectepidemic());
        $copyObj->setIsbackwardepidemic($this->getIsbackwardepidemic());
        $copyObj->setIsdirectdonation($this->getIsdirectdonation());
        $copyObj->setIsbackwarddonation($this->getIsbackwarddonation());
        $copyObj->setLeftsex($this->getLeftsex());
        $copyObj->setRightsex($this->getRightsex());
        $copyObj->setRegionalcode($this->getRegionalcode());
        $copyObj->setRegionalreversecode($this->getRegionalreversecode());
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
     * @return Rbrelationtype Clone of current object.
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
     * @return RbrelationtypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbrelationtypePeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->leftname = null;
        $this->rightname = null;
        $this->isdirectgenetic = null;
        $this->isbackwardgenetic = null;
        $this->isdirectrepresentative = null;
        $this->isbackwardrepresentative = null;
        $this->isdirectepidemic = null;
        $this->isbackwardepidemic = null;
        $this->isdirectdonation = null;
        $this->isbackwarddonation = null;
        $this->leftsex = null;
        $this->rightsex = null;
        $this->regionalcode = null;
        $this->regionalreversecode = null;
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
        return (string) $this->exportTo(RbrelationtypePeer::DEFAULT_STRING_FORMAT);
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
