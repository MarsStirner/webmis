<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\ClientPeer;
use Webmis\Models\ClientfdpropertyPeer;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\ClientflatdirectoryPeer;
use Webmis\Models\FdrecordPeer;
use Webmis\Models\map\ClientflatdirectoryTableMap;

/**
 * Base static class for performing query and update operations on the 'ClientFlatDirectory' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseClientflatdirectoryPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ClientFlatDirectory';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Clientflatdirectory';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ClientflatdirectoryTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the id field */
    const ID = 'ClientFlatDirectory.id';

    /** the column name for the clientFDProperty_id field */
    const CLIENTFDPROPERTY_ID = 'ClientFlatDirectory.clientFDProperty_id';

    /** the column name for the fdRecord_id field */
    const FDRECORD_ID = 'ClientFlatDirectory.fdRecord_id';

    /** the column name for the dateStart field */
    const DATESTART = 'ClientFlatDirectory.dateStart';

    /** the column name for the dateEnd field */
    const DATEEND = 'ClientFlatDirectory.dateEnd';

    /** the column name for the createDateTime field */
    const CREATEDATETIME = 'ClientFlatDirectory.createDateTime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'ClientFlatDirectory.createPerson_id';

    /** the column name for the modifyDateTime field */
    const MODIFYDATETIME = 'ClientFlatDirectory.modifyDateTime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'ClientFlatDirectory.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'ClientFlatDirectory.deleted';

    /** the column name for the client_id field */
    const CLIENT_ID = 'ClientFlatDirectory.client_id';

    /** the column name for the comment field */
    const COMMENT = 'ClientFlatDirectory.comment';

    /** the column name for the version field */
    const VERSION = 'ClientFlatDirectory.version';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Clientflatdirectory objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Clientflatdirectory[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ClientflatdirectoryPeer::$fieldNames[ClientflatdirectoryPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'ClientfdpropertyId', 'FdrecordId', 'Datestart', 'Dateend', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'ClientId', 'Comment', 'Version', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'clientfdpropertyId', 'fdrecordId', 'datestart', 'dateend', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'clientId', 'comment', 'version', ),
        BasePeer::TYPE_COLNAME => array (ClientflatdirectoryPeer::ID, ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientflatdirectoryPeer::FDRECORD_ID, ClientflatdirectoryPeer::DATESTART, ClientflatdirectoryPeer::DATEEND, ClientflatdirectoryPeer::CREATEDATETIME, ClientflatdirectoryPeer::CREATEPERSON_ID, ClientflatdirectoryPeer::MODIFYDATETIME, ClientflatdirectoryPeer::MODIFYPERSON_ID, ClientflatdirectoryPeer::DELETED, ClientflatdirectoryPeer::CLIENT_ID, ClientflatdirectoryPeer::COMMENT, ClientflatdirectoryPeer::VERSION, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CLIENTFDPROPERTY_ID', 'FDRECORD_ID', 'DATESTART', 'DATEEND', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'CLIENT_ID', 'COMMENT', 'VERSION', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'clientFDProperty_id', 'fdRecord_id', 'dateStart', 'dateEnd', 'createDateTime', 'createPerson_id', 'modifyDateTime', 'modifyPerson_id', 'deleted', 'client_id', 'comment', 'version', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ClientflatdirectoryPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ClientfdpropertyId' => 1, 'FdrecordId' => 2, 'Datestart' => 3, 'Dateend' => 4, 'Createdatetime' => 5, 'CreatepersonId' => 6, 'Modifydatetime' => 7, 'ModifypersonId' => 8, 'Deleted' => 9, 'ClientId' => 10, 'Comment' => 11, 'Version' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'clientfdpropertyId' => 1, 'fdrecordId' => 2, 'datestart' => 3, 'dateend' => 4, 'createdatetime' => 5, 'createpersonId' => 6, 'modifydatetime' => 7, 'modifypersonId' => 8, 'deleted' => 9, 'clientId' => 10, 'comment' => 11, 'version' => 12, ),
        BasePeer::TYPE_COLNAME => array (ClientflatdirectoryPeer::ID => 0, ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID => 1, ClientflatdirectoryPeer::FDRECORD_ID => 2, ClientflatdirectoryPeer::DATESTART => 3, ClientflatdirectoryPeer::DATEEND => 4, ClientflatdirectoryPeer::CREATEDATETIME => 5, ClientflatdirectoryPeer::CREATEPERSON_ID => 6, ClientflatdirectoryPeer::MODIFYDATETIME => 7, ClientflatdirectoryPeer::MODIFYPERSON_ID => 8, ClientflatdirectoryPeer::DELETED => 9, ClientflatdirectoryPeer::CLIENT_ID => 10, ClientflatdirectoryPeer::COMMENT => 11, ClientflatdirectoryPeer::VERSION => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CLIENTFDPROPERTY_ID' => 1, 'FDRECORD_ID' => 2, 'DATESTART' => 3, 'DATEEND' => 4, 'CREATEDATETIME' => 5, 'CREATEPERSON_ID' => 6, 'MODIFYDATETIME' => 7, 'MODIFYPERSON_ID' => 8, 'DELETED' => 9, 'CLIENT_ID' => 10, 'COMMENT' => 11, 'VERSION' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'clientFDProperty_id' => 1, 'fdRecord_id' => 2, 'dateStart' => 3, 'dateEnd' => 4, 'createDateTime' => 5, 'createPerson_id' => 6, 'modifyDateTime' => 7, 'modifyPerson_id' => 8, 'deleted' => 9, 'client_id' => 10, 'comment' => 11, 'version' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = ClientflatdirectoryPeer::getFieldNames($toType);
        $key = isset(ClientflatdirectoryPeer::$fieldKeys[$fromType][$name]) ? ClientflatdirectoryPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ClientflatdirectoryPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ClientflatdirectoryPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ClientflatdirectoryPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ClientflatdirectoryPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ClientflatdirectoryPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ClientflatdirectoryPeer::ID);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::FDRECORD_ID);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::DATESTART);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::DATEEND);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::CREATEDATETIME);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::DELETED);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::CLIENT_ID);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::COMMENT);
            $criteria->addSelectColumn(ClientflatdirectoryPeer::VERSION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.clientFDProperty_id');
            $criteria->addSelectColumn($alias . '.fdRecord_id');
            $criteria->addSelectColumn($alias . '.dateStart');
            $criteria->addSelectColumn($alias . '.dateEnd');
            $criteria->addSelectColumn($alias . '.createDateTime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDateTime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.version');
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
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientflatdirectory
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ClientflatdirectoryPeer::doSelect($critcopy, $con);
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
        return ClientflatdirectoryPeer::populateObjects(ClientflatdirectoryPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

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
     * @param      Clientflatdirectory $obj A Clientflatdirectory object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ClientflatdirectoryPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Clientflatdirectory object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Clientflatdirectory) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Clientflatdirectory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ClientflatdirectoryPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Clientflatdirectory Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ClientflatdirectoryPeer::$instances[$key])) {
                return ClientflatdirectoryPeer::$instances[$key];
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
        foreach (ClientflatdirectoryPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ClientflatdirectoryPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ClientFlatDirectory
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
        $cls = ClientflatdirectoryPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ClientflatdirectoryPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientflatdirectoryPeer::addInstanceToPool($obj, $key);
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
     * @return array (Clientflatdirectory object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ClientflatdirectoryPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientflatdirectoryPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ClientflatdirectoryPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Client table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinClient(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Clientfdproperty table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinClientfdproperty(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Fdrecord table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinFdrecord(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);

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
     * Selects a collection of Clientflatdirectory objects pre-filled with their Client objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinClient(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;
        ClientPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ClientPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClientPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ClientPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Clientflatdirectory) to $obj2 (Client)
                $obj2->addClientflatdirectory($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Clientflatdirectory objects pre-filled with their Clientfdproperty objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinClientfdproperty(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;
        ClientfdpropertyPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ClientfdpropertyPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ClientfdpropertyPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClientfdpropertyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ClientfdpropertyPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Clientflatdirectory) to $obj2 (Clientfdproperty)
                $obj2->addClientflatdirectory($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Clientflatdirectory objects pre-filled with their Fdrecord objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinFdrecord(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;
        FdrecordPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = FdrecordPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = FdrecordPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = FdrecordPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    FdrecordPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Clientflatdirectory) to $obj2 (Fdrecord)
                $obj2->addClientflatdirectory($obj1);

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
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);

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
     * Selects a collection of Clientflatdirectory objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol2 = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;

        ClientPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClientPeer::NUM_HYDRATE_COLUMNS;

        ClientfdpropertyPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ClientfdpropertyPeer::NUM_HYDRATE_COLUMNS;

        FdrecordPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + FdrecordPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Client rows

            $key2 = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ClientPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClientPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClientPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj2 (Client)
                $obj2->addClientflatdirectory($obj1);
            } // if joined row not null

            // Add objects for joined Clientfdproperty rows

            $key3 = ClientfdpropertyPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ClientfdpropertyPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ClientfdpropertyPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ClientfdpropertyPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj3 (Clientfdproperty)
                $obj3->addClientflatdirectory($obj1);
            } // if joined row not null

            // Add objects for joined Fdrecord rows

            $key4 = FdrecordPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = FdrecordPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = FdrecordPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    FdrecordPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj4 (Fdrecord)
                $obj4->addClientflatdirectory($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Client table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptClient(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Clientfdproperty table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptClientfdproperty(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Fdrecord table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptFdrecord(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientflatdirectoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

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
     * Selects a collection of Clientflatdirectory objects pre-filled with all related objects except Client.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptClient(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol2 = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;

        ClientfdpropertyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClientfdpropertyPeer::NUM_HYDRATE_COLUMNS;

        FdrecordPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FdrecordPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Clientfdproperty rows

                $key2 = ClientfdpropertyPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClientfdpropertyPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ClientfdpropertyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClientfdpropertyPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj2 (Clientfdproperty)
                $obj2->addClientflatdirectory($obj1);

            } // if joined row is not null

                // Add objects for joined Fdrecord rows

                $key3 = FdrecordPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FdrecordPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = FdrecordPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FdrecordPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj3 (Fdrecord)
                $obj3->addClientflatdirectory($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Clientflatdirectory objects pre-filled with all related objects except Clientfdproperty.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptClientfdproperty(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol2 = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;

        ClientPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClientPeer::NUM_HYDRATE_COLUMNS;

        FdrecordPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FdrecordPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::FDRECORD_ID, FdrecordPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Client rows

                $key2 = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClientPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ClientPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClientPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj2 (Client)
                $obj2->addClientflatdirectory($obj1);

            } // if joined row is not null

                // Add objects for joined Fdrecord rows

                $key3 = FdrecordPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FdrecordPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = FdrecordPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FdrecordPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj3 (Fdrecord)
                $obj3->addClientflatdirectory($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Clientflatdirectory objects pre-filled with all related objects except Fdrecord.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientflatdirectory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptFdrecord(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);
        }

        ClientflatdirectoryPeer::addSelectColumns($criteria);
        $startcol2 = ClientflatdirectoryPeer::NUM_HYDRATE_COLUMNS;

        ClientPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClientPeer::NUM_HYDRATE_COLUMNS;

        ClientfdpropertyPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ClientfdpropertyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENT_ID, ClientPeer::ID, $join_behavior);

        $criteria->addJoin(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, ClientfdpropertyPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientflatdirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientflatdirectoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientflatdirectoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientflatdirectoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Client rows

                $key2 = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClientPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ClientPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClientPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj2 (Client)
                $obj2->addClientflatdirectory($obj1);

            } // if joined row is not null

                // Add objects for joined Clientfdproperty rows

                $key3 = ClientfdpropertyPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ClientfdpropertyPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ClientfdpropertyPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ClientfdpropertyPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Clientflatdirectory) to the collection in $obj3 (Clientfdproperty)
                $obj3->addClientflatdirectory($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(ClientflatdirectoryPeer::DATABASE_NAME)->getTable(ClientflatdirectoryPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseClientflatdirectoryPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseClientflatdirectoryPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ClientflatdirectoryTableMap());
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
        return ClientflatdirectoryPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Clientflatdirectory or Criteria object.
     *
     * @param      mixed $values Criteria or Clientflatdirectory object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Clientflatdirectory object
        }

        if ($criteria->containsKey(ClientflatdirectoryPeer::ID) && $criteria->keyContainsValue(ClientflatdirectoryPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientflatdirectoryPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Clientflatdirectory or Criteria object.
     *
     * @param      mixed $values Criteria or Clientflatdirectory object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ClientflatdirectoryPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ClientflatdirectoryPeer::ID);
            $value = $criteria->remove(ClientflatdirectoryPeer::ID);
            if ($value) {
                $selectCriteria->add(ClientflatdirectoryPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ClientflatdirectoryPeer::TABLE_NAME);
            }

        } else { // $values is Clientflatdirectory object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ClientFlatDirectory table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ClientflatdirectoryPeer::TABLE_NAME, $con, ClientflatdirectoryPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientflatdirectoryPeer::clearInstancePool();
            ClientflatdirectoryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Clientflatdirectory or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Clientflatdirectory object or primary key or array of primary keys
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
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ClientflatdirectoryPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Clientflatdirectory) { // it's a model object
            // invalidate the cache for this single object
            ClientflatdirectoryPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientflatdirectoryPeer::DATABASE_NAME);
            $criteria->add(ClientflatdirectoryPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ClientflatdirectoryPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ClientflatdirectoryPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ClientflatdirectoryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Clientflatdirectory object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Clientflatdirectory $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ClientflatdirectoryPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ClientflatdirectoryPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ClientflatdirectoryPeer::DATABASE_NAME, ClientflatdirectoryPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Clientflatdirectory
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ClientflatdirectoryPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ClientflatdirectoryPeer::DATABASE_NAME);
        $criteria->add(ClientflatdirectoryPeer::ID, $pk);

        $v = ClientflatdirectoryPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Clientflatdirectory[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ClientflatdirectoryPeer::DATABASE_NAME);
            $criteria->add(ClientflatdirectoryPeer::ID, $pks, Criteria::IN);
            $objs = ClientflatdirectoryPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseClientflatdirectoryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClientflatdirectoryPeer::buildTableMap();

