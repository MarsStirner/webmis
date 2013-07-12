<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Actiontemplate;
use Webmis\Models\ActiontemplatePeer;
use Webmis\Models\map\ActiontemplateTableMap;

/**
 * Base static class for performing query and update operations on the 'ActionTemplate' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseActiontemplatePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ActionTemplate';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Actiontemplate';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ActiontemplateTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 18;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 18;

    /** the column name for the id field */
    const ID = 'ActionTemplate.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'ActionTemplate.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'ActionTemplate.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'ActionTemplate.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'ActionTemplate.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'ActionTemplate.deleted';

    /** the column name for the group_id field */
    const GROUP_ID = 'ActionTemplate.group_id';

    /** the column name for the code field */
    const CODE = 'ActionTemplate.code';

    /** the column name for the name field */
    const NAME = 'ActionTemplate.name';

    /** the column name for the sex field */
    const SEX = 'ActionTemplate.sex';

    /** the column name for the age field */
    const AGE = 'ActionTemplate.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'ActionTemplate.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'ActionTemplate.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'ActionTemplate.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'ActionTemplate.age_ec';

    /** the column name for the owner_id field */
    const OWNER_ID = 'ActionTemplate.owner_id';

    /** the column name for the speciality_id field */
    const SPECIALITY_ID = 'ActionTemplate.speciality_id';

    /** the column name for the action_id field */
    const ACTION_ID = 'ActionTemplate.action_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Actiontemplate objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Actiontemplate[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ActiontemplatePeer::$fieldNames[ActiontemplatePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'GroupId', 'Code', 'Name', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'OwnerId', 'SpecialityId', 'ActionId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'groupId', 'code', 'name', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'ownerId', 'specialityId', 'actionId', ),
        BasePeer::TYPE_COLNAME => array (ActiontemplatePeer::ID, ActiontemplatePeer::CREATEDATETIME, ActiontemplatePeer::CREATEPERSON_ID, ActiontemplatePeer::MODIFYDATETIME, ActiontemplatePeer::MODIFYPERSON_ID, ActiontemplatePeer::DELETED, ActiontemplatePeer::GROUP_ID, ActiontemplatePeer::CODE, ActiontemplatePeer::NAME, ActiontemplatePeer::SEX, ActiontemplatePeer::AGE, ActiontemplatePeer::AGE_BU, ActiontemplatePeer::AGE_BC, ActiontemplatePeer::AGE_EU, ActiontemplatePeer::AGE_EC, ActiontemplatePeer::OWNER_ID, ActiontemplatePeer::SPECIALITY_ID, ActiontemplatePeer::ACTION_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'GROUP_ID', 'CODE', 'NAME', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'OWNER_ID', 'SPECIALITY_ID', 'ACTION_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'group_id', 'code', 'name', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'owner_id', 'speciality_id', 'action_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ActiontemplatePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'GroupId' => 6, 'Code' => 7, 'Name' => 8, 'Sex' => 9, 'Age' => 10, 'AgeBu' => 11, 'AgeBc' => 12, 'AgeEu' => 13, 'AgeEc' => 14, 'OwnerId' => 15, 'SpecialityId' => 16, 'ActionId' => 17, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'groupId' => 6, 'code' => 7, 'name' => 8, 'sex' => 9, 'age' => 10, 'ageBu' => 11, 'ageBc' => 12, 'ageEu' => 13, 'ageEc' => 14, 'ownerId' => 15, 'specialityId' => 16, 'actionId' => 17, ),
        BasePeer::TYPE_COLNAME => array (ActiontemplatePeer::ID => 0, ActiontemplatePeer::CREATEDATETIME => 1, ActiontemplatePeer::CREATEPERSON_ID => 2, ActiontemplatePeer::MODIFYDATETIME => 3, ActiontemplatePeer::MODIFYPERSON_ID => 4, ActiontemplatePeer::DELETED => 5, ActiontemplatePeer::GROUP_ID => 6, ActiontemplatePeer::CODE => 7, ActiontemplatePeer::NAME => 8, ActiontemplatePeer::SEX => 9, ActiontemplatePeer::AGE => 10, ActiontemplatePeer::AGE_BU => 11, ActiontemplatePeer::AGE_BC => 12, ActiontemplatePeer::AGE_EU => 13, ActiontemplatePeer::AGE_EC => 14, ActiontemplatePeer::OWNER_ID => 15, ActiontemplatePeer::SPECIALITY_ID => 16, ActiontemplatePeer::ACTION_ID => 17, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'GROUP_ID' => 6, 'CODE' => 7, 'NAME' => 8, 'SEX' => 9, 'AGE' => 10, 'AGE_BU' => 11, 'AGE_BC' => 12, 'AGE_EU' => 13, 'AGE_EC' => 14, 'OWNER_ID' => 15, 'SPECIALITY_ID' => 16, 'ACTION_ID' => 17, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'group_id' => 6, 'code' => 7, 'name' => 8, 'sex' => 9, 'age' => 10, 'age_bu' => 11, 'age_bc' => 12, 'age_eu' => 13, 'age_ec' => 14, 'owner_id' => 15, 'speciality_id' => 16, 'action_id' => 17, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $toNames = ActiontemplatePeer::getFieldNames($toType);
        $key = isset(ActiontemplatePeer::$fieldKeys[$fromType][$name]) ? ActiontemplatePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ActiontemplatePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ActiontemplatePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ActiontemplatePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ActiontemplatePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ActiontemplatePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ActiontemplatePeer::ID);
            $criteria->addSelectColumn(ActiontemplatePeer::CREATEDATETIME);
            $criteria->addSelectColumn(ActiontemplatePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(ActiontemplatePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(ActiontemplatePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(ActiontemplatePeer::DELETED);
            $criteria->addSelectColumn(ActiontemplatePeer::GROUP_ID);
            $criteria->addSelectColumn(ActiontemplatePeer::CODE);
            $criteria->addSelectColumn(ActiontemplatePeer::NAME);
            $criteria->addSelectColumn(ActiontemplatePeer::SEX);
            $criteria->addSelectColumn(ActiontemplatePeer::AGE);
            $criteria->addSelectColumn(ActiontemplatePeer::AGE_BU);
            $criteria->addSelectColumn(ActiontemplatePeer::AGE_BC);
            $criteria->addSelectColumn(ActiontemplatePeer::AGE_EU);
            $criteria->addSelectColumn(ActiontemplatePeer::AGE_EC);
            $criteria->addSelectColumn(ActiontemplatePeer::OWNER_ID);
            $criteria->addSelectColumn(ActiontemplatePeer::SPECIALITY_ID);
            $criteria->addSelectColumn(ActiontemplatePeer::ACTION_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.group_id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.owner_id');
            $criteria->addSelectColumn($alias . '.speciality_id');
            $criteria->addSelectColumn($alias . '.action_id');
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
        $criteria->setPrimaryTableName(ActiontemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ActiontemplatePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actiontemplate
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ActiontemplatePeer::doSelect($critcopy, $con);
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
        return ActiontemplatePeer::populateObjects(ActiontemplatePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ActiontemplatePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ActiontemplatePeer::DATABASE_NAME);

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
     * @param      Actiontemplate $obj A Actiontemplate object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ActiontemplatePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Actiontemplate object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Actiontemplate) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Actiontemplate object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ActiontemplatePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Actiontemplate Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ActiontemplatePeer::$instances[$key])) {
                return ActiontemplatePeer::$instances[$key];
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
        foreach (ActiontemplatePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ActiontemplatePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ActionTemplate
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
        $cls = ActiontemplatePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ActiontemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ActiontemplatePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActiontemplatePeer::addInstanceToPool($obj, $key);
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
     * @return array (Actiontemplate object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ActiontemplatePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ActiontemplatePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ActiontemplatePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActiontemplatePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ActiontemplatePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ActiontemplatePeer::DATABASE_NAME)->getTable(ActiontemplatePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseActiontemplatePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseActiontemplatePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ActiontemplateTableMap());
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
        return ActiontemplatePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Actiontemplate or Criteria object.
     *
     * @param      mixed $values Criteria or Actiontemplate object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Actiontemplate object
        }

        if ($criteria->containsKey(ActiontemplatePeer::ID) && $criteria->keyContainsValue(ActiontemplatePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActiontemplatePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ActiontemplatePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Actiontemplate or Criteria object.
     *
     * @param      mixed $values Criteria or Actiontemplate object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ActiontemplatePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ActiontemplatePeer::ID);
            $value = $criteria->remove(ActiontemplatePeer::ID);
            if ($value) {
                $selectCriteria->add(ActiontemplatePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ActiontemplatePeer::TABLE_NAME);
            }

        } else { // $values is Actiontemplate object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ActiontemplatePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ActionTemplate table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ActiontemplatePeer::TABLE_NAME, $con, ActiontemplatePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActiontemplatePeer::clearInstancePool();
            ActiontemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Actiontemplate or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Actiontemplate object or primary key or array of primary keys
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
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ActiontemplatePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Actiontemplate) { // it's a model object
            // invalidate the cache for this single object
            ActiontemplatePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActiontemplatePeer::DATABASE_NAME);
            $criteria->add(ActiontemplatePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ActiontemplatePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ActiontemplatePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ActiontemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Actiontemplate object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Actiontemplate $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ActiontemplatePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ActiontemplatePeer::TABLE_NAME);

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

        return BasePeer::doValidate(ActiontemplatePeer::DATABASE_NAME, ActiontemplatePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Actiontemplate
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ActiontemplatePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ActiontemplatePeer::DATABASE_NAME);
        $criteria->add(ActiontemplatePeer::ID, $pk);

        $v = ActiontemplatePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Actiontemplate[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ActiontemplatePeer::DATABASE_NAME);
            $criteria->add(ActiontemplatePeer::ID, $pks, Criteria::IN);
            $objs = ActiontemplatePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseActiontemplatePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseActiontemplatePeer::buildTableMap();

