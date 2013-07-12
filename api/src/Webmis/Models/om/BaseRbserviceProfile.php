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
use Webmis\Models\Rbmedicalaidprofile;
use Webmis\Models\RbmedicalaidprofileQuery;
use Webmis\Models\Rbservice;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceProfilePeer;
use Webmis\Models\RbserviceProfileQuery;
use Webmis\Models\RbserviceQuery;
use Webmis\Models\Rbspeciality;
use Webmis\Models\RbspecialityQuery;

/**
 * Base class that represents a row from the 'rbService_Profile' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbserviceProfile extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\RbserviceProfilePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RbserviceProfilePeer
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
     * The value for the idx field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idx;

    /**
     * The value for the master_id field.
     * @var        int
     */
    protected $master_id;

    /**
     * The value for the speciality_id field.
     * @var        int
     */
    protected $speciality_id;

    /**
     * The value for the sex field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $sex;

    /**
     * The value for the age field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $age;

    /**
     * The value for the age_bu field.
     * @var        int
     */
    protected $age_bu;

    /**
     * The value for the age_bc field.
     * @var        int
     */
    protected $age_bc;

    /**
     * The value for the age_eu field.
     * @var        int
     */
    protected $age_eu;

    /**
     * The value for the age_ec field.
     * @var        int
     */
    protected $age_ec;

    /**
     * The value for the mkbregexp field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mkbregexp;

    /**
     * The value for the medicalaidprofile_id field.
     * @var        int
     */
    protected $medicalaidprofile_id;

    /**
     * @var        Rbservice
     */
    protected $aRbservice;

    /**
     * @var        Rbmedicalaidprofile
     */
    protected $aRbmedicalaidprofile;

    /**
     * @var        Rbspeciality
     */
    protected $aRbspeciality;

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
        $this->sex = 0;
        $this->age = '';
        $this->mkbregexp = '';
    }

    /**
     * Initializes internal state of BaseRbserviceProfile object.
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
     * Get the [idx] column value.
     *
     * @return int
     */
    public function getIdx()
    {
        return $this->idx;
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
     * Get the [speciality_id] column value.
     *
     * @return int
     */
    public function getSpecialityId()
    {
        return $this->speciality_id;
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
     * Get the [age] column value.
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [age_bu] column value.
     *
     * @return int
     */
    public function getAgeBu()
    {
        return $this->age_bu;
    }

    /**
     * Get the [age_bc] column value.
     *
     * @return int
     */
    public function getAgeBc()
    {
        return $this->age_bc;
    }

    /**
     * Get the [age_eu] column value.
     *
     * @return int
     */
    public function getAgeEu()
    {
        return $this->age_eu;
    }

    /**
     * Get the [age_ec] column value.
     *
     * @return int
     */
    public function getAgeEc()
    {
        return $this->age_ec;
    }

    /**
     * Get the [mkbregexp] column value.
     *
     * @return string
     */
    public function getMkbregexp()
    {
        return $this->mkbregexp;
    }

    /**
     * Get the [medicalaidprofile_id] column value.
     *
     * @return int
     */
    public function getMedicalaidprofileId()
    {
        return $this->medicalaidprofile_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [idx] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setIdx($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idx !== $v) {
            $this->idx = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::IDX;
        }


        return $this;
    } // setIdx()

    /**
     * Set the value of [master_id] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setMasterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->master_id !== $v) {
            $this->master_id = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::MASTER_ID;
        }

        if ($this->aRbservice !== null && $this->aRbservice->getId() !== $v) {
            $this->aRbservice = null;
        }


        return $this;
    } // setMasterId()

    /**
     * Set the value of [speciality_id] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setSpecialityId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speciality_id !== $v) {
            $this->speciality_id = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::SPECIALITY_ID;
        }

        if ($this->aRbspeciality !== null && $this->aRbspeciality->getId() !== $v) {
            $this->aRbspeciality = null;
        }


        return $this;
    } // setSpecialityId()

    /**
     * Set the value of [sex] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setSex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sex !== $v) {
            $this->sex = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::SEX;
        }


        return $this;
    } // setSex()

    /**
     * Set the value of [age] column.
     *
     * @param string $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::AGE;
        }


        return $this;
    } // setAge()

    /**
     * Set the value of [age_bu] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setAgeBu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bu !== $v) {
            $this->age_bu = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::AGE_BU;
        }


        return $this;
    } // setAgeBu()

    /**
     * Set the value of [age_bc] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setAgeBc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_bc !== $v) {
            $this->age_bc = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::AGE_BC;
        }


        return $this;
    } // setAgeBc()

    /**
     * Set the value of [age_eu] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setAgeEu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_eu !== $v) {
            $this->age_eu = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::AGE_EU;
        }


        return $this;
    } // setAgeEu()

    /**
     * Set the value of [age_ec] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setAgeEc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->age_ec !== $v) {
            $this->age_ec = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::AGE_EC;
        }


        return $this;
    } // setAgeEc()

    /**
     * Set the value of [mkbregexp] column.
     *
     * @param string $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setMkbregexp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mkbregexp !== $v) {
            $this->mkbregexp = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::MKBREGEXP;
        }


        return $this;
    } // setMkbregexp()

    /**
     * Set the value of [medicalaidprofile_id] column.
     *
     * @param int $v new value
     * @return RbserviceProfile The current object (for fluent API support)
     */
    public function setMedicalaidprofileId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->medicalaidprofile_id !== $v) {
            $this->medicalaidprofile_id = $v;
            $this->modifiedColumns[] = RbserviceProfilePeer::MEDICALAIDPROFILE_ID;
        }

        if ($this->aRbmedicalaidprofile !== null && $this->aRbmedicalaidprofile->getId() !== $v) {
            $this->aRbmedicalaidprofile = null;
        }


        return $this;
    } // setMedicalaidprofileId()

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

            if ($this->sex !== 0) {
                return false;
            }

            if ($this->age !== '') {
                return false;
            }

            if ($this->mkbregexp !== '') {
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
            $this->idx = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->master_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->speciality_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->sex = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->age = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->age_bu = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->age_bc = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->age_eu = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->age_ec = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->mkbregexp = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->medicalaidprofile_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RbserviceProfile object", $e);
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

        if ($this->aRbservice !== null && $this->master_id !== $this->aRbservice->getId()) {
            $this->aRbservice = null;
        }
        if ($this->aRbspeciality !== null && $this->speciality_id !== $this->aRbspeciality->getId()) {
            $this->aRbspeciality = null;
        }
        if ($this->aRbmedicalaidprofile !== null && $this->medicalaidprofile_id !== $this->aRbmedicalaidprofile->getId()) {
            $this->aRbmedicalaidprofile = null;
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
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RbserviceProfilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRbservice = null;
            $this->aRbmedicalaidprofile = null;
            $this->aRbspeciality = null;
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
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RbserviceProfileQuery::create()
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
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RbserviceProfilePeer::addInstanceToPool($this);
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

            if ($this->aRbservice !== null) {
                if ($this->aRbservice->isModified() || $this->aRbservice->isNew()) {
                    $affectedRows += $this->aRbservice->save($con);
                }
                $this->setRbservice($this->aRbservice);
            }

            if ($this->aRbmedicalaidprofile !== null) {
                if ($this->aRbmedicalaidprofile->isModified() || $this->aRbmedicalaidprofile->isNew()) {
                    $affectedRows += $this->aRbmedicalaidprofile->save($con);
                }
                $this->setRbmedicalaidprofile($this->aRbmedicalaidprofile);
            }

            if ($this->aRbspeciality !== null) {
                if ($this->aRbspeciality->isModified() || $this->aRbspeciality->isNew()) {
                    $affectedRows += $this->aRbspeciality->save($con);
                }
                $this->setRbspeciality($this->aRbspeciality);
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

        $this->modifiedColumns[] = RbserviceProfilePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RbserviceProfilePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RbserviceProfilePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::IDX)) {
            $modifiedColumns[':p' . $index++]  = '`idx`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::MASTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`master_id`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::SPECIALITY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`speciality_id`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::SEX)) {
            $modifiedColumns[':p' . $index++]  = '`sex`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::AGE)) {
            $modifiedColumns[':p' . $index++]  = '`age`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_BU)) {
            $modifiedColumns[':p' . $index++]  = '`age_bu`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_BC)) {
            $modifiedColumns[':p' . $index++]  = '`age_bc`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_EU)) {
            $modifiedColumns[':p' . $index++]  = '`age_eu`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_EC)) {
            $modifiedColumns[':p' . $index++]  = '`age_ec`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::MKBREGEXP)) {
            $modifiedColumns[':p' . $index++]  = '`mkbRegExp`';
        }
        if ($this->isColumnModified(RbserviceProfilePeer::MEDICALAIDPROFILE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`medicalAidProfile_id`';
        }

        $sql = sprintf(
            'INSERT INTO `rbService_Profile` (%s) VALUES (%s)',
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
                    case '`idx`':
                        $stmt->bindValue($identifier, $this->idx, PDO::PARAM_INT);
                        break;
                    case '`master_id`':
                        $stmt->bindValue($identifier, $this->master_id, PDO::PARAM_INT);
                        break;
                    case '`speciality_id`':
                        $stmt->bindValue($identifier, $this->speciality_id, PDO::PARAM_INT);
                        break;
                    case '`sex`':
                        $stmt->bindValue($identifier, $this->sex, PDO::PARAM_INT);
                        break;
                    case '`age`':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_STR);
                        break;
                    case '`age_bu`':
                        $stmt->bindValue($identifier, $this->age_bu, PDO::PARAM_INT);
                        break;
                    case '`age_bc`':
                        $stmt->bindValue($identifier, $this->age_bc, PDO::PARAM_INT);
                        break;
                    case '`age_eu`':
                        $stmt->bindValue($identifier, $this->age_eu, PDO::PARAM_INT);
                        break;
                    case '`age_ec`':
                        $stmt->bindValue($identifier, $this->age_ec, PDO::PARAM_INT);
                        break;
                    case '`mkbRegExp`':
                        $stmt->bindValue($identifier, $this->mkbregexp, PDO::PARAM_STR);
                        break;
                    case '`medicalAidProfile_id`':
                        $stmt->bindValue($identifier, $this->medicalaidprofile_id, PDO::PARAM_INT);
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

            if ($this->aRbservice !== null) {
                if (!$this->aRbservice->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbservice->getValidationFailures());
                }
            }

            if ($this->aRbmedicalaidprofile !== null) {
                if (!$this->aRbmedicalaidprofile->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbmedicalaidprofile->getValidationFailures());
                }
            }

            if ($this->aRbspeciality !== null) {
                if (!$this->aRbspeciality->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRbspeciality->getValidationFailures());
                }
            }


            if (($retval = RbserviceProfilePeer::doValidate($this, $columns)) !== true) {
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
        $pos = RbserviceProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdx();
                break;
            case 2:
                return $this->getMasterId();
                break;
            case 3:
                return $this->getSpecialityId();
                break;
            case 4:
                return $this->getSex();
                break;
            case 5:
                return $this->getAge();
                break;
            case 6:
                return $this->getAgeBu();
                break;
            case 7:
                return $this->getAgeBc();
                break;
            case 8:
                return $this->getAgeEu();
                break;
            case 9:
                return $this->getAgeEc();
                break;
            case 10:
                return $this->getMkbregexp();
                break;
            case 11:
                return $this->getMedicalaidprofileId();
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
        if (isset($alreadyDumpedObjects['RbserviceProfile'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RbserviceProfile'][$this->getPrimaryKey()] = true;
        $keys = RbserviceProfilePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIdx(),
            $keys[2] => $this->getMasterId(),
            $keys[3] => $this->getSpecialityId(),
            $keys[4] => $this->getSex(),
            $keys[5] => $this->getAge(),
            $keys[6] => $this->getAgeBu(),
            $keys[7] => $this->getAgeBc(),
            $keys[8] => $this->getAgeEu(),
            $keys[9] => $this->getAgeEc(),
            $keys[10] => $this->getMkbregexp(),
            $keys[11] => $this->getMedicalaidprofileId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRbservice) {
                $result['Rbservice'] = $this->aRbservice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbmedicalaidprofile) {
                $result['Rbmedicalaidprofile'] = $this->aRbmedicalaidprofile->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRbspeciality) {
                $result['Rbspeciality'] = $this->aRbspeciality->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = RbserviceProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdx($value);
                break;
            case 2:
                $this->setMasterId($value);
                break;
            case 3:
                $this->setSpecialityId($value);
                break;
            case 4:
                $this->setSex($value);
                break;
            case 5:
                $this->setAge($value);
                break;
            case 6:
                $this->setAgeBu($value);
                break;
            case 7:
                $this->setAgeBc($value);
                break;
            case 8:
                $this->setAgeEu($value);
                break;
            case 9:
                $this->setAgeEc($value);
                break;
            case 10:
                $this->setMkbregexp($value);
                break;
            case 11:
                $this->setMedicalaidprofileId($value);
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
        $keys = RbserviceProfilePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdx($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMasterId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSpecialityId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSex($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAge($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAgeBu($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAgeBc($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAgeEu($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAgeEc($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setMkbregexp($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setMedicalaidprofileId($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);

        if ($this->isColumnModified(RbserviceProfilePeer::ID)) $criteria->add(RbserviceProfilePeer::ID, $this->id);
        if ($this->isColumnModified(RbserviceProfilePeer::IDX)) $criteria->add(RbserviceProfilePeer::IDX, $this->idx);
        if ($this->isColumnModified(RbserviceProfilePeer::MASTER_ID)) $criteria->add(RbserviceProfilePeer::MASTER_ID, $this->master_id);
        if ($this->isColumnModified(RbserviceProfilePeer::SPECIALITY_ID)) $criteria->add(RbserviceProfilePeer::SPECIALITY_ID, $this->speciality_id);
        if ($this->isColumnModified(RbserviceProfilePeer::SEX)) $criteria->add(RbserviceProfilePeer::SEX, $this->sex);
        if ($this->isColumnModified(RbserviceProfilePeer::AGE)) $criteria->add(RbserviceProfilePeer::AGE, $this->age);
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_BU)) $criteria->add(RbserviceProfilePeer::AGE_BU, $this->age_bu);
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_BC)) $criteria->add(RbserviceProfilePeer::AGE_BC, $this->age_bc);
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_EU)) $criteria->add(RbserviceProfilePeer::AGE_EU, $this->age_eu);
        if ($this->isColumnModified(RbserviceProfilePeer::AGE_EC)) $criteria->add(RbserviceProfilePeer::AGE_EC, $this->age_ec);
        if ($this->isColumnModified(RbserviceProfilePeer::MKBREGEXP)) $criteria->add(RbserviceProfilePeer::MKBREGEXP, $this->mkbregexp);
        if ($this->isColumnModified(RbserviceProfilePeer::MEDICALAIDPROFILE_ID)) $criteria->add(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, $this->medicalaidprofile_id);

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
        $criteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);
        $criteria->add(RbserviceProfilePeer::ID, $this->id);

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
     * @param object $copyObj An object of RbserviceProfile (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdx($this->getIdx());
        $copyObj->setMasterId($this->getMasterId());
        $copyObj->setSpecialityId($this->getSpecialityId());
        $copyObj->setSex($this->getSex());
        $copyObj->setAge($this->getAge());
        $copyObj->setAgeBu($this->getAgeBu());
        $copyObj->setAgeBc($this->getAgeBc());
        $copyObj->setAgeEu($this->getAgeEu());
        $copyObj->setAgeEc($this->getAgeEc());
        $copyObj->setMkbregexp($this->getMkbregexp());
        $copyObj->setMedicalaidprofileId($this->getMedicalaidprofileId());

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
     * @return RbserviceProfile Clone of current object.
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
     * @return RbserviceProfilePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RbserviceProfilePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Rbservice object.
     *
     * @param             Rbservice $v
     * @return RbserviceProfile The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbservice(Rbservice $v = null)
    {
        if ($v === null) {
            $this->setMasterId(NULL);
        } else {
            $this->setMasterId($v->getId());
        }

        $this->aRbservice = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbservice object, it will not be re-added.
        if ($v !== null) {
            $v->addRbserviceProfile($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbservice object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbservice The associated Rbservice object.
     * @throws PropelException
     */
    public function getRbservice(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbservice === null && ($this->master_id !== null) && $doQuery) {
            $this->aRbservice = RbserviceQuery::create()->findPk($this->master_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbservice->addRbserviceProfiles($this);
             */
        }

        return $this->aRbservice;
    }

    /**
     * Declares an association between this object and a Rbmedicalaidprofile object.
     *
     * @param             Rbmedicalaidprofile $v
     * @return RbserviceProfile The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbmedicalaidprofile(Rbmedicalaidprofile $v = null)
    {
        if ($v === null) {
            $this->setMedicalaidprofileId(NULL);
        } else {
            $this->setMedicalaidprofileId($v->getId());
        }

        $this->aRbmedicalaidprofile = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbmedicalaidprofile object, it will not be re-added.
        if ($v !== null) {
            $v->addRbserviceProfile($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbmedicalaidprofile object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbmedicalaidprofile The associated Rbmedicalaidprofile object.
     * @throws PropelException
     */
    public function getRbmedicalaidprofile(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbmedicalaidprofile === null && ($this->medicalaidprofile_id !== null) && $doQuery) {
            $this->aRbmedicalaidprofile = RbmedicalaidprofileQuery::create()->findPk($this->medicalaidprofile_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbmedicalaidprofile->addRbserviceProfiles($this);
             */
        }

        return $this->aRbmedicalaidprofile;
    }

    /**
     * Declares an association between this object and a Rbspeciality object.
     *
     * @param             Rbspeciality $v
     * @return RbserviceProfile The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRbspeciality(Rbspeciality $v = null)
    {
        if ($v === null) {
            $this->setSpecialityId(NULL);
        } else {
            $this->setSpecialityId($v->getId());
        }

        $this->aRbspeciality = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Rbspeciality object, it will not be re-added.
        if ($v !== null) {
            $v->addRbserviceProfile($this);
        }


        return $this;
    }


    /**
     * Get the associated Rbspeciality object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Rbspeciality The associated Rbspeciality object.
     * @throws PropelException
     */
    public function getRbspeciality(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRbspeciality === null && ($this->speciality_id !== null) && $doQuery) {
            $this->aRbspeciality = RbspecialityQuery::create()->findPk($this->speciality_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRbspeciality->addRbserviceProfiles($this);
             */
        }

        return $this->aRbspeciality;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->idx = null;
        $this->master_id = null;
        $this->speciality_id = null;
        $this->sex = null;
        $this->age = null;
        $this->age_bu = null;
        $this->age_bc = null;
        $this->age_eu = null;
        $this->age_ec = null;
        $this->mkbregexp = null;
        $this->medicalaidprofile_id = null;
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
            if ($this->aRbservice instanceof Persistent) {
              $this->aRbservice->clearAllReferences($deep);
            }
            if ($this->aRbmedicalaidprofile instanceof Persistent) {
              $this->aRbmedicalaidprofile->clearAllReferences($deep);
            }
            if ($this->aRbspeciality instanceof Persistent) {
              $this->aRbspeciality->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRbservice = null;
        $this->aRbmedicalaidprofile = null;
        $this->aRbspeciality = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RbserviceProfilePeer::DEFAULT_STRING_FORMAT);
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
