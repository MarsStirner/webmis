<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Actionpropertytemplate;
use Webmis\Models\ActionpropertytemplatePeer;
use Webmis\Models\map\ActionpropertytemplateTableMap;

/**
 * Base static class for performing query and update operations on the 'ActionPropertyTemplate' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertytemplatePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ActionPropertyTemplate';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Actionpropertytemplate';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ActionpropertytemplateTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the id field */
    const ID = 'ActionPropertyTemplate.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'ActionPropertyTemplate.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'ActionPropertyTemplate.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'ActionPropertyTemplate.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'ActionPropertyTemplate.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'ActionPropertyTemplate.deleted';

    /** the column name for the group_id field */
    const GROUP_ID = 'ActionPropertyTemplate.group_id';

    /** the column name for the parentCode field */
    const PARENTCODE = 'ActionPropertyTemplate.parentCode';

    /** the column name for the code field */
    const CODE = 'ActionPropertyTemplate.code';

    /** the column name for the federalCode field */
    const FEDERALCODE = 'ActionPropertyTemplate.federalCode';

    /** the column name for the regionalCode field */
    const REGIONALCODE = 'ActionPropertyTemplate.regionalCode';

    /** the column name for the name field */
    const NAME = 'ActionPropertyTemplate.name';

    /** the column name for the abbrev field */
    const ABBREV = 'ActionPropertyTemplate.abbrev';

    /** the column name for the sex field */
    const SEX = 'ActionPropertyTemplate.sex';

    /** the column name for the age field */
    const AGE = 'ActionPropertyTemplate.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'ActionPropertyTemplate.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'ActionPropertyTemplate.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'ActionPropertyTemplate.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'ActionPropertyTemplate.age_ec';

    /** the column name for the service_id field */
    const SERVICE_ID = 'ActionPropertyTemplate.service_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Actionpropertytemplate objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Actionpropertytemplate[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ActionpropertytemplatePeer::$fieldNames[ActionpropertytemplatePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'GroupId', 'Parentcode', 'Code', 'Federalcode', 'Regionalcode', 'Name', 'Abbrev', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'ServiceId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'groupId', 'parentcode', 'code', 'federalcode', 'regionalcode', 'name', 'abbrev', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'serviceId', ),
        BasePeer::TYPE_COLNAME => array (ActionpropertytemplatePeer::ID, ActionpropertytemplatePeer::CREATEDATETIME, ActionpropertytemplatePeer::CREATEPERSON_ID, ActionpropertytemplatePeer::MODIFYDATETIME, ActionpropertytemplatePeer::MODIFYPERSON_ID, ActionpropertytemplatePeer::DELETED, ActionpropertytemplatePeer::GROUP_ID, ActionpropertytemplatePeer::PARENTCODE, ActionpropertytemplatePeer::CODE, ActionpropertytemplatePeer::FEDERALCODE, ActionpropertytemplatePeer::REGIONALCODE, ActionpropertytemplatePeer::NAME, ActionpropertytemplatePeer::ABBREV, ActionpropertytemplatePeer::SEX, ActionpropertytemplatePeer::AGE, ActionpropertytemplatePeer::AGE_BU, ActionpropertytemplatePeer::AGE_BC, ActionpropertytemplatePeer::AGE_EU, ActionpropertytemplatePeer::AGE_EC, ActionpropertytemplatePeer::SERVICE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'GROUP_ID', 'PARENTCODE', 'CODE', 'FEDERALCODE', 'REGIONALCODE', 'NAME', 'ABBREV', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'SERVICE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'group_id', 'parentCode', 'code', 'federalCode', 'regionalCode', 'name', 'abbrev', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'service_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ActionpropertytemplatePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'GroupId' => 6, 'Parentcode' => 7, 'Code' => 8, 'Federalcode' => 9, 'Regionalcode' => 10, 'Name' => 11, 'Abbrev' => 12, 'Sex' => 13, 'Age' => 14, 'AgeBu' => 15, 'AgeBc' => 16, 'AgeEu' => 17, 'AgeEc' => 18, 'ServiceId' => 19, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'groupId' => 6, 'parentcode' => 7, 'code' => 8, 'federalcode' => 9, 'regionalcode' => 10, 'name' => 11, 'abbrev' => 12, 'sex' => 13, 'age' => 14, 'ageBu' => 15, 'ageBc' => 16, 'ageEu' => 17, 'ageEc' => 18, 'serviceId' => 19, ),
        BasePeer::TYPE_COLNAME => array (ActionpropertytemplatePeer::ID => 0, ActionpropertytemplatePeer::CREATEDATETIME => 1, ActionpropertytemplatePeer::CREATEPERSON_ID => 2, ActionpropertytemplatePeer::MODIFYDATETIME => 3, ActionpropertytemplatePeer::MODIFYPERSON_ID => 4, ActionpropertytemplatePeer::DELETED => 5, ActionpropertytemplatePeer::GROUP_ID => 6, ActionpropertytemplatePeer::PARENTCODE => 7, ActionpropertytemplatePeer::CODE => 8, ActionpropertytemplatePeer::FEDERALCODE => 9, ActionpropertytemplatePeer::REGIONALCODE => 10, ActionpropertytemplatePeer::NAME => 11, ActionpropertytemplatePeer::ABBREV => 12, ActionpropertytemplatePeer::SEX => 13, ActionpropertytemplatePeer::AGE => 14, ActionpropertytemplatePeer::AGE_BU => 15, ActionpropertytemplatePeer::AGE_BC => 16, ActionpropertytemplatePeer::AGE_EU => 17, ActionpropertytemplatePeer::AGE_EC => 18, ActionpropertytemplatePeer::SERVICE_ID => 19, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'GROUP_ID' => 6, 'PARENTCODE' => 7, 'CODE' => 8, 'FEDERALCODE' => 9, 'REGIONALCODE' => 10, 'NAME' => 11, 'ABBREV' => 12, 'SEX' => 13, 'AGE' => 14, 'AGE_BU' => 15, 'AGE_BC' => 16, 'AGE_EU' => 17, 'AGE_EC' => 18, 'SERVICE_ID' => 19, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'group_id' => 6, 'parentCode' => 7, 'code' => 8, 'federalCode' => 9, 'regionalCode' => 10, 'name' => 11, 'abbrev' => 12, 'sex' => 13, 'age' => 14, 'age_bu' => 15, 'age_bc' => 16, 'age_eu' => 17, 'age_ec' => 18, 'service_id' => 19, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $toNames = ActionpropertytemplatePeer::getFieldNames($toType);
        $key = isset(ActionpropertytemplatePeer::$fieldKeys[$fromType][$name]) ? ActionpropertytemplatePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ActionpropertytemplatePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ActionpropertytemplatePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ActionpropertytemplatePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ActionpropertytemplatePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ActionpropertytemplatePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ActionpropertytemplatePeer::ID);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::CREATEDATETIME);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::DELETED);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::GROUP_ID);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::PARENTCODE);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::CODE);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::FEDERALCODE);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::REGIONALCODE);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::NAME);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::ABBREV);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::SEX);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::AGE);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::AGE_BU);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::AGE_BC);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::AGE_EU);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::AGE_EC);
            $criteria->addSelectColumn(ActionpropertytemplatePeer::SERVICE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.group_id');
            $criteria->addSelectColumn($alias . '.parentCode');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.federalCode');
            $criteria->addSelectColumn($alias . '.regionalCode');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.abbrev');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.service_id');
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
        $criteria->setPrimaryTableName(ActionpropertytemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActionpropertytemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ActionpropertytemplatePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actionpropertytemplate
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ActionpropertytemplatePeer::doSelect($critcopy, $con);
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
        return ActionpropertytemplatePeer::populateObjects(ActionpropertytemplatePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ActionpropertytemplatePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ActionpropertytemplatePeer::DATABASE_NAME);

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
     * @param      Actionpropertytemplate $obj A Actionpropertytemplate object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ActionpropertytemplatePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Actionpropertytemplate object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Actionpropertytemplate) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Actionpropertytemplate object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ActionpropertytemplatePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Actionpropertytemplate Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ActionpropertytemplatePeer::$instances[$key])) {
                return ActionpropertytemplatePeer::$instances[$key];
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
        foreach (ActionpropertytemplatePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ActionpropertytemplatePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ActionPropertyTemplate
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
        $cls = ActionpropertytemplatePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ActionpropertytemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ActionpropertytemplatePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActionpropertytemplatePeer::addInstanceToPool($obj, $key);
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
     * @return array (Actionpropertytemplate object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ActionpropertytemplatePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ActionpropertytemplatePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ActionpropertytemplatePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActionpropertytemplatePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ActionpropertytemplatePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ActionpropertytemplatePeer::DATABASE_NAME)->getTable(ActionpropertytemplatePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseActionpropertytemplatePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseActionpropertytemplatePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ActionpropertytemplateTableMap());
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
        return ActionpropertytemplatePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Actionpropertytemplate or Criteria object.
     *
     * @param      mixed $values Criteria or Actionpropertytemplate object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Actionpropertytemplate object
        }

        if ($criteria->containsKey(ActionpropertytemplatePeer::ID) && $criteria->keyContainsValue(ActionpropertytemplatePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActionpropertytemplatePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ActionpropertytemplatePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Actionpropertytemplate or Criteria object.
     *
     * @param      mixed $values Criteria or Actionpropertytemplate object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ActionpropertytemplatePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ActionpropertytemplatePeer::ID);
            $value = $criteria->remove(ActionpropertytemplatePeer::ID);
            if ($value) {
                $selectCriteria->add(ActionpropertytemplatePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ActionpropertytemplatePeer::TABLE_NAME);
            }

        } else { // $values is Actionpropertytemplate object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ActionpropertytemplatePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ActionPropertyTemplate table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ActionpropertytemplatePeer::TABLE_NAME, $con, ActionpropertytemplatePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActionpropertytemplatePeer::clearInstancePool();
            ActionpropertytemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Actionpropertytemplate or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Actionpropertytemplate object or primary key or array of primary keys
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
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ActionpropertytemplatePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Actionpropertytemplate) { // it's a model object
            // invalidate the cache for this single object
            ActionpropertytemplatePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActionpropertytemplatePeer::DATABASE_NAME);
            $criteria->add(ActionpropertytemplatePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ActionpropertytemplatePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ActionpropertytemplatePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ActionpropertytemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Actionpropertytemplate object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Actionpropertytemplate $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ActionpropertytemplatePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ActionpropertytemplatePeer::TABLE_NAME);

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

        return BasePeer::doValidate(ActionpropertytemplatePeer::DATABASE_NAME, ActionpropertytemplatePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Actionpropertytemplate
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ActionpropertytemplatePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ActionpropertytemplatePeer::DATABASE_NAME);
        $criteria->add(ActionpropertytemplatePeer::ID, $pk);

        $v = ActionpropertytemplatePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Actionpropertytemplate[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ActionpropertytemplatePeer::DATABASE_NAME);
            $criteria->add(ActionpropertytemplatePeer::ID, $pks, Criteria::IN);
            $objs = ActionpropertytemplatePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseActionpropertytemplatePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseActionpropertytemplatePeer::buildTableMap();

