<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Eventtype;
use Webmis\Models\EventtypePeer;
use Webmis\Models\RbcounterPeer;
use Webmis\Models\RbmedicalkindPeer;
use Webmis\Models\map\EventtypeTableMap;

/**
 * Base static class for performing query and update operations on the 'EventType' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'EventType';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Eventtype';

    /** the related TableMap class for this table */
    const TM_CLASS = 'EventtypeTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 54;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 54;

    /** the column name for the id field */
    const ID = 'EventType.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'EventType.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'EventType.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'EventType.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'EventType.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'EventType.deleted';

    /** the column name for the code field */
    const CODE = 'EventType.code';

    /** the column name for the name field */
    const NAME = 'EventType.name';

    /** the column name for the purpose_id field */
    const PURPOSE_ID = 'EventType.purpose_id';

    /** the column name for the finance_id field */
    const FINANCE_ID = 'EventType.finance_id';

    /** the column name for the scene_id field */
    const SCENE_ID = 'EventType.scene_id';

    /** the column name for the visitServiceModifier field */
    const VISITSERVICEMODIFIER = 'EventType.visitServiceModifier';

    /** the column name for the visitServiceFilter field */
    const VISITSERVICEFILTER = 'EventType.visitServiceFilter';

    /** the column name for the visitFinance field */
    const VISITFINANCE = 'EventType.visitFinance';

    /** the column name for the actionFinance field */
    const ACTIONFINANCE = 'EventType.actionFinance';

    /** the column name for the period field */
    const PERIOD = 'EventType.period';

    /** the column name for the singleInPeriod field */
    const SINGLEINPERIOD = 'EventType.singleInPeriod';

    /** the column name for the isLong field */
    const ISLONG = 'EventType.isLong';

    /** the column name for the dateInput field */
    const DATEINPUT = 'EventType.dateInput';

    /** the column name for the service_id field */
    const SERVICE_ID = 'EventType.service_id';

    /** the column name for the context field */
    const CONTEXT = 'EventType.context';

    /** the column name for the form field */
    const FORM = 'EventType.form';

    /** the column name for the minDuration field */
    const MINDURATION = 'EventType.minDuration';

    /** the column name for the maxDuration field */
    const MAXDURATION = 'EventType.maxDuration';

    /** the column name for the showStatusActionsInPlanner field */
    const SHOWSTATUSACTIONSINPLANNER = 'EventType.showStatusActionsInPlanner';

    /** the column name for the showDiagnosticActionsInPlanner field */
    const SHOWDIAGNOSTICACTIONSINPLANNER = 'EventType.showDiagnosticActionsInPlanner';

    /** the column name for the showCureActionsInPlanner field */
    const SHOWCUREACTIONSINPLANNER = 'EventType.showCureActionsInPlanner';

    /** the column name for the showMiscActionsInPlanner field */
    const SHOWMISCACTIONSINPLANNER = 'EventType.showMiscActionsInPlanner';

    /** the column name for the limitStatusActionsInput field */
    const LIMITSTATUSACTIONSINPUT = 'EventType.limitStatusActionsInput';

    /** the column name for the limitDiagnosticActionsInput field */
    const LIMITDIAGNOSTICACTIONSINPUT = 'EventType.limitDiagnosticActionsInput';

    /** the column name for the limitCureActionsInput field */
    const LIMITCUREACTIONSINPUT = 'EventType.limitCureActionsInput';

    /** the column name for the limitMiscActionsInput field */
    const LIMITMISCACTIONSINPUT = 'EventType.limitMiscActionsInput';

    /** the column name for the showTime field */
    const SHOWTIME = 'EventType.showTime';

    /** the column name for the medicalAidType_id field */
    const MEDICALAIDTYPE_ID = 'EventType.medicalAidType_id';

    /** the column name for the eventProfile_id field */
    const EVENTPROFILE_ID = 'EventType.eventProfile_id';

    /** the column name for the mesRequired field */
    const MESREQUIRED = 'EventType.mesRequired';

    /** the column name for the mesCodeMask field */
    const MESCODEMASK = 'EventType.mesCodeMask';

    /** the column name for the mesNameMask field */
    const MESNAMEMASK = 'EventType.mesNameMask';

    /** the column name for the counter_id field */
    const COUNTER_ID = 'EventType.counter_id';

    /** the column name for the isExternal field */
    const ISEXTERNAL = 'EventType.isExternal';

    /** the column name for the isAssistant field */
    const ISASSISTANT = 'EventType.isAssistant';

    /** the column name for the isCurator field */
    const ISCURATOR = 'EventType.isCurator';

    /** the column name for the canHavePayableActions field */
    const CANHAVEPAYABLEACTIONS = 'EventType.canHavePayableActions';

    /** the column name for the isRequiredCoordination field */
    const ISREQUIREDCOORDINATION = 'EventType.isRequiredCoordination';

    /** the column name for the isOrgStructurePriority field */
    const ISORGSTRUCTUREPRIORITY = 'EventType.isOrgStructurePriority';

    /** the column name for the isTakenTissue field */
    const ISTAKENTISSUE = 'EventType.isTakenTissue';

    /** the column name for the sex field */
    const SEX = 'EventType.sex';

    /** the column name for the age field */
    const AGE = 'EventType.age';

    /** the column name for the rbMedicalKind_id field */
    const RBMEDICALKIND_ID = 'EventType.rbMedicalKind_id';

    /** the column name for the age_bu field */
    const AGE_BU = 'EventType.age_bu';

    /** the column name for the age_bc field */
    const AGE_BC = 'EventType.age_bc';

    /** the column name for the age_eu field */
    const AGE_EU = 'EventType.age_eu';

    /** the column name for the age_ec field */
    const AGE_EC = 'EventType.age_ec';

    /** the column name for the requestType_id field */
    const REQUESTTYPE_ID = 'EventType.requestType_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Eventtype objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Eventtype[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. EventtypePeer::$fieldNames[EventtypePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Code', 'Name', 'PurposeId', 'FinanceId', 'SceneId', 'Visitservicemodifier', 'Visitservicefilter', 'Visitfinance', 'Actionfinance', 'Period', 'Singleinperiod', 'Islong', 'Dateinput', 'ServiceId', 'Context', 'Form', 'Minduration', 'Maxduration', 'Showstatusactionsinplanner', 'Showdiagnosticactionsinplanner', 'Showcureactionsinplanner', 'Showmiscactionsinplanner', 'Limitstatusactionsinput', 'Limitdiagnosticactionsinput', 'Limitcureactionsinput', 'Limitmiscactionsinput', 'Showtime', 'MedicalaidtypeId', 'EventprofileId', 'Mesrequired', 'Mescodemask', 'Mesnamemask', 'CounterId', 'Isexternal', 'Isassistant', 'Iscurator', 'Canhavepayableactions', 'Isrequiredcoordination', 'Isorgstructurepriority', 'Istakentissue', 'Sex', 'Age', 'RbmedicalkindId', 'AgeBu', 'AgeBc', 'AgeEu', 'AgeEc', 'RequesttypeId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'code', 'name', 'purposeId', 'financeId', 'sceneId', 'visitservicemodifier', 'visitservicefilter', 'visitfinance', 'actionfinance', 'period', 'singleinperiod', 'islong', 'dateinput', 'serviceId', 'context', 'form', 'minduration', 'maxduration', 'showstatusactionsinplanner', 'showdiagnosticactionsinplanner', 'showcureactionsinplanner', 'showmiscactionsinplanner', 'limitstatusactionsinput', 'limitdiagnosticactionsinput', 'limitcureactionsinput', 'limitmiscactionsinput', 'showtime', 'medicalaidtypeId', 'eventprofileId', 'mesrequired', 'mescodemask', 'mesnamemask', 'counterId', 'isexternal', 'isassistant', 'iscurator', 'canhavepayableactions', 'isrequiredcoordination', 'isorgstructurepriority', 'istakentissue', 'sex', 'age', 'rbmedicalkindId', 'ageBu', 'ageBc', 'ageEu', 'ageEc', 'requesttypeId', ),
        BasePeer::TYPE_COLNAME => array (EventtypePeer::ID, EventtypePeer::CREATEDATETIME, EventtypePeer::CREATEPERSON_ID, EventtypePeer::MODIFYDATETIME, EventtypePeer::MODIFYPERSON_ID, EventtypePeer::DELETED, EventtypePeer::CODE, EventtypePeer::NAME, EventtypePeer::PURPOSE_ID, EventtypePeer::FINANCE_ID, EventtypePeer::SCENE_ID, EventtypePeer::VISITSERVICEMODIFIER, EventtypePeer::VISITSERVICEFILTER, EventtypePeer::VISITFINANCE, EventtypePeer::ACTIONFINANCE, EventtypePeer::PERIOD, EventtypePeer::SINGLEINPERIOD, EventtypePeer::ISLONG, EventtypePeer::DATEINPUT, EventtypePeer::SERVICE_ID, EventtypePeer::CONTEXT, EventtypePeer::FORM, EventtypePeer::MINDURATION, EventtypePeer::MAXDURATION, EventtypePeer::SHOWSTATUSACTIONSINPLANNER, EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER, EventtypePeer::SHOWCUREACTIONSINPLANNER, EventtypePeer::SHOWMISCACTIONSINPLANNER, EventtypePeer::LIMITSTATUSACTIONSINPUT, EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT, EventtypePeer::LIMITCUREACTIONSINPUT, EventtypePeer::LIMITMISCACTIONSINPUT, EventtypePeer::SHOWTIME, EventtypePeer::MEDICALAIDTYPE_ID, EventtypePeer::EVENTPROFILE_ID, EventtypePeer::MESREQUIRED, EventtypePeer::MESCODEMASK, EventtypePeer::MESNAMEMASK, EventtypePeer::COUNTER_ID, EventtypePeer::ISEXTERNAL, EventtypePeer::ISASSISTANT, EventtypePeer::ISCURATOR, EventtypePeer::CANHAVEPAYABLEACTIONS, EventtypePeer::ISREQUIREDCOORDINATION, EventtypePeer::ISORGSTRUCTUREPRIORITY, EventtypePeer::ISTAKENTISSUE, EventtypePeer::SEX, EventtypePeer::AGE, EventtypePeer::RBMEDICALKIND_ID, EventtypePeer::AGE_BU, EventtypePeer::AGE_BC, EventtypePeer::AGE_EU, EventtypePeer::AGE_EC, EventtypePeer::REQUESTTYPE_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'CODE', 'NAME', 'PURPOSE_ID', 'FINANCE_ID', 'SCENE_ID', 'VISITSERVICEMODIFIER', 'VISITSERVICEFILTER', 'VISITFINANCE', 'ACTIONFINANCE', 'PERIOD', 'SINGLEINPERIOD', 'ISLONG', 'DATEINPUT', 'SERVICE_ID', 'CONTEXT', 'FORM', 'MINDURATION', 'MAXDURATION', 'SHOWSTATUSACTIONSINPLANNER', 'SHOWDIAGNOSTICACTIONSINPLANNER', 'SHOWCUREACTIONSINPLANNER', 'SHOWMISCACTIONSINPLANNER', 'LIMITSTATUSACTIONSINPUT', 'LIMITDIAGNOSTICACTIONSINPUT', 'LIMITCUREACTIONSINPUT', 'LIMITMISCACTIONSINPUT', 'SHOWTIME', 'MEDICALAIDTYPE_ID', 'EVENTPROFILE_ID', 'MESREQUIRED', 'MESCODEMASK', 'MESNAMEMASK', 'COUNTER_ID', 'ISEXTERNAL', 'ISASSISTANT', 'ISCURATOR', 'CANHAVEPAYABLEACTIONS', 'ISREQUIREDCOORDINATION', 'ISORGSTRUCTUREPRIORITY', 'ISTAKENTISSUE', 'SEX', 'AGE', 'RBMEDICALKIND_ID', 'AGE_BU', 'AGE_BC', 'AGE_EU', 'AGE_EC', 'REQUESTTYPE_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'code', 'name', 'purpose_id', 'finance_id', 'scene_id', 'visitServiceModifier', 'visitServiceFilter', 'visitFinance', 'actionFinance', 'period', 'singleInPeriod', 'isLong', 'dateInput', 'service_id', 'context', 'form', 'minDuration', 'maxDuration', 'showStatusActionsInPlanner', 'showDiagnosticActionsInPlanner', 'showCureActionsInPlanner', 'showMiscActionsInPlanner', 'limitStatusActionsInput', 'limitDiagnosticActionsInput', 'limitCureActionsInput', 'limitMiscActionsInput', 'showTime', 'medicalAidType_id', 'eventProfile_id', 'mesRequired', 'mesCodeMask', 'mesNameMask', 'counter_id', 'isExternal', 'isAssistant', 'isCurator', 'canHavePayableActions', 'isRequiredCoordination', 'isOrgStructurePriority', 'isTakenTissue', 'sex', 'age', 'rbMedicalKind_id', 'age_bu', 'age_bc', 'age_eu', 'age_ec', 'requestType_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. EventtypePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Code' => 6, 'Name' => 7, 'PurposeId' => 8, 'FinanceId' => 9, 'SceneId' => 10, 'Visitservicemodifier' => 11, 'Visitservicefilter' => 12, 'Visitfinance' => 13, 'Actionfinance' => 14, 'Period' => 15, 'Singleinperiod' => 16, 'Islong' => 17, 'Dateinput' => 18, 'ServiceId' => 19, 'Context' => 20, 'Form' => 21, 'Minduration' => 22, 'Maxduration' => 23, 'Showstatusactionsinplanner' => 24, 'Showdiagnosticactionsinplanner' => 25, 'Showcureactionsinplanner' => 26, 'Showmiscactionsinplanner' => 27, 'Limitstatusactionsinput' => 28, 'Limitdiagnosticactionsinput' => 29, 'Limitcureactionsinput' => 30, 'Limitmiscactionsinput' => 31, 'Showtime' => 32, 'MedicalaidtypeId' => 33, 'EventprofileId' => 34, 'Mesrequired' => 35, 'Mescodemask' => 36, 'Mesnamemask' => 37, 'CounterId' => 38, 'Isexternal' => 39, 'Isassistant' => 40, 'Iscurator' => 41, 'Canhavepayableactions' => 42, 'Isrequiredcoordination' => 43, 'Isorgstructurepriority' => 44, 'Istakentissue' => 45, 'Sex' => 46, 'Age' => 47, 'RbmedicalkindId' => 48, 'AgeBu' => 49, 'AgeBc' => 50, 'AgeEu' => 51, 'AgeEc' => 52, 'RequesttypeId' => 53, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'code' => 6, 'name' => 7, 'purposeId' => 8, 'financeId' => 9, 'sceneId' => 10, 'visitservicemodifier' => 11, 'visitservicefilter' => 12, 'visitfinance' => 13, 'actionfinance' => 14, 'period' => 15, 'singleinperiod' => 16, 'islong' => 17, 'dateinput' => 18, 'serviceId' => 19, 'context' => 20, 'form' => 21, 'minduration' => 22, 'maxduration' => 23, 'showstatusactionsinplanner' => 24, 'showdiagnosticactionsinplanner' => 25, 'showcureactionsinplanner' => 26, 'showmiscactionsinplanner' => 27, 'limitstatusactionsinput' => 28, 'limitdiagnosticactionsinput' => 29, 'limitcureactionsinput' => 30, 'limitmiscactionsinput' => 31, 'showtime' => 32, 'medicalaidtypeId' => 33, 'eventprofileId' => 34, 'mesrequired' => 35, 'mescodemask' => 36, 'mesnamemask' => 37, 'counterId' => 38, 'isexternal' => 39, 'isassistant' => 40, 'iscurator' => 41, 'canhavepayableactions' => 42, 'isrequiredcoordination' => 43, 'isorgstructurepriority' => 44, 'istakentissue' => 45, 'sex' => 46, 'age' => 47, 'rbmedicalkindId' => 48, 'ageBu' => 49, 'ageBc' => 50, 'ageEu' => 51, 'ageEc' => 52, 'requesttypeId' => 53, ),
        BasePeer::TYPE_COLNAME => array (EventtypePeer::ID => 0, EventtypePeer::CREATEDATETIME => 1, EventtypePeer::CREATEPERSON_ID => 2, EventtypePeer::MODIFYDATETIME => 3, EventtypePeer::MODIFYPERSON_ID => 4, EventtypePeer::DELETED => 5, EventtypePeer::CODE => 6, EventtypePeer::NAME => 7, EventtypePeer::PURPOSE_ID => 8, EventtypePeer::FINANCE_ID => 9, EventtypePeer::SCENE_ID => 10, EventtypePeer::VISITSERVICEMODIFIER => 11, EventtypePeer::VISITSERVICEFILTER => 12, EventtypePeer::VISITFINANCE => 13, EventtypePeer::ACTIONFINANCE => 14, EventtypePeer::PERIOD => 15, EventtypePeer::SINGLEINPERIOD => 16, EventtypePeer::ISLONG => 17, EventtypePeer::DATEINPUT => 18, EventtypePeer::SERVICE_ID => 19, EventtypePeer::CONTEXT => 20, EventtypePeer::FORM => 21, EventtypePeer::MINDURATION => 22, EventtypePeer::MAXDURATION => 23, EventtypePeer::SHOWSTATUSACTIONSINPLANNER => 24, EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER => 25, EventtypePeer::SHOWCUREACTIONSINPLANNER => 26, EventtypePeer::SHOWMISCACTIONSINPLANNER => 27, EventtypePeer::LIMITSTATUSACTIONSINPUT => 28, EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT => 29, EventtypePeer::LIMITCUREACTIONSINPUT => 30, EventtypePeer::LIMITMISCACTIONSINPUT => 31, EventtypePeer::SHOWTIME => 32, EventtypePeer::MEDICALAIDTYPE_ID => 33, EventtypePeer::EVENTPROFILE_ID => 34, EventtypePeer::MESREQUIRED => 35, EventtypePeer::MESCODEMASK => 36, EventtypePeer::MESNAMEMASK => 37, EventtypePeer::COUNTER_ID => 38, EventtypePeer::ISEXTERNAL => 39, EventtypePeer::ISASSISTANT => 40, EventtypePeer::ISCURATOR => 41, EventtypePeer::CANHAVEPAYABLEACTIONS => 42, EventtypePeer::ISREQUIREDCOORDINATION => 43, EventtypePeer::ISORGSTRUCTUREPRIORITY => 44, EventtypePeer::ISTAKENTISSUE => 45, EventtypePeer::SEX => 46, EventtypePeer::AGE => 47, EventtypePeer::RBMEDICALKIND_ID => 48, EventtypePeer::AGE_BU => 49, EventtypePeer::AGE_BC => 50, EventtypePeer::AGE_EU => 51, EventtypePeer::AGE_EC => 52, EventtypePeer::REQUESTTYPE_ID => 53, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'CODE' => 6, 'NAME' => 7, 'PURPOSE_ID' => 8, 'FINANCE_ID' => 9, 'SCENE_ID' => 10, 'VISITSERVICEMODIFIER' => 11, 'VISITSERVICEFILTER' => 12, 'VISITFINANCE' => 13, 'ACTIONFINANCE' => 14, 'PERIOD' => 15, 'SINGLEINPERIOD' => 16, 'ISLONG' => 17, 'DATEINPUT' => 18, 'SERVICE_ID' => 19, 'CONTEXT' => 20, 'FORM' => 21, 'MINDURATION' => 22, 'MAXDURATION' => 23, 'SHOWSTATUSACTIONSINPLANNER' => 24, 'SHOWDIAGNOSTICACTIONSINPLANNER' => 25, 'SHOWCUREACTIONSINPLANNER' => 26, 'SHOWMISCACTIONSINPLANNER' => 27, 'LIMITSTATUSACTIONSINPUT' => 28, 'LIMITDIAGNOSTICACTIONSINPUT' => 29, 'LIMITCUREACTIONSINPUT' => 30, 'LIMITMISCACTIONSINPUT' => 31, 'SHOWTIME' => 32, 'MEDICALAIDTYPE_ID' => 33, 'EVENTPROFILE_ID' => 34, 'MESREQUIRED' => 35, 'MESCODEMASK' => 36, 'MESNAMEMASK' => 37, 'COUNTER_ID' => 38, 'ISEXTERNAL' => 39, 'ISASSISTANT' => 40, 'ISCURATOR' => 41, 'CANHAVEPAYABLEACTIONS' => 42, 'ISREQUIREDCOORDINATION' => 43, 'ISORGSTRUCTUREPRIORITY' => 44, 'ISTAKENTISSUE' => 45, 'SEX' => 46, 'AGE' => 47, 'RBMEDICALKIND_ID' => 48, 'AGE_BU' => 49, 'AGE_BC' => 50, 'AGE_EU' => 51, 'AGE_EC' => 52, 'REQUESTTYPE_ID' => 53, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'code' => 6, 'name' => 7, 'purpose_id' => 8, 'finance_id' => 9, 'scene_id' => 10, 'visitServiceModifier' => 11, 'visitServiceFilter' => 12, 'visitFinance' => 13, 'actionFinance' => 14, 'period' => 15, 'singleInPeriod' => 16, 'isLong' => 17, 'dateInput' => 18, 'service_id' => 19, 'context' => 20, 'form' => 21, 'minDuration' => 22, 'maxDuration' => 23, 'showStatusActionsInPlanner' => 24, 'showDiagnosticActionsInPlanner' => 25, 'showCureActionsInPlanner' => 26, 'showMiscActionsInPlanner' => 27, 'limitStatusActionsInput' => 28, 'limitDiagnosticActionsInput' => 29, 'limitCureActionsInput' => 30, 'limitMiscActionsInput' => 31, 'showTime' => 32, 'medicalAidType_id' => 33, 'eventProfile_id' => 34, 'mesRequired' => 35, 'mesCodeMask' => 36, 'mesNameMask' => 37, 'counter_id' => 38, 'isExternal' => 39, 'isAssistant' => 40, 'isCurator' => 41, 'canHavePayableActions' => 42, 'isRequiredCoordination' => 43, 'isOrgStructurePriority' => 44, 'isTakenTissue' => 45, 'sex' => 46, 'age' => 47, 'rbMedicalKind_id' => 48, 'age_bu' => 49, 'age_bc' => 50, 'age_eu' => 51, 'age_ec' => 52, 'requestType_id' => 53, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, )
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
        $toNames = EventtypePeer::getFieldNames($toType);
        $key = isset(EventtypePeer::$fieldKeys[$fromType][$name]) ? EventtypePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(EventtypePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, EventtypePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return EventtypePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. EventtypePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(EventtypePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(EventtypePeer::ID);
            $criteria->addSelectColumn(EventtypePeer::CREATEDATETIME);
            $criteria->addSelectColumn(EventtypePeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(EventtypePeer::MODIFYDATETIME);
            $criteria->addSelectColumn(EventtypePeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(EventtypePeer::DELETED);
            $criteria->addSelectColumn(EventtypePeer::CODE);
            $criteria->addSelectColumn(EventtypePeer::NAME);
            $criteria->addSelectColumn(EventtypePeer::PURPOSE_ID);
            $criteria->addSelectColumn(EventtypePeer::FINANCE_ID);
            $criteria->addSelectColumn(EventtypePeer::SCENE_ID);
            $criteria->addSelectColumn(EventtypePeer::VISITSERVICEMODIFIER);
            $criteria->addSelectColumn(EventtypePeer::VISITSERVICEFILTER);
            $criteria->addSelectColumn(EventtypePeer::VISITFINANCE);
            $criteria->addSelectColumn(EventtypePeer::ACTIONFINANCE);
            $criteria->addSelectColumn(EventtypePeer::PERIOD);
            $criteria->addSelectColumn(EventtypePeer::SINGLEINPERIOD);
            $criteria->addSelectColumn(EventtypePeer::ISLONG);
            $criteria->addSelectColumn(EventtypePeer::DATEINPUT);
            $criteria->addSelectColumn(EventtypePeer::SERVICE_ID);
            $criteria->addSelectColumn(EventtypePeer::CONTEXT);
            $criteria->addSelectColumn(EventtypePeer::FORM);
            $criteria->addSelectColumn(EventtypePeer::MINDURATION);
            $criteria->addSelectColumn(EventtypePeer::MAXDURATION);
            $criteria->addSelectColumn(EventtypePeer::SHOWSTATUSACTIONSINPLANNER);
            $criteria->addSelectColumn(EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER);
            $criteria->addSelectColumn(EventtypePeer::SHOWCUREACTIONSINPLANNER);
            $criteria->addSelectColumn(EventtypePeer::SHOWMISCACTIONSINPLANNER);
            $criteria->addSelectColumn(EventtypePeer::LIMITSTATUSACTIONSINPUT);
            $criteria->addSelectColumn(EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT);
            $criteria->addSelectColumn(EventtypePeer::LIMITCUREACTIONSINPUT);
            $criteria->addSelectColumn(EventtypePeer::LIMITMISCACTIONSINPUT);
            $criteria->addSelectColumn(EventtypePeer::SHOWTIME);
            $criteria->addSelectColumn(EventtypePeer::MEDICALAIDTYPE_ID);
            $criteria->addSelectColumn(EventtypePeer::EVENTPROFILE_ID);
            $criteria->addSelectColumn(EventtypePeer::MESREQUIRED);
            $criteria->addSelectColumn(EventtypePeer::MESCODEMASK);
            $criteria->addSelectColumn(EventtypePeer::MESNAMEMASK);
            $criteria->addSelectColumn(EventtypePeer::COUNTER_ID);
            $criteria->addSelectColumn(EventtypePeer::ISEXTERNAL);
            $criteria->addSelectColumn(EventtypePeer::ISASSISTANT);
            $criteria->addSelectColumn(EventtypePeer::ISCURATOR);
            $criteria->addSelectColumn(EventtypePeer::CANHAVEPAYABLEACTIONS);
            $criteria->addSelectColumn(EventtypePeer::ISREQUIREDCOORDINATION);
            $criteria->addSelectColumn(EventtypePeer::ISORGSTRUCTUREPRIORITY);
            $criteria->addSelectColumn(EventtypePeer::ISTAKENTISSUE);
            $criteria->addSelectColumn(EventtypePeer::SEX);
            $criteria->addSelectColumn(EventtypePeer::AGE);
            $criteria->addSelectColumn(EventtypePeer::RBMEDICALKIND_ID);
            $criteria->addSelectColumn(EventtypePeer::AGE_BU);
            $criteria->addSelectColumn(EventtypePeer::AGE_BC);
            $criteria->addSelectColumn(EventtypePeer::AGE_EU);
            $criteria->addSelectColumn(EventtypePeer::AGE_EC);
            $criteria->addSelectColumn(EventtypePeer::REQUESTTYPE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.purpose_id');
            $criteria->addSelectColumn($alias . '.finance_id');
            $criteria->addSelectColumn($alias . '.scene_id');
            $criteria->addSelectColumn($alias . '.visitServiceModifier');
            $criteria->addSelectColumn($alias . '.visitServiceFilter');
            $criteria->addSelectColumn($alias . '.visitFinance');
            $criteria->addSelectColumn($alias . '.actionFinance');
            $criteria->addSelectColumn($alias . '.period');
            $criteria->addSelectColumn($alias . '.singleInPeriod');
            $criteria->addSelectColumn($alias . '.isLong');
            $criteria->addSelectColumn($alias . '.dateInput');
            $criteria->addSelectColumn($alias . '.service_id');
            $criteria->addSelectColumn($alias . '.context');
            $criteria->addSelectColumn($alias . '.form');
            $criteria->addSelectColumn($alias . '.minDuration');
            $criteria->addSelectColumn($alias . '.maxDuration');
            $criteria->addSelectColumn($alias . '.showStatusActionsInPlanner');
            $criteria->addSelectColumn($alias . '.showDiagnosticActionsInPlanner');
            $criteria->addSelectColumn($alias . '.showCureActionsInPlanner');
            $criteria->addSelectColumn($alias . '.showMiscActionsInPlanner');
            $criteria->addSelectColumn($alias . '.limitStatusActionsInput');
            $criteria->addSelectColumn($alias . '.limitDiagnosticActionsInput');
            $criteria->addSelectColumn($alias . '.limitCureActionsInput');
            $criteria->addSelectColumn($alias . '.limitMiscActionsInput');
            $criteria->addSelectColumn($alias . '.showTime');
            $criteria->addSelectColumn($alias . '.medicalAidType_id');
            $criteria->addSelectColumn($alias . '.eventProfile_id');
            $criteria->addSelectColumn($alias . '.mesRequired');
            $criteria->addSelectColumn($alias . '.mesCodeMask');
            $criteria->addSelectColumn($alias . '.mesNameMask');
            $criteria->addSelectColumn($alias . '.counter_id');
            $criteria->addSelectColumn($alias . '.isExternal');
            $criteria->addSelectColumn($alias . '.isAssistant');
            $criteria->addSelectColumn($alias . '.isCurator');
            $criteria->addSelectColumn($alias . '.canHavePayableActions');
            $criteria->addSelectColumn($alias . '.isRequiredCoordination');
            $criteria->addSelectColumn($alias . '.isOrgStructurePriority');
            $criteria->addSelectColumn($alias . '.isTakenTissue');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.rbMedicalKind_id');
            $criteria->addSelectColumn($alias . '.age_bu');
            $criteria->addSelectColumn($alias . '.age_bc');
            $criteria->addSelectColumn($alias . '.age_eu');
            $criteria->addSelectColumn($alias . '.age_ec');
            $criteria->addSelectColumn($alias . '.requestType_id');
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
        $criteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(EventtypePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Eventtype
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = EventtypePeer::doSelect($critcopy, $con);
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
        return EventtypePeer::populateObjects(EventtypePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            EventtypePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

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
     * @param      Eventtype $obj A Eventtype object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            EventtypePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Eventtype object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Eventtype) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Eventtype object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(EventtypePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Eventtype Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(EventtypePeer::$instances[$key])) {
                return EventtypePeer::$instances[$key];
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
        foreach (EventtypePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        EventtypePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to EventType
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
        $cls = EventtypePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = EventtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = EventtypePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EventtypePeer::addInstanceToPool($obj, $key);
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
     * @return array (Eventtype object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = EventtypePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = EventtypePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + EventtypePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EventtypePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            EventtypePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbcounter table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbcounter(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventtypePeer::COUNTER_ID, RbcounterPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbmedicalkind table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRbmedicalkind(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventtypePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

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
     * Selects a collection of Eventtype objects pre-filled with their Rbcounter objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Eventtype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbcounter(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventtypePeer::DATABASE_NAME);
        }

        EventtypePeer::addSelectColumns($criteria);
        $startcol = EventtypePeer::NUM_HYDRATE_COLUMNS;
        RbcounterPeer::addSelectColumns($criteria);

        $criteria->addJoin(EventtypePeer::COUNTER_ID, RbcounterPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventtypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = EventtypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventtypePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbcounterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbcounterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbcounterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbcounterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Eventtype) to $obj2 (Rbcounter)
                $obj2->addEventtype($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Eventtype objects pre-filled with their Rbmedicalkind objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Eventtype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRbmedicalkind(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventtypePeer::DATABASE_NAME);
        }

        EventtypePeer::addSelectColumns($criteria);
        $startcol = EventtypePeer::NUM_HYDRATE_COLUMNS;
        RbmedicalkindPeer::addSelectColumns($criteria);

        $criteria->addJoin(EventtypePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventtypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = EventtypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventtypePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Eventtype) to $obj2 (Rbmedicalkind)
                $obj2->addEventtype($obj1);

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
        $criteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventtypePeer::COUNTER_ID, RbcounterPeer::ID, $join_behavior);

        $criteria->addJoin(EventtypePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

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
     * Selects a collection of Eventtype objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Eventtype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventtypePeer::DATABASE_NAME);
        }

        EventtypePeer::addSelectColumns($criteria);
        $startcol2 = EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbcounterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbcounterPeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(EventtypePeer::COUNTER_ID, RbcounterPeer::ID, $join_behavior);

        $criteria->addJoin(EventtypePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventtypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = EventtypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventtypePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Rbcounter rows

            $key2 = RbcounterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RbcounterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RbcounterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbcounterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Eventtype) to the collection in $obj2 (Rbcounter)
                $obj2->addEventtype($obj1);
            } // if joined row not null

            // Add objects for joined Rbmedicalkind rows

            $key3 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RbmedicalkindPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RbmedicalkindPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RbmedicalkindPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Eventtype) to the collection in $obj3 (Rbmedicalkind)
                $obj3->addEventtype($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Rbcounter table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbcounter(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventtypePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Rbmedicalkind table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRbmedicalkind(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventtypePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventtypePeer::COUNTER_ID, RbcounterPeer::ID, $join_behavior);

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
     * Selects a collection of Eventtype objects pre-filled with all related objects except Rbcounter.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Eventtype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbcounter(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventtypePeer::DATABASE_NAME);
        }

        EventtypePeer::addSelectColumns($criteria);
        $startcol2 = EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbmedicalkindPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbmedicalkindPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(EventtypePeer::RBMEDICALKIND_ID, RbmedicalkindPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventtypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = EventtypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventtypePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbmedicalkind rows

                $key2 = RbmedicalkindPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbmedicalkindPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbmedicalkindPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbmedicalkindPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Eventtype) to the collection in $obj2 (Rbmedicalkind)
                $obj2->addEventtype($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Eventtype objects pre-filled with all related objects except Rbmedicalkind.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Eventtype objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRbmedicalkind(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventtypePeer::DATABASE_NAME);
        }

        EventtypePeer::addSelectColumns($criteria);
        $startcol2 = EventtypePeer::NUM_HYDRATE_COLUMNS;

        RbcounterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RbcounterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(EventtypePeer::COUNTER_ID, RbcounterPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventtypePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventtypePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = EventtypePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventtypePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Rbcounter rows

                $key2 = RbcounterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RbcounterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = RbcounterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RbcounterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Eventtype) to the collection in $obj2 (Rbcounter)
                $obj2->addEventtype($obj1);

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
        return Propel::getDatabaseMap(EventtypePeer::DATABASE_NAME)->getTable(EventtypePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseEventtypePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseEventtypePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new EventtypeTableMap());
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
        return EventtypePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Eventtype or Criteria object.
     *
     * @param      mixed $values Criteria or Eventtype object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Eventtype object
        }

        if ($criteria->containsKey(EventtypePeer::ID) && $criteria->keyContainsValue(EventtypePeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventtypePeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Eventtype or Criteria object.
     *
     * @param      mixed $values Criteria or Eventtype object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(EventtypePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(EventtypePeer::ID);
            $value = $criteria->remove(EventtypePeer::ID);
            if ($value) {
                $selectCriteria->add(EventtypePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(EventtypePeer::TABLE_NAME);
            }

        } else { // $values is Eventtype object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the EventType table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(EventtypePeer::TABLE_NAME, $con, EventtypePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EventtypePeer::clearInstancePool();
            EventtypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Eventtype or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Eventtype object or primary key or array of primary keys
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
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            EventtypePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Eventtype) { // it's a model object
            // invalidate the cache for this single object
            EventtypePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EventtypePeer::DATABASE_NAME);
            $criteria->add(EventtypePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                EventtypePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(EventtypePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            EventtypePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Eventtype object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Eventtype $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(EventtypePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(EventtypePeer::TABLE_NAME);

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

        return BasePeer::doValidate(EventtypePeer::DATABASE_NAME, EventtypePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Eventtype
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = EventtypePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(EventtypePeer::DATABASE_NAME);
        $criteria->add(EventtypePeer::ID, $pk);

        $v = EventtypePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Eventtype[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(EventtypePeer::DATABASE_NAME);
            $criteria->add(EventtypePeer::ID, $pks, Criteria::IN);
            $objs = EventtypePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseEventtypePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEventtypePeer::buildTableMap();

