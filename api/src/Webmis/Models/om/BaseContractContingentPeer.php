<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\ContractContingent;
use Webmis\Models\ContractContingentPeer;
use Webmis\Models\map\ContractContingentTableMap;

/**
 * Base static class for performing query and update operations on the 'Contract_Contingent' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseContractContingentPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Contract_Contingent';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\ContractContingent';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ContractContingentTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the id field */
    const ID = 'Contract_Contingent.id';

    /** the column name for the deleted field */
    const DELETED = 'Contract_Contingent.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'Contract_Contingent.master_id';

    /** the column name for the client_id field */
    const CLIENT_ID = 'Contract_Contingent.client_id';

    /** the column name for the attachType_id field */
    const ATTACHTYPE_ID = 'Contract_Contingent.attachType_id';

    /** the column name for the org_id field */
    const ORG_ID = 'Contract_Contingent.org_id';

    /** the column name for the socStatusType_id field */
    const SOCSTATUSTYPE_ID = 'Contract_Contingent.socStatusType_id';

    /** the column name for the insurer_id field */
    const INSURER_ID = 'Contract_Contingent.insurer_id';

    /** the column name for the policyType_id field */
    const POLICYTYPE_ID = 'Contract_Contingent.policyType_id';

    /** the column name for the sex field */
    const SEX = 'Contract_Contingent.sex';

    /** the column name for the age field */
    const AGE = 'Contract_Contingent.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'Contract_Contingent.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'Contract_Contingent.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'Contract_Contingent.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'Contract_Contingent.age_ec';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ContractContingent objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ContractContingent[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ContractContingentPeer::$fieldNames[ContractContingentPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Deleted', 'MasterId', 'ClientId', 'AttachtypeId', 'OrgId', 'SocstatustypeId', 'InsurerId', 'PolicytypeId', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'deleted', 'masterId', 'clientId', 'attachtypeId', 'orgId', 'socstatustypeId', 'insurerId', 'policytypeId', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', ),
        BasePeer::TYPE_COLNAME => array (ContractContingentPeer::ID, ContractContingentPeer::DELETED, ContractContingentPeer::MASTER_ID, ContractContingentPeer::CLIENT_ID, ContractContingentPeer::ATTACHTYPE_ID, ContractContingentPeer::ORG_ID, ContractContingentPeer::SOCSTATUSTYPE_ID, ContractContingentPeer::INSURER_ID, ContractContingentPeer::POLICYTYPE_ID, ContractContingentPeer::SEX, ContractContingentPeer::AGE, ContractContingentPeer::AGE_BU, ContractContingentPeer::AGE_BC, ContractContingentPeer::AGE_EU, ContractContingentPeer::AGE_EC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'DELETED', 'MASTER_ID', 'CLIENT_ID', 'ATTACHTYPE_ID', 'ORG_ID', 'SOCSTATUSTYPE_ID', 'INSURER_ID', 'POLICYTYPE_ID', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'deleted', 'master_id', 'client_id', 'attachType_id', 'org_id', 'socStatusType_id', 'insurer_id', 'policyType_id', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ContractContingentPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Deleted' => 1, 'MasterId' => 2, 'ClientId' => 3, 'AttachtypeId' => 4, 'OrgId' => 5, 'SocstatustypeId' => 6, 'InsurerId' => 7, 'PolicytypeId' => 8, 'Sex' => 9, 'Age' => 10, 'AgeBu' => 11, 'AgeBc' => 12, 'AgeEu' => 13, 'AgeEc' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'deleted' => 1, 'masterId' => 2, 'clientId' => 3, 'attachtypeId' => 4, 'orgId' => 5, 'socstatustypeId' => 6, 'insurerId' => 7, 'policytypeId' => 8, 'sex' => 9, 'age' => 10, 'ageBu' => 11, 'ageBc' => 12, 'ageEu' => 13, 'ageEc' => 14, ),
        BasePeer::TYPE_COLNAME => array (ContractContingentPeer::ID => 0, ContractContingentPeer::DELETED => 1, ContractContingentPeer::MASTER_ID => 2, ContractContingentPeer::CLIENT_ID => 3, ContractContingentPeer::ATTACHTYPE_ID => 4, ContractContingentPeer::ORG_ID => 5, ContractContingentPeer::SOCSTATUSTYPE_ID => 6, ContractContingentPeer::INSURER_ID => 7, ContractContingentPeer::POLICYTYPE_ID => 8, ContractContingentPeer::SEX => 9, ContractContingentPeer::AGE => 10, ContractContingentPeer::AGE_BU => 11, ContractContingentPeer::AGE_BC => 12, ContractContingentPeer::AGE_EU => 13, ContractContingentPeer::AGE_EC => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'DELETED' => 1, 'MASTER_ID' => 2, 'CLIENT_ID' => 3, 'ATTACHTYPE_ID' => 4, 'ORG_ID' => 5, 'SOCSTATUSTYPE_ID' => 6, 'INSURER_ID' => 7, 'POLICYTYPE_ID' => 8, 'SEX' => 9, 'AGE' => 10, 'AGE_BU' => 11, 'AGE_BC' => 12, 'AGE_EU' => 13, 'AGE_EC' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'deleted' => 1, 'master_id' => 2, 'client_id' => 3, 'attachType_id' => 4, 'org_id' => 5, 'socStatusType_id' => 6, 'insurer_id' => 7, 'policyType_id' => 8, 'sex' => 9, 'age' => 10, 'age_bu' => 11, 'age_bc' => 12, 'age_eu' => 13, 'age_ec' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = ContractContingentPeer::getFieldNames($toType);
        $key = isset(ContractContingentPeer::$fieldKeys[$fromType][$name]) ? ContractContingentPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ContractContingentPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ContractContingentPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ContractContingentPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ContractContingentPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ContractContingentPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ContractContingentPeer::ID);
            $criteria->addSelectColumn(ContractContingentPeer::DELETED);
            $criteria->addSelectColumn(ContractContingentPeer::MASTER_ID);
            $criteria->addSelectColumn(ContractContingentPeer::CLIENT_ID);
            $criteria->addSelectColumn(ContractContingentPeer::ATTACHTYPE_ID);
            $criteria->addSelectColumn(ContractContingentPeer::ORG_ID);
            $criteria->addSelectColumn(ContractContingentPeer::SOCSTATUSTYPE_ID);
            $criteria->addSelectColumn(ContractContingentPeer::INSURER_ID);
            $criteria->addSelectColumn(ContractContingentPeer::POLICYTYPE_ID);
            $criteria->addSelectColumn(ContractContingentPeer::SEX);
            $criteria->addSelectColumn(ContractContingentPeer::AGE);
            $criteria->addSelectColumn(ContractContingentPeer::AGE_BU);
            $criteria->addSelectColumn(ContractContingentPeer::AGE_BC);
            $criteria->addSelectColumn(ContractContingentPeer::AGE_EU);
            $criteria->addSelectColumn(ContractContingentPeer::AGE_EC);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.attachType_id');
            $criteria->addSelectColumn($alias . '.org_id');
            $criteria->addSelectColumn($alias . '.socStatusType_id');
            $criteria->addSelectColumn($alias . '.insurer_id');
            $criteria->addSelectColumn($alias . '.policyType_id');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
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
        $criteria->setPrimaryTableName(ContractContingentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContractContingentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ContractContingentPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ContractContingent
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ContractContingentPeer::doSelect($critcopy, $con);
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
        return ContractContingentPeer::populateObjects(ContractContingentPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ContractContingentPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ContractContingentPeer::DATABASE_NAME);

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
     * @param      ContractContingent $obj A ContractContingent object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ContractContingentPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ContractContingent object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ContractContingent) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ContractContingent object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ContractContingentPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ContractContingent Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ContractContingentPeer::$instances[$key])) {
                return ContractContingentPeer::$instances[$key];
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
        foreach (ContractContingentPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ContractContingentPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Contract_Contingent
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
        $cls = ContractContingentPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ContractContingentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ContractContingentPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContractContingentPeer::addInstanceToPool($obj, $key);
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
     * @return array (ContractContingent object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ContractContingentPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ContractContingentPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ContractContingentPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContractContingentPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ContractContingentPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ContractContingentPeer::DATABASE_NAME)->getTable(ContractContingentPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseContractContingentPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseContractContingentPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ContractContingentTableMap());
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
        return ContractContingentPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ContractContingent or Criteria object.
     *
     * @param      mixed $values Criteria or ContractContingent object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ContractContingent object
        }

        if ($criteria->containsKey(ContractContingentPeer::ID) && $criteria->keyContainsValue(ContractContingentPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContractContingentPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ContractContingentPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ContractContingent or Criteria object.
     *
     * @param      mixed $values Criteria or ContractContingent object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ContractContingentPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ContractContingentPeer::ID);
            $value = $criteria->remove(ContractContingentPeer::ID);
            if ($value) {
                $selectCriteria->add(ContractContingentPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ContractContingentPeer::TABLE_NAME);
            }

        } else { // $values is ContractContingent object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ContractContingentPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Contract_Contingent table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ContractContingentPeer::TABLE_NAME, $con, ContractContingentPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContractContingentPeer::clearInstancePool();
            ContractContingentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ContractContingent or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ContractContingent object or primary key or array of primary keys
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
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ContractContingentPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ContractContingent) { // it's a model object
            // invalidate the cache for this single object
            ContractContingentPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContractContingentPeer::DATABASE_NAME);
            $criteria->add(ContractContingentPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ContractContingentPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ContractContingentPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ContractContingentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ContractContingent object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ContractContingent $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ContractContingentPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ContractContingentPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ContractContingentPeer::DATABASE_NAME, ContractContingentPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ContractContingent
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ContractContingentPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ContractContingentPeer::DATABASE_NAME);
        $criteria->add(ContractContingentPeer::ID, $pk);

        $v = ContractContingentPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ContractContingent[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ContractContingentPeer::DATABASE_NAME);
            $criteria->add(ContractContingentPeer::ID, $pks, Criteria::IN);
            $objs = ContractContingentPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseContractContingentPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContractContingentPeer::buildTableMap();

