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
use Webmis\Models\Stockmotion;
use Webmis\Models\StockmotionItemPeer;
use Webmis\Models\StockmotionPeer;
use Webmis\Models\map\StockmotionTableMap;

/**
 * Base static class for performing query and update operations on the 'StockMotion' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseStockmotionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'StockMotion';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Stockmotion';

    /** the related TableMap class for this table */
    const TM_CLASS = 'StockmotionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the id field */
    const ID = 'StockMotion.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'StockMotion.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'StockMotion.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'StockMotion.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'StockMotion.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'StockMotion.deleted';

    /** the column name for the type field */
    const TYPE = 'StockMotion.type';

    /** the column name for the date field */
    const DATE = 'StockMotion.date';

    /** the column name for the supplier_id field */
    const SUPPLIER_ID = 'StockMotion.supplier_id';

    /** the column name for the receiver_id field */
    const RECEIVER_ID = 'StockMotion.receiver_id';

    /** the column name for the note field */
    const NOTE = 'StockMotion.note';

    /** the column name for the supplierPerson_id field */
    const SUPPLIERPERSON_ID = 'StockMotion.supplierPerson_id';

    /** the column name for the receiverPerson_id field */
    const RECEIVERPERSON_ID = 'StockMotion.receiverPerson_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Stockmotion objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Stockmotion[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. StockmotionPeer::$fieldNames[StockmotionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Type', 'Date', 'SupplierId', 'ReceiverId', 'Note', 'SupplierpersonId', 'ReceiverpersonId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'type', 'date', 'supplierId', 'receiverId', 'note', 'supplierpersonId', 'receiverpersonId', ),
        BasePeer::TYPE_COLNAME => array (StockmotionPeer::ID, StockmotionPeer::CREATEDATETIME, StockmotionPeer::CREATEPERSON_ID, StockmotionPeer::MODIFYDATETIME, StockmotionPeer::MODIFYPERSON_ID, StockmotionPeer::DELETED, StockmotionPeer::TYPE, StockmotionPeer::DATE, StockmotionPeer::SUPPLIER_ID, StockmotionPeer::RECEIVER_ID, StockmotionPeer::NOTE, StockmotionPeer::SUPPLIERPERSON_ID, StockmotionPeer::RECEIVERPERSON_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'TYPE', 'DATE', 'SUPPLIER_ID', 'RECEIVER_ID', 'NOTE', 'SUPPLIERPERSON_ID', 'RECEIVERPERSON_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'type', 'date', 'supplier_id', 'receiver_id', 'note', 'supplierPerson_id', 'receiverPerson_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. StockmotionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Type' => 6, 'Date' => 7, 'SupplierId' => 8, 'ReceiverId' => 9, 'Note' => 10, 'SupplierpersonId' => 11, 'ReceiverpersonId' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'type' => 6, 'date' => 7, 'supplierId' => 8, 'receiverId' => 9, 'note' => 10, 'supplierpersonId' => 11, 'receiverpersonId' => 12, ),
        BasePeer::TYPE_COLNAME => array (StockmotionPeer::ID => 0, StockmotionPeer::CREATEDATETIME => 1, StockmotionPeer::CREATEPERSON_ID => 2, StockmotionPeer::MODIFYDATETIME => 3, StockmotionPeer::MODIFYPERSON_ID => 4, StockmotionPeer::DELETED => 5, StockmotionPeer::TYPE => 6, StockmotionPeer::DATE => 7, StockmotionPeer::SUPPLIER_ID => 8, StockmotionPeer::RECEIVER_ID => 9, StockmotionPeer::NOTE => 10, StockmotionPeer::SUPPLIERPERSON_ID => 11, StockmotionPeer::RECEIVERPERSON_ID => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'TYPE' => 6, 'DATE' => 7, 'SUPPLIER_ID' => 8, 'RECEIVER_ID' => 9, 'NOTE' => 10, 'SUPPLIERPERSON_ID' => 11, 'RECEIVERPERSON_ID' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'type' => 6, 'date' => 7, 'supplier_id' => 8, 'receiver_id' => 9, 'note' => 10, 'supplierPerson_id' => 11, 'receiverPerson_id' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = StockmotionPeer::getFieldNames($toType);
        $key = isset(StockmotionPeer::$fieldKeys[$fromType][$name]) ? StockmotionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(StockmotionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, StockmotionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return StockmotionPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. StockmotionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(StockmotionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(StockmotionPeer::ID);
            $criteria->addSelectColumn(StockmotionPeer::CREATEDATETIME);
            $criteria->addSelectColumn(StockmotionPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(StockmotionPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(StockmotionPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(StockmotionPeer::DELETED);
            $criteria->addSelectColumn(StockmotionPeer::TYPE);
            $criteria->addSelectColumn(StockmotionPeer::DATE);
            $criteria->addSelectColumn(StockmotionPeer::SUPPLIER_ID);
            $criteria->addSelectColumn(StockmotionPeer::RECEIVER_ID);
            $criteria->addSelectColumn(StockmotionPeer::NOTE);
            $criteria->addSelectColumn(StockmotionPeer::SUPPLIERPERSON_ID);
            $criteria->addSelectColumn(StockmotionPeer::RECEIVERPERSON_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.supplier_id');
            $criteria->addSelectColumn($alias . '.receiver_id');
            $criteria->addSelectColumn($alias . '.note');
            $criteria->addSelectColumn($alias . '.supplierPerson_id');
            $criteria->addSelectColumn($alias . '.receiverPerson_id');
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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stockmotion
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = StockmotionPeer::doSelect($critcopy, $con);
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
        return StockmotionPeer::populateObjects(StockmotionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            StockmotionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

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
     * @param      Stockmotion $obj A Stockmotion object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            StockmotionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Stockmotion object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Stockmotion) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Stockmotion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(StockmotionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Stockmotion Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(StockmotionPeer::$instances[$key])) {
                return StockmotionPeer::$instances[$key];
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
        foreach (StockmotionPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        StockmotionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to StockMotion
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in StockmotionItemPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        StockmotionItemPeer::clearInstancePool();
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
        $cls = StockmotionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = StockmotionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StockmotionPeer::addInstanceToPool($obj, $key);
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
     * @return array (Stockmotion object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = StockmotionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = StockmotionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + StockmotionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StockmotionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            StockmotionPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByReceiverId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrgstructureRelatedByReceiverId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByReceiverpersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedByReceiverpersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedBySupplierpersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedBySupplierpersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Selects a collection of Stockmotion objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByCreatepersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol = StockmotionPeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to $obj2 (Person)
                $obj2->addStockmotionRelatedByCreatepersonId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByModifypersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol = StockmotionPeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to $obj2 (Person)
                $obj2->addStockmotionRelatedByModifypersonId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with their Orgstructure objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrgstructureRelatedByReceiverId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol = StockmotionPeer::NUM_HYDRATE_COLUMNS;
        OrgstructurePeer::addSelectColumns($criteria);

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to $obj2 (Orgstructure)
                $obj2->addStockmotionRelatedByReceiverId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByReceiverpersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol = StockmotionPeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to $obj2 (Person)
                $obj2->addStockmotionRelatedByReceiverpersonId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with their Orgstructure objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrgstructureRelatedBySupplierId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol = StockmotionPeer::NUM_HYDRATE_COLUMNS;
        OrgstructurePeer::addSelectColumns($criteria);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to $obj2 (Orgstructure)
                $obj2->addStockmotionRelatedBySupplierId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedBySupplierpersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol = StockmotionPeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to $obj2 (Person)
                $obj2->addStockmotionRelatedBySupplierpersonId($obj1);

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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Selects a collection of Stockmotion objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PersonPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PersonPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Person)
                $obj2->addStockmotionRelatedByCreatepersonId($obj1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Person)
                $obj3->addStockmotionRelatedByModifypersonId($obj1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj4 (Orgstructure)
                $obj4->addStockmotionRelatedByReceiverId($obj1);
            } // if joined row not null

            // Add objects for joined Person rows

            $key5 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = PersonPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = PersonPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PersonPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj5 (Person)
                $obj5->addStockmotionRelatedByReceiverpersonId($obj1);
            } // if joined row not null

            // Add objects for joined Orgstructure rows

            $key6 = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = OrgstructurePeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = OrgstructurePeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    OrgstructurePeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj6 (Orgstructure)
                $obj6->addStockmotionRelatedBySupplierId($obj1);
            } // if joined row not null

            // Add objects for joined Person rows

            $key7 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = PersonPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = PersonPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PersonPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj7 (Person)
                $obj7->addStockmotionRelatedBySupplierpersonId($obj1);
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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related OrgstructureRelatedByReceiverId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrgstructureRelatedByReceiverId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByReceiverpersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedByReceiverpersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedBySupplierpersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedBySupplierpersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StockmotionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);

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
     * Selects a collection of Stockmotion objects pre-filled with all related objects except PersonRelatedByCreatepersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
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
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Orgstructure)
                $obj2->addStockmotionRelatedByReceiverId($obj1);

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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Orgstructure)
                $obj3->addStockmotionRelatedBySupplierId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with all related objects except PersonRelatedByModifypersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
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
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Orgstructure)
                $obj2->addStockmotionRelatedByReceiverId($obj1);

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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Orgstructure)
                $obj3->addStockmotionRelatedBySupplierId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with all related objects except OrgstructureRelatedByReceiverId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrgstructureRelatedByReceiverId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PersonPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Person)
                $obj2->addStockmotionRelatedByCreatepersonId($obj1);

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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Person)
                $obj3->addStockmotionRelatedByModifypersonId($obj1);

            } // if joined row is not null

                // Add objects for joined Person rows

                $key4 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PersonPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = PersonPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PersonPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj4 (Person)
                $obj4->addStockmotionRelatedByReceiverpersonId($obj1);

            } // if joined row is not null

                // Add objects for joined Person rows

                $key5 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PersonPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = PersonPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PersonPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj5 (Person)
                $obj5->addStockmotionRelatedBySupplierpersonId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with all related objects except PersonRelatedByReceiverpersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedByReceiverpersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Orgstructure)
                $obj2->addStockmotionRelatedByReceiverId($obj1);

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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Orgstructure)
                $obj3->addStockmotionRelatedBySupplierId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with all related objects except OrgstructureRelatedBySupplierId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
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
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PersonPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::RECEIVERPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIERPERSON_ID, PersonPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Person)
                $obj2->addStockmotionRelatedByCreatepersonId($obj1);

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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Person)
                $obj3->addStockmotionRelatedByModifypersonId($obj1);

            } // if joined row is not null

                // Add objects for joined Person rows

                $key4 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PersonPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = PersonPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PersonPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj4 (Person)
                $obj4->addStockmotionRelatedByReceiverpersonId($obj1);

            } // if joined row is not null

                // Add objects for joined Person rows

                $key5 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PersonPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = PersonPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PersonPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Stockmotion) to the collection in $obj5 (Person)
                $obj5->addStockmotionRelatedBySupplierpersonId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Stockmotion objects pre-filled with all related objects except PersonRelatedBySupplierpersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Stockmotion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedBySupplierpersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StockmotionPeer::DATABASE_NAME);
        }

        StockmotionPeer::addSelectColumns($criteria);
        $startcol2 = StockmotionPeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        OrgstructurePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + OrgstructurePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StockmotionPeer::RECEIVER_ID, OrgstructurePeer::ID, $join_behavior);

        $criteria->addJoin(StockmotionPeer::SUPPLIER_ID, OrgstructurePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StockmotionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StockmotionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StockmotionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StockmotionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Stockmotion) to the collection in $obj2 (Orgstructure)
                $obj2->addStockmotionRelatedByReceiverId($obj1);

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

                // Add the $obj1 (Stockmotion) to the collection in $obj3 (Orgstructure)
                $obj3->addStockmotionRelatedBySupplierId($obj1);

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
        return Propel::getDatabaseMap(StockmotionPeer::DATABASE_NAME)->getTable(StockmotionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseStockmotionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseStockmotionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new StockmotionTableMap());
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
        return StockmotionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Stockmotion or Criteria object.
     *
     * @param      mixed $values Criteria or Stockmotion object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Stockmotion object
        }

        if ($criteria->containsKey(StockmotionPeer::ID) && $criteria->keyContainsValue(StockmotionPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StockmotionPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Stockmotion or Criteria object.
     *
     * @param      mixed $values Criteria or Stockmotion object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(StockmotionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(StockmotionPeer::ID);
            $value = $criteria->remove(StockmotionPeer::ID);
            if ($value) {
                $selectCriteria->add(StockmotionPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(StockmotionPeer::TABLE_NAME);
            }

        } else { // $values is Stockmotion object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the StockMotion table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += StockmotionPeer::doOnDeleteCascade(new Criteria(StockmotionPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(StockmotionPeer::TABLE_NAME, $con, StockmotionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StockmotionPeer::clearInstancePool();
            StockmotionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Stockmotion or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Stockmotion object or primary key or array of primary keys
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
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Stockmotion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StockmotionPeer::DATABASE_NAME);
            $criteria->add(StockmotionPeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(StockmotionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += StockmotionPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                StockmotionPeer::clearInstancePool();
            } elseif ($values instanceof Stockmotion) { // it's a model object
                StockmotionPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    StockmotionPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            StockmotionPeer::clearRelatedInstancePool();
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
        $objects = StockmotionPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related StockmotionItem objects
            $criteria = new Criteria(StockmotionItemPeer::DATABASE_NAME);

            $criteria->add(StockmotionItemPeer::MASTER_ID, $obj->getId());
            $affectedRows += StockmotionItemPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Stockmotion object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Stockmotion $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(StockmotionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(StockmotionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(StockmotionPeer::DATABASE_NAME, StockmotionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Stockmotion
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = StockmotionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(StockmotionPeer::DATABASE_NAME);
        $criteria->add(StockmotionPeer::ID, $pk);

        $v = StockmotionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Stockmotion[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(StockmotionPeer::DATABASE_NAME);
            $criteria->add(StockmotionPeer::ID, $pks, Criteria::IN);
            $objs = StockmotionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseStockmotionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseStockmotionPeer::buildTableMap();

