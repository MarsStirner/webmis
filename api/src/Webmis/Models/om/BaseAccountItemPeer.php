<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\AccountItem;
use Webmis\Models\AccountItemPeer;
use Webmis\Models\map\AccountItemTableMap;

/**
 * Base static class for performing query and update operations on the 'Account_Item' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseAccountItemPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Account_Item';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\AccountItem';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AccountItemTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the id field */
    const ID = 'Account_Item.id';

    /** the column name for the deleted field */
    const DELETED = 'Account_Item.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'Account_Item.master_id';

    /** the column name for the serviceDate field */
    const SERVICEDATE = 'Account_Item.serviceDate';

    /** the column name for the event_id field */
    const EVENT_ID = 'Account_Item.event_id';

    /** the column name for the visit_id field */
    const VISIT_ID = 'Account_Item.visit_id';

    /** the column name for the action_id field */
    const ACTION_ID = 'Account_Item.action_id';

    /** the column name for the price field */
    const PRICE = 'Account_Item.price';

    /** the column name for the unit_id field */
    const UNIT_ID = 'Account_Item.unit_id';

    /** the column name for the amount field */
    const AMOUNT = 'Account_Item.amount';

    /** the column name for the uet field */
    const UET = 'Account_Item.uet';

    /** the column name for the sum field */
    const SUM = 'Account_Item.sum';

    /** the column name for the date field */
    const DATE = 'Account_Item.date';

    /** the column name for the number field */
    const NUMBER = 'Account_Item.number';

    /** the column name for the refuseType_id field */
    const REFUSETYPE_ID = 'Account_Item.refuseType_id';

    /** the column name for the reexposeItem_id field */
    const REEXPOSEITEM_ID = 'Account_Item.reexposeItem_id';

    /** the column name for the note field */
    const NOTE = 'Account_Item.note';

    /** the column name for the tariff_id field */
    const TARIFF_ID = 'Account_Item.tariff_id';

    /** the column name for the service_id field */
    const SERVICE_ID = 'Account_Item.service_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of AccountItem objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array AccountItem[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AccountItemPeer::$fieldNames[AccountItemPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Deleted', 'MasterId', 'Servicedate', 'EventId', 'VisitId', 'ActionId', 'Price', 'UnitId', 'Amount', 'Uet', 'Sum', 'Date', 'Number', 'RefusetypeId', 'ReexposeitemId', 'Note', 'TariffId', 'ServiceId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'deleted', 'masterId', 'servicedate', 'eventId', 'visitId', 'actionId', 'price', 'unitId', 'amount', 'uet', 'sum', 'date', 'number', 'refusetypeId', 'reexposeitemId', 'note', 'tariffId', 'serviceId', ),
        BasePeer::TYPE_COLNAME => array (AccountItemPeer::ID, AccountItemPeer::DELETED, AccountItemPeer::MASTER_ID, AccountItemPeer::SERVICEDATE, AccountItemPeer::EVENT_ID, AccountItemPeer::VISIT_ID, AccountItemPeer::ACTION_ID, AccountItemPeer::PRICE, AccountItemPeer::UNIT_ID, AccountItemPeer::AMOUNT, AccountItemPeer::UET, AccountItemPeer::SUM, AccountItemPeer::DATE, AccountItemPeer::NUMBER, AccountItemPeer::REFUSETYPE_ID, AccountItemPeer::REEXPOSEITEM_ID, AccountItemPeer::NOTE, AccountItemPeer::TARIFF_ID, AccountItemPeer::SERVICE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'DELETED', 'MASTER_ID', 'SERVICEDATE', 'EVENT_ID', 'VISIT_ID', 'ACTION_ID', 'PRICE', 'UNIT_ID', 'AMOUNT', 'UET', 'SUM', 'DATE', 'NUMBER', 'REFUSETYPE_ID', 'REEXPOSEITEM_ID', 'NOTE', 'TARIFF_ID', 'SERVICE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'deleted', 'master_id', 'serviceDate', 'event_id', 'visit_id', 'action_id', 'price', 'unit_id', 'amount', 'uet', 'sum', 'date', 'number', 'refuseType_id', 'reexposeItem_id', 'note', 'tariff_id', 'service_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AccountItemPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Deleted' => 1, 'MasterId' => 2, 'Servicedate' => 3, 'EventId' => 4, 'VisitId' => 5, 'ActionId' => 6, 'Price' => 7, 'UnitId' => 8, 'Amount' => 9, 'Uet' => 10, 'Sum' => 11, 'Date' => 12, 'Number' => 13, 'RefusetypeId' => 14, 'ReexposeitemId' => 15, 'Note' => 16, 'TariffId' => 17, 'ServiceId' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'deleted' => 1, 'masterId' => 2, 'servicedate' => 3, 'eventId' => 4, 'visitId' => 5, 'actionId' => 6, 'price' => 7, 'unitId' => 8, 'amount' => 9, 'uet' => 10, 'sum' => 11, 'date' => 12, 'number' => 13, 'refusetypeId' => 14, 'reexposeitemId' => 15, 'note' => 16, 'tariffId' => 17, 'serviceId' => 18, ),
        BasePeer::TYPE_COLNAME => array (AccountItemPeer::ID => 0, AccountItemPeer::DELETED => 1, AccountItemPeer::MASTER_ID => 2, AccountItemPeer::SERVICEDATE => 3, AccountItemPeer::EVENT_ID => 4, AccountItemPeer::VISIT_ID => 5, AccountItemPeer::ACTION_ID => 6, AccountItemPeer::PRICE => 7, AccountItemPeer::UNIT_ID => 8, AccountItemPeer::AMOUNT => 9, AccountItemPeer::UET => 10, AccountItemPeer::SUM => 11, AccountItemPeer::DATE => 12, AccountItemPeer::NUMBER => 13, AccountItemPeer::REFUSETYPE_ID => 14, AccountItemPeer::REEXPOSEITEM_ID => 15, AccountItemPeer::NOTE => 16, AccountItemPeer::TARIFF_ID => 17, AccountItemPeer::SERVICE_ID => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'DELETED' => 1, 'MASTER_ID' => 2, 'SERVICEDATE' => 3, 'EVENT_ID' => 4, 'VISIT_ID' => 5, 'ACTION_ID' => 6, 'PRICE' => 7, 'UNIT_ID' => 8, 'AMOUNT' => 9, 'UET' => 10, 'SUM' => 11, 'DATE' => 12, 'NUMBER' => 13, 'REFUSETYPE_ID' => 14, 'REEXPOSEITEM_ID' => 15, 'NOTE' => 16, 'TARIFF_ID' => 17, 'SERVICE_ID' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'deleted' => 1, 'master_id' => 2, 'serviceDate' => 3, 'event_id' => 4, 'visit_id' => 5, 'action_id' => 6, 'price' => 7, 'unit_id' => 8, 'amount' => 9, 'uet' => 10, 'sum' => 11, 'date' => 12, 'number' => 13, 'refuseType_id' => 14, 'reexposeItem_id' => 15, 'note' => 16, 'tariff_id' => 17, 'service_id' => 18, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $toNames = AccountItemPeer::getFieldNames($toType);
        $key = isset(AccountItemPeer::$fieldKeys[$fromType][$name]) ? AccountItemPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AccountItemPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AccountItemPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AccountItemPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AccountItemPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AccountItemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AccountItemPeer::ID);
            $criteria->addSelectColumn(AccountItemPeer::DELETED);
            $criteria->addSelectColumn(AccountItemPeer::MASTER_ID);
            $criteria->addSelectColumn(AccountItemPeer::SERVICEDATE);
            $criteria->addSelectColumn(AccountItemPeer::EVENT_ID);
            $criteria->addSelectColumn(AccountItemPeer::VISIT_ID);
            $criteria->addSelectColumn(AccountItemPeer::ACTION_ID);
            $criteria->addSelectColumn(AccountItemPeer::PRICE);
            $criteria->addSelectColumn(AccountItemPeer::UNIT_ID);
            $criteria->addSelectColumn(AccountItemPeer::AMOUNT);
            $criteria->addSelectColumn(AccountItemPeer::UET);
            $criteria->addSelectColumn(AccountItemPeer::SUM);
            $criteria->addSelectColumn(AccountItemPeer::DATE);
            $criteria->addSelectColumn(AccountItemPeer::NUMBER);
            $criteria->addSelectColumn(AccountItemPeer::REFUSETYPE_ID);
            $criteria->addSelectColumn(AccountItemPeer::REEXPOSEITEM_ID);
            $criteria->addSelectColumn(AccountItemPeer::NOTE);
            $criteria->addSelectColumn(AccountItemPeer::TARIFF_ID);
            $criteria->addSelectColumn(AccountItemPeer::SERVICE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.serviceDate');
            $criteria->addSelectColumn($alias . '.event_id');
            $criteria->addSelectColumn($alias . '.visit_id');
            $criteria->addSelectColumn($alias . '.action_id');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.unit_id');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.uet');
            $criteria->addSelectColumn($alias . '.sum');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.number');
            $criteria->addSelectColumn($alias . '.refuseType_id');
            $criteria->addSelectColumn($alias . '.reexposeItem_id');
            $criteria->addSelectColumn($alias . '.note');
            $criteria->addSelectColumn($alias . '.tariff_id');
            $criteria->addSelectColumn($alias . '.service_id');
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
        $criteria->setPrimaryTableName(AccountItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AccountItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AccountItemPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AccountItem
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AccountItemPeer::doSelect($critcopy, $con);
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
        return AccountItemPeer::populateObjects(AccountItemPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AccountItemPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AccountItemPeer::DATABASE_NAME);

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
     * @param      AccountItem $obj A AccountItem object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            AccountItemPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A AccountItem object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof AccountItem) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AccountItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AccountItemPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   AccountItem Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AccountItemPeer::$instances[$key])) {
                return AccountItemPeer::$instances[$key];
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
        foreach (AccountItemPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AccountItemPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Account_Item
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
        $cls = AccountItemPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AccountItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AccountItemPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AccountItemPeer::addInstanceToPool($obj, $key);
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
     * @return array (AccountItem object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AccountItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AccountItemPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AccountItemPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AccountItemPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AccountItemPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(AccountItemPeer::DATABASE_NAME)->getTable(AccountItemPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAccountItemPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAccountItemPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AccountItemTableMap());
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
        return AccountItemPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a AccountItem or Criteria object.
     *
     * @param      mixed $values Criteria or AccountItem object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from AccountItem object
        }

        if ($criteria->containsKey(AccountItemPeer::ID) && $criteria->keyContainsValue(AccountItemPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AccountItemPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(AccountItemPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a AccountItem or Criteria object.
     *
     * @param      mixed $values Criteria or AccountItem object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AccountItemPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AccountItemPeer::ID);
            $value = $criteria->remove(AccountItemPeer::ID);
            if ($value) {
                $selectCriteria->add(AccountItemPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AccountItemPeer::TABLE_NAME);
            }

        } else { // $values is AccountItem object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AccountItemPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Account_Item table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AccountItemPeer::TABLE_NAME, $con, AccountItemPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AccountItemPeer::clearInstancePool();
            AccountItemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a AccountItem or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or AccountItem object or primary key or array of primary keys
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
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AccountItemPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof AccountItem) { // it's a model object
            // invalidate the cache for this single object
            AccountItemPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AccountItemPeer::DATABASE_NAME);
            $criteria->add(AccountItemPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AccountItemPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AccountItemPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            AccountItemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given AccountItem object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      AccountItem $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AccountItemPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AccountItemPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AccountItemPeer::DATABASE_NAME, AccountItemPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return AccountItem
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AccountItemPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AccountItemPeer::DATABASE_NAME);
        $criteria->add(AccountItemPeer::ID, $pk);

        $v = AccountItemPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return AccountItem[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AccountItemPeer::DATABASE_NAME);
            $criteria->add(AccountItemPeer::ID, $pks, Criteria::IN);
            $objs = AccountItemPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAccountItemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAccountItemPeer::buildTableMap();

