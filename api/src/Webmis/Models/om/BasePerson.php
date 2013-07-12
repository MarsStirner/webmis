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
use Webmis\Models\ActionpropertyPerson;
use Webmis\Models\ActionpropertyPersonQuery;
use Webmis\Models\Actiontype;
use Webmis\Models\ActiontypeQuery;
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\BlankactionsMovingQuery;
use Webmis\Models\BlankactionsParty;
use Webmis\Models\BlankactionsPartyQuery;
use Webmis\Models\Notificationoccurred;
use Webmis\Models\NotificationoccurredQuery;
use Webmis\Models\Person;
use Webmis\Models\PersonPeer;
use Webmis\Models\PersonQuery;
use Webmis\Models\PersonTimetemplate;
use Webmis\Models\PersonTimetemplateQuery;
use Webmis\Models\Stockmotion;
use Webmis\Models\StockmotionQuery;
use Webmis\Models\Stockrecipe;
use Webmis\Models\StockrecipeQuery;
use Webmis\Models\Stockrequisition;
use Webmis\Models\StockrequisitionQuery;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\TakentissuejournalQuery;

/**
 * Base class that represents a row from the 'Person' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePerson extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\PersonPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PersonPeer
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
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the federalcode field.
     * @var        string
     */
    protected $federalcode;

    /**
     * The value for the regionalcode field.
     * @var        string
     */
    protected $regionalcode;

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
     * The value for the post_id field.
     * @var        int
     */
    protected $post_id;

    /**
     * The value for the speciality_id field.
     * @var        int
     */
    protected $speciality_id;

    /**
     * The value for the org_id field.
     * @var        int
     */
    protected $org_id;

    /**
     * The value for the orgstructure_id field.
     * @var        int
     */
    protected $orgstructure_id;

    /**
     * The value for the office field.
     * @var        string
     */
    protected $office;

    /**
     * The value for the office2 field.
     * @var        string
     */
    protected $office2;

    /**
     * The value for the tariffcategory_id field.
     * @var        int
     */
    protected $tariffcategory_id;

    /**
     * The value for the finance_id field.
     * @var        int
     */
    protected $finance_id;

    /**
     * The value for the retiredate field.
     * @var        string
     */
    protected $retiredate;

    /**
     * The value for the ambplan field.
     * @var        int
     */
    protected $ambplan;

    /**
     * The value for the ambplan2 field.
     * @var        int
     */
    protected $ambplan2;

    /**
     * The value for the ambnorm field.
     * @var        int
     */
    protected $ambnorm;

    /**
     * The value for the homplan field.
     * @var        int
     */
    protected $homplan;

    /**
     * The value for the homplan2 field.
     * @var        int
     */
    protected $homplan2;

    /**
     * The value for the homnorm field.
     * @var        int
     */
    protected $homnorm;

    /**
     * The value for the expplan field.
     * @var        int
     */
    protected $expplan;

    /**
     * The value for the expnorm field.
     * @var        int
     */
    protected $expnorm;

    /**
     * The value for the login field.
     * @var        string
     */
    protected $login;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the userprofile_id field.
     * @var        int
     */
    protected $userprofile_id;

    /**
     * The value for the retired field.
     * @var        boolean
     */
    protected $retired;

    /**
     * The value for the birthdate field.
     * @var        string
     */
    protected $birthdate;

    /**
     * The value for the birthplace field.
     * @var        string
     */
    protected $birthplace;

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
     * The value for the inn field.
     * @var        string
     */
    protected $inn;

    /**
     * The value for the availableforexternal field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $availableforexternal;

    /**
     * The value for the primaryquota field.
     * Note: this column has a database default value of: 50
     * @var        int
     */
    protected $primaryquota;

    /**
     * The value for the ownquota field.
     * Note: this column has a database default value of: 25
     * @var        int
     */
    protected $ownquota;

    /**
     * The value for the consultancyquota field.
     * Note: this column has a database default value of: 25
     * @var        int
     */
    protected $consultancyquota;

    /**
     * The value for the externalquota field.
     * Note: this column has a database default value of: 10
     * @var        int
     */
    protected $externalquota;

    /**
     * The value for the lastaccessibletimelinedate field.
     * @var        string
     */
    protected $lastaccessibletimelinedate;

    /**
     * The value for the timelineaccessibledays field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $timelineaccessibledays;

    /**
     * The value for the typetimelineperson field.
     * @var        int
     */
    protected $typetimelineperson;

    /**
     * The value for the maxoverqueue field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $maxoverqueue;

    /**
     * The value for the maxcito field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $maxcito;

    /**
     * The value for the quotunit field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $quotunit;

    /**
     * The value for the academicdegree_id field.
     * @var        int
     */
    protected $academicdegree_id;

    /**
     * The value for the academictitle_id field.
     * @var        int
     */
    protected $academictitle_id;

    /**
     * The value for the uuid_id field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $uuid_id;

    /**
     * @var        PropelObjectCollection|ActionpropertyPerson[] Collection to store aggregation of ActionpropertyPerson objects.
     */
    protected $collActionpropertyPersons;
    protected $collActionpropertyPersonsPartial;

    /**
     * @var        PropelObjectCollection|Actiontype[] Collection to store aggregation of Actiontype objects.
     */
    protected $collActiontypes;
    protected $collActiontypesPartial;

    /**
     * @var        PropelObjectCollection|BlankactionsMoving[] Collection to store aggregation of BlankactionsMoving objects.
     */
    protected $collBlankactionsMovingsRelatedByCreatepersonId;
    protected $collBlankactionsMovingsRelatedByCreatepersonIdPartial;

    /**
     * @var        PropelObjectCollection|BlankactionsMoving[] Collection to store aggregation of BlankactionsMoving objects.
     */
    protected $collBlankactionsMovingsRelatedByModifypersonId;
    protected $collBlankactionsMovingsRelatedByModifypersonIdPartial;

    /**
     * @var        PropelObjectCollection|BlankactionsMoving[] Collection to store aggregation of BlankactionsMoving objects.
     */
    protected $collBlankactionsMovingsRelatedByPersonId;
    protected $collBlankactionsMovingsRelatedByPersonIdPartial;

    /**
     * @var        PropelObjectCollection|BlankactionsParty[] Collection to store aggregation of BlankactionsParty objects.
     */
    protected $collBlankactionsPartysRelatedByCreatepersonId;
    protected $collBlankactionsPartysRelatedByCreatepersonIdPartial;

    /**
     * @var        PropelObjectCollection|BlankactionsParty[] Collection to store aggregation of BlankactionsParty objects.
     */
    protected $collBlankactionsPartysRelatedByModifypersonId;
    protected $collBlankactionsPartysRelatedByModifypersonIdPartial;

    /**
     * @var        PropelObjectCollection|BlankactionsParty[] Collection to store aggregation of BlankactionsParty objects.
     */
    protected $collBlankactionsPartysRelatedByPersonId;
    protected $collBlankactionsPartysRelatedByPersonIdPartial;

    /**
     * @var        PropelObjectCollection|Notificationoccurred[] Collection to store aggregation of Notificationoccurred objects.
     */
    protected $collNotificationoccurreds;
    protected $collNotificationoccurredsPartial;

    /**
     * @var        PropelObjectCollection|PersonTimetemplate[] Collection to store aggregation of PersonTimetemplate objects.
     */
    protected $collPersonTimetemplatesRelatedByCreatepersonId;
    protected $collPersonTimetemplatesRelatedByCreatepersonIdPartial;

    /**
     * @var        PropelObjectCollection|PersonTimetemplate[] Collection to store aggregation of PersonTimetemplate objects.
     */
    protected $collPersonTimetemplatesRelatedByMasterId;
    protected $collPersonTimetemplatesRelatedByMasterIdPartial;

    /**
     * @var        PropelObjectCollection|PersonTimetemplate[] Collection to store aggregation of PersonTimetemplate objects.
     */
    protected $collPersonTimetemplatesRelatedByModifypersonId;
    protected $collPersonTimetemplatesRelatedByModifypersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockmotion[] Collection to store aggregation of Stockmotion objects.
     */
    protected $collStockmotionsRelatedByCreatepersonId;
    protected $collStockmotionsRelatedByCreatepersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockmotion[] Collection to store aggregation of Stockmotion objects.
     */
    protected $collStockmotionsRelatedByModifypersonId;
    protected $collStockmotionsRelatedByModifypersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockmotion[] Collection to store aggregation of Stockmotion objects.
     */
    protected $collStockmotionsRelatedByReceiverpersonId;
    protected $collStockmotionsRelatedByReceiverpersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockmotion[] Collection to store aggregation of Stockmotion objects.
     */
    protected $collStockmotionsRelatedBySupplierpersonId;
    protected $collStockmotionsRelatedBySupplierpersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockrecipe[] Collection to store aggregation of Stockrecipe objects.
     */
    protected $collStockrecipesRelatedByCreatepersonId;
    protected $collStockrecipesRelatedByCreatepersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockrecipe[] Collection to store aggregation of Stockrecipe objects.
     */
    protected $collStockrecipesRelatedByModifypersonId;
    protected $collStockrecipesRelatedByModifypersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockrequisition[] Collection to store aggregation of Stockrequisition objects.
     */
    protected $collStockrequisitionsRelatedByCreatepersonId;
    protected $collStockrequisitionsRelatedByCreatepersonIdPartial;

    /**
     * @var        PropelObjectCollection|Stockrequisition[] Collection to store aggregation of Stockrequisition objects.
     */
    protected $collStockrequisitionsRelatedByModifypersonId;
    protected $collStockrequisitionsRelatedByModifypersonIdPartial;

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
    protected $actionpropertyPersonsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $actiontypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsMovingsRelatedByPersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsPartysRelatedByModifypersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blankactionsPartysRelatedByPersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $notificationoccurredsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personTimetemplatesRelatedByMasterIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $personTimetemplatesRelatedByModifypersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionsRelatedByCreatepersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionsRelatedByModifypersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionsRelatedByReceiverpersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionsRelatedBySupplierpersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrecipesRelatedByCreatepersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrecipesRelatedByModifypersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrequisitionsRelatedByModifypersonIdScheduledForDeletion = null;

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
        $this->availableforexternal = 1;
        $this->primaryquota = 50;
        $this->ownquota = 25;
        $this->consultancyquota = 25;
        $this->externalquota = 10;
        $this->timelineaccessibledays = 0;
        $this->maxoverqueue = 0;
        $this->maxcito = 0;
        $this->quotunit = 0;
        $this->uuid_id = 0;
    }

    /**
     * Initializes internal state of BasePerson object.
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
     * Get the [code] column value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [federalcode] column value.
     *
     * @return string
     */
    public function getFederalcode()
    {
        return $this->federalcode;
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
     * Get the [post_id] column value.
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->post_id;
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
     * Get the [org_id] column value.
     *
     * @return int
     */
    public function getOrgId()
    {
        return $this->org_id;
    }

    /**
     * Get the [orgstructure_id] column value.
     *
     * @return int
     */
    public function getOrgstructureId()
    {
        return $this->orgstructure_id;
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
     * Get the [office2] column value.
     *
     * @return string
     */
    public function getOffice2()
    {
        return $this->office2;
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
     * Get the [finance_id] column value.
     *
     * @return int
     */
    public function getFinanceId()
    {
        return $this->finance_id;
    }

    /**
     * Get the [optionally formatted] temporal [retiredate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRetiredate($format = '%x')
    {
        if ($this->retiredate === null) {
            return null;
        }

        if ($this->retiredate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->retiredate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->retiredate, true), $x);
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
     * Get the [ambplan2] column value.
     *
     * @return int
     */
    public function getAmbplan2()
    {
        return $this->ambplan2;
    }

    /**
     * Get the [ambnorm] column value.
     *
     * @return int
     */
    public function getAmbnorm()
    {
        return $this->ambnorm;
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
     * Get the [homplan2] column value.
     *
     * @return int
     */
    public function getHomplan2()
    {
        return $this->homplan2;
    }

    /**
     * Get the [homnorm] column value.
     *
     * @return int
     */
    public function getHomnorm()
    {
        return $this->homnorm;
    }

    /**
     * Get the [expplan] column value.
     *
     * @return int
     */
    public function getExpplan()
    {
        return $this->expplan;
    }

    /**
     * Get the [expnorm] column value.
     *
     * @return int
     */
    public function getExpnorm()
    {
        return $this->expnorm;
    }

    /**
     * Get the [login] column value.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [userprofile_id] column value.
     *
     * @return int
     */
    public function getUserprofileId()
    {
        return $this->userprofile_id;
    }

    /**
     * Get the [retired] column value.
     *
     * @return boolean
     */
    public function getRetired()
    {
        return $this->retired;
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
     * Get the [birthplace] column value.
     *
     * @return string
     */
    public function getBirthplace()
    {
        return $this->birthplace;
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
     * Get the [inn] column value.
     *
     * @return string
     */
    public function getInn()
    {
        return $this->inn;
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
     * Get the [primaryquota] column value.
     *
     * @return int
     */
    public function getPrimaryquota()
    {
        return $this->primaryquota;
    }

    /**
     * Get the [ownquota] column value.
     *
     * @return int
     */
    public function getOwnquota()
    {
        return $this->ownquota;
    }

    /**
     * Get the [consultancyquota] column value.
     *
     * @return int
     */
    public function getConsultancyquota()
    {
        return $this->consultancyquota;
    }

    /**
     * Get the [externalquota] column value.
     *
     * @return int
     */
    public function getExternalquota()
    {
        return $this->externalquota;
    }

    /**
     * Get the [optionally formatted] temporal [lastaccessibletimelinedate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastaccessibletimelinedate($format = '%x')
    {
        if ($this->lastaccessibletimelinedate === null) {
            return null;
        }

        if ($this->lastaccessibletimelinedate === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->lastaccessibletimelinedate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastaccessibletimelinedate, true), $x);
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
     * Get the [timelineaccessibledays] column value.
     *
     * @return int
     */
    public function getTimelineaccessibledays()
    {
        return $this->timelineaccessibledays;
    }

    /**
     * Get the [typetimelineperson] column value.
     *
     * @return int
     */
    public function getTypetimelineperson()
    {
        return $this->typetimelineperson;
    }

    /**
     * Get the [maxoverqueue] column value.
     *
     * @return int
     */
    public function getMaxoverqueue()
    {
        return $this->maxoverqueue;
    }

    /**
     * Get the [maxcito] column value.
     *
     * @return int
     */
    public function getMaxcito()
    {
        return $this->maxcito;
    }

    /**
     * Get the [quotunit] column value.
     *
     * @return int
     */
    public function getQuotunit()
    {
        return $this->quotunit;
    }

    /**
     * Get the [academicdegree_id] column value.
     *
     * @return int
     */
    public function getAcademicdegreeId()
    {
        return $this->academicdegree_id;
    }

    /**
     * Get the [academictitle_id] column value.
     *
     * @return int
     */
    public function getAcademictitleId()
    {
        return $this->academictitle_id;
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
     * @return Person The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PersonPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = PersonPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = PersonPeer::MODIFYPERSON_ID;
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
     * @return Person The current object (for fluent API support)
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
            $this->modifiedColumns[] = PersonPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = PersonPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [federalcode] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setFederalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->federalcode !== $v) {
            $this->federalcode = $v;
            $this->modifiedColumns[] = PersonPeer::FEDERALCODE;
        }


        return $this;
    } // setFederalcode()

    /**
     * Set the value of [regionalcode] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setRegionalcode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->regionalcode !== $v) {
            $this->regionalcode = $v;
            $this->modifiedColumns[] = PersonPeer::REGIONALCODE;
        }


        return $this;
    } // setRegionalcode()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[] = PersonPeer::LASTNAME;
        }


        return $this;
    } // setLastname()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[] = PersonPeer::FIRSTNAME;
        }


        return $this;
    } // setFirstname()

    /**
     * Set the value of [patrname] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setPatrname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->patrname !== $v) {
            $this->patrname = $v;
            $this->modifiedColumns[] = PersonPeer::PATRNAME;
        }


        return $this;
    } // setPatrname()

    /**
     * Set the value of [post_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setPostId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->post_id !== $v) {
            $this->post_id = $v;
            $this->modifiedColumns[] = PersonPeer::POST_ID;
        }


        return $this;
    } // setPostId()

    /**
     * Set the value of [speciality_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setSpecialityId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speciality_id !== $v) {
            $this->speciality_id = $v;
            $this->modifiedColumns[] = PersonPeer::SPECIALITY_ID;
        }


        return $this;
    } // setSpecialityId()

    /**
     * Set the value of [org_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setOrgId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->org_id !== $v) {
            $this->org_id = $v;
            $this->modifiedColumns[] = PersonPeer::ORG_ID;
        }


        return $this;
    } // setOrgId()

    /**
     * Set the value of [orgstructure_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setOrgstructureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->orgstructure_id !== $v) {
            $this->orgstructure_id = $v;
            $this->modifiedColumns[] = PersonPeer::ORGSTRUCTURE_ID;
        }


        return $this;
    } // setOrgstructureId()

    /**
     * Set the value of [office] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setOffice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->office !== $v) {
            $this->office = $v;
            $this->modifiedColumns[] = PersonPeer::OFFICE;
        }


        return $this;
    } // setOffice()

    /**
     * Set the value of [office2] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setOffice2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->office2 !== $v) {
            $this->office2 = $v;
            $this->modifiedColumns[] = PersonPeer::OFFICE2;
        }


        return $this;
    } // setOffice2()

    /**
     * Set the value of [tariffcategory_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setTariffcategoryId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tariffcategory_id !== $v) {
            $this->tariffcategory_id = $v;
            $this->modifiedColumns[] = PersonPeer::TARIFFCATEGORY_ID;
        }


        return $this;
    } // setTariffcategoryId()

    /**
     * Set the value of [finance_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setFinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->finance_id !== $v) {
            $this->finance_id = $v;
            $this->modifiedColumns[] = PersonPeer::FINANCE_ID;
        }


        return $this;
    } // setFinanceId()

    /**
     * Sets the value of [retiredate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setRetiredate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->retiredate !== null || $dt !== null) {
            $currentDateAsString = ($this->retiredate !== null && $tmpDt = new DateTime($this->retiredate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->retiredate = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::RETIREDATE;
            }
        } // if either are not null


        return $this;
    } // setRetiredate()

    /**
     * Set the value of [ambplan] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAmbplan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ambplan !== $v) {
            $this->ambplan = $v;
            $this->modifiedColumns[] = PersonPeer::AMBPLAN;
        }


        return $this;
    } // setAmbplan()

    /**
     * Set the value of [ambplan2] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAmbplan2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ambplan2 !== $v) {
            $this->ambplan2 = $v;
            $this->modifiedColumns[] = PersonPeer::AMBPLAN2;
        }


        return $this;
    } // setAmbplan2()

    /**
     * Set the value of [ambnorm] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAmbnorm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ambnorm !== $v) {
            $this->ambnorm = $v;
            $this->modifiedColumns[] = PersonPeer::AMBNORM;
        }


        return $this;
    } // setAmbnorm()

    /**
     * Set the value of [homplan] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setHomplan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->homplan !== $v) {
            $this->homplan = $v;
            $this->modifiedColumns[] = PersonPeer::HOMPLAN;
        }


        return $this;
    } // setHomplan()

    /**
     * Set the value of [homplan2] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setHomplan2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->homplan2 !== $v) {
            $this->homplan2 = $v;
            $this->modifiedColumns[] = PersonPeer::HOMPLAN2;
        }


        return $this;
    } // setHomplan2()

    /**
     * Set the value of [homnorm] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setHomnorm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->homnorm !== $v) {
            $this->homnorm = $v;
            $this->modifiedColumns[] = PersonPeer::HOMNORM;
        }


        return $this;
    } // setHomnorm()

    /**
     * Set the value of [expplan] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setExpplan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->expplan !== $v) {
            $this->expplan = $v;
            $this->modifiedColumns[] = PersonPeer::EXPPLAN;
        }


        return $this;
    } // setExpplan()

    /**
     * Set the value of [expnorm] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setExpnorm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->expnorm !== $v) {
            $this->expnorm = $v;
            $this->modifiedColumns[] = PersonPeer::EXPNORM;
        }


        return $this;
    } // setExpnorm()

    /**
     * Set the value of [login] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setLogin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->login !== $v) {
            $this->login = $v;
            $this->modifiedColumns[] = PersonPeer::LOGIN;
        }


        return $this;
    } // setLogin()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = PersonPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [userprofile_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setUserprofileId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->userprofile_id !== $v) {
            $this->userprofile_id = $v;
            $this->modifiedColumns[] = PersonPeer::USERPROFILE_ID;
        }


        return $this;
    } // setUserprofileId()

    /**
     * Sets the value of the [retired] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Person The current object (for fluent API support)
     */
    public function setRetired($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->retired !== $v) {
            $this->retired = $v;
            $this->modifiedColumns[] = PersonPeer::RETIRED;
        }


        return $this;
    } // setRetired()

    /**
     * Sets the value of [birthdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setBirthdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->birthdate !== null || $dt !== null) {
            $currentDateAsString = ($this->birthdate !== null && $tmpDt = new DateTime($this->birthdate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->birthdate = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::BIRTHDATE;
            }
        } // if either are not null


        return $this;
    } // setBirthdate()

    /**
     * Set the value of [birthplace] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setBirthplace($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->birthplace !== $v) {
            $this->birthplace = $v;
            $this->modifiedColumns[] = PersonPeer::BIRTHPLACE;
        }


        return $this;
    } // setBirthplace()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = PersonPeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [snils] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setSnils($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->snils !== $v) {
            $this->snils = $v;
            $this->modifiedColumns[] = PersonPeer::SNILS;
        }


        return $this;
    } // setSnils()

    /**
     * Set the value of [inn] column.
     *
     * @param string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setInn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->inn !== $v) {
            $this->inn = $v;
            $this->modifiedColumns[] = PersonPeer::INN;
        }


        return $this;
    } // setInn()

    /**
     * Set the value of [availableforexternal] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAvailableforexternal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->availableforexternal !== $v) {
            $this->availableforexternal = $v;
            $this->modifiedColumns[] = PersonPeer::AVAILABLEFOREXTERNAL;
        }


        return $this;
    } // setAvailableforexternal()

    /**
     * Set the value of [primaryquota] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setPrimaryquota($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->primaryquota !== $v) {
            $this->primaryquota = $v;
            $this->modifiedColumns[] = PersonPeer::PRIMARYQUOTA;
        }


        return $this;
    } // setPrimaryquota()

    /**
     * Set the value of [ownquota] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setOwnquota($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ownquota !== $v) {
            $this->ownquota = $v;
            $this->modifiedColumns[] = PersonPeer::OWNQUOTA;
        }


        return $this;
    } // setOwnquota()

    /**
     * Set the value of [consultancyquota] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setConsultancyquota($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->consultancyquota !== $v) {
            $this->consultancyquota = $v;
            $this->modifiedColumns[] = PersonPeer::CONSULTANCYQUOTA;
        }


        return $this;
    } // setConsultancyquota()

    /**
     * Set the value of [externalquota] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setExternalquota($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->externalquota !== $v) {
            $this->externalquota = $v;
            $this->modifiedColumns[] = PersonPeer::EXTERNALQUOTA;
        }


        return $this;
    } // setExternalquota()

    /**
     * Sets the value of [lastaccessibletimelinedate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Person The current object (for fluent API support)
     */
    public function setLastaccessibletimelinedate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->lastaccessibletimelinedate !== null || $dt !== null) {
            $currentDateAsString = ($this->lastaccessibletimelinedate !== null && $tmpDt = new DateTime($this->lastaccessibletimelinedate)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->lastaccessibletimelinedate = $newDateAsString;
                $this->modifiedColumns[] = PersonPeer::LASTACCESSIBLETIMELINEDATE;
            }
        } // if either are not null


        return $this;
    } // setLastaccessibletimelinedate()

    /**
     * Set the value of [timelineaccessibledays] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setTimelineaccessibledays($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->timelineaccessibledays !== $v) {
            $this->timelineaccessibledays = $v;
            $this->modifiedColumns[] = PersonPeer::TIMELINEACCESSIBLEDAYS;
        }


        return $this;
    } // setTimelineaccessibledays()

    /**
     * Set the value of [typetimelineperson] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setTypetimelineperson($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->typetimelineperson !== $v) {
            $this->typetimelineperson = $v;
            $this->modifiedColumns[] = PersonPeer::TYPETIMELINEPERSON;
        }


        return $this;
    } // setTypetimelineperson()

    /**
     * Set the value of [maxoverqueue] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setMaxoverqueue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->maxoverqueue !== $v) {
            $this->maxoverqueue = $v;
            $this->modifiedColumns[] = PersonPeer::MAXOVERQUEUE;
        }


        return $this;
    } // setMaxoverqueue()

    /**
     * Set the value of [maxcito] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setMaxcito($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->maxcito !== $v) {
            $this->maxcito = $v;
            $this->modifiedColumns[] = PersonPeer::MAXCITO;
        }


        return $this;
    } // setMaxcito()

    /**
     * Set the value of [quotunit] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setQuotunit($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->quotunit !== $v) {
            $this->quotunit = $v;
            $this->modifiedColumns[] = PersonPeer::QUOTUNIT;
        }


        return $this;
    } // setQuotunit()

    /**
     * Set the value of [academicdegree_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAcademicdegreeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->academicdegree_id !== $v) {
            $this->academicdegree_id = $v;
            $this->modifiedColumns[] = PersonPeer::ACADEMICDEGREE_ID;
        }


        return $this;
    } // setAcademicdegreeId()

    /**
     * Set the value of [academictitle_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAcademictitleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->academictitle_id !== $v) {
            $this->academictitle_id = $v;
            $this->modifiedColumns[] = PersonPeer::ACADEMICTITLE_ID;
        }


        return $this;
    } // setAcademictitleId()

    /**
     * Set the value of [uuid_id] column.
     *
     * @param int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setUuidId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->uuid_id !== $v) {
            $this->uuid_id = $v;
            $this->modifiedColumns[] = PersonPeer::UUID_ID;
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

            if ($this->availableforexternal !== 1) {
                return false;
            }

            if ($this->primaryquota !== 50) {
                return false;
            }

            if ($this->ownquota !== 25) {
                return false;
            }

            if ($this->consultancyquota !== 25) {
                return false;
            }

            if ($this->externalquota !== 10) {
                return false;
            }

            if ($this->timelineaccessibledays !== 0) {
                return false;
            }

            if ($this->maxoverqueue !== 0) {
                return false;
            }

            if ($this->maxcito !== 0) {
                return false;
            }

            if ($this->quotunit !== 0) {
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
            $this->code = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->federalcode = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->regionalcode = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->lastname = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->firstname = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->patrname = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->post_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->speciality_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->org_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->orgstructure_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->office = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->office2 = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->tariffcategory_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->finance_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->retiredate = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->ambplan = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->ambplan2 = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
            $this->ambnorm = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
            $this->homplan = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->homplan2 = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
            $this->homnorm = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
            $this->expplan = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
            $this->expnorm = ($row[$startcol + 28] !== null) ? (int) $row[$startcol + 28] : null;
            $this->login = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->password = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->userprofile_id = ($row[$startcol + 31] !== null) ? (int) $row[$startcol + 31] : null;
            $this->retired = ($row[$startcol + 32] !== null) ? (boolean) $row[$startcol + 32] : null;
            $this->birthdate = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->birthplace = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->sex = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
            $this->snils = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->inn = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->availableforexternal = ($row[$startcol + 38] !== null) ? (int) $row[$startcol + 38] : null;
            $this->primaryquota = ($row[$startcol + 39] !== null) ? (int) $row[$startcol + 39] : null;
            $this->ownquota = ($row[$startcol + 40] !== null) ? (int) $row[$startcol + 40] : null;
            $this->consultancyquota = ($row[$startcol + 41] !== null) ? (int) $row[$startcol + 41] : null;
            $this->externalquota = ($row[$startcol + 42] !== null) ? (int) $row[$startcol + 42] : null;
            $this->lastaccessibletimelinedate = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
            $this->timelineaccessibledays = ($row[$startcol + 44] !== null) ? (int) $row[$startcol + 44] : null;
            $this->typetimelineperson = ($row[$startcol + 45] !== null) ? (int) $row[$startcol + 45] : null;
            $this->maxoverqueue = ($row[$startcol + 46] !== null) ? (int) $row[$startcol + 46] : null;
            $this->maxcito = ($row[$startcol + 47] !== null) ? (int) $row[$startcol + 47] : null;
            $this->quotunit = ($row[$startcol + 48] !== null) ? (int) $row[$startcol + 48] : null;
            $this->academicdegree_id = ($row[$startcol + 49] !== null) ? (int) $row[$startcol + 49] : null;
            $this->academictitle_id = ($row[$startcol + 50] !== null) ? (int) $row[$startcol + 50] : null;
            $this->uuid_id = ($row[$startcol + 51] !== null) ? (int) $row[$startcol + 51] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 52; // 52 = PersonPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Person object", $e);
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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PersonPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collActionpropertyPersons = null;

            $this->collActiontypes = null;

            $this->collBlankactionsMovingsRelatedByCreatepersonId = null;

            $this->collBlankactionsMovingsRelatedByModifypersonId = null;

            $this->collBlankactionsMovingsRelatedByPersonId = null;

            $this->collBlankactionsPartysRelatedByCreatepersonId = null;

            $this->collBlankactionsPartysRelatedByModifypersonId = null;

            $this->collBlankactionsPartysRelatedByPersonId = null;

            $this->collNotificationoccurreds = null;

            $this->collPersonTimetemplatesRelatedByCreatepersonId = null;

            $this->collPersonTimetemplatesRelatedByMasterId = null;

            $this->collPersonTimetemplatesRelatedByModifypersonId = null;

            $this->collStockmotionsRelatedByCreatepersonId = null;

            $this->collStockmotionsRelatedByModifypersonId = null;

            $this->collStockmotionsRelatedByReceiverpersonId = null;

            $this->collStockmotionsRelatedBySupplierpersonId = null;

            $this->collStockrecipesRelatedByCreatepersonId = null;

            $this->collStockrecipesRelatedByModifypersonId = null;

            $this->collStockrequisitionsRelatedByCreatepersonId = null;

            $this->collStockrequisitionsRelatedByModifypersonId = null;

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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PersonQuery::create()
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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PersonPeer::addInstanceToPool($this);
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

            if ($this->actionpropertyPersonsScheduledForDeletion !== null) {
                if (!$this->actionpropertyPersonsScheduledForDeletion->isEmpty()) {
                    foreach ($this->actionpropertyPersonsScheduledForDeletion as $actionpropertyPerson) {
                        // need to save related object because we set the relation to null
                        $actionpropertyPerson->save($con);
                    }
                    $this->actionpropertyPersonsScheduledForDeletion = null;
                }
            }

            if ($this->collActionpropertyPersons !== null) {
                foreach ($this->collActionpropertyPersons as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->actiontypesScheduledForDeletion !== null) {
                if (!$this->actiontypesScheduledForDeletion->isEmpty()) {
                    foreach ($this->actiontypesScheduledForDeletion as $actiontype) {
                        // need to save related object because we set the relation to null
                        $actiontype->save($con);
                    }
                    $this->actiontypesScheduledForDeletion = null;
                }
            }

            if ($this->collActiontypes !== null) {
                foreach ($this->collActiontypes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion !== null) {
                if (!$this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion as $blankactionsMovingRelatedByCreatepersonId) {
                        // need to save related object because we set the relation to null
                        $blankactionsMovingRelatedByCreatepersonId->save($con);
                    }
                    $this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsMovingsRelatedByCreatepersonId !== null) {
                foreach ($this->collBlankactionsMovingsRelatedByCreatepersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion !== null) {
                if (!$this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion as $blankactionsMovingRelatedByModifypersonId) {
                        // need to save related object because we set the relation to null
                        $blankactionsMovingRelatedByModifypersonId->save($con);
                    }
                    $this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsMovingsRelatedByModifypersonId !== null) {
                foreach ($this->collBlankactionsMovingsRelatedByModifypersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion !== null) {
                if (!$this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion as $blankactionsMovingRelatedByPersonId) {
                        // need to save related object because we set the relation to null
                        $blankactionsMovingRelatedByPersonId->save($con);
                    }
                    $this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsMovingsRelatedByPersonId !== null) {
                foreach ($this->collBlankactionsMovingsRelatedByPersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion !== null) {
                if (!$this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion as $blankactionsPartyRelatedByCreatepersonId) {
                        // need to save related object because we set the relation to null
                        $blankactionsPartyRelatedByCreatepersonId->save($con);
                    }
                    $this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsPartysRelatedByCreatepersonId !== null) {
                foreach ($this->collBlankactionsPartysRelatedByCreatepersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion !== null) {
                if (!$this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion as $blankactionsPartyRelatedByModifypersonId) {
                        // need to save related object because we set the relation to null
                        $blankactionsPartyRelatedByModifypersonId->save($con);
                    }
                    $this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsPartysRelatedByModifypersonId !== null) {
                foreach ($this->collBlankactionsPartysRelatedByModifypersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->blankactionsPartysRelatedByPersonIdScheduledForDeletion !== null) {
                if (!$this->blankactionsPartysRelatedByPersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->blankactionsPartysRelatedByPersonIdScheduledForDeletion as $blankactionsPartyRelatedByPersonId) {
                        // need to save related object because we set the relation to null
                        $blankactionsPartyRelatedByPersonId->save($con);
                    }
                    $this->blankactionsPartysRelatedByPersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collBlankactionsPartysRelatedByPersonId !== null) {
                foreach ($this->collBlankactionsPartysRelatedByPersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->notificationoccurredsScheduledForDeletion !== null) {
                if (!$this->notificationoccurredsScheduledForDeletion->isEmpty()) {
                    NotificationoccurredQuery::create()
                        ->filterByPrimaryKeys($this->notificationoccurredsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->notificationoccurredsScheduledForDeletion = null;
                }
            }

            if ($this->collNotificationoccurreds !== null) {
                foreach ($this->collNotificationoccurreds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion !== null) {
                if (!$this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion as $personTimetemplateRelatedByCreatepersonId) {
                        // need to save related object because we set the relation to null
                        $personTimetemplateRelatedByCreatepersonId->save($con);
                    }
                    $this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collPersonTimetemplatesRelatedByCreatepersonId !== null) {
                foreach ($this->collPersonTimetemplatesRelatedByCreatepersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personTimetemplatesRelatedByMasterIdScheduledForDeletion !== null) {
                if (!$this->personTimetemplatesRelatedByMasterIdScheduledForDeletion->isEmpty()) {
                    PersonTimetemplateQuery::create()
                        ->filterByPrimaryKeys($this->personTimetemplatesRelatedByMasterIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personTimetemplatesRelatedByMasterIdScheduledForDeletion = null;
                }
            }

            if ($this->collPersonTimetemplatesRelatedByMasterId !== null) {
                foreach ($this->collPersonTimetemplatesRelatedByMasterId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion !== null) {
                if (!$this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion as $personTimetemplateRelatedByModifypersonId) {
                        // need to save related object because we set the relation to null
                        $personTimetemplateRelatedByModifypersonId->save($con);
                    }
                    $this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collPersonTimetemplatesRelatedByModifypersonId !== null) {
                foreach ($this->collPersonTimetemplatesRelatedByModifypersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion !== null) {
                if (!$this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion as $stockmotionRelatedByCreatepersonId) {
                        // need to save related object because we set the relation to null
                        $stockmotionRelatedByCreatepersonId->save($con);
                    }
                    $this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionsRelatedByCreatepersonId !== null) {
                foreach ($this->collStockmotionsRelatedByCreatepersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionsRelatedByModifypersonIdScheduledForDeletion !== null) {
                if (!$this->stockmotionsRelatedByModifypersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionsRelatedByModifypersonIdScheduledForDeletion as $stockmotionRelatedByModifypersonId) {
                        // need to save related object because we set the relation to null
                        $stockmotionRelatedByModifypersonId->save($con);
                    }
                    $this->stockmotionsRelatedByModifypersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionsRelatedByModifypersonId !== null) {
                foreach ($this->collStockmotionsRelatedByModifypersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion !== null) {
                if (!$this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion as $stockmotionRelatedByReceiverpersonId) {
                        // need to save related object because we set the relation to null
                        $stockmotionRelatedByReceiverpersonId->save($con);
                    }
                    $this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionsRelatedByReceiverpersonId !== null) {
                foreach ($this->collStockmotionsRelatedByReceiverpersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion !== null) {
                if (!$this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion as $stockmotionRelatedBySupplierpersonId) {
                        // need to save related object because we set the relation to null
                        $stockmotionRelatedBySupplierpersonId->save($con);
                    }
                    $this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionsRelatedBySupplierpersonId !== null) {
                foreach ($this->collStockmotionsRelatedBySupplierpersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion !== null) {
                if (!$this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion as $stockrecipeRelatedByCreatepersonId) {
                        // need to save related object because we set the relation to null
                        $stockrecipeRelatedByCreatepersonId->save($con);
                    }
                    $this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrecipesRelatedByCreatepersonId !== null) {
                foreach ($this->collStockrecipesRelatedByCreatepersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrecipesRelatedByModifypersonIdScheduledForDeletion !== null) {
                if (!$this->stockrecipesRelatedByModifypersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrecipesRelatedByModifypersonIdScheduledForDeletion as $stockrecipeRelatedByModifypersonId) {
                        // need to save related object because we set the relation to null
                        $stockrecipeRelatedByModifypersonId->save($con);
                    }
                    $this->stockrecipesRelatedByModifypersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrecipesRelatedByModifypersonId !== null) {
                foreach ($this->collStockrecipesRelatedByModifypersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion !== null) {
                if (!$this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion as $stockrequisitionRelatedByCreatepersonId) {
                        // need to save related object because we set the relation to null
                        $stockrequisitionRelatedByCreatepersonId->save($con);
                    }
                    $this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrequisitionsRelatedByCreatepersonId !== null) {
                foreach ($this->collStockrequisitionsRelatedByCreatepersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion !== null) {
                if (!$this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion as $stockrequisitionRelatedByModifypersonId) {
                        // need to save related object because we set the relation to null
                        $stockrequisitionRelatedByModifypersonId->save($con);
                    }
                    $this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockrequisitionsRelatedByModifypersonId !== null) {
                foreach ($this->collStockrequisitionsRelatedByModifypersonId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->takentissuejournalsScheduledForDeletion !== null) {
                if (!$this->takentissuejournalsScheduledForDeletion->isEmpty()) {
                    foreach ($this->takentissuejournalsScheduledForDeletion as $takentissuejournal) {
                        // need to save related object because we set the relation to null
                        $takentissuejournal->save($con);
                    }
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

        $this->modifiedColumns[] = PersonPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(PersonPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDatetime`';
        }
        if ($this->isColumnModified(PersonPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(PersonPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDatetime`';
        }
        if ($this->isColumnModified(PersonPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(PersonPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(PersonPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(PersonPeer::FEDERALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`federalCode`';
        }
        if ($this->isColumnModified(PersonPeer::REGIONALCODE)) {
            $modifiedColumns[':p' . $index++]  = '`regionalCode`';
        }
        if ($this->isColumnModified(PersonPeer::LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`lastName`';
        }
        if ($this->isColumnModified(PersonPeer::FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`firstName`';
        }
        if ($this->isColumnModified(PersonPeer::PATRNAME)) {
            $modifiedColumns[':p' . $index++]  = '`patrName`';
        }
        if ($this->isColumnModified(PersonPeer::POST_ID)) {
            $modifiedColumns[':p' . $index++]  = '`post_id`';
        }
        if ($this->isColumnModified(PersonPeer::SPECIALITY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`speciality_id`';
        }
        if ($this->isColumnModified(PersonPeer::ORG_ID)) {
            $modifiedColumns[':p' . $index++]  = '`org_id`';
        }
        if ($this->isColumnModified(PersonPeer::ORGSTRUCTURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`orgStructure_id`';
        }
        if ($this->isColumnModified(PersonPeer::OFFICE)) {
            $modifiedColumns[':p' . $index++]  = '`office`';
        }
        if ($this->isColumnModified(PersonPeer::OFFICE2)) {
            $modifiedColumns[':p' . $index++]  = '`office2`';
        }
        if ($this->isColumnModified(PersonPeer::TARIFFCATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tariffCategory_id`';
        }
        if ($this->isColumnModified(PersonPeer::FINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`finance_id`';
        }
        if ($this->isColumnModified(PersonPeer::RETIREDATE)) {
            $modifiedColumns[':p' . $index++]  = '`retireDate`';
        }
        if ($this->isColumnModified(PersonPeer::AMBPLAN)) {
            $modifiedColumns[':p' . $index++]  = '`ambPlan`';
        }
        if ($this->isColumnModified(PersonPeer::AMBPLAN2)) {
            $modifiedColumns[':p' . $index++]  = '`ambPlan2`';
        }
        if ($this->isColumnModified(PersonPeer::AMBNORM)) {
            $modifiedColumns[':p' . $index++]  = '`ambNorm`';
        }
        if ($this->isColumnModified(PersonPeer::HOMPLAN)) {
            $modifiedColumns[':p' . $index++]  = '`homPlan`';
        }
        if ($this->isColumnModified(PersonPeer::HOMPLAN2)) {
            $modifiedColumns[':p' . $index++]  = '`homPlan2`';
        }
        if ($this->isColumnModified(PersonPeer::HOMNORM)) {
            $modifiedColumns[':p' . $index++]  = '`homNorm`';
        }
        if ($this->isColumnModified(PersonPeer::EXPPLAN)) {
            $modifiedColumns[':p' . $index++]  = '`expPlan`';
        }
        if ($this->isColumnModified(PersonPeer::EXPNORM)) {
            $modifiedColumns[':p' . $index++]  = '`expNorm`';
        }
        if ($this->isColumnModified(PersonPeer::LOGIN)) {
            $modifiedColumns[':p' . $index++]  = '`login`';
        }
        if ($this->isColumnModified(PersonPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(PersonPeer::USERPROFILE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`userProfile_id`';
        }
        if ($this->isColumnModified(PersonPeer::RETIRED)) {
            $modifiedColumns[':p' . $index++]  = '`retired`';
        }
        if ($this->isColumnModified(PersonPeer::BIRTHDATE)) {
            $modifiedColumns[':p' . $index++]  = '`birthDate`';
        }
        if ($this->isColumnModified(PersonPeer::BIRTHPLACE)) {
            $modifiedColumns[':p' . $index++]  = '`birthPlace`';
        }
        if ($this->isColumnModified(PersonPeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(PersonPeer::SNILS)) {
            $modifiedColumns[':p' . $index++]  = '`SNILS`';
        }
        if ($this->isColumnModified(PersonPeer::INN)) {
            $modifiedColumns[':p' . $index++]  = '`INN`';
        }
        if ($this->isColumnModified(PersonPeer::AVAILABLEFOREXTERNAL)) {
            $modifiedColumns[':p' . $index++]  = '`availableForExternal`';
        }
        if ($this->isColumnModified(PersonPeer::PRIMARYQUOTA)) {
            $modifiedColumns[':p' . $index++]  = '`primaryQuota`';
        }
        if ($this->isColumnModified(PersonPeer::OWNQUOTA)) {
            $modifiedColumns[':p' . $index++]  = '`ownQuota`';
        }
        if ($this->isColumnModified(PersonPeer::CONSULTANCYQUOTA)) {
            $modifiedColumns[':p' . $index++]  = '`consultancyQuota`';
        }
        if ($this->isColumnModified(PersonPeer::EXTERNALQUOTA)) {
            $modifiedColumns[':p' . $index++]  = '`externalQuota`';
        }
        if ($this->isColumnModified(PersonPeer::LASTACCESSIBLETIMELINEDATE)) {
            $modifiedColumns[':p' . $index++]  = '`lastAccessibleTimelineDate`';
        }
        if ($this->isColumnModified(PersonPeer::TIMELINEACCESSIBLEDAYS)) {
            $modifiedColumns[':p' . $index++]  = '`timelineAccessibleDays`';
        }
        if ($this->isColumnModified(PersonPeer::TYPETIMELINEPERSON)) {
            $modifiedColumns[':p' . $index++]  = '`typeTimeLinePerson`';
        }
        if ($this->isColumnModified(PersonPeer::MAXOVERQUEUE)) {
            $modifiedColumns[':p' . $index++]  = '`maxOverQueue`';
        }
        if ($this->isColumnModified(PersonPeer::MAXCITO)) {
            $modifiedColumns[':p' . $index++]  = '`maxCito`';
        }
        if ($this->isColumnModified(PersonPeer::QUOTUNIT)) {
            $modifiedColumns[':p' . $index++]  = '`quotUnit`';
        }
        if ($this->isColumnModified(PersonPeer::ACADEMICDEGREE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`academicdegree_id`';
        }
        if ($this->isColumnModified(PersonPeer::ACADEMICTITLE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`academicTitle_id`';
        }
        if ($this->isColumnModified(PersonPeer::UUID_ID)) {
            $modifiedColumns[':p' . $index++]  = '`uuid_id`';
        }

        $sql = sprintf(
            'INSERT INTO `Person` (%s) VALUES (%s)',
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
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`federalCode`':
                        $stmt->bindValue($identifier, $this->federalcode, PDO::PARAM_STR);
                        break;
                    case '`regionalCode`':
                        $stmt->bindValue($identifier, $this->regionalcode, PDO::PARAM_STR);
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
                    case '`post_id`':
                        $stmt->bindValue($identifier, $this->post_id, PDO::PARAM_INT);
                        break;
                    case '`speciality_id`':
                        $stmt->bindValue($identifier, $this->speciality_id, PDO::PARAM_INT);
                        break;
                    case '`org_id`':
                        $stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
                        break;
                    case '`orgStructure_id`':
                        $stmt->bindValue($identifier, $this->orgstructure_id, PDO::PARAM_INT);
                        break;
                    case '`office`':
                        $stmt->bindValue($identifier, $this->office, PDO::PARAM_STR);
                        break;
                    case '`office2`':
                        $stmt->bindValue($identifier, $this->office2, PDO::PARAM_STR);
                        break;
                    case '`tariffCategory_id`':
                        $stmt->bindValue($identifier, $this->tariffcategory_id, PDO::PARAM_INT);
                        break;
                    case '`finance_id`':
                        $stmt->bindValue($identifier, $this->finance_id, PDO::PARAM_INT);
                        break;
                    case '`retireDate`':
                        $stmt->bindValue($identifier, $this->retiredate, PDO::PARAM_STR);
                        break;
                    case '`ambPlan`':
                        $stmt->bindValue($identifier, $this->ambplan, PDO::PARAM_INT);
                        break;
                    case '`ambPlan2`':
                        $stmt->bindValue($identifier, $this->ambplan2, PDO::PARAM_INT);
                        break;
                    case '`ambNorm`':
                        $stmt->bindValue($identifier, $this->ambnorm, PDO::PARAM_INT);
                        break;
                    case '`homPlan`':
                        $stmt->bindValue($identifier, $this->homplan, PDO::PARAM_INT);
                        break;
                    case '`homPlan2`':
                        $stmt->bindValue($identifier, $this->homplan2, PDO::PARAM_INT);
                        break;
                    case '`homNorm`':
                        $stmt->bindValue($identifier, $this->homnorm, PDO::PARAM_INT);
                        break;
                    case '`expPlan`':
                        $stmt->bindValue($identifier, $this->expplan, PDO::PARAM_INT);
                        break;
                    case '`expNorm`':
                        $stmt->bindValue($identifier, $this->expnorm, PDO::PARAM_INT);
                        break;
                    case '`login`':
                        $stmt->bindValue($identifier, $this->login, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`userProfile_id`':
                        $stmt->bindValue($identifier, $this->userprofile_id, PDO::PARAM_INT);
                        break;
                    case '`retired`':
                        $stmt->bindValue($identifier, (int) $this->retired, PDO::PARAM_INT);
                        break;
                    case '`birthDate`':
                        $stmt->bindValue($identifier, $this->birthdate, PDO::PARAM_STR);
                        break;
                    case '`birthPlace`':
                        $stmt->bindValue($identifier, $this->birthplace, PDO::PARAM_STR);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_INT);
                        break;
                    case '`SNILS`':
                        $stmt->bindValue($identifier, $this->snils, PDO::PARAM_STR);
                        break;
                    case '`INN`':
                        $stmt->bindValue($identifier, $this->inn, PDO::PARAM_STR);
                        break;
                    case '`availableForExternal`':
                        $stmt->bindValue($identifier, $this->availableforexternal, PDO::PARAM_INT);
                        break;
                    case '`primaryQuota`':
                        $stmt->bindValue($identifier, $this->primaryquota, PDO::PARAM_INT);
                        break;
                    case '`ownQuota`':
                        $stmt->bindValue($identifier, $this->ownquota, PDO::PARAM_INT);
                        break;
                    case '`consultancyQuota`':
                        $stmt->bindValue($identifier, $this->consultancyquota, PDO::PARAM_INT);
                        break;
                    case '`externalQuota`':
                        $stmt->bindValue($identifier, $this->externalquota, PDO::PARAM_INT);
                        break;
                    case '`lastAccessibleTimelineDate`':
                        $stmt->bindValue($identifier, $this->lastaccessibletimelinedate, PDO::PARAM_STR);
                        break;
                    case '`timelineAccessibleDays`':
                        $stmt->bindValue($identifier, $this->timelineaccessibledays, PDO::PARAM_INT);
                        break;
                    case '`typeTimeLinePerson`':
                        $stmt->bindValue($identifier, $this->typetimelineperson, PDO::PARAM_INT);
                        break;
                    case '`maxOverQueue`':
                        $stmt->bindValue($identifier, $this->maxoverqueue, PDO::PARAM_INT);
                        break;
                    case '`maxCito`':
                        $stmt->bindValue($identifier, $this->maxcito, PDO::PARAM_INT);
                        break;
                    case '`quotUnit`':
                        $stmt->bindValue($identifier, $this->quotunit, PDO::PARAM_INT);
                        break;
                    case '`academicdegree_id`':
                        $stmt->bindValue($identifier, $this->academicdegree_id, PDO::PARAM_INT);
                        break;
                    case '`academicTitle_id`':
                        $stmt->bindValue($identifier, $this->academictitle_id, PDO::PARAM_INT);
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


            if (($retval = PersonPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collActionpropertyPersons !== null) {
                    foreach ($this->collActionpropertyPersons as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActiontypes !== null) {
                    foreach ($this->collActiontypes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionsMovingsRelatedByCreatepersonId !== null) {
                    foreach ($this->collBlankactionsMovingsRelatedByCreatepersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionsMovingsRelatedByModifypersonId !== null) {
                    foreach ($this->collBlankactionsMovingsRelatedByModifypersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionsMovingsRelatedByPersonId !== null) {
                    foreach ($this->collBlankactionsMovingsRelatedByPersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionsPartysRelatedByCreatepersonId !== null) {
                    foreach ($this->collBlankactionsPartysRelatedByCreatepersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionsPartysRelatedByModifypersonId !== null) {
                    foreach ($this->collBlankactionsPartysRelatedByModifypersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlankactionsPartysRelatedByPersonId !== null) {
                    foreach ($this->collBlankactionsPartysRelatedByPersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNotificationoccurreds !== null) {
                    foreach ($this->collNotificationoccurreds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonTimetemplatesRelatedByCreatepersonId !== null) {
                    foreach ($this->collPersonTimetemplatesRelatedByCreatepersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonTimetemplatesRelatedByMasterId !== null) {
                    foreach ($this->collPersonTimetemplatesRelatedByMasterId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPersonTimetemplatesRelatedByModifypersonId !== null) {
                    foreach ($this->collPersonTimetemplatesRelatedByModifypersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionsRelatedByCreatepersonId !== null) {
                    foreach ($this->collStockmotionsRelatedByCreatepersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionsRelatedByModifypersonId !== null) {
                    foreach ($this->collStockmotionsRelatedByModifypersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionsRelatedByReceiverpersonId !== null) {
                    foreach ($this->collStockmotionsRelatedByReceiverpersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionsRelatedBySupplierpersonId !== null) {
                    foreach ($this->collStockmotionsRelatedBySupplierpersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrecipesRelatedByCreatepersonId !== null) {
                    foreach ($this->collStockrecipesRelatedByCreatepersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrecipesRelatedByModifypersonId !== null) {
                    foreach ($this->collStockrecipesRelatedByModifypersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrequisitionsRelatedByCreatepersonId !== null) {
                    foreach ($this->collStockrequisitionsRelatedByCreatepersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrequisitionsRelatedByModifypersonId !== null) {
                    foreach ($this->collStockrequisitionsRelatedByModifypersonId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
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
        $pos = PersonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCode();
                break;
            case 7:
                return $this->getFederalcode();
                break;
            case 8:
                return $this->getRegionalcode();
                break;
            case 9:
                return $this->getLastname();
                break;
            case 10:
                return $this->getFirstname();
                break;
            case 11:
                return $this->getPatrname();
                break;
            case 12:
                return $this->getPostId();
                break;
            case 13:
                return $this->getSpecialityId();
                break;
            case 14:
                return $this->getOrgId();
                break;
            case 15:
                return $this->getOrgstructureId();
                break;
            case 16:
                return $this->getOffice();
                break;
            case 17:
                return $this->getOffice2();
                break;
            case 18:
                return $this->getTariffcategoryId();
                break;
            case 19:
                return $this->getFinanceId();
                break;
            case 20:
                return $this->getRetiredate();
                break;
            case 21:
                return $this->getAmbplan();
                break;
            case 22:
                return $this->getAmbplan2();
                break;
            case 23:
                return $this->getAmbnorm();
                break;
            case 24:
                return $this->getHomplan();
                break;
            case 25:
                return $this->getHomplan2();
                break;
            case 26:
                return $this->getHomnorm();
                break;
            case 27:
                return $this->getExpplan();
                break;
            case 28:
                return $this->getExpnorm();
                break;
            case 29:
                return $this->getLogin();
                break;
            case 30:
                return $this->getPassword();
                break;
            case 31:
                return $this->getUserprofileId();
                break;
            case 32:
                return $this->getRetired();
                break;
            case 33:
                return $this->getBirthdate();
                break;
            case 34:
                return $this->getBirthplace();
                break;
            case 35:
                return $this->getSex();
                break;
            case 36:
                return $this->getSnils();
                break;
            case 37:
                return $this->getInn();
                break;
            case 38:
                return $this->getAvailableforexternal();
                break;
            case 39:
                return $this->getPrimaryquota();
                break;
            case 40:
                return $this->getOwnquota();
                break;
            case 41:
                return $this->getConsultancyquota();
                break;
            case 42:
                return $this->getExternalquota();
                break;
            case 43:
                return $this->getLastaccessibletimelinedate();
                break;
            case 44:
                return $this->getTimelineaccessibledays();
                break;
            case 45:
                return $this->getTypetimelineperson();
                break;
            case 46:
                return $this->getMaxoverqueue();
                break;
            case 47:
                return $this->getMaxcito();
                break;
            case 48:
                return $this->getQuotunit();
                break;
            case 49:
                return $this->getAcademicdegreeId();
                break;
            case 50:
                return $this->getAcademictitleId();
                break;
            case 51:
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
        if (isset($alreadyDumpedObjects['Person'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Person'][$this->getPrimaryKey()] = true;
        $keys = PersonPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCreatedatetime(),
            $keys[2] => $this->getCreatepersonId(),
            $keys[3] => $this->getModifydatetime(),
            $keys[4] => $this->getModifypersonId(),
            $keys[5] => $this->getDeleted(),
            $keys[6] => $this->getCode(),
            $keys[7] => $this->getFederalcode(),
            $keys[8] => $this->getRegionalcode(),
            $keys[9] => $this->getLastname(),
            $keys[10] => $this->getFirstname(),
            $keys[11] => $this->getPatrname(),
            $keys[12] => $this->getPostId(),
            $keys[13] => $this->getSpecialityId(),
            $keys[14] => $this->getOrgId(),
            $keys[15] => $this->getOrgstructureId(),
            $keys[16] => $this->getOffice(),
            $keys[17] => $this->getOffice2(),
            $keys[18] => $this->getTariffcategoryId(),
            $keys[19] => $this->getFinanceId(),
            $keys[20] => $this->getRetiredate(),
            $keys[21] => $this->getAmbplan(),
            $keys[22] => $this->getAmbplan2(),
            $keys[23] => $this->getAmbnorm(),
            $keys[24] => $this->getHomplan(),
            $keys[25] => $this->getHomplan2(),
            $keys[26] => $this->getHomnorm(),
            $keys[27] => $this->getExpplan(),
            $keys[28] => $this->getExpnorm(),
            $keys[29] => $this->getLogin(),
            $keys[30] => $this->getPassword(),
            $keys[31] => $this->getUserprofileId(),
            $keys[32] => $this->getRetired(),
            $keys[33] => $this->getBirthdate(),
            $keys[34] => $this->getBirthplace(),
            $keys[35] => $this->getSex(),
            $keys[36] => $this->getSnils(),
            $keys[37] => $this->getInn(),
            $keys[38] => $this->getAvailableforexternal(),
            $keys[39] => $this->getPrimaryquota(),
            $keys[40] => $this->getOwnquota(),
            $keys[41] => $this->getConsultancyquota(),
            $keys[42] => $this->getExternalquota(),
            $keys[43] => $this->getLastaccessibletimelinedate(),
            $keys[44] => $this->getTimelineaccessibledays(),
            $keys[45] => $this->getTypetimelineperson(),
            $keys[46] => $this->getMaxoverqueue(),
            $keys[47] => $this->getMaxcito(),
            $keys[48] => $this->getQuotunit(),
            $keys[49] => $this->getAcademicdegreeId(),
            $keys[50] => $this->getAcademictitleId(),
            $keys[51] => $this->getUuidId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collActionpropertyPersons) {
                $result['ActionpropertyPersons'] = $this->collActionpropertyPersons->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActiontypes) {
                $result['Actiontypes'] = $this->collActiontypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionsMovingsRelatedByCreatepersonId) {
                $result['BlankactionsMovingsRelatedByCreatepersonId'] = $this->collBlankactionsMovingsRelatedByCreatepersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionsMovingsRelatedByModifypersonId) {
                $result['BlankactionsMovingsRelatedByModifypersonId'] = $this->collBlankactionsMovingsRelatedByModifypersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionsMovingsRelatedByPersonId) {
                $result['BlankactionsMovingsRelatedByPersonId'] = $this->collBlankactionsMovingsRelatedByPersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionsPartysRelatedByCreatepersonId) {
                $result['BlankactionsPartysRelatedByCreatepersonId'] = $this->collBlankactionsPartysRelatedByCreatepersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionsPartysRelatedByModifypersonId) {
                $result['BlankactionsPartysRelatedByModifypersonId'] = $this->collBlankactionsPartysRelatedByModifypersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlankactionsPartysRelatedByPersonId) {
                $result['BlankactionsPartysRelatedByPersonId'] = $this->collBlankactionsPartysRelatedByPersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNotificationoccurreds) {
                $result['Notificationoccurreds'] = $this->collNotificationoccurreds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonTimetemplatesRelatedByCreatepersonId) {
                $result['PersonTimetemplatesRelatedByCreatepersonId'] = $this->collPersonTimetemplatesRelatedByCreatepersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonTimetemplatesRelatedByMasterId) {
                $result['PersonTimetemplatesRelatedByMasterId'] = $this->collPersonTimetemplatesRelatedByMasterId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonTimetemplatesRelatedByModifypersonId) {
                $result['PersonTimetemplatesRelatedByModifypersonId'] = $this->collPersonTimetemplatesRelatedByModifypersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionsRelatedByCreatepersonId) {
                $result['StockmotionsRelatedByCreatepersonId'] = $this->collStockmotionsRelatedByCreatepersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionsRelatedByModifypersonId) {
                $result['StockmotionsRelatedByModifypersonId'] = $this->collStockmotionsRelatedByModifypersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionsRelatedByReceiverpersonId) {
                $result['StockmotionsRelatedByReceiverpersonId'] = $this->collStockmotionsRelatedByReceiverpersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionsRelatedBySupplierpersonId) {
                $result['StockmotionsRelatedBySupplierpersonId'] = $this->collStockmotionsRelatedBySupplierpersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrecipesRelatedByCreatepersonId) {
                $result['StockrecipesRelatedByCreatepersonId'] = $this->collStockrecipesRelatedByCreatepersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrecipesRelatedByModifypersonId) {
                $result['StockrecipesRelatedByModifypersonId'] = $this->collStockrecipesRelatedByModifypersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrequisitionsRelatedByCreatepersonId) {
                $result['StockrequisitionsRelatedByCreatepersonId'] = $this->collStockrequisitionsRelatedByCreatepersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrequisitionsRelatedByModifypersonId) {
                $result['StockrequisitionsRelatedByModifypersonId'] = $this->collStockrequisitionsRelatedByModifypersonId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PersonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCode($value);
                break;
            case 7:
                $this->setFederalcode($value);
                break;
            case 8:
                $this->setRegionalcode($value);
                break;
            case 9:
                $this->setLastname($value);
                break;
            case 10:
                $this->setFirstname($value);
                break;
            case 11:
                $this->setPatrname($value);
                break;
            case 12:
                $this->setPostId($value);
                break;
            case 13:
                $this->setSpecialityId($value);
                break;
            case 14:
                $this->setOrgId($value);
                break;
            case 15:
                $this->setOrgstructureId($value);
                break;
            case 16:
                $this->setOffice($value);
                break;
            case 17:
                $this->setOffice2($value);
                break;
            case 18:
                $this->setTariffcategoryId($value);
                break;
            case 19:
                $this->setFinanceId($value);
                break;
            case 20:
                $this->setRetiredate($value);
                break;
            case 21:
                $this->setAmbplan($value);
                break;
            case 22:
                $this->setAmbplan2($value);
                break;
            case 23:
                $this->setAmbnorm($value);
                break;
            case 24:
                $this->setHomplan($value);
                break;
            case 25:
                $this->setHomplan2($value);
                break;
            case 26:
                $this->setHomnorm($value);
                break;
            case 27:
                $this->setExpplan($value);
                break;
            case 28:
                $this->setExpnorm($value);
                break;
            case 29:
                $this->setLogin($value);
                break;
            case 30:
                $this->setPassword($value);
                break;
            case 31:
                $this->setUserprofileId($value);
                break;
            case 32:
                $this->setRetired($value);
                break;
            case 33:
                $this->setBirthdate($value);
                break;
            case 34:
                $this->setBirthplace($value);
                break;
            case 35:
                $this->setSex($value);
                break;
            case 36:
                $this->setSnils($value);
                break;
            case 37:
                $this->setInn($value);
                break;
            case 38:
                $this->setAvailableforexternal($value);
                break;
            case 39:
                $this->setPrimaryquota($value);
                break;
            case 40:
                $this->setOwnquota($value);
                break;
            case 41:
                $this->setConsultancyquota($value);
                break;
            case 42:
                $this->setExternalquota($value);
                break;
            case 43:
                $this->setLastaccessibletimelinedate($value);
                break;
            case 44:
                $this->setTimelineaccessibledays($value);
                break;
            case 45:
                $this->setTypetimelineperson($value);
                break;
            case 46:
                $this->setMaxoverqueue($value);
                break;
            case 47:
                $this->setMaxcito($value);
                break;
            case 48:
                $this->setQuotunit($value);
                break;
            case 49:
                $this->setAcademicdegreeId($value);
                break;
            case 50:
                $this->setAcademictitleId($value);
                break;
            case 51:
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
        $keys = PersonPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCreatedatetime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatepersonId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setModifydatetime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setModifypersonId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeleted($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCode($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setFederalcode($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRegionalcode($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastname($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setFirstname($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setPatrname($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setPostId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSpecialityId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setOrgId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setOrgstructureId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setOffice($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setOffice2($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setTariffcategoryId($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setFinanceId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setRetiredate($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setAmbplan($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setAmbplan2($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setAmbnorm($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setHomplan($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setHomplan2($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setHomnorm($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setExpplan($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setExpnorm($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setLogin($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setPassword($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setUserprofileId($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setRetired($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setBirthdate($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setBirthplace($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setSex($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setSnils($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setInn($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setAvailableforexternal($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setPrimaryquota($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setOwnquota($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setConsultancyquota($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setExternalquota($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setLastaccessibletimelinedate($arr[$keys[43]]);
        if (array_key_exists($keys[44], $arr)) $this->setTimelineaccessibledays($arr[$keys[44]]);
        if (array_key_exists($keys[45], $arr)) $this->setTypetimelineperson($arr[$keys[45]]);
        if (array_key_exists($keys[46], $arr)) $this->setMaxoverqueue($arr[$keys[46]]);
        if (array_key_exists($keys[47], $arr)) $this->setMaxcito($arr[$keys[47]]);
        if (array_key_exists($keys[48], $arr)) $this->setQuotunit($arr[$keys[48]]);
        if (array_key_exists($keys[49], $arr)) $this->setAcademicdegreeId($arr[$keys[49]]);
        if (array_key_exists($keys[50], $arr)) $this->setAcademictitleId($arr[$keys[50]]);
        if (array_key_exists($keys[51], $arr)) $this->setUuidId($arr[$keys[51]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PersonPeer::DATABASE_NAME);

        if ($this->isColumnModified(PersonPeer::ID)) $criteria->add(PersonPeer::ID, $this->id);
        if ($this->isColumnModified(PersonPeer::CREATEDATETIME)) $criteria->add(PersonPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(PersonPeer::CREATEPERSON_ID)) $criteria->add(PersonPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(PersonPeer::MODIFYDATETIME)) $criteria->add(PersonPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(PersonPeer::MODIFYPERSON_ID)) $criteria->add(PersonPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(PersonPeer::DELETED)) $criteria->add(PersonPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(PersonPeer::CODE)) $criteria->add(PersonPeer::CODE, $this->code);
        if ($this->isColumnModified(PersonPeer::FEDERALCODE)) $criteria->add(PersonPeer::FEDERALCODE, $this->federalcode);
        if ($this->isColumnModified(PersonPeer::REGIONALCODE)) $criteria->add(PersonPeer::REGIONALCODE, $this->regionalcode);
        if ($this->isColumnModified(PersonPeer::LASTNAME)) $criteria->add(PersonPeer::LASTNAME, $this->lastname);
        if ($this->isColumnModified(PersonPeer::FIRSTNAME)) $criteria->add(PersonPeer::FIRSTNAME, $this->firstname);
        if ($this->isColumnModified(PersonPeer::PATRNAME)) $criteria->add(PersonPeer::PATRNAME, $this->patrname);
        if ($this->isColumnModified(PersonPeer::POST_ID)) $criteria->add(PersonPeer::POST_ID, $this->post_id);
        if ($this->isColumnModified(PersonPeer::SPECIALITY_ID)) $criteria->add(PersonPeer::SPECIALITY_ID, $this->speciality_id);
        if ($this->isColumnModified(PersonPeer::ORG_ID)) $criteria->add(PersonPeer::ORG_ID, $this->org_id);
        if ($this->isColumnModified(PersonPeer::ORGSTRUCTURE_ID)) $criteria->add(PersonPeer::ORGSTRUCTURE_ID, $this->orgstructure_id);
        if ($this->isColumnModified(PersonPeer::OFFICE)) $criteria->add(PersonPeer::OFFICE, $this->office);
        if ($this->isColumnModified(PersonPeer::OFFICE2)) $criteria->add(PersonPeer::OFFICE2, $this->office2);
        if ($this->isColumnModified(PersonPeer::TARIFFCATEGORY_ID)) $criteria->add(PersonPeer::TARIFFCATEGORY_ID, $this->tariffcategory_id);
        if ($this->isColumnModified(PersonPeer::FINANCE_ID)) $criteria->add(PersonPeer::FINANCE_ID, $this->finance_id);
        if ($this->isColumnModified(PersonPeer::RETIREDATE)) $criteria->add(PersonPeer::RETIREDATE, $this->retiredate);
        if ($this->isColumnModified(PersonPeer::AMBPLAN)) $criteria->add(PersonPeer::AMBPLAN, $this->ambplan);
        if ($this->isColumnModified(PersonPeer::AMBPLAN2)) $criteria->add(PersonPeer::AMBPLAN2, $this->ambplan2);
        if ($this->isColumnModified(PersonPeer::AMBNORM)) $criteria->add(PersonPeer::AMBNORM, $this->ambnorm);
        if ($this->isColumnModified(PersonPeer::HOMPLAN)) $criteria->add(PersonPeer::HOMPLAN, $this->homplan);
        if ($this->isColumnModified(PersonPeer::HOMPLAN2)) $criteria->add(PersonPeer::HOMPLAN2, $this->homplan2);
        if ($this->isColumnModified(PersonPeer::HOMNORM)) $criteria->add(PersonPeer::HOMNORM, $this->homnorm);
        if ($this->isColumnModified(PersonPeer::EXPPLAN)) $criteria->add(PersonPeer::EXPPLAN, $this->expplan);
        if ($this->isColumnModified(PersonPeer::EXPNORM)) $criteria->add(PersonPeer::EXPNORM, $this->expnorm);
        if ($this->isColumnModified(PersonPeer::LOGIN)) $criteria->add(PersonPeer::LOGIN, $this->login);
        if ($this->isColumnModified(PersonPeer::PASSWORD)) $criteria->add(PersonPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(PersonPeer::USERPROFILE_ID)) $criteria->add(PersonPeer::USERPROFILE_ID, $this->userprofile_id);
        if ($this->isColumnModified(PersonPeer::RETIRED)) $criteria->add(PersonPeer::RETIRED, $this->retired);
        if ($this->isColumnModified(PersonPeer::BIRTHDATE)) $criteria->add(PersonPeer::BIRTHDATE, $this->birthdate);
        if ($this->isColumnModified(PersonPeer::BIRTHPLACE)) $criteria->add(PersonPeer::BIRTHPLACE, $this->birthplace);
        if ($this->isColumnModified(PersonPeer::SEX)) $criteria->add(PersonPeer::SEX, $this->sex);
        if ($this->isColumnModified(PersonPeer::SNILS)) $criteria->add(PersonPeer::SNILS, $this->snils);
        if ($this->isColumnModified(PersonPeer::INN)) $criteria->add(PersonPeer::INN, $this->inn);
        if ($this->isColumnModified(PersonPeer::AVAILABLEFOREXTERNAL)) $criteria->add(PersonPeer::AVAILABLEFOREXTERNAL, $this->availableforexternal);
        if ($this->isColumnModified(PersonPeer::PRIMARYQUOTA)) $criteria->add(PersonPeer::PRIMARYQUOTA, $this->primaryquota);
        if ($this->isColumnModified(PersonPeer::OWNQUOTA)) $criteria->add(PersonPeer::OWNQUOTA, $this->ownquota);
        if ($this->isColumnModified(PersonPeer::CONSULTANCYQUOTA)) $criteria->add(PersonPeer::CONSULTANCYQUOTA, $this->consultancyquota);
        if ($this->isColumnModified(PersonPeer::EXTERNALQUOTA)) $criteria->add(PersonPeer::EXTERNALQUOTA, $this->externalquota);
        if ($this->isColumnModified(PersonPeer::LASTACCESSIBLETIMELINEDATE)) $criteria->add(PersonPeer::LASTACCESSIBLETIMELINEDATE, $this->lastaccessibletimelinedate);
        if ($this->isColumnModified(PersonPeer::TIMELINEACCESSIBLEDAYS)) $criteria->add(PersonPeer::TIMELINEACCESSIBLEDAYS, $this->timelineaccessibledays);
        if ($this->isColumnModified(PersonPeer::TYPETIMELINEPERSON)) $criteria->add(PersonPeer::TYPETIMELINEPERSON, $this->typetimelineperson);
        if ($this->isColumnModified(PersonPeer::MAXOVERQUEUE)) $criteria->add(PersonPeer::MAXOVERQUEUE, $this->maxoverqueue);
        if ($this->isColumnModified(PersonPeer::MAXCITO)) $criteria->add(PersonPeer::MAXCITO, $this->maxcito);
        if ($this->isColumnModified(PersonPeer::QUOTUNIT)) $criteria->add(PersonPeer::QUOTUNIT, $this->quotunit);
        if ($this->isColumnModified(PersonPeer::ACADEMICDEGREE_ID)) $criteria->add(PersonPeer::ACADEMICDEGREE_ID, $this->academicdegree_id);
        if ($this->isColumnModified(PersonPeer::ACADEMICTITLE_ID)) $criteria->add(PersonPeer::ACADEMICTITLE_ID, $this->academictitle_id);
        if ($this->isColumnModified(PersonPeer::UUID_ID)) $criteria->add(PersonPeer::UUID_ID, $this->uuid_id);

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
        $criteria = new Criteria(PersonPeer::DATABASE_NAME);
        $criteria->add(PersonPeer::ID, $this->id);

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
     * @param object $copyObj An object of Person (or compatible) type.
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
        $copyObj->setCode($this->getCode());
        $copyObj->setFederalcode($this->getFederalcode());
        $copyObj->setRegionalcode($this->getRegionalcode());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setPatrname($this->getPatrname());
        $copyObj->setPostId($this->getPostId());
        $copyObj->setSpecialityId($this->getSpecialityId());
        $copyObj->setOrgId($this->getOrgId());
        $copyObj->setOrgstructureId($this->getOrgstructureId());
        $copyObj->setOffice($this->getOffice());
        $copyObj->setOffice2($this->getOffice2());
        $copyObj->setTariffcategoryId($this->getTariffcategoryId());
        $copyObj->setFinanceId($this->getFinanceId());
        $copyObj->setRetiredate($this->getRetiredate());
        $copyObj->setAmbplan($this->getAmbplan());
        $copyObj->setAmbplan2($this->getAmbplan2());
        $copyObj->setAmbnorm($this->getAmbnorm());
        $copyObj->setHomplan($this->getHomplan());
        $copyObj->setHomplan2($this->getHomplan2());
        $copyObj->setHomnorm($this->getHomnorm());
        $copyObj->setExpplan($this->getExpplan());
        $copyObj->setExpnorm($this->getExpnorm());
        $copyObj->setLogin($this->getLogin());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setUserprofileId($this->getUserprofileId());
        $copyObj->setRetired($this->getRetired());
        $copyObj->setBirthdate($this->getBirthdate());
        $copyObj->setBirthplace($this->getBirthplace());
        $copyObj->setSex($this->getSex());
        $copyObj->setSnils($this->getSnils());
        $copyObj->setInn($this->getInn());
        $copyObj->setAvailableforexternal($this->getAvailableforexternal());
        $copyObj->setPrimaryquota($this->getPrimaryquota());
        $copyObj->setOwnquota($this->getOwnquota());
        $copyObj->setConsultancyquota($this->getConsultancyquota());
        $copyObj->setExternalquota($this->getExternalquota());
        $copyObj->setLastaccessibletimelinedate($this->getLastaccessibletimelinedate());
        $copyObj->setTimelineaccessibledays($this->getTimelineaccessibledays());
        $copyObj->setTypetimelineperson($this->getTypetimelineperson());
        $copyObj->setMaxoverqueue($this->getMaxoverqueue());
        $copyObj->setMaxcito($this->getMaxcito());
        $copyObj->setQuotunit($this->getQuotunit());
        $copyObj->setAcademicdegreeId($this->getAcademicdegreeId());
        $copyObj->setAcademictitleId($this->getAcademictitleId());
        $copyObj->setUuidId($this->getUuidId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getActionpropertyPersons() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionpropertyPerson($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActiontypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiontype($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionsMovingsRelatedByCreatepersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsMovingRelatedByCreatepersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionsMovingsRelatedByModifypersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsMovingRelatedByModifypersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionsMovingsRelatedByPersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsMovingRelatedByPersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionsPartysRelatedByCreatepersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsPartyRelatedByCreatepersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionsPartysRelatedByModifypersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsPartyRelatedByModifypersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlankactionsPartysRelatedByPersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlankactionsPartyRelatedByPersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNotificationoccurreds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNotificationoccurred($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonTimetemplatesRelatedByCreatepersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonTimetemplateRelatedByCreatepersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonTimetemplatesRelatedByMasterId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonTimetemplateRelatedByMasterId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonTimetemplatesRelatedByModifypersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonTimetemplateRelatedByModifypersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionsRelatedByCreatepersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionRelatedByCreatepersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionsRelatedByModifypersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionRelatedByModifypersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionsRelatedByReceiverpersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionRelatedByReceiverpersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionsRelatedBySupplierpersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionRelatedBySupplierpersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrecipesRelatedByCreatepersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrecipeRelatedByCreatepersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrecipesRelatedByModifypersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrecipeRelatedByModifypersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrequisitionsRelatedByCreatepersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrequisitionRelatedByCreatepersonId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrequisitionsRelatedByModifypersonId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrequisitionRelatedByModifypersonId($relObj->copy($deepCopy));
                }
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
     * @return Person Clone of current object.
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
     * @return PersonPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PersonPeer();
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
        if ('ActionpropertyPerson' == $relationName) {
            $this->initActionpropertyPersons();
        }
        if ('Actiontype' == $relationName) {
            $this->initActiontypes();
        }
        if ('BlankactionsMovingRelatedByCreatepersonId' == $relationName) {
            $this->initBlankactionsMovingsRelatedByCreatepersonId();
        }
        if ('BlankactionsMovingRelatedByModifypersonId' == $relationName) {
            $this->initBlankactionsMovingsRelatedByModifypersonId();
        }
        if ('BlankactionsMovingRelatedByPersonId' == $relationName) {
            $this->initBlankactionsMovingsRelatedByPersonId();
        }
        if ('BlankactionsPartyRelatedByCreatepersonId' == $relationName) {
            $this->initBlankactionsPartysRelatedByCreatepersonId();
        }
        if ('BlankactionsPartyRelatedByModifypersonId' == $relationName) {
            $this->initBlankactionsPartysRelatedByModifypersonId();
        }
        if ('BlankactionsPartyRelatedByPersonId' == $relationName) {
            $this->initBlankactionsPartysRelatedByPersonId();
        }
        if ('Notificationoccurred' == $relationName) {
            $this->initNotificationoccurreds();
        }
        if ('PersonTimetemplateRelatedByCreatepersonId' == $relationName) {
            $this->initPersonTimetemplatesRelatedByCreatepersonId();
        }
        if ('PersonTimetemplateRelatedByMasterId' == $relationName) {
            $this->initPersonTimetemplatesRelatedByMasterId();
        }
        if ('PersonTimetemplateRelatedByModifypersonId' == $relationName) {
            $this->initPersonTimetemplatesRelatedByModifypersonId();
        }
        if ('StockmotionRelatedByCreatepersonId' == $relationName) {
            $this->initStockmotionsRelatedByCreatepersonId();
        }
        if ('StockmotionRelatedByModifypersonId' == $relationName) {
            $this->initStockmotionsRelatedByModifypersonId();
        }
        if ('StockmotionRelatedByReceiverpersonId' == $relationName) {
            $this->initStockmotionsRelatedByReceiverpersonId();
        }
        if ('StockmotionRelatedBySupplierpersonId' == $relationName) {
            $this->initStockmotionsRelatedBySupplierpersonId();
        }
        if ('StockrecipeRelatedByCreatepersonId' == $relationName) {
            $this->initStockrecipesRelatedByCreatepersonId();
        }
        if ('StockrecipeRelatedByModifypersonId' == $relationName) {
            $this->initStockrecipesRelatedByModifypersonId();
        }
        if ('StockrequisitionRelatedByCreatepersonId' == $relationName) {
            $this->initStockrequisitionsRelatedByCreatepersonId();
        }
        if ('StockrequisitionRelatedByModifypersonId' == $relationName) {
            $this->initStockrequisitionsRelatedByModifypersonId();
        }
        if ('Takentissuejournal' == $relationName) {
            $this->initTakentissuejournals();
        }
    }

    /**
     * Clears out the collActionpropertyPersons collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addActionpropertyPersons()
     */
    public function clearActionpropertyPersons()
    {
        $this->collActionpropertyPersons = null; // important to set this to null since that means it is uninitialized
        $this->collActionpropertyPersonsPartial = null;

        return $this;
    }

    /**
     * reset is the collActionpropertyPersons collection loaded partially
     *
     * @return void
     */
    public function resetPartialActionpropertyPersons($v = true)
    {
        $this->collActionpropertyPersonsPartial = $v;
    }

    /**
     * Initializes the collActionpropertyPersons collection.
     *
     * By default this just sets the collActionpropertyPersons collection to an empty array (like clearcollActionpropertyPersons());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActionpropertyPersons($overrideExisting = true)
    {
        if (null !== $this->collActionpropertyPersons && !$overrideExisting) {
            return;
        }
        $this->collActionpropertyPersons = new PropelObjectCollection();
        $this->collActionpropertyPersons->setModel('ActionpropertyPerson');
    }

    /**
     * Gets an array of ActionpropertyPerson objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ActionpropertyPerson[] List of ActionpropertyPerson objects
     * @throws PropelException
     */
    public function getActionpropertyPersons($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyPersonsPartial && !$this->isNew();
        if (null === $this->collActionpropertyPersons || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyPersons) {
                // return empty collection
                $this->initActionpropertyPersons();
            } else {
                $collActionpropertyPersons = ActionpropertyPersonQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActionpropertyPersonsPartial && count($collActionpropertyPersons)) {
                      $this->initActionpropertyPersons(false);

                      foreach($collActionpropertyPersons as $obj) {
                        if (false == $this->collActionpropertyPersons->contains($obj)) {
                          $this->collActionpropertyPersons->append($obj);
                        }
                      }

                      $this->collActionpropertyPersonsPartial = true;
                    }

                    $collActionpropertyPersons->getInternalIterator()->rewind();
                    return $collActionpropertyPersons;
                }

                if($partial && $this->collActionpropertyPersons) {
                    foreach($this->collActionpropertyPersons as $obj) {
                        if($obj->isNew()) {
                            $collActionpropertyPersons[] = $obj;
                        }
                    }
                }

                $this->collActionpropertyPersons = $collActionpropertyPersons;
                $this->collActionpropertyPersonsPartial = false;
            }
        }

        return $this->collActionpropertyPersons;
    }

    /**
     * Sets a collection of ActionpropertyPerson objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actionpropertyPersons A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setActionpropertyPersons(PropelCollection $actionpropertyPersons, PropelPDO $con = null)
    {
        $actionpropertyPersonsToDelete = $this->getActionpropertyPersons(new Criteria(), $con)->diff($actionpropertyPersons);

        $this->actionpropertyPersonsScheduledForDeletion = unserialize(serialize($actionpropertyPersonsToDelete));

        foreach ($actionpropertyPersonsToDelete as $actionpropertyPersonRemoved) {
            $actionpropertyPersonRemoved->setPerson(null);
        }

        $this->collActionpropertyPersons = null;
        foreach ($actionpropertyPersons as $actionpropertyPerson) {
            $this->addActionpropertyPerson($actionpropertyPerson);
        }

        $this->collActionpropertyPersons = $actionpropertyPersons;
        $this->collActionpropertyPersonsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActionpropertyPerson objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ActionpropertyPerson objects.
     * @throws PropelException
     */
    public function countActionpropertyPersons(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActionpropertyPersonsPartial && !$this->isNew();
        if (null === $this->collActionpropertyPersons || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActionpropertyPersons) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActionpropertyPersons());
            }
            $query = ActionpropertyPersonQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPerson($this)
                ->count($con);
        }

        return count($this->collActionpropertyPersons);
    }

    /**
     * Method called to associate a ActionpropertyPerson object to this object
     * through the ActionpropertyPerson foreign key attribute.
     *
     * @param    ActionpropertyPerson $l ActionpropertyPerson
     * @return Person The current object (for fluent API support)
     */
    public function addActionpropertyPerson(ActionpropertyPerson $l)
    {
        if ($this->collActionpropertyPersons === null) {
            $this->initActionpropertyPersons();
            $this->collActionpropertyPersonsPartial = true;
        }
        if (!in_array($l, $this->collActionpropertyPersons->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActionpropertyPerson($l);
        }

        return $this;
    }

    /**
     * @param	ActionpropertyPerson $actionpropertyPerson The actionpropertyPerson object to add.
     */
    protected function doAddActionpropertyPerson($actionpropertyPerson)
    {
        $this->collActionpropertyPersons[]= $actionpropertyPerson;
        $actionpropertyPerson->setPerson($this);
    }

    /**
     * @param	ActionpropertyPerson $actionpropertyPerson The actionpropertyPerson object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeActionpropertyPerson($actionpropertyPerson)
    {
        if ($this->getActionpropertyPersons()->contains($actionpropertyPerson)) {
            $this->collActionpropertyPersons->remove($this->collActionpropertyPersons->search($actionpropertyPerson));
            if (null === $this->actionpropertyPersonsScheduledForDeletion) {
                $this->actionpropertyPersonsScheduledForDeletion = clone $this->collActionpropertyPersons;
                $this->actionpropertyPersonsScheduledForDeletion->clear();
            }
            $this->actionpropertyPersonsScheduledForDeletion[]= $actionpropertyPerson;
            $actionpropertyPerson->setPerson(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related ActionpropertyPersons from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ActionpropertyPerson[] List of ActionpropertyPerson objects
     */
    public function getActionpropertyPersonsJoinActionproperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActionpropertyPersonQuery::create(null, $criteria);
        $query->joinWith('Actionproperty', $join_behavior);

        return $this->getActionpropertyPersons($query, $con);
    }

    /**
     * Clears out the collActiontypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addActiontypes()
     */
    public function clearActiontypes()
    {
        $this->collActiontypes = null; // important to set this to null since that means it is uninitialized
        $this->collActiontypesPartial = null;

        return $this;
    }

    /**
     * reset is the collActiontypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialActiontypes($v = true)
    {
        $this->collActiontypesPartial = $v;
    }

    /**
     * Initializes the collActiontypes collection.
     *
     * By default this just sets the collActiontypes collection to an empty array (like clearcollActiontypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActiontypes($overrideExisting = true)
    {
        if (null !== $this->collActiontypes && !$overrideExisting) {
            return;
        }
        $this->collActiontypes = new PropelObjectCollection();
        $this->collActiontypes->setModel('Actiontype');
    }

    /**
     * Gets an array of Actiontype objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Actiontype[] List of Actiontype objects
     * @throws PropelException
     */
    public function getActiontypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActiontypesPartial && !$this->isNew();
        if (null === $this->collActiontypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActiontypes) {
                // return empty collection
                $this->initActiontypes();
            } else {
                $collActiontypes = ActiontypeQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActiontypesPartial && count($collActiontypes)) {
                      $this->initActiontypes(false);

                      foreach($collActiontypes as $obj) {
                        if (false == $this->collActiontypes->contains($obj)) {
                          $this->collActiontypes->append($obj);
                        }
                      }

                      $this->collActiontypesPartial = true;
                    }

                    $collActiontypes->getInternalIterator()->rewind();
                    return $collActiontypes;
                }

                if($partial && $this->collActiontypes) {
                    foreach($this->collActiontypes as $obj) {
                        if($obj->isNew()) {
                            $collActiontypes[] = $obj;
                        }
                    }
                }

                $this->collActiontypes = $collActiontypes;
                $this->collActiontypesPartial = false;
            }
        }

        return $this->collActiontypes;
    }

    /**
     * Sets a collection of Actiontype objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $actiontypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setActiontypes(PropelCollection $actiontypes, PropelPDO $con = null)
    {
        $actiontypesToDelete = $this->getActiontypes(new Criteria(), $con)->diff($actiontypes);

        $this->actiontypesScheduledForDeletion = unserialize(serialize($actiontypesToDelete));

        foreach ($actiontypesToDelete as $actiontypeRemoved) {
            $actiontypeRemoved->setPerson(null);
        }

        $this->collActiontypes = null;
        foreach ($actiontypes as $actiontype) {
            $this->addActiontype($actiontype);
        }

        $this->collActiontypes = $actiontypes;
        $this->collActiontypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Actiontype objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Actiontype objects.
     * @throws PropelException
     */
    public function countActiontypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActiontypesPartial && !$this->isNew();
        if (null === $this->collActiontypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActiontypes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getActiontypes());
            }
            $query = ActiontypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPerson($this)
                ->count($con);
        }

        return count($this->collActiontypes);
    }

    /**
     * Method called to associate a Actiontype object to this object
     * through the Actiontype foreign key attribute.
     *
     * @param    Actiontype $l Actiontype
     * @return Person The current object (for fluent API support)
     */
    public function addActiontype(Actiontype $l)
    {
        if ($this->collActiontypes === null) {
            $this->initActiontypes();
            $this->collActiontypesPartial = true;
        }
        if (!in_array($l, $this->collActiontypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiontype($l);
        }

        return $this;
    }

    /**
     * @param	Actiontype $actiontype The actiontype object to add.
     */
    protected function doAddActiontype($actiontype)
    {
        $this->collActiontypes[]= $actiontype;
        $actiontype->setPerson($this);
    }

    /**
     * @param	Actiontype $actiontype The actiontype object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeActiontype($actiontype)
    {
        if ($this->getActiontypes()->contains($actiontype)) {
            $this->collActiontypes->remove($this->collActiontypes->search($actiontype));
            if (null === $this->actiontypesScheduledForDeletion) {
                $this->actiontypesScheduledForDeletion = clone $this->collActiontypes;
                $this->actiontypesScheduledForDeletion->clear();
            }
            $this->actiontypesScheduledForDeletion[]= $actiontype;
            $actiontype->setPerson(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Actiontypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Actiontype[] List of Actiontype objects
     */
    public function getActiontypesJoinRbjobtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeQuery::create(null, $criteria);
        $query->joinWith('Rbjobtype', $join_behavior);

        return $this->getActiontypes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Actiontypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Actiontype[] List of Actiontype objects
     */
    public function getActiontypesJoinRbtesttubetype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiontypeQuery::create(null, $criteria);
        $query->joinWith('Rbtesttubetype', $join_behavior);

        return $this->getActiontypes($query, $con);
    }

    /**
     * Clears out the collBlankactionsMovingsRelatedByCreatepersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addBlankactionsMovingsRelatedByCreatepersonId()
     */
    public function clearBlankactionsMovingsRelatedByCreatepersonId()
    {
        $this->collBlankactionsMovingsRelatedByCreatepersonId = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsMovingsRelatedByCreatepersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsMovingsRelatedByCreatepersonId($v = true)
    {
        $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial = $v;
    }

    /**
     * Initializes the collBlankactionsMovingsRelatedByCreatepersonId collection.
     *
     * By default this just sets the collBlankactionsMovingsRelatedByCreatepersonId collection to an empty array (like clearcollBlankactionsMovingsRelatedByCreatepersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsMovingsRelatedByCreatepersonId($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsMovingsRelatedByCreatepersonId && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsMovingsRelatedByCreatepersonId = new PropelObjectCollection();
        $this->collBlankactionsMovingsRelatedByCreatepersonId->setModel('BlankactionsMoving');
    }

    /**
     * Gets an array of BlankactionsMoving objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     * @throws PropelException
     */
    public function getBlankactionsMovingsRelatedByCreatepersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovingsRelatedByCreatepersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovingsRelatedByCreatepersonId) {
                // return empty collection
                $this->initBlankactionsMovingsRelatedByCreatepersonId();
            } else {
                $collBlankactionsMovingsRelatedByCreatepersonId = BlankactionsMovingQuery::create(null, $criteria)
                    ->filterByPersonRelatedByCreatepersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial && count($collBlankactionsMovingsRelatedByCreatepersonId)) {
                      $this->initBlankactionsMovingsRelatedByCreatepersonId(false);

                      foreach($collBlankactionsMovingsRelatedByCreatepersonId as $obj) {
                        if (false == $this->collBlankactionsMovingsRelatedByCreatepersonId->contains($obj)) {
                          $this->collBlankactionsMovingsRelatedByCreatepersonId->append($obj);
                        }
                      }

                      $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial = true;
                    }

                    $collBlankactionsMovingsRelatedByCreatepersonId->getInternalIterator()->rewind();
                    return $collBlankactionsMovingsRelatedByCreatepersonId;
                }

                if($partial && $this->collBlankactionsMovingsRelatedByCreatepersonId) {
                    foreach($this->collBlankactionsMovingsRelatedByCreatepersonId as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsMovingsRelatedByCreatepersonId[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsMovingsRelatedByCreatepersonId = $collBlankactionsMovingsRelatedByCreatepersonId;
                $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial = false;
            }
        }

        return $this->collBlankactionsMovingsRelatedByCreatepersonId;
    }

    /**
     * Sets a collection of BlankactionsMovingRelatedByCreatepersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsMovingsRelatedByCreatepersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setBlankactionsMovingsRelatedByCreatepersonId(PropelCollection $blankactionsMovingsRelatedByCreatepersonId, PropelPDO $con = null)
    {
        $blankactionsMovingsRelatedByCreatepersonIdToDelete = $this->getBlankactionsMovingsRelatedByCreatepersonId(new Criteria(), $con)->diff($blankactionsMovingsRelatedByCreatepersonId);

        $this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion = unserialize(serialize($blankactionsMovingsRelatedByCreatepersonIdToDelete));

        foreach ($blankactionsMovingsRelatedByCreatepersonIdToDelete as $blankactionsMovingRelatedByCreatepersonIdRemoved) {
            $blankactionsMovingRelatedByCreatepersonIdRemoved->setPersonRelatedByCreatepersonId(null);
        }

        $this->collBlankactionsMovingsRelatedByCreatepersonId = null;
        foreach ($blankactionsMovingsRelatedByCreatepersonId as $blankactionsMovingRelatedByCreatepersonId) {
            $this->addBlankactionsMovingRelatedByCreatepersonId($blankactionsMovingRelatedByCreatepersonId);
        }

        $this->collBlankactionsMovingsRelatedByCreatepersonId = $blankactionsMovingsRelatedByCreatepersonId;
        $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial = false;

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
    public function countBlankactionsMovingsRelatedByCreatepersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovingsRelatedByCreatepersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovingsRelatedByCreatepersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsMovingsRelatedByCreatepersonId());
            }
            $query = BlankactionsMovingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByCreatepersonId($this)
                ->count($con);
        }

        return count($this->collBlankactionsMovingsRelatedByCreatepersonId);
    }

    /**
     * Method called to associate a BlankactionsMoving object to this object
     * through the BlankactionsMoving foreign key attribute.
     *
     * @param    BlankactionsMoving $l BlankactionsMoving
     * @return Person The current object (for fluent API support)
     */
    public function addBlankactionsMovingRelatedByCreatepersonId(BlankactionsMoving $l)
    {
        if ($this->collBlankactionsMovingsRelatedByCreatepersonId === null) {
            $this->initBlankactionsMovingsRelatedByCreatepersonId();
            $this->collBlankactionsMovingsRelatedByCreatepersonIdPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsMovingsRelatedByCreatepersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsMovingRelatedByCreatepersonId($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsMovingRelatedByCreatepersonId $blankactionsMovingRelatedByCreatepersonId The blankactionsMovingRelatedByCreatepersonId object to add.
     */
    protected function doAddBlankactionsMovingRelatedByCreatepersonId($blankactionsMovingRelatedByCreatepersonId)
    {
        $this->collBlankactionsMovingsRelatedByCreatepersonId[]= $blankactionsMovingRelatedByCreatepersonId;
        $blankactionsMovingRelatedByCreatepersonId->setPersonRelatedByCreatepersonId($this);
    }

    /**
     * @param	BlankactionsMovingRelatedByCreatepersonId $blankactionsMovingRelatedByCreatepersonId The blankactionsMovingRelatedByCreatepersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeBlankactionsMovingRelatedByCreatepersonId($blankactionsMovingRelatedByCreatepersonId)
    {
        if ($this->getBlankactionsMovingsRelatedByCreatepersonId()->contains($blankactionsMovingRelatedByCreatepersonId)) {
            $this->collBlankactionsMovingsRelatedByCreatepersonId->remove($this->collBlankactionsMovingsRelatedByCreatepersonId->search($blankactionsMovingRelatedByCreatepersonId));
            if (null === $this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion) {
                $this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion = clone $this->collBlankactionsMovingsRelatedByCreatepersonId;
                $this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion->clear();
            }
            $this->blankactionsMovingsRelatedByCreatepersonIdScheduledForDeletion[]= $blankactionsMovingRelatedByCreatepersonId;
            $blankactionsMovingRelatedByCreatepersonId->setPersonRelatedByCreatepersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsMovingsRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsRelatedByCreatepersonIdJoinBlankactionsParty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('BlankactionsParty', $join_behavior);

        return $this->getBlankactionsMovingsRelatedByCreatepersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsMovingsRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsRelatedByCreatepersonIdJoinOrgstructure($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('Orgstructure', $join_behavior);

        return $this->getBlankactionsMovingsRelatedByCreatepersonId($query, $con);
    }

    /**
     * Clears out the collBlankactionsMovingsRelatedByModifypersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addBlankactionsMovingsRelatedByModifypersonId()
     */
    public function clearBlankactionsMovingsRelatedByModifypersonId()
    {
        $this->collBlankactionsMovingsRelatedByModifypersonId = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsMovingsRelatedByModifypersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsMovingsRelatedByModifypersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsMovingsRelatedByModifypersonId($v = true)
    {
        $this->collBlankactionsMovingsRelatedByModifypersonIdPartial = $v;
    }

    /**
     * Initializes the collBlankactionsMovingsRelatedByModifypersonId collection.
     *
     * By default this just sets the collBlankactionsMovingsRelatedByModifypersonId collection to an empty array (like clearcollBlankactionsMovingsRelatedByModifypersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsMovingsRelatedByModifypersonId($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsMovingsRelatedByModifypersonId && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsMovingsRelatedByModifypersonId = new PropelObjectCollection();
        $this->collBlankactionsMovingsRelatedByModifypersonId->setModel('BlankactionsMoving');
    }

    /**
     * Gets an array of BlankactionsMoving objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     * @throws PropelException
     */
    public function getBlankactionsMovingsRelatedByModifypersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovingsRelatedByModifypersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovingsRelatedByModifypersonId) {
                // return empty collection
                $this->initBlankactionsMovingsRelatedByModifypersonId();
            } else {
                $collBlankactionsMovingsRelatedByModifypersonId = BlankactionsMovingQuery::create(null, $criteria)
                    ->filterByPersonRelatedByModifypersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsMovingsRelatedByModifypersonIdPartial && count($collBlankactionsMovingsRelatedByModifypersonId)) {
                      $this->initBlankactionsMovingsRelatedByModifypersonId(false);

                      foreach($collBlankactionsMovingsRelatedByModifypersonId as $obj) {
                        if (false == $this->collBlankactionsMovingsRelatedByModifypersonId->contains($obj)) {
                          $this->collBlankactionsMovingsRelatedByModifypersonId->append($obj);
                        }
                      }

                      $this->collBlankactionsMovingsRelatedByModifypersonIdPartial = true;
                    }

                    $collBlankactionsMovingsRelatedByModifypersonId->getInternalIterator()->rewind();
                    return $collBlankactionsMovingsRelatedByModifypersonId;
                }

                if($partial && $this->collBlankactionsMovingsRelatedByModifypersonId) {
                    foreach($this->collBlankactionsMovingsRelatedByModifypersonId as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsMovingsRelatedByModifypersonId[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsMovingsRelatedByModifypersonId = $collBlankactionsMovingsRelatedByModifypersonId;
                $this->collBlankactionsMovingsRelatedByModifypersonIdPartial = false;
            }
        }

        return $this->collBlankactionsMovingsRelatedByModifypersonId;
    }

    /**
     * Sets a collection of BlankactionsMovingRelatedByModifypersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsMovingsRelatedByModifypersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setBlankactionsMovingsRelatedByModifypersonId(PropelCollection $blankactionsMovingsRelatedByModifypersonId, PropelPDO $con = null)
    {
        $blankactionsMovingsRelatedByModifypersonIdToDelete = $this->getBlankactionsMovingsRelatedByModifypersonId(new Criteria(), $con)->diff($blankactionsMovingsRelatedByModifypersonId);

        $this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion = unserialize(serialize($blankactionsMovingsRelatedByModifypersonIdToDelete));

        foreach ($blankactionsMovingsRelatedByModifypersonIdToDelete as $blankactionsMovingRelatedByModifypersonIdRemoved) {
            $blankactionsMovingRelatedByModifypersonIdRemoved->setPersonRelatedByModifypersonId(null);
        }

        $this->collBlankactionsMovingsRelatedByModifypersonId = null;
        foreach ($blankactionsMovingsRelatedByModifypersonId as $blankactionsMovingRelatedByModifypersonId) {
            $this->addBlankactionsMovingRelatedByModifypersonId($blankactionsMovingRelatedByModifypersonId);
        }

        $this->collBlankactionsMovingsRelatedByModifypersonId = $blankactionsMovingsRelatedByModifypersonId;
        $this->collBlankactionsMovingsRelatedByModifypersonIdPartial = false;

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
    public function countBlankactionsMovingsRelatedByModifypersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovingsRelatedByModifypersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovingsRelatedByModifypersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsMovingsRelatedByModifypersonId());
            }
            $query = BlankactionsMovingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByModifypersonId($this)
                ->count($con);
        }

        return count($this->collBlankactionsMovingsRelatedByModifypersonId);
    }

    /**
     * Method called to associate a BlankactionsMoving object to this object
     * through the BlankactionsMoving foreign key attribute.
     *
     * @param    BlankactionsMoving $l BlankactionsMoving
     * @return Person The current object (for fluent API support)
     */
    public function addBlankactionsMovingRelatedByModifypersonId(BlankactionsMoving $l)
    {
        if ($this->collBlankactionsMovingsRelatedByModifypersonId === null) {
            $this->initBlankactionsMovingsRelatedByModifypersonId();
            $this->collBlankactionsMovingsRelatedByModifypersonIdPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsMovingsRelatedByModifypersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsMovingRelatedByModifypersonId($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsMovingRelatedByModifypersonId $blankactionsMovingRelatedByModifypersonId The blankactionsMovingRelatedByModifypersonId object to add.
     */
    protected function doAddBlankactionsMovingRelatedByModifypersonId($blankactionsMovingRelatedByModifypersonId)
    {
        $this->collBlankactionsMovingsRelatedByModifypersonId[]= $blankactionsMovingRelatedByModifypersonId;
        $blankactionsMovingRelatedByModifypersonId->setPersonRelatedByModifypersonId($this);
    }

    /**
     * @param	BlankactionsMovingRelatedByModifypersonId $blankactionsMovingRelatedByModifypersonId The blankactionsMovingRelatedByModifypersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeBlankactionsMovingRelatedByModifypersonId($blankactionsMovingRelatedByModifypersonId)
    {
        if ($this->getBlankactionsMovingsRelatedByModifypersonId()->contains($blankactionsMovingRelatedByModifypersonId)) {
            $this->collBlankactionsMovingsRelatedByModifypersonId->remove($this->collBlankactionsMovingsRelatedByModifypersonId->search($blankactionsMovingRelatedByModifypersonId));
            if (null === $this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion) {
                $this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion = clone $this->collBlankactionsMovingsRelatedByModifypersonId;
                $this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion->clear();
            }
            $this->blankactionsMovingsRelatedByModifypersonIdScheduledForDeletion[]= $blankactionsMovingRelatedByModifypersonId;
            $blankactionsMovingRelatedByModifypersonId->setPersonRelatedByModifypersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsMovingsRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsRelatedByModifypersonIdJoinBlankactionsParty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('BlankactionsParty', $join_behavior);

        return $this->getBlankactionsMovingsRelatedByModifypersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsMovingsRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsRelatedByModifypersonIdJoinOrgstructure($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('Orgstructure', $join_behavior);

        return $this->getBlankactionsMovingsRelatedByModifypersonId($query, $con);
    }

    /**
     * Clears out the collBlankactionsMovingsRelatedByPersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addBlankactionsMovingsRelatedByPersonId()
     */
    public function clearBlankactionsMovingsRelatedByPersonId()
    {
        $this->collBlankactionsMovingsRelatedByPersonId = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsMovingsRelatedByPersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsMovingsRelatedByPersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsMovingsRelatedByPersonId($v = true)
    {
        $this->collBlankactionsMovingsRelatedByPersonIdPartial = $v;
    }

    /**
     * Initializes the collBlankactionsMovingsRelatedByPersonId collection.
     *
     * By default this just sets the collBlankactionsMovingsRelatedByPersonId collection to an empty array (like clearcollBlankactionsMovingsRelatedByPersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsMovingsRelatedByPersonId($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsMovingsRelatedByPersonId && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsMovingsRelatedByPersonId = new PropelObjectCollection();
        $this->collBlankactionsMovingsRelatedByPersonId->setModel('BlankactionsMoving');
    }

    /**
     * Gets an array of BlankactionsMoving objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     * @throws PropelException
     */
    public function getBlankactionsMovingsRelatedByPersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsRelatedByPersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovingsRelatedByPersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovingsRelatedByPersonId) {
                // return empty collection
                $this->initBlankactionsMovingsRelatedByPersonId();
            } else {
                $collBlankactionsMovingsRelatedByPersonId = BlankactionsMovingQuery::create(null, $criteria)
                    ->filterByPersonRelatedByPersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsMovingsRelatedByPersonIdPartial && count($collBlankactionsMovingsRelatedByPersonId)) {
                      $this->initBlankactionsMovingsRelatedByPersonId(false);

                      foreach($collBlankactionsMovingsRelatedByPersonId as $obj) {
                        if (false == $this->collBlankactionsMovingsRelatedByPersonId->contains($obj)) {
                          $this->collBlankactionsMovingsRelatedByPersonId->append($obj);
                        }
                      }

                      $this->collBlankactionsMovingsRelatedByPersonIdPartial = true;
                    }

                    $collBlankactionsMovingsRelatedByPersonId->getInternalIterator()->rewind();
                    return $collBlankactionsMovingsRelatedByPersonId;
                }

                if($partial && $this->collBlankactionsMovingsRelatedByPersonId) {
                    foreach($this->collBlankactionsMovingsRelatedByPersonId as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsMovingsRelatedByPersonId[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsMovingsRelatedByPersonId = $collBlankactionsMovingsRelatedByPersonId;
                $this->collBlankactionsMovingsRelatedByPersonIdPartial = false;
            }
        }

        return $this->collBlankactionsMovingsRelatedByPersonId;
    }

    /**
     * Sets a collection of BlankactionsMovingRelatedByPersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsMovingsRelatedByPersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setBlankactionsMovingsRelatedByPersonId(PropelCollection $blankactionsMovingsRelatedByPersonId, PropelPDO $con = null)
    {
        $blankactionsMovingsRelatedByPersonIdToDelete = $this->getBlankactionsMovingsRelatedByPersonId(new Criteria(), $con)->diff($blankactionsMovingsRelatedByPersonId);

        $this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion = unserialize(serialize($blankactionsMovingsRelatedByPersonIdToDelete));

        foreach ($blankactionsMovingsRelatedByPersonIdToDelete as $blankactionsMovingRelatedByPersonIdRemoved) {
            $blankactionsMovingRelatedByPersonIdRemoved->setPersonRelatedByPersonId(null);
        }

        $this->collBlankactionsMovingsRelatedByPersonId = null;
        foreach ($blankactionsMovingsRelatedByPersonId as $blankactionsMovingRelatedByPersonId) {
            $this->addBlankactionsMovingRelatedByPersonId($blankactionsMovingRelatedByPersonId);
        }

        $this->collBlankactionsMovingsRelatedByPersonId = $blankactionsMovingsRelatedByPersonId;
        $this->collBlankactionsMovingsRelatedByPersonIdPartial = false;

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
    public function countBlankactionsMovingsRelatedByPersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsMovingsRelatedByPersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsMovingsRelatedByPersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsMovingsRelatedByPersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsMovingsRelatedByPersonId());
            }
            $query = BlankactionsMovingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByPersonId($this)
                ->count($con);
        }

        return count($this->collBlankactionsMovingsRelatedByPersonId);
    }

    /**
     * Method called to associate a BlankactionsMoving object to this object
     * through the BlankactionsMoving foreign key attribute.
     *
     * @param    BlankactionsMoving $l BlankactionsMoving
     * @return Person The current object (for fluent API support)
     */
    public function addBlankactionsMovingRelatedByPersonId(BlankactionsMoving $l)
    {
        if ($this->collBlankactionsMovingsRelatedByPersonId === null) {
            $this->initBlankactionsMovingsRelatedByPersonId();
            $this->collBlankactionsMovingsRelatedByPersonIdPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsMovingsRelatedByPersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsMovingRelatedByPersonId($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsMovingRelatedByPersonId $blankactionsMovingRelatedByPersonId The blankactionsMovingRelatedByPersonId object to add.
     */
    protected function doAddBlankactionsMovingRelatedByPersonId($blankactionsMovingRelatedByPersonId)
    {
        $this->collBlankactionsMovingsRelatedByPersonId[]= $blankactionsMovingRelatedByPersonId;
        $blankactionsMovingRelatedByPersonId->setPersonRelatedByPersonId($this);
    }

    /**
     * @param	BlankactionsMovingRelatedByPersonId $blankactionsMovingRelatedByPersonId The blankactionsMovingRelatedByPersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeBlankactionsMovingRelatedByPersonId($blankactionsMovingRelatedByPersonId)
    {
        if ($this->getBlankactionsMovingsRelatedByPersonId()->contains($blankactionsMovingRelatedByPersonId)) {
            $this->collBlankactionsMovingsRelatedByPersonId->remove($this->collBlankactionsMovingsRelatedByPersonId->search($blankactionsMovingRelatedByPersonId));
            if (null === $this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion) {
                $this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion = clone $this->collBlankactionsMovingsRelatedByPersonId;
                $this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion->clear();
            }
            $this->blankactionsMovingsRelatedByPersonIdScheduledForDeletion[]= $blankactionsMovingRelatedByPersonId;
            $blankactionsMovingRelatedByPersonId->setPersonRelatedByPersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsMovingsRelatedByPersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsRelatedByPersonIdJoinBlankactionsParty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('BlankactionsParty', $join_behavior);

        return $this->getBlankactionsMovingsRelatedByPersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsMovingsRelatedByPersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsMoving[] List of BlankactionsMoving objects
     */
    public function getBlankactionsMovingsRelatedByPersonIdJoinOrgstructure($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsMovingQuery::create(null, $criteria);
        $query->joinWith('Orgstructure', $join_behavior);

        return $this->getBlankactionsMovingsRelatedByPersonId($query, $con);
    }

    /**
     * Clears out the collBlankactionsPartysRelatedByCreatepersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addBlankactionsPartysRelatedByCreatepersonId()
     */
    public function clearBlankactionsPartysRelatedByCreatepersonId()
    {
        $this->collBlankactionsPartysRelatedByCreatepersonId = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsPartysRelatedByCreatepersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsPartysRelatedByCreatepersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsPartysRelatedByCreatepersonId($v = true)
    {
        $this->collBlankactionsPartysRelatedByCreatepersonIdPartial = $v;
    }

    /**
     * Initializes the collBlankactionsPartysRelatedByCreatepersonId collection.
     *
     * By default this just sets the collBlankactionsPartysRelatedByCreatepersonId collection to an empty array (like clearcollBlankactionsPartysRelatedByCreatepersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsPartysRelatedByCreatepersonId($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsPartysRelatedByCreatepersonId && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsPartysRelatedByCreatepersonId = new PropelObjectCollection();
        $this->collBlankactionsPartysRelatedByCreatepersonId->setModel('BlankactionsParty');
    }

    /**
     * Gets an array of BlankactionsParty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsParty[] List of BlankactionsParty objects
     * @throws PropelException
     */
    public function getBlankactionsPartysRelatedByCreatepersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsPartysRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsPartysRelatedByCreatepersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsPartysRelatedByCreatepersonId) {
                // return empty collection
                $this->initBlankactionsPartysRelatedByCreatepersonId();
            } else {
                $collBlankactionsPartysRelatedByCreatepersonId = BlankactionsPartyQuery::create(null, $criteria)
                    ->filterByPersonRelatedByCreatepersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsPartysRelatedByCreatepersonIdPartial && count($collBlankactionsPartysRelatedByCreatepersonId)) {
                      $this->initBlankactionsPartysRelatedByCreatepersonId(false);

                      foreach($collBlankactionsPartysRelatedByCreatepersonId as $obj) {
                        if (false == $this->collBlankactionsPartysRelatedByCreatepersonId->contains($obj)) {
                          $this->collBlankactionsPartysRelatedByCreatepersonId->append($obj);
                        }
                      }

                      $this->collBlankactionsPartysRelatedByCreatepersonIdPartial = true;
                    }

                    $collBlankactionsPartysRelatedByCreatepersonId->getInternalIterator()->rewind();
                    return $collBlankactionsPartysRelatedByCreatepersonId;
                }

                if($partial && $this->collBlankactionsPartysRelatedByCreatepersonId) {
                    foreach($this->collBlankactionsPartysRelatedByCreatepersonId as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsPartysRelatedByCreatepersonId[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsPartysRelatedByCreatepersonId = $collBlankactionsPartysRelatedByCreatepersonId;
                $this->collBlankactionsPartysRelatedByCreatepersonIdPartial = false;
            }
        }

        return $this->collBlankactionsPartysRelatedByCreatepersonId;
    }

    /**
     * Sets a collection of BlankactionsPartyRelatedByCreatepersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsPartysRelatedByCreatepersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setBlankactionsPartysRelatedByCreatepersonId(PropelCollection $blankactionsPartysRelatedByCreatepersonId, PropelPDO $con = null)
    {
        $blankactionsPartysRelatedByCreatepersonIdToDelete = $this->getBlankactionsPartysRelatedByCreatepersonId(new Criteria(), $con)->diff($blankactionsPartysRelatedByCreatepersonId);

        $this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion = unserialize(serialize($blankactionsPartysRelatedByCreatepersonIdToDelete));

        foreach ($blankactionsPartysRelatedByCreatepersonIdToDelete as $blankactionsPartyRelatedByCreatepersonIdRemoved) {
            $blankactionsPartyRelatedByCreatepersonIdRemoved->setPersonRelatedByCreatepersonId(null);
        }

        $this->collBlankactionsPartysRelatedByCreatepersonId = null;
        foreach ($blankactionsPartysRelatedByCreatepersonId as $blankactionsPartyRelatedByCreatepersonId) {
            $this->addBlankactionsPartyRelatedByCreatepersonId($blankactionsPartyRelatedByCreatepersonId);
        }

        $this->collBlankactionsPartysRelatedByCreatepersonId = $blankactionsPartysRelatedByCreatepersonId;
        $this->collBlankactionsPartysRelatedByCreatepersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BlankactionsParty objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BlankactionsParty objects.
     * @throws PropelException
     */
    public function countBlankactionsPartysRelatedByCreatepersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsPartysRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsPartysRelatedByCreatepersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsPartysRelatedByCreatepersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsPartysRelatedByCreatepersonId());
            }
            $query = BlankactionsPartyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByCreatepersonId($this)
                ->count($con);
        }

        return count($this->collBlankactionsPartysRelatedByCreatepersonId);
    }

    /**
     * Method called to associate a BlankactionsParty object to this object
     * through the BlankactionsParty foreign key attribute.
     *
     * @param    BlankactionsParty $l BlankactionsParty
     * @return Person The current object (for fluent API support)
     */
    public function addBlankactionsPartyRelatedByCreatepersonId(BlankactionsParty $l)
    {
        if ($this->collBlankactionsPartysRelatedByCreatepersonId === null) {
            $this->initBlankactionsPartysRelatedByCreatepersonId();
            $this->collBlankactionsPartysRelatedByCreatepersonIdPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsPartysRelatedByCreatepersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsPartyRelatedByCreatepersonId($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsPartyRelatedByCreatepersonId $blankactionsPartyRelatedByCreatepersonId The blankactionsPartyRelatedByCreatepersonId object to add.
     */
    protected function doAddBlankactionsPartyRelatedByCreatepersonId($blankactionsPartyRelatedByCreatepersonId)
    {
        $this->collBlankactionsPartysRelatedByCreatepersonId[]= $blankactionsPartyRelatedByCreatepersonId;
        $blankactionsPartyRelatedByCreatepersonId->setPersonRelatedByCreatepersonId($this);
    }

    /**
     * @param	BlankactionsPartyRelatedByCreatepersonId $blankactionsPartyRelatedByCreatepersonId The blankactionsPartyRelatedByCreatepersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeBlankactionsPartyRelatedByCreatepersonId($blankactionsPartyRelatedByCreatepersonId)
    {
        if ($this->getBlankactionsPartysRelatedByCreatepersonId()->contains($blankactionsPartyRelatedByCreatepersonId)) {
            $this->collBlankactionsPartysRelatedByCreatepersonId->remove($this->collBlankactionsPartysRelatedByCreatepersonId->search($blankactionsPartyRelatedByCreatepersonId));
            if (null === $this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion) {
                $this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion = clone $this->collBlankactionsPartysRelatedByCreatepersonId;
                $this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion->clear();
            }
            $this->blankactionsPartysRelatedByCreatepersonIdScheduledForDeletion[]= $blankactionsPartyRelatedByCreatepersonId;
            $blankactionsPartyRelatedByCreatepersonId->setPersonRelatedByCreatepersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsPartysRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsParty[] List of BlankactionsParty objects
     */
    public function getBlankactionsPartysRelatedByCreatepersonIdJoinRbblankactions($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsPartyQuery::create(null, $criteria);
        $query->joinWith('Rbblankactions', $join_behavior);

        return $this->getBlankactionsPartysRelatedByCreatepersonId($query, $con);
    }

    /**
     * Clears out the collBlankactionsPartysRelatedByModifypersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addBlankactionsPartysRelatedByModifypersonId()
     */
    public function clearBlankactionsPartysRelatedByModifypersonId()
    {
        $this->collBlankactionsPartysRelatedByModifypersonId = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsPartysRelatedByModifypersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsPartysRelatedByModifypersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsPartysRelatedByModifypersonId($v = true)
    {
        $this->collBlankactionsPartysRelatedByModifypersonIdPartial = $v;
    }

    /**
     * Initializes the collBlankactionsPartysRelatedByModifypersonId collection.
     *
     * By default this just sets the collBlankactionsPartysRelatedByModifypersonId collection to an empty array (like clearcollBlankactionsPartysRelatedByModifypersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsPartysRelatedByModifypersonId($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsPartysRelatedByModifypersonId && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsPartysRelatedByModifypersonId = new PropelObjectCollection();
        $this->collBlankactionsPartysRelatedByModifypersonId->setModel('BlankactionsParty');
    }

    /**
     * Gets an array of BlankactionsParty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsParty[] List of BlankactionsParty objects
     * @throws PropelException
     */
    public function getBlankactionsPartysRelatedByModifypersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsPartysRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsPartysRelatedByModifypersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsPartysRelatedByModifypersonId) {
                // return empty collection
                $this->initBlankactionsPartysRelatedByModifypersonId();
            } else {
                $collBlankactionsPartysRelatedByModifypersonId = BlankactionsPartyQuery::create(null, $criteria)
                    ->filterByPersonRelatedByModifypersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsPartysRelatedByModifypersonIdPartial && count($collBlankactionsPartysRelatedByModifypersonId)) {
                      $this->initBlankactionsPartysRelatedByModifypersonId(false);

                      foreach($collBlankactionsPartysRelatedByModifypersonId as $obj) {
                        if (false == $this->collBlankactionsPartysRelatedByModifypersonId->contains($obj)) {
                          $this->collBlankactionsPartysRelatedByModifypersonId->append($obj);
                        }
                      }

                      $this->collBlankactionsPartysRelatedByModifypersonIdPartial = true;
                    }

                    $collBlankactionsPartysRelatedByModifypersonId->getInternalIterator()->rewind();
                    return $collBlankactionsPartysRelatedByModifypersonId;
                }

                if($partial && $this->collBlankactionsPartysRelatedByModifypersonId) {
                    foreach($this->collBlankactionsPartysRelatedByModifypersonId as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsPartysRelatedByModifypersonId[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsPartysRelatedByModifypersonId = $collBlankactionsPartysRelatedByModifypersonId;
                $this->collBlankactionsPartysRelatedByModifypersonIdPartial = false;
            }
        }

        return $this->collBlankactionsPartysRelatedByModifypersonId;
    }

    /**
     * Sets a collection of BlankactionsPartyRelatedByModifypersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsPartysRelatedByModifypersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setBlankactionsPartysRelatedByModifypersonId(PropelCollection $blankactionsPartysRelatedByModifypersonId, PropelPDO $con = null)
    {
        $blankactionsPartysRelatedByModifypersonIdToDelete = $this->getBlankactionsPartysRelatedByModifypersonId(new Criteria(), $con)->diff($blankactionsPartysRelatedByModifypersonId);

        $this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion = unserialize(serialize($blankactionsPartysRelatedByModifypersonIdToDelete));

        foreach ($blankactionsPartysRelatedByModifypersonIdToDelete as $blankactionsPartyRelatedByModifypersonIdRemoved) {
            $blankactionsPartyRelatedByModifypersonIdRemoved->setPersonRelatedByModifypersonId(null);
        }

        $this->collBlankactionsPartysRelatedByModifypersonId = null;
        foreach ($blankactionsPartysRelatedByModifypersonId as $blankactionsPartyRelatedByModifypersonId) {
            $this->addBlankactionsPartyRelatedByModifypersonId($blankactionsPartyRelatedByModifypersonId);
        }

        $this->collBlankactionsPartysRelatedByModifypersonId = $blankactionsPartysRelatedByModifypersonId;
        $this->collBlankactionsPartysRelatedByModifypersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BlankactionsParty objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BlankactionsParty objects.
     * @throws PropelException
     */
    public function countBlankactionsPartysRelatedByModifypersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsPartysRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsPartysRelatedByModifypersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsPartysRelatedByModifypersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsPartysRelatedByModifypersonId());
            }
            $query = BlankactionsPartyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByModifypersonId($this)
                ->count($con);
        }

        return count($this->collBlankactionsPartysRelatedByModifypersonId);
    }

    /**
     * Method called to associate a BlankactionsParty object to this object
     * through the BlankactionsParty foreign key attribute.
     *
     * @param    BlankactionsParty $l BlankactionsParty
     * @return Person The current object (for fluent API support)
     */
    public function addBlankactionsPartyRelatedByModifypersonId(BlankactionsParty $l)
    {
        if ($this->collBlankactionsPartysRelatedByModifypersonId === null) {
            $this->initBlankactionsPartysRelatedByModifypersonId();
            $this->collBlankactionsPartysRelatedByModifypersonIdPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsPartysRelatedByModifypersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsPartyRelatedByModifypersonId($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsPartyRelatedByModifypersonId $blankactionsPartyRelatedByModifypersonId The blankactionsPartyRelatedByModifypersonId object to add.
     */
    protected function doAddBlankactionsPartyRelatedByModifypersonId($blankactionsPartyRelatedByModifypersonId)
    {
        $this->collBlankactionsPartysRelatedByModifypersonId[]= $blankactionsPartyRelatedByModifypersonId;
        $blankactionsPartyRelatedByModifypersonId->setPersonRelatedByModifypersonId($this);
    }

    /**
     * @param	BlankactionsPartyRelatedByModifypersonId $blankactionsPartyRelatedByModifypersonId The blankactionsPartyRelatedByModifypersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeBlankactionsPartyRelatedByModifypersonId($blankactionsPartyRelatedByModifypersonId)
    {
        if ($this->getBlankactionsPartysRelatedByModifypersonId()->contains($blankactionsPartyRelatedByModifypersonId)) {
            $this->collBlankactionsPartysRelatedByModifypersonId->remove($this->collBlankactionsPartysRelatedByModifypersonId->search($blankactionsPartyRelatedByModifypersonId));
            if (null === $this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion) {
                $this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion = clone $this->collBlankactionsPartysRelatedByModifypersonId;
                $this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion->clear();
            }
            $this->blankactionsPartysRelatedByModifypersonIdScheduledForDeletion[]= $blankactionsPartyRelatedByModifypersonId;
            $blankactionsPartyRelatedByModifypersonId->setPersonRelatedByModifypersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsPartysRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsParty[] List of BlankactionsParty objects
     */
    public function getBlankactionsPartysRelatedByModifypersonIdJoinRbblankactions($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsPartyQuery::create(null, $criteria);
        $query->joinWith('Rbblankactions', $join_behavior);

        return $this->getBlankactionsPartysRelatedByModifypersonId($query, $con);
    }

    /**
     * Clears out the collBlankactionsPartysRelatedByPersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addBlankactionsPartysRelatedByPersonId()
     */
    public function clearBlankactionsPartysRelatedByPersonId()
    {
        $this->collBlankactionsPartysRelatedByPersonId = null; // important to set this to null since that means it is uninitialized
        $this->collBlankactionsPartysRelatedByPersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBlankactionsPartysRelatedByPersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlankactionsPartysRelatedByPersonId($v = true)
    {
        $this->collBlankactionsPartysRelatedByPersonIdPartial = $v;
    }

    /**
     * Initializes the collBlankactionsPartysRelatedByPersonId collection.
     *
     * By default this just sets the collBlankactionsPartysRelatedByPersonId collection to an empty array (like clearcollBlankactionsPartysRelatedByPersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlankactionsPartysRelatedByPersonId($overrideExisting = true)
    {
        if (null !== $this->collBlankactionsPartysRelatedByPersonId && !$overrideExisting) {
            return;
        }
        $this->collBlankactionsPartysRelatedByPersonId = new PropelObjectCollection();
        $this->collBlankactionsPartysRelatedByPersonId->setModel('BlankactionsParty');
    }

    /**
     * Gets an array of BlankactionsParty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BlankactionsParty[] List of BlankactionsParty objects
     * @throws PropelException
     */
    public function getBlankactionsPartysRelatedByPersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsPartysRelatedByPersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsPartysRelatedByPersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsPartysRelatedByPersonId) {
                // return empty collection
                $this->initBlankactionsPartysRelatedByPersonId();
            } else {
                $collBlankactionsPartysRelatedByPersonId = BlankactionsPartyQuery::create(null, $criteria)
                    ->filterByPersonRelatedByPersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlankactionsPartysRelatedByPersonIdPartial && count($collBlankactionsPartysRelatedByPersonId)) {
                      $this->initBlankactionsPartysRelatedByPersonId(false);

                      foreach($collBlankactionsPartysRelatedByPersonId as $obj) {
                        if (false == $this->collBlankactionsPartysRelatedByPersonId->contains($obj)) {
                          $this->collBlankactionsPartysRelatedByPersonId->append($obj);
                        }
                      }

                      $this->collBlankactionsPartysRelatedByPersonIdPartial = true;
                    }

                    $collBlankactionsPartysRelatedByPersonId->getInternalIterator()->rewind();
                    return $collBlankactionsPartysRelatedByPersonId;
                }

                if($partial && $this->collBlankactionsPartysRelatedByPersonId) {
                    foreach($this->collBlankactionsPartysRelatedByPersonId as $obj) {
                        if($obj->isNew()) {
                            $collBlankactionsPartysRelatedByPersonId[] = $obj;
                        }
                    }
                }

                $this->collBlankactionsPartysRelatedByPersonId = $collBlankactionsPartysRelatedByPersonId;
                $this->collBlankactionsPartysRelatedByPersonIdPartial = false;
            }
        }

        return $this->collBlankactionsPartysRelatedByPersonId;
    }

    /**
     * Sets a collection of BlankactionsPartyRelatedByPersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blankactionsPartysRelatedByPersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setBlankactionsPartysRelatedByPersonId(PropelCollection $blankactionsPartysRelatedByPersonId, PropelPDO $con = null)
    {
        $blankactionsPartysRelatedByPersonIdToDelete = $this->getBlankactionsPartysRelatedByPersonId(new Criteria(), $con)->diff($blankactionsPartysRelatedByPersonId);

        $this->blankactionsPartysRelatedByPersonIdScheduledForDeletion = unserialize(serialize($blankactionsPartysRelatedByPersonIdToDelete));

        foreach ($blankactionsPartysRelatedByPersonIdToDelete as $blankactionsPartyRelatedByPersonIdRemoved) {
            $blankactionsPartyRelatedByPersonIdRemoved->setPersonRelatedByPersonId(null);
        }

        $this->collBlankactionsPartysRelatedByPersonId = null;
        foreach ($blankactionsPartysRelatedByPersonId as $blankactionsPartyRelatedByPersonId) {
            $this->addBlankactionsPartyRelatedByPersonId($blankactionsPartyRelatedByPersonId);
        }

        $this->collBlankactionsPartysRelatedByPersonId = $blankactionsPartysRelatedByPersonId;
        $this->collBlankactionsPartysRelatedByPersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BlankactionsParty objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BlankactionsParty objects.
     * @throws PropelException
     */
    public function countBlankactionsPartysRelatedByPersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlankactionsPartysRelatedByPersonIdPartial && !$this->isNew();
        if (null === $this->collBlankactionsPartysRelatedByPersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlankactionsPartysRelatedByPersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlankactionsPartysRelatedByPersonId());
            }
            $query = BlankactionsPartyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByPersonId($this)
                ->count($con);
        }

        return count($this->collBlankactionsPartysRelatedByPersonId);
    }

    /**
     * Method called to associate a BlankactionsParty object to this object
     * through the BlankactionsParty foreign key attribute.
     *
     * @param    BlankactionsParty $l BlankactionsParty
     * @return Person The current object (for fluent API support)
     */
    public function addBlankactionsPartyRelatedByPersonId(BlankactionsParty $l)
    {
        if ($this->collBlankactionsPartysRelatedByPersonId === null) {
            $this->initBlankactionsPartysRelatedByPersonId();
            $this->collBlankactionsPartysRelatedByPersonIdPartial = true;
        }
        if (!in_array($l, $this->collBlankactionsPartysRelatedByPersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlankactionsPartyRelatedByPersonId($l);
        }

        return $this;
    }

    /**
     * @param	BlankactionsPartyRelatedByPersonId $blankactionsPartyRelatedByPersonId The blankactionsPartyRelatedByPersonId object to add.
     */
    protected function doAddBlankactionsPartyRelatedByPersonId($blankactionsPartyRelatedByPersonId)
    {
        $this->collBlankactionsPartysRelatedByPersonId[]= $blankactionsPartyRelatedByPersonId;
        $blankactionsPartyRelatedByPersonId->setPersonRelatedByPersonId($this);
    }

    /**
     * @param	BlankactionsPartyRelatedByPersonId $blankactionsPartyRelatedByPersonId The blankactionsPartyRelatedByPersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeBlankactionsPartyRelatedByPersonId($blankactionsPartyRelatedByPersonId)
    {
        if ($this->getBlankactionsPartysRelatedByPersonId()->contains($blankactionsPartyRelatedByPersonId)) {
            $this->collBlankactionsPartysRelatedByPersonId->remove($this->collBlankactionsPartysRelatedByPersonId->search($blankactionsPartyRelatedByPersonId));
            if (null === $this->blankactionsPartysRelatedByPersonIdScheduledForDeletion) {
                $this->blankactionsPartysRelatedByPersonIdScheduledForDeletion = clone $this->collBlankactionsPartysRelatedByPersonId;
                $this->blankactionsPartysRelatedByPersonIdScheduledForDeletion->clear();
            }
            $this->blankactionsPartysRelatedByPersonIdScheduledForDeletion[]= $blankactionsPartyRelatedByPersonId;
            $blankactionsPartyRelatedByPersonId->setPersonRelatedByPersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related BlankactionsPartysRelatedByPersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BlankactionsParty[] List of BlankactionsParty objects
     */
    public function getBlankactionsPartysRelatedByPersonIdJoinRbblankactions($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlankactionsPartyQuery::create(null, $criteria);
        $query->joinWith('Rbblankactions', $join_behavior);

        return $this->getBlankactionsPartysRelatedByPersonId($query, $con);
    }

    /**
     * Clears out the collNotificationoccurreds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addNotificationoccurreds()
     */
    public function clearNotificationoccurreds()
    {
        $this->collNotificationoccurreds = null; // important to set this to null since that means it is uninitialized
        $this->collNotificationoccurredsPartial = null;

        return $this;
    }

    /**
     * reset is the collNotificationoccurreds collection loaded partially
     *
     * @return void
     */
    public function resetPartialNotificationoccurreds($v = true)
    {
        $this->collNotificationoccurredsPartial = $v;
    }

    /**
     * Initializes the collNotificationoccurreds collection.
     *
     * By default this just sets the collNotificationoccurreds collection to an empty array (like clearcollNotificationoccurreds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNotificationoccurreds($overrideExisting = true)
    {
        if (null !== $this->collNotificationoccurreds && !$overrideExisting) {
            return;
        }
        $this->collNotificationoccurreds = new PropelObjectCollection();
        $this->collNotificationoccurreds->setModel('Notificationoccurred');
    }

    /**
     * Gets an array of Notificationoccurred objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Notificationoccurred[] List of Notificationoccurred objects
     * @throws PropelException
     */
    public function getNotificationoccurreds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNotificationoccurredsPartial && !$this->isNew();
        if (null === $this->collNotificationoccurreds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNotificationoccurreds) {
                // return empty collection
                $this->initNotificationoccurreds();
            } else {
                $collNotificationoccurreds = NotificationoccurredQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNotificationoccurredsPartial && count($collNotificationoccurreds)) {
                      $this->initNotificationoccurreds(false);

                      foreach($collNotificationoccurreds as $obj) {
                        if (false == $this->collNotificationoccurreds->contains($obj)) {
                          $this->collNotificationoccurreds->append($obj);
                        }
                      }

                      $this->collNotificationoccurredsPartial = true;
                    }

                    $collNotificationoccurreds->getInternalIterator()->rewind();
                    return $collNotificationoccurreds;
                }

                if($partial && $this->collNotificationoccurreds) {
                    foreach($this->collNotificationoccurreds as $obj) {
                        if($obj->isNew()) {
                            $collNotificationoccurreds[] = $obj;
                        }
                    }
                }

                $this->collNotificationoccurreds = $collNotificationoccurreds;
                $this->collNotificationoccurredsPartial = false;
            }
        }

        return $this->collNotificationoccurreds;
    }

    /**
     * Sets a collection of Notificationoccurred objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $notificationoccurreds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setNotificationoccurreds(PropelCollection $notificationoccurreds, PropelPDO $con = null)
    {
        $notificationoccurredsToDelete = $this->getNotificationoccurreds(new Criteria(), $con)->diff($notificationoccurreds);

        $this->notificationoccurredsScheduledForDeletion = unserialize(serialize($notificationoccurredsToDelete));

        foreach ($notificationoccurredsToDelete as $notificationoccurredRemoved) {
            $notificationoccurredRemoved->setPerson(null);
        }

        $this->collNotificationoccurreds = null;
        foreach ($notificationoccurreds as $notificationoccurred) {
            $this->addNotificationoccurred($notificationoccurred);
        }

        $this->collNotificationoccurreds = $notificationoccurreds;
        $this->collNotificationoccurredsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Notificationoccurred objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Notificationoccurred objects.
     * @throws PropelException
     */
    public function countNotificationoccurreds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNotificationoccurredsPartial && !$this->isNew();
        if (null === $this->collNotificationoccurreds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNotificationoccurreds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getNotificationoccurreds());
            }
            $query = NotificationoccurredQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPerson($this)
                ->count($con);
        }

        return count($this->collNotificationoccurreds);
    }

    /**
     * Method called to associate a Notificationoccurred object to this object
     * through the Notificationoccurred foreign key attribute.
     *
     * @param    Notificationoccurred $l Notificationoccurred
     * @return Person The current object (for fluent API support)
     */
    public function addNotificationoccurred(Notificationoccurred $l)
    {
        if ($this->collNotificationoccurreds === null) {
            $this->initNotificationoccurreds();
            $this->collNotificationoccurredsPartial = true;
        }
        if (!in_array($l, $this->collNotificationoccurreds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNotificationoccurred($l);
        }

        return $this;
    }

    /**
     * @param	Notificationoccurred $notificationoccurred The notificationoccurred object to add.
     */
    protected function doAddNotificationoccurred($notificationoccurred)
    {
        $this->collNotificationoccurreds[]= $notificationoccurred;
        $notificationoccurred->setPerson($this);
    }

    /**
     * @param	Notificationoccurred $notificationoccurred The notificationoccurred object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeNotificationoccurred($notificationoccurred)
    {
        if ($this->getNotificationoccurreds()->contains($notificationoccurred)) {
            $this->collNotificationoccurreds->remove($this->collNotificationoccurreds->search($notificationoccurred));
            if (null === $this->notificationoccurredsScheduledForDeletion) {
                $this->notificationoccurredsScheduledForDeletion = clone $this->collNotificationoccurreds;
                $this->notificationoccurredsScheduledForDeletion->clear();
            }
            $this->notificationoccurredsScheduledForDeletion[]= clone $notificationoccurred;
            $notificationoccurred->setPerson(null);
        }

        return $this;
    }

    /**
     * Clears out the collPersonTimetemplatesRelatedByCreatepersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addPersonTimetemplatesRelatedByCreatepersonId()
     */
    public function clearPersonTimetemplatesRelatedByCreatepersonId()
    {
        $this->collPersonTimetemplatesRelatedByCreatepersonId = null; // important to set this to null since that means it is uninitialized
        $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPersonTimetemplatesRelatedByCreatepersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonTimetemplatesRelatedByCreatepersonId($v = true)
    {
        $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial = $v;
    }

    /**
     * Initializes the collPersonTimetemplatesRelatedByCreatepersonId collection.
     *
     * By default this just sets the collPersonTimetemplatesRelatedByCreatepersonId collection to an empty array (like clearcollPersonTimetemplatesRelatedByCreatepersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonTimetemplatesRelatedByCreatepersonId($overrideExisting = true)
    {
        if (null !== $this->collPersonTimetemplatesRelatedByCreatepersonId && !$overrideExisting) {
            return;
        }
        $this->collPersonTimetemplatesRelatedByCreatepersonId = new PropelObjectCollection();
        $this->collPersonTimetemplatesRelatedByCreatepersonId->setModel('PersonTimetemplate');
    }

    /**
     * Gets an array of PersonTimetemplate objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonTimetemplate[] List of PersonTimetemplate objects
     * @throws PropelException
     */
    public function getPersonTimetemplatesRelatedByCreatepersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collPersonTimetemplatesRelatedByCreatepersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonTimetemplatesRelatedByCreatepersonId) {
                // return empty collection
                $this->initPersonTimetemplatesRelatedByCreatepersonId();
            } else {
                $collPersonTimetemplatesRelatedByCreatepersonId = PersonTimetemplateQuery::create(null, $criteria)
                    ->filterByPersonRelatedByCreatepersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial && count($collPersonTimetemplatesRelatedByCreatepersonId)) {
                      $this->initPersonTimetemplatesRelatedByCreatepersonId(false);

                      foreach($collPersonTimetemplatesRelatedByCreatepersonId as $obj) {
                        if (false == $this->collPersonTimetemplatesRelatedByCreatepersonId->contains($obj)) {
                          $this->collPersonTimetemplatesRelatedByCreatepersonId->append($obj);
                        }
                      }

                      $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial = true;
                    }

                    $collPersonTimetemplatesRelatedByCreatepersonId->getInternalIterator()->rewind();
                    return $collPersonTimetemplatesRelatedByCreatepersonId;
                }

                if($partial && $this->collPersonTimetemplatesRelatedByCreatepersonId) {
                    foreach($this->collPersonTimetemplatesRelatedByCreatepersonId as $obj) {
                        if($obj->isNew()) {
                            $collPersonTimetemplatesRelatedByCreatepersonId[] = $obj;
                        }
                    }
                }

                $this->collPersonTimetemplatesRelatedByCreatepersonId = $collPersonTimetemplatesRelatedByCreatepersonId;
                $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial = false;
            }
        }

        return $this->collPersonTimetemplatesRelatedByCreatepersonId;
    }

    /**
     * Sets a collection of PersonTimetemplateRelatedByCreatepersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personTimetemplatesRelatedByCreatepersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setPersonTimetemplatesRelatedByCreatepersonId(PropelCollection $personTimetemplatesRelatedByCreatepersonId, PropelPDO $con = null)
    {
        $personTimetemplatesRelatedByCreatepersonIdToDelete = $this->getPersonTimetemplatesRelatedByCreatepersonId(new Criteria(), $con)->diff($personTimetemplatesRelatedByCreatepersonId);

        $this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion = unserialize(serialize($personTimetemplatesRelatedByCreatepersonIdToDelete));

        foreach ($personTimetemplatesRelatedByCreatepersonIdToDelete as $personTimetemplateRelatedByCreatepersonIdRemoved) {
            $personTimetemplateRelatedByCreatepersonIdRemoved->setPersonRelatedByCreatepersonId(null);
        }

        $this->collPersonTimetemplatesRelatedByCreatepersonId = null;
        foreach ($personTimetemplatesRelatedByCreatepersonId as $personTimetemplateRelatedByCreatepersonId) {
            $this->addPersonTimetemplateRelatedByCreatepersonId($personTimetemplateRelatedByCreatepersonId);
        }

        $this->collPersonTimetemplatesRelatedByCreatepersonId = $personTimetemplatesRelatedByCreatepersonId;
        $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PersonTimetemplate objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonTimetemplate objects.
     * @throws PropelException
     */
    public function countPersonTimetemplatesRelatedByCreatepersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collPersonTimetemplatesRelatedByCreatepersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonTimetemplatesRelatedByCreatepersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPersonTimetemplatesRelatedByCreatepersonId());
            }
            $query = PersonTimetemplateQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByCreatepersonId($this)
                ->count($con);
        }

        return count($this->collPersonTimetemplatesRelatedByCreatepersonId);
    }

    /**
     * Method called to associate a PersonTimetemplate object to this object
     * through the PersonTimetemplate foreign key attribute.
     *
     * @param    PersonTimetemplate $l PersonTimetemplate
     * @return Person The current object (for fluent API support)
     */
    public function addPersonTimetemplateRelatedByCreatepersonId(PersonTimetemplate $l)
    {
        if ($this->collPersonTimetemplatesRelatedByCreatepersonId === null) {
            $this->initPersonTimetemplatesRelatedByCreatepersonId();
            $this->collPersonTimetemplatesRelatedByCreatepersonIdPartial = true;
        }
        if (!in_array($l, $this->collPersonTimetemplatesRelatedByCreatepersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonTimetemplateRelatedByCreatepersonId($l);
        }

        return $this;
    }

    /**
     * @param	PersonTimetemplateRelatedByCreatepersonId $personTimetemplateRelatedByCreatepersonId The personTimetemplateRelatedByCreatepersonId object to add.
     */
    protected function doAddPersonTimetemplateRelatedByCreatepersonId($personTimetemplateRelatedByCreatepersonId)
    {
        $this->collPersonTimetemplatesRelatedByCreatepersonId[]= $personTimetemplateRelatedByCreatepersonId;
        $personTimetemplateRelatedByCreatepersonId->setPersonRelatedByCreatepersonId($this);
    }

    /**
     * @param	PersonTimetemplateRelatedByCreatepersonId $personTimetemplateRelatedByCreatepersonId The personTimetemplateRelatedByCreatepersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removePersonTimetemplateRelatedByCreatepersonId($personTimetemplateRelatedByCreatepersonId)
    {
        if ($this->getPersonTimetemplatesRelatedByCreatepersonId()->contains($personTimetemplateRelatedByCreatepersonId)) {
            $this->collPersonTimetemplatesRelatedByCreatepersonId->remove($this->collPersonTimetemplatesRelatedByCreatepersonId->search($personTimetemplateRelatedByCreatepersonId));
            if (null === $this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion) {
                $this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion = clone $this->collPersonTimetemplatesRelatedByCreatepersonId;
                $this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion->clear();
            }
            $this->personTimetemplatesRelatedByCreatepersonIdScheduledForDeletion[]= $personTimetemplateRelatedByCreatepersonId;
            $personTimetemplateRelatedByCreatepersonId->setPersonRelatedByCreatepersonId(null);
        }

        return $this;
    }

    /**
     * Clears out the collPersonTimetemplatesRelatedByMasterId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addPersonTimetemplatesRelatedByMasterId()
     */
    public function clearPersonTimetemplatesRelatedByMasterId()
    {
        $this->collPersonTimetemplatesRelatedByMasterId = null; // important to set this to null since that means it is uninitialized
        $this->collPersonTimetemplatesRelatedByMasterIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPersonTimetemplatesRelatedByMasterId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonTimetemplatesRelatedByMasterId($v = true)
    {
        $this->collPersonTimetemplatesRelatedByMasterIdPartial = $v;
    }

    /**
     * Initializes the collPersonTimetemplatesRelatedByMasterId collection.
     *
     * By default this just sets the collPersonTimetemplatesRelatedByMasterId collection to an empty array (like clearcollPersonTimetemplatesRelatedByMasterId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonTimetemplatesRelatedByMasterId($overrideExisting = true)
    {
        if (null !== $this->collPersonTimetemplatesRelatedByMasterId && !$overrideExisting) {
            return;
        }
        $this->collPersonTimetemplatesRelatedByMasterId = new PropelObjectCollection();
        $this->collPersonTimetemplatesRelatedByMasterId->setModel('PersonTimetemplate');
    }

    /**
     * Gets an array of PersonTimetemplate objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonTimetemplate[] List of PersonTimetemplate objects
     * @throws PropelException
     */
    public function getPersonTimetemplatesRelatedByMasterId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonTimetemplatesRelatedByMasterIdPartial && !$this->isNew();
        if (null === $this->collPersonTimetemplatesRelatedByMasterId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonTimetemplatesRelatedByMasterId) {
                // return empty collection
                $this->initPersonTimetemplatesRelatedByMasterId();
            } else {
                $collPersonTimetemplatesRelatedByMasterId = PersonTimetemplateQuery::create(null, $criteria)
                    ->filterByPersonRelatedByMasterId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonTimetemplatesRelatedByMasterIdPartial && count($collPersonTimetemplatesRelatedByMasterId)) {
                      $this->initPersonTimetemplatesRelatedByMasterId(false);

                      foreach($collPersonTimetemplatesRelatedByMasterId as $obj) {
                        if (false == $this->collPersonTimetemplatesRelatedByMasterId->contains($obj)) {
                          $this->collPersonTimetemplatesRelatedByMasterId->append($obj);
                        }
                      }

                      $this->collPersonTimetemplatesRelatedByMasterIdPartial = true;
                    }

                    $collPersonTimetemplatesRelatedByMasterId->getInternalIterator()->rewind();
                    return $collPersonTimetemplatesRelatedByMasterId;
                }

                if($partial && $this->collPersonTimetemplatesRelatedByMasterId) {
                    foreach($this->collPersonTimetemplatesRelatedByMasterId as $obj) {
                        if($obj->isNew()) {
                            $collPersonTimetemplatesRelatedByMasterId[] = $obj;
                        }
                    }
                }

                $this->collPersonTimetemplatesRelatedByMasterId = $collPersonTimetemplatesRelatedByMasterId;
                $this->collPersonTimetemplatesRelatedByMasterIdPartial = false;
            }
        }

        return $this->collPersonTimetemplatesRelatedByMasterId;
    }

    /**
     * Sets a collection of PersonTimetemplateRelatedByMasterId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personTimetemplatesRelatedByMasterId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setPersonTimetemplatesRelatedByMasterId(PropelCollection $personTimetemplatesRelatedByMasterId, PropelPDO $con = null)
    {
        $personTimetemplatesRelatedByMasterIdToDelete = $this->getPersonTimetemplatesRelatedByMasterId(new Criteria(), $con)->diff($personTimetemplatesRelatedByMasterId);

        $this->personTimetemplatesRelatedByMasterIdScheduledForDeletion = unserialize(serialize($personTimetemplatesRelatedByMasterIdToDelete));

        foreach ($personTimetemplatesRelatedByMasterIdToDelete as $personTimetemplateRelatedByMasterIdRemoved) {
            $personTimetemplateRelatedByMasterIdRemoved->setPersonRelatedByMasterId(null);
        }

        $this->collPersonTimetemplatesRelatedByMasterId = null;
        foreach ($personTimetemplatesRelatedByMasterId as $personTimetemplateRelatedByMasterId) {
            $this->addPersonTimetemplateRelatedByMasterId($personTimetemplateRelatedByMasterId);
        }

        $this->collPersonTimetemplatesRelatedByMasterId = $personTimetemplatesRelatedByMasterId;
        $this->collPersonTimetemplatesRelatedByMasterIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PersonTimetemplate objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonTimetemplate objects.
     * @throws PropelException
     */
    public function countPersonTimetemplatesRelatedByMasterId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonTimetemplatesRelatedByMasterIdPartial && !$this->isNew();
        if (null === $this->collPersonTimetemplatesRelatedByMasterId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonTimetemplatesRelatedByMasterId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPersonTimetemplatesRelatedByMasterId());
            }
            $query = PersonTimetemplateQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByMasterId($this)
                ->count($con);
        }

        return count($this->collPersonTimetemplatesRelatedByMasterId);
    }

    /**
     * Method called to associate a PersonTimetemplate object to this object
     * through the PersonTimetemplate foreign key attribute.
     *
     * @param    PersonTimetemplate $l PersonTimetemplate
     * @return Person The current object (for fluent API support)
     */
    public function addPersonTimetemplateRelatedByMasterId(PersonTimetemplate $l)
    {
        if ($this->collPersonTimetemplatesRelatedByMasterId === null) {
            $this->initPersonTimetemplatesRelatedByMasterId();
            $this->collPersonTimetemplatesRelatedByMasterIdPartial = true;
        }
        if (!in_array($l, $this->collPersonTimetemplatesRelatedByMasterId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonTimetemplateRelatedByMasterId($l);
        }

        return $this;
    }

    /**
     * @param	PersonTimetemplateRelatedByMasterId $personTimetemplateRelatedByMasterId The personTimetemplateRelatedByMasterId object to add.
     */
    protected function doAddPersonTimetemplateRelatedByMasterId($personTimetemplateRelatedByMasterId)
    {
        $this->collPersonTimetemplatesRelatedByMasterId[]= $personTimetemplateRelatedByMasterId;
        $personTimetemplateRelatedByMasterId->setPersonRelatedByMasterId($this);
    }

    /**
     * @param	PersonTimetemplateRelatedByMasterId $personTimetemplateRelatedByMasterId The personTimetemplateRelatedByMasterId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removePersonTimetemplateRelatedByMasterId($personTimetemplateRelatedByMasterId)
    {
        if ($this->getPersonTimetemplatesRelatedByMasterId()->contains($personTimetemplateRelatedByMasterId)) {
            $this->collPersonTimetemplatesRelatedByMasterId->remove($this->collPersonTimetemplatesRelatedByMasterId->search($personTimetemplateRelatedByMasterId));
            if (null === $this->personTimetemplatesRelatedByMasterIdScheduledForDeletion) {
                $this->personTimetemplatesRelatedByMasterIdScheduledForDeletion = clone $this->collPersonTimetemplatesRelatedByMasterId;
                $this->personTimetemplatesRelatedByMasterIdScheduledForDeletion->clear();
            }
            $this->personTimetemplatesRelatedByMasterIdScheduledForDeletion[]= clone $personTimetemplateRelatedByMasterId;
            $personTimetemplateRelatedByMasterId->setPersonRelatedByMasterId(null);
        }

        return $this;
    }

    /**
     * Clears out the collPersonTimetemplatesRelatedByModifypersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addPersonTimetemplatesRelatedByModifypersonId()
     */
    public function clearPersonTimetemplatesRelatedByModifypersonId()
    {
        $this->collPersonTimetemplatesRelatedByModifypersonId = null; // important to set this to null since that means it is uninitialized
        $this->collPersonTimetemplatesRelatedByModifypersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPersonTimetemplatesRelatedByModifypersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPersonTimetemplatesRelatedByModifypersonId($v = true)
    {
        $this->collPersonTimetemplatesRelatedByModifypersonIdPartial = $v;
    }

    /**
     * Initializes the collPersonTimetemplatesRelatedByModifypersonId collection.
     *
     * By default this just sets the collPersonTimetemplatesRelatedByModifypersonId collection to an empty array (like clearcollPersonTimetemplatesRelatedByModifypersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonTimetemplatesRelatedByModifypersonId($overrideExisting = true)
    {
        if (null !== $this->collPersonTimetemplatesRelatedByModifypersonId && !$overrideExisting) {
            return;
        }
        $this->collPersonTimetemplatesRelatedByModifypersonId = new PropelObjectCollection();
        $this->collPersonTimetemplatesRelatedByModifypersonId->setModel('PersonTimetemplate');
    }

    /**
     * Gets an array of PersonTimetemplate objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PersonTimetemplate[] List of PersonTimetemplate objects
     * @throws PropelException
     */
    public function getPersonTimetemplatesRelatedByModifypersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPersonTimetemplatesRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collPersonTimetemplatesRelatedByModifypersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonTimetemplatesRelatedByModifypersonId) {
                // return empty collection
                $this->initPersonTimetemplatesRelatedByModifypersonId();
            } else {
                $collPersonTimetemplatesRelatedByModifypersonId = PersonTimetemplateQuery::create(null, $criteria)
                    ->filterByPersonRelatedByModifypersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPersonTimetemplatesRelatedByModifypersonIdPartial && count($collPersonTimetemplatesRelatedByModifypersonId)) {
                      $this->initPersonTimetemplatesRelatedByModifypersonId(false);

                      foreach($collPersonTimetemplatesRelatedByModifypersonId as $obj) {
                        if (false == $this->collPersonTimetemplatesRelatedByModifypersonId->contains($obj)) {
                          $this->collPersonTimetemplatesRelatedByModifypersonId->append($obj);
                        }
                      }

                      $this->collPersonTimetemplatesRelatedByModifypersonIdPartial = true;
                    }

                    $collPersonTimetemplatesRelatedByModifypersonId->getInternalIterator()->rewind();
                    return $collPersonTimetemplatesRelatedByModifypersonId;
                }

                if($partial && $this->collPersonTimetemplatesRelatedByModifypersonId) {
                    foreach($this->collPersonTimetemplatesRelatedByModifypersonId as $obj) {
                        if($obj->isNew()) {
                            $collPersonTimetemplatesRelatedByModifypersonId[] = $obj;
                        }
                    }
                }

                $this->collPersonTimetemplatesRelatedByModifypersonId = $collPersonTimetemplatesRelatedByModifypersonId;
                $this->collPersonTimetemplatesRelatedByModifypersonIdPartial = false;
            }
        }

        return $this->collPersonTimetemplatesRelatedByModifypersonId;
    }

    /**
     * Sets a collection of PersonTimetemplateRelatedByModifypersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $personTimetemplatesRelatedByModifypersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setPersonTimetemplatesRelatedByModifypersonId(PropelCollection $personTimetemplatesRelatedByModifypersonId, PropelPDO $con = null)
    {
        $personTimetemplatesRelatedByModifypersonIdToDelete = $this->getPersonTimetemplatesRelatedByModifypersonId(new Criteria(), $con)->diff($personTimetemplatesRelatedByModifypersonId);

        $this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion = unserialize(serialize($personTimetemplatesRelatedByModifypersonIdToDelete));

        foreach ($personTimetemplatesRelatedByModifypersonIdToDelete as $personTimetemplateRelatedByModifypersonIdRemoved) {
            $personTimetemplateRelatedByModifypersonIdRemoved->setPersonRelatedByModifypersonId(null);
        }

        $this->collPersonTimetemplatesRelatedByModifypersonId = null;
        foreach ($personTimetemplatesRelatedByModifypersonId as $personTimetemplateRelatedByModifypersonId) {
            $this->addPersonTimetemplateRelatedByModifypersonId($personTimetemplateRelatedByModifypersonId);
        }

        $this->collPersonTimetemplatesRelatedByModifypersonId = $personTimetemplatesRelatedByModifypersonId;
        $this->collPersonTimetemplatesRelatedByModifypersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PersonTimetemplate objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PersonTimetemplate objects.
     * @throws PropelException
     */
    public function countPersonTimetemplatesRelatedByModifypersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPersonTimetemplatesRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collPersonTimetemplatesRelatedByModifypersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonTimetemplatesRelatedByModifypersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPersonTimetemplatesRelatedByModifypersonId());
            }
            $query = PersonTimetemplateQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByModifypersonId($this)
                ->count($con);
        }

        return count($this->collPersonTimetemplatesRelatedByModifypersonId);
    }

    /**
     * Method called to associate a PersonTimetemplate object to this object
     * through the PersonTimetemplate foreign key attribute.
     *
     * @param    PersonTimetemplate $l PersonTimetemplate
     * @return Person The current object (for fluent API support)
     */
    public function addPersonTimetemplateRelatedByModifypersonId(PersonTimetemplate $l)
    {
        if ($this->collPersonTimetemplatesRelatedByModifypersonId === null) {
            $this->initPersonTimetemplatesRelatedByModifypersonId();
            $this->collPersonTimetemplatesRelatedByModifypersonIdPartial = true;
        }
        if (!in_array($l, $this->collPersonTimetemplatesRelatedByModifypersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPersonTimetemplateRelatedByModifypersonId($l);
        }

        return $this;
    }

    /**
     * @param	PersonTimetemplateRelatedByModifypersonId $personTimetemplateRelatedByModifypersonId The personTimetemplateRelatedByModifypersonId object to add.
     */
    protected function doAddPersonTimetemplateRelatedByModifypersonId($personTimetemplateRelatedByModifypersonId)
    {
        $this->collPersonTimetemplatesRelatedByModifypersonId[]= $personTimetemplateRelatedByModifypersonId;
        $personTimetemplateRelatedByModifypersonId->setPersonRelatedByModifypersonId($this);
    }

    /**
     * @param	PersonTimetemplateRelatedByModifypersonId $personTimetemplateRelatedByModifypersonId The personTimetemplateRelatedByModifypersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removePersonTimetemplateRelatedByModifypersonId($personTimetemplateRelatedByModifypersonId)
    {
        if ($this->getPersonTimetemplatesRelatedByModifypersonId()->contains($personTimetemplateRelatedByModifypersonId)) {
            $this->collPersonTimetemplatesRelatedByModifypersonId->remove($this->collPersonTimetemplatesRelatedByModifypersonId->search($personTimetemplateRelatedByModifypersonId));
            if (null === $this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion) {
                $this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion = clone $this->collPersonTimetemplatesRelatedByModifypersonId;
                $this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion->clear();
            }
            $this->personTimetemplatesRelatedByModifypersonIdScheduledForDeletion[]= $personTimetemplateRelatedByModifypersonId;
            $personTimetemplateRelatedByModifypersonId->setPersonRelatedByModifypersonId(null);
        }

        return $this;
    }

    /**
     * Clears out the collStockmotionsRelatedByCreatepersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockmotionsRelatedByCreatepersonId()
     */
    public function clearStockmotionsRelatedByCreatepersonId()
    {
        $this->collStockmotionsRelatedByCreatepersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionsRelatedByCreatepersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionsRelatedByCreatepersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionsRelatedByCreatepersonId($v = true)
    {
        $this->collStockmotionsRelatedByCreatepersonIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionsRelatedByCreatepersonId collection.
     *
     * By default this just sets the collStockmotionsRelatedByCreatepersonId collection to an empty array (like clearcollStockmotionsRelatedByCreatepersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionsRelatedByCreatepersonId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionsRelatedByCreatepersonId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionsRelatedByCreatepersonId = new PropelObjectCollection();
        $this->collStockmotionsRelatedByCreatepersonId->setModel('Stockmotion');
    }

    /**
     * Gets an array of Stockmotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     * @throws PropelException
     */
    public function getStockmotionsRelatedByCreatepersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByCreatepersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByCreatepersonId) {
                // return empty collection
                $this->initStockmotionsRelatedByCreatepersonId();
            } else {
                $collStockmotionsRelatedByCreatepersonId = StockmotionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByCreatepersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionsRelatedByCreatepersonIdPartial && count($collStockmotionsRelatedByCreatepersonId)) {
                      $this->initStockmotionsRelatedByCreatepersonId(false);

                      foreach($collStockmotionsRelatedByCreatepersonId as $obj) {
                        if (false == $this->collStockmotionsRelatedByCreatepersonId->contains($obj)) {
                          $this->collStockmotionsRelatedByCreatepersonId->append($obj);
                        }
                      }

                      $this->collStockmotionsRelatedByCreatepersonIdPartial = true;
                    }

                    $collStockmotionsRelatedByCreatepersonId->getInternalIterator()->rewind();
                    return $collStockmotionsRelatedByCreatepersonId;
                }

                if($partial && $this->collStockmotionsRelatedByCreatepersonId) {
                    foreach($this->collStockmotionsRelatedByCreatepersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionsRelatedByCreatepersonId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionsRelatedByCreatepersonId = $collStockmotionsRelatedByCreatepersonId;
                $this->collStockmotionsRelatedByCreatepersonIdPartial = false;
            }
        }

        return $this->collStockmotionsRelatedByCreatepersonId;
    }

    /**
     * Sets a collection of StockmotionRelatedByCreatepersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionsRelatedByCreatepersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockmotionsRelatedByCreatepersonId(PropelCollection $stockmotionsRelatedByCreatepersonId, PropelPDO $con = null)
    {
        $stockmotionsRelatedByCreatepersonIdToDelete = $this->getStockmotionsRelatedByCreatepersonId(new Criteria(), $con)->diff($stockmotionsRelatedByCreatepersonId);

        $this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion = unserialize(serialize($stockmotionsRelatedByCreatepersonIdToDelete));

        foreach ($stockmotionsRelatedByCreatepersonIdToDelete as $stockmotionRelatedByCreatepersonIdRemoved) {
            $stockmotionRelatedByCreatepersonIdRemoved->setPersonRelatedByCreatepersonId(null);
        }

        $this->collStockmotionsRelatedByCreatepersonId = null;
        foreach ($stockmotionsRelatedByCreatepersonId as $stockmotionRelatedByCreatepersonId) {
            $this->addStockmotionRelatedByCreatepersonId($stockmotionRelatedByCreatepersonId);
        }

        $this->collStockmotionsRelatedByCreatepersonId = $stockmotionsRelatedByCreatepersonId;
        $this->collStockmotionsRelatedByCreatepersonIdPartial = false;

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
    public function countStockmotionsRelatedByCreatepersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByCreatepersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByCreatepersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionsRelatedByCreatepersonId());
            }
            $query = StockmotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByCreatepersonId($this)
                ->count($con);
        }

        return count($this->collStockmotionsRelatedByCreatepersonId);
    }

    /**
     * Method called to associate a Stockmotion object to this object
     * through the Stockmotion foreign key attribute.
     *
     * @param    Stockmotion $l Stockmotion
     * @return Person The current object (for fluent API support)
     */
    public function addStockmotionRelatedByCreatepersonId(Stockmotion $l)
    {
        if ($this->collStockmotionsRelatedByCreatepersonId === null) {
            $this->initStockmotionsRelatedByCreatepersonId();
            $this->collStockmotionsRelatedByCreatepersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionsRelatedByCreatepersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionRelatedByCreatepersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionRelatedByCreatepersonId $stockmotionRelatedByCreatepersonId The stockmotionRelatedByCreatepersonId object to add.
     */
    protected function doAddStockmotionRelatedByCreatepersonId($stockmotionRelatedByCreatepersonId)
    {
        $this->collStockmotionsRelatedByCreatepersonId[]= $stockmotionRelatedByCreatepersonId;
        $stockmotionRelatedByCreatepersonId->setPersonRelatedByCreatepersonId($this);
    }

    /**
     * @param	StockmotionRelatedByCreatepersonId $stockmotionRelatedByCreatepersonId The stockmotionRelatedByCreatepersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockmotionRelatedByCreatepersonId($stockmotionRelatedByCreatepersonId)
    {
        if ($this->getStockmotionsRelatedByCreatepersonId()->contains($stockmotionRelatedByCreatepersonId)) {
            $this->collStockmotionsRelatedByCreatepersonId->remove($this->collStockmotionsRelatedByCreatepersonId->search($stockmotionRelatedByCreatepersonId));
            if (null === $this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion) {
                $this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion = clone $this->collStockmotionsRelatedByCreatepersonId;
                $this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion->clear();
            }
            $this->stockmotionsRelatedByCreatepersonIdScheduledForDeletion[]= $stockmotionRelatedByCreatepersonId;
            $stockmotionRelatedByCreatepersonId->setPersonRelatedByCreatepersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByCreatepersonIdJoinOrgstructureRelatedByReceiverId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByReceiverId', $join_behavior);

        return $this->getStockmotionsRelatedByCreatepersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByCreatepersonIdJoinOrgstructureRelatedBySupplierId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedBySupplierId', $join_behavior);

        return $this->getStockmotionsRelatedByCreatepersonId($query, $con);
    }

    /**
     * Clears out the collStockmotionsRelatedByModifypersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockmotionsRelatedByModifypersonId()
     */
    public function clearStockmotionsRelatedByModifypersonId()
    {
        $this->collStockmotionsRelatedByModifypersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionsRelatedByModifypersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionsRelatedByModifypersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionsRelatedByModifypersonId($v = true)
    {
        $this->collStockmotionsRelatedByModifypersonIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionsRelatedByModifypersonId collection.
     *
     * By default this just sets the collStockmotionsRelatedByModifypersonId collection to an empty array (like clearcollStockmotionsRelatedByModifypersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionsRelatedByModifypersonId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionsRelatedByModifypersonId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionsRelatedByModifypersonId = new PropelObjectCollection();
        $this->collStockmotionsRelatedByModifypersonId->setModel('Stockmotion');
    }

    /**
     * Gets an array of Stockmotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     * @throws PropelException
     */
    public function getStockmotionsRelatedByModifypersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByModifypersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByModifypersonId) {
                // return empty collection
                $this->initStockmotionsRelatedByModifypersonId();
            } else {
                $collStockmotionsRelatedByModifypersonId = StockmotionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByModifypersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionsRelatedByModifypersonIdPartial && count($collStockmotionsRelatedByModifypersonId)) {
                      $this->initStockmotionsRelatedByModifypersonId(false);

                      foreach($collStockmotionsRelatedByModifypersonId as $obj) {
                        if (false == $this->collStockmotionsRelatedByModifypersonId->contains($obj)) {
                          $this->collStockmotionsRelatedByModifypersonId->append($obj);
                        }
                      }

                      $this->collStockmotionsRelatedByModifypersonIdPartial = true;
                    }

                    $collStockmotionsRelatedByModifypersonId->getInternalIterator()->rewind();
                    return $collStockmotionsRelatedByModifypersonId;
                }

                if($partial && $this->collStockmotionsRelatedByModifypersonId) {
                    foreach($this->collStockmotionsRelatedByModifypersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionsRelatedByModifypersonId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionsRelatedByModifypersonId = $collStockmotionsRelatedByModifypersonId;
                $this->collStockmotionsRelatedByModifypersonIdPartial = false;
            }
        }

        return $this->collStockmotionsRelatedByModifypersonId;
    }

    /**
     * Sets a collection of StockmotionRelatedByModifypersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionsRelatedByModifypersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockmotionsRelatedByModifypersonId(PropelCollection $stockmotionsRelatedByModifypersonId, PropelPDO $con = null)
    {
        $stockmotionsRelatedByModifypersonIdToDelete = $this->getStockmotionsRelatedByModifypersonId(new Criteria(), $con)->diff($stockmotionsRelatedByModifypersonId);

        $this->stockmotionsRelatedByModifypersonIdScheduledForDeletion = unserialize(serialize($stockmotionsRelatedByModifypersonIdToDelete));

        foreach ($stockmotionsRelatedByModifypersonIdToDelete as $stockmotionRelatedByModifypersonIdRemoved) {
            $stockmotionRelatedByModifypersonIdRemoved->setPersonRelatedByModifypersonId(null);
        }

        $this->collStockmotionsRelatedByModifypersonId = null;
        foreach ($stockmotionsRelatedByModifypersonId as $stockmotionRelatedByModifypersonId) {
            $this->addStockmotionRelatedByModifypersonId($stockmotionRelatedByModifypersonId);
        }

        $this->collStockmotionsRelatedByModifypersonId = $stockmotionsRelatedByModifypersonId;
        $this->collStockmotionsRelatedByModifypersonIdPartial = false;

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
    public function countStockmotionsRelatedByModifypersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByModifypersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByModifypersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionsRelatedByModifypersonId());
            }
            $query = StockmotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByModifypersonId($this)
                ->count($con);
        }

        return count($this->collStockmotionsRelatedByModifypersonId);
    }

    /**
     * Method called to associate a Stockmotion object to this object
     * through the Stockmotion foreign key attribute.
     *
     * @param    Stockmotion $l Stockmotion
     * @return Person The current object (for fluent API support)
     */
    public function addStockmotionRelatedByModifypersonId(Stockmotion $l)
    {
        if ($this->collStockmotionsRelatedByModifypersonId === null) {
            $this->initStockmotionsRelatedByModifypersonId();
            $this->collStockmotionsRelatedByModifypersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionsRelatedByModifypersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionRelatedByModifypersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionRelatedByModifypersonId $stockmotionRelatedByModifypersonId The stockmotionRelatedByModifypersonId object to add.
     */
    protected function doAddStockmotionRelatedByModifypersonId($stockmotionRelatedByModifypersonId)
    {
        $this->collStockmotionsRelatedByModifypersonId[]= $stockmotionRelatedByModifypersonId;
        $stockmotionRelatedByModifypersonId->setPersonRelatedByModifypersonId($this);
    }

    /**
     * @param	StockmotionRelatedByModifypersonId $stockmotionRelatedByModifypersonId The stockmotionRelatedByModifypersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockmotionRelatedByModifypersonId($stockmotionRelatedByModifypersonId)
    {
        if ($this->getStockmotionsRelatedByModifypersonId()->contains($stockmotionRelatedByModifypersonId)) {
            $this->collStockmotionsRelatedByModifypersonId->remove($this->collStockmotionsRelatedByModifypersonId->search($stockmotionRelatedByModifypersonId));
            if (null === $this->stockmotionsRelatedByModifypersonIdScheduledForDeletion) {
                $this->stockmotionsRelatedByModifypersonIdScheduledForDeletion = clone $this->collStockmotionsRelatedByModifypersonId;
                $this->stockmotionsRelatedByModifypersonIdScheduledForDeletion->clear();
            }
            $this->stockmotionsRelatedByModifypersonIdScheduledForDeletion[]= $stockmotionRelatedByModifypersonId;
            $stockmotionRelatedByModifypersonId->setPersonRelatedByModifypersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByModifypersonIdJoinOrgstructureRelatedByReceiverId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByReceiverId', $join_behavior);

        return $this->getStockmotionsRelatedByModifypersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByModifypersonIdJoinOrgstructureRelatedBySupplierId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedBySupplierId', $join_behavior);

        return $this->getStockmotionsRelatedByModifypersonId($query, $con);
    }

    /**
     * Clears out the collStockmotionsRelatedByReceiverpersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockmotionsRelatedByReceiverpersonId()
     */
    public function clearStockmotionsRelatedByReceiverpersonId()
    {
        $this->collStockmotionsRelatedByReceiverpersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionsRelatedByReceiverpersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionsRelatedByReceiverpersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionsRelatedByReceiverpersonId($v = true)
    {
        $this->collStockmotionsRelatedByReceiverpersonIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionsRelatedByReceiverpersonId collection.
     *
     * By default this just sets the collStockmotionsRelatedByReceiverpersonId collection to an empty array (like clearcollStockmotionsRelatedByReceiverpersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionsRelatedByReceiverpersonId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionsRelatedByReceiverpersonId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionsRelatedByReceiverpersonId = new PropelObjectCollection();
        $this->collStockmotionsRelatedByReceiverpersonId->setModel('Stockmotion');
    }

    /**
     * Gets an array of Stockmotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     * @throws PropelException
     */
    public function getStockmotionsRelatedByReceiverpersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByReceiverpersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByReceiverpersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByReceiverpersonId) {
                // return empty collection
                $this->initStockmotionsRelatedByReceiverpersonId();
            } else {
                $collStockmotionsRelatedByReceiverpersonId = StockmotionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByReceiverpersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionsRelatedByReceiverpersonIdPartial && count($collStockmotionsRelatedByReceiverpersonId)) {
                      $this->initStockmotionsRelatedByReceiverpersonId(false);

                      foreach($collStockmotionsRelatedByReceiverpersonId as $obj) {
                        if (false == $this->collStockmotionsRelatedByReceiverpersonId->contains($obj)) {
                          $this->collStockmotionsRelatedByReceiverpersonId->append($obj);
                        }
                      }

                      $this->collStockmotionsRelatedByReceiverpersonIdPartial = true;
                    }

                    $collStockmotionsRelatedByReceiverpersonId->getInternalIterator()->rewind();
                    return $collStockmotionsRelatedByReceiverpersonId;
                }

                if($partial && $this->collStockmotionsRelatedByReceiverpersonId) {
                    foreach($this->collStockmotionsRelatedByReceiverpersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionsRelatedByReceiverpersonId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionsRelatedByReceiverpersonId = $collStockmotionsRelatedByReceiverpersonId;
                $this->collStockmotionsRelatedByReceiverpersonIdPartial = false;
            }
        }

        return $this->collStockmotionsRelatedByReceiverpersonId;
    }

    /**
     * Sets a collection of StockmotionRelatedByReceiverpersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionsRelatedByReceiverpersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockmotionsRelatedByReceiverpersonId(PropelCollection $stockmotionsRelatedByReceiverpersonId, PropelPDO $con = null)
    {
        $stockmotionsRelatedByReceiverpersonIdToDelete = $this->getStockmotionsRelatedByReceiverpersonId(new Criteria(), $con)->diff($stockmotionsRelatedByReceiverpersonId);

        $this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion = unserialize(serialize($stockmotionsRelatedByReceiverpersonIdToDelete));

        foreach ($stockmotionsRelatedByReceiverpersonIdToDelete as $stockmotionRelatedByReceiverpersonIdRemoved) {
            $stockmotionRelatedByReceiverpersonIdRemoved->setPersonRelatedByReceiverpersonId(null);
        }

        $this->collStockmotionsRelatedByReceiverpersonId = null;
        foreach ($stockmotionsRelatedByReceiverpersonId as $stockmotionRelatedByReceiverpersonId) {
            $this->addStockmotionRelatedByReceiverpersonId($stockmotionRelatedByReceiverpersonId);
        }

        $this->collStockmotionsRelatedByReceiverpersonId = $stockmotionsRelatedByReceiverpersonId;
        $this->collStockmotionsRelatedByReceiverpersonIdPartial = false;

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
    public function countStockmotionsRelatedByReceiverpersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedByReceiverpersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedByReceiverpersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedByReceiverpersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionsRelatedByReceiverpersonId());
            }
            $query = StockmotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByReceiverpersonId($this)
                ->count($con);
        }

        return count($this->collStockmotionsRelatedByReceiverpersonId);
    }

    /**
     * Method called to associate a Stockmotion object to this object
     * through the Stockmotion foreign key attribute.
     *
     * @param    Stockmotion $l Stockmotion
     * @return Person The current object (for fluent API support)
     */
    public function addStockmotionRelatedByReceiverpersonId(Stockmotion $l)
    {
        if ($this->collStockmotionsRelatedByReceiverpersonId === null) {
            $this->initStockmotionsRelatedByReceiverpersonId();
            $this->collStockmotionsRelatedByReceiverpersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionsRelatedByReceiverpersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionRelatedByReceiverpersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionRelatedByReceiverpersonId $stockmotionRelatedByReceiverpersonId The stockmotionRelatedByReceiverpersonId object to add.
     */
    protected function doAddStockmotionRelatedByReceiverpersonId($stockmotionRelatedByReceiverpersonId)
    {
        $this->collStockmotionsRelatedByReceiverpersonId[]= $stockmotionRelatedByReceiverpersonId;
        $stockmotionRelatedByReceiverpersonId->setPersonRelatedByReceiverpersonId($this);
    }

    /**
     * @param	StockmotionRelatedByReceiverpersonId $stockmotionRelatedByReceiverpersonId The stockmotionRelatedByReceiverpersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockmotionRelatedByReceiverpersonId($stockmotionRelatedByReceiverpersonId)
    {
        if ($this->getStockmotionsRelatedByReceiverpersonId()->contains($stockmotionRelatedByReceiverpersonId)) {
            $this->collStockmotionsRelatedByReceiverpersonId->remove($this->collStockmotionsRelatedByReceiverpersonId->search($stockmotionRelatedByReceiverpersonId));
            if (null === $this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion) {
                $this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion = clone $this->collStockmotionsRelatedByReceiverpersonId;
                $this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion->clear();
            }
            $this->stockmotionsRelatedByReceiverpersonIdScheduledForDeletion[]= $stockmotionRelatedByReceiverpersonId;
            $stockmotionRelatedByReceiverpersonId->setPersonRelatedByReceiverpersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedByReceiverpersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByReceiverpersonIdJoinOrgstructureRelatedByReceiverId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByReceiverId', $join_behavior);

        return $this->getStockmotionsRelatedByReceiverpersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedByReceiverpersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedByReceiverpersonIdJoinOrgstructureRelatedBySupplierId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedBySupplierId', $join_behavior);

        return $this->getStockmotionsRelatedByReceiverpersonId($query, $con);
    }

    /**
     * Clears out the collStockmotionsRelatedBySupplierpersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockmotionsRelatedBySupplierpersonId()
     */
    public function clearStockmotionsRelatedBySupplierpersonId()
    {
        $this->collStockmotionsRelatedBySupplierpersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionsRelatedBySupplierpersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionsRelatedBySupplierpersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionsRelatedBySupplierpersonId($v = true)
    {
        $this->collStockmotionsRelatedBySupplierpersonIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionsRelatedBySupplierpersonId collection.
     *
     * By default this just sets the collStockmotionsRelatedBySupplierpersonId collection to an empty array (like clearcollStockmotionsRelatedBySupplierpersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionsRelatedBySupplierpersonId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionsRelatedBySupplierpersonId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionsRelatedBySupplierpersonId = new PropelObjectCollection();
        $this->collStockmotionsRelatedBySupplierpersonId->setModel('Stockmotion');
    }

    /**
     * Gets an array of Stockmotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     * @throws PropelException
     */
    public function getStockmotionsRelatedBySupplierpersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedBySupplierpersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedBySupplierpersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedBySupplierpersonId) {
                // return empty collection
                $this->initStockmotionsRelatedBySupplierpersonId();
            } else {
                $collStockmotionsRelatedBySupplierpersonId = StockmotionQuery::create(null, $criteria)
                    ->filterByPersonRelatedBySupplierpersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionsRelatedBySupplierpersonIdPartial && count($collStockmotionsRelatedBySupplierpersonId)) {
                      $this->initStockmotionsRelatedBySupplierpersonId(false);

                      foreach($collStockmotionsRelatedBySupplierpersonId as $obj) {
                        if (false == $this->collStockmotionsRelatedBySupplierpersonId->contains($obj)) {
                          $this->collStockmotionsRelatedBySupplierpersonId->append($obj);
                        }
                      }

                      $this->collStockmotionsRelatedBySupplierpersonIdPartial = true;
                    }

                    $collStockmotionsRelatedBySupplierpersonId->getInternalIterator()->rewind();
                    return $collStockmotionsRelatedBySupplierpersonId;
                }

                if($partial && $this->collStockmotionsRelatedBySupplierpersonId) {
                    foreach($this->collStockmotionsRelatedBySupplierpersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionsRelatedBySupplierpersonId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionsRelatedBySupplierpersonId = $collStockmotionsRelatedBySupplierpersonId;
                $this->collStockmotionsRelatedBySupplierpersonIdPartial = false;
            }
        }

        return $this->collStockmotionsRelatedBySupplierpersonId;
    }

    /**
     * Sets a collection of StockmotionRelatedBySupplierpersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionsRelatedBySupplierpersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockmotionsRelatedBySupplierpersonId(PropelCollection $stockmotionsRelatedBySupplierpersonId, PropelPDO $con = null)
    {
        $stockmotionsRelatedBySupplierpersonIdToDelete = $this->getStockmotionsRelatedBySupplierpersonId(new Criteria(), $con)->diff($stockmotionsRelatedBySupplierpersonId);

        $this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion = unserialize(serialize($stockmotionsRelatedBySupplierpersonIdToDelete));

        foreach ($stockmotionsRelatedBySupplierpersonIdToDelete as $stockmotionRelatedBySupplierpersonIdRemoved) {
            $stockmotionRelatedBySupplierpersonIdRemoved->setPersonRelatedBySupplierpersonId(null);
        }

        $this->collStockmotionsRelatedBySupplierpersonId = null;
        foreach ($stockmotionsRelatedBySupplierpersonId as $stockmotionRelatedBySupplierpersonId) {
            $this->addStockmotionRelatedBySupplierpersonId($stockmotionRelatedBySupplierpersonId);
        }

        $this->collStockmotionsRelatedBySupplierpersonId = $stockmotionsRelatedBySupplierpersonId;
        $this->collStockmotionsRelatedBySupplierpersonIdPartial = false;

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
    public function countStockmotionsRelatedBySupplierpersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionsRelatedBySupplierpersonIdPartial && !$this->isNew();
        if (null === $this->collStockmotionsRelatedBySupplierpersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionsRelatedBySupplierpersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionsRelatedBySupplierpersonId());
            }
            $query = StockmotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedBySupplierpersonId($this)
                ->count($con);
        }

        return count($this->collStockmotionsRelatedBySupplierpersonId);
    }

    /**
     * Method called to associate a Stockmotion object to this object
     * through the Stockmotion foreign key attribute.
     *
     * @param    Stockmotion $l Stockmotion
     * @return Person The current object (for fluent API support)
     */
    public function addStockmotionRelatedBySupplierpersonId(Stockmotion $l)
    {
        if ($this->collStockmotionsRelatedBySupplierpersonId === null) {
            $this->initStockmotionsRelatedBySupplierpersonId();
            $this->collStockmotionsRelatedBySupplierpersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionsRelatedBySupplierpersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionRelatedBySupplierpersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionRelatedBySupplierpersonId $stockmotionRelatedBySupplierpersonId The stockmotionRelatedBySupplierpersonId object to add.
     */
    protected function doAddStockmotionRelatedBySupplierpersonId($stockmotionRelatedBySupplierpersonId)
    {
        $this->collStockmotionsRelatedBySupplierpersonId[]= $stockmotionRelatedBySupplierpersonId;
        $stockmotionRelatedBySupplierpersonId->setPersonRelatedBySupplierpersonId($this);
    }

    /**
     * @param	StockmotionRelatedBySupplierpersonId $stockmotionRelatedBySupplierpersonId The stockmotionRelatedBySupplierpersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockmotionRelatedBySupplierpersonId($stockmotionRelatedBySupplierpersonId)
    {
        if ($this->getStockmotionsRelatedBySupplierpersonId()->contains($stockmotionRelatedBySupplierpersonId)) {
            $this->collStockmotionsRelatedBySupplierpersonId->remove($this->collStockmotionsRelatedBySupplierpersonId->search($stockmotionRelatedBySupplierpersonId));
            if (null === $this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion) {
                $this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion = clone $this->collStockmotionsRelatedBySupplierpersonId;
                $this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion->clear();
            }
            $this->stockmotionsRelatedBySupplierpersonIdScheduledForDeletion[]= $stockmotionRelatedBySupplierpersonId;
            $stockmotionRelatedBySupplierpersonId->setPersonRelatedBySupplierpersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedBySupplierpersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedBySupplierpersonIdJoinOrgstructureRelatedByReceiverId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByReceiverId', $join_behavior);

        return $this->getStockmotionsRelatedBySupplierpersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockmotionsRelatedBySupplierpersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockmotion[] List of Stockmotion objects
     */
    public function getStockmotionsRelatedBySupplierpersonIdJoinOrgstructureRelatedBySupplierId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedBySupplierId', $join_behavior);

        return $this->getStockmotionsRelatedBySupplierpersonId($query, $con);
    }

    /**
     * Clears out the collStockrecipesRelatedByCreatepersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockrecipesRelatedByCreatepersonId()
     */
    public function clearStockrecipesRelatedByCreatepersonId()
    {
        $this->collStockrecipesRelatedByCreatepersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockrecipesRelatedByCreatepersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrecipesRelatedByCreatepersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrecipesRelatedByCreatepersonId($v = true)
    {
        $this->collStockrecipesRelatedByCreatepersonIdPartial = $v;
    }

    /**
     * Initializes the collStockrecipesRelatedByCreatepersonId collection.
     *
     * By default this just sets the collStockrecipesRelatedByCreatepersonId collection to an empty array (like clearcollStockrecipesRelatedByCreatepersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrecipesRelatedByCreatepersonId($overrideExisting = true)
    {
        if (null !== $this->collStockrecipesRelatedByCreatepersonId && !$overrideExisting) {
            return;
        }
        $this->collStockrecipesRelatedByCreatepersonId = new PropelObjectCollection();
        $this->collStockrecipesRelatedByCreatepersonId->setModel('Stockrecipe');
    }

    /**
     * Gets an array of Stockrecipe objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     * @throws PropelException
     */
    public function getStockrecipesRelatedByCreatepersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipesRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collStockrecipesRelatedByCreatepersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrecipesRelatedByCreatepersonId) {
                // return empty collection
                $this->initStockrecipesRelatedByCreatepersonId();
            } else {
                $collStockrecipesRelatedByCreatepersonId = StockrecipeQuery::create(null, $criteria)
                    ->filterByPersonRelatedByCreatepersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrecipesRelatedByCreatepersonIdPartial && count($collStockrecipesRelatedByCreatepersonId)) {
                      $this->initStockrecipesRelatedByCreatepersonId(false);

                      foreach($collStockrecipesRelatedByCreatepersonId as $obj) {
                        if (false == $this->collStockrecipesRelatedByCreatepersonId->contains($obj)) {
                          $this->collStockrecipesRelatedByCreatepersonId->append($obj);
                        }
                      }

                      $this->collStockrecipesRelatedByCreatepersonIdPartial = true;
                    }

                    $collStockrecipesRelatedByCreatepersonId->getInternalIterator()->rewind();
                    return $collStockrecipesRelatedByCreatepersonId;
                }

                if($partial && $this->collStockrecipesRelatedByCreatepersonId) {
                    foreach($this->collStockrecipesRelatedByCreatepersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockrecipesRelatedByCreatepersonId[] = $obj;
                        }
                    }
                }

                $this->collStockrecipesRelatedByCreatepersonId = $collStockrecipesRelatedByCreatepersonId;
                $this->collStockrecipesRelatedByCreatepersonIdPartial = false;
            }
        }

        return $this->collStockrecipesRelatedByCreatepersonId;
    }

    /**
     * Sets a collection of StockrecipeRelatedByCreatepersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrecipesRelatedByCreatepersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockrecipesRelatedByCreatepersonId(PropelCollection $stockrecipesRelatedByCreatepersonId, PropelPDO $con = null)
    {
        $stockrecipesRelatedByCreatepersonIdToDelete = $this->getStockrecipesRelatedByCreatepersonId(new Criteria(), $con)->diff($stockrecipesRelatedByCreatepersonId);

        $this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion = unserialize(serialize($stockrecipesRelatedByCreatepersonIdToDelete));

        foreach ($stockrecipesRelatedByCreatepersonIdToDelete as $stockrecipeRelatedByCreatepersonIdRemoved) {
            $stockrecipeRelatedByCreatepersonIdRemoved->setPersonRelatedByCreatepersonId(null);
        }

        $this->collStockrecipesRelatedByCreatepersonId = null;
        foreach ($stockrecipesRelatedByCreatepersonId as $stockrecipeRelatedByCreatepersonId) {
            $this->addStockrecipeRelatedByCreatepersonId($stockrecipeRelatedByCreatepersonId);
        }

        $this->collStockrecipesRelatedByCreatepersonId = $stockrecipesRelatedByCreatepersonId;
        $this->collStockrecipesRelatedByCreatepersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockrecipe objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockrecipe objects.
     * @throws PropelException
     */
    public function countStockrecipesRelatedByCreatepersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipesRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collStockrecipesRelatedByCreatepersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrecipesRelatedByCreatepersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrecipesRelatedByCreatepersonId());
            }
            $query = StockrecipeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByCreatepersonId($this)
                ->count($con);
        }

        return count($this->collStockrecipesRelatedByCreatepersonId);
    }

    /**
     * Method called to associate a Stockrecipe object to this object
     * through the Stockrecipe foreign key attribute.
     *
     * @param    Stockrecipe $l Stockrecipe
     * @return Person The current object (for fluent API support)
     */
    public function addStockrecipeRelatedByCreatepersonId(Stockrecipe $l)
    {
        if ($this->collStockrecipesRelatedByCreatepersonId === null) {
            $this->initStockrecipesRelatedByCreatepersonId();
            $this->collStockrecipesRelatedByCreatepersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockrecipesRelatedByCreatepersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrecipeRelatedByCreatepersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockrecipeRelatedByCreatepersonId $stockrecipeRelatedByCreatepersonId The stockrecipeRelatedByCreatepersonId object to add.
     */
    protected function doAddStockrecipeRelatedByCreatepersonId($stockrecipeRelatedByCreatepersonId)
    {
        $this->collStockrecipesRelatedByCreatepersonId[]= $stockrecipeRelatedByCreatepersonId;
        $stockrecipeRelatedByCreatepersonId->setPersonRelatedByCreatepersonId($this);
    }

    /**
     * @param	StockrecipeRelatedByCreatepersonId $stockrecipeRelatedByCreatepersonId The stockrecipeRelatedByCreatepersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockrecipeRelatedByCreatepersonId($stockrecipeRelatedByCreatepersonId)
    {
        if ($this->getStockrecipesRelatedByCreatepersonId()->contains($stockrecipeRelatedByCreatepersonId)) {
            $this->collStockrecipesRelatedByCreatepersonId->remove($this->collStockrecipesRelatedByCreatepersonId->search($stockrecipeRelatedByCreatepersonId));
            if (null === $this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion) {
                $this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion = clone $this->collStockrecipesRelatedByCreatepersonId;
                $this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion->clear();
            }
            $this->stockrecipesRelatedByCreatepersonIdScheduledForDeletion[]= $stockrecipeRelatedByCreatepersonId;
            $stockrecipeRelatedByCreatepersonId->setPersonRelatedByCreatepersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockrecipesRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     */
    public function getStockrecipesRelatedByCreatepersonIdJoinStockrecipeRelatedByGroupId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrecipeQuery::create(null, $criteria);
        $query->joinWith('StockrecipeRelatedByGroupId', $join_behavior);

        return $this->getStockrecipesRelatedByCreatepersonId($query, $con);
    }

    /**
     * Clears out the collStockrecipesRelatedByModifypersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockrecipesRelatedByModifypersonId()
     */
    public function clearStockrecipesRelatedByModifypersonId()
    {
        $this->collStockrecipesRelatedByModifypersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockrecipesRelatedByModifypersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrecipesRelatedByModifypersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrecipesRelatedByModifypersonId($v = true)
    {
        $this->collStockrecipesRelatedByModifypersonIdPartial = $v;
    }

    /**
     * Initializes the collStockrecipesRelatedByModifypersonId collection.
     *
     * By default this just sets the collStockrecipesRelatedByModifypersonId collection to an empty array (like clearcollStockrecipesRelatedByModifypersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrecipesRelatedByModifypersonId($overrideExisting = true)
    {
        if (null !== $this->collStockrecipesRelatedByModifypersonId && !$overrideExisting) {
            return;
        }
        $this->collStockrecipesRelatedByModifypersonId = new PropelObjectCollection();
        $this->collStockrecipesRelatedByModifypersonId->setModel('Stockrecipe');
    }

    /**
     * Gets an array of Stockrecipe objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     * @throws PropelException
     */
    public function getStockrecipesRelatedByModifypersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipesRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collStockrecipesRelatedByModifypersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrecipesRelatedByModifypersonId) {
                // return empty collection
                $this->initStockrecipesRelatedByModifypersonId();
            } else {
                $collStockrecipesRelatedByModifypersonId = StockrecipeQuery::create(null, $criteria)
                    ->filterByPersonRelatedByModifypersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrecipesRelatedByModifypersonIdPartial && count($collStockrecipesRelatedByModifypersonId)) {
                      $this->initStockrecipesRelatedByModifypersonId(false);

                      foreach($collStockrecipesRelatedByModifypersonId as $obj) {
                        if (false == $this->collStockrecipesRelatedByModifypersonId->contains($obj)) {
                          $this->collStockrecipesRelatedByModifypersonId->append($obj);
                        }
                      }

                      $this->collStockrecipesRelatedByModifypersonIdPartial = true;
                    }

                    $collStockrecipesRelatedByModifypersonId->getInternalIterator()->rewind();
                    return $collStockrecipesRelatedByModifypersonId;
                }

                if($partial && $this->collStockrecipesRelatedByModifypersonId) {
                    foreach($this->collStockrecipesRelatedByModifypersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockrecipesRelatedByModifypersonId[] = $obj;
                        }
                    }
                }

                $this->collStockrecipesRelatedByModifypersonId = $collStockrecipesRelatedByModifypersonId;
                $this->collStockrecipesRelatedByModifypersonIdPartial = false;
            }
        }

        return $this->collStockrecipesRelatedByModifypersonId;
    }

    /**
     * Sets a collection of StockrecipeRelatedByModifypersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrecipesRelatedByModifypersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockrecipesRelatedByModifypersonId(PropelCollection $stockrecipesRelatedByModifypersonId, PropelPDO $con = null)
    {
        $stockrecipesRelatedByModifypersonIdToDelete = $this->getStockrecipesRelatedByModifypersonId(new Criteria(), $con)->diff($stockrecipesRelatedByModifypersonId);

        $this->stockrecipesRelatedByModifypersonIdScheduledForDeletion = unserialize(serialize($stockrecipesRelatedByModifypersonIdToDelete));

        foreach ($stockrecipesRelatedByModifypersonIdToDelete as $stockrecipeRelatedByModifypersonIdRemoved) {
            $stockrecipeRelatedByModifypersonIdRemoved->setPersonRelatedByModifypersonId(null);
        }

        $this->collStockrecipesRelatedByModifypersonId = null;
        foreach ($stockrecipesRelatedByModifypersonId as $stockrecipeRelatedByModifypersonId) {
            $this->addStockrecipeRelatedByModifypersonId($stockrecipeRelatedByModifypersonId);
        }

        $this->collStockrecipesRelatedByModifypersonId = $stockrecipesRelatedByModifypersonId;
        $this->collStockrecipesRelatedByModifypersonIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Stockrecipe objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Stockrecipe objects.
     * @throws PropelException
     */
    public function countStockrecipesRelatedByModifypersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrecipesRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collStockrecipesRelatedByModifypersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrecipesRelatedByModifypersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrecipesRelatedByModifypersonId());
            }
            $query = StockrecipeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByModifypersonId($this)
                ->count($con);
        }

        return count($this->collStockrecipesRelatedByModifypersonId);
    }

    /**
     * Method called to associate a Stockrecipe object to this object
     * through the Stockrecipe foreign key attribute.
     *
     * @param    Stockrecipe $l Stockrecipe
     * @return Person The current object (for fluent API support)
     */
    public function addStockrecipeRelatedByModifypersonId(Stockrecipe $l)
    {
        if ($this->collStockrecipesRelatedByModifypersonId === null) {
            $this->initStockrecipesRelatedByModifypersonId();
            $this->collStockrecipesRelatedByModifypersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockrecipesRelatedByModifypersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrecipeRelatedByModifypersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockrecipeRelatedByModifypersonId $stockrecipeRelatedByModifypersonId The stockrecipeRelatedByModifypersonId object to add.
     */
    protected function doAddStockrecipeRelatedByModifypersonId($stockrecipeRelatedByModifypersonId)
    {
        $this->collStockrecipesRelatedByModifypersonId[]= $stockrecipeRelatedByModifypersonId;
        $stockrecipeRelatedByModifypersonId->setPersonRelatedByModifypersonId($this);
    }

    /**
     * @param	StockrecipeRelatedByModifypersonId $stockrecipeRelatedByModifypersonId The stockrecipeRelatedByModifypersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockrecipeRelatedByModifypersonId($stockrecipeRelatedByModifypersonId)
    {
        if ($this->getStockrecipesRelatedByModifypersonId()->contains($stockrecipeRelatedByModifypersonId)) {
            $this->collStockrecipesRelatedByModifypersonId->remove($this->collStockrecipesRelatedByModifypersonId->search($stockrecipeRelatedByModifypersonId));
            if (null === $this->stockrecipesRelatedByModifypersonIdScheduledForDeletion) {
                $this->stockrecipesRelatedByModifypersonIdScheduledForDeletion = clone $this->collStockrecipesRelatedByModifypersonId;
                $this->stockrecipesRelatedByModifypersonIdScheduledForDeletion->clear();
            }
            $this->stockrecipesRelatedByModifypersonIdScheduledForDeletion[]= $stockrecipeRelatedByModifypersonId;
            $stockrecipeRelatedByModifypersonId->setPersonRelatedByModifypersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockrecipesRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrecipe[] List of Stockrecipe objects
     */
    public function getStockrecipesRelatedByModifypersonIdJoinStockrecipeRelatedByGroupId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrecipeQuery::create(null, $criteria);
        $query->joinWith('StockrecipeRelatedByGroupId', $join_behavior);

        return $this->getStockrecipesRelatedByModifypersonId($query, $con);
    }

    /**
     * Clears out the collStockrequisitionsRelatedByCreatepersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockrequisitionsRelatedByCreatepersonId()
     */
    public function clearStockrequisitionsRelatedByCreatepersonId()
    {
        $this->collStockrequisitionsRelatedByCreatepersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockrequisitionsRelatedByCreatepersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrequisitionsRelatedByCreatepersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrequisitionsRelatedByCreatepersonId($v = true)
    {
        $this->collStockrequisitionsRelatedByCreatepersonIdPartial = $v;
    }

    /**
     * Initializes the collStockrequisitionsRelatedByCreatepersonId collection.
     *
     * By default this just sets the collStockrequisitionsRelatedByCreatepersonId collection to an empty array (like clearcollStockrequisitionsRelatedByCreatepersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrequisitionsRelatedByCreatepersonId($overrideExisting = true)
    {
        if (null !== $this->collStockrequisitionsRelatedByCreatepersonId && !$overrideExisting) {
            return;
        }
        $this->collStockrequisitionsRelatedByCreatepersonId = new PropelObjectCollection();
        $this->collStockrequisitionsRelatedByCreatepersonId->setModel('Stockrequisition');
    }

    /**
     * Gets an array of Stockrequisition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     * @throws PropelException
     */
    public function getStockrequisitionsRelatedByCreatepersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedByCreatepersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedByCreatepersonId) {
                // return empty collection
                $this->initStockrequisitionsRelatedByCreatepersonId();
            } else {
                $collStockrequisitionsRelatedByCreatepersonId = StockrequisitionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByCreatepersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrequisitionsRelatedByCreatepersonIdPartial && count($collStockrequisitionsRelatedByCreatepersonId)) {
                      $this->initStockrequisitionsRelatedByCreatepersonId(false);

                      foreach($collStockrequisitionsRelatedByCreatepersonId as $obj) {
                        if (false == $this->collStockrequisitionsRelatedByCreatepersonId->contains($obj)) {
                          $this->collStockrequisitionsRelatedByCreatepersonId->append($obj);
                        }
                      }

                      $this->collStockrequisitionsRelatedByCreatepersonIdPartial = true;
                    }

                    $collStockrequisitionsRelatedByCreatepersonId->getInternalIterator()->rewind();
                    return $collStockrequisitionsRelatedByCreatepersonId;
                }

                if($partial && $this->collStockrequisitionsRelatedByCreatepersonId) {
                    foreach($this->collStockrequisitionsRelatedByCreatepersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockrequisitionsRelatedByCreatepersonId[] = $obj;
                        }
                    }
                }

                $this->collStockrequisitionsRelatedByCreatepersonId = $collStockrequisitionsRelatedByCreatepersonId;
                $this->collStockrequisitionsRelatedByCreatepersonIdPartial = false;
            }
        }

        return $this->collStockrequisitionsRelatedByCreatepersonId;
    }

    /**
     * Sets a collection of StockrequisitionRelatedByCreatepersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrequisitionsRelatedByCreatepersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockrequisitionsRelatedByCreatepersonId(PropelCollection $stockrequisitionsRelatedByCreatepersonId, PropelPDO $con = null)
    {
        $stockrequisitionsRelatedByCreatepersonIdToDelete = $this->getStockrequisitionsRelatedByCreatepersonId(new Criteria(), $con)->diff($stockrequisitionsRelatedByCreatepersonId);

        $this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion = unserialize(serialize($stockrequisitionsRelatedByCreatepersonIdToDelete));

        foreach ($stockrequisitionsRelatedByCreatepersonIdToDelete as $stockrequisitionRelatedByCreatepersonIdRemoved) {
            $stockrequisitionRelatedByCreatepersonIdRemoved->setPersonRelatedByCreatepersonId(null);
        }

        $this->collStockrequisitionsRelatedByCreatepersonId = null;
        foreach ($stockrequisitionsRelatedByCreatepersonId as $stockrequisitionRelatedByCreatepersonId) {
            $this->addStockrequisitionRelatedByCreatepersonId($stockrequisitionRelatedByCreatepersonId);
        }

        $this->collStockrequisitionsRelatedByCreatepersonId = $stockrequisitionsRelatedByCreatepersonId;
        $this->collStockrequisitionsRelatedByCreatepersonIdPartial = false;

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
    public function countStockrequisitionsRelatedByCreatepersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedByCreatepersonIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedByCreatepersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedByCreatepersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrequisitionsRelatedByCreatepersonId());
            }
            $query = StockrequisitionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByCreatepersonId($this)
                ->count($con);
        }

        return count($this->collStockrequisitionsRelatedByCreatepersonId);
    }

    /**
     * Method called to associate a Stockrequisition object to this object
     * through the Stockrequisition foreign key attribute.
     *
     * @param    Stockrequisition $l Stockrequisition
     * @return Person The current object (for fluent API support)
     */
    public function addStockrequisitionRelatedByCreatepersonId(Stockrequisition $l)
    {
        if ($this->collStockrequisitionsRelatedByCreatepersonId === null) {
            $this->initStockrequisitionsRelatedByCreatepersonId();
            $this->collStockrequisitionsRelatedByCreatepersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockrequisitionsRelatedByCreatepersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrequisitionRelatedByCreatepersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockrequisitionRelatedByCreatepersonId $stockrequisitionRelatedByCreatepersonId The stockrequisitionRelatedByCreatepersonId object to add.
     */
    protected function doAddStockrequisitionRelatedByCreatepersonId($stockrequisitionRelatedByCreatepersonId)
    {
        $this->collStockrequisitionsRelatedByCreatepersonId[]= $stockrequisitionRelatedByCreatepersonId;
        $stockrequisitionRelatedByCreatepersonId->setPersonRelatedByCreatepersonId($this);
    }

    /**
     * @param	StockrequisitionRelatedByCreatepersonId $stockrequisitionRelatedByCreatepersonId The stockrequisitionRelatedByCreatepersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockrequisitionRelatedByCreatepersonId($stockrequisitionRelatedByCreatepersonId)
    {
        if ($this->getStockrequisitionsRelatedByCreatepersonId()->contains($stockrequisitionRelatedByCreatepersonId)) {
            $this->collStockrequisitionsRelatedByCreatepersonId->remove($this->collStockrequisitionsRelatedByCreatepersonId->search($stockrequisitionRelatedByCreatepersonId));
            if (null === $this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion) {
                $this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion = clone $this->collStockrequisitionsRelatedByCreatepersonId;
                $this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion->clear();
            }
            $this->stockrequisitionsRelatedByCreatepersonIdScheduledForDeletion[]= $stockrequisitionRelatedByCreatepersonId;
            $stockrequisitionRelatedByCreatepersonId->setPersonRelatedByCreatepersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockrequisitionsRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedByCreatepersonIdJoinOrgstructureRelatedByRecipientId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByRecipientId', $join_behavior);

        return $this->getStockrequisitionsRelatedByCreatepersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockrequisitionsRelatedByCreatepersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedByCreatepersonIdJoinOrgstructureRelatedBySupplierId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedBySupplierId', $join_behavior);

        return $this->getStockrequisitionsRelatedByCreatepersonId($query, $con);
    }

    /**
     * Clears out the collStockrequisitionsRelatedByModifypersonId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addStockrequisitionsRelatedByModifypersonId()
     */
    public function clearStockrequisitionsRelatedByModifypersonId()
    {
        $this->collStockrequisitionsRelatedByModifypersonId = null; // important to set this to null since that means it is uninitialized
        $this->collStockrequisitionsRelatedByModifypersonIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrequisitionsRelatedByModifypersonId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrequisitionsRelatedByModifypersonId($v = true)
    {
        $this->collStockrequisitionsRelatedByModifypersonIdPartial = $v;
    }

    /**
     * Initializes the collStockrequisitionsRelatedByModifypersonId collection.
     *
     * By default this just sets the collStockrequisitionsRelatedByModifypersonId collection to an empty array (like clearcollStockrequisitionsRelatedByModifypersonId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrequisitionsRelatedByModifypersonId($overrideExisting = true)
    {
        if (null !== $this->collStockrequisitionsRelatedByModifypersonId && !$overrideExisting) {
            return;
        }
        $this->collStockrequisitionsRelatedByModifypersonId = new PropelObjectCollection();
        $this->collStockrequisitionsRelatedByModifypersonId->setModel('Stockrequisition');
    }

    /**
     * Gets an array of Stockrequisition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     * @throws PropelException
     */
    public function getStockrequisitionsRelatedByModifypersonId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedByModifypersonId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedByModifypersonId) {
                // return empty collection
                $this->initStockrequisitionsRelatedByModifypersonId();
            } else {
                $collStockrequisitionsRelatedByModifypersonId = StockrequisitionQuery::create(null, $criteria)
                    ->filterByPersonRelatedByModifypersonId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrequisitionsRelatedByModifypersonIdPartial && count($collStockrequisitionsRelatedByModifypersonId)) {
                      $this->initStockrequisitionsRelatedByModifypersonId(false);

                      foreach($collStockrequisitionsRelatedByModifypersonId as $obj) {
                        if (false == $this->collStockrequisitionsRelatedByModifypersonId->contains($obj)) {
                          $this->collStockrequisitionsRelatedByModifypersonId->append($obj);
                        }
                      }

                      $this->collStockrequisitionsRelatedByModifypersonIdPartial = true;
                    }

                    $collStockrequisitionsRelatedByModifypersonId->getInternalIterator()->rewind();
                    return $collStockrequisitionsRelatedByModifypersonId;
                }

                if($partial && $this->collStockrequisitionsRelatedByModifypersonId) {
                    foreach($this->collStockrequisitionsRelatedByModifypersonId as $obj) {
                        if($obj->isNew()) {
                            $collStockrequisitionsRelatedByModifypersonId[] = $obj;
                        }
                    }
                }

                $this->collStockrequisitionsRelatedByModifypersonId = $collStockrequisitionsRelatedByModifypersonId;
                $this->collStockrequisitionsRelatedByModifypersonIdPartial = false;
            }
        }

        return $this->collStockrequisitionsRelatedByModifypersonId;
    }

    /**
     * Sets a collection of StockrequisitionRelatedByModifypersonId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrequisitionsRelatedByModifypersonId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setStockrequisitionsRelatedByModifypersonId(PropelCollection $stockrequisitionsRelatedByModifypersonId, PropelPDO $con = null)
    {
        $stockrequisitionsRelatedByModifypersonIdToDelete = $this->getStockrequisitionsRelatedByModifypersonId(new Criteria(), $con)->diff($stockrequisitionsRelatedByModifypersonId);

        $this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion = unserialize(serialize($stockrequisitionsRelatedByModifypersonIdToDelete));

        foreach ($stockrequisitionsRelatedByModifypersonIdToDelete as $stockrequisitionRelatedByModifypersonIdRemoved) {
            $stockrequisitionRelatedByModifypersonIdRemoved->setPersonRelatedByModifypersonId(null);
        }

        $this->collStockrequisitionsRelatedByModifypersonId = null;
        foreach ($stockrequisitionsRelatedByModifypersonId as $stockrequisitionRelatedByModifypersonId) {
            $this->addStockrequisitionRelatedByModifypersonId($stockrequisitionRelatedByModifypersonId);
        }

        $this->collStockrequisitionsRelatedByModifypersonId = $stockrequisitionsRelatedByModifypersonId;
        $this->collStockrequisitionsRelatedByModifypersonIdPartial = false;

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
    public function countStockrequisitionsRelatedByModifypersonId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionsRelatedByModifypersonIdPartial && !$this->isNew();
        if (null === $this->collStockrequisitionsRelatedByModifypersonId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionsRelatedByModifypersonId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrequisitionsRelatedByModifypersonId());
            }
            $query = StockrequisitionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByModifypersonId($this)
                ->count($con);
        }

        return count($this->collStockrequisitionsRelatedByModifypersonId);
    }

    /**
     * Method called to associate a Stockrequisition object to this object
     * through the Stockrequisition foreign key attribute.
     *
     * @param    Stockrequisition $l Stockrequisition
     * @return Person The current object (for fluent API support)
     */
    public function addStockrequisitionRelatedByModifypersonId(Stockrequisition $l)
    {
        if ($this->collStockrequisitionsRelatedByModifypersonId === null) {
            $this->initStockrequisitionsRelatedByModifypersonId();
            $this->collStockrequisitionsRelatedByModifypersonIdPartial = true;
        }
        if (!in_array($l, $this->collStockrequisitionsRelatedByModifypersonId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrequisitionRelatedByModifypersonId($l);
        }

        return $this;
    }

    /**
     * @param	StockrequisitionRelatedByModifypersonId $stockrequisitionRelatedByModifypersonId The stockrequisitionRelatedByModifypersonId object to add.
     */
    protected function doAddStockrequisitionRelatedByModifypersonId($stockrequisitionRelatedByModifypersonId)
    {
        $this->collStockrequisitionsRelatedByModifypersonId[]= $stockrequisitionRelatedByModifypersonId;
        $stockrequisitionRelatedByModifypersonId->setPersonRelatedByModifypersonId($this);
    }

    /**
     * @param	StockrequisitionRelatedByModifypersonId $stockrequisitionRelatedByModifypersonId The stockrequisitionRelatedByModifypersonId object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeStockrequisitionRelatedByModifypersonId($stockrequisitionRelatedByModifypersonId)
    {
        if ($this->getStockrequisitionsRelatedByModifypersonId()->contains($stockrequisitionRelatedByModifypersonId)) {
            $this->collStockrequisitionsRelatedByModifypersonId->remove($this->collStockrequisitionsRelatedByModifypersonId->search($stockrequisitionRelatedByModifypersonId));
            if (null === $this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion) {
                $this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion = clone $this->collStockrequisitionsRelatedByModifypersonId;
                $this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion->clear();
            }
            $this->stockrequisitionsRelatedByModifypersonIdScheduledForDeletion[]= $stockrequisitionRelatedByModifypersonId;
            $stockrequisitionRelatedByModifypersonId->setPersonRelatedByModifypersonId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockrequisitionsRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedByModifypersonIdJoinOrgstructureRelatedByRecipientId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByRecipientId', $join_behavior);

        return $this->getStockrequisitionsRelatedByModifypersonId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related StockrequisitionsRelatedByModifypersonId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stockrequisition[] List of Stockrequisition objects
     */
    public function getStockrequisitionsRelatedByModifypersonIdJoinOrgstructureRelatedBySupplierId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedBySupplierId', $join_behavior);

        return $this->getStockrequisitionsRelatedByModifypersonId($query, $con);
    }

    /**
     * Clears out the collTakentissuejournals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
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
     * If this Person is new, it will return
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
                    ->filterByPerson($this)
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
     * @return Person The current object (for fluent API support)
     */
    public function setTakentissuejournals(PropelCollection $takentissuejournals, PropelPDO $con = null)
    {
        $takentissuejournalsToDelete = $this->getTakentissuejournals(new Criteria(), $con)->diff($takentissuejournals);

        $this->takentissuejournalsScheduledForDeletion = unserialize(serialize($takentissuejournalsToDelete));

        foreach ($takentissuejournalsToDelete as $takentissuejournalRemoved) {
            $takentissuejournalRemoved->setPerson(null);
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
                ->filterByPerson($this)
                ->count($con);
        }

        return count($this->collTakentissuejournals);
    }

    /**
     * Method called to associate a Takentissuejournal object to this object
     * through the Takentissuejournal foreign key attribute.
     *
     * @param    Takentissuejournal $l Takentissuejournal
     * @return Person The current object (for fluent API support)
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
        $takentissuejournal->setPerson($this);
    }

    /**
     * @param	Takentissuejournal $takentissuejournal The takentissuejournal object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeTakentissuejournal($takentissuejournal)
    {
        if ($this->getTakentissuejournals()->contains($takentissuejournal)) {
            $this->collTakentissuejournals->remove($this->collTakentissuejournals->search($takentissuejournal));
            if (null === $this->takentissuejournalsScheduledForDeletion) {
                $this->takentissuejournalsScheduledForDeletion = clone $this->collTakentissuejournals;
                $this->takentissuejournalsScheduledForDeletion->clear();
            }
            $this->takentissuejournalsScheduledForDeletion[]= $takentissuejournal;
            $takentissuejournal->setPerson(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Takentissuejournal[] List of Takentissuejournal objects
     */
    public function getTakentissuejournalsJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TakentissuejournalQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getTakentissuejournals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
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
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Takentissuejournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
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
        $this->code = null;
        $this->federalcode = null;
        $this->regionalcode = null;
        $this->lastname = null;
        $this->firstname = null;
        $this->patrname = null;
        $this->post_id = null;
        $this->speciality_id = null;
        $this->org_id = null;
        $this->orgstructure_id = null;
        $this->office = null;
        $this->office2 = null;
        $this->tariffcategory_id = null;
        $this->finance_id = null;
        $this->retiredate = null;
        $this->ambplan = null;
        $this->ambplan2 = null;
        $this->ambnorm = null;
        $this->homplan = null;
        $this->homplan2 = null;
        $this->homnorm = null;
        $this->expplan = null;
        $this->expnorm = null;
        $this->login = null;
        $this->password = null;
        $this->userprofile_id = null;
        $this->retired = null;
        $this->birthdate = null;
        $this->birthplace = null;
        $this->sex = null;
        $this->snils = null;
        $this->inn = null;
        $this->availableforexternal = null;
        $this->primaryquota = null;
        $this->ownquota = null;
        $this->consultancyquota = null;
        $this->externalquota = null;
        $this->lastaccessibletimelinedate = null;
        $this->timelineaccessibledays = null;
        $this->typetimelineperson = null;
        $this->maxoverqueue = null;
        $this->maxcito = null;
        $this->quotunit = null;
        $this->academicdegree_id = null;
        $this->academictitle_id = null;
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
            if ($this->collActionpropertyPersons) {
                foreach ($this->collActionpropertyPersons as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActiontypes) {
                foreach ($this->collActiontypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionsMovingsRelatedByCreatepersonId) {
                foreach ($this->collBlankactionsMovingsRelatedByCreatepersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionsMovingsRelatedByModifypersonId) {
                foreach ($this->collBlankactionsMovingsRelatedByModifypersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionsMovingsRelatedByPersonId) {
                foreach ($this->collBlankactionsMovingsRelatedByPersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionsPartysRelatedByCreatepersonId) {
                foreach ($this->collBlankactionsPartysRelatedByCreatepersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionsPartysRelatedByModifypersonId) {
                foreach ($this->collBlankactionsPartysRelatedByModifypersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlankactionsPartysRelatedByPersonId) {
                foreach ($this->collBlankactionsPartysRelatedByPersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNotificationoccurreds) {
                foreach ($this->collNotificationoccurreds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonTimetemplatesRelatedByCreatepersonId) {
                foreach ($this->collPersonTimetemplatesRelatedByCreatepersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonTimetemplatesRelatedByMasterId) {
                foreach ($this->collPersonTimetemplatesRelatedByMasterId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonTimetemplatesRelatedByModifypersonId) {
                foreach ($this->collPersonTimetemplatesRelatedByModifypersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionsRelatedByCreatepersonId) {
                foreach ($this->collStockmotionsRelatedByCreatepersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionsRelatedByModifypersonId) {
                foreach ($this->collStockmotionsRelatedByModifypersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionsRelatedByReceiverpersonId) {
                foreach ($this->collStockmotionsRelatedByReceiverpersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionsRelatedBySupplierpersonId) {
                foreach ($this->collStockmotionsRelatedBySupplierpersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrecipesRelatedByCreatepersonId) {
                foreach ($this->collStockrecipesRelatedByCreatepersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrecipesRelatedByModifypersonId) {
                foreach ($this->collStockrecipesRelatedByModifypersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrequisitionsRelatedByCreatepersonId) {
                foreach ($this->collStockrequisitionsRelatedByCreatepersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrequisitionsRelatedByModifypersonId) {
                foreach ($this->collStockrequisitionsRelatedByModifypersonId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTakentissuejournals) {
                foreach ($this->collTakentissuejournals as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collActionpropertyPersons instanceof PropelCollection) {
            $this->collActionpropertyPersons->clearIterator();
        }
        $this->collActionpropertyPersons = null;
        if ($this->collActiontypes instanceof PropelCollection) {
            $this->collActiontypes->clearIterator();
        }
        $this->collActiontypes = null;
        if ($this->collBlankactionsMovingsRelatedByCreatepersonId instanceof PropelCollection) {
            $this->collBlankactionsMovingsRelatedByCreatepersonId->clearIterator();
        }
        $this->collBlankactionsMovingsRelatedByCreatepersonId = null;
        if ($this->collBlankactionsMovingsRelatedByModifypersonId instanceof PropelCollection) {
            $this->collBlankactionsMovingsRelatedByModifypersonId->clearIterator();
        }
        $this->collBlankactionsMovingsRelatedByModifypersonId = null;
        if ($this->collBlankactionsMovingsRelatedByPersonId instanceof PropelCollection) {
            $this->collBlankactionsMovingsRelatedByPersonId->clearIterator();
        }
        $this->collBlankactionsMovingsRelatedByPersonId = null;
        if ($this->collBlankactionsPartysRelatedByCreatepersonId instanceof PropelCollection) {
            $this->collBlankactionsPartysRelatedByCreatepersonId->clearIterator();
        }
        $this->collBlankactionsPartysRelatedByCreatepersonId = null;
        if ($this->collBlankactionsPartysRelatedByModifypersonId instanceof PropelCollection) {
            $this->collBlankactionsPartysRelatedByModifypersonId->clearIterator();
        }
        $this->collBlankactionsPartysRelatedByModifypersonId = null;
        if ($this->collBlankactionsPartysRelatedByPersonId instanceof PropelCollection) {
            $this->collBlankactionsPartysRelatedByPersonId->clearIterator();
        }
        $this->collBlankactionsPartysRelatedByPersonId = null;
        if ($this->collNotificationoccurreds instanceof PropelCollection) {
            $this->collNotificationoccurreds->clearIterator();
        }
        $this->collNotificationoccurreds = null;
        if ($this->collPersonTimetemplatesRelatedByCreatepersonId instanceof PropelCollection) {
            $this->collPersonTimetemplatesRelatedByCreatepersonId->clearIterator();
        }
        $this->collPersonTimetemplatesRelatedByCreatepersonId = null;
        if ($this->collPersonTimetemplatesRelatedByMasterId instanceof PropelCollection) {
            $this->collPersonTimetemplatesRelatedByMasterId->clearIterator();
        }
        $this->collPersonTimetemplatesRelatedByMasterId = null;
        if ($this->collPersonTimetemplatesRelatedByModifypersonId instanceof PropelCollection) {
            $this->collPersonTimetemplatesRelatedByModifypersonId->clearIterator();
        }
        $this->collPersonTimetemplatesRelatedByModifypersonId = null;
        if ($this->collStockmotionsRelatedByCreatepersonId instanceof PropelCollection) {
            $this->collStockmotionsRelatedByCreatepersonId->clearIterator();
        }
        $this->collStockmotionsRelatedByCreatepersonId = null;
        if ($this->collStockmotionsRelatedByModifypersonId instanceof PropelCollection) {
            $this->collStockmotionsRelatedByModifypersonId->clearIterator();
        }
        $this->collStockmotionsRelatedByModifypersonId = null;
        if ($this->collStockmotionsRelatedByReceiverpersonId instanceof PropelCollection) {
            $this->collStockmotionsRelatedByReceiverpersonId->clearIterator();
        }
        $this->collStockmotionsRelatedByReceiverpersonId = null;
        if ($this->collStockmotionsRelatedBySupplierpersonId instanceof PropelCollection) {
            $this->collStockmotionsRelatedBySupplierpersonId->clearIterator();
        }
        $this->collStockmotionsRelatedBySupplierpersonId = null;
        if ($this->collStockrecipesRelatedByCreatepersonId instanceof PropelCollection) {
            $this->collStockrecipesRelatedByCreatepersonId->clearIterator();
        }
        $this->collStockrecipesRelatedByCreatepersonId = null;
        if ($this->collStockrecipesRelatedByModifypersonId instanceof PropelCollection) {
            $this->collStockrecipesRelatedByModifypersonId->clearIterator();
        }
        $this->collStockrecipesRelatedByModifypersonId = null;
        if ($this->collStockrequisitionsRelatedByCreatepersonId instanceof PropelCollection) {
            $this->collStockrequisitionsRelatedByCreatepersonId->clearIterator();
        }
        $this->collStockrequisitionsRelatedByCreatepersonId = null;
        if ($this->collStockrequisitionsRelatedByModifypersonId instanceof PropelCollection) {
            $this->collStockrequisitionsRelatedByModifypersonId->clearIterator();
        }
        $this->collStockrequisitionsRelatedByModifypersonId = null;
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
        return (string) $this->exportTo(PersonPeer::DEFAULT_STRING_FORMAT);
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
