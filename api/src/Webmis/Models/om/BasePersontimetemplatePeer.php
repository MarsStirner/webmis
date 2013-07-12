<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Persontimetemplate;
use Webmis\Models\PersontimetemplatePeer;
use Webmis\Models\map\PersontimetemplateTableMap;

/**
 * Base static class for performing query and update operations on the 'PersonTimeTemplate' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BasePersontimetemplatePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'PersonTimeTemplate';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Persontimetemplate';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PersontimetemplateTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 22;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 22;

    /** the column name for the id field */
    const ID = 'PersonTimeTemplate.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'PersonTimeTemplate.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'PersonTimeTemplate.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'PersonTimeTemplate.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'PersonTimeTemplate.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'PersonTimeTemplate.deleted';

    /** the column name for the master_id field */
    const MASTER_ID = 'PersonTimeTemplate.master_id';

    /** the column name for the idx field */
    const IDX = 'PersonTimeTemplate.idx';

    /** the column name for the ambBegTime field */
    const AMBBEGTIME = 'PersonTimeTemplate.ambBegTime';

    /** the column name for the ambEndTime field */
    const AMBENDTIME = 'PersonTimeTemplate.ambEndTime';

    /** the column name for the ambPlan field */
    const AMBPLAN = 'PersonTimeTemplate.ambPlan';

    /** the column name for the office field */
    const OFFICE = 'PersonTimeTemplate.office';

    /** the column name for the ambBegTime2 field */
    const AMBBEGTIME2 = 'PersonTimeTemplate.ambBegTime2';

    /** the column name for the ambEndTime2 field */
    const AMBENDTIME2 = 'PersonTimeTemplate.ambEndTime2';

    /** the column name for the ambPlan2 field */
    const AMBPLAN2 = 'PersonTimeTemplate.ambPlan2';

    /** the column name for the office2 field */
    const OFFICE2 = 'PersonTimeTemplate.office2';

    /** the column name for the homBegTime field */
    const HOMBEGTIME = 'PersonTimeTemplate.homBegTime';

    /** the column name for the homEndTime field */
    const HOMENDTIME = 'PersonTimeTemplate.homEndTime';

    /** the column name for the homPlan field */
    const HOMPLAN = 'PersonTimeTemplate.homPlan';

    /** the column name for the homBegTime2 field */
    const HOMBEGTIME2 = 'PersonTimeTemplate.homBegTime2';

    /** the column name for the homEndTime2 field */
    const HOMENDTIME2 = 'PersonTimeTemplate.homEndTime2';

    /** the column name for the homPlan2 field */
    const HOMPLAN2 = 'PersonTimeTemplate.homPlan2';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Persontimetemplate objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Persontimetemplate[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PersontimetemplatePeer::$fieldNames[PersontimetemplatePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'MasterId', 'Idx', 'Ambbegtime', 'Ambendtime', 'Ambplan', 'Office', 'Ambbegtime2', 'Ambendtime2', 'Ambplan2', 'Office2', 'Hombegtime', 'Homendtime', 'Homplan', 'Hombegtime2', 'Homendtime2', 'Homplan2', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'masterId', 'idx', 'ambbegtime', 'ambendtime', 'ambplan', 'office', 'ambbegtime2', 'ambendtime2', 'ambplan2', 'office2', 'hombegtime', 'homendtime', 'homplan', 'hombegtime2', 'homendtime2', 'homplan2', ),
        BasePeer::TYPE_COLNAME => array (PersontimetemplatePeer::ID, PersontimetemplatePeer::CREATEDATETIME, PersontimetemplatePeer::CREATEPERSON_ID, PersontimetemplatePeer::MODIFYDATETIME, PersontimetemplatePeer::MODIFYPERSON_ID, PersontimetemplatePeer::DELETED, PersontimetemplatePeer::MASTER_ID, PersontimetemplatePeer::IDX, PersontimetemplatePeer::AMBBEGTIME, PersontimetemplatePeer::AMBENDTIME, PersontimetemplatePeer::AMBPLAN, PersontimetemplatePeer::OFFICE, PersontimetemplatePeer::AMBBEGTIME2, PersontimetemplatePeer::AMBENDTIME2, PersontimetemplatePeer::AMBPLAN2, PersontimetemplatePeer::OFFICE2, PersontimetemplatePeer::HOMBEGTIME, PersontimetemplatePeer::HOMENDTIME, PersontimetemplatePeer::HOMPLAN, PersontimetemplatePeer::HOMBEGTIME2, PersontimetemplatePeer::HOMENDTIME2, PersontimetemplatePeer::HOMPLAN2, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'MASTER_ID', 'IDX', 'AMBBEGTIME', 'AMBENDTIME', 'AMBPLAN', 'OFFICE', 'AMBBEGTIME2', 'AMBENDTIME2', 'AMBPLAN2', 'OFFICE2', 'HOMBEGTIME', 'HOMENDTIME', 'HOMPLAN', 'HOMBEGTIME2', 'HOMENDTIME2', 'HOMPLAN2', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'master_id', 'idx', 'ambBegTime', 'ambEndTime', 'ambPlan', 'office', 'ambBegTime2', 'ambEndTime2', 'ambPlan2', 'office2', 'homBegTime', 'homEndTime', 'homPlan', 'homBegTime2', 'homEndTime2', 'homPlan2', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PersontimetemplatePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'MasterId' => 6, 'Idx' => 7, 'Ambbegtime' => 8, 'Ambendtime' => 9, 'Ambplan' => 10, 'Office' => 11, 'Ambbegtime2' => 12, 'Ambendtime2' => 13, 'Ambplan2' => 14, 'Office2' => 15, 'Hombegtime' => 16, 'Homendtime' => 17, 'Homplan' => 18, 'Hombegtime2' => 19, 'Homendtime2' => 20, 'Homplan2' => 21, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'masterId' => 6, 'idx' => 7, 'ambbegtime' => 8, 'ambendtime' => 9, 'ambplan' => 10, 'office' => 11, 'ambbegtime2' => 12, 'ambendtime2' => 13, 'ambplan2' => 14, 'office2' => 15, 'hombegtime' => 16, 'homendtime' => 17, 'homplan' => 18, 'hombegtime2' => 19, 'homendtime2' => 20, 'homplan2' => 21, ),
        BasePeer::TYPE_COLNAME => array (PersontimetemplatePeer::ID => 0, PersontimetemplatePeer::CREATEDATETIME => 1, PersontimetemplatePeer::CREATEPERSON_ID => 2, PersontimetemplatePeer::MODIFYDATETIME => 3, PersontimetemplatePeer::MODIFYPERSON_ID => 4, PersontimetemplatePeer::DELETED => 5, PersontimetemplatePeer::MASTER_ID => 6, PersontimetemplatePeer::IDX => 7, PersontimetemplatePeer::AMBBEGTIME => 8, PersontimetemplatePeer::AMBENDTIME => 9, PersontimetemplatePeer::AMBPLAN => 10, PersontimetemplatePeer::OFFICE => 11, PersontimetemplatePeer::AMBBEGTIME2 => 12, PersontimetemplatePeer::AMBENDTIME2 => 13, PersontimetemplatePeer::AMBPLAN2 => 14, PersontimetemplatePeer::OFFICE2 => 15, PersontimetemplatePeer::HOMBEGTIME => 16, PersontimetemplatePeer::HOMENDTIME => 17, PersontimetemplatePeer::HOMPLAN => 18, PersontimetemplatePeer::HOMBEGTIME2 => 19, PersontimetemplatePeer::HOMENDTIME2 => 20, PersontimetemplatePeer::HOMPLAN2 => 21, ),
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
        $toNames = PersontimetemplatePeer::getFieldNames($toType);
        $key = isset(PersontimetemplatePeer::$fieldKeys[$fromType][$name]) ? PersontimetemplatePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PersontimetemplatePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PersontimetemplatePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PersontimetemplatePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PersontimetemplatePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PersontimetemplatePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PersontimetemplatePeer::ID);
            $criteria->addSelectColumn(PersontimetemplatePeer::CREATEDATETIME);
            $criteria->addSelectColumn(PersontimetemplatePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(PersontimetemplatePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(PersontimetemplatePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(PersontimetemplatePeer::DELETED);
            $criteria->addSelectColumn(PersontimetemplatePeer::MASTER_ID);
            $criteria->addSelectColumn(PersontimetemplatePeer::IDX);
            $criteria->addSelectColumn(PersontimetemplatePeer::AMBBEGTIME);
            $criteria->addSelectColumn(PersontimetemplatePeer::AMBENDTIME);
            $criteria->addSelectColumn(PersontimetemplatePeer::AMBPLAN);
            $criteria->addSelectColumn(PersontimetemplatePeer::OFFICE);
            $criteria->addSelectColumn(PersontimetemplatePeer::AMBBEGTIME2);
            $criteria->addSelectColumn(PersontimetemplatePeer::AMBENDTIME2);
            $criteria->addSelectColumn(PersontimetemplatePeer::AMBPLAN2);
            $criteria->addSelectColumn(PersontimetemplatePeer::OFFICE2);
            $criteria->addSelectColumn(PersontimetemplatePeer::HOMBEGTIME);
            $criteria->addSelectColumn(PersontimetemplatePeer::HOMENDTIME);
            $criteria->addSelectColumn(PersontimetemplatePeer::HOMPLAN);
            $criteria->addSelectColumn(PersontimetemplatePeer::HOMBEGTIME2);
            $criteria->addSelectColumn(PersontimetemplatePeer::HOMENDTIME2);
            $criteria->addSelectColumn(PersontimetemplatePeer::HOMPLAN2);
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
        $criteria->setPrimaryTableName(PersontimetemplatePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PersontimetemplatePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PersontimetemplatePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Persontimetemplate
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PersontimetemplatePeer::doSelect($critcopy, $con);
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
        return PersontimetemplatePeer::populateObjects(PersontimetemplatePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PersontimetemplatePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PersontimetemplatePeer::DATABASE_NAME);

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
     * @param      Persontimetemplate $obj A Persontimetemplate object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            PersontimetemplatePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Persontimetemplate object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Persontimetemplate) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Persontimetemplate object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PersontimetemplatePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Persontimetemplate Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PersontimetemplatePeer::$instances[$key])) {
                return PersontimetemplatePeer::$instances[$key];
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
        foreach (PersontimetemplatePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PersontimetemplatePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to PersonTimeTemplate
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
        $cls = PersontimetemplatePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PersontimetemplatePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PersontimetemplatePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PersontimetemplatePeer::addInstanceToPool($obj, $key);
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
     * @return array (Persontimetemplate object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PersontimetemplatePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PersontimetemplatePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PersontimetemplatePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PersontimetemplatePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PersontimetemplatePeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(PersontimetemplatePeer::DATABASE_NAME)->getTable(PersontimetemplatePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePersontimetemplatePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePersontimetemplatePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PersontimetemplateTableMap());
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
        return PersontimetemplatePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Persontimetemplate or Criteria object.
     *
     * @param      mixed $values Criteria or Persontimetemplate object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Persontimetemplate object
        }

        if ($criteria->containsKey(PersontimetemplatePeer::ID) && $criteria->keyContainsValue(PersontimetemplatePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PersontimetemplatePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(PersontimetemplatePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Persontimetemplate or Criteria object.
     *
     * @param      mixed $values Criteria or Persontimetemplate object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PersontimetemplatePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PersontimetemplatePeer::ID);
            $value = $criteria->remove(PersontimetemplatePeer::ID);
            if ($value) {
                $selectCriteria->add(PersontimetemplatePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PersontimetemplatePeer::TABLE_NAME);
            }

        } else { // $values is Persontimetemplate object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PersontimetemplatePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the PersonTimeTemplate table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PersontimetemplatePeer::TABLE_NAME, $con, PersontimetemplatePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersontimetemplatePeer::clearInstancePool();
            PersontimetemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Persontimetemplate or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Persontimetemplate object or primary key or array of primary keys
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
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PersontimetemplatePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Persontimetemplate) { // it's a model object
            // invalidate the cache for this single object
            PersontimetemplatePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PersontimetemplatePeer::DATABASE_NAME);
            $criteria->add(PersontimetemplatePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PersontimetemplatePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PersontimetemplatePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            PersontimetemplatePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Persontimetemplate object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Persontimetemplate $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PersontimetemplatePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PersontimetemplatePeer::TABLE_NAME);

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

        return BasePeer::doValidate(PersontimetemplatePeer::DATABASE_NAME, PersontimetemplatePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Persontimetemplate
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PersontimetemplatePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PersontimetemplatePeer::DATABASE_NAME);
        $criteria->add(PersontimetemplatePeer::ID, $pk);

        $v = PersontimetemplatePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Persontimetemplate[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PersontimetemplatePeer::DATABASE_NAME);
            $criteria->add(PersontimetemplatePeer::ID, $pks, Criteria::IN);
            $objs = PersontimetemplatePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePersontimetemplatePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePersontimetemplatePeer::buildTableMap();

