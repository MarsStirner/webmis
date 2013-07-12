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
use Webmis\Models\ActionpropertyHospitalbed;
use Webmis\Models\OrgstructureHospitalbed;
use Webmis\Models\OrgstructureHospitalbedPeer;
use Webmis\Models\OrgstructureHospitalbedQuery;

/**
 * Base class that represents a query for the 'OrgStructure_HospitalBed' table.
 *
 *
 *
 * @method OrgstructureHospitalbedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureHospitalbedQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method OrgstructureHospitalbedQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method OrgstructureHospitalbedQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method OrgstructureHospitalbedQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method OrgstructureHospitalbedQuery orderByIspermanent($order = Criteria::ASC) Order by the isPermanent column
 * @method OrgstructureHospitalbedQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method OrgstructureHospitalbedQuery orderByProfileId($order = Criteria::ASC) Order by the profile_id column
 * @method OrgstructureHospitalbedQuery orderByRelief($order = Criteria::ASC) Order by the relief column
 * @method OrgstructureHospitalbedQuery orderByScheduleId($order = Criteria::ASC) Order by the schedule_id column
 * @method OrgstructureHospitalbedQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method OrgstructureHospitalbedQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method OrgstructureHospitalbedQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method OrgstructureHospitalbedQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method OrgstructureHospitalbedQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method OrgstructureHospitalbedQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method OrgstructureHospitalbedQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method OrgstructureHospitalbedQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method OrgstructureHospitalbedQuery orderByInvolution($order = Criteria::ASC) Order by the involution column
 * @method OrgstructureHospitalbedQuery orderByBegdateinvolute($order = Criteria::ASC) Order by the begDateInvolute column
 * @method OrgstructureHospitalbedQuery orderByEnddateinvolute($order = Criteria::ASC) Order by the endDateInvolute column
 *
 * @method OrgstructureHospitalbedQuery groupById() Group by the id column
 * @method OrgstructureHospitalbedQuery groupByMasterId() Group by the master_id column
 * @method OrgstructureHospitalbedQuery groupByIdx() Group by the idx column
 * @method OrgstructureHospitalbedQuery groupByCode() Group by the code column
 * @method OrgstructureHospitalbedQuery groupByName() Group by the name column
 * @method OrgstructureHospitalbedQuery groupByIspermanent() Group by the isPermanent column
 * @method OrgstructureHospitalbedQuery groupByTypeId() Group by the type_id column
 * @method OrgstructureHospitalbedQuery groupByProfileId() Group by the profile_id column
 * @method OrgstructureHospitalbedQuery groupByRelief() Group by the relief column
 * @method OrgstructureHospitalbedQuery groupByScheduleId() Group by the schedule_id column
 * @method OrgstructureHospitalbedQuery groupByBegdate() Group by the begDate column
 * @method OrgstructureHospitalbedQuery groupByEnddate() Group by the endDate column
 * @method OrgstructureHospitalbedQuery groupBySex() Group by the sex column
 * @method OrgstructureHospitalbedQuery groupByAge() Group by the age column
 * @method OrgstructureHospitalbedQuery groupByAgeBu() Group by the age_bu column
 * @method OrgstructureHospitalbedQuery groupByAgeBc() Group by the age_bc column
 * @method OrgstructureHospitalbedQuery groupByAgeEu() Group by the age_eu column
 * @method OrgstructureHospitalbedQuery groupByAgeEc() Group by the age_ec column
 * @method OrgstructureHospitalbedQuery groupByInvolution() Group by the involution column
 * @method OrgstructureHospitalbedQuery groupByBegdateinvolute() Group by the begDateInvolute column
 * @method OrgstructureHospitalbedQuery groupByEnddateinvolute() Group by the endDateInvolute column
 *
 * @method OrgstructureHospitalbedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureHospitalbedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureHospitalbedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureHospitalbedQuery leftJoinActionpropertyHospitalbed($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionpropertyHospitalbed relation
 * @method OrgstructureHospitalbedQuery rightJoinActionpropertyHospitalbed($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionpropertyHospitalbed relation
 * @method OrgstructureHospitalbedQuery innerJoinActionpropertyHospitalbed($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionpropertyHospitalbed relation
 *
 * @method OrgstructureHospitalbed findOne(PropelPDO $con = null) Return the first OrgstructureHospitalbed matching the query
 * @method OrgstructureHospitalbed findOneOrCreate(PropelPDO $con = null) Return the first OrgstructureHospitalbed matching the query, or a new OrgstructureHospitalbed object populated from the query conditions when no match is found
 *
 * @method OrgstructureHospitalbed findOneByMasterId(int $master_id) Return the first OrgstructureHospitalbed filtered by the master_id column
 * @method OrgstructureHospitalbed findOneByIdx(int $idx) Return the first OrgstructureHospitalbed filtered by the idx column
 * @method OrgstructureHospitalbed findOneByCode(string $code) Return the first OrgstructureHospitalbed filtered by the code column
 * @method OrgstructureHospitalbed findOneByName(string $name) Return the first OrgstructureHospitalbed filtered by the name column
 * @method OrgstructureHospitalbed findOneByIspermanent(boolean $isPermanent) Return the first OrgstructureHospitalbed filtered by the isPermanent column
 * @method OrgstructureHospitalbed findOneByTypeId(int $type_id) Return the first OrgstructureHospitalbed filtered by the type_id column
 * @method OrgstructureHospitalbed findOneByProfileId(int $profile_id) Return the first OrgstructureHospitalbed filtered by the profile_id column
 * @method OrgstructureHospitalbed findOneByRelief(int $relief) Return the first OrgstructureHospitalbed filtered by the relief column
 * @method OrgstructureHospitalbed findOneByScheduleId(int $schedule_id) Return the first OrgstructureHospitalbed filtered by the schedule_id column
 * @method OrgstructureHospitalbed findOneByBegdate(string $begDate) Return the first OrgstructureHospitalbed filtered by the begDate column
 * @method OrgstructureHospitalbed findOneByEnddate(string $endDate) Return the first OrgstructureHospitalbed filtered by the endDate column
 * @method OrgstructureHospitalbed findOneBySex(int $sex) Return the first OrgstructureHospitalbed filtered by the sex column
 * @method OrgstructureHospitalbed findOneByAge(string $age) Return the first OrgstructureHospitalbed filtered by the age column
 * @method OrgstructureHospitalbed findOneByAgeBu(int $age_bu) Return the first OrgstructureHospitalbed filtered by the age_bu column
 * @method OrgstructureHospitalbed findOneByAgeBc(int $age_bc) Return the first OrgstructureHospitalbed filtered by the age_bc column
 * @method OrgstructureHospitalbed findOneByAgeEu(int $age_eu) Return the first OrgstructureHospitalbed filtered by the age_eu column
 * @method OrgstructureHospitalbed findOneByAgeEc(int $age_ec) Return the first OrgstructureHospitalbed filtered by the age_ec column
 * @method OrgstructureHospitalbed findOneByInvolution(boolean $involution) Return the first OrgstructureHospitalbed filtered by the involution column
 * @method OrgstructureHospitalbed findOneByBegdateinvolute(string $begDateInvolute) Return the first OrgstructureHospitalbed filtered by the begDateInvolute column
 * @method OrgstructureHospitalbed findOneByEnddateinvolute(string $endDateInvolute) Return the first OrgstructureHospitalbed filtered by the endDateInvolute column
 *
 * @method array findById(int $id) Return OrgstructureHospitalbed objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return OrgstructureHospitalbed objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return OrgstructureHospitalbed objects filtered by the idx column
 * @method array findByCode(string $code) Return OrgstructureHospitalbed objects filtered by the code column
 * @method array findByName(string $name) Return OrgstructureHospitalbed objects filtered by the name column
 * @method array findByIspermanent(boolean $isPermanent) Return OrgstructureHospitalbed objects filtered by the isPermanent column
 * @method array findByTypeId(int $type_id) Return OrgstructureHospitalbed objects filtered by the type_id column
 * @method array findByProfileId(int $profile_id) Return OrgstructureHospitalbed objects filtered by the profile_id column
 * @method array findByRelief(int $relief) Return OrgstructureHospitalbed objects filtered by the relief column
 * @method array findByScheduleId(int $schedule_id) Return OrgstructureHospitalbed objects filtered by the schedule_id column
 * @method array findByBegdate(string $begDate) Return OrgstructureHospitalbed objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return OrgstructureHospitalbed objects filtered by the endDate column
 * @method array findBySex(int $sex) Return OrgstructureHospitalbed objects filtered by the sex column
 * @method array findByAge(string $age) Return OrgstructureHospitalbed objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return OrgstructureHospitalbed objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return OrgstructureHospitalbed objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return OrgstructureHospitalbed objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return OrgstructureHospitalbed objects filtered by the age_ec column
 * @method array findByInvolution(boolean $involution) Return OrgstructureHospitalbed objects filtered by the involution column
 * @method array findByBegdateinvolute(string $begDateInvolute) Return OrgstructureHospitalbed objects filtered by the begDateInvolute column
 * @method array findByEnddateinvolute(string $endDateInvolute) Return OrgstructureHospitalbed objects filtered by the endDateInvolute column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureHospitalbedQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureHospitalbedQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrgstructureHospitalbed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureHospitalbedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureHospitalbedQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureHospitalbedQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureHospitalbedQuery) {
            return $criteria;
        }
        $query = new OrgstructureHospitalbedQuery();
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
     * @return   OrgstructureHospitalbed|OrgstructureHospitalbed[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructureHospitalbedPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructureHospitalbedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgstructureHospitalbed A model object, or null if the key is not found
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
     * @return                 OrgstructureHospitalbed A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `code`, `name`, `isPermanent`, `type_id`, `profile_id`, `relief`, `schedule_id`, `begDate`, `endDate`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `involution`, `begDateInvolute`, `endDateInvolute` FROM `OrgStructure_HospitalBed` WHERE `id` = :p0';
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
            $obj = new OrgstructureHospitalbed();
            $obj->hydrate($row);
            OrgstructureHospitalbedPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrgstructureHospitalbed|OrgstructureHospitalbed[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrgstructureHospitalbed[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the master_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMasterId(1234); // WHERE master_id = 1234
     * $query->filterByMasterId(array(12, 34)); // WHERE master_id IN (12, 34)
     * $query->filterByMasterId(array('min' => 12)); // WHERE master_id >= 12
     * $query->filterByMasterId(array('max' => 12)); // WHERE master_id <= 12
     * </code>
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the idx column
     *
     * Example usage:
     * <code>
     * $query->filterByIdx(1234); // WHERE idx = 1234
     * $query->filterByIdx(array(12, 34)); // WHERE idx IN (12, 34)
     * $query->filterByIdx(array('min' => 12)); // WHERE idx >= 12
     * $query->filterByIdx(array('max' => 12)); // WHERE idx <= 12
     * </code>
     *
     * @param     mixed $idx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the isPermanent column
     *
     * Example usage:
     * <code>
     * $query->filterByIspermanent(true); // WHERE isPermanent = true
     * $query->filterByIspermanent('yes'); // WHERE isPermanent = true
     * </code>
     *
     * @param     boolean|string $ispermanent The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByIspermanent($ispermanent = null, $comparison = null)
    {
        if (is_string($ispermanent)) {
            $ispermanent = in_array(strtolower($ispermanent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::ISPERMANENT, $ispermanent, $comparison);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id >= 12
     * $query->filterByTypeId(array('max' => 12)); // WHERE type_id <= 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the profile_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileId(1234); // WHERE profile_id = 1234
     * $query->filterByProfileId(array(12, 34)); // WHERE profile_id IN (12, 34)
     * $query->filterByProfileId(array('min' => 12)); // WHERE profile_id >= 12
     * $query->filterByProfileId(array('max' => 12)); // WHERE profile_id <= 12
     * </code>
     *
     * @param     mixed $profileId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByProfileId($profileId = null, $comparison = null)
    {
        if (is_array($profileId)) {
            $useMinMax = false;
            if (isset($profileId['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::PROFILE_ID, $profileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($profileId['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::PROFILE_ID, $profileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::PROFILE_ID, $profileId, $comparison);
    }

    /**
     * Filter the query on the relief column
     *
     * Example usage:
     * <code>
     * $query->filterByRelief(1234); // WHERE relief = 1234
     * $query->filterByRelief(array(12, 34)); // WHERE relief IN (12, 34)
     * $query->filterByRelief(array('min' => 12)); // WHERE relief >= 12
     * $query->filterByRelief(array('max' => 12)); // WHERE relief <= 12
     * </code>
     *
     * @param     mixed $relief The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByRelief($relief = null, $comparison = null)
    {
        if (is_array($relief)) {
            $useMinMax = false;
            if (isset($relief['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::RELIEF, $relief['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($relief['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::RELIEF, $relief['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::RELIEF, $relief, $comparison);
    }

    /**
     * Filter the query on the schedule_id column
     *
     * Example usage:
     * <code>
     * $query->filterByScheduleId(1234); // WHERE schedule_id = 1234
     * $query->filterByScheduleId(array(12, 34)); // WHERE schedule_id IN (12, 34)
     * $query->filterByScheduleId(array('min' => 12)); // WHERE schedule_id >= 12
     * $query->filterByScheduleId(array('max' => 12)); // WHERE schedule_id <= 12
     * </code>
     *
     * @param     mixed $scheduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByScheduleId($scheduleId = null, $comparison = null)
    {
        if (is_array($scheduleId)) {
            $useMinMax = false;
            if (isset($scheduleId['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::SCHEDULE_ID, $scheduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($scheduleId['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::SCHEDULE_ID, $scheduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::SCHEDULE_ID, $scheduleId, $comparison);
    }

    /**
     * Filter the query on the begDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBegdate('2011-03-14'); // WHERE begDate = '2011-03-14'
     * $query->filterByBegdate('now'); // WHERE begDate = '2011-03-14'
     * $query->filterByBegdate(array('max' => 'yesterday')); // WHERE begDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $begdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::BEGDATE, $begdate, $comparison);
    }

    /**
     * Filter the query on the endDate column
     *
     * Example usage:
     * <code>
     * $query->filterByEnddate('2011-03-14'); // WHERE endDate = '2011-03-14'
     * $query->filterByEnddate('now'); // WHERE endDate = '2011-03-14'
     * $query->filterByEnddate(array('max' => 'yesterday')); // WHERE endDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $enddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex(1234); // WHERE sex = 1234
     * $query->filterBySex(array(12, 34)); // WHERE sex IN (12, 34)
     * $query->filterBySex(array('min' => 12)); // WHERE sex >= 12
     * $query->filterBySex(array('max' => 12)); // WHERE sex <= 12
     * </code>
     *
     * @param     mixed $sex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge('fooValue');   // WHERE age = 'fooValue'
     * $query->filterByAge('%fooValue%'); // WHERE age LIKE '%fooValue%'
     * </code>
     *
     * @param     string $age The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($age)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $age)) {
                $age = str_replace('*', '%', $age);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE, $age, $comparison);
    }

    /**
     * Filter the query on the age_bu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeBu(1234); // WHERE age_bu = 1234
     * $query->filterByAgeBu(array(12, 34)); // WHERE age_bu IN (12, 34)
     * $query->filterByAgeBu(array('min' => 12)); // WHERE age_bu >= 12
     * $query->filterByAgeBu(array('max' => 12)); // WHERE age_bu <= 12
     * </code>
     *
     * @param     mixed $ageBu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_BU, $ageBu, $comparison);
    }

    /**
     * Filter the query on the age_bc column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeBc(1234); // WHERE age_bc = 1234
     * $query->filterByAgeBc(array(12, 34)); // WHERE age_bc IN (12, 34)
     * $query->filterByAgeBc(array('min' => 12)); // WHERE age_bc >= 12
     * $query->filterByAgeBc(array('max' => 12)); // WHERE age_bc <= 12
     * </code>
     *
     * @param     mixed $ageBc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_BC, $ageBc, $comparison);
    }

    /**
     * Filter the query on the age_eu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEu(1234); // WHERE age_eu = 1234
     * $query->filterByAgeEu(array(12, 34)); // WHERE age_eu IN (12, 34)
     * $query->filterByAgeEu(array('min' => 12)); // WHERE age_eu >= 12
     * $query->filterByAgeEu(array('max' => 12)); // WHERE age_eu <= 12
     * </code>
     *
     * @param     mixed $ageEu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_EU, $ageEu, $comparison);
    }

    /**
     * Filter the query on the age_ec column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEc(1234); // WHERE age_ec = 1234
     * $query->filterByAgeEc(array(12, 34)); // WHERE age_ec IN (12, 34)
     * $query->filterByAgeEc(array('min' => 12)); // WHERE age_ec >= 12
     * $query->filterByAgeEc(array('max' => 12)); // WHERE age_ec <= 12
     * </code>
     *
     * @param     mixed $ageEc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the involution column
     *
     * Example usage:
     * <code>
     * $query->filterByInvolution(true); // WHERE involution = true
     * $query->filterByInvolution('yes'); // WHERE involution = true
     * </code>
     *
     * @param     boolean|string $involution The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByInvolution($involution = null, $comparison = null)
    {
        if (is_string($involution)) {
            $involution = in_array(strtolower($involution), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::INVOLUTION, $involution, $comparison);
    }

    /**
     * Filter the query on the begDateInvolute column
     *
     * Example usage:
     * <code>
     * $query->filterByBegdateinvolute('2011-03-14'); // WHERE begDateInvolute = '2011-03-14'
     * $query->filterByBegdateinvolute('now'); // WHERE begDateInvolute = '2011-03-14'
     * $query->filterByBegdateinvolute(array('max' => 'yesterday')); // WHERE begDateInvolute > '2011-03-13'
     * </code>
     *
     * @param     mixed $begdateinvolute The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByBegdateinvolute($begdateinvolute = null, $comparison = null)
    {
        if (is_array($begdateinvolute)) {
            $useMinMax = false;
            if (isset($begdateinvolute['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::BEGDATEINVOLUTE, $begdateinvolute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdateinvolute['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::BEGDATEINVOLUTE, $begdateinvolute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::BEGDATEINVOLUTE, $begdateinvolute, $comparison);
    }

    /**
     * Filter the query on the endDateInvolute column
     *
     * Example usage:
     * <code>
     * $query->filterByEnddateinvolute('2011-03-14'); // WHERE endDateInvolute = '2011-03-14'
     * $query->filterByEnddateinvolute('now'); // WHERE endDateInvolute = '2011-03-14'
     * $query->filterByEnddateinvolute(array('max' => 'yesterday')); // WHERE endDateInvolute > '2011-03-13'
     * </code>
     *
     * @param     mixed $enddateinvolute The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function filterByEnddateinvolute($enddateinvolute = null, $comparison = null)
    {
        if (is_array($enddateinvolute)) {
            $useMinMax = false;
            if (isset($enddateinvolute['min'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::ENDDATEINVOLUTE, $enddateinvolute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddateinvolute['max'])) {
                $this->addUsingAlias(OrgstructureHospitalbedPeer::ENDDATEINVOLUTE, $enddateinvolute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureHospitalbedPeer::ENDDATEINVOLUTE, $enddateinvolute, $comparison);
    }

    /**
     * Filter the query by a related ActionpropertyHospitalbed object
     *
     * @param   ActionpropertyHospitalbed|PropelObjectCollection $actionpropertyHospitalbed  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureHospitalbedQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionpropertyHospitalbed($actionpropertyHospitalbed, $comparison = null)
    {
        if ($actionpropertyHospitalbed instanceof ActionpropertyHospitalbed) {
            return $this
                ->addUsingAlias(OrgstructureHospitalbedPeer::ID, $actionpropertyHospitalbed->getValue(), $comparison);
        } elseif ($actionpropertyHospitalbed instanceof PropelObjectCollection) {
            return $this
                ->useActionpropertyHospitalbedQuery()
                ->filterByPrimaryKeys($actionpropertyHospitalbed->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionpropertyHospitalbed() only accepts arguments of type ActionpropertyHospitalbed or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionpropertyHospitalbed relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function joinActionpropertyHospitalbed($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionpropertyHospitalbed');

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
            $this->addJoinObject($join, 'ActionpropertyHospitalbed');
        }

        return $this;
    }

    /**
     * Use the ActionpropertyHospitalbed relation ActionpropertyHospitalbed object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionpropertyHospitalbedQuery A secondary query class using the current class as primary query
     */
    public function useActionpropertyHospitalbedQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActionpropertyHospitalbed($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionpropertyHospitalbed', '\Webmis\Models\ActionpropertyHospitalbedQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   OrgstructureHospitalbed $orgstructureHospitalbed Object to remove from the list of results
     *
     * @return OrgstructureHospitalbedQuery The current query, for fluid interface
     */
    public function prune($orgstructureHospitalbed = null)
    {
        if ($orgstructureHospitalbed) {
            $this->addUsingAlias(OrgstructureHospitalbedPeer::ID, $orgstructureHospitalbed->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
