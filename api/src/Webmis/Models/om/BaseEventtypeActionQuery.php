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
use Webmis\Models\EventtypeAction;
use Webmis\Models\EventtypeActionPeer;
use Webmis\Models\EventtypeActionQuery;
use Webmis\Models\Rbtissuetype;

/**
 * Base class that represents a query for the 'EventType_Action' table.
 *
 *
 *
 * @method EventtypeActionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventtypeActionQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method EventtypeActionQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method EventtypeActionQuery orderByActiontypeId($order = Criteria::ASC) Order by the actionType_id column
 * @method EventtypeActionQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method EventtypeActionQuery orderByTissuetypeId($order = Criteria::ASC) Order by the tissueType_id column
 * @method EventtypeActionQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method EventtypeActionQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method EventtypeActionQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method EventtypeActionQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method EventtypeActionQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method EventtypeActionQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method EventtypeActionQuery orderBySelectiongroup($order = Criteria::ASC) Order by the selectionGroup column
 * @method EventtypeActionQuery orderByActuality($order = Criteria::ASC) Order by the actuality column
 * @method EventtypeActionQuery orderByExpose($order = Criteria::ASC) Order by the expose column
 * @method EventtypeActionQuery orderByPayable($order = Criteria::ASC) Order by the payable column
 * @method EventtypeActionQuery orderByAcademicdegreeId($order = Criteria::ASC) Order by the academicDegree_id column
 *
 * @method EventtypeActionQuery groupById() Group by the id column
 * @method EventtypeActionQuery groupByEventtypeId() Group by the eventType_id column
 * @method EventtypeActionQuery groupByIdx() Group by the idx column
 * @method EventtypeActionQuery groupByActiontypeId() Group by the actionType_id column
 * @method EventtypeActionQuery groupBySpecialityId() Group by the speciality_id column
 * @method EventtypeActionQuery groupByTissuetypeId() Group by the tissueType_id column
 * @method EventtypeActionQuery groupBySex() Group by the sex column
 * @method EventtypeActionQuery groupByAge() Group by the age column
 * @method EventtypeActionQuery groupByAgeBu() Group by the age_bu column
 * @method EventtypeActionQuery groupByAgeBc() Group by the age_bc column
 * @method EventtypeActionQuery groupByAgeEu() Group by the age_eu column
 * @method EventtypeActionQuery groupByAgeEc() Group by the age_ec column
 * @method EventtypeActionQuery groupBySelectiongroup() Group by the selectionGroup column
 * @method EventtypeActionQuery groupByActuality() Group by the actuality column
 * @method EventtypeActionQuery groupByExpose() Group by the expose column
 * @method EventtypeActionQuery groupByPayable() Group by the payable column
 * @method EventtypeActionQuery groupByAcademicdegreeId() Group by the academicDegree_id column
 *
 * @method EventtypeActionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventtypeActionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventtypeActionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventtypeActionQuery leftJoinRbtissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtissuetype relation
 * @method EventtypeActionQuery rightJoinRbtissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtissuetype relation
 * @method EventtypeActionQuery innerJoinRbtissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtissuetype relation
 *
 * @method EventtypeAction findOne(PropelPDO $con = null) Return the first EventtypeAction matching the query
 * @method EventtypeAction findOneOrCreate(PropelPDO $con = null) Return the first EventtypeAction matching the query, or a new EventtypeAction object populated from the query conditions when no match is found
 *
 * @method EventtypeAction findOneByEventtypeId(int $eventType_id) Return the first EventtypeAction filtered by the eventType_id column
 * @method EventtypeAction findOneByIdx(int $idx) Return the first EventtypeAction filtered by the idx column
 * @method EventtypeAction findOneByActiontypeId(int $actionType_id) Return the first EventtypeAction filtered by the actionType_id column
 * @method EventtypeAction findOneBySpecialityId(int $speciality_id) Return the first EventtypeAction filtered by the speciality_id column
 * @method EventtypeAction findOneByTissuetypeId(int $tissueType_id) Return the first EventtypeAction filtered by the tissueType_id column
 * @method EventtypeAction findOneBySex(int $sex) Return the first EventtypeAction filtered by the sex column
 * @method EventtypeAction findOneByAge(string $age) Return the first EventtypeAction filtered by the age column
 * @method EventtypeAction findOneByAgeBu(int $age_bu) Return the first EventtypeAction filtered by the age_bu column
 * @method EventtypeAction findOneByAgeBc(int $age_bc) Return the first EventtypeAction filtered by the age_bc column
 * @method EventtypeAction findOneByAgeEu(boolean $age_eu) Return the first EventtypeAction filtered by the age_eu column
 * @method EventtypeAction findOneByAgeEc(int $age_ec) Return the first EventtypeAction filtered by the age_ec column
 * @method EventtypeAction findOneBySelectiongroup(int $selectionGroup) Return the first EventtypeAction filtered by the selectionGroup column
 * @method EventtypeAction findOneByActuality(int $actuality) Return the first EventtypeAction filtered by the actuality column
 * @method EventtypeAction findOneByExpose(boolean $expose) Return the first EventtypeAction filtered by the expose column
 * @method EventtypeAction findOneByPayable(boolean $payable) Return the first EventtypeAction filtered by the payable column
 * @method EventtypeAction findOneByAcademicdegreeId(int $academicDegree_id) Return the first EventtypeAction filtered by the academicDegree_id column
 *
 * @method array findById(int $id) Return EventtypeAction objects filtered by the id column
 * @method array findByEventtypeId(int $eventType_id) Return EventtypeAction objects filtered by the eventType_id column
 * @method array findByIdx(int $idx) Return EventtypeAction objects filtered by the idx column
 * @method array findByActiontypeId(int $actionType_id) Return EventtypeAction objects filtered by the actionType_id column
 * @method array findBySpecialityId(int $speciality_id) Return EventtypeAction objects filtered by the speciality_id column
 * @method array findByTissuetypeId(int $tissueType_id) Return EventtypeAction objects filtered by the tissueType_id column
 * @method array findBySex(int $sex) Return EventtypeAction objects filtered by the sex column
 * @method array findByAge(string $age) Return EventtypeAction objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return EventtypeAction objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return EventtypeAction objects filtered by the age_bc column
 * @method array findByAgeEu(boolean $age_eu) Return EventtypeAction objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return EventtypeAction objects filtered by the age_ec column
 * @method array findBySelectiongroup(int $selectionGroup) Return EventtypeAction objects filtered by the selectionGroup column
 * @method array findByActuality(int $actuality) Return EventtypeAction objects filtered by the actuality column
 * @method array findByExpose(boolean $expose) Return EventtypeAction objects filtered by the expose column
 * @method array findByPayable(boolean $payable) Return EventtypeAction objects filtered by the payable column
 * @method array findByAcademicdegreeId(int $academicDegree_id) Return EventtypeAction objects filtered by the academicDegree_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypeActionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventtypeActionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\EventtypeAction', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventtypeActionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventtypeActionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventtypeActionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventtypeActionQuery) {
            return $criteria;
        }
        $query = new EventtypeActionQuery();
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
     * @return   EventtypeAction|EventtypeAction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventtypeActionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventtypeActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventtypeAction A model object, or null if the key is not found
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
     * @return                 EventtypeAction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `eventType_id`, `idx`, `actionType_id`, `speciality_id`, `tissueType_id`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `selectionGroup`, `actuality`, `expose`, `payable`, `academicDegree_id` FROM `EventType_Action` WHERE `id` = :p0';
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
            $obj = new EventtypeAction();
            $obj->hydrate($row);
            EventtypeActionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventtypeAction|EventtypeAction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventtypeAction[]|mixed the list of results, formatted by the current formatter
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventtypeActionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventtypeActionPeer::ID, $keys, Criteria::IN);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::ID, $id, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the actionType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActiontypeId(1234); // WHERE actionType_id = 1234
     * $query->filterByActiontypeId(array(12, 34)); // WHERE actionType_id IN (12, 34)
     * $query->filterByActiontypeId(array('min' => 12)); // WHERE actionType_id >= 12
     * $query->filterByActiontypeId(array('max' => 12)); // WHERE actionType_id <= 12
     * </code>
     *
     * @param     mixed $actiontypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByActiontypeId($actiontypeId = null, $comparison = null)
    {
        if (is_array($actiontypeId)) {
            $useMinMax = false;
            if (isset($actiontypeId['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::ACTIONTYPE_ID, $actiontypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiontypeId['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::ACTIONTYPE_ID, $actiontypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::ACTIONTYPE_ID, $actiontypeId, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::SPECIALITY_ID, $specialityId, $comparison);
    }

    /**
     * Filter the query on the tissueType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTissuetypeId(1234); // WHERE tissueType_id = 1234
     * $query->filterByTissuetypeId(array(12, 34)); // WHERE tissueType_id IN (12, 34)
     * $query->filterByTissuetypeId(array('min' => 12)); // WHERE tissueType_id >= 12
     * $query->filterByTissuetypeId(array('max' => 12)); // WHERE tissueType_id <= 12
     * </code>
     *
     * @see       filterByRbtissuetype()
     *
     * @param     mixed $tissuetypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByTissuetypeId($tissuetypeId = null, $comparison = null)
    {
        if (is_array($tissuetypeId)) {
            $useMinMax = false;
            if (isset($tissuetypeId['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::TISSUETYPE_ID, $tissuetypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tissuetypeId['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::TISSUETYPE_ID, $tissuetypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::TISSUETYPE_ID, $tissuetypeId, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::SEX, $sex, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypeActionPeer::AGE, $age, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::AGE_BU, $ageBu, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::AGE_BC, $ageBc, $comparison);
    }

    /**
     * Filter the query on the age_eu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEu(true); // WHERE age_eu = true
     * $query->filterByAgeEu('yes'); // WHERE age_eu = true
     * </code>
     *
     * @param     boolean|string $ageEu The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_string($ageEu)) {
            $ageEu = in_array(strtolower($ageEu), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypeActionPeer::AGE_EU, $ageEu, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::AGE_EC, $ageEc, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterBySelectiongroup($selectiongroup = null, $comparison = null)
    {
        if (is_array($selectiongroup)) {
            $useMinMax = false;
            if (isset($selectiongroup['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::SELECTIONGROUP, $selectiongroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($selectiongroup['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::SELECTIONGROUP, $selectiongroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::SELECTIONGROUP, $selectiongroup, $comparison);
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
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByActuality($actuality = null, $comparison = null)
    {
        if (is_array($actuality)) {
            $useMinMax = false;
            if (isset($actuality['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::ACTUALITY, $actuality['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actuality['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::ACTUALITY, $actuality['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::ACTUALITY, $actuality, $comparison);
    }

    /**
     * Filter the query on the expose column
     *
     * Example usage:
     * <code>
     * $query->filterByExpose(true); // WHERE expose = true
     * $query->filterByExpose('yes'); // WHERE expose = true
     * </code>
     *
     * @param     boolean|string $expose The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByExpose($expose = null, $comparison = null)
    {
        if (is_string($expose)) {
            $expose = in_array(strtolower($expose), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypeActionPeer::EXPOSE, $expose, $comparison);
    }

    /**
     * Filter the query on the payable column
     *
     * Example usage:
     * <code>
     * $query->filterByPayable(true); // WHERE payable = true
     * $query->filterByPayable('yes'); // WHERE payable = true
     * </code>
     *
     * @param     boolean|string $payable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByPayable($payable = null, $comparison = null)
    {
        if (is_string($payable)) {
            $payable = in_array(strtolower($payable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypeActionPeer::PAYABLE, $payable, $comparison);
    }

    /**
     * Filter the query on the academicDegree_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAcademicdegreeId(1234); // WHERE academicDegree_id = 1234
     * $query->filterByAcademicdegreeId(array(12, 34)); // WHERE academicDegree_id IN (12, 34)
     * $query->filterByAcademicdegreeId(array('min' => 12)); // WHERE academicDegree_id >= 12
     * $query->filterByAcademicdegreeId(array('max' => 12)); // WHERE academicDegree_id <= 12
     * </code>
     *
     * @param     mixed $academicdegreeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function filterByAcademicdegreeId($academicdegreeId = null, $comparison = null)
    {
        if (is_array($academicdegreeId)) {
            $useMinMax = false;
            if (isset($academicdegreeId['min'])) {
                $this->addUsingAlias(EventtypeActionPeer::ACADEMICDEGREE_ID, $academicdegreeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($academicdegreeId['max'])) {
                $this->addUsingAlias(EventtypeActionPeer::ACADEMICDEGREE_ID, $academicdegreeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeActionPeer::ACADEMICDEGREE_ID, $academicdegreeId, $comparison);
    }

    /**
     * Filter the query by a related Rbtissuetype object
     *
     * @param   Rbtissuetype|PropelObjectCollection $rbtissuetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventtypeActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtissuetype($rbtissuetype, $comparison = null)
    {
        if ($rbtissuetype instanceof Rbtissuetype) {
            return $this
                ->addUsingAlias(EventtypeActionPeer::TISSUETYPE_ID, $rbtissuetype->getId(), $comparison);
        } elseif ($rbtissuetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventtypeActionPeer::TISSUETYPE_ID, $rbtissuetype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtissuetype() only accepts arguments of type Rbtissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtissuetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function joinRbtissuetype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtissuetype');

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
            $this->addJoinObject($join, 'Rbtissuetype');
        }

        return $this;
    }

    /**
     * Use the Rbtissuetype relation Rbtissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtissuetypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbtissuetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtissuetype', '\Webmis\Models\RbtissuetypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   EventtypeAction $eventtypeAction Object to remove from the list of results
     *
     * @return EventtypeActionQuery The current query, for fluid interface
     */
    public function prune($eventtypeAction = null)
    {
        if ($eventtypeAction) {
            $this->addUsingAlias(EventtypeActionPeer::ID, $eventtypeAction->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
