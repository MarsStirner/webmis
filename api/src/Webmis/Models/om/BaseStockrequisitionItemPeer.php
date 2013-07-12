<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\RbfinancePeer;
use Webmis\Models\RbnomenclaturePeer;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\StockrequisitionItemPeer;
use Webmis\Models\StockrequisitionPeer;
use Webmis\Models\map\StockrequisitionItemTableMap;

/**
 * Base static class for performing query and update operations on the 'StockRequisition_Item' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseStockrequisitionItemPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'StockRequisition_Item';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\StockrequisitionItem';

    /** the related TableMap class for this table */
    const TM_CLASS = 'StockrequisitionItemTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the id field */
    const ID = 'StockRequisition_Item.id';

    /** the column name for the master_id field */
    const MASTER_ID = 'StockRequisition_Item.master_id';

    /** the column name for the idx field */
    const IDX = 'StockRequisition_Item.idx';

    /** the column name for the nomenclature_id field */
    const NOMENCLATURE_ID = 'StockRequisition_Item.nomenclature_id';

    /** the column name for the finance_id field */
    const FINANCE_ID = 'StockRequisition_Item.finance_id';

    /** the column name for the qnt field */
    const QNT = 'StockRequisition_Item.qnt';

    /** the column name for the satisfiedQnt field */
    const SATISFIEDQNT = 'StockRequisition_Item.satisfiedQnt';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of StockrequisitionItem objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array StockrequisitionItem[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. StockrequisitionItemPeer::$fieldNames[StockrequisitionItemPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'MasterId', 'Idx', 'NomenclatureId', 'FinanceId', 'Qnt', 'Satisfiedqnt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'masterId', 'idx', 'nomenclatureId', 'financeId', 'qnt', 'satisfiedqnt', ),
        BasePeer::TYPE_COLNAME => array (StockrequisitionItemPeer::ID, StockrequisitionItemPeer::MASTER_ID, StockrequisitionItemPeer::IDX, StockrequisitionItemPeer::NOMENCLATURE_ID, StockrequisitionItemPeer::FINANCE_ID, StockrequisitionItemPeer::QNT, StockrequisitionItemPeer::SATISFIEDQNT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'MASTER_ID', 'IDX', 'NOMENCLATURE_ID', 'FINANCE_ID', 'QNT', 'SATISFIEDQNT', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'master_id', 'idx', 'nomenclature_id', 'finance_id', 'qnt', 'satisfiedQnt', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. StockrequisitionItemPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'MasterId' => 1, 'Idx' => 2, 'NomenclatureId' => 3, 'FinanceId' => 4, 'Qnt' => 5, 'Satisfiedqnt' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'masterId' => 1, 'idx' => 2, 'nomenclatureId' => 3, 'financeId' => 4, 'qnt' => 5, 'satisfiedqnt' => 6, ),
        BasePeer::TYPE_COLNAME => array (StockrequisitionItemPeer::ID => 0, StockrequisitionItemPeer::MASTER_ID => 1, StockrequisitionItemPeer::IDX => 2, StockrequisitionItemPeer::NOMENCLATURE_ID => 3, StockrequisitionItemPeer::FINANCE_ID => 4, StockrequisitionItemPeer::QNT => 5, StockrequisitionItemPeer::SATISFIEDQNT => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'MASTER_ID' => 1, 'IDX' => 2, 'NOMENCLATURE_ID' => 3, 'FINANCE_ID' => 4, 'QNT' => 5, 'SATISFIEDQNT' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'master_id' => 1, 'idx' => 2, 'nomenclature_id' => 3, 'finance_id' => 4, 'qnt' => 5, 'satisfiedQnt' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
        $toNames = StockrequisitionItemPeer::getFieldNames($toType);
        $key = isset(StockrequisitionItemPeer::$fieldKeys[$fromType][$name]) ? StockrequisitionItemPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(StockrequisitionItemPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, StockrequisitionItemPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return StockrequisitionItemPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. StockrequisitionItemPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(StockrequisitionItemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(StockrequisitionItemPeer::ID);
            $criteria->addSelectColumn(StockrequisitionItemPeer::MASTER_ID);
            $criteria->addSelectColumn(StockrequisitionItemPeer::IDX);
            $criteria->addSelectColumn(StockrequisitionItemPeer::NOMENCLATURE_ID);
            $criteria->addSelectColumn(StockrequisitionItemPeer::FINANCE_ID);
            $criteria->addSelectColumn(StockrequisitionItemPeer::QNT);
            $criteria->addSelectColumn(StockrequisitionItemPeer::SATISFIEDQNT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.idx');
            $criteria->addSelectColumn($alias . '.nomenclature_id');
            $criteria->addSelectColumn($alias . '.finance_id');
            $criteria->addSelectColumn($alias . '.qnt');
            $criteria->addSelectColumn($alias . '.satisfiedQnt');
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
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StockrequisitionItem
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = StockrequisitionItemPeer::doSelect($critcopy, $con);
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
        return StockrequisitionItemPeer::populateObjects(StockrequisitionItemPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

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
     * @param      StockrequisitionItem $obj A StockrequisitionItem object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            StockrequisitionItemPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A StockrequisitionItem object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof StockrequisitionItem) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or StockrequisitionItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(StockrequisitionItemPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   StockrequisitionItem Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(StockrequisitionItemPeer::$instances[$key])) {
                return StockrequisitionItemPeer::$instances[$key];
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
        foreach (StockrequisitionItemPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        StockrequisitionItemPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to StockRequisition_Item
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
        $cls = StockrequisitionItemPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = StockrequisitionItemPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StockrequisitionItemPeer::addInstanceToPool($obj, $key);
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
     * @return array (StockrequisitionItem object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = StockrequisitionItemPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StockrequisitionItemPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            StockrequisitionItemPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbfinance table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbfinance(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Stockrequisition table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStockrequisition(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbnomenclature table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbnomenclature(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

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
     * Selects a collection of StockrequisitionItem objects pre-filled with their Rbfinance objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbfinance(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;
        RbfinancePeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbfinancePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbfinancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbfinancePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StockrequisitionItem) to $obj2 (Rbfinance)
                $obj2->addStockrequisitionItem($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StockrequisitionItem objects pre-filled with their Stockrequisition objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStockrequisition(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;
        StockrequisitionPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StockrequisitionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StockrequisitionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StockrequisitionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StockrequisitionItem) to $obj2 (Stockrequisition)
                $obj2->addStockrequisitionItem($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StockrequisitionItem objects pre-filled with their Rbnomenclature objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbnomenclature(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;
        RbnomenclaturePeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbnomenclaturePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbnomenclaturePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbnomenclaturePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StockrequisitionItem) to $obj2 (Rbnomenclature)
                $obj2->addStockrequisitionItem($obj1);

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
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

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
     * Selects a collection of StockrequisitionItem objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbfinance rows

            $key2 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbfinancePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbfinancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbfinancePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj2 (Rbfinance)
                $obj2->addStockrequisitionItem($obj1);
            } // if joined row not null

            // Add objects for joined Stockrequisition rows

            $key3 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = StockrequisitionPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = StockrequisitionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    StockrequisitionPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj3 (Stockrequisition)
                $obj3->addStockrequisitionItem($obj1);
            } // if joined row not null

            // Add objects for joined Rbnomenclature rows

            $key4 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = RbnomenclaturePeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = RbnomenclaturePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbnomenclaturePeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj4 (Rbnomenclature)
                $obj4->addStockrequisitionItem($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbfinance table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbfinance(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Stockrequisition table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStockrequisition(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbnomenclature table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbnomenclature(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

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
     * Selects a collection of StockrequisitionItem objects pre-filled with all related objects except Rbfinance.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbfinance(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Stockrequisition rows

                $key2 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = StockrequisitionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = StockrequisitionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    StockrequisitionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj2 (Stockrequisition)
                $obj2->addStockrequisitionItem($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key3 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbnomenclaturePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbnomenclaturePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj3 (Rbnomenclature)
                $obj3->addStockrequisitionItem($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StockrequisitionItem objects pre-filled with all related objects except Stockrequisition.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStockrequisition(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::NOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbfinance rows

                $key2 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbfinancePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbfinancePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj2 (Rbfinance)
                $obj2->addStockrequisitionItem($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key3 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbnomenclaturePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbnomenclaturePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj3 (Rbnomenclature)
                $obj3->addStockrequisitionItem($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StockrequisitionItem objects pre-filled with all related objects except Rbnomenclature.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StockrequisitionItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbnomenclature(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);
        }

        StockrequisitionItemPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionItemPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionItemPeer::FINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionItemPeer::MASTER_ID, StockrequisitionPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbfinance rows

                $key2 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbfinancePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbfinancePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj2 (Rbfinance)
                $obj2->addStockrequisitionItem($obj1);

            } // if joined row is not null

                // Add objects for joined Stockrequisition rows

                $key3 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = StockrequisitionPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = StockrequisitionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    StockrequisitionPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StockrequisitionItem) to the collection in $obj3 (Stockrequisition)
                $obj3->addStockrequisitionItem($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(StockrequisitionItemPeer::DATABASE_NAME)->getTable(StockrequisitionItemPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseStockrequisitionItemPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseStockrequisitionItemPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new StockrequisitionItemTableMap());
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
        return StockrequisitionItemPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a StockrequisitionItem or Criteria object.
     *
     * @param      mixed $values Criteria or StockrequisitionItem object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from StockrequisitionItem object
        }

        if ($criteria->containsKey(StockrequisitionItemPeer::ID) && $criteria->keyContainsValue(StockrequisitionItemPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StockrequisitionItemPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a StockrequisitionItem or Criteria object.
     *
     * @param      mixed $values Criteria or StockrequisitionItem object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(StockrequisitionItemPeer::ID);
            $value = $criteria->remove(StockrequisitionItemPeer::ID);
            if ($value) {
                $selectCriteria->add(StockrequisitionItemPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(StockrequisitionItemPeer::TABLE_NAME);
            }

        } else { // $values is StockrequisitionItem object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the StockRequisition_Item table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(StockrequisitionItemPeer::TABLE_NAME, $con, StockrequisitionItemPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StockrequisitionItemPeer::clearInstancePool();
            StockrequisitionItemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a StockrequisitionItem or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or StockrequisitionItem object or primary key or array of primary keys
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
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            StockrequisitionItemPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof StockrequisitionItem) { // it's a model object
            // invalidate the cache for this single object
            StockrequisitionItemPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);
            $criteria->add(StockrequisitionItemPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                StockrequisitionItemPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionItemPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            StockrequisitionItemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given StockrequisitionItem object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      StockrequisitionItem $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(StockrequisitionItemPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(StockrequisitionItemPeer::TABLE_NAME);

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

        return BasePeer::doValidate(StockrequisitionItemPeer::DATABASE_NAME, StockrequisitionItemPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return StockrequisitionItem
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = StockrequisitionItemPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);
        $criteria->add(StockrequisitionItemPeer::ID, $pk);

        $v = StockrequisitionItemPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return StockrequisitionItem[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);
            $criteria->add(StockrequisitionItemPeer::ID, $pks, Criteria::IN);
            $objs = StockrequisitionItemPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseStockrequisitionItemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseStockrequisitionItemPeer::buildTableMap();

