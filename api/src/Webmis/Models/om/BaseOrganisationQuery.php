<?php

namespace Webmis\Models\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\Organisation;
use Webmis\Models\OrganisationPeer;
use Webmis\Models\OrganisationQuery;
use Webmis\Models\Quotingbyspeciality;

/**
 * Base class that represents a query for the 'Organisation' table.
 *
 *
 *
 * @method OrganisationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrganisationQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method OrganisationQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method OrganisationQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method OrganisationQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method OrganisationQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method OrganisationQuery orderByFullname($order = Criteria::ASC) Order by the fullName column
 * @method OrganisationQuery orderByShortname($order = Criteria::ASC) Order by the shortName column
 * @method OrganisationQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method OrganisationQuery orderByNetId($order = Criteria::ASC) Order by the net_id column
 * @method OrganisationQuery orderByInfiscode($order = Criteria::ASC) Order by the infisCode column
 * @method OrganisationQuery orderByObsoleteinfiscode($order = Criteria::ASC) Order by the obsoleteInfisCode column
 * @method OrganisationQuery orderByOkved($order = Criteria::ASC) Order by the OKVED column
 * @method OrganisationQuery orderByInn($order = Criteria::ASC) Order by the INN column
 * @method OrganisationQuery orderByKpp($order = Criteria::ASC) Order by the KPP column
 * @method OrganisationQuery orderByOgrn($order = Criteria::ASC) Order by the OGRN column
 * @method OrganisationQuery orderByOkato($order = Criteria::ASC) Order by the OKATO column
 * @method OrganisationQuery orderByOkpfCode($order = Criteria::ASC) Order by the OKPF_code column
 * @method OrganisationQuery orderByOkpfId($order = Criteria::ASC) Order by the OKPF_id column
 * @method OrganisationQuery orderByOkfsCode($order = Criteria::ASC) Order by the OKFS_code column
 * @method OrganisationQuery orderByOkfsId($order = Criteria::ASC) Order by the OKFS_id column
 * @method OrganisationQuery orderByOkpo($order = Criteria::ASC) Order by the OKPO column
 * @method OrganisationQuery orderByFss($order = Criteria::ASC) Order by the FSS column
 * @method OrganisationQuery orderByRegion($order = Criteria::ASC) Order by the region column
 * @method OrganisationQuery orderByAddress($order = Criteria::ASC) Order by the Address column
 * @method OrganisationQuery orderByChief($order = Criteria::ASC) Order by the chief column
 * @method OrganisationQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method OrganisationQuery orderByAccountant($order = Criteria::ASC) Order by the accountant column
 * @method OrganisationQuery orderByIsinsurer($order = Criteria::ASC) Order by the isInsurer column
 * @method OrganisationQuery orderByCompulsoryservicestop($order = Criteria::ASC) Order by the compulsoryServiceStop column
 * @method OrganisationQuery orderByVoluntaryservicestop($order = Criteria::ASC) Order by the voluntaryServiceStop column
 * @method OrganisationQuery orderByArea($order = Criteria::ASC) Order by the area column
 * @method OrganisationQuery orderByIshospital($order = Criteria::ASC) Order by the isHospital column
 * @method OrganisationQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method OrganisationQuery orderByHeadId($order = Criteria::ASC) Order by the head_id column
 * @method OrganisationQuery orderByMiaccode($order = Criteria::ASC) Order by the miacCode column
 * @method OrganisationQuery orderByIsorganisation($order = Criteria::ASC) Order by the isOrganisation column
 * @method OrganisationQuery orderByUuidId($order = Criteria::ASC) Order by the uuid_id column
 *
 * @method OrganisationQuery groupById() Group by the id column
 * @method OrganisationQuery groupByCreatedatetime() Group by the createDatetime column
 * @method OrganisationQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method OrganisationQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method OrganisationQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method OrganisationQuery groupByDeleted() Group by the deleted column
 * @method OrganisationQuery groupByFullname() Group by the fullName column
 * @method OrganisationQuery groupByShortname() Group by the shortName column
 * @method OrganisationQuery groupByTitle() Group by the title column
 * @method OrganisationQuery groupByNetId() Group by the net_id column
 * @method OrganisationQuery groupByInfiscode() Group by the infisCode column
 * @method OrganisationQuery groupByObsoleteinfiscode() Group by the obsoleteInfisCode column
 * @method OrganisationQuery groupByOkved() Group by the OKVED column
 * @method OrganisationQuery groupByInn() Group by the INN column
 * @method OrganisationQuery groupByKpp() Group by the KPP column
 * @method OrganisationQuery groupByOgrn() Group by the OGRN column
 * @method OrganisationQuery groupByOkato() Group by the OKATO column
 * @method OrganisationQuery groupByOkpfCode() Group by the OKPF_code column
 * @method OrganisationQuery groupByOkpfId() Group by the OKPF_id column
 * @method OrganisationQuery groupByOkfsCode() Group by the OKFS_code column
 * @method OrganisationQuery groupByOkfsId() Group by the OKFS_id column
 * @method OrganisationQuery groupByOkpo() Group by the OKPO column
 * @method OrganisationQuery groupByFss() Group by the FSS column
 * @method OrganisationQuery groupByRegion() Group by the region column
 * @method OrganisationQuery groupByAddress() Group by the Address column
 * @method OrganisationQuery groupByChief() Group by the chief column
 * @method OrganisationQuery groupByPhone() Group by the phone column
 * @method OrganisationQuery groupByAccountant() Group by the accountant column
 * @method OrganisationQuery groupByIsinsurer() Group by the isInsurer column
 * @method OrganisationQuery groupByCompulsoryservicestop() Group by the compulsoryServiceStop column
 * @method OrganisationQuery groupByVoluntaryservicestop() Group by the voluntaryServiceStop column
 * @method OrganisationQuery groupByArea() Group by the area column
 * @method OrganisationQuery groupByIshospital() Group by the isHospital column
 * @method OrganisationQuery groupByNotes() Group by the notes column
 * @method OrganisationQuery groupByHeadId() Group by the head_id column
 * @method OrganisationQuery groupByMiaccode() Group by the miacCode column
 * @method OrganisationQuery groupByIsorganisation() Group by the isOrganisation column
 * @method OrganisationQuery groupByUuidId() Group by the uuid_id column
 *
 * @method OrganisationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrganisationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrganisationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrganisationQuery leftJoinQuotingbyspeciality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quotingbyspeciality relation
 * @method OrganisationQuery rightJoinQuotingbyspeciality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quotingbyspeciality relation
 * @method OrganisationQuery innerJoinQuotingbyspeciality($relationAlias = null) Adds a INNER JOIN clause to the query using the Quotingbyspeciality relation
 *
 * @method Organisation findOne(PropelPDO $con = null) Return the first Organisation matching the query
 * @method Organisation findOneOrCreate(PropelPDO $con = null) Return the first Organisation matching the query, or a new Organisation object populated from the query conditions when no match is found
 *
 * @method Organisation findOneByCreatedatetime(string $createDatetime) Return the first Organisation filtered by the createDatetime column
 * @method Organisation findOneByCreatepersonId(int $createPerson_id) Return the first Organisation filtered by the createPerson_id column
 * @method Organisation findOneByModifydatetime(string $modifyDatetime) Return the first Organisation filtered by the modifyDatetime column
 * @method Organisation findOneByModifypersonId(int $modifyPerson_id) Return the first Organisation filtered by the modifyPerson_id column
 * @method Organisation findOneByDeleted(boolean $deleted) Return the first Organisation filtered by the deleted column
 * @method Organisation findOneByFullname(string $fullName) Return the first Organisation filtered by the fullName column
 * @method Organisation findOneByShortname(string $shortName) Return the first Organisation filtered by the shortName column
 * @method Organisation findOneByTitle(string $title) Return the first Organisation filtered by the title column
 * @method Organisation findOneByNetId(int $net_id) Return the first Organisation filtered by the net_id column
 * @method Organisation findOneByInfiscode(string $infisCode) Return the first Organisation filtered by the infisCode column
 * @method Organisation findOneByObsoleteinfiscode(string $obsoleteInfisCode) Return the first Organisation filtered by the obsoleteInfisCode column
 * @method Organisation findOneByOkved(string $OKVED) Return the first Organisation filtered by the OKVED column
 * @method Organisation findOneByInn(string $INN) Return the first Organisation filtered by the INN column
 * @method Organisation findOneByKpp(string $KPP) Return the first Organisation filtered by the KPP column
 * @method Organisation findOneByOgrn(string $OGRN) Return the first Organisation filtered by the OGRN column
 * @method Organisation findOneByOkato(string $OKATO) Return the first Organisation filtered by the OKATO column
 * @method Organisation findOneByOkpfCode(string $OKPF_code) Return the first Organisation filtered by the OKPF_code column
 * @method Organisation findOneByOkpfId(int $OKPF_id) Return the first Organisation filtered by the OKPF_id column
 * @method Organisation findOneByOkfsCode(int $OKFS_code) Return the first Organisation filtered by the OKFS_code column
 * @method Organisation findOneByOkfsId(int $OKFS_id) Return the first Organisation filtered by the OKFS_id column
 * @method Organisation findOneByOkpo(string $OKPO) Return the first Organisation filtered by the OKPO column
 * @method Organisation findOneByFss(string $FSS) Return the first Organisation filtered by the FSS column
 * @method Organisation findOneByRegion(string $region) Return the first Organisation filtered by the region column
 * @method Organisation findOneByAddress(string $Address) Return the first Organisation filtered by the Address column
 * @method Organisation findOneByChief(string $chief) Return the first Organisation filtered by the chief column
 * @method Organisation findOneByPhone(string $phone) Return the first Organisation filtered by the phone column
 * @method Organisation findOneByAccountant(string $accountant) Return the first Organisation filtered by the accountant column
 * @method Organisation findOneByIsinsurer(boolean $isInsurer) Return the first Organisation filtered by the isInsurer column
 * @method Organisation findOneByCompulsoryservicestop(boolean $compulsoryServiceStop) Return the first Organisation filtered by the compulsoryServiceStop column
 * @method Organisation findOneByVoluntaryservicestop(boolean $voluntaryServiceStop) Return the first Organisation filtered by the voluntaryServiceStop column
 * @method Organisation findOneByArea(string $area) Return the first Organisation filtered by the area column
 * @method Organisation findOneByIshospital(boolean $isHospital) Return the first Organisation filtered by the isHospital column
 * @method Organisation findOneByNotes(string $notes) Return the first Organisation filtered by the notes column
 * @method Organisation findOneByHeadId(int $head_id) Return the first Organisation filtered by the head_id column
 * @method Organisation findOneByMiaccode(string $miacCode) Return the first Organisation filtered by the miacCode column
 * @method Organisation findOneByIsorganisation(boolean $isOrganisation) Return the first Organisation filtered by the isOrganisation column
 * @method Organisation findOneByUuidId(int $uuid_id) Return the first Organisation filtered by the uuid_id column
 *
 * @method array findById(int $id) Return Organisation objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Organisation objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Organisation objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Organisation objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Organisation objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Organisation objects filtered by the deleted column
 * @method array findByFullname(string $fullName) Return Organisation objects filtered by the fullName column
 * @method array findByShortname(string $shortName) Return Organisation objects filtered by the shortName column
 * @method array findByTitle(string $title) Return Organisation objects filtered by the title column
 * @method array findByNetId(int $net_id) Return Organisation objects filtered by the net_id column
 * @method array findByInfiscode(string $infisCode) Return Organisation objects filtered by the infisCode column
 * @method array findByObsoleteinfiscode(string $obsoleteInfisCode) Return Organisation objects filtered by the obsoleteInfisCode column
 * @method array findByOkved(string $OKVED) Return Organisation objects filtered by the OKVED column
 * @method array findByInn(string $INN) Return Organisation objects filtered by the INN column
 * @method array findByKpp(string $KPP) Return Organisation objects filtered by the KPP column
 * @method array findByOgrn(string $OGRN) Return Organisation objects filtered by the OGRN column
 * @method array findByOkato(string $OKATO) Return Organisation objects filtered by the OKATO column
 * @method array findByOkpfCode(string $OKPF_code) Return Organisation objects filtered by the OKPF_code column
 * @method array findByOkpfId(int $OKPF_id) Return Organisation objects filtered by the OKPF_id column
 * @method array findByOkfsCode(int $OKFS_code) Return Organisation objects filtered by the OKFS_code column
 * @method array findByOkfsId(int $OKFS_id) Return Organisation objects filtered by the OKFS_id column
 * @method array findByOkpo(string $OKPO) Return Organisation objects filtered by the OKPO column
 * @method array findByFss(string $FSS) Return Organisation objects filtered by the FSS column
 * @method array findByRegion(string $region) Return Organisation objects filtered by the region column
 * @method array findByAddress(string $Address) Return Organisation objects filtered by the Address column
 * @method array findByChief(string $chief) Return Organisation objects filtered by the chief column
 * @method array findByPhone(string $phone) Return Organisation objects filtered by the phone column
 * @method array findByAccountant(string $accountant) Return Organisation objects filtered by the accountant column
 * @method array findByIsinsurer(boolean $isInsurer) Return Organisation objects filtered by the isInsurer column
 * @method array findByCompulsoryservicestop(boolean $compulsoryServiceStop) Return Organisation objects filtered by the compulsoryServiceStop column
 * @method array findByVoluntaryservicestop(boolean $voluntaryServiceStop) Return Organisation objects filtered by the voluntaryServiceStop column
 * @method array findByArea(string $area) Return Organisation objects filtered by the area column
 * @method array findByIshospital(boolean $isHospital) Return Organisation objects filtered by the isHospital column
 * @method array findByNotes(string $notes) Return Organisation objects filtered by the notes column
 * @method array findByHeadId(int $head_id) Return Organisation objects filtered by the head_id column
 * @method array findByMiaccode(string $miacCode) Return Organisation objects filtered by the miacCode column
 * @method array findByIsorganisation(boolean $isOrganisation) Return Organisation objects filtered by the isOrganisation column
 * @method array findByUuidId(int $uuid_id) Return Organisation objects filtered by the uuid_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrganisationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrganisationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Organisation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrganisationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrganisationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrganisationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrganisationQuery) {
            return $criteria;
        }
        $query = new OrganisationQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Organisation|Organisation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrganisationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrganisationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Organisation A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Organisation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `fullName`, `shortName`, `title`, `net_id`, `infisCode`, `obsoleteInfisCode`, `OKVED`, `INN`, `KPP`, `OGRN`, `OKATO`, `OKPF_code`, `OKPF_id`, `OKFS_code`, `OKFS_id`, `OKPO`, `FSS`, `region`, `Address`, `chief`, `phone`, `accountant`, `isInsurer`, `compulsoryServiceStop`, `voluntaryServiceStop`, `area`, `isHospital`, `notes`, `head_id`, `miacCode`, `isOrganisation`, `uuid_id` FROM `Organisation` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Organisation();
            $obj->hydrate($row);
            OrganisationPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Organisation|Organisation[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Organisation[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrganisationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrganisationPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrganisationPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrganisationPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the createDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedatetime('2011-03-14'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime('now'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime(array('max' => 'yesterday')); // WHERE createDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(OrganisationPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(OrganisationPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::CREATEDATETIME, $createdatetime, $comparison);
    }

    /**
     * Filter the query on the createPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatepersonId(1234); // WHERE createPerson_id = 1234
     * $query->filterByCreatepersonId(array(12, 34)); // WHERE createPerson_id IN (12, 34)
     * $query->filterByCreatepersonId(array('min' => 12)); // WHERE createPerson_id >= 12
     * $query->filterByCreatepersonId(array('max' => 12)); // WHERE createPerson_id <= 12
     * </code>
     *
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(OrganisationPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(OrganisationPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::CREATEPERSON_ID, $createpersonId, $comparison);
    }

    /**
     * Filter the query on the modifyDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByModifydatetime('2011-03-14'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime('now'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime(array('max' => 'yesterday')); // WHERE modifyDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifydatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(OrganisationPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(OrganisationPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::MODIFYDATETIME, $modifydatetime, $comparison);
    }

    /**
     * Filter the query on the modifyPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModifypersonId(1234); // WHERE modifyPerson_id = 1234
     * $query->filterByModifypersonId(array(12, 34)); // WHERE modifyPerson_id IN (12, 34)
     * $query->filterByModifypersonId(array('min' => 12)); // WHERE modifyPerson_id >= 12
     * $query->filterByModifypersonId(array('max' => 12)); // WHERE modifyPerson_id <= 12
     * </code>
     *
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(OrganisationPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(OrganisationPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the fullName column
     *
     * Example usage:
     * <code>
     * $query->filterByFullname('fooValue');   // WHERE fullName = 'fooValue'
     * $query->filterByFullname('%fooValue%'); // WHERE fullName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fullname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByFullname($fullname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fullname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fullname)) {
                $fullname = str_replace('*', '%', $fullname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::FULLNAME, $fullname, $comparison);
    }

    /**
     * Filter the query on the shortName column
     *
     * Example usage:
     * <code>
     * $query->filterByShortname('fooValue');   // WHERE shortName = 'fooValue'
     * $query->filterByShortname('%fooValue%'); // WHERE shortName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByShortname($shortname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shortname)) {
                $shortname = str_replace('*', '%', $shortname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::SHORTNAME, $shortname, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the net_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNetId(1234); // WHERE net_id = 1234
     * $query->filterByNetId(array(12, 34)); // WHERE net_id IN (12, 34)
     * $query->filterByNetId(array('min' => 12)); // WHERE net_id >= 12
     * $query->filterByNetId(array('max' => 12)); // WHERE net_id <= 12
     * </code>
     *
     * @param     mixed $netId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByNetId($netId = null, $comparison = null)
    {
        if (is_array($netId)) {
            $useMinMax = false;
            if (isset($netId['min'])) {
                $this->addUsingAlias(OrganisationPeer::NET_ID, $netId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($netId['max'])) {
                $this->addUsingAlias(OrganisationPeer::NET_ID, $netId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::NET_ID, $netId, $comparison);
    }

    /**
     * Filter the query on the infisCode column
     *
     * Example usage:
     * <code>
     * $query->filterByInfiscode('fooValue');   // WHERE infisCode = 'fooValue'
     * $query->filterByInfiscode('%fooValue%'); // WHERE infisCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infiscode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByInfiscode($infiscode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infiscode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infiscode)) {
                $infiscode = str_replace('*', '%', $infiscode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::INFISCODE, $infiscode, $comparison);
    }

    /**
     * Filter the query on the obsoleteInfisCode column
     *
     * Example usage:
     * <code>
     * $query->filterByObsoleteinfiscode('fooValue');   // WHERE obsoleteInfisCode = 'fooValue'
     * $query->filterByObsoleteinfiscode('%fooValue%'); // WHERE obsoleteInfisCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $obsoleteinfiscode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByObsoleteinfiscode($obsoleteinfiscode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($obsoleteinfiscode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $obsoleteinfiscode)) {
                $obsoleteinfiscode = str_replace('*', '%', $obsoleteinfiscode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OBSOLETEINFISCODE, $obsoleteinfiscode, $comparison);
    }

    /**
     * Filter the query on the OKVED column
     *
     * Example usage:
     * <code>
     * $query->filterByOkved('fooValue');   // WHERE OKVED = 'fooValue'
     * $query->filterByOkved('%fooValue%'); // WHERE OKVED LIKE '%fooValue%'
     * </code>
     *
     * @param     string $okved The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkved($okved = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($okved)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $okved)) {
                $okved = str_replace('*', '%', $okved);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKVED, $okved, $comparison);
    }

    /**
     * Filter the query on the INN column
     *
     * Example usage:
     * <code>
     * $query->filterByInn('fooValue');   // WHERE INN = 'fooValue'
     * $query->filterByInn('%fooValue%'); // WHERE INN LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByInn($inn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inn)) {
                $inn = str_replace('*', '%', $inn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::INN, $inn, $comparison);
    }

    /**
     * Filter the query on the KPP column
     *
     * Example usage:
     * <code>
     * $query->filterByKpp('fooValue');   // WHERE KPP = 'fooValue'
     * $query->filterByKpp('%fooValue%'); // WHERE KPP LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kpp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByKpp($kpp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kpp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kpp)) {
                $kpp = str_replace('*', '%', $kpp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::KPP, $kpp, $comparison);
    }

    /**
     * Filter the query on the OGRN column
     *
     * Example usage:
     * <code>
     * $query->filterByOgrn('fooValue');   // WHERE OGRN = 'fooValue'
     * $query->filterByOgrn('%fooValue%'); // WHERE OGRN LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ogrn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOgrn($ogrn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ogrn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ogrn)) {
                $ogrn = str_replace('*', '%', $ogrn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OGRN, $ogrn, $comparison);
    }

    /**
     * Filter the query on the OKATO column
     *
     * Example usage:
     * <code>
     * $query->filterByOkato('fooValue');   // WHERE OKATO = 'fooValue'
     * $query->filterByOkato('%fooValue%'); // WHERE OKATO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $okato The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkato($okato = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($okato)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $okato)) {
                $okato = str_replace('*', '%', $okato);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKATO, $okato, $comparison);
    }

    /**
     * Filter the query on the OKPF_code column
     *
     * Example usage:
     * <code>
     * $query->filterByOkpfCode('fooValue');   // WHERE OKPF_code = 'fooValue'
     * $query->filterByOkpfCode('%fooValue%'); // WHERE OKPF_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $okpfCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkpfCode($okpfCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($okpfCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $okpfCode)) {
                $okpfCode = str_replace('*', '%', $okpfCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKPF_CODE, $okpfCode, $comparison);
    }

    /**
     * Filter the query on the OKPF_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOkpfId(1234); // WHERE OKPF_id = 1234
     * $query->filterByOkpfId(array(12, 34)); // WHERE OKPF_id IN (12, 34)
     * $query->filterByOkpfId(array('min' => 12)); // WHERE OKPF_id >= 12
     * $query->filterByOkpfId(array('max' => 12)); // WHERE OKPF_id <= 12
     * </code>
     *
     * @param     mixed $okpfId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkpfId($okpfId = null, $comparison = null)
    {
        if (is_array($okpfId)) {
            $useMinMax = false;
            if (isset($okpfId['min'])) {
                $this->addUsingAlias(OrganisationPeer::OKPF_ID, $okpfId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($okpfId['max'])) {
                $this->addUsingAlias(OrganisationPeer::OKPF_ID, $okpfId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKPF_ID, $okpfId, $comparison);
    }

    /**
     * Filter the query on the OKFS_code column
     *
     * Example usage:
     * <code>
     * $query->filterByOkfsCode(1234); // WHERE OKFS_code = 1234
     * $query->filterByOkfsCode(array(12, 34)); // WHERE OKFS_code IN (12, 34)
     * $query->filterByOkfsCode(array('min' => 12)); // WHERE OKFS_code >= 12
     * $query->filterByOkfsCode(array('max' => 12)); // WHERE OKFS_code <= 12
     * </code>
     *
     * @param     mixed $okfsCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkfsCode($okfsCode = null, $comparison = null)
    {
        if (is_array($okfsCode)) {
            $useMinMax = false;
            if (isset($okfsCode['min'])) {
                $this->addUsingAlias(OrganisationPeer::OKFS_CODE, $okfsCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($okfsCode['max'])) {
                $this->addUsingAlias(OrganisationPeer::OKFS_CODE, $okfsCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKFS_CODE, $okfsCode, $comparison);
    }

    /**
     * Filter the query on the OKFS_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOkfsId(1234); // WHERE OKFS_id = 1234
     * $query->filterByOkfsId(array(12, 34)); // WHERE OKFS_id IN (12, 34)
     * $query->filterByOkfsId(array('min' => 12)); // WHERE OKFS_id >= 12
     * $query->filterByOkfsId(array('max' => 12)); // WHERE OKFS_id <= 12
     * </code>
     *
     * @param     mixed $okfsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkfsId($okfsId = null, $comparison = null)
    {
        if (is_array($okfsId)) {
            $useMinMax = false;
            if (isset($okfsId['min'])) {
                $this->addUsingAlias(OrganisationPeer::OKFS_ID, $okfsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($okfsId['max'])) {
                $this->addUsingAlias(OrganisationPeer::OKFS_ID, $okfsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKFS_ID, $okfsId, $comparison);
    }

    /**
     * Filter the query on the OKPO column
     *
     * Example usage:
     * <code>
     * $query->filterByOkpo('fooValue');   // WHERE OKPO = 'fooValue'
     * $query->filterByOkpo('%fooValue%'); // WHERE OKPO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $okpo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByOkpo($okpo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($okpo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $okpo)) {
                $okpo = str_replace('*', '%', $okpo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::OKPO, $okpo, $comparison);
    }

    /**
     * Filter the query on the FSS column
     *
     * Example usage:
     * <code>
     * $query->filterByFss('fooValue');   // WHERE FSS = 'fooValue'
     * $query->filterByFss('%fooValue%'); // WHERE FSS LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fss The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByFss($fss = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fss)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fss)) {
                $fss = str_replace('*', '%', $fss);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::FSS, $fss, $comparison);
    }

    /**
     * Filter the query on the region column
     *
     * Example usage:
     * <code>
     * $query->filterByRegion('fooValue');   // WHERE region = 'fooValue'
     * $query->filterByRegion('%fooValue%'); // WHERE region LIKE '%fooValue%'
     * </code>
     *
     * @param     string $region The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByRegion($region = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($region)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $region)) {
                $region = str_replace('*', '%', $region);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::REGION, $region, $comparison);
    }

    /**
     * Filter the query on the Address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE Address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE Address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the chief column
     *
     * Example usage:
     * <code>
     * $query->filterByChief('fooValue');   // WHERE chief = 'fooValue'
     * $query->filterByChief('%fooValue%'); // WHERE chief LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chief The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByChief($chief = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chief)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chief)) {
                $chief = str_replace('*', '%', $chief);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::CHIEF, $chief, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the accountant column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountant('fooValue');   // WHERE accountant = 'fooValue'
     * $query->filterByAccountant('%fooValue%'); // WHERE accountant LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accountant The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByAccountant($accountant = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accountant)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accountant)) {
                $accountant = str_replace('*', '%', $accountant);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::ACCOUNTANT, $accountant, $comparison);
    }

    /**
     * Filter the query on the isInsurer column
     *
     * Example usage:
     * <code>
     * $query->filterByIsinsurer(true); // WHERE isInsurer = true
     * $query->filterByIsinsurer('yes'); // WHERE isInsurer = true
     * </code>
     *
     * @param     boolean|string $isinsurer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByIsinsurer($isinsurer = null, $comparison = null)
    {
        if (is_string($isinsurer)) {
            $isinsurer = in_array(strtolower($isinsurer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationPeer::ISINSURER, $isinsurer, $comparison);
    }

    /**
     * Filter the query on the compulsoryServiceStop column
     *
     * Example usage:
     * <code>
     * $query->filterByCompulsoryservicestop(true); // WHERE compulsoryServiceStop = true
     * $query->filterByCompulsoryservicestop('yes'); // WHERE compulsoryServiceStop = true
     * </code>
     *
     * @param     boolean|string $compulsoryservicestop The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByCompulsoryservicestop($compulsoryservicestop = null, $comparison = null)
    {
        if (is_string($compulsoryservicestop)) {
            $compulsoryservicestop = in_array(strtolower($compulsoryservicestop), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationPeer::COMPULSORYSERVICESTOP, $compulsoryservicestop, $comparison);
    }

    /**
     * Filter the query on the voluntaryServiceStop column
     *
     * Example usage:
     * <code>
     * $query->filterByVoluntaryservicestop(true); // WHERE voluntaryServiceStop = true
     * $query->filterByVoluntaryservicestop('yes'); // WHERE voluntaryServiceStop = true
     * </code>
     *
     * @param     boolean|string $voluntaryservicestop The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByVoluntaryservicestop($voluntaryservicestop = null, $comparison = null)
    {
        if (is_string($voluntaryservicestop)) {
            $voluntaryservicestop = in_array(strtolower($voluntaryservicestop), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationPeer::VOLUNTARYSERVICESTOP, $voluntaryservicestop, $comparison);
    }

    /**
     * Filter the query on the area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea('fooValue');   // WHERE area = 'fooValue'
     * $query->filterByArea('%fooValue%'); // WHERE area LIKE '%fooValue%'
     * </code>
     *
     * @param     string $area The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($area)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $area)) {
                $area = str_replace('*', '%', $area);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::AREA, $area, $comparison);
    }

    /**
     * Filter the query on the isHospital column
     *
     * Example usage:
     * <code>
     * $query->filterByIshospital(true); // WHERE isHospital = true
     * $query->filterByIshospital('yes'); // WHERE isHospital = true
     * </code>
     *
     * @param     boolean|string $ishospital The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByIshospital($ishospital = null, $comparison = null)
    {
        if (is_string($ishospital)) {
            $ishospital = in_array(strtolower($ishospital), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationPeer::ISHOSPITAL, $ishospital, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the head_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHeadId(1234); // WHERE head_id = 1234
     * $query->filterByHeadId(array(12, 34)); // WHERE head_id IN (12, 34)
     * $query->filterByHeadId(array('min' => 12)); // WHERE head_id >= 12
     * $query->filterByHeadId(array('max' => 12)); // WHERE head_id <= 12
     * </code>
     *
     * @param     mixed $headId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByHeadId($headId = null, $comparison = null)
    {
        if (is_array($headId)) {
            $useMinMax = false;
            if (isset($headId['min'])) {
                $this->addUsingAlias(OrganisationPeer::HEAD_ID, $headId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($headId['max'])) {
                $this->addUsingAlias(OrganisationPeer::HEAD_ID, $headId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::HEAD_ID, $headId, $comparison);
    }

    /**
     * Filter the query on the miacCode column
     *
     * Example usage:
     * <code>
     * $query->filterByMiaccode('fooValue');   // WHERE miacCode = 'fooValue'
     * $query->filterByMiaccode('%fooValue%'); // WHERE miacCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $miaccode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByMiaccode($miaccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($miaccode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $miaccode)) {
                $miaccode = str_replace('*', '%', $miaccode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::MIACCODE, $miaccode, $comparison);
    }

    /**
     * Filter the query on the isOrganisation column
     *
     * Example usage:
     * <code>
     * $query->filterByIsorganisation(true); // WHERE isOrganisation = true
     * $query->filterByIsorganisation('yes'); // WHERE isOrganisation = true
     * </code>
     *
     * @param     boolean|string $isorganisation The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByIsorganisation($isorganisation = null, $comparison = null)
    {
        if (is_string($isorganisation)) {
            $isorganisation = in_array(strtolower($isorganisation), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationPeer::ISORGANISATION, $isorganisation, $comparison);
    }

    /**
     * Filter the query on the uuid_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUuidId(1234); // WHERE uuid_id = 1234
     * $query->filterByUuidId(array(12, 34)); // WHERE uuid_id IN (12, 34)
     * $query->filterByUuidId(array('min' => 12)); // WHERE uuid_id >= 12
     * $query->filterByUuidId(array('max' => 12)); // WHERE uuid_id <= 12
     * </code>
     *
     * @param     mixed $uuidId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function filterByUuidId($uuidId = null, $comparison = null)
    {
        if (is_array($uuidId)) {
            $useMinMax = false;
            if (isset($uuidId['min'])) {
                $this->addUsingAlias(OrganisationPeer::UUID_ID, $uuidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uuidId['max'])) {
                $this->addUsingAlias(OrganisationPeer::UUID_ID, $uuidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPeer::UUID_ID, $uuidId, $comparison);
    }

    /**
     * Filter the query by a related Quotingbyspeciality object
     *
     * @param   Quotingbyspeciality|PropelObjectCollection $quotingbyspeciality  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrganisationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuotingbyspeciality($quotingbyspeciality, $comparison = null)
    {
        if ($quotingbyspeciality instanceof Quotingbyspeciality) {
            return $this
                ->addUsingAlias(OrganisationPeer::ID, $quotingbyspeciality->getOrganisationId(), $comparison);
        } elseif ($quotingbyspeciality instanceof PropelObjectCollection) {
            return $this
                ->useQuotingbyspecialityQuery()
                ->filterByPrimaryKeys($quotingbyspeciality->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuotingbyspeciality() only accepts arguments of type Quotingbyspeciality or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quotingbyspeciality relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function joinQuotingbyspeciality($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quotingbyspeciality');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Quotingbyspeciality');
        }

        return $this;
    }

    /**
     * Use the Quotingbyspeciality relation Quotingbyspeciality object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\QuotingbyspecialityQuery A secondary query class using the current class as primary query
     */
    public function useQuotingbyspecialityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuotingbyspeciality($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quotingbyspeciality', '\Webmis\Models\QuotingbyspecialityQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Organisation $organisation Object to remove from the list of results
     *
     * @return OrganisationQuery The current query, for fluid interface
     */
    public function prune($organisation = null)
    {
        if ($organisation) {
            $this->addUsingAlias(OrganisationPeer::ID, $organisation->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
