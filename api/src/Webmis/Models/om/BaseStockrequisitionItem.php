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
use Webmis\Models\Rbfinance;
use Webmis\Models\RbfinanceQuery;
use Webmis\Models\Rbnomenclature;
use Webmis\Models\RbnomenclatureQuery;
use Webmis\Models\Stockrequisition;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\StockrequisitionItemPeer;
use Webmis\Models\StockrequisitionItemQuery;
use Webmis\Models\StockrequisitionQuery;

/**
 * Base class that represents a row from the 'StockRequisition_Item' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockrequisitionItem extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\StockrequisitionItemPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        StockrequisitionItemPeer
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
     * The value for the nomenclature_id field.
     * @var        int
     */
    protected $nomenclature_id;

    /**
     * The value for the finance_id field.
     * @var        int
     */
    protected $finance_id;

    /**
     * The value for the qnt field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $qnt;

    /**
     * The value for the satisfiedqnt field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $satisfiedqnt;

    /**
     * @var        Rbfinance
     */
    protected $aRbfinance;

    /**
     * @var        Stockrequisition
     */
    protected $aStockrequisition;

    /**
     * @var        Rbnomenclature
     */
    protected $aRbnomenclature;

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
        $this->idx = 0;
        $this->qnt = 0;
        $this->satisfiedqnt = 0;
    }

    /**
     * Initializes internal state of BaseStockrequisitionItem object.
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
     * Get the [nomenclature_id] column value.
     *
     * @return int
     */
    public function getNomenclatureId()
    {
        return $this->nomenclature_id;
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
     * Get the [qnt] column value.
     *
     * @return double
     */
    public function getQnt()
    {
        return $this->qnt;
    }

    /**
     * Get the [satisfiedqnt] column value.
     *
     * @return double
     */
    public function getSatisfiedqnt()
    {
        return $this->satisfiedqnt;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::MASTER_ID;
        }

        if ($this->aStockrequisition !== null && $this->aStockrequisition->getId() !== $v) {
            $this->aStockrequisition = null;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [nomenclature_id] column.
     *
     * @param int $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setNomenclatureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->nomenclature_id !== $v) {
            $this->nomenclature_id = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::NOMENCLATURE_ID;
        }

        if ($this->aRbnomenclature !== null && $this->aRbnomenclature->getId() !== $v) {
            $this->aRbnomenclature = null;
        }


        return $this;
    } // setNomenclatureId()

    /**
     * Set the value of [finance_id] column.
     *
     * @param int $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setFinanceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->finance_id !== $v) {
            $this->finance_id = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::FINANCE_ID;
        }

        if ($this->aRbfinance !== null && $this->aRbfinance->getId() !== $v) {
            $this->aRbfinance = null;
        }


        return $this;
    } // setFinanceId()

    /**
     * Set the value of [qnt] column.
     *
     * @param double $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setQnt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->qnt !== $v) {
            $this->qnt = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::QNT;
        }


        return $this;
    } // setQnt()

    /**
     * Set the value of [satisfiedqnt] column.
     *
     * @param double $v new value
     * @return StockrequisitionItem The current object (for fluent API support)
     */
    public function setSatisfiedqnt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->satisfiedqnt !== $v) {
            $this->satisfiedqnt = $v;
            $this->modifiedColumns[] = StockrequisitionItemPeer::SATISFIEDQNT;
        }


        return $this;
    } // setSatisfiedqnt()

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
            if ($this->idx !== 0) {
                return false;
            }

            if ($this->qnt !== 0) {
                return false;
            }

            if ($this->satisfiedqnt !== 0) {
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
            $this->master_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idx = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->nomenclature_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->finance_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->qnt = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->satisfiedqnt = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating StockrequisitionItem object", $e);
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

        if ($this->aStockrequisition !== null && $this->master_id !== $this->aStockrequisition->getId()) {
            $this->aStockrequisition = null;
        }
        if ($this->aRbnomenclature !== null && $this->nomenclature_id !== $this->aRbnomenclature->getId()) {
            $this->aRbnomenclature = null;
        }
        if ($this->aRbfinance !== null && $this->finance_id !== $this->aRbfinance->getId()) {
            $this->aRbfinance = null;
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
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = StockrequisitionItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbfinance = null;
            $this->aStockrequisition = null;
            $this->aRbnomenclature = null;
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
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = StockrequisitionItemQuery::create()
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
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                StockrequisitionItemPeer::addInstanceToPool($this);
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

            if ($this->aRbfinance !== null) {
                if ($this->aRbfinance->isModified() || $this->aRbfinance->isNew()) {
                    $affectedRows += $this->aRbfinance->save($con);
                }
                $this->setRbfinance($this->aRbfinance);
            }

            if ($this->aStockrequisition !== null) {
                if ($this->aStockrequisition->isModified() || $this->aStockrequisition->isNew()) {
                    $affectedRows += $this->aStockrequisition->save($con);
                }
                $this->setStockrequisition($this->aStockrequisition);
            }

            if ($this->aRbnomenclature !== null) {
                if ($this->aRbnomenclature->isModified() || $this->aRbnomenclature->isNew()) {
                    $affectedRows += $this->aRbnomenclature->save($con);
                }
                $this->setRbnomenclature($this->aRbnomenclature);
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

        $this->modifiedColumns[] = StockrequisitionItemPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StockrequisitionItemPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StockrequisitionItemPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(StockrequisitionItemPeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(StockrequisitionItemPeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(StockrequisitionItemPeer::NOMENCLATURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`nomenclature_id`';
        }
        if ($this->isColumnModified(StockrequisitionItemPeer::FINANCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`finance_id`';
        }
        if ($this->isColumnModified(StockrequisitionItemPeer::QNT)) {
            $modifiedColumns[':p' . $index++]  = '`qnt`';
        }
        if ($this->isColumnModified(StockrequisitionItemPeer::SATISFIEDQNT)) {
            $modifiedColumns[':p' . $index++]  = '`satisfiedQnt`';
        }

        $sql = sprintf(
            'INSERT INTO `StockRequisition_Item` (%s) VALUES (%s)',
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
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`nomenclature_id`':
                        $stmt->bindValue($identifier, $this->nomenclature_id, PDO::PARAM_INT);
                        break;
                    case '`finance_id`':
                        $stmt->bindValue($identifier, $this->finance_id, PDO::PARAM_INT);
                        break;
                    case '`qnt`':
                        $stmt->bindValue($identifier, $this->qnt, PDO::PARAM_STR);
                        break;
                    case '`satisfiedQnt`':
                        $stmt->bindValue($identifier, $this->satisfiedqnt, PDO::PARAM_STR);
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

            if ($this->aRbfinance !== null) {
                if (!$this->aRbfinance->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbfinance->getValidationFailures());
                }
            }

            if ($this->aStockrequisition !== null) {
                if (!$this->aStockrequisition->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStockrequisition->getValidationFailures());
                }
            }

            if ($this->aRbnomenclature !== null) {
                if (!$this->aRbnomenclature->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbnomenclature->getValidationFailures());
                }
            }


            if (($retval = StockrequisitionItemPeer::doValidate($this, $columns)) !== true) {
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
        $pos = StockrequisitionItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMasterId();
                break;
            case 2:
                return $this->getIdx();
                break;
            case 3:
                return $this->getNomenclatureId();
                break;
            case 4:
                return $this->getFinanceId();
                break;
            case 5:
                return $this->getQnt();
                break;
            case 6:
                return $this->getSatisfiedqnt();
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
        if (isset($alreadyDumpedObjects['StockrequisitionItem'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['StockrequisitionItem'][$this->getPrimaryKey()] = true;
        $keys = StockrequisitionItemPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMasterId(),
            $keys[2] => $this->getIdx(),
            $keys[3] => $this->getNomenclatureId(),
            $keys[4] => $this->getFinanceId(),
            $keys[5] => $this->getQnt(),
            $keys[6] => $this->getSatisfiedqnt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbfinance) {
                $result['Rbfinance'] = $this->aRbfinance->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStockrequisition) {
                $result['Stockrequisition'] = $this->aStockrequisition->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbnomenclature) {
                $result['Rbnomenclature'] = $this->aRbnomenclature->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = StockrequisitionItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMasterId($value);
                break;
            case 2:
                $this->setIdx($value);
                break;
            case 3:
                $this->setNomenclatureId($value);
                break;
            case 4:
                $this->setFinanceId($value);
                break;
            case 5:
                $this->setQnt($value);
                break;
            case 6:
                $this->setSatisfiedqnt($value);
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
        $keys = StockrequisitionItemPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMasterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdx($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNomenclatureId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFinanceId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setQnt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSatisfiedqnt($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);

        if ($this->isColumnModified(StockrequisitionItemPeer::ID)) $criteria->add(StockrequisitionItemPeer::ID, $this->id);
        if ($this->isColumnModified(StockrequisitionItemPeer::MASTER_ID)) $criteria->add(StockrequisitionItemPeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(StockrequisitionItemPeer::IDX)) $criteria->add(StockrequisitionItemPeer::IDX, $this->idx);
        if ($this->isColumnModified(StockrequisitionItemPeer::NOMENCLATURE_ID)) $criteria->add(StockrequisitionItemPeer::NOMENCLATURE_ID, $this->nomenclature_id);
        if ($this->isColumnModified(StockrequisitionItemPeer::FINANCE_ID)) $criteria->add(StockrequisitionItemPeer::FINANCE_ID, $this->finance_id);
        if ($this->isColumnModified(StockrequisitionItemPeer::QNT)) $criteria->add(StockrequisitionItemPeer::QNT, $this->qnt);
        if ($this->isColumnModified(StockrequisitionItemPeer::SATISFIEDQNT)) $criteria->add(StockrequisitionItemPeer::SATISFIEDQNT, $this->satisfiedqnt);

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
        $criteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);
        $criteria->add(StockrequisitionItemPeer::ID, $this->id);

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
     * @param object $copyObj An object of StockrequisitionItem (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setIdx($this->getIdx());
        $copyObj->setNomenclatureId($this->getNomenclatureId());
        $copyObj->setFinanceId($this->getFinanceId());
        $copyObj->setQnt($this->getQnt());
        $copyObj->setSatisfiedqnt($this->getSatisfiedqnt());

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
     * @return StockrequisitionItem Clone of current object.
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
     * @return StockrequisitionItemPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new StockrequisitionItemPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbfinance object.
     *
     * @param             Rbfinance $v
     * @return StockrequisitionItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbfinance(Rbfinance $v = null)
    {
        if ($v === null) {
            $this->setFinanceId(NULL);
        } else {
            $this->setFinanceId($v->getId());
        }

        $this->aRbfinance = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbfinance object, it will not be re-added.
        if ($v !== null) {
            $v->addStockrequisitionItem($this);
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
    public function getRbfinance(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbfinance === null && ($this->finance_id !== null) && $doQuery) {
            $this->aRbfinance = RbfinanceQuery::create()->findPk($this->finance_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbfinance->addStockrequisitionItems($this);
             */
        }

        return $this->aRbfinance;
    }

    /**
     * Declares an association between this object and a Stockrequisition object.
     *
     * @param             Stockrequisition $v
     * @return StockrequisitionItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStockrequisition(Stockrequisition $v = null)
    {
        if ($v === null) {
            $this->setMasterId(NULL);
        } else {
            $this->setMasterId($v->getId());
        }

        $this->aStockrequisition = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Stockrequisition object, it will not be re-added.
        if ($v !== null) {
            $v->addStockrequisitionItem($this);
        }


        return $this;
    }


    /**
     * Get the associated Stockrequisition object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Stockrequisition The associated Stockrequisition object.
     * @throws PropelException
     */
    public function getStockrequisition(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStockrequisition === null && ($this->master_id !== null) && $doQuery) {
            $this->aStockrequisition = StockrequisitionQuery::create()->findPk($this->master_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStockrequisition->addStockrequisitionItems($this);
             */
        }

        return $this->aStockrequisition;
    }

    /**
     * Declares an association between this object and a Rbnomenclature object.
     *
     * @param             Rbnomenclature $v
     * @return StockrequisitionItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbnomenclature(Rbnomenclature $v = null)
    {
        if ($v === null) {
            $this->setNomenclatureId(NULL);
        } else {
            $this->setNomenclatureId($v->getId());
        }

        $this->aRbnomenclature = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbnomenclature object, it will not be re-added.
        if ($v !== null) {
            $v->addStockrequisitionItem($this);
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
    public function getRbnomenclature(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbnomenclature === null && ($this->nomenclature_id !== null) && $doQuery) {
            $this->aRbnomenclature = RbnomenclatureQuery::create()->findPk($this->nomenclature_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbnomenclature->addStockrequisitionItems($this);
             */
        }

        return $this->aRbnomenclature;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->master_id = null;
        $this->idx = null;
        $this->nomenclature_id = null;
        $this->finance_id = null;
        $this->qnt = null;
        $this->satisfiedqnt = null;
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
            if ($this->aRbfinance instanceof Persistent) {
              $this->aRbfinance->clearAllReferences($deep);
            }
            if ($this->aStockrequisition instanceof Persistent) {
              $this->aStockrequisition->clearAllReferences($deep);
            }
            if ($this->aRbnomenclature instanceof Persistent) {
              $this->aRbnomenclature->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbfinance = null;
        $this->aStockrequisition = null;
        $this->aRbnomenclature = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StockrequisitionItemPeer::DEFAULT_STRING_FORMAT);
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
