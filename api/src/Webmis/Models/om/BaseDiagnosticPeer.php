<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Diagnostic;
use Webmis\Models\DiagnosticPeer;
use Webmis\Models\RbacheresultPeer;
use Webmis\Models\map\DiagnosticTableMap;

/**
 * Base static class for performing query and update operations on the 'Diagnostic' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseDiagnosticPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Diagnostic';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Diagnostic';

    /** the related TableMap class for this table */
    const TM_CLASS = 'DiagnosticTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 26;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 26;

    /** the column name for the id field */
    const ID = 'Diagnostic.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Diagnostic.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Diagnostic.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Diagnostic.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Diagnostic.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Diagnostic.deleted';

    /** the column name for the event_id field */
    const EVENT_ID = 'Diagnostic.event_id';

    /** the column name for the diagnosis_id field */
    const DIAGNOSIS_ID = 'Diagnostic.diagnosis_id';

    /** the column name for the diagnosisType_id field */
    const DIAGNOSISTYPE_ID = 'Diagnostic.diagnosisType_id';

    /** the column name for the character_id field */
    const CHARACTER_ID = 'Diagnostic.character_id';

    /** the column name for the stage_id field */
    const STAGE_ID = 'Diagnostic.stage_id';

    /** the column name for the phase_id field */
    const PHASE_ID = 'Diagnostic.phase_id';

    /** the column name for the dispanser_id field */
    const DISPANSER_ID = 'Diagnostic.dispanser_id';

    /** the column name for the sanatorium field */
    const SANATORIUM = 'Diagnostic.sanatorium';

    /** the column name for the hospital field */
    const HOSPITAL = 'Diagnostic.hospital';

    /** the column name for the traumaType_id field */
    const TRAUMATYPE_ID = 'Diagnostic.traumaType_id';

    /** the column name for the speciality_id field */
    const SPECIALITY_ID = 'Diagnostic.speciality_id';

    /** the column name for the person_id field */
    const PERSON_ID = 'Diagnostic.person_id';

    /** the column name for the healthGroup_id field */
    const HEALTHGROUP_ID = 'Diagnostic.healthGroup_id';

    /** the column name for the result_id field */
    const RESULT_ID = 'Diagnostic.result_id';

    /** the column name for the setDate field */
    const SETDATE = 'Diagnostic.setDate';

    /** the column name for the endDate field */
    const ENDDATE = 'Diagnostic.endDate';

    /** the column name for the notes field */
    const NOTES = 'Diagnostic.notes';

    /** the column name for the rbAcheResult_id field */
    const RBACHERESULT_ID = 'Diagnostic.rbAcheResult_id';

    /** the column name for the version field */
    const VERSION = 'Diagnostic.version';

    /** the column name for the action_id field */
    const ACTION_ID = 'Diagnostic.action_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Diagnostic objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Diagnostic[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. DiagnosticPeer::$fieldNames[DiagnosticPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'EventId', 'DiagnosisId', 'DiagnosistypeId', 'CharacterId', 'StageId', 'PhaseId', 'DispanserId', 'Sanatorium', 'Hospital', 'TraumatypeId', 'SpecialityId', 'PersonId', 'HealthgroupId', 'ResultId', 'Setdate', 'Enddate', 'Notes', 'RbacheresultId', 'Version', 'ActionId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'eventId', 'diagnosisId', 'diagnosistypeId', 'characterId', 'stageId', 'phaseId', 'dispanserId', 'sanatorium', 'hospital', 'traumatypeId', 'specialityId', 'personId', 'healthgroupId', 'resultId', 'setdate', 'enddate', 'notes', 'rbacheresultId', 'version', 'actionId', ),
        BasePeer::TYPE_COLNAME => array (DiagnosticPeer::ID, DiagnosticPeer::CREATEDATETIME, DiagnosticPeer::CREATEPERSON_ID, DiagnosticPeer::MODIFYDATETIME, DiagnosticPeer::MODIFYPERSON_ID, DiagnosticPeer::DELETED, DiagnosticPeer::EVENT_ID, DiagnosticPeer::DIAGNOSIS_ID, DiagnosticPeer::DIAGNOSISTYPE_ID, DiagnosticPeer::CHARACTER_ID, DiagnosticPeer::STAGE_ID, DiagnosticPeer::PHASE_ID, DiagnosticPeer::DISPANSER_ID, DiagnosticPeer::SANATORIUM, DiagnosticPeer::HOSPITAL, DiagnosticPeer::TRAUMATYPE_ID, DiagnosticPeer::SPECIALITY_ID, DiagnosticPeer::PERSON_ID, DiagnosticPeer::HEALTHGROUP_ID, DiagnosticPeer::RESULT_ID, DiagnosticPeer::SETDATE, DiagnosticPeer::ENDDATE, DiagnosticPeer::NOTES, DiagnosticPeer::RBACHERESULT_ID, DiagnosticPeer::VERSION, DiagnosticPeer::ACTION_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'EVENT_ID', 'DIAGNOSIS_ID', 'DIAGNOSISTYPE_ID', 'CHARACTER_ID', 'STAGE_ID', 'PHASE_ID', 'DISPANSER_ID', 'SANATORIUM', 'HOSPITAL', 'TRAUMATYPE_ID', 'SPECIALITY_ID', 'PERSON_ID', 'HEALTHGROUP_ID', 'RESULT_ID', 'SETDATE', 'ENDDATE', 'NOTES', 'RBACHERESULT_ID', 'VERSION', 'ACTION_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'event_id', 'diagnosis_id', 'diagnosisType_id', 'character_id', 'stage_id', 'phase_id', 'dispanser_id', 'sanatorium', 'hospital', 'traumaType_id', 'speciality_id', 'person_id', 'healthGroup_id', 'result_id', 'setDate', 'endDate', 'notes', 'rbAcheResult_id', 'version', 'action_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. DiagnosticPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'EventId' => 6, 'DiagnosisId' => 7, 'DiagnosistypeId' => 8, 'CharacterId' => 9, 'StageId' => 10, 'PhaseId' => 11, 'DispanserId' => 12, 'Sanatorium' => 13, 'Hospital' => 14, 'TraumatypeId' => 15, 'SpecialityId' => 16, 'PersonId' => 17, 'HealthgroupId' => 18, 'ResultId' => 19, 'Setdate' => 20, 'Enddate' => 21, 'Notes' => 22, 'RbacheresultId' => 23, 'Version' => 24, 'ActionId' => 25, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'eventId' => 6, 'diagnosisId' => 7, 'diagnosistypeId' => 8, 'characterId' => 9, 'stageId' => 10, 'phaseId' => 11, 'dispanserId' => 12, 'sanatorium' => 13, 'hospital' => 14, 'traumatypeId' => 15, 'specialityId' => 16, 'personId' => 17, 'healthgroupId' => 18, 'resultId' => 19, 'setdate' => 20, 'enddate' => 21, 'notes' => 22, 'rbacheresultId' => 23, 'version' => 24, 'actionId' => 25, ),
        BasePeer::TYPE_COLNAME => array (DiagnosticPeer::ID => 0, DiagnosticPeer::CREATEDATETIME => 1, DiagnosticPeer::CREATEPERSON_ID => 2, DiagnosticPeer::MODIFYDATETIME => 3, DiagnosticPeer::MODIFYPERSON_ID => 4, DiagnosticPeer::DELETED => 5, DiagnosticPeer::EVENT_ID => 6, DiagnosticPeer::DIAGNOSIS_ID => 7, DiagnosticPeer::DIAGNOSISTYPE_ID => 8, DiagnosticPeer::CHARACTER_ID => 9, DiagnosticPeer::STAGE_ID => 10, DiagnosticPeer::PHASE_ID => 11, DiagnosticPeer::DISPANSER_ID => 12, DiagnosticPeer::SANATORIUM => 13, DiagnosticPeer::HOSPITAL => 14, DiagnosticPeer::TRAUMATYPE_ID => 15, DiagnosticPeer::SPECIALITY_ID => 16, DiagnosticPeer::PERSON_ID => 17, DiagnosticPeer::HEALTHGROUP_ID => 18, DiagnosticPeer::RESULT_ID => 19, DiagnosticPeer::SETDATE => 20, DiagnosticPeer::ENDDATE => 21, DiagnosticPeer::NOTES => 22, DiagnosticPeer::RBACHERESULT_ID => 23, DiagnosticPeer::VERSION => 24, DiagnosticPeer::ACTION_ID => 25, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'EVENT_ID' => 6, 'DIAGNOSIS_ID' => 7, 'DIAGNOSISTYPE_ID' => 8, 'CHARACTER_ID' => 9, 'STAGE_ID' => 10, 'PHASE_ID' => 11, 'DISPANSER_ID' => 12, 'SANATORIUM' => 13, 'HOSPITAL' => 14, 'TRAUMATYPE_ID' => 15, 'SPECIALITY_ID' => 16, 'PERSON_ID' => 17, 'HEALTHGROUP_ID' => 18, 'RESULT_ID' => 19, 'SETDATE' => 20, 'ENDDATE' => 21, 'NOTES' => 22, 'RBACHERESULT_ID' => 23, 'VERSION' => 24, 'ACTION_ID' => 25, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'event_id' => 6, 'diagnosis_id' => 7, 'diagnosisType_id' => 8, 'character_id' => 9, 'stage_id' => 10, 'phase_id' => 11, 'dispanser_id' => 12, 'sanatorium' => 13, 'hospital' => 14, 'traumaType_id' => 15, 'speciality_id' => 16, 'person_id' => 17, 'healthGroup_id' => 18, 'result_id' => 19, 'setDate' => 20, 'endDate' => 21, 'notes' => 22, 'rbAcheResult_id' => 23, 'version' => 24, 'action_id' => 25, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
        $toNames = DiagnosticPeer::getFieldNames($toType);
        $key = isset(DiagnosticPeer::$fieldKeys[$fromType][$name]) ? DiagnosticPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(DiagnosticPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, DiagnosticPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return DiagnosticPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. DiagnosticPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(DiagnosticPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(DiagnosticPeer::ID);
            $criteria->addSelectColumn(DiagnosticPeer::CREATEDATETIME);
            $criteria->addSelectColumn(DiagnosticPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(DiagnosticPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(DiagnosticPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(DiagnosticPeer::DELETED);
            $criteria->addSelectColumn(DiagnosticPeer::EVENT_ID);
            $criteria->addSelectColumn(DiagnosticPeer::DIAGNOSIS_ID);
            $criteria->addSelectColumn(DiagnosticPeer::DIAGNOSISTYPE_ID);
            $criteria->addSelectColumn(DiagnosticPeer::CHARACTER_ID);
            $criteria->addSelectColumn(DiagnosticPeer::STAGE_ID);
            $criteria->addSelectColumn(DiagnosticPeer::PHASE_ID);
            $criteria->addSelectColumn(DiagnosticPeer::DISPANSER_ID);
            $criteria->addSelectColumn(DiagnosticPeer::SANATORIUM);
            $criteria->addSelectColumn(DiagnosticPeer::HOSPITAL);
            $criteria->addSelectColumn(DiagnosticPeer::TRAUMATYPE_ID);
            $criteria->addSelectColumn(DiagnosticPeer::SPECIALITY_ID);
            $criteria->addSelectColumn(DiagnosticPeer::PERSON_ID);
            $criteria->addSelectColumn(DiagnosticPeer::HEALTHGROUP_ID);
            $criteria->addSelectColumn(DiagnosticPeer::RESULT_ID);
            $criteria->addSelectColumn(DiagnosticPeer::SETDATE);
            $criteria->addSelectColumn(DiagnosticPeer::ENDDATE);
            $criteria->addSelectColumn(DiagnosticPeer::NOTES);
            $criteria->addSelectColumn(DiagnosticPeer::RBACHERESULT_ID);
            $criteria->addSelectColumn(DiagnosticPeer::VERSION);
            $criteria->addSelectColumn(DiagnosticPeer::ACTION_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.event_id');
            $criteria->addSelectColumn($alias . '.diagnosis_id');
            $criteria->addSelectColumn($alias . '.diagnosisType_id');
            $criteria->addSelectColumn($alias . '.character_id');
            $criteria->addSelectColumn($alias . '.stage_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.dispanser_id');
            $criteria->addSelectColumn($alias . '.sanatorium');
            $criteria->addSelectColumn($alias . '.hospital');
            $criteria->addSelectColumn($alias . '.traumaType_id');
            $criteria->addSelectColumn($alias . '.speciality_id');
            $criteria->addSelectColumn($alias . '.person_id');
            $criteria->addSelectColumn($alias . '.healthGroup_id');
            $criteria->addSelectColumn($alias . '.result_id');
            $criteria->addSelectColumn($alias . '.setDate');
            $criteria->addSelectColumn($alias . '.endDate');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.rbAcheResult_id');
            $criteria->addSelectColumn($alias . '.version');
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
        $criteria->setPrimaryTableName(DiagnosticPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DiagnosticPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Diagnostic
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = DiagnosticPeer::doSelect($critcopy, $con);
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
        return DiagnosticPeer::populateObjects(DiagnosticPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            DiagnosticPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);

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
     * @param      Diagnostic $obj A Diagnostic object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            DiagnosticPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Diagnostic object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Diagnostic) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Diagnostic object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(DiagnosticPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Diagnostic Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(DiagnosticPeer::$instances[$key])) {
                return DiagnosticPeer::$instances[$key];
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
        foreach (DiagnosticPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        DiagnosticPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Diagnostic
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
        $cls = DiagnosticPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = DiagnosticPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = DiagnosticPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DiagnosticPeer::addInstanceToPool($obj, $key);
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
     * @return array (Diagnostic object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = DiagnosticPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = DiagnosticPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + DiagnosticPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DiagnosticPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            DiagnosticPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbacheresult table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbacheresult(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DiagnosticPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DiagnosticPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DiagnosticPeer::RBACHERESULT_ID, RbacheresultPeer::ID, $join_behavior);

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
     * Selects a collection of Diagnostic objects pre-filled with their Rbacheresult objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Diagnostic objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbacheresult(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);
        }

        DiagnosticPeer::addSelectColumns($criteria);
        $startcol = DiagnosticPeer::NUM_HYDRATE_COLUMNS;
        RbacheresultPeer::addSelectColumns($criteria);

        $criteria->addJoin(DiagnosticPeer::RBACHERESULT_ID, RbacheresultPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DiagnosticPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DiagnosticPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DiagnosticPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DiagnosticPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbacheresultPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbacheresultPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbacheresultPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbacheresultPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Diagnostic) to $obj2 (Rbacheresult)
                $obj2->addDiagnostic($obj1);

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
        $criteria->setPrimaryTableName(DiagnosticPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DiagnosticPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DiagnosticPeer::RBACHERESULT_ID, RbacheresultPeer::ID, $join_behavior);

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
     * Selects a collection of Diagnostic objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Diagnostic objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);
        }

        DiagnosticPeer::addSelectColumns($criteria);
        $startcol2 = DiagnosticPeer::NUM_HYDRATE_COLUMNS;

        RbacheresultPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbacheresultPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DiagnosticPeer::RBACHERESULT_ID, RbacheresultPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DiagnosticPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DiagnosticPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DiagnosticPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DiagnosticPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbacheresult rows

            $key2 = RbacheresultPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbacheresultPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbacheresultPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbacheresultPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Diagnostic) to the collection in $obj2 (Rbacheresult)
                $obj2->addDiagnostic($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(DiagnosticPeer::DATABASE_NAME)->getTable(DiagnosticPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseDiagnosticPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseDiagnosticPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new DiagnosticTableMap());
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
        return DiagnosticPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Diagnostic or Criteria object.
     *
     * @param      mixed $values Criteria or Diagnostic object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Diagnostic object
        }

        if ($criteria->containsKey(DiagnosticPeer::ID) && $criteria->keyContainsValue(DiagnosticPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DiagnosticPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Diagnostic or Criteria object.
     *
     * @param      mixed $values Criteria or Diagnostic object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(DiagnosticPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(DiagnosticPeer::ID);
            $value = $criteria->remove(DiagnosticPeer::ID);
            if ($value) {
                $selectCriteria->add(DiagnosticPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(DiagnosticPeer::TABLE_NAME);
            }

        } else { // $values is Diagnostic object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Diagnostic table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(DiagnosticPeer::TABLE_NAME, $con, DiagnosticPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DiagnosticPeer::clearInstancePool();
            DiagnosticPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Diagnostic or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Diagnostic object or primary key or array of primary keys
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
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            DiagnosticPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Diagnostic) { // it's a model object
            // invalidate the cache for this single object
            DiagnosticPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DiagnosticPeer::DATABASE_NAME);
            $criteria->add(DiagnosticPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                DiagnosticPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(DiagnosticPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            DiagnosticPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Diagnostic object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Diagnostic $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(DiagnosticPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(DiagnosticPeer::TABLE_NAME);

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

        return BasePeer::doValidate(DiagnosticPeer::DATABASE_NAME, DiagnosticPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Diagnostic
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = DiagnosticPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(DiagnosticPeer::DATABASE_NAME);
        $criteria->add(DiagnosticPeer::ID, $pk);

        $v = DiagnosticPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Diagnostic[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(DiagnosticPeer::DATABASE_NAME);
            $criteria->add(DiagnosticPeer::ID, $pks, Criteria::IN);
            $objs = DiagnosticPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseDiagnosticPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseDiagnosticPeer::buildTableMap();

