<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\OrgStructure;
use Webmis\Models\OrgStructurePeer;
use Webmis\Models\map\OrgStructureTableMap;

/**
 * Base static class for performing query and update operations on the 'OrgStructure' table.
 *
 *
 *
 * @package propel.generator.Models.om
 */
abstract class BaseOrgStructurePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'OrgStructure';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\OrgStructure';

    /** the related TableMap class for this table */
    const TM_CLASS = 'OrgStructureTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 26;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 26;

    /** the column name for the id field */
    const ID = 'OrgStructure.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'OrgStructure.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'OrgStructure.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'OrgStructure.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'OrgStructure.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'OrgStructure.deleted';

    /** the column name for the organisation_id field */
    const ORGANISATION_ID = 'OrgStructure.organisation_id';

    /** the column name for the code field */
    const CODE = 'OrgStructure.code';

    /** the column name for the name field */
    const NAME = 'OrgStructure.name';

    /** the column name for the parent_id field */
    const PARENT_ID = 'OrgStructure.parent_id';

    /** the column name for the type field */
    const TYPE = 'OrgStructure.type';

    /** the column name for the net_id field */
    const NET_ID = 'OrgStructure.net_id';

    /** the column name for the isArea field */
    const ISAREA = 'OrgStructure.isArea';

    /** the column name for the hasHospitalBeds field */
    const HASHOSPITALBEDS = 'OrgStructure.hasHospitalBeds';

    /** the column name for the hasStocks field */
    const HASSTOCKS = 'OrgStructure.hasStocks';

    /** the column name for the infisCode field */
    const INFISCODE = 'OrgStructure.infisCode';

    /** the column name for the infisInternalCode field */
    const INFISINTERNALCODE = 'OrgStructure.infisInternalCode';

    /** the column name for the infisDepTypeCode field */
    const INFISDEPTYPECODE = 'OrgStructure.infisDepTypeCode';

    /** the column name for the infisTariffCode field */
    const INFISTARIFFCODE = 'OrgStructure.infisTariffCode';

    /** the column name for the availableForExternal field */
    const AVAILABLEFOREXTERNAL = 'OrgStructure.availableForExternal';

    /** the column name for the Address field */
    const ADDRESS = 'OrgStructure.Address';

    /** the column name for the inheritEventTypes field */
    const INHERITEVENTTYPES = 'OrgStructure.inheritEventTypes';

    /** the column name for the inheritActionTypes field */
    const INHERITACTIONTYPES = 'OrgStructure.inheritActionTypes';

    /** the column name for the inheritGaps field */
    const INHERITGAPS = 'OrgStructure.inheritGaps';

    /** the column name for the uuid_id field */
    const UUID_ID = 'OrgStructure.uuid_id';

    /** the column name for the show field */
    const SHOW = 'OrgStructure.show';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of OrgStructure objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array OrgStructure[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. OrgStructurePeer::$fieldNames[OrgStructurePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'createDatetime', 'createPersonId', 'modifyDatetime', 'modifyPersonId', 'deleted', 'organisationId', 'code', 'name', 'parentId', 'type', 'netId', 'isArea', 'hasHospitalBeds', 'hasStocks', 'infisCode', 'infisInternalCode', 'infisDepTypeCode', 'infisTariffCode', 'availableForExternal', 'address', 'inheritEventTypes', 'inheritActionTypes', 'inheritGaps', 'uuidId', 'show', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createDatetime', 'createPersonId', 'modifyDatetime', 'modifyPersonId', 'deleted', 'organisationId', 'code', 'name', 'parentId', 'type', 'netId', 'isArea', 'hasHospitalBeds', 'hasStocks', 'infisCode', 'infisInternalCode', 'infisDepTypeCode', 'infisTariffCode', 'availableForExternal', 'address', 'inheritEventTypes', 'inheritActionTypes', 'inheritGaps', 'uuidId', 'show', ),
        BasePeer::TYPE_COLNAME => array (OrgStructurePeer::ID, OrgStructurePeer::CREATEDATETIME, OrgStructurePeer::CREATEPERSON_ID, OrgStructurePeer::MODIFYDATETIME, OrgStructurePeer::MODIFYPERSON_ID, OrgStructurePeer::DELETED, OrgStructurePeer::ORGANISATION_ID, OrgStructurePeer::CODE, OrgStructurePeer::NAME, OrgStructurePeer::PARENT_ID, OrgStructurePeer::TYPE, OrgStructurePeer::NET_ID, OrgStructurePeer::ISAREA, OrgStructurePeer::HASHOSPITALBEDS, OrgStructurePeer::HASSTOCKS, OrgStructurePeer::INFISCODE, OrgStructurePeer::INFISINTERNALCODE, OrgStructurePeer::INFISDEPTYPECODE, OrgStructurePeer::INFISTARIFFCODE, OrgStructurePeer::AVAILABLEFOREXTERNAL, OrgStructurePeer::ADDRESS, OrgStructurePeer::INHERITEVENTTYPES, OrgStructurePeer::INHERITACTIONTYPES, OrgStructurePeer::INHERITGAPS, OrgStructurePeer::UUID_ID, OrgStructurePeer::SHOW, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'ORGANISATION_ID', 'CODE', 'NAME', 'PARENT_ID', 'TYPE', 'NET_ID', 'ISAREA', 'HASHOSPITALBEDS', 'HASSTOCKS', 'INFISCODE', 'INFISINTERNALCODE', 'INFISDEPTYPECODE', 'INFISTARIFFCODE', 'AVAILABLEFOREXTERNAL', 'ADDRESS', 'INHERITEVENTTYPES', 'INHERITACTIONTYPES', 'INHERITGAPS', 'UUID_ID', 'SHOW', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'organisation_id', 'code', 'name', 'parent_id', 'type', 'net_id', 'isArea', 'hasHospitalBeds', 'hasStocks', 'infisCode', 'infisInternalCode', 'infisDepTypeCode', 'infisTariffCode', 'availableForExternal', 'Address', 'inheritEventTypes', 'inheritActionTypes', 'inheritGaps', 'uuid_id', 'show', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. OrgStructurePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'createDatetime' => 1, 'createPersonId' => 2, 'modifyDatetime' => 3, 'modifyPersonId' => 4, 'deleted' => 5, 'organisationId' => 6, 'code' => 7, 'name' => 8, 'parentId' => 9, 'type' => 10, 'netId' => 11, 'isArea' => 12, 'hasHospitalBeds' => 13, 'hasStocks' => 14, 'infisCode' => 15, 'infisInternalCode' => 16, 'infisDepTypeCode' => 17, 'infisTariffCode' => 18, 'availableForExternal' => 19, 'address' => 20, 'inheritEventTypes' => 21, 'inheritActionTypes' => 22, 'inheritGaps' => 23, 'uuidId' => 24, 'show' => 25, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createDatetime' => 1, 'createPersonId' => 2, 'modifyDatetime' => 3, 'modifyPersonId' => 4, 'deleted' => 5, 'organisationId' => 6, 'code' => 7, 'name' => 8, 'parentId' => 9, 'type' => 10, 'netId' => 11, 'isArea' => 12, 'hasHospitalBeds' => 13, 'hasStocks' => 14, 'infisCode' => 15, 'infisInternalCode' => 16, 'infisDepTypeCode' => 17, 'infisTariffCode' => 18, 'availableForExternal' => 19, 'address' => 20, 'inheritEventTypes' => 21, 'inheritActionTypes' => 22, 'inheritGaps' => 23, 'uuidId' => 24, 'show' => 25, ),
        BasePeer::TYPE_COLNAME => array (OrgStructurePeer::ID => 0, OrgStructurePeer::CREATEDATETIME => 1, OrgStructurePeer::CREATEPERSON_ID => 2, OrgStructurePeer::MODIFYDATETIME => 3, OrgStructurePeer::MODIFYPERSON_ID => 4, OrgStructurePeer::DELETED => 5, OrgStructurePeer::ORGANISATION_ID => 6, OrgStructurePeer::CODE => 7, OrgStructurePeer::NAME => 8, OrgStructurePeer::PARENT_ID => 9, OrgStructurePeer::TYPE => 10, OrgStructurePeer::NET_ID => 11, OrgStructurePeer::ISAREA => 12, OrgStructurePeer::HASHOSPITALBEDS => 13, OrgStructurePeer::HASSTOCKS => 14, OrgStructurePeer::INFISCODE => 15, OrgStructurePeer::INFISINTERNALCODE => 16, OrgStructurePeer::INFISDEPTYPECODE => 17, OrgStructurePeer::INFISTARIFFCODE => 18, OrgStructurePeer::AVAILABLEFOREXTERNAL => 19, OrgStructurePeer::ADDRESS => 20, OrgStructurePeer::INHERITEVENTTYPES => 21, OrgStructurePeer::INHERITACTIONTYPES => 22, OrgStructurePeer::INHERITGAPS => 23, OrgStructurePeer::UUID_ID => 24, OrgStructurePeer::SHOW => 25, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'ORGANISATION_ID' => 6, 'CODE' => 7, 'NAME' => 8, 'PARENT_ID' => 9, 'TYPE' => 10, 'NET_ID' => 11, 'ISAREA' => 12, 'HASHOSPITALBEDS' => 13, 'HASSTOCKS' => 14, 'INFISCODE' => 15, 'INFISINTERNALCODE' => 16, 'INFISDEPTYPECODE' => 17, 'INFISTARIFFCODE' => 18, 'AVAILABLEFOREXTERNAL' => 19, 'ADDRESS' => 20, 'INHERITEVENTTYPES' => 21, 'INHERITACTIONTYPES' => 22, 'INHERITGAPS' => 23, 'UUID_ID' => 24, 'SHOW' => 25, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'organisation_id' => 6, 'code' => 7, 'name' => 8, 'parent_id' => 9, 'type' => 10, 'net_id' => 11, 'isArea' => 12, 'hasHospitalBeds' => 13, 'hasStocks' => 14, 'infisCode' => 15, 'infisInternalCode' => 16, 'infisDepTypeCode' => 17, 'infisTariffCode' => 18, 'availableForExternal' => 19, 'Address' => 20, 'inheritEventTypes' => 21, 'inheritActionTypes' => 22, 'inheritGaps' => 23, 'uuid_id' => 24, 'show' => 25, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
        $toNames = OrgStructurePeer::getFieldNames($toType);
        $key = isset(OrgStructurePeer::$fieldKeys[$fromType][$name]) ? OrgStructurePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(OrgStructurePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, OrgStructurePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return OrgStructurePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. OrgStructurePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(OrgStructurePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(OrgStructurePeer::ID);
            $criteria->addSelectColumn(OrgStructurePeer::CREATEDATETIME);
            $criteria->addSelectColumn(OrgStructurePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(OrgStructurePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(OrgStructurePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(OrgStructurePeer::DELETED);
            $criteria->addSelectColumn(OrgStructurePeer::ORGANISATION_ID);
            $criteria->addSelectColumn(OrgStructurePeer::CODE);
            $criteria->addSelectColumn(OrgStructurePeer::NAME);
            $criteria->addSelectColumn(OrgStructurePeer::PARENT_ID);
            $criteria->addSelectColumn(OrgStructurePeer::TYPE);
            $criteria->addSelectColumn(OrgStructurePeer::NET_ID);
            $criteria->addSelectColumn(OrgStructurePeer::ISAREA);
            $criteria->addSelectColumn(OrgStructurePeer::HASHOSPITALBEDS);
            $criteria->addSelectColumn(OrgStructurePeer::HASSTOCKS);
            $criteria->addSelectColumn(OrgStructurePeer::INFISCODE);
            $criteria->addSelectColumn(OrgStructurePeer::INFISINTERNALCODE);
            $criteria->addSelectColumn(OrgStructurePeer::INFISDEPTYPECODE);
            $criteria->addSelectColumn(OrgStructurePeer::INFISTARIFFCODE);
            $criteria->addSelectColumn(OrgStructurePeer::AVAILABLEFOREXTERNAL);
            $criteria->addSelectColumn(OrgStructurePeer::ADDRESS);
            $criteria->addSelectColumn(OrgStructurePeer::INHERITEVENTTYPES);
            $criteria->addSelectColumn(OrgStructurePeer::INHERITACTIONTYPES);
            $criteria->addSelectColumn(OrgStructurePeer::INHERITGAPS);
            $criteria->addSelectColumn(OrgStructurePeer::UUID_ID);
            $criteria->addSelectColumn(OrgStructurePeer::SHOW);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.organisation_id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.parent_id');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.net_id');
            $criteria->addSelectColumn($alias . '.isArea');
            $criteria->addSelectColumn($alias . '.hasHospitalBeds');
            $criteria->addSelectColumn($alias . '.hasStocks');
            $criteria->addSelectColumn($alias . '.infisCode');
            $criteria->addSelectColumn($alias . '.infisInternalCode');
            $criteria->addSelectColumn($alias . '.infisDepTypeCode');
            $criteria->addSelectColumn($alias . '.infisTariffCode');
            $criteria->addSelectColumn($alias . '.availableForExternal');
            $criteria->addSelectColumn($alias . '.Address');
            $criteria->addSelectColumn($alias . '.inheritEventTypes');
            $criteria->addSelectColumn($alias . '.inheritActionTypes');
            $criteria->addSelectColumn($alias . '.inheritGaps');
            $criteria->addSelectColumn($alias . '.uuid_id');
            $criteria->addSelectColumn($alias . '.show');
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
        $criteria->setPrimaryTableName(OrgStructurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            OrgStructurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(OrgStructurePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgStructure
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = OrgStructurePeer::doSelect($critcopy, $con);
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
        return OrgStructurePeer::populateObjects(OrgStructurePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            OrgStructurePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(OrgStructurePeer::DATABASE_NAME);

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
     * @param      OrgStructure $obj A OrgStructure object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            OrgStructurePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A OrgStructure object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof OrgStructure) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or OrgStructure object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(OrgStructurePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   OrgStructure Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(OrgStructurePeer::$instances[$key])) {
                return OrgStructurePeer::$instances[$key];
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
        foreach (OrgStructurePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        OrgStructurePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to OrgStructure
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
        $cls = OrgStructurePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = OrgStructurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = OrgStructurePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrgStructurePeer::addInstanceToPool($obj, $key);
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
     * @return array (OrgStructure object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = OrgStructurePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = OrgStructurePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + OrgStructurePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrgStructurePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            OrgStructurePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(OrgStructurePeer::DATABASE_NAME)->getTable(OrgStructurePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseOrgStructurePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseOrgStructurePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new OrgStructureTableMap());
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
        return OrgStructurePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a OrgStructure or Criteria object.
     *
     * @param      mixed $values Criteria or OrgStructure object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from OrgStructure object
        }

        if ($criteria->containsKey(OrgStructurePeer::ID) && $criteria->keyContainsValue(OrgStructurePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrgStructurePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(OrgStructurePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a OrgStructure or Criteria object.
     *
     * @param      mixed $values Criteria or OrgStructure object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(OrgStructurePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(OrgStructurePeer::ID);
            $value = $criteria->remove(OrgStructurePeer::ID);
            if ($value) {
                $selectCriteria->add(OrgStructurePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(OrgStructurePeer::TABLE_NAME);
            }

        } else { // $values is OrgStructure object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(OrgStructurePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the OrgStructure table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(OrgStructurePeer::TABLE_NAME, $con, OrgStructurePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrgStructurePeer::clearInstancePool();
            OrgStructurePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a OrgStructure or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or OrgStructure object or primary key or array of primary keys
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
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            OrgStructurePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof OrgStructure) { // it's a model object
            // invalidate the cache for this single object
            OrgStructurePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrgStructurePeer::DATABASE_NAME);
            $criteria->add(OrgStructurePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                OrgStructurePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(OrgStructurePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            OrgStructurePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given OrgStructure object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      OrgStructure $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(OrgStructurePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(OrgStructurePeer::TABLE_NAME);

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

        return BasePeer::doValidate(OrgStructurePeer::DATABASE_NAME, OrgStructurePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return OrgStructure
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = OrgStructurePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(OrgStructurePeer::DATABASE_NAME);
        $criteria->add(OrgStructurePeer::ID, $pk);

        $v = OrgStructurePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return OrgStructure[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgStructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(OrgStructurePeer::DATABASE_NAME);
            $criteria->add(OrgStructurePeer::ID, $pks, Criteria::IN);
            $objs = OrgStructurePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseOrgStructurePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseOrgStructurePeer::buildTableMap();
