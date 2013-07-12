<?php

namespace Webmis\Models\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\OrgstructureStock;
use Webmis\Models\OrgstructureStockQuery;
use Webmis\Models\Rbfinance;
use Webmis\Models\RbfinancePeer;
use Webmis\Models\RbfinanceQuery;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockmotionItemQuery;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\StockrequisitionItemQuery;
use Webmis\Models\Stocktrans;
use Webmis\Models\StocktransQuery;

/**
 * Base class that represents a row from the 'rbFinance' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbfinance extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbfinancePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbfinancePeer
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
     * @var        PropelObjectCollection|OrgstructureStock[] Collection to store aggregation of OrgstructureStock objects.
     */
    protected $collOrgstructureStocks;
    protected $collOrgstructureStocksPartial;

    /**
     * @var        PropelObjectCollection|StockmotionItem[] Collection to store aggregation of StockmotionItem objects.
     */
    protected $collStockmotionItemsRelatedByFinanceId;
    protected $collStockmotionItemsRelatedByFinanceIdPartial;

    /**
     * @var        PropelObjectCollection|StockmotionItem[] Collection to store aggregation of StockmotionItem objects.
     */
    protected $collStockmotionItemsRelatedByOldfinanceId;
    protected $collStockmotionItemsRelatedByOldfinanceIdPartial;

    /**
     * @var        PropelObjectCollection|StockrequisitionItem[] Collection to store aggregation of StockrequisitionItem objects.
     */
    protected $collStockrequisitionItems;
    protected $collStockrequisitionItemsPartial;

    /**
     * @var        PropelObjectCollection|Stocktrans[] Collection to store aggregation of Stocktrans objects.
     */
    protected $collStocktranssRelatedByCrefinanceId;
    protected $collStocktranssRelatedByCrefinanceIdPartial;

    /**
     * @var        PropelObjectCollection|Stocktrans[] Collection to store aggregation of Stocktrans objects.
     */
    protected $collStocktranssRelatedByDebfinanceId;
    protected $collStocktranssRelatedByDebfinanceIdPartial;

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
    protected $orgstructureStocksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionItemsRelatedByFinanceIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockrequisitionItemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stocktranssRelatedByCrefinanceIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stocktranssRelatedByDebfinanceIdScheduledForDeletion = null;

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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbfinancePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = RbfinancePeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = RbfinancePeer::NAME;
        }


        return $this;
    } // setName()

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
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = RbfinancePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rbfinance object", $e);
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
            $con = Propel::getConnection(RbfinancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbfinancePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collOrgstructureStocks = null;

            $this->collStockmotionItemsRelatedByFinanceId = null;

            $this->collStockmotionItemsRelatedByOldfinanceId = null;

            $this->collStockrequisitionItems = null;

            $this->collStocktranssRelatedByCrefinanceId = null;

            $this->collStocktranssRelatedByDebfinanceId = null;

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
            $con = Propel::getConnection(RbfinancePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbfinanceQuery::create()
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
            $con = Propel::getConnection(RbfinancePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbfinancePeer::addInstanceToPool($this);
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

            if ($this->orgstructureStocksScheduledForDeletion !== null) {
                if (!$this->orgstructureStocksScheduledForDeletion->isEmpty()) {
                    foreach ($this->orgstructureStocksScheduledForDeletion as $orgstructureStock) {
                        // need to save related object because we set the relation to null
                        $orgstructureStock->save($con);
                    }
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

            if ($this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion !== null) {
                if (!$this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion as $stockmotionItemRelatedByFinanceId) {
                        // need to save related object because we set the relation to null
                        $stockmotionItemRelatedByFinanceId->save($con);
                    }
                    $this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionItemsRelatedByFinanceId !== null) {
                foreach ($this->collStockmotionItemsRelatedByFinanceId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion !== null) {
                if (!$this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion as $stockmotionItemRelatedByOldfinanceId) {
                        // need to save related object because we set the relation to null
                        $stockmotionItemRelatedByOldfinanceId->save($con);
                    }
                    $this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion = null;
                }
            }

            if ($this->collStockmotionItemsRelatedByOldfinanceId !== null) {
                foreach ($this->collStockmotionItemsRelatedByOldfinanceId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockrequisitionItemsScheduledForDeletion !== null) {
                if (!$this->stockrequisitionItemsScheduledForDeletion->isEmpty()) {
                    foreach ($this->stockrequisitionItemsScheduledForDeletion as $stockrequisitionItem) {
                        // need to save related object because we set the relation to null
                        $stockrequisitionItem->save($con);
                    }
                    $this->stockrequisitionItemsScheduledForDeletion = null;
                }
            }

            if ($this->collStockrequisitionItems !== null) {
                foreach ($this->collStockrequisitionItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stocktranssRelatedByCrefinanceIdScheduledForDeletion !== null) {
                if (!$this->stocktranssRelatedByCrefinanceIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stocktranssRelatedByCrefinanceIdScheduledForDeletion as $stocktransRelatedByCrefinanceId) {
                        // need to save related object because we set the relation to null
                        $stocktransRelatedByCrefinanceId->save($con);
                    }
                    $this->stocktranssRelatedByCrefinanceIdScheduledForDeletion = null;
                }
            }

            if ($this->collStocktranssRelatedByCrefinanceId !== null) {
                foreach ($this->collStocktranssRelatedByCrefinanceId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stocktranssRelatedByDebfinanceIdScheduledForDeletion !== null) {
                if (!$this->stocktranssRelatedByDebfinanceIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->stocktranssRelatedByDebfinanceIdScheduledForDeletion as $stocktransRelatedByDebfinanceId) {
                        // need to save related object because we set the relation to null
                        $stocktransRelatedByDebfinanceId->save($con);
                    }
                    $this->stocktranssRelatedByDebfinanceIdScheduledForDeletion = null;
                }
            }

            if ($this->collStocktranssRelatedByDebfinanceId !== null) {
                foreach ($this->collStocktranssRelatedByDebfinanceId as $referrerFK) {
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

        $this->modifiedColumns[] = RbfinancePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbfinancePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbfinancePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbfinancePeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(RbfinancePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `rbFinance` (%s) VALUES (%s)',
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


            if (($retval = RbfinancePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collOrgstructureStocks !== null) {
                    foreach ($this->collOrgstructureStocks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionItemsRelatedByFinanceId !== null) {
                    foreach ($this->collStockmotionItemsRelatedByFinanceId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockmotionItemsRelatedByOldfinanceId !== null) {
                    foreach ($this->collStockmotionItemsRelatedByOldfinanceId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockrequisitionItems !== null) {
                    foreach ($this->collStockrequisitionItems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStocktranssRelatedByCrefinanceId !== null) {
                    foreach ($this->collStocktranssRelatedByCrefinanceId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStocktranssRelatedByDebfinanceId !== null) {
                    foreach ($this->collStocktranssRelatedByDebfinanceId as $referrerFK) {
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
        $pos = RbfinancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
        if (isset($alreadyDumpedObjects['Rbfinance'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rbfinance'][$this->getPrimaryKey()] = true;
        $keys = RbfinancePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collOrgstructureStocks) {
                $result['OrgstructureStocks'] = $this->collOrgstructureStocks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionItemsRelatedByFinanceId) {
                $result['StockmotionItemsRelatedByFinanceId'] = $this->collStockmotionItemsRelatedByFinanceId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockmotionItemsRelatedByOldfinanceId) {
                $result['StockmotionItemsRelatedByOldfinanceId'] = $this->collStockmotionItemsRelatedByOldfinanceId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockrequisitionItems) {
                $result['StockrequisitionItems'] = $this->collStockrequisitionItems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStocktranssRelatedByCrefinanceId) {
                $result['StocktranssRelatedByCrefinanceId'] = $this->collStocktranssRelatedByCrefinanceId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStocktranssRelatedByDebfinanceId) {
                $result['StocktranssRelatedByDebfinanceId'] = $this->collStocktranssRelatedByDebfinanceId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RbfinancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
        $keys = RbfinancePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbfinancePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbfinancePeer::ID)) $criteria->add(RbfinancePeer::ID, $this->id);
        if ($this->isColumnModified(RbfinancePeer::CODE)) $criteria->add(RbfinancePeer::CODE, $this->code);
        if ($this->isColumnModified(RbfinancePeer::NAME)) $criteria->add(RbfinancePeer::NAME, $this->name);

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
        $criteria = new Criteria(RbfinancePeer::DATABASE_NAME);
        $criteria->add(RbfinancePeer::ID, $this->id);

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
     * @param object $copyObj An object of Rbfinance (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getOrgstructureStocks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrgstructureStock($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionItemsRelatedByFinanceId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionItemRelatedByFinanceId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockmotionItemsRelatedByOldfinanceId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockmotionItemRelatedByOldfinanceId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockrequisitionItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockrequisitionItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStocktranssRelatedByCrefinanceId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStocktransRelatedByCrefinanceId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStocktranssRelatedByDebfinanceId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStocktransRelatedByDebfinanceId($relObj->copy($deepCopy));
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
     * @return Rbfinance Clone of current object.
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
     * @return RbfinancePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbfinancePeer();
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
        if ('OrgstructureStock' == $relationName) {
            $this->initOrgstructureStocks();
        }
        if ('StockmotionItemRelatedByFinanceId' == $relationName) {
            $this->initStockmotionItemsRelatedByFinanceId();
        }
        if ('StockmotionItemRelatedByOldfinanceId' == $relationName) {
            $this->initStockmotionItemsRelatedByOldfinanceId();
        }
        if ('StockrequisitionItem' == $relationName) {
            $this->initStockrequisitionItems();
        }
        if ('StocktransRelatedByCrefinanceId' == $relationName) {
            $this->initStocktranssRelatedByCrefinanceId();
        }
        if ('StocktransRelatedByDebfinanceId' == $relationName) {
            $this->initStocktranssRelatedByDebfinanceId();
        }
    }

    /**
     * Clears out the collOrgstructureStocks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbfinance The current object (for fluent API support)
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
     * If this Rbfinance is new, it will return
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
                    ->filterByRbfinance($this)
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
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setOrgstructureStocks(PropelCollection $orgstructureStocks, PropelPDO $con = null)
    {
        $orgstructureStocksToDelete = $this->getOrgstructureStocks(new Criteria(), $con)->diff($orgstructureStocks);

        $this->orgstructureStocksScheduledForDeletion = unserialize(serialize($orgstructureStocksToDelete));

        foreach ($orgstructureStocksToDelete as $orgstructureStockRemoved) {
            $orgstructureStockRemoved->setRbfinance(null);
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
                ->filterByRbfinance($this)
                ->count($con);
        }

        return count($this->collOrgstructureStocks);
    }

    /**
     * Method called to associate a OrgstructureStock object to this object
     * through the OrgstructureStock foreign key attribute.
     *
     * @param    OrgstructureStock $l OrgstructureStock
     * @return Rbfinance The current object (for fluent API support)
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
        $orgstructureStock->setRbfinance($this);
    }

    /**
     * @param	OrgstructureStock $orgstructureStock The orgstructureStock object to remove.
     * @return Rbfinance The current object (for fluent API support)
     */
    public function removeOrgstructureStock($orgstructureStock)
    {
        if ($this->getOrgstructureStocks()->contains($orgstructureStock)) {
            $this->collOrgstructureStocks->remove($this->collOrgstructureStocks->search($orgstructureStock));
            if (null === $this->orgstructureStocksScheduledForDeletion) {
                $this->orgstructureStocksScheduledForDeletion = clone $this->collOrgstructureStocks;
                $this->orgstructureStocksScheduledForDeletion->clear();
            }
            $this->orgstructureStocksScheduledForDeletion[]= $orgstructureStock;
            $orgstructureStock->setRbfinance(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related OrgstructureStocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|OrgstructureStock[] List of OrgstructureStock objects
     */
    public function getOrgstructureStocksJoinOrgstructure($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrgstructureStockQuery::create(null, $criteria);
        $query->joinWith('Orgstructure', $join_behavior);

        return $this->getOrgstructureStocks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related OrgstructureStocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
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
     * Clears out the collStockmotionItemsRelatedByFinanceId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbfinance The current object (for fluent API support)
     * @see        addStockmotionItemsRelatedByFinanceId()
     */
    public function clearStockmotionItemsRelatedByFinanceId()
    {
        $this->collStockmotionItemsRelatedByFinanceId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionItemsRelatedByFinanceIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionItemsRelatedByFinanceId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionItemsRelatedByFinanceId($v = true)
    {
        $this->collStockmotionItemsRelatedByFinanceIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionItemsRelatedByFinanceId collection.
     *
     * By default this just sets the collStockmotionItemsRelatedByFinanceId collection to an empty array (like clearcollStockmotionItemsRelatedByFinanceId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionItemsRelatedByFinanceId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionItemsRelatedByFinanceId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionItemsRelatedByFinanceId = new PropelObjectCollection();
        $this->collStockmotionItemsRelatedByFinanceId->setModel('StockmotionItem');
    }

    /**
     * Gets an array of StockmotionItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbfinance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     * @throws PropelException
     */
    public function getStockmotionItemsRelatedByFinanceId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionItemsRelatedByFinanceIdPartial && !$this->isNew();
        if (null === $this->collStockmotionItemsRelatedByFinanceId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionItemsRelatedByFinanceId) {
                // return empty collection
                $this->initStockmotionItemsRelatedByFinanceId();
            } else {
                $collStockmotionItemsRelatedByFinanceId = StockmotionItemQuery::create(null, $criteria)
                    ->filterByRbfinanceRelatedByFinanceId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionItemsRelatedByFinanceIdPartial && count($collStockmotionItemsRelatedByFinanceId)) {
                      $this->initStockmotionItemsRelatedByFinanceId(false);

                      foreach($collStockmotionItemsRelatedByFinanceId as $obj) {
                        if (false == $this->collStockmotionItemsRelatedByFinanceId->contains($obj)) {
                          $this->collStockmotionItemsRelatedByFinanceId->append($obj);
                        }
                      }

                      $this->collStockmotionItemsRelatedByFinanceIdPartial = true;
                    }

                    $collStockmotionItemsRelatedByFinanceId->getInternalIterator()->rewind();
                    return $collStockmotionItemsRelatedByFinanceId;
                }

                if($partial && $this->collStockmotionItemsRelatedByFinanceId) {
                    foreach($this->collStockmotionItemsRelatedByFinanceId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionItemsRelatedByFinanceId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionItemsRelatedByFinanceId = $collStockmotionItemsRelatedByFinanceId;
                $this->collStockmotionItemsRelatedByFinanceIdPartial = false;
            }
        }

        return $this->collStockmotionItemsRelatedByFinanceId;
    }

    /**
     * Sets a collection of StockmotionItemRelatedByFinanceId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionItemsRelatedByFinanceId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setStockmotionItemsRelatedByFinanceId(PropelCollection $stockmotionItemsRelatedByFinanceId, PropelPDO $con = null)
    {
        $stockmotionItemsRelatedByFinanceIdToDelete = $this->getStockmotionItemsRelatedByFinanceId(new Criteria(), $con)->diff($stockmotionItemsRelatedByFinanceId);

        $this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion = unserialize(serialize($stockmotionItemsRelatedByFinanceIdToDelete));

        foreach ($stockmotionItemsRelatedByFinanceIdToDelete as $stockmotionItemRelatedByFinanceIdRemoved) {
            $stockmotionItemRelatedByFinanceIdRemoved->setRbfinanceRelatedByFinanceId(null);
        }

        $this->collStockmotionItemsRelatedByFinanceId = null;
        foreach ($stockmotionItemsRelatedByFinanceId as $stockmotionItemRelatedByFinanceId) {
            $this->addStockmotionItemRelatedByFinanceId($stockmotionItemRelatedByFinanceId);
        }

        $this->collStockmotionItemsRelatedByFinanceId = $stockmotionItemsRelatedByFinanceId;
        $this->collStockmotionItemsRelatedByFinanceIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StockmotionItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StockmotionItem objects.
     * @throws PropelException
     */
    public function countStockmotionItemsRelatedByFinanceId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionItemsRelatedByFinanceIdPartial && !$this->isNew();
        if (null === $this->collStockmotionItemsRelatedByFinanceId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionItemsRelatedByFinanceId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionItemsRelatedByFinanceId());
            }
            $query = StockmotionItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbfinanceRelatedByFinanceId($this)
                ->count($con);
        }

        return count($this->collStockmotionItemsRelatedByFinanceId);
    }

    /**
     * Method called to associate a StockmotionItem object to this object
     * through the StockmotionItem foreign key attribute.
     *
     * @param    StockmotionItem $l StockmotionItem
     * @return Rbfinance The current object (for fluent API support)
     */
    public function addStockmotionItemRelatedByFinanceId(StockmotionItem $l)
    {
        if ($this->collStockmotionItemsRelatedByFinanceId === null) {
            $this->initStockmotionItemsRelatedByFinanceId();
            $this->collStockmotionItemsRelatedByFinanceIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionItemsRelatedByFinanceId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionItemRelatedByFinanceId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionItemRelatedByFinanceId $stockmotionItemRelatedByFinanceId The stockmotionItemRelatedByFinanceId object to add.
     */
    protected function doAddStockmotionItemRelatedByFinanceId($stockmotionItemRelatedByFinanceId)
    {
        $this->collStockmotionItemsRelatedByFinanceId[]= $stockmotionItemRelatedByFinanceId;
        $stockmotionItemRelatedByFinanceId->setRbfinanceRelatedByFinanceId($this);
    }

    /**
     * @param	StockmotionItemRelatedByFinanceId $stockmotionItemRelatedByFinanceId The stockmotionItemRelatedByFinanceId object to remove.
     * @return Rbfinance The current object (for fluent API support)
     */
    public function removeStockmotionItemRelatedByFinanceId($stockmotionItemRelatedByFinanceId)
    {
        if ($this->getStockmotionItemsRelatedByFinanceId()->contains($stockmotionItemRelatedByFinanceId)) {
            $this->collStockmotionItemsRelatedByFinanceId->remove($this->collStockmotionItemsRelatedByFinanceId->search($stockmotionItemRelatedByFinanceId));
            if (null === $this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion) {
                $this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion = clone $this->collStockmotionItemsRelatedByFinanceId;
                $this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion->clear();
            }
            $this->stockmotionItemsRelatedByFinanceIdScheduledForDeletion[]= $stockmotionItemRelatedByFinanceId;
            $stockmotionItemRelatedByFinanceId->setRbfinanceRelatedByFinanceId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StockmotionItemsRelatedByFinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsRelatedByFinanceIdJoinStockmotion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('Stockmotion', $join_behavior);

        return $this->getStockmotionItemsRelatedByFinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StockmotionItemsRelatedByFinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsRelatedByFinanceIdJoinRbnomenclature($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('Rbnomenclature', $join_behavior);

        return $this->getStockmotionItemsRelatedByFinanceId($query, $con);
    }

    /**
     * Clears out the collStockmotionItemsRelatedByOldfinanceId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbfinance The current object (for fluent API support)
     * @see        addStockmotionItemsRelatedByOldfinanceId()
     */
    public function clearStockmotionItemsRelatedByOldfinanceId()
    {
        $this->collStockmotionItemsRelatedByOldfinanceId = null; // important to set this to null since that means it is uninitialized
        $this->collStockmotionItemsRelatedByOldfinanceIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStockmotionItemsRelatedByOldfinanceId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockmotionItemsRelatedByOldfinanceId($v = true)
    {
        $this->collStockmotionItemsRelatedByOldfinanceIdPartial = $v;
    }

    /**
     * Initializes the collStockmotionItemsRelatedByOldfinanceId collection.
     *
     * By default this just sets the collStockmotionItemsRelatedByOldfinanceId collection to an empty array (like clearcollStockmotionItemsRelatedByOldfinanceId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockmotionItemsRelatedByOldfinanceId($overrideExisting = true)
    {
        if (null !== $this->collStockmotionItemsRelatedByOldfinanceId && !$overrideExisting) {
            return;
        }
        $this->collStockmotionItemsRelatedByOldfinanceId = new PropelObjectCollection();
        $this->collStockmotionItemsRelatedByOldfinanceId->setModel('StockmotionItem');
    }

    /**
     * Gets an array of StockmotionItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbfinance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     * @throws PropelException
     */
    public function getStockmotionItemsRelatedByOldfinanceId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionItemsRelatedByOldfinanceIdPartial && !$this->isNew();
        if (null === $this->collStockmotionItemsRelatedByOldfinanceId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockmotionItemsRelatedByOldfinanceId) {
                // return empty collection
                $this->initStockmotionItemsRelatedByOldfinanceId();
            } else {
                $collStockmotionItemsRelatedByOldfinanceId = StockmotionItemQuery::create(null, $criteria)
                    ->filterByRbfinanceRelatedByOldfinanceId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockmotionItemsRelatedByOldfinanceIdPartial && count($collStockmotionItemsRelatedByOldfinanceId)) {
                      $this->initStockmotionItemsRelatedByOldfinanceId(false);

                      foreach($collStockmotionItemsRelatedByOldfinanceId as $obj) {
                        if (false == $this->collStockmotionItemsRelatedByOldfinanceId->contains($obj)) {
                          $this->collStockmotionItemsRelatedByOldfinanceId->append($obj);
                        }
                      }

                      $this->collStockmotionItemsRelatedByOldfinanceIdPartial = true;
                    }

                    $collStockmotionItemsRelatedByOldfinanceId->getInternalIterator()->rewind();
                    return $collStockmotionItemsRelatedByOldfinanceId;
                }

                if($partial && $this->collStockmotionItemsRelatedByOldfinanceId) {
                    foreach($this->collStockmotionItemsRelatedByOldfinanceId as $obj) {
                        if($obj->isNew()) {
                            $collStockmotionItemsRelatedByOldfinanceId[] = $obj;
                        }
                    }
                }

                $this->collStockmotionItemsRelatedByOldfinanceId = $collStockmotionItemsRelatedByOldfinanceId;
                $this->collStockmotionItemsRelatedByOldfinanceIdPartial = false;
            }
        }

        return $this->collStockmotionItemsRelatedByOldfinanceId;
    }

    /**
     * Sets a collection of StockmotionItemRelatedByOldfinanceId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockmotionItemsRelatedByOldfinanceId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setStockmotionItemsRelatedByOldfinanceId(PropelCollection $stockmotionItemsRelatedByOldfinanceId, PropelPDO $con = null)
    {
        $stockmotionItemsRelatedByOldfinanceIdToDelete = $this->getStockmotionItemsRelatedByOldfinanceId(new Criteria(), $con)->diff($stockmotionItemsRelatedByOldfinanceId);

        $this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion = unserialize(serialize($stockmotionItemsRelatedByOldfinanceIdToDelete));

        foreach ($stockmotionItemsRelatedByOldfinanceIdToDelete as $stockmotionItemRelatedByOldfinanceIdRemoved) {
            $stockmotionItemRelatedByOldfinanceIdRemoved->setRbfinanceRelatedByOldfinanceId(null);
        }

        $this->collStockmotionItemsRelatedByOldfinanceId = null;
        foreach ($stockmotionItemsRelatedByOldfinanceId as $stockmotionItemRelatedByOldfinanceId) {
            $this->addStockmotionItemRelatedByOldfinanceId($stockmotionItemRelatedByOldfinanceId);
        }

        $this->collStockmotionItemsRelatedByOldfinanceId = $stockmotionItemsRelatedByOldfinanceId;
        $this->collStockmotionItemsRelatedByOldfinanceIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StockmotionItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StockmotionItem objects.
     * @throws PropelException
     */
    public function countStockmotionItemsRelatedByOldfinanceId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockmotionItemsRelatedByOldfinanceIdPartial && !$this->isNew();
        if (null === $this->collStockmotionItemsRelatedByOldfinanceId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockmotionItemsRelatedByOldfinanceId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockmotionItemsRelatedByOldfinanceId());
            }
            $query = StockmotionItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbfinanceRelatedByOldfinanceId($this)
                ->count($con);
        }

        return count($this->collStockmotionItemsRelatedByOldfinanceId);
    }

    /**
     * Method called to associate a StockmotionItem object to this object
     * through the StockmotionItem foreign key attribute.
     *
     * @param    StockmotionItem $l StockmotionItem
     * @return Rbfinance The current object (for fluent API support)
     */
    public function addStockmotionItemRelatedByOldfinanceId(StockmotionItem $l)
    {
        if ($this->collStockmotionItemsRelatedByOldfinanceId === null) {
            $this->initStockmotionItemsRelatedByOldfinanceId();
            $this->collStockmotionItemsRelatedByOldfinanceIdPartial = true;
        }
        if (!in_array($l, $this->collStockmotionItemsRelatedByOldfinanceId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockmotionItemRelatedByOldfinanceId($l);
        }

        return $this;
    }

    /**
     * @param	StockmotionItemRelatedByOldfinanceId $stockmotionItemRelatedByOldfinanceId The stockmotionItemRelatedByOldfinanceId object to add.
     */
    protected function doAddStockmotionItemRelatedByOldfinanceId($stockmotionItemRelatedByOldfinanceId)
    {
        $this->collStockmotionItemsRelatedByOldfinanceId[]= $stockmotionItemRelatedByOldfinanceId;
        $stockmotionItemRelatedByOldfinanceId->setRbfinanceRelatedByOldfinanceId($this);
    }

    /**
     * @param	StockmotionItemRelatedByOldfinanceId $stockmotionItemRelatedByOldfinanceId The stockmotionItemRelatedByOldfinanceId object to remove.
     * @return Rbfinance The current object (for fluent API support)
     */
    public function removeStockmotionItemRelatedByOldfinanceId($stockmotionItemRelatedByOldfinanceId)
    {
        if ($this->getStockmotionItemsRelatedByOldfinanceId()->contains($stockmotionItemRelatedByOldfinanceId)) {
            $this->collStockmotionItemsRelatedByOldfinanceId->remove($this->collStockmotionItemsRelatedByOldfinanceId->search($stockmotionItemRelatedByOldfinanceId));
            if (null === $this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion) {
                $this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion = clone $this->collStockmotionItemsRelatedByOldfinanceId;
                $this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion->clear();
            }
            $this->stockmotionItemsRelatedByOldfinanceIdScheduledForDeletion[]= $stockmotionItemRelatedByOldfinanceId;
            $stockmotionItemRelatedByOldfinanceId->setRbfinanceRelatedByOldfinanceId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StockmotionItemsRelatedByOldfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsRelatedByOldfinanceIdJoinStockmotion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('Stockmotion', $join_behavior);

        return $this->getStockmotionItemsRelatedByOldfinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StockmotionItemsRelatedByOldfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockmotionItem[] List of StockmotionItem objects
     */
    public function getStockmotionItemsRelatedByOldfinanceIdJoinRbnomenclature($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockmotionItemQuery::create(null, $criteria);
        $query->joinWith('Rbnomenclature', $join_behavior);

        return $this->getStockmotionItemsRelatedByOldfinanceId($query, $con);
    }

    /**
     * Clears out the collStockrequisitionItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbfinance The current object (for fluent API support)
     * @see        addStockrequisitionItems()
     */
    public function clearStockrequisitionItems()
    {
        $this->collStockrequisitionItems = null; // important to set this to null since that means it is uninitialized
        $this->collStockrequisitionItemsPartial = null;

        return $this;
    }

    /**
     * reset is the collStockrequisitionItems collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockrequisitionItems($v = true)
    {
        $this->collStockrequisitionItemsPartial = $v;
    }

    /**
     * Initializes the collStockrequisitionItems collection.
     *
     * By default this just sets the collStockrequisitionItems collection to an empty array (like clearcollStockrequisitionItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockrequisitionItems($overrideExisting = true)
    {
        if (null !== $this->collStockrequisitionItems && !$overrideExisting) {
            return;
        }
        $this->collStockrequisitionItems = new PropelObjectCollection();
        $this->collStockrequisitionItems->setModel('StockrequisitionItem');
    }

    /**
     * Gets an array of StockrequisitionItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbfinance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StockrequisitionItem[] List of StockrequisitionItem objects
     * @throws PropelException
     */
    public function getStockrequisitionItems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionItemsPartial && !$this->isNew();
        if (null === $this->collStockrequisitionItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionItems) {
                // return empty collection
                $this->initStockrequisitionItems();
            } else {
                $collStockrequisitionItems = StockrequisitionItemQuery::create(null, $criteria)
                    ->filterByRbfinance($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockrequisitionItemsPartial && count($collStockrequisitionItems)) {
                      $this->initStockrequisitionItems(false);

                      foreach($collStockrequisitionItems as $obj) {
                        if (false == $this->collStockrequisitionItems->contains($obj)) {
                          $this->collStockrequisitionItems->append($obj);
                        }
                      }

                      $this->collStockrequisitionItemsPartial = true;
                    }

                    $collStockrequisitionItems->getInternalIterator()->rewind();
                    return $collStockrequisitionItems;
                }

                if($partial && $this->collStockrequisitionItems) {
                    foreach($this->collStockrequisitionItems as $obj) {
                        if($obj->isNew()) {
                            $collStockrequisitionItems[] = $obj;
                        }
                    }
                }

                $this->collStockrequisitionItems = $collStockrequisitionItems;
                $this->collStockrequisitionItemsPartial = false;
            }
        }

        return $this->collStockrequisitionItems;
    }

    /**
     * Sets a collection of StockrequisitionItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockrequisitionItems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setStockrequisitionItems(PropelCollection $stockrequisitionItems, PropelPDO $con = null)
    {
        $stockrequisitionItemsToDelete = $this->getStockrequisitionItems(new Criteria(), $con)->diff($stockrequisitionItems);

        $this->stockrequisitionItemsScheduledForDeletion = unserialize(serialize($stockrequisitionItemsToDelete));

        foreach ($stockrequisitionItemsToDelete as $stockrequisitionItemRemoved) {
            $stockrequisitionItemRemoved->setRbfinance(null);
        }

        $this->collStockrequisitionItems = null;
        foreach ($stockrequisitionItems as $stockrequisitionItem) {
            $this->addStockrequisitionItem($stockrequisitionItem);
        }

        $this->collStockrequisitionItems = $stockrequisitionItems;
        $this->collStockrequisitionItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StockrequisitionItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StockrequisitionItem objects.
     * @throws PropelException
     */
    public function countStockrequisitionItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockrequisitionItemsPartial && !$this->isNew();
        if (null === $this->collStockrequisitionItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockrequisitionItems) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockrequisitionItems());
            }
            $query = StockrequisitionItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbfinance($this)
                ->count($con);
        }

        return count($this->collStockrequisitionItems);
    }

    /**
     * Method called to associate a StockrequisitionItem object to this object
     * through the StockrequisitionItem foreign key attribute.
     *
     * @param    StockrequisitionItem $l StockrequisitionItem
     * @return Rbfinance The current object (for fluent API support)
     */
    public function addStockrequisitionItem(StockrequisitionItem $l)
    {
        if ($this->collStockrequisitionItems === null) {
            $this->initStockrequisitionItems();
            $this->collStockrequisitionItemsPartial = true;
        }
        if (!in_array($l, $this->collStockrequisitionItems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockrequisitionItem($l);
        }

        return $this;
    }

    /**
     * @param	StockrequisitionItem $stockrequisitionItem The stockrequisitionItem object to add.
     */
    protected function doAddStockrequisitionItem($stockrequisitionItem)
    {
        $this->collStockrequisitionItems[]= $stockrequisitionItem;
        $stockrequisitionItem->setRbfinance($this);
    }

    /**
     * @param	StockrequisitionItem $stockrequisitionItem The stockrequisitionItem object to remove.
     * @return Rbfinance The current object (for fluent API support)
     */
    public function removeStockrequisitionItem($stockrequisitionItem)
    {
        if ($this->getStockrequisitionItems()->contains($stockrequisitionItem)) {
            $this->collStockrequisitionItems->remove($this->collStockrequisitionItems->search($stockrequisitionItem));
            if (null === $this->stockrequisitionItemsScheduledForDeletion) {
                $this->stockrequisitionItemsScheduledForDeletion = clone $this->collStockrequisitionItems;
                $this->stockrequisitionItemsScheduledForDeletion->clear();
            }
            $this->stockrequisitionItemsScheduledForDeletion[]= $stockrequisitionItem;
            $stockrequisitionItem->setRbfinance(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StockrequisitionItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockrequisitionItem[] List of StockrequisitionItem objects
     */
    public function getStockrequisitionItemsJoinStockrequisition($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionItemQuery::create(null, $criteria);
        $query->joinWith('Stockrequisition', $join_behavior);

        return $this->getStockrequisitionItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StockrequisitionItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StockrequisitionItem[] List of StockrequisitionItem objects
     */
    public function getStockrequisitionItemsJoinRbnomenclature($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StockrequisitionItemQuery::create(null, $criteria);
        $query->joinWith('Rbnomenclature', $join_behavior);

        return $this->getStockrequisitionItems($query, $con);
    }

    /**
     * Clears out the collStocktranssRelatedByCrefinanceId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbfinance The current object (for fluent API support)
     * @see        addStocktranssRelatedByCrefinanceId()
     */
    public function clearStocktranssRelatedByCrefinanceId()
    {
        $this->collStocktranssRelatedByCrefinanceId = null; // important to set this to null since that means it is uninitialized
        $this->collStocktranssRelatedByCrefinanceIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStocktranssRelatedByCrefinanceId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStocktranssRelatedByCrefinanceId($v = true)
    {
        $this->collStocktranssRelatedByCrefinanceIdPartial = $v;
    }

    /**
     * Initializes the collStocktranssRelatedByCrefinanceId collection.
     *
     * By default this just sets the collStocktranssRelatedByCrefinanceId collection to an empty array (like clearcollStocktranssRelatedByCrefinanceId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStocktranssRelatedByCrefinanceId($overrideExisting = true)
    {
        if (null !== $this->collStocktranssRelatedByCrefinanceId && !$overrideExisting) {
            return;
        }
        $this->collStocktranssRelatedByCrefinanceId = new PropelObjectCollection();
        $this->collStocktranssRelatedByCrefinanceId->setModel('Stocktrans');
    }

    /**
     * Gets an array of Stocktrans objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbfinance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     * @throws PropelException
     */
    public function getStocktranssRelatedByCrefinanceId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByCrefinanceIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByCrefinanceId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByCrefinanceId) {
                // return empty collection
                $this->initStocktranssRelatedByCrefinanceId();
            } else {
                $collStocktranssRelatedByCrefinanceId = StocktransQuery::create(null, $criteria)
                    ->filterByRbfinanceRelatedByCrefinanceId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStocktranssRelatedByCrefinanceIdPartial && count($collStocktranssRelatedByCrefinanceId)) {
                      $this->initStocktranssRelatedByCrefinanceId(false);

                      foreach($collStocktranssRelatedByCrefinanceId as $obj) {
                        if (false == $this->collStocktranssRelatedByCrefinanceId->contains($obj)) {
                          $this->collStocktranssRelatedByCrefinanceId->append($obj);
                        }
                      }

                      $this->collStocktranssRelatedByCrefinanceIdPartial = true;
                    }

                    $collStocktranssRelatedByCrefinanceId->getInternalIterator()->rewind();
                    return $collStocktranssRelatedByCrefinanceId;
                }

                if($partial && $this->collStocktranssRelatedByCrefinanceId) {
                    foreach($this->collStocktranssRelatedByCrefinanceId as $obj) {
                        if($obj->isNew()) {
                            $collStocktranssRelatedByCrefinanceId[] = $obj;
                        }
                    }
                }

                $this->collStocktranssRelatedByCrefinanceId = $collStocktranssRelatedByCrefinanceId;
                $this->collStocktranssRelatedByCrefinanceIdPartial = false;
            }
        }

        return $this->collStocktranssRelatedByCrefinanceId;
    }

    /**
     * Sets a collection of StocktransRelatedByCrefinanceId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stocktranssRelatedByCrefinanceId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setStocktranssRelatedByCrefinanceId(PropelCollection $stocktranssRelatedByCrefinanceId, PropelPDO $con = null)
    {
        $stocktranssRelatedByCrefinanceIdToDelete = $this->getStocktranssRelatedByCrefinanceId(new Criteria(), $con)->diff($stocktranssRelatedByCrefinanceId);

        $this->stocktranssRelatedByCrefinanceIdScheduledForDeletion = unserialize(serialize($stocktranssRelatedByCrefinanceIdToDelete));

        foreach ($stocktranssRelatedByCrefinanceIdToDelete as $stocktransRelatedByCrefinanceIdRemoved) {
            $stocktransRelatedByCrefinanceIdRemoved->setRbfinanceRelatedByCrefinanceId(null);
        }

        $this->collStocktranssRelatedByCrefinanceId = null;
        foreach ($stocktranssRelatedByCrefinanceId as $stocktransRelatedByCrefinanceId) {
            $this->addStocktransRelatedByCrefinanceId($stocktransRelatedByCrefinanceId);
        }

        $this->collStocktranssRelatedByCrefinanceId = $stocktranssRelatedByCrefinanceId;
        $this->collStocktranssRelatedByCrefinanceIdPartial = false;

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
    public function countStocktranssRelatedByCrefinanceId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByCrefinanceIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByCrefinanceId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByCrefinanceId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStocktranssRelatedByCrefinanceId());
            }
            $query = StocktransQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbfinanceRelatedByCrefinanceId($this)
                ->count($con);
        }

        return count($this->collStocktranssRelatedByCrefinanceId);
    }

    /**
     * Method called to associate a Stocktrans object to this object
     * through the Stocktrans foreign key attribute.
     *
     * @param    Stocktrans $l Stocktrans
     * @return Rbfinance The current object (for fluent API support)
     */
    public function addStocktransRelatedByCrefinanceId(Stocktrans $l)
    {
        if ($this->collStocktranssRelatedByCrefinanceId === null) {
            $this->initStocktranssRelatedByCrefinanceId();
            $this->collStocktranssRelatedByCrefinanceIdPartial = true;
        }
        if (!in_array($l, $this->collStocktranssRelatedByCrefinanceId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStocktransRelatedByCrefinanceId($l);
        }

        return $this;
    }

    /**
     * @param	StocktransRelatedByCrefinanceId $stocktransRelatedByCrefinanceId The stocktransRelatedByCrefinanceId object to add.
     */
    protected function doAddStocktransRelatedByCrefinanceId($stocktransRelatedByCrefinanceId)
    {
        $this->collStocktranssRelatedByCrefinanceId[]= $stocktransRelatedByCrefinanceId;
        $stocktransRelatedByCrefinanceId->setRbfinanceRelatedByCrefinanceId($this);
    }

    /**
     * @param	StocktransRelatedByCrefinanceId $stocktransRelatedByCrefinanceId The stocktransRelatedByCrefinanceId object to remove.
     * @return Rbfinance The current object (for fluent API support)
     */
    public function removeStocktransRelatedByCrefinanceId($stocktransRelatedByCrefinanceId)
    {
        if ($this->getStocktranssRelatedByCrefinanceId()->contains($stocktransRelatedByCrefinanceId)) {
            $this->collStocktranssRelatedByCrefinanceId->remove($this->collStocktranssRelatedByCrefinanceId->search($stocktransRelatedByCrefinanceId));
            if (null === $this->stocktranssRelatedByCrefinanceIdScheduledForDeletion) {
                $this->stocktranssRelatedByCrefinanceIdScheduledForDeletion = clone $this->collStocktranssRelatedByCrefinanceId;
                $this->stocktranssRelatedByCrefinanceIdScheduledForDeletion->clear();
            }
            $this->stocktranssRelatedByCrefinanceIdScheduledForDeletion[]= $stocktransRelatedByCrefinanceId;
            $stocktransRelatedByCrefinanceId->setRbfinanceRelatedByCrefinanceId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByCrefinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCrefinanceIdJoinRbnomenclatureRelatedByCrenomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByCrenomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByCrefinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByCrefinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCrefinanceIdJoinOrgstructureRelatedByCreorgstructureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByCreorgstructureId', $join_behavior);

        return $this->getStocktranssRelatedByCrefinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByCrefinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCrefinanceIdJoinRbnomenclatureRelatedByDebnomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByDebnomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByCrefinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByCrefinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCrefinanceIdJoinOrgstructureRelatedByDeborgstructureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByDeborgstructureId', $join_behavior);

        return $this->getStocktranssRelatedByCrefinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByCrefinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByCrefinanceIdJoinStockmotionItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('StockmotionItem', $join_behavior);

        return $this->getStocktranssRelatedByCrefinanceId($query, $con);
    }

    /**
     * Clears out the collStocktranssRelatedByDebfinanceId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Rbfinance The current object (for fluent API support)
     * @see        addStocktranssRelatedByDebfinanceId()
     */
    public function clearStocktranssRelatedByDebfinanceId()
    {
        $this->collStocktranssRelatedByDebfinanceId = null; // important to set this to null since that means it is uninitialized
        $this->collStocktranssRelatedByDebfinanceIdPartial = null;

        return $this;
    }

    /**
     * reset is the collStocktranssRelatedByDebfinanceId collection loaded partially
     *
     * @return void
     */
    public function resetPartialStocktranssRelatedByDebfinanceId($v = true)
    {
        $this->collStocktranssRelatedByDebfinanceIdPartial = $v;
    }

    /**
     * Initializes the collStocktranssRelatedByDebfinanceId collection.
     *
     * By default this just sets the collStocktranssRelatedByDebfinanceId collection to an empty array (like clearcollStocktranssRelatedByDebfinanceId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStocktranssRelatedByDebfinanceId($overrideExisting = true)
    {
        if (null !== $this->collStocktranssRelatedByDebfinanceId && !$overrideExisting) {
            return;
        }
        $this->collStocktranssRelatedByDebfinanceId = new PropelObjectCollection();
        $this->collStocktranssRelatedByDebfinanceId->setModel('Stocktrans');
    }

    /**
     * Gets an array of Stocktrans objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Rbfinance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     * @throws PropelException
     */
    public function getStocktranssRelatedByDebfinanceId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByDebfinanceIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByDebfinanceId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByDebfinanceId) {
                // return empty collection
                $this->initStocktranssRelatedByDebfinanceId();
            } else {
                $collStocktranssRelatedByDebfinanceId = StocktransQuery::create(null, $criteria)
                    ->filterByRbfinanceRelatedByDebfinanceId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStocktranssRelatedByDebfinanceIdPartial && count($collStocktranssRelatedByDebfinanceId)) {
                      $this->initStocktranssRelatedByDebfinanceId(false);

                      foreach($collStocktranssRelatedByDebfinanceId as $obj) {
                        if (false == $this->collStocktranssRelatedByDebfinanceId->contains($obj)) {
                          $this->collStocktranssRelatedByDebfinanceId->append($obj);
                        }
                      }

                      $this->collStocktranssRelatedByDebfinanceIdPartial = true;
                    }

                    $collStocktranssRelatedByDebfinanceId->getInternalIterator()->rewind();
                    return $collStocktranssRelatedByDebfinanceId;
                }

                if($partial && $this->collStocktranssRelatedByDebfinanceId) {
                    foreach($this->collStocktranssRelatedByDebfinanceId as $obj) {
                        if($obj->isNew()) {
                            $collStocktranssRelatedByDebfinanceId[] = $obj;
                        }
                    }
                }

                $this->collStocktranssRelatedByDebfinanceId = $collStocktranssRelatedByDebfinanceId;
                $this->collStocktranssRelatedByDebfinanceIdPartial = false;
            }
        }

        return $this->collStocktranssRelatedByDebfinanceId;
    }

    /**
     * Sets a collection of StocktransRelatedByDebfinanceId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stocktranssRelatedByDebfinanceId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Rbfinance The current object (for fluent API support)
     */
    public function setStocktranssRelatedByDebfinanceId(PropelCollection $stocktranssRelatedByDebfinanceId, PropelPDO $con = null)
    {
        $stocktranssRelatedByDebfinanceIdToDelete = $this->getStocktranssRelatedByDebfinanceId(new Criteria(), $con)->diff($stocktranssRelatedByDebfinanceId);

        $this->stocktranssRelatedByDebfinanceIdScheduledForDeletion = unserialize(serialize($stocktranssRelatedByDebfinanceIdToDelete));

        foreach ($stocktranssRelatedByDebfinanceIdToDelete as $stocktransRelatedByDebfinanceIdRemoved) {
            $stocktransRelatedByDebfinanceIdRemoved->setRbfinanceRelatedByDebfinanceId(null);
        }

        $this->collStocktranssRelatedByDebfinanceId = null;
        foreach ($stocktranssRelatedByDebfinanceId as $stocktransRelatedByDebfinanceId) {
            $this->addStocktransRelatedByDebfinanceId($stocktransRelatedByDebfinanceId);
        }

        $this->collStocktranssRelatedByDebfinanceId = $stocktranssRelatedByDebfinanceId;
        $this->collStocktranssRelatedByDebfinanceIdPartial = false;

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
    public function countStocktranssRelatedByDebfinanceId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStocktranssRelatedByDebfinanceIdPartial && !$this->isNew();
        if (null === $this->collStocktranssRelatedByDebfinanceId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStocktranssRelatedByDebfinanceId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStocktranssRelatedByDebfinanceId());
            }
            $query = StocktransQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRbfinanceRelatedByDebfinanceId($this)
                ->count($con);
        }

        return count($this->collStocktranssRelatedByDebfinanceId);
    }

    /**
     * Method called to associate a Stocktrans object to this object
     * through the Stocktrans foreign key attribute.
     *
     * @param    Stocktrans $l Stocktrans
     * @return Rbfinance The current object (for fluent API support)
     */
    public function addStocktransRelatedByDebfinanceId(Stocktrans $l)
    {
        if ($this->collStocktranssRelatedByDebfinanceId === null) {
            $this->initStocktranssRelatedByDebfinanceId();
            $this->collStocktranssRelatedByDebfinanceIdPartial = true;
        }
        if (!in_array($l, $this->collStocktranssRelatedByDebfinanceId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStocktransRelatedByDebfinanceId($l);
        }

        return $this;
    }

    /**
     * @param	StocktransRelatedByDebfinanceId $stocktransRelatedByDebfinanceId The stocktransRelatedByDebfinanceId object to add.
     */
    protected function doAddStocktransRelatedByDebfinanceId($stocktransRelatedByDebfinanceId)
    {
        $this->collStocktranssRelatedByDebfinanceId[]= $stocktransRelatedByDebfinanceId;
        $stocktransRelatedByDebfinanceId->setRbfinanceRelatedByDebfinanceId($this);
    }

    /**
     * @param	StocktransRelatedByDebfinanceId $stocktransRelatedByDebfinanceId The stocktransRelatedByDebfinanceId object to remove.
     * @return Rbfinance The current object (for fluent API support)
     */
    public function removeStocktransRelatedByDebfinanceId($stocktransRelatedByDebfinanceId)
    {
        if ($this->getStocktranssRelatedByDebfinanceId()->contains($stocktransRelatedByDebfinanceId)) {
            $this->collStocktranssRelatedByDebfinanceId->remove($this->collStocktranssRelatedByDebfinanceId->search($stocktransRelatedByDebfinanceId));
            if (null === $this->stocktranssRelatedByDebfinanceIdScheduledForDeletion) {
                $this->stocktranssRelatedByDebfinanceIdScheduledForDeletion = clone $this->collStocktranssRelatedByDebfinanceId;
                $this->stocktranssRelatedByDebfinanceIdScheduledForDeletion->clear();
            }
            $this->stocktranssRelatedByDebfinanceIdScheduledForDeletion[]= $stocktransRelatedByDebfinanceId;
            $stocktransRelatedByDebfinanceId->setRbfinanceRelatedByDebfinanceId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByDebfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDebfinanceIdJoinRbnomenclatureRelatedByCrenomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByCrenomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByDebfinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByDebfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDebfinanceIdJoinOrgstructureRelatedByCreorgstructureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByCreorgstructureId', $join_behavior);

        return $this->getStocktranssRelatedByDebfinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByDebfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDebfinanceIdJoinRbnomenclatureRelatedByDebnomenclatureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('RbnomenclatureRelatedByDebnomenclatureId', $join_behavior);

        return $this->getStocktranssRelatedByDebfinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByDebfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDebfinanceIdJoinOrgstructureRelatedByDeborgstructureId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('OrgstructureRelatedByDeborgstructureId', $join_behavior);

        return $this->getStocktranssRelatedByDebfinanceId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Rbfinance is new, it will return
     * an empty collection; or if this Rbfinance has previously
     * been saved, it will retrieve related StocktranssRelatedByDebfinanceId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Rbfinance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Stocktrans[] List of Stocktrans objects
     */
    public function getStocktranssRelatedByDebfinanceIdJoinStockmotionItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StocktransQuery::create(null, $criteria);
        $query->joinWith('StockmotionItem', $join_behavior);

        return $this->getStocktranssRelatedByDebfinanceId($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->name = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
            if ($this->collOrgstructureStocks) {
                foreach ($this->collOrgstructureStocks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionItemsRelatedByFinanceId) {
                foreach ($this->collStockmotionItemsRelatedByFinanceId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockmotionItemsRelatedByOldfinanceId) {
                foreach ($this->collStockmotionItemsRelatedByOldfinanceId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockrequisitionItems) {
                foreach ($this->collStockrequisitionItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStocktranssRelatedByCrefinanceId) {
                foreach ($this->collStocktranssRelatedByCrefinanceId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStocktranssRelatedByDebfinanceId) {
                foreach ($this->collStocktranssRelatedByDebfinanceId as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collOrgstructureStocks instanceof PropelCollection) {
            $this->collOrgstructureStocks->clearIterator();
        }
        $this->collOrgstructureStocks = null;
        if ($this->collStockmotionItemsRelatedByFinanceId instanceof PropelCollection) {
            $this->collStockmotionItemsRelatedByFinanceId->clearIterator();
        }
        $this->collStockmotionItemsRelatedByFinanceId = null;
        if ($this->collStockmotionItemsRelatedByOldfinanceId instanceof PropelCollection) {
            $this->collStockmotionItemsRelatedByOldfinanceId->clearIterator();
        }
        $this->collStockmotionItemsRelatedByOldfinanceId = null;
        if ($this->collStockrequisitionItems instanceof PropelCollection) {
            $this->collStockrequisitionItems->clearIterator();
        }
        $this->collStockrequisitionItems = null;
        if ($this->collStocktranssRelatedByCrefinanceId instanceof PropelCollection) {
            $this->collStocktranssRelatedByCrefinanceId->clearIterator();
        }
        $this->collStocktranssRelatedByCrefinanceId = null;
        if ($this->collStocktranssRelatedByDebfinanceId instanceof PropelCollection) {
            $this->collStocktranssRelatedByDebfinanceId->clearIterator();
        }
        $this->collStocktranssRelatedByDebfinanceId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbfinancePeer::DEFAULT_STRING_FORMAT);
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
