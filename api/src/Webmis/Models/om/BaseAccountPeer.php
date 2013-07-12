<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Account;
use Webmis\Models\AccountPeer;
use Webmis\Models\map\AccountTableMap;

/**
 * Base static class for performing query and update operations on the 'Account' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseAccountPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Account';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Account';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AccountTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 21;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 21;

    /** the column name for the id field */
    const ID = 'Account.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Account.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Account.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Account.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Account.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Account.deleted';

    /** the column name for the contract_id field */
    const CONTRACT_ID = 'Account.contract_id';

    /** the column name for the orgStructure_id field */
    const ORGSTRUCTURE_ID = 'Account.orgStructure_id';

    /** the column name for the payer_id field */
    const PAYER_ID = 'Account.payer_id';

    /** the column name for the settleDate field */
    const SETTLEDATE = 'Account.settleDate';

    /** the column name for the number field */
    const NUMBER = 'Account.number';

    /** the column name for the date field */
    const DATE = 'Account.date';

    /** the column name for the amount field */
    const AMOUNT = 'Account.amount';

    /** the column name for the uet field */
    const UET = 'Account.uet';

    /** the column name for the sum field */
    const SUM = 'Account.sum';

    /** the column name for the exposeDate field */
    const EXPOSEDATE = 'Account.exposeDate';

    /** the column name for the payedAmount field */
    const PAYEDAMOUNT = 'Account.payedAmount';

    /** the column name for the payedSum field */
    const PAYEDSUM = 'Account.payedSum';

    /** the column name for the refusedAmount field */
    const REFUSEDAMOUNT = 'Account.refusedAmount';

    /** the column name for the refusedSum field */
    const REFUSEDSUM = 'Account.refusedSum';

    /** the column name for the format_id field */
    const FORMAT_ID = 'Account.format_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Account objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Account[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AccountPeer::$fieldNames[AccountPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'ContractId', 'OrgstructureId', 'PayerId', 'Settledate', 'Number', 'Date', 'Amount', 'Uet', 'Sum', 'Exposedate', 'Payedamount', 'Payedsum', 'Refusedamount', 'Refusedsum', 'FormatId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'contractId', 'orgstructureId', 'payerId', 'settledate', 'number', 'date', 'amount', 'uet', 'sum', 'exposedate', 'payedamount', 'payedsum', 'refusedamount', 'refusedsum', 'formatId', ),
        BasePeer::TYPE_COLNAME => array (AccountPeer::ID, AccountPeer::CREATEDATETIME, AccountPeer::CREATEPERSON_ID, AccountPeer::MODIFYDATETIME, AccountPeer::MODIFYPERSON_ID, AccountPeer::DELETED, AccountPeer::CONTRACT_ID, AccountPeer::ORGSTRUCTURE_ID, AccountPeer::PAYER_ID, AccountPeer::SETTLEDATE, AccountPeer::NUMBER, AccountPeer::DATE, AccountPeer::AMOUNT, AccountPeer::UET, AccountPeer::SUM, AccountPeer::EXPOSEDATE, AccountPeer::PAYEDAMOUNT, AccountPeer::PAYEDSUM, AccountPeer::REFUSEDAMOUNT, AccountPeer::REFUSEDSUM, AccountPeer::FORMAT_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'CONTRACT_ID', 'ORGSTRUCTURE_ID', 'PAYER_ID', 'SETTLEDATE', 'NUMBER', 'DATE', 'AMOUNT', 'UET', 'SUM', 'EXPOSEDATE', 'PAYEDAMOUNT', 'PAYEDSUM', 'REFUSEDAMOUNT', 'REFUSEDSUM', 'FORMAT_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'contract_id', 'orgStructure_id', 'payer_id', 'settleDate', 'number', 'date', 'amount', 'uet', 'sum', 'exposeDate', 'payedAmount', 'payedSum', 'refusedAmount', 'refusedSum', 'format_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AccountPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'ContractId' => 6, 'OrgstructureId' => 7, 'PayerId' => 8, 'Settledate' => 9, 'Number' => 10, 'Date' => 11, 'Amount' => 12, 'Uet' => 13, 'Sum' => 14, 'Exposedate' => 15, 'Payedamount' => 16, 'Payedsum' => 17, 'Refusedamount' => 18, 'Refusedsum' => 19, 'FormatId' => 20, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'contractId' => 6, 'orgstructureId' => 7, 'payerId' => 8, 'settledate' => 9, 'number' => 10, 'date' => 11, 'amount' => 12, 'uet' => 13, 'sum' => 14, 'exposedate' => 15, 'payedamount' => 16, 'payedsum' => 17, 'refusedamount' => 18, 'refusedsum' => 19, 'formatId' => 20, ),
        BasePeer::TYPE_COLNAME => array (AccountPeer::ID => 0, AccountPeer::CREATEDATETIME => 1, AccountPeer::CREATEPERSON_ID => 2, AccountPeer::MODIFYDATETIME => 3, AccountPeer::MODIFYPERSON_ID => 4, AccountPeer::DELETED => 5, AccountPeer::CONTRACT_ID => 6, AccountPeer::ORGSTRUCTURE_ID => 7, AccountPeer::PAYER_ID => 8, AccountPeer::SETTLEDATE => 9, AccountPeer::NUMBER => 10, AccountPeer::DATE => 11, AccountPeer::AMOUNT => 12, AccountPeer::UET => 13, AccountPeer::SUM => 14, AccountPeer::EXPOSEDATE => 15, AccountPeer::PAYEDAMOUNT => 16, AccountPeer::PAYEDSUM => 17, AccountPeer::REFUSEDAMOUNT => 18, AccountPeer::REFUSEDSUM => 19, AccountPeer::FORMAT_ID => 20, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'CONTRACT_ID' => 6, 'ORGSTRUCTURE_ID' => 7, 'PAYER_ID' => 8, 'SETTLEDATE' => 9, 'NUMBER' => 10, 'DATE' => 11, 'AMOUNT' => 12, 'UET' => 13, 'SUM' => 14, 'EXPOSEDATE' => 15, 'PAYEDAMOUNT' => 16, 'PAYEDSUM' => 17, 'REFUSEDAMOUNT' => 18, 'REFUSEDSUM' => 19, 'FORMAT_ID' => 20, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'contract_id' => 6, 'orgStructure_id' => 7, 'payer_id' => 8, 'settleDate' => 9, 'number' => 10, 'date' => 11, 'amount' => 12, 'uet' => 13, 'sum' => 14, 'exposeDate' => 15, 'payedAmount' => 16, 'payedSum' => 17, 'refusedAmount' => 18, 'refusedSum' => 19, 'format_id' => 20, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $toNames = AccountPeer::getFieldNames($toType);
        $key = isset(AccountPeer::$fieldKeys[$fromType][$name]) ? AccountPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AccountPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AccountPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AccountPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AccountPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AccountPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AccountPeer::ID);
            $criteria->addSelectColumn(AccountPeer::CREATEDATETIME);
            $criteria->addSelectColumn(AccountPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(AccountPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(AccountPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(AccountPeer::DELETED);
            $criteria->addSelectColumn(AccountPeer::CONTRACT_ID);
            $criteria->addSelectColumn(AccountPeer::ORGSTRUCTURE_ID);
            $criteria->addSelectColumn(AccountPeer::PAYER_ID);
            $criteria->addSelectColumn(AccountPeer::SETTLEDATE);
            $criteria->addSelectColumn(AccountPeer::NUMBER);
            $criteria->addSelectColumn(AccountPeer::DATE);
            $criteria->addSelectColumn(AccountPeer::AMOUNT);
            $criteria->addSelectColumn(AccountPeer::UET);
            $criteria->addSelectColumn(AccountPeer::SUM);
            $criteria->addSelectColumn(AccountPeer::EXPOSEDATE);
            $criteria->addSelectColumn(AccountPeer::PAYEDAMOUNT);
            $criteria->addSelectColumn(AccountPeer::PAYEDSUM);
            $criteria->addSelectColumn(AccountPeer::REFUSEDAMOUNT);
            $criteria->addSelectColumn(AccountPeer::REFUSEDSUM);
            $criteria->addSelectColumn(AccountPeer::FORMAT_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.contract_id');
            $criteria->addSelectColumn($alias . '.orgStructure_id');
            $criteria->addSelectColumn($alias . '.payer_id');
            $criteria->addSelectColumn($alias . '.settleDate');
            $criteria->addSelectColumn($alias . '.number');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.uet');
            $criteria->addSelectColumn($alias . '.sum');
            $criteria->addSelectColumn($alias . '.exposeDate');
            $criteria->addSelectColumn($alias . '.payedAmount');
            $criteria->addSelectColumn($alias . '.payedSum');
            $criteria->addSelectColumn($alias . '.refusedAmount');
            $criteria->addSelectColumn($alias . '.refusedSum');
            $criteria->addSelectColumn($alias . '.format_id');
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
        $criteria->setPrimaryTableName(AccountPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AccountPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AccountPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Account
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AccountPeer::doSelect($critcopy, $con);
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
        return AccountPeer::populateObjects(AccountPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AccountPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AccountPeer::DATABASE_NAME);

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
     * @param      Account $obj A Account object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            AccountPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Account object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Account) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Account object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AccountPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Account Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AccountPeer::$instances[$key])) {
                return AccountPeer::$instances[$key];
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
        foreach (AccountPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AccountPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Account
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
        $cls = AccountPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AccountPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AccountPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AccountPeer::addInstanceToPool($obj, $key);
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
     * @return array (Account object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AccountPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AccountPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AccountPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AccountPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AccountPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(AccountPeer::DATABASE_NAME)->getTable(AccountPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAccountPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAccountPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AccountTableMap());
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
        return AccountPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Account or Criteria object.
     *
     * @param      mixed $values Criteria or Account object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Account object
        }

        if ($criteria->containsKey(AccountPeer::ID) && $criteria->keyContainsValue(AccountPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AccountPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(AccountPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Account or Criteria object.
     *
     * @param      mixed $values Criteria or Account object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AccountPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AccountPeer::ID);
            $value = $criteria->remove(AccountPeer::ID);
            if ($value) {
                $selectCriteria->add(AccountPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AccountPeer::TABLE_NAME);
            }

        } else { // $values is Account object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AccountPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Account table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AccountPeer::TABLE_NAME, $con, AccountPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AccountPeer::clearInstancePool();
            AccountPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Account or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Account object or primary key or array of primary keys
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
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AccountPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Account) { // it's a model object
            // invalidate the cache for this single object
            AccountPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AccountPeer::DATABASE_NAME);
            $criteria->add(AccountPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AccountPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AccountPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            AccountPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Account object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Account $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AccountPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AccountPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AccountPeer::DATABASE_NAME, AccountPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Account
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AccountPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AccountPeer::DATABASE_NAME);
        $criteria->add(AccountPeer::ID, $pk);

        $v = AccountPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Account[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AccountPeer::DATABASE_NAME);
            $criteria->add(AccountPeer::ID, $pks, Criteria::IN);
            $objs = AccountPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAccountPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAccountPeer::buildTableMap();

