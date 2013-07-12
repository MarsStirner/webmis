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
use Webmis\Models\Fdfield;
use Webmis\Models\FdfieldPeer;
use Webmis\Models\FdfieldQuery;
use Webmis\Models\Fdfieldtype;
use Webmis\Models\FdfieldtypeQuery;
use Webmis\Models\Fdfieldvalue;
use Webmis\Models\FdfieldvalueQuery;
use Webmis\Models\Flatdirectory;
use Webmis\Models\FlatdirectoryQuery;

/**
 * Base class that represents a row from the 'FDField' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseFdfield extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\FdfieldPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        FdfieldPeer
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
     * The value for the fdfieldtype_id field.
     * @var        int
     */
    protected $fdfieldtype_id;

    /**
     * The value for the flatdirectory_id field.
     * @var        int
     */
    protected $flatdirectory_id;

    /**
     * The value for the flatdirectory_code field.
     * @var        string
     */
    protected $flatdirectory_code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the mask field.
     * @var        string
     */
    protected $mask;

    /**
     * The value for the mandatory field.
     * @var        boolean
     */
    protected $mandatory;

    /**
     * The value for the order field.
     * @var        int
     */
    protected $order;

    /**
     * @var        Fdfieldtype
     */
    protected $aFdfieldtype;

    /**
     * @var        Flatdirectory
     */
    protected $aFlatdirectoryRelatedByFlatdirectoryId;

    /**
     * @var        Flatdirectory
     */
    protected $aFlatdirectoryRelatedByFlatdirectoryCode;

    /**
     * @var        PropelObjectCollection|Fdfieldvalue[] Collection to store aggregation of Fdfieldvalue objects.
     */
    protected $collFdfieldvalues;
    protected $collFdfieldvaluesPartial;

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
    protected $fdfieldvaluesScheduledForDeletion = null;

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
     * Get the [fdfieldtype_id] column value.
     *
     * @return int
     */
    public function getFdfieldtypeId()
    {
        return $this->fdfieldtype_id;
    }

    /**
     * Get the [flatdirectory_id] column value.
     *
     * @return int
     */
    public function getFlatdirectoryId()
    {
        return $this->flatdirectory_id;
    }

    /**
     * Get the [flatdirectory_code] column value.
     *
     * @return string
     */
    public function getFlatdirectoryCode()
    {
        return $this->flatdirectory_code;
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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [mask] column value.
     *
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
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
     * Get the [order] column value.
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = FdfieldPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [fdfieldtype_id] column.
     *
     * @param int $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setFdfieldtypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fdfieldtype_id !== $v) {
            $this->fdfieldtype_id = $v;
            $this->modifiedColumns[] = FdfieldPeer::FDFIELDTYPE_ID;
        }

        if ($this->aFdfieldtype !== null && $this->aFdfieldtype->getId() !== $v) {
            $this->aFdfieldtype = null;
        }


        return $this;
    } // setFdfieldtypeId()

    /**
     * Set the value of [flatdirectory_id] column.
     *
     * @param int $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setFlatdirectoryId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->flatdirectory_id !== $v) {
            $this->flatdirectory_id = $v;
            $this->modifiedColumns[] = FdfieldPeer::FLATDIRECTORY_ID;
        }

        if ($this->aFlatdirectoryRelatedByFlatdirectoryId !== null && $this->aFlatdirectoryRelatedByFlatdirectoryId->getId() !== $v) {
            $this->aFlatdirectoryRelatedByFlatdirectoryId = null;
        }


        return $this;
    } // setFlatdirectoryId()

    /**
     * Set the value of [flatdirectory_code] column.
     *
     * @param string $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setFlatdirectoryCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->flatdirectory_code !== $v) {
            $this->flatdirectory_code = $v;
            $this->modifiedColumns[] = FdfieldPeer::FLATDIRECTORY_CODE;
        }

        if ($this->aFlatdirectoryRelatedByFlatdirectoryCode !== null && $this->aFlatdirectoryRelatedByFlatdirectoryCode->getCode() !== $v) {
            $this->aFlatdirectoryRelatedByFlatdirectoryCode = null;
        }


        return $this;
    } // setFlatdirectoryCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = FdfieldPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = FdfieldPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [mask] column.
     *
     * @param string $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setMask($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mask !== $v) {
            $this->mask = $v;
            $this->modifiedColumns[] = FdfieldPeer::MASK;
        }


        return $this;
    } // setMask()

    /**
     * Sets the value of the [mandatory] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Fdfield The current object (for fluent API support)
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
            $this->modifiedColumns[] = FdfieldPeer::MANDATORY;
        }


        return $this;
    } // setMandatory()

    /**
     * Set the value of [order] column.
     *
     * @param int $v new value
     * @return Fdfield The current object (for fluent API support)
     */
    public function setOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->order !== $v) {
            $this->order = $v;
            $this->modifiedColumns[] = FdfieldPeer::ORDER;
        }


        return $this;
    } // setOrder()

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
            $this->fdfieldtype_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->flatdirectory_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->flatdirectory_code = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->description = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->mask = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->mandatory = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->order = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = FdfieldPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Fdfield object", $e);
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

        if ($this->aFdfieldtype !== null && $this->fdfieldtype_id !== $this->aFdfieldtype->getId()) {
            $this->aFdfieldtype = null;
        }
        if ($this->aFlatdirectoryRelatedByFlatdirectoryId !== null && $this->flatdirectory_id !== $this->aFlatdirectoryRelatedByFlatdirectoryId->getId()) {
            $this->aFlatdirectoryRelatedByFlatdirectoryId = null;
        }
        if ($this->aFlatdirectoryRelatedByFlatdirectoryCode !== null && $this->flatdirectory_code !== $this->aFlatdirectoryRelatedByFlatdirectoryCode->getCode()) {
            $this->aFlatdirectoryRelatedByFlatdirectoryCode = null;
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
            $con = Propel::getConnection(FdfieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = FdfieldPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aFdfieldtype = null;
            $this->aFlatdirectoryRelatedByFlatdirectoryId = null;
            $this->aFlatdirectoryRelatedByFlatdirectoryCode = null;
            $this->collFdfieldvalues = null;

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
            $con = Propel::getConnection(FdfieldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = FdfieldQuery::create()
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
            $con = Propel::getConnection(FdfieldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                FdfieldPeer::addInstanceToPool($this);
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

            if ($this->aFdfieldtype !== null) {
                if ($this->aFdfieldtype->isModified() || $this->aFdfieldtype->isNew()) {
                    $affectedRows += $this->aFdfieldtype->save($con);
                }
                $this->setFdfieldtype($this->aFdfieldtype);
            }

            if ($this->aFlatdirectoryRelatedByFlatdirectoryId !== null) {
                if ($this->aFlatdirectoryRelatedByFlatdirectoryId->isModified() || $this->aFlatdirectoryRelatedByFlatdirectoryId->isNew()) {
                    $affectedRows += $this->aFlatdirectoryRelatedByFlatdirectoryId->save($con);
                }
                $this->setFlatdirectoryRelatedByFlatdirectoryId($this->aFlatdirectoryRelatedByFlatdirectoryId);
            }

            if ($this->aFlatdirectoryRelatedByFlatdirectoryCode !== null) {
                if ($this->aFlatdirectoryRelatedByFlatdirectoryCode->isModified() || $this->aFlatdirectoryRelatedByFlatdirectoryCode->isNew()) {
                    $affectedRows += $this->aFlatdirectoryRelatedByFlatdirectoryCode->save($con);
                }
                $this->setFlatdirectoryRelatedByFlatdirectoryCode($this->aFlatdirectoryRelatedByFlatdirectoryCode);
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

            if ($this->fdfieldvaluesScheduledForDeletion !== null) {
                if (!$this->fdfieldvaluesScheduledForDeletion->isEmpty()) {
                    FdfieldvalueQuery::create()
                        ->filterByPrimaryKeys($this->fdfieldvaluesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->fdfieldvaluesScheduledForDeletion = null;
                }
            }

            if ($this->collFdfieldvalues !== null) {
                foreach ($this->collFdfieldvalues as $referrerFK) {
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

        $this->modifiedColumns[] = FdfieldPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FdfieldPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FdfieldPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(FdfieldPeer::FDFIELDTYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`fdFieldType_id`';
        }
        if ($this->isColumnModified(FdfieldPeer::FLATDIRECTORY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`flatDirectory_id`';
        }
        if ($this->isColumnModified(FdfieldPeer::FLATDIRECTORY_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`flatDirectory_code`';
        }
        if ($this->isColumnModified(FdfieldPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(FdfieldPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(FdfieldPeer::MASK)) {
            $modifiedColumns[':p' . $index++]  = '`mask`';
        }
        if ($this->isColumnModified(FdfieldPeer::MANDATORY)) {
            $modifiedColumns[':p' . $index++]  = '`mandatory`';
        }
        if ($this->isColumnModified(FdfieldPeer::ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`order`';
        }

        $sql = sprintf(
            'INSERT INTO `FDField` (%s) VALUES (%s)',
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
                    case '`fdFieldType_id`':
                        $stmt->bindValue($identifier, $this->fdfieldtype_id, PDO::PARAM_INT);
                        break;
                    case '`flatDirectory_id`':
                        $stmt->bindValue($identifier, $this->flatdirectory_id, PDO::PARAM_INT);
                        break;
                    case '`flatDirectory_code`':
                        $stmt->bindValue($identifier, $this->flatdirectory_code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`mask`':
                        $stmt->bindValue($identifier, $this->mask, PDO::PARAM_STR);
                        break;
                    case '`mandatory`':
                        $stmt->bindValue($identifier, (int) $this->mandatory, PDO::PARAM_INT);
                        break;
                    case '`order`':
                        $stmt->bindValue($identifier, $this->order, PDO::PARAM_INT);
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

            if ($this->aFdfieldtype !== null) {
                if (!$this->aFdfieldtype->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFdfieldtype->getValidationFailures());
                }
            }

            if ($this->aFlatdirectoryRelatedByFlatdirectoryId !== null) {
                if (!$this->aFlatdirectoryRelatedByFlatdirectoryId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFlatdirectoryRelatedByFlatdirectoryId->getValidationFailures());
                }
            }

            if ($this->aFlatdirectoryRelatedByFlatdirectoryCode !== null) {
                if (!$this->aFlatdirectoryRelatedByFlatdirectoryCode->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFlatdirectoryRelatedByFlatdirectoryCode->getValidationFailures());
                }
            }


            if (($retval = FdfieldPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collFdfieldvalues !== null) {
                    foreach ($this->collFdfieldvalues as $referrerFK) {
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
        $pos = FdfieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFdfieldtypeId();
                break;
            case 2:
                return $this->getFlatdirectoryId();
                break;
            case 3:
                return $this->getFlatdirectoryCode();
                break;
            case 4:
                return $this->getName();
                break;
            case 5:
                return $this->getDescription();
                break;
            case 6:
                return $this->getMask();
                break;
            case 7:
                return $this->getMandatory();
                break;
            case 8:
                return $this->getOrder();
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
        if (isset($alreadyDumpedObjects['Fdfield'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Fdfield'][$this->getPrimaryKey()] = true;
        $keys = FdfieldPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFdfieldtypeId(),
            $keys[2] => $this->getFlatdirectoryId(),
            $keys[3] => $this->getFlatdirectoryCode(),
            $keys[4] => $this->getName(),
            $keys[5] => $this->getDescription(),
            $keys[6] => $this->getMask(),
            $keys[7] => $this->getMandatory(),
            $keys[8] => $this->getOrder(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aFdfieldtype) {
                $result['Fdfieldtype'] = $this->aFdfieldtype->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFlatdirectoryRelatedByFlatdirectoryId) {
                $result['FlatdirectoryRelatedByFlatdirectoryId'] = $this->aFlatdirectoryRelatedByFlatdirectoryId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFlatdirectoryRelatedByFlatdirectoryCode) {
                $result['FlatdirectoryRelatedByFlatdirectoryCode'] = $this->aFlatdirectoryRelatedByFlatdirectoryCode->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collFdfieldvalues) {
                $result['Fdfieldvalues'] = $this->collFdfieldvalues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = FdfieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFdfieldtypeId($value);
                break;
            case 2:
                $this->setFlatdirectoryId($value);
                break;
            case 3:
                $this->setFlatdirectoryCode($value);
                break;
            case 4:
                $this->setName($value);
                break;
            case 5:
                $this->setDescription($value);
                break;
            case 6:
                $this->setMask($value);
                break;
            case 7:
                $this->setMandatory($value);
                break;
            case 8:
                $this->setOrder($value);
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
        $keys = FdfieldPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFdfieldtypeId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFlatdirectoryId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFlatdirectoryCode($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMask($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMandatory($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setOrder($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FdfieldPeer::DATABASE_NAME);

        if ($this->isColumnModified(FdfieldPeer::ID)) $criteria->add(FdfieldPeer::ID, $this->id);
        if ($this->isColumnModified(FdfieldPeer::FDFIELDTYPE_ID)) $criteria->add(FdfieldPeer::FDFIELDTYPE_ID, $this->fdfieldtype_id);
        if ($this->isColumnModified(FdfieldPeer::FLATDIRECTORY_ID)) $criteria->add(FdfieldPeer::FLATDIRECTORY_ID, $this->flatdirectory_id);
        if ($this->isColumnModified(FdfieldPeer::FLATDIRECTORY_CODE)) $criteria->add(FdfieldPeer::FLATDIRECTORY_CODE, $this->flatdirectory_code);
        if ($this->isColumnModified(FdfieldPeer::NAME)) $criteria->add(FdfieldPeer::NAME, $this->name);
        if ($this->isColumnModified(FdfieldPeer::DESCRIPTION)) $criteria->add(FdfieldPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(FdfieldPeer::MASK)) $criteria->add(FdfieldPeer::MASK, $this->mask);
        if ($this->isColumnModified(FdfieldPeer::MANDATORY)) $criteria->add(FdfieldPeer::MANDATORY, $this->mandatory);
        if ($this->isColumnModified(FdfieldPeer::ORDER)) $criteria->add(FdfieldPeer::ORDER, $this->order);

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
        $criteria = new Criteria(FdfieldPeer::DATABASE_NAME);
        $criteria->add(FdfieldPeer::ID, $this->id);

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
     * @param object $copyObj An object of Fdfield (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFdfieldtypeId($this->getFdfieldtypeId());
        $copyObj->setFlatdirectoryId($this->getFlatdirectoryId());
        $copyObj->setFlatdirectoryCode($this->getFlatdirectoryCode());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setMask($this->getMask());
        $copyObj->setMandatory($this->getMandatory());
        $copyObj->setOrder($this->getOrder());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getFdfieldvalues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFdfieldvalue($relObj->copy($deepCopy));
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
     * @return Fdfield Clone of current object.
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
     * @return FdfieldPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new FdfieldPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Fdfieldtype object.
     *
     * @param             Fdfieldtype $v
     * @return Fdfield The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFdfieldtype(Fdfieldtype $v = null)
    {
        if ($v === null) {
            $this->setFdfieldtypeId(NULL);
        } else {
            $this->setFdfieldtypeId($v->getId());
        }

        $this->aFdfieldtype = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Fdfieldtype object, it will not be re-added.
        if ($v !== null) {
            $v->addFdfield($this);
        }


        return $this;
    }


    /**
     * Get the associated Fdfieldtype object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Fdfieldtype The associated Fdfieldtype object.
     * @throws PropelException
     */
    public function getFdfieldtype(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFdfieldtype === null && ($this->fdfieldtype_id !== null) && $doQuery) {
            $this->aFdfieldtype = FdfieldtypeQuery::create()->findPk($this->fdfieldtype_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFdfieldtype->addFdfields($this);
             */
        }

        return $this->aFdfieldtype;
    }

    /**
     * Declares an association between this object and a Flatdirectory object.
     *
     * @param             Flatdirectory $v
     * @return Fdfield The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFlatdirectoryRelatedByFlatdirectoryId(Flatdirectory $v = null)
    {
        if ($v === null) {
            $this->setFlatdirectoryId(NULL);
        } else {
            $this->setFlatdirectoryId($v->getId());
        }

        $this->aFlatdirectoryRelatedByFlatdirectoryId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Flatdirectory object, it will not be re-added.
        if ($v !== null) {
            $v->addFdfieldRelatedByFlatdirectoryId($this);
        }


        return $this;
    }


    /**
     * Get the associated Flatdirectory object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Flatdirectory The associated Flatdirectory object.
     * @throws PropelException
     */
    public function getFlatdirectoryRelatedByFlatdirectoryId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFlatdirectoryRelatedByFlatdirectoryId === null && ($this->flatdirectory_id !== null) && $doQuery) {
            $this->aFlatdirectoryRelatedByFlatdirectoryId = FlatdirectoryQuery::create()->findPk($this->flatdirectory_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFlatdirectoryRelatedByFlatdirectoryId->addFdfieldsRelatedByFlatdirectoryId($this);
             */
        }

        return $this->aFlatdirectoryRelatedByFlatdirectoryId;
    }

    /**
     * Declares an association between this object and a Flatdirectory object.
     *
     * @param             Flatdirectory $v
     * @return Fdfield The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFlatdirectoryRelatedByFlatdirectoryCode(Flatdirectory $v = null)
    {
        if ($v === null) {
            $this->setFlatdirectoryCode(NULL);
        } else {
            $this->setFlatdirectoryCode($v->getCode());
        }

        $this->aFlatdirectoryRelatedByFlatdirectoryCode = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Flatdirectory object, it will not be re-added.
        if ($v !== null) {
            $v->addFdfieldRelatedByFlatdirectoryCode($this);
        }


        return $this;
    }


    /**
     * Get the associated Flatdirectory object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Flatdirectory The associated Flatdirectory object.
     * @throws PropelException
     */
    public function getFlatdirectoryRelatedByFlatdirectoryCode(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFlatdirectoryRelatedByFlatdirectoryCode === null && (($this->flatdirectory_code !== "" && $this->flatdirectory_code !== null)) && $doQuery) {
            $this->aFlatdirectoryRelatedByFlatdirectoryCode = FlatdirectoryQuery::create()
                ->filterByFdfieldRelatedByFlatdirectoryCode($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFlatdirectoryRelatedByFlatdirectoryCode->addFdfieldsRelatedByFlatdirectoryCode($this);
             */
        }

        return $this->aFlatdirectoryRelatedByFlatdirectoryCode;
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
        if ('Fdfieldvalue' == $relationName) {
            $this->initFdfieldvalues();
        }
    }

    /**
     * Clears out the collFdfieldvalues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Fdfield The current object (for fluent API support)
     * @see        addFdfieldvalues()
     */
    public function clearFdfieldvalues()
    {
        $this->collFdfieldvalues = null; // important to set this to null since that means it is uninitialized
        $this->collFdfieldvaluesPartial = null;

        return $this;
    }

    /**
     * reset is the collFdfieldvalues collection loaded partially
     *
     * @return void
     */
    public function resetPartialFdfieldvalues($v = true)
    {
        $this->collFdfieldvaluesPartial = $v;
    }

    /**
     * Initializes the collFdfieldvalues collection.
     *
     * By default this just sets the collFdfieldvalues collection to an empty array (like clearcollFdfieldvalues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFdfieldvalues($overrideExisting = true)
    {
        if (null !== $this->collFdfieldvalues && !$overrideExisting) {
            return;
        }
        $this->collFdfieldvalues = new PropelObjectCollection();
        $this->collFdfieldvalues->setModel('Fdfieldvalue');
    }

    /**
     * Gets an array of Fdfieldvalue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Fdfield is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Fdfieldvalue[] List of Fdfieldvalue objects
     * @throws PropelException
     */
    public function getFdfieldvalues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFdfieldvaluesPartial && !$this->isNew();
        if (null === $this->collFdfieldvalues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFdfieldvalues) {
                // return empty collection
                $this->initFdfieldvalues();
            } else {
                $collFdfieldvalues = FdfieldvalueQuery::create(null, $criteria)
                    ->filterByFdfield($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFdfieldvaluesPartial && count($collFdfieldvalues)) {
                      $this->initFdfieldvalues(false);

                      foreach($collFdfieldvalues as $obj) {
                        if (false == $this->collFdfieldvalues->contains($obj)) {
                          $this->collFdfieldvalues->append($obj);
                        }
                      }

                      $this->collFdfieldvaluesPartial = true;
                    }

                    $collFdfieldvalues->getInternalIterator()->rewind();
                    return $collFdfieldvalues;
                }

                if($partial && $this->collFdfieldvalues) {
                    foreach($this->collFdfieldvalues as $obj) {
                        if($obj->isNew()) {
                            $collFdfieldvalues[] = $obj;
                        }
                    }
                }

                $this->collFdfieldvalues = $collFdfieldvalues;
                $this->collFdfieldvaluesPartial = false;
            }
        }

        return $this->collFdfieldvalues;
    }

    /**
     * Sets a collection of Fdfieldvalue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $fdfieldvalues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Fdfield The current object (for fluent API support)
     */
    public function setFdfieldvalues(PropelCollection $fdfieldvalues, PropelPDO $con = null)
    {
        $fdfieldvaluesToDelete = $this->getFdfieldvalues(new Criteria(), $con)->diff($fdfieldvalues);

        $this->fdfieldvaluesScheduledForDeletion = unserialize(serialize($fdfieldvaluesToDelete));

        foreach ($fdfieldvaluesToDelete as $fdfieldvalueRemoved) {
            $fdfieldvalueRemoved->setFdfield(null);
        }

        $this->collFdfieldvalues = null;
        foreach ($fdfieldvalues as $fdfieldvalue) {
            $this->addFdfieldvalue($fdfieldvalue);
        }

        $this->collFdfieldvalues = $fdfieldvalues;
        $this->collFdfieldvaluesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fdfieldvalue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Fdfieldvalue objects.
     * @throws PropelException
     */
    public function countFdfieldvalues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFdfieldvaluesPartial && !$this->isNew();
        if (null === $this->collFdfieldvalues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFdfieldvalues) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFdfieldvalues());
            }
            $query = FdfieldvalueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFdfield($this)
                ->count($con);
        }

        return count($this->collFdfieldvalues);
    }

    /**
     * Method called to associate a Fdfieldvalue object to this object
     * through the Fdfieldvalue foreign key attribute.
     *
     * @param    Fdfieldvalue $l Fdfieldvalue
     * @return Fdfield The current object (for fluent API support)
     */
    public function addFdfieldvalue(Fdfieldvalue $l)
    {
        if ($this->collFdfieldvalues === null) {
            $this->initFdfieldvalues();
            $this->collFdfieldvaluesPartial = true;
        }
        if (!in_array($l, $this->collFdfieldvalues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFdfieldvalue($l);
        }

        return $this;
    }

    /**
     * @param	Fdfieldvalue $fdfieldvalue The fdfieldvalue object to add.
     */
    protected function doAddFdfieldvalue($fdfieldvalue)
    {
        $this->collFdfieldvalues[]= $fdfieldvalue;
        $fdfieldvalue->setFdfield($this);
    }

    /**
     * @param	Fdfieldvalue $fdfieldvalue The fdfieldvalue object to remove.
     * @return Fdfield The current object (for fluent API support)
     */
    public function removeFdfieldvalue($fdfieldvalue)
    {
        if ($this->getFdfieldvalues()->contains($fdfieldvalue)) {
            $this->collFdfieldvalues->remove($this->collFdfieldvalues->search($fdfieldvalue));
            if (null === $this->fdfieldvaluesScheduledForDeletion) {
                $this->fdfieldvaluesScheduledForDeletion = clone $this->collFdfieldvalues;
                $this->fdfieldvaluesScheduledForDeletion->clear();
            }
            $this->fdfieldvaluesScheduledForDeletion[]= clone $fdfieldvalue;
            $fdfieldvalue->setFdfield(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Fdfield is new, it will return
     * an empty collection; or if this Fdfield has previously
     * been saved, it will retrieve related Fdfieldvalues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Fdfield.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Fdfieldvalue[] List of Fdfieldvalue objects
     */
    public function getFdfieldvaluesJoinFdrecord($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FdfieldvalueQuery::create(null, $criteria);
        $query->joinWith('Fdrecord', $join_behavior);

        return $this->getFdfieldvalues($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->fdfieldtype_id = null;
        $this->flatdirectory_id = null;
        $this->flatdirectory_code = null;
        $this->name = null;
        $this->description = null;
        $this->mask = null;
        $this->mandatory = null;
        $this->order = null;
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
            if ($this->collFdfieldvalues) {
                foreach ($this->collFdfieldvalues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aFdfieldtype instanceof Persistent) {
              $this->aFdfieldtype->clearAllReferences($deep);
            }
            if ($this->aFlatdirectoryRelatedByFlatdirectoryId instanceof Persistent) {
              $this->aFlatdirectoryRelatedByFlatdirectoryId->clearAllReferences($deep);
            }
            if ($this->aFlatdirectoryRelatedByFlatdirectoryCode instanceof Persistent) {
              $this->aFlatdirectoryRelatedByFlatdirectoryCode->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collFdfieldvalues instanceof PropelCollection) {
            $this->collFdfieldvalues->clearIterator();
        }
        $this->collFdfieldvalues = null;
        $this->aFdfieldtype = null;
        $this->aFlatdirectoryRelatedByFlatdirectoryId = null;
        $this->aFlatdirectoryRelatedByFlatdirectoryCode = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(FdfieldPeer::DEFAULT_STRING_FORMAT);
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
