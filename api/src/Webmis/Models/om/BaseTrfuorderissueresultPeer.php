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
use Webmis\Models\RbbloodtypePeer;
use Webmis\Models\RbtrfubloodcomponenttypePeer;
use Webmis\Models\Trfuorderissueresult;
use Webmis\Models\TrfuorderissueresultPeer;
use Webmis\Models\map\TrfuorderissueresultTableMap;

/**
 * Base static class for performing query and update operations on the 'trfuOrderIssueResult' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseTrfuorderissueresultPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'trfuOrderIssueResult';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Trfuorderissueresult';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TrfuorderissueresultTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the id field */
    const ID = 'trfuOrderIssueResult.id';

    /** the column name for the action_id field */
    const ACTION_ID = 'trfuOrderIssueResult.action_id';

    /** the column name for the trfu_blood_comp field */
    const TRFU_BLOOD_COMP = 'trfuOrderIssueResult.trfu_blood_comp';

    /** the column name for the comp_number field */
    const COMP_NUMBER = 'trfuOrderIssueResult.comp_number';

    /** the column name for the comp_type_id field */
    const COMP_TYPE_ID = 'trfuOrderIssueResult.comp_type_id';

    /** the column name for the blood_type_id field */
    const BLOOD_TYPE_ID = 'trfuOrderIssueResult.blood_type_id';

    /** the column name for the volume field */
    const VOLUME = 'trfuOrderIssueResult.volume';

    /** the column name for the dose_count field */
    const DOSE_COUNT = 'trfuOrderIssueResult.dose_count';

    /** the column name for the trfu_donor_id field */
    const TRFU_DONOR_ID = 'trfuOrderIssueResult.trfu_donor_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Trfuorderissueresult objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Trfuorderissueresult[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TrfuorderissueresultPeer::$fieldNames[TrfuorderissueresultPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'ActionId', 'TrfuBloodComp', 'CompNumber', 'CompTypeId', 'BloodTypeId', 'Volume', 'DoseCount', 'TrfuDonorId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'actionId', 'trfuBloodComp', 'compNumber', 'compTypeId', 'bloodTypeId', 'volume', 'doseCount', 'trfuDonorId', ),
        BasePeer::TYPE_COLNAME => array (TrfuorderissueresultPeer::ID, TrfuorderissueresultPeer::ACTION_ID, TrfuorderissueresultPeer::TRFU_BLOOD_COMP, TrfuorderissueresultPeer::COMP_NUMBER, TrfuorderissueresultPeer::COMP_TYPE_ID, TrfuorderissueresultPeer::BLOOD_TYPE_ID, TrfuorderissueresultPeer::VOLUME, TrfuorderissueresultPeer::DOSE_COUNT, TrfuorderissueresultPeer::TRFU_DONOR_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ACTION_ID', 'TRFU_BLOOD_COMP', 'COMP_NUMBER', 'COMP_TYPE_ID', 'BLOOD_TYPE_ID', 'VOLUME', 'DOSE_COUNT', 'TRFU_DONOR_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'action_id', 'trfu_blood_comp', 'comp_number', 'comp_type_id', 'blood_type_id', 'volume', 'dose_count', 'trfu_donor_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TrfuorderissueresultPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ActionId' => 1, 'TrfuBloodComp' => 2, 'CompNumber' => 3, 'CompTypeId' => 4, 'BloodTypeId' => 5, 'Volume' => 6, 'DoseCount' => 7, 'TrfuDonorId' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'actionId' => 1, 'trfuBloodComp' => 2, 'compNumber' => 3, 'compTypeId' => 4, 'bloodTypeId' => 5, 'volume' => 6, 'doseCount' => 7, 'trfuDonorId' => 8, ),
        BasePeer::TYPE_COLNAME => array (TrfuorderissueresultPeer::ID => 0, TrfuorderissueresultPeer::ACTION_ID => 1, TrfuorderissueresultPeer::TRFU_BLOOD_COMP => 2, TrfuorderissueresultPeer::COMP_NUMBER => 3, TrfuorderissueresultPeer::COMP_TYPE_ID => 4, TrfuorderissueresultPeer::BLOOD_TYPE_ID => 5, TrfuorderissueresultPeer::VOLUME => 6, TrfuorderissueresultPeer::DOSE_COUNT => 7, TrfuorderissueresultPeer::TRFU_DONOR_ID => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ACTION_ID' => 1, 'TRFU_BLOOD_COMP' => 2, 'COMP_NUMBER' => 3, 'COMP_TYPE_ID' => 4, 'BLOOD_TYPE_ID' => 5, 'VOLUME' => 6, 'DOSE_COUNT' => 7, 'TRFU_DONOR_ID' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'action_id' => 1, 'trfu_blood_comp' => 2, 'comp_number' => 3, 'comp_type_id' => 4, 'blood_type_id' => 5, 'volume' => 6, 'dose_count' => 7, 'trfu_donor_id' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $toNames = TrfuorderissueresultPeer::getFieldNames($toType);
        $key = isset(TrfuorderissueresultPeer::$fieldKeys[$fromType][$name]) ? TrfuorderissueresultPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TrfuorderissueresultPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TrfuorderissueresultPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TrfuorderissueresultPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TrfuorderissueresultPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TrfuorderissueresultPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TrfuorderissueresultPeer::ID);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::ACTION_ID);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::TRFU_BLOOD_COMP);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::COMP_NUMBER);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::COMP_TYPE_ID);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::BLOOD_TYPE_ID);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::VOLUME);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::DOSE_COUNT);
            $criteria->addSelectColumn(TrfuorderissueresultPeer::TRFU_DONOR_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.action_id');
            $criteria->addSelectColumn($alias . '.trfu_blood_comp');
            $criteria->addSelectColumn($alias . '.comp_number');
            $criteria->addSelectColumn($alias . '.comp_type_id');
            $criteria->addSelectColumn($alias . '.blood_type_id');
            $criteria->addSelectColumn($alias . '.volume');
            $criteria->addSelectColumn($alias . '.dose_count');
            $criteria->addSelectColumn($alias . '.trfu_donor_id');
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
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trfuorderissueresult
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TrfuorderissueresultPeer::doSelect($critcopy, $con);
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
        return TrfuorderissueresultPeer::populateObjects(TrfuorderissueresultPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

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
     * @param      Trfuorderissueresult $obj A Trfuorderissueresult object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            TrfuorderissueresultPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Trfuorderissueresult object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Trfuorderissueresult) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Trfuorderissueresult object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TrfuorderissueresultPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Trfuorderissueresult Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TrfuorderissueresultPeer::$instances[$key])) {
                return TrfuorderissueresultPeer::$instances[$key];
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
        foreach (TrfuorderissueresultPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TrfuorderissueresultPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to trfuOrderIssueResult
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
        $cls = TrfuorderissueresultPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TrfuorderissueresultPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TrfuorderissueresultPeer::addInstanceToPool($obj, $key);
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
     * @return array (Trfuorderissueresult object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TrfuorderissueresultPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TrfuorderissueresultPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TrfuorderissueresultPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtrfubloodcomponenttype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbtrfubloodcomponenttype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbbloodtype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbbloodtype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);

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
     * Selects a collection of Trfuorderissueresult objects pre-filled with their Action objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAction(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;
        ActionPeer::addSelectColumns($criteria);

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Trfuorderissueresult) to $obj2 (Action)
                $obj2->addTrfuorderissueresult($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Trfuorderissueresult objects pre-filled with their Rbtrfubloodcomponenttype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbtrfubloodcomponenttype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;
        RbtrfubloodcomponenttypePeer::addSelectColumns($criteria);

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbtrfubloodcomponenttypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbtrfubloodcomponenttypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbtrfubloodcomponenttypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbtrfubloodcomponenttypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Trfuorderissueresult) to $obj2 (Rbtrfubloodcomponenttype)
                $obj2->addTrfuorderissueresult($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Trfuorderissueresult objects pre-filled with their Rbbloodtype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbbloodtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;
        RbbloodtypePeer::addSelectColumns($criteria);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbbloodtypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbbloodtypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbbloodtypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbbloodtypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Trfuorderissueresult) to $obj2 (Rbbloodtype)
                $obj2->addTrfuorderissueresult($obj1);

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
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);

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
     * Selects a collection of Trfuorderissueresult objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol2 = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;

        ActionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionPeer::NUM_HYDRATE_COLUMNS;

        RbtrfubloodcomponenttypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbtrfubloodcomponenttypePeer::NUM_HYDRATE_COLUMNS;

        RbbloodtypePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbbloodtypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj2 (Action)
                $obj2->addTrfuorderissueresult($obj1);
            } // if joined row not null

            // Add objects for joined Rbtrfubloodcomponenttype rows

            $key3 = RbtrfubloodcomponenttypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RbtrfubloodcomponenttypePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RbtrfubloodcomponenttypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbtrfubloodcomponenttypePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj3 (Rbtrfubloodcomponenttype)
                $obj3->addTrfuorderissueresult($obj1);
            } // if joined row not null

            // Add objects for joined Rbbloodtype rows

            $key4 = RbbloodtypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = RbbloodtypePeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = RbbloodtypePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbbloodtypePeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj4 (Rbbloodtype)
                $obj4->addTrfuorderissueresult($obj1);
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
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtrfubloodcomponenttype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbtrfubloodcomponenttype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbbloodtype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbbloodtype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TrfuorderissueresultPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

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
     * Selects a collection of Trfuorderissueresult objects pre-filled with all related objects except Action.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
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
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol2 = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;

        RbtrfubloodcomponenttypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbtrfubloodcomponenttypePeer::NUM_HYDRATE_COLUMNS;

        RbbloodtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbbloodtypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbtrfubloodcomponenttype rows

                $key2 = RbtrfubloodcomponenttypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbtrfubloodcomponenttypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbtrfubloodcomponenttypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbtrfubloodcomponenttypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj2 (Rbtrfubloodcomponenttype)
                $obj2->addTrfuorderissueresult($obj1);

            } // if joined row is not null

                // Add objects for joined Rbbloodtype rows

                $key3 = RbbloodtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbbloodtypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbbloodtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbbloodtypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj3 (Rbbloodtype)
                $obj3->addTrfuorderissueresult($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Trfuorderissueresult objects pre-filled with all related objects except Rbtrfubloodcomponenttype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbtrfubloodcomponenttype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol2 = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;

        ActionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionPeer::NUM_HYDRATE_COLUMNS;

        RbbloodtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbbloodtypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::BLOOD_TYPE_ID, RbbloodtypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj2 (Action)
                $obj2->addTrfuorderissueresult($obj1);

            } // if joined row is not null

                // Add objects for joined Rbbloodtype rows

                $key3 = RbbloodtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbbloodtypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbbloodtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbbloodtypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj3 (Rbbloodtype)
                $obj3->addTrfuorderissueresult($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Trfuorderissueresult objects pre-filled with all related objects except Rbbloodtype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Trfuorderissueresult objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbbloodtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);
        }

        TrfuorderissueresultPeer::addSelectColumns($criteria);
        $startcol2 = TrfuorderissueresultPeer::NUM_HYDRATE_COLUMNS;

        ActionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActionPeer::NUM_HYDRATE_COLUMNS;

        RbtrfubloodcomponenttypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbtrfubloodcomponenttypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TrfuorderissueresultPeer::ACTION_ID, ActionPeer::ID, $join_behavior);

        $criteria->addJoin(TrfuorderissueresultPeer::COMP_TYPE_ID, RbtrfubloodcomponenttypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TrfuorderissueresultPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TrfuorderissueresultPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TrfuorderissueresultPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TrfuorderissueresultPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj2 (Action)
                $obj2->addTrfuorderissueresult($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtrfubloodcomponenttype rows

                $key3 = RbtrfubloodcomponenttypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbtrfubloodcomponenttypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbtrfubloodcomponenttypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbtrfubloodcomponenttypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Trfuorderissueresult) to the collection in $obj3 (Rbtrfubloodcomponenttype)
                $obj3->addTrfuorderissueresult($obj1);

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
        return Propel::getDatabaseMap(TrfuorderissueresultPeer::DATABASE_NAME)->getTable(TrfuorderissueresultPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTrfuorderissueresultPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTrfuorderissueresultPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TrfuorderissueresultTableMap());
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
        return TrfuorderissueresultPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Trfuorderissueresult or Criteria object.
     *
     * @param      mixed $values Criteria or Trfuorderissueresult object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Trfuorderissueresult object
        }

        if ($criteria->containsKey(TrfuorderissueresultPeer::ID) && $criteria->keyContainsValue(TrfuorderissueresultPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TrfuorderissueresultPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Trfuorderissueresult or Criteria object.
     *
     * @param      mixed $values Criteria or Trfuorderissueresult object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TrfuorderissueresultPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TrfuorderissueresultPeer::ID);
            $value = $criteria->remove(TrfuorderissueresultPeer::ID);
            if ($value) {
                $selectCriteria->add(TrfuorderissueresultPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TrfuorderissueresultPeer::TABLE_NAME);
            }

        } else { // $values is Trfuorderissueresult object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the trfuOrderIssueResult table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TrfuorderissueresultPeer::TABLE_NAME, $con, TrfuorderissueresultPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TrfuorderissueresultPeer::clearInstancePool();
            TrfuorderissueresultPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Trfuorderissueresult or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Trfuorderissueresult object or primary key or array of primary keys
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
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TrfuorderissueresultPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Trfuorderissueresult) { // it's a model object
            // invalidate the cache for this single object
            TrfuorderissueresultPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TrfuorderissueresultPeer::DATABASE_NAME);
            $criteria->add(TrfuorderissueresultPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TrfuorderissueresultPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TrfuorderissueresultPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            TrfuorderissueresultPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Trfuorderissueresult object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Trfuorderissueresult $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TrfuorderissueresultPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TrfuorderissueresultPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TrfuorderissueresultPeer::DATABASE_NAME, TrfuorderissueresultPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Trfuorderissueresult
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TrfuorderissueresultPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TrfuorderissueresultPeer::DATABASE_NAME);
        $criteria->add(TrfuorderissueresultPeer::ID, $pk);

        $v = TrfuorderissueresultPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Trfuorderissueresult[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TrfuorderissueresultPeer::DATABASE_NAME);
            $criteria->add(TrfuorderissueresultPeer::ID, $pks, Criteria::IN);
            $objs = TrfuorderissueresultPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTrfuorderissueresultPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTrfuorderissueresultPeer::buildTableMap();

