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
use Webmis\Models\Action;
use Webmis\Models\ActionQuery;
use Webmis\Models\Rbtrfulaboratorymeasuretypes;
use Webmis\Models\RbtrfulaboratorymeasuretypesQuery;
use Webmis\Models\Trfulaboratorymeasure;
use Webmis\Models\TrfulaboratorymeasurePeer;
use Webmis\Models\TrfulaboratorymeasureQuery;

/**
 * Base class that represents a row from the 'trfuLaboratoryMeasure' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTrfulaboratorymeasure extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\TrfulaboratorymeasurePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TrfulaboratorymeasurePeer
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
     * The value for the action_id field.
     * @var        int
     */
    protected $action_id;

    /**
     * The value for the trfu_lab_measure_id field.
     * @var        int
     */
    protected $trfu_lab_measure_id;

    /**
     * The value for the time field.
     * @var        double
     */
    protected $time;

    /**
     * The value for the beforeoperation field.
     * @var        string
     */
    protected $beforeoperation;

    /**
     * The value for the duringoperation field.
     * @var        string
     */
    protected $duringoperation;

    /**
     * The value for the inproduct field.
     * @var        string
     */
    protected $inproduct;

    /**
     * The value for the afteroperation field.
     * @var        string
     */
    protected $afteroperation;

    /**
     * @var        Action
     */
    protected $aAction;

    /**
     * @var        Rbtrfulaboratorymeasuretypes
     */
    protected $aRbtrfulaboratorymeasuretypes;

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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [action_id] column value.
     *
     * @return int
     */
    public function getActionId()
    {
        return $this->action_id;
    }

    /**
     * Get the [trfu_lab_measure_id] column value.
     *
     * @return int
     */
    public function getTrfuLabMeasureId()
    {
        return $this->trfu_lab_measure_id;
    }

    /**
     * Get the [time] column value.
     *
     * @return double
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [beforeoperation] column value.
     *
     * @return string
     */
    public function getBeforeoperation()
    {
        return $this->beforeoperation;
    }

    /**
     * Get the [duringoperation] column value.
     *
     * @return string
     */
    public function getDuringoperation()
    {
        return $this->duringoperation;
    }

    /**
     * Get the [inproduct] column value.
     *
     * @return string
     */
    public function getInproduct()
    {
        return $this->inproduct;
    }

    /**
     * Get the [afteroperation] column value.
     *
     * @return string
     */
    public function getAfteroperation()
    {
        return $this->afteroperation;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [action_id] column.
     *
     * @param int $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setActionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->action_id !== $v) {
            $this->action_id = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::ACTION_ID;
        }

        if ($this->aAction !== null && $this->aAction->getId() !== $v) {
            $this->aAction = null;
        }


        return $this;
    } // setActionId()

    /**
     * Set the value of [trfu_lab_measure_id] column.
     *
     * @param int $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setTrfuLabMeasureId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->trfu_lab_measure_id !== $v) {
            $this->trfu_lab_measure_id = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID;
        }

        if ($this->aRbtrfulaboratorymeasuretypes !== null && $this->aRbtrfulaboratorymeasuretypes->getId() !== $v) {
            $this->aRbtrfulaboratorymeasuretypes = null;
        }


        return $this;
    } // setTrfuLabMeasureId()

    /**
     * Set the value of [time] column.
     *
     * @param double $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::TIME;
        }


        return $this;
    } // setTime()

    /**
     * Set the value of [beforeoperation] column.
     *
     * @param string $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setBeforeoperation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->beforeoperation !== $v) {
            $this->beforeoperation = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::BEFOREOPERATION;
        }


        return $this;
    } // setBeforeoperation()

    /**
     * Set the value of [duringoperation] column.
     *
     * @param string $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setDuringoperation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->duringoperation !== $v) {
            $this->duringoperation = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::DURINGOPERATION;
        }


        return $this;
    } // setDuringoperation()

    /**
     * Set the value of [inproduct] column.
     *
     * @param string $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setInproduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->inproduct !== $v) {
            $this->inproduct = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::INPRODUCT;
        }


        return $this;
    } // setInproduct()

    /**
     * Set the value of [afteroperation] column.
     *
     * @param string $v new value
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     */
    public function setAfteroperation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->afteroperation !== $v) {
            $this->afteroperation = $v;
            $this->modifiedColumns[] = TrfulaboratorymeasurePeer::AFTEROPERATION;
        }


        return $this;
    } // setAfteroperation()

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
            $this->action_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->trfu_lab_measure_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->time = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
            $this->beforeoperation = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->duringoperation = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->inproduct = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->afteroperation = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Trfulaboratorymeasure object", $e);
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

        if ($this->aAction !== null && $this->action_id !== $this->aAction->getId()) {
            $this->aAction = null;
        }
        if ($this->aRbtrfulaboratorymeasuretypes !== null && $this->trfu_lab_measure_id !== $this->aRbtrfulaboratorymeasuretypes->getId()) {
            $this->aRbtrfulaboratorymeasuretypes = null;
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
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TrfulaboratorymeasurePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAction = null;
            $this->aRbtrfulaboratorymeasuretypes = null;
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
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TrfulaboratorymeasureQuery::create()
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
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TrfulaboratorymeasurePeer::addInstanceToPool($this);
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

            if ($this->aAction !== null) {
                if ($this->aAction->isModified() || $this->aAction->isNew()) {
                    $affectedRows += $this->aAction->save($con);
                }
                $this->setAction($this->aAction);
            }

            if ($this->aRbtrfulaboratorymeasuretypes !== null) {
                if ($this->aRbtrfulaboratorymeasuretypes->isModified() || $this->aRbtrfulaboratorymeasuretypes->isNew()) {
                    $affectedRows += $this->aRbtrfulaboratorymeasuretypes->save($con);
                }
                $this->setRbtrfulaboratorymeasuretypes($this->aRbtrfulaboratorymeasuretypes);
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

        $this->modifiedColumns[] = TrfulaboratorymeasurePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TrfulaboratorymeasurePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::ACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`action_id`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`trfu_lab_measure_id`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::TIME)) {
            $modifiedColumns[':p' . $index++]  = '`time`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::BEFOREOPERATION)) {
            $modifiedColumns[':p' . $index++]  = '`beforeOperation`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::DURINGOPERATION)) {
            $modifiedColumns[':p' . $index++]  = '`duringOperation`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::INPRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`inProduct`';
        }
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::AFTEROPERATION)) {
            $modifiedColumns[':p' . $index++]  = '`afterOperation`';
        }

        $sql = sprintf(
            'INSERT INTO `trfuLaboratoryMeasure` (%s) VALUES (%s)',
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
                    case '`action_id`':
                        $stmt->bindValue($identifier, $this->action_id, PDO::PARAM_INT);
                        break;
                    case '`trfu_lab_measure_id`':
                        $stmt->bindValue($identifier, $this->trfu_lab_measure_id, PDO::PARAM_INT);
                        break;
                    case '`time`':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_STR);
                        break;
                    case '`beforeOperation`':
                        $stmt->bindValue($identifier, $this->beforeoperation, PDO::PARAM_STR);
                        break;
                    case '`duringOperation`':
                        $stmt->bindValue($identifier, $this->duringoperation, PDO::PARAM_STR);
                        break;
                    case '`inProduct`':
                        $stmt->bindValue($identifier, $this->inproduct, PDO::PARAM_STR);
                        break;
                    case '`afterOperation`':
                        $stmt->bindValue($identifier, $this->afteroperation, PDO::PARAM_STR);
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

            if ($this->aAction !== null) {
                if (!$this->aAction->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAction->getValidationFailures());
                }
            }

            if ($this->aRbtrfulaboratorymeasuretypes !== null) {
                if (!$this->aRbtrfulaboratorymeasuretypes->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtrfulaboratorymeasuretypes->getValidationFailures());
                }
            }


            if (($retval = TrfulaboratorymeasurePeer::doValidate($this, $columns)) !== true) {
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
        $pos = TrfulaboratorymeasurePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getActionId();
                break;
            case 2:
                return $this->getTrfuLabMeasureId();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getBeforeoperation();
                break;
            case 5:
                return $this->getDuringoperation();
                break;
            case 6:
                return $this->getInproduct();
                break;
            case 7:
                return $this->getAfteroperation();
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
        if (isset($alreadyDumpedObjects['Trfulaboratorymeasure'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Trfulaboratorymeasure'][$this->getPrimaryKey()] = true;
        $keys = TrfulaboratorymeasurePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getActionId(),
            $keys[2] => $this->getTrfuLabMeasureId(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getBeforeoperation(),
            $keys[5] => $this->getDuringoperation(),
            $keys[6] => $this->getInproduct(),
            $keys[7] => $this->getAfteroperation(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAction) {
                $result['Action'] = $this->aAction->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtrfulaboratorymeasuretypes) {
                $result['Rbtrfulaboratorymeasuretypes'] = $this->aRbtrfulaboratorymeasuretypes->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = TrfulaboratorymeasurePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setActionId($value);
                break;
            case 2:
                $this->setTrfuLabMeasureId($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setBeforeoperation($value);
                break;
            case 5:
                $this->setDuringoperation($value);
                break;
            case 6:
                $this->setInproduct($value);
                break;
            case 7:
                $this->setAfteroperation($value);
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
        $keys = TrfulaboratorymeasurePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setActionId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTrfuLabMeasureId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTime($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBeforeoperation($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDuringoperation($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setInproduct($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAfteroperation($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($this->isColumnModified(TrfulaboratorymeasurePeer::ID)) $criteria->add(TrfulaboratorymeasurePeer::ID, $this->id);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::ACTION_ID)) $criteria->add(TrfulaboratorymeasurePeer::ACTION_ID, $this->action_id);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID)) $criteria->add(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, $this->trfu_lab_measure_id);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::TIME)) $criteria->add(TrfulaboratorymeasurePeer::TIME, $this->time);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::BEFOREOPERATION)) $criteria->add(TrfulaboratorymeasurePeer::BEFOREOPERATION, $this->beforeoperation);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::DURINGOPERATION)) $criteria->add(TrfulaboratorymeasurePeer::DURINGOPERATION, $this->duringoperation);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::INPRODUCT)) $criteria->add(TrfulaboratorymeasurePeer::INPRODUCT, $this->inproduct);
        if ($this->isColumnModified(TrfulaboratorymeasurePeer::AFTEROPERATION)) $criteria->add(TrfulaboratorymeasurePeer::AFTEROPERATION, $this->afteroperation);

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
        $criteria = new Criteria(TrfulaboratorymeasurePeer::DATABASE_NAME);
        $criteria->add(TrfulaboratorymeasurePeer::ID, $this->id);

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
     * @param object $copyObj An object of Trfulaboratorymeasure (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setActionId($this->getActionId());
        $copyObj->setTrfuLabMeasureId($this->getTrfuLabMeasureId());
        $copyObj->setTime($this->getTime());
        $copyObj->setBeforeoperation($this->getBeforeoperation());
        $copyObj->setDuringoperation($this->getDuringoperation());
        $copyObj->setInproduct($this->getInproduct());
        $copyObj->setAfteroperation($this->getAfteroperation());

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
     * @return Trfulaboratorymeasure Clone of current object.
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
     * @return TrfulaboratorymeasurePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TrfulaboratorymeasurePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Action object.
     *
     * @param             Action $v
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAction(Action $v = null)
    {
        if ($v === null) {
            $this->setActionId(NULL);
        } else {
            $this->setActionId($v->getId());
        }

        $this->aAction = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Action object, it will not be re-added.
        if ($v !== null) {
            $v->addTrfulaboratorymeasure($this);
        }


        return $this;
    }


    /**
     * Get the associated Action object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Action The associated Action object.
     * @throws PropelException
     */
    public function getAction(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAction === null && ($this->action_id !== null) && $doQuery) {
            $this->aAction = ActionQuery::create()->findPk($this->action_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAction->addTrfulaboratorymeasures($this);
             */
        }

        return $this->aAction;
    }

    /**
     * Declares an association between this object and a Rbtrfulaboratorymeasuretypes object.
     *
     * @param             Rbtrfulaboratorymeasuretypes $v
     * @return Trfulaboratorymeasure The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbtrfulaboratorymeasuretypes(Rbtrfulaboratorymeasuretypes $v = null)
    {
        if ($v === null) {
            $this->setTrfuLabMeasureId(NULL);
        } else {
            $this->setTrfuLabMeasureId($v->getId());
        }

        $this->aRbtrfulaboratorymeasuretypes = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbtrfulaboratorymeasuretypes object, it will not be re-added.
        if ($v !== null) {
            $v->addTrfulaboratorymeasure($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbtrfulaboratorymeasuretypes object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbtrfulaboratorymeasuretypes The associated Rbtrfulaboratorymeasuretypes object.
     * @throws PropelException
     */
    public function getRbtrfulaboratorymeasuretypes(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbtrfulaboratorymeasuretypes === null && ($this->trfu_lab_measure_id !== null) && $doQuery) {
            $this->aRbtrfulaboratorymeasuretypes = RbtrfulaboratorymeasuretypesQuery::create()->findPk($this->trfu_lab_measure_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbtrfulaboratorymeasuretypes->addTrfulaboratorymeasures($this);
             */
        }

        return $this->aRbtrfulaboratorymeasuretypes;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->action_id = null;
        $this->trfu_lab_measure_id = null;
        $this->time = null;
        $this->beforeoperation = null;
        $this->duringoperation = null;
        $this->inproduct = null;
        $this->afteroperation = null;
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
            if ($this->aAction instanceof Persistent) {
              $this->aAction->clearAllReferences($deep);
            }
            if ($this->aRbtrfulaboratorymeasuretypes instanceof Persistent) {
              $this->aRbtrfulaboratorymeasuretypes->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aAction = null;
        $this->aRbtrfulaboratorymeasuretypes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TrfulaboratorymeasurePeer::DEFAULT_STRING_FORMAT);
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
