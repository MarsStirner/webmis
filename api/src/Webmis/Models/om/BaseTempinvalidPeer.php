<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Tempinvalid;
use Webmis\Models\TempinvalidPeer;
use Webmis\Models\map\TempinvalidTableMap;

/**
 * Base static class for performing query and update operations on the 'TempInvalid' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseTempinvalidPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'TempInvalid';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Tempinvalid';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TempinvalidTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 30;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 30;

    /** the column name for the id field */
    const ID = 'TempInvalid.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'TempInvalid.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'TempInvalid.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'TempInvalid.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'TempInvalid.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'TempInvalid.deleted';

    /** the column name for the type field */
    const TYPE = 'TempInvalid.type';

    /** the column name for the doctype field */
    const DOCTYPE = 'TempInvalid.doctype';

    /** the column name for the doctype_id field */
    const DOCTYPE_ID = 'TempInvalid.doctype_id';

    /** the column name for the serial field */
    const SERIAL = 'TempInvalid.serial';

    /** the column name for the number field */
    const NUMBER = 'TempInvalid.number';

    /** the column name for the client_id field */
    const CLIENT_ID = 'TempInvalid.client_id';

    /** the column name for the tempInvalidReason_id field */
    const TEMPINVALIDREASON_ID = 'TempInvalid.tempInvalidReason_id';

    /** the column name for the begDate field */
    const BEGDATE = 'TempInvalid.begDate';

    /** the column name for the endDate field */
    const ENDDATE = 'TempInvalid.endDate';

    /** the column name for the person_id field */
    const PERSON_ID = 'TempInvalid.person_id';

    /** the column name for the diagnosis_id field */
    const DIAGNOSIS_ID = 'TempInvalid.diagnosis_id';

    /** the column name for the sex field */
    const SEX = 'TempInvalid.sex';

    /** the column name for the age field */
    const AGE = 'TempInvalid.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'TempInvalid.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'TempInvalid.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'TempInvalid.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'TempInvalid.age_ec';

    /** the column name for the notes field */
    const NOTES = 'TempInvalid.notes';

    /** the column name for the duration field */
    const DURATION = 'TempInvalid.duration';

    /** the column name for the closed field */
    const CLOSED = 'TempInvalid.closed';

    /** the column name for the prev_id field */
    const PREV_ID = 'TempInvalid.prev_id';

    /** the column name for the insuranceOfficeMark field */
    const INSURANCEOFFICEMARK = 'TempInvalid.insuranceOfficeMark';

    /** the column name for the caseBegDate field */
    const CASEBEGDATE = 'TempInvalid.caseBegDate';

    /** the column name for the event_id field */
    const EVENT_ID = 'TempInvalid.event_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Tempinvalid objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Tempinvalid[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TempinvalidPeer::$fieldNames[TempinvalidPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Type', 'Doctype', 'DoctypeId', 'Serial', 'Number', 'ClientId', 'TempinvalidreasonId', 'Begdate', 'Enddate', 'PersonId', 'DiagnosisId', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'Notes', 'Duration', 'Closed', 'PrevId', 'Insuranceofficemark', 'Casebegdate', 'EventId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'type', 'doctype', 'doctypeId', 'serial', 'number', 'clientId', 'tempinvalidreasonId', 'begdate', 'enddate', 'personId', 'diagnosisId', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'notes', 'duration', 'closed', 'prevId', 'insuranceofficemark', 'casebegdate', 'eventId', ),
        BasePeer::TYPE_COLNAME => array (TempinvalidPeer::ID, TempinvalidPeer::CREATEDATETIME, TempinvalidPeer::CREATEPERSON_ID, TempinvalidPeer::MODIFYDATETIME, TempinvalidPeer::MODIFYPERSON_ID, TempinvalidPeer::DELETED, TempinvalidPeer::TYPE, TempinvalidPeer::DOCTYPE, TempinvalidPeer::DOCTYPE_ID, TempinvalidPeer::SERIAL, TempinvalidPeer::NUMBER, TempinvalidPeer::CLIENT_ID, TempinvalidPeer::TEMPINVALIDREASON_ID, TempinvalidPeer::BEGDATE, TempinvalidPeer::ENDDATE, TempinvalidPeer::PERSON_ID, TempinvalidPeer::DIAGNOSIS_ID, TempinvalidPeer::SEX, TempinvalidPeer::AGE, TempinvalidPeer::AGE_BU, TempinvalidPeer::AGE_BC, TempinvalidPeer::AGE_EU, TempinvalidPeer::AGE_EC, TempinvalidPeer::NOTES, TempinvalidPeer::DURATION, TempinvalidPeer::CLOSED, TempinvalidPeer::PREV_ID, TempinvalidPeer::INSURANCEOFFICEMARK, TempinvalidPeer::CASEBEGDATE, TempinvalidPeer::EVENT_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'TYPE', 'DOCTYPE', 'DOCTYPE_ID', 'SERIAL', 'NUMBER', 'CLIENT_ID', 'TEMPINVALIDREASON_ID', 'BEGDATE', 'ENDDATE', 'PERSON_ID', 'DIAGNOSIS_ID', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'NOTES', 'DURATION', 'CLOSED', 'PREV_ID', 'INSURANCEOFFICEMARK', 'CASEBEGDATE', 'EVENT_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'type', 'doctype', 'doctype_id', 'serial', 'number', 'client_id', 'tempInvalidReason_id', 'begDate', 'endDate', 'person_id', 'diagnosis_id', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'notes', 'duration', 'closed', 'prev_id', 'insuranceOfficeMark', 'caseBegDate', 'event_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TempinvalidPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Type' => 6, 'Doctype' => 7, 'DoctypeId' => 8, 'Serial' => 9, 'Number' => 10, 'ClientId' => 11, 'TempinvalidreasonId' => 12, 'Begdate' => 13, 'Enddate' => 14, 'PersonId' => 15, 'DiagnosisId' => 16, 'Sex' => 17, 'Age' => 18, 'AgeBu' => 19, 'AgeBc' => 20, 'AgeEu' => 21, 'AgeEc' => 22, 'Notes' => 23, 'Duration' => 24, 'Closed' => 25, 'PrevId' => 26, 'Insuranceofficemark' => 27, 'Casebegdate' => 28, 'EventId' => 29, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'type' => 6, 'doctype' => 7, 'doctypeId' => 8, 'serial' => 9, 'number' => 10, 'clientId' => 11, 'tempinvalidreasonId' => 12, 'begdate' => 13, 'enddate' => 14, 'personId' => 15, 'diagnosisId' => 16, 'sex' => 17, 'age' => 18, 'ageBu' => 19, 'ageBc' => 20, 'ageEu' => 21, 'ageEc' => 22, 'notes' => 23, 'duration' => 24, 'closed' => 25, 'prevId' => 26, 'insuranceofficemark' => 27, 'casebegdate' => 28, 'eventId' => 29, ),
        BasePeer::TYPE_COLNAME => array (TempinvalidPeer::ID => 0, TempinvalidPeer::CREATEDATETIME => 1, TempinvalidPeer::CREATEPERSON_ID => 2, TempinvalidPeer::MODIFYDATETIME => 3, TempinvalidPeer::MODIFYPERSON_ID => 4, TempinvalidPeer::DELETED => 5, TempinvalidPeer::TYPE => 6, TempinvalidPeer::DOCTYPE => 7, TempinvalidPeer::DOCTYPE_ID => 8, TempinvalidPeer::SERIAL => 9, TempinvalidPeer::NUMBER => 10, TempinvalidPeer::CLIENT_ID => 11, TempinvalidPeer::TEMPINVALIDREASON_ID => 12, TempinvalidPeer::BEGDATE => 13, TempinvalidPeer::ENDDATE => 14, TempinvalidPeer::PERSON_ID => 15, TempinvalidPeer::DIAGNOSIS_ID => 16, TempinvalidPeer::SEX => 17, TempinvalidPeer::AGE => 18, TempinvalidPeer::AGE_BU => 19, TempinvalidPeer::AGE_BC => 20, TempinvalidPeer::AGE_EU => 21, TempinvalidPeer::AGE_EC => 22, TempinvalidPeer::NOTES => 23, TempinvalidPeer::DURATION => 24, TempinvalidPeer::CLOSED => 25, TempinvalidPeer::PREV_ID => 26, TempinvalidPeer::INSURANCEOFFICEMARK => 27, TempinvalidPeer::CASEBEGDATE => 28, TempinvalidPeer::EVENT_ID => 29, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'TYPE' => 6, 'DOCTYPE' => 7, 'DOCTYPE_ID' => 8, 'SERIAL' => 9, 'NUMBER' => 10, 'CLIENT_ID' => 11, 'TEMPINVALIDREASON_ID' => 12, 'BEGDATE' => 13, 'ENDDATE' => 14, 'PERSON_ID' => 15, 'DIAGNOSIS_ID' => 16, 'SEX' => 17, 'AGE' => 18, 'AGE_BU' => 19, 'AGE_BC' => 20, 'AGE_EU' => 21, 'AGE_EC' => 22, 'NOTES' => 23, 'DURATION' => 24, 'CLOSED' => 25, 'PREV_ID' => 26, 'INSURANCEOFFICEMARK' => 27, 'CASEBEGDATE' => 28, 'EVENT_ID' => 29, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'type' => 6, 'doctype' => 7, 'doctype_id' => 8, 'serial' => 9, 'number' => 10, 'client_id' => 11, 'tempInvalidReason_id' => 12, 'begDate' => 13, 'endDate' => 14, 'person_id' => 15, 'diagnosis_id' => 16, 'sex' => 17, 'age' => 18, 'age_bu' => 19, 'age_bc' => 20, 'age_eu' => 21, 'age_ec' => 22, 'notes' => 23, 'duration' => 24, 'closed' => 25, 'prev_id' => 26, 'insuranceOfficeMark' => 27, 'caseBegDate' => 28, 'event_id' => 29, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
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
        $toNames = TempinvalidPeer::getFieldNames($toType);
        $key = isset(TempinvalidPeer::$fieldKeys[$fromType][$name]) ? TempinvalidPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TempinvalidPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TempinvalidPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TempinvalidPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TempinvalidPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TempinvalidPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TempinvalidPeer::ID);
            $criteria->addSelectColumn(TempinvalidPeer::CREATEDATETIME);
            $criteria->addSelectColumn(TempinvalidPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(TempinvalidPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(TempinvalidPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(TempinvalidPeer::DELETED);
            $criteria->addSelectColumn(TempinvalidPeer::TYPE);
            $criteria->addSelectColumn(TempinvalidPeer::DOCTYPE);
            $criteria->addSelectColumn(TempinvalidPeer::DOCTYPE_ID);
            $criteria->addSelectColumn(TempinvalidPeer::SERIAL);
            $criteria->addSelectColumn(TempinvalidPeer::NUMBER);
            $criteria->addSelectColumn(TempinvalidPeer::CLIENT_ID);
            $criteria->addSelectColumn(TempinvalidPeer::TEMPINVALIDREASON_ID);
            $criteria->addSelectColumn(TempinvalidPeer::BEGDATE);
            $criteria->addSelectColumn(TempinvalidPeer::ENDDATE);
            $criteria->addSelectColumn(TempinvalidPeer::PERSON_ID);
            $criteria->addSelectColumn(TempinvalidPeer::DIAGNOSIS_ID);
            $criteria->addSelectColumn(TempinvalidPeer::SEX);
            $criteria->addSelectColumn(TempinvalidPeer::AGE);
            $criteria->addSelectColumn(TempinvalidPeer::AGE_BU);
            $criteria->addSelectColumn(TempinvalidPeer::AGE_BC);
            $criteria->addSelectColumn(TempinvalidPeer::AGE_EU);
            $criteria->addSelectColumn(TempinvalidPeer::AGE_EC);
            $criteria->addSelectColumn(TempinvalidPeer::NOTES);
            $criteria->addSelectColumn(TempinvalidPeer::DURATION);
            $criteria->addSelectColumn(TempinvalidPeer::CLOSED);
            $criteria->addSelectColumn(TempinvalidPeer::PREV_ID);
            $criteria->addSelectColumn(TempinvalidPeer::INSURANCEOFFICEMARK);
            $criteria->addSelectColumn(TempinvalidPeer::CASEBEGDATE);
            $criteria->addSelectColumn(TempinvalidPeer::EVENT_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.doctype');
            $criteria->addSelectColumn($alias . '.doctype_id');
            $criteria->addSelectColumn($alias . '.serial');
            $criteria->addSelectColumn($alias . '.number');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.tempInvalidReason_id');
            $criteria->addSelectColumn($alias . '.begDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.person_id');
            $criteria->addSelectColumn($alias . '.diagnosis_id');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.duration');
            $criteria->addSelectColumn($alias . '.closed');
            $criteria->addSelectColumn($alias . '.prev_id');
            $criteria->addSelectColumn($alias . '.insuranceOfficeMark');
            $criteria->addSelectColumn($alias . '.caseBegDate');
            $criteria->addSelectColumn($alias . '.event_id');
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
        $criteria->setPrimaryTableName(TempinvalidPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TempinvalidPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TempinvalidPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tempinvalid
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TempinvalidPeer::doSelect($critcopy, $con);
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
        return TempinvalidPeer::populateObjects(TempinvalidPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TempinvalidPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TempinvalidPeer::DATABASE_NAME);

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
     * @param      Tempinvalid $obj A Tempinvalid object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            TempinvalidPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Tempinvalid object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Tempinvalid) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Tempinvalid object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TempinvalidPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Tempinvalid Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TempinvalidPeer::$instances[$key])) {
                return TempinvalidPeer::$instances[$key];
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
        foreach (TempinvalidPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TempinvalidPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to TempInvalid
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
        $cls = TempinvalidPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TempinvalidPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TempinvalidPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TempinvalidPeer::addInstanceToPool($obj, $key);
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
     * @return array (Tempinvalid object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TempinvalidPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TempinvalidPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TempinvalidPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TempinvalidPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TempinvalidPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(TempinvalidPeer::DATABASE_NAME)->getTable(TempinvalidPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTempinvalidPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTempinvalidPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TempinvalidTableMap());
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
        return TempinvalidPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Tempinvalid or Criteria object.
     *
     * @param      mixed $values Criteria or Tempinvalid object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Tempinvalid object
        }

        if ($criteria->containsKey(TempinvalidPeer::ID) && $criteria->keyContainsValue(TempinvalidPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TempinvalidPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(TempinvalidPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Tempinvalid or Criteria object.
     *
     * @param      mixed $values Criteria or Tempinvalid object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TempinvalidPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TempinvalidPeer::ID);
            $value = $criteria->remove(TempinvalidPeer::ID);
            if ($value) {
                $selectCriteria->add(TempinvalidPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TempinvalidPeer::TABLE_NAME);
            }

        } else { // $values is Tempinvalid object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TempinvalidPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the TempInvalid table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TempinvalidPeer::TABLE_NAME, $con, TempinvalidPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TempinvalidPeer::clearInstancePool();
            TempinvalidPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Tempinvalid or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Tempinvalid object or primary key or array of primary keys
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
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TempinvalidPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Tempinvalid) { // it's a model object
            // invalidate the cache for this single object
            TempinvalidPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TempinvalidPeer::DATABASE_NAME);
            $criteria->add(TempinvalidPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TempinvalidPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TempinvalidPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            TempinvalidPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Tempinvalid object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Tempinvalid $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TempinvalidPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TempinvalidPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TempinvalidPeer::DATABASE_NAME, TempinvalidPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Tempinvalid
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TempinvalidPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TempinvalidPeer::DATABASE_NAME);
        $criteria->add(TempinvalidPeer::ID, $pk);

        $v = TempinvalidPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Tempinvalid[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TempinvalidPeer::DATABASE_NAME);
            $criteria->add(TempinvalidPeer::ID, $pks, Criteria::IN);
            $objs = TempinvalidPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTempinvalidPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTempinvalidPeer::buildTableMap();

