<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\ActiontypeEventtypeCheck;
use Webmis\Models\ActiontypeEventtypeCheckPeer;
use Webmis\Models\ActiontypePeer;
use Webmis\Models\EventtypePeer;
use Webmis\Models\map\ActiontypeEventtypeCheckTableMap;

/**
 * Base static class for performing query and update operations on the 'ActionType_EventType_check' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypeEventtypeCheckPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ActionType_EventType_check';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\ActiontypeEventtypeCheck';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ActiontypeEventtypeCheckTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 5;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 5;

    /** the column name for the id field */
    const ID = 'ActionType_EventType_check.id';

    /** the column name for the actionType_id field */
    const ACTIONTYPE_ID = 'ActionType_EventType_check.actionType_id';

    /** the column name for the eventType_id field */
    const EVENTTYPE_ID = 'ActionType_EventType_check.eventType_id';

    /** the column name for the related_actionType_id field */
    const RELATED_ACTIONTYPE_ID = 'ActionType_EventType_check.related_actionType_id';

    /** the column name for the relationType field */
    const RELATIONTYPE = 'ActionType_EventType_check.relationType';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ActiontypeEventtypeCheck objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ActiontypeEventtypeCheck[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ActiontypeEventtypeCheckPeer::$fieldNames[ActiontypeEventtypeCheckPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'ActiontypeId', 'EventtypeId', 'RelatedActiontypeId', 'Relationtype', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'actiontypeId', 'eventtypeId', 'relatedActiontypeId', 'relationtype', ),
        BasePeer::TYPE_COLNAME => array (ActiontypeEventtypeCheckPeer::ID, ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypeEventtypeCheckPeer::RELATIONTYPE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ACTIONTYPE_ID', 'EVENTTYPE_ID', 'RELATED_ACTIONTYPE_ID', 'RELATIONTYPE', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'actionType_id', 'eventType_id', 'related_actionType_id', 'relationType', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ActiontypeEventtypeCheckPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ActiontypeId' => 1, 'EventtypeId' => 2, 'RelatedActiontypeId' => 3, 'Relationtype' => 4, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'actiontypeId' => 1, 'eventtypeId' => 2, 'relatedActiontypeId' => 3, 'relationtype' => 4, ),
        BasePeer::TYPE_COLNAME => array (ActiontypeEventtypeCheckPeer::ID => 0, ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID => 1, ActiontypeEventtypeCheckPeer::EVENTTYPE_ID => 2, ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID => 3, ActiontypeEventtypeCheckPeer::RELATIONTYPE => 4, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ACTIONTYPE_ID' => 1, 'EVENTTYPE_ID' => 2, 'RELATED_ACTIONTYPE_ID' => 3, 'RELATIONTYPE' => 4, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'actionType_id' => 1, 'eventType_id' => 2, 'related_actionType_id' => 3, 'relationType' => 4, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
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
        $toNames = ActiontypeEventtypeCheckPeer::getFieldNames($toType);
        $key = isset(ActiontypeEventtypeCheckPeer::$fieldKeys[$fromType][$name]) ? ActiontypeEventtypeCheckPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ActiontypeEventtypeCheckPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ActiontypeEventtypeCheckPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ActiontypeEventtypeCheckPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ActiontypeEventtypeCheckPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ActiontypeEventtypeCheckPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ActiontypeEventtypeCheckPeer::ID);
            $criteria->addSelectColumn(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID);
            $criteria->addSelectColumn(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID);
            $criteria->addSelectColumn(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID);
            $criteria->addSelectColumn(ActiontypeEventtypeCheckPeer::RELATIONTYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.actionType_id');
            $criteria->addSelectColumn($alias . '.eventType_id');
            $criteria->addSelectColumn($alias . '.related_actionType_id');
            $criteria->addSelectColumn($alias . '.relationType');
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
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActiontypeEventtypeCheck
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ActiontypeEventtypeCheckPeer::doSelect($critcopy, $con);
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
        return ActiontypeEventtypeCheckPeer::populateObjects(ActiontypeEventtypeCheckPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

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
     * @param      ActiontypeEventtypeCheck $obj A ActiontypeEventtypeCheck object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ActiontypeEventtypeCheckPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ActiontypeEventtypeCheck object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ActiontypeEventtypeCheck) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ActiontypeEventtypeCheck object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ActiontypeEventtypeCheckPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ActiontypeEventtypeCheck Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ActiontypeEventtypeCheckPeer::$instances[$key])) {
                return ActiontypeEventtypeCheckPeer::$instances[$key];
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
        foreach (ActiontypeEventtypeCheckPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ActiontypeEventtypeCheckPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ActionType_EventType_check
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
        $cls = ActiontypeEventtypeCheckPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj, $key);
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
     * @return array (ActiontypeEventtypeCheck object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActiontypeEventtypeCheckPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ActiontypeEventtypeCheckPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related ActiontypeRelatedByActiontypeId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinActiontypeRelatedByActiontypeId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Eventtype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinEventtype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related ActiontypeRelatedByRelatedActiontypeId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinActiontypeRelatedByRelatedActiontypeId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

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
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with their Actiontype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinActiontypeRelatedByActiontypeId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;
        ActiontypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ActiontypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActiontypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ActiontypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to $obj2 (Actiontype)
                $obj2->addActiontypeEventtypeCheckRelatedByActiontypeId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with their Eventtype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinEventtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;
        EventtypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = EventtypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = EventtypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    EventtypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to $obj2 (Eventtype)
                $obj2->addActiontypeEventtypeCheck($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with their Actiontype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinActiontypeRelatedByRelatedActiontypeId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;
        ActiontypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ActiontypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActiontypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ActiontypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to $obj2 (Actiontype)
                $obj2->addActiontypeEventtypeCheckRelatedByRelatedActiontypeId($obj1);

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
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

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
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol2 = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;

        ActiontypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActiontypePeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        ActiontypePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ActiontypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Actiontype rows

            $key2 = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ActiontypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ActiontypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActiontypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj2 (Actiontype)
                $obj2->addActiontypeEventtypeCheckRelatedByActiontypeId($obj1);
            } // if joined row not null

            // Add objects for joined Eventtype rows

            $key3 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = EventtypePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = EventtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EventtypePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj3 (Eventtype)
                $obj3->addActiontypeEventtypeCheck($obj1);
            } // if joined row not null

            // Add objects for joined Actiontype rows

            $key4 = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = ActiontypePeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = ActiontypePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ActiontypePeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj4 (Actiontype)
                $obj4->addActiontypeEventtypeCheckRelatedByRelatedActiontypeId($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ActiontypeRelatedByActiontypeId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptActiontypeRelatedByActiontypeId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Eventtype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptEventtype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related ActiontypeRelatedByRelatedActiontypeId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptActiontypeRelatedByRelatedActiontypeId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

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
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with all related objects except ActiontypeRelatedByActiontypeId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptActiontypeRelatedByActiontypeId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol2 = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Eventtype rows

                $key2 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = EventtypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = EventtypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    EventtypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj2 (Eventtype)
                $obj2->addActiontypeEventtypeCheck($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with all related objects except Eventtype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptEventtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol2 = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;

        ActiontypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ActiontypePeer::NUM_HYDRATE_COLUMNS;

        ActiontypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ActiontypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, ActiontypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Actiontype rows

                $key2 = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ActiontypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ActiontypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ActiontypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj2 (Actiontype)
                $obj2->addActiontypeEventtypeCheckRelatedByActiontypeId($obj1);

            } // if joined row is not null

                // Add objects for joined Actiontype rows

                $key3 = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ActiontypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ActiontypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ActiontypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj3 (Actiontype)
                $obj3->addActiontypeEventtypeCheckRelatedByRelatedActiontypeId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ActiontypeEventtypeCheck objects pre-filled with all related objects except ActiontypeRelatedByRelatedActiontypeId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ActiontypeEventtypeCheck objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptActiontypeRelatedByRelatedActiontypeId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        }

        ActiontypeEventtypeCheckPeer::addSelectColumns($criteria);
        $startcol2 = ActiontypeEventtypeCheckPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypeEventtypeCheckPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypeEventtypeCheckPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypeEventtypeCheckPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypeEventtypeCheckPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Eventtype rows

                $key2 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = EventtypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = EventtypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    EventtypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ActiontypeEventtypeCheck) to the collection in $obj2 (Eventtype)
                $obj2->addActiontypeEventtypeCheck($obj1);

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
        return Propel::getDatabaseMap(ActiontypeEventtypeCheckPeer::DATABASE_NAME)->getTable(ActiontypeEventtypeCheckPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseActiontypeEventtypeCheckPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseActiontypeEventtypeCheckPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ActiontypeEventtypeCheckTableMap());
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
        return ActiontypeEventtypeCheckPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ActiontypeEventtypeCheck or Criteria object.
     *
     * @param      mixed $values Criteria or ActiontypeEventtypeCheck object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ActiontypeEventtypeCheck object
        }

        if ($criteria->containsKey(ActiontypeEventtypeCheckPeer::ID) && $criteria->keyContainsValue(ActiontypeEventtypeCheckPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActiontypeEventtypeCheckPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ActiontypeEventtypeCheck or Criteria object.
     *
     * @param      mixed $values Criteria or ActiontypeEventtypeCheck object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ActiontypeEventtypeCheckPeer::ID);
            $value = $criteria->remove(ActiontypeEventtypeCheckPeer::ID);
            if ($value) {
                $selectCriteria->add(ActiontypeEventtypeCheckPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ActiontypeEventtypeCheckPeer::TABLE_NAME);
            }

        } else { // $values is ActiontypeEventtypeCheck object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ActionType_EventType_check table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ActiontypeEventtypeCheckPeer::TABLE_NAME, $con, ActiontypeEventtypeCheckPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActiontypeEventtypeCheckPeer::clearInstancePool();
            ActiontypeEventtypeCheckPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ActiontypeEventtypeCheck or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ActiontypeEventtypeCheck object or primary key or array of primary keys
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
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ActiontypeEventtypeCheckPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ActiontypeEventtypeCheck) { // it's a model object
            // invalidate the cache for this single object
            ActiontypeEventtypeCheckPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
            $criteria->add(ActiontypeEventtypeCheckPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ActiontypeEventtypeCheckPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ActiontypeEventtypeCheckPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ActiontypeEventtypeCheckPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ActiontypeEventtypeCheck object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ActiontypeEventtypeCheck $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ActiontypeEventtypeCheckPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ActiontypeEventtypeCheckPeer::DATABASE_NAME, ActiontypeEventtypeCheckPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ActiontypeEventtypeCheck
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ActiontypeEventtypeCheckPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
        $criteria->add(ActiontypeEventtypeCheckPeer::ID, $pk);

        $v = ActiontypeEventtypeCheckPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ActiontypeEventtypeCheck[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ActiontypeEventtypeCheckPeer::DATABASE_NAME);
            $criteria->add(ActiontypeEventtypeCheckPeer::ID, $pks, Criteria::IN);
            $objs = ActiontypeEventtypeCheckPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseActiontypeEventtypeCheckPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseActiontypeEventtypeCheckPeer::buildTableMap();

