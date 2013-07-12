<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\OrgstructurePeer;
use Webmis\Models\RbfinancePeer;
use Webmis\Models\RbnomenclaturePeer;
use Webmis\Models\StockmotionItemPeer;
use Webmis\Models\Stocktrans;
use Webmis\Models\StocktransPeer;
use Webmis\Models\map\StocktransTableMap;

/**
 * Base static class for performing query and update operations on the 'StockTrans' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseStocktransPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'StockTrans';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Stocktrans';

    /** the related TableMap class for this table */
    const TM_CLASS = 'StocktransTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the id field */
    const ID = 'StockTrans.id';

    /** the column name for the stockMotionItem_id field */
    const STOCKMOTIONITEM_ID = 'StockTrans.stockMotionItem_id';

    /** the column name for the date field */
    const DATE = 'StockTrans.date';

    /** the column name for the qnt field */
    const QNT = 'StockTrans.qnt';

    /** the column name for the sum field */
    const SUM = 'StockTrans.sum';

    /** the column name for the debOrgStructure_id field */
    const DEBORGSTRUCTURE_ID = 'StockTrans.debOrgStructure_id';

    /** the column name for the debNomenclature_id field */
    const DEBNOMENCLATURE_ID = 'StockTrans.debNomenclature_id';

    /** the column name for the debFinance_id field */
    const DEBFINANCE_ID = 'StockTrans.debFinance_id';

    /** the column name for the creOrgStructure_id field */
    const CREORGSTRUCTURE_ID = 'StockTrans.creOrgStructure_id';

    /** the column name for the creNomenclature_id field */
    const CRENOMENCLATURE_ID = 'StockTrans.creNomenclature_id';

    /** the column name for the creFinance_id field */
    const CREFINANCE_ID = 'StockTrans.creFinance_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Stocktrans objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Stocktrans[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. StocktransPeer::$fieldNames[StocktransPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'StockmotionitemId', 'Date', 'Qnt', 'Sum', 'DeborgstructureId', 'DebnomenclatureId', 'DebfinanceId', 'CreorgstructureId', 'CrenomenclatureId', 'CrefinanceId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'stockmotionitemId', 'date', 'qnt', 'sum', 'deborgstructureId', 'debnomenclatureId', 'debfinanceId', 'creorgstructureId', 'crenomenclatureId', 'crefinanceId', ),
        BasePeer::TYPE_COLNAME => array (StocktransPeer::ID, StocktransPeer::STOCKMOTIONITEM_ID, StocktransPeer::DATE, StocktransPeer::QNT, StocktransPeer::SUM, StocktransPeer::DEBORGSTRUCTURE_ID, StocktransPeer::DEBNOMENCLATURE_ID, StocktransPeer::DEBFINANCE_ID, StocktransPeer::CREORGSTRUCTURE_ID, StocktransPeer::CRENOMENCLATURE_ID, StocktransPeer::CREFINANCE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'STOCKMOTIONITEM_ID', 'DATE', 'QNT', 'SUM', 'DEBORGSTRUCTURE_ID', 'DEBNOMENCLATURE_ID', 'DEBFINANCE_ID', 'CREORGSTRUCTURE_ID', 'CRENOMENCLATURE_ID', 'CREFINANCE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'stockMotionItem_id', 'date', 'qnt', 'sum', 'debOrgStructure_id', 'debNomenclature_id', 'debFinance_id', 'creOrgStructure_id', 'creNomenclature_id', 'creFinance_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. StocktransPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'StockmotionitemId' => 1, 'Date' => 2, 'Qnt' => 3, 'Sum' => 4, 'DeborgstructureId' => 5, 'DebnomenclatureId' => 6, 'DebfinanceId' => 7, 'CreorgstructureId' => 8, 'CrenomenclatureId' => 9, 'CrefinanceId' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'stockmotionitemId' => 1, 'date' => 2, 'qnt' => 3, 'sum' => 4, 'deborgstructureId' => 5, 'debnomenclatureId' => 6, 'debfinanceId' => 7, 'creorgstructureId' => 8, 'crenomenclatureId' => 9, 'crefinanceId' => 10, ),
        BasePeer::TYPE_COLNAME => array (StocktransPeer::ID => 0, StocktransPeer::STOCKMOTIONITEM_ID => 1, StocktransPeer::DATE => 2, StocktransPeer::QNT => 3, StocktransPeer::SUM => 4, StocktransPeer::DEBORGSTRUCTURE_ID => 5, StocktransPeer::DEBNOMENCLATURE_ID => 6, StocktransPeer::DEBFINANCE_ID => 7, StocktransPeer::CREORGSTRUCTURE_ID => 8, StocktransPeer::CRENOMENCLATURE_ID => 9, StocktransPeer::CREFINANCE_ID => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'STOCKMOTIONITEM_ID' => 1, 'DATE' => 2, 'QNT' => 3, 'SUM' => 4, 'DEBORGSTRUCTURE_ID' => 5, 'DEBNOMENCLATURE_ID' => 6, 'DEBFINANCE_ID' => 7, 'CREORGSTRUCTURE_ID' => 8, 'CRENOMENCLATURE_ID' => 9, 'CREFINANCE_ID' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'stockMotionItem_id' => 1, 'date' => 2, 'qnt' => 3, 'sum' => 4, 'debOrgStructure_id' => 5, 'debNomenclature_id' => 6, 'debFinance_id' => 7, 'creOrgStructure_id' => 8, 'creNomenclature_id' => 9, 'creFinance_id' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $toNames = StocktransPeer::getFieldNames($toType);
        $key = isset(StocktransPeer::$fieldKeys[$fromType][$name]) ? StocktransPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(StocktransPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, StocktransPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return StocktransPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. StocktransPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(StocktransPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(StocktransPeer::ID);
            $criteria->addSelectColumn(StocktransPeer::STOCKMOTIONITEM_ID);
            $criteria->addSelectColumn(StocktransPeer::DATE);
            $criteria->addSelectColumn(StocktransPeer::QNT);
            $criteria->addSelectColumn(StocktransPeer::SUM);
            $criteria->addSelectColumn(StocktransPeer::DEBORGSTRUCTURE_ID);
            $criteria->addSelectColumn(StocktransPeer::DEBNOMENCLATURE_ID);
            $criteria->addSelectColumn(StocktransPeer::DEBFINANCE_ID);
            $criteria->addSelectColumn(StocktransPeer::CREORGSTRUCTURE_ID);
            $criteria->addSelectColumn(StocktransPeer::CRENOMENCLATURE_ID);
            $criteria->addSelectColumn(StocktransPeer::CREFINANCE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.stockMotionItem_id');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.qnt');
            $criteria->addSelectColumn($alias . '.sum');
            $criteria->addSelectColumn($alias . '.debOrgStructure_id');
            $criteria->addSelectColumn($alias . '.debNomenclature_id');
            $criteria->addSelectColumn($alias . '.debFinance_id');
            $criteria->addSelectColumn($alias . '.creOrgStructure_id');
            $criteria->addSelectColumn($alias . '.creNomenclature_id');
            $criteria->addSelectColumn($alias . '.creFinance_id');
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
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(StocktransPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stocktrans
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = StocktransPeer::doSelect($critcopy, $con);
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
        return StocktransPeer::populateObjects(StocktransPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            StocktransPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

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
     * @param      Stocktrans $obj A Stocktrans object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            StocktransPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Stocktrans object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Stocktrans) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Stocktrans object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(StocktransPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Stocktrans Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(StocktransPeer::$instances[$key])) {
                return StocktransPeer::$instances[$key];
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
        foreach (StocktransPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        StocktransPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to StockTrans
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

        return (string) $row[$startcol];
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
        $cls = StocktransPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = StocktransPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StocktransPeer::addInstanceToPool($obj, $key);
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
     * @return array (Stocktrans object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = StocktransPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = StocktransPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + StocktransPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StocktransPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            StocktransPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related RbfinanceRelatedByCrefinanceId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbfinanceRelatedByCrefinanceId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RbnomenclatureRelatedByCrenomenclatureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbnomenclatureRelatedByCrenomenclatureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByCreorgstructureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrgstructureRelatedByCreorgstructureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RbfinanceRelatedByDebfinanceId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbfinanceRelatedByDebfinanceId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RbnomenclatureRelatedByDebnomenclatureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbnomenclatureRelatedByDebnomenclatureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByDeborgstructureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrgstructureRelatedByDeborgstructureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StockmotionItem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStockmotionItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Selects a collection of Stocktrans objects pre-filled with their Rbfinance objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbfinanceRelatedByCrefinanceId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        RbfinancePeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with their Rbnomenclature objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbnomenclatureRelatedByCrenomenclatureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        RbnomenclaturePeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to $obj2 (Rbnomenclature)
                $obj2->addStocktransRelatedByCrenomenclatureId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with their Orgstructure objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrgstructureRelatedByCreorgstructureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        OrgstructurePeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = OrgstructurePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrgstructurePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    OrgstructurePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Stocktrans) to $obj2 (Orgstructure)
                $obj2->addStocktransRelatedByCreorgstructureId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with their Rbfinance objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbfinanceRelatedByDebfinanceId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        RbfinancePeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByDebfinanceId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with their Rbnomenclature objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbnomenclatureRelatedByDebnomenclatureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        RbnomenclaturePeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to $obj2 (Rbnomenclature)
                $obj2->addStocktransRelatedByDebnomenclatureId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with their Orgstructure objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrgstructureRelatedByDeborgstructureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        OrgstructurePeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = OrgstructurePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrgstructurePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    OrgstructurePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Stocktrans) to $obj2 (Orgstructure)
                $obj2->addStocktransRelatedByDeborgstructureId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with their StockmotionItem objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStockmotionItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol = StocktransPeer::NUM_HYDRATE_COLUMNS;
        StockmotionItemPeer::addSelectColumns($criteria);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StockmotionItemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StockmotionItemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StockmotionItemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Stocktrans) to $obj2 (StockmotionItem)
                $obj2->addStocktrans($obj1);

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
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Selects a collection of Stocktrans objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);
            } // if joined row not null

            // Add objects for joined Rbnomenclature rows

            $key3 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RbnomenclaturePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RbnomenclaturePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbnomenclaturePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Rbnomenclature)
                $obj3->addStocktransRelatedByCrenomenclatureId($obj1);
            } // if joined row not null

            // Add objects for joined Orgstructure rows

            $key4 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = OrgstructurePeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = OrgstructurePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    OrgstructurePeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Orgstructure)
                $obj4->addStocktransRelatedByCreorgstructureId($obj1);
            } // if joined row not null

            // Add objects for joined Rbfinance rows

            $key5 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = RbfinancePeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = RbfinancePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbfinancePeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Rbfinance)
                $obj5->addStocktransRelatedByDebfinanceId($obj1);
            } // if joined row not null

            // Add objects for joined Rbnomenclature rows

            $key6 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = RbnomenclaturePeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = RbnomenclaturePeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RbnomenclaturePeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (Rbnomenclature)
                $obj6->addStocktransRelatedByDebnomenclatureId($obj1);
            } // if joined row not null

            // Add objects for joined Orgstructure rows

            $key7 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = OrgstructurePeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = OrgstructurePeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    OrgstructurePeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj7 (Orgstructure)
                $obj7->addStocktransRelatedByDeborgstructureId($obj1);
            } // if joined row not null

            // Add objects for joined StockmotionItem rows

            $key8 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = StockmotionItemPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = StockmotionItemPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StockmotionItemPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj8 (StockmotionItem)
                $obj8->addStocktrans($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related RbfinanceRelatedByCrefinanceId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbfinanceRelatedByCrefinanceId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RbnomenclatureRelatedByCrenomenclatureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbnomenclatureRelatedByCrenomenclatureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByCreorgstructureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrgstructureRelatedByCreorgstructureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RbfinanceRelatedByDebfinanceId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbfinanceRelatedByDebfinanceId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RbnomenclatureRelatedByDebnomenclatureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbnomenclatureRelatedByDebnomenclatureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByDeborgstructureId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrgstructureRelatedByDeborgstructureId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StockmotionItem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStockmotionItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StocktransPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Selects a collection of Stocktrans objects pre-filled with all related objects except RbfinanceRelatedByCrefinanceId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbfinanceRelatedByCrefinanceId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbnomenclature rows

                $key2 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbnomenclaturePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbnomenclaturePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbnomenclature)
                $obj2->addStocktransRelatedByCrenomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key3 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = OrgstructurePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    OrgstructurePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Orgstructure)
                $obj3->addStocktransRelatedByCreorgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key4 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbnomenclaturePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbnomenclaturePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Rbnomenclature)
                $obj4->addStocktransRelatedByDebnomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key5 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = OrgstructurePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    OrgstructurePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Orgstructure)
                $obj5->addStocktransRelatedByDeborgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined StockmotionItem rows

                $key6 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StockmotionItemPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = StockmotionItemPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StockmotionItemPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (StockmotionItem)
                $obj6->addStocktrans($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with all related objects except RbnomenclatureRelatedByCrenomenclatureId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbnomenclatureRelatedByCrenomenclatureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key3 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = OrgstructurePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    OrgstructurePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Orgstructure)
                $obj3->addStocktransRelatedByCreorgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbfinance rows

                $key4 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbfinancePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbfinancePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Rbfinance)
                $obj4->addStocktransRelatedByDebfinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key5 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = OrgstructurePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    OrgstructurePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Orgstructure)
                $obj5->addStocktransRelatedByDeborgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined StockmotionItem rows

                $key6 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StockmotionItemPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = StockmotionItemPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StockmotionItemPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (StockmotionItem)
                $obj6->addStocktrans($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with all related objects except OrgstructureRelatedByCreorgstructureId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrgstructureRelatedByCreorgstructureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);

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

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Rbnomenclature)
                $obj3->addStocktransRelatedByCrenomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbfinance rows

                $key4 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbfinancePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbfinancePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Rbfinance)
                $obj4->addStocktransRelatedByDebfinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key5 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbnomenclaturePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbnomenclaturePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Rbnomenclature)
                $obj5->addStocktransRelatedByDebnomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined StockmotionItem rows

                $key6 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StockmotionItemPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = StockmotionItemPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StockmotionItemPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (StockmotionItem)
                $obj6->addStocktrans($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with all related objects except RbfinanceRelatedByDebfinanceId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbfinanceRelatedByDebfinanceId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbnomenclature rows

                $key2 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbnomenclaturePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbnomenclaturePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbnomenclature)
                $obj2->addStocktransRelatedByCrenomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key3 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = OrgstructurePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    OrgstructurePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Orgstructure)
                $obj3->addStocktransRelatedByCreorgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key4 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbnomenclaturePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbnomenclaturePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Rbnomenclature)
                $obj4->addStocktransRelatedByDebnomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key5 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = OrgstructurePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    OrgstructurePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Orgstructure)
                $obj5->addStocktransRelatedByDeborgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined StockmotionItem rows

                $key6 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StockmotionItemPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = StockmotionItemPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StockmotionItemPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (StockmotionItem)
                $obj6->addStocktrans($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with all related objects except RbnomenclatureRelatedByDebnomenclatureId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbnomenclatureRelatedByDebnomenclatureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key3 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = OrgstructurePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    OrgstructurePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Orgstructure)
                $obj3->addStocktransRelatedByCreorgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbfinance rows

                $key4 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbfinancePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbfinancePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Rbfinance)
                $obj4->addStocktransRelatedByDebfinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key5 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = OrgstructurePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    OrgstructurePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Orgstructure)
                $obj5->addStocktransRelatedByDeborgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined StockmotionItem rows

                $key6 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StockmotionItemPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = StockmotionItemPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StockmotionItemPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (StockmotionItem)
                $obj6->addStocktrans($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with all related objects except OrgstructureRelatedByDeborgstructureId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrgstructureRelatedByDeborgstructureId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        StockmotionItemPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StockmotionItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::STOCKMOTIONITEM_ID, StockmotionItemPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);

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

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Rbnomenclature)
                $obj3->addStocktransRelatedByCrenomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbfinance rows

                $key4 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbfinancePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbfinancePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Rbfinance)
                $obj4->addStocktransRelatedByDebfinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key5 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbnomenclaturePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbnomenclaturePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Rbnomenclature)
                $obj5->addStocktransRelatedByDebnomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined StockmotionItem rows

                $key6 = StockmotionItemPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StockmotionItemPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = StockmotionItemPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StockmotionItemPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (StockmotionItem)
                $obj6->addStocktrans($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stocktrans objects pre-filled with all related objects except StockmotionItem.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stocktrans objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStockmotionItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StocktransPeer::DATABASE_NAME);
        }

        StocktransPeer::addSelectColumns($criteria);
        $startcol2 = StocktransPeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        RbfinancePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbfinancePeer::NUM_HYDRATE_COLUMNS;

        RbnomenclaturePeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RbnomenclaturePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StocktransPeer::CREFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CRENOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::CREORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBFINANCE_ID, RbfinancePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBNOMENCLATURE_ID, RbnomenclaturePeer::ID, $join_behavior);

        $criteria->addJoin(StocktransPeer::DEBORGSTRUCTURE_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StocktransPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StocktransPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StocktransPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StocktransPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stocktrans) to the collection in $obj2 (Rbfinance)
                $obj2->addStocktransRelatedByCrefinanceId($obj1);

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

                // Add the $obj1 (Stocktrans) to the collection in $obj3 (Rbnomenclature)
                $obj3->addStocktransRelatedByCrenomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key4 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = OrgstructurePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    OrgstructurePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj4 (Orgstructure)
                $obj4->addStocktransRelatedByCreorgstructureId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbfinance rows

                $key5 = RbfinancePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbfinancePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbfinancePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbfinancePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj5 (Rbfinance)
                $obj5->addStocktransRelatedByDebfinanceId($obj1);

            } // if joined row is not null

                // Add objects for joined Rbnomenclature rows

                $key6 = RbnomenclaturePeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = RbnomenclaturePeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = RbnomenclaturePeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RbnomenclaturePeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj6 (Rbnomenclature)
                $obj6->addStocktransRelatedByDebnomenclatureId($obj1);

            } // if joined row is not null

                // Add objects for joined Orgstructure rows

                $key7 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = OrgstructurePeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    OrgstructurePeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Stocktrans) to the collection in $obj7 (Orgstructure)
                $obj7->addStocktransRelatedByDeborgstructureId($obj1);

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
        return Propel::getDatabaseMap(StocktransPeer::DATABASE_NAME)->getTable(StocktransPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseStocktransPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseStocktransPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new StocktransTableMap());
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
        return StocktransPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Stocktrans or Criteria object.
     *
     * @param      mixed $values Criteria or Stocktrans object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Stocktrans object
        }

        if ($criteria->containsKey(StocktransPeer::ID) && $criteria->keyContainsValue(StocktransPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StocktransPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Stocktrans or Criteria object.
     *
     * @param      mixed $values Criteria or Stocktrans object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(StocktransPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(StocktransPeer::ID);
            $value = $criteria->remove(StocktransPeer::ID);
            if ($value) {
                $selectCriteria->add(StocktransPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(StocktransPeer::TABLE_NAME);
            }

        } else { // $values is Stocktrans object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the StockTrans table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(StocktransPeer::TABLE_NAME, $con, StocktransPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StocktransPeer::clearInstancePool();
            StocktransPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Stocktrans or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Stocktrans object or primary key or array of primary keys
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
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            StocktransPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Stocktrans) { // it's a model object
            // invalidate the cache for this single object
            StocktransPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StocktransPeer::DATABASE_NAME);
            $criteria->add(StocktransPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                StocktransPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(StocktransPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            StocktransPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Stocktrans object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Stocktrans $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(StocktransPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(StocktransPeer::TABLE_NAME);

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

        return BasePeer::doValidate(StocktransPeer::DATABASE_NAME, StocktransPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Stocktrans
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = StocktransPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(StocktransPeer::DATABASE_NAME);
        $criteria->add(StocktransPeer::ID, $pk);

        $v = StocktransPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Stocktrans[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(StocktransPeer::DATABASE_NAME);
            $criteria->add(StocktransPeer::ID, $pks, Criteria::IN);
            $objs = StocktransPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseStocktransPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseStocktransPeer::buildTableMap();

