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
use Webmis\Models\OrgstructureJob;
use Webmis\Models\OrgstructureJobPeer;
use Webmis\Models\OrgstructureJobQuery;

/**
 * Base class that represents a query for the 'OrgStructure_Job' table.
 *
 *
 *
 * @method OrgstructureJobQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureJobQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method OrgstructureJobQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method OrgstructureJobQuery orderByJobtypeId($order = Criteria::ASC) Order by the jobType_id column
 * @method OrgstructureJobQuery orderByBegtime($order = Criteria::ASC) Order by the begTime column
 * @method OrgstructureJobQuery orderByEndtime($order = Criteria::ASC) Order by the endTime column
 * @method OrgstructureJobQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method OrgstructureJobQuery groupById() Group by the id column
 * @method OrgstructureJobQuery groupByMasterId() Group by the master_id column
 * @method OrgstructureJobQuery groupByIdx() Group by the idx column
 * @method OrgstructureJobQuery groupByJobtypeId() Group by the jobType_id column
 * @method OrgstructureJobQuery groupByBegtime() Group by the begTime column
 * @method OrgstructureJobQuery groupByEndtime() Group by the endTime column
 * @method OrgstructureJobQuery groupByQuantity() Group by the quantity column
 *
 * @method OrgstructureJobQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureJobQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureJobQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureJob findOne(PropelPDO $con = null) Return the first OrgstructureJob matching the query
 * @method OrgstructureJob findOneOrCreate(PropelPDO $con = null) Return the first OrgstructureJob matching the query, or a new OrgstructureJob object populated from the query conditions when no match is found
 *
 * @method OrgstructureJob findOneByMasterId(int $master_id) Return the first OrgstructureJob filtered by the master_id column
 * @method OrgstructureJob findOneByIdx(int $idx) Return the first OrgstructureJob filtered by the idx column
 * @method OrgstructureJob findOneByJobtypeId(int $jobType_id) Return the first OrgstructureJob filtered by the jobType_id column
 * @method OrgstructureJob findOneByBegtime(string $begTime) Return the first OrgstructureJob filtered by the begTime column
 * @method OrgstructureJob findOneByEndtime(string $endTime) Return the first OrgstructureJob filtered by the endTime column
 * @method OrgstructureJob findOneByQuantity(int $quantity) Return the first OrgstructureJob filtered by the quantity column
 *
 * @method array findById(int $id) Return OrgstructureJob objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return OrgstructureJob objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return OrgstructureJob objects filtered by the idx column
 * @method array findByJobtypeId(int $jobType_id) Return OrgstructureJob objects filtered by the jobType_id column
 * @method array findByBegtime(string $begTime) Return OrgstructureJob objects filtered by the begTime column
 * @method array findByEndtime(string $endTime) Return OrgstructureJob objects filtered by the endTime column
 * @method array findByQuantity(int $quantity) Return OrgstructureJob objects filtered by the quantity column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureJobQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureJobQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrgstructureJob', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureJobQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureJobQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureJobQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureJobQuery) {
            return $criteria;
        }
        $query = new OrgstructureJobQuery();
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
     * @return   OrgstructureJob|OrgstructureJob[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructureJobPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructureJobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgstructureJob A model object, or null if the key is not found
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
     * @return                 OrgstructureJob A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `jobType_id`, `begTime`, `endTime`, `quantity` FROM `OrgStructure_Job` WHERE `id` = :p0';
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
            $obj = new OrgstructureJob();
            $obj->hydrate($row);
            OrgstructureJobPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrgstructureJob|OrgstructureJob[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrgstructureJob[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructureJobPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructureJobPeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::ID, $id, $comparison);
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
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::MASTER_ID, $masterId, $comparison);
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
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the jobType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJobtypeId(1234); // WHERE jobType_id = 1234
     * $query->filterByJobtypeId(array(12, 34)); // WHERE jobType_id IN (12, 34)
     * $query->filterByJobtypeId(array('min' => 12)); // WHERE jobType_id >= 12
     * $query->filterByJobtypeId(array('max' => 12)); // WHERE jobType_id <= 12
     * </code>
     *
     * @param     mixed $jobtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByJobtypeId($jobtypeId = null, $comparison = null)
    {
        if (is_array($jobtypeId)) {
            $useMinMax = false;
            if (isset($jobtypeId['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::JOBTYPE_ID, $jobtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jobtypeId['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::JOBTYPE_ID, $jobtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::JOBTYPE_ID, $jobtypeId, $comparison);
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
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByBegtime($begtime = null, $comparison = null)
    {
        if (is_array($begtime)) {
            $useMinMax = false;
            if (isset($begtime['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::BEGTIME, $begtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begtime['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::BEGTIME, $begtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::BEGTIME, $begtime, $comparison);
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
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByEndtime($endtime = null, $comparison = null)
    {
        if (is_array($endtime)) {
            $useMinMax = false;
            if (isset($endtime['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::ENDTIME, $endtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endtime['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::ENDTIME, $endtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::ENDTIME, $endtime, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity >= 12
     * $query->filterByQuantity(array('max' => 12)); // WHERE quantity <= 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OrgstructureJobPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OrgstructureJobPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureJobPeer::QUANTITY, $quantity, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   OrgstructureJob $orgstructureJob Object to remove from the list of results
     *
     * @return OrgstructureJobQuery The current query, for fluid interface
     */
    public function prune($orgstructureJob = null)
    {
        if ($orgstructureJob) {
            $this->addUsingAlias(OrgstructureJobPeer::ID, $orgstructureJob->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
