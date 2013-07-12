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
use Webmis\Models\RbmedicalkindPeer;
use Webmis\Models\Rbservice;
use Webmis\Models\RbservicePeer;
use Webmis\Models\RbserviceProfilePeer;
use Webmis\Models\map\RbserviceTableMap;

/**
 * Base static class for performing query and update operations on the 'rbService' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseRbservicePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'rbService';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Rbservice';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RbserviceTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 17;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 17;

    /** the column name for the id field */
    const ID = 'rbService.id';

    /** the column name for the code field */
    const CODE = 'rbService.code';

    /** the column name for the name field */
    const NAME = 'rbService.name';

    /** the column name for the eisLegacy field */
    const EISLEGACY = 'rbService.eisLegacy';

    /** the column name for the nomenclatureLegacy field */
    const NOMENCLATURELEGACY = 'rbService.nomenclatureLegacy';

    /** the column name for the license field */
    const LICENSE = 'rbService.license';

    /** the column name for the infis field */
    const INFIS = 'rbService.infis';

    /** the column name for the begDate field */
    const BEGDATE = 'rbService.begDate';

    /** the column name for the endDate field */
    const ENDDATE = 'rbService.endDate';

    /** the column name for the medicalAidProfile_id field */
    const MEDICALAIDPROFILE_ID = 'rbService.medicalAidProfile_id';

    /** the column name for the adultUetDoctor field */
    const ADULTUETDOCTOR = 'rbService.adultUetDoctor';

    /** the column name for the adultUetAverageMedWorker field */
    const ADULTUETAVERAGEMEDWORKER = 'rbService.adultUetAverageMedWorker';

    /** the column name for the childUetDoctor field */
    const CHILDUETDOCTOR = 'rbService.childUetDoctor';

    /** the column name for the childUetAverageMedWorker field */
    const CHILDUETAVERAGEMEDWORKER = 'rbService.childUetAverageMedWorker';

    /** the column name for the rbMedicalKind_id field */
    const RBMEDICALKIND_ID = 'rbService.rbMedicalKind_id';

    /** the column name for the UET field */
    const UET = 'rbService.UET';

    /** the column name for the departCode field */
    const DEPARTCODE = 'rbService.departCode';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Rbservice objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Rbservice[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RbservicePeer::$fieldNames[RbservicePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Code', 'Name', 'Eislegacy', 'Nomenclaturelegacy', 'License', 'Infis', 'Begdate', 'Enddate', 'MedicalaidprofileId', 'Adultuetdoctor', 'Adultuetaveragemedworker', 'Childuetdoctor', 'Childuetaveragemedworker', 'RbmedicalkindId', 'Uet', 'Departcode', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'code', 'name', 'eislegacy', 'nomenclaturelegacy', 'license', 'infis', 'begdate', 'enddate', 'medicalaidprofileId', 'adultuetdoctor', 'adultuetaveragemedworker', 'childuetdoctor', 'childuetaveragemedworker', 'rbmedicalkindId', 'uet', 'departcode', ),
        BasePeer::TYPE_COLNAME => array (RbservicePeer::ID, RbservicePeer::CODE, RbservicePeer::NAME, RbservicePeer::EISLEGACY, RbservicePeer::NOMENCLATURELEGACY, RbservicePeer::LICENSE, RbservicePeer::INFIS, RbservicePeer::BEGDATE, RbservicePeer::ENDDATE, RbservicePeer::MEDICALAIDPROFILE_ID, RbservicePeer::ADULTUETDOCTOR, RbservicePeer::ADULTUETAVERAGEMEDWORKER, RbservicePeer::CHILDUETDOCTOR, RbservicePeer::CHILDUETAVERAGEMEDWORKER, RbservicePeer::RBMEDICALKIND_ID, RbservicePeer::UET, RbservicePeer::DEPARTCODE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODE', 'NAME', 'EISLEGACY', 'NOMENCLATURELEGACY', 'LICENSE', 'INFIS', 'BEGDATE', 'ENDDATE', 'MEDICALAIDPROFILE_ID', 'ADULTUETDOCTOR', 'ADULTUETAVERAGEMEDWORKER', 'CHILDUETDOCTOR', 'CHILDUETAVERAGEMEDWORKER', 'RBMEDICALKIND_ID', 'UET', 'DEPARTCODE', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'code', 'name', 'eisLegacy', 'nomenclatureLegacy', 'license', 'infis', 'begDate', 'endDate', 'medicalAidProfile_id', 'adultUetDoctor', 'adultUetAverageMedWorker', 'childUetDoctor', 'childUetAverageMedWorker', 'rbMedicalKind_id', 'UET', 'departCode', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RbservicePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Code' => 1, 'Name' => 2, 'Eislegacy' => 3, 'Nomenclaturelegacy' => 4, 'License' => 5, 'Infis' => 6, 'Begdate' => 7, 'Enddate' => 8, 'MedicalaidprofileId' => 9, 'Adultuetdoctor' => 10, 'Adultuetaveragemedworker' => 11, 'Childuetdoctor' => 12, 'Childuetaveragemedworker' => 13, 'RbmedicalkindId' => 14, 'Uet' => 15, 'Departcode' => 16, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'code' => 1, 'name' => 2, 'eislegacy' => 3, 'nomenclaturelegacy' => 4, 'license' => 5, 'infis' => 6, 'begdate' => 7, 'enddate' => 8, 'medicalaidprofileId' => 9, 'adultuetdoctor' => 10, 'adultuetaveragemedworker' => 11, 'childuetdoctor' => 12, 'childuetaveragemedworker' => 13, 'rbmedicalkindId' => 14, 'uet' => 15, 'departcode' => 16, ),
        BasePeer::TYPE_COLNAME => array (RbservicePeer::ID => 0, RbservicePeer::CODE => 1, RbservicePeer::NAME => 2, RbservicePeer::EISLEGACY => 3, RbservicePeer::NOMENCLATURELEGACY => 4, RbservicePeer::LICENSE => 5, RbservicePeer::INFIS => 6, RbservicePeer::BEGDATE => 7, RbservicePeer::ENDDATE => 8, RbservicePeer::MEDICALAIDPROFILE_ID => 9, RbservicePeer::ADULTUETDOCTOR => 10, RbservicePeer::ADULTUETAVERAGEMEDWORKER => 11, RbservicePeer::CHILDUETDOCTOR => 12, RbservicePeer::CHILDUETAVERAGEMEDWORKER => 13, RbservicePeer::RBMEDICALKIND_ID => 14, RbservicePeer::UET => 15, RbservicePeer::DEPARTCODE => 16, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODE' => 1, 'NAME' => 2, 'EISLEGACY' => 3, 'NOMENCLATURELEGACY' => 4, 'LICENSE' => 5, 'INFIS' => 6, 'BEGDATE' => 7, 'ENDDATE' => 8, 'MEDICALAIDPROFILE_ID' => 9, 'ADULTUETDOCTOR' => 10, 'ADULTUETAVERAGEMEDWORKER' => 11, 'CHILDUETDOCTOR' => 12, 'CHILDUETAVERAGEMEDWORKER' => 13, 'RBMEDICALKIND_ID' => 14, 'UET' => 15, 'DEPARTCODE' => 16, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'code' => 1, 'name' => 2, 'eisLegacy' => 3, 'nomenclatureLegacy' => 4, 'license' => 5, 'infis' => 6, 'begDate' => 7, 'endDate' => 8, 'medicalAidProfile_id' => 9, 'adultUetDoctor' => 10, 'adultUetAverageMedWorker' => 11, 'childUetDoctor' => 12, 'childUetAverageMedWorker' => 13, 'rbMedicalKind_id' => 14, 'UET' => 15, 'departCode' => 16, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $toNames = RbservicePeer::getFieldNames($toType);
        $key = isset(RbservicePeer::$fieldKeys[$fromType][$name]) ? RbservicePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RbservicePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RbservicePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RbservicePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RbservicePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RbservicePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RbservicePeer::ID);
            $criteria->addSelectColumn(RbservicePeer::CODE);
            $criteria->addSelectColumn(RbservicePeer::NAME);
            $criteria->addSelectColumn(RbservicePeer::EISLEGACY);
            $criteria->addSelectColumn(RbservicePeer::NOMENCLATURELEGACY);
            $criteria->addSelectColumn(RbservicePeer::LICENSE);
            $criteria->addSelectColumn(RbservicePeer::INFIS);
            $criteria->addSelectColumn(RbservicePeer::BEGDATE);
            $criteria->addSelectColumn(RbservicePeer::ENDDATE);
            $criteria->addSelectColumn(RbservicePeer::MEDICALAIDPROFILE_ID);
            $criteria->addSelectColumn(RbservicePeer::ADULTUETDOCTOR);
            $criteria->addSelectColumn(RbservicePeer::ADULTUETAVERAGEMEDWORKER);
            $criteria->addSelectColumn(RbservicePeer::CHILDUETDOCTOR);
            $criteria->addSelectColumn(RbservicePeer::CHILDUETAVERAGEMEDWORKER);
            $criteria->addSelectColumn(RbservicePeer::RBMEDICALKIND_ID);
            $criteria->addSelectColumn(RbservicePeer::UET);
            $criteria->addSelectColumn(RbservicePeer::DEPARTCODE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.eisLegacy');
            $criteria->addSelectColumn($alias . '.nomenclatureLegacy');
            $criteria->addSelectColumn($alias . '.license');
            $criteria->addSelectColumn($alias . '.infis');
            $criteria->addSelectColumn($alias . '.begDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.medicalAidProfile_id');
            $criteria->addSelectColumn($alias . '.adultUetDoctor');
            $criteria->addSelectColumn($alias . '.adultUetAverageMedWorker');
            $criteria->addSelectColumn($alias . '.childUetDoctor');
            $criteria->addSelectColumn($alias . '.childUetAverageMedWorker');
            $criteria->addSelectColumn($alias . '.rbMedicalKind_id');
            $criteria->addSelectColumn($alias . '.UET');
            $criteria->addSelectColumn($alias . '.departCode');
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
        $criteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbservicePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RbservicePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbservice
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RbservicePeer::doSelect($critcopy, $con);
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
        return RbservicePeer::populateObjects(RbservicePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RbservicePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

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
     * @param      Rbservice $obj A Rbservice object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            RbservicePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Rbservice object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Rbservice) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Rbservice object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RbservicePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Rbservice Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RbservicePeer::$instances[$key])) {
                return RbservicePeer::$instances[$key];
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
        foreach (RbservicePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RbservicePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to rbService
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in RbserviceProfilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        RbserviceProfilePeer::clearInstancePool();
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
        $cls = RbservicePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RbservicePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RbservicePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RbservicePeer::addInstanceToPool($obj, $key);
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
     * @return array (Rbservice object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RbservicePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RbservicePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RbservicePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RbservicePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RbservicePeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbservicePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbservicePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbservicePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbservicePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

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
     * Selects a collection of Rbservice objects pre-filled with their Rbmedicalkind objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Rbservice objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbmedicalkind(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbservicePeer::DATABASE_NAME);
        }

        RbservicePeer::addSelectColumns($criteria);
        $startcol = RbservicePeer::NUM_HYDRATE_COLUMNS;
        RbmedicalkindPeer::addSelectColumns($criteria);

        $criteria->addJoin(RbservicePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbservicePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbservicePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RbservicePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbservicePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Rbservice) to $obj2 (Rbmedicalkind)
                $obj2->addRbservice($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Rbservice objects pre-filled with their Rbmedicalaidprofile objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Rbservice objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbmedicalaidprofile(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbservicePeer::DATABASE_NAME);
        }

        RbservicePeer::addSelectColumns($criteria);
        $startcol = RbservicePeer::NUM_HYDRATE_COLUMNS;
        RbmedicalaidprofilePeer::addSelectColumns($criteria);

        $criteria->addJoin(RbservicePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbservicePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbservicePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RbservicePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbservicePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Rbservice) to $obj2 (Rbmedicalaidprofile)
                $obj2->addRbservice($obj1);

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
        $criteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbservicePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbservicePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(RbservicePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

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
     * Selects a collection of Rbservice objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Rbservice objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RbservicePeer::DATABASE_NAME);
        }

        RbservicePeer::addSelectColumns($criteria);
        $startcol2 = RbservicePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidprofilePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbmedicalaidprofilePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbservicePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $criteria->addJoin(RbservicePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbservicePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbservicePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbservicePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbservicePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Rbservice) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addRbservice($obj1);
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

                // Add the $obj1 (Rbservice) to the collection in $obj3 (Rbmedicalaidprofile)
                $obj3->addRbservice($obj1);
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
        $criteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbservicePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbservicePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RbservicePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RbservicePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

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
     * Selects a collection of Rbservice objects pre-filled with all related objects except Rbmedicalkind.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Rbservice objects.
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
            $criteria->setDbName(RbservicePeer::DATABASE_NAME);
        }

        RbservicePeer::addSelectColumns($criteria);
        $startcol2 = RbservicePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalaidprofilePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalaidprofilePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbservicePeer::MEDICALAIDPROFILE_ID, RbmedicalaidprofilePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbservicePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbservicePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbservicePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbservicePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Rbservice) to the collection in $obj2 (Rbmedicalaidprofile)
                $obj2->addRbservice($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Rbservice objects pre-filled with all related objects except Rbmedicalaidprofile.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Rbservice objects.
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
            $criteria->setDbName(RbservicePeer::DATABASE_NAME);
        }

        RbservicePeer::addSelectColumns($criteria);
        $startcol2 = RbservicePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RbservicePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RbservicePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RbservicePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RbservicePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RbservicePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Rbservice) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addRbservice($obj1);

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
        return Propel::getDatabaseMap(RbservicePeer::DATABASE_NAME)->getTable(RbservicePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRbservicePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRbservicePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RbserviceTableMap());
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
        return RbservicePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Rbservice or Criteria object.
     *
     * @param      mixed $values Criteria or Rbservice object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Rbservice object
        }

        if ($criteria->containsKey(RbservicePeer::ID) && $criteria->keyContainsValue(RbservicePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RbservicePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Rbservice or Criteria object.
     *
     * @param      mixed $values Criteria or Rbservice object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RbservicePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RbservicePeer::ID);
            $value = $criteria->remove(RbservicePeer::ID);
            if ($value) {
                $selectCriteria->add(RbservicePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RbservicePeer::TABLE_NAME);
            }

        } else { // $values is Rbservice object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rbService table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += RbservicePeer::doOnDeleteCascade(new Criteria(RbservicePeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(RbservicePeer::TABLE_NAME, $con, RbservicePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RbservicePeer::clearInstancePool();
            RbservicePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Rbservice or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Rbservice object or primary key or array of primary keys
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
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Rbservice) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RbservicePeer::DATABASE_NAME);
            $criteria->add(RbservicePeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(RbservicePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += RbservicePeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                RbservicePeer::clearInstancePool();
            } elseif ($values instanceof Rbservice) { // it's a model object
                RbservicePeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    RbservicePeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            RbservicePeer::clearRelatedInstancePool();
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
        $objects = RbservicePeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related RbserviceProfile objects
            $criteria = new Criteria(RbserviceProfilePeer::DATABASE_NAME);

            $criteria->add(RbserviceProfilePeer::MASTER_ID, $obj->getId());
            $affectedRows += RbserviceProfilePeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Rbservice object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Rbservice $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RbservicePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RbservicePeer::TABLE_NAME);

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

        return BasePeer::doValidate(RbservicePeer::DATABASE_NAME, RbservicePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Rbservice
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RbservicePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RbservicePeer::DATABASE_NAME);
        $criteria->add(RbservicePeer::ID, $pk);

        $v = RbservicePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Rbservice[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RbservicePeer::DATABASE_NAME);
            $criteria->add(RbservicePeer::ID, $pks, Criteria::IN);
            $objs = RbservicePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRbservicePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRbservicePeer::buildTableMap();

