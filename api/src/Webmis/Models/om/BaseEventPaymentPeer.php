<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\EventPayment;
use Webmis\Models\EventPaymentPeer;
use Webmis\Models\RbcashoperationPeer;
use Webmis\Models\map\EventPaymentTableMap;

/**
 * Base static class for performing query and update operations on the 'Event_Payment' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseEventPaymentPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Event_Payment';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\EventPayment';

    /** the related TableMap class for this table */
    const TM_CLASS = 'EventPaymentTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the id field */
    const ID = 'Event_Payment.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Event_Payment.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Event_Payment.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Event_Payment.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Event_Payment.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Event_Payment.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'Event_Payment.master_id';

    /** the column name for the date field */
    const DATE = 'Event_Payment.date';

    /** the column name for the cashOperation_id field */
    const CASHOPERATION_ID = 'Event_Payment.cashOperation_id';

    /** the column name for the sum field */
    const SUM = 'Event_Payment.sum';

    /** the column name for the typePayment field */
    const TYPEPAYMENT = 'Event_Payment.typePayment';

    /** the column name for the settlementAccount field */
    const SETTLEMENTACCOUNT = 'Event_Payment.settlementAccount';

    /** the column name for the bank_id field */
    const BANK_ID = 'Event_Payment.bank_id';

    /** the column name for the numberCreditCard field */
    const NUMBERCREDITCARD = 'Event_Payment.numberCreditCard';

    /** the column name for the cashBox field */
    const CASHBOX = 'Event_Payment.cashBox';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of EventPayment objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array EventPayment[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. EventPaymentPeer::$fieldNames[EventPaymentPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'MasterId', 'Date', 'CashoperationId', 'Sum', 'Typepayment', 'Settlementaccount', 'BankId', 'Numbercreditcard', 'Cashbox', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'masterId', 'date', 'cashoperationId', 'sum', 'typepayment', 'settlementaccount', 'bankId', 'numbercreditcard', 'cashbox', ),
        BasePeer::TYPE_COLNAME => array (EventPaymentPeer::ID, EventPaymentPeer::CREATEDATETIME, EventPaymentPeer::CREATEPERSON_ID, EventPaymentPeer::MODIFYDATETIME, EventPaymentPeer::MODIFYPERSON_ID, EventPaymentPeer::DELETED, EventPaymentPeer::MASTER_ID, EventPaymentPeer::DATE, EventPaymentPeer::CASHOPERATION_ID, EventPaymentPeer::SUM, EventPaymentPeer::TYPEPAYMENT, EventPaymentPeer::SETTLEMENTACCOUNT, EventPaymentPeer::BANK_ID, EventPaymentPeer::NUMBERCREDITCARD, EventPaymentPeer::CASHBOX, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'MASTER_ID', 'DATE', 'CASHOPERATION_ID', 'SUM', 'TYPEPAYMENT', 'SETTLEMENTACCOUNT', 'BANK_ID', 'NUMBERCREDITCARD', 'CASHBOX', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'master_id', 'date', 'cashOperation_id', 'sum', 'typePayment', 'settlementAccount', 'bank_id', 'numberCreditCard', 'cashBox', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. EventPaymentPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'MasterId' => 6, 'Date' => 7, 'CashoperationId' => 8, 'Sum' => 9, 'Typepayment' => 10, 'Settlementaccount' => 11, 'BankId' => 12, 'Numbercreditcard' => 13, 'Cashbox' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'masterId' => 6, 'date' => 7, 'cashoperationId' => 8, 'sum' => 9, 'typepayment' => 10, 'settlementaccount' => 11, 'bankId' => 12, 'numbercreditcard' => 13, 'cashbox' => 14, ),
        BasePeer::TYPE_COLNAME => array (EventPaymentPeer::ID => 0, EventPaymentPeer::CREATEDATETIME => 1, EventPaymentPeer::CREATEPERSON_ID => 2, EventPaymentPeer::MODIFYDATETIME => 3, EventPaymentPeer::MODIFYPERSON_ID => 4, EventPaymentPeer::DELETED => 5, EventPaymentPeer::MASTER_ID => 6, EventPaymentPeer::DATE => 7, EventPaymentPeer::CASHOPERATION_ID => 8, EventPaymentPeer::SUM => 9, EventPaymentPeer::TYPEPAYMENT => 10, EventPaymentPeer::SETTLEMENTACCOUNT => 11, EventPaymentPeer::BANK_ID => 12, EventPaymentPeer::NUMBERCREDITCARD => 13, EventPaymentPeer::CASHBOX => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'MASTER_ID' => 6, 'DATE' => 7, 'CASHOPERATION_ID' => 8, 'SUM' => 9, 'TYPEPAYMENT' => 10, 'SETTLEMENTACCOUNT' => 11, 'BANK_ID' => 12, 'NUMBERCREDITCARD' => 13, 'CASHBOX' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'master_id' => 6, 'date' => 7, 'cashOperation_id' => 8, 'sum' => 9, 'typePayment' => 10, 'settlementAccount' => 11, 'bank_id' => 12, 'numberCreditCard' => 13, 'cashBox' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = EventPaymentPeer::getFieldNames($toType);
        $key = isset(EventPaymentPeer::$fieldKeys[$fromType][$name]) ? EventPaymentPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(EventPaymentPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, EventPaymentPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return EventPaymentPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. EventPaymentPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(EventPaymentPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(EventPaymentPeer::ID);
            $criteria->addSelectColumn(EventPaymentPeer::CREATEDATETIME);
            $criteria->addSelectColumn(EventPaymentPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(EventPaymentPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(EventPaymentPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(EventPaymentPeer::DELETED);
            $criteria->addSelectColumn(EventPaymentPeer::MASTER_ID);
            $criteria->addSelectColumn(EventPaymentPeer::DATE);
            $criteria->addSelectColumn(EventPaymentPeer::CASHOPERATION_ID);
            $criteria->addSelectColumn(EventPaymentPeer::SUM);
            $criteria->addSelectColumn(EventPaymentPeer::TYPEPAYMENT);
            $criteria->addSelectColumn(EventPaymentPeer::SETTLEMENTACCOUNT);
            $criteria->addSelectColumn(EventPaymentPeer::BANK_ID);
            $criteria->addSelectColumn(EventPaymentPeer::NUMBERCREDITCARD);
            $criteria->addSelectColumn(EventPaymentPeer::CASHBOX);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.cashOperation_id');
            $criteria->addSelectColumn($alias . '.sum');
            $criteria->addSelectColumn($alias . '.typePayment');
            $criteria->addSelectColumn($alias . '.settlementAccount');
            $criteria->addSelectColumn($alias . '.bank_id');
            $criteria->addSelectColumn($alias . '.numberCreditCard');
            $criteria->addSelectColumn($alias . '.cashBox');
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
        $criteria->setPrimaryTableName(EventPaymentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventPaymentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventPayment
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = EventPaymentPeer::doSelect($critcopy, $con);
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
        return EventPaymentPeer::populateObjects(EventPaymentPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            EventPaymentPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);

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
     * @param      EventPayment $obj A EventPayment object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            EventPaymentPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A EventPayment object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof EventPayment) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or EventPayment object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(EventPaymentPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   EventPayment Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(EventPaymentPeer::$instances[$key])) {
                return EventPaymentPeer::$instances[$key];
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
        foreach (EventPaymentPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        EventPaymentPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Event_Payment
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
        $cls = EventPaymentPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = EventPaymentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = EventPaymentPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EventPaymentPeer::addInstanceToPool($obj, $key);
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
     * @return array (EventPayment object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = EventPaymentPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = EventPaymentPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + EventPaymentPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EventPaymentPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            EventPaymentPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbcashoperation table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbcashoperation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventPaymentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventPaymentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventPaymentPeer::CASHOPERATION_ID, RbcashoperationPeer::ID, $join_behavior);

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
     * Selects a collection of EventPayment objects pre-filled with their Rbcashoperation objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of EventPayment objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbcashoperation(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);
        }

        EventPaymentPeer::addSelectColumns($criteria);
        $startcol = EventPaymentPeer::NUM_HYDRATE_COLUMNS;
        RbcashoperationPeer::addSelectColumns($criteria);

        $criteria->addJoin(EventPaymentPeer::CASHOPERATION_ID, RbcashoperationPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventPaymentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventPaymentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = EventPaymentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventPaymentPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbcashoperationPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbcashoperationPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbcashoperationPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbcashoperationPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (EventPayment) to $obj2 (Rbcashoperation)
                $obj2->addEventPayment($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventPaymentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventPaymentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventPaymentPeer::CASHOPERATION_ID, RbcashoperationPeer::ID, $join_behavior);

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
     * Selects a collection of EventPayment objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of EventPayment objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);
        }

        EventPaymentPeer::addSelectColumns($criteria);
        $startcol2 = EventPaymentPeer::NUM_HYDRATE_COLUMNS;

        RbcashoperationPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbcashoperationPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(EventPaymentPeer::CASHOPERATION_ID, RbcashoperationPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventPaymentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventPaymentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = EventPaymentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventPaymentPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbcashoperation rows

            $key2 = RbcashoperationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbcashoperationPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbcashoperationPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbcashoperationPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (EventPayment) to the collection in $obj2 (Rbcashoperation)
                $obj2->addEventPayment($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        return Propel::getDatabaseMap(EventPaymentPeer::DATABASE_NAME)->getTable(EventPaymentPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseEventPaymentPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseEventPaymentPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new EventPaymentTableMap());
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
        return EventPaymentPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a EventPayment or Criteria object.
     *
     * @param      mixed $values Criteria or EventPayment object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from EventPayment object
        }

        if ($criteria->containsKey(EventPaymentPeer::ID) && $criteria->keyContainsValue(EventPaymentPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventPaymentPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a EventPayment or Criteria object.
     *
     * @param      mixed $values Criteria or EventPayment object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(EventPaymentPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(EventPaymentPeer::ID);
            $value = $criteria->remove(EventPaymentPeer::ID);
            if ($value) {
                $selectCriteria->add(EventPaymentPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(EventPaymentPeer::TABLE_NAME);
            }

        } else { // $values is EventPayment object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Event_Payment table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(EventPaymentPeer::TABLE_NAME, $con, EventPaymentPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EventPaymentPeer::clearInstancePool();
            EventPaymentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a EventPayment or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or EventPayment object or primary key or array of primary keys
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
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            EventPaymentPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof EventPayment) { // it's a model object
            // invalidate the cache for this single object
            EventPaymentPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EventPaymentPeer::DATABASE_NAME);
            $criteria->add(EventPaymentPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                EventPaymentPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(EventPaymentPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            EventPaymentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given EventPayment object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      EventPayment $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(EventPaymentPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(EventPaymentPeer::TABLE_NAME);

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

        return BasePeer::doValidate(EventPaymentPeer::DATABASE_NAME, EventPaymentPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return EventPayment
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = EventPaymentPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(EventPaymentPeer::DATABASE_NAME);
        $criteria->add(EventPaymentPeer::ID, $pk);

        $v = EventPaymentPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return EventPayment[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(EventPaymentPeer::DATABASE_NAME);
            $criteria->add(EventPaymentPeer::ID, $pks, Criteria::IN);
            $objs = EventPaymentPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseEventPaymentPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEventPaymentPeer::buildTableMap();

