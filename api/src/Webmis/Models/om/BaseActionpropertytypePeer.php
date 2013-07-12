<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Actionpropertytype;
use Webmis\Models\ActionpropertytypePeer;
use Webmis\Models\map\ActionpropertytypeTableMap;

/**
 * Base static class for performing query and update operations on the 'ActionPropertyType' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertytypePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ActionPropertyType';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Actionpropertytype';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ActionpropertytypeTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 28;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 28;

    /** the column name for the id field */
    const ID = 'ActionPropertyType.id';

    /** the column name for the deleted field */
    const DELETED = 'ActionPropertyType.deleted';

    /** the column name for the actionType_id field */
    const ACTIONTYPE_ID = 'ActionPropertyType.actionType_id';

    /** the column name for the idx field */
    const IDX = 'ActionPropertyType.idx';

    /** the column name for the template_id field */
    const TEMPLATE_ID = 'ActionPropertyType.template_id';

    /** the column name for the name field */
    const NAME = 'ActionPropertyType.name';

    /** the column name for the descr field */
    const DESCR = 'ActionPropertyType.descr';

    /** the column name for the unit_id field */
    const UNIT_ID = 'ActionPropertyType.unit_id';

    /** the column name for the typeName field */
    const TYPENAME = 'ActionPropertyType.typeName';

    /** the column name for the valueDomain field */
    const VALUEDOMAIN = 'ActionPropertyType.valueDomain';

    /** the column name for the defaultValue field */
    const DEFAULTVALUE = 'ActionPropertyType.defaultValue';

    /** the column name for the code field */
    const CODE = 'ActionPropertyType.code';

    /** the column name for the isVector field */
    const ISVECTOR = 'ActionPropertyType.isVector';

    /** the column name for the norm field */
    const NORM = 'ActionPropertyType.norm';

    /** the column name for the sex field */
    const SEX = 'ActionPropertyType.sex';

    /** the column name for the age field */
    const AGE = 'ActionPropertyType.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'ActionPropertyType.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'ActionPropertyType.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'ActionPropertyType.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'ActionPropertyType.age_ec';

    /** the column name for the penalty field */
    const PENALTY = 'ActionPropertyType.penalty';

    /** the column name for the visibleInJobTicket field */
    const VISIBLEINJOBTICKET = 'ActionPropertyType.visibleInJobTicket';

    /** the column name for the isAssignable field */
    const ISASSIGNABLE = 'ActionPropertyType.isAssignable';

    /** the column name for the test_id field */
    const TEST_ID = 'ActionPropertyType.test_id';

    /** the column name for the defaultEvaluation field */
    const DEFAULTEVALUATION = 'ActionPropertyType.defaultEvaluation';

    /** the column name for the toEpicrisis field */
    const TOEPICRISIS = 'ActionPropertyType.toEpicrisis';

    /** the column name for the mandatory field */
    const MANDATORY = 'ActionPropertyType.mandatory';

    /** the column name for the readOnly field */
    const READONLY = 'ActionPropertyType.readOnly';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Actionpropertytype objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Actionpropertytype[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ActionpropertytypePeer::$fieldNames[ActionpropertytypePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Deleted', 'ActiontypeId', 'Idx', 'TemplateId', 'Name', 'Descr', 'UnitId', 'Typename', 'Valuedomain', 'Defaultvalue', 'Code', 'Isvector', 'Norm', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'Penalty', 'Visibleinjobticket', 'Isassignable', 'TestId', 'Defaultevaluation', 'Toepicrisis', 'Mandatory', 'Readonly', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'deleted', 'actiontypeId', 'idx', 'templateId', 'name', 'descr', 'unitId', 'typename', 'valuedomain', 'defaultvalue', 'code', 'isvector', 'norm', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'penalty', 'visibleinjobticket', 'isassignable', 'testId', 'defaultevaluation', 'toepicrisis', 'mandatory', 'readonly', ),
        BasePeer::TYPE_COLNAME => array (ActionpropertytypePeer::ID, ActionpropertytypePeer::DELETED, ActionpropertytypePeer::ACTIONTYPE_ID, ActionpropertytypePeer::IDX, ActionpropertytypePeer::TEMPLATE_ID, ActionpropertytypePeer::NAME, ActionpropertytypePeer::DESCR, ActionpropertytypePeer::UNIT_ID, ActionpropertytypePeer::TYPENAME, ActionpropertytypePeer::VALUEDOMAIN, ActionpropertytypePeer::DEFAULTVALUE, ActionpropertytypePeer::CODE, ActionpropertytypePeer::ISVECTOR, ActionpropertytypePeer::NORM, ActionpropertytypePeer::SEX, ActionpropertytypePeer::AGE, ActionpropertytypePeer::AGE_BU, ActionpropertytypePeer::AGE_BC, ActionpropertytypePeer::AGE_EU, ActionpropertytypePeer::AGE_EC, ActionpropertytypePeer::PENALTY, ActionpropertytypePeer::VISIBLEINJOBTICKET, ActionpropertytypePeer::ISASSIGNABLE, ActionpropertytypePeer::TEST_ID, ActionpropertytypePeer::DEFAULTEVALUATION, ActionpropertytypePeer::TOEPICRISIS, ActionpropertytypePeer::MANDATORY, ActionpropertytypePeer::READONLY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'DELETED', 'ACTIONTYPE_ID', 'IDX', 'TEMPLATE_ID', 'NAME', 'DESCR', 'UNIT_ID', 'TYPENAME', 'VALUEDOMAIN', 'DEFAULTVALUE', 'CODE', 'ISVECTOR', 'NORM', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'PENALTY', 'VISIBLEINJOBTICKET', 'ISASSIGNABLE', 'TEST_ID', 'DEFAULTEVALUATION', 'TOEPICRISIS', 'MANDATORY', 'READONLY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'deleted', 'actionType_id', 'idx', 'template_id', 'name', 'descr', 'unit_id', 'typeName', 'valueDomain', 'defaultValue', 'code', 'isVector', 'norm', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'penalty', 'visibleInJobTicket', 'isAssignable', 'test_id', 'defaultEvaluation', 'toEpicrisis', 'mandatory', 'readOnly', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ActionpropertytypePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Deleted' => 1, 'ActiontypeId' => 2, 'Idx' => 3, 'TemplateId' => 4, 'Name' => 5, 'Descr' => 6, 'UnitId' => 7, 'Typename' => 8, 'Valuedomain' => 9, 'Defaultvalue' => 10, 'Code' => 11, 'Isvector' => 12, 'Norm' => 13, 'Sex' => 14, 'Age' => 15, 'AgeBu' => 16, 'AgeBc' => 17, 'AgeEu' => 18, 'AgeEc' => 19, 'Penalty' => 20, 'Visibleinjobticket' => 21, 'Isassignable' => 22, 'TestId' => 23, 'Defaultevaluation' => 24, 'Toepicrisis' => 25, 'Mandatory' => 26, 'Readonly' => 27, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'deleted' => 1, 'actiontypeId' => 2, 'idx' => 3, 'templateId' => 4, 'name' => 5, 'descr' => 6, 'unitId' => 7, 'typename' => 8, 'valuedomain' => 9, 'defaultvalue' => 10, 'code' => 11, 'isvector' => 12, 'norm' => 13, 'sex' => 14, 'age' => 15, 'ageBu' => 16, 'ageBc' => 17, 'ageEu' => 18, 'ageEc' => 19, 'penalty' => 20, 'visibleinjobticket' => 21, 'isassignable' => 22, 'testId' => 23, 'defaultevaluation' => 24, 'toepicrisis' => 25, 'mandatory' => 26, 'readonly' => 27, ),
        BasePeer::TYPE_COLNAME => array (ActionpropertytypePeer::ID => 0, ActionpropertytypePeer::DELETED => 1, ActionpropertytypePeer::ACTIONTYPE_ID => 2, ActionpropertytypePeer::IDX => 3, ActionpropertytypePeer::TEMPLATE_ID => 4, ActionpropertytypePeer::NAME => 5, ActionpropertytypePeer::DESCR => 6, ActionpropertytypePeer::UNIT_ID => 7, ActionpropertytypePeer::TYPENAME => 8, ActionpropertytypePeer::VALUEDOMAIN => 9, ActionpropertytypePeer::DEFAULTVALUE => 10, ActionpropertytypePeer::CODE => 11, ActionpropertytypePeer::ISVECTOR => 12, ActionpropertytypePeer::NORM => 13, ActionpropertytypePeer::SEX => 14, ActionpropertytypePeer::AGE => 15, ActionpropertytypePeer::AGE_BU => 16, ActionpropertytypePeer::AGE_BC => 17, ActionpropertytypePeer::AGE_EU => 18, ActionpropertytypePeer::AGE_EC => 19, ActionpropertytypePeer::PENALTY => 20, ActionpropertytypePeer::VISIBLEINJOBTICKET => 21, ActionpropertytypePeer::ISASSIGNABLE => 22, ActionpropertytypePeer::TEST_ID => 23, ActionpropertytypePeer::DEFAULTEVALUATION => 24, ActionpropertytypePeer::TOEPICRISIS => 25, ActionpropertytypePeer::MANDATORY => 26, ActionpropertytypePeer::READONLY => 27, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'DELETED' => 1, 'ACTIONTYPE_ID' => 2, 'IDX' => 3, 'TEMPLATE_ID' => 4, 'NAME' => 5, 'DESCR' => 6, 'UNIT_ID' => 7, 'TYPENAME' => 8, 'VALUEDOMAIN' => 9, 'DEFAULTVALUE' => 10, 'CODE' => 11, 'ISVECTOR' => 12, 'NORM' => 13, 'SEX' => 14, 'AGE' => 15, 'AGE_BU' => 16, 'AGE_BC' => 17, 'AGE_EU' => 18, 'AGE_EC' => 19, 'PENALTY' => 20, 'VISIBLEINJOBTICKET' => 21, 'ISASSIGNABLE' => 22, 'TEST_ID' => 23, 'DEFAULTEVALUATION' => 24, 'TOEPICRISIS' => 25, 'MANDATORY' => 26, 'READONLY' => 27, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'deleted' => 1, 'actionType_id' => 2, 'idx' => 3, 'template_id' => 4, 'name' => 5, 'descr' => 6, 'unit_id' => 7, 'typeName' => 8, 'valueDomain' => 9, 'defaultValue' => 10, 'code' => 11, 'isVector' => 12, 'norm' => 13, 'sex' => 14, 'age' => 15, 'age_bu' => 16, 'age_bc' => 17, 'age_eu' => 18, 'age_ec' => 19, 'penalty' => 20, 'visibleInJobTicket' => 21, 'isAssignable' => 22, 'test_id' => 23, 'defaultEvaluation' => 24, 'toEpicrisis' => 25, 'mandatory' => 26, 'readOnly' => 27, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
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
        $toNames = ActionpropertytypePeer::getFieldNames($toType);
        $key = isset(ActionpropertytypePeer::$fieldKeys[$fromType][$name]) ? ActionpropertytypePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ActionpropertytypePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ActionpropertytypePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ActionpropertytypePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ActionpropertytypePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ActionpropertytypePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ActionpropertytypePeer::ID);
            $criteria->addSelectColumn(ActionpropertytypePeer::DELETED);
            $criteria->addSelectColumn(ActionpropertytypePeer::ACTIONTYPE_ID);
            $criteria->addSelectColumn(ActionpropertytypePeer::IDX);
            $criteria->addSelectColumn(ActionpropertytypePeer::TEMPLATE_ID);
            $criteria->addSelectColumn(ActionpropertytypePeer::NAME);
            $criteria->addSelectColumn(ActionpropertytypePeer::DESCR);
            $criteria->addSelectColumn(ActionpropertytypePeer::UNIT_ID);
            $criteria->addSelectColumn(ActionpropertytypePeer::TYPENAME);
            $criteria->addSelectColumn(ActionpropertytypePeer::VALUEDOMAIN);
            $criteria->addSelectColumn(ActionpropertytypePeer::DEFAULTVALUE);
            $criteria->addSelectColumn(ActionpropertytypePeer::CODE);
            $criteria->addSelectColumn(ActionpropertytypePeer::ISVECTOR);
            $criteria->addSelectColumn(ActionpropertytypePeer::NORM);
            $criteria->addSelectColumn(ActionpropertytypePeer::SEX);
            $criteria->addSelectColumn(ActionpropertytypePeer::AGE);
            $criteria->addSelectColumn(ActionpropertytypePeer::AGE_BU);
            $criteria->addSelectColumn(ActionpropertytypePeer::AGE_BC);
            $criteria->addSelectColumn(ActionpropertytypePeer::AGE_EU);
            $criteria->addSelectColumn(ActionpropertytypePeer::AGE_EC);
            $criteria->addSelectColumn(ActionpropertytypePeer::PENALTY);
            $criteria->addSelectColumn(ActionpropertytypePeer::VISIBLEINJOBTICKET);
            $criteria->addSelectColumn(ActionpropertytypePeer::ISASSIGNABLE);
            $criteria->addSelectColumn(ActionpropertytypePeer::TEST_ID);
            $criteria->addSelectColumn(ActionpropertytypePeer::DEFAULTEVALUATION);
            $criteria->addSelectColumn(ActionpropertytypePeer::TOEPICRISIS);
            $criteria->addSelectColumn(ActionpropertytypePeer::MANDATORY);
            $criteria->addSelectColumn(ActionpropertytypePeer::READONLY);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.actionType_id');
            $criteria->addSelectColumn($alias . '.idx');
            $criteria->addSelectColumn($alias . '.template_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.descr');
            $criteria->addSelectColumn($alias . '.unit_id');
            $criteria->addSelectColumn($alias . '.typeName');
            $criteria->addSelectColumn($alias . '.valueDomain');
            $criteria->addSelectColumn($alias . '.defaultValue');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.isVector');
            $criteria->addSelectColumn($alias . '.norm');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.penalty');
            $criteria->addSelectColumn($alias . '.visibleInJobTicket');
            $criteria->addSelectColumn($alias . '.isAssignable');
            $criteria->addSelectColumn($alias . '.test_id');
            $criteria->addSelectColumn($alias . '.defaultEvaluation');
            $criteria->addSelectColumn($alias . '.toEpicrisis');
            $criteria->addSelectColumn($alias . '.mandatory');
            $criteria->addSelectColumn($alias . '.readOnly');
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
        $criteria->setPrimaryTableName(ActionpropertytypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionpropertytypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ActionpropertytypePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actionpropertytype
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ActionpropertytypePeer::doSelect($critcopy, $con);
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
        return ActionpropertytypePeer::populateObjects(ActionpropertytypePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ActionpropertytypePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ActionpropertytypePeer::DATABASE_NAME);

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
     * @param      Actionpropertytype $obj A Actionpropertytype object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ActionpropertytypePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Actionpropertytype object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Actionpropertytype) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Actionpropertytype object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ActionpropertytypePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Actionpropertytype Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ActionpropertytypePeer::$instances[$key])) {
                return ActionpropertytypePeer::$instances[$key];
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
        foreach (ActionpropertytypePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ActionpropertytypePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ActionPropertyType
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
        $cls = ActionpropertytypePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ActionpropertytypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ActionpropertytypePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActionpropertytypePeer::addInstanceToPool($obj, $key);
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
     * @return array (Actionpropertytype object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ActionpropertytypePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ActionpropertytypePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ActionpropertytypePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActionpropertytypePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ActionpropertytypePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ActionpropertytypePeer::DATABASE_NAME)->getTable(ActionpropertytypePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseActionpropertytypePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseActionpropertytypePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ActionpropertytypeTableMap());
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
        return ActionpropertytypePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Actionpropertytype or Criteria object.
     *
     * @param      mixed $values Criteria or Actionpropertytype object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Actionpropertytype object
        }

        if ($criteria->containsKey(ActionpropertytypePeer::ID) && $criteria->keyContainsValue(ActionpropertytypePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActionpropertytypePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ActionpropertytypePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Actionpropertytype or Criteria object.
     *
     * @param      mixed $values Criteria or Actionpropertytype object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ActionpropertytypePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ActionpropertytypePeer::ID);
            $value = $criteria->remove(ActionpropertytypePeer::ID);
            if ($value) {
                $selectCriteria->add(ActionpropertytypePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ActionpropertytypePeer::TABLE_NAME);
            }

        } else { // $values is Actionpropertytype object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ActionpropertytypePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ActionPropertyType table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ActionpropertytypePeer::TABLE_NAME, $con, ActionpropertytypePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActionpropertytypePeer::clearInstancePool();
            ActionpropertytypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Actionpropertytype or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Actionpropertytype object or primary key or array of primary keys
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
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ActionpropertytypePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Actionpropertytype) { // it's a model object
            // invalidate the cache for this single object
            ActionpropertytypePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActionpropertytypePeer::DATABASE_NAME);
            $criteria->add(ActionpropertytypePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ActionpropertytypePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ActionpropertytypePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ActionpropertytypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Actionpropertytype object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Actionpropertytype $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ActionpropertytypePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ActionpropertytypePeer::TABLE_NAME);

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

        return BasePeer::doValidate(ActionpropertytypePeer::DATABASE_NAME, ActionpropertytypePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Actionpropertytype
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ActionpropertytypePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ActionpropertytypePeer::DATABASE_NAME);
        $criteria->add(ActionpropertytypePeer::ID, $pk);

        $v = ActionpropertytypePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Actionpropertytype[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ActionpropertytypePeer::DATABASE_NAME);
            $criteria->add(ActionpropertytypePeer::ID, $pks, Criteria::IN);
            $objs = ActionpropertytypePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseActionpropertytypePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseActionpropertytypePeer::buildTableMap();

