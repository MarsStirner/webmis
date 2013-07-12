<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Actiontype;
use Webmis\Models\ActiontypePeer;
use Webmis\Models\ActiontypeTissuetypePeer;
use Webmis\Models\PersonPeer;
use Webmis\Models\RbjobtypePeer;
use Webmis\Models\RbtesttubetypePeer;
use Webmis\Models\map\ActiontypeTableMap;

/**
 * Base static class for performing query and update operations on the 'ActionType' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'ActionType';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Actiontype';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ActiontypeTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 45;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 45;

    /** the column name for the id field */
    const ID = 'ActionType.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'ActionType.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'ActionType.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'ActionType.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'ActionType.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'ActionType.deleted';

    /** the column name for the class field */
    const CLAZZ = 'ActionType.class';

    /** the column name for the group_id field */
    const GROUP_ID = 'ActionType.group_id';

    /** the column name for the code field */
    const CODE = 'ActionType.code';

    /** the column name for the name field */
    const NAME = 'ActionType.name';

    /** the column name for the title field */
    const TITLE = 'ActionType.title';

    /** the column name for the flatCode field */
    const FLATCODE = 'ActionType.flatCode';

    /** the column name for the sex field */
    const SEX = 'ActionType.sex';

    /** the column name for the age field */
    const AGE = 'ActionType.age';

    /** the column name for the age_bu field */
    const AGE_BU = 'ActionType.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'ActionType.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'ActionType.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'ActionType.age_ec';

    /** the column name for the office field */
    const OFFICE = 'ActionType.office';

    /** the column name for the showInForm field */
    const SHOWINFORM = 'ActionType.showInForm';

    /** the column name for the genTimetable field */
    const GENTIMETABLE = 'ActionType.genTimetable';

    /** the column name for the service_id field */
    const SERVICE_ID = 'ActionType.service_id';

    /** the column name for the quotaType_id field */
    const QUOTATYPE_ID = 'ActionType.quotaType_id';

    /** the column name for the context field */
    const CONTEXT = 'ActionType.context';

    /** the column name for the amount field */
    const AMOUNT = 'ActionType.amount';

    /** the column name for the amountEvaluation field */
    const AMOUNTEVALUATION = 'ActionType.amountEvaluation';

    /** the column name for the defaultStatus field */
    const DEFAULTSTATUS = 'ActionType.defaultStatus';

    /** the column name for the defaultDirectionDate field */
    const DEFAULTDIRECTIONDATE = 'ActionType.defaultDirectionDate';

    /** the column name for the defaultPlannedEndDate field */
    const DEFAULTPLANNEDENDDATE = 'ActionType.defaultPlannedEndDate';

    /** the column name for the defaultEndDate field */
    const DEFAULTENDDATE = 'ActionType.defaultEndDate';

    /** the column name for the defaultExecPerson_id field */
    const DEFAULTEXECPERSON_ID = 'ActionType.defaultExecPerson_id';

    /** the column name for the defaultPersonInEvent field */
    const DEFAULTPERSONINEVENT = 'ActionType.defaultPersonInEvent';

    /** the column name for the defaultPersonInEditor field */
    const DEFAULTPERSONINEDITOR = 'ActionType.defaultPersonInEditor';

    /** the column name for the maxOccursInEvent field */
    const MAXOCCURSINEVENT = 'ActionType.maxOccursInEvent';

    /** the column name for the showTime field */
    const SHOWTIME = 'ActionType.showTime';

    /** the column name for the isMES field */
    const ISMES = 'ActionType.isMES';

    /** the column name for the nomenclativeService_id field */
    const NOMENCLATIVESERVICE_ID = 'ActionType.nomenclativeService_id';

    /** the column name for the isPreferable field */
    const ISPREFERABLE = 'ActionType.isPreferable';

    /** the column name for the prescribedType_id field */
    const PRESCRIBEDTYPE_ID = 'ActionType.prescribedType_id';

    /** the column name for the shedule_id field */
    const SHEDULE_ID = 'ActionType.shedule_id';

    /** the column name for the isRequiredCoordination field */
    const ISREQUIREDCOORDINATION = 'ActionType.isRequiredCoordination';

    /** the column name for the isRequiredTissue field */
    const ISREQUIREDTISSUE = 'ActionType.isRequiredTissue';

    /** the column name for the testTubeType_id field */
    const TESTTUBETYPE_ID = 'ActionType.testTubeType_id';

    /** the column name for the jobType_id field */
    const JOBTYPE_ID = 'ActionType.jobType_id';

    /** the column name for the mnem field */
    const MNEM = 'ActionType.mnem';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Actiontype objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Actiontype[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ActiontypePeer::$fieldNames[ActiontypePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Class', 'GroupId', 'Code', 'Name', 'Title', 'Flatcode', 'Sex', 'Age', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'Office', 'Showinform', 'Gentimetable', 'ServiceId', 'QuotatypeId', 'Context', 'Amount', 'Amountevaluation', 'Defaultstatus', 'Defaultdirectiondate', 'Defaultplannedenddate', 'Defaultenddate', 'DefaultexecpersonId', 'Defaultpersoninevent', 'Defaultpersonineditor', 'Maxoccursinevent', 'Showtime', 'Ismes', 'NomenclativeserviceId', 'Ispreferable', 'PrescribedtypeId', 'SheduleId', 'Isrequiredcoordination', 'Isrequiredtissue', 'TesttubetypeId', 'JobtypeId', 'Mnem', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'class', 'groupId', 'code', 'name', 'title', 'flatcode', 'sex', 'age', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'office', 'showinform', 'gentimetable', 'serviceId', 'quotatypeId', 'context', 'amount', 'amountevaluation', 'defaultstatus', 'defaultdirectiondate', 'defaultplannedenddate', 'defaultenddate', 'defaultexecpersonId', 'defaultpersoninevent', 'defaultpersonineditor', 'maxoccursinevent', 'showtime', 'ismes', 'nomenclativeserviceId', 'ispreferable', 'prescribedtypeId', 'sheduleId', 'isrequiredcoordination', 'isrequiredtissue', 'testtubetypeId', 'jobtypeId', 'mnem', ),
        BasePeer::TYPE_COLNAME => array (ActiontypePeer::ID, ActiontypePeer::CREATEDATETIME, ActiontypePeer::CREATEPERSON_ID, ActiontypePeer::MODIFYDATETIME, ActiontypePeer::MODIFYPERSON_ID, ActiontypePeer::DELETED, ActiontypePeer::CLAZZ, ActiontypePeer::GROUP_ID, ActiontypePeer::CODE, ActiontypePeer::NAME, ActiontypePeer::TITLE, ActiontypePeer::FLATCODE, ActiontypePeer::SEX, ActiontypePeer::AGE, ActiontypePeer::AGE_BU, ActiontypePeer::AGE_BC, ActiontypePeer::AGE_EU, ActiontypePeer::AGE_EC, ActiontypePeer::OFFICE, ActiontypePeer::SHOWINFORM, ActiontypePeer::GENTIMETABLE, ActiontypePeer::SERVICE_ID, ActiontypePeer::QUOTATYPE_ID, ActiontypePeer::CONTEXT, ActiontypePeer::AMOUNT, ActiontypePeer::AMOUNTEVALUATION, ActiontypePeer::DEFAULTSTATUS, ActiontypePeer::DEFAULTDIRECTIONDATE, ActiontypePeer::DEFAULTPLANNEDENDDATE, ActiontypePeer::DEFAULTENDDATE, ActiontypePeer::DEFAULTEXECPERSON_ID, ActiontypePeer::DEFAULTPERSONINEVENT, ActiontypePeer::DEFAULTPERSONINEDITOR, ActiontypePeer::MAXOCCURSINEVENT, ActiontypePeer::SHOWTIME, ActiontypePeer::ISMES, ActiontypePeer::NOMENCLATIVESERVICE_ID, ActiontypePeer::ISPREFERABLE, ActiontypePeer::PRESCRIBEDTYPE_ID, ActiontypePeer::SHEDULE_ID, ActiontypePeer::ISREQUIREDCOORDINATION, ActiontypePeer::ISREQUIREDTISSUE, ActiontypePeer::TESTTUBETYPE_ID, ActiontypePeer::JOBTYPE_ID, ActiontypePeer::MNEM, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'CLAZZ', 'GROUP_ID', 'CODE', 'NAME', 'TITLE', 'FLATCODE', 'SEX', 'AGE', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'OFFICE', 'SHOWINFORM', 'GENTIMETABLE', 'SERVICE_ID', 'QUOTATYPE_ID', 'CONTEXT', 'AMOUNT', 'AMOUNTEVALUATION', 'DEFAULTSTATUS', 'DEFAULTDIRECTIONDATE', 'DEFAULTPLANNEDENDDATE', 'DEFAULTENDDATE', 'DEFAULTEXECPERSON_ID', 'DEFAULTPERSONINEVENT', 'DEFAULTPERSONINEDITOR', 'MAXOCCURSINEVENT', 'SHOWTIME', 'ISMES', 'NOMENCLATIVESERVICE_ID', 'ISPREFERABLE', 'PRESCRIBEDTYPE_ID', 'SHEDULE_ID', 'ISREQUIREDCOORDINATION', 'ISREQUIREDTISSUE', 'TESTTUBETYPE_ID', 'JOBTYPE_ID', 'MNEM', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'class', 'group_id', 'code', 'name', 'title', 'flatCode', 'sex', 'age', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'office', 'showInForm', 'genTimetable', 'service_id', 'quotaType_id', 'context', 'amount', 'amountEvaluation', 'defaultStatus', 'defaultDirectionDate', 'defaultPlannedEndDate', 'defaultEndDate', 'defaultExecPerson_id', 'defaultPersonInEvent', 'defaultPersonInEditor', 'maxOccursInEvent', 'showTime', 'isMES', 'nomenclativeService_id', 'isPreferable', 'prescribedType_id', 'shedule_id', 'isRequiredCoordination', 'isRequiredTissue', 'testTubeType_id', 'jobType_id', 'mnem', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ActiontypePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Class' => 6, 'GroupId' => 7, 'Code' => 8, 'Name' => 9, 'Title' => 10, 'Flatcode' => 11, 'Sex' => 12, 'Age' => 13, 'AgeBu' => 14, 'AgeBc' => 15, 'AgeEu' => 16, 'AgeEc' => 17, 'Office' => 18, 'Showinform' => 19, 'Gentimetable' => 20, 'ServiceId' => 21, 'QuotatypeId' => 22, 'Context' => 23, 'Amount' => 24, 'Amountevaluation' => 25, 'Defaultstatus' => 26, 'Defaultdirectiondate' => 27, 'Defaultplannedenddate' => 28, 'Defaultenddate' => 29, 'DefaultexecpersonId' => 30, 'Defaultpersoninevent' => 31, 'Defaultpersonineditor' => 32, 'Maxoccursinevent' => 33, 'Showtime' => 34, 'Ismes' => 35, 'NomenclativeserviceId' => 36, 'Ispreferable' => 37, 'PrescribedtypeId' => 38, 'SheduleId' => 39, 'Isrequiredcoordination' => 40, 'Isrequiredtissue' => 41, 'TesttubetypeId' => 42, 'JobtypeId' => 43, 'Mnem' => 44, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'class' => 6, 'groupId' => 7, 'code' => 8, 'name' => 9, 'title' => 10, 'flatcode' => 11, 'sex' => 12, 'age' => 13, 'ageBu' => 14, 'ageBc' => 15, 'ageEu' => 16, 'ageEc' => 17, 'office' => 18, 'showinform' => 19, 'gentimetable' => 20, 'serviceId' => 21, 'quotatypeId' => 22, 'context' => 23, 'amount' => 24, 'amountevaluation' => 25, 'defaultstatus' => 26, 'defaultdirectiondate' => 27, 'defaultplannedenddate' => 28, 'defaultenddate' => 29, 'defaultexecpersonId' => 30, 'defaultpersoninevent' => 31, 'defaultpersonineditor' => 32, 'maxoccursinevent' => 33, 'showtime' => 34, 'ismes' => 35, 'nomenclativeserviceId' => 36, 'ispreferable' => 37, 'prescribedtypeId' => 38, 'sheduleId' => 39, 'isrequiredcoordination' => 40, 'isrequiredtissue' => 41, 'testtubetypeId' => 42, 'jobtypeId' => 43, 'mnem' => 44, ),
        BasePeer::TYPE_COLNAME => array (ActiontypePeer::ID => 0, ActiontypePeer::CREATEDATETIME => 1, ActiontypePeer::CREATEPERSON_ID => 2, ActiontypePeer::MODIFYDATETIME => 3, ActiontypePeer::MODIFYPERSON_ID => 4, ActiontypePeer::DELETED => 5, ActiontypePeer::CLAZZ => 6, ActiontypePeer::GROUP_ID => 7, ActiontypePeer::CODE => 8, ActiontypePeer::NAME => 9, ActiontypePeer::TITLE => 10, ActiontypePeer::FLATCODE => 11, ActiontypePeer::SEX => 12, ActiontypePeer::AGE => 13, ActiontypePeer::AGE_BU => 14, ActiontypePeer::AGE_BC => 15, ActiontypePeer::AGE_EU => 16, ActiontypePeer::AGE_EC => 17, ActiontypePeer::OFFICE => 18, ActiontypePeer::SHOWINFORM => 19, ActiontypePeer::GENTIMETABLE => 20, ActiontypePeer::SERVICE_ID => 21, ActiontypePeer::QUOTATYPE_ID => 22, ActiontypePeer::CONTEXT => 23, ActiontypePeer::AMOUNT => 24, ActiontypePeer::AMOUNTEVALUATION => 25, ActiontypePeer::DEFAULTSTATUS => 26, ActiontypePeer::DEFAULTDIRECTIONDATE => 27, ActiontypePeer::DEFAULTPLANNEDENDDATE => 28, ActiontypePeer::DEFAULTENDDATE => 29, ActiontypePeer::DEFAULTEXECPERSON_ID => 30, ActiontypePeer::DEFAULTPERSONINEVENT => 31, ActiontypePeer::DEFAULTPERSONINEDITOR => 32, ActiontypePeer::MAXOCCURSINEVENT => 33, ActiontypePeer::SHOWTIME => 34, ActiontypePeer::ISMES => 35, ActiontypePeer::NOMENCLATIVESERVICE_ID => 36, ActiontypePeer::ISPREFERABLE => 37, ActiontypePeer::PRESCRIBEDTYPE_ID => 38, ActiontypePeer::SHEDULE_ID => 39, ActiontypePeer::ISREQUIREDCOORDINATION => 40, ActiontypePeer::ISREQUIREDTISSUE => 41, ActiontypePeer::TESTTUBETYPE_ID => 42, ActiontypePeer::JOBTYPE_ID => 43, ActiontypePeer::MNEM => 44, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'CLAZZ' => 6, 'GROUP_ID' => 7, 'CODE' => 8, 'NAME' => 9, 'TITLE' => 10, 'FLATCODE' => 11, 'SEX' => 12, 'AGE' => 13, 'AGE_BU' => 14, 'AGE_BC' => 15, 'AGE_EU' => 16, 'AGE_EC' => 17, 'OFFICE' => 18, 'SHOWINFORM' => 19, 'GENTIMETABLE' => 20, 'SERVICE_ID' => 21, 'QUOTATYPE_ID' => 22, 'CONTEXT' => 23, 'AMOUNT' => 24, 'AMOUNTEVALUATION' => 25, 'DEFAULTSTATUS' => 26, 'DEFAULTDIRECTIONDATE' => 27, 'DEFAULTPLANNEDENDDATE' => 28, 'DEFAULTENDDATE' => 29, 'DEFAULTEXECPERSON_ID' => 30, 'DEFAULTPERSONINEVENT' => 31, 'DEFAULTPERSONINEDITOR' => 32, 'MAXOCCURSINEVENT' => 33, 'SHOWTIME' => 34, 'ISMES' => 35, 'NOMENCLATIVESERVICE_ID' => 36, 'ISPREFERABLE' => 37, 'PRESCRIBEDTYPE_ID' => 38, 'SHEDULE_ID' => 39, 'ISREQUIREDCOORDINATION' => 40, 'ISREQUIREDTISSUE' => 41, 'TESTTUBETYPE_ID' => 42, 'JOBTYPE_ID' => 43, 'MNEM' => 44, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'class' => 6, 'group_id' => 7, 'code' => 8, 'name' => 9, 'title' => 10, 'flatCode' => 11, 'sex' => 12, 'age' => 13, 'age_bu' => 14, 'age_bc' => 15, 'age_eu' => 16, 'age_ec' => 17, 'office' => 18, 'showInForm' => 19, 'genTimetable' => 20, 'service_id' => 21, 'quotaType_id' => 22, 'context' => 23, 'amount' => 24, 'amountEvaluation' => 25, 'defaultStatus' => 26, 'defaultDirectionDate' => 27, 'defaultPlannedEndDate' => 28, 'defaultEndDate' => 29, 'defaultExecPerson_id' => 30, 'defaultPersonInEvent' => 31, 'defaultPersonInEditor' => 32, 'maxOccursInEvent' => 33, 'showTime' => 34, 'isMES' => 35, 'nomenclativeService_id' => 36, 'isPreferable' => 37, 'prescribedType_id' => 38, 'shedule_id' => 39, 'isRequiredCoordination' => 40, 'isRequiredTissue' => 41, 'testTubeType_id' => 42, 'jobType_id' => 43, 'mnem' => 44, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
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
        $toNames = ActiontypePeer::getFieldNames($toType);
        $key = isset(ActiontypePeer::$fieldKeys[$fromType][$name]) ? ActiontypePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ActiontypePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ActiontypePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ActiontypePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ActiontypePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ActiontypePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ActiontypePeer::ID);
            $criteria->addSelectColumn(ActiontypePeer::CREATEDATETIME);
            $criteria->addSelectColumn(ActiontypePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(ActiontypePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(ActiontypePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(ActiontypePeer::DELETED);
            $criteria->addSelectColumn(ActiontypePeer::CLAZZ);
            $criteria->addSelectColumn(ActiontypePeer::GROUP_ID);
            $criteria->addSelectColumn(ActiontypePeer::CODE);
            $criteria->addSelectColumn(ActiontypePeer::NAME);
            $criteria->addSelectColumn(ActiontypePeer::TITLE);
            $criteria->addSelectColumn(ActiontypePeer::FLATCODE);
            $criteria->addSelectColumn(ActiontypePeer::SEX);
            $criteria->addSelectColumn(ActiontypePeer::AGE);
            $criteria->addSelectColumn(ActiontypePeer::AGE_BU);
            $criteria->addSelectColumn(ActiontypePeer::AGE_BC);
            $criteria->addSelectColumn(ActiontypePeer::AGE_EU);
            $criteria->addSelectColumn(ActiontypePeer::AGE_EC);
            $criteria->addSelectColumn(ActiontypePeer::OFFICE);
            $criteria->addSelectColumn(ActiontypePeer::SHOWINFORM);
            $criteria->addSelectColumn(ActiontypePeer::GENTIMETABLE);
            $criteria->addSelectColumn(ActiontypePeer::SERVICE_ID);
            $criteria->addSelectColumn(ActiontypePeer::QUOTATYPE_ID);
            $criteria->addSelectColumn(ActiontypePeer::CONTEXT);
            $criteria->addSelectColumn(ActiontypePeer::AMOUNT);
            $criteria->addSelectColumn(ActiontypePeer::AMOUNTEVALUATION);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTSTATUS);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTDIRECTIONDATE);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTPLANNEDENDDATE);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTENDDATE);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTEXECPERSON_ID);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTPERSONINEVENT);
            $criteria->addSelectColumn(ActiontypePeer::DEFAULTPERSONINEDITOR);
            $criteria->addSelectColumn(ActiontypePeer::MAXOCCURSINEVENT);
            $criteria->addSelectColumn(ActiontypePeer::SHOWTIME);
            $criteria->addSelectColumn(ActiontypePeer::ISMES);
            $criteria->addSelectColumn(ActiontypePeer::NOMENCLATIVESERVICE_ID);
            $criteria->addSelectColumn(ActiontypePeer::ISPREFERABLE);
            $criteria->addSelectColumn(ActiontypePeer::PRESCRIBEDTYPE_ID);
            $criteria->addSelectColumn(ActiontypePeer::SHEDULE_ID);
            $criteria->addSelectColumn(ActiontypePeer::ISREQUIREDCOORDINATION);
            $criteria->addSelectColumn(ActiontypePeer::ISREQUIREDTISSUE);
            $criteria->addSelectColumn(ActiontypePeer::TESTTUBETYPE_ID);
            $criteria->addSelectColumn(ActiontypePeer::JOBTYPE_ID);
            $criteria->addSelectColumn(ActiontypePeer::MNEM);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.class');
            $criteria->addSelectColumn($alias . '.group_id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.flatCode');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.office');
            $criteria->addSelectColumn($alias . '.showInForm');
            $criteria->addSelectColumn($alias . '.genTimetable');
            $criteria->addSelectColumn($alias . '.service_id');
            $criteria->addSelectColumn($alias . '.quotaType_id');
            $criteria->addSelectColumn($alias . '.context');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.amountEvaluation');
            $criteria->addSelectColumn($alias . '.defaultStatus');
            $criteria->addSelectColumn($alias . '.defaultDirectionDate');
            $criteria->addSelectColumn($alias . '.defaultPlannedEndDate');
            $criteria->addSelectColumn($alias . '.defaultEndDate');
            $criteria->addSelectColumn($alias . '.defaultExecPerson_id');
            $criteria->addSelectColumn($alias . '.defaultPersonInEvent');
            $criteria->addSelectColumn($alias . '.defaultPersonInEditor');
            $criteria->addSelectColumn($alias . '.maxOccursInEvent');
            $criteria->addSelectColumn($alias . '.showTime');
            $criteria->addSelectColumn($alias . '.isMES');
            $criteria->addSelectColumn($alias . '.nomenclativeService_id');
            $criteria->addSelectColumn($alias . '.isPreferable');
            $criteria->addSelectColumn($alias . '.prescribedType_id');
            $criteria->addSelectColumn($alias . '.shedule_id');
            $criteria->addSelectColumn($alias . '.isRequiredCoordination');
            $criteria->addSelectColumn($alias . '.isRequiredTissue');
            $criteria->addSelectColumn($alias . '.testTubeType_id');
            $criteria->addSelectColumn($alias . '.jobType_id');
            $criteria->addSelectColumn($alias . '.mnem');
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
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actiontype
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ActiontypePeer::doSelect($critcopy, $con);
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
        return ActiontypePeer::populateObjects(ActiontypePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ActiontypePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

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
     * @param      Actiontype $obj A Actiontype object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ActiontypePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Actiontype object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Actiontype) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Actiontype object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ActiontypePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Actiontype Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ActiontypePeer::$instances[$key])) {
                return ActiontypePeer::$instances[$key];
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
        foreach (ActiontypePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ActiontypePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ActionType
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ActiontypeTissuetypePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ActiontypeTissuetypePeer::clearInstancePool();
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
        $cls = ActiontypePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ActiontypePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActiontypePeer::addInstanceToPool($obj, $key);
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
     * @return array (Actiontype object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ActiontypePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ActiontypePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ActiontypePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActiontypePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ActiontypePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Person table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPerson(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbjobtype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbjobtype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtesttubetype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbtesttubetype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);

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
     * Selects a collection of Actiontype objects pre-filled with their Person objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPerson(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol = ActiontypePeer::NUM_HYDRATE_COLUMNS;
        PersonPeer::addSelectColumns($criteria);

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Actiontype) to $obj2 (Person)
                $obj2->addActiontype($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Actiontype objects pre-filled with their Rbjobtype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbjobtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol = ActiontypePeer::NUM_HYDRATE_COLUMNS;
        RbjobtypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbjobtypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbjobtypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbjobtypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbjobtypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Actiontype) to $obj2 (Rbjobtype)
                $obj2->addActiontype($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Actiontype objects pre-filled with their Rbtesttubetype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbtesttubetype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol = ActiontypePeer::NUM_HYDRATE_COLUMNS;
        RbtesttubetypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbtesttubetypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbtesttubetypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbtesttubetypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbtesttubetypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Actiontype) to $obj2 (Rbtesttubetype)
                $obj2->addActiontype($obj1);

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
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);

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
     * Selects a collection of Actiontype objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol2 = ActiontypePeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        RbjobtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbjobtypePeer::NUM_HYDRATE_COLUMNS;

        RbtesttubetypePeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RbtesttubetypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Actiontype) to the collection in $obj2 (Person)
                $obj2->addActiontype($obj1);
            } // if joined row not null

            // Add objects for joined Rbjobtype rows

            $key3 = RbjobtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RbjobtypePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RbjobtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbjobtypePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Actiontype) to the collection in $obj3 (Rbjobtype)
                $obj3->addActiontype($obj1);
            } // if joined row not null

            // Add objects for joined Rbtesttubetype rows

            $key4 = RbtesttubetypePeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = RbtesttubetypePeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = RbtesttubetypePeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RbtesttubetypePeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Actiontype) to the collection in $obj4 (Rbtesttubetype)
                $obj4->addActiontype($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Person table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPerson(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbjobtype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbjobtype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbtesttubetype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbtesttubetype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ActiontypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

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
     * Selects a collection of Actiontype objects pre-filled with all related objects except Person.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPerson(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol2 = ActiontypePeer::NUM_HYDRATE_COLUMNS;

        RbjobtypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbjobtypePeer::NUM_HYDRATE_COLUMNS;

        RbtesttubetypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbtesttubetypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbjobtype rows

                $key2 = RbjobtypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbjobtypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbjobtypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbjobtypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Actiontype) to the collection in $obj2 (Rbjobtype)
                $obj2->addActiontype($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtesttubetype rows

                $key3 = RbtesttubetypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbtesttubetypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbtesttubetypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbtesttubetypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Actiontype) to the collection in $obj3 (Rbtesttubetype)
                $obj3->addActiontype($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Actiontype objects pre-filled with all related objects except Rbjobtype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbjobtype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol2 = ActiontypePeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        RbtesttubetypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbtesttubetypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::TESTTUBETYPE_ID, RbtesttubetypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Actiontype) to the collection in $obj2 (Person)
                $obj2->addActiontype($obj1);

            } // if joined row is not null

                // Add objects for joined Rbtesttubetype rows

                $key3 = RbtesttubetypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbtesttubetypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbtesttubetypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbtesttubetypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Actiontype) to the collection in $obj3 (Rbtesttubetype)
                $obj3->addActiontype($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Actiontype objects pre-filled with all related objects except Rbtesttubetype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Actiontype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbtesttubetype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ActiontypePeer::DATABASE_NAME);
        }

        ActiontypePeer::addSelectColumns($criteria);
        $startcol2 = ActiontypePeer::NUM_HYDRATE_COLUMNS;

        PersonPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PersonPeer::NUM_HYDRATE_COLUMNS;

        RbjobtypePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbjobtypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ActiontypePeer::DEFAULTEXECPERSON_ID, PersonPeer::ID, $join_behavior);

        $criteria->addJoin(ActiontypePeer::JOBTYPE_ID, RbjobtypePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ActiontypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ActiontypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ActiontypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ActiontypePeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Actiontype) to the collection in $obj2 (Person)
                $obj2->addActiontype($obj1);

            } // if joined row is not null

                // Add objects for joined Rbjobtype rows

                $key3 = RbjobtypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RbjobtypePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = RbjobtypePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbjobtypePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Actiontype) to the collection in $obj3 (Rbjobtype)
                $obj3->addActiontype($obj1);

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
        return Propel::getDatabaseMap(ActiontypePeer::DATABASE_NAME)->getTable(ActiontypePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseActiontypePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseActiontypePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ActiontypeTableMap());
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
        return ActiontypePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Actiontype or Criteria object.
     *
     * @param      mixed $values Criteria or Actiontype object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Actiontype object
        }

        if ($criteria->containsKey(ActiontypePeer::ID) && $criteria->keyContainsValue(ActiontypePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActiontypePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Actiontype or Criteria object.
     *
     * @param      mixed $values Criteria or Actiontype object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ActiontypePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ActiontypePeer::ID);
            $value = $criteria->remove(ActiontypePeer::ID);
            if ($value) {
                $selectCriteria->add(ActiontypePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ActiontypePeer::TABLE_NAME);
            }

        } else { // $values is Actiontype object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ActionType table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ActiontypePeer::doOnDeleteCascade(new Criteria(ActiontypePeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ActiontypePeer::TABLE_NAME, $con, ActiontypePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActiontypePeer::clearInstancePool();
            ActiontypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Actiontype or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Actiontype object or primary key or array of primary keys
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
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Actiontype) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActiontypePeer::DATABASE_NAME);
            $criteria->add(ActiontypePeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ActiontypePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ActiontypePeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ActiontypePeer::clearInstancePool();
            } elseif ($values instanceof Actiontype) { // it's a model object
                ActiontypePeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ActiontypePeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ActiontypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = ActiontypePeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related ActiontypeTissuetype objects
            $criteria = new Criteria(ActiontypeTissuetypePeer::DATABASE_NAME);

            $criteria->add(ActiontypeTissuetypePeer::MASTER_ID, $obj->getId());
            $affectedRows += ActiontypeTissuetypePeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Actiontype object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Actiontype $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ActiontypePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ActiontypePeer::TABLE_NAME);

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

        return BasePeer::doValidate(ActiontypePeer::DATABASE_NAME, ActiontypePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Actiontype
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ActiontypePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ActiontypePeer::DATABASE_NAME);
        $criteria->add(ActiontypePeer::ID, $pk);

        $v = ActiontypePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Actiontype[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ActiontypePeer::DATABASE_NAME);
            $criteria->add(ActiontypePeer::ID, $pks, Criteria::IN);
            $objs = ActiontypePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseActiontypePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseActiontypePeer::buildTableMap();

