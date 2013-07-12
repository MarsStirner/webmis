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
use Webmis\Models\Client;
use Webmis\Models\ClientQuery;
use Webmis\Models\Clientfdproperty;
use Webmis\Models\ClientfdpropertyQuery;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\ClientflatdirectoryPeer;
use Webmis\Models\ClientflatdirectoryQuery;
use Webmis\Models\Fdrecord;
use Webmis\Models\FdrecordQuery;

/**
 * Base class that represents a row from the 'ClientFlatDirectory' table.
 *
 *
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientflatdirectory extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Webmis\\Models\\ClientflatdirectoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientflatdirectoryPeer
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
     * The value for the clientfdproperty_id field.
     * @var        int
     */
    protected $clientfdproperty_id;

    /**
     * The value for the fdrecord_id field.
     * @var        int
     */
    protected $fdrecord_id;

    /**
     * The value for the datestart field.
     * @var        string
     */
    protected $datestart;

    /**
     * The value for the dateend field.
     * @var        string
     */
    protected $dateend;

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
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the client_id field.
     * @var        int
     */
    protected $client_id;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the version field.
     * @var        int
     */
    protected $version;

    /**
     * @var        Client
     */
    protected $aClient;

    /**
     * @var        Clientfdproperty
     */
    protected $aClientfdproperty;

    /**
     * @var        Fdrecord
     */
    protected $aFdrecord;

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
     * Get the [clientfdproperty_id] column value.
     *
     * @return int
     */
    public function getClientfdpropertyId()
    {
        return $this->clientfdproperty_id;
    }

    /**
     * Get the [fdrecord_id] column value.
     *
     * @return int
     */
    public function getFdrecordId()
    {
        return $this->fdrecord_id;
    }

    /**
     * Get the [optionally formatted] temporal [datestart] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatestart($format = 'Y-m-d H:i:s')
    {
        if ($this->datestart === null) {
            return null;
        }

        if ($this->datestart === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->datestart);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->datestart, true), $x);
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
     * Get the [optionally formatted] temporal [dateend] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateend($format = 'Y-m-d H:i:s')
    {
        if ($this->dateend === null) {
            return null;
        }

        if ($this->dateend === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->dateend);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dateend, true), $x);
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
     * Get the [client_id] column value.
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [clientfdproperty_id] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setClientfdpropertyId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->clientfdproperty_id !== $v) {
            $this->clientfdproperty_id = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID;
        }

        if ($this->aClientfdproperty !== null && $this->aClientfdproperty->getId() !== $v) {
            $this->aClientfdproperty = null;
        }


        return $this;
    } // setClientfdpropertyId()

    /**
     * Set the value of [fdrecord_id] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setFdrecordId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fdrecord_id !== $v) {
            $this->fdrecord_id = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::FDRECORD_ID;
        }

        if ($this->aFdrecord !== null && $this->aFdrecord->getId() !== $v) {
            $this->aFdrecord = null;
        }


        return $this;
    } // setFdrecordId()

    /**
     * Sets the value of [datestart] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setDatestart($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datestart !== null || $dt !== null) {
            $currentDateAsString = ($this->datestart !== null && $tmpDt = new DateTime($this->datestart)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->datestart = $newDateAsString;
                $this->modifiedColumns[] = ClientflatdirectoryPeer::DATESTART;
            }
        } // if either are not null


        return $this;
    } // setDatestart()

    /**
     * Sets the value of [dateend] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setDateend($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateend !== null || $dt !== null) {
            $currentDateAsString = ($this->dateend !== null && $tmpDt = new DateTime($this->dateend)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dateend = $newDateAsString;
                $this->modifiedColumns[] = ClientflatdirectoryPeer::DATEEND;
            }
        } // if either are not null


        return $this;
    } // setDateend()

    /**
     * Sets the value of [createdatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setCreatedatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->createdatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->createdatetime !== null && $tmpDt = new DateTime($this->createdatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->createdatetime = $newDateAsString;
                $this->modifiedColumns[] = ClientflatdirectoryPeer::CREATEDATETIME;
            }
        } // if either are not null


        return $this;
    } // setCreatedatetime()

    /**
     * Set the value of [createperson_id] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setCreatepersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->createperson_id !== $v) {
            $this->createperson_id = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::CREATEPERSON_ID;
        }


        return $this;
    } // setCreatepersonId()

    /**
     * Sets the value of [modifydatetime] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setModifydatetime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modifydatetime !== null || $dt !== null) {
            $currentDateAsString = ($this->modifydatetime !== null && $tmpDt = new DateTime($this->modifydatetime)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modifydatetime = $newDateAsString;
                $this->modifiedColumns[] = ClientflatdirectoryPeer::MODIFYDATETIME;
            }
        } // if either are not null


        return $this;
    } // setModifydatetime()

    /**
     * Set the value of [modifyperson_id] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setModifypersonId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->modifyperson_id !== $v) {
            $this->modifyperson_id = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::MODIFYPERSON_ID;
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
     * @return Clientflatdirectory The current object (for fluent API support)
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
            $this->modifiedColumns[] = ClientflatdirectoryPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setClientId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::CLIENT_ID;
        }

        if ($this->aClient !== null && $this->aClient->getId() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setClientId()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Clientflatdirectory The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ClientflatdirectoryPeer::VERSION;
        }


        return $this;
    } // setVersion()

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
            $this->clientfdproperty_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fdrecord_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->datestart = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->dateend = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->createdatetime = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->createperson_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->modifydatetime = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->modifyperson_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->deleted = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->client_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->comment = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->version = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 13; // 13 = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Clientflatdirectory object", $e);
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

        if ($this->aClientfdproperty !== null && $this->clientfdproperty_id !== $this->aClientfdproperty->getId()) {
            $this->aClientfdproperty = null;
        }
        if ($this->aFdrecord !== null && $this->fdrecord_id !== $this->aFdrecord->getId()) {
            $this->aFdrecord = null;
        }
        if ($this->aClient !== null && $this->client_id !== $this->aClient->getId()) {
            $this->aClient = null;
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
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientflatdirectoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
            $this->aClientfdproperty = null;
            $this->aFdrecord = null;
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
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientflatdirectoryQuery::create()
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
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientflatdirectoryPeer::addInstanceToPool($this);
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

            if ($this->aClient !== null) {
                if ($this->aClient->isModified() || $this->aClient->isNew()) {
                    $affectedRows += $this->aClient->save($con);
                }
                $this->setClient($this->aClient);
            }

            if ($this->aClientfdproperty !== null) {
                if ($this->aClientfdproperty->isModified() || $this->aClientfdproperty->isNew()) {
                    $affectedRows += $this->aClientfdproperty->save($con);
                }
                $this->setClientfdproperty($this->aClientfdproperty);
            }

            if ($this->aFdrecord !== null) {
                if ($this->aFdrecord->isModified() || $this->aFdrecord->isNew()) {
                    $affectedRows += $this->aFdrecord->save($con);
                }
                $this->setFdrecord($this->aFdrecord);
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

        $this->modifiedColumns[] = ClientflatdirectoryPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientflatdirectoryPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientflatdirectoryPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID)) {
            $modifiedColumns[':p' . $index++]  = '`clientFDProperty_id`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::FDRECORD_ID)) {
            $modifiedColumns[':p' . $index++]  = '`fdRecord_id`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::DATESTART)) {
            $modifiedColumns[':p' . $index++]  = '`dateStart`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::DATEEND)) {
            $modifiedColumns[':p' . $index++]  = '`dateEnd`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::CREATEDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`createDateTime`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::CREATEPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`createPerson_id`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::MODIFYDATETIME)) {
            $modifiedColumns[':p' . $index++]  = '`modifyDateTime`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::MODIFYPERSON_ID)) {
            $modifiedColumns[':p' . $index++]  = '`modifyPerson_id`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`client_id`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`comment`';
        }
        if ($this->isColumnModified(ClientflatdirectoryPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }

        $sql = sprintf(
            'INSERT INTO `ClientFlatDirectory` (%s) VALUES (%s)',
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
                    case '`clientFDProperty_id`':
                        $stmt->bindValue($identifier, $this->clientfdproperty_id, PDO::PARAM_INT);
                        break;
                    case '`fdRecord_id`':
                        $stmt->bindValue($identifier, $this->fdrecord_id, PDO::PARAM_INT);
                        break;
                    case '`dateStart`':
                        $stmt->bindValue($identifier, $this->datestart, PDO::PARAM_STR);
                        break;
                    case '`dateEnd`':
                        $stmt->bindValue($identifier, $this->dateend, PDO::PARAM_STR);
                        break;
                    case '`createDateTime`':
                        $stmt->bindValue($identifier, $this->createdatetime, PDO::PARAM_STR);
                        break;
                    case '`createPerson_id`':
                        $stmt->bindValue($identifier, $this->createperson_id, PDO::PARAM_INT);
                        break;
                    case '`modifyDateTime`':
                        $stmt->bindValue($identifier, $this->modifydatetime, PDO::PARAM_STR);
                        break;
                    case '`modifyPerson_id`':
                        $stmt->bindValue($identifier, $this->modifyperson_id, PDO::PARAM_INT);
                        break;
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
                        break;
                    case '`client_id`':
                        $stmt->bindValue($identifier, $this->client_id, PDO::PARAM_INT);
                        break;
                    case '`comment`':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
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

            if ($this->aClient !== null) {
                if (!$this->aClient->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
                }
            }

            if ($this->aClientfdproperty !== null) {
                if (!$this->aClientfdproperty->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClientfdproperty->getValidationFailures());
                }
            }

            if ($this->aFdrecord !== null) {
                if (!$this->aFdrecord->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFdrecord->getValidationFailures());
                }
            }


            if (($retval = ClientflatdirectoryPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ClientflatdirectoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getClientfdpropertyId();
                break;
            case 2:
                return $this->getFdrecordId();
                break;
            case 3:
                return $this->getDatestart();
                break;
            case 4:
                return $this->getDateend();
                break;
            case 5:
                return $this->getCreatedatetime();
                break;
            case 6:
                return $this->getCreatepersonId();
                break;
            case 7:
                return $this->getModifydatetime();
                break;
            case 8:
                return $this->getModifypersonId();
                break;
            case 9:
                return $this->getDeleted();
                break;
            case 10:
                return $this->getClientId();
                break;
            case 11:
                return $this->getComment();
                break;
            case 12:
                return $this->getVersion();
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
        if (isset($alreadyDumpedObjects['Clientflatdirectory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Clientflatdirectory'][$this->getPrimaryKey()] = true;
        $keys = ClientflatdirectoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClientfdpropertyId(),
            $keys[2] => $this->getFdrecordId(),
            $keys[3] => $this->getDatestart(),
            $keys[4] => $this->getDateend(),
            $keys[5] => $this->getCreatedatetime(),
            $keys[6] => $this->getCreatepersonId(),
            $keys[7] => $this->getModifydatetime(),
            $keys[8] => $this->getModifypersonId(),
            $keys[9] => $this->getDeleted(),
            $keys[10] => $this->getClientId(),
            $keys[11] => $this->getComment(),
            $keys[12] => $this->getVersion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aClientfdproperty) {
                $result['Clientfdproperty'] = $this->aClientfdproperty->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFdrecord) {
                $result['Fdrecord'] = $this->aFdrecord->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ClientflatdirectoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setClientfdpropertyId($value);
                break;
            case 2:
                $this->setFdrecordId($value);
                break;
            case 3:
                $this->setDatestart($value);
                break;
            case 4:
                $this->setDateend($value);
                break;
            case 5:
                $this->setCreatedatetime($value);
                break;
            case 6:
                $this->setCreatepersonId($value);
                break;
            case 7:
                $this->setModifydatetime($value);
                break;
            case 8:
                $this->setModifypersonId($value);
                break;
            case 9:
                $this->setDeleted($value);
                break;
            case 10:
                $this->setClientId($value);
                break;
            case 11:
                $this->setComment($value);
                break;
            case 12:
                $this->setVersion($value);
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
        $keys = ClientflatdirectoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setClientfdpropertyId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFdrecordId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDatestart($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDateend($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreatedatetime($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreatepersonId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setModifydatetime($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setModifypersonId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDeleted($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setClientId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setComment($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setVersion($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientflatdirectoryPeer::ID)) $criteria->add(ClientflatdirectoryPeer::ID, $this->id);
        if ($this->isColumnModified(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID)) $criteria->add(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, $this->clientfdproperty_id);
        if ($this->isColumnModified(ClientflatdirectoryPeer::FDRECORD_ID)) $criteria->add(ClientflatdirectoryPeer::FDRECORD_ID, $this->fdrecord_id);
        if ($this->isColumnModified(ClientflatdirectoryPeer::DATESTART)) $criteria->add(ClientflatdirectoryPeer::DATESTART, $this->datestart);
        if ($this->isColumnModified(ClientflatdirectoryPeer::DATEEND)) $criteria->add(ClientflatdirectoryPeer::DATEEND, $this->dateend);
        if ($this->isColumnModified(ClientflatdirectoryPeer::CREATEDATETIME)) $criteria->add(ClientflatdirectoryPeer::CREATEDATETIME, $this->createdatetime);
        if ($this->isColumnModified(ClientflatdirectoryPeer::CREATEPERSON_ID)) $criteria->add(ClientflatdirectoryPeer::CREATEPERSON_ID, $this->createperson_id);
        if ($this->isColumnModified(ClientflatdirectoryPeer::MODIFYDATETIME)) $criteria->add(ClientflatdirectoryPeer::MODIFYDATETIME, $this->modifydatetime);
        if ($this->isColumnModified(ClientflatdirectoryPeer::MODIFYPERSON_ID)) $criteria->add(ClientflatdirectoryPeer::MODIFYPERSON_ID, $this->modifyperson_id);
        if ($this->isColumnModified(ClientflatdirectoryPeer::DELETED)) $criteria->add(ClientflatdirectoryPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ClientflatdirectoryPeer::CLIENT_ID)) $criteria->add(ClientflatdirectoryPeer::CLIENT_ID, $this->client_id);
        if ($this->isColumnModified(ClientflatdirectoryPeer::COMMENT)) $criteria->add(ClientflatdirectoryPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(ClientflatdirectoryPeer::VERSION)) $criteria->add(ClientflatdirectoryPeer::VERSION, $this->version);

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
        $criteria = new Criteria(ClientflatdirectoryPeer::DATABASE_NAME);
        $criteria->add(ClientflatdirectoryPeer::ID, $this->id);

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
     * @param object $copyObj An object of Clientflatdirectory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClientfdpropertyId($this->getClientfdpropertyId());
        $copyObj->setFdrecordId($this->getFdrecordId());
        $copyObj->setDatestart($this->getDatestart());
        $copyObj->setDateend($this->getDateend());
        $copyObj->setCreatedatetime($this->getCreatedatetime());
        $copyObj->setCreatepersonId($this->getCreatepersonId());
        $copyObj->setModifydatetime($this->getModifydatetime());
        $copyObj->setModifypersonId($this->getModifypersonId());
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setClientId($this->getClientId());
        $copyObj->setComment($this->getComment());
        $copyObj->setVersion($this->getVersion());

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
     * @return Clientflatdirectory Clone of current object.
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
     * @return ClientflatdirectoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientflatdirectoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param             Client $v
     * @return Clientflatdirectory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClient(Client $v = null)
    {
        if ($v === null) {
            $this->setClientId(NULL);
        } else {
            $this->setClientId($v->getId());
        }

        $this->aClient = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Client object, it will not be re-added.
        if ($v !== null) {
            $v->addClientflatdirectory($this);
        }


        return $this;
    }


    /**
     * Get the associated Client object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Client The associated Client object.
     * @throws PropelException
     */
    public function getClient(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClient === null && ($this->client_id !== null) && $doQuery) {
            $this->aClient = ClientQuery::create()->findPk($this->client_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClient->addClientflatdirectorys($this);
             */
        }

        return $this->aClient;
    }

    /**
     * Declares an association between this object and a Clientfdproperty object.
     *
     * @param             Clientfdproperty $v
     * @return Clientflatdirectory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClientfdproperty(Clientfdproperty $v = null)
    {
        if ($v === null) {
            $this->setClientfdpropertyId(NULL);
        } else {
            $this->setClientfdpropertyId($v->getId());
        }

        $this->aClientfdproperty = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Clientfdproperty object, it will not be re-added.
        if ($v !== null) {
            $v->addClientflatdirectory($this);
        }


        return $this;
    }


    /**
     * Get the associated Clientfdproperty object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Clientfdproperty The associated Clientfdproperty object.
     * @throws PropelException
     */
    public function getClientfdproperty(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClientfdproperty === null && ($this->clientfdproperty_id !== null) && $doQuery) {
            $this->aClientfdproperty = ClientfdpropertyQuery::create()->findPk($this->clientfdproperty_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClientfdproperty->addClientflatdirectorys($this);
             */
        }

        return $this->aClientfdproperty;
    }

    /**
     * Declares an association between this object and a Fdrecord object.
     *
     * @param             Fdrecord $v
     * @return Clientflatdirectory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFdrecord(Fdrecord $v = null)
    {
        if ($v === null) {
            $this->setFdrecordId(NULL);
        } else {
            $this->setFdrecordId($v->getId());
        }

        $this->aFdrecord = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Fdrecord object, it will not be re-added.
        if ($v !== null) {
            $v->addClientflatdirectory($this);
        }


        return $this;
    }


    /**
     * Get the associated Fdrecord object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Fdrecord The associated Fdrecord object.
     * @throws PropelException
     */
    public function getFdrecord(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFdrecord === null && ($this->fdrecord_id !== null) && $doQuery) {
            $this->aFdrecord = FdrecordQuery::create()->findPk($this->fdrecord_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFdrecord->addClientflatdirectorys($this);
             */
        }

        return $this->aFdrecord;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->clientfdproperty_id = null;
        $this->fdrecord_id = null;
        $this->datestart = null;
        $this->dateend = null;
        $this->createdatetime = null;
        $this->createperson_id = null;
        $this->modifydatetime = null;
        $this->modifyperson_id = null;
        $this->deleted = null;
        $this->client_id = null;
        $this->comment = null;
        $this->version = null;
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
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }
            if ($this->aClientfdproperty instanceof Persistent) {
              $this->aClientfdproperty->clearAllReferences($deep);
            }
            if ($this->aFdrecord instanceof Persistent) {
              $this->aFdrecord->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aClient = null;
        $this->aClientfdproperty = null;
        $this->aFdrecord = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientflatdirectoryPeer::DEFAULT_STRING_FORMAT);
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
