<?php

namespace Webmis\Models\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Webmis\Models\Organisation;
use Webmis\Models\OrganisationPeer;
use Webmis\Models\map\OrganisationTableMap;

/**
 * Base static class for performing query and update operations on the 'Organisation' table.
 *
 *
 *
 * @package propel.generator.Webmis.Models.om
 */
abstract class BaseOrganisationPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'Webmis-API';

    /** the table name for this class */
    const TABLE_NAME = 'Organisation';

    /** the related Propel class for this table */
    const OM_CLASS = 'Webmis\\Models\\Organisation';

    /** the related TableMap class for this table */
    const TM_CLASS = 'OrganisationTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 38;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 38;

    /** the column name for the id field */
    const ID = 'Organisation.id';

    /** the column name for the createDatetime field */
    const CREATEDATETIME = 'Organisation.createDatetime';

    /** the column name for the createPerson_id field */
    const CREATEPERSON_ID = 'Organisation.createPerson_id';

    /** the column name for the modifyDatetime field */
    const MODIFYDATETIME = 'Organisation.modifyDatetime';

    /** the column name for the modifyPerson_id field */
    const MODIFYPERSON_ID = 'Organisation.modifyPerson_id';

    /** the column name for the deleted field */
    const DELETED = 'Organisation.deleted';

    /** the column name for the fullName field */
    const FULLNAME = 'Organisation.fullName';

    /** the column name for the shortName field */
    const SHORTNAME = 'Organisation.shortName';

    /** the column name for the title field */
    const TITLE = 'Organisation.title';

    /** the column name for the net_id field */
    const NET_ID = 'Organisation.net_id';

    /** the column name for the infisCode field */
    const INFISCODE = 'Organisation.infisCode';

    /** the column name for the obsoleteInfisCode field */
    const OBSOLETEINFISCODE = 'Organisation.obsoleteInfisCode';

    /** the column name for the OKVED field */
    const OKVED = 'Organisation.OKVED';

    /** the column name for the INN field */
    const INN = 'Organisation.INN';

    /** the column name for the KPP field */
    const KPP = 'Organisation.KPP';

    /** the column name for the OGRN field */
    const OGRN = 'Organisation.OGRN';

    /** the column name for the OKATO field */
    const OKATO = 'Organisation.OKATO';

    /** the column name for the OKPF_code field */
    const OKPF_CODE = 'Organisation.OKPF_code';

    /** the column name for the OKPF_id field */
    const OKPF_ID = 'Organisation.OKPF_id';

    /** the column name for the OKFS_code field */
    const OKFS_CODE = 'Organisation.OKFS_code';

    /** the column name for the OKFS_id field */
    const OKFS_ID = 'Organisation.OKFS_id';

    /** the column name for the OKPO field */
    const OKPO = 'Organisation.OKPO';

    /** the column name for the FSS field */
    const FSS = 'Organisation.FSS';

    /** the column name for the region field */
    const REGION = 'Organisation.region';

    /** the column name for the Address field */
    const ADDRESS = 'Organisation.Address';

    /** the column name for the chief field */
    const CHIEF = 'Organisation.chief';

    /** the column name for the phone field */
    const PHONE = 'Organisation.phone';

    /** the column name for the accountant field */
    const ACCOUNTANT = 'Organisation.accountant';

    /** the column name for the isInsurer field */
    const ISINSURER = 'Organisation.isInsurer';

    /** the column name for the compulsoryServiceStop field */
    const COMPULSORYSERVICESTOP = 'Organisation.compulsoryServiceStop';

    /** the column name for the voluntaryServiceStop field */
    const VOLUNTARYSERVICESTOP = 'Organisation.voluntaryServiceStop';

    /** the column name for the area field */
    const AREA = 'Organisation.area';

    /** the column name for the isHospital field */
    const ISHOSPITAL = 'Organisation.isHospital';

    /** the column name for the notes field */
    const NOTES = 'Organisation.notes';

    /** the column name for the head_id field */
    const HEAD_ID = 'Organisation.head_id';

    /** the column name for the miacCode field */
    const MIACCODE = 'Organisation.miacCode';

    /** the column name for the isOrganisation field */
    const ISORGANISATION = 'Organisation.isOrganisation';

    /** the column name for the uuid_id field */
    const UUID_ID = 'Organisation.uuid_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Organisation objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Organisation[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. OrganisationPeer::$fieldNames[OrganisationPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Createdatetime', 'CreatepersonId', 'Modifydatetime', 'ModifypersonId', 'Deleted', 'Fullname', 'Shortname', 'Title', 'NetId', 'Infiscode', 'Obsoleteinfiscode', 'Okved', 'Inn', 'Kpp', 'Ogrn', 'Okato', 'OkpfCode', 'OkpfId', 'OkfsCode', 'OkfsId', 'Okpo', 'Fss', 'Region', 'Address', 'Chief', 'Phone', 'Accountant', 'Isinsurer', 'Compulsoryservicestop', 'Voluntaryservicestop', 'Area', 'Ishospital', 'Notes', 'HeadId', 'Miaccode', 'Isorganisation', 'UuidId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdatetime', 'createpersonId', 'modifydatetime', 'modifypersonId', 'deleted', 'fullname', 'shortname', 'title', 'netId', 'infiscode', 'obsoleteinfiscode', 'okved', 'inn', 'kpp', 'ogrn', 'okato', 'okpfCode', 'okpfId', 'okfsCode', 'okfsId', 'okpo', 'fss', 'region', 'address', 'chief', 'phone', 'accountant', 'isinsurer', 'compulsoryservicestop', 'voluntaryservicestop', 'area', 'ishospital', 'notes', 'headId', 'miaccode', 'isorganisation', 'uuidId', ),
        BasePeer::TYPE_COLNAME => array (OrganisationPeer::ID, OrganisationPeer::CREATEDATETIME, OrganisationPeer::CREATEPERSON_ID, OrganisationPeer::MODIFYDATETIME, OrganisationPeer::MODIFYPERSON_ID, OrganisationPeer::DELETED, OrganisationPeer::FULLNAME, OrganisationPeer::SHORTNAME, OrganisationPeer::TITLE, OrganisationPeer::NET_ID, OrganisationPeer::INFISCODE, OrganisationPeer::OBSOLETEINFISCODE, OrganisationPeer::OKVED, OrganisationPeer::INN, OrganisationPeer::KPP, OrganisationPeer::OGRN, OrganisationPeer::OKATO, OrganisationPeer::OKPF_CODE, OrganisationPeer::OKPF_ID, OrganisationPeer::OKFS_CODE, OrganisationPeer::OKFS_ID, OrganisationPeer::OKPO, OrganisationPeer::FSS, OrganisationPeer::REGION, OrganisationPeer::ADDRESS, OrganisationPeer::CHIEF, OrganisationPeer::PHONE, OrganisationPeer::ACCOUNTANT, OrganisationPeer::ISINSURER, OrganisationPeer::COMPULSORYSERVICESTOP, OrganisationPeer::VOLUNTARYSERVICESTOP, OrganisationPeer::AREA, OrganisationPeer::ISHOSPITAL, OrganisationPeer::NOTES, OrganisationPeer::HEAD_ID, OrganisationPeer::MIACCODE, OrganisationPeer::ISORGANISATION, OrganisationPeer::UUID_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDATETIME', 'CREATEPERSON_ID', 'MODIFYDATETIME', 'MODIFYPERSON_ID', 'DELETED', 'FULLNAME', 'SHORTNAME', 'TITLE', 'NET_ID', 'INFISCODE', 'OBSOLETEINFISCODE', 'OKVED', 'INN', 'KPP', 'OGRN', 'OKATO', 'OKPF_CODE', 'OKPF_ID', 'OKFS_CODE', 'OKFS_ID', 'OKPO', 'FSS', 'REGION', 'ADDRESS', 'CHIEF', 'PHONE', 'ACCOUNTANT', 'ISINSURER', 'COMPULSORYSERVICESTOP', 'VOLUNTARYSERVICESTOP', 'AREA', 'ISHOSPITAL', 'NOTES', 'HEAD_ID', 'MIACCODE', 'ISORGANISATION', 'UUID_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'createDatetime', 'createPerson_id', 'modifyDatetime', 'modifyPerson_id', 'deleted', 'fullName', 'shortName', 'title', 'net_id', 'infisCode', 'obsoleteInfisCode', 'OKVED', 'INN', 'KPP', 'OGRN', 'OKATO', 'OKPF_code', 'OKPF_id', 'OKFS_code', 'OKFS_id', 'OKPO', 'FSS', 'region', 'Address', 'chief', 'phone', 'accountant', 'isInsurer', 'compulsoryServiceStop', 'voluntaryServiceStop', 'area', 'isHospital', 'notes', 'head_id', 'miacCode', 'isOrganisation', 'uuid_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. OrganisationPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdatetime' => 1, 'CreatepersonId' => 2, 'Modifydatetime' => 3, 'ModifypersonId' => 4, 'Deleted' => 5, 'Fullname' => 6, 'Shortname' => 7, 'Title' => 8, 'NetId' => 9, 'Infiscode' => 10, 'Obsoleteinfiscode' => 11, 'Okved' => 12, 'Inn' => 13, 'Kpp' => 14, 'Ogrn' => 15, 'Okato' => 16, 'OkpfCode' => 17, 'OkpfId' => 18, 'OkfsCode' => 19, 'OkfsId' => 20, 'Okpo' => 21, 'Fss' => 22, 'Region' => 23, 'Address' => 24, 'Chief' => 25, 'Phone' => 26, 'Accountant' => 27, 'Isinsurer' => 28, 'Compulsoryservicestop' => 29, 'Voluntaryservicestop' => 30, 'Area' => 31, 'Ishospital' => 32, 'Notes' => 33, 'HeadId' => 34, 'Miaccode' => 35, 'Isorganisation' => 36, 'UuidId' => 37, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdatetime' => 1, 'createpersonId' => 2, 'modifydatetime' => 3, 'modifypersonId' => 4, 'deleted' => 5, 'fullname' => 6, 'shortname' => 7, 'title' => 8, 'netId' => 9, 'infiscode' => 10, 'obsoleteinfiscode' => 11, 'okved' => 12, 'inn' => 13, 'kpp' => 14, 'ogrn' => 15, 'okato' => 16, 'okpfCode' => 17, 'okpfId' => 18, 'okfsCode' => 19, 'okfsId' => 20, 'okpo' => 21, 'fss' => 22, 'region' => 23, 'address' => 24, 'chief' => 25, 'phone' => 26, 'accountant' => 27, 'isinsurer' => 28, 'compulsoryservicestop' => 29, 'voluntaryservicestop' => 30, 'area' => 31, 'ishospital' => 32, 'notes' => 33, 'headId' => 34, 'miaccode' => 35, 'isorganisation' => 36, 'uuidId' => 37, ),
        BasePeer::TYPE_COLNAME => array (OrganisationPeer::ID => 0, OrganisationPeer::CREATEDATETIME => 1, OrganisationPeer::CREATEPERSON_ID => 2, OrganisationPeer::MODIFYDATETIME => 3, OrganisationPeer::MODIFYPERSON_ID => 4, OrganisationPeer::DELETED => 5, OrganisationPeer::FULLNAME => 6, OrganisationPeer::SHORTNAME => 7, OrganisationPeer::TITLE => 8, OrganisationPeer::NET_ID => 9, OrganisationPeer::INFISCODE => 10, OrganisationPeer::OBSOLETEINFISCODE => 11, OrganisationPeer::OKVED => 12, OrganisationPeer::INN => 13, OrganisationPeer::KPP => 14, OrganisationPeer::OGRN => 15, OrganisationPeer::OKATO => 16, OrganisationPeer::OKPF_CODE => 17, OrganisationPeer::OKPF_ID => 18, OrganisationPeer::OKFS_CODE => 19, OrganisationPeer::OKFS_ID => 20, OrganisationPeer::OKPO => 21, OrganisationPeer::FSS => 22, OrganisationPeer::REGION => 23, OrganisationPeer::ADDRESS => 24, OrganisationPeer::CHIEF => 25, OrganisationPeer::PHONE => 26, OrganisationPeer::ACCOUNTANT => 27, OrganisationPeer::ISINSURER => 28, OrganisationPeer::COMPULSORYSERVICESTOP => 29, OrganisationPeer::VOLUNTARYSERVICESTOP => 30, OrganisationPeer::AREA => 31, OrganisationPeer::ISHOSPITAL => 32, OrganisationPeer::NOTES => 33, OrganisationPeer::HEAD_ID => 34, OrganisationPeer::MIACCODE => 35, OrganisationPeer::ISORGANISATION => 36, OrganisationPeer::UUID_ID => 37, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDATETIME' => 1, 'CREATEPERSON_ID' => 2, 'MODIFYDATETIME' => 3, 'MODIFYPERSON_ID' => 4, 'DELETED' => 5, 'FULLNAME' => 6, 'SHORTNAME' => 7, 'TITLE' => 8, 'NET_ID' => 9, 'INFISCODE' => 10, 'OBSOLETEINFISCODE' => 11, 'OKVED' => 12, 'INN' => 13, 'KPP' => 14, 'OGRN' => 15, 'OKATO' => 16, 'OKPF_CODE' => 17, 'OKPF_ID' => 18, 'OKFS_CODE' => 19, 'OKFS_ID' => 20, 'OKPO' => 21, 'FSS' => 22, 'REGION' => 23, 'ADDRESS' => 24, 'CHIEF' => 25, 'PHONE' => 26, 'ACCOUNTANT' => 27, 'ISINSURER' => 28, 'COMPULSORYSERVICESTOP' => 29, 'VOLUNTARYSERVICESTOP' => 30, 'AREA' => 31, 'ISHOSPITAL' => 32, 'NOTES' => 33, 'HEAD_ID' => 34, 'MIACCODE' => 35, 'ISORGANISATION' => 36, 'UUID_ID' => 37, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createDatetime' => 1, 'createPerson_id' => 2, 'modifyDatetime' => 3, 'modifyPerson_id' => 4, 'deleted' => 5, 'fullName' => 6, 'shortName' => 7, 'title' => 8, 'net_id' => 9, 'infisCode' => 10, 'obsoleteInfisCode' => 11, 'OKVED' => 12, 'INN' => 13, 'KPP' => 14, 'OGRN' => 15, 'OKATO' => 16, 'OKPF_code' => 17, 'OKPF_id' => 18, 'OKFS_code' => 19, 'OKFS_id' => 20, 'OKPO' => 21, 'FSS' => 22, 'region' => 23, 'Address' => 24, 'chief' => 25, 'phone' => 26, 'accountant' => 27, 'isInsurer' => 28, 'compulsoryServiceStop' => 29, 'voluntaryServiceStop' => 30, 'area' => 31, 'isHospital' => 32, 'notes' => 33, 'head_id' => 34, 'miacCode' => 35, 'isOrganisation' => 36, 'uuid_id' => 37, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
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
        $toNames = OrganisationPeer::getFieldNames($toType);
        $key = isset(OrganisationPeer::$fieldKeys[$fromType][$name]) ? OrganisationPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(OrganisationPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, OrganisationPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return OrganisationPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. OrganisationPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(OrganisationPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(OrganisationPeer::ID);
            $criteria->addSelectColumn(OrganisationPeer::CREATEDATETIME);
            $criteria->addSelectColumn(OrganisationPeer::CREATEPERSON_ID);
            $criteria->addSelectColumn(OrganisationPeer::MODIFYDATETIME);
            $criteria->addSelectColumn(OrganisationPeer::MODIFYPERSON_ID);
            $criteria->addSelectColumn(OrganisationPeer::DELETED);
            $criteria->addSelectColumn(OrganisationPeer::FULLNAME);
            $criteria->addSelectColumn(OrganisationPeer::SHORTNAME);
            $criteria->addSelectColumn(OrganisationPeer::TITLE);
            $criteria->addSelectColumn(OrganisationPeer::NET_ID);
            $criteria->addSelectColumn(OrganisationPeer::INFISCODE);
            $criteria->addSelectColumn(OrganisationPeer::OBSOLETEINFISCODE);
            $criteria->addSelectColumn(OrganisationPeer::OKVED);
            $criteria->addSelectColumn(OrganisationPeer::INN);
            $criteria->addSelectColumn(OrganisationPeer::KPP);
            $criteria->addSelectColumn(OrganisationPeer::OGRN);
            $criteria->addSelectColumn(OrganisationPeer::OKATO);
            $criteria->addSelectColumn(OrganisationPeer::OKPF_CODE);
            $criteria->addSelectColumn(OrganisationPeer::OKPF_ID);
            $criteria->addSelectColumn(OrganisationPeer::OKFS_CODE);
            $criteria->addSelectColumn(OrganisationPeer::OKFS_ID);
            $criteria->addSelectColumn(OrganisationPeer::OKPO);
            $criteria->addSelectColumn(OrganisationPeer::FSS);
            $criteria->addSelectColumn(OrganisationPeer::REGION);
            $criteria->addSelectColumn(OrganisationPeer::ADDRESS);
            $criteria->addSelectColumn(OrganisationPeer::CHIEF);
            $criteria->addSelectColumn(OrganisationPeer::PHONE);
            $criteria->addSelectColumn(OrganisationPeer::ACCOUNTANT);
            $criteria->addSelectColumn(OrganisationPeer::ISINSURER);
            $criteria->addSelectColumn(OrganisationPeer::COMPULSORYSERVICESTOP);
            $criteria->addSelectColumn(OrganisationPeer::VOLUNTARYSERVICESTOP);
            $criteria->addSelectColumn(OrganisationPeer::AREA);
            $criteria->addSelectColumn(OrganisationPeer::ISHOSPITAL);
            $criteria->addSelectColumn(OrganisationPeer::NOTES);
            $criteria->addSelectColumn(OrganisationPeer::HEAD_ID);
            $criteria->addSelectColumn(OrganisationPeer::MIACCODE);
            $criteria->addSelectColumn(OrganisationPeer::ISORGANISATION);
            $criteria->addSelectColumn(OrganisationPeer::UUID_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.createDatetime');
            $criteria->addSelectColumn($alias . '.createPerson_id');
            $criteria->addSelectColumn($alias . '.modifyDatetime');
            $criteria->addSelectColumn($alias . '.modifyPerson_id');
            $criteria->addSelectColumn($alias . '.deleted');
            $criteria->addSelectColumn($alias . '.fullName');
            $criteria->addSelectColumn($alias . '.shortName');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.net_id');
            $criteria->addSelectColumn($alias . '.infisCode');
            $criteria->addSelectColumn($alias . '.obsoleteInfisCode');
            $criteria->addSelectColumn($alias . '.OKVED');
            $criteria->addSelectColumn($alias . '.INN');
            $criteria->addSelectColumn($alias . '.KPP');
            $criteria->addSelectColumn($alias . '.OGRN');
            $criteria->addSelectColumn($alias . '.OKATO');
            $criteria->addSelectColumn($alias . '.OKPF_code');
            $criteria->addSelectColumn($alias . '.OKPF_id');
            $criteria->addSelectColumn($alias . '.OKFS_code');
            $criteria->addSelectColumn($alias . '.OKFS_id');
            $criteria->addSelectColumn($alias . '.OKPO');
            $criteria->addSelectColumn($alias . '.FSS');
            $criteria->addSelectColumn($alias . '.region');
            $criteria->addSelectColumn($alias . '.Address');
            $criteria->addSelectColumn($alias . '.chief');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.accountant');
            $criteria->addSelectColumn($alias . '.isInsurer');
            $criteria->addSelectColumn($alias . '.compulsoryServiceStop');
            $criteria->addSelectColumn($alias . '.voluntaryServiceStop');
            $criteria->addSelectColumn($alias . '.area');
            $criteria->addSelectColumn($alias . '.isHospital');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.head_id');
            $criteria->addSelectColumn($alias . '.miacCode');
            $criteria->addSelectColumn($alias . '.isOrganisation');
            $criteria->addSelectColumn($alias . '.uuid_id');
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
        $criteria->setPrimaryTableName(OrganisationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            OrganisationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(OrganisationPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Organisation
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = OrganisationPeer::doSelect($critcopy, $con);
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
        return OrganisationPeer::populateObjects(OrganisationPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            OrganisationPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(OrganisationPeer::DATABASE_NAME);

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
     * @param      Organisation $obj A Organisation object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            OrganisationPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Organisation object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Organisation) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Organisation object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(OrganisationPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Organisation Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(OrganisationPeer::$instances[$key])) {
                return OrganisationPeer::$instances[$key];
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
        foreach (OrganisationPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        OrganisationPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Organisation
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
        $cls = OrganisationPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = OrganisationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = OrganisationPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrganisationPeer::addInstanceToPool($obj, $key);
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
     * @return array (Organisation object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = OrganisationPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = OrganisationPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + OrganisationPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrganisationPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            OrganisationPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(OrganisationPeer::DATABASE_NAME)->getTable(OrganisationPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseOrganisationPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseOrganisationPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new OrganisationTableMap());
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
        return OrganisationPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Organisation or Criteria object.
     *
     * @param      mixed $values Criteria or Organisation object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Organisation object
        }

        if ($criteria->containsKey(OrganisationPeer::ID) && $criteria->keyContainsValue(OrganisationPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrganisationPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(OrganisationPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Organisation or Criteria object.
     *
     * @param      mixed $values Criteria or Organisation object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(OrganisationPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(OrganisationPeer::ID);
            $value = $criteria->remove(OrganisationPeer::ID);
            if ($value) {
                $selectCriteria->add(OrganisationPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(OrganisationPeer::TABLE_NAME);
            }

        } else { // $values is Organisation object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(OrganisationPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Organisation table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(OrganisationPeer::TABLE_NAME, $con, OrganisationPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrganisationPeer::clearInstancePool();
            OrganisationPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Organisation or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Organisation object or primary key or array of primary keys
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
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            OrganisationPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Organisation) { // it's a model object
            // invalidate the cache for this single object
            OrganisationPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrganisationPeer::DATABASE_NAME);
            $criteria->add(OrganisationPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                OrganisationPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(OrganisationPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            OrganisationPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Organisation object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Organisation $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(OrganisationPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(OrganisationPeer::TABLE_NAME);

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

        return BasePeer::doValidate(OrganisationPeer::DATABASE_NAME, OrganisationPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Organisation
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = OrganisationPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(OrganisationPeer::DATABASE_NAME);
        $criteria->add(OrganisationPeer::ID, $pk);

        $v = OrganisationPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Organisation[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(OrganisationPeer::DATABASE_NAME);
            $criteria->add(OrganisationPeer::ID, $pks, Criteria::IN);
            $objs = OrganisationPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseOrganisationPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseOrganisationPeer::buildTableMap();

