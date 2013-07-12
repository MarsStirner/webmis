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
use Webmis\Models\ActiontypeQuotatype;
use Webmis\Models\ActiontypeQuotatypePeer;
use Webmis\Models\ActiontypeQuotatypeQuery;

/**
 * Base class that represents a query for the 'ActionType_QuotaType' table.
 *
 *
 *
 * @method ActiontypeQuotatypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActiontypeQuotatypeQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ActiontypeQuotatypeQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method ActiontypeQuotatypeQuery orderByQuotaclass($order = Criteria::ASC) Order by the quotaClass column
 * @method ActiontypeQuotatypeQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method ActiontypeQuotatypeQuery orderByQuotatypeId($order = Criteria::ASC) Order by the quotaType_id column
 *
 * @method ActiontypeQuotatypeQuery groupById() Group by the id column
 * @method ActiontypeQuotatypeQuery groupByMasterId() Group by the master_id column
 * @method ActiontypeQuotatypeQuery groupByIdx() Group by the idx column
 * @method ActiontypeQuotatypeQuery groupByQuotaclass() Group by the quotaClass column
 * @method ActiontypeQuotatypeQuery groupByFinanceId() Group by the finance_id column
 * @method ActiontypeQuotatypeQuery groupByQuotatypeId() Group by the quotaType_id column
 *
 * @method ActiontypeQuotatypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActiontypeQuotatypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActiontypeQuotatypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActiontypeQuotatype findOne(PropelPDO $con = null) Return the first ActiontypeQuotatype matching the query
 * @method ActiontypeQuotatype findOneOrCreate(PropelPDO $con = null) Return the first ActiontypeQuotatype matching the query, or a new ActiontypeQuotatype object populated from the query conditions when no match is found
 *
 * @method ActiontypeQuotatype findOneByMasterId(int $master_id) Return the first ActiontypeQuotatype filtered by the master_id column
 * @method ActiontypeQuotatype findOneByIdx(int $idx) Return the first ActiontypeQuotatype filtered by the idx column
 * @method ActiontypeQuotatype findOneByQuotaclass(boolean $quotaClass) Return the first ActiontypeQuotatype filtered by the quotaClass column
 * @method ActiontypeQuotatype findOneByFinanceId(int $finance_id) Return the first ActiontypeQuotatype filtered by the finance_id column
 * @method ActiontypeQuotatype findOneByQuotatypeId(int $quotaType_id) Return the first ActiontypeQuotatype filtered by the quotaType_id column
 *
 * @method array findById(int $id) Return ActiontypeQuotatype objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return ActiontypeQuotatype objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return ActiontypeQuotatype objects filtered by the idx column
 * @method array findByQuotaclass(boolean $quotaClass) Return ActiontypeQuotatype objects filtered by the quotaClass column
 * @method array findByFinanceId(int $finance_id) Return ActiontypeQuotatype objects filtered by the finance_id column
 * @method array findByQuotatypeId(int $quotaType_id) Return ActiontypeQuotatype objects filtered by the quotaType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypeQuotatypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActiontypeQuotatypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActiontypeQuotatype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActiontypeQuotatypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActiontypeQuotatypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActiontypeQuotatypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActiontypeQuotatypeQuery) {
            return $criteria;
        }
        $query = new ActiontypeQuotatypeQuery();
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
     * @return   ActiontypeQuotatype|ActiontypeQuotatype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActiontypeQuotatypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeQuotatypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActiontypeQuotatype A model object, or null if the key is not found
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
     * @return                 ActiontypeQuotatype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `quotaClass`, `finance_id`, `quotaType_id` FROM `ActionType_QuotaType` WHERE `id` = :p0';
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
            $obj = new ActiontypeQuotatype();
            $obj->hydrate($row);
            ActiontypeQuotatypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ActiontypeQuotatype|ActiontypeQuotatype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActiontypeQuotatype[]|mixed the list of results, formatted by the current formatter
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
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActiontypeQuotatypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActiontypeQuotatypePeer::ID, $keys, Criteria::IN);
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
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeQuotatypePeer::ID, $id, $comparison);
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
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeQuotatypePeer::MASTER_ID, $masterId, $comparison);
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
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeQuotatypePeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the quotaClass column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotaclass(true); // WHERE quotaClass = true
     * $query->filterByQuotaclass('yes'); // WHERE quotaClass = true
     * </code>
     *
     * @param     boolean|string $quotaclass The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByQuotaclass($quotaclass = null, $comparison = null)
    {
        if (is_string($quotaclass)) {
            $quotaclass = in_array(strtolower($quotaclass), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypeQuotatypePeer::QUOTACLASS, $quotaclass, $comparison);
    }

    /**
     * Filter the query on the finance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFinanceId(1234); // WHERE finance_id = 1234
     * $query->filterByFinanceId(array(12, 34)); // WHERE finance_id IN (12, 34)
     * $query->filterByFinanceId(array('min' => 12)); // WHERE finance_id >= 12
     * $query->filterByFinanceId(array('max' => 12)); // WHERE finance_id <= 12
     * </code>
     *
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeQuotatypePeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the quotaType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotatypeId(1234); // WHERE quotaType_id = 1234
     * $query->filterByQuotatypeId(array(12, 34)); // WHERE quotaType_id IN (12, 34)
     * $query->filterByQuotatypeId(array('min' => 12)); // WHERE quotaType_id >= 12
     * $query->filterByQuotatypeId(array('max' => 12)); // WHERE quotaType_id <= 12
     * </code>
     *
     * @param     mixed $quotatypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function filterByQuotatypeId($quotatypeId = null, $comparison = null)
    {
        if (is_array($quotatypeId)) {
            $useMinMax = false;
            if (isset($quotatypeId['min'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::QUOTATYPE_ID, $quotatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotatypeId['max'])) {
                $this->addUsingAlias(ActiontypeQuotatypePeer::QUOTATYPE_ID, $quotatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeQuotatypePeer::QUOTATYPE_ID, $quotatypeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ActiontypeQuotatype $actiontypeQuotatype Object to remove from the list of results
     *
     * @return ActiontypeQuotatypeQuery The current query, for fluid interface
     */
    public function prune($actiontypeQuotatype = null)
    {
        if ($actiontypeQuotatype) {
            $this->addUsingAlias(ActiontypeQuotatypePeer::ID, $actiontypeQuotatype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
