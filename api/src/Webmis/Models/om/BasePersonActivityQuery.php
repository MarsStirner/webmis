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
use Webmis\Models\PersonActivity;
use Webmis\Models\PersonActivityPeer;
use Webmis\Models\PersonActivityQuery;

/**
 * Base class that represents a query for the 'Person_Activity' table.
 *
 *
 *
 * @method PersonActivityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersonActivityQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method PersonActivityQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method PersonActivityQuery orderByActivityId($order = Criteria::ASC) Order by the activity_id column
 *
 * @method PersonActivityQuery groupById() Group by the id column
 * @method PersonActivityQuery groupByMasterId() Group by the master_id column
 * @method PersonActivityQuery groupByIdx() Group by the idx column
 * @method PersonActivityQuery groupByActivityId() Group by the activity_id column
 *
 * @method PersonActivityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonActivityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonActivityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PersonActivity findOne(PropelPDO $con = null) Return the first PersonActivity matching the query
 * @method PersonActivity findOneOrCreate(PropelPDO $con = null) Return the first PersonActivity matching the query, or a new PersonActivity object populated from the query conditions when no match is found
 *
 * @method PersonActivity findOneByMasterId(int $master_id) Return the first PersonActivity filtered by the master_id column
 * @method PersonActivity findOneByIdx(int $idx) Return the first PersonActivity filtered by the idx column
 * @method PersonActivity findOneByActivityId(int $activity_id) Return the first PersonActivity filtered by the activity_id column
 *
 * @method array findById(int $id) Return PersonActivity objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return PersonActivity objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return PersonActivity objects filtered by the idx column
 * @method array findByActivityId(int $activity_id) Return PersonActivity objects filtered by the activity_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePersonActivityQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonActivityQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\PersonActivity', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonActivityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersonActivityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonActivityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonActivityQuery) {
            return $criteria;
        }
        $query = new PersonActivityQuery();
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
     * @return   PersonActivity|PersonActivity[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonActivityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonActivityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PersonActivity A model object, or null if the key is not found
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
     * @return                 PersonActivity A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `activity_id` FROM `Person_Activity` WHERE `id` = :p0';
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
            $obj = new PersonActivity();
            $obj->hydrate($row);
            PersonActivityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PersonActivity|PersonActivity[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PersonActivity[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonActivityPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonActivityPeer::ID, $keys, Criteria::IN);
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
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonActivityPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonActivityPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonActivityPeer::ID, $id, $comparison);
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
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(PersonActivityPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(PersonActivityPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonActivityPeer::MASTER_ID, $masterId, $comparison);
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
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(PersonActivityPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(PersonActivityPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonActivityPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the activity_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActivityId(1234); // WHERE activity_id = 1234
     * $query->filterByActivityId(array(12, 34)); // WHERE activity_id IN (12, 34)
     * $query->filterByActivityId(array('min' => 12)); // WHERE activity_id >= 12
     * $query->filterByActivityId(array('max' => 12)); // WHERE activity_id <= 12
     * </code>
     *
     * @param     mixed $activityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function filterByActivityId($activityId = null, $comparison = null)
    {
        if (is_array($activityId)) {
            $useMinMax = false;
            if (isset($activityId['min'])) {
                $this->addUsingAlias(PersonActivityPeer::ACTIVITY_ID, $activityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($activityId['max'])) {
                $this->addUsingAlias(PersonActivityPeer::ACTIVITY_ID, $activityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonActivityPeer::ACTIVITY_ID, $activityId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PersonActivity $personActivity Object to remove from the list of results
     *
     * @return PersonActivityQuery The current query, for fluid interface
     */
    public function prune($personActivity = null)
    {
        if ($personActivity) {
            $this->addUsingAlias(PersonActivityPeer::ID, $personActivity->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
