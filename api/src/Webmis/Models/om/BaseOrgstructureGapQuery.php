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
use Webmis\Models\OrgstructureGap;
use Webmis\Models\OrgstructureGapPeer;
use Webmis\Models\OrgstructureGapQuery;

/**
 * Base class that represents a query for the 'OrgStructure_Gap' table.
 *
 *
 *
 * @method OrgstructureGapQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureGapQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method OrgstructureGapQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method OrgstructureGapQuery orderByBegtime($order = Criteria::ASC) Order by the begTime column
 * @method OrgstructureGapQuery orderByEndtime($order = Criteria::ASC) Order by the endTime column
 * @method OrgstructureGapQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method OrgstructureGapQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 *
 * @method OrgstructureGapQuery groupById() Group by the id column
 * @method OrgstructureGapQuery groupByMasterId() Group by the master_id column
 * @method OrgstructureGapQuery groupByIdx() Group by the idx column
 * @method OrgstructureGapQuery groupByBegtime() Group by the begTime column
 * @method OrgstructureGapQuery groupByEndtime() Group by the endTime column
 * @method OrgstructureGapQuery groupBySpecialityId() Group by the speciality_id column
 * @method OrgstructureGapQuery groupByPersonId() Group by the person_id column
 *
 * @method OrgstructureGapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureGapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureGapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureGap findOne(PropelPDO $con = null) Return the first OrgstructureGap matching the query
 * @method OrgstructureGap findOneOrCreate(PropelPDO $con = null) Return the first OrgstructureGap matching the query, or a new OrgstructureGap object populated from the query conditions when no match is found
 *
 * @method OrgstructureGap findOneByMasterId(int $master_id) Return the first OrgstructureGap filtered by the master_id column
 * @method OrgstructureGap findOneByIdx(int $idx) Return the first OrgstructureGap filtered by the idx column
 * @method OrgstructureGap findOneByBegtime(string $begTime) Return the first OrgstructureGap filtered by the begTime column
 * @method OrgstructureGap findOneByEndtime(string $endTime) Return the first OrgstructureGap filtered by the endTime column
 * @method OrgstructureGap findOneBySpecialityId(int $speciality_id) Return the first OrgstructureGap filtered by the speciality_id column
 * @method OrgstructureGap findOneByPersonId(int $person_id) Return the first OrgstructureGap filtered by the person_id column
 *
 * @method array findById(int $id) Return OrgstructureGap objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return OrgstructureGap objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return OrgstructureGap objects filtered by the idx column
 * @method array findByBegtime(string $begTime) Return OrgstructureGap objects filtered by the begTime column
 * @method array findByEndtime(string $endTime) Return OrgstructureGap objects filtered by the endTime column
 * @method array findBySpecialityId(int $speciality_id) Return OrgstructureGap objects filtered by the speciality_id column
 * @method array findByPersonId(int $person_id) Return OrgstructureGap objects filtered by the person_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureGapQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureGapQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrgstructureGap', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureGapQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureGapQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureGapQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureGapQuery) {
            return $criteria;
        }
        $query = new OrgstructureGapQuery();
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
     * @return   OrgstructureGap|OrgstructureGap[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructureGapPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructureGapPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgstructureGap A model object, or null if the key is not found
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
     * @return                 OrgstructureGap A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `begTime`, `endTime`, `speciality_id`, `person_id` FROM `OrgStructure_Gap` WHERE `id` = :p0';
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
            $obj = new OrgstructureGap();
            $obj->hydrate($row);
            OrgstructureGapPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrgstructureGap|OrgstructureGap[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrgstructureGap[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructureGapPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructureGapPeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::ID, $id, $comparison);
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
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::MASTER_ID, $masterId, $comparison);
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
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the begTime column
     *
     * Example usage:
     * <code>
     * $query->filterByBegtime('2011-03-14'); // WHERE begTime = '2011-03-14'
     * $query->filterByBegtime('now'); // WHERE begTime = '2011-03-14'
     * $query->filterByBegtime(array('max' => 'yesterday')); // WHERE begTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $begtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByBegtime($begtime = null, $comparison = null)
    {
        if (is_array($begtime)) {
            $useMinMax = false;
            if (isset($begtime['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::BEGTIME, $begtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begtime['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::BEGTIME, $begtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::BEGTIME, $begtime, $comparison);
    }

    /**
     * Filter the query on the endTime column
     *
     * Example usage:
     * <code>
     * $query->filterByEndtime('2011-03-14'); // WHERE endTime = '2011-03-14'
     * $query->filterByEndtime('now'); // WHERE endTime = '2011-03-14'
     * $query->filterByEndtime(array('max' => 'yesterday')); // WHERE endTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $endtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByEndtime($endtime = null, $comparison = null)
    {
        if (is_array($endtime)) {
            $useMinMax = false;
            if (isset($endtime['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::ENDTIME, $endtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endtime['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::ENDTIME, $endtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::ENDTIME, $endtime, $comparison);
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
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::SPECIALITY_ID, $specialityId, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id >= 12
     * $query->filterByPersonId(array('max' => 12)); // WHERE person_id <= 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(OrgstructureGapPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(OrgstructureGapPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureGapPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   OrgstructureGap $orgstructureGap Object to remove from the list of results
     *
     * @return OrgstructureGapQuery The current query, for fluid interface
     */
    public function prune($orgstructureGap = null)
    {
        if ($orgstructureGap) {
            $this->addUsingAlias(OrgstructureGapPeer::ID, $orgstructureGap->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
