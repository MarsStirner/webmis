<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\RbmedicalaidprofilePeer;
use Webmis\Models\RbservicePeer;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceProfilePeer;
use Webmis\Models\RbspecialityPeer;
use Webmis\Models\map\RbserviceProfileTableMap;

/**
 * Base static class for performing query and update operations on the 'rbService_Profile' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseRbserviceProfilePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'rbService_Profile';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\RbserviceProfile';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RbserviceProfileTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the id field */
    const ID = 'rbService_Profile.id';

    /** the column name for the idx field */
    const IDX = 'rbService_Profile.idx';

    /** the column name for the master_id field */
    const MASTER_ID = 'rbService_Profile.master_id';

    /** the column name for the speciality_id field */
    const SPECIALITY_ID = 'rbService_Profile.speciality_id';

    /** the column name for the sex field */
    const SEX = 'rbService_Profile.sex';

    /** the column name for the age field */
    const AGE = 'rbService_Profile.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'rbService_Profile.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'rbService_Profile.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'rbService_Profile.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'rbService_Profile.age_ec';

    /** the column name for the mkbRegExp field */
    const MKBREGEXP = 'rbService_Profile.mkbRegExp';

    /** the column name for the medicalAidProfile_id field */
    const MEDICALAIDPROFILE_ID = 'rbService_Profile.medicalAidProfile_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RbserviceProfile objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RbserviceProfile[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RbserviceProfilePeer::$fieldNames[RbserviceProfilePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Idx', 'MasterId', 'SpecialityId', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'Mkbregexp', 'MedicalaidprofileId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'idx', 'masterId', 'specialityId', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'mkbregexp', 'medicalaidprofileId', ),
        BasePeer::TYPE_COLNAME => array (RbserviceProfilePeer::ID, RbserviceProfilePeer::IDX, RbserviceProfilePeer::MASTER_ID, RbserviceProfilePeer::SPECIALITY_ID, RbserviceProfilePeer::SEX, RbserviceProfilePeer::AGE, RbserviceProfilePeer::AGE_BU, RbserviceProfilePeer::AGE_BC, RbserviceProfilePeer::AGE_EU, RbserviceProfilePeer::AGE_EC, RbserviceProfilePeer::MKBREGEXP, RbserviceProfilePeer::MEDICALAIDPROFILE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'IDX', 'MASTER_ID', 'SPECIALITY_ID', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'MKBREGEXP', 'MEDICALAIDPROFILE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'idx', 'master_id', 'speciality_id', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'mkbRegExp', 'medicalAidProfile_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RbserviceProfilePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Idx' => 1, 'MasterId' => 2, 'SpecialityId' => 3, 'Sex' => 4, 'Age' => 5, 'AgeBu' => 6, 'AgeBc' => 7, 'AgeEu' => 8, 'AgeEc' => 9, 'Mkbregexp' => 10, 'MedicalaidprofileId' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'idx' => 1, 'masterId' => 2, 'specialityId' => 3, 'sex' => 4, 'age' => 5, 'ageBu' => 6, 'ageBc' => 7, 'ageEu' => 8, 'ageEc' => 9, 'mkbregexp' => 10, 'medicalaidprofileId' => 11, ),
        BasePeer::TYPE_COLNAME => array (RbserviceProfilePeer::ID => 0, RbserviceProfilePeer::IDX => 1, RbserviceProfilePeer::MASTER_ID => 2, RbserviceProfilePeer::SPECIALITY_ID => 3, RbserviceProfilePeer::SEX => 4, RbserviceProfilePeer::AGE => 5, RbserviceProfilePeer::AGE_BU => 6, RbserviceProfilePeer::AGE_BC => 7, RbserviceProfilePeer::AGE_EU => 8, RbserviceProfilePeer::AGE_EC => 9, RbserviceProfilePeer::MKBREGEXP => 10, RbserviceProfilePeer::MEDICALAIDPROFILE_ID => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'IDX' => 1, 'MASTER_ID' => 2, 'SPECIALITY_ID' => 3, 'SEX' => 4, 'AGE' => 5, 'AGE_BU' => 6, 'AGE_BC' => 7, 'AGE_EU' => 8, 'AGE_EC' => 9, 'MKBREGEXP' => 10, 'MEDICALAIDPROFILE_ID' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'idx' => 1, 'master_id' => 2, 'speciality_id' => 3, 'sex' => 4, 'age' => 5, 'age_bu' => 6, 'age_bc' => 7, 'age_eu' => 8, 'age_ec' => 9, 'mkbRegExp' => 10, 'medicalAidProfile_id' => 11, ),
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
        $toNames = RbserviceProfilePeer::getFieldNames($toType);
        $key = isset(RbserviceProfilePeer::$fieldKeys[$fromType][$name]) ? RbserviceProfilePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RbserviceProfilePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RbserviceProfilePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RbserviceProfilePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RbserviceProfilePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RbserviceProfilePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RbserviceProfilePeer::ID);
            $criteria->addSelectColumn(RbserviceProfilePeer::IDX);
            $criteria->addSelectColumn(RbserviceProfilePeer::MASTER_ID);
            $criteria->addSelectColumn(RbserviceProfilePeer::SPECIALITY_ID);
            $criteria->addSelectColumn(RbserviceProfilePeer::SEX);
            $criteria->addSelectColumn(RbserviceProfilePeer::AGE);
            $criteria->addSelectColumn(RbserviceProfilePeer::AGE_BU);
            $criteria->addSelectColumn(RbserviceProfilePeer::AGE_BC);
            $criteria->addSelectColumn(RbserviceProfilePeer::AGE_EU);
            $criteria->addSelectColumn(RbserviceProfilePeer::AGE_EC);
            $criteria->addSelectColumn(RbserviceProfilePeer::MKBREGEXP);
            $criteria->addSelectColumn(RbserviceProfilePeer::MEDICALAIDPROFILE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.idx');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.speciality_id');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.mkbRegExp');
            $criteria->addSelectColumn($alias . '.medicalAidProfile_id');
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
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RbserviceProfile
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RbserviceProfilePeer::doSelect($critcopy, $con);
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
        return RbserviceProfilePeer::populateObjects(RbserviceProfilePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

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
     * @param      RbserviceProfile $obj A RbserviceProfile object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            RbserviceProfilePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RbserviceProfile object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RbserviceProfile) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RbserviceProfile object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RbserviceProfilePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RbserviceProfile Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RbserviceProfilePeer::$instances[$key])) {
                return RbserviceProfilePeer::$instances[$key];
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
        foreach (RbserviceProfilePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RbserviceProfilePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to rbService_Profile
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
        $cls = RbserviceProfilePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RbserviceProfilePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RbserviceProfilePeer::addInstanceToPool($obj, $key);
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
     * @return array (RbserviceProfile object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RbserviceProfilePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RbserviceProfilePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RbserviceProfilePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbservice table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbservice(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbmedicalaidprofile table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbmedicalaidprofile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbspeciality table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbspeciality(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);

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
     * Selects a collection of RbserviceProfile objects pre-filled with their Rbservice objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbservice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;
        RbservicePeer::addSelectColumns($criteria);

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbservicePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbservicePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbservicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbservicePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RbserviceProfile) to $obj2 (Rbservice)
                $obj2->addRbserviceProfile($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RbserviceProfile objects pre-filled with their Rbmedicalaidprofile objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbmedicalaidprofile(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;
        RbmedicalaidprofilePeer::addSelectColumns($criteria);

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbmedicalaidprofilePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbmedicalaidprofilePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbmedicalaidprofilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbmedicalaidprofilePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RbserviceProfile) to $obj2 (Rbmedicalaidprofile)
                $obj2->addRbserviceProfile($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RbserviceProfile objects pre-filled with their Rbspeciality objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbspeciality(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;
        RbspecialityPeer::addSelectColumns($criteria);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbspecialityPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbspecialityPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbspecialityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbspecialityPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RbserviceProfile) to $obj2 (Rbspeciality)
                $obj2->addRbserviceProfile($obj1);

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
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);

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
     * Selects a collection of RbserviceProfile objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol2 = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;

        RbservicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbservicePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidprofilePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbmedicalaidprofilePeer::NUM_HYDRATE_COLUMNS;

        RbspecialityPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbspecialityPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbservice rows

            $key2 = RbservicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbservicePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbservicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbservicePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj2 (Rbservice)
                $obj2->addRbserviceProfile($obj1);
            } // if joined row not null

            // Add objects for joined Rbmedicalaidprofile rows

            $key3 = RbmedicalaidprofilePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RbmedicalaidprofilePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RbmedicalaidprofilePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbmedicalaidprofilePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj3 (Rbmedicalaidprofile)
                $obj3->addRbserviceProfile($obj1);
            } // if joined row not null

            // Add objects for joined Rbspeciality rows

            $key4 = RbspecialityPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = RbspecialityPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = RbspecialityPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbspecialityPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj4 (Rbspeciality)
                $obj4->addRbserviceProfile($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbservice table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbservice(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbmedicalaidprofile table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbmedicalaidprofile(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbspeciality table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbspeciality(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbserviceProfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

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
     * Selects a collection of RbserviceProfile objects pre-filled with all related objects except Rbservice.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbservice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol2 = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidprofilePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalaidprofilePeer::NUM_HYDRATE_COLUMNS;

        RbspecialityPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbspecialityPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbmedicalaidprofile rows

                $key2 = RbmedicalaidprofilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbmedicalaidprofilePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbmedicalaidprofilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalaidprofilePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj2 (Rbmedicalaidprofile)
                $obj2->addRbserviceProfile($obj1);

            } // if joined row is not null

                // Add objects for joined Rbspeciality rows

                $key3 = RbspecialityPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbspecialityPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbspecialityPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbspecialityPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj3 (Rbspeciality)
                $obj3->addRbserviceProfile($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RbserviceProfile objects pre-filled with all related objects except Rbmedicalaidprofile.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbmedicalaidprofile(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol2 = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;

        RbservicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbservicePeer::NUM_HYDRATE_COLUMNS;

        RbspecialityPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbspecialityPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::SPECIALITY_ID, RbspecialityPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbservice rows

                $key2 = RbservicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbservicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbservicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbservicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj2 (Rbservice)
                $obj2->addRbserviceProfile($obj1);

            } // if joined row is not null

                // Add objects for joined Rbspeciality rows

                $key3 = RbspecialityPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbspecialityPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbspecialityPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbspecialityPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj3 (Rbspeciality)
                $obj3->addRbserviceProfile($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RbserviceProfile objects pre-filled with all related objects except Rbspeciality.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RbserviceProfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbspeciality(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);
        }

        RbserviceProfilePeer::addSelectColumns($criteria);
        $startcol2 = RbserviceProfilePeer::NUM_HYDRATE_COLUMNS;

        RbservicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbservicePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidprofilePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbmedicalaidprofilePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbserviceProfilePeer::MASTER_ID, RbservicePeer::ID, $join_behavior);

        $criteria->addJoin(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbserviceProfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbserviceProfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbserviceProfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbserviceProfilePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbservice rows

                $key2 = RbservicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbservicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbservicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbservicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj2 (Rbservice)
                $obj2->addRbserviceProfile($obj1);

            } // if joined row is not null

                // Add objects for joined Rbmedicalaidprofile rows

                $key3 = RbmedicalaidprofilePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbmedicalaidprofilePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbmedicalaidprofilePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbmedicalaidprofilePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RbserviceProfile) to the collection in $obj3 (Rbmedicalaidprofile)
                $obj3->addRbserviceProfile($obj1);

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
        return Propel::getDatabaseMap(RbserviceProfilePeer::DATABASE_NAME)->getTable(RbserviceProfilePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRbserviceProfilePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRbserviceProfilePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RbserviceProfileTableMap());
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
        return RbserviceProfilePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RbserviceProfile or Criteria object.
     *
     * @param      mixed $values Criteria or RbserviceProfile object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RbserviceProfile object
        }

        if ($criteria->containsKey(RbserviceProfilePeer::ID) && $criteria->keyContainsValue(RbserviceProfilePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RbserviceProfilePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RbserviceProfile or Criteria object.
     *
     * @param      mixed $values Criteria or RbserviceProfile object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RbserviceProfilePeer::ID);
            $value = $criteria->remove(RbserviceProfilePeer::ID);
            if ($value) {
                $selectCriteria->add(RbserviceProfilePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RbserviceProfilePeer::TABLE_NAME);
            }

        } else { // $values is RbserviceProfile object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rbService_Profile table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RbserviceProfilePeer::TABLE_NAME, $con, RbserviceProfilePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RbserviceProfilePeer::clearInstancePool();
            RbserviceProfilePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RbserviceProfile or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RbserviceProfile object or primary key or array of primary keys
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
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RbserviceProfilePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RbserviceProfile) { // it's a model object
            // invalidate the cache for this single object
            RbserviceProfilePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);
            $criteria->add(RbserviceProfilePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RbserviceProfilePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RbserviceProfilePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            RbserviceProfilePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RbserviceProfile object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RbserviceProfile $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RbserviceProfilePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RbserviceProfilePeer::TABLE_NAME);

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

        return BasePeer::doValidate(RbserviceProfilePeer::DATABASE_NAME, RbserviceProfilePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RbserviceProfile
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RbserviceProfilePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);
        $criteria->add(RbserviceProfilePeer::ID, $pk);

        $v = RbserviceProfilePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RbserviceProfile[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);
            $criteria->add(RbserviceProfilePeer::ID, $pks, Criteria::IN);
            $objs = RbserviceProfilePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRbserviceProfilePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRbserviceProfilePeer::buildTableMap();

