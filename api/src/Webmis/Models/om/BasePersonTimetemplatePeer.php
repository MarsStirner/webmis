<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\PersonPeer;
use Webmis\Models\PersonTimetemplate;
use Webmis\Models\PersonTimetemplatePeer;
use Webmis\Models\map\PersonTimetemplateTableMap;

/**
 * Base static class for performing query and update operations on the 'Person_TimeTemplate' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BasePersonTimetemplatePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Person_TimeTemplate';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\PersonTimetemplate';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PersonTimetemplateTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 22;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 22;

    /** the column name for the id field */
    const ID = 'Person_TimeTemplate.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Person_TimeTemplate.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Person_TimeTemplate.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Person_TimeTemplate.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Person_TimeTemplate.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Person_TimeTemplate.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'Person_TimeTemplate.master_id';

    /** the column name for the idx field */
    const IDX = 'Person_TimeTemplate.idx';

    /** the column name for the ambBegTime field */
    const AMBBEGTIME = 'Person_TimeTemplate.ambBegTime';

    /** the column name for the ambEndTime field */
    const AMBENDTIME = 'Person_TimeTemplate.ambEndTime';

    /** the column name for the ambPlan field */
    const AMBPLAN = 'Person_TimeTemplate.ambPlan';

    /** the column name for the office field */
    const OFFICE = 'Person_TimeTemplate.office';

    /** the column name for the ambBegTime2 field */
    const AMBBEGTIME2 = 'Person_TimeTemplate.ambBegTime2';

    /** the column name for the ambEndTime2 field */
    const AMBENDTIME2 = 'Person_TimeTemplate.ambEndTime2';

    /** the column name for the ambPlan2 field */
    const AMBPLAN2 = 'Person_TimeTemplate.ambPlan2';

    /** the column name for the office2 field */
    const OFFICE2 = 'Person_TimeTemplate.office2';

    /** the column name for the homBegTime field */
    const HOMBEGTIME = 'Person_TimeTemplate.homBegTime';

    /** the column name for the homEndTime field */
    const HOMENDTIME = 'Person_TimeTemplate.homEndTime';

    /** the column name for the homPlan field */
    const HOMPLAN = 'Person_TimeTemplate.homPlan';

    /** the column name for the homBegTime2 field */
    const HOMBEGTIME2 = 'Person_TimeTemplate.homBegTime2';

    /** the column name for the homEndTime2 field */
    const HOMENDTIME2 = 'Person_TimeTemplate.homEndTime2';

    /** the column name for the homPlan2 field */
    const HOMPLAN2 = 'Person_TimeTemplate.homPlan2';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of PersonTimetemplate objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PersonTimetemplate[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PersonTimetemplatePeer::$fieldNames[PersonTimetemplatePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'MasterId', 'Idx', 'Ambbegtime', 'Ambendtime', 'Ambplan', 'Office', 'Ambbegtime2', 'Ambendtime2', 'Ambplan2', 'Office2', 'Hombegtime', 'Homendtime', 'Homplan', 'Hombegtime2', 'Homendtime2', 'Homplan2', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'masterId', 'idx', 'ambbegtime', 'ambendtime', 'ambplan', 'office', 'ambbegtime2', 'ambendtime2', 'ambplan2', 'office2', 'hombegtime', 'homendtime', 'homplan', 'hombegtime2', 'homendtime2', 'homplan2', ),
        BasePeer::TYPE_COLNAME => array (PersonTimetemplatePeer::ID, PersonTimetemplatePeer::CREATEDATETIME, PersonTimetemplatePeer::CREATEPERSON_ID, PersonTimetemplatePeer::MODIFYDATETIME, PersonTimetemplatePeer::MODIFYPERSON_ID, PersonTimetemplatePeer::DELETED, PersonTimetemplatePeer::MASTER_ID, PersonTimetemplatePeer::IDX, PersonTimetemplatePeer::AMBBEGTIME, PersonTimetemplatePeer::AMBENDTIME, PersonTimetemplatePeer::AMBPLAN, PersonTimetemplatePeer::OFFICE, PersonTimetemplatePeer::AMBBEGTIME2, PersonTimetemplatePeer::AMBENDTIME2, PersonTimetemplatePeer::AMBPLAN2, PersonTimetemplatePeer::OFFICE2, PersonTimetemplatePeer::HOMBEGTIME, PersonTimetemplatePeer::HOMENDTIME, PersonTimetemplatePeer::HOMPLAN, PersonTimetemplatePeer::HOMBEGTIME2, PersonTimetemplatePeer::HOMENDTIME2, PersonTimetemplatePeer::HOMPLAN2, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'MASTER_ID', 'IDX', 'AMBBEGTIME', 'AMBENDTIME', 'AMBPLAN', 'OFFICE', 'AMBBEGTIME2', 'AMBENDTIME2', 'AMBPLAN2', 'OFFICE2', 'HOMBEGTIME', 'HOMENDTIME', 'HOMPLAN', 'HOMBEGTIME2', 'HOMENDTIME2', 'HOMPLAN2', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'master_id', 'idx', 'ambBegTime', 'ambEndTime', 'ambPlan', 'office', 'ambBegTime2', 'ambEndTime2', 'ambPlan2', 'office2', 'homBegTime', 'homEndTime', 'homPlan', 'homBegTime2', 'homEndTime2', 'homPlan2', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PersonTimetemplatePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'MasterId' => 6, 'Idx' => 7, 'Ambbegtime' => 8, 'Ambendtime' => 9, 'Ambplan' => 10, 'Office' => 11, 'Ambbegtime2' => 12, 'Ambendtime2' => 13, 'Ambplan2' => 14, 'Office2' => 15, 'Hombegtime' => 16, 'Homendtime' => 17, 'Homplan' => 18, 'Hombegtime2' => 19, 'Homendtime2' => 20, 'Homplan2' => 21, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'masterId' => 6, 'idx' => 7, 'ambbegtime' => 8, 'ambendtime' => 9, 'ambplan' => 10, 'office' => 11, 'ambbegtime2' => 12, 'ambendtime2' => 13, 'ambplan2' => 14, 'office2' => 15, 'hombegtime' => 16, 'homendtime' => 17, 'homplan' => 18, 'hombegtime2' => 19, 'homendtime2' => 20, 'homplan2' => 21, ),
        BasePeer::TYPE_COLNAME => array (PersonTimetemplatePeer::ID => 0, PersonTimetemplatePeer::CREATEDATETIME => 1, PersonTimetemplatePeer::CREATEPERSON_ID => 2, PersonTimetemplatePeer::MODIFYDATETIME => 3, PersonTimetemplatePeer::MODIFYPERSON_ID => 4, PersonTimetemplatePeer::DELETED => 5, PersonTimetemplatePeer::MASTER_ID => 6, PersonTimetemplatePeer::IDX => 7, PersonTimetemplatePeer::AMBBEGTIME => 8, PersonTimetemplatePeer::AMBENDTIME => 9, PersonTimetemplatePeer::AMBPLAN => 10, PersonTimetemplatePeer::OFFICE => 11, PersonTimetemplatePeer::AMBBEGTIME2 => 12, PersonTimetemplatePeer::AMBENDTIME2 => 13, PersonTimetemplatePeer::AMBPLAN2 => 14, PersonTimetemplatePeer::OFFICE2 => 15, PersonTimetemplatePeer::HOMBEGTIME => 16, PersonTimetemplatePeer::HOMENDTIME => 17, PersonTimetemplatePeer::HOMPLAN => 18, PersonTimetemplatePeer::HOMBEGTIME2 => 19, PersonTimetemplatePeer::HOMENDTIME2 => 20, PersonTimetemplatePeer::HOMPLAN2 => 21, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'MASTER_ID' => 6, 'IDX' => 7, 'AMBBEGTIME' => 8, 'AMBENDTIME' => 9, 'AMBPLAN' => 10, 'OFFICE' => 11, 'AMBBEGTIME2' => 12, 'AMBENDTIME2' => 13, 'AMBPLAN2' => 14, 'OFFICE2' => 15, 'HOMBEGTIME' => 16, 'HOMENDTIME' => 17, 'HOMPLAN' => 18, 'HOMBEGTIME2' => 19, 'HOMENDTIME2' => 20, 'HOMPLAN2' => 21, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'master_id' => 6, 'idx' => 7, 'ambBegTime' => 8, 'ambEndTime' => 9, 'ambPlan' => 10, 'office' => 11, 'ambBegTime2' => 12, 'ambEndTime2' => 13, 'ambPlan2' => 14, 'office2' => 15, 'homBegTime' => 16, 'homEndTime' => 17, 'homPlan' => 18, 'homBegTime2' => 19, 'homEndTime2' => 20, 'homPlan2' => 21, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $toNames = PersonTimetemplatePeer::getFieldNames($toType);
        $key = isset(PersonTimetemplatePeer::$fieldKeys[$fromType][$name]) ? PersonTimetemplatePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PersonTimetemplatePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PersonTimetemplatePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PersonTimetemplatePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PersonTimetemplatePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PersonTimetemplatePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PersonTimetemplatePeer::ID);
            $criteria->addSelectColumn(PersonTimetemplatePeer::CREATEDATETIME);
            $criteria->addSelectColumn(PersonTimetemplatePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(PersonTimetemplatePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(PersonTimetemplatePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(PersonTimetemplatePeer::DELETED);
            $criteria->addSelectColumn(PersonTimetemplatePeer::MASTER_ID);
            $criteria->addSelectColumn(PersonTimetemplatePeer::IDX);
            $criteria->addSelectColumn(PersonTimetemplatePeer::AMBBEGTIME);
            $criteria->addSelectColumn(PersonTimetemplatePeer::AMBENDTIME);
            $criteria->addSelectColumn(PersonTimetemplatePeer::AMBPLAN);
            $criteria->addSelectColumn(PersonTimetemplatePeer::OFFICE);
            $criteria->addSelectColumn(PersonTimetemplatePeer::AMBBEGTIME2);
            $criteria->addSelectColumn(PersonTimetemplatePeer::AMBENDTIME2);
            $criteria->addSelectColumn(PersonTimetemplatePeer::AMBPLAN2);
            $criteria->addSelectColumn(PersonTimetemplatePeer::OFFICE2);
            $criteria->addSelectColumn(PersonTimetemplatePeer::HOMBEGTIME);
            $criteria->addSelectColumn(PersonTimetemplatePeer::HOMENDTIME);
            $criteria->addSelectColumn(PersonTimetemplatePeer::HOMPLAN);
            $criteria->addSelectColumn(PersonTimetemplatePeer::HOMBEGTIME2);
            $criteria->addSelectColumn(PersonTimetemplatePeer::HOMENDTIME2);
            $criteria->addSelectColumn(PersonTimetemplatePeer::HOMPLAN2);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.master_id');
            $criteria->addSelectColumn($alias . '.idx');
            $criteria->addSelectColumn($alias . '.ambBegTime');
            $criteria->addSelectColumn($alias . '.ambEndTime');
            $criteria->addSelectColumn($alias . '.ambPlan');
            $criteria->addSelectColumn($alias . '.office');
            $criteria->addSelectColumn($alias . '.ambBegTime2');
            $criteria->addSelectColumn($alias . '.ambEndTime2');
            $criteria->addSelectColumn($alias . '.ambPlan2');
            $criteria->addSelectColumn($alias . '.office2');
            $criteria->addSelectColumn($alias . '.homBegTime');
            $criteria->addSelectColumn($alias . '.homEndTime');
            $criteria->addSelectColumn($alias . '.homPlan');
            $criteria->addSelectColumn($alias . '.homBegTime2');
            $criteria->addSelectColumn($alias . '.homEndTime2');
            $criteria->addSelectColumn($alias . '.homPlan2');
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
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PersonTimetemplate
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PersonTimetemplatePeer::doSelect($critcopy, $con);
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
        return PersonTimetemplatePeer::populateObjects(PersonTimetemplatePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

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
     * @param      PersonTimetemplate $obj A PersonTimetemplate object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            PersonTimetemplatePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A PersonTimetemplate object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PersonTimetemplate) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PersonTimetemplate object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PersonTimetemplatePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   PersonTimetemplate Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PersonTimetemplatePeer::$instances[$key])) {
                return PersonTimetemplatePeer::$instances[$key];
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
        foreach (PersonTimetemplatePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PersonTimetemplatePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Person_TimeTemplate
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
        $cls = PersonTimetemplatePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PersonTimetemplatePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PersonTimetemplatePeer::addInstanceToPool($obj, $key);
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
     * @return array (PersonTimetemplate object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PersonTimetemplatePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PersonTimetemplatePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PersonTimetemplatePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related PersonRelatedByCreatepersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedByCreatepersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PersonTimetemplatePeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByMasterId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedByMasterId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PersonTimetemplatePeer::MASTER_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByModifypersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPersonRelatedByModifypersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PersonTimetemplatePeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Selects a collection of PersonTimetemplate objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByCreatepersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(PersonTimetemplatePeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PersonTimetemplate) to $obj2 (Person)
                $obj2->addPersonTimetemplateRelatedByCreatepersonId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PersonTimetemplate objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByMasterId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(PersonTimetemplatePeer::MASTER_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PersonTimetemplate) to $obj2 (Person)
                $obj2->addPersonTimetemplateRelatedByMasterId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PersonTimetemplate objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPersonRelatedByModifypersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(PersonTimetemplatePeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PersonTimetemplate) to $obj2 (Person)
                $obj2->addPersonTimetemplateRelatedByModifypersonId($obj1);

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
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PersonTimetemplatePeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(PersonTimetemplatePeer::MASTER_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(PersonTimetemplatePeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Selects a collection of PersonTimetemplate objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol2 = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PersonPeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PersonPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PersonTimetemplatePeer::CREATEPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(PersonTimetemplatePeer::MASTER_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(PersonTimetemplatePeer::MODIFYPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Person rows

            $key2 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PersonPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PersonPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PersonPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (PersonTimetemplate) to the collection in $obj2 (Person)
                $obj2->addPersonTimetemplateRelatedByCreatepersonId($obj1);
            } // if joined row not null

            // Add objects for joined Person rows

            $key3 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PersonPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PersonPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PersonPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (PersonTimetemplate) to the collection in $obj3 (Person)
                $obj3->addPersonTimetemplateRelatedByMasterId($obj1);
            } // if joined row not null

            // Add objects for joined Person rows

            $key4 = PersonPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PersonPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PersonPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PersonPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (PersonTimetemplate) to the collection in $obj4 (Person)
                $obj4->addPersonTimetemplateRelatedByModifypersonId($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PersonRelatedByCreatepersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedByCreatepersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByMasterId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedByMasterId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

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
     * Returns the number of rows matching criteria, joining the related PersonRelatedByModifypersonId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPersonRelatedByModifypersonId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersonTimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

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
     * Selects a collection of PersonTimetemplate objects pre-filled with all related objects except PersonRelatedByCreatepersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedByCreatepersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol2 = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PersonTimetemplate objects pre-filled with all related objects except PersonRelatedByMasterId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedByMasterId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol2 = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PersonTimetemplate objects pre-filled with all related objects except PersonRelatedByModifypersonId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PersonTimetemplate objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPersonRelatedByModifypersonId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);
        }

        PersonTimetemplatePeer::addSelectColumns($criteria);
        $startcol2 = PersonTimetemplatePeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PersonTimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PersonTimetemplatePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PersonTimetemplatePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PersonTimetemplatePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

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
        return Propel::getDatabaseMap(PersonTimetemplatePeer::DATABASE_NAME)->getTable(PersonTimetemplatePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePersonTimetemplatePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePersonTimetemplatePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PersonTimetemplateTableMap());
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
        return PersonTimetemplatePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PersonTimetemplate or Criteria object.
     *
     * @param      mixed $values Criteria or PersonTimetemplate object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PersonTimetemplate object
        }

        if ($criteria->containsKey(PersonTimetemplatePeer::ID) && $criteria->keyContainsValue(PersonTimetemplatePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PersonTimetemplatePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a PersonTimetemplate or Criteria object.
     *
     * @param      mixed $values Criteria or PersonTimetemplate object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PersonTimetemplatePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PersonTimetemplatePeer::ID);
            $value = $criteria->remove(PersonTimetemplatePeer::ID);
            if ($value) {
                $selectCriteria->add(PersonTimetemplatePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PersonTimetemplatePeer::TABLE_NAME);
            }

        } else { // $values is PersonTimetemplate object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Person_TimeTemplate table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PersonTimetemplatePeer::TABLE_NAME, $con, PersonTimetemplatePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonTimetemplatePeer::clearInstancePool();
            PersonTimetemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PersonTimetemplate or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PersonTimetemplate object or primary key or array of primary keys
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
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PersonTimetemplatePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PersonTimetemplate) { // it's a model object
            // invalidate the cache for this single object
            PersonTimetemplatePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PersonTimetemplatePeer::DATABASE_NAME);
            $criteria->add(PersonTimetemplatePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PersonTimetemplatePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PersonTimetemplatePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            PersonTimetemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PersonTimetemplate object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      PersonTimetemplate $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PersonTimetemplatePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PersonTimetemplatePeer::TABLE_NAME);

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

        return BasePeer::doValidate(PersonTimetemplatePeer::DATABASE_NAME, PersonTimetemplatePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PersonTimetemplate
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PersonTimetemplatePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PersonTimetemplatePeer::DATABASE_NAME);
        $criteria->add(PersonTimetemplatePeer::ID, $pk);

        $v = PersonTimetemplatePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PersonTimetemplate[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersonTimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PersonTimetemplatePeer::DATABASE_NAME);
            $criteria->add(PersonTimetemplatePeer::ID, $pks, Criteria::IN);
            $objs = PersonTimetemplatePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePersonTimetemplatePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePersonTimetemplatePeer::buildTableMap();

