<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\ActionPeer;
use Webmis\Models\RbtrfulaboratorymeasuretypesPeer;
use Webmis\Models\Trfulaboratorymeasure;
use Webmis\Models\TrfulaboratorymeasurePeer;
use Webmis\Models\map\TrfulaboratorymeasureTableMap;

/**
 * Base static class for performing query and update operations on the 'trfuLaboratoryMeasure' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseTrfulaboratorymeasurePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'trfuLaboratoryMeasure';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Trfulaboratorymeasure';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TrfulaboratorymeasureTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the id field */
    const ID = 'trfuLaboratoryMeasure.id';

    /** the column name for the action_id field */
    const ACTION_ID = 'trfuLaboratoryMeasure.action_id';

    /** the column name for the trfu_lab_measure_id field */
    const TRFU_LAB_MEASURE_ID = 'trfuLaboratoryMeasure.trfu_lab_measure_id';

    /** the column name for the time field */
    const TIME = 'trfuLaboratoryMeasure.time';

    /** the column name for the beforeOperation field */
    const BEFOREOPERATION = 'trfuLaboratoryMeasure.beforeOperation';

    /** the column name for the duringOperation field */
    const DURINGOPERATION = 'trfuLaboratoryMeasure.duringOperation';

    /** the column name for the inProduct field */
    const INPRODUCT = 'trfuLaboratoryMeasure.inProduct';

    /** the column name for the afterOperation field */
    const AFTEROPERATION = 'trfuLaboratoryMeasure.afterOperation';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Trfulaboratorymeasure objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Trfulaboratorymeasure[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TrfulaboratorymeasurePeer::$fieldNames[TrfulaboratorymeasurePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'ActionId', 'TrfuLabMeasureId', 'Time', 'Beforeoperation', 'Duringoperation', 'Inproduct', 'Afteroperation', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'actionId', 'trfuLabMeasureId', 'time', 'beforeoperation', 'duringoperation', 'inproduct', 'afteroperation', ),
        BasePeer::TYPE_COLNAME => array (TrfulaboratorymeasurePeer::ID, TrfulaboratorymeasurePeer::ACTION_ID, TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, TrfulaboratorymeasurePeer::TIME, TrfulaboratorymeasurePeer::BEFOREOPERATION, TrfulaboratorymeasurePeer::DURINGOPERATION, TrfulaboratorymeasurePeer::INPRODUCT, TrfulaboratorymeasurePeer::AFTEROPERATION, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ACTION_ID', 'TRFU_LAB_MEASURE_ID', 'TIME', 'BEFOREOPERATION', 'DURINGOPERATION', 'INPRODUCT', 'AFTEROPERATION', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'action_id', 'trfu_lab_measure_id', 'time', 'beforeOperation', 'duringOperation', 'inProduct', 'afterOperation', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TrfulaboratorymeasurePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ActionId' => 1, 'TrfuLabMeasureId' => 2, 'Time' => 3, 'Beforeoperation' => 4, 'Duringoperation' => 5, 'Inproduct' => 6, 'Afteroperation' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'actionId' => 1, 'trfuLabMeasureId' => 2, 'time' => 3, 'beforeoperation' => 4, 'duringoperation' => 5, 'inproduct' => 6, 'afteroperation' => 7, ),
        BasePeer::TYPE_COLNAME => array (TrfulaboratorymeasurePeer::ID => 0, TrfulaboratorymeasurePeer::ACTION_ID => 1, TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID => 2, TrfulaboratorymeasurePeer::TIME => 3, TrfulaboratorymeasurePeer::BEFOREOPERATION => 4, TrfulaboratorymeasurePeer::DURINGOPERATION => 5, TrfulaboratorymeasurePeer::INPRODUCT => 6, TrfulaboratorymeasurePeer::AFTEROPERATION => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ACTION_ID' => 1, 'TRFU_LAB_MEASURE_ID' => 2, 'TIME' => 3, 'BEFOREOPERATION' => 4, 'DURINGOPERATION' => 5, 'INPRODUCT' => 6, 'AFTEROPERATION' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'action_id' => 1, 'trfu_lab_measure_id' => 2, 'time' => 3, 'beforeOperation' => 4, 'duringOperation' => 5, 'inProduct' => 6, 'afterOperation' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
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
        $toNames = TrfulaboratorymeasurePeer::getFieldNames($toType);
        $key = isset(TrfulaboratorymeasurePeer::$fieldKeys[$fromType][$name]) ? TrfulaboratorymeasurePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TrfulaboratorymeasurePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TrfulaboratorymeasurePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TrfulaboratorymeasurePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TrfulaboratorymeasurePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TrfulaboratorymeasurePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::ID);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::ACTION_ID);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::TIME);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::BEFOREOPERATION);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::DURINGOPERATION);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::INPRODUCT);
            $criteria->addSelectColumn(TrfulaboratorymeasurePeer::AFTEROPERATION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.action_id');
            $criteria->addSelectColumn($alias . '.trfu_lab_measure_id');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.beforeOperation');
            $criteria->addSelectColumn($alias . '.duringOperation');
            $criteria->addSelectColumn($alias . '.inProduct');
            $criteria->addSelectColumn($alias . '.afterOperation');
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
        $criteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trfulaboratorymeasure
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TrfulaboratorymeasurePeer::doSelect($critcopy, $con);
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
        return TrfulaboratorymeasurePeer::populateObjects(TrfulaboratorymeasurePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

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
     * @param      Trfulaboratorymeasure $obj A Trfulaboratorymeasure object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            TrfulaboratorymeasurePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Trfulaboratorymeasure object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Trfulaboratorymeasure) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Trfulaboratorymeasure object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TrfulaboratorymeasurePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Trfulaboratorymeasure Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TrfulaboratorymeasurePeer::$instances[$key])) {
                return TrfulaboratorymeasurePeer::$instances[$key];
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
        foreach (TrfulaboratorymeasurePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TrfulaboratorymeasurePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to trfuLaboratoryMeasure
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
        $cls = TrfulaboratorymeasurePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TrfulaboratorymeasurePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TrfulaboratorymeasurePeer::addInstanceToPool($obj, $key);
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
     * @return array (Trfulaboratorymeasure object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TrfulaboratorymeasurePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TrfulaboratorymeasurePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TrfulaboratorymeasurePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Action table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAction(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfulaboratorymeasurePeer::ACTION_ID, ActionPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtrfulaboratorymeasuretypes table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbtrfulaboratorymeasuretypes(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, RbtrfulaboratorymeasuretypesPeer::ID, $join_behavior);

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
     * Selects a collection of Trfulaboratorymeasure objects pre-filled with their Action objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfulaboratorymeasure objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAction(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);
        }

        TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        $startcol = TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS;
        ActionPeer::addSelectColumns($criteria);

        $criteria->addJoin(TrfulaboratorymeasurePeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfulaboratorymeasurePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TrfulaboratorymeasurePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfulaboratorymeasurePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ActionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ActionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ActionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Trfulaboratorymeasure) to $obj2 (Action)
                $obj2->addTrfulaboratorymeasure($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Trfulaboratorymeasure objects pre-filled with their Rbtrfulaboratorymeasuretypes objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfulaboratorymeasure objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbtrfulaboratorymeasuretypes(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);
        }

        TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        $startcol = TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS;
        RbtrfulaboratorymeasuretypesPeer::addSelectColumns($criteria);

        $criteria->addJoin(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, RbtrfulaboratorymeasuretypesPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfulaboratorymeasurePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TrfulaboratorymeasurePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfulaboratorymeasurePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbtrfulaboratorymeasuretypesPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbtrfulaboratorymeasuretypesPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbtrfulaboratorymeasuretypesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbtrfulaboratorymeasuretypesPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Trfulaboratorymeasure) to $obj2 (Rbtrfulaboratorymeasuretypes)
                $obj2->addTrfulaboratorymeasure($obj1);

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
        $criteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfulaboratorymeasurePeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, RbtrfulaboratorymeasuretypesPeer::ID, $join_behavior);

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
     * Selects a collection of Trfulaboratorymeasure objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfulaboratorymeasure objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);
        }

        TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        $startcol2 = TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS;

        ActionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionPeer::NUM_HYDRATE_COLUMNS;

        RbtrfulaboratorymeasuretypesPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbtrfulaboratorymeasuretypesPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfulaboratorymeasurePeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, RbtrfulaboratorymeasuretypesPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfulaboratorymeasurePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfulaboratorymeasurePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfulaboratorymeasurePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Action rows

            $key2 = ActionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ActionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Trfulaboratorymeasure) to the collection in $obj2 (Action)
                $obj2->addTrfulaboratorymeasure($obj1);
            } // if joined row not null

            // Add objects for joined Rbtrfulaboratorymeasuretypes rows

            $key3 = RbtrfulaboratorymeasuretypesPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RbtrfulaboratorymeasuretypesPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RbtrfulaboratorymeasuretypesPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbtrfulaboratorymeasuretypesPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Trfulaboratorymeasure) to the collection in $obj3 (Rbtrfulaboratorymeasuretypes)
                $obj3->addTrfulaboratorymeasure($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Action table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAction(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, RbtrfulaboratorymeasuretypesPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtrfulaboratorymeasuretypes table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbtrfulaboratorymeasuretypes(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfulaboratorymeasurePeer::ACTION_ID, ActionPeer::ID, $join_behavior);

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
     * Selects a collection of Trfulaboratorymeasure objects pre-filled with all related objects except Action.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfulaboratorymeasure objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAction(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);
        }

        TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        $startcol2 = TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS;

        RbtrfulaboratorymeasuretypesPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbtrfulaboratorymeasuretypesPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, RbtrfulaboratorymeasuretypesPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfulaboratorymeasurePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfulaboratorymeasurePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfulaboratorymeasurePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbtrfulaboratorymeasuretypes rows

                $key2 = RbtrfulaboratorymeasuretypesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbtrfulaboratorymeasuretypesPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbtrfulaboratorymeasuretypesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbtrfulaboratorymeasuretypesPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Trfulaboratorymeasure) to the collection in $obj2 (Rbtrfulaboratorymeasuretypes)
                $obj2->addTrfulaboratorymeasure($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Trfulaboratorymeasure objects pre-filled with all related objects except Rbtrfulaboratorymeasuretypes.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfulaboratorymeasure objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbtrfulaboratorymeasuretypes(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);
        }

        TrfulaboratorymeasurePeer::addSelectColumns($criteria);
        $startcol2 = TrfulaboratorymeasurePeer::NUM_HYDRATE_COLUMNS;

        ActionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfulaboratorymeasurePeer::ACTION_ID, ActionPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfulaboratorymeasurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfulaboratorymeasurePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfulaboratorymeasurePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfulaboratorymeasurePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Action rows

                $key2 = ActionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ActionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ActionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Trfulaboratorymeasure) to the collection in $obj2 (Action)
                $obj2->addTrfulaboratorymeasure($obj1);

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
        return Propel::getDatabaseMap(TrfulaboratorymeasurePeer::DATABASE_NAME)->getTable(TrfulaboratorymeasurePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTrfulaboratorymeasurePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTrfulaboratorymeasurePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TrfulaboratorymeasureTableMap());
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
        return TrfulaboratorymeasurePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Trfulaboratorymeasure or Criteria object.
     *
     * @param      mixed $values Criteria or Trfulaboratorymeasure object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Trfulaboratorymeasure object
        }

        if ($criteria->containsKey(TrfulaboratorymeasurePeer::ID) && $criteria->keyContainsValue(TrfulaboratorymeasurePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TrfulaboratorymeasurePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Trfulaboratorymeasure or Criteria object.
     *
     * @param      mixed $values Criteria or Trfulaboratorymeasure object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TrfulaboratorymeasurePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TrfulaboratorymeasurePeer::ID);
            $value = $criteria->remove(TrfulaboratorymeasurePeer::ID);
            if ($value) {
                $selectCriteria->add(TrfulaboratorymeasurePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TrfulaboratorymeasurePeer::TABLE_NAME);
            }

        } else { // $values is Trfulaboratorymeasure object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the trfuLaboratoryMeasure table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TrfulaboratorymeasurePeer::TABLE_NAME, $con, TrfulaboratorymeasurePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TrfulaboratorymeasurePeer::clearInstancePool();
            TrfulaboratorymeasurePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Trfulaboratorymeasure or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Trfulaboratorymeasure object or primary key or array of primary keys
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
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TrfulaboratorymeasurePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Trfulaboratorymeasure) { // it's a model object
            // invalidate the cache for this single object
            TrfulaboratorymeasurePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TrfulaboratorymeasurePeer::DATABASE_NAME);
            $criteria->add(TrfulaboratorymeasurePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TrfulaboratorymeasurePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TrfulaboratorymeasurePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            TrfulaboratorymeasurePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Trfulaboratorymeasure object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Trfulaboratorymeasure $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TrfulaboratorymeasurePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TrfulaboratorymeasurePeer::TABLE_NAME);

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

        return BasePeer::doValidate(TrfulaboratorymeasurePeer::DATABASE_NAME, TrfulaboratorymeasurePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Trfulaboratorymeasure
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TrfulaboratorymeasurePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TrfulaboratorymeasurePeer::DATABASE_NAME);
        $criteria->add(TrfulaboratorymeasurePeer::ID, $pk);

        $v = TrfulaboratorymeasurePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Trfulaboratorymeasure[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TrfulaboratorymeasurePeer::DATABASE_NAME);
            $criteria->add(TrfulaboratorymeasurePeer::ID, $pks, Criteria::IN);
            $objs = TrfulaboratorymeasurePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTrfulaboratorymeasurePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTrfulaboratorymeasurePeer::buildTableMap();

