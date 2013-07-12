<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureDisabledattendancePeer;
use Webmis\Models\OrgstructurePeer;
use Webmis\Models\OrgstructureStockPeer;
use Webmis\Models\map\OrgstructureTableMap;

/**
 * Base static class for performing query and update operations on the 'OrgStructure' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructurePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'OrgStructure';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Orgstructure';

    /** the related TableMap class for this table */
    const TM_CLASS = 'OrgstructureTableMap';

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
     * An identiy map to hold any loaded instances of Orgstructure objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Orgstructure[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. OrgstructurePeer::$fieldNames[OrgstructurePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'OrganisationId', 'Code', 'Name', 'ParentId', 'Type', 'NetId', 'Isarea', 'Hashospitalbeds', 'Hasstocks', 'Infiscode', 'Infisinternalcode', 'Infisdeptypecode', 'Infistariffcode', 'Availableforexternal', 'Address', 'Inheriteventtypes', 'Inheritactiontypes', 'Inheritgaps', 'UuidId', 'Show', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'organisationId', 'code', 'name', 'parentId', 'type', 'netId', 'isarea', 'hashospitalbeds', 'hasstocks', 'infiscode', 'infisinternalcode', 'infisdeptypecode', 'infistariffcode', 'availableforexternal', 'address', 'inheriteventtypes', 'inheritactiontypes', 'inheritgaps', 'uuidId', 'show', ),
        BasePeer::TYPE_COLNAME => array (OrgstructurePeer::ID, OrgstructurePeer::CREATEDATETIME, OrgstructurePeer::CREATEPERSON_ID, OrgstructurePeer::MODIFYDATETIME, OrgstructurePeer::MODIFYPERSON_ID, OrgstructurePeer::DELETED, OrgstructurePeer::ORGANISATION_ID, OrgstructurePeer::CODE, OrgstructurePeer::NAME, OrgstructurePeer::PARENT_ID, OrgstructurePeer::TYPE, OrgstructurePeer::NET_ID, OrgstructurePeer::ISAREA, OrgstructurePeer::HASHOSPITALBEDS, OrgstructurePeer::HASSTOCKS, OrgstructurePeer::INFISCODE, OrgstructurePeer::INFISINTERNALCODE, OrgstructurePeer::INFISDEPTYPECODE, OrgstructurePeer::INFISTARIFFCODE, OrgstructurePeer::AVAILABLEFOREXTERNAL, OrgstructurePeer::ADDRESS, OrgstructurePeer::INHERITEVENTTYPES, OrgstructurePeer::INHERITACTIONTYPES, OrgstructurePeer::INHERITGAPS, OrgstructurePeer::UUID_ID, OrgstructurePeer::SHOW, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'ORGANISATION_ID', 'CODE', 'NAME', 'PARENT_ID', 'TYPE', 'NET_ID', 'ISAREA', 'HASHOSPITALBEDS', 'HASSTOCKS', 'INFISCODE', 'INFISINTERNALCODE', 'INFISDEPTYPECODE', 'INFISTARIFFCODE', 'AVAILABLEFOREXTERNAL', 'ADDRESS', 'INHERITEVENTTYPES', 'INHERITACTIONTYPES', 'INHERITGAPS', 'UUID_ID', 'SHOW', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'organisation_id', 'code', 'name', 'parent_id', 'type', 'net_id', 'isArea', 'hasHospitalBeds', 'hasStocks', 'infisCode', 'infisInternalCode', 'infisDepTypeCode', 'infisTariffCode', 'availableForExternal', 'Address', 'inheritEventTypes', 'inheritActionTypes', 'inheritGaps', 'uuid_id', 'show', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. OrgstructurePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'OrganisationId' => 6, 'Code' => 7, 'Name' => 8, 'ParentId' => 9, 'Type' => 10, 'NetId' => 11, 'Isarea' => 12, 'Hashospitalbeds' => 13, 'Hasstocks' => 14, 'Infiscode' => 15, 'Infisinternalcode' => 16, 'Infisdeptypecode' => 17, 'Infistariffcode' => 18, 'Availableforexternal' => 19, 'Address' => 20, 'Inheriteventtypes' => 21, 'Inheritactiontypes' => 22, 'Inheritgaps' => 23, 'UuidId' => 24, 'Show' => 25, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'organisationId' => 6, 'code' => 7, 'name' => 8, 'parentId' => 9, 'type' => 10, 'netId' => 11, 'isarea' => 12, 'hashospitalbeds' => 13, 'hasstocks' => 14, 'infiscode' => 15, 'infisinternalcode' => 16, 'infisdeptypecode' => 17, 'infistariffcode' => 18, 'availableforexternal' => 19, 'address' => 20, 'inheriteventtypes' => 21, 'inheritactiontypes' => 22, 'inheritgaps' => 23, 'uuidId' => 24, 'show' => 25, ),
        BasePeer::TYPE_COLNAME => array (OrgstructurePeer::ID => 0, OrgstructurePeer::CREATEDATETIME => 1, OrgstructurePeer::CREATEPERSON_ID => 2, OrgstructurePeer::MODIFYDATETIME => 3, OrgstructurePeer::MODIFYPERSON_ID => 4, OrgstructurePeer::DELETED => 5, OrgstructurePeer::ORGANISATION_ID => 6, OrgstructurePeer::CODE => 7, OrgstructurePeer::NAME => 8, OrgstructurePeer::PARENT_ID => 9, OrgstructurePeer::TYPE => 10, OrgstructurePeer::NET_ID => 11, OrgstructurePeer::ISAREA => 12, OrgstructurePeer::HASHOSPITALBEDS => 13, OrgstructurePeer::HASSTOCKS => 14, OrgstructurePeer::INFISCODE => 15, OrgstructurePeer::INFISINTERNALCODE => 16, OrgstructurePeer::INFISDEPTYPECODE => 17, OrgstructurePeer::INFISTARIFFCODE => 18, OrgstructurePeer::AVAILABLEFOREXTERNAL => 19, OrgstructurePeer::ADDRESS => 20, OrgstructurePeer::INHERITEVENTTYPES => 21, OrgstructurePeer::INHERITACTIONTYPES => 22, OrgstructurePeer::INHERITGAPS => 23, OrgstructurePeer::UUID_ID => 24, OrgstructurePeer::SHOW => 25, ),
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
        $toNames = OrgstructurePeer::getFieldNames($toType);
        $key = isset(OrgstructurePeer::$fieldKeys[$fromType][$name]) ? OrgstructurePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(OrgstructurePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, OrgstructurePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return OrgstructurePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. OrgstructurePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(OrgstructurePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(OrgstructurePeer::ID);
            $criteria->addSelectColumn(OrgstructurePeer::CREATEDATETIME);
            $criteria->addSelectColumn(OrgstructurePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(OrgstructurePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(OrgstructurePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(OrgstructurePeer::DELETED);
            $criteria->addSelectColumn(OrgstructurePeer::ORGANISATION_ID);
            $criteria->addSelectColumn(OrgstructurePeer::CODE);
            $criteria->addSelectColumn(OrgstructurePeer::NAME);
            $criteria->addSelectColumn(OrgstructurePeer::PARENT_ID);
            $criteria->addSelectColumn(OrgstructurePeer::TYPE);
            $criteria->addSelectColumn(OrgstructurePeer::NET_ID);
            $criteria->addSelectColumn(OrgstructurePeer::ISAREA);
            $criteria->addSelectColumn(OrgstructurePeer::HASHOSPITALBEDS);
            $criteria->addSelectColumn(OrgstructurePeer::HASSTOCKS);
            $criteria->addSelectColumn(OrgstructurePeer::INFISCODE);
            $criteria->addSelectColumn(OrgstructurePeer::INFISINTERNALCODE);
            $criteria->addSelectColumn(OrgstructurePeer::INFISDEPTYPECODE);
            $criteria->addSelectColumn(OrgstructurePeer::INFISTARIFFCODE);
            $criteria->addSelectColumn(OrgstructurePeer::AVAILABLEFOREXTERNAL);
            $criteria->addSelectColumn(OrgstructurePeer::ADDRESS);
            $criteria->addSelectColumn(OrgstructurePeer::INHERITEVENTTYPES);
            $criteria->addSelectColumn(OrgstructurePeer::INHERITACTIONTYPES);
            $criteria->addSelectColumn(OrgstructurePeer::INHERITGAPS);
            $criteria->addSelectColumn(OrgstructurePeer::UUID_ID);
            $criteria->addSelectColumn(OrgstructurePeer::SHOW);
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
        $criteria->setPrimaryTableName(OrgstructurePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            OrgstructurePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(OrgstructurePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Orgstructure
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = OrgstructurePeer::doSelect($critcopy, $con);
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
        return OrgstructurePeer::populateObjects(OrgstructurePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            OrgstructurePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(OrgstructurePeer::DATABASE_NAME);

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
     * @param      Orgstructure $obj A Orgstructure object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            OrgstructurePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Orgstructure object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Orgstructure) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Orgstructure object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(OrgstructurePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Orgstructure Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(OrgstructurePeer::$instances[$key])) {
                return OrgstructurePeer::$instances[$key];
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
        foreach (OrgstructurePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        OrgstructurePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to OrgStructure
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in OrgstructureDisabledattendancePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        OrgstructureDisabledattendancePeer::clearInstancePool();
        // Invalidate objects in OrgstructureStockPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        OrgstructureStockPeer::clearInstancePool();
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
        $cls = OrgstructurePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = OrgstructurePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = OrgstructurePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrgstructurePeer::addInstanceToPool($obj, $key);
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
     * @return array (Orgstructure object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = OrgstructurePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = OrgstructurePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + OrgstructurePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrgstructurePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            OrgstructurePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(OrgstructurePeer::DATABASE_NAME)->getTable(OrgstructurePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseOrgstructurePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseOrgstructurePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new OrgstructureTableMap());
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
        return OrgstructurePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Orgstructure or Criteria object.
     *
     * @param      mixed $values Criteria or Orgstructure object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Orgstructure object
        }

        if ($criteria->containsKey(OrgstructurePeer::ID) && $criteria->keyContainsValue(OrgstructurePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrgstructurePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(OrgstructurePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Orgstructure or Criteria object.
     *
     * @param      mixed $values Criteria or Orgstructure object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(OrgstructurePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(OrgstructurePeer::ID);
            $value = $criteria->remove(OrgstructurePeer::ID);
            if ($value) {
                $selectCriteria->add(OrgstructurePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(OrgstructurePeer::TABLE_NAME);
            }

        } else { // $values is Orgstructure object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(OrgstructurePeer::DATABASE_NAME);

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
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += OrgstructurePeer::doOnDeleteCascade(new Criteria(OrgstructurePeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(OrgstructurePeer::TABLE_NAME, $con, OrgstructurePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrgstructurePeer::clearInstancePool();
            OrgstructurePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Orgstructure or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Orgstructure object or primary key or array of primary keys
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
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Orgstructure) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrgstructurePeer::DATABASE_NAME);
            $criteria->add(OrgstructurePeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(OrgstructurePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += OrgstructurePeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                OrgstructurePeer::clearInstancePool();
            } elseif ($values instanceof Orgstructure) { // it's a model object
                OrgstructurePeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    OrgstructurePeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            OrgstructurePeer::clearRelatedInstancePool();
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
        $objects = OrgstructurePeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related OrgstructureDisabledattendance objects
            $criteria = new Criteria(OrgstructureDisabledattendancePeer::DATABASE_NAME);

            $criteria->add(OrgstructureDisabledattendancePeer::MASTER_ID, $obj->getId());
            $affectedRows += OrgstructureDisabledattendancePeer::doDelete($criteria, $con);

            // delete related OrgstructureStock objects
            $criteria = new Criteria(OrgstructureStockPeer::DATABASE_NAME);

            $criteria->add(OrgstructureStockPeer::MASTER_ID, $obj->getId());
            $affectedRows += OrgstructureStockPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Orgstructure object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Orgstructure $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(OrgstructurePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(OrgstructurePeer::TABLE_NAME);

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

        return BasePeer::doValidate(OrgstructurePeer::DATABASE_NAME, OrgstructurePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Orgstructure
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = OrgstructurePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(OrgstructurePeer::DATABASE_NAME);
        $criteria->add(OrgstructurePeer::ID, $pk);

        $v = OrgstructurePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Orgstructure[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(OrgstructurePeer::DATABASE_NAME);
            $criteria->add(OrgstructurePeer::ID, $pks, Criteria::IN);
            $objs = OrgstructurePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseOrgstructurePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseOrgstructurePeer::buildTableMap();

