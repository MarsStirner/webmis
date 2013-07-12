<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\EventtypePeer;
use Webmis\Models\Medicalkindunit;
use Webmis\Models\MedicalkindunitPeer;
use Webmis\Models\RbmedicalaidunitPeer;
use Webmis\Models\RbmedicalkindPeer;
use Webmis\Models\RbpaytypePeer;
use Webmis\Models\RbtarifftypePeer;
use Webmis\Models\map\MedicalkindunitTableMap;

/**
 * Base static class for performing query and update operations on the 'MedicalKindUnit' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseMedicalkindunitPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'MedicalKindUnit';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Medicalkindunit';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MedicalkindunitTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 6;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 6;

    /** the column name for the id field */
    const ID = 'MedicalKindUnit.id';

    /** the column name for the rbMedicalKind_id field */
    const RBMEDICALKIND_ID = 'MedicalKindUnit.rbMedicalKind_id';

    /** the column name for the eventType_id field */
    const EVENTTYPE_ID = 'MedicalKindUnit.eventType_id';

    /** the column name for the rbMedicalAidUnit_id field */
    const RBMEDICALAIDUNIT_ID = 'MedicalKindUnit.rbMedicalAidUnit_id';

    /** the column name for the rbPayType_id field */
    const RBPAYTYPE_ID = 'MedicalKindUnit.rbPayType_id';

    /** the column name for the rbTariffType_id field */
    const RBTARIFFTYPE_ID = 'MedicalKindUnit.rbTariffType_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Medicalkindunit objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Medicalkindunit[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MedicalkindunitPeer::$fieldNames[MedicalkindunitPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'RbmedicalkindId', 'EventtypeId', 'RbmedicalaidunitId', 'RbpaytypeId', 'RbtarifftypeId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'rbmedicalkindId', 'eventtypeId', 'rbmedicalaidunitId', 'rbpaytypeId', 'rbtarifftypeId', ),
        BasePeer::TYPE_COLNAME => array (MedicalkindunitPeer::ID, MedicalkindunitPeer::RBMEDICALKIND_ID, MedicalkindunitPeer::EVENTTYPE_ID, MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, MedicalkindunitPeer::RBPAYTYPE_ID, MedicalkindunitPeer::RBTARIFFTYPE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'RBMEDICALKIND_ID', 'EVENTTYPE_ID', 'RBMEDICALAIDUNIT_ID', 'RBPAYTYPE_ID', 'RBTARIFFTYPE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'rbMedicalKind_id', 'eventType_id', 'rbMedicalAidUnit_id', 'rbPayType_id', 'rbTariffType_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MedicalkindunitPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'RbmedicalkindId' => 1, 'EventtypeId' => 2, 'RbmedicalaidunitId' => 3, 'RbpaytypeId' => 4, 'RbtarifftypeId' => 5, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'rbmedicalkindId' => 1, 'eventtypeId' => 2, 'rbmedicalaidunitId' => 3, 'rbpaytypeId' => 4, 'rbtarifftypeId' => 5, ),
        BasePeer::TYPE_COLNAME => array (MedicalkindunitPeer::ID => 0, MedicalkindunitPeer::RBMEDICALKIND_ID => 1, MedicalkindunitPeer::EVENTTYPE_ID => 2, MedicalkindunitPeer::RBMEDICALAIDUNIT_ID => 3, MedicalkindunitPeer::RBPAYTYPE_ID => 4, MedicalkindunitPeer::RBTARIFFTYPE_ID => 5, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'RBMEDICALKIND_ID' => 1, 'EVENTTYPE_ID' => 2, 'RBMEDICALAIDUNIT_ID' => 3, 'RBPAYTYPE_ID' => 4, 'RBTARIFFTYPE_ID' => 5, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'rbMedicalKind_id' => 1, 'eventType_id' => 2, 'rbMedicalAidUnit_id' => 3, 'rbPayType_id' => 4, 'rbTariffType_id' => 5, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
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
        $toNames = MedicalkindunitPeer::getFieldNames($toType);
        $key = isset(MedicalkindunitPeer::$fieldKeys[$fromType][$name]) ? MedicalkindunitPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MedicalkindunitPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MedicalkindunitPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MedicalkindunitPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. MedicalkindunitPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MedicalkindunitPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MedicalkindunitPeer::ID);
            $criteria->addSelectColumn(MedicalkindunitPeer::RBMEDICALKIND_ID);
            $criteria->addSelectColumn(MedicalkindunitPeer::EVENTTYPE_ID);
            $criteria->addSelectColumn(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID);
            $criteria->addSelectColumn(MedicalkindunitPeer::RBPAYTYPE_ID);
            $criteria->addSelectColumn(MedicalkindunitPeer::RBTARIFFTYPE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rbMedicalKind_id');
            $criteria->addSelectColumn($alias . '.eventType_id');
            $criteria->addSelectColumn($alias . '.rbMedicalAidUnit_id');
            $criteria->addSelectColumn($alias . '.rbPayType_id');
            $criteria->addSelectColumn($alias . '.rbTariffType_id');
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
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Medicalkindunit
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MedicalkindunitPeer::doSelect($critcopy, $con);
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
        return MedicalkindunitPeer::populateObjects(MedicalkindunitPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

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
     * @param      Medicalkindunit $obj A Medicalkindunit object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            MedicalkindunitPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Medicalkindunit object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Medicalkindunit) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Medicalkindunit object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MedicalkindunitPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Medicalkindunit Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MedicalkindunitPeer::$instances[$key])) {
                return MedicalkindunitPeer::$instances[$key];
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
        foreach (MedicalkindunitPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        MedicalkindunitPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to MedicalKindUnit
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
        $cls = MedicalkindunitPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MedicalkindunitPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MedicalkindunitPeer::addInstanceToPool($obj, $key);
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
     * @return array (Medicalkindunit object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MedicalkindunitPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MedicalkindunitPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MedicalkindunitPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbmedicalkind table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbmedicalkind(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbmedicalaidunit table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbmedicalaidunit(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbpaytype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbpaytype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtarifftype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbtarifftype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

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
     * Selects a collection of Medicalkindunit objects pre-filled with their Rbmedicalkind objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbmedicalkind(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;
        RbmedicalkindPeer::addSelectColumns($criteria);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to $obj2 (Rbmedicalkind)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with their Eventtype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinEventtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;
        EventtypePeer::addSelectColumns($criteria);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Medicalkindunit) to $obj2 (Eventtype)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with their Rbmedicalaidunit objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbmedicalaidunit(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;
        RbmedicalaidunitPeer::addSelectColumns($criteria);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbmedicalaidunitPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbmedicalaidunitPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbmedicalaidunitPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbmedicalaidunitPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to $obj2 (Rbmedicalaidunit)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with their Rbpaytype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbpaytype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;
        RbpaytypePeer::addSelectColumns($criteria);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbpaytypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbpaytypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbpaytypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbpaytypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to $obj2 (Rbpaytype)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with their Rbtarifftype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbtarifftype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;
        RbtarifftypePeer::addSelectColumns($criteria);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbtarifftypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbtarifftypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbtarifftypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbtarifftypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to $obj2 (Rbtarifftype)
                $obj2->addMedicalkindunit($obj1);

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
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

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
     * Selects a collection of Medicalkindunit objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol2 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidunitPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbmedicalaidunitPeer::NUM_HYDRATE_COLUMNS;

        RbpaytypePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbpaytypePeer::NUM_HYDRATE_COLUMNS;

        RbtarifftypePeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RbtarifftypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbmedicalkind rows

            $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addMedicalkindunit($obj1);
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

                // Add the $obj1 (Medicalkindunit) to the collection in $obj3 (Eventtype)
                $obj3->addMedicalkindunit($obj1);
            } // if joined row not null

            // Add objects for joined Rbmedicalaidunit rows

            $key4 = RbmedicalaidunitPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = RbmedicalaidunitPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = RbmedicalaidunitPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbmedicalaidunitPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj4 (Rbmedicalaidunit)
                $obj4->addMedicalkindunit($obj1);
            } // if joined row not null

            // Add objects for joined Rbpaytype rows

            $key5 = RbpaytypePeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = RbpaytypePeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = RbpaytypePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbpaytypePeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj5 (Rbpaytype)
                $obj5->addMedicalkindunit($obj1);
            } // if joined row not null

            // Add objects for joined Rbtarifftype rows

            $key6 = RbtarifftypePeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = RbtarifftypePeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = RbtarifftypePeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RbtarifftypePeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj6 (Rbtarifftype)
                $obj6->addMedicalkindunit($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbmedicalkind table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbmedicalkind(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbmedicalaidunit table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbmedicalaidunit(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbpaytype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbpaytype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtarifftype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbtarifftype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MedicalkindunitPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

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
     * Selects a collection of Medicalkindunit objects pre-filled with all related objects except Rbmedicalkind.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbmedicalkind(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol2 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidunitPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbmedicalaidunitPeer::NUM_HYDRATE_COLUMNS;

        RbpaytypePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbpaytypePeer::NUM_HYDRATE_COLUMNS;

        RbtarifftypePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbtarifftypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Medicalkindunit) to the collection in $obj2 (Eventtype)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbmedicalaidunit rows

                $key3 = RbmedicalaidunitPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbmedicalaidunitPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbmedicalaidunitPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbmedicalaidunitPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj3 (Rbmedicalaidunit)
                $obj3->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbpaytype rows

                $key4 = RbpaytypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbpaytypePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbpaytypePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbpaytypePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj4 (Rbpaytype)
                $obj4->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtarifftype rows

                $key5 = RbtarifftypePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbtarifftypePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbtarifftypePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbtarifftypePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj5 (Rbtarifftype)
                $obj5->addMedicalkindunit($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with all related objects except Eventtype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
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
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol2 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidunitPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbmedicalaidunitPeer::NUM_HYDRATE_COLUMNS;

        RbpaytypePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbpaytypePeer::NUM_HYDRATE_COLUMNS;

        RbtarifftypePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbtarifftypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbmedicalkind rows

                $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbmedicalaidunit rows

                $key3 = RbmedicalaidunitPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbmedicalaidunitPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbmedicalaidunitPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbmedicalaidunitPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj3 (Rbmedicalaidunit)
                $obj3->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbpaytype rows

                $key4 = RbpaytypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbpaytypePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbpaytypePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbpaytypePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj4 (Rbpaytype)
                $obj4->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtarifftype rows

                $key5 = RbtarifftypePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbtarifftypePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbtarifftypePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbtarifftypePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj5 (Rbtarifftype)
                $obj5->addMedicalkindunit($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with all related objects except Rbmedicalaidunit.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbmedicalaidunit(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol2 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbpaytypePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbpaytypePeer::NUM_HYDRATE_COLUMNS;

        RbtarifftypePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbtarifftypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbmedicalkind rows

                $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Eventtype rows

                $key3 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = EventtypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = EventtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EventtypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj3 (Eventtype)
                $obj3->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbpaytype rows

                $key4 = RbpaytypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbpaytypePeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbpaytypePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbpaytypePeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj4 (Rbpaytype)
                $obj4->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtarifftype rows

                $key5 = RbtarifftypePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbtarifftypePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbtarifftypePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbtarifftypePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj5 (Rbtarifftype)
                $obj5->addMedicalkindunit($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with all related objects except Rbpaytype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbpaytype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol2 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidunitPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbmedicalaidunitPeer::NUM_HYDRATE_COLUMNS;

        RbtarifftypePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbtarifftypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBTARIFFTYPE_ID, RbtarifftypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbmedicalkind rows

                $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Eventtype rows

                $key3 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = EventtypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = EventtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EventtypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj3 (Eventtype)
                $obj3->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbmedicalaidunit rows

                $key4 = RbmedicalaidunitPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbmedicalaidunitPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbmedicalaidunitPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbmedicalaidunitPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj4 (Rbmedicalaidunit)
                $obj4->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtarifftype rows

                $key5 = RbtarifftypePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbtarifftypePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbtarifftypePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbtarifftypePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj5 (Rbtarifftype)
                $obj5->addMedicalkindunit($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Medicalkindunit objects pre-filled with all related objects except Rbtarifftype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Medicalkindunit objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbtarifftype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);
        }

        MedicalkindunitPeer::addSelectColumns($criteria);
        $startcol2 = MedicalkindunitPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        EventtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidunitPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbmedicalaidunitPeer::NUM_HYDRATE_COLUMNS;

        RbpaytypePeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RbpaytypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::EVENTTYPE_ID, EventtypePeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, RbmedicalaidunitPeer::ID, $join_behavior);

        $criteria->addJoin(MedicalkindunitPeer::RBPAYTYPE_ID, RbpaytypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MedicalkindunitPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MedicalkindunitPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MedicalkindunitPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MedicalkindunitPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbmedicalkind rows

                $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Eventtype rows

                $key3 = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = EventtypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = EventtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EventtypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj3 (Eventtype)
                $obj3->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbmedicalaidunit rows

                $key4 = RbmedicalaidunitPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RbmedicalaidunitPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = RbmedicalaidunitPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbmedicalaidunitPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj4 (Rbmedicalaidunit)
                $obj4->addMedicalkindunit($obj1);

            } // if joined row is not null

                // Add objects for joined Rbpaytype rows

                $key5 = RbpaytypePeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RbpaytypePeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = RbpaytypePeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RbpaytypePeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Medicalkindunit) to the collection in $obj5 (Rbpaytype)
                $obj5->addMedicalkindunit($obj1);

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
        return Propel::getDatabaseMap(MedicalkindunitPeer::DATABASE_NAME)->getTable(MedicalkindunitPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMedicalkindunitPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMedicalkindunitPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new MedicalkindunitTableMap());
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
        return MedicalkindunitPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Medicalkindunit or Criteria object.
     *
     * @param      mixed $values Criteria or Medicalkindunit object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Medicalkindunit object
        }

        if ($criteria->containsKey(MedicalkindunitPeer::ID) && $criteria->keyContainsValue(MedicalkindunitPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MedicalkindunitPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Medicalkindunit or Criteria object.
     *
     * @param      mixed $values Criteria or Medicalkindunit object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MedicalkindunitPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MedicalkindunitPeer::ID);
            $value = $criteria->remove(MedicalkindunitPeer::ID);
            if ($value) {
                $selectCriteria->add(MedicalkindunitPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MedicalkindunitPeer::TABLE_NAME);
            }

        } else { // $values is Medicalkindunit object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the MedicalKindUnit table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MedicalkindunitPeer::TABLE_NAME, $con, MedicalkindunitPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MedicalkindunitPeer::clearInstancePool();
            MedicalkindunitPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Medicalkindunit or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Medicalkindunit object or primary key or array of primary keys
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
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MedicalkindunitPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Medicalkindunit) { // it's a model object
            // invalidate the cache for this single object
            MedicalkindunitPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MedicalkindunitPeer::DATABASE_NAME);
            $criteria->add(MedicalkindunitPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                MedicalkindunitPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MedicalkindunitPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            MedicalkindunitPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Medicalkindunit object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Medicalkindunit $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MedicalkindunitPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MedicalkindunitPeer::TABLE_NAME);

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

        return BasePeer::doValidate(MedicalkindunitPeer::DATABASE_NAME, MedicalkindunitPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Medicalkindunit
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MedicalkindunitPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MedicalkindunitPeer::DATABASE_NAME);
        $criteria->add(MedicalkindunitPeer::ID, $pk);

        $v = MedicalkindunitPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Medicalkindunit[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MedicalkindunitPeer::DATABASE_NAME);
            $criteria->add(MedicalkindunitPeer::ID, $pks, Criteria::IN);
            $objs = MedicalkindunitPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMedicalkindunitPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMedicalkindunitPeer::buildTableMap();

