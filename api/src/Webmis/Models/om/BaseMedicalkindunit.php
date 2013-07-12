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
use Webmis\Models\Eventtype;
use Webmis\Models\EventtypeQuery;
use Webmis\Models\Medicalkindunit;
use Webmis\Models\MedicalkindunitPeer;
use Webmis\Models\MedicalkindunitQuery;
use Webmis\Models\Rbmedicalaidunit;
use Webmis\Models\RbmedicalaidunitQuery;
use Webmis\Models\Rbmedicalkind;
use Webmis\Models\RbmedicalkindQuery;
use Webmis\Models\Rbpaytype;
use Webmis\Models\RbpaytypeQuery;
use Webmis\Models\Rbtarifftype;
use Webmis\Models\RbtarifftypeQuery;

/**
 * Base class that represents a row from the 'MedicalKindUnit' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseMedicalkindunit extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\MedicalkindunitPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MedicalkindunitPeer
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
     * The value for the rbmedicalkind_id field.
     * @var        int
     */
    protected $rbmedicalkind_id;

    /**
     * The value for the eventtype_id field.
     * @var        int
     */
    protected $eventtype_id;

    /**
     * The value for the rbmedicalaidunit_id field.
     * @var        int
     */
    protected $rbmedicalaidunit_id;

    /**
     * The value for the rbpaytype_id field.
     * @var        int
     */
    protected $rbpaytype_id;

    /**
     * The value for the rbtarifftype_id field.
     * @var        int
     */
    protected $rbtarifftype_id;

    /**
     * @var        Rbmedicalkind
     */
    protected $aRbmedicalkind;

    /**
     * @var        Eventtype
     */
    protected $aEventtype;

    /**
     * @var        Rbmedicalaidunit
     */
    protected $aRbmedicalaidunit;

    /**
     * @var        Rbpaytype
     */
    protected $aRbpaytype;

    /**
     * @var        Rbtarifftype
     */
    protected $aRbtarifftype;

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
     * Get the [rbmedicalkind_id] column value.
     *
     * @return int
     */
    public function getRbmedicalkindId()
    {
        return $this->rbmedicalkind_id;
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
     * Get the [rbmedicalaidunit_id] column value.
     *
     * @return int
     */
    public function getRbmedicalaidunitId()
    {
        return $this->rbmedicalaidunit_id;
    }

    /**
     * Get the [rbpaytype_id] column value.
     *
     * @return int
     */
    public function getRbpaytypeId()
    {
        return $this->rbpaytype_id;
    }

    /**
     * Get the [rbtarifftype_id] column value.
     *
     * @return int
     */
    public function getRbtarifftypeId()
    {
        return $this->rbtarifftype_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Medicalkindunit The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = MedicalkindunitPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [rbmedicalkind_id] column.
     *
     * @param int $v new value
     * @return Medicalkindunit The current object (for fluent API support)
     */
    public function setRbmedicalkindId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbmedicalkind_id !== $v) {
            $this->rbmedicalkind_id = $v;
            $this->modifiedColumns[] = MedicalkindunitPeer::RBMEDICALKIND_ID;
        }

        if ($this->aRbmedicalkind !== null && $this->aRbmedicalkind->getId() !== $v) {
            $this->aRbmedicalkind = null;
        }


        return $this;
    } // setRbmedicalkindId()

    /**
     * Set the value of [eventtype_id] column.
     *
     * @param int $v new value
     * @return Medicalkindunit The current object (for fluent API support)
     */
    public function setEventtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->eventtype_id !== $v) {
            $this->eventtype_id = $v;
            $this->modifiedColumns[] = MedicalkindunitPeer::EVENTTYPE_ID;
        }

        if ($this->aEventtype !== null && $this->aEventtype->getId() !== $v) {
            $this->aEventtype = null;
        }


        return $this;
    } // setEventtypeId()

    /**
     * Set the value of [rbmedicalaidunit_id] column.
     *
     * @param int $v new value
     * @return Medicalkindunit The current object (for fluent API support)
     */
    public function setRbmedicalaidunitId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbmedicalaidunit_id !== $v) {
            $this->rbmedicalaidunit_id = $v;
            $this->modifiedColumns[] = MedicalkindunitPeer::RBMEDICALAIDUNIT_ID;
        }

        if ($this->aRbmedicalaidunit !== null && $this->aRbmedicalaidunit->getId() !== $v) {
            $this->aRbmedicalaidunit = null;
        }


        return $this;
    } // setRbmedicalaidunitId()

    /**
     * Set the value of [rbpaytype_id] column.
     *
     * @param int $v new value
     * @return Medicalkindunit The current object (for fluent API support)
     */
    public function setRbpaytypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbpaytype_id !== $v) {
            $this->rbpaytype_id = $v;
            $this->modifiedColumns[] = MedicalkindunitPeer::RBPAYTYPE_ID;
        }

        if ($this->aRbpaytype !== null && $this->aRbpaytype->getId() !== $v) {
            $this->aRbpaytype = null;
        }


        return $this;
    } // setRbpaytypeId()

    /**
     * Set the value of [rbtarifftype_id] column.
     *
     * @param int $v new value
     * @return Medicalkindunit The current object (for fluent API support)
     */
    public function setRbtarifftypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rbtarifftype_id !== $v) {
            $this->rbtarifftype_id = $v;
            $this->modifiedColumns[] = MedicalkindunitPeer::RBTARIFFTYPE_ID;
        }

        if ($this->aRbtarifftype !== null && $this->aRbtarifftype->getId() !== $v) {
            $this->aRbtarifftype = null;
        }


        return $this;
    } // setRbtarifftypeId()

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
            $this->rbmedicalkind_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->eventtype_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->rbmedicalaidunit_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->rbpaytype_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->rbtarifftype_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Medicalkindunit object", $e);
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

        if ($this->aRbmedicalkind !== null && $this->rbmedicalkind_id !== $this->aRbmedicalkind->getId()) {
            $this->aRbmedicalkind = null;
        }
        if ($this->aEventtype !== null && $this->eventtype_id !== $this->aEventtype->getId()) {
            $this->aEventtype = null;
        }
        if ($this->aRbmedicalaidunit !== null && $this->rbmedicalaidunit_id !== $this->aRbmedicalaidunit->getId()) {
            $this->aRbmedicalaidunit = null;
        }
        if ($this->aRbpaytype !== null && $this->rbpaytype_id !== $this->aRbpaytype->getId()) {
            $this->aRbpaytype = null;
        }
        if ($this->aRbtarifftype !== null && $this->rbtarifftype_id !== $this->aRbtarifftype->getId()) {
            $this->aRbtarifftype = null;
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
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MedicalkindunitPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbmedicalkind = null;
            $this->aEventtype = null;
            $this->aRbmedicalaidunit = null;
            $this->aRbpaytype = null;
            $this->aRbtarifftype = null;
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
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MedicalkindunitQuery::create()
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
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MedicalkindunitPeer::addInstanceToPool($this);
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

            if ($this->aRbmedicalkind !== null) {
                if ($this->aRbmedicalkind->isModified() || $this->aRbmedicalkind->isNew()) {
                    $affectedRows += $this->aRbmedicalkind->save($con);
                }
                $this->setRbmedicalkind($this->aRbmedicalkind);
            }

            if ($this->aEventtype !== null) {
                if ($this->aEventtype->isModified() || $this->aEventtype->isNew()) {
                    $affectedRows += $this->aEventtype->save($con);
                }
                $this->setEventtype($this->aEventtype);
            }

            if ($this->aRbmedicalaidunit !== null) {
                if ($this->aRbmedicalaidunit->isModified() || $this->aRbmedicalaidunit->isNew()) {
                    $affectedRows += $this->aRbmedicalaidunit->save($con);
                }
                $this->setRbmedicalaidunit($this->aRbmedicalaidunit);
            }

            if ($this->aRbpaytype !== null) {
                if ($this->aRbpaytype->isModified() || $this->aRbpaytype->isNew()) {
                    $affectedRows += $this->aRbpaytype->save($con);
                }
                $this->setRbpaytype($this->aRbpaytype);
            }

            if ($this->aRbtarifftype !== null) {
                if ($this->aRbtarifftype->isModified() || $this->aRbtarifftype->isNew()) {
                    $affectedRows += $this->aRbtarifftype->save($con);
                }
                $this->setRbtarifftype($this->aRbtarifftype);
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

        $this->modifiedColumns[] = MedicalkindunitPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MedicalkindunitPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MedicalkindunitPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MedicalkindunitPeer::RBMEDICALKIND_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbMedicalKind_id`';
        }
        if ($this->isColumnModified(MedicalkindunitPeer::EVENTTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`eventType_id`';
        }
        if ($this->isColumnModified(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbMedicalAidUnit_id`';
        }
        if ($this->isColumnModified(MedicalkindunitPeer::RBPAYTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbPayType_id`';
        }
        if ($this->isColumnModified(MedicalkindunitPeer::RBTARIFFTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`rbTariffType_id`';
        }

        $sql = sprintf(
            'INSERT INTO `MedicalKindUnit` (%s) VALUES (%s)',
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
                    case '`rbMedicalKind_id`':
                        $stmt->bindValue($identifier, $this->rbmedicalkind_id, PDO::PARAM_INT);
                        break;
                    case '`eventType_id`':
                        $stmt->bindValue($identifier, $this->eventtype_id, PDO::PARAM_INT);
                        break;
                    case '`rbMedicalAidUnit_id`':
                        $stmt->bindValue($identifier, $this->rbmedicalaidunit_id, PDO::PARAM_INT);
                        break;
                    case '`rbPayType_id`':
                        $stmt->bindValue($identifier, $this->rbpaytype_id, PDO::PARAM_INT);
                        break;
                    case '`rbTariffType_id`':
                        $stmt->bindValue($identifier, $this->rbtarifftype_id, PDO::PARAM_INT);
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

            if ($this->aRbmedicalkind !== null) {
                if (!$this->aRbmedicalkind->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbmedicalkind->getValidationFailures());
                }
            }

            if ($this->aEventtype !== null) {
                if (!$this->aEventtype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEventtype->getValidationFailures());
                }
            }

            if ($this->aRbmedicalaidunit !== null) {
                if (!$this->aRbmedicalaidunit->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbmedicalaidunit->getValidationFailures());
                }
            }

            if ($this->aRbpaytype !== null) {
                if (!$this->aRbpaytype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbpaytype->getValidationFailures());
                }
            }

            if ($this->aRbtarifftype !== null) {
                if (!$this->aRbtarifftype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbtarifftype->getValidationFailures());
                }
            }


            if (($retval = MedicalkindunitPeer::doValidate($this, $columns)) !== true) {
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
        $pos = MedicalkindunitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRbmedicalkindId();
                break;
            case 2:
                return $this->getEventtypeId();
                break;
            case 3:
                return $this->getRbmedicalaidunitId();
                break;
            case 4:
                return $this->getRbpaytypeId();
                break;
            case 5:
                return $this->getRbtarifftypeId();
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
        if (isset($alreadyDumpedObjects['Medicalkindunit'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Medicalkindunit'][$this->getPrimaryKey()] = true;
        $keys = MedicalkindunitPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getRbmedicalkindId(),
            $keys[2] => $this->getEventtypeId(),
            $keys[3] => $this->getRbmedicalaidunitId(),
            $keys[4] => $this->getRbpaytypeId(),
            $keys[5] => $this->getRbtarifftypeId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbmedicalkind) {
                $result['Rbmedicalkind'] = $this->aRbmedicalkind->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEventtype) {
                $result['Eventtype'] = $this->aEventtype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbmedicalaidunit) {
                $result['Rbmedicalaidunit'] = $this->aRbmedicalaidunit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbpaytype) {
                $result['Rbpaytype'] = $this->aRbpaytype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbtarifftype) {
                $result['Rbtarifftype'] = $this->aRbtarifftype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = MedicalkindunitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRbmedicalkindId($value);
                break;
            case 2:
                $this->setEventtypeId($value);
                break;
            case 3:
                $this->setRbmedicalaidunitId($value);
                break;
            case 4:
                $this->setRbpaytypeId($value);
                break;
            case 5:
                $this->setRbtarifftypeId($value);
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
        $keys = MedicalkindunitPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setRbmedicalkindId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setEventtypeId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRbmedicalaidunitId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRbpaytypeId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setRbtarifftypeId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MedicalkindunitPeer::DATABASE_NAME);

        if ($this->isColumnModified(MedicalkindunitPeer::ID)) $criteria->add(MedicalkindunitPeer::ID, $this->id);
        if ($this->isColumnModified(MedicalkindunitPeer::RBMEDICALKIND_ID)) $criteria->add(MedicalkindunitPeer::RBMEDICALKIND_ID, $this->rbmedicalkind_id);
        if ($this->isColumnModified(MedicalkindunitPeer::EVENTTYPE_ID)) $criteria->add(MedicalkindunitPeer::EVENTTYPE_ID, $this->eventtype_id);
        if ($this->isColumnModified(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID)) $criteria->add(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, $this->rbmedicalaidunit_id);
        if ($this->isColumnModified(MedicalkindunitPeer::RBPAYTYPE_ID)) $criteria->add(MedicalkindunitPeer::RBPAYTYPE_ID, $this->rbpaytype_id);
        if ($this->isColumnModified(MedicalkindunitPeer::RBTARIFFTYPE_ID)) $criteria->add(MedicalkindunitPeer::RBTARIFFTYPE_ID, $this->rbtarifftype_id);

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
        $criteria = new Criteria(MedicalkindunitPeer::DATABASE_NAME);
        $criteria->add(MedicalkindunitPeer::ID, $this->id);

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
     * @param object $copyObj An object of Medicalkindunit (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRbmedicalkindId($this->getRbmedicalkindId());
        $copyObj->setEventtypeId($this->getEventtypeId());
        $copyObj->setRbmedicalaidunitId($this->getRbmedicalaidunitId());
        $copyObj->setRbpaytypeId($this->getRbpaytypeId());
        $copyObj->setRbtarifftypeId($this->getRbtarifftypeId());

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
     * @return Medicalkindunit Clone of current object.
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
     * @return MedicalkindunitPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MedicalkindunitPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbmedicalkind object.
     *
     * @param             Rbmedicalkind $v
     * @return Medicalkindunit The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbmedicalkind(Rbmedicalkind $v = null)
    {
        if ($v === null) {
            $this->setRbmedicalkindId(NULL);
        } else {
            $this->setRbmedicalkindId($v->getId());
        }

        $this->aRbmedicalkind = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbmedicalkind object, it will not be re-added.
        if ($v !== null) {
            $v->addMedicalkindunit($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbmedicalkind object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbmedicalkind The associated Rbmedicalkind object.
     * @throws PropelException
     */
    public function getRbmedicalkind(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbmedicalkind === null && ($this->rbmedicalkind_id !== null) && $doQuery) {
            $this->aRbmedicalkind = RbmedicalkindQuery::create()->findPk($this->rbmedicalkind_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbmedicalkind->addMedicalkindunits($this);
             */
        }

        return $this->aRbmedicalkind;
    }

    /**
     * Declares an association between this object and a Eventtype object.
     *
     * @param             Eventtype $v
     * @return Medicalkindunit The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEventtype(Eventtype $v = null)
    {
        if ($v === null) {
            $this->setEventtypeId(NULL);
        } else {
            $this->setEventtypeId($v->getId());
        }

        $this->aEventtype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Eventtype object, it will not be re-added.
        if ($v !== null) {
            $v->addMedicalkindunit($this);
        }


        return $this;
    }


    /**
     * Get the associated Eventtype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Eventtype The associated Eventtype object.
     * @throws PropelException
     */
    public function getEventtype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aEventtype === null && ($this->eventtype_id !== null) && $doQuery) {
            $this->aEventtype = EventtypeQuery::create()->findPk($this->eventtype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEventtype->addMedicalkindunits($this);
             */
        }

        return $this->aEventtype;
    }

    /**
     * Declares an association between this object and a Rbmedicalaidunit object.
     *
     * @param             Rbmedicalaidunit $v
     * @return Medicalkindunit The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbmedicalaidunit(Rbmedicalaidunit $v = null)
    {
        if ($v === null) {
            $this->setRbmedicalaidunitId(NULL);
        } else {
            $this->setRbmedicalaidunitId($v->getId());
        }

        $this->aRbmedicalaidunit = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbmedicalaidunit object, it will not be re-added.
        if ($v !== null) {
            $v->addMedicalkindunit($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbmedicalaidunit object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbmedicalaidunit The associated Rbmedicalaidunit object.
     * @throws PropelException
     */
    public function getRbmedicalaidunit(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbmedicalaidunit === null && ($this->rbmedicalaidunit_id !== null) && $doQuery) {
            $this->aRbmedicalaidunit = RbmedicalaidunitQuery::create()->findPk($this->rbmedicalaidunit_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbmedicalaidunit->addMedicalkindunits($this);
             */
        }

        return $this->aRbmedicalaidunit;
    }

    /**
     * Declares an association between this object and a Rbpaytype object.
     *
     * @param             Rbpaytype $v
     * @return Medicalkindunit The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbpaytype(Rbpaytype $v = null)
    {
        if ($v === null) {
            $this->setRbpaytypeId(NULL);
        } else {
            $this->setRbpaytypeId($v->getId());
        }

        $this->aRbpaytype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbpaytype object, it will not be re-added.
        if ($v !== null) {
            $v->addMedicalkindunit($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbpaytype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbpaytype The associated Rbpaytype object.
     * @throws PropelException
     */
    public function getRbpaytype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbpaytype === null && ($this->rbpaytype_id !== null) && $doQuery) {
            $this->aRbpaytype = RbpaytypeQuery::create()->findPk($this->rbpaytype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbpaytype->addMedicalkindunits($this);
             */
        }

        return $this->aRbpaytype;
    }

    /**
     * Declares an association between this object and a Rbtarifftype object.
     *
     * @param             Rbtarifftype $v
     * @return Medicalkindunit The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbtarifftype(Rbtarifftype $v = null)
    {
        if ($v === null) {
            $this->setRbtarifftypeId(NULL);
        } else {
            $this->setRbtarifftypeId($v->getId());
        }

        $this->aRbtarifftype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbtarifftype object, it will not be re-added.
        if ($v !== null) {
            $v->addMedicalkindunit($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbtarifftype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbtarifftype The associated Rbtarifftype object.
     * @throws PropelException
     */
    public function getRbtarifftype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbtarifftype === null && ($this->rbtarifftype_id !== null) && $doQuery) {
            $this->aRbtarifftype = RbtarifftypeQuery::create()->findPk($this->rbtarifftype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbtarifftype->addMedicalkindunits($this);
             */
        }

        return $this->aRbtarifftype;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->rbmedicalkind_id = null;
        $this->eventtype_id = null;
        $this->rbmedicalaidunit_id = null;
        $this->rbpaytype_id = null;
        $this->rbtarifftype_id = null;
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
            if ($this->aRbmedicalkind instanceof Persistent) {
              $this->aRbmedicalkind->clearAllReferences($deep);
            }
            if ($this->aEventtype instanceof Persistent) {
              $this->aEventtype->clearAllReferences($deep);
            }
            if ($this->aRbmedicalaidunit instanceof Persistent) {
              $this->aRbmedicalaidunit->clearAllReferences($deep);
            }
            if ($this->aRbpaytype instanceof Persistent) {
              $this->aRbpaytype->clearAllReferences($deep);
            }
            if ($this->aRbtarifftype instanceof Persistent) {
              $this->aRbtarifftype->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbmedicalkind = null;
        $this->aEventtype = null;
        $this->aRbmedicalaidunit = null;
        $this->aRbpaytype = null;
        $this->aRbtarifftype = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MedicalkindunitPeer::DEFAULT_STRING_FORMAT);
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
