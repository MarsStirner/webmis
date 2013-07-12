<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\EventLocalcontract;
use Webmis\Models\EventLocalcontractPeer;
use Webmis\Models\map\EventLocalcontractTableMap;

/**
 * Base static class for performing query and update operations on the 'Event_LocalContract' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseEventLocalcontractPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Event_LocalContract';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\EventLocalcontract';

    /** the related TableMap class for this table */
    const TM_CLASS = 'EventLocalcontractTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 24;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 24;

    /** the column name for the id field */
    const ID = 'Event_LocalContract.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Event_LocalContract.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Event_LocalContract.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Event_LocalContract.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Event_LocalContract.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Event_LocalContract.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'Event_LocalContract.master_id';

    /** the column name for the coordDate field */
    const COORDDATE = 'Event_LocalContract.coordDate';

    /** the column name for the coordAgent field */
    const COORDAGENT = 'Event_LocalContract.coordAgent';

    /** the column name for the coordInspector field */
    const COORDINSPECTOR = 'Event_LocalContract.coordInspector';

    /** the column name for the coordText field */
    const COORDTEXT = 'Event_LocalContract.coordText';

    /** the column name for the dateContract field */
    const DATECONTRACT = 'Event_LocalContract.dateContract';

    /** the column name for the numberContract field */
    const NUMBERCONTRACT = 'Event_LocalContract.numberContract';

    /** the column name for the sumLimit field */
    const SUMLIMIT = 'Event_LocalContract.sumLimit';

    /** the column name for the lastName field */
    const LASTNAME = 'Event_LocalContract.lastName';

    /** the column name for the firstName field */
    const FIRSTNAME = 'Event_LocalContract.firstName';

    /** the column name for the patrName field */
    const PATRNAME = 'Event_LocalContract.patrName';

    /** the column name for the birthDate field */
    const BIRTHDATE = 'Event_LocalContract.birthDate';

    /** the column name for the documentType_id field */
    const DOCUMENTTYPE_ID = 'Event_LocalContract.documentType_id';

    /** the column name for the serialLeft field */
    const SERIALLEFT = 'Event_LocalContract.serialLeft';

    /** the column name for the serialRight field */
    const SERIALRIGHT = 'Event_LocalContract.serialRight';

    /** the column name for the number field */
    const NUMBER = 'Event_LocalContract.number';

    /** the column name for the regAddress field */
    const REGADDRESS = 'Event_LocalContract.regAddress';

    /** the column name for the org_id field */
    const ORG_ID = 'Event_LocalContract.org_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of EventLocalcontract objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array EventLocalcontract[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. EventLocalcontractPeer::$fieldNames[EventLocalcontractPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'MasterId', 'Coorddate', 'Coordagent', 'Coordinspector', 'Coordtext', 'Datecontract', 'Numbercontract', 'Sumlimit', 'Lastname', 'Firstname', 'Patrname', 'Birthdate', 'DocumenttypeId', 'Serialleft', 'Serialright', 'Number', 'Regaddress', 'OrgId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'masterId', 'coorddate', 'coordagent', 'coordinspector', 'coordtext', 'datecontract', 'numbercontract', 'sumlimit', 'lastname', 'firstname', 'patrname', 'birthdate', 'documenttypeId', 'serialleft', 'serialright', 'number', 'regaddress', 'orgId', ),
        BasePeer::TYPE_COLNAME => array (EventLocalcontractPeer::ID, EventLocalcontractPeer::CREATEDATETIME, EventLocalcontractPeer::CREATEPERSON_ID, EventLocalcontractPeer::MODIFYDATETIME, EventLocalcontractPeer::MODIFYPERSON_ID, EventLocalcontractPeer::DELETED, EventLocalcontractPeer::MASTER_ID, EventLocalcontractPeer::COORDDATE, EventLocalcontractPeer::COORDAGENT, EventLocalcontractPeer::COORDINSPECTOR, EventLocalcontractPeer::COORDTEXT, EventLocalcontractPeer::DATECONTRACT, EventLocalcontractPeer::NUMBERCONTRACT, EventLocalcontractPeer::SUMLIMIT, EventLocalcontractPeer::LASTNAME, EventLocalcontractPeer::FIRSTNAME, EventLocalcontractPeer::PATRNAME, EventLocalcontractPeer::BIRTHDATE, EventLocalcontractPeer::DOCUMENTTYPE_ID, EventLocalcontractPeer::SERIALLEFT, EventLocalcontractPeer::SERIALRIGHT, EventLocalcontractPeer::NUMBER, EventLocalcontractPeer::REGADDRESS, EventLocalcontractPeer::ORG_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'MASTER_ID', 'COORDDATE', 'COORDAGENT', 'COORDINSPECTOR', 'COORDTEXT', 'DATECONTRACT', 'NUMBERCONTRACT', 'SUMLIMIT', 'LASTNAME', 'FIRSTNAME', 'PATRNAME', 'BIRTHDATE', 'DOCUMENTTYPE_ID', 'SERIALLEFT', 'SERIALRIGHT', 'NUMBER', 'REGADDRESS', 'ORG_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'master_id', 'coordDate', 'coordAgent', 'coordInspector', 'coordText', 'dateContract', 'numberContract', 'sumLimit', 'lastName', 'firstName', 'patrName', 'birthDate', 'documentType_id', 'serialLeft', 'serialRight', 'number', 'regAddress', 'org_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. EventLocalcontractPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'MasterId' => 6, 'Coorddate' => 7, 'Coordagent' => 8, 'Coordinspector' => 9, 'Coordtext' => 10, 'Datecontract' => 11, 'Numbercontract' => 12, 'Sumlimit' => 13, 'Lastname' => 14, 'Firstname' => 15, 'Patrname' => 16, 'Birthdate' => 17, 'DocumenttypeId' => 18, 'Serialleft' => 19, 'Serialright' => 20, 'Number' => 21, 'Regaddress' => 22, 'OrgId' => 23, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'masterId' => 6, 'coorddate' => 7, 'coordagent' => 8, 'coordinspector' => 9, 'coordtext' => 10, 'datecontract' => 11, 'numbercontract' => 12, 'sumlimit' => 13, 'lastname' => 14, 'firstname' => 15, 'patrname' => 16, 'birthdate' => 17, 'documenttypeId' => 18, 'serialleft' => 19, 'serialright' => 20, 'number' => 21, 'regaddress' => 22, 'orgId' => 23, ),
        BasePeer::TYPE_COLNAME => array (EventLocalcontractPeer::ID => 0, EventLocalcontractPeer::CREATEDATETIME => 1, EventLocalcontractPeer::CREATEPERSON_ID => 2, EventLocalcontractPeer::MODIFYDATETIME => 3, EventLocalcontractPeer::MODIFYPERSON_ID => 4, EventLocalcontractPeer::DELETED => 5, EventLocalcontractPeer::MASTER_ID => 6, EventLocalcontractPeer::COORDDATE => 7, EventLocalcontractPeer::COORDAGENT => 8, EventLocalcontractPeer::COORDINSPECTOR => 9, EventLocalcontractPeer::COORDTEXT => 10, EventLocalcontractPeer::DATECONTRACT => 11, EventLocalcontractPeer::NUMBERCONTRACT => 12, EventLocalcontractPeer::SUMLIMIT => 13, EventLocalcontractPeer::LASTNAME => 14, EventLocalcontractPeer::FIRSTNAME => 15, EventLocalcontractPeer::PATRNAME => 16, EventLocalcontractPeer::BIRTHDATE => 17, EventLocalcontractPeer::DOCUMENTTYPE_ID => 18, EventLocalcontractPeer::SERIALLEFT => 19, EventLocalcontractPeer::SERIALRIGHT => 20, EventLocalcontractPeer::NUMBER => 21, EventLocalcontractPeer::REGADDRESS => 22, EventLocalcontractPeer::ORG_ID => 23, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'MASTER_ID' => 6, 'COORDDATE' => 7, 'COORDAGENT' => 8, 'COORDINSPECTOR' => 9, 'COORDTEXT' => 10, 'DATECONTRACT' => 11, 'NUMBERCONTRACT' => 12, 'SUMLIMIT' => 13, 'LASTNAME' => 14, 'FIRSTNAME' => 15, 'PATRNAME' => 16, 'BIRTHDATE' => 17, 'DOCUMENTTYPE_ID' => 18, 'SERIALLEFT' => 19, 'SERIALRIGHT' => 20, 'NUMBER' => 21, 'REGADDRESS' => 22, 'ORG_ID' => 23, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'master_id' => 6, 'coordDate' => 7, 'coordAgent' => 8, 'coordInspector' => 9, 'coordText' => 10, 'dateContract' => 11, 'numberContract' => 12, 'sumLimit' => 13, 'lastName' => 14, 'firstName' => 15, 'patrName' => 16, 'birthDate' => 17, 'documentType_id' => 18, 'serialLeft' => 19, 'serialRight' => 20, 'number' => 21, 'regAddress' => 22, 'org_id' => 23, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = EventLocalcontractPeer::getFieldNames($toType);
        $key = isset(EventLocalcontractPeer::$fieldKeys[$fromType][$name]) ? EventLocalcontractPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(EventLocalcontractPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, EventLocalcontractPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return EventLocalcontractPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. EventLocalcontractPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(EventLocalcontractPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(EventLocalcontractPeer::ID);
            $criteria->addSelectColumn(EventLocalcontractPeer::CREATEDATETIME);
            $criteria->addSelectColumn(EventLocalcontractPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(EventLocalcontractPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(EventLocalcontractPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(EventLocalcontractPeer::DELETED);
            $criteria->addSelectColumn(EventLocalcontractPeer::MASTER_ID);
            $criteria->addSelectColumn(EventLocalcontractPeer::COORDDATE);
            $criteria->addSelectColumn(EventLocalcontractPeer::COORDAGENT);
            $criteria->addSelectColumn(EventLocalcontractPeer::COORDINSPECTOR);
            $criteria->addSelectColumn(EventLocalcontractPeer::COORDTEXT);
            $criteria->addSelectColumn(EventLocalcontractPeer::DATECONTRACT);
            $criteria->addSelectColumn(EventLocalcontractPeer::NUMBERCONTRACT);
            $criteria->addSelectColumn(EventLocalcontractPeer::SUMLIMIT);
            $criteria->addSelectColumn(EventLocalcontractPeer::LASTNAME);
            $criteria->addSelectColumn(EventLocalcontractPeer::FIRSTNAME);
            $criteria->addSelectColumn(EventLocalcontractPeer::PATRNAME);
            $criteria->addSelectColumn(EventLocalcontractPeer::BIRTHDATE);
            $criteria->addSelectColumn(EventLocalcontractPeer::DOCUMENTTYPE_ID);
            $criteria->addSelectColumn(EventLocalcontractPeer::SERIALLEFT);
            $criteria->addSelectColumn(EventLocalcontractPeer::SERIALRIGHT);
            $criteria->addSelectColumn(EventLocalcontractPeer::NUMBER);
            $criteria->addSelectColumn(EventLocalcontractPeer::REGADDRESS);
            $criteria->addSelectColumn(EventLocalcontractPeer::ORG_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.coordDate');
            $criteria->addSelectColumn($alias . '.coordAgent');
            $criteria->addSelectColumn($alias . '.coordInspector');
            $criteria->addSelectColumn($alias . '.coordText');
            $criteria->addSelectColumn($alias . '.dateContract');
            $criteria->addSelectColumn($alias . '.numberContract');
            $criteria->addSelectColumn($alias . '.sumLimit');
            $criteria->addSelectColumn($alias . '.lastName');
            $criteria->addSelectColumn($alias . '.firstName');
            $criteria->addSelectColumn($alias . '.patrName');
            $criteria->addSelectColumn($alias . '.birthDate');
            $criteria->addSelectColumn($alias . '.documentType_id');
            $criteria->addSelectColumn($alias . '.serialLeft');
            $criteria->addSelectColumn($alias . '.serialRight');
            $criteria->addSelectColumn($alias . '.number');
            $criteria->addSelectColumn($alias . '.regAddress');
            $criteria->addSelectColumn($alias . '.org_id');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventLocalcontractPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventLocalcontractPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(EventLocalcontractPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 EventLocalcontract
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = EventLocalcontractPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return EventLocalcontractPeer::populateObjects(EventLocalcontractPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            EventLocalcontractPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(EventLocalcontractPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      EventLocalcontract $obj A EventLocalcontract object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            EventLocalcontractPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A EventLocalcontract object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof EventLocalcontract) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or EventLocalcontract object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(EventLocalcontractPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   EventLocalcontract Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(EventLocalcontractPeer::$instances[$key])) {
                return EventLocalcontractPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (EventLocalcontractPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        EventLocalcontractPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Event_LocalContract
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = EventLocalcontractPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = EventLocalcontractPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = EventLocalcontractPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EventLocalcontractPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (EventLocalcontract object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = EventLocalcontractPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = EventLocalcontractPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + EventLocalcontractPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EventLocalcontractPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            EventLocalcontractPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(EventLocalcontractPeer::DATABASE_NAME)->getTable(EventLocalcontractPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseEventLocalcontractPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseEventLocalcontractPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new EventLocalcontractTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return EventLocalcontractPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a EventLocalcontract or Criteria object.
     *
     * @param      mixed $values Criteria or EventLocalcontract object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from EventLocalcontract object
        }

        if ($criteria->containsKey(EventLocalcontractPeer::ID) && $criteria->keyContainsValue(EventLocalcontractPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventLocalcontractPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(EventLocalcontractPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a EventLocalcontract or Criteria object.
     *
     * @param      mixed $values Criteria or EventLocalcontract object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(EventLocalcontractPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(EventLocalcontractPeer::ID);
            $value = $criteria->remove(EventLocalcontractPeer::ID);
            if ($value) {
                $selectCriteria->add(EventLocalcontractPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(EventLocalcontractPeer::TABLE_NAME);
            }

        } else { // $values is EventLocalcontract object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(EventLocalcontractPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Event_LocalContract table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(EventLocalcontractPeer::TABLE_NAME, $con, EventLocalcontractPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EventLocalcontractPeer::clearInstancePool();
            EventLocalcontractPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a EventLocalcontract or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or EventLocalcontract object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            EventLocalcontractPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof EventLocalcontract) { // it's a model object
            // invalidate the cache for this single object
            EventLocalcontractPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EventLocalcontractPeer::DATABASE_NAME);
            $criteria->add(EventLocalcontractPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                EventLocalcontractPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(EventLocalcontractPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            EventLocalcontractPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given EventLocalcontract object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      EventLocalcontract $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(EventLocalcontractPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(EventLocalcontractPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(EventLocalcontractPeer::DATABASE_NAME, EventLocalcontractPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return EventLocalcontract
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = EventLocalcontractPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(EventLocalcontractPeer::DATABASE_NAME);
        $criteria->add(EventLocalcontractPeer::ID, $pk);

        $v = EventLocalcontractPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return EventLocalcontract[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(EventLocalcontractPeer::DATABASE_NAME);
            $criteria->add(EventLocalcontractPeer::ID, $pks, Criteria::IN);
            $objs = EventLocalcontractPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseEventLocalcontractPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEventLocalcontractPeer::buildTableMap();

