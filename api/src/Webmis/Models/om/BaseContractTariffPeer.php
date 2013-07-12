<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\ContractTariff;
use Webmis\Models\ContractTariffPeer;
use Webmis\Models\RbservicefinancePeer;
use Webmis\Models\map\ContractTariffTableMap;

/**
 * Base static class for performing query and update operations on the 'Contract_Tariff' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseContractTariffPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Contract_Tariff';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\ContractTariff';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ContractTariffTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 24;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 24;

    /** the column name for the id field */
    const ID = 'Contract_Tariff.id';

    /** the column name for the deleted field */
    const DELETED = 'Contract_Tariff.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'Contract_Tariff.master_id';

    /** the column name for the eventType_id field */
    const EVENTTYPE_ID = 'Contract_Tariff.eventType_id';

    /** the column name for the tariffType field */
    const TARIFFTYPE = 'Contract_Tariff.tariffType';

    /** the column name for the service_id field */
    const SERVICE_ID = 'Contract_Tariff.service_id';

    /** the column name for the tariffCategory_id field */
    const TARIFFCATEGORY_ID = 'Contract_Tariff.tariffCategory_id';

    /** the column name for the begDate field */
    const BEGDATE = 'Contract_Tariff.begDate';

    /** the column name for the endDate field */
    const ENDDATE = 'Contract_Tariff.endDate';

    /** the column name for the sex field */
    const SEX = 'Contract_Tariff.sex';

    /** the column name for the age field */
    const AGE = 'Contract_Tariff.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'Contract_Tariff.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'Contract_Tariff.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'Contract_Tariff.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'Contract_Tariff.age_ec';

    /** the column name for the unit_id field */
    const UNIT_ID = 'Contract_Tariff.unit_id';

    /** the column name for the amount field */
    const AMOUNT = 'Contract_Tariff.amount';

    /** the column name for the uet field */
    const UET = 'Contract_Tariff.uet';

    /** the column name for the price field */
    const PRICE = 'Contract_Tariff.price';

    /** the column name for the limitationExceedMode field */
    const LIMITATIONEXCEEDMODE = 'Contract_Tariff.limitationExceedMode';

    /** the column name for the limitation field */
    const LIMITATION = 'Contract_Tariff.limitation';

    /** the column name for the priceEx field */
    const PRICEEX = 'Contract_Tariff.priceEx';

    /** the column name for the MKB field */
    const MKB = 'Contract_Tariff.MKB';

    /** the column name for the rbServiceFinance_id field */
    const RBSERVICEFINANCE_ID = 'Contract_Tariff.rbServiceFinance_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ContractTariff objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ContractTariff[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ContractTariffPeer::$fieldNames[ContractTariffPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Deleted', 'MasterId', 'EventtypeId', 'Tarifftype', 'ServiceId', 'TariffcategoryId', 'Begdate', 'Enddate', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'UnitId', 'Amount', 'Uet', 'Price', 'Limitationexceedmode', 'Limitation', 'Priceex', 'Mkb', 'RbservicefinanceId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'deleted', 'masterId', 'eventtypeId', 'tarifftype', 'serviceId', 'tariffcategoryId', 'begdate', 'enddate', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'unitId', 'amount', 'uet', 'price', 'limitationexceedmode', 'limitation', 'priceex', 'mkb', 'rbservicefinanceId', ),
        BasePeer::TYPE_COLNAME => array (ContractTariffPeer::ID, ContractTariffPeer::DELETED, ContractTariffPeer::MASTER_ID, ContractTariffPeer::EVENTTYPE_ID, ContractTariffPeer::TARIFFTYPE, ContractTariffPeer::SERVICE_ID, ContractTariffPeer::TARIFFCATEGORY_ID, ContractTariffPeer::BEGDATE, ContractTariffPeer::ENDDATE, ContractTariffPeer::SEX, ContractTariffPeer::AGE, ContractTariffPeer::AGE_BU, ContractTariffPeer::AGE_BC, ContractTariffPeer::AGE_EU, ContractTariffPeer::AGE_EC, ContractTariffPeer::UNIT_ID, ContractTariffPeer::AMOUNT, ContractTariffPeer::UET, ContractTariffPeer::PRICE, ContractTariffPeer::LIMITATIONEXCEEDMODE, ContractTariffPeer::LIMITATION, ContractTariffPeer::PRICEEX, ContractTariffPeer::MKB, ContractTariffPeer::RBSERVICEFINANCE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'DELETED', 'MASTER_ID', 'EVENTTYPE_ID', 'TARIFFTYPE', 'SERVICE_ID', 'TARIFFCATEGORY_ID', 'BEGDATE', 'ENDDATE', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'UNIT_ID', 'AMOUNT', 'UET', 'PRICE', 'LIMITATIONEXCEEDMODE', 'LIMITATION', 'PRICEEX', 'MKB', 'RBSERVICEFINANCE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'deleted', 'master_id', 'eventType_id', 'tariffType', 'service_id', 'tariffCategory_id', 'begDate', 'endDate', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'unit_id', 'amount', 'uet', 'price', 'limitationExceedMode', 'limitation', 'priceEx', 'MKB', 'rbServiceFinance_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ContractTariffPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Deleted' => 1, 'MasterId' => 2, 'EventtypeId' => 3, 'Tarifftype' => 4, 'ServiceId' => 5, 'TariffcategoryId' => 6, 'Begdate' => 7, 'Enddate' => 8, 'Sex' => 9, 'Age' => 10, 'AgeBu' => 11, 'AgeBc' => 12, 'AgeEu' => 13, 'AgeEc' => 14, 'UnitId' => 15, 'Amount' => 16, 'Uet' => 17, 'Price' => 18, 'Limitationexceedmode' => 19, 'Limitation' => 20, 'Priceex' => 21, 'Mkb' => 22, 'RbservicefinanceId' => 23, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'deleted' => 1, 'masterId' => 2, 'eventtypeId' => 3, 'tarifftype' => 4, 'serviceId' => 5, 'tariffcategoryId' => 6, 'begdate' => 7, 'enddate' => 8, 'sex' => 9, 'age' => 10, 'ageBu' => 11, 'ageBc' => 12, 'ageEu' => 13, 'ageEc' => 14, 'unitId' => 15, 'amount' => 16, 'uet' => 17, 'price' => 18, 'limitationexceedmode' => 19, 'limitation' => 20, 'priceex' => 21, 'mkb' => 22, 'rbservicefinanceId' => 23, ),
        BasePeer::TYPE_COLNAME => array (ContractTariffPeer::ID => 0, ContractTariffPeer::DELETED => 1, ContractTariffPeer::MASTER_ID => 2, ContractTariffPeer::EVENTTYPE_ID => 3, ContractTariffPeer::TARIFFTYPE => 4, ContractTariffPeer::SERVICE_ID => 5, ContractTariffPeer::TARIFFCATEGORY_ID => 6, ContractTariffPeer::BEGDATE => 7, ContractTariffPeer::ENDDATE => 8, ContractTariffPeer::SEX => 9, ContractTariffPeer::AGE => 10, ContractTariffPeer::AGE_BU => 11, ContractTariffPeer::AGE_BC => 12, ContractTariffPeer::AGE_EU => 13, ContractTariffPeer::AGE_EC => 14, ContractTariffPeer::UNIT_ID => 15, ContractTariffPeer::AMOUNT => 16, ContractTariffPeer::UET => 17, ContractTariffPeer::PRICE => 18, ContractTariffPeer::LIMITATIONEXCEEDMODE => 19, ContractTariffPeer::LIMITATION => 20, ContractTariffPeer::PRICEEX => 21, ContractTariffPeer::MKB => 22, ContractTariffPeer::RBSERVICEFINANCE_ID => 23, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'DELETED' => 1, 'MASTER_ID' => 2, 'EVENTTYPE_ID' => 3, 'TARIFFTYPE' => 4, 'SERVICE_ID' => 5, 'TARIFFCATEGORY_ID' => 6, 'BEGDATE' => 7, 'ENDDATE' => 8, 'SEX' => 9, 'AGE' => 10, 'AGE_BU' => 11, 'AGE_BC' => 12, 'AGE_EU' => 13, 'AGE_EC' => 14, 'UNIT_ID' => 15, 'AMOUNT' => 16, 'UET' => 17, 'PRICE' => 18, 'LIMITATIONEXCEEDMODE' => 19, 'LIMITATION' => 20, 'PRICEEX' => 21, 'MKB' => 22, 'RBSERVICEFINANCE_ID' => 23, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'deleted' => 1, 'master_id' => 2, 'eventType_id' => 3, 'tariffType' => 4, 'service_id' => 5, 'tariffCategory_id' => 6, 'begDate' => 7, 'endDate' => 8, 'sex' => 9, 'age' => 10, 'age_bu' => 11, 'age_bc' => 12, 'age_eu' => 13, 'age_ec' => 14, 'unit_id' => 15, 'amount' => 16, 'uet' => 17, 'price' => 18, 'limitationExceedMode' => 19, 'limitation' => 20, 'priceEx' => 21, 'MKB' => 22, 'rbServiceFinance_id' => 23, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
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
        $toNames = ContractTariffPeer::getFieldNames($toType);
        $key = isset(ContractTariffPeer::$fieldKeys[$fromType][$name]) ? ContractTariffPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ContractTariffPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ContractTariffPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ContractTariffPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ContractTariffPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ContractTariffPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ContractTariffPeer::ID);
            $criteria->addSelectColumn(ContractTariffPeer::DELETED);
            $criteria->addSelectColumn(ContractTariffPeer::MASTER_ID);
            $criteria->addSelectColumn(ContractTariffPeer::EVENTTYPE_ID);
            $criteria->addSelectColumn(ContractTariffPeer::TARIFFTYPE);
            $criteria->addSelectColumn(ContractTariffPeer::SERVICE_ID);
            $criteria->addSelectColumn(ContractTariffPeer::TARIFFCATEGORY_ID);
            $criteria->addSelectColumn(ContractTariffPeer::BEGDATE);
            $criteria->addSelectColumn(ContractTariffPeer::ENDDATE);
            $criteria->addSelectColumn(ContractTariffPeer::SEX);
            $criteria->addSelectColumn(ContractTariffPeer::AGE);
            $criteria->addSelectColumn(ContractTariffPeer::AGE_BU);
            $criteria->addSelectColumn(ContractTariffPeer::AGE_BC);
            $criteria->addSelectColumn(ContractTariffPeer::AGE_EU);
            $criteria->addSelectColumn(ContractTariffPeer::AGE_EC);
            $criteria->addSelectColumn(ContractTariffPeer::UNIT_ID);
            $criteria->addSelectColumn(ContractTariffPeer::AMOUNT);
            $criteria->addSelectColumn(ContractTariffPeer::UET);
            $criteria->addSelectColumn(ContractTariffPeer::PRICE);
            $criteria->addSelectColumn(ContractTariffPeer::LIMITATIONEXCEEDMODE);
            $criteria->addSelectColumn(ContractTariffPeer::LIMITATION);
            $criteria->addSelectColumn(ContractTariffPeer::PRICEEX);
            $criteria->addSelectColumn(ContractTariffPeer::MKB);
            $criteria->addSelectColumn(ContractTariffPeer::RBSERVICEFINANCE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.eventType_id');
            $criteria->addSelectColumn($alias . '.tariffType');
            $criteria->addSelectColumn($alias . '.service_id');
            $criteria->addSelectColumn($alias . '.tariffCategory_id');
            $criteria->addSelectColumn($alias . '.begDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.unit_id');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.uet');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.limitationExceedMode');
            $criteria->addSelectColumn($alias . '.limitation');
            $criteria->addSelectColumn($alias . '.priceEx');
            $criteria->addSelectColumn($alias . '.MKB');
            $criteria->addSelectColumn($alias . '.rbServiceFinance_id');
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
        $criteria->setPrimaryTableName(ContractTariffPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContractTariffPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ContractTariff
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ContractTariffPeer::doSelect($critcopy, $con);
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
        return ContractTariffPeer::populateObjects(ContractTariffPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ContractTariffPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);

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
     * @param      ContractTariff $obj A ContractTariff object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ContractTariffPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ContractTariff object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ContractTariff) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ContractTariff object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ContractTariffPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ContractTariff Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ContractTariffPeer::$instances[$key])) {
                return ContractTariffPeer::$instances[$key];
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
        foreach (ContractTariffPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ContractTariffPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Contract_Tariff
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
        $cls = ContractTariffPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ContractTariffPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ContractTariffPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContractTariffPeer::addInstanceToPool($obj, $key);
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
     * @return array (ContractTariff object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ContractTariffPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ContractTariffPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ContractTariffPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContractTariffPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ContractTariffPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbservicefinance table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbservicefinance(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContractTariffPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContractTariffPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContractTariffPeer::RBSERVICEFINANCE_ID, RbservicefinancePeer::ID, $join_behavior);

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
     * Selects a collection of ContractTariff objects pre-filled with their Rbservicefinance objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ContractTariff objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbservicefinance(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);
        }

        ContractTariffPeer::addSelectColumns($criteria);
        $startcol = ContractTariffPeer::NUM_HYDRATE_COLUMNS;
        RbservicefinancePeer::addSelectColumns($criteria);

        $criteria->addJoin(ContractTariffPeer::RBSERVICEFINANCE_ID, RbservicefinancePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContractTariffPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContractTariffPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ContractTariffPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContractTariffPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbservicefinancePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbservicefinancePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbservicefinancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbservicefinancePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ContractTariff) to $obj2 (Rbservicefinance)
                $obj2->addContractTariff($obj1);

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
        $criteria->setPrimaryTableName(ContractTariffPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContractTariffPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContractTariffPeer::RBSERVICEFINANCE_ID, RbservicefinancePeer::ID, $join_behavior);

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
     * Selects a collection of ContractTariff objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ContractTariff objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);
        }

        ContractTariffPeer::addSelectColumns($criteria);
        $startcol2 = ContractTariffPeer::NUM_HYDRATE_COLUMNS;

        RbservicefinancePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbservicefinancePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContractTariffPeer::RBSERVICEFINANCE_ID, RbservicefinancePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContractTariffPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContractTariffPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ContractTariffPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContractTariffPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbservicefinance rows

            $key2 = RbservicefinancePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbservicefinancePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbservicefinancePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbservicefinancePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ContractTariff) to the collection in $obj2 (Rbservicefinance)
                $obj2->addContractTariff($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(ContractTariffPeer::DATABASE_NAME)->getTable(ContractTariffPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseContractTariffPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseContractTariffPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ContractTariffTableMap());
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
        return ContractTariffPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ContractTariff or Criteria object.
     *
     * @param      mixed $values Criteria or ContractTariff object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ContractTariff object
        }

        if ($criteria->containsKey(ContractTariffPeer::ID) && $criteria->keyContainsValue(ContractTariffPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContractTariffPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ContractTariff or Criteria object.
     *
     * @param      mixed $values Criteria or ContractTariff object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ContractTariffPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ContractTariffPeer::ID);
            $value = $criteria->remove(ContractTariffPeer::ID);
            if ($value) {
                $selectCriteria->add(ContractTariffPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ContractTariffPeer::TABLE_NAME);
            }

        } else { // $values is ContractTariff object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Contract_Tariff table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ContractTariffPeer::TABLE_NAME, $con, ContractTariffPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContractTariffPeer::clearInstancePool();
            ContractTariffPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ContractTariff or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ContractTariff object or primary key or array of primary keys
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
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ContractTariffPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ContractTariff) { // it's a model object
            // invalidate the cache for this single object
            ContractTariffPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContractTariffPeer::DATABASE_NAME);
            $criteria->add(ContractTariffPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ContractTariffPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ContractTariffPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ContractTariffPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ContractTariff object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ContractTariff $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ContractTariffPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ContractTariffPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ContractTariffPeer::DATABASE_NAME, ContractTariffPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ContractTariff
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ContractTariffPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ContractTariffPeer::DATABASE_NAME);
        $criteria->add(ContractTariffPeer::ID, $pk);

        $v = ContractTariffPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ContractTariff[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ContractTariffPeer::DATABASE_NAME);
            $criteria->add(ContractTariffPeer::ID, $pks, Criteria::IN);
            $objs = ContractTariffPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseContractTariffPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContractTariffPeer::buildTableMap();

