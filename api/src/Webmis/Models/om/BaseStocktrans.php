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
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureQuery;
use Webmis\Models\Rbfinance;
use Webmis\Models\RbfinanceQuery;
use Webmis\Models\Rbnomenclature;
use Webmis\Models\RbnomenclatureQuery;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockmotionItemQuery;
use Webmis\Models\Stocktrans;
use Webmis\Models\StocktransPeer;
use Webmis\Models\StocktransQuery;

/**
 * Base class that represents a row from the 'StockTrans' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStocktrans extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\StocktransPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        StocktransPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        string
     */
    protected $id;

    /**
     * The value for the stockmotionitem_id field.
     * @var        int
     */
    protected $stockmotionitem_id;

    /**
     * The value for the date field.
     * Note: this column has a database default value of: NULL
     * @var        string
     */
    protected $date;

    /**
     * The value for the qnt field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $qnt;

    /**
     * The value for the sum field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $sum;

    /**
     * The value for the deborgstructure_id field.
     * @var        int
     */
    protected $deborgstructure_id;

    /**
     * The value for the debnomenclature_id field.
     * @var        int
     */
    protected $debnomenclature_id;

    /**
     * The value for the debfinance_id field.
     * @var        int
     */
    protected $debfinance_id;

    /**
     * The value for the creorgstructure_id field.
     * @var        int
     */
    protected $creorgstructure_id;

    /**
     * The value for the crenomenclature_id field.
     * @var        int
     */
    protected $crenomenclature_id;

    /**
     * The value for the crefinance_id field.
     * @var        int
     */
    protected $crefinance_id;

    /**
     * @var        Rbfinance
     */
    protected $aRbfinanceRelatedByCrefinanceId;

    /**
     * @var        Rbnomenclature
     */
    protected $aRbnomenclatureRelatedByCrenomenclatureId;

    /**
     * @var        Orgstructure
     */
    protected $aOrgstructureRelatedByCreorgstructureId;

    /**
     * @var        Rbfinance
     */
    protected $aRbfinanceRelatedByDebfinanceId;

    /**
     * @var        Rbnomenclature
     */
    protected $aRbnomenclatureRelatedByDebnomenclatureId;

    /**
     * @var        Orgstructure
     */
    protected $aOrgstructureRelatedByDeborgstructureId;

    /**
     * @var        StockmotionItem
     */
    protected $aStockmotionItem;

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
        $this->date = NULL;
        $this->qnt = 0;
        $this->sum = 0;
    }

    /**
     * Initializes internal state of BaseStocktrans object.
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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [stockmotionitem_id] column value.
     *
     * @return int
     */
    public function getStockmotionitemId()
    {
        return $this->stockmotionitem_id;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = 'Y-m-d H:i:s')
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
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
     * Get the [qnt] column value.
     *
     * @return double
     */
    public function getQnt()
    {
        return $this->qnt;
    }

    /**
     * Get the [sum] column value.
     *
     * @return double
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Get the [deborgstructure_id] column value.
     *
     * @return int
     */
    public function getDeborgstructureId()
    {
        return $this->deborgstructure_id;
    }

    /**
     * Get the [debnomenclature_id] column value.
     *
     * @return int
     */
    public function getDebnomenclatureId()
    {
        return $this->debnomenclature_id;
    }

    /**
     * Get the [debfinance_id] column value.
     *
     * @return int
     */
    public function getDebfinanceId()
    {
        return $this->debfinance_id;
    }

    /**
     * Get the [creorgstructure_id] column value.
     *
     * @return int
     */
    public function getCreorgstructureId()
    {
        return $this->creorgstructure_id;
    }

    /**
     * Get the [crenomenclature_id] column value.
     *
     * @return int
     */
    public function getCrenomenclatureId()
    {
        return $this->crenomenclature_id;
    }

    /**
     * Get the [crefinance_id] column value.
     *
     * @return int
     */
    public function getCrefinanceId()
    {
        return $this->crefinance_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = StocktransPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [stockmotionitem_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setStockmotionitemId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->stockmotionitem_id !== $v) {
            $this->stockmotionitem_id = $v;
            $this->modifiedColumns[] = StocktransPeer::STOCKMOTIONITEM_ID;
        }

        if ($this->aStockmotionItem !== null && $this->aStockmotionItem->getId() !== $v) {
            $this->aStockmotionItem = null;
        }


        return $this;
    } // setStockmotionitemId()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === NULL) // or the entered value matches the default
                 ) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = StocktransPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [qnt] column.
     *
     * @param double $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setQnt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->qnt !== $v) {
            $this->qnt = $v;
            $this->modifiedColumns[] = StocktransPeer::QNT;
        }


        return $this;
    } // setQnt()

    /**
     * Set the value of [sum] column.
     *
     * @param double $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setSum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->sum !== $v) {
            $this->sum = $v;
            $this->modifiedColumns[] = StocktransPeer::SUM;
        }


        return $this;
    } // setSum()

    /**
     * Set the value of [deborgstructure_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setDeborgstructureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deborgstructure_id !== $v) {
            $this->deborgstructure_id = $v;
            $this->modifiedColumns[] = StocktransPeer::DEBORGSTRUCTURE_ID;
        }

        if ($this->aOrgstructureRelatedByDeborgstructureId !== null && $this->aOrgstructureRelatedByDeborgstructureId->getId() !== $v) {
            $this->aOrgstructureRelatedByDeborgstructureId = null;
        }


        return $this;
    } // setDeborgstructureId()

    /**
     * Set the value of [debnomenclature_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setDebnomenclatureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->debnomenclature_id !== $v) {
            $this->debnomenclature_id = $v;
            $this->modifiedColumns[] = StocktransPeer::DEBNOMENCLATURE_ID;
        }

        if ($this->aRbnomenclatureRelatedByDebnomenclatureId !== null && $this->aRbnomenclatureRelatedByDebnomenclatureId->getId() !== $v) {
            $this->aRbnomenclatureRelatedByDebnomenclatureId = null;
        }


        return $this;
    } // setDebnomenclatureId()

    /**
     * Set the value of [debfinance_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setDebfinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->debfinance_id !== $v) {
            $this->debfinance_id = $v;
            $this->modifiedColumns[] = StocktransPeer::DEBFINANCE_ID;
        }

        if ($this->aRbfinanceRelatedByDebfinanceId !== null && $this->aRbfinanceRelatedByDebfinanceId->getId() !== $v) {
            $this->aRbfinanceRelatedByDebfinanceId = null;
        }


        return $this;
    } // setDebfinanceId()

    /**
     * Set the value of [creorgstructure_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setCreorgstructureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->creorgstructure_id !== $v) {
            $this->creorgstructure_id = $v;
            $this->modifiedColumns[] = StocktransPeer::CREORGSTRUCTURE_ID;
        }

        if ($this->aOrgstructureRelatedByCreorgstructureId !== null && $this->aOrgstructureRelatedByCreorgstructureId->getId() !== $v) {
            $this->aOrgstructureRelatedByCreorgstructureId = null;
        }


        return $this;
    } // setCreorgstructureId()

    /**
     * Set the value of [crenomenclature_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setCrenomenclatureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->crenomenclature_id !== $v) {
            $this->crenomenclature_id = $v;
            $this->modifiedColumns[] = StocktransPeer::CRENOMENCLATURE_ID;
        }

        if ($this->aRbnomenclatureRelatedByCrenomenclatureId !== null && $this->aRbnomenclatureRelatedByCrenomenclatureId->getId() !== $v) {
            $this->aRbnomenclatureRelatedByCrenomenclatureId = null;
        }


        return $this;
    } // setCrenomenclatureId()

    /**
     * Set the value of [crefinance_id] column.
     *
     * @param int $v new value
     * @return Stocktrans The current object (for fluent API support)
     */
    public function setCrefinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->crefinance_id !== $v) {
            $this->crefinance_id = $v;
            $this->modifiedColumns[] = StocktransPeer::CREFINANCE_ID;
        }

        if ($this->aRbfinanceRelatedByCrefinanceId !== null && $this->aRbfinanceRelatedByCrefinanceId->getId() !== $v) {
            $this->aRbfinanceRelatedByCrefinanceId = null;
        }


        return $this;
    } // setCrefinanceId()

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
            if ($this->date !== NULL) {
                return false;
            }

            if ($this->qnt !== 0) {
                return false;
            }

            if ($this->sum !== 0) {
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

            $this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->stockmotionitem_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->date = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->qnt = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
            $this->sum = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
            $this->deborgstructure_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->debnomenclature_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->debfinance_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->creorgstructure_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->crenomenclature_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->crefinance_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = StocktransPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Stocktrans object", $e);
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

        if ($this->aStockmotionItem !== null && $this->stockmotionitem_id !== $this->aStockmotionItem->getId()) {
            $this->aStockmotionItem = null;
        }
        if ($this->aOrgstructureRelatedByDeborgstructureId !== null && $this->deborgstructure_id !== $this->aOrgstructureRelatedByDeborgstructureId->getId()) {
            $this->aOrgstructureRelatedByDeborgstructureId = null;
        }
        if ($this->aRbnomenclatureRelatedByDebnomenclatureId !== null && $this->debnomenclature_id !== $this->aRbnomenclatureRelatedByDebnomenclatureId->getId()) {
            $this->aRbnomenclatureRelatedByDebnomenclatureId = null;
        }
        if ($this->aRbfinanceRelatedByDebfinanceId !== null && $this->debfinance_id !== $this->aRbfinanceRelatedByDebfinanceId->getId()) {
            $this->aRbfinanceRelatedByDebfinanceId = null;
        }
        if ($this->aOrgstructureRelatedByCreorgstructureId !== null && $this->creorgstructure_id !== $this->aOrgstructureRelatedByCreorgstructureId->getId()) {
            $this->aOrgstructureRelatedByCreorgstructureId = null;
        }
        if ($this->aRbnomenclatureRelatedByCrenomenclatureId !== null && $this->crenomenclature_id !== $this->aRbnomenclatureRelatedByCrenomenclatureId->getId()) {
            $this->aRbnomenclatureRelatedByCrenomenclatureId = null;
        }
        if ($this->aRbfinanceRelatedByCrefinanceId !== null && $this->crefinance_id !== $this->aRbfinanceRelatedByCrefinanceId->getId()) {
            $this->aRbfinanceRelatedByCrefinanceId = null;
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
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = StocktransPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbfinanceRelatedByCrefinanceId = null;
            $this->aRbnomenclatureRelatedByCrenomenclatureId = null;
            $this->aOrgstructureRelatedByCreorgstructureId = null;
            $this->aRbfinanceRelatedByDebfinanceId = null;
            $this->aRbnomenclatureRelatedByDebnomenclatureId = null;
            $this->aOrgstructureRelatedByDeborgstructureId = null;
            $this->aStockmotionItem = null;
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
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = StocktransQuery::create()
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
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                StocktransPeer::addInstanceToPool($this);
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

            if ($this->aRbfinanceRelatedByCrefinanceId !== null) {
                if ($this->aRbfinanceRelatedByCrefinanceId->isModified() || $this->aRbfinanceRelatedByCrefinanceId->isNew()) {
                    $affectedRows += $this->aRbfinanceRelatedByCrefinanceId->save($con);
                }
                $this->setRbfinanceRelatedByCrefinanceId($this->aRbfinanceRelatedByCrefinanceId);
            }

            if ($this->aRbnomenclatureRelatedByCrenomenclatureId !== null) {
                if ($this->aRbnomenclatureRelatedByCrenomenclatureId->isModified() || $this->aRbnomenclatureRelatedByCrenomenclatureId->isNew()) {
                    $affectedRows += $this->aRbnomenclatureRelatedByCrenomenclatureId->save($con);
                }
                $this->setRbnomenclatureRelatedByCrenomenclatureId($this->aRbnomenclatureRelatedByCrenomenclatureId);
            }

            if ($this->aOrgstructureRelatedByCreorgstructureId !== null) {
                if ($this->aOrgstructureRelatedByCreorgstructureId->isModified() || $this->aOrgstructureRelatedByCreorgstructureId->isNew()) {
                    $affectedRows += $this->aOrgstructureRelatedByCreorgstructureId->save($con);
                }
                $this->setOrgstructureRelatedByCreorgstructureId($this->aOrgstructureRelatedByCreorgstructureId);
            }

            if ($this->aRbfinanceRelatedByDebfinanceId !== null) {
                if ($this->aRbfinanceRelatedByDebfinanceId->isModified() || $this->aRbfinanceRelatedByDebfinanceId->isNew()) {
                    $affectedRows += $this->aRbfinanceRelatedByDebfinanceId->save($con);
                }
                $this->setRbfinanceRelatedByDebfinanceId($this->aRbfinanceRelatedByDebfinanceId);
            }

            if ($this->aRbnomenclatureRelatedByDebnomenclatureId !== null) {
                if ($this->aRbnomenclatureRelatedByDebnomenclatureId->isModified() || $this->aRbnomenclatureRelatedByDebnomenclatureId->isNew()) {
                    $affectedRows += $this->aRbnomenclatureRelatedByDebnomenclatureId->save($con);
                }
                $this->setRbnomenclatureRelatedByDebnomenclatureId($this->aRbnomenclatureRelatedByDebnomenclatureId);
            }

            if ($this->aOrgstructureRelatedByDeborgstructureId !== null) {
                if ($this->aOrgstructureRelatedByDeborgstructureId->isModified() || $this->aOrgstructureRelatedByDeborgstructureId->isNew()) {
                    $affectedRows += $this->aOrgstructureRelatedByDeborgstructureId->save($con);
                }
                $this->setOrgstructureRelatedByDeborgstructureId($this->aOrgstructureRelatedByDeborgstructureId);
            }

            if ($this->aStockmotionItem !== null) {
                if ($this->aStockmotionItem->isModified() || $this->aStockmotionItem->isNew()) {
                    $affectedRows += $this->aStockmotionItem->save($con);
                }
                $this->setStockmotionItem($this->aStockmotionItem);
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

        $this->modifiedColumns[] = StocktransPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StocktransPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StocktransPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(StocktransPeer::STOCKMOTIONITEM_ID)) {
            $modifiedColumns[':p' . $index++]  = '`stockMotionItem_id`';
        }
        if ($this->isColumnModified(StocktransPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }
        if ($this->isColumnModified(StocktransPeer::QNT)) {
            $modifiedColumns[':p' . $index++]  = '`qnt`';
        }
        if ($this->isColumnModified(StocktransPeer::SUM)) {
            $modifiedColumns[':p' . $index++]  = '`sum`';
        }
        if ($this->isColumnModified(StocktransPeer::DEBORGSTRUCTURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`debOrgStructure_id`';
        }
        if ($this->isColumnModified(StocktransPeer::DEBNOMENCLATURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`debNomenclature_id`';
        }
        if ($this->isColumnModified(StocktransPeer::DEBFINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`debFinance_id`';
        }
        if ($this->isColumnModified(StocktransPeer::CREORGSTRUCTURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`creOrgStructure_id`';
        }
        if ($this->isColumnModified(StocktransPeer::CRENOMENCLATURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`creNomenclature_id`';
        }
        if ($this->isColumnModified(StocktransPeer::CREFINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`creFinance_id`';
        }

        $sql = sprintf(
            'INSERT INTO `StockTrans` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case '`stockMotionItem_id`':
                        $stmt->bindValue($identifier, $this->stockmotionitem_id, PDO::PARAM_INT);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`qnt`':
                        $stmt->bindValue($identifier, $this->qnt, PDO::PARAM_STR);
                        break;
                    case '`sum`':
                        $stmt->bindValue($identifier, $this->sum, PDO::PARAM_STR);
                        break;
                    case '`debOrgStructure_id`':
                        $stmt->bindValue($identifier, $this->deborgstructure_id, PDO::PARAM_INT);
                        break;
                    case '`debNomenclature_id`':
                        $stmt->bindValue($identifier, $this->debnomenclature_id, PDO::PARAM_INT);
                        break;
                    case '`debFinance_id`':
                        $stmt->bindValue($identifier, $this->debfinance_id, PDO::PARAM_INT);
                        break;
                    case '`creOrgStructure_id`':
                        $stmt->bindValue($identifier, $this->creorgstructure_id, PDO::PARAM_INT);
                        break;
                    case '`creNomenclature_id`':
                        $stmt->bindValue($identifier, $this->crenomenclature_id, PDO::PARAM_INT);
                        break;
                    case '`creFinance_id`':
                        $stmt->bindValue($identifier, $this->crefinance_id, PDO::PARAM_INT);
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

            if ($this->aRbfinanceRelatedByCrefinanceId !== null) {
                if (!$this->aRbfinanceRelatedByCrefinanceId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbfinanceRelatedByCrefinanceId->getValidationFailures());
                }
            }

            if ($this->aRbnomenclatureRelatedByCrenomenclatureId !== null) {
                if (!$this->aRbnomenclatureRelatedByCrenomenclatureId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbnomenclatureRelatedByCrenomenclatureId->getValidationFailures());
                }
            }

            if ($this->aOrgstructureRelatedByCreorgstructureId !== null) {
                if (!$this->aOrgstructureRelatedByCreorgstructureId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrgstructureRelatedByCreorgstructureId->getValidationFailures());
                }
            }

            if ($this->aRbfinanceRelatedByDebfinanceId !== null) {
                if (!$this->aRbfinanceRelatedByDebfinanceId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbfinanceRelatedByDebfinanceId->getValidationFailures());
                }
            }

            if ($this->aRbnomenclatureRelatedByDebnomenclatureId !== null) {
                if (!$this->aRbnomenclatureRelatedByDebnomenclatureId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbnomenclatureRelatedByDebnomenclatureId->getValidationFailures());
                }
            }

            if ($this->aOrgstructureRelatedByDeborgstructureId !== null) {
                if (!$this->aOrgstructureRelatedByDeborgstructureId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrgstructureRelatedByDeborgstructureId->getValidationFailures());
                }
            }

            if ($this->aStockmotionItem !== null) {
                if (!$this->aStockmotionItem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStockmotionItem->getValidationFailures());
                }
            }


            if (($retval = StocktransPeer::doValidate($this, $columns)) !== true) {
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
        $pos = StocktransPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getStockmotionitemId();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getQnt();
                break;
            case 4:
                return $this->getSum();
                break;
            case 5:
                return $this->getDeborgstructureId();
                break;
            case 6:
                return $this->getDebnomenclatureId();
                break;
            case 7:
                return $this->getDebfinanceId();
                break;
            case 8:
                return $this->getCreorgstructureId();
                break;
            case 9:
                return $this->getCrenomenclatureId();
                break;
            case 10:
                return $this->getCrefinanceId();
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
        if (isset($alreadyDumpedObjects['Stocktrans'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Stocktrans'][$this->getPrimaryKey()] = true;
        $keys = StocktransPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getStockmotionitemId(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getQnt(),
            $keys[4] => $this->getSum(),
            $keys[5] => $this->getDeborgstructureId(),
            $keys[6] => $this->getDebnomenclatureId(),
            $keys[7] => $this->getDebfinanceId(),
            $keys[8] => $this->getCreorgstructureId(),
            $keys[9] => $this->getCrenomenclatureId(),
            $keys[10] => $this->getCrefinanceId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbfinanceRelatedByCrefinanceId) {
                $result['RbfinanceRelatedByCrefinanceId'] = $this->aRbfinanceRelatedByCrefinanceId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbnomenclatureRelatedByCrenomenclatureId) {
                $result['RbnomenclatureRelatedByCrenomenclatureId'] = $this->aRbnomenclatureRelatedByCrenomenclatureId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrgstructureRelatedByCreorgstructureId) {
                $result['OrgstructureRelatedByCreorgstructureId'] = $this->aOrgstructureRelatedByCreorgstructureId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbfinanceRelatedByDebfinanceId) {
                $result['RbfinanceRelatedByDebfinanceId'] = $this->aRbfinanceRelatedByDebfinanceId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbnomenclatureRelatedByDebnomenclatureId) {
                $result['RbnomenclatureRelatedByDebnomenclatureId'] = $this->aRbnomenclatureRelatedByDebnomenclatureId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrgstructureRelatedByDeborgstructureId) {
                $result['OrgstructureRelatedByDeborgstructureId'] = $this->aOrgstructureRelatedByDeborgstructureId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStockmotionItem) {
                $result['StockmotionItem'] = $this->aStockmotionItem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = StocktransPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setStockmotionitemId($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setQnt($value);
                break;
            case 4:
                $this->setSum($value);
                break;
            case 5:
                $this->setDeborgstructureId($value);
                break;
            case 6:
                $this->setDebnomenclatureId($value);
                break;
            case 7:
                $this->setDebfinanceId($value);
                break;
            case 8:
                $this->setCreorgstructureId($value);
                break;
            case 9:
                $this->setCrenomenclatureId($value);
                break;
            case 10:
                $this->setCrefinanceId($value);
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
        $keys = StocktransPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setStockmotionitemId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setQnt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSum($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDeborgstructureId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDebnomenclatureId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDebfinanceId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreorgstructureId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCrenomenclatureId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCrefinanceId($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(StocktransPeer::DATABASE_NAME);

        if ($this->isColumnModified(StocktransPeer::ID)) $criteria->add(StocktransPeer::ID, $this->id);
        if ($this->isColumnModified(StocktransPeer::STOCKMOTIONITEM_ID)) $criteria->add(StocktransPeer::STOCKMOTIONITEM_ID, $this->stockmotionitem_id);
        if ($this->isColumnModified(StocktransPeer::DATE)) $criteria->add(StocktransPeer::DATE, $this->date);
        if ($this->isColumnModified(StocktransPeer::QNT)) $criteria->add(StocktransPeer::QNT, $this->qnt);
        if ($this->isColumnModified(StocktransPeer::SUM)) $criteria->add(StocktransPeer::SUM, $this->sum);
        if ($this->isColumnModified(StocktransPeer::DEBORGSTRUCTURE_ID)) $criteria->add(StocktransPeer::DEBORGSTRUCTURE_ID, $this->deborgstructure_id);
        if ($this->isColumnModified(StocktransPeer::DEBNOMENCLATURE_ID)) $criteria->add(StocktransPeer::DEBNOMENCLATURE_ID, $this->debnomenclature_id);
        if ($this->isColumnModified(StocktransPeer::DEBFINANCE_ID)) $criteria->add(StocktransPeer::DEBFINANCE_ID, $this->debfinance_id);
        if ($this->isColumnModified(StocktransPeer::CREORGSTRUCTURE_ID)) $criteria->add(StocktransPeer::CREORGSTRUCTURE_ID, $this->creorgstructure_id);
        if ($this->isColumnModified(StocktransPeer::CRENOMENCLATURE_ID)) $criteria->add(StocktransPeer::CRENOMENCLATURE_ID, $this->crenomenclature_id);
        if ($this->isColumnModified(StocktransPeer::CREFINANCE_ID)) $criteria->add(StocktransPeer::CREFINANCE_ID, $this->crefinance_id);

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
        $criteria = new Criteria(StocktransPeer::DATABASE_NAME);
        $criteria->add(StocktransPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  string $key Primary key.
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
     * @param object $copyObj An object of Stocktrans (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setStockmotionitemId($this->getStockmotionitemId());
        $copyObj->setDate($this->getDate());
        $copyObj->setQnt($this->getQnt());
        $copyObj->setSum($this->getSum());
        $copyObj->setDeborgstructureId($this->getDeborgstructureId());
        $copyObj->setDebnomenclatureId($this->getDebnomenclatureId());
        $copyObj->setDebfinanceId($this->getDebfinanceId());
        $copyObj->setCreorgstructureId($this->getCreorgstructureId());
        $copyObj->setCrenomenclatureId($this->getCrenomenclatureId());
        $copyObj->setCrefinanceId($this->getCrefinanceId());

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
     * @return Stocktrans Clone of current object.
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
     * @return StocktransPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new StocktransPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbfinance object.
     *
     * @param             Rbfinance $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbfinanceRelatedByCrefinanceId(Rbfinance $v = null)
    {
        if ($v === null) {
            $this->setCrefinanceId(NULL);
        } else {
            $this->setCrefinanceId($v->getId());
        }

        $this->aRbfinanceRelatedByCrefinanceId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbfinance object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktransRelatedByCrefinanceId($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbfinance object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbfinance The associated Rbfinance object.
     * @throws PropelException
     */
    public function getRbfinanceRelatedByCrefinanceId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbfinanceRelatedByCrefinanceId === null && ($this->crefinance_id !== null) && $doQuery) {
            $this->aRbfinanceRelatedByCrefinanceId = RbfinanceQuery::create()->findPk($this->crefinance_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbfinanceRelatedByCrefinanceId->addStocktranssRelatedByCrefinanceId($this);
             */
        }

        return $this->aRbfinanceRelatedByCrefinanceId;
    }

    /**
     * Declares an association between this object and a Rbnomenclature object.
     *
     * @param             Rbnomenclature $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbnomenclatureRelatedByCrenomenclatureId(Rbnomenclature $v = null)
    {
        if ($v === null) {
            $this->setCrenomenclatureId(NULL);
        } else {
            $this->setCrenomenclatureId($v->getId());
        }

        $this->aRbnomenclatureRelatedByCrenomenclatureId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbnomenclature object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktransRelatedByCrenomenclatureId($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbnomenclature object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbnomenclature The associated Rbnomenclature object.
     * @throws PropelException
     */
    public function getRbnomenclatureRelatedByCrenomenclatureId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbnomenclatureRelatedByCrenomenclatureId === null && ($this->crenomenclature_id !== null) && $doQuery) {
            $this->aRbnomenclatureRelatedByCrenomenclatureId = RbnomenclatureQuery::create()->findPk($this->crenomenclature_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbnomenclatureRelatedByCrenomenclatureId->addStocktranssRelatedByCrenomenclatureId($this);
             */
        }

        return $this->aRbnomenclatureRelatedByCrenomenclatureId;
    }

    /**
     * Declares an association between this object and a Orgstructure object.
     *
     * @param             Orgstructure $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrgstructureRelatedByCreorgstructureId(Orgstructure $v = null)
    {
        if ($v === null) {
            $this->setCreorgstructureId(NULL);
        } else {
            $this->setCreorgstructureId($v->getId());
        }

        $this->aOrgstructureRelatedByCreorgstructureId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Orgstructure object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktransRelatedByCreorgstructureId($this);
        }


        return $this;
    }


    /**
     * Get the associated Orgstructure object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Orgstructure The associated Orgstructure object.
     * @throws PropelException
     */
    public function getOrgstructureRelatedByCreorgstructureId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrgstructureRelatedByCreorgstructureId === null && ($this->creorgstructure_id !== null) && $doQuery) {
            $this->aOrgstructureRelatedByCreorgstructureId = OrgstructureQuery::create()->findPk($this->creorgstructure_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrgstructureRelatedByCreorgstructureId->addStocktranssRelatedByCreorgstructureId($this);
             */
        }

        return $this->aOrgstructureRelatedByCreorgstructureId;
    }

    /**
     * Declares an association between this object and a Rbfinance object.
     *
     * @param             Rbfinance $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbfinanceRelatedByDebfinanceId(Rbfinance $v = null)
    {
        if ($v === null) {
            $this->setDebfinanceId(NULL);
        } else {
            $this->setDebfinanceId($v->getId());
        }

        $this->aRbfinanceRelatedByDebfinanceId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbfinance object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktransRelatedByDebfinanceId($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbfinance object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbfinance The associated Rbfinance object.
     * @throws PropelException
     */
    public function getRbfinanceRelatedByDebfinanceId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbfinanceRelatedByDebfinanceId === null && ($this->debfinance_id !== null) && $doQuery) {
            $this->aRbfinanceRelatedByDebfinanceId = RbfinanceQuery::create()->findPk($this->debfinance_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbfinanceRelatedByDebfinanceId->addStocktranssRelatedByDebfinanceId($this);
             */
        }

        return $this->aRbfinanceRelatedByDebfinanceId;
    }

    /**
     * Declares an association between this object and a Rbnomenclature object.
     *
     * @param             Rbnomenclature $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbnomenclatureRelatedByDebnomenclatureId(Rbnomenclature $v = null)
    {
        if ($v === null) {
            $this->setDebnomenclatureId(NULL);
        } else {
            $this->setDebnomenclatureId($v->getId());
        }

        $this->aRbnomenclatureRelatedByDebnomenclatureId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbnomenclature object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktransRelatedByDebnomenclatureId($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbnomenclature object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbnomenclature The associated Rbnomenclature object.
     * @throws PropelException
     */
    public function getRbnomenclatureRelatedByDebnomenclatureId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbnomenclatureRelatedByDebnomenclatureId === null && ($this->debnomenclature_id !== null) && $doQuery) {
            $this->aRbnomenclatureRelatedByDebnomenclatureId = RbnomenclatureQuery::create()->findPk($this->debnomenclature_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbnomenclatureRelatedByDebnomenclatureId->addStocktranssRelatedByDebnomenclatureId($this);
             */
        }

        return $this->aRbnomenclatureRelatedByDebnomenclatureId;
    }

    /**
     * Declares an association between this object and a Orgstructure object.
     *
     * @param             Orgstructure $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrgstructureRelatedByDeborgstructureId(Orgstructure $v = null)
    {
        if ($v === null) {
            $this->setDeborgstructureId(NULL);
        } else {
            $this->setDeborgstructureId($v->getId());
        }

        $this->aOrgstructureRelatedByDeborgstructureId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Orgstructure object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktransRelatedByDeborgstructureId($this);
        }


        return $this;
    }


    /**
     * Get the associated Orgstructure object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Orgstructure The associated Orgstructure object.
     * @throws PropelException
     */
    public function getOrgstructureRelatedByDeborgstructureId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrgstructureRelatedByDeborgstructureId === null && ($this->deborgstructure_id !== null) && $doQuery) {
            $this->aOrgstructureRelatedByDeborgstructureId = OrgstructureQuery::create()->findPk($this->deborgstructure_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrgstructureRelatedByDeborgstructureId->addStocktranssRelatedByDeborgstructureId($this);
             */
        }

        return $this->aOrgstructureRelatedByDeborgstructureId;
    }

    /**
     * Declares an association between this object and a StockmotionItem object.
     *
     * @param             StockmotionItem $v
     * @return Stocktrans The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStockmotionItem(StockmotionItem $v = null)
    {
        if ($v === null) {
            $this->setStockmotionitemId(NULL);
        } else {
            $this->setStockmotionitemId($v->getId());
        }

        $this->aStockmotionItem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StockmotionItem object, it will not be re-added.
        if ($v !== null) {
            $v->addStocktrans($this);
        }


        return $this;
    }


    /**
     * Get the associated StockmotionItem object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StockmotionItem The associated StockmotionItem object.
     * @throws PropelException
     */
    public function getStockmotionItem(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStockmotionItem === null && ($this->stockmotionitem_id !== null) && $doQuery) {
            $this->aStockmotionItem = StockmotionItemQuery::create()->findPk($this->stockmotionitem_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStockmotionItem->addStocktranss($this);
             */
        }

        return $this->aStockmotionItem;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->stockmotionitem_id = null;
        $this->date = null;
        $this->qnt = null;
        $this->sum = null;
        $this->deborgstructure_id = null;
        $this->debnomenclature_id = null;
        $this->debfinance_id = null;
        $this->creorgstructure_id = null;
        $this->crenomenclature_id = null;
        $this->crefinance_id = null;
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
            if ($this->aRbfinanceRelatedByCrefinanceId instanceof Persistent) {
              $this->aRbfinanceRelatedByCrefinanceId->clearAllReferences($deep);
            }
            if ($this->aRbnomenclatureRelatedByCrenomenclatureId instanceof Persistent) {
              $this->aRbnomenclatureRelatedByCrenomenclatureId->clearAllReferences($deep);
            }
            if ($this->aOrgstructureRelatedByCreorgstructureId instanceof Persistent) {
              $this->aOrgstructureRelatedByCreorgstructureId->clearAllReferences($deep);
            }
            if ($this->aRbfinanceRelatedByDebfinanceId instanceof Persistent) {
              $this->aRbfinanceRelatedByDebfinanceId->clearAllReferences($deep);
            }
            if ($this->aRbnomenclatureRelatedByDebnomenclatureId instanceof Persistent) {
              $this->aRbnomenclatureRelatedByDebnomenclatureId->clearAllReferences($deep);
            }
            if ($this->aOrgstructureRelatedByDeborgstructureId instanceof Persistent) {
              $this->aOrgstructureRelatedByDeborgstructureId->clearAllReferences($deep);
            }
            if ($this->aStockmotionItem instanceof Persistent) {
              $this->aStockmotionItem->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbfinanceRelatedByCrefinanceId = null;
        $this->aRbnomenclatureRelatedByCrenomenclatureId = null;
        $this->aOrgstructureRelatedByCreorgstructureId = null;
        $this->aRbfinanceRelatedByDebfinanceId = null;
        $this->aRbnomenclatureRelatedByDebnomenclatureId = null;
        $this->aOrgstructureRelatedByDeborgstructureId = null;
        $this->aStockmotionItem = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StocktransPeer::DEFAULT_STRING_FORMAT);
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
