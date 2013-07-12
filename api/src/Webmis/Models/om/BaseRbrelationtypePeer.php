<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Rbrelationtype;
use Webmis\Models\RbrelationtypePeer;
use Webmis\Models\map\RbrelationtypeTableMap;

/**
 * Base static class for performing query and update operations on the 'rbRelationType' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseRbrelationtypePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'rbRelationType';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Rbrelationtype';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RbrelationtypeTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the id field */
    const ID = 'rbRelationType.id';

    /** the column name for the code field */
    const CODE = 'rbRelationType.code';

    /** the column name for the leftName field */
    const LEFTNAME = 'rbRelationType.leftName';

    /** the column name for the rightName field */
    const RIGHTNAME = 'rbRelationType.rightName';

    /** the column name for the isDirectGenetic field */
    const ISDIRECTGENETIC = 'rbRelationType.isDirectGenetic';

    /** the column name for the isBackwardGenetic field */
    const ISBACKWARDGENETIC = 'rbRelationType.isBackwardGenetic';

    /** the column name for the isDirectRepresentative field */
    const ISDIRECTREPRESENTATIVE = 'rbRelationType.isDirectRepresentative';

    /** the column name for the isBackwardRepresentative field */
    const ISBACKWARDREPRESENTATIVE = 'rbRelationType.isBackwardRepresentative';

    /** the column name for the isDirectEpidemic field */
    const ISDIRECTEPIDEMIC = 'rbRelationType.isDirectEpidemic';

    /** the column name for the isBackwardEpidemic field */
    const ISBACKWARDEPIDEMIC = 'rbRelationType.isBackwardEpidemic';

    /** the column name for the isDirectDonation field */
    const ISDIRECTDONATION = 'rbRelationType.isDirectDonation';

    /** the column name for the isBackwardDonation field */
    const ISBACKWARDDONATION = 'rbRelationType.isBackwardDonation';

    /** the column name for the leftSex field */
    const LEFTSEX = 'rbRelationType.leftSex';

    /** the column name for the rightSex field */
    const RIGHTSEX = 'rbRelationType.rightSex';

    /** the column name for the regionalCode field */
    const REGIONALCODE = 'rbRelationType.regionalCode';

    /** the column name for the regionalReverseCode field */
    const REGIONALREVERSECODE = 'rbRelationType.regionalReverseCode';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Rbrelationtype objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Rbrelationtype[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RbrelationtypePeer::$fieldNames[RbrelationtypePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Code', 'Leftname', 'Rightname', 'Isdirectgenetic', 'Isbackwardgenetic', 'Isdirectrepresentative', 'Isbackwardrepresentative', 'Isdirectepidemic', 'Isbackwardepidemic', 'Isdirectdonation', 'Isbackwarddonation', 'Leftsex', 'Rightsex', 'Regionalcode', 'Regionalreversecode', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'code', 'leftname', 'rightname', 'isdirectgenetic', 'isbackwardgenetic', 'isdirectrepresentative', 'isbackwardrepresentative', 'isdirectepidemic', 'isbackwardepidemic', 'isdirectdonation', 'isbackwarddonation', 'leftsex', 'rightsex', 'regionalcode', 'regionalreversecode', ),
        BasePeer::TYPE_COLNAME => array (RbrelationtypePeer::ID, RbrelationtypePeer::CODE, RbrelationtypePeer::LEFTNAME, RbrelationtypePeer::RIGHTNAME, RbrelationtypePeer::ISDIRECTGENETIC, RbrelationtypePeer::ISBACKWARDGENETIC, RbrelationtypePeer::ISDIRECTREPRESENTATIVE, RbrelationtypePeer::ISBACKWARDREPRESENTATIVE, RbrelationtypePeer::ISDIRECTEPIDEMIC, RbrelationtypePeer::ISBACKWARDEPIDEMIC, RbrelationtypePeer::ISDIRECTDONATION, RbrelationtypePeer::ISBACKWARDDONATION, RbrelationtypePeer::LEFTSEX, RbrelationtypePeer::RIGHTSEX, RbrelationtypePeer::REGIONALCODE, RbrelationtypePeer::REGIONALREVERSECODE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODE', 'LEFTNAME', 'RIGHTNAME', 'ISDIRECTGENETIC', 'ISBACKWARDGENETIC', 'ISDIRECTREPRESENTATIVE', 'ISBACKWARDREPRESENTATIVE', 'ISDIRECTEPIDEMIC', 'ISBACKWARDEPIDEMIC', 'ISDIRECTDONATION', 'ISBACKWARDDONATION', 'LEFTSEX', 'RIGHTSEX', 'REGIONALCODE', 'REGIONALREVERSECODE', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'code', 'leftName', 'rightName', 'isDirectGenetic', 'isBackwardGenetic', 'isDirectRepresentative', 'isBackwardRepresentative', 'isDirectEpidemic', 'isBackwardEpidemic', 'isDirectDonation', 'isBackwardDonation', 'leftSex', 'rightSex', 'regionalCode', 'regionalReverseCode', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RbrelationtypePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Code' => 1, 'Leftname' => 2, 'Rightname' => 3, 'Isdirectgenetic' => 4, 'Isbackwardgenetic' => 5, 'Isdirectrepresentative' => 6, 'Isbackwardrepresentative' => 7, 'Isdirectepidemic' => 8, 'Isbackwardepidemic' => 9, 'Isdirectdonation' => 10, 'Isbackwarddonation' => 11, 'Leftsex' => 12, 'Rightsex' => 13, 'Regionalcode' => 14, 'Regionalreversecode' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'code' => 1, 'leftname' => 2, 'rightname' => 3, 'isdirectgenetic' => 4, 'isbackwardgenetic' => 5, 'isdirectrepresentative' => 6, 'isbackwardrepresentative' => 7, 'isdirectepidemic' => 8, 'isbackwardepidemic' => 9, 'isdirectdonation' => 10, 'isbackwarddonation' => 11, 'leftsex' => 12, 'rightsex' => 13, 'regionalcode' => 14, 'regionalreversecode' => 15, ),
        BasePeer::TYPE_COLNAME => array (RbrelationtypePeer::ID => 0, RbrelationtypePeer::CODE => 1, RbrelationtypePeer::LEFTNAME => 2, RbrelationtypePeer::RIGHTNAME => 3, RbrelationtypePeer::ISDIRECTGENETIC => 4, RbrelationtypePeer::ISBACKWARDGENETIC => 5, RbrelationtypePeer::ISDIRECTREPRESENTATIVE => 6, RbrelationtypePeer::ISBACKWARDREPRESENTATIVE => 7, RbrelationtypePeer::ISDIRECTEPIDEMIC => 8, RbrelationtypePeer::ISBACKWARDEPIDEMIC => 9, RbrelationtypePeer::ISDIRECTDONATION => 10, RbrelationtypePeer::ISBACKWARDDONATION => 11, RbrelationtypePeer::LEFTSEX => 12, RbrelationtypePeer::RIGHTSEX => 13, RbrelationtypePeer::REGIONALCODE => 14, RbrelationtypePeer::REGIONALREVERSECODE => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODE' => 1, 'LEFTNAME' => 2, 'RIGHTNAME' => 3, 'ISDIRECTGENETIC' => 4, 'ISBACKWARDGENETIC' => 5, 'ISDIRECTREPRESENTATIVE' => 6, 'ISBACKWARDREPRESENTATIVE' => 7, 'ISDIRECTEPIDEMIC' => 8, 'ISBACKWARDEPIDEMIC' => 9, 'ISDIRECTDONATION' => 10, 'ISBACKWARDDONATION' => 11, 'LEFTSEX' => 12, 'RIGHTSEX' => 13, 'REGIONALCODE' => 14, 'REGIONALREVERSECODE' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'code' => 1, 'leftName' => 2, 'rightName' => 3, 'isDirectGenetic' => 4, 'isBackwardGenetic' => 5, 'isDirectRepresentative' => 6, 'isBackwardRepresentative' => 7, 'isDirectEpidemic' => 8, 'isBackwardEpidemic' => 9, 'isDirectDonation' => 10, 'isBackwardDonation' => 11, 'leftSex' => 12, 'rightSex' => 13, 'regionalCode' => 14, 'regionalReverseCode' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $toNames = RbrelationtypePeer::getFieldNames($toType);
        $key = isset(RbrelationtypePeer::$fieldKeys[$fromType][$name]) ? RbrelationtypePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RbrelationtypePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RbrelationtypePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RbrelationtypePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RbrelationtypePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RbrelationtypePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RbrelationtypePeer::ID);
            $criteria->addSelectColumn(RbrelationtypePeer::CODE);
            $criteria->addSelectColumn(RbrelationtypePeer::LEFTNAME);
            $criteria->addSelectColumn(RbrelationtypePeer::RIGHTNAME);
            $criteria->addSelectColumn(RbrelationtypePeer::ISDIRECTGENETIC);
            $criteria->addSelectColumn(RbrelationtypePeer::ISBACKWARDGENETIC);
            $criteria->addSelectColumn(RbrelationtypePeer::ISDIRECTREPRESENTATIVE);
            $criteria->addSelectColumn(RbrelationtypePeer::ISBACKWARDREPRESENTATIVE);
            $criteria->addSelectColumn(RbrelationtypePeer::ISDIRECTEPIDEMIC);
            $criteria->addSelectColumn(RbrelationtypePeer::ISBACKWARDEPIDEMIC);
            $criteria->addSelectColumn(RbrelationtypePeer::ISDIRECTDONATION);
            $criteria->addSelectColumn(RbrelationtypePeer::ISBACKWARDDONATION);
            $criteria->addSelectColumn(RbrelationtypePeer::LEFTSEX);
            $criteria->addSelectColumn(RbrelationtypePeer::RIGHTSEX);
            $criteria->addSelectColumn(RbrelationtypePeer::REGIONALCODE);
            $criteria->addSelectColumn(RbrelationtypePeer::REGIONALREVERSECODE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.leftName');
            $criteria->addSelectColumn($alias . '.rightName');
            $criteria->addSelectColumn($alias . '.isDirectGenetic');
            $criteria->addSelectColumn($alias . '.isBackwardGenetic');
            $criteria->addSelectColumn($alias . '.isDirectRepresentative');
            $criteria->addSelectColumn($alias . '.isBackwardRepresentative');
            $criteria->addSelectColumn($alias . '.isDirectEpidemic');
            $criteria->addSelectColumn($alias . '.isBackwardEpidemic');
            $criteria->addSelectColumn($alias . '.isDirectDonation');
            $criteria->addSelectColumn($alias . '.isBackwardDonation');
            $criteria->addSelectColumn($alias . '.leftSex');
            $criteria->addSelectColumn($alias . '.rightSex');
            $criteria->addSelectColumn($alias . '.regionalCode');
            $criteria->addSelectColumn($alias . '.regionalReverseCode');
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
        $criteria->setPrimaryTableName(RbrelationtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbrelationtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RbrelationtypePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbrelationtype
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RbrelationtypePeer::doSelect($critcopy, $con);
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
        return RbrelationtypePeer::populateObjects(RbrelationtypePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RbrelationtypePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RbrelationtypePeer::DATABASE_NAME);

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
     * @param      Rbrelationtype $obj A Rbrelationtype object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            RbrelationtypePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Rbrelationtype object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Rbrelationtype) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Rbrelationtype object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RbrelationtypePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Rbrelationtype Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RbrelationtypePeer::$instances[$key])) {
                return RbrelationtypePeer::$instances[$key];
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
        foreach (RbrelationtypePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RbrelationtypePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to rbRelationType
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
        $cls = RbrelationtypePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RbrelationtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RbrelationtypePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RbrelationtypePeer::addInstanceToPool($obj, $key);
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
     * @return array (Rbrelationtype object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RbrelationtypePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RbrelationtypePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RbrelationtypePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RbrelationtypePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RbrelationtypePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(RbrelationtypePeer::DATABASE_NAME)->getTable(RbrelationtypePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRbrelationtypePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRbrelationtypePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RbrelationtypeTableMap());
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
        return RbrelationtypePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Rbrelationtype or Criteria object.
     *
     * @param      mixed $values Criteria or Rbrelationtype object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Rbrelationtype object
        }

        if ($criteria->containsKey(RbrelationtypePeer::ID) && $criteria->keyContainsValue(RbrelationtypePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RbrelationtypePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(RbrelationtypePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Rbrelationtype or Criteria object.
     *
     * @param      mixed $values Criteria or Rbrelationtype object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RbrelationtypePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RbrelationtypePeer::ID);
            $value = $criteria->remove(RbrelationtypePeer::ID);
            if ($value) {
                $selectCriteria->add(RbrelationtypePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RbrelationtypePeer::TABLE_NAME);
            }

        } else { // $values is Rbrelationtype object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RbrelationtypePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rbRelationType table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RbrelationtypePeer::TABLE_NAME, $con, RbrelationtypePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RbrelationtypePeer::clearInstancePool();
            RbrelationtypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Rbrelationtype or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Rbrelationtype object or primary key or array of primary keys
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
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RbrelationtypePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Rbrelationtype) { // it's a model object
            // invalidate the cache for this single object
            RbrelationtypePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RbrelationtypePeer::DATABASE_NAME);
            $criteria->add(RbrelationtypePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RbrelationtypePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RbrelationtypePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            RbrelationtypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Rbrelationtype object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Rbrelationtype $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RbrelationtypePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RbrelationtypePeer::TABLE_NAME);

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

        return BasePeer::doValidate(RbrelationtypePeer::DATABASE_NAME, RbrelationtypePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Rbrelationtype
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RbrelationtypePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RbrelationtypePeer::DATABASE_NAME);
        $criteria->add(RbrelationtypePeer::ID, $pk);

        $v = RbrelationtypePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Rbrelationtype[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RbrelationtypePeer::DATABASE_NAME);
            $criteria->add(RbrelationtypePeer::ID, $pks, Criteria::IN);
            $objs = RbrelationtypePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRbrelationtypePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRbrelationtypePeer::buildTableMap();

