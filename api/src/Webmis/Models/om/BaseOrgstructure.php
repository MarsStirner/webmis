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
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\BlankactionsMovingQuery;
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureDisabledattendance;
use Webmis\Models\OrgstructureDisabledattendanceQuery;
use Webmis\Models\OrgstructurePeer;
use Webmis\Models\OrgstructureQuery;
use Webmis\Models\OrgstructureStock;
use Webmis\Models\OrgstructureStockQuery;
use Webmis\Models\Stockmotion;
use Webmis\Models\StockmotionQuery;
use Webmis\Models\Stockrequisition;
use Webmis\Models\StockrequisitionQuery;
use Webmis\Models\Stocktrans;
use Webmis\Models\StocktransQuery;

/**
 * Base class that represents a row from the 'OrgStructure' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructure extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\OrgstructurePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        OrgstructurePeer
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
     * The value for the organisation_id field.
     * @var        int
     */
    protected $organisation_id;

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
     * The value for the parent_id field.
     * @var        int
     */
    protected $parent_id;

    /**
     * The value for the type field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $type;

    /**
     * The value for the net_id field.
     * @var        int
     */
    protected $net_id;

    /**
     * The value for the isarea field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $isarea;

    /**
     * The value for the hashospitalbeds field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $hashospitalbeds;

    /**
     * The value for the hasstocks field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $hasstocks;

    /**
     * The value for the infiscode field.
     * @var        string
     */
    protected $infiscode;

    /**
     * The value for the infisinternalcode field.
     * @var        string
     */
    protected $infisinternalcode;

    /**
     * The value for the infisdeptypecode field.
     * @var        string
     */
    protected $infisdeptypecode;

    /**
     * The value for the infistariffcode field.
     * @var        string
     */
    protected $infistariffcode;

    /**
     * The value for the availableforexternal field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $availableforexternal;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the inheriteventtypes field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $inheriteventtypes;

    /**
     * The value for the inheritactiontypes field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $inheritactiontypes;

    /**
     * The value for the inheritgaps field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $inheritgaps;

    /**
     * The value for the uuid_id field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $uuid_id;

    /**
     * The value for the show field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $show;

    /**
     * @var        PropelObjectCollection|BlankactionsMoving[] Collection to store aggregation of BlankactionsMoving objects.
     */
    protected $collBlankactionsMovings;
    protected $collBlankactionsMovingsPartial;

    /**
     * @var        PropelObjectCollection|OrgstructureDisabledattendance[] Collection to store aggregation of OrgstructureDisabledattendance objects.
     */
    protected $collOrgstructureDisabledattendances;
    protected $collOrgstructureDisabledattendancesPartial;

    /**
     * @var        PropelObjectCollection|OrgstructureStock[] Collection to store aggregation of OrgstructureStock objects.
     */
    protected $collOrgstructureStocks;
    protected $collOrgstructureStocksPartial;

    /**
     * @var        PropelObjectCollection|Stockmotion[] Collection to store aggregation of Stockmotion objects.
     */
    protected $collStockmotionsRelatedByReceiverId;
    protected $collStockmotionsRelatedByReceiverIdPartial;

    /**
     * @var        PropelObjectCollection|Stockmotion[] Collection to store aggregation of Stockmotion objects.
     */
    protected $collStockmotionsRelatedBySupplierId;
    protected $collStockmotionsRelatedBySupplierIdPartial;

    /**
     * @var        PropelObjectCollection|Stockrequisition[] Collection to store aggregation of Stockrequisition objects.
     */
    protected $collStockrequisitionsRelatedByRecipientId;
    protected $collStockrequisitionsRelatedByRecipientIdPartial;

    /**
     * @var        PropelObjectCollection|Stockrequisition[] Collection to store aggregation of Stockrequisition objects.
     */
    protected $collStockrequisitionsRelatedBySupplierId;
    protected $collStockrequisitionsRelatedBySupplierIdPartial;

    /**
     * @var        PropelObjectCollection|Stocktrans[] Collection to store aggregation of Stocktrans objects.
     */
    protected $collStocktranssRelatedByCreorgstructureId;
    protected $collStocktranssRelatedByCreorgstructureIdPartial;

    /**
     * @var        PropelObjectCollection|Stocktrans[] Collection to store aggregation of Stocktrans objects.
     */
    protected $collStocktranssRelatedByDeborgstructureId;
    protected $collStocktranssRelatedByDeborgstructureIdPartial;

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
    protected $blankactionsMovingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orgstructureDisabledattendancesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orgstructureStocksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionsRelatedByReceiverIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionsRelatedBySupplierIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrequisitionsRelatedByRecipientIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrequisitionsRelatedBySupplierIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stocktranssRelatedByCreorgstructureIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stocktranssRelatedByDeborgstructureIdScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->type = 0;
        $this->isarea = 0;
        $this->hashospitalbeds = false;
        $this->hasstocks = false;
        $this->availableforexternal = 1;
        $this->inheriteventtypes = false;
        $this->inheritactiontypes = false;
        $this->inheritgaps = false;
        $this->uuid_id = 0;
        $this->show = 1;
    }

    /**
     * Initializes internal state of BaseOrgstructure object.
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
     * Get the [organisation_id] column value.
     *
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisation_id;
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
     * Get the [parent_id] column value.
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get the [type] column value.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
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
     * Get the [isarea] column value.
     *
     * @return int
     */
    public function getIsarea()
    {
        return $this->isarea;
    }

    /**
     * Get the [hashospitalbeds] column value.
     *
     * @return boolean
     */
    public function getHashospitalbeds()
    {
        return $this->hashospitalbeds;
    }

    /**
     * Get the [hasstocks] column value.
     *
     * @return boolean
     */
    public function getHasstocks()
    {
        return $this->hasstocks;
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
     * Get the [infisinternalcode] column value.
     *
     * @return string
     */
    public function getInfisinternalcode()
    {
        return $this->infisinternalcode;
    }

    /**
     * Get the [infisdeptypecode] column value.
     *
     * @return string
     */
    public function getInfisdeptypecode()
    {
        return $this->infisdeptypecode;
    }

    /**
     * Get the [infistariffcode] column value.
     *
     * @return string
     */
    public function getInfistariffcode()
    {
        return $this->infistariffcode;
    }

    /**
     * Get the [availableforexternal] column value.
     *
     * @return int
     */
    public function getAvailableforexternal()
    {
        return $this->availableforexternal;
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
     * Get the [inheriteventtypes] column value.
     *
     * @return boolean
     */
    public function getInheriteventtypes()
    {
        return $this->inheriteventtypes;
    }

    /**
     * Get the [inheritactiontypes] column value.
     *
     * @return boolean
     */
    public function getInheritactiontypes()
    {
        return $this->inheritactiontypes;
    }

    /**
     * Get the [inheritgaps] column value.
     *
     * @return boolean
     */
    public function getInheritgaps()
    {
        return $this->inheritgaps;
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
     * Get the [show] column value.
     *
     * @return int
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = OrgstructurePeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = OrgstructurePeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::MODIFYPERSON_ID;
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
     * @return Orgstructure The current object (for fluent API support)
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
            $this->modifiedColumns[] = OrgstructurePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [organisation_id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setOrganisationId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->organisation_id !== $v) {
            $this->organisation_id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::ORGANISATION_ID;
        }


        return $this;
    } // setOrganisationId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = OrgstructurePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = OrgstructurePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [parent_id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setParentId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->parent_id !== $v) {
            $this->parent_id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::PARENT_ID;
        }


        return $this;
    } // setParentId()

    /**
     * Set the value of [type] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = OrgstructurePeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [net_id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setNetId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->net_id !== $v) {
            $this->net_id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::NET_ID;
        }


        return $this;
    } // setNetId()

    /**
     * Set the value of [isarea] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setIsarea($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->isarea !== $v) {
            $this->isarea = $v;
            $this->modifiedColumns[] = OrgstructurePeer::ISAREA;
        }


        return $this;
    } // setIsarea()

    /**
     * Sets the value of the [hashospitalbeds] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setHashospitalbeds($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->hashospitalbeds !== $v) {
            $this->hashospitalbeds = $v;
            $this->modifiedColumns[] = OrgstructurePeer::HASHOSPITALBEDS;
        }


        return $this;
    } // setHashospitalbeds()

    /**
     * Sets the value of the [hasstocks] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setHasstocks($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->hasstocks !== $v) {
            $this->hasstocks = $v;
            $this->modifiedColumns[] = OrgstructurePeer::HASSTOCKS;
        }


        return $this;
    } // setHasstocks()

    /**
     * Set the value of [infiscode] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInfiscode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->infiscode !== $v) {
            $this->infiscode = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INFISCODE;
        }


        return $this;
    } // setInfiscode()

    /**
     * Set the value of [infisinternalcode] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInfisinternalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->infisinternalcode !== $v) {
            $this->infisinternalcode = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INFISINTERNALCODE;
        }


        return $this;
    } // setInfisinternalcode()

    /**
     * Set the value of [infisdeptypecode] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInfisdeptypecode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->infisdeptypecode !== $v) {
            $this->infisdeptypecode = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INFISDEPTYPECODE;
        }


        return $this;
    } // setInfisdeptypecode()

    /**
     * Set the value of [infistariffcode] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInfistariffcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->infistariffcode !== $v) {
            $this->infistariffcode = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INFISTARIFFCODE;
        }


        return $this;
    } // setInfistariffcode()

    /**
     * Set the value of [availableforexternal] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setAvailableforexternal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->availableforexternal !== $v) {
            $this->availableforexternal = $v;
            $this->modifiedColumns[] = OrgstructurePeer::AVAILABLEFOREXTERNAL;
        }


        return $this;
    } // setAvailableforexternal()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[] = OrgstructurePeer::ADDRESS;
        }


        return $this;
    } // setAddress()

    /**
     * Sets the value of the [inheriteventtypes] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInheriteventtypes($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->inheriteventtypes !== $v) {
            $this->inheriteventtypes = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INHERITEVENTTYPES;
        }


        return $this;
    } // setInheriteventtypes()

    /**
     * Sets the value of the [inheritactiontypes] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInheritactiontypes($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->inheritactiontypes !== $v) {
            $this->inheritactiontypes = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INHERITACTIONTYPES;
        }


        return $this;
    } // setInheritactiontypes()

    /**
     * Sets the value of the [inheritgaps] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setInheritgaps($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->inheritgaps !== $v) {
            $this->inheritgaps = $v;
            $this->modifiedColumns[] = OrgstructurePeer::INHERITGAPS;
        }


        return $this;
    } // setInheritgaps()

    /**
     * Set the value of [uuid_id] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setUuidId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->uuid_id !== $v) {
            $this->uuid_id = $v;
            $this->modifiedColumns[] = OrgstructurePeer::UUID_ID;
        }


        return $this;
    } // setUuidId()

    /**
     * Set the value of [show] column.
     *
     * @param int $v new value
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setShow($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->show !== $v) {
            $this->show = $v;
            $this->modifiedColumns[] = OrgstructurePeer::SHOW;
        }


        return $this;
    } // setShow()

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

            if ($this->type !== 0) {
                return false;
            }

            if ($this->isarea !== 0) {
                return false;
            }

            if ($this->hashospitalbeds !== false) {
                return false;
            }

            if ($this->hasstocks !== false) {
                return false;
            }

            if ($this->availableforexternal !== 1) {
                return false;
            }

            if ($this->inheriteventtypes !== false) {
                return false;
            }

            if ($this->inheritactiontypes !== false) {
                return false;
            }

            if ($this->inheritgaps !== false) {
                return false;
            }

            if ($this->uuid_id !== 0) {
                return false;
            }

            if ($this->show !== 1) {
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
            $this->organisation_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->code = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->parent_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->type = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->net_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->isarea = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->hashospitalbeds = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
            $this->hasstocks = ($row[$startcol + 14] !== null) ? (boolean) $row[$startcol + 14] : null;
            $this->infiscode = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->infisinternalcode = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->infisdeptypecode = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->infistariffcode = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->availableforexternal = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->address = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->inheriteventtypes = ($row[$startcol + 21] !== null) ? (boolean) $row[$startcol + 21] : null;
            $this->inheritactiontypes = ($row[$startcol + 22] !== null) ? (boolean) $row[$startcol + 22] : null;
            $this->inheritgaps = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
            $this->uuid_id = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->show = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 26; // 26 = OrgstructurePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Orgstructure object", $e);
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
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = OrgstructurePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collBlankactionsMovings = null;

            $this->collOrgstructureDisabledattendances = null;

            $this->collOrgstructureStocks = null;

            $this->collStockmotionsRelatedByReceiverId = null;

            $this->collStockmotionsRelatedBySupplierId = null;

            $this->collStockrequisitionsRelatedByRecipientId = null;

            $this->collStockrequisitionsRelatedBySupplierId = null;

            $this->collStocktranssRelatedByCreorgstructureId = null;

            $this->collStocktranssRelatedByDeborgstructureId = null;

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
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = OrgstructureQuery::create()
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
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                OrgstructurePeer::addInstanceToPool($this);
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

            if ($this->blankactionsMovingsScheduledForDeletion !== null) {
                if (!$this->blankactionsMovingsScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsMovingsScheduledForDeletion as $blankactionsMoving) {
                        // need to save related object because we set the relation to null
                        $blankactionsMoving->save($con);
                    }
                    $this->blankactionsMovingsScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsMovings !== null) {
                foreach ($this->collBlankactionsMovings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orgstructureDisabledattendancesScheduledForDeletion !== null) {
                if (!$this->orgstructureDisabledattendancesScheduledForDeletion->isEmpty()) {
                    OrgstructureDisabledattendanceQuery::create()
                        ->filterByPrimaryKeys($this->orgstructureDisabledattendancesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orgstructureDisabledattendancesScheduledForDeletion = null;
                }
            }

            if ($this->collOrgstructureDisabledattendances !== null) {
                foreach ($this->collOrgstructureDisabledattendances as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orgstructureStocksScheduledForDeletion !== null) {
                if (!$this->orgstructureStocksScheduledForDeletion->isEmpty()) {
                    OrgstructureStockQuery::create()
                        ->filterByPrimaryKeys($this->orgstructureStocksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orgstructureStocksScheduledForDeletion = null;
                }
            }

            if ($this->collOrgstructureStocks !== null) {
                foreach ($this->collOrgstructureStocks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionsRelatedByReceiverIdScheduledForDeletion !== null) {
                if (!$this->stockmotionsRelatedByReceiverIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionsRelatedByReceiverIdScheduledForDeletion as $stockmotionRelatedByReceiverId) {
                        // need to save related object because we set the relation to null
                        $stockmotionRelatedByReceiverId->save($con);
                    }
                    $this->stockmotionsRelatedByReceiverIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionsRelatedByReceiverId !== null) {
                foreach ($this->collStockmotionsRelatedByReceiverId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionsRelatedBySupplierIdScheduledForDeletion !== null) {
                if (!$this->stockmotionsRelatedBySupplierIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionsRelatedBySupplierIdScheduledForDeletion as $stockmotionRelatedBySupplierId) {
                        // need to save related object because we set the relation to null
                        $stockmotionRelatedBySupplierId->save($con);
                    }
                    $this->stockmotionsRelatedBySupplierIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionsRelatedBySupplierId !== null) {
                foreach ($this->collStockmotionsRelatedBySupplierId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion !== null) {
                if (!$this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion as $stockrequisitionRelatedByRecipientId) {
                        // need to save related object because we set the relation to null
                        $stockrequisitionRelatedByRecipientId->save($con);
                    }
                    $this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrequisitionsRelatedByRecipientId !== null) {
                foreach ($this->collStockrequisitionsRelatedByRecipientId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion !== null) {
                if (!$this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion as $stockrequisitionRelatedBySupplierId) {
                        // need to save related object because we set the relation to null
                        $stockrequisitionRelatedBySupplierId->save($con);
                    }
                    $this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrequisitionsRelatedBySupplierId !== null) {
                foreach ($this->collStockrequisitionsRelatedBySupplierId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion !== null) {
                if (!$this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion as $stocktransRelatedByCreorgstructureId) {
                        // need to save related object because we set the relation to null
                        $stocktransRelatedByCreorgstructureId->save($con);
                    }
                    $this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion = null;
                }
            }

            if ($this->collStocktranssRelatedByCreorgstructureId !== null) {
                foreach ($this->collStocktranssRelatedByCreorgstructureId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion !== null) {
                if (!$this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion as $stocktransRelatedByDeborgstructureId) {
                        // need to save related object because we set the relation to null
                        $stocktransRelatedByDeborgstructureId->save($con);
                    }
                    $this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion = null;
                }
            }

            if ($this->collStocktranssRelatedByDeborgstructureId !== null) {
                foreach ($this->collStocktranssRelatedByDeborgstructureId as $referrerFK) {
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

        $this->modifiedColumns[] = OrgstructurePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrgstructurePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OrgstructurePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(OrgstructurePeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(OrgstructurePeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(OrgstructurePeer::ORGANISATION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`organisation_id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(OrgstructurePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(OrgstructurePeer::PARENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`parent_id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(OrgstructurePeer::NET_ID)) {
            $modifiedColumns[':p' . $index++]  = '`net_id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::ISAREA)) {
            $modifiedColumns[':p' . $index++]  = '`isArea`';
        }
        if ($this->isColumnModified(OrgstructurePeer::HASHOSPITALBEDS)) {
            $modifiedColumns[':p' . $index++]  = '`hasHospitalBeds`';
        }
        if ($this->isColumnModified(OrgstructurePeer::HASSTOCKS)) {
            $modifiedColumns[':p' . $index++]  = '`hasStocks`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INFISCODE)) {
            $modifiedColumns[':p' . $index++]  = '`infisCode`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INFISINTERNALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`infisInternalCode`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INFISDEPTYPECODE)) {
            $modifiedColumns[':p' . $index++]  = '`infisDepTypeCode`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INFISTARIFFCODE)) {
            $modifiedColumns[':p' . $index++]  = '`infisTariffCode`';
        }
        if ($this->isColumnModified(OrgstructurePeer::AVAILABLEFOREXTERNAL)) {
            $modifiedColumns[':p' . $index++]  = '`availableForExternal`';
        }
        if ($this->isColumnModified(OrgstructurePeer::ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`Address`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INHERITEVENTTYPES)) {
            $modifiedColumns[':p' . $index++]  = '`inheritEventTypes`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INHERITACTIONTYPES)) {
            $modifiedColumns[':p' . $index++]  = '`inheritActionTypes`';
        }
        if ($this->isColumnModified(OrgstructurePeer::INHERITGAPS)) {
            $modifiedColumns[':p' . $index++]  = '`inheritGaps`';
        }
        if ($this->isColumnModified(OrgstructurePeer::UUID_ID)) {
            $modifiedColumns[':p' . $index++]  = '`uuid_id`';
        }
        if ($this->isColumnModified(OrgstructurePeer::SHOW)) {
            $modifiedColumns[':p' . $index++]  = '`show`';
        }

        $sql = sprintf(
            'INSERT INTO `OrgStructure` (%s) VALUES (%s)',
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
                    case '`organisation_id`':
                        $stmt->bindValue($identifier, $this->organisation_id, PDO::PARAM_INT);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`parent_id`':
                        $stmt->bindValue($identifier, $this->parent_id, PDO::PARAM_INT);
                        break;
                    case '`type`':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case '`net_id`':
                        $stmt->bindValue($identifier, $this->net_id, PDO::PARAM_INT);
                        break;
                    case '`isArea`':
                        $stmt->bindValue($identifier, $this->isarea, PDO::PARAM_INT);
                        break;
                    case '`hasHospitalBeds`':
                        $stmt->bindValue($identifier, (int) $this->hashospitalbeds, PDO::PARAM_INT);
                        break;
                    case '`hasStocks`':
                        $stmt->bindValue($identifier, (int) $this->hasstocks, PDO::PARAM_INT);
                        break;
                    case '`infisCode`':
                        $stmt->bindValue($identifier, $this->infiscode, PDO::PARAM_STR);
                        break;
                    case '`infisInternalCode`':
                        $stmt->bindValue($identifier, $this->infisinternalcode, PDO::PARAM_STR);
                        break;
                    case '`infisDepTypeCode`':
                        $stmt->bindValue($identifier, $this->infisdeptypecode, PDO::PARAM_STR);
                        break;
                    case '`infisTariffCode`':
                        $stmt->bindValue($identifier, $this->infistariffcode, PDO::PARAM_STR);
                        break;
                    case '`availableForExternal`':
                        $stmt->bindValue($identifier, $this->availableforexternal, PDO::PARAM_INT);
                        break;
                    case '`Address`':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case '`inheritEventTypes`':
                        $stmt->bindValue($identifier, (int) $this->inheriteventtypes, PDO::PARAM_INT);
                        break;
                    case '`inheritActionTypes`':
                        $stmt->bindValue($identifier, (int) $this->inheritactiontypes, PDO::PARAM_INT);
                        break;
                    case '`inheritGaps`':
                        $stmt->bindValue($identifier, (int) $this->inheritgaps, PDO::PARAM_INT);
                        break;
                    case '`uuid_id`':
                        $stmt->bindValue($identifier, $this->uuid_id, PDO::PARAM_INT);
                        break;
                    case '`show`':
                        $stmt->bindValue($identifier, $this->show, PDO::PARAM_INT);
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


            if (($retval = OrgstructurePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBlankactionsMovings !== null) {
                    foreach ($this->collBlankactionsMovings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrgstructureDisabledattendances !== null) {
                    foreach ($this->collOrgstructureDisabledattendances as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrgstructureStocks !== null) {
                    foreach ($this->collOrgstructureStocks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionsRelatedByReceiverId !== null) {
                    foreach ($this->collStockmotionsRelatedByReceiverId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionsRelatedBySupplierId !== null) {
                    foreach ($this->collStockmotionsRelatedBySupplierId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrequisitionsRelatedByRecipientId !== null) {
                    foreach ($this->collStockrequisitionsRelatedByRecipientId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrequisitionsRelatedBySupplierId !== null) {
                    foreach ($this->collStockrequisitionsRelatedBySupplierId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStocktranssRelatedByCreorgstructureId !== null) {
                    foreach ($this->collStocktranssRelatedByCreorgstructureId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStocktranssRelatedByDeborgstructureId !== null) {
                    foreach ($this->collStocktranssRelatedByDeborgstructureId as $referrerFK) {
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
        $pos = OrgstructurePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getOrganisationId();
                break;
            case 7:
                return $this->getCode();
                break;
            case 8:
                return $this->getName();
                break;
            case 9:
                return $this->getParentId();
                break;
            case 10:
                return $this->getType();
                break;
            case 11:
                return $this->getNetId();
                break;
            case 12:
                return $this->getIsarea();
                break;
            case 13:
                return $this->getHashospitalbeds();
                break;
            case 14:
                return $this->getHasstocks();
                break;
            case 15:
                return $this->getInfiscode();
                break;
            case 16:
                return $this->getInfisinternalcode();
                break;
            case 17:
                return $this->getInfisdeptypecode();
                break;
            case 18:
                return $this->getInfistariffcode();
                break;
            case 19:
                return $this->getAvailableforexternal();
                break;
            case 20:
                return $this->getAddress();
                break;
            case 21:
                return $this->getInheriteventtypes();
                break;
            case 22:
                return $this->getInheritactiontypes();
                break;
            case 23:
                return $this->getInheritgaps();
                break;
            case 24:
                return $this->getUuidId();
                break;
            case 25:
                return $this->getShow();
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
        if (isset($alreadyDumpedObjects['Orgstructure'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Orgstructure'][$this->getPrimaryKey()] = true;
        $keys = OrgstructurePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getOrganisationId(),
            $keys[7] => $this->getCode(),
            $keys[8] => $this->getName(),
            $keys[9] => $this->getParentId(),
            $keys[10] => $this->getType(),
            $keys[11] => $this->getNetId(),
            $keys[12] => $this->getIsarea(),
            $keys[13] => $this->getHashospitalbeds(),
            $keys[14] => $this->getHasstocks(),
            $keys[15] => $this->getInfiscode(),
            $keys[16] => $this->getInfisinternalcode(),
            $keys[17] => $this->getInfisdeptypecode(),
            $keys[18] => $this->getInfistariffcode(),
            $keys[19] => $this->getAvailableforexternal(),
            $keys[20] => $this->getAddress(),
            $keys[21] => $this->getInheriteventtypes(),
            $keys[22] => $this->getInheritactiontypes(),
            $keys[23] => $this->getInheritgaps(),
            $keys[24] => $this->getUuidId(),
            $keys[25] => $this->getShow(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collBlankactionsMovings) {
                $result['BlankactionsMovings'] = $this->collBlankactionsMovings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrgstructureDisabledattendances) {
                $result['OrgstructureDisabledattendances'] = $this->collOrgstructureDisabledattendances->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrgstructureStocks) {
                $result['OrgstructureStocks'] = $this->collOrgstructureStocks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionsRelatedByReceiverId) {
                $result['StockmotionsRelatedByReceiverId'] = $this->collStockmotionsRelatedByReceiverId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionsRelatedBySupplierId) {
                $result['StockmotionsRelatedBySupplierId'] = $this->collStockmotionsRelatedBySupplierId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrequisitionsRelatedByRecipientId) {
                $result['StockrequisitionsRelatedByRecipientId'] = $this->collStockrequisitionsRelatedByRecipientId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrequisitionsRelatedBySupplierId) {
                $result['StockrequisitionsRelatedBySupplierId'] = $this->collStockrequisitionsRelatedBySupplierId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStocktranssRelatedByCreorgstructureId) {
                $result['StocktranssRelatedByCreorgstructureId'] = $this->collStocktranssRelatedByCreorgstructureId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStocktranssRelatedByDeborgstructureId) {
                $result['StocktranssRelatedByDeborgstructureId'] = $this->collStocktranssRelatedByDeborgstructureId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = OrgstructurePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setOrganisationId($value);
                break;
            case 7:
                $this->setCode($value);
                break;
            case 8:
                $this->setName($value);
                break;
            case 9:
                $this->setParentId($value);
                break;
            case 10:
                $this->setType($value);
                break;
            case 11:
                $this->setNetId($value);
                break;
            case 12:
                $this->setIsarea($value);
                break;
            case 13:
                $this->setHashospitalbeds($value);
                break;
            case 14:
                $this->setHasstocks($value);
                break;
            case 15:
                $this->setInfiscode($value);
                break;
            case 16:
                $this->setInfisinternalcode($value);
                break;
            case 17:
                $this->setInfisdeptypecode($value);
                break;
            case 18:
                $this->setInfistariffcode($value);
                break;
            case 19:
                $this->setAvailableforexternal($value);
                break;
            case 20:
                $this->setAddress($value);
                break;
            case 21:
                $this->setInheriteventtypes($value);
                break;
            case 22:
                $this->setInheritactiontypes($value);
                break;
            case 23:
                $this->setInheritgaps($value);
                break;
            case 24:
                $this->setUuidId($value);
                break;
            case 25:
                $this->setShow($value);
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
        $keys = OrgstructurePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setOrganisationId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCode($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setName($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setParentId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setType($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNetId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIsarea($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setHashospitalbeds($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setHasstocks($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setInfiscode($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setInfisinternalcode($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setInfisdeptypecode($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setInfistariffcode($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setAvailableforexternal($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setAddress($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setInheriteventtypes($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setInheritactiontypes($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setInheritgaps($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setUuidId($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setShow($arr[$keys[25]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OrgstructurePeer::DATABASE_NAME);

        if ($this->isColumnModified(OrgstructurePeer::ID)) $criteria->add(OrgstructurePeer::ID, $this->id);
        if ($this->isColumnModified(OrgstructurePeer::CREATEDATETIME)) $criteria->add(OrgstructurePeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(OrgstructurePeer::CREATEPERSON_ID)) $criteria->add(OrgstructurePeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(OrgstructurePeer::MODIFYDATETIME)) $criteria->add(OrgstructurePeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(OrgstructurePeer::MODIFYPERSON_ID)) $criteria->add(OrgstructurePeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(OrgstructurePeer::DELETED)) $criteria->add(OrgstructurePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(OrgstructurePeer::ORGANISATION_ID)) $criteria->add(OrgstructurePeer::ORGANISATION_ID, $this->organisation_id);
        if ($this->isColumnModified(OrgstructurePeer::CODE)) $criteria->add(OrgstructurePeer::CODE, $this->code);
        if ($this->isColumnModified(OrgstructurePeer::NAME)) $criteria->add(OrgstructurePeer::NAME, $this->name);
        if ($this->isColumnModified(OrgstructurePeer::PARENT_ID)) $criteria->add(OrgstructurePeer::PARENT_ID, $this->parent_id);
        if ($this->isColumnModified(OrgstructurePeer::TYPE)) $criteria->add(OrgstructurePeer::TYPE, $this->type);
        if ($this->isColumnModified(OrgstructurePeer::NET_ID)) $criteria->add(OrgstructurePeer::NET_ID, $this->net_id);
        if ($this->isColumnModified(OrgstructurePeer::ISAREA)) $criteria->add(OrgstructurePeer::ISAREA, $this->isarea);
        if ($this->isColumnModified(OrgstructurePeer::HASHOSPITALBEDS)) $criteria->add(OrgstructurePeer::HASHOSPITALBEDS, $this->hashospitalbeds);
        if ($this->isColumnModified(OrgstructurePeer::HASSTOCKS)) $criteria->add(OrgstructurePeer::HASSTOCKS, $this->hasstocks);
        if ($this->isColumnModified(OrgstructurePeer::INFISCODE)) $criteria->add(OrgstructurePeer::INFISCODE, $this->infiscode);
        if ($this->isColumnModified(OrgstructurePeer::INFISINTERNALCODE)) $criteria->add(OrgstructurePeer::INFISINTERNALCODE, $this->infisinternalcode);
        if ($this->isColumnModified(OrgstructurePeer::INFISDEPTYPECODE)) $criteria->add(OrgstructurePeer::INFISDEPTYPECODE, $this->infisdeptypecode);
        if ($this->isColumnModified(OrgstructurePeer::INFISTARIFFCODE)) $criteria->add(OrgstructurePeer::INFISTARIFFCODE, $this->infistariffcode);
        if ($this->isColumnModified(OrgstructurePeer::AVAILABLEFOREXTERNAL)) $criteria->add(OrgstructurePeer::AVAILABLEFOREXTERNAL, $this->availableforexternal);
        if ($this->isColumnModified(OrgstructurePeer::ADDRESS)) $criteria->add(OrgstructurePeer::ADDRESS, $this->address);
        if ($this->isColumnModified(OrgstructurePeer::INHERITEVENTTYPES)) $criteria->add(OrgstructurePeer::INHERITEVENTTYPES, $this->inheriteventtypes);
        if ($this->isColumnModified(OrgstructurePeer::INHERITACTIONTYPES)) $criteria->add(OrgstructurePeer::INHERITACTIONTYPES, $this->inheritactiontypes);
        if ($this->isColumnModified(OrgstructurePeer::INHERITGAPS)) $criteria->add(OrgstructurePeer::INHERITGAPS, $this->inheritgaps);
        if ($this->isColumnModified(OrgstructurePeer::UUID_ID)) $criteria->add(OrgstructurePeer::UUID_ID, $this->uuid_id);
        if ($this->isColumnModified(OrgstructurePeer::SHOW)) $criteria->add(OrgstructurePeer::SHOW, $this->show);

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
        $criteria = new Criteria(OrgstructurePeer::DATABASE_NAME);
        $criteria->add(OrgstructurePeer::ID, $this->id);

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
     * @param object $copyObj An object of Orgstructure (or compatible) type.
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
        $copyObj->setOrganisationId($this->getOrganisationId());
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setParentId($this->getParentId());
        $copyObj->setType($this->getType());
        $copyObj->setNetId($this->getNetId());
        $copyObj->setIsarea($this->getIsarea());
        $copyObj->setHashospitalbeds($this->getHashospitalbeds());
        $copyObj->setHasstocks($this->getHasstocks());
        $copyObj->setInfiscode($this->getInfiscode());
        $copyObj->setInfisinternalcode($this->getInfisinternalcode());
        $copyObj->setInfisdeptypecode($this->getInfisdeptypecode());
        $copyObj->setInfistariffcode($this->getInfistariffcode());
        $copyObj->setAvailableforexternal($this->getAvailableforexternal());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setInheriteventtypes($this->getInheriteventtypes());
        $copyObj->setInheritactiontypes($this->getInheritactiontypes());
        $copyObj->setInheritgaps($this->getInheritgaps());
        $copyObj->setUuidId($this->getUuidId());
        $copyObj->setShow($this->getShow());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBlankactionsMovings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsMoving($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrgstructureDisabledattendances() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrgstructureDisabledattendance($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrgstructureStocks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrgstructureStock($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionsRelatedByReceiverId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionRelatedByReceiverId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionsRelatedBySupplierId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionRelatedBySupplierId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrequisitionsRelatedByRecipientId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrequisitionRelatedByRecipientId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrequisitionsRelatedBySupplierId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrequisitionRelatedBySupplierId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStocktranssRelatedByCreorgstructureId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStocktransRelatedByCreorgstructureId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStocktranssRelatedByDeborgstructureId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStocktransRelatedByDeborgstructureId($relObj->copy($deepCopy));
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
     * @return Orgstructure Clone of current object.
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
     * @return OrgstructurePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new OrgstructurePeer();
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
        if ('BlankactionsMoving' == $relationName) {
            $this->initBlankactionsMovings();
        }
        if ('OrgstructureDisabledattendance' == $relationName) {
            $this->initOrgstructureDisabledattendances();
        }
        if ('OrgstructureStock' == $relationName) {
            $this->initOrgstructureStocks();
        }
        if ('StockmotionRelatedByReceiverId' == $relationName) {
            $this->initStockmotionsRelatedByReceiverId();
        }
        if ('StockmotionRelatedBySupplierId' == $relationName) {
            $this->initStockmotionsRelatedBySupplierId();
        }
        if ('StockrequisitionRelatedByRecipientId' == $relationName) {
            $this->initStockrequisitionsRelatedByRecipientId();
        }
        if ('StockrequisitionRelatedBySupplierId' == $relationName) {
            $this->initStockrequisitionsRelatedBySupplierId();
        }
        if ('StocktransRelatedByCreorgstructureId' == $relationName) {
            $this->initStocktranssRelatedByCreorgstructureId();
        }
        if ('StocktransRelatedByDeborgstructureId' == $relationName) {
            $this->initStocktranssRelatedByDeborgstructureId();
        }
    }

    /**
     * Clears out the collBlankactionsMovings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addBlankactionsMovings()
     */
    public function clearBlankactionsMovings()
    {
        $this->collBlankactionsMovings = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsMovingsPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsMovings collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsMovings($v = true)
    {
        $this->collBlankactionsMovingsPartial = $v;
    }

    /**
     * Initializes the collBlankactionsMovings collection.
     *
     * By default this just sets the collBlankactionsMovings collection to an empty array (like clearcollBlankactionsMovings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsMovings($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsMovings && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsMovings = new PropelObjectCollection();
        $this->collBlankactionsMovings->setModel('BlankactionsMoving');
    }

    /**
     * Gets an array of BlankactionsMoving objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     * @throws PropelException
     */
    public function getBlankactionsMovings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovings) {
                // return empty collection
                $this->initBlankactionsMovings();
            } else {
                $collBlankactionsMovings = BlankactionsMovingQuery::create(null, $criteria)
                    ->filterByOrgstructure($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsMovingsPartial && count($collBlankactionsMovings)) {
                      $this->initBlankactionsMovings(false);

                      foreach($collBlankactionsMovings as $obj) {
                        if (false == $this->collBlankactionsMovings->contains($obj)) {
                          $this->collBlankactionsMovings->append($obj);
                        }
                      }

                      $this->collBlankactionsMovingsPartial = true;
                    }

                    $collBlankactionsMovings->getInternalIterator()->rewind();
                    return $collBlankactionsMovings;
                }

                if($partial && $this->collBlankactionsMovings) {
                    foreach($this->collBlankactionsMovings as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsMovings[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsMovings = $collBlankactionsMovings;
                $this->collBlankactionsMovingsPartial = false;
            }
        }

        return $this->collBlankactionsMovings;
    }

    /**
     * Sets a collection of BlankactionsMoving objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsMovings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setBlankactionsMovings(PropelCollection $blankactionsMovings, PropelPDO $con = null)
    {
        $blankactionsMovingsToDelete = $this->getBlankactionsMovings(new Criteria(), $con)->diff($blankactionsMovings);

        $this->blankactionsMovingsScheduledForDeletion = unserialize(serialize($blankactionsMovingsToDelete));

        foreach ($blankactionsMovingsToDelete as $blankactionsMovingRemoved) {
            $blankactionsMovingRemoved->setOrgstructure(null);
        }

        $this->collBlankactionsMovings = null;
        foreach ($blankactionsMovings as $blankactionsMoving) {
            $this->addBlankactionsMoving($blankactionsMoving);
        }

        $this->collBlankactionsMovings = $blankactionsMovings;
        $this->collBlankactionsMovingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BlankactionsMoving objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BlankactionsMoving objects.
     * @throws PropelException
     */
    public function countBlankactionsMovings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsMovings());
            }
            $query = BlankactionsMovingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructure($this)
                ->count($con);
        }

        return count($this->collBlankactionsMovings);
    }

    /**
     * Method called to associate a BlankactionsMoving object to this object
     * through the BlankactionsMoving foreign key attribute.
     *
     * @param    BlankactionsMoving $l BlankactionsMoving
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addBlankactionsMoving(BlankactionsMoving $l)
    {
        if ($this->collBlankactionsMovings === null) {
            $this->initBlankactionsMovings();
            $this->collBlankactionsMovingsPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsMovings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsMoving($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsMoving $blankactionsMoving The blankactionsMoving object to add.
     */
    protected function doAddBlankactionsMoving($blankactionsMoving)
    {
        $this->collBlankactionsMovings[]= $blankactionsMoving;
        $blankactionsMoving->setOrgstructure($this);
    }

    /**
     * @param	BlankactionsMoving $blankactionsMoving The blankactionsMoving object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeBlankactionsMoving($blankactionsMoving)
    {
        if ($this->getBlankactionsMovings()->contains($blankactionsMoving)) {
            $this->collBlankactionsMovings->remove($this->collBlankactionsMovings->search($blankactionsMoving));
            if (null === $this->blankactionsMovingsScheduledForDeletion) {
                $this->blankactionsMovingsScheduledForDeletion = clone $this->collBlankactionsMovings;
                $this->blankactionsMovingsScheduledForDeletion->clear();
            }
            $this->blankactionsMovingsScheduledForDeletion[]= $blankactionsMoving;
            $blankactionsMoving->setOrgstructure(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinBlankactionsParty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('BlankactionsParty', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related BlankactionsMovings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsJoinPersonRelatedByPersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByPersonId', $join_behavior);

        return $this->getBlankactionsMovings($query, $con);
    }

    /**
     * Clears out the collOrgstructureDisabledattendances collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addOrgstructureDisabledattendances()
     */
    public function clearOrgstructureDisabledattendances()
    {
        $this->collOrgstructureDisabledattendances = null; // important to set this to null since that means it is uninitialized
        $this->collOrgstructureDisabledattendancesPartial = null;

        return $this;
    }

    /**
     * reset is the collOrgstructureDisabledattendances collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrgstructureDisabledattendances($v = true)
    {
        $this->collOrgstructureDisabledattendancesPartial = $v;
    }

    /**
     * Initializes the collOrgstructureDisabledattendances collection.
     *
     * By default this just sets the collOrgstructureDisabledattendances collection to an empty array (like clearcollOrgstructureDisabledattendances());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrgstructureDisabledattendances($overrideExisting = true)
    {
        if (null !== $this->collOrgstructureDisabledattendances && !$overrideExisting) {
            return;
        }
        $this->collOrgstructureDisabledattendances = new PropelObjectCollection();
        $this->collOrgstructureDisabledattendances->setModel('OrgstructureDisabledattendance');
    }

    /**
     * Gets an array of OrgstructureDisabledattendance objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|OrgstructureDisabledattendance[] List of OrgstructureDisabledattendance objects
     * @throws PropelException
     */
    public function getOrgstructureDisabledattendances($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrgstructureDisabledattendancesPartial && !$this->isNew();
        if (null === $this->collOrgstructureDisabledattendances || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrgstructureDisabledattendances) {
                // return empty collection
                $this->initOrgstructureDisabledattendances();
            } else {
                $collOrgstructureDisabledattendances = OrgstructureDisabledattendanceQuery::create(null, $criteria)
                    ->filterByOrgstructure($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrgstructureDisabledattendancesPartial && count($collOrgstructureDisabledattendances)) {
                      $this->initOrgstructureDisabledattendances(false);

                      foreach($collOrgstructureDisabledattendances as $obj) {
                        if (false == $this->collOrgstructureDisabledattendances->contains($obj)) {
                          $this->collOrgstructureDisabledattendances->append($obj);
                        }
                      }

                      $this->collOrgstructureDisabledattendancesPartial = true;
                    }

                    $collOrgstructureDisabledattendances->getInternalIterator()->rewind();
                    return $collOrgstructureDisabledattendances;
                }

                if($partial && $this->collOrgstructureDisabledattendances) {
                    foreach($this->collOrgstructureDisabledattendances as $obj) {
                        if($obj->isNew()) {
                            $collOrgstructureDisabledattendances[] = $obj;
                        }
                    }
                }

                $this->collOrgstructureDisabledattendances = $collOrgstructureDisabledattendances;
                $this->collOrgstructureDisabledattendancesPartial = false;
            }
        }

        return $this->collOrgstructureDisabledattendances;
    }

    /**
     * Sets a collection of OrgstructureDisabledattendance objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orgstructureDisabledattendances A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setOrgstructureDisabledattendances(PropelCollection $orgstructureDisabledattendances, PropelPDO $con = null)
    {
        $orgstructureDisabledattendancesToDelete = $this->getOrgstructureDisabledattendances(new Criteria(), $con)->diff($orgstructureDisabledattendances);

        $this->orgstructureDisabledattendancesScheduledForDeletion = unserialize(serialize($orgstructureDisabledattendancesToDelete));

        foreach ($orgstructureDisabledattendancesToDelete as $orgstructureDisabledattendanceRemoved) {
            $orgstructureDisabledattendanceRemoved->setOrgstructure(null);
        }

        $this->collOrgstructureDisabledattendances = null;
        foreach ($orgstructureDisabledattendances as $orgstructureDisabledattendance) {
            $this->addOrgstructureDisabledattendance($orgstructureDisabledattendance);
        }

        $this->collOrgstructureDisabledattendances = $orgstructureDisabledattendances;
        $this->collOrgstructureDisabledattendancesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related OrgstructureDisabledattendance objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related OrgstructureDisabledattendance objects.
     * @throws PropelException
     */
    public function countOrgstructureDisabledattendances(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrgstructureDisabledattendancesPartial && !$this->isNew();
        if (null === $this->collOrgstructureDisabledattendances || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrgstructureDisabledattendances) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOrgstructureDisabledattendances());
            }
            $query = OrgstructureDisabledattendanceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructure($this)
                ->count($con);
        }

        return count($this->collOrgstructureDisabledattendances);
    }

    /**
     * Method called to associate a OrgstructureDisabledattendance object to this object
     * through the OrgstructureDisabledattendance foreign key attribute.
     *
     * @param    OrgstructureDisabledattendance $l OrgstructureDisabledattendance
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addOrgstructureDisabledattendance(OrgstructureDisabledattendance $l)
    {
        if ($this->collOrgstructureDisabledattendances === null) {
            $this->initOrgstructureDisabledattendances();
            $this->collOrgstructureDisabledattendancesPartial = true;
        }
        if (!in_array($l, $this->collOrgstructureDisabledattendances->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrgstructureDisabledattendance($l);
        }

        return $this;
    }

    /**
     * @param	OrgstructureDisabledattendance $orgstructureDisabledattendance The orgstructureDisabledattendance object to add.
     */
    protected function doAddOrgstructureDisabledattendance($orgstructureDisabledattendance)
    {
        $this->collOrgstructureDisabledattendances[]= $orgstructureDisabledattendance;
        $orgstructureDisabledattendance->setOrgstructure($this);
    }

    /**
     * @param	OrgstructureDisabledattendance $orgstructureDisabledattendance The orgstructureDisabledattendance object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeOrgstructureDisabledattendance($orgstructureDisabledattendance)
    {
        if ($this->getOrgstructureDisabledattendances()->contains($orgstructureDisabledattendance)) {
            $this->collOrgstructureDisabledattendances->remove($this->collOrgstructureDisabledattendances->search($orgstructureDisabledattendance));
            if (null === $this->orgstructureDisabledattendancesScheduledForDeletion) {
                $this->orgstructureDisabledattendancesScheduledForDeletion = clone $this->collOrgstructureDisabledattendances;
                $this->orgstructureDisabledattendancesScheduledForDeletion->clear();
            }
            $this->orgstructureDisabledattendancesScheduledForDeletion[]= clone $orgstructureDisabledattendance;
            $orgstructureDisabledattendance->setOrgstructure(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related OrgstructureDisabledattendances from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|OrgstructureDisabledattendance[] List of OrgstructureDisabledattendance objects
     */
    public function getOrgstructureDisabledattendancesJoinRbattachtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrgstructureDisabledattendanceQuery::create(null, $criteria);
        $query->joinWith('Rbattachtype', $join_behavior);

        return $this->getOrgstructureDisabledattendances($query, $con);
    }

    /**
     * Clears out the collOrgstructureStocks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addOrgstructureStocks()
     */
    public function clearOrgstructureStocks()
    {
        $this->collOrgstructureStocks = null; // important to set this to null since that means it is uninitialized
        $this->collOrgstructureStocksPartial = null;

        return $this;
    }

    /**
     * reset is the collOrgstructureStocks collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrgstructureStocks($v = true)
    {
        $this->collOrgstructureStocksPartial = $v;
    }

    /**
     * Initializes the collOrgstructureStocks collection.
     *
     * By default this just sets the collOrgstructureStocks collection to an empty array (like clearcollOrgstructureStocks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrgstructureStocks($overrideExisting = true)
    {
        if (null !== $this->collOrgstructureStocks && !$overrideExisting) {
            return;
        }
        $this->collOrgstructureStocks = new PropelObjectCollection();
        $this->collOrgstructureStocks->setModel('OrgstructureStock');
    }

    /**
     * Gets an array of OrgstructureStock objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|OrgstructureStock[] List of OrgstructureStock objects
     * @throws PropelException
     */
    public function getOrgstructureStocks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrgstructureStocksPartial && !$this->isNew();
        if (null === $this->collOrgstructureStocks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrgstructureStocks) {
                // return empty collection
                $this->initOrgstructureStocks();
            } else {
                $collOrgstructureStocks = OrgstructureStockQuery::create(null, $criteria)
                    ->filterByOrgstructure($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrgstructureStocksPartial && count($collOrgstructureStocks)) {
                      $this->initOrgstructureStocks(false);

                      foreach($collOrgstructureStocks as $obj) {
                        if (false == $this->collOrgstructureStocks->contains($obj)) {
                          $this->collOrgstructureStocks->append($obj);
                        }
                      }

                      $this->collOrgstructureStocksPartial = true;
                    }

                    $collOrgstructureStocks->getInternalIterator()->rewind();
                    return $collOrgstructureStocks;
                }

                if($partial && $this->collOrgstructureStocks) {
                    foreach($this->collOrgstructureStocks as $obj) {
                        if($obj->isNew()) {
                            $collOrgstructureStocks[] = $obj;
                        }
                    }
                }

                $this->collOrgstructureStocks = $collOrgstructureStocks;
                $this->collOrgstructureStocksPartial = false;
            }
        }

        return $this->collOrgstructureStocks;
    }

    /**
     * Sets a collection of OrgstructureStock objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orgstructureStocks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setOrgstructureStocks(PropelCollection $orgstructureStocks, PropelPDO $con = null)
    {
        $orgstructureStocksToDelete = $this->getOrgstructureStocks(new Criteria(), $con)->diff($orgstructureStocks);

        $this->orgstructureStocksScheduledForDeletion = unserialize(serialize($orgstructureStocksToDelete));

        foreach ($orgstructureStocksToDelete as $orgstructureStockRemoved) {
            $orgstructureStockRemoved->setOrgstructure(null);
        }

        $this->collOrgstructureStocks = null;
        foreach ($orgstructureStocks as $orgstructureStock) {
            $this->addOrgstructureStock($orgstructureStock);
        }

        $this->collOrgstructureStocks = $orgstructureStocks;
        $this->collOrgstructureStocksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related OrgstructureStock objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related OrgstructureStock objects.
     * @throws PropelException
     */
    public function countOrgstructureStocks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrgstructureStocksPartial && !$this->isNew();
        if (null === $this->collOrgstructureStocks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrgstructureStocks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOrgstructureStocks());
            }
            $query = OrgstructureStockQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructure($this)
                ->count($con);
        }

        return count($this->collOrgstructureStocks);
    }

    /**
     * Method called to associate a OrgstructureStock object to this object
     * through the OrgstructureStock foreign key attribute.
     *
     * @param    OrgstructureStock $l OrgstructureStock
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addOrgstructureStock(OrgstructureStock $l)
    {
        if ($this->collOrgstructureStocks === null) {
            $this->initOrgstructureStocks();
            $this->collOrgstructureStocksPartial = true;
        }
        if (!in_array($l, $this->collOrgstructureStocks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrgstructureStock($l);
        }

        return $this;
    }

    /**
     * @param	OrgstructureStock $orgstructureStock The orgstructureStock object to add.
     */
    protected function doAddOrgstructureStock($orgstructureStock)
    {
        $this->collOrgstructureStocks[]= $orgstructureStock;
        $orgstructureStock->setOrgstructure($this);
    }

    /**
     * @param	OrgstructureStock $orgstructureStock The orgstructureStock object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeOrgstructureStock($orgstructureStock)
    {
        if ($this->getOrgstructureStocks()->contains($orgstructureStock)) {
            $this->collOrgstructureStocks->remove($this->collOrgstructureStocks->search($orgstructureStock));
            if (null === $this->orgstructureStocksScheduledForDeletion) {
                $this->orgstructureStocksScheduledForDeletion = clone $this->collOrgstructureStocks;
                $this->orgstructureStocksScheduledForDeletion->clear();
            }
            $this->orgstructureStocksScheduledForDeletion[]= clone $orgstructureStock;
            $orgstructureStock->setOrgstructure(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related OrgstructureStocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|OrgstructureStock[] List of OrgstructureStock objects
     */
    public function getOrgstructureStocksJoinRbfinance($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrgstructureStockQuery::create(null, $criteria);
        $query->joinWith('Rbfinance', $join_behavior);

        return $this->getOrgstructureStocks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related OrgstructureStocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|OrgstructureStock[] List of OrgstructureStock objects
     */
    public function getOrgstructureStocksJoinRbnomenclature($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrgstructureStockQuery::create(null, $criteria);
        $query->joinWith('Rbnomenclature', $join_behavior);

        return $this->getOrgstructureStocks($query, $con);
    }

    /**
     * Clears out the collStockmotionsRelatedByReceiverId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addStockmotionsRelatedByReceiverId()
     */
    public function clearStockmotionsRelatedByReceiverId()
    {
        $this->collStockmotionsRelatedByReceiverId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionsRelatedByReceiverIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionsRelatedByReceiverId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionsRelatedByReceiverId($v = true)
    {
        $this->collStockmotionsRelatedByReceiverIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionsRelatedByReceiverId collection.
     *
     * By default this just sets the collStockmotionsRelatedByReceiverId collection to an empty array (like clearcollStockmotionsRelatedByReceiverId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionsRelatedByReceiverId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionsRelatedByReceiverId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionsRelatedByReceiverId = new PropelObjectCollection();
        $this->collStockmotionsRelatedByReceiverId->setModel('Stockmotion');
    }

    /**
     * Gets an array of Stockmotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     * @throws PropelException
     */
    public function getStockmotionsRelatedByReceiverId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByReceiverIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByReceiverId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByReceiverId) {
                // return empty collection
                $this->initStockmotionsRelatedByReceiverId();
            } else {
                $collStockmotionsRelatedByReceiverId = StockmotionQuery::create(null, $criteria)
                    ->filterByOrgstructureRelatedByReceiverId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionsRelatedByReceiverIdPartial && count($collStockmotionsRelatedByReceiverId)) {
                      $this->initStockmotionsRelatedByReceiverId(false);

                      foreach($collStockmotionsRelatedByReceiverId as $obj) {
                        if (false == $this->collStockmotionsRelatedByReceiverId->contains($obj)) {
                          $this->collStockmotionsRelatedByReceiverId->append($obj);
                        }
                      }

                      $this->collStockmotionsRelatedByReceiverIdPartial = true;
                    }

                    $collStockmotionsRelatedByReceiverId->getInternalIterator()->rewind();
                    return $collStockmotionsRelatedByReceiverId;
                }

                if($partial && $this->collStockmotionsRelatedByReceiverId) {
                    foreach($this->collStockmotionsRelatedByReceiverId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionsRelatedByReceiverId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionsRelatedByReceiverId = $collStockmotionsRelatedByReceiverId;
                $this->collStockmotionsRelatedByReceiverIdPartial = false;
            }
        }

        return $this->collStockmotionsRelatedByReceiverId;
    }

    /**
     * Sets a collection of StockmotionRelatedByReceiverId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionsRelatedByReceiverId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setStockmotionsRelatedByReceiverId(PropelCollection $stockmotionsRelatedByReceiverId, PropelPDO $con = null)
    {
        $stockmotionsRelatedByReceiverIdToDelete = $this->getStockmotionsRelatedByReceiverId(new Criteria(), $con)->diff($stockmotionsRelatedByReceiverId);

        $this->stockmotionsRelatedByReceiverIdScheduledForDeletion = unserialize(serialize($stockmotionsRelatedByReceiverIdToDelete));

        foreach ($stockmotionsRelatedByReceiverIdToDelete as $stockmotionRelatedByReceiverIdRemoved) {
            $stockmotionRelatedByReceiverIdRemoved->setOrgstructureRelatedByReceiverId(null);
        }

        $this->collStockmotionsRelatedByReceiverId = null;
        foreach ($stockmotionsRelatedByReceiverId as $stockmotionRelatedByReceiverId) {
            $this->addStockmotionRelatedByReceiverId($stockmotionRelatedByReceiverId);
        }

        $this->collStockmotionsRelatedByReceiverId = $stockmotionsRelatedByReceiverId;
        $this->collStockmotionsRelatedByReceiverIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockmotion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockmotion objects.
     * @throws PropelException
     */
    public function countStockmotionsRelatedByReceiverId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByReceiverIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByReceiverId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByReceiverId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionsRelatedByReceiverId());
            }
            $query = StockmotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureRelatedByReceiverId($this)
                ->count($con);
        }

        return count($this->collStockmotionsRelatedByReceiverId);
    }

    /**
     * Method called to associate a Stockmotion object to this object
     * through the Stockmotion foreign key attribute.
     *
     * @param    Stockmotion $l Stockmotion
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addStockmotionRelatedByReceiverId(Stockmotion $l)
    {
        if ($this->collStockmotionsRelatedByReceiverId === null) {
            $this->initStockmotionsRelatedByReceiverId();
            $this->collStockmotionsRelatedByReceiverIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionsRelatedByReceiverId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionRelatedByReceiverId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionRelatedByReceiverId $stockmotionRelatedByReceiverId The stockmotionRelatedByReceiverId object to add.
     */
    protected function doAddStockmotionRelatedByReceiverId($stockmotionRelatedByReceiverId)
    {
        $this->collStockmotionsRelatedByReceiverId[]= $stockmotionRelatedByReceiverId;
        $stockmotionRelatedByReceiverId->setOrgstructureRelatedByReceiverId($this);
    }

    /**
     * @param	StockmotionRelatedByReceiverId $stockmotionRelatedByReceiverId The stockmotionRelatedByReceiverId object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeStockmotionRelatedByReceiverId($stockmotionRelatedByReceiverId)
    {
        if ($this->getStockmotionsRelatedByReceiverId()->contains($stockmotionRelatedByReceiverId)) {
            $this->collStockmotionsRelatedByReceiverId->remove($this->collStockmotionsRelatedByReceiverId->search($stockmotionRelatedByReceiverId));
            if (null === $this->stockmotionsRelatedByReceiverIdScheduledForDeletion) {
                $this->stockmotionsRelatedByReceiverIdScheduledForDeletion = clone $this->collStockmotionsRelatedByReceiverId;
                $this->stockmotionsRelatedByReceiverIdScheduledForDeletion->clear();
            }
            $this->stockmotionsRelatedByReceiverIdScheduledForDeletion[]= $stockmotionRelatedByReceiverId;
            $stockmotionRelatedByReceiverId->setOrgstructureRelatedByReceiverId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedByReceiverId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByReceiverIdJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getStockmotionsRelatedByReceiverId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedByReceiverId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByReceiverIdJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getStockmotionsRelatedByReceiverId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedByReceiverId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByReceiverIdJoinPersonRelatedByReceiverpersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByReceiverpersonId', $join_behavior);

        return $this->getStockmotionsRelatedByReceiverId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedByReceiverId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByReceiverIdJoinPersonRelatedBySupplierpersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedBySupplierpersonId', $join_behavior);

        return $this->getStockmotionsRelatedByReceiverId($query, $con);
    }

    /**
     * Clears out the collStockmotionsRelatedBySupplierId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addStockmotionsRelatedBySupplierId()
     */
    public function clearStockmotionsRelatedBySupplierId()
    {
        $this->collStockmotionsRelatedBySupplierId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionsRelatedBySupplierIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionsRelatedBySupplierId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionsRelatedBySupplierId($v = true)
    {
        $this->collStockmotionsRelatedBySupplierIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionsRelatedBySupplierId collection.
     *
     * By default this just sets the collStockmotionsRelatedBySupplierId collection to an empty array (like clearcollStockmotionsRelatedBySupplierId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionsRelatedBySupplierId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionsRelatedBySupplierId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionsRelatedBySupplierId = new PropelObjectCollection();
        $this->collStockmotionsRelatedBySupplierId->setModel('Stockmotion');
    }

    /**
     * Gets an array of Stockmotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     * @throws PropelException
     */
    public function getStockmotionsRelatedBySupplierId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedBySupplierIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedBySupplierId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedBySupplierId) {
                // return empty collection
                $this->initStockmotionsRelatedBySupplierId();
            } else {
                $collStockmotionsRelatedBySupplierId = StockmotionQuery::create(null, $criteria)
                    ->filterByOrgstructureRelatedBySupplierId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionsRelatedBySupplierIdPartial && count($collStockmotionsRelatedBySupplierId)) {
                      $this->initStockmotionsRelatedBySupplierId(false);

                      foreach($collStockmotionsRelatedBySupplierId as $obj) {
                        if (false == $this->collStockmotionsRelatedBySupplierId->contains($obj)) {
                          $this->collStockmotionsRelatedBySupplierId->append($obj);
                        }
                      }

                      $this->collStockmotionsRelatedBySupplierIdPartial = true;
                    }

                    $collStockmotionsRelatedBySupplierId->getInternalIterator()->rewind();
                    return $collStockmotionsRelatedBySupplierId;
                }

                if($partial && $this->collStockmotionsRelatedBySupplierId) {
                    foreach($this->collStockmotionsRelatedBySupplierId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionsRelatedBySupplierId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionsRelatedBySupplierId = $collStockmotionsRelatedBySupplierId;
                $this->collStockmotionsRelatedBySupplierIdPartial = false;
            }
        }

        return $this->collStockmotionsRelatedBySupplierId;
    }

    /**
     * Sets a collection of StockmotionRelatedBySupplierId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionsRelatedBySupplierId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setStockmotionsRelatedBySupplierId(PropelCollection $stockmotionsRelatedBySupplierId, PropelPDO $con = null)
    {
        $stockmotionsRelatedBySupplierIdToDelete = $this->getStockmotionsRelatedBySupplierId(new Criteria(), $con)->diff($stockmotionsRelatedBySupplierId);

        $this->stockmotionsRelatedBySupplierIdScheduledForDeletion = unserialize(serialize($stockmotionsRelatedBySupplierIdToDelete));

        foreach ($stockmotionsRelatedBySupplierIdToDelete as $stockmotionRelatedBySupplierIdRemoved) {
            $stockmotionRelatedBySupplierIdRemoved->setOrgstructureRelatedBySupplierId(null);
        }

        $this->collStockmotionsRelatedBySupplierId = null;
        foreach ($stockmotionsRelatedBySupplierId as $stockmotionRelatedBySupplierId) {
            $this->addStockmotionRelatedBySupplierId($stockmotionRelatedBySupplierId);
        }

        $this->collStockmotionsRelatedBySupplierId = $stockmotionsRelatedBySupplierId;
        $this->collStockmotionsRelatedBySupplierIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockmotion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockmotion objects.
     * @throws PropelException
     */
    public function countStockmotionsRelatedBySupplierId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedBySupplierIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedBySupplierId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedBySupplierId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionsRelatedBySupplierId());
            }
            $query = StockmotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureRelatedBySupplierId($this)
                ->count($con);
        }

        return count($this->collStockmotionsRelatedBySupplierId);
    }

    /**
     * Method called to associate a Stockmotion object to this object
     * through the Stockmotion foreign key attribute.
     *
     * @param    Stockmotion $l Stockmotion
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addStockmotionRelatedBySupplierId(Stockmotion $l)
    {
        if ($this->collStockmotionsRelatedBySupplierId === null) {
            $this->initStockmotionsRelatedBySupplierId();
            $this->collStockmotionsRelatedBySupplierIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionsRelatedBySupplierId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionRelatedBySupplierId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionRelatedBySupplierId $stockmotionRelatedBySupplierId The stockmotionRelatedBySupplierId object to add.
     */
    protected function doAddStockmotionRelatedBySupplierId($stockmotionRelatedBySupplierId)
    {
        $this->collStockmotionsRelatedBySupplierId[]= $stockmotionRelatedBySupplierId;
        $stockmotionRelatedBySupplierId->setOrgstructureRelatedBySupplierId($this);
    }

    /**
     * @param	StockmotionRelatedBySupplierId $stockmotionRelatedBySupplierId The stockmotionRelatedBySupplierId object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeStockmotionRelatedBySupplierId($stockmotionRelatedBySupplierId)
    {
        if ($this->getStockmotionsRelatedBySupplierId()->contains($stockmotionRelatedBySupplierId)) {
            $this->collStockmotionsRelatedBySupplierId->remove($this->collStockmotionsRelatedBySupplierId->search($stockmotionRelatedBySupplierId));
            if (null === $this->stockmotionsRelatedBySupplierIdScheduledForDeletion) {
                $this->stockmotionsRelatedBySupplierIdScheduledForDeletion = clone $this->collStockmotionsRelatedBySupplierId;
                $this->stockmotionsRelatedBySupplierIdScheduledForDeletion->clear();
            }
            $this->stockmotionsRelatedBySupplierIdScheduledForDeletion[]= $stockmotionRelatedBySupplierId;
            $stockmotionRelatedBySupplierId->setOrgstructureRelatedBySupplierId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedBySupplierId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedBySupplierIdJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getStockmotionsRelatedBySupplierId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedBySupplierId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedBySupplierIdJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getStockmotionsRelatedBySupplierId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedBySupplierId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedBySupplierIdJoinPersonRelatedByReceiverpersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByReceiverpersonId', $join_behavior);

        return $this->getStockmotionsRelatedBySupplierId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockmotionsRelatedBySupplierId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedBySupplierIdJoinPersonRelatedBySupplierpersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedBySupplierpersonId', $join_behavior);

        return $this->getStockmotionsRelatedBySupplierId($query, $con);
    }

    /**
     * Clears out the collStockrequisitionsRelatedByRecipientId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addStockrequisitionsRelatedByRecipientId()
     */
    public function clearStockrequisitionsRelatedByRecipientId()
    {
        $this->collStockrequisitionsRelatedByRecipientId = null; // important to set this to null since that means it is uninitialized
        $this->collStockrequisitionsRelatedByRecipientIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrequisitionsRelatedByRecipientId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrequisitionsRelatedByRecipientId($v = true)
    {
        $this->collStockrequisitionsRelatedByRecipientIdPartial = $v;
    }

    /**
     * Initializes the collStockrequisitionsRelatedByRecipientId collection.
     *
     * By default this just sets the collStockrequisitionsRelatedByRecipientId collection to an empty array (like clearcollStockrequisitionsRelatedByRecipientId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrequisitionsRelatedByRecipientId($overrideExisting = true)
    {
        if (null !== $this->collStockrequisitionsRelatedByRecipientId && !$overrideExisting) {
            return;
        }
        $this->collStockrequisitionsRelatedByRecipientId = new PropelObjectCollection();
        $this->collStockrequisitionsRelatedByRecipientId->setModel('Stockrequisition');
    }

    /**
     * Gets an array of Stockrequisition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     * @throws PropelException
     */
    public function getStockrequisitionsRelatedByRecipientId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedByRecipientIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedByRecipientId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedByRecipientId) {
                // return empty collection
                $this->initStockrequisitionsRelatedByRecipientId();
            } else {
                $collStockrequisitionsRelatedByRecipientId = StockrequisitionQuery::create(null, $criteria)
                    ->filterByOrgstructureRelatedByRecipientId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrequisitionsRelatedByRecipientIdPartial && count($collStockrequisitionsRelatedByRecipientId)) {
                      $this->initStockrequisitionsRelatedByRecipientId(false);

                      foreach($collStockrequisitionsRelatedByRecipientId as $obj) {
                        if (false == $this->collStockrequisitionsRelatedByRecipientId->contains($obj)) {
                          $this->collStockrequisitionsRelatedByRecipientId->append($obj);
                        }
                      }

                      $this->collStockrequisitionsRelatedByRecipientIdPartial = true;
                    }

                    $collStockrequisitionsRelatedByRecipientId->getInternalIterator()->rewind();
                    return $collStockrequisitionsRelatedByRecipientId;
                }

                if($partial && $this->collStockrequisitionsRelatedByRecipientId) {
                    foreach($this->collStockrequisitionsRelatedByRecipientId as $obj) {
                        if($obj->isNew()) {
                            $collStockrequisitionsRelatedByRecipientId[] = $obj;
                        }
                    }
                }

                $this->collStockrequisitionsRelatedByRecipientId = $collStockrequisitionsRelatedByRecipientId;
                $this->collStockrequisitionsRelatedByRecipientIdPartial = false;
            }
        }

        return $this->collStockrequisitionsRelatedByRecipientId;
    }

    /**
     * Sets a collection of StockrequisitionRelatedByRecipientId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrequisitionsRelatedByRecipientId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setStockrequisitionsRelatedByRecipientId(PropelCollection $stockrequisitionsRelatedByRecipientId, PropelPDO $con = null)
    {
        $stockrequisitionsRelatedByRecipientIdToDelete = $this->getStockrequisitionsRelatedByRecipientId(new Criteria(), $con)->diff($stockrequisitionsRelatedByRecipientId);

        $this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion = unserialize(serialize($stockrequisitionsRelatedByRecipientIdToDelete));

        foreach ($stockrequisitionsRelatedByRecipientIdToDelete as $stockrequisitionRelatedByRecipientIdRemoved) {
            $stockrequisitionRelatedByRecipientIdRemoved->setOrgstructureRelatedByRecipientId(null);
        }

        $this->collStockrequisitionsRelatedByRecipientId = null;
        foreach ($stockrequisitionsRelatedByRecipientId as $stockrequisitionRelatedByRecipientId) {
            $this->addStockrequisitionRelatedByRecipientId($stockrequisitionRelatedByRecipientId);
        }

        $this->collStockrequisitionsRelatedByRecipientId = $stockrequisitionsRelatedByRecipientId;
        $this->collStockrequisitionsRelatedByRecipientIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockrequisition objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockrequisition objects.
     * @throws PropelException
     */
    public function countStockrequisitionsRelatedByRecipientId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedByRecipientIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedByRecipientId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedByRecipientId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrequisitionsRelatedByRecipientId());
            }
            $query = StockrequisitionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureRelatedByRecipientId($this)
                ->count($con);
        }

        return count($this->collStockrequisitionsRelatedByRecipientId);
    }

    /**
     * Method called to associate a Stockrequisition object to this object
     * through the Stockrequisition foreign key attribute.
     *
     * @param    Stockrequisition $l Stockrequisition
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addStockrequisitionRelatedByRecipientId(Stockrequisition $l)
    {
        if ($this->collStockrequisitionsRelatedByRecipientId === null) {
            $this->initStockrequisitionsRelatedByRecipientId();
            $this->collStockrequisitionsRelatedByRecipientIdPartial = true;
        }
        if (!in_array($l, $this->collStockrequisitionsRelatedByRecipientId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrequisitionRelatedByRecipientId($l);
        }

        return $this;
    }

    /**
     * @param	StockrequisitionRelatedByRecipientId $stockrequisitionRelatedByRecipientId The stockrequisitionRelatedByRecipientId object to add.
     */
    protected function doAddStockrequisitionRelatedByRecipientId($stockrequisitionRelatedByRecipientId)
    {
        $this->collStockrequisitionsRelatedByRecipientId[]= $stockrequisitionRelatedByRecipientId;
        $stockrequisitionRelatedByRecipientId->setOrgstructureRelatedByRecipientId($this);
    }

    /**
     * @param	StockrequisitionRelatedByRecipientId $stockrequisitionRelatedByRecipientId The stockrequisitionRelatedByRecipientId object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeStockrequisitionRelatedByRecipientId($stockrequisitionRelatedByRecipientId)
    {
        if ($this->getStockrequisitionsRelatedByRecipientId()->contains($stockrequisitionRelatedByRecipientId)) {
            $this->collStockrequisitionsRelatedByRecipientId->remove($this->collStockrequisitionsRelatedByRecipientId->search($stockrequisitionRelatedByRecipientId));
            if (null === $this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion) {
                $this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion = clone $this->collStockrequisitionsRelatedByRecipientId;
                $this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion->clear();
            }
            $this->stockrequisitionsRelatedByRecipientIdScheduledForDeletion[]= $stockrequisitionRelatedByRecipientId;
            $stockrequisitionRelatedByRecipientId->setOrgstructureRelatedByRecipientId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockrequisitionsRelatedByRecipientId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedByRecipientIdJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getStockrequisitionsRelatedByRecipientId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockrequisitionsRelatedByRecipientId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedByRecipientIdJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getStockrequisitionsRelatedByRecipientId($query, $con);
    }

    /**
     * Clears out the collStockrequisitionsRelatedBySupplierId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addStockrequisitionsRelatedBySupplierId()
     */
    public function clearStockrequisitionsRelatedBySupplierId()
    {
        $this->collStockrequisitionsRelatedBySupplierId = null; // important to set this to null since that means it is uninitialized
        $this->collStockrequisitionsRelatedBySupplierIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrequisitionsRelatedBySupplierId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrequisitionsRelatedBySupplierId($v = true)
    {
        $this->collStockrequisitionsRelatedBySupplierIdPartial = $v;
    }

    /**
     * Initializes the collStockrequisitionsRelatedBySupplierId collection.
     *
     * By default this just sets the collStockrequisitionsRelatedBySupplierId collection to an empty array (like clearcollStockrequisitionsRelatedBySupplierId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrequisitionsRelatedBySupplierId($overrideExisting = true)
    {
        if (null !== $this->collStockrequisitionsRelatedBySupplierId && !$overrideExisting) {
            return;
        }
        $this->collStockrequisitionsRelatedBySupplierId = new PropelObjectCollection();
        $this->collStockrequisitionsRelatedBySupplierId->setModel('Stockrequisition');
    }

    /**
     * Gets an array of Stockrequisition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     * @throws PropelException
     */
    public function getStockrequisitionsRelatedBySupplierId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedBySupplierIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedBySupplierId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedBySupplierId) {
                // return empty collection
                $this->initStockrequisitionsRelatedBySupplierId();
            } else {
                $collStockrequisitionsRelatedBySupplierId = StockrequisitionQuery::create(null, $criteria)
                    ->filterByOrgstructureRelatedBySupplierId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrequisitionsRelatedBySupplierIdPartial && count($collStockrequisitionsRelatedBySupplierId)) {
                      $this->initStockrequisitionsRelatedBySupplierId(false);

                      foreach($collStockrequisitionsRelatedBySupplierId as $obj) {
                        if (false == $this->collStockrequisitionsRelatedBySupplierId->contains($obj)) {
                          $this->collStockrequisitionsRelatedBySupplierId->append($obj);
                        }
                      }

                      $this->collStockrequisitionsRelatedBySupplierIdPartial = true;
                    }

                    $collStockrequisitionsRelatedBySupplierId->getInternalIterator()->rewind();
                    return $collStockrequisitionsRelatedBySupplierId;
                }

                if($partial && $this->collStockrequisitionsRelatedBySupplierId) {
                    foreach($this->collStockrequisitionsRelatedBySupplierId as $obj) {
                        if($obj->isNew()) {
                            $collStockrequisitionsRelatedBySupplierId[] = $obj;
                        }
                    }
                }

                $this->collStockrequisitionsRelatedBySupplierId = $collStockrequisitionsRelatedBySupplierId;
                $this->collStockrequisitionsRelatedBySupplierIdPartial = false;
            }
        }

        return $this->collStockrequisitionsRelatedBySupplierId;
    }

    /**
     * Sets a collection of StockrequisitionRelatedBySupplierId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrequisitionsRelatedBySupplierId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setStockrequisitionsRelatedBySupplierId(PropelCollection $stockrequisitionsRelatedBySupplierId, PropelPDO $con = null)
    {
        $stockrequisitionsRelatedBySupplierIdToDelete = $this->getStockrequisitionsRelatedBySupplierId(new Criteria(), $con)->diff($stockrequisitionsRelatedBySupplierId);

        $this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion = unserialize(serialize($stockrequisitionsRelatedBySupplierIdToDelete));

        foreach ($stockrequisitionsRelatedBySupplierIdToDelete as $stockrequisitionRelatedBySupplierIdRemoved) {
            $stockrequisitionRelatedBySupplierIdRemoved->setOrgstructureRelatedBySupplierId(null);
        }

        $this->collStockrequisitionsRelatedBySupplierId = null;
        foreach ($stockrequisitionsRelatedBySupplierId as $stockrequisitionRelatedBySupplierId) {
            $this->addStockrequisitionRelatedBySupplierId($stockrequisitionRelatedBySupplierId);
        }

        $this->collStockrequisitionsRelatedBySupplierId = $stockrequisitionsRelatedBySupplierId;
        $this->collStockrequisitionsRelatedBySupplierIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockrequisition objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockrequisition objects.
     * @throws PropelException
     */
    public function countStockrequisitionsRelatedBySupplierId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedBySupplierIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedBySupplierId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedBySupplierId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrequisitionsRelatedBySupplierId());
            }
            $query = StockrequisitionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureRelatedBySupplierId($this)
                ->count($con);
        }

        return count($this->collStockrequisitionsRelatedBySupplierId);
    }

    /**
     * Method called to associate a Stockrequisition object to this object
     * through the Stockrequisition foreign key attribute.
     *
     * @param    Stockrequisition $l Stockrequisition
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addStockrequisitionRelatedBySupplierId(Stockrequisition $l)
    {
        if ($this->collStockrequisitionsRelatedBySupplierId === null) {
            $this->initStockrequisitionsRelatedBySupplierId();
            $this->collStockrequisitionsRelatedBySupplierIdPartial = true;
        }
        if (!in_array($l, $this->collStockrequisitionsRelatedBySupplierId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrequisitionRelatedBySupplierId($l);
        }

        return $this;
    }

    /**
     * @param	StockrequisitionRelatedBySupplierId $stockrequisitionRelatedBySupplierId The stockrequisitionRelatedBySupplierId object to add.
     */
    protected function doAddStockrequisitionRelatedBySupplierId($stockrequisitionRelatedBySupplierId)
    {
        $this->collStockrequisitionsRelatedBySupplierId[]= $stockrequisitionRelatedBySupplierId;
        $stockrequisitionRelatedBySupplierId->setOrgstructureRelatedBySupplierId($this);
    }

    /**
     * @param	StockrequisitionRelatedBySupplierId $stockrequisitionRelatedBySupplierId The stockrequisitionRelatedBySupplierId object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeStockrequisitionRelatedBySupplierId($stockrequisitionRelatedBySupplierId)
    {
        if ($this->getStockrequisitionsRelatedBySupplierId()->contains($stockrequisitionRelatedBySupplierId)) {
            $this->collStockrequisitionsRelatedBySupplierId->remove($this->collStockrequisitionsRelatedBySupplierId->search($stockrequisitionRelatedBySupplierId));
            if (null === $this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion) {
                $this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion = clone $this->collStockrequisitionsRelatedBySupplierId;
                $this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion->clear();
            }
            $this->stockrequisitionsRelatedBySupplierIdScheduledForDeletion[]= $stockrequisitionRelatedBySupplierId;
            $stockrequisitionRelatedBySupplierId->setOrgstructureRelatedBySupplierId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockrequisitionsRelatedBySupplierId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedBySupplierIdJoinPersonRelatedByCreatepersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByCreatepersonId', $join_behavior);

        return $this->getStockrequisitionsRelatedBySupplierId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StockrequisitionsRelatedBySupplierId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedBySupplierIdJoinPersonRelatedByModifypersonId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByModifypersonId', $join_behavior);

        return $this->getStockrequisitionsRelatedBySupplierId($query, $con);
    }

    /**
     * Clears out the collStocktranssRelatedByCreorgstructureId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addStocktranssRelatedByCreorgstructureId()
     */
    public function clearStocktranssRelatedByCreorgstructureId()
    {
        $this->collStocktranssRelatedByCreorgstructureId = null; // important to set this to null since that means it is uninitialized
        $this->collStocktranssRelatedByCreorgstructureIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStocktranssRelatedByCreorgstructureId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStocktranssRelatedByCreorgstructureId($v = true)
    {
        $this->collStocktranssRelatedByCreorgstructureIdPartial = $v;
    }

    /**
     * Initializes the collStocktranssRelatedByCreorgstructureId collection.
     *
     * By default this just sets the collStocktranssRelatedByCreorgstructureId collection to an empty array (like clearcollStocktranssRelatedByCreorgstructureId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStocktranssRelatedByCreorgstructureId($overrideExisting = true)
    {
        if (null !== $this->collStocktranssRelatedByCreorgstructureId && !$overrideExisting) {
            return;
        }
        $this->collStocktranssRelatedByCreorgstructureId = new PropelObjectCollection();
        $this->collStocktranssRelatedByCreorgstructureId->setModel('Stocktrans');
    }

    /**
     * Gets an array of Stocktrans objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     * @throws PropelException
     */
    public function getStocktranssRelatedByCreorgstructureId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByCreorgstructureIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByCreorgstructureId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByCreorgstructureId) {
                // return empty collection
                $this->initStocktranssRelatedByCreorgstructureId();
            } else {
                $collStocktranssRelatedByCreorgstructureId = StocktransQuery::create(null, $criteria)
                    ->filterByOrgstructureRelatedByCreorgstructureId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStocktranssRelatedByCreorgstructureIdPartial && count($collStocktranssRelatedByCreorgstructureId)) {
                      $this->initStocktranssRelatedByCreorgstructureId(false);

                      foreach($collStocktranssRelatedByCreorgstructureId as $obj) {
                        if (false == $this->collStocktranssRelatedByCreorgstructureId->contains($obj)) {
                          $this->collStocktranssRelatedByCreorgstructureId->append($obj);
                        }
                      }

                      $this->collStocktranssRelatedByCreorgstructureIdPartial = true;
                    }

                    $collStocktranssRelatedByCreorgstructureId->getInternalIterator()->rewind();
                    return $collStocktranssRelatedByCreorgstructureId;
                }

                if($partial && $this->collStocktranssRelatedByCreorgstructureId) {
                    foreach($this->collStocktranssRelatedByCreorgstructureId as $obj) {
                        if($obj->isNew()) {
                            $collStocktranssRelatedByCreorgstructureId[] = $obj;
                        }
                    }
                }

                $this->collStocktranssRelatedByCreorgstructureId = $collStocktranssRelatedByCreorgstructureId;
                $this->collStocktranssRelatedByCreorgstructureIdPartial = false;
            }
        }

        return $this->collStocktranssRelatedByCreorgstructureId;
    }

    /**
     * Sets a collection of StocktransRelatedByCreorgstructureId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stocktranssRelatedByCreorgstructureId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setStocktranssRelatedByCreorgstructureId(PropelCollection $stocktranssRelatedByCreorgstructureId, PropelPDO $con = null)
    {
        $stocktranssRelatedByCreorgstructureIdToDelete = $this->getStocktranssRelatedByCreorgstructureId(new Criteria(), $con)->diff($stocktranssRelatedByCreorgstructureId);

        $this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion = unserialize(serialize($stocktranssRelatedByCreorgstructureIdToDelete));

        foreach ($stocktranssRelatedByCreorgstructureIdToDelete as $stocktransRelatedByCreorgstructureIdRemoved) {
            $stocktransRelatedByCreorgstructureIdRemoved->setOrgstructureRelatedByCreorgstructureId(null);
        }

        $this->collStocktranssRelatedByCreorgstructureId = null;
        foreach ($stocktranssRelatedByCreorgstructureId as $stocktransRelatedByCreorgstructureId) {
            $this->addStocktransRelatedByCreorgstructureId($stocktransRelatedByCreorgstructureId);
        }

        $this->collStocktranssRelatedByCreorgstructureId = $stocktranssRelatedByCreorgstructureId;
        $this->collStocktranssRelatedByCreorgstructureIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stocktrans objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stocktrans objects.
     * @throws PropelException
     */
    public function countStocktranssRelatedByCreorgstructureId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByCreorgstructureIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByCreorgstructureId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByCreorgstructureId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStocktranssRelatedByCreorgstructureId());
            }
            $query = StocktransQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureRelatedByCreorgstructureId($this)
                ->count($con);
        }

        return count($this->collStocktranssRelatedByCreorgstructureId);
    }

    /**
     * Method called to associate a Stocktrans object to this object
     * through the Stocktrans foreign key attribute.
     *
     * @param    Stocktrans $l Stocktrans
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addStocktransRelatedByCreorgstructureId(Stocktrans $l)
    {
        if ($this->collStocktranssRelatedByCreorgstructureId === null) {
            $this->initStocktranssRelatedByCreorgstructureId();
            $this->collStocktranssRelatedByCreorgstructureIdPartial = true;
        }
        if (!in_array($l, $this->collStocktranssRelatedByCreorgstructureId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStocktransRelatedByCreorgstructureId($l);
        }

        return $this;
    }

    /**
     * @param	StocktransRelatedByCreorgstructureId $stocktransRelatedByCreorgstructureId The stocktransRelatedByCreorgstructureId object to add.
     */
    protected function doAddStocktransRelatedByCreorgstructureId($stocktransRelatedByCreorgstructureId)
    {
        $this->collStocktranssRelatedByCreorgstructureId[]= $stocktransRelatedByCreorgstructureId;
        $stocktransRelatedByCreorgstructureId->setOrgstructureRelatedByCreorgstructureId($this);
    }

    /**
     * @param	StocktransRelatedByCreorgstructureId $stocktransRelatedByCreorgstructureId The stocktransRelatedByCreorgstructureId object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeStocktransRelatedByCreorgstructureId($stocktransRelatedByCreorgstructureId)
    {
        if ($this->getStocktranssRelatedByCreorgstructureId()->contains($stocktransRelatedByCreorgstructureId)) {
            $this->collStocktranssRelatedByCreorgstructureId->remove($this->collStocktranssRelatedByCreorgstructureId->search($stocktransRelatedByCreorgstructureId));
            if (null === $this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion) {
                $this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion = clone $this->collStocktranssRelatedByCreorgstructureId;
                $this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion->clear();
            }
            $this->stocktranssRelatedByCreorgstructureIdScheduledForDeletion[]= $stocktransRelatedByCreorgstructureId;
            $stocktransRelatedByCreorgstructureId->setOrgstructureRelatedByCreorgstructureId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByCreorgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCreorgstructureIdJoinRbfinanceRelatedByCrefinanceId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbfinanceRelatedByCrefinanceId', $join_behavior);

        return $this->getStocktranssRelatedByCreorgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByCreorgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCreorgstructureIdJoinRbnomenclatureRelatedByCrenomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByCrenomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByCreorgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByCreorgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCreorgstructureIdJoinRbfinanceRelatedByDebfinanceId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbfinanceRelatedByDebfinanceId', $join_behavior);

        return $this->getStocktranssRelatedByCreorgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByCreorgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCreorgstructureIdJoinRbnomenclatureRelatedByDebnomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByDebnomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByCreorgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByCreorgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCreorgstructureIdJoinStockmotionItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('StockmotionItem', $join_behavior);

        return $this->getStocktranssRelatedByCreorgstructureId($query, $con);
    }

    /**
     * Clears out the collStocktranssRelatedByDeborgstructureId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Orgstructure The current object (for fluent API support)
     * @see        addStocktranssRelatedByDeborgstructureId()
     */
    public function clearStocktranssRelatedByDeborgstructureId()
    {
        $this->collStocktranssRelatedByDeborgstructureId = null; // important to set this to null since that means it is uninitialized
        $this->collStocktranssRelatedByDeborgstructureIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStocktranssRelatedByDeborgstructureId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStocktranssRelatedByDeborgstructureId($v = true)
    {
        $this->collStocktranssRelatedByDeborgstructureIdPartial = $v;
    }

    /**
     * Initializes the collStocktranssRelatedByDeborgstructureId collection.
     *
     * By default this just sets the collStocktranssRelatedByDeborgstructureId collection to an empty array (like clearcollStocktranssRelatedByDeborgstructureId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStocktranssRelatedByDeborgstructureId($overrideExisting = true)
    {
        if (null !== $this->collStocktranssRelatedByDeborgstructureId && !$overrideExisting) {
            return;
        }
        $this->collStocktranssRelatedByDeborgstructureId = new PropelObjectCollection();
        $this->collStocktranssRelatedByDeborgstructureId->setModel('Stocktrans');
    }

    /**
     * Gets an array of Stocktrans objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Orgstructure is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     * @throws PropelException
     */
    public function getStocktranssRelatedByDeborgstructureId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByDeborgstructureIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByDeborgstructureId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByDeborgstructureId) {
                // return empty collection
                $this->initStocktranssRelatedByDeborgstructureId();
            } else {
                $collStocktranssRelatedByDeborgstructureId = StocktransQuery::create(null, $criteria)
                    ->filterByOrgstructureRelatedByDeborgstructureId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStocktranssRelatedByDeborgstructureIdPartial && count($collStocktranssRelatedByDeborgstructureId)) {
                      $this->initStocktranssRelatedByDeborgstructureId(false);

                      foreach($collStocktranssRelatedByDeborgstructureId as $obj) {
                        if (false == $this->collStocktranssRelatedByDeborgstructureId->contains($obj)) {
                          $this->collStocktranssRelatedByDeborgstructureId->append($obj);
                        }
                      }

                      $this->collStocktranssRelatedByDeborgstructureIdPartial = true;
                    }

                    $collStocktranssRelatedByDeborgstructureId->getInternalIterator()->rewind();
                    return $collStocktranssRelatedByDeborgstructureId;
                }

                if($partial && $this->collStocktranssRelatedByDeborgstructureId) {
                    foreach($this->collStocktranssRelatedByDeborgstructureId as $obj) {
                        if($obj->isNew()) {
                            $collStocktranssRelatedByDeborgstructureId[] = $obj;
                        }
                    }
                }

                $this->collStocktranssRelatedByDeborgstructureId = $collStocktranssRelatedByDeborgstructureId;
                $this->collStocktranssRelatedByDeborgstructureIdPartial = false;
            }
        }

        return $this->collStocktranssRelatedByDeborgstructureId;
    }

    /**
     * Sets a collection of StocktransRelatedByDeborgstructureId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stocktranssRelatedByDeborgstructureId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Orgstructure The current object (for fluent API support)
     */
    public function setStocktranssRelatedByDeborgstructureId(PropelCollection $stocktranssRelatedByDeborgstructureId, PropelPDO $con = null)
    {
        $stocktranssRelatedByDeborgstructureIdToDelete = $this->getStocktranssRelatedByDeborgstructureId(new Criteria(), $con)->diff($stocktranssRelatedByDeborgstructureId);

        $this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion = unserialize(serialize($stocktranssRelatedByDeborgstructureIdToDelete));

        foreach ($stocktranssRelatedByDeborgstructureIdToDelete as $stocktransRelatedByDeborgstructureIdRemoved) {
            $stocktransRelatedByDeborgstructureIdRemoved->setOrgstructureRelatedByDeborgstructureId(null);
        }

        $this->collStocktranssRelatedByDeborgstructureId = null;
        foreach ($stocktranssRelatedByDeborgstructureId as $stocktransRelatedByDeborgstructureId) {
            $this->addStocktransRelatedByDeborgstructureId($stocktransRelatedByDeborgstructureId);
        }

        $this->collStocktranssRelatedByDeborgstructureId = $stocktranssRelatedByDeborgstructureId;
        $this->collStocktranssRelatedByDeborgstructureIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stocktrans objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stocktrans objects.
     * @throws PropelException
     */
    public function countStocktranssRelatedByDeborgstructureId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByDeborgstructureIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByDeborgstructureId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByDeborgstructureId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStocktranssRelatedByDeborgstructureId());
            }
            $query = StocktransQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrgstructureRelatedByDeborgstructureId($this)
                ->count($con);
        }

        return count($this->collStocktranssRelatedByDeborgstructureId);
    }

    /**
     * Method called to associate a Stocktrans object to this object
     * through the Stocktrans foreign key attribute.
     *
     * @param    Stocktrans $l Stocktrans
     * @return Orgstructure The current object (for fluent API support)
     */
    public function addStocktransRelatedByDeborgstructureId(Stocktrans $l)
    {
        if ($this->collStocktranssRelatedByDeborgstructureId === null) {
            $this->initStocktranssRelatedByDeborgstructureId();
            $this->collStocktranssRelatedByDeborgstructureIdPartial = true;
        }
        if (!in_array($l, $this->collStocktranssRelatedByDeborgstructureId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStocktransRelatedByDeborgstructureId($l);
        }

        return $this;
    }

    /**
     * @param	StocktransRelatedByDeborgstructureId $stocktransRelatedByDeborgstructureId The stocktransRelatedByDeborgstructureId object to add.
     */
    protected function doAddStocktransRelatedByDeborgstructureId($stocktransRelatedByDeborgstructureId)
    {
        $this->collStocktranssRelatedByDeborgstructureId[]= $stocktransRelatedByDeborgstructureId;
        $stocktransRelatedByDeborgstructureId->setOrgstructureRelatedByDeborgstructureId($this);
    }

    /**
     * @param	StocktransRelatedByDeborgstructureId $stocktransRelatedByDeborgstructureId The stocktransRelatedByDeborgstructureId object to remove.
     * @return Orgstructure The current object (for fluent API support)
     */
    public function removeStocktransRelatedByDeborgstructureId($stocktransRelatedByDeborgstructureId)
    {
        if ($this->getStocktranssRelatedByDeborgstructureId()->contains($stocktransRelatedByDeborgstructureId)) {
            $this->collStocktranssRelatedByDeborgstructureId->remove($this->collStocktranssRelatedByDeborgstructureId->search($stocktransRelatedByDeborgstructureId));
            if (null === $this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion) {
                $this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion = clone $this->collStocktranssRelatedByDeborgstructureId;
                $this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion->clear();
            }
            $this->stocktranssRelatedByDeborgstructureIdScheduledForDeletion[]= $stocktransRelatedByDeborgstructureId;
            $stocktransRelatedByDeborgstructureId->setOrgstructureRelatedByDeborgstructureId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByDeborgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDeborgstructureIdJoinRbfinanceRelatedByCrefinanceId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbfinanceRelatedByCrefinanceId', $join_behavior);

        return $this->getStocktranssRelatedByDeborgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByDeborgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDeborgstructureIdJoinRbnomenclatureRelatedByCrenomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByCrenomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByDeborgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByDeborgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDeborgstructureIdJoinRbfinanceRelatedByDebfinanceId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbfinanceRelatedByDebfinanceId', $join_behavior);

        return $this->getStocktranssRelatedByDeborgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByDeborgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDeborgstructureIdJoinRbnomenclatureRelatedByDebnomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByDebnomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByDeborgstructureId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Orgstructure is new, it will return
     * an empty collection; or if this Orgstructure has previously
     * been saved, it will retrieve related StocktranssRelatedByDeborgstructureId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Orgstructure.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDeborgstructureIdJoinStockmotionItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('StockmotionItem', $join_behavior);

        return $this->getStocktranssRelatedByDeborgstructureId($query, $con);
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
        $this->organisation_id = null;
        $this->code = null;
        $this->name = null;
        $this->parent_id = null;
        $this->type = null;
        $this->net_id = null;
        $this->isarea = null;
        $this->hashospitalbeds = null;
        $this->hasstocks = null;
        $this->infiscode = null;
        $this->infisinternalcode = null;
        $this->infisdeptypecode = null;
        $this->infistariffcode = null;
        $this->availableforexternal = null;
        $this->address = null;
        $this->inheriteventtypes = null;
        $this->inheritactiontypes = null;
        $this->inheritgaps = null;
        $this->uuid_id = null;
        $this->show = null;
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
            if ($this->collBlankactionsMovings) {
                foreach ($this->collBlankactionsMovings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrgstructureDisabledattendances) {
                foreach ($this->collOrgstructureDisabledattendances as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrgstructureStocks) {
                foreach ($this->collOrgstructureStocks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionsRelatedByReceiverId) {
                foreach ($this->collStockmotionsRelatedByReceiverId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionsRelatedBySupplierId) {
                foreach ($this->collStockmotionsRelatedBySupplierId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrequisitionsRelatedByRecipientId) {
                foreach ($this->collStockrequisitionsRelatedByRecipientId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrequisitionsRelatedBySupplierId) {
                foreach ($this->collStockrequisitionsRelatedBySupplierId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStocktranssRelatedByCreorgstructureId) {
                foreach ($this->collStocktranssRelatedByCreorgstructureId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStocktranssRelatedByDeborgstructureId) {
                foreach ($this->collStocktranssRelatedByDeborgstructureId as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBlankactionsMovings instanceof PropelCollection) {
            $this->collBlankactionsMovings->clearIterator();
        }
        $this->collBlankactionsMovings = null;
        if ($this->collOrgstructureDisabledattendances instanceof PropelCollection) {
            $this->collOrgstructureDisabledattendances->clearIterator();
        }
        $this->collOrgstructureDisabledattendances = null;
        if ($this->collOrgstructureStocks instanceof PropelCollection) {
            $this->collOrgstructureStocks->clearIterator();
        }
        $this->collOrgstructureStocks = null;
        if ($this->collStockmotionsRelatedByReceiverId instanceof PropelCollection) {
            $this->collStockmotionsRelatedByReceiverId->clearIterator();
        }
        $this->collStockmotionsRelatedByReceiverId = null;
        if ($this->collStockmotionsRelatedBySupplierId instanceof PropelCollection) {
            $this->collStockmotionsRelatedBySupplierId->clearIterator();
        }
        $this->collStockmotionsRelatedBySupplierId = null;
        if ($this->collStockrequisitionsRelatedByRecipientId instanceof PropelCollection) {
            $this->collStockrequisitionsRelatedByRecipientId->clearIterator();
        }
        $this->collStockrequisitionsRelatedByRecipientId = null;
        if ($this->collStockrequisitionsRelatedBySupplierId instanceof PropelCollection) {
            $this->collStockrequisitionsRelatedBySupplierId->clearIterator();
        }
        $this->collStockrequisitionsRelatedBySupplierId = null;
        if ($this->collStocktranssRelatedByCreorgstructureId instanceof PropelCollection) {
            $this->collStocktranssRelatedByCreorgstructureId->clearIterator();
        }
        $this->collStocktranssRelatedByCreorgstructureId = null;
        if ($this->collStocktranssRelatedByDeborgstructureId instanceof PropelCollection) {
            $this->collStocktranssRelatedByDeborgstructureId->clearIterator();
        }
        $this->collStocktranssRelatedByDeborgstructureId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OrgstructurePeer::DEFAULT_STRING_FORMAT);
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
