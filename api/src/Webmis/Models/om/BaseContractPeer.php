<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Contract;
use Webmis\Models\ContractPeer;
use Webmis\Models\map\ContractTableMap;

/**
 * Base static class for performing query and update operations on the 'Contract' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseContractPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Contract';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Contract';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ContractTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 28;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 28;

    /** the column name for the id field */
    const ID = 'Contract.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Contract.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Contract.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Contract.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Contract.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Contract.deleted';

    /** the column name for the number field */
    const NUMBER = 'Contract.number';

    /** the column name for the date field */
    const DATE = 'Contract.date';

    /** the column name for the recipient_id field */
    const RECIPIENT_ID = 'Contract.recipient_id';

    /** the column name for the recipientAccount_id field */
    const RECIPIENTACCOUNT_ID = 'Contract.recipientAccount_id';

    /** the column name for the recipientKBK field */
    const RECIPIENTKBK = 'Contract.recipientKBK';

    /** the column name for the payer_id field */
    const PAYER_ID = 'Contract.payer_id';

    /** the column name for the payerAccount_id field */
    const PAYERACCOUNT_ID = 'Contract.payerAccount_id';

    /** the column name for the payerKBK field */
    const PAYERKBK = 'Contract.payerKBK';

    /** the column name for the begDate field */
    const BEGDATE = 'Contract.begDate';

    /** the column name for the endDate field */
    const ENDDATE = 'Contract.endDate';

    /** the column name for the finance_id field */
    const FINANCE_ID = 'Contract.finance_id';

    /** the column name for the grouping field */
    const GROUPING = 'Contract.grouping';

    /** the column name for the resolution field */
    const RESOLUTION = 'Contract.resolution';

    /** the column name for the format_id field */
    const FORMAT_ID = 'Contract.format_id';

    /** the column name for the exposeUnfinishedEventVisits field */
    const EXPOSEUNFINISHEDEVENTVISITS = 'Contract.exposeUnfinishedEventVisits';

    /** the column name for the exposeUnfinishedEventActions field */
    const EXPOSEUNFINISHEDEVENTACTIONS = 'Contract.exposeUnfinishedEventActions';

    /** the column name for the visitExposition field */
    const VISITEXPOSITION = 'Contract.visitExposition';

    /** the column name for the actionExposition field */
    const ACTIONEXPOSITION = 'Contract.actionExposition';

    /** the column name for the exposeDiscipline field */
    const EXPOSEDISCIPLINE = 'Contract.exposeDiscipline';

    /** the column name for the priceList_id field */
    const PRICELIST_ID = 'Contract.priceList_id';

    /** the column name for the coefficient field */
    const COEFFICIENT = 'Contract.coefficient';

    /** the column name for the coefficientEx field */
    const COEFFICIENTEX = 'Contract.coefficientEx';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Contract objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Contract[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ContractPeer::$fieldNames[ContractPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Number', 'Date', 'RecipientId', 'RecipientaccountId', 'Recipientkbk', 'PayerId', 'PayeraccountId', 'Payerkbk', 'Begdate', 'Enddate', 'FinanceId', 'Grouping', 'Resolution', 'FormatId', 'Exposeunfinishedeventvisits', 'Exposeunfinishedeventactions', 'Visitexposition', 'Actionexposition', 'Exposediscipline', 'PricelistId', 'Coefficient', 'Coefficientex', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'number', 'date', 'recipientId', 'recipientaccountId', 'recipientkbk', 'payerId', 'payeraccountId', 'payerkbk', 'begdate', 'enddate', 'financeId', 'grouping', 'resolution', 'formatId', 'exposeunfinishedeventvisits', 'exposeunfinishedeventactions', 'visitexposition', 'actionexposition', 'exposediscipline', 'pricelistId', 'coefficient', 'coefficientex', ),
        BasePeer::TYPE_COLNAME => array (ContractPeer::ID, ContractPeer::CREATEDATETIME, ContractPeer::CREATEPERSON_ID, ContractPeer::MODIFYDATETIME, ContractPeer::MODIFYPERSON_ID, ContractPeer::DELETED, ContractPeer::NUMBER, ContractPeer::DATE, ContractPeer::RECIPIENT_ID, ContractPeer::RECIPIENTACCOUNT_ID, ContractPeer::RECIPIENTKBK, ContractPeer::PAYER_ID, ContractPeer::PAYERACCOUNT_ID, ContractPeer::PAYERKBK, ContractPeer::BEGDATE, ContractPeer::ENDDATE, ContractPeer::FINANCE_ID, ContractPeer::GROUPING, ContractPeer::RESOLUTION, ContractPeer::FORMAT_ID, ContractPeer::EXPOSEUNFINISHEDEVENTVISITS, ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS, ContractPeer::VISITEXPOSITION, ContractPeer::ACTIONEXPOSITION, ContractPeer::EXPOSEDISCIPLINE, ContractPeer::PRICELIST_ID, ContractPeer::COEFFICIENT, ContractPeer::COEFFICIENTEX, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'NUMBER', 'DATE', 'RECIPIENT_ID', 'RECIPIENTACCOUNT_ID', 'RECIPIENTKBK', 'PAYER_ID', 'PAYERACCOUNT_ID', 'PAYERKBK', 'BEGDATE', 'ENDDATE', 'FINANCE_ID', 'GROUPING', 'RESOLUTION', 'FORMAT_ID', 'EXPOSEUNFINISHEDEVENTVISITS', 'EXPOSEUNFINISHEDEVENTACTIONS', 'VISITEXPOSITION', 'ACTIONEXPOSITION', 'EXPOSEDISCIPLINE', 'PRICELIST_ID', 'COEFFICIENT', 'COEFFICIENTEX', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'number', 'date', 'recipient_id', 'recipientAccount_id', 'recipientKBK', 'payer_id', 'payerAccount_id', 'payerKBK', 'begDate', 'endDate', 'finance_id', 'grouping', 'resolution', 'format_id', 'exposeUnfinishedEventVisits', 'exposeUnfinishedEventActions', 'visitExposition', 'actionExposition', 'exposeDiscipline', 'priceList_id', 'coefficient', 'coefficientEx', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ContractPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Number' => 6, 'Date' => 7, 'RecipientId' => 8, 'RecipientaccountId' => 9, 'Recipientkbk' => 10, 'PayerId' => 11, 'PayeraccountId' => 12, 'Payerkbk' => 13, 'Begdate' => 14, 'Enddate' => 15, 'FinanceId' => 16, 'Grouping' => 17, 'Resolution' => 18, 'FormatId' => 19, 'Exposeunfinishedeventvisits' => 20, 'Exposeunfinishedeventactions' => 21, 'Visitexposition' => 22, 'Actionexposition' => 23, 'Exposediscipline' => 24, 'PricelistId' => 25, 'Coefficient' => 26, 'Coefficientex' => 27, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'number' => 6, 'date' => 7, 'recipientId' => 8, 'recipientaccountId' => 9, 'recipientkbk' => 10, 'payerId' => 11, 'payeraccountId' => 12, 'payerkbk' => 13, 'begdate' => 14, 'enddate' => 15, 'financeId' => 16, 'grouping' => 17, 'resolution' => 18, 'formatId' => 19, 'exposeunfinishedeventvisits' => 20, 'exposeunfinishedeventactions' => 21, 'visitexposition' => 22, 'actionexposition' => 23, 'exposediscipline' => 24, 'pricelistId' => 25, 'coefficient' => 26, 'coefficientex' => 27, ),
        BasePeer::TYPE_COLNAME => array (ContractPeer::ID => 0, ContractPeer::CREATEDATETIME => 1, ContractPeer::CREATEPERSON_ID => 2, ContractPeer::MODIFYDATETIME => 3, ContractPeer::MODIFYPERSON_ID => 4, ContractPeer::DELETED => 5, ContractPeer::NUMBER => 6, ContractPeer::DATE => 7, ContractPeer::RECIPIENT_ID => 8, ContractPeer::RECIPIENTACCOUNT_ID => 9, ContractPeer::RECIPIENTKBK => 10, ContractPeer::PAYER_ID => 11, ContractPeer::PAYERACCOUNT_ID => 12, ContractPeer::PAYERKBK => 13, ContractPeer::BEGDATE => 14, ContractPeer::ENDDATE => 15, ContractPeer::FINANCE_ID => 16, ContractPeer::GROUPING => 17, ContractPeer::RESOLUTION => 18, ContractPeer::FORMAT_ID => 19, ContractPeer::EXPOSEUNFINISHEDEVENTVISITS => 20, ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS => 21, ContractPeer::VISITEXPOSITION => 22, ContractPeer::ACTIONEXPOSITION => 23, ContractPeer::EXPOSEDISCIPLINE => 24, ContractPeer::PRICELIST_ID => 25, ContractPeer::COEFFICIENT => 26, ContractPeer::COEFFICIENTEX => 27, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'NUMBER' => 6, 'DATE' => 7, 'RECIPIENT_ID' => 8, 'RECIPIENTACCOUNT_ID' => 9, 'RECIPIENTKBK' => 10, 'PAYER_ID' => 11, 'PAYERACCOUNT_ID' => 12, 'PAYERKBK' => 13, 'BEGDATE' => 14, 'ENDDATE' => 15, 'FINANCE_ID' => 16, 'GROUPING' => 17, 'RESOLUTION' => 18, 'FORMAT_ID' => 19, 'EXPOSEUNFINISHEDEVENTVISITS' => 20, 'EXPOSEUNFINISHEDEVENTACTIONS' => 21, 'VISITEXPOSITION' => 22, 'ACTIONEXPOSITION' => 23, 'EXPOSEDISCIPLINE' => 24, 'PRICELIST_ID' => 25, 'COEFFICIENT' => 26, 'COEFFICIENTEX' => 27, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'number' => 6, 'date' => 7, 'recipient_id' => 8, 'recipientAccount_id' => 9, 'recipientKBK' => 10, 'payer_id' => 11, 'payerAccount_id' => 12, 'payerKBK' => 13, 'begDate' => 14, 'endDate' => 15, 'finance_id' => 16, 'grouping' => 17, 'resolution' => 18, 'format_id' => 19, 'exposeUnfinishedEventVisits' => 20, 'exposeUnfinishedEventActions' => 21, 'visitExposition' => 22, 'actionExposition' => 23, 'exposeDiscipline' => 24, 'priceList_id' => 25, 'coefficient' => 26, 'coefficientEx' => 27, ),
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
        $toNames = ContractPeer::getFieldNames($toType);
        $key = isset(ContractPeer::$fieldKeys[$fromType][$name]) ? ContractPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ContractPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ContractPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ContractPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ContractPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ContractPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ContractPeer::ID);
            $criteria->addSelectColumn(ContractPeer::CREATEDATETIME);
            $criteria->addSelectColumn(ContractPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(ContractPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(ContractPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(ContractPeer::DELETED);
            $criteria->addSelectColumn(ContractPeer::NUMBER);
            $criteria->addSelectColumn(ContractPeer::DATE);
            $criteria->addSelectColumn(ContractPeer::RECIPIENT_ID);
            $criteria->addSelectColumn(ContractPeer::RECIPIENTACCOUNT_ID);
            $criteria->addSelectColumn(ContractPeer::RECIPIENTKBK);
            $criteria->addSelectColumn(ContractPeer::PAYER_ID);
            $criteria->addSelectColumn(ContractPeer::PAYERACCOUNT_ID);
            $criteria->addSelectColumn(ContractPeer::PAYERKBK);
            $criteria->addSelectColumn(ContractPeer::BEGDATE);
            $criteria->addSelectColumn(ContractPeer::ENDDATE);
            $criteria->addSelectColumn(ContractPeer::FINANCE_ID);
            $criteria->addSelectColumn(ContractPeer::GROUPING);
            $criteria->addSelectColumn(ContractPeer::RESOLUTION);
            $criteria->addSelectColumn(ContractPeer::FORMAT_ID);
            $criteria->addSelectColumn(ContractPeer::EXPOSEUNFINISHEDEVENTVISITS);
            $criteria->addSelectColumn(ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS);
            $criteria->addSelectColumn(ContractPeer::VISITEXPOSITION);
            $criteria->addSelectColumn(ContractPeer::ACTIONEXPOSITION);
            $criteria->addSelectColumn(ContractPeer::EXPOSEDISCIPLINE);
            $criteria->addSelectColumn(ContractPeer::PRICELIST_ID);
            $criteria->addSelectColumn(ContractPeer::COEFFICIENT);
            $criteria->addSelectColumn(ContractPeer::COEFFICIENTEX);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.number');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.recipient_id');
            $criteria->addSelectColumn($alias . '.recipientAccount_id');
            $criteria->addSelectColumn($alias . '.recipientKBK');
            $criteria->addSelectColumn($alias . '.payer_id');
            $criteria->addSelectColumn($alias . '.payerAccount_id');
            $criteria->addSelectColumn($alias . '.payerKBK');
            $criteria->addSelectColumn($alias . '.begDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.finance_id');
            $criteria->addSelectColumn($alias . '.grouping');
            $criteria->addSelectColumn($alias . '.resolution');
            $criteria->addSelectColumn($alias . '.format_id');
            $criteria->addSelectColumn($alias . '.exposeUnfinishedEventVisits');
            $criteria->addSelectColumn($alias . '.exposeUnfinishedEventActions');
            $criteria->addSelectColumn($alias . '.visitExposition');
            $criteria->addSelectColumn($alias . '.actionExposition');
            $criteria->addSelectColumn($alias . '.exposeDiscipline');
            $criteria->addSelectColumn($alias . '.priceList_id');
            $criteria->addSelectColumn($alias . '.coefficient');
            $criteria->addSelectColumn($alias . '.coefficientEx');
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
        $criteria->setPrimaryTableName(ContractPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContractPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ContractPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Contract
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ContractPeer::doSelect($critcopy, $con);
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
        return ContractPeer::populateObjects(ContractPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ContractPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ContractPeer::DATABASE_NAME);

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
     * @param      Contract $obj A Contract object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ContractPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Contract object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Contract) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Contract object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ContractPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Contract Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ContractPeer::$instances[$key])) {
                return ContractPeer::$instances[$key];
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
        foreach (ContractPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ContractPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Contract
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
        $cls = ContractPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ContractPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ContractPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContractPeer::addInstanceToPool($obj, $key);
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
     * @return array (Contract object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ContractPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ContractPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ContractPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContractPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ContractPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ContractPeer::DATABASE_NAME)->getTable(ContractPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseContractPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseContractPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ContractTableMap());
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
        return ContractPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Contract or Criteria object.
     *
     * @param      mixed $values Criteria or Contract object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Contract object
        }

        if ($criteria->containsKey(ContractPeer::ID) && $criteria->keyContainsValue(ContractPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContractPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ContractPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Contract or Criteria object.
     *
     * @param      mixed $values Criteria or Contract object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ContractPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ContractPeer::ID);
            $value = $criteria->remove(ContractPeer::ID);
            if ($value) {
                $selectCriteria->add(ContractPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ContractPeer::TABLE_NAME);
            }

        } else { // $values is Contract object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ContractPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Contract table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ContractPeer::TABLE_NAME, $con, ContractPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContractPeer::clearInstancePool();
            ContractPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Contract or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Contract object or primary key or array of primary keys
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
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ContractPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Contract) { // it's a model object
            // invalidate the cache for this single object
            ContractPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContractPeer::DATABASE_NAME);
            $criteria->add(ContractPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ContractPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ContractPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ContractPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Contract object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Contract $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ContractPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ContractPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ContractPeer::DATABASE_NAME, ContractPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Contract
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ContractPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ContractPeer::DATABASE_NAME);
        $criteria->add(ContractPeer::ID, $pk);

        $v = ContractPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Contract[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ContractPeer::DATABASE_NAME);
            $criteria->add(ContractPeer::ID, $pks, Criteria::IN);
            $objs = ContractPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseContractPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContractPeer::buildTableMap();

