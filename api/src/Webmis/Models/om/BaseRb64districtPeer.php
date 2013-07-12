<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Rb64district;
use Webmis\Models\Rb64districtPeer;
use Webmis\Models\map\Rb64districtTableMap;

/**
 * Base static class for performing query and update operations on the 'rb64District' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseRb64districtPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'rb64District';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Rb64district';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Rb64districtTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the id field */
    const ID = 'rb64District.id';

    /** the column name for the name field */
    const NAME = 'rb64District.name';

    /** the column name for the code_tfoms field */
    const CODE_TFOMS = 'rb64District.code_tfoms';

    /** the column name for the socr field */
    const SOCR = 'rb64District.socr';

    /** the column name for the code field */
    const CODE = 'rb64District.code';

    /** the column name for the index field */
    const INDEX = 'rb64District.index';

    /** the column name for the gninmb field */
    const GNINMB = 'rb64District.gninmb';

    /** the column name for the uno field */
    const UNO = 'rb64District.uno';

    /** the column name for the ocatd field */
    const OCATD = 'rb64District.ocatd';

    /** the column name for the status field */
    const STATUS = 'rb64District.status';

    /** the column name for the parent field */
    const PARENT = 'rb64District.parent';

    /** the column name for the infis field */
    const INFIS = 'rb64District.infis';

    /** the column name for the prefix field */
    const PREFIX = 'rb64District.prefix';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Rb64district objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Rb64district[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. Rb64districtPeer::$fieldNames[Rb64districtPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'CodeTfoms', 'Socr', 'Code', 'Index', 'Gninmb', 'Uno', 'Ocatd', 'Status', 'Parent', 'Infis', 'Prefix', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'codeTfoms', 'socr', 'code', 'index', 'gninmb', 'uno', 'ocatd', 'status', 'parent', 'infis', 'prefix', ),
        BasePeer::TYPE_COLNAME => array (Rb64districtPeer::ID, Rb64districtPeer::NAME, Rb64districtPeer::CODE_TFOMS, Rb64districtPeer::SOCR, Rb64districtPeer::CODE, Rb64districtPeer::INDEX, Rb64districtPeer::GNINMB, Rb64districtPeer::UNO, Rb64districtPeer::OCATD, Rb64districtPeer::STATUS, Rb64districtPeer::PARENT, Rb64districtPeer::INFIS, Rb64districtPeer::PREFIX, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'NAME', 'CODE_TFOMS', 'SOCR', 'CODE', 'INDEX', 'GNINMB', 'UNO', 'OCATD', 'STATUS', 'PARENT', 'INFIS', 'PREFIX', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'code_tfoms', 'socr', 'code', 'index', 'gninmb', 'uno', 'ocatd', 'status', 'parent', 'infis', 'prefix', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. Rb64districtPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'CodeTfoms' => 2, 'Socr' => 3, 'Code' => 4, 'Index' => 5, 'Gninmb' => 6, 'Uno' => 7, 'Ocatd' => 8, 'Status' => 9, 'Parent' => 10, 'Infis' => 11, 'Prefix' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'codeTfoms' => 2, 'socr' => 3, 'code' => 4, 'index' => 5, 'gninmb' => 6, 'uno' => 7, 'ocatd' => 8, 'status' => 9, 'parent' => 10, 'infis' => 11, 'prefix' => 12, ),
        BasePeer::TYPE_COLNAME => array (Rb64districtPeer::ID => 0, Rb64districtPeer::NAME => 1, Rb64districtPeer::CODE_TFOMS => 2, Rb64districtPeer::SOCR => 3, Rb64districtPeer::CODE => 4, Rb64districtPeer::INDEX => 5, Rb64districtPeer::GNINMB => 6, Rb64districtPeer::UNO => 7, Rb64districtPeer::OCATD => 8, Rb64districtPeer::STATUS => 9, Rb64districtPeer::PARENT => 10, Rb64districtPeer::INFIS => 11, Rb64districtPeer::PREFIX => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'NAME' => 1, 'CODE_TFOMS' => 2, 'SOCR' => 3, 'CODE' => 4, 'INDEX' => 5, 'GNINMB' => 6, 'UNO' => 7, 'OCATD' => 8, 'STATUS' => 9, 'PARENT' => 10, 'INFIS' => 11, 'PREFIX' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'code_tfoms' => 2, 'socr' => 3, 'code' => 4, 'index' => 5, 'gninmb' => 6, 'uno' => 7, 'ocatd' => 8, 'status' => 9, 'parent' => 10, 'infis' => 11, 'prefix' => 12, ),
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
        $toNames = Rb64districtPeer::getFieldNames($toType);
        $key = isset(Rb64districtPeer::$fieldKeys[$fromType][$name]) ? Rb64districtPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(Rb64districtPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, Rb64districtPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return Rb64districtPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. Rb64districtPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(Rb64districtPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(Rb64districtPeer::ID);
            $criteria->addSelectColumn(Rb64districtPeer::NAME);
            $criteria->addSelectColumn(Rb64districtPeer::CODE_TFOMS);
            $criteria->addSelectColumn(Rb64districtPeer::SOCR);
            $criteria->addSelectColumn(Rb64districtPeer::CODE);
            $criteria->addSelectColumn(Rb64districtPeer::INDEX);
            $criteria->addSelectColumn(Rb64districtPeer::GNINMB);
            $criteria->addSelectColumn(Rb64districtPeer::UNO);
            $criteria->addSelectColumn(Rb64districtPeer::OCATD);
            $criteria->addSelectColumn(Rb64districtPeer::STATUS);
            $criteria->addSelectColumn(Rb64districtPeer::PARENT);
            $criteria->addSelectColumn(Rb64districtPeer::INFIS);
            $criteria->addSelectColumn(Rb64districtPeer::PREFIX);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.code_tfoms');
            $criteria->addSelectColumn($alias . '.socr');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.index');
            $criteria->addSelectColumn($alias . '.gninmb');
            $criteria->addSelectColumn($alias . '.uno');
            $criteria->addSelectColumn($alias . '.ocatd');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.parent');
            $criteria->addSelectColumn($alias . '.infis');
            $criteria->addSelectColumn($alias . '.prefix');
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
        $criteria->setPrimaryTableName(Rb64districtPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Rb64districtPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(Rb64districtPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rb64district
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = Rb64districtPeer::doSelect($critcopy, $con);
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
        return Rb64districtPeer::populateObjects(Rb64districtPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            Rb64districtPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(Rb64districtPeer::DATABASE_NAME);

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
     * @param      Rb64district $obj A Rb64district object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            Rb64districtPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Rb64district object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Rb64district) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Rb64district object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(Rb64districtPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Rb64district Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(Rb64districtPeer::$instances[$key])) {
                return Rb64districtPeer::$instances[$key];
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
        foreach (Rb64districtPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        Rb64districtPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to rb64District
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
        $cls = Rb64districtPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = Rb64districtPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = Rb64districtPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                Rb64districtPeer::addInstanceToPool($obj, $key);
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
     * @return array (Rb64district object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = Rb64districtPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = Rb64districtPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + Rb64districtPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = Rb64districtPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            Rb64districtPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(Rb64districtPeer::DATABASE_NAME)->getTable(Rb64districtPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRb64districtPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRb64districtPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Rb64districtTableMap());
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
        return Rb64districtPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Rb64district or Criteria object.
     *
     * @param      mixed $values Criteria or Rb64district object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Rb64district object
        }

        if ($criteria->containsKey(Rb64districtPeer::ID) && $criteria->keyContainsValue(Rb64districtPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.Rb64districtPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(Rb64districtPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Rb64district or Criteria object.
     *
     * @param      mixed $values Criteria or Rb64district object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(Rb64districtPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(Rb64districtPeer::ID);
            $value = $criteria->remove(Rb64districtPeer::ID);
            if ($value) {
                $selectCriteria->add(Rb64districtPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(Rb64districtPeer::TABLE_NAME);
            }

        } else { // $values is Rb64district object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(Rb64districtPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rb64District table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(Rb64districtPeer::TABLE_NAME, $con, Rb64districtPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Rb64districtPeer::clearInstancePool();
            Rb64districtPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Rb64district or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Rb64district object or primary key or array of primary keys
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
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            Rb64districtPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Rb64district) { // it's a model object
            // invalidate the cache for this single object
            Rb64districtPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(Rb64districtPeer::DATABASE_NAME);
            $criteria->add(Rb64districtPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                Rb64districtPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(Rb64districtPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            Rb64districtPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Rb64district object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Rb64district $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(Rb64districtPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(Rb64districtPeer::TABLE_NAME);

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

        return BasePeer::doValidate(Rb64districtPeer::DATABASE_NAME, Rb64districtPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Rb64district
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = Rb64districtPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(Rb64districtPeer::DATABASE_NAME);
        $criteria->add(Rb64districtPeer::ID, $pk);

        $v = Rb64districtPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Rb64district[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(Rb64districtPeer::DATABASE_NAME);
            $criteria->add(Rb64districtPeer::ID, $pks, Criteria::IN);
            $objs = Rb64districtPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRb64districtPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRb64districtPeer::buildTableMap();

