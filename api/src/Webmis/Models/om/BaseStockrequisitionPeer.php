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
use Webmis\Models\PersonPeer;
use Webmis\Models\Stockrequisition;
use Webmis\Models\StockrequisitionItemPeer;
use Webmis\Models\StockrequisitionPeer;
use Webmis\Models\map\StockrequisitionTableMap;

/**
 * Base static class for performing query and update operations on the 'StockRequisition' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseStockrequisitionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'StockRequisition';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Stockrequisition';

    /** the related TableMap class for this table */
    const TM_CLASS = 'StockrequisitionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the id field */
    const ID = 'StockRequisition.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'StockRequisition.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'StockRequisition.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'StockRequisition.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'StockRequisition.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'StockRequisition.deleted';

    /** the column name for the date field */
    const DATE = 'StockRequisition.date';

    /** the column name for the deadline field */
    const DEADLINE = 'StockRequisition.deadline';

    /** the column name for the supplier_id field */
    const SUPPLIER_ID = 'StockRequisition.supplier_id';

    /** the column name for the recipient_id field */
    const RECIPIENT_ID = 'StockRequisition.recipient_id';

    /** the column name for the revoked field */
    const REVOKED = 'StockRequisition.revoked';

    /** the column name for the note field */
    const NOTE = 'StockRequisition.note';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Stockrequisition objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Stockrequisition[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. StockrequisitionPeer::$fieldNames[StockrequisitionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Date', 'Deadline', 'SupplierId', 'RecipientId', 'Revoked', 'Note', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'date', 'deadline', 'supplierId', 'recipientId', 'revoked', 'note', ),
        BasePeer::TYPE_COLNAME => array (StockrequisitionPeer::ID, StockrequisitionPeer::CREATEDATETIME, StockrequisitionPeer::CREATEPERSON_ID, StockrequisitionPeer::MODIFYDATETIME, StockrequisitionPeer::MODIFYPERSON_ID, StockrequisitionPeer::DELETED, StockrequisitionPeer::DATE, StockrequisitionPeer::DEADLINE, StockrequisitionPeer::SUPPLIER_ID, StockrequisitionPeer::RECIPIENT_ID, StockrequisitionPeer::REVOKED, StockrequisitionPeer::NOTE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'DATE', 'DEADLINE', 'SUPPLIER_ID', 'RECIPIENT_ID', 'REVOKED', 'NOTE', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'date', 'deadline', 'supplier_id', 'recipient_id', 'revoked', 'note', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. StockrequisitionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Date' => 6, 'Deadline' => 7, 'SupplierId' => 8, 'RecipientId' => 9, 'Revoked' => 10, 'Note' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'date' => 6, 'deadline' => 7, 'supplierId' => 8, 'recipientId' => 9, 'revoked' => 10, 'note' => 11, ),
        BasePeer::TYPE_COLNAME => array (StockrequisitionPeer::ID => 0, StockrequisitionPeer::CREATEDATETIME => 1, StockrequisitionPeer::CREATEPERSON_ID => 2, StockrequisitionPeer::MODIFYDATETIME => 3, StockrequisitionPeer::MODIFYPERSON_ID => 4, StockrequisitionPeer::DELETED => 5, StockrequisitionPeer::DATE => 6, StockrequisitionPeer::DEADLINE => 7, StockrequisitionPeer::SUPPLIER_ID => 8, StockrequisitionPeer::RECIPIENT_ID => 9, StockrequisitionPeer::REVOKED => 10, StockrequisitionPeer::NOTE => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'DATE' => 6, 'DEADLINE' => 7, 'SUPPLIER_ID' => 8, 'RECIPIENT_ID' => 9, 'REVOKED' => 10, 'NOTE' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'date' => 6, 'deadline' => 7, 'supplier_id' => 8, 'recipient_id' => 9, 'revoked' => 10, 'note' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $toNames = StockrequisitionPeer::getFieldNames($toType);
        $key = isset(StockrequisitionPeer::$fieldKeys[$fromType][$name]) ? StockrequisitionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(StockrequisitionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, StockrequisitionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return StockrequisitionPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. StockrequisitionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(StockrequisitionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(StockrequisitionPeer::ID);
            $criteria->addSelectColumn(StockrequisitionPeer::CREATEDATETIME);
            $criteria->addSelectColumn(StockrequisitionPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(StockrequisitionPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(StockrequisitionPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(StockrequisitionPeer::DELETED);
            $criteria->addSelectColumn(StockrequisitionPeer::DATE);
            $criteria->addSelectColumn(StockrequisitionPeer::DEADLINE);
            $criteria->addSelectColumn(StockrequisitionPeer::SUPPLIER_ID);
            $criteria->addSelectColumn(StockrequisitionPeer::RECIPIENT_ID);
            $criteria->addSelectColumn(StockrequisitionPeer::REVOKED);
            $criteria->addSelectColumn(StockrequisitionPeer::NOTE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.deadline');
            $criteria->addSelectColumn($alias . '.supplier_id');
            $criteria->addSelectColumn($alias . '.recipient_id');
            $criteria->addSelectColumn($alias . '.revoked');
            $criteria->addSelectColumn($alias . '.note');
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
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stockrequisition
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = StockrequisitionPeer::doSelect($critcopy, $con);
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
        return StockrequisitionPeer::populateObjects(StockrequisitionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

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
     * @param      Stockrequisition $obj A Stockrequisition object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            StockrequisitionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Stockrequisition object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Stockrequisition) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Stockrequisition object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(StockrequisitionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Stockrequisition Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(StockrequisitionPeer::$instances[$key])) {
                return StockrequisitionPeer::$instances[$key];
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
        foreach (StockrequisitionPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        StockrequisitionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to StockRequisition
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in StockrequisitionItemPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        StockrequisitionItemPeer::clearInstancePool();
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
        $cls = StockrequisitionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = StockrequisitionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StockrequisitionPeer::addInstanceToPool($obj, $key);
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
     * @return array (Stockrequisition object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = StockrequisitionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + StockrequisitionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StockrequisitionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            StockrequisitionPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related PersonRelatedByCreatepersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedByCreatepersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByModifypersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedByModifypersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByRecipientId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrgstructureRelatedByRecipientId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedBySupplierId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrgstructureRelatedBySupplierId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Selects a collection of Stockrequisition objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByCreatepersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Stockrequisition) to $obj2 (Person)
                $obj2->addStockrequisitionRelatedByCreatepersonId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockrequisition objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByModifypersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Stockrequisition) to $obj2 (Person)
                $obj2->addStockrequisitionRelatedByModifypersonId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockrequisition objects pre-filled with their Orgstructure objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrgstructureRelatedByRecipientId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;
        OrgstructurePeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockrequisition) to $obj2 (Orgstructure)
                $obj2->addStockrequisitionRelatedByRecipientId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockrequisition objects pre-filled with their Orgstructure objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrgstructureRelatedBySupplierId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;
        OrgstructurePeer::addSelectColumns($criteria);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockrequisition) to $obj2 (Orgstructure)
                $obj2->addStockrequisitionRelatedBySupplierId($obj1);

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
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Selects a collection of Stockrequisition objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Person rows

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj2 (Person)
                $obj2->addStockrequisitionRelatedByCreatepersonId($obj1);
            } // if joined row not null

            // Add objects for joined Person rows

            $key3 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PersonPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PersonPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PersonPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj3 (Person)
                $obj3->addStockrequisitionRelatedByModifypersonId($obj1);
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

                // Add the $obj1 (Stockrequisition) to the collection in $obj4 (Orgstructure)
                $obj4->addStockrequisitionRelatedByRecipientId($obj1);
            } // if joined row not null

            // Add objects for joined Orgstructure rows

            $key5 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = OrgstructurePeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = OrgstructurePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    OrgstructurePeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj5 (Orgstructure)
                $obj5->addStockrequisitionRelatedBySupplierId($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PersonRelatedByCreatepersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedByCreatepersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByModifypersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedByModifypersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByRecipientId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrgstructureRelatedByRecipientId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedBySupplierId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrgstructureRelatedBySupplierId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockrequisitionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Selects a collection of Stockrequisition objects pre-filled with all related objects except PersonRelatedByCreatepersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedByCreatepersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Orgstructure rows

                $key2 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrgstructurePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrgstructurePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj2 (Orgstructure)
                $obj2->addStockrequisitionRelatedByRecipientId($obj1);

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

                // Add the $obj1 (Stockrequisition) to the collection in $obj3 (Orgstructure)
                $obj3->addStockrequisitionRelatedBySupplierId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockrequisition objects pre-filled with all related objects except PersonRelatedByModifypersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedByModifypersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionPeer::RECIPIENT_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Orgstructure rows

                $key2 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrgstructurePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrgstructurePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrgstructurePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj2 (Orgstructure)
                $obj2->addStockrequisitionRelatedByRecipientId($obj1);

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

                // Add the $obj1 (Stockrequisition) to the collection in $obj3 (Orgstructure)
                $obj3->addStockrequisitionRelatedBySupplierId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockrequisition objects pre-filled with all related objects except OrgstructureRelatedByRecipientId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrgstructureRelatedByRecipientId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Person rows

                $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PersonPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj2 (Person)
                $obj2->addStockrequisitionRelatedByCreatepersonId($obj1);

            } // if joined row is not null

                // Add objects for joined Person rows

                $key3 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PersonPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PersonPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PersonPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj3 (Person)
                $obj3->addStockrequisitionRelatedByModifypersonId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockrequisition objects pre-filled with all related objects except OrgstructureRelatedBySupplierId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockrequisition objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrgstructureRelatedBySupplierId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);
        }

        StockrequisitionPeer::addSelectColumns($criteria);
        $startcol2 = StockrequisitionPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockrequisitionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockrequisitionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockrequisitionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockrequisitionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockrequisitionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockrequisitionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Person rows

                $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PersonPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj2 (Person)
                $obj2->addStockrequisitionRelatedByCreatepersonId($obj1);

            } // if joined row is not null

                // Add objects for joined Person rows

                $key3 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PersonPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PersonPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PersonPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Stockrequisition) to the collection in $obj3 (Person)
                $obj3->addStockrequisitionRelatedByModifypersonId($obj1);

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
        return Propel::getDatabaseMap(StockrequisitionPeer::DATABASE_NAME)->getTable(StockrequisitionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseStockrequisitionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseStockrequisitionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new StockrequisitionTableMap());
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
        return StockrequisitionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Stockrequisition or Criteria object.
     *
     * @param      mixed $values Criteria or Stockrequisition object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Stockrequisition object
        }

        if ($criteria->containsKey(StockrequisitionPeer::ID) && $criteria->keyContainsValue(StockrequisitionPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StockrequisitionPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Stockrequisition or Criteria object.
     *
     * @param      mixed $values Criteria or Stockrequisition object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(StockrequisitionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(StockrequisitionPeer::ID);
            $value = $criteria->remove(StockrequisitionPeer::ID);
            if ($value) {
                $selectCriteria->add(StockrequisitionPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(StockrequisitionPeer::TABLE_NAME);
            }

        } else { // $values is Stockrequisition object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the StockRequisition table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += StockrequisitionPeer::doOnDeleteCascade(new Criteria(StockrequisitionPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(StockrequisitionPeer::TABLE_NAME, $con, StockrequisitionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StockrequisitionPeer::clearInstancePool();
            StockrequisitionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Stockrequisition or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Stockrequisition object or primary key or array of primary keys
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
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Stockrequisition) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StockrequisitionPeer::DATABASE_NAME);
            $criteria->add(StockrequisitionPeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(StockrequisitionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += StockrequisitionPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                StockrequisitionPeer::clearInstancePool();
            } elseif ($values instanceof Stockrequisition) { // it's a model object
                StockrequisitionPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    StockrequisitionPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            StockrequisitionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = StockrequisitionPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related StockrequisitionItem objects
            $criteria = new Criteria(StockrequisitionItemPeer::DATABASE_NAME);

            $criteria->add(StockrequisitionItemPeer::MASTER_ID, $obj->getId());
            $affectedRows += StockrequisitionItemPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Stockrequisition object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Stockrequisition $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(StockrequisitionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(StockrequisitionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(StockrequisitionPeer::DATABASE_NAME, StockrequisitionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Stockrequisition
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = StockrequisitionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(StockrequisitionPeer::DATABASE_NAME);
        $criteria->add(StockrequisitionPeer::ID, $pk);

        $v = StockrequisitionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Stockrequisition[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(StockrequisitionPeer::DATABASE_NAME);
            $criteria->add(StockrequisitionPeer::ID, $pks, Criteria::IN);
            $objs = StockrequisitionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseStockrequisitionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseStockrequisitionPeer::buildTableMap();

