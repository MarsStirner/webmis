<?php

namespace Webmis\Models\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\EventtypeDiagnostic;
use Webmis\Models\EventtypeDiagnosticPeer;
use Webmis\Models\EventtypeDiagnosticQuery;

/**
 * Base class that represents a query for the 'EventType_Diagnostic' table.
 *
 *
 *
 * @method EventtypeDiagnosticQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventtypeDiagnosticQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method EventtypeDiagnosticQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method EventtypeDiagnosticQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method EventtypeDiagnosticQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method EventtypeDiagnosticQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method EventtypeDiagnosticQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method EventtypeDiagnosticQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method EventtypeDiagnosticQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method EventtypeDiagnosticQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method EventtypeDiagnosticQuery orderByDefaulthealthgroupId($order = Criteria::ASC) Order by the defaultHealthGroup_id column
 * @method EventtypeDiagnosticQuery orderByDefaultmkb($order = Criteria::ASC) Order by the defaultMKB column
 * @method EventtypeDiagnosticQuery orderByDefaultdispanserId($order = Criteria::ASC) Order by the defaultDispanser_id column
 * @method EventtypeDiagnosticQuery orderBySelectiongroup($order = Criteria::ASC) Order by the selectionGroup column
 * @method EventtypeDiagnosticQuery orderByActuality($order = Criteria::ASC) Order by the actuality column
 * @method EventtypeDiagnosticQuery orderByVisittypeId($order = Criteria::ASC) Order by the visitType_id column
 *
 * @method EventtypeDiagnosticQuery groupById() Group by the id column
 * @method EventtypeDiagnosticQuery groupByEventtypeId() Group by the eventType_id column
 * @method EventtypeDiagnosticQuery groupByIdx() Group by the idx column
 * @method EventtypeDiagnosticQuery groupBySpecialityId() Group by the speciality_id column
 * @method EventtypeDiagnosticQuery groupBySex() Group by the sex column
 * @method EventtypeDiagnosticQuery groupByAge() Group by the age column
 * @method EventtypeDiagnosticQuery groupByAgeBu() Group by the age_bu column
 * @method EventtypeDiagnosticQuery groupByAgeBc() Group by the age_bc column
 * @method EventtypeDiagnosticQuery groupByAgeEu() Group by the age_eu column
 * @method EventtypeDiagnosticQuery groupByAgeEc() Group by the age_ec column
 * @method EventtypeDiagnosticQuery groupByDefaulthealthgroupId() Group by the defaultHealthGroup_id column
 * @method EventtypeDiagnosticQuery groupByDefaultmkb() Group by the defaultMKB column
 * @method EventtypeDiagnosticQuery groupByDefaultdispanserId() Group by the defaultDispanser_id column
 * @method EventtypeDiagnosticQuery groupBySelectiongroup() Group by the selectionGroup column
 * @method EventtypeDiagnosticQuery groupByActuality() Group by the actuality column
 * @method EventtypeDiagnosticQuery groupByVisittypeId() Group by the visitType_id column
 *
 * @method EventtypeDiagnosticQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventtypeDiagnosticQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventtypeDiagnosticQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventtypeDiagnostic findOne(PropelPDO $con = null) Return the first EventtypeDiagnostic matching the query
 * @method EventtypeDiagnostic findOneOrCreate(PropelPDO $con = null) Return the first EventtypeDiagnostic matching the query, or a new EventtypeDiagnostic object populated from the query conditions when no match is found
 *
 * @method EventtypeDiagnostic findOneByEventtypeId(int $eventType_id) Return the first EventtypeDiagnostic filtered by the eventType_id column
 * @method EventtypeDiagnostic findOneByIdx(int $idx) Return the first EventtypeDiagnostic filtered by the idx column
 * @method EventtypeDiagnostic findOneBySpecialityId(int $speciality_id) Return the first EventtypeDiagnostic filtered by the speciality_id column
 * @method EventtypeDiagnostic findOneBySex(int $sex) Return the first EventtypeDiagnostic filtered by the sex column
 * @method EventtypeDiagnostic findOneByAge(string $age) Return the first EventtypeDiagnostic filtered by the age column
 * @method EventtypeDiagnostic findOneByAgeBu(int $age_bu) Return the first EventtypeDiagnostic filtered by the age_bu column
 * @method EventtypeDiagnostic findOneByAgeBc(int $age_bc) Return the first EventtypeDiagnostic filtered by the age_bc column
 * @method EventtypeDiagnostic findOneByAgeEu(int $age_eu) Return the first EventtypeDiagnostic filtered by the age_eu column
 * @method EventtypeDiagnostic findOneByAgeEc(int $age_ec) Return the first EventtypeDiagnostic filtered by the age_ec column
 * @method EventtypeDiagnostic findOneByDefaulthealthgroupId(int $defaultHealthGroup_id) Return the first EventtypeDiagnostic filtered by the defaultHealthGroup_id column
 * @method EventtypeDiagnostic findOneByDefaultmkb(string $defaultMKB) Return the first EventtypeDiagnostic filtered by the defaultMKB column
 * @method EventtypeDiagnostic findOneByDefaultdispanserId(int $defaultDispanser_id) Return the first EventtypeDiagnostic filtered by the defaultDispanser_id column
 * @method EventtypeDiagnostic findOneBySelectiongroup(int $selectionGroup) Return the first EventtypeDiagnostic filtered by the selectionGroup column
 * @method EventtypeDiagnostic findOneByActuality(int $actuality) Return the first EventtypeDiagnostic filtered by the actuality column
 * @method EventtypeDiagnostic findOneByVisittypeId(int $visitType_id) Return the first EventtypeDiagnostic filtered by the visitType_id column
 *
 * @method array findById(int $id) Return EventtypeDiagnostic objects filtered by the id column
 * @method array findByEventtypeId(int $eventType_id) Return EventtypeDiagnostic objects filtered by the eventType_id column
 * @method array findByIdx(int $idx) Return EventtypeDiagnostic objects filtered by the idx column
 * @method array findBySpecialityId(int $speciality_id) Return EventtypeDiagnostic objects filtered by the speciality_id column
 * @method array findBySex(int $sex) Return EventtypeDiagnostic objects filtered by the sex column
 * @method array findByAge(string $age) Return EventtypeDiagnostic objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return EventtypeDiagnostic objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return EventtypeDiagnostic objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return EventtypeDiagnostic objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return EventtypeDiagnostic objects filtered by the age_ec column
 * @method array findByDefaulthealthgroupId(int $defaultHealthGroup_id) Return EventtypeDiagnostic objects filtered by the defaultHealthGroup_id column
 * @method array findByDefaultmkb(string $defaultMKB) Return EventtypeDiagnostic objects filtered by the defaultMKB column
 * @method array findByDefaultdispanserId(int $defaultDispanser_id) Return EventtypeDiagnostic objects filtered by the defaultDispanser_id column
 * @method array findBySelectiongroup(int $selectionGroup) Return EventtypeDiagnostic objects filtered by the selectionGroup column
 * @method array findByActuality(int $actuality) Return EventtypeDiagnostic objects filtered by the actuality column
 * @method array findByVisittypeId(int $visitType_id) Return EventtypeDiagnostic objects filtered by the visitType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypeDiagnosticQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventtypeDiagnosticQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\EventtypeDiagnostic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventtypeDiagnosticQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventtypeDiagnosticQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventtypeDiagnosticQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventtypeDiagnosticQuery) {
            return $criteria;
        }
        $query = new EventtypeDiagnosticQuery();
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
     * @return   EventtypeDiagnostic|EventtypeDiagnostic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventtypeDiagnosticPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventtypeDiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventtypeDiagnostic A model object, or null if the key is not found
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
     * @return                 EventtypeDiagnostic A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `eventType_id`, `idx`, `speciality_id`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `defaultHealthGroup_id`, `defaultMKB`, `defaultDispanser_id`, `selectionGroup`, `actuality`, `visitType_id` FROM `EventType_Diagnostic` WHERE `id` = :p0';
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
            $obj = new EventtypeDiagnostic();
            $obj->hydrate($row);
            EventtypeDiagnosticPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventtypeDiagnostic|EventtypeDiagnostic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventtypeDiagnostic[]|mixed the list of results, formatted by the current formatter
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventtypeDiagnosticPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventtypeDiagnosticPeer::ID, $keys, Criteria::IN);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the eventType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventtypeId(1234); // WHERE eventType_id = 1234
     * $query->filterByEventtypeId(array(12, 34)); // WHERE eventType_id IN (12, 34)
     * $query->filterByEventtypeId(array('min' => 12)); // WHERE eventType_id >= 12
     * $query->filterByEventtypeId(array('max' => 12)); // WHERE eventType_id <= 12
     * </code>
     *
     * @param     mixed $eventtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the speciality_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecialityId(1234); // WHERE speciality_id = 1234
     * $query->filterBySpecialityId(array(12, 34)); // WHERE speciality_id IN (12, 34)
     * $query->filterBySpecialityId(array('min' => 12)); // WHERE speciality_id >= 12
     * $query->filterBySpecialityId(array('max' => 12)); // WHERE speciality_id <= 12
     * </code>
     *
     * @param     mixed $specialityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::SPECIALITY_ID, $specialityId, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::SEX, $sex, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypeDiagnosticPeer::AGE, $age, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_BU, $ageBu, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_BC, $ageBc, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_EU, $ageEu, $comparison);
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
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the defaultHealthGroup_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaulthealthgroupId(1234); // WHERE defaultHealthGroup_id = 1234
     * $query->filterByDefaulthealthgroupId(array(12, 34)); // WHERE defaultHealthGroup_id IN (12, 34)
     * $query->filterByDefaulthealthgroupId(array('min' => 12)); // WHERE defaultHealthGroup_id >= 12
     * $query->filterByDefaulthealthgroupId(array('max' => 12)); // WHERE defaultHealthGroup_id <= 12
     * </code>
     *
     * @param     mixed $defaulthealthgroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByDefaulthealthgroupId($defaulthealthgroupId = null, $comparison = null)
    {
        if (is_array($defaulthealthgroupId)) {
            $useMinMax = false;
            if (isset($defaulthealthgroupId['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID, $defaulthealthgroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaulthealthgroupId['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID, $defaulthealthgroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTHEALTHGROUP_ID, $defaulthealthgroupId, $comparison);
    }

    /**
     * Filter the query on the defaultMKB column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultmkb('fooValue');   // WHERE defaultMKB = 'fooValue'
     * $query->filterByDefaultmkb('%fooValue%'); // WHERE defaultMKB LIKE '%fooValue%'
     * </code>
     *
     * @param     string $defaultmkb The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByDefaultmkb($defaultmkb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($defaultmkb)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $defaultmkb)) {
                $defaultmkb = str_replace('*', '%', $defaultmkb);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTMKB, $defaultmkb, $comparison);
    }

    /**
     * Filter the query on the defaultDispanser_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultdispanserId(1234); // WHERE defaultDispanser_id = 1234
     * $query->filterByDefaultdispanserId(array(12, 34)); // WHERE defaultDispanser_id IN (12, 34)
     * $query->filterByDefaultdispanserId(array('min' => 12)); // WHERE defaultDispanser_id >= 12
     * $query->filterByDefaultdispanserId(array('max' => 12)); // WHERE defaultDispanser_id <= 12
     * </code>
     *
     * @param     mixed $defaultdispanserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByDefaultdispanserId($defaultdispanserId = null, $comparison = null)
    {
        if (is_array($defaultdispanserId)) {
            $useMinMax = false;
            if (isset($defaultdispanserId['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID, $defaultdispanserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultdispanserId['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID, $defaultdispanserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::DEFAULTDISPANSER_ID, $defaultdispanserId, $comparison);
    }

    /**
     * Filter the query on the selectionGroup column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectiongroup(1234); // WHERE selectionGroup = 1234
     * $query->filterBySelectiongroup(array(12, 34)); // WHERE selectionGroup IN (12, 34)
     * $query->filterBySelectiongroup(array('min' => 12)); // WHERE selectionGroup >= 12
     * $query->filterBySelectiongroup(array('max' => 12)); // WHERE selectionGroup <= 12
     * </code>
     *
     * @param     mixed $selectiongroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterBySelectiongroup($selectiongroup = null, $comparison = null)
    {
        if (is_array($selectiongroup)) {
            $useMinMax = false;
            if (isset($selectiongroup['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::SELECTIONGROUP, $selectiongroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($selectiongroup['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::SELECTIONGROUP, $selectiongroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::SELECTIONGROUP, $selectiongroup, $comparison);
    }

    /**
     * Filter the query on the actuality column
     *
     * Example usage:
     * <code>
     * $query->filterByActuality(1234); // WHERE actuality = 1234
     * $query->filterByActuality(array(12, 34)); // WHERE actuality IN (12, 34)
     * $query->filterByActuality(array('min' => 12)); // WHERE actuality >= 12
     * $query->filterByActuality(array('max' => 12)); // WHERE actuality <= 12
     * </code>
     *
     * @param     mixed $actuality The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByActuality($actuality = null, $comparison = null)
    {
        if (is_array($actuality)) {
            $useMinMax = false;
            if (isset($actuality['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::ACTUALITY, $actuality['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actuality['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::ACTUALITY, $actuality['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::ACTUALITY, $actuality, $comparison);
    }

    /**
     * Filter the query on the visitType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVisittypeId(1234); // WHERE visitType_id = 1234
     * $query->filterByVisittypeId(array(12, 34)); // WHERE visitType_id IN (12, 34)
     * $query->filterByVisittypeId(array('min' => 12)); // WHERE visitType_id >= 12
     * $query->filterByVisittypeId(array('max' => 12)); // WHERE visitType_id <= 12
     * </code>
     *
     * @param     mixed $visittypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function filterByVisittypeId($visittypeId = null, $comparison = null)
    {
        if (is_array($visittypeId)) {
            $useMinMax = false;
            if (isset($visittypeId['min'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::VISITTYPE_ID, $visittypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visittypeId['max'])) {
                $this->addUsingAlias(EventtypeDiagnosticPeer::VISITTYPE_ID, $visittypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeDiagnosticPeer::VISITTYPE_ID, $visittypeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EventtypeDiagnostic $eventtypeDiagnostic Object to remove from the list of results
     *
     * @return EventtypeDiagnosticQuery The current query, for fluid interface
     */
    public function prune($eventtypeDiagnostic = null)
    {
        if ($eventtypeDiagnostic) {
            $this->addUsingAlias(EventtypeDiagnosticPeer::ID, $eventtypeDiagnostic->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
