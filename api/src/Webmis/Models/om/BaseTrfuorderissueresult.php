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
use Webmis\Models\Rbbloodtype;
use Webmis\Models\RbbloodtypeQuery;
use Webmis\Models\Rbtrfubloodcomponenttype;
use Webmis\Models\RbtrfubloodcomponenttypeQuery;
use Webmis\Models\Trfuorderissueresult;
use Webmis\Models\TrfuorderissueresultPeer;
use Webmis\Models\TrfuorderissueresultQuery;

/**
 * Base class that represents a row from the 'trfuOrderIssueResult' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTrfuorderissueresult extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\TrfuorderissueresultPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TrfuorderissueresultPeer
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
     * The value for the trfu_blood_comp field.
     * @var        int
     */
    protected $trfu_blood_comp;

    /**
     * The value for the comp_number field.
     * @var        string
     */
    protected $comp_number;

    /**
     * The value for the comp_type_id field.
     * @var        int
     */
    protected $comp_type_id;

    /**
     * The value for the blood_type_id field.
     * @var        int
     */
    protected $blood_type_id;

    /**
     * The value for the volume field.
     * @var        int
     */
    protected $volume;

    /**
     * The value for the dose_count field.
     * @var        double
     */
    protected $dose_count;

    /**
     * The value for the trfu_donor_id field.
     * @var        int
     */
    protected $trfu_donor_id;

    /**
     * @var        Action
     */
    protected $aAction;

    /**
     * @var        Rbtrfubloodcomponenttype
     */
    protected $aRbtrfubloodcomponenttype;

    /**
     * @var        Rbbloodtype
     */
    protected $aRbbloodtype;

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
     * Get the [trfu_blood_comp] column value.
     *
     * @return int
     */
    public function getTrfuBloodComp()
    {
        return $this->trfu_blood_comp;
    }

    /**
     * Get the [comp_number] column value.
     *
     * @return string
     */
    public function getCompNumber()
    {
        return $this->comp_number;
    }

    /**
     * Get the [comp_type_id] column value.
     *
     * @return int
     */
    public function getCompTypeId()
    {
        return $this->comp_type_id;
    }

    /**
     * Get the [blood_type_id] column value.
     *
     * @return int
     */
    public function getBloodTypeId()
    {
        return $this->blood_type_id;
    }

    /**
     * Get the [volume] column value.
     *
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Get the [dose_count] column value.
     *
     * @return double
     */
    public function getDoseCount()
    {
        return $this->dose_count;
    }

    /**
     * Get the [trfu_donor_id] column value.
     *
     * @return int
     */
    public function getTrfuDonorId()
    {
        return $this->trfu_donor_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [action_id] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setActionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->action_id !== $v) {
            $this->action_id = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::ACTION_ID;
        }

        if ($this->aAction !== null && $this->aAction->getId() !== $v) {
            $this->aAction = null;
        }


        return $this;
    } // setActionId()

    /**
     * Set the value of [trfu_blood_comp] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setTrfuBloodComp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->trfu_blood_comp !== $v) {
            $this->trfu_blood_comp = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::TRFU_BLOOD_COMP;
        }


        return $this;
    } // setTrfuBloodComp()

    /**
     * Set the value of [comp_number] column.
     *
     * @param string $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setCompNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comp_number !== $v) {
            $this->comp_number = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::COMP_NUMBER;
        }


        return $this;
    } // setCompNumber()

    /**
     * Set the value of [comp_type_id] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setCompTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->comp_type_id !== $v) {
            $this->comp_type_id = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::COMP_TYPE_ID;
        }

        if ($this->aRbtrfubloodcomponenttype !== null && $this->aRbtrfubloodcomponenttype->getId() !== $v) {
            $this->aRbtrfubloodcomponenttype = null;
        }


        return $this;
    } // setCompTypeId()

    /**
     * Set the value of [blood_type_id] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setBloodTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->blood_type_id !== $v) {
            $this->blood_type_id = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::BLOOD_TYPE_ID;
        }

        if ($this->aRbbloodtype !== null && $this->aRbbloodtype->getId() !== $v) {
            $this->aRbbloodtype = null;
        }


        return $this;
    } // setBloodTypeId()

    /**
     * Set the value of [volume] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setVolume($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->volume !== $v) {
            $this->volume = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::VOLUME;
        }


        return $this;
    } // setVolume()

    /**
     * Set the value of [dose_count] column.
     *
     * @param double $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setDoseCount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->dose_count !== $v) {
            $this->dose_count = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::DOSE_COUNT;
        }


        return $this;
    } // setDoseCount()

    /**
     * Set the value of [trfu_donor_id] column.
     *
     * @param int $v new value
     * @return Trfuorderissueresult The current object (for fluent API support)
     */
    public function setTrfuDonorId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->trfu_donor_id !== $v) {
            $this->trfu_donor_id = $v;
            $this->modifiedColumns[] = TrfuorderissueresultPeer::TRFU_DONOR_ID;
        }


        return $this;
    } // setTrfuDonorId()

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
            $this->trfu_blood_comp = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->comp_number = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->comp_type_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->blood_type_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->volume = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->dose_count = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
            $this->trfu_donor_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Trfuorderissueresult object", $e);
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
        if ($this->aRbtrfubloodcomponenttype !== null && $this->comp_type_id !== $this->aRbtrfubloodcomponenttype->getId()) {
            $this->aRbtrfubloodcomponenttype = null;
        }
        if ($this->aRbbloodtype !== null && $this->blood_type_id !== $this->aRbbloodtype->getId()) {
            $this->aRbbloodtype = null;
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
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TrfuorderissueresultPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAction = null;
            $this->aRbtrfubloodcomponenttype = null;
            $this->aRbbloodtype = null;
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
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TrfuorderissueresultQuery::create()
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
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TrfuorderissueresultPeer::addInstanceToPool($this);
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

            if ($this->aRbtrfubloodcomponenttype !== null) {
                if ($this->aRbtrfubloodcomponenttype->isModified() || $this->aRbtrfubloodcomponenttype->isNew()) {
                    $affectedRows += $this->aRbtrfubloodcomponenttype->save($con);
                }
                $this->setRbtrfubloodcomponenttype($this->aRbtrfubloodcomponenttype);
            }

            if ($this->aRbbloodtype !== null) {
                if ($this->aRbbloodtype->isModified() || $this->aRbbloodtype->isNew()) {
                    $affectedRows += $this->aRbbloodtype->save($con);
                }
                $this->setRbbloodtype($this->aRbbloodtype);
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

        $this->modifiedColumns[] = TrfuorderissueresultPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TrfuorderissueresultPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TrfuorderissueresultPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::ACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`action_id`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::TRFU_BLOOD_COMP)) {
            $modifiedColumns[':p' . $index++]  = '`trfu_blood_comp`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::COMP_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`comp_number`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::COMP_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`comp_type_id`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::BLOOD_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`blood_type_id`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::VOLUME)) {
            $modifiedColumns[':p' . $index++]  = '`volume`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::DOSE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = '`dose_count`';
        }
        if ($this->isColumnModified(TrfuorderissueresultPeer::TRFU_DONOR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`trfu_donor_id`';
        }

        $sql = sprintf(
            'INSERT INTO `trfuOrderIssueResult` (%s) VALUES (%s)',
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
                    case '`trfu_blood_comp`':
                        $stmt->bindValue($identifier, $this->trfu_blood_comp, PDO::PARAM_INT);
                        break;
                    case '`comp_number`':
                        $stmt->bindValue($identifier, $this->comp_number, PDO::PARAM_STR);
                        break;
                    case '`comp_type_id`':
                        $stmt->bindValue($identifier, $this->comp_type_id, PDO::PARAM_INT);
                        break;
                    case '`blood_type_id`':
                        $stmt->bindValue($identifier, $this->blood_type_id, PDO::PARAM_INT);
                        break;
                    case '`volume`':
                        $stmt->bindValue($identifier, $this->volume, PDO::PARAM_INT);
                        break;
                    case '`dose_count`':
                        $stmt->bindValue($identifier, $this->dose_count, PDO::PARAM_STR);
                        break;
                    case '`trfu_donor_id`':
                        $stmt->bindValue($identifier, $this->trfu_donor_id, PDO::PARAM_INT);
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

            if ($this->aRbtrfubloodcomponenttype !== null) {
                if (!$this->aRbtrfubloodcomponenttype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtrfubloodcomponenttype->getValidationFailures());
                }
            }

            if ($this->aRbbloodtype !== null) {
                if (!$this->aRbbloodtype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbbloodtype->getValidationFailures());
                }
            }


            if (($retval = TrfuorderissueresultPeer::doValidate($this, $columns)) !== true) {
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
        $pos = TrfuorderissueresultPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTrfuBloodComp();
                break;
            case 3:
                return $this->getCompNumber();
                break;
            case 4:
                return $this->getCompTypeId();
                break;
            case 5:
                return $this->getBloodTypeId();
                break;
            case 6:
                return $this->getVolume();
                break;
            case 7:
                return $this->getDoseCount();
                break;
            case 8:
                return $this->getTrfuDonorId();
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
        if (isset($alreadyDumpedObjects['Trfuorderissueresult'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Trfuorderissueresult'][$this->getPrimaryKey()] = true;
        $keys = TrfuorderissueresultPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getActionId(),
            $keys[2] => $this->getTrfuBloodComp(),
            $keys[3] => $this->getCompNumber(),
            $keys[4] => $this->getCompTypeId(),
            $keys[5] => $this->getBloodTypeId(),
            $keys[6] => $this->getVolume(),
            $keys[7] => $this->getDoseCount(),
            $keys[8] => $this->getTrfuDonorId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAction) {
                $result['Action'] = $this->aAction->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtrfubloodcomponenttype) {
                $result['Rbtrfubloodcomponenttype'] = $this->aRbtrfubloodcomponenttype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbbloodtype) {
                $result['Rbbloodtype'] = $this->aRbbloodtype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = TrfuorderissueresultPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTrfuBloodComp($value);
                break;
            case 3:
                $this->setCompNumber($value);
                break;
            case 4:
                $this->setCompTypeId($value);
                break;
            case 5:
                $this->setBloodTypeId($value);
                break;
            case 6:
                $this->setVolume($value);
                break;
            case 7:
                $this->setDoseCount($value);
                break;
            case 8:
                $this->setTrfuDonorId($value);
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
        $keys = TrfuorderissueresultPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setActionId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTrfuBloodComp($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCompNumber($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCompTypeId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBloodTypeId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setVolume($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDoseCount($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTrfuDonorId($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($this->isColumnModified(TrfuorderissueresultPeer::ID)) $criteria->add(TrfuorderissueresultPeer::ID, $this->id);
        if ($this->isColumnModified(TrfuorderissueresultPeer::ACTION_ID)) $criteria->add(TrfuorderissueresultPeer::ACTION_ID, $this->action_id);
        if ($this->isColumnModified(TrfuorderissueresultPeer::TRFU_BLOOD_COMP)) $criteria->add(TrfuorderissueresultPeer::TRFU_BLOOD_COMP, $this->trfu_blood_comp);
        if ($this->isColumnModified(TrfuorderissueresultPeer::COMP_NUMBER)) $criteria->add(TrfuorderissueresultPeer::COMP_NUMBER, $this->comp_number);
        if ($this->isColumnModified(TrfuorderissueresultPeer::COMP_TYPE_ID)) $criteria->add(TrfuorderissueresultPeer::COMP_TYPE_ID, $this->comp_type_id);
        if ($this->isColumnModified(TrfuorderissueresultPeer::BLOOD_TYPE_ID)) $criteria->add(TrfuorderissueresultPeer::BLOOD_TYPE_ID, $this->blood_type_id);
        if ($this->isColumnModified(TrfuorderissueresultPeer::VOLUME)) $criteria->add(TrfuorderissueresultPeer::VOLUME, $this->volume);
        if ($this->isColumnModified(TrfuorderissueresultPeer::DOSE_COUNT)) $criteria->add(TrfuorderissueresultPeer::DOSE_COUNT, $this->dose_count);
        if ($this->isColumnModified(TrfuorderissueresultPeer::TRFU_DONOR_ID)) $criteria->add(TrfuorderissueresultPeer::TRFU_DONOR_ID, $this->trfu_donor_id);

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
        $criteria = new Criteria(TrfuorderissueresultPeer::DATABASE_NAME);
        $criteria->add(TrfuorderissueresultPeer::ID, $this->id);

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
     * @param object $copyObj An object of Trfuorderissueresult (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setActionId($this->getActionId());
        $copyObj->setTrfuBloodComp($this->getTrfuBloodComp());
        $copyObj->setCompNumber($this->getCompNumber());
        $copyObj->setCompTypeId($this->getCompTypeId());
        $copyObj->setBloodTypeId($this->getBloodTypeId());
        $copyObj->setVolume($this->getVolume());
        $copyObj->setDoseCount($this->getDoseCount());
        $copyObj->setTrfuDonorId($this->getTrfuDonorId());

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
     * @return Trfuorderissueresult Clone of current object.
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
     * @return TrfuorderissueresultPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TrfuorderissueresultPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Action object.
     *
     * @param             Action $v
     * @return Trfuorderissueresult The current object (for fluent API support)
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
            $v->addTrfuorderissueresult($this);
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
                $this->aAction->addTrfuorderissueresults($this);
             */
        }

        return $this->aAction;
    }

    /**
     * Declares an association between this object and a Rbtrfubloodcomponenttype object.
     *
     * @param             Rbtrfubloodcomponenttype $v
     * @return Trfuorderissueresult The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbtrfubloodcomponenttype(Rbtrfubloodcomponenttype $v = null)
    {
        if ($v === null) {
            $this->setCompTypeId(NULL);
        } else {
            $this->setCompTypeId($v->getId());
        }

        $this->aRbtrfubloodcomponenttype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbtrfubloodcomponenttype object, it will not be re-added.
        if ($v !== null) {
            $v->addTrfuorderissueresult($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbtrfubloodcomponenttype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbtrfubloodcomponenttype The associated Rbtrfubloodcomponenttype object.
     * @throws PropelException
     */
    public function getRbtrfubloodcomponenttype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbtrfubloodcomponenttype === null && ($this->comp_type_id !== null) && $doQuery) {
            $this->aRbtrfubloodcomponenttype = RbtrfubloodcomponenttypeQuery::create()->findPk($this->comp_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbtrfubloodcomponenttype->addTrfuorderissueresults($this);
             */
        }

        return $this->aRbtrfubloodcomponenttype;
    }

    /**
     * Declares an association between this object and a Rbbloodtype object.
     *
     * @param             Rbbloodtype $v
     * @return Trfuorderissueresult The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbbloodtype(Rbbloodtype $v = null)
    {
        if ($v === null) {
            $this->setBloodTypeId(NULL);
        } else {
            $this->setBloodTypeId($v->getId());
        }

        $this->aRbbloodtype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbbloodtype object, it will not be re-added.
        if ($v !== null) {
            $v->addTrfuorderissueresult($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbbloodtype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbbloodtype The associated Rbbloodtype object.
     * @throws PropelException
     */
    public function getRbbloodtype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbbloodtype === null && ($this->blood_type_id !== null) && $doQuery) {
            $this->aRbbloodtype = RbbloodtypeQuery::create()->findPk($this->blood_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbbloodtype->addTrfuorderissueresults($this);
             */
        }

        return $this->aRbbloodtype;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->action_id = null;
        $this->trfu_blood_comp = null;
        $this->comp_number = null;
        $this->comp_type_id = null;
        $this->blood_type_id = null;
        $this->volume = null;
        $this->dose_count = null;
        $this->trfu_donor_id = null;
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
            if ($this->aRbtrfubloodcomponenttype instanceof Persistent) {
              $this->aRbtrfubloodcomponenttype->clearAllReferences($deep);
            }
            if ($this->aRbbloodtype instanceof Persistent) {
              $this->aRbbloodtype->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aAction = null;
        $this->aRbtrfubloodcomponenttype = null;
        $this->aRbbloodtype = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TrfuorderissueresultPeer::DEFAULT_STRING_FORMAT);
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
