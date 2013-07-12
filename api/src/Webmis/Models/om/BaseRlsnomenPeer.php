<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Rlsnomen;
use Webmis\Models\RlsnomenPeer;
use Webmis\Models\map\RlsnomenTableMap;

/**
 * Base static class for performing query and update operations on the 'rlsNomen' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseRlsnomenPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'rlsNomen';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Rlsnomen';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RlsnomenTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the id field */
    const ID = 'rlsNomen.id';

    /** the column name for the code field */
    const CODE = 'rlsNomen.code';

    /** the column name for the tradeName_id field */
    const TRADENAME_ID = 'rlsNomen.tradeName_id';

    /** the column name for the INPName_id field */
    const INPNAME_ID = 'rlsNomen.INPName_id';

    /** the column name for the form_id field */
    const FORM_ID = 'rlsNomen.form_id';

    /** the column name for the dosage_id field */
    const DOSAGE_ID = 'rlsNomen.dosage_id';

    /** the column name for the filling_id field */
    const FILLING_ID = 'rlsNomen.filling_id';

    /** the column name for the packing_id field */
    const PACKING_ID = 'rlsNomen.packing_id';

    /** the column name for the regDate field */
    const REGDATE = 'rlsNomen.regDate';

    /** the column name for the annDate field */
    const ANNDATE = 'rlsNomen.annDate';

    /** the column name for the disabledForPrescription field */
    const DISABLEDFORPRESCRIPTION = 'rlsNomen.disabledForPrescription';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Rlsnomen objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Rlsnomen[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RlsnomenPeer::$fieldNames[RlsnomenPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Code', 'TradenameId', 'InpnameId', 'FormId', 'DosageId', 'FillingId', 'PackingId', 'Regdate', 'Anndate', 'Disabledforprescription', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'code', 'tradenameId', 'inpnameId', 'formId', 'dosageId', 'fillingId', 'packingId', 'regdate', 'anndate', 'disabledforprescription', ),
        BasePeer::TYPE_COLNAME => array (RlsnomenPeer::ID, RlsnomenPeer::CODE, RlsnomenPeer::TRADENAME_ID, RlsnomenPeer::INPNAME_ID, RlsnomenPeer::FORM_ID, RlsnomenPeer::DOSAGE_ID, RlsnomenPeer::FILLING_ID, RlsnomenPeer::PACKING_ID, RlsnomenPeer::REGDATE, RlsnomenPeer::ANNDATE, RlsnomenPeer::DISABLEDFORPRESCRIPTION, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODE', 'TRADENAME_ID', 'INPNAME_ID', 'FORM_ID', 'DOSAGE_ID', 'FILLING_ID', 'PACKING_ID', 'REGDATE', 'ANNDATE', 'DISABLEDFORPRESCRIPTION', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'code', 'tradeName_id', 'INPName_id', 'form_id', 'dosage_id', 'filling_id', 'packing_id', 'regDate', 'annDate', 'disabledForPrescription', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RlsnomenPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Code' => 1, 'TradenameId' => 2, 'InpnameId' => 3, 'FormId' => 4, 'DosageId' => 5, 'FillingId' => 6, 'PackingId' => 7, 'Regdate' => 8, 'Anndate' => 9, 'Disabledforprescription' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'code' => 1, 'tradenameId' => 2, 'inpnameId' => 3, 'formId' => 4, 'dosageId' => 5, 'fillingId' => 6, 'packingId' => 7, 'regdate' => 8, 'anndate' => 9, 'disabledforprescription' => 10, ),
        BasePeer::TYPE_COLNAME => array (RlsnomenPeer::ID => 0, RlsnomenPeer::CODE => 1, RlsnomenPeer::TRADENAME_ID => 2, RlsnomenPeer::INPNAME_ID => 3, RlsnomenPeer::FORM_ID => 4, RlsnomenPeer::DOSAGE_ID => 5, RlsnomenPeer::FILLING_ID => 6, RlsnomenPeer::PACKING_ID => 7, RlsnomenPeer::REGDATE => 8, RlsnomenPeer::ANNDATE => 9, RlsnomenPeer::DISABLEDFORPRESCRIPTION => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODE' => 1, 'TRADENAME_ID' => 2, 'INPNAME_ID' => 3, 'FORM_ID' => 4, 'DOSAGE_ID' => 5, 'FILLING_ID' => 6, 'PACKING_ID' => 7, 'REGDATE' => 8, 'ANNDATE' => 9, 'DISABLEDFORPRESCRIPTION' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'code' => 1, 'tradeName_id' => 2, 'INPName_id' => 3, 'form_id' => 4, 'dosage_id' => 5, 'filling_id' => 6, 'packing_id' => 7, 'regDate' => 8, 'annDate' => 9, 'disabledForPrescription' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $toNames = RlsnomenPeer::getFieldNames($toType);
        $key = isset(RlsnomenPeer::$fieldKeys[$fromType][$name]) ? RlsnomenPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RlsnomenPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RlsnomenPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RlsnomenPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RlsnomenPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RlsnomenPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RlsnomenPeer::ID);
            $criteria->addSelectColumn(RlsnomenPeer::CODE);
            $criteria->addSelectColumn(RlsnomenPeer::TRADENAME_ID);
            $criteria->addSelectColumn(RlsnomenPeer::INPNAME_ID);
            $criteria->addSelectColumn(RlsnomenPeer::FORM_ID);
            $criteria->addSelectColumn(RlsnomenPeer::DOSAGE_ID);
            $criteria->addSelectColumn(RlsnomenPeer::FILLING_ID);
            $criteria->addSelectColumn(RlsnomenPeer::PACKING_ID);
            $criteria->addSelectColumn(RlsnomenPeer::REGDATE);
            $criteria->addSelectColumn(RlsnomenPeer::ANNDATE);
            $criteria->addSelectColumn(RlsnomenPeer::DISABLEDFORPRESCRIPTION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.tradeName_id');
            $criteria->addSelectColumn($alias . '.INPName_id');
            $criteria->addSelectColumn($alias . '.form_id');
            $criteria->addSelectColumn($alias . '.dosage_id');
            $criteria->addSelectColumn($alias . '.filling_id');
            $criteria->addSelectColumn($alias . '.packing_id');
            $criteria->addSelectColumn($alias . '.regDate');
            $criteria->addSelectColumn($alias . '.annDate');
            $criteria->addSelectColumn($alias . '.disabledForPrescription');
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
        $criteria->setPrimaryTableName(RlsnomenPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RlsnomenPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RlsnomenPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rlsnomen
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RlsnomenPeer::doSelect($critcopy, $con);
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
        return RlsnomenPeer::populateObjects(RlsnomenPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RlsnomenPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RlsnomenPeer::DATABASE_NAME);

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
     * @param      Rlsnomen $obj A Rlsnomen object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            RlsnomenPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Rlsnomen object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Rlsnomen) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Rlsnomen object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RlsnomenPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Rlsnomen Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RlsnomenPeer::$instances[$key])) {
                return RlsnomenPeer::$instances[$key];
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
        foreach (RlsnomenPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RlsnomenPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to rlsNomen
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
        $cls = RlsnomenPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RlsnomenPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RlsnomenPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RlsnomenPeer::addInstanceToPool($obj, $key);
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
     * @return array (Rlsnomen object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RlsnomenPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RlsnomenPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RlsnomenPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RlsnomenPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RlsnomenPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(RlsnomenPeer::DATABASE_NAME)->getTable(RlsnomenPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRlsnomenPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRlsnomenPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RlsnomenTableMap());
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
        return RlsnomenPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Rlsnomen or Criteria object.
     *
     * @param      mixed $values Criteria or Rlsnomen object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Rlsnomen object
        }

        if ($criteria->containsKey(RlsnomenPeer::ID) && $criteria->keyContainsValue(RlsnomenPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RlsnomenPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(RlsnomenPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Rlsnomen or Criteria object.
     *
     * @param      mixed $values Criteria or Rlsnomen object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RlsnomenPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RlsnomenPeer::ID);
            $value = $criteria->remove(RlsnomenPeer::ID);
            if ($value) {
                $selectCriteria->add(RlsnomenPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RlsnomenPeer::TABLE_NAME);
            }

        } else { // $values is Rlsnomen object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RlsnomenPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rlsNomen table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RlsnomenPeer::TABLE_NAME, $con, RlsnomenPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RlsnomenPeer::clearInstancePool();
            RlsnomenPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Rlsnomen or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Rlsnomen object or primary key or array of primary keys
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
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RlsnomenPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Rlsnomen) { // it's a model object
            // invalidate the cache for this single object
            RlsnomenPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RlsnomenPeer::DATABASE_NAME);
            $criteria->add(RlsnomenPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RlsnomenPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RlsnomenPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            RlsnomenPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Rlsnomen object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Rlsnomen $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RlsnomenPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RlsnomenPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RlsnomenPeer::DATABASE_NAME, RlsnomenPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Rlsnomen
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RlsnomenPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RlsnomenPeer::DATABASE_NAME);
        $criteria->add(RlsnomenPeer::ID, $pk);

        $v = RlsnomenPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Rlsnomen[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RlsnomenPeer::DATABASE_NAME);
            $criteria->add(RlsnomenPeer::ID, $pks, Criteria::IN);
            $objs = RlsnomenPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRlsnomenPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRlsnomenPeer::buildTableMap();

