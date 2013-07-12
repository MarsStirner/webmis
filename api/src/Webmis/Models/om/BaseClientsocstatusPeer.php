<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Clientsocstatus;
use Webmis\Models\ClientsocstatusPeer;
use Webmis\Models\map\ClientsocstatusTableMap;

/**
 * Base static class for performing query and update operations on the 'ClientSocStatus' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseClientsocstatusPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ClientSocStatus';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Clientsocstatus';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ClientsocstatusTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the id field */
    const ID = 'ClientSocStatus.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'ClientSocStatus.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'ClientSocStatus.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'ClientSocStatus.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'ClientSocStatus.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'ClientSocStatus.deleted';

    /** the column name for the client_id field */
    const CLIENT_ID = 'ClientSocStatus.client_id';

    /** the column name for the socStatusClass_id field */
    const SOCSTATUSCLASS_ID = 'ClientSocStatus.socStatusClass_id';

    /** the column name for the socStatusType_id field */
    const SOCSTATUSTYPE_ID = 'ClientSocStatus.socStatusType_id';

    /** the column name for the begDate field */
    const BEGDATE = 'ClientSocStatus.begDate';

    /** the column name for the endDate field */
    const ENDDATE = 'ClientSocStatus.endDate';

    /** the column name for the document_id field */
    const DOCUMENT_ID = 'ClientSocStatus.document_id';

    /** the column name for the version field */
    const VERSION = 'ClientSocStatus.version';

    /** the column name for the note field */
    const NOTE = 'ClientSocStatus.note';

    /** the column name for the benefitCategory_id field */
    const BENEFITCATEGORY_ID = 'ClientSocStatus.benefitCategory_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Clientsocstatus objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Clientsocstatus[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ClientsocstatusPeer::$fieldNames[ClientsocstatusPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'ClientId', 'SocstatusclassId', 'SocstatustypeId', 'Begdate', 'Enddate', 'DocumentId', 'Version', 'Note', 'BenefitcategoryId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'clientId', 'socstatusclassId', 'socstatustypeId', 'begdate', 'enddate', 'documentId', 'version', 'note', 'benefitcategoryId', ),
        BasePeer::TYPE_COLNAME => array (ClientsocstatusPeer::ID, ClientsocstatusPeer::CREATEDATETIME, ClientsocstatusPeer::CREATEPERSON_ID, ClientsocstatusPeer::MODIFYDATETIME, ClientsocstatusPeer::MODIFYPERSON_ID, ClientsocstatusPeer::DELETED, ClientsocstatusPeer::CLIENT_ID, ClientsocstatusPeer::SOCSTATUSCLASS_ID, ClientsocstatusPeer::SOCSTATUSTYPE_ID, ClientsocstatusPeer::BEGDATE, ClientsocstatusPeer::ENDDATE, ClientsocstatusPeer::DOCUMENT_ID, ClientsocstatusPeer::VERSION, ClientsocstatusPeer::NOTE, ClientsocstatusPeer::BENEFITCATEGORY_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'CLIENT_ID', 'SOCSTATUSCLASS_ID', 'SOCSTATUSTYPE_ID', 'BEGDATE', 'ENDDATE', 'DOCUMENT_ID', 'VERSION', 'NOTE', 'BENEFITCATEGORY_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'client_id', 'socStatusClass_id', 'socStatusType_id', 'begDate', 'endDate', 'document_id', 'version', 'note', 'benefitCategory_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ClientsocstatusPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'ClientId' => 6, 'SocstatusclassId' => 7, 'SocstatustypeId' => 8, 'Begdate' => 9, 'Enddate' => 10, 'DocumentId' => 11, 'Version' => 12, 'Note' => 13, 'BenefitcategoryId' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'clientId' => 6, 'socstatusclassId' => 7, 'socstatustypeId' => 8, 'begdate' => 9, 'enddate' => 10, 'documentId' => 11, 'version' => 12, 'note' => 13, 'benefitcategoryId' => 14, ),
        BasePeer::TYPE_COLNAME => array (ClientsocstatusPeer::ID => 0, ClientsocstatusPeer::CREATEDATETIME => 1, ClientsocstatusPeer::CREATEPERSON_ID => 2, ClientsocstatusPeer::MODIFYDATETIME => 3, ClientsocstatusPeer::MODIFYPERSON_ID => 4, ClientsocstatusPeer::DELETED => 5, ClientsocstatusPeer::CLIENT_ID => 6, ClientsocstatusPeer::SOCSTATUSCLASS_ID => 7, ClientsocstatusPeer::SOCSTATUSTYPE_ID => 8, ClientsocstatusPeer::BEGDATE => 9, ClientsocstatusPeer::ENDDATE => 10, ClientsocstatusPeer::DOCUMENT_ID => 11, ClientsocstatusPeer::VERSION => 12, ClientsocstatusPeer::NOTE => 13, ClientsocstatusPeer::BENEFITCATEGORY_ID => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'CLIENT_ID' => 6, 'SOCSTATUSCLASS_ID' => 7, 'SOCSTATUSTYPE_ID' => 8, 'BEGDATE' => 9, 'ENDDATE' => 10, 'DOCUMENT_ID' => 11, 'VERSION' => 12, 'NOTE' => 13, 'BENEFITCATEGORY_ID' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'client_id' => 6, 'socStatusClass_id' => 7, 'socStatusType_id' => 8, 'begDate' => 9, 'endDate' => 10, 'document_id' => 11, 'version' => 12, 'note' => 13, 'benefitCategory_id' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = ClientsocstatusPeer::getFieldNames($toType);
        $key = isset(ClientsocstatusPeer::$fieldKeys[$fromType][$name]) ? ClientsocstatusPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ClientsocstatusPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ClientsocstatusPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ClientsocstatusPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ClientsocstatusPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ClientsocstatusPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ClientsocstatusPeer::ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::CREATEDATETIME);
            $criteria->addSelectColumn(ClientsocstatusPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(ClientsocstatusPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::DELETED);
            $criteria->addSelectColumn(ClientsocstatusPeer::CLIENT_ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::SOCSTATUSCLASS_ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::SOCSTATUSTYPE_ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::BEGDATE);
            $criteria->addSelectColumn(ClientsocstatusPeer::ENDDATE);
            $criteria->addSelectColumn(ClientsocstatusPeer::DOCUMENT_ID);
            $criteria->addSelectColumn(ClientsocstatusPeer::VERSION);
            $criteria->addSelectColumn(ClientsocstatusPeer::NOTE);
            $criteria->addSelectColumn(ClientsocstatusPeer::BENEFITCATEGORY_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.socStatusClass_id');
            $criteria->addSelectColumn($alias . '.socStatusType_id');
            $criteria->addSelectColumn($alias . '.begDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.document_id');
            $criteria->addSelectColumn($alias . '.version');
            $criteria->addSelectColumn($alias . '.note');
            $criteria->addSelectColumn($alias . '.benefitCategory_id');
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
        $criteria->setPrimaryTableName(ClientsocstatusPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientsocstatusPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ClientsocstatusPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientsocstatus
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ClientsocstatusPeer::doSelect($critcopy, $con);
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
        return ClientsocstatusPeer::populateObjects(ClientsocstatusPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ClientsocstatusPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ClientsocstatusPeer::DATABASE_NAME);

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
     * @param      Clientsocstatus $obj A Clientsocstatus object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ClientsocstatusPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Clientsocstatus object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Clientsocstatus) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Clientsocstatus object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ClientsocstatusPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Clientsocstatus Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ClientsocstatusPeer::$instances[$key])) {
                return ClientsocstatusPeer::$instances[$key];
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
        foreach (ClientsocstatusPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ClientsocstatusPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ClientSocStatus
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
        $cls = ClientsocstatusPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ClientsocstatusPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ClientsocstatusPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientsocstatusPeer::addInstanceToPool($obj, $key);
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
     * @return array (Clientsocstatus object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ClientsocstatusPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ClientsocstatusPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ClientsocstatusPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientsocstatusPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ClientsocstatusPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ClientsocstatusPeer::DATABASE_NAME)->getTable(ClientsocstatusPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseClientsocstatusPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseClientsocstatusPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ClientsocstatusTableMap());
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
        return ClientsocstatusPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Clientsocstatus or Criteria object.
     *
     * @param      mixed $values Criteria or Clientsocstatus object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Clientsocstatus object
        }

        if ($criteria->containsKey(ClientsocstatusPeer::ID) && $criteria->keyContainsValue(ClientsocstatusPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientsocstatusPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ClientsocstatusPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Clientsocstatus or Criteria object.
     *
     * @param      mixed $values Criteria or Clientsocstatus object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ClientsocstatusPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ClientsocstatusPeer::ID);
            $value = $criteria->remove(ClientsocstatusPeer::ID);
            if ($value) {
                $selectCriteria->add(ClientsocstatusPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ClientsocstatusPeer::TABLE_NAME);
            }

        } else { // $values is Clientsocstatus object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ClientsocstatusPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ClientSocStatus table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ClientsocstatusPeer::TABLE_NAME, $con, ClientsocstatusPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientsocstatusPeer::clearInstancePool();
            ClientsocstatusPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Clientsocstatus or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Clientsocstatus object or primary key or array of primary keys
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
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ClientsocstatusPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Clientsocstatus) { // it's a model object
            // invalidate the cache for this single object
            ClientsocstatusPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientsocstatusPeer::DATABASE_NAME);
            $criteria->add(ClientsocstatusPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ClientsocstatusPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ClientsocstatusPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ClientsocstatusPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Clientsocstatus object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Clientsocstatus $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ClientsocstatusPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ClientsocstatusPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ClientsocstatusPeer::DATABASE_NAME, ClientsocstatusPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Clientsocstatus
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ClientsocstatusPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ClientsocstatusPeer::DATABASE_NAME);
        $criteria->add(ClientsocstatusPeer::ID, $pk);

        $v = ClientsocstatusPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Clientsocstatus[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ClientsocstatusPeer::DATABASE_NAME);
            $criteria->add(ClientsocstatusPeer::ID, $pks, Criteria::IN);
            $objs = ClientsocstatusPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseClientsocstatusPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClientsocstatusPeer::buildTableMap();

